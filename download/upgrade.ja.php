<?
$title = "アップグレード表";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2004/03/02 16:21:21 $';

include "header.inc";
?>

<h1>Fink アップグレード表</h1>

<p>
リリース 0.2.0 以降の Fink であれば、どのバージョンでも最新リリースにアップグレードすることができます。
これには MacGIMP.com や OpenOSX.com から入手した GIMP も含まれます。
以下の表で自分の環境に適したアップグレードを行って下さい。
</p>
<p>
現在の Fink バージョンがわからなければ、
&quot;<code>fink --version</code>&quot; 
をターミナルで入力し下さい。
</p>
<p>
0.3.1 以前の Fink リリースからアップグレードをする場合、
もし tetex がインストールされているなら、アップグレード前に &quot;fink remove tetex&quot; コマンドを実行して削除し
(この他、 tetex に依存している lyx などのパッケージも先に削除する必要があります) 、
アップグレード後に削除したパッケージをインストールし直して下さい。
</p>
<? 
include "../fink_version.inc";
?>

<p>
2002年4月の SourceForge ウェブサイトの再組織のため、バイナリディストリビューションは 2002年の夏に移動しました。
このためにアップグレードは多少複雑になりましたので、以下のアップグレード方法を注意してお読みください。
バイナリインストールとソースインストールは別々になっています。
</p>
<p>ソースインストール中に問題が発生した場合、
<a href="fix-upgrade.php">特殊な方法</a></p>
をご覧下さい。

<?
it_start();
it_item('<b>現在のインストール (バイナリリリース)</b>', '<b>アップグレード方法</b>');
it_item("Fink 公式バイナリディストリビューション, version 0.5.x",
  '<p>通常通り <tt>dselect</tt> で &quot;[U]pdate&quot;,
  この後 &quot;[I]nstall&quot;.
あるいは<tt>FinkCommander</tt> で &quot;Update&quot; して
"Dist-Upgrade" (どちらも <tt>Binary</tt> メニュー) 。</p>');
it_item("Fink 公式バイナリディストリビューション, version 0.3.x と 0.4.x",
  '<p><a href="10.1-upgrade.php">10.1 でのアップグレード</a> 
 または <a href="10.2-upgrade.php">10.2 でのアップグレード</a>を参照</p>');
it_item("Fink 公式バイナリディストリビューション, version 0.2.x",
  '<p><a href="puma-kit.php">オリジナル 10.1 Upgrade Kit</a> を試して下さい
(Fink のメンテナはこのアップグレードをテストする環境はありません。)</p>');
it_item("MacGIMP と OpenOSX.com の Fink 0.2.1",
  '<p><a href="puma-kit.php">オリジナル 10.1 Upgrade Kit</a>を試して下さい
(Fink のメンテナはこのアップグレードをテストする環境はありません。)
必ず他のパッケージより先に <code>system-xfree86</code> をインストールして下さい。
</p>');
it_item('<b>現在のインストール (ソースリリース)</b>', '<b>アップグレード方法</b>');
it_item("Fink  ソースリリース 0.2.5 以降",
  '<p>&quot;<tt>fink selfupdate</tt>&quot; を実行します。
  10.1 から 10.2 へアップグレードする場合、完全なアップグレードには２回実行する必要があります。</p>');
it_item("Fink  ソースリリース 0.2.4 以前 (0.2.0 まで)",
  "<p>OS X 10.1 上でアップグレードする場合、
<a href=\"http://prdownloads.sourceforge.net/fink/packages-0.4.1.tar.gz\">パッケージ tarball</a>
をダウンロード、 <tt>tar</tt> ユーティリティーを使って解凍後に
packages-0.4.1 ディレクトリ内から &quot;<code>./inject.pl</code>&quot; を実行します。</p>
<p>OS X 10.2 上でアップグレードする場合、
<a href=\"http://prdownloads.sourceforge.net/fink/dists-$fink_version.tar.gz\">dist tarball</a>
をダウンロード、 <tt>tar</tt> ユーティリティーを使って解凍後に
dists-$fink_version ディレクトリ内から &quot;<code>./inject.pl</code>&quot; を実行します。</p>");
it_end();
?>


<?
include "footer.inc";
?>
