<?

$title = "ユーザーガイド";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/02/24 03:03:42';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=ja\" title=\"ユーザーガイド Contents\" /><link rel=\"next\" href=\"intro.php?phpLang=ja\" title=\"はじめに\" />";

include_once "header.ja.inc"; 
?><h1>Fink ユーザーガイド</h1>
<p>
<b>このドキュメントは未完成です。</b>
以下のドキュメントはより広範囲なことについて書かれています:
<a href="http://fink.sourceforge.net/doc/bundled/install.php">インストール</a>,
<a href="http://fink.sourceforge.net/doc/bundled/usage.php">使用方法</a>
およびバイナリのディスクイメージにある ReadMe.rtf 。
ウェブサイト中の <a href="http://fink.sourceforge.net/doc/">Documentation セクション</a> も併せて参照ください。
ここにあるドキュメントも役に立つでしょう。
</p>
<p>
Fink ユーザーズガイドへようこそ。
このガイドでは、ソースからとバイナリからの両方について、初めてのインストールとアップグレードの仕方について書かれています。
パッケージインストールとメンテナンスのことも書かれています。
</p>
<h2>Contents</h2><ul>
<li><a href="intro.php?phpLang=ja"><b>1 はじめに</b></a></li>
<ul>
<li><a href="intro.php?phpLang=ja#what">1.1 Fink とは何ですか?</a></li>
<li><a href="intro.php?phpLang=ja#req">1.2 必要条件</a></li>
<li><a href="intro.php?phpLang=ja#supported-os">1.3 サポートされているシステム</a></li>
<li><a href="intro.php?phpLang=ja#src-vs-bin">1.4 ソース vs. バイナリ</a></li>
</ul>
<li><a href="install.php?phpLang=ja"><b>2 初めてのインストール</b></a></li>
<ul>
<li><a href="install.php?phpLang=ja#bin">2.1 バイナリディストリビューションのインストール</a></li>
<li><a href="install.php?phpLang=ja#src">2.2 ソースディストリビューションのインストール</a></li>
<li><a href="install.php?phpLang=ja#setup">2.3 環境の設定</a></li>
</ul>
<li><a href="packages.php?phpLang=ja"><b>3 パッケージのインストール</b></a></li>
<ul>
<li><a href="packages.php?phpLang=ja#bin-dselect">3.1 dselect によるバイナリパッケージのインストール</a></li>
<li><a href="packages.php?phpLang=ja#bin-apt">3.2 apt-get を使ったバイナリインストール</a></li>
<li><a href="packages.php?phpLang=ja#bin-exceptions">3.3 バイナリディストリビューションにない依存パッケージのインストール</a></li>
<li><a href="packages.php?phpLang=ja#src">3.4 ソースからのパッケージインストール</a></li>
<li><a href="packages.php?phpLang=ja#fink-commander">3.5 Fink Commander</a></li>
<li><a href="packages.php?phpLang=ja#">3.6 用意されているバージョン</a></li>
<li><a href="packages.php?phpLang=ja#x11">3.7 X11 を使う</a></li>
</ul>
<li><a href="upgrade.php?phpLang=ja"><b>4 Fink のアップグレード</b></a></li>
<ul>
<li><a href="upgrade.php?phpLang=ja#bin">4.1 バイナリパッケージでのアップグレード</a></li>
<li><a href="upgrade.php?phpLang=ja#src">4.2 ソースディストリビューションのアップグレード</a></li>
<li><a href="upgrade.php?phpLang=ja#mix">4.3 バイナリとソースの混在</a></li>
</ul>
<li><a href="conf.php?phpLang=ja"><b>5 Fink 設定ファイル</b></a></li>
<ul>
<li><a href="conf.php?phpLang=ja#about">5.1 fink.conf について</a></li>
<li><a href="conf.php?phpLang=ja#syntax">5.2 fink.conf 文法</a></li>
<li><a href="conf.php?phpLang=ja#required">5.3 必須設定</a></li>
<li><a href="conf.php?phpLang=ja#optional">5.4 ユーザー設定</a></li>
<li><a href="conf.php?phpLang=ja#downloding">5.5 ダウンロード設定</a></li>
<li><a href="conf.php?phpLang=ja#mirrors">5.6 ミラー設定</a></li>
<li><a href="conf.php?phpLang=ja#developer">5.7 開発者用設定</a></li>
</ul>
<li><a href="usage.php?phpLang=ja"><b>6 コマンドライン fink ツールの使用方法</b></a></li>
<ul>
<li><a href="usage.php?phpLang=ja#using">6.1 fink ツールの使用</a></li>
<li><a href="usage.php?phpLang=ja#install">6.2 install</a></li>
<li><a href="usage.php?phpLang=ja#remove">6.3 remove</a></li>
<li><a href="usage.php?phpLang=ja#update-all">6.4 update-all</a></li>
<li><a href="usage.php?phpLang=ja#list">6.5 list</a></li>
<li><a href="usage.php?phpLang=ja#apropos">6.6 apropos</a></li>
<li><a href="usage.php?phpLang=ja#describe">6.7 describe</a></li>
<li><a href="usage.php?phpLang=ja#fetch">6.8 fetch</a></li>
<li><a href="usage.php?phpLang=ja#fetch-all">6.9 fetch-all</a></li>
<li><a href="usage.php?phpLang=ja#fetch-missing">6.10 fetch-missing</a></li>
<li><a href="usage.php?phpLang=ja#build">6.11 build</a></li>
<li><a href="usage.php?phpLang=ja#rebuild">6.12 rebuild</a></li>
<li><a href="usage.php?phpLang=ja#reinstall">6.13 reinstall</a></li>
<li><a href="usage.php?phpLang=ja#configure">6.14 configure</a></li>
<li><a href="usage.php?phpLang=ja#selfupdate">6.15 selfupdate</a></li>
<li><a href="usage.php?phpLang=ja#index">6.16 index</a></li>
<li><a href="usage.php?phpLang=ja#validate">6.17 validate</a></li>
<li><a href="usage.php?phpLang=ja#scanpackages">6.18 scanpackages</a></li>
<li><a href="usage.php?phpLang=ja#checksums">6.19 checksums</a></li>
<li><a href="usage.php?phpLang=ja#cleanup">6.20 cleanup</a></li>
</ul>
</ul><p>Generated from <i>$Id: index.ja.php,v 1.2 2004/02/28 20:47:23 fingolfin Exp $</i></p><? include_once "../../footer.inc"; ?>
