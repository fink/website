<?
$title = "ReadMe";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2006/09/16 23:17:53';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink ReadMe</h1>
<!--Generated from $Fink: readme.ja.xml,v 1.3 2006/09/16 23:17:53 dmrrsn Exp $-->
<p>
Fink は Open Source ソフトウェアを Darwin と Mac OS X　で使えるようにすることを目的としたパッケージ管理システムです。
</p>
<p>
dpkg を使うことで、独立したディレクトリハイエラルキーを保ってるシステムです。
主な機能として、元となるソースリリースをダウンロード、必要に応じたパッチ当て、 Darwin 用の configure 、コンパイル、インストールを行います。
利用可能なパッケージと必要なパッチの情報 ("パッケージ詳細") は別々に管理され、通常この配布に含まれています。
実際のソースコードは必要に応じてインターネットからダウンロードされます。
</p>
<p>
Fink はまだ荒削りで機能不足なため「成熟」した状態にあるとは言えませんが、既に多くの人々に使われています。
使用方法をよく読み、たとえうまくいかなくても驚かないでください。
多くの問題は既に分析されていて、ウェブサイトに情報があります。
</p>
<p>
Fink は GNU General Public License の下で配布されています。
詳細は COPYING ファイルをご覧ください。
</p>
<h2><a name="req">動作条件</a></h2>
<p>
以下が必要です:
</p>
<ul>
<li><p>
インストール済み Mac OS X システム、バージョン 10.0 以降。
(10.1 にリンカ関連の問題が多少残っています)
Darwin 1.3.1 も動作すると思われますが、テストはされていません。
これより前のバージョンは<b>動作しません</b>。
</p></li>
<li><p>
開発ツール。
Mac OS X では Developer Tools CD から Developer.pkg パッケージをインストールして下さい。
このツールは Mac OS X バージョンに対応している必要があります。
Darwin では、デフォルトインストールでツールが揃っているはずです。
</p></li>
<li><p>
インターネットへの接続。
すべてのソースコードはミラーサイトからダウンロードされます。
</p></li>
<li><p>
忍耐。
コンパイル、特に大きなパッケージには時間がかかります。
数時間から数日かかることもあります。
</p></li>
</ul>
<h2><a name="install">インストール</a></h2>
<p>
インストール方法は INSTALL ファイルに書かれています。
インストール方法は簡単ではないので、これを最初にお読みください。。
また、アップグレード方法も書かれています。
</p>
<h2><a name="usage">Fink の使用方法</a></h2>
<p>
USAGE ファイルにパスの通し方やパッケージのインストールや削除方法が書かれています。
また、コマンド一覧も書かれています。
</p>
<h2><a name="questions">質問?</a></h2>
<p>
If the documentation included here doesn't answer your question,
stroll over to the Fink website at
もしここにあるドキュメントで質問に答えていない場合、 Fink ウェブサイト
<a href="http://www.finkproject.org/">http://www.finkproject.org/</a>
に来て、ヘルプページを参照してください:
<a href="http://www.finkproject.org/help/">http://www.finkproject.org/help/</a> 。
ここにほかのドキュメントやサポートの得られる場所についての情報が書かれています。
</p>
<p>
Fink に貢献をしたい場合、上記のヘルプページに、テストやパッケージ作成など、現在募集している内容一覧があります。
</p>
<h2><a name="uptodate">告知</a></h2>
<p>
当プロジェクトのウェブサイトは
<a href="http://www.finkproject.org/">http://www.finkproject.org/</a>
です。
</p>
<p>
新しいリリースの情報は、
<a href="http://www.finkproject.org/lists/fink-announce.php">http://www.finkproject.org/lists/fink-announce.php</a>
から fink-announce メーリングリストを購読してください。
このリストは受信専用で、トラフィック量は小さいです。
</p>

<? include_once "../footer.inc"; ?>


