<?
$title = "ユーザーガイド - fink ツール";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/11/04 02:09:30';
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
<pre>
 -h, --help            - このヘルプテキストを表示
 -q, --quiet           - fink をやかましくなくさせます --verboseの反対
 -V, --version         - バージョン情報を表示
 -v, --verbose         - fink をやかましくなくさせます --quietの反対
 -y, --yes             - 全ての質問にデフォルト値を自動的に回答
 -b, --use-binary-dist - コンパイル済みバイナリがあれば、それを使用
</pre>
<p>(訳注: 利便性のためここでは訳しましたが、実際は英語で出力されます)</p>
<p>
ほとんどのオプションは名前から内容が推測できると思います。
一回限りではなく、常に使用したいオプションは
<a href="conf.php?phpLang=ja">Fink 設定ファイル</a> (fink.conf)
で設定することができます。
</p>
<p>
<code>--use-binary-dist</code> を使用すると， <code>fink</code> は
コンパイル済みバイナリがあり、システムにインストールされていない場合、バイナリ版をダウンロードしようとします
(<code>fink</code> バージョン 0.23.0 以降で有効)。
</p>

<h2><a name="install">6.3 install</a></h2>

<p>install コマンドは、パッケージをインストールするのに使用します。
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
<a href="#options">--use-binary-dist</a> を使用すると， <code>fink</code> to try to
コンパイル済みバイナリがあり、システムにインストールされていない場合、バイナリ版をダウンロードします。
これにより時間を節約することができます。
</p>
<p>install コマンドのエイリアス: update, enable, activate, use (ほとんどは歴史的な理由による).
</p>

<h2><a name="remove">6.4 remove</a></h2>

<p>
remove コマンドは、 'dpkg --remove' を呼び出してシステムからパッケージを削除します。
現在はまだ問題が残っていて、 <code>fink</code> ツールが認識している (.info ファイルが存在する) パッケージだけ処理することができ、依存性は dpkg ツールに完全に任せています (たいていこれで問題はありませんが)。
</p>
<p>
remove コマンドは実際のパッケージファイルを削除するだけですが、 .deb 圧縮パッケージファイルはそのままにします。
これは、後で再インストールする際にコンパイルしなくても良いことを意味します。
ディスク容量が必要であれば、 <code>/sw/fink/dists</code> ツリーから .deb ファイルを取り除いてもかまいません。
</p>
<p>エイリアス: disable, deactivate, unuse, delete.</p>

<h2><a name="update-all">6.5 update-all</a></h2>

<p>
このコマンドは、全てのインストール済パッケージを最新バージョンに更新します。
パッケージ一覧は必要ないので、入力するだけです:
</p>
<pre>fink update-all</pre>
<p>
<a href="#options">--use-binary-dist option</a> はここでも使用することができます。
</p>

<h2><a name="list">6.6 list</a></h2>

<p>
このコマンドは、パッケージ一覧を作成し、インストール状況、最新バージョン、短い説明を表示します。
引数なしでこれを呼んだ場合、全てのパッケージが表示されます。
パッケージ名やシェルパターンを用いて、マッチするパッケージだけ表示することもできます。
</p>
<p>
最初の列はインストール状況を表し、その意味は以下の通り:
</p>
<pre>
     未インストール
 i   最新バージョンがインストール済
(i)  インストール済だが最新バージョンではない
</pre>
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
-s=expr,--section=expr
	  正規表現 expr にマッチするセクションのパッケージのみ表示。
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

<h2><a name="apropos">6.7 apropos</a></h2>

<p>
このコマンドはほとんど <code>fink list</code> と同じです。
一番顕著な違いは、 <code>fink apropos</code> がパッケージの検索にパッケージ記述を使うことです。
次に顕著なのは、検索文字列が必須で、オプションではないことです。
</p>
<pre>
fink apropos irc          - 名称か詳細に 'irc' が含まれるパッケージを表示。
fink apropos -s=kde irc   - 上と同様。ただし、 kde セクションに限定。
</pre>

<h2><a name="describe">6.8 describe</a></h2>

<p>
このコマンドは、指定したパッケージの詳細を表示します。
現時点では詳細があるパッケージはまだ少ないので注意して下さい。
</p>
<p>
エイリアス: desc, description, info
</p>

<h2><a name="fetch">6.9 fetch</a></h2>

<p>指定したパッケージをダウンロードしますが、インストールはしません。
このコマンドは、以前ダウンロードしたかどうかに関わらず tarball をダウンロードします。</p>

<h2><a name="fetch-all">6.10 fetch-all</a></h2>

<p>
<b>全ての</b>パッケージソースファイルをダウンロードします。
fetch と同様、以前ダウンロードしたかどうかに関わらず tarball をダウンロードします。
</p>

<h2><a name="fetch-missing">6.11 fetch-missing</a></h2>

<p>
ローカルに存在しない<b>全ての</b>パッケージソースファイルをダウンロードします。
このコマンドは、システム上に無いパッケージのみダウンロードします。</p>

<h2><a name="build">6.12 build</a></h2>

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

<h2><a name="rebuild">6.13 rebuild</a></h2>

<p>パッケージをビルドします (build コマンドと同様に) が、すでにある .deb ファイルは無視し、上書きします。
パッケージがインストールされたら、新しい .deb ファイルは <code>dpkg</code> を用いてインストールされます。
パッケージの開発中にはとても役に立ちます。
</p>
<p>
<a href="#options">--use-binary-dist option</a> はここでも使用することができます。
</p>

<h2><a name="reinstall">6.14 reinstall</a></h2>

<p>
インストールと同様ですが、インストールされていても <code>dpkg </code>を通してインストールします。
これは、誤ってパッケージファイルを消したり、設定ファイルを変えてデフォルトに戻したい場合などにも使えます。
</p>

<h2><a name="configure">6.15 configure</a></h2>

<p>
Fink を再設定します。
ミラーサイトの設定やプロキシの設定も行なうことができます。
</p>

<h2><a name="selfupdate">6.16 selfupdate</a></h2>

<p>
このコマンドは、自動的に Fink の新リリースにアップグレードします。
Fink のウェブサイトへ新しいバージョンがあるか確認し、 <code>fink</code> 自身を含めたコアパッケージを更新します。
通常リリースの他、 <code>/sw/fink/dists</code> を設定して直接 CVS アップデートすることもできます。
これを行なうと、全てのパッケージの最新版へアクセスできるようになります。
</p>
<p>
<a href="#options">--use-binary-dist option</a> を使用すると、バイナリディストリビューション中の一覧も更新されます。
</p>

<h2><a name="index">6.17 index</a></h2>

<p>
パッケージキャッシュを再構築します。
通常は <code>fink</code> が更新の必要に応じて自動検出するので、手動で行なう必要はありません。
</p>

<h2><a name="validate">6.18 validate</a></h2>

<p>
このコマンドは、 .info と .deb ファイルについていくつかチェックを行ないます。
パッケージメンテナーは、 submit する前にパッケージ記述と対応するパッケージに対して実行して下さい。
</p>
<p>
エイリアス: check
</p>

<h2><a name="scanpackages">6.19 scanpackages</a></h2>

<p>
指定したツリーに対し、 dpkg-scanpackages(8) を呼び出します。
</p>

<h2><a name="cleanup">6.20 cleanup</a></h2>

<p>
新しいバージョンがある場合、古いパッケージファイル (.info, .patch, .deb) を削除します。
かなりのディスク容量が利用できるようになります。
</p>
<p>
<a href="#options">--use-binary-dist option</a> を使用すると，古いバイナリパッケージも削除されます。
</p>

    <h2><a name="dumpinfo">6.21 dumpinfo</a></h2>
      
      <p>
	  注記: 0.21.0 以降の <code>fink</code> で有効。
	  </p>
	  <p>
	Fink がどのようにパッケージの .info ファイルを構文解析するかを表示します。
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
    

<? include_once "../../footer.inc"; ?>


