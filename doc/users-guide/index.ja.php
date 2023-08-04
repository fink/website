<?php
$title = "ユーザーガイド";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:49:23';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="ユーザーガイド Contents"><link rel="next" href="intro.php?phpLang=ja" title="はじめに">';


include_once "header.ja.inc";
?>
<h1>Fink ユーザーガイド</h1>
<p>
このドキュメントは、 Fink の全ての機能を概説します。
(以下のドキュメントはより広範囲なことについて書かれています:
<a href="/doc/install/index.php">インストール</a>,
<a href="/doc/usage/index.php">使用方法</a>
およびバイナリのディスクイメージにある ReadMe.rtf 。)
ウェブサイト中の <a href="/doc/">文書 セクション</a> も併せて参照ください。
ここに書かれていること以上の内容を含んでいます。
</p>
<p>
Fink ユーザーズガイドへようこそ。
このガイドでは、ソースからとバイナリからの両方について、初めてのインストールとアップグレードの仕方について書かれています。
パッケージインストールとメンテナンスのことも書かれています。
</p>
<h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=ja"><b>1 はじめに</b></a><ul><li><a href="intro.php?phpLang=ja#what">1.1 Fink とは何ですか?</a></li><li><a href="intro.php?phpLang=ja#req">1.2 必要条件</a></li><li><a href="intro.php?phpLang=ja#supported-os">1.3 サポートされているシステム</a></li><li><a href="intro.php?phpLang=ja#src-vs-bin">1.4 ソース vs. バイナリ</a></li></ul></li><li><a href="install.php?phpLang=ja"><b>2 初めてのインストール</b></a><ul><li><a href="install.php?phpLang=ja#bin">2.1 バイナリディストリビューションのインストール</a></li><li><a href="install.php?phpLang=ja#src">2.2 ソースディストリビューションのインストール</a></li><li><a href="install.php?phpLang=ja#setup">2.3 環境の設定</a></li></ul></li><li><a href="packages.php?phpLang=ja"><b>3 パッケージのインストール</b></a><ul><li><a href="packages.php?phpLang=ja#bin-dselect">3.1 dselect によるバイナリパッケージのインストール</a></li><li><a href="packages.php?phpLang=ja#bin-apt">3.2 apt-get を使ったバイナリインストール</a></li><li><a href="packages.php?phpLang=ja#bin-exceptions">3.3 バイナリディストリビューションにない依存パッケージのインストール</a></li><li><a href="packages.php?phpLang=ja#src">3.4 ソースからのパッケージインストール</a></li><li><a href="packages.php?phpLang=ja#fink-commander">3.5 Fink Commander</a></li><li><a href="packages.php?phpLang=ja#available-versions">3.6 用意されているバージョン</a></li><li><a href="packages.php?phpLang=ja#x11">3.7 X11 を使う</a></li></ul></li><li><a href="upgrade.php?phpLang=ja"><b>4 Fink のアップグレード</b></a><ul><li><a href="upgrade.php?phpLang=ja#bin">4.1 バイナリパッケージでのアップグレード</a></li><li><a href="upgrade.php?phpLang=ja#src">4.2 ソースディストリビューションのアップグレード</a></li><li><a href="upgrade.php?phpLang=ja#mix">4.3 バイナリとソースの混在</a></li></ul></li><li><a href="conf.php?phpLang=ja"><b>5 Fink 設定ファイル</b></a><ul><li><a href="conf.php?phpLang=ja#about">5.1 fink.conf について</a></li><li><a href="conf.php?phpLang=ja#syntax">5.2 fink.conf 文法</a></li><li><a href="conf.php?phpLang=ja#required">5.3 必須設定</a></li><li><a href="conf.php?phpLang=ja#optional">5.4 ユーザー設定</a></li><li><a href="conf.php?phpLang=ja#downloading">5.5 ダウンロード設定</a></li><li><a href="conf.php?phpLang=ja#mirrors">5.6 ミラー設定</a></li><li><a href="conf.php?phpLang=ja#developer">5.7 開発者用設定</a></li><li><a href="conf.php?phpLang=ja#advanced">5.8 高度な設定</a></li><li><a href="conf.php?phpLang=ja#sourceslist">5.9 apt の sources.list ファイルを管理</a></li></ul></li><li><a href="usage.php?phpLang=ja"><b>6 コマンドライン fink ツールの使用方法</b></a><ul><li><a href="usage.php?phpLang=ja#using">6.1 fink ツールの使用</a></li><li><a href="usage.php?phpLang=ja#options">6.2 グローバルオプション</a></li><li><a href="usage.php?phpLang=ja#install">6.3 install</a></li><li><a href="usage.php?phpLang=ja#remove">6.4 remove</a></li><li><a href="usage.php?phpLang=ja#purge">6.5 purge</a></li><li><a href="usage.php?phpLang=ja#update-all">6.6 update-all</a></li><li><a href="usage.php?phpLang=ja#list">6.7 list</a></li><li><a href="usage.php?phpLang=ja#apropos">6.8 apropos</a></li><li><a href="usage.php?phpLang=ja#describe">6.9 describe</a></li><li><a href="usage.php?phpLang=ja#plugins">6.10 plugins</a></li><li><a href="usage.php?phpLang=ja#fetch">6.11 fetch</a></li><li><a href="usage.php?phpLang=ja#fetch-all">6.12 fetch-all</a></li><li><a href="usage.php?phpLang=ja#fetch-missing">6.13 fetch-missing</a></li><li><a href="usage.php?phpLang=ja#build">6.14 build</a></li><li><a href="usage.php?phpLang=ja#rebuild">6.15 rebuild</a></li><li><a href="usage.php?phpLang=ja#reinstall">6.16 reinstall</a></li><li><a href="usage.php?phpLang=ja#configure">6.17 configure</a></li><li><a href="usage.php?phpLang=ja#selfupdate">6.18 selfupdate</a></li><li><a href="usage.php?phpLang=ja#selfupdate-rsync">6.19 selfupdate-rsync</a></li><li><a href="usage.php?phpLang=ja#index">6.20 index</a></li><li><a href="usage.php?phpLang=ja#validate">6.21 validate</a></li><li><a href="usage.php?phpLang=ja#scanpackages">6.22 scanpackages</a></li><li><a href="usage.php?phpLang=ja#cleanup">6.23 cleanup</a></li><li><a href="usage.php?phpLang=ja#dumpinfo">6.24 dumpinfo</a></li><li><a href="usage.php?phpLang=ja#show-deps">6.25 show-deps</a></li></ul></li></ul>
<!--Generated from $Fink: uguide.ja.xml,v 1.32 2023/08/04 4:49:23 nieder Exp $-->
<?php include_once "../../footer.inc"; ?>


