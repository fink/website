<?
$title = "ユーザーガイド - fink ツール";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2007/05/29 03:58:51';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="ユーザーガイド Contents"><link rel="prev" href="conf.php?phpLang=ja" title="Fink 設定ファイル">';


include_once "header.ja.inc";
?>
<h1>ユーザーガイド - 6. コマンドライン fink ツールの使用方法</h1>


<h2><a name="using">6.1 fink ツールの使用</a></h2>

<p>
<code>fink</code> ツールはソースディストリビューションを操作する一連のコマンドから成り立っています。
いずれも、最低限一つのパッケージ名、あるいは複数のパッケージ名を処理します。
パッケージ名だけを指定 (例 gimp) しても、バージョン番号付の完全な名前 (例 gimp-1.2.1 または gimp-1.2.1-3) でも動作します。
バージョン番号が指定されていない時は、 Fink は自動的に最新のバージョンとリビジョンを選択します。
</p>
<p>以下は、 <code>fink</code> ツールのコマンド一覧です:</p>

<h2><a name="options">6.2 グローバルオプション</a></h2>

<p>
全ての fink コマンドに共通のオプションがあります。
これは、 <code>fink --help</code> を実行することで一覧が出ます:
</p>
        <p>(<code>fink-0.26.0</code> 時点で)</p>


      <p><b>-h, --help</b> - displays help text.
</p>
      <p><b>-q, --quiet</b>  - causes <code>fink</code> to be less verbose, opposite of <b>--verbose</b>.  Overrides the <a href="conf.php?phpLang=ja#optional">Verbose</a> flag in <code>fink.conf</code>.
</p>
      <p><b>-V, --version</b> - display version information.
</p>
      <p><b>-v, --verbose</b> - causes  <code>fink</code> to be more verbose, opposite of <b>--quiet</b>.  Overrides the <a href="conf.php?phpLang=ja#optional">Verbose</a> field in <code>fink.conf.</code>
</p>
      <p><b>-y, --yes</b> - assume default answer for all interactive 
                        questions.
</p>
      <p><b>-K, --keep-root-dir</b>   - Causes <code>fink</code> not to delete the
                        <code>root-[name]-[version]-[revision]</code>
		        directory in the <a href="conf.php?phpLang=ja#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=ja#developer">KeepRootDir</a> field in <code>fink.conf</code>.
</p>
      <p><b>-k, --keep-build-dir</b>  - Causes <code>fink</code> not to delete the
                        <code>[name]-[version]-[revision]</code>
                        directory in the <a href="conf.php?phpLang=ja#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=ja#developer">KeepBuildDir</a> field in <code>fink.conf</code>.</p>
      <p><b>-b, --use-binary-dist</b> - download pre-compiled packages from the binary 
                        distribution if available (e.g. to reduce compile
		        time or disk usage).
		        Note that this mode instructs fink to download the
                        version it wants if that version is available for
		        download; it does not cause fink to choose a version
    		        based on its binary availability.  Corresponds to the <a href="conf.php?phpLang=ja#downloading">UseBinaryDist</a> flag in <code>fink.conf</code>.
</p>
      <p><b>--no-use-binary-dist</b>  - Don't use pre-compiled binary packages from the binary 
		        distribution, opposite of the --use-binary-dist flag. 
                        This is the default unless overridden by setting <code>UseBinaryDist: true </code>in 
                        the <code>fink.conf</code> configuration file. 
</p>
      <p><b>--build-as-nobody</b>     - Drop to a non-root user when performing the unpack,
                        patch, compile, and install phases. Note that packages
                        built with this option may be non-functional. You
                        should use this mode for package development and 
                        debugging only.
</p>
      <p><b>-m, --maintainer</b>
            - (<code>fink-0.25</code> and later) Perform actions useful to package maintainers: run validation on
           the <code>.info</code> file before building and on the <code>.deb</code> after building a
           package; turn certain build-time warnings into fatal errors; (<code>fink-0.26</code> and later) run the test suites as specified in the  field.  This sets <b>--tests</b> and <b>--validate</b> to <code>on</code>.</p>
      <p><b>--tests[=on|off|warn]</b>         - (<code>fink-0.26.0</code> and later) Causes <code>InfoTest</code> fields to be activated and test suites specified
           via <code>TestScript</code> to be executed (see the <a href="../packaging/reference.php#fields">Fink Packaging Manual</a>).  If no argument is given to this
           option or if the argument is <code>on</code> then failures in test suites will
           be considered fatal errors during builds.  If the argument is <code>warn</code>
           then failures will be treated as warnings.</p>
      <p><b>--validate[=on|off|warn]</b> -
           Causes packages to be validated during a build.  If no argument is
           given to this option or if the argument is <code>on</code> then validation failures will be considered fatal errors during builds.  If the argument is <code>warn</code> then failures will be treated as warnings.</p>
      <p><b>-l, --log-output</b>
            - Save a copy of the terminal output during each package building
           process. By default, the file is stored in
           <code>/tmp/fink-build-log_[name]-[version]-[revision]_[date]-[time]</code> but
           one can use the <b>--logfile</b> flag to specify an alternate filename.</p>
      <p><b>--no-log-output</b>
            - Don't save a copy of the output during package-building, opposite
           of the <b>--log-output</b> flag. This is the default.</p>
      <p><b>--logfile=filename</b>
            - Save package build logs to the file <code>filename</code> instead of the default
           file (see the <b>--log-output</b> flag, which is implicitly set by the
           <b>--logfile</b> flag). You can use percent-expansion codes to include
           specific package information automatically. A complete list of percent-expanions is available in the <a href="../packaging">Fink Packaging Manual</a>; some common percent-expansions are:</p>
      <ul>
        <li>                 <b>%n</b>    - package name
                 </li>
        <li><b>%v</b>    - package version
                 </li>
        <li><b>%r</b>    - package revision</li>
      </ul>
      <p><b>-t, --trees=expr</b>
           - Consider only packages in trees matching <b>expr</b>.

           The format of expr is a comma-delimited list of tree specifica-
           tions. Trees listed in <code>fink.conf</code> are compared against <b>expr</b>.  Only
           those which match at least one tree specification are considered by
           <code>fink</code>, in the order of the first specifications which they match. If
           no <b>--trees</b> option is used, all trees listed in <code>fink.conf</code> are
           included in order.

           A tree specification may contain a slash (/) character, in which
           case it requires an exact match with a tree. Otherwise, it matches
           against the first path-element of a tree. For example,
           <b>--trees=unstable/main</b> would match only the <b>unstable/main</b> tree,
           while <b>--trees=unstable</b> would match both unstable/main and
           <b>unstable/crypto</b>.

           There exist magic tree specifications which can be included in
           <b>expr</b>:</p>
      <ul>
        <li><b>status</b>
                       - Includes packages in the dpkg status database.

                 </li>
        <li><b>virtual</b>
                       - Includes virtual packages which reflect the capabili-
                       ties of the system.
</li>
      </ul>
      <p>Exclusion of (or failure to include) these magic trees is currently
           only supported for operations which do not install or remove packages.</p>
      <p><b>-T, --exclude-trees=expr</b>
           Consider only packages in trees not matching expr.

           The syntax of expr is the same as for <b>--trees</b>, including the magic
           tree specifications. However, matching trees are here excluded
           rather than included. Note that trees matching both <b>--trees</b> and
           <b>--exclude-trees</b> are excluded.
</p>
      <p> Examples of <b>--trees</b> and --exclude-trees:

                 </p>
      <ul>
        <li><code>fink --trees=stable,virtual,status install <b>foo</b></code> 
                       <p>Install <b>foo</b> as if <code>fink</code> was using the stable tree, even
                       if unstable is enabled in <code>fink.conf</code>.
</p></li>
        <li><code>fink --exclude-trees=local install <b>foo</b></code> 
                       <p>Install the version of <b>foo</b> in Fink, not the locally
                       modified version.

</p></li>
        <li><code>fink --trees=local/main list -i</code>
                       <p>List the locally modified packages which are installed.</p></li>
      </ul>

<p>
ほとんどのオプションは名前から内容が推測できると思います(<a href="conf.php?phpLang=ja#optional">ここ</a>に Buildpath の定義があります)。
一回限りではなく、常に使用したいオプションは
<a href="conf.php?phpLang=ja">Fink 設定ファイル</a> (<code>fink.conf</code>)
で設定することができます。
</p>

<h2><a name="install">6.3 install</a></h2>

<p><b>install</b> コマンドは、パッケージをインストールするのに使用します。
指定したパッケージをダウンロード、 configure 、ビルド、インストールを行ないます。
また、依存しているパッケージを確認をとった後で自動的にインストールします。
例:</p>
<pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
<p>
<a href="#options">--use-binary-dist</a> を使用することで時間を節約することができます。
</p>
<p>install コマンドのエイリアス: <b>update, enable, activate, use</b> (ほとんどは歴史的な理由による).
</p>

<h2><a name="remove">6.4 remove</a></h2>

<p>
remove コマンドは、 'dpkg --remove' を呼び出してシステムからパッケージを削除します。
現在はまだ問題が残っていて、依存性は dpkg ツールに完全に任せています (通常は問題になりませんが)。
</p>
<p>
<b>remove</b> コマンドは実際のパッケージファイル (設定ファイルは除く) を削除するだけですが、 <code>.deb</code> 圧縮パッケージファイルはそのままにします。
これは、後で再インストールする際にコンパイルしなくても良いことを意味します。
ディスク容量が必要であれば、 <code>/sw/fink/dists</code> ツリーから <code>.deb</code> ファイルを取り除いてもかまいません。
</p>
<p><b>fink remove</b> 時に、以下のフラグを使用することができます。</p>
<pre>-h,--help             使用できるオプションを表示
-r,--recursive        当該パッケージに依存するパッケージを削除
                         (上述の問題を解決します)</pre>
<p>エイリアス: <b>disable, deactivate, unuse, delete</b>.</p>

<h2><a name="purge">6.5 purge</a></h2>

<p>
<b>purge</b> コマンドは、システムからパッケージを削除します。
<b>remove</b> コマンドとの違いは、こちらは設定ファイルも削除します。
</p>

<h2><a name="update-all">6.6 update-all</a></h2>

<p>
このコマンドは、全てのインストール済パッケージを最新バージョンに更新します。
パッケージ一覧は必要ないので、入力するだけです:
</p>
<pre>fink update-all</pre>
<p>
<a href="#options">--use-binary-dist option</a> はここでも使用することができます。
</p>

<h2><a name="list">6.7 list</a></h2>

<p>
このコマンドは、パッケージ一覧を作成し、インストール状況、最新バージョン、短い説明を表示します。
引数なしでこれを呼んだ場合、全てのパッケージが表示されます。
パッケージ名やシェルパターンを用いて、マッチするパッケージだけ表示することもできます。
</p>
<p>
最初の列はインストール状況を表し、その意味は以下の通り:
</p>
<pre>    未インストール
 i   最新バージョンがインストール済
(i)  インストール済だが最新バージョンではない
 p   インストールされたパッケージにより提供されたバーチャルパッケージ</pre>
      <p>
        バージョン列は、常にパッケージで知られている最新 (最高) のバージョンを表示します。
        これは、インストールされているバージョンとは関係ありません。
        入手可能な全てのバージョンを知りたい場合は、 <a href="#dumpinfo">dumpinfo</a> を実行します。
      </p>
<p>
<code>fink list</code> コマンドにはフラグがあります:
</p>
<pre>
-h,--help
	  利用可能なオプションを表示。
-t,--tab
	  一覧をタブ区切り形式で出力。
	  出力をスクリプトで処理する時に有効。
-i,--installed
	  インストール済パッケージのみ表示。
-o,--outdated
	  古いパッケージのみ表示。
-u,--uptodate
	  最新のパッケージのみ表示。
-n,--notinstalled
	  未インストールパッケージのみ表示。
-s expr,--section=expr
	  正規表現 expr にマッチするセクションのパッケージのみ表示。
-m expr,--maintainer=expr
	  正規表現 expr にマッチするメンテナによるパッケージのみ表示
-t expr,--tree=expr
	  正規表現 expr にマッチするツリ−内にあるパッケージのみ表示
-w=xyz,--width=xyz.
	  出力形式の幅を設定する。
	  xyz は数値か auto 。
	  auto はターミナル幅に応じて設定される。
	  デフォルトは auto 。
</pre>
<p>
例:
</p>
<pre>
fink list                 - 全てのパッケージを表示。
fink list bash            - bash があるか、どのバージョンか表示。
fink list --outdated      - 古いパッケージのみ表示。
fink list --section=kde   - kde セクションのパッケージのみ表示。
fink list "gnome*"         - 'gnome' から始まるパッケージのみ表示。
</pre>
<p>
最後の例のクォーテーションは、シェルが解釈しないように必要です。
</p>

<h2><a name="apropos">6.8 apropos</a></h2>

<p>
このコマンドはほとんど <a href="#list">fink list</a>&gt; と同じです。
一番顕著な違いは、 <code>fink apropos</code> がパッケージの検索にパッケージ記述を使うことです。
次に顕著なのは、検索文字列が必須で、オプションではないことです。
</p>
<pre>
fink apropos irc          - 名称か詳細に 'irc' が含まれるパッケージを表示。
fink apropos -s=kde irc   - 上と同様。ただし、 kde セクションに限定。
</pre>

<h2><a name="describe">6.9 describe</a></h2>

<p>
このコマンドは、指定したパッケージの詳細を表示します。
現時点では詳細があるパッケージはまだ少ないので注意して下さい。
</p>
<p>
エイリアス: <b>desc, description, info</b>
</p>

	
    <h2><a name="plugins">6.10 plugins</a></h2>
      
      <p> List the (optional) plugins available to the <code>fink</code> program.  Currently lists the notification mechanisms and the source-tarball
           checksum algorithms.</p>
    
	
<h2><a name="fetch">6.11 fetch</a></h2>

<p>指定したパッケージをダウンロードしますが、インストールはしません。
このコマンドは、以前ダウンロードしたかどうかに関わらず tarball をダウンロードします。</p>
      <p><code>fink fetch</code> コマンドには以下のフラグが使用できます:</p>
<pre>-h,--help		使用できるオプションを表示します。
-i,--ignore-restrictive	&amp;quot;License: Restrictive&amp;quot; なパッケージは fetch しません。
                      	制限には、ミラーを許可しないという制限もありますので、
                      	ミラー時に役に立ちます。
-d,--dry-run		パッケージ用にダウンロードするファイルの情報を表示するだけで、
			実際にはダウンロードしません。
-r,--recursive		fetch するパッケージの依存するパッケージも fetch します。</pre>

<h2><a name="fetch-all">6.12 fetch-all</a></h2>

<p>
<b>全ての</b>パッケージソースファイルをダウンロードします。
<a href="#fetch">fetch</a> と同様、以前ダウンロードしたかどうかに関わらず tarball をダウンロードします。
</p>
<p><code>fink fetch-all</code> コマンドには以下のフラグが使用できます:</p>
<pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>

<h2><a name="fetch-missing">6.13 fetch-missing</a></h2>

<p>
ローカルに存在しない<b>全ての</b>パッケージソースファイルをダウンロードします。
このコマンドは、システム上に無いパッケージのみダウンロードします。</p>
<p><code>fink fetch-missing</code> コマンドには以下のフラグが使用できます:</p>
<pre>-h,--help
-i,--ignore-restrictive</pre>

<h2><a name="build">6.14 build</a></h2>

<p>
パッケージをビルドしますが、インストールはしません。
ソース tarball は、なければダウンロードされます。
この結果、インストールできる .deb パッケージファイルを作成します。
すでに .deb ファイルがある場合は何もしません。
依存パッケージは、ビルドだけではなく、<b>インストールされます</b>ので注意して下さい。
</p>
<p>
<a href="#options">--use-binary-dist option</a> はここでも使用することができます。
</p>

<h2><a name="rebuild">6.15 rebuild</a></h2>

<p>パッケージをビルドします (build コマンドと同様に) が、すでにある .deb ファイルは無視し、上書きします。
パッケージがインストールされたら、新しい .deb ファイルは <code>dpkg</code> を用いてインストールされます。
パッケージの開発中にはとても役に立ちます。
</p>

<h2><a name="reinstall">6.16 reinstall</a></h2>

<p>
インストールと同様ですが、インストールされていても <code>dpkg </code>を通してインストールします。
これは、誤ってパッケージファイルを消したり、設定ファイルを変えてデフォルトに戻したい場合などにも使えます。
</p>

<h2><a name="configure">6.17 configure</a></h2>

<p>
<code>fink</code> を再設定します。
ミラーサイトの設定やプロキシの設定も行なうことができます。
</p>
	  
      <p><b>New in</b> <code>fink-0.26.0</code>: This command will also let you turn on the unstable trees if desired.</p>
      

<h2><a name="selfupdate">6.18 selfupdate</a></h2>

<p>
このコマンドは、自動的に Fink の新リリースにアップグレードします。
Fink のウェブサイトへ新しいバージョンがあるか確認し、 <code>fink</code> 自体を含めたコアパッケージを更新します。
各種リリースのアップグレードの他、このコマンドを初めて実行した際に CVS または rsync を選択した場合、<code>/sw/fink/dists</code> を、直接 CVS または rsync でアップグレードすることもできます。
これを行なうと、全てのパッケージの最新版へアクセスできるようになります。
</p>
<p>
<a href="#options">--use-binary-dist option</a> を使用すると、バイナリディストリビューション中の一覧も更新されます。
</p>

    <h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>
      
      <p>
        このコマンドを使うことで、<code>fink selfupdate</code> 時にパッケージ一覧の更新に rsync を使用します。
      </p>
      <p>
        Fink をソースからのビルドで更新する場合、こちらの方法を推奨します。
      </p>
      <p>
        <b>注記:</b> rsync 更新は、使用中の<a href="conf.php?phpLang=ja#optional">ツリー</a>を更新するだけです
        (例えば、 unstable が <code>fink.conf</code> で設定されていない場合、unstable パッケージは更新されません)
      </p>
    
<h2><a name="index">6.20 index</a></h2>

<p>
パッケージキャッシュを再構築します。
通常は <code>fink</code> が更新の必要に応じて自動検出するので、手動で行なう必要はありません。
</p>

<h2><a name="validate">6.21 validate</a></h2>

<p>
このコマンドは、 .info と .deb ファイルについていくつかの評価を行ないます。
パッケージメンテナは、 submit する前にパッケージ記述と対応するパッケージに対して実行して下さい。
</p>
<p>以下のフラグが使用できます:</p>
<pre>-h,--help            - 使用できるオプションを表示
-p,--prefix          - 評価対象ファイルの Fink 基本パスのプリフィックス (%p) をシミュレートする
--pedantic, --no-pedantic
                     - 形式に関する警告の表示を制御します
                      --pedantic が規定値</pre>
<p>
エイリアス: <b>check</b>
</p>

<h2><a name="scanpackages">6.22 scanpackages</a></h2>

      
      <p>Updates the <code>apt-get</code> database of debs; defaults to updating all of the trees, but may be restricted to a set of one or more trees given as arguments.</p>
      

<h2><a name="cleanup">6.23 cleanup</a></h2>

      
      <p>
   Removes obsolete and temporary files. 
   This can reclaim large amounts of disk space.  One or more modes may be specified:</p>
      <pre>--debs               - Delete .deb files (compiled binary package archives)
                       corresponding to versions of packages that are neither
                       described by a package description (.info) file in the
                       currently-active trees nor presently installed.
--sources,--srcs     - Delete sources (tarballs, etc.) that are not used by
                       any package description (.info) file in the currently-
                       active trees.
--buildlocks, --bl   - Delete stale buildlock packages.
--dpkg-status        - Remove entries for packages that are not installed from
                       the dpkg "status" database.
--obsolete-packages  - Attempt to uninstall all installed packges that are
                       obsolete. (new in fink-0.26.0)
--all                - All of the above modes. (new in fink-0.26.0)</pre>
      <p>If no mode is specified, <code>--debs --sources</code> is the default action. </p>
      <p>In addition, the following options may be used:</p>
      <pre>-k,--keep-src        - Move old source files to /sw/src/old/ instead of deleting them.
-d,--dry-run         - Print the names of the files that would be deleted, but
                       do not actually delete them.
-h,--help            - Show the modes and options which are available.</pre>
    

    <h2><a name="dumpinfo">6.24 dumpinfo</a></h2>
      
      <p>
	  注記: 0.21.0 以降の <code>fink</code> で有効。
	  </p>
	  <p>
	<code>fink</code> がどのようにパッケージの <code>.info</code> ファイルを構文解析するかを表示します。
	以下の<b>オプション引数</b>に応じて、各種フィールドとパーセント展開も表示されます。
      </p>
      <pre>
-h, --help           - Show the options which are available.
-a, --all            - Display all fields from the package description.
                       This is the default mode when no --field or
                       --percent flags are given.
-f fieldname,        - Display the given fieldname(s),
  --field=fieldname    in the order listed.
-p key,              - Display the given percent expansion key(s),
   --percent=key       in the order listed.
      </pre>
    
    <h2><a name="show-deps">6.25 show-deps</a></h2>
      
      <p>fink-0.23-6 および以降。</p>
      <p>
      	コンパイル時 (ビルド) と実行時 (インストール) の依存するパッケージを人間が読める一形式で表示する。
      </p>
    

<? include_once "../../footer.inc"; ?>


