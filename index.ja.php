<?php
$title      = "Home";
$cvs_author = '$Author: nieder $';
$cvs_date   = '$Date: 2019/02/25 22:41:00 $';
$is_home    = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

require dirname(__FILE__) . "/header.inc";
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

<h1><a href="<?php print $rdf_file; ?>" title="Subscribe to my feed, Fink Project News" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbspニュース</h1>

<?php
// Include news items
require dirname(__FILE__) . "/news/news.ja.inc";
?>
<div align="right"><a href="<?php print $root; ?>news/index.php?phpLang=ja">Older News...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Fink Package Updates (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;最近更新されたパッケージ</h1>

<?php  include "package-updates.inc" ?>

<a href="package-updates.php">これ以前の情報...</a>
</tr><tr valign="top"><td width="50%">
<h1>ステータス</h1>
<?php
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>Fink は、現在 macOS 10.14 (Mojave), macOS 10.13 (High Sierra), macOS 10.12 (Sierra), 
OS X 10.11 (El Capitan), OS X 10.10 (Yosemite), OS X 10.9 (Mavericks) をサポートし、
またこれより前のバージョンの OS X は、公式アップデートは行わないものの、動作します。
インストール方法は、
<a href="download/srcdist.php">ソースリリースのページ</a>
に書かれています。</p>

<p>Xcode を Fink より先にインストールする必要があります。</p>  
<p>
<strong>10.13 and 10.14 Support:</strong> 
10.13 and 10.14 users must install Xcode version 10.1 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 10.1 (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.11 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.13 and 10.14 Support:</strong> 
10.13 and 10.14 users must install Xcode version 10.1 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 10.1 (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.11 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.12 Support:</strong> 
10.12 users must install Xcode version 8.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 6.0 for Sierra (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.11 Support:</strong> 
10.11 users must install Xcode version 7.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 7.0 for El Capitan (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.10 Support:</strong> 
10.10 users must install Xcode version 6.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 6.0 for Yosemite (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.9 サポート:</strong> 
10.9 ユーザは、Xcode 5.0.1 以降 (AppStore から無料。バージョン 5.0.2 推奨) 
または、少なくとも Command Line Tools for Xcode 5.0 for Mavericks 
(<i>xcode-select --install</i> でインストール可能、または <a href="http://developer.apple.com">Apple</a> からダウンロード可能)
をインストールする必要があります。</p>
<p>X11 が必要なら、
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>
から Xquartz-2.7.4 以降をインストールしてください。</p>
<p>
<strong>10.8 サポート:</strong> 
10.8 ユーザは、(AppStore からの無料ダウンロードで)
Xcode 4.4 以上をインストールするか、
あるいは少なくとも
Command Line Tools for Xcode 4.4 (<a href="http://connect.apple.com">Apple</a> からダウンロード可能
または Xcode (4.6.1を推奨) 環境設定からインストール可能) 
をインストールする必要があります。
ただし、4.3 より前の Xcode がある場合は、
<i>/Developer/Library/uninstall-devtools</i> を実行して <b>アンインストール</b> する必要があります。
現在の Xcode バージョンは、
<i>xcodebuild -version</i>
でわかります。</p>
<p>X11 が必要なら、
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>
から Xquartz-2.7.0 以降をインストールしてください。</p>
<p>
<strong>10.7 サポート:</strong> 
10.7 ユーザは、Xcode を 4.1 以降　(AppStore から無料ダウンロード) (4.5.2 以降を推奨) 、
あるいは少なくとも
Command Line Tools for Xcode 4.3 (<a href="http://connect.apple.com">Apple</a> からダウンロード可能
または Xcode (4.3以降) 環境設定からインストール可能) 
をインストールする必要があります。
上の <strong>10.8</strong> の例を参考に、バージョンを確認して必要ならアンインストールしてください。</p>
<p>10.7 では Xquart をサポートしていません。
Apple の公式 X11 を削除しないよう注意してください。</p>
<p>
<strong>10.6 サポート:</strong>
10.6 ユーザは、Xcode を 3.2.6 または 4.x 開発者プレビューを払っている場合は 4.2.1 にアップグレードしてください。
4.0.2 はリンカにバグがあり、いくつかのパッケージのビルドができないようです。
上の <strong>10.8</strong> の例を参考に、バージョンを確認して必要ならアンインストールしてください。</p>
<p>10.6 では Xquart をサポートしていません。
Apple の公式 X11 を削除しないよう注意してください。</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
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
    <li><a href="http://wiki.finkproject.org/">The Fink developer wiki</a>　 (now at a new location).</li>
    <li>
        <a href="https://github.com/fink/fink">
            New github repository for the source code of the <code>fink</code> package manager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            New github repository for the <code>fink-mirrors</code> package.
        </a>
    </li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?php
include dirname(__FILE__) . "/footer.inc";
?>
