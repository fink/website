<?
$title = "パッケージ作成";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/30 03:09:24';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="next" href="intro.php?phpLang=ja" title="始めに">';

include_once "header.inc";
?>

<h1>Fink パッケージの作成</h1>
		<p>
			このマニュアルではパッケージ管理システム Fink 用のパッケージ情報の記述方法を解説します．
			また Fink ディストリビューションのポリシーとガイドラインも解説します．
			パッケージ情報の書式もディストリビューションのポリシーも共に発展途上なので，
			"Last changed" (最終更新) 情報とこのページの CVS タグに注意して，更新に気付いて下さい．
			ここで扱うのはパッケージ管理システム Fink の「0.9.0 開発版」以降で使われる書式とポリシーの説明です．
		</p>
		<p>
			Fink 用にパッケージを作成した場合，メーリングリスト
			<a href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a> を購読するとよいでしょう．
			Fink に貢献する方法をお探しで，この分野のスキルをお持ちなら，
			<a href="http://fink.sourceforge.net/pdb/nomaintainer.php">現在メインテナのいないパッケージ</a>
			を引き継ぐことをご考慮下さい．
		</p>
	<h2>Contents</h2><ul>
	<li><a href="intro.php?phpLang=ja"><b>1 始めに</b></a><ul><li><a href="intro.php?phpLang=ja#def1">1.1 パッケージとは何か?</a></li><li><a href="intro.php?phpLang=ja#ident">1.2 パッケージの区別</a></li></ul></li><li><a href="format.php?phpLang=ja"><b>2 パッケージ記述情報</b></a><ul><li><a href="format.php?phpLang=ja#trees">2.1 ツリーレイアウト</a></li><li><a href="format.php?phpLang=ja#format">2.2 ファイル形式</a></li><li><a href="format.php?phpLang=ja#percent">2.3 パーセント記法の展開</a></li></ul></li><li><a href="policy.php?phpLang=ja"><b>3 パッケージ化ポリシー</b></a><ul><li><a href="policy.php?phpLang=ja#licenses">3.1 パッケージのライセンス</a></li><li><a href="policy.php?phpLang=ja#prefix">3.2 基盤システムへの干渉問題</a></li><li><a href="policy.php?phpLang=ja#sharedlibs">3.3 共有ライブラリ (Shared Libraries)</a></li><li><a href="policy.php?phpLang=ja#perlmods">3.4 Perl モジュール</a></li></ul></li><li><a href="fslayout.php?phpLang=ja"><b>4 ファイルシステムのレイアウト</b></a><ul><li><a href="fslayout.php?phpLang=ja#fhs">4.1 ファイルシステム構造標準 (Filesystem Hierarchy Standard)</a></li><li><a href="fslayout.php?phpLang=ja#dirs">4.2 ディレクトリ</a></li><li><a href="fslayout.php?phpLang=ja#avoid">4.3 避けるべきこと</a></li></ul></li><li><a href="reference.php?phpLang=ja"><b>5 リファレンスマニュアル</b></a><ul><li><a href="reference.php?phpLang=ja#build">5.1 ビルドプロセス</a></li><li><a href="reference.php?phpLang=ja#fields">5.2 フィールド</a></li><li><a href="reference.php?phpLang=ja#splitoffs">5.3 スプリットオフ (SplitOff)</a></li><li><a href="reference.php?phpLang=ja#scripts">5.4 スクリプト</a></li><li><a href="reference.php?phpLang=ja#patches">5.5 パッチ</a></li><li><a href="reference.php?phpLang=ja#profile.d">5.6 Profile.d スクリプト</a></li></ul></li></ul><!--Generated from $Fink: packaging.ja.xml,v 1.4 2004/03/30 03:09:24 babayoshihiko Exp $-->

<? include_once "footer.inc"; ?>
