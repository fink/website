<?

$title = "F.A.Q. - Fink のアップグレード";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/02/28 17:05:56';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=ja\" title=\"F.A.Q. Contents\" /><link rel=\"next\" href=\"usage-fink.php?phpLang=ja\" title=\"Fink のインストール、使用、メンテナンス\" /><link rel=\"prev\" href=\"mirrors.php?phpLang=ja\" title=\"Fink ミラー\" />";

include_once "header.ja.inc"; 
?><h1>F.A.Q. - 4 Fink のアップグレード (バージョン固有の問題対処法)</h1>


<a name="gcc-0.16.0">
<div class="question"><p><b>Q4.1: バージョン0.16.0にアップグレードして "Your version of the
gcc 3.3 compiler is out of date." と言われました。どうしたらいいですか?</b></p></div>
<div class="answer"><p><b>A:</b> Panther のリリースにともない、 Fink は新しい gcc 3.3 コンパイラに対応するようアップデートされました。
10.2 (Jaguar) と 10.3 (Panther) の両方をサポートするため、すべてのユーザーは最新の gcc 3.3 update (August 2003 Updater または
Panther XCode tools) をインストールする必要があります。
Mac OS X 10.2 の December 2002 developer tools 用 XCode ベータ・アップデータをインストールした場合、この警告が出ます。もし 10.2 であれば、コマンド:</p><pre>gcc --version</pre><p>...で現在のバージョンがわかります。
2003年10月24日時点で build 1493 かそれ以上が必要です。</p><p>10.2 ユーザーは、 August 2003 Updater を <a href="http://developer.apple.com/">Apple Developer Connection</a> からダウンロードできます (無料登録が必要)。</p><p>10.3 ユーザーは、 Panther 互換のディベロッパーツール (Xcode など) にアップグレードする必要があります。
XCode の入った CD が Panther に同梱されているはずです。</p></div>
</a>
<p align="right">
Next: <a href="usage-fink.php?phpLang=ja">5 Fink のインストール、使用、メンテナンス</a></p><? include_once "../footer.inc"; ?>
