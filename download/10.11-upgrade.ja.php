<?php
$title = "Upgrade Instructions for Mac OS X 10.11";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2020/03/28 11:39:00 $';

include "header.inc";
?>

<h1>Mac OS X 10.11 向けのアップグレード</h1>
<h2>10.9 から 10.11</h2>
<ol>
	<li>
		10.11 をインストールする前に <pre>fink selfupdate</pre> (rsync または CVS) をして
		最新版の <code>fink</code> にする。
	</li>
	<li>
		OS をアップデート。
	</li>
	<li>
		まだインストールしていなければ、Xcode 8.2.1 をインストールするか、Yosemite 用のコマンドラインツールをインストール。
		Xcode 8.2.1 をインストール済みなら、Marvericks か Yosemite でインストールしていても、
		コマンドラインツールを再インストールする必要があります。
	</li>
	<li>
		Xcode 8.2.1 があるなら、 <pre>sudo xcodebuild -license</pre> を実行し、
		Xcode ライセンス条項を受け入れます。
		これは、コマンドラインツールだけを使うのであれば必要ありません。
	</li>
	<li>
		<pre>fink configure</pre> を使い、Fink のビルドユーザーをアクティベートします。
		Apple が、user を消し去るためです (なぜか group は消さないようです)。
	</li>
	<li>
		<pre>fink reinstall fink</pre> を使い、10.11 を指定します。
	</li>
	<li>
		オプション: 
		<p><code>-pm5162</code> なパッケージをインストール済みであれば、
		<pre>fink install perl5162-core</pre> を使います。</p>
		<p><code>passwd-*</code>  なパッケージをインストール済みであれば、
		<pre>fink list -it passwd | cut -f2 | xargs fink reinstall</pre> を使います。
	</li>
</ol>
<p>
   fink を 10.10 用にせずに 10.9 から 10.10 または 10.11 にアップデートした場合、
   これ以上は進めません。
   互換性のある<link url="http://downloads.sourceforge.net/fink/fink_0.39.2-101_darwin-x86_64.deb">ビルド済み fink</link> 
   をダウンロードし、ターミナルで、ダウンロードしたフォルダで
   <pre>sudo dpkg -i fink_0.39.2-101_darwin-x86_64.deb</pre> とインストールします。
</p>

<h2>10.8 以前から 10.11:</h2>
<p>10.8 (以前) から 10.11 へ Fink をアップグレードする方法はありません。</p>

<p>ここの手順は、
<a href="http://finkers.wordpress.com/2011/09/26/fink-and-lion/">Fink blog</a>
の要約版です。
ここの情報はより詳しい説明があります。</p>

<p>このプロセスは、現在の Fink でインストールしているパッケージ一覧を集め、
10.11 上で Fink インストール中に使うために保存します。</p>
<p>パッケージ一覧を集めるには、以下のようにしてください:</p>
<ol>
    <li><pre>grep -B1 &quot;install ok installed&quot; /sw/var/lib/dpkg/status | grep Package | cut -d: -f2 &gt; fink_packages.txt</pre>
    を使い、パッケージ情報をファイルに保存します。</li>
    <li><pre>sudo mv /sw /sw.old</pre> の Fink ツリーを移動します。</li>
    <li>最低限、OS X 10.11, Xcode 8.2.1、コマンドラインツールをインストールします。</li>
    <li>10.11 をインストール後、<a href="./srcdist.php">Fink をインストール</a>します。</li>
    <li>コマンド <pre>cat fink_packages.txt | xargs fink install</pre> を実行し、
    可能な限り、10.8 上でインストールしたパッケージを、新しい Fink がインストールします。</li>
	<li>/sw.old ディレクトリを削除します。</li>
</ol>
<p>システムの変化により、10.8以前で得られるパッケージの全てが 10.11 で利用できるわけではありません。
現在、可能な限り多くのパッケージを利用できるように作業中です。
利用したいパッケージが 10.11 で利用できない場合、パッケージメンテナに連絡し、利用できるように依頼してください。</p>

<?php
include "footer.inc";
?>
<?php include_once "../phpLang.inc.php"; ?>
