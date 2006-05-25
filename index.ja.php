<?
$title = "Home";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2006/05/25 16:20:33 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include dirname(__FILE__) . "/header.inc";
?>


<p>
Fink プロジェクトは
<a href="http://www.opensource.org/">オープンソース</a>ソフトウェアを
<a href="http://www.opensource.apple.com/">Darwin</a> と
<a href="http://www.apple.com/macosx/">Mac OS X</a> で使えるようにするものです。
Mac OS X 上でコンパイルと実行できるよう、 Unix ソフトウェアを修正 (&quot;ポート&quot;) しています。
こうしてできたものは全て一つのディストリビューションに統合されます。
Fink では dpkg や apt-get などの <a href="http://www.debian.org/">Debian</a> ツールを使い、バイナリパッケージ管理を行っています。
ユーザーはコンパイル済みのパッケージをダウンロードことも、すべてソースからビルドすることもできます。
<a href="about.php">詳細...</a>
</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>ニュース</h1>

<?
// Include news items
include dirname(__FILE__) . "/news/news.ja.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=ja">Older News...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>ステータス</h1>
<? 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink <? print $fink_version ?> は <? print convert_date_to_locale($release_date) ?> にリリースされました。
これは Mac OS X10.4 用のソースとバイナリパッケージと、バイナリインストーラを含んでいます。
Fink 0.7.2 (for OS X 10.3), Fink 0.6.4 (for OS X 10.2) と 0.4.1 (for OS X 10.1) はこれまで通りです。
</p>

<h1>リソース</h1>

<p>
サポートが必要な方は、<a href="help/index.php?phpLang=ja">ヘルプページ</a>をご覧下さい。
こちらではプロジェクトをサポートして下さる方への情報やフィードバックの受付けもしています。
</p>

<p>
Fink プロジェクトは
<a href="http://sourceforge.net/">SourceForge</a>
でホストされています。
サイトホスティングとダウンロードの他、 SourceForge は以下のサービスを提供しています。
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">SourceForge プロジェクト Summary ページ</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">バグレポート</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">パッケージ化の要求</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">fink への機能追加の要求</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">新パッケージの投稿 (コア開発者以外)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">fink へのパッチを送る</a></li>
<li><a href="lists/index.php">メーリングリスト</a></li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">オンライン
ブラウザ</a>, <a href="doc/cvsaccess/index.php">アクセスの仕方</a>)</li>
</ul>
<p>
上記のサービスの中には SourceForge アカウントにログインして使う機能 (バグレポートやパッケージ化の要望など) もあります。
アカウントをお持ちでない方は、 <a href="http://sourceforge.net/">SourceForge ウェブサイト</a>で取得することができます。
</p>

<p>SourceForge 以外でホストされている追加リソース:</p>
<ul>
<li><a href="http://wiki.opendarwin.org/index.php/Fink">The Fink developer wiki</a>　は、
<a href="http://www.opendarwin.org">the OpenDarwin プロジェクト</a>のご好意により提供されています。
</li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include dirname(__FILE__) . "/footer.inc";
?>
