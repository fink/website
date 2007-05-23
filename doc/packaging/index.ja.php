<?
$title = "パッケージ作成";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2007/05/23 05:14:07';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="next" href="intro.php?phpLang=ja" title="始めに">';


include_once "header.ja.inc";
?>
<h1>Fink パッケージの作成方法</h1>
		<p>
			このマニュアルではパッケージ管理システム Fink 用のパッケージ記述 (Package Description) の作成方法を解説します．
			また Fink ディストリビューションのポリシーとガイドラインも解説します．
			パッケージ記述の書式もディストリビューションのポリシーも共に発展途上です．
			"Last changed" (最終更新) 情報とこのページの CVS タグを確認することで，更新されているかがわかります．
			ここで扱うのはパッケージ管理システム Fink の「0.9.0 以降の開発版」で使われる書式とポリシーの説明です．
		</p>
		<p>
			Fink 用にパッケージを作成した場合，メーリングリスト
			<a href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a> を購読するとよいでしょう．
			Fink に貢献する方法を探していて，関連分野のスキルをお持ちなら，是非とも
			<a href="http://pdb.finkproject.org/pdb/nomaintainer.php">現在メンテナのいないパッケージ</a>
			のメンテナンスをお願いいたします．
		</p>
	<h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=ja"><b>1 始めに</b></a><ul><li><a href="intro.php?phpLang=ja#def1">1.1 パッケージとは何か?</a></li><li><a href="intro.php?phpLang=ja#ident">1.2 パッケージの区別</a></li></ul></li><li><a href="format.php?phpLang=ja"><b>2 パッケージ記述</b></a><ul><li><a href="format.php?phpLang=ja#trees">2.1 ツリーレイアウト</a></li><li><a href="format.php?phpLang=ja#format">2.2 ファイル形式</a></li><li><a href="format.php?phpLang=ja#percent">2.3 パーセント展開</a></li></ul></li><li><a href="policy.php?phpLang=ja"><b>3 パッケージ化ポリシー</b></a><ul><li><a href="policy.php?phpLang=ja#licenses">3.1 パッケージのライセンス</a></li><li><a href="policy.php?phpLang=ja#openssl">3.2 GPL と OpenSSL</a></li><li><a href="policy.php?phpLang=ja#prefix">3.3 基盤システムへの干渉問題</a></li><li><a href="policy.php?phpLang=ja#sharedlibs">3.4 共有ライブラリ</a></li><li><a href="policy.php?phpLang=ja#perlmods">3.5 Perl モジュール</a></li><li><a href="policy.php?phpLang=ja#emacs">3.6 Emacs ポリシー</a></li></ul></li><li><a href="fslayout.php?phpLang=ja"><b>4 ファイルシステムのレイアウト</b></a><ul><li><a href="fslayout.php?phpLang=ja#fhs">4.1 ファイルシステム構造標準 (Filesystem Hierarchy Standard)</a></li><li><a href="fslayout.php?phpLang=ja#dirs">4.2 ディレクトリ</a></li><li><a href="fslayout.php?phpLang=ja#avoid">4.3 避けるべきこと</a></li></ul></li><li><a href="compilers.php?phpLang=ja"><b>5 コンパイラ</b></a><ul><li><a href="compilers.php?phpLang=ja#versions">5.1 コンパイラバージョン</a></li><li><a href="compilers.php?phpLang=ja#abi">5.2 g++ ABI</a></li></ul></li><li><a href="reference.php?phpLang=ja"><b>6 リファレンスマニュアル</b></a><ul><li><a href="reference.php?phpLang=ja#build">6.1 ビルドプロセス</a></li><li><a href="reference.php?phpLang=ja#fields">6.2 フィールド</a></li><li><a href="reference.php?phpLang=ja#splitoffs">6.3 スプリットオフ (SplitOff)</a></li><li><a href="reference.php?phpLang=ja#scripts">6.4 スクリプト</a></li><li><a href="reference.php?phpLang=ja#patches">6.5 パッチ</a></li><li><a href="reference.php?phpLang=ja#profile.d">6.6 Profile.d スクリプト</a></li></ul></li></ul>
<!--Generated from $Fink: packaging.ja.xml,v 1.43 2007/05/23 05:14:07 babayoshihiko Exp $-->
<? include_once "../../footer.inc"; ?>


