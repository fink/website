<?
$title = "ユーザーガイド - パッケージ";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/04/16 21:24:54';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="ユーザーガイド Contents"><link rel="next" href="upgrade.php?phpLang=ja" title="Fink のアップグレード"><link rel="prev" href="install.php?phpLang=ja" title="初めてのインストール">';

include_once "header.inc";
?>

<h1>ユーザーガイド - 3 パッケージのインストール</h1>



<p>
この時点で、 Fink というものがインストールされました。
この章では実際に、好きなソフトウェアパッケージをインストールする方法を解説します。
パッケージのインストールを説明する前に、ソースとバイナリディストリビューションの両方に当てはまる重要事項を説明します。
</p>

<h2><a name="bin-dselect">3.1 dselect によるバイナリパッケージのインストール</a></h2>

<p>
<code>dselect</code> は、入手可能なパッケージの一覧を表示し、インストールするものを選択できるプログラムです。
これはターミナル.app 内で動作しますが、 "スクリーン" 全体を簡単なキーボードナビゲーションで使います。
他のパッケージ管理ツールと同様、 <code>dselect</code> はルート権限を必要とするので、sudo を使い:
</p>
<pre>sudo dselect</pre>
<p>
とします。
<b>注記：</b>
<code>dselect</code> は Mac OS X ターミナル上では問題があります。
これを避けるには以下のコマンドを先に実行するか、起動ファイル (例 <code>.cshrc</code> | <code>.profile</code>) に書いておく必要があります。
</p>
<p>tcsh の場合:</p>
<pre>setenv TERM xterm-color</pre>
<p>bash の場合:</p>
<pre>export TERM=xterm-color</pre>
<p>メインメニューは:</p>
<ul>
<li>
<p>
<b>[A]ccess</b> - 使用するネットワークのアクセス手段を設定します。
<b>これを実行する必要はありません</b>。
Fink があらかじめ全てを設定します。
これを選択すると、デフォルトの設定を使えない設定に書き換えるおそれがあるので、使用は避けて下さい。
</p>
</li>
<li>
<p>
<b>[U]pdate</b> - パッケージ一覧を Fink サイトからダウンロードします、
パッケージをインストールや更新することはありません。
パッケージブラウザが使用する一覧を更新するだけです。
Fink をインストール後、最低一回は実行して下さい。
</p>
</li>
<li>
<p>
<b>[S]elect</b> - 選択、非選択可能なパッケージ一覧を表示します。
詳細は後に書かれています。
</p>
</li>
<li>
<p>
<b>[I]nstall</b> - これが実際にインストールします。
上のメニュー項目は dselect のパッケージ一覧とステータスデータベースを書き換えるだけでしたが、これは実際に選択されたパッケージのダウンロードとインストールをします。
それだけではなく、非選択したパッケージを取り除くこともします。
</p>
</li>
<li>
<p>
<b>[C]onfig</b> と <b>[R]emove</b> - これらは apt 以前からの遺物です。
使う必要はなく、害もありません。
</p>
</li>
<li>
<p>
<b>[Q]uit</b> - 説明の必要はないでしょう。
</p>
</li>
</ul>
<p>
実際は、"[S]elect" メニュー項目を選択後、パッケージブラウザ内にいることが多いでしょう。
パッケージ一覧を表示する前に dselect はヘルプ画面を表示します。
'k' キーを押すとキーボードコマンドの一覧が表示され、スペースキーでパッケージ一覧が表示されます。
</p>
<p>
一覧の中では、上と下のキーで移動します。
選択は、 '+' と '-' でします。
他のパッケージに依存するパッケージを選択した場合、 dselect は影響するパッケージのサブリストを表示します。
ほとんどの場合、リターンキーを押すだけで dselect に従えば大丈夫ですが、サブリスト内で変更もできます (例、バーチャルパッケージ依存のため他を選択する)。
あるいは、 'R' (Shift-R) を押して元の状態に戻せば、サブリストとパッケージ一覧はそのままです。
選択が終了したなら、一覧から出て "[I]nstall" を選択し、実際にパッケージをインストールします。
</p>

<h2><a name="bin-apt">3.2 apt-get を使ったバイナリインストール</a></h2>

<p>
<code>dselect</code> は実際にはパッケージをダウンロードせず、 apt を実行します。
コマンドラインでの作業がしたい場合、 <code>apt-get</code> コマンドを使って apt の機能を直接実行することができます。
</p>
<p>
dselect のと同じく、まずパッケージ一覧をダウンロードします:
</p>
<pre>sudo apt-get update</pre>
<p>
dselect の "[U]pdate" メニュー項目と同じく、コンピュータ上のファイルではなく、パッケージ一覧を更新するだけです。
パッケージをインストールするには、 apt-get に名前を渡します:
</p>
<pre>sudo apt-get install lynx</pre>
<p>
パッケージが他のパッケージのインストールを必要としていると判断した場合、リストを表示して確認をとります。
その後、パッケージをダウンロード、インストールします。
パッケージを取り除くのも簡単です:
</p>
<pre>sudo apt-get remove lynx</pre>
<p>
</p>

<h2><a name="bin-exceptions">3.3 バイナリディストリビューションにない依存パッケージのインストール</a></h2>

<p>バイナリインストールをしている時、依存しているパッケージがインストールできないというメッセージがでることがあります。例えば:</p>
<pre>Sorry, but the following packages have unmet
dependencies:
foo: Depends: bar (&gt;= version) but it is
not installable
E: Sorry, broken packages</pre>
<p>何が起こったかというと、インストールしようとしているパッケージが、ライセンス上バイナリとして配布されない他のパッケージに依存しているのです。
この場合、ソースからインストールして下さい (次の節を参照)。
</p>

<h2><a name="src">3.4 ソースからのパッケージインストール</a></h2>

<p>まず、適切なバージョンの Development Tools が必要となります。
<a href="http://connect.apple.com">http://connect.apple.com</a>
から入手して下さい。
</p>
<p>
ソースからインストールできるパッケージの一覧を取得するには、 <code>fink</code> ツールに聞きます:
</p>
<pre>fink list</pre>
<p>
最初の列はインストール状態 (空白は未インストール, <code>i</code> はインストール済, <code>(i)</code> はインストール済だが最新ではない) を示します。
次がパッケージ名、最新バージョン、短い説明です。
特定パッケージの詳細を見るには、"describe" コマンド ("info" はエイリアスです) を使います:
</p>
<pre>fink describe xmms</pre>
<p>
インストールしたいパッケージが見つかったら、 "install" コマンドを使います:
</p>
<pre>fink install wget-ssl</pre>
<p>
<code>fink</code> コマンドは最初に必要なもの ("依存性") があるか確認し、無いものがあればインストールしていいか聞いてきます。
次に、ソースコードをダウンロード、解凍、パッチ当て、コンパイル、インストールをします。
この作業は時間がかかります。
この作業中にエラーが発生した場合、まず <a href="http://fink.sourceforge.net/faq/">FAQ</a> を確認して下さい。
</p>

<h2><a name="fink-commander">3.5 Fink Commander</a></h2> 
 
<p>
Fink Commander は <code>apt-get</code> と <code>fink</code> の Aqua インターフェイスです。
Binary メニューはバイナリディストリビューションの、 Source メニューはソースディストリビューションの操作を行います。
</p> 
<p>
Fink Commander は Fink バイナリインストーラに付属しています。
Fink をソースからインストールした場合など、別にダウンロードしたい場合や詳しい情報は、
<a href="http://finkcommander.sourceforge.net%20">Fink Commander website</a> リンクを辿って下さい。
</p> 
 
<h2><a name="">3.6 用意されているバージョン</a></h2>

<p>パッケージをインストールする場合、まず<a href="http://fink.sourceforge.net/pdb/index.php">Package Database</a>を確認して Fink にあるかどうか確認して下さい。
用意されているバージョンは次の行に書かれてあります:</p>
<ul>
<li>
<p>
<b>0.4.1-stable:</b> OS 10.1 でバイナリインストールできる最新バージョン</p>
</li>
<li>
<p>
<b>0.7.0:</b> これは OS 10.3 と 10.2 向けのバイナリインストールできる基本バージョン。
Fink を <a href="http://fink.sourceforge.net/doc/users-guide/upgrade.php">アップグレード</a>  した場合、これより新しいバージョンの場合もある。
</p>
</li>
<li>
<p>
<b>10.2-gcc3.3 stable:</b> これはソースから <code>gcc 3.3</code> でインストールできる OS 10.2 向け最新バージョン。
このバージョンをインストールできるようにするには、 <a href="http://fink.sourceforge.net/doc/cvsaccess/index.php">CVS </a> または rsync アクセスを有効にする必要がある。
もし <code>gcc 3.3</code> に更新していない場合、このバージョン (あるいはパッケージ自体) が表示されない可能性がある。
</p>
<p>
注意: 他のプロジェクトの場合とは異なり、 Fink は最新の安定バージョンとテストが必要なバージョン (下記参照) を両方ともに CVS で配布している。
CVS | rsync を有効にすることで、バイナリディストリビューションが更新されるより前に最新安定版を手に入れることができる。
</p>
</li>
<li>
<p>
<b>10.3 stable:</b> これはソースからインストールできる OS 10.3 向け最新バージョン。
CVS または rsync アクセスを有効にする必要がある。
</p> 
</li> 
<li>
<p>
<b>In latest-unstable:</b> 最新の非安定バージョン。
このバージョンをインストールするには、非安定バージョンのインストール方法の<a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">説明</a> に従って下さい。
</p>
<p>注意: 非安定バージョンは使用できないと言うわけではありませんが、自己責任で使用して下さい。
</p></li>
</ul>

<h2><a name="x11">3.7 X11 を使う</a></h2>

<p>
Mac OS X には、 X11 が数種類 (XFree86, Tenon Xtools, eXodus) あり、インストール方法も数種類 (手動、 Fink を使う) あるため、パッケージも数種類あります。
Fink は、インストールされているのがどれかをうまく判別できません。
このため、 X11 アプリケーションをインストールする前に正しいものを選ぶことが重要になります。
以下がパッケージと X11 のインストール方法の一覧です:
</p>
<ul>
<li>
<p>
xfree86-base:
このパッケージはリアルです。
XFree86 4.2.1.1 の全てを Fink パッケージとしてインストールします。
柔軟性に対応できるよう、このパッケージに XDarwin サーバーは含まれていません。
これを追加するには、 xfree86-rootless パッケージをインストールして下さい
</p>
</li>
<li>
<p>
xfree86:
これは一つのパッケージ (display サーバーを含む) です。
このバージョンは 4.2.1.1 より速いですが、十分にはテストされていません。
</p>
</li>
<li>
<p>
system-xfree86:
このパッケージは、ソースまたは公式 (非公式) バイナリからインストールした場合、あるいは Apple X11 をインストールした場合など、手動で XFree86 をインストールした時に使います。
このパッケージはインストールが有効かどうかを確認するだけで、後は依存性のために存在するだけです。
</p>
</li>
<li>
<p>
system-xtools:
Tenon Xtools をインストールした場合、このパッケージをインストールして下さい。
system-xfree86 と同様、有効性を確認するだけでファイルはそのままにします。
</p>
</li>
</ul>
<p>
X11 のインストールと使用の詳細は、
<a href="http://fink.sourceforge.net/doc/x11/">X11 on Darwin and Mac OS X ドキュメント</a>
を参照して下さい。
</p>

<p align="right">
Next: <a href="upgrade.php?phpLang=ja">4 Fink のアップグレード</a></p>

<? include_once "footer.inc"; ?>
