<?
$title = "移植 - 共有コード";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2006/01/25 03:57:27';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="移植 Contents"><link rel="next" href="libtool.php?phpLang=ja" title="GNU libtool"><link rel="prev" href="basics.php?phpLang=ja" title="基本">';


include_once "header.ja.inc";
?>
<h1>移植 - 2. 共有コード</h1>
    
    
    <h2><a name="lib-and-mod">2.1 共有ライブラリ vs ローダブル・モジュール</a></h2>
      
      <p>
			Mach-0 の仕様の一つであ，多くの人を驚かせるものとして， 共有ライブラリ と 動的ローダブル・モジュールを厳密に区別します．
			ELF システムでは両者は同質で，共有コードのどの部分でも，ライブラリとしても動的ローディングにも使うことができます．
			</p>
      <p>
			Mach-O 共有ライブラリ のファイルタイプは MH_DYLIB で，拡張子は <code>.dylib</code> となります．
			これは通常の静的リンカフラグ，例えば libfoo.dylib の場合は <code>-lfoo</code> でリンクすることができます．
			しかし，モジュールとしてロードすることはできません．
			(注記: 共有ライブラリ は API を通して動的にロードすることができます．
			しかし API はバンドルの場合と異なり，dlopen() エミュレーションの意味を無くします．
			特筆すべきこととして， 共有ライブラリ はアンロードできません．)
			</p>
      <p>
			ローダブル・モジュールは Mach-O の用語では"バンドル"と言われ，ファイルタイプは MH_BUNDLE です．
			これを用いるコンポーネントは拡張子を気にしないので，拡張子は何でも構いません．
			<code>.bundle</code> という拡張子が Apple の推奨ですが，移植されたソフトウェアのほとんどは，互換性のため <code>.so</code> を使っています．
			バンドルは dyld API を用いて動的にロード／アンロードされることができますし，この API の上に <code>dlopen()</code> をエミュレートするラッパもあります．
			バンドルを 共有ライブラリ のようにリンクすることはできませんが，バンドルを 共有ライブラリ にリンクさせることは可能です．
			この場合，バンドルがロードされた際に両者ともロードされます．
			</p>
    
    <h2><a name="version">2.2 バージョン番号</a></h2>
      
      <p>
			ELF システムでは通常， <code>libqt.so.2.3.0</code> のようにバージョン番号はファイル名に後置されます．
			Darwin では，<code>libqt.2.3.0.dylib</code> にようにバージョン番号はライブラリ名と拡張子の間に置かれます．
			これにより， <code>-lqt.2.3.0</code> のように，特定バージョンのライブラリをリンク時に指定することができます．
			</p>
      <p>
			共有ライブラリを作成する場合，実行時に検索するライブラリの名前を指定することができます．
			これはよく行われることで，これによって，ライブラリのいくつかのメジャーバージョンをインストールすることが可能になります．
			ELF システムでは，これは <code>soname</code> と言われています．
			Darwin の場合，ファイル名の他にフルパスを指定することができ（またする必要があり）ます．
			これにより，"rpath" オプションと ldconfig/ld.so.cache システムが不要になります．
			まだインストールされていないライブラリを使うには， DYLD_LIBRARY_PATH 環境変数を設定することもできます．
			詳細は dyld の man ページをご覧ください．
			</p>
      <p>
			Mach-O 形式は，ELF システムの関知しないマイナーバージョンの確認を行います．
			Mach-O ライブラリは二つのバージョン番号: "current" バージョンと "compatibility" バージョンがあります．
			両方のバージョン番号は３つの番号を 1.4.2 のようにドットでつなげます．
			最初の番号は 0 ではいけません．
			２つ目と３つ目の番号は省略可能で，この場合 0 と扱われます．
			バージョン番号を指定しなかった場合， 0.0.0 と扱われ，ある種のワイルドカード値となります．
			</p>
      <p>
			"current" バージョンは情報提供のためのみ存在します．
			"compatibility" バージョンは以下のように確認目的に使用されます．
			実行可能ファイルをリンクする際，ライブラリからの情報がファイルにコピーされます．
			ファイルが実行される際に使用するライブラリに対して情報を確認します．
			使用するライブラリのバージョンが，リンク時のものと同一か新しいものでない限り，実行時エラーを生成してプログラムを終了させます．
			</p>
    
    <h2><a name="cflags">2.3 コンパイラフラグ</a></h2>
      
      <p>
			位置独立コード (PIC: Position Independent Code) の生成は Darwin ではデフォルトです．
			実際， PowerPC コードは設計上 position-independent となり，パフォーマンスや空間上の損失はありません．
			このため，共有ライブラリやモジュールへコードをコンパイルする際も，PIC を指定する必要はありません．
			しかし，リンカは"共通"のシンボルを共有ライブラリ内に持つことは認めないので， <code>-fno-common</code> コンパイラオプションが必要になります．
			</p>
    
    <h2><a name="build-lib">2.4 共有ライブラリ をビルド</a></h2>
      
      <p>
			共有ライブラリをビルドするには， <code>-dynamiclib</code> 付きでコンパイラドライバを呼び出します．
			以下の一連の例を見るとわかりやすいでしょう．
			ここでは source.c と code.c というソースからなる libfoo というライブラリビルドするとします．
			バージョン番号は 2.4.5 ，2 が主リビジョン (非互換の API 変更)， 4 が副リビジョン (後方互換な API の変更)，5 がバグ修正リビジョンかうんと (人によっては"teeny" リビジョンといい，完全に互換性のある変更です)です．
			このライブラリは他の共有ライブラリには依存せず， /usr/local/lib にインストールされます．
			</p>
      <pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -dynamiclib -install_name /usr/local/lib/libfoo.2.dylib \
 -compatibility_version 2.4 -current_version 2.4.5 \
 -o libfoo.2.4.5.dylib source.o code.o
rm -f libfoo.2.dylib libfoo.dylib
ln -s libfoo.2.4.5.dylib libfoo.2.dylib
ln -s libfoo.2.4.5.dylib libfoo.dylib</pre>
      <p>
バージョンのどの部分がどこで使われたかわかりましたか．
また，静的リンカが libfoo.dylib シンボリックリンクを使い，動的リンカは libfoo.2.dylib シンボリックリンクを使うことに注意してください．
それぞれのシンボリックリンクをライブラリの異なるリビジョンへつなげることも可能です．

</p>
    
    <h2><a name="build-mod">2.5 モジュールをビルド</a></h2>
      
      <p>
ローダブル・モジュールをビルドするためには，<code>-bundle</code> オプション付きでコンパイラドライバを呼び出します．
モジュールがホストプログラムのシンボルを使う場合， <code>-undefined suppress</code> を指定して未定義のシンボルを使い， <code>-flat_namespace</code> を指定して新しいリンカが Mac OS X 10.1 でも使えるようにします．
一連の例:
</p>
      <pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -bundle -flat_namespace -undefined suppress \
 -o mymodule.so source.o code.o</pre>
      <p>
バージョン番号は使用していません．
理論的には使うことも可能ですが，実際あまり意味がありません．
また，バンドルには名称上の制限が無いことに注意してください．
パッケージによっては，他のシステムが要求するため "lib" を前置しますが，これも無害です．
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="libtool.php?phpLang=ja">3. GNU libtool</a></p>
<? include_once "../../footer.inc"; ?>


