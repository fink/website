<?php
$title = "パッケージ作成 - 始めに";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2024/11/12 10:05:32';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="next" href="format.php?phpLang=ja" title="パッケージ記述"><link rel="prev" href="index.php?phpLang=ja" title="パッケージ作成 Contents">';


include_once "header.ja.inc";
?>
<h1>パッケージ作成 - 1. 始めに</h1>
		
		
		<h2><a name="def1">1.1 パッケージとは何か?</a></h2>
			
			<p>
				パッケージとは，基本的単位を構成するソフトウェアのまとまりを指します．
				典型的なパッケージには，例えば実行可能プログラム，それが必要とするデータファイル，
				国際化のためのメッセージカタログ，そしてドキュメントが含まれます．
				Fink のパッケージには2種類の形式があります．
				すなわちパッケージ記述情報と，そのままインストール可能なバイナリパッケージファイルです．
			</p>
			<p>
				パッケージ記述情報は人でも読めるテキストファイルで，
				パッケージをビルドするために必要な (つまりバイナリパッケージファイルを作るのに必要な) 全ての情報を含みます．
				それにはメタデータ (パッケージ名や目的を記した文章) やソースコードの URL の他，
				パッケージの configure ，コンパイルやバイナリパッケージの生成に必要な命令が書かれています．
			</p>
			<p>
				バイナリパッケージファイルとは，パッケージを実際に構成する各ファイルのアーカイブを指し，
				中には実行可能プログラム，データファイル，メッセージカタログ，ライブラリ，インクルードファイルなどが含まれます．
				また，そのパッケージに関するメタデータも含まれます．
				バイナリパッケージは既にそのまま使用できる形式ですので，インストールとは主に中身の展開です．
				Finkはパッケージ管理システム dpkg の上に構築されたシステムですので，
				バイナリパッケージには dpkg の形式が使われ，拡張子は .deb です．
			</p>
		
		<h2><a name="ident">1.2 パッケージの区別</a></h2>
			
			<p>
				パッケージは3つの文字列で区別されます．
				すなわちパッケージ名，version と revision です．
				これらのいずれにも英小文字 (a から z)，数字 (0 から 9)， ダッシュ (-; 註: revision 中には使えません)，プラス (+)，ドット (.) のみが使えます．
				この他の字は使えません．
				特に，大文字と下線 (_) が使えないことに注意して下さい．
			</p>
			<p>
				「パッケージ名」にはソフトウェアの名前 (openssh など) をそのまま使います．
				version は「upstream バージョン」とも呼ばれますが，これには元となるソフトウェアパッケージのバージョンを使います．
				version には (2.9p1 のように) 数字以外を使っても構いません．
				Fink も dpkg もそれらを認識してソートできます．
				revision はカウンタで，最初は 1 で始まり，パッケージ記述情報への変更回数に応じて 1 ずつ増加します．
				「upstream バージョン」が変化すると再び 1 に戻ります．
				revision にダッシュを使ってはいけません．
				Fink パッケージの正式名称はパッケージ名，version と revision をダッシュでつないだもので，
				"openssh-2.9p1-2" などという形式になります．
			</p>
		
	<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="format.php?phpLang=ja">2. パッケージ記述</a></p>
<?php include_once "../../footer.inc"; ?>


