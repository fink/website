<?
$title = "パッケージ化";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/09 15:29:17';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ化 Contents"><link rel="next" href="intro.php?phpLang=ja" title="序章">';

include_once "header.inc";
?>

<h1>Fink パッケージの作成</h1>
		<p>
			本ドキュメントは Fink パッケージ管理システム用のパッケージ詳細の作成方法について述べています。
			また、 Fink ディストリビューションのポリシーとガイドラインも含んでいます。
			詳細の形式とディストリビューションポリシーはまだ発展段階ですので、このページの
			"Last changed" の情報と CVS タグを確認して下さい。
			現在の本ドキュメントは fink パッケージ管理システム 0.9.0 開発バージョン以降に関するものです。
		</p>
		<p>
			Fink 用にパッケージを作成した場合、 <a href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a>
			メーリングリストを購読して下さい。
			もし Fink を手伝おうと思って十分な能力があるなら、<a href="http://fink.sourceforge.net/pdb/nomaintainer.php">
				メンテナのいないパッケージ</a>のご協力をお願いいたします。
		</p>
	<h2>Contents</h2><ul>
	<li><a href="intro.php?phpLang=ja"><b>1 序章</b></a><ul><li><a href="intro.php?phpLang=ja#def1">1.1 パッケージとは何か?</a></li><li><a href="intro.php?phpLang=ja#ident">1.2 パッケージの特定</a></li></ul></li><li><a href="format.php?phpLang=ja"><b>2 パッケージ詳細</b></a><ul><li><a href="format.php?phpLang=ja#trees">2.1 Tree レイアウト</a></li><li><a href="format.php?phpLang=ja#format">2.2 ファイル形式</a></li><li><a href="format.php?phpLang=ja#percent">2.3 パーセント拡張</a></li></ul></li><li><a href="policy.php?phpLang=ja"><b>3 パッケージ化ポリシー</b></a><ul><li><a href="policy.php?phpLang=ja#licenses">3.1 パッケージのライセンス</a></li><li><a href="policy.php?phpLang=ja#prefix">3.2 基本システムインターフェイス</a></li><li><a href="policy.php?phpLang=ja#sharedlibs">3.3 共有ライブラリ (Shared Libraries)</a></li><li><a href="policy.php?phpLang=ja#perlmods">3.4 Perl モジュール</a></li></ul></li><li><a href="fslayout.php?phpLang=ja"><b>4 ファイルシステムのレイアウト</b></a><ul><li><a href="fslayout.php?phpLang=ja#fhs">4.1 ファイルシステム構造標準 (Filesystem Hierarchy Standard)</a></li><li><a href="fslayout.php?phpLang=ja#dirs">4.2 ディレクトリ</a></li><li><a href="fslayout.php?phpLang=ja#avoid">4.3 回避すること</a></li></ul></li><li><a href="reference.php?phpLang=ja"><b>5 参照</b></a><ul><li><a href="reference.php?phpLang=ja#build">5.1 ビルドプロセス</a></li><li><a href="reference.php?phpLang=ja#fields">5.2 フィールド</a></li><li><a href="reference.php?phpLang=ja#splitoffs">5.3 スプリットオフ (SplitOff)</a></li><li><a href="reference.php?phpLang=ja#scripts">5.4 スクリプト</a></li><li><a href="reference.php?phpLang=ja#patches">5.5 パッチ</a></li><li><a href="reference.php?phpLang=ja#profile.d">5.6 Profile.d スクリプト</a></li></ul></li></ul><!--Generated from $Fink: packaging.ja.xml,v 1.1 2004/03/09 15:29:17 babayoshihiko Exp $-->

<? include_once "footer.inc"; ?>
