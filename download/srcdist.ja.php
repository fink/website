<?
$title = "ソースリリースのダウンロード";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2007/06/14 07:31:02 $';

include "header.inc";
?>

<h1>Fink ソースリリースのダウンロード</h1>
<!--AKH 2007-05-31.  Fix when we have a release tarball that works with OS > 10.4.9
<p>
ソースリリースには fink パッケージマネージャとパッケージ詳細、パッチが含まれています。
これによってソースコードを元の配布サイトからダウンロードし、自分のマシン上でビルドすることができます。
</p>
-->
<p>ソースの tarball に、<em>fink</em> パッケージマネージャーが含まれています。
これをインストール後、パッケージ記述とパッチを入手することができます。
これによって、オリジナルの配布サイトまたは Fink プロジェクトのミラーからソースコードをダウンロードし、ローカルでビルドができるようになります。</p>
<? 
include "../fink_version.inc";
?>
<!--
<p>
Fink <? print $fink_version; ?> は公式に
<? print $release_date; ?> にリリースされました。
</p>
-->
<p><EM>fink-0.27.1</EM> は、2007年3月19日 にリリースされました。</p>
<ul>
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full-XCode-2.1.tar.gz">Fink
<? print $release_version; ?></a> (OS X 10.4 と XCode 2.1 用)
- 6241K, .tar.gz format</li>
</ul>

<p>
<b>重要事項:</b>
ファイル名が壊れる問題があるので StuffIt で解凍するのは避けて下さい。
代わりにコマンドラインの <tt>tar</tt> を使ってください。
使用方法はソースインストールのドキュメントにあります。

インストールと使用方法は tarball 内にあります。
Fink はワンクリックで動作するものではないので、必ず読んで下さい。
README, INSTALL と USAGE はテキスト形式 (コマンドラインで読むため) とHTML形式 (ブラウザで読んだり印刷するため) で配布されています。
いずれも当サイトの<a href="../doc/index.php">文書</a>からも読むことができます。
</p>
<p><em>fink</em> と基本パッケージをインストールしましたら、</p>
<pre>fink selfupdate-rsync</pre>
<p>または</p>
<pre>fink selfupdate-cvs</pre>
<p>と実行してください。
これによって、パッケージ記述ファイルとパッチをダウンロードします。</p>
<p>
<a href="../lists/fink-announce.php">fink-announce mailinglist</a>
ではリリースの公表をしていますので、興味のある方は購読して下さい。
</p>


<?
include "footer.inc";
?>
