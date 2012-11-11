<?
$title = "移植";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:16';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="移植 Contents"><link rel="next" href="basics.php?phpLang=ja" title="基本">';


include_once "header.ja.inc";
?>
<h1>Unix ソフトウェアの Darwin と Mac OS X への移植</h1>
    <p>
		この文書は Unix アプリケーションを Darwin や Mac OS X へ移植する際に有用な情報を集めています．
		ここでの情報の多くは， Mac OS X バージョン 10.0.0 と Darwin 1.3.x に適用されます．
		どちらも Mac OS X は Darwin のスーパーセットなので，両者を Darwin という言葉で示します．
		</p>
  <h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="basics.php?phpLang=ja"><b>1 基本</b></a><ul><li><a href="basics.php?phpLang=ja#heritage">1.1 Darwin はどこから来たのか</a></li><li><a href="basics.php?phpLang=ja#compiler">1.2 コンパイラとツール</a></li><li><a href="basics.php?phpLang=ja#host-type">1.3 ホスト種別</a></li><li><a href="basics.php?phpLang=ja#libraries">1.4 ライブラリ</a></li><li><a href="basics.php?phpLang=ja#other-sources">1.5 他の情報源</a></li></ul></li><li><a href="shared.php?phpLang=ja"><b>2 共有コード</b></a><ul><li><a href="shared.php?phpLang=ja#lib-and-mod">2.1 共有ライブラリ vs ローダブル・モジュール</a></li><li><a href="shared.php?phpLang=ja#version">2.2 バージョン番号</a></li><li><a href="shared.php?phpLang=ja#cflags">2.3 コンパイラフラグ</a></li><li><a href="shared.php?phpLang=ja#build-lib">2.4 共有ライブラリ をビルド</a></li><li><a href="shared.php?phpLang=ja#build-mod">2.5 モジュールをビルド</a></li></ul></li><li><a href="libtool.php?phpLang=ja"><b>3 GNU libtool</b></a><ul><li><a href="libtool.php?phpLang=ja#situation">3.1 状況</a></li><li><a href="libtool.php?phpLang=ja#patch-135">3.2 1.3.5 パッチ</a></li><li><a href="libtool.php?phpLang=ja#fixing-14x">3.3 1.4.x を修正</a></li><li><a href="libtool.php?phpLang=ja#notes">3.4 さらなる注記</a></li></ul></li><li><a href="preparing-10.2.php?phpLang=ja"><b>4 10.2 に向けて</b></a><ul><li><a href="preparing-10.2.php?phpLang=ja#bash">4.1 bash シェル</a></li><li><a href="preparing-10.2.php?phpLang=ja#gcc3">4.2 gcc3 コンパイラ</a></li></ul></li><li><a href="preparing-10.3.php?phpLang=ja"><b>5 10.3 に向けて</b></a><ul><li><a href="preparing-10.3.php?phpLang=ja#perl">5.1 Perl</a></li><li><a href="preparing-10.3.php?phpLang=ja#typedef">5.2 新しいシンボル定義</a></li><li><a href="preparing-10.3.php?phpLang=ja#system-libs">5.3 新しいシステムのライブラリ</a></li></ul></li><li><a href="preparing-10.4.php?phpLang=ja"><b>6 10.4 に向けて</b></a><ul><li><a href="preparing-10.4.php?phpLang=ja#perl">6.1 Perl</a></li><li><a href="preparing-10.4.php?phpLang=ja#typedef">6.2 新しいシンボル定義</a></li><li><a href="preparing-10.4.php?phpLang=ja#system-libs">6.3 新しいシステムライブラリ</a></li></ul></li></ul>
<!--Generated from $Fink: porting.ja.xml,v 1.10 2012/11/11 15:20:16 gecko2 Exp $-->
<? include_once "../../footer.inc"; ?>


