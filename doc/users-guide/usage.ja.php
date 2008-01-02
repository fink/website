<?
$title = "ユーザーガイド - fink ツール";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2007/07/21 00:06:38';
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
      <p><b>-h, --help</b> - ヘルプテキストを表示します。</p>
      <p><b>-q, --quiet</b>  - <code>fink</code> を若干静かにさせます。
      反対は <b>--verbose</b>。<code>fink.conf</code> 中の <a href="conf.php?phpLang=ja#optional">Verbose</a> フラグを無視します。 </p>
      <p><b>-V, --version</b> - バージョン情報を表示します。</p>
      <p><b>-v, --verbose</b> - <code>fink</code> をウルサくさせます。
      反対は <b>--verbose</b>。<code>fink.conf</code> 中の <a href="conf.php?phpLang=ja#optional">Verbose</a> フラグを無視します。 </p>
      <p><b>-y, --yes</b> - 全ての質問に自動的に既定のオプションを適用します。</p>
      <p><b>-K, --keep-root-dir</b>   - 
                <code>fink</code> は、パッケージをビルド後に <a href="conf.php?phpLang=ja#optional">Buildpath</a> 中の <code>root-[name]-[version]-[revision]</code>
		        を削除せずに残します。 
		        <code>fink.conf</code> 内の <a href="conf.php?phpLang=ja#developer">KeepRootDir</a> フィールドに対応します。</p>
      <p><b>-k, --keep-build-dir</b>  - 
                <code>fink</code> は、パッケージをビルド後に <a href="conf.php?phpLang=ja#optional">Buildpath</a> 中の <code>[name]-[version]-[revision]</code>
		        を削除せずに残します。 
		        <code>fink.conf</code> 内の <a href="conf.php?phpLang=ja#developer">KeepBuildDir</a> フィールドに対応します。</p>
      <p><b>-b, --use-binary-dist</b> - 
    		    存在する場合、（時間とスペースを削減するために）
    		    バイナリディストリビュションからコンパイル済みパッケージをダウンロードします。
                このモードは、fink に特定のバージョンをダウンロードするよう指示します。
                バイナリが入手可能なバージョンを fink に選択させる訳ではありません。
		        <code>fink.conf</code> 内の <a href="conf.php?phpLang=ja#downloading">UseBinaryDist</a> フラグに対応します。</p>
      <p><b>--no-use-binary-dist</b>  - 
		        バイナリディストリビュションからコンパイル済みパッケージを使用しません。
		        --use-binary-dist フラグと逆です。
		        <code>fink.conf</code> 内の <a href="conf.php?phpLang=ja#downloading">UseBinaryDist: true</a> がない限り既定のアクションです。</p>
      <p><b>--build-as-nobody</b> - 
		        root でないユーザーになり、unpack, patch, compile, and install
		        を行います。このオプションでできたパッケージは機能しない可能性があります。
		        パッケージ開発およびデバッグ用途にのみご使用ください。</p>
      <p><b>-m, --maintainer</b> - 
                (<code>fink-0.25</code> 以降)
                以下に示すようにパッケージメンテナ用のアクションを行います:
                ビルド前に <code>.info</code> を validate、
                ビルド後に <code>.deb</code> を validate;
                ある種のビルド時エラーを fatal error にする;
                (<code>fink-0.26</code> 以降) フィールドで指定されたテストスイートの実行。
                これは、<b>--tests</b> と <b>--validate</b> を <code>on</code> にします。</p>
      <p><b>--tests[=on|off|warn]</b>
                (<code>fink-0.26.0</code> 以降)
                <code>InfoTest</code> を有効にし、 <code>TestScript</code> にて指定されたテストスイートを実行します
                (<a href="../packaging/reference.php#fields">Fink パッケージかマニュアル</a> を参照)。
                このオプションに引数が与えられないか<code>on</code> の場合、
                ビルド時のテストスイートの失敗は fatal error 扱いになります。
                引数が <code>warn</code> であれば、失敗は warning として扱われます。</p>
      <p><b>--validate[=on|off|warn]</b> -
                ビルド時にパッケージを validate します。
                このオプションに引数が与えられないか <code>on</code> の場合、
                ビルド時の validate の失敗は fatal error 扱いになります。
                引数が <code>warn</code> であれば、失敗は warning として扱われます。</p>
      <p><b>-l, --log-output</b> - 
                それぞれのパッケージをビルド際のターミナル出力を保存します。
                既定では、ファイルは <code>/tmp/fink-build-log_[name]-[version]-[revision]_[date]-[time]</code> に保存されますが、
                <b>--logfile</b> でファイル名を指定することができます。</p>
      <p><b>--no-log-output</b> - 
                <b>--log-output</b> フラグとは反対に、パッケージビルド時に出力を保存しません。
                こちらが既定値です。</p>
      <p><b>--logfile=filename</b> - 
                パッケージのビルドログを、既定ファイルの代わりに <code>filename</code> に保存します
                (<b>--log-output</b> を参照、このフラグも自動的に設定されます)。
                特定のパッケージ情報を含めるためパーセント展開を使うこともできます。
                パーセント展開の一覧は<a href="../packaging">Fink パッケージ化マニュアル</a> を参照してください。
                よく用いられるパーセント展開は:</p>
      <ul>
        <li><b>%n</b>    - package name</li>
        <li><b>%v</b>    - package version</li>
        <li><b>%r</b>    - package revision</li>
      </ul>
      <p><b>-t, --trees=expr</b> - 
                <b>expr</b> にマッチするツリーのパッケージのみ対象にします。
                expr の形式は、コンマ区切りのツリーリストです。
                <code>fink.conf</code> にあるツリー名称と <b>expr</b> を比較します。
                <code>fink</code> は、ここでマッチしたツリーのみを対象にします。
                <b>--trees</b> オプションが指定されない場合、<code>fink.conf</code> にあるツリーを、その順序で使用します。
                
                ツリー名称は、スラッシュ (/) を含むこともあります。
                この場合、対象のツリーの名称と正確にマッチする必要があります。
                あるいは、ツリーの最初に一致するパスのみになります。
                例えば、<b>--trees=unstable/main</b> は <b>unstable/main</b> ツリーにマッチし、
                <b>--trees=unstable</b> は unstable/main と
                <b>unstable/crypto</b> にマッチします。
                
                <b>expr</b> で使うことのできる魔法のツリー名称は以下の通り:</p>
      <ul>
        <li><b>status</b> - dpkg status データベースにあるパッケージを含む。</li>
        <li><b>virtual</b> - システムにある virtual パッケージを含む。</li>
      </ul>
      <p>現在のところ、この魔法のツリーの含まない（あるいは含めない）のは、install か remove のみ対応しています。</p>
      <p><b>-T, --exclude-trees=expr</b>
                expr にマッチしないパッケージのみ対象にします。
                expr の形式は <b>--trees</b> と同じで、魔法のツリーの名称も同じです。
                <b>--trees</b> と <b>--exclude-trees</b> の双方にマッチする場合は、除かれますので、ご注意ください。</p>
      <p><b>--trees</b> と --exclude-trees の例:</p>
      <ul>
        <li><code>fink --trees=stable,virtual,status install <b>foo</b></code> 
                <p><code>fink.conf</code> に unstable があっても、stable ツリーの <b>foo</b> をインストールします。</p></li>
        <li><code>fink --exclude-trees=local install <b>foo</b></code> 
                 <p>local にて作業しているバージョンではなく、 Fink の <b>foo</b> をインストールします。</p></li>
        <li><code>fink --trees=local/main list -i</code>
                 <p>local で編集し、インストールしたものを一覧表示します。</p></li>
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
<pre>     未インストール
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
fink list --tab --outdated | cut -f 2     
                          - 古いパッケージのみ表示。
fink list --section=kde   - kde セクションのパッケージのみ表示。
fink --trees=unstable list --maintainer=fink-devel
                          - unstable ツリー中の、メンテナ不在のパッケージを表示。
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
      
      <p><code>fink</code> で使用することのできるプラグインを一覧表示する。
      現在のところ、告知メカニズムとソース tarball チェックサムアルゴリズムのみ。</p>
    
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
      <p><code>fink-0.26.0</code> <b>にて登場</b>: 希望する場合、 unstable 釣り−を有効にします。</p>

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

      <p>debs の <code>apt-get</code> データベースを更新します。
      既定では全てのツリーを更新しますが、引数を与えることでツリーを制限することもできます。</p>

<h2><a name="cleanup">6.23 cleanup</a></h2>

      <p>古いファイルと一時ファイルを削除します。
      これにより、ディスクスペースが大幅に使えるようになります。
      以下のモードを指定することができます:</p>
      <pre>
--debs               - 現在有効なツリー、あるいは既にインストールされているどのパッケージの
                       記述ファイル (.info) にもないバージョンのパッケージに対応する .deb
                       ファイル（コンパイル済みバイナリパッケージアーカイブ）を削除します。
--sources,--srcs     - 現在有効なツリー中にあるどのパッケージ記述ファイル (.info) にも使用され
　　　　　　　　　　　　　　　ていないファイルを削除します。
--buildlocks, --bl   - 腐った buildlock パッケージを削除します。
--dpkg-status        - dpkg "status" データベース以外からインストールされたパッケージを削除。
--obsolete-packages  - 全ての古いパッケージを削除するよう試みます。(fink-0.26.0 にて登場)
--all                - 全てのモード。 (fink-0.26.0 にて登場)
</pre>
      <p>モードが指定されていない場合、<code>--debs --sources</code> が既定のオプションとなります。</p>
      <p>これらに加え、以下のオプションも使うことができます:</p>
      <pre>
-k,--keep-src        - 古いソースファイルを、削除するのではなく /sw/src/old/ に移します。
-d,--dry-run         - 削除対象のファイルを一覧表示し、実際には削除しません。
-h,--help            - 使用可能なモードとオプションを表示します。</pre>

    <h2><a name="dumpinfo">6.24 dumpinfo</a></h2>
      
      <p>
	  注記: 0.21.0 以降の <code>fink</code> で有効。
	  </p>
	  <p>
	<code>fink</code> がどのようにパッケージの <code>.info</code> ファイルを構文解析するかを表示します。
	以下の<b>オプション引数</b>に応じて、各種フィールドとパーセント展開も表示されます。
      </p>
      <pre>
-h, --help           - 利用可能なオプションを一覧表示します。
-a, --all            - パッケージ記述にある全てのフィールドを表示します。これは、
                       --field または --perfect フラグが与えらない場合の
                       既定モードとなります。
-f fieldname,        - 与えられたフィールドの値を、与えられた順序に従って表示します。
  --field=fieldname
-p key,              - 与えられたパーセント展開キーの値を、与えられた順序に従って表示します。
   --percent=key
</pre>
    
    <h2><a name="show-deps">6.25 show-deps</a></h2>
      
      <p>fink-0.23-6 および以降。</p>
      <p>
      	コンパイル時 (ビルド) と実行時 (インストール) の依存するパッケージを人間が読める一形式で表示する。
      </p>
    

<? include_once "../../footer.inc"; ?>


