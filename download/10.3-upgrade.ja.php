<?
$title = "Mac OS X 10.3 でのアップグレード";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2004/03/02 16:21:21 $';

include "header.inc";
?>


<h1>Mac OS X 10.3 でのアップグレード</h1>

<p>
Fink は gcc 3.3 コンパイラと OS X 10.3 を生かし、ソースとバイナリのどちらもアップグレードすることができます。
現状ではバイナリバージョンはソースバージョンよりも遥かに安定しています。
</p><p>
ソースからアップグレードする場合、アップグレード前に June 2003 Developer Tools を使っている方は August 2003 Developer Tools にアップデートして下さい。
10.3 ではアップグレードする前に XCode ディスクから XCode をインストールして下さい。
</p><p>
&quot;<code>fink selfupdate</code>&quot; を実行するとアップグレードが開始します。
最新の fink パッケージマネージャは自動的にインストールされている OS X と gcc のバージョンを検知し、これに従って設定します。
</p><p>
10.3 システム上で新規に Fink をインストールする場合、
<extlink url="http://sourceforge.net/project/showfiles.php?group_id=17203">SourceForge ダウンロード</extlink>ページから
fink-full-0.6.1.tar.gz をダウンロードし、
<extlink url="http://fink.sourceforge.net/download/srcdist.php">ソースからブートストラップ</extlink>
することをお勧めします。
これには XCode が必要です。
</p><p>
Fink バージョン 0.15.0 以上が既にインストールされている場合、 system-xfree86 をインストールする必要はありません。
Fin は既に Fink の X11 パッケージがインストールされているか、 sysmtem-xfree86 バージョンを自動的に検出します。
古い system-xfree86 がインストールされている場合、以下のコマンドを実行して下さい:
</p>
<pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43; fink selfupdate; fink index</pre>
<p>
Fink チームは現在、10.3 で動作するように作業している最中で、既に多くのパッケージが動作します。
</p>

<?
include "footer.inc";
?>
