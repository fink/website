<?
$title = "ソースリリースのダウンロード";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2004/03/02 16:21:21 $';

include "header.inc";
?>

<h1>Fink ソースリリースのダウンロード</h1>

<p>
ソースリリースには fink パッケージマネージャとパッケージ詳細、パッチが含まれています。
これによってソースコードを元の配布サイトからダウンロードし、自分のマシン上でビルドすることができます。
</p>
<? 
include "../fink_version.inc";
?>

<p>
Fink <? print $fink_version; ?> は公式に
<? print $release_date; ?> にリリースされました。

</p>
<ul>
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full.tar.gz">Fink
<? print $release_version; ?></a> - 3497K, .tar.gz 形式</li>
</ul>

<p>
<b>重要事項:</b>
ファイル名が壊れる問題があるので StuffIt で解凍するのは避けて下さい。
代わりにコマンドラインの <tt>tar</tt> を使ってください。
使用方法はソースインストールのドキュメントにあります。
</p>

<p>
インストールと使用方法は tarball 内にあります。
Fink はワンクリックで動作するものではないので、必ず読んで下さい。
README, INSTALL と USAGE はテキスト形式 (コマンドラインで読むため) とHTML形式 (ブラウザで読んだり印刷するため) で配布されています。
いずれも <a href="../doc/index.php">ドキュメントセクション</a>
からも読むことができます。
</p>
<p>
<a href="../lists/fink-announce.php">fink-announce mailinglist</a>
ではリリースの公表をしていますので、興味のある方は購読して下さい。
</p>


<?
include "footer.inc";
?>
