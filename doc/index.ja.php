<?
$title = "";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/02/28 07:39:55';
include_once 'nav.inc';
$fsroot = $root = '../';
include_once '../header.inc'; 
?><h1>Fink - Documentation</h1><p>Generated from <i>$Id: index.ja.php,v 1.3 2004/03/05 15:55:24 fingolfin Exp $</i></p>
<p>
このページは、 Fink 用に書かれたドキュメントの一覧です。
ドキュメントの中には、 Fink を使わずに Mac OS X や Darwin だけを使う人、 Unix ソフトウェアのポートの仕方を知りたい人にも有用な情報もあります。
</p>
<h2><a name="userdoc">ユーザー向けドキュメント</a></h2>

<p>
現在のユーザー向け Fink ドキュメント:
</p>
<ul>
<li><a href="users-guide/index.php">Fink User's Guide</a> -
Fink 本体のインストール、パッケージのインストール、新しい Fink リリースへのアップグレードなどが書かれています。
ソースとバイナリリリースの両方の説明が書かれています。
<b>現在作業中!</b></li>
<li><a href="x11/index.php">Running X11 on Darwin and Mac OS X</a> -
コンセプト、インストール、起動について書かれています (一般的な Darwin と Mac OS X ユーザー向け) 。</li>
</ul>

<p>
以下のドキュメントはより詳細ですが、内容が多少古くメンテナンスされません。
（訳注 日本語版はありません）:
</p>
<ul>
<li><a href="bundled/install.php">Installation and Upgrading</a> - how
to install Fink or upgrade to a new version</li>
<li><a href="bundled/usage.php">Usage</a> - how to use Fink
and the installed software</li>
<li><a href="bundled/readme.php">Fink ReadMe</a> - the ReadMe for the
source distribution</li>
<li><a href="cvsaccess/index.php">CVS Access</a> - how to access the
Fink CVS repository to get the latest source packages between
releases</li>
</ul>

<h2><a name="developerdoc">開発者向けドキュメント</a></h2>

<ul>
<li><a href="http://fink.sourceforge.net/doc/UsingFink.pdf">Using Fink: A Developer's How To</a> (2MB pdf
file) - <a href="http://conferences.oreillynet.com/macosx2002/">O'Reilly Mac OS X Conference</a> でのプレゼンテーション用スライド (
<a href="http://conferences.oreillynet.com/presentations/macosx02/morrison_david.ppt">PowerPoint ファイル</a> もあります) 。</li>
<li><a href="porting/index.php">Porting Tips</a> - 
Unix アプリケーションを Darwin へポートする際に有用な情報。</li>
<li><a href="packaging/index.php">Packaging Manual</a> - 
Fink パッケージの作り方、メンテナンス方法。</li>
</ul>

<? include_once "../footer.inc"; ?>
