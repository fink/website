<?
$title = "移植 - 基本";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2006/01/25 03:57:27';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="移植 Contents"><link rel="next" href="shared.php?phpLang=ja" title="共有コード"><link rel="prev" href="index.php?phpLang=ja" title="移植 Contents">';


include_once "header.ja.inc";
?>
<h1>移植 - 1. 基本</h1>
    
    
    <h2><a name="heritage">1.1 Darwin はどこから来たのか</a></h2>
      
      <p>
			Darwin は Unix ライクなオペレーティングシステムとして， NeXTStep / OpenStep から派生してきました．
			これはまた， 4.4BSD Lite から分岐してきたとも言われています．
			BSD の遺産もあり，実際 Darwin は近年 FreeBSD と NetBSD のコードによって近代化されてきました．
			</p>
      <p>
			Darwin のカーネルは，Mach 3.0 ，BSD，オブジェクト指向ドライバレイヤ IOKit などの商用機能などの混合です．
			Mac は元々マイクロカーネルとして設計されていましたが，この上にある BSD カーネルはモノリシックであり，両者は今では相互に依存し，一つのカーネルとして見ることができます．
			</p>
      <p>
			Darwin にあるユーザー空間のツールやライブラリはほとんど BSD 由来のもので，Linux のような GNU ツールではありません．
			Apple は他の BSD のように厳密ではなく，有益な妥協もしています．
			たとえば， Apple は BSD make と GNU make の両方を付けて， GNU make をデフォルトとしています．
			</p>
    
    <h2><a name="compiler">1.2 コンパイラとツール</a></h2>
      
      <p>
			短い説明: コンパイラは gcc の葉生物ですが， <code>cc</code> としてインストールされます．
			Makefile にパッチを当てる必要があるでしょう．
			ほとんどのパッケージは 共有ライブラリ をビルドしません．
			マクロに関係するエラーが出た時は，<code>-no-cpp-precomp</code> オプションを使用してください．
			</p>
      <p>
			長い説明: Mac OS X Developer Tools にあるコンパイラツールチェーンは不思議な生き物です．
			コンパイラは gcc 2.95.2 スイートをもとに， Objective C 言語やいくつかの Darwin 特有なことをサポートする変更がなされています．
			プリプロセサー  (<code>cpp</code>) は二つのバージョンがあります．
			ひとつは通常の(gcc 2.95.2 からの) プリコンパイラで，もう一つは Apple による，コンパイル済みヘッダをサポートする特別なプリコンパイラです．
			こちらの方が高速で，デフォルトになっています．
			しかし，コードによっては Apple のプリコンパイラではコンパイルできません．
			この場合，<code>-no-cpp-precomp</code> オプションを使い，通常のプリコンパイラでコンパイルします．
			(注記: 以前は <code>-traditional-cpp</code> オプションを勧めていました．
			このオプションの意味が GCC 3 で少し変わったため，これを使うパッケージのほとんどを破壊してしまいました．
			<code>-no-cpp-precomp</code> は現在の Developer Tools と 将来の GCC 3 ベースのコンパイラの双方に要求通りのことをしてくれます．)
			</p>
      <p>
			アッセンブラは gas 1.38 ベースだと言いますが，リンカは GNU ツールではありません．
			これは 共有ライブラリ をビルドする際に問題となります．
			GNU libtool とこれが生成する configure スクリプトは Apple のリンカの扱い方を知らないためです．
			</p>
    
    <h2><a name="host-type">1.3 ホスト種別</a></h2>
      
      <p>
			短い説明: configure が 'Can't determine host type' と言って異常終了した場合，config.guess と config.sub を /usr/share/libtool (OS バージョン 10.2 以前では /usr/libexec) を現在のディレクトリにコピーしてください．
			</p>
      <p>長い説明: GNU の世界では，システムの種類を特定するために基準形式を採用しています．
これには３つのパートがあります: CPU 種別，メーカー，オペレーティングシステム．
４つ目のパートがつくこともあります．
全て小文字で表記され，ダッシュでつながれます．
例: <code>i586-pc-linux-gnu</code>, <code>hppa1.1-hp-hpux10.20</code>, <code>sparc-sun-solaris2.6</code>．
Mac OS X 10.0 のホスト種別は <code>powerpc-apple-darwin1.3</code> です．
</p>
      <p>
			autoconf を使うパッケージは多くの場合，コンパイル環境のシステム種別を知りたがります．
			(注記: クロスコンパイルと移植のサポートのため，３つの種別 - ホスト種別，ビルド種別，ターゲット種別があります．
			通常は全て同一です．)
			ホスト種別は configure スクリプトに渡すことも，自動推測してもらうこともできます．
			</p>
      <p>
			configure スクリプトは二つの付属スクリプトでホスト種別を決定します．
			<code>config.guess</code> がホスト種別の推測を試み，<code>config.sub</code> で検証・正規化をします．
			両スクリプトは別々にメンテナンスされていますが，全てのパッケージに含まれます．
			最近までこのスクリプトは Darwin も Mac OS X も知りませんでした．
			もし Darwin を認識しないパッケージがあった場合， configu.guess と config.sub を置き換える必要があります．
			功にも， Apple が動作するバージョンのものを /usr/share/libtool (10.2 以前の OS では /usr/libexec) に置いていますので，そこからコピーしてください．
			</p>
    
    <h2><a name="libraries">1.4 ライブラリ</a></h2>
      
      <p>
			短い説明: <code>-lm</code> を削除しても問題ありませんが，する必要もありません．
			</p>
      <p>
			長い説明: Mac OS X は libc, libm, libcurses, libpthread などのライブラリを分割して持っていません．
			代わりに，これらは全てシステムライブラリ libSystem の一部となっています．
			(以前のバージョンではこれは System のフレームワークでした．)
			しかし， Apple は適切にシンボリックリンクを /usr/lib に置いていますので，<code>-lm</code> でリンクすれば動作します．
			唯一の例外は <code>-lutil</code> です．
			他のシステムでは，libutil は疑似ターミナルや，ログイン監査などの関数を含んでいます．
			これらの関数は libSystem にはなく， libutil.dylib へのシンボリックリンクもありません．
			</p>
    
    <h2><a name="other-sources">1.5 他の情報源</a></h2>
      
      <p>ポーティングに関する他の情報源としては，<a href="http://www.metapkg.org/wiki">MetaPkg Wiki</a> があります．</p>
      <p>Apple Technical Note <a href="http://developer.apple.com/technotes/tn2002/tn2071.html">TN2071</a>: "Porting Command Line Unix Tools to Mac OS X" も読むとよいでしょう．</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="shared.php?phpLang=ja">2. 共有コード</a></p>
<? include_once "../../footer.inc"; ?>


