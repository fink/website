<?
$title = "パッケージ作成 - ポリシー";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/30 03:03:07';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="next" href="fslayout.php?phpLang=ja" title="ファイルシステムのレイアウト"><link rel="prev" href="format.php?phpLang=ja" title="パッケージ記述情報">';

include_once "header.inc";
?>

<h1>パッケージ作成 - 3 パッケージ化ポリシー</h1>
		
		

		<h2><a name="licenses">3.1 パッケージのライセンス</a></h2>
			
			<p>
				Fink に含まれるパッケージのライセンスは多肢に渡ります．
				それらの大部分は，ソース全体の再配布と，特に実行可能ファイルの配布に制限を課します．
				パッケージの中には，ライセンスのためにバイナリ配布を行えないものもあります．
				そのため，パッケージのメインテナがライセンスを注意深くチェックすることが大変に重要です．
			</p>
			<p>
				バイナリ・パッケージとして配布される全てのパッケージは，ライセンスのコピーも含んでいなければいけません．
				ライセンスは doc ディレクトリすなわち <code>%p/share/doc/%n</code> にインストールされます．
				(InstallScript では，当然ながら %p でなく %i を使う必要があります．
				フィールド DocFiles に記述することで細々とした処理は自動的に処理されます．)
				元のソースに明示的なライセンスが存在しない場合，パッケージの状態を記した短いテキストを代わりとします．
				大半のライセンスは，ライセンスが配布物に必ず含まれるよう定めています．
				Finkのポリシーは「ライセンスを含めるよう明示的に要求されなくとも，常にライセンスを含める」ことです．
			</p>
			<p>
				バイナリディストリビューションのメインテナンスを自動化するため，
				配布されるどのパッケージにもフィールド <code>License</code> がなければいけません．
				このフィールドはライセンスの性質に関するもので，
				当該パッケージをバイナリディストリビューションに含めるかどうかを決定する際に参照されます．
				このフィールドは実際のライセンス条項ファイルが上記のようにバイナリパッケージに含まれているときのみ存在できます．
			</p>
			<p>
				フィールド License を有効に使用するため，値は下記の中から選択して下さい．
				下記の選択肢に当てはまらないパッケージの場合，開発用メーリングリストへ質問を投げかけて下さい．
			</p>
			<ul>

				<li>
					<code>GPL</code> - GNU General Public License．
					ソースがバイナリと同じ場所から入手できる必要がある．
				</li>
				<li>
					<code>LGPL</code> - GNU Lesser General Public License．
					ソースがバイナリと同じ場所から入手できる必要がある．
				</li>
				<li>
					<code>GPL/LGPL</code> -
					これはパッケージの一部 (実行可能ファイルなど) が GPL で，別の部分 (ライブラリなど) が LGPL などの特殊な場合．
				</li>
				<li>
					<code>BSD</code>  -
					BSD形式のライセンス．
					これには，いわゆる「オリジナル」 BSD ライセンス，「修正」 BSD ライセンスおよび MIT ライセンスが含まれる．
					The Apache lisence もこの一種とみなす．
					これらのライセンスでは，ソースコードの配布は必須ではない．
				</li>
				<li>
					<code>Artistic</code> -
					The Artistic lisence 及びその派生型．
				</li>
				<li>
					<code>Artistic/GPL</code> -
					Artistic と GPL のデュアルライセンス．
				</li>
				<li>
					<code>GNU Free Documentation License</code> および <code>Linux Documentation Project</code> -
					付属ドキュメントが明示的にこのライセンスのどちらかを採用している場合，
					そのことは <code>/GFDL</code> と <code>/LDP</code> のいずれか，または両方を後置することで示す．
					結果として，以下の組合せが可能: "GFDL", "GPL/GFDL", "LGPL/GFDL", "GPL/LGPL/GFDL",
					"LDP", "GPL/LGPL/LDP".
				</li>
				<li>
					<code>OSI-Approved</code> -
					<a href="http://www.opensource.org/">Open Source Initiative</a> が承認した，その他の Open Source ライセンス．
					OSIの要求には，バイナリとソースの自由な配布が許されることが含まれる．
					デュアルライセンスのパッケージにとりあえずこの選択肢を選ぶこともできます．
				</li>
				<li>
					<code>Restrictive</code> -
					制限付きのライセンス．
					作者からソース形式で free use のために入手できるが，自由な再配布は許可されないパッケージに使う．
				</li>
				<li>
					<code>Restrictive/Distributable</code> -
					ソースとバイナリの配布を許可するが制限のあるライセンス．
					当該パッケージが作者からソース形式で入手でき，ソースとバイナリの配布も許可されているが，
					Open Source ライセンスと認められない制限がある場合に使用する．
				</li>
				<li>
					<code>Commercial</code> -
					制限付きの商用ライセンス．
					ソースやバイナリの自由な再配布を許可しない商用パッケージ (例えばフリーウェアやシェアウェア) に使う．
				</li>
				<li>
					<code>Public Domain</code> -
					パブリックドメインにあるパッケージ．
					パブリックドメインとは，作者がコードに対するコピーライトを放棄したことを指す．
					この場合，パッケージにはライセンスが存在せず，だれが何をしても良い．
				</li>
			</ul>
		

		<h2><a name="prefix">3.2 基盤システムへの干渉問題</a></h2>
			
			<p>
				Finkは基盤システムから分離したディレクトリにインストールされるアドオン・ディストリビューションです．
				パッケージは Fink のディレクトリ外にはファイルをインストールしてはしてはいけません．
			</p>
			<p>
				この決まりを破る他に可能性がないときには例外 (XFree86 など) が設けられます．
				この場合，パッケージはインストール前に既存のファイルを調べ，上書きの恐れがある場合はインストールを中止する必要があります．
				そのようなパッケージは，そのパッケージが削除されるときに Fink ディレクトリ外にインストールしたファイルを全て削除するか，
				あるいは残しても問題がないかを十分確認する必要があります
				(例えば，実行前に実行可能ファイルが存在するかなどのチェックなどを行う必要があります)．
			</p>
		

		<h2><a name="sharedlibs">3.3 共有ライブラリ (Shared Libraries)</a></h2>
			
			<p>
				Fink は共有ライブラリに関して新しいポリシーを定め， 2002 年 2 月から施行しています．
				本節では Fink 0.5.0 と共に公布された，共有ライブラリについてのポリシー第4版について説明します．
				最初に要点をかいつまんで述べ，後から詳細に移ります．
			</p>
			<p>
				共有ライブラリをビルドするパッケージで，
				(1) ツリー stable に入っているか，または (2) 新規のパッケージである場合，
				Fink ポリシーに従って共有ライブラリを扱う必要があります．
				すなわち以下の約束に従うことになります．
			</p>
			<ul>
				<li>
					コマンド <code>otool -L</code> を使い，各ライブラリの install_name ，互換性，現在のバージョン番号が適切か確認する．
				</li>
				<li>
					共有ライブラリを別パッケージとし (例外は libfoo.dylib から install_name へのリンク) ，
					さらに，そうしてできた別パッケージにフィールド <code>Shlibs</code> を設ける．
				</li>
				<li>
					ヘッダと libfoo.dylib からの最終的リンクを <code>BuildDependsOnly: True</code> となっているパッケージに入れ，
					他のパッケージが一切そのパッケージに依存しないようにする．
				</li>
			</ul>
			<p>
				このポリシーに反し，パッケージを分割しない場合には，フィールド <code>DescPackaging</code> に理由を記述する．
			</p>
			<p>
				パッケージによっては，主パッケージと -shlib パッケージを作成するだけで済みます．
				しかしさらに別のパッケージが必要な場合もあります．
				新設されたフィールド <code>SplitOff</code> はこの作業の手間を省きます．
			</p>
			<p>
				3つのパッケージに分ける必要があるとき，
				パッケージの実質的な中身がライブラリなのか実行可能プログラムなのかによって命名法が変わります．
				実行可能プログラムが重要な場合:
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>共有ライブラリ</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>ヘッダ</p></td></tr><tr valign="top"><td><code>foo-bin</code></td><td><p>実行可能プログラムなど</p></td></tr></table>

			<p>ライブラリが重要な場合:</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>共有ライブラリ</p></td></tr><tr valign="top"><td><code>foo-dev</code></td><td><p>ヘッダ</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>実行可能プログラムなど</p></td></tr></table>

			<p>
				既存のパッケージのアップグレードでは後者を選ぶと手間がかかります．
				すなわち，アップグレードと同時に <code>Depends: foo</code> との記述のある全てのパッケージに
				<code>BuildDepends: foo-dev</code> を加える必要があります．
				注意すべき点は他にもあります．
				(中間に別のパッケージを経由して) 間接的に当該パッケージに依存するパッケージのアップグレードを確かに成功させるためには，
				<code>BuildDepends: foo</code> あるいは <code>BuildDepends: foo-dev</code> を加える必要があるかもしれません．
				(これがないとアップグレードに失敗する可能性があります．)
				当該パッケージのメインテナには，他のパッケージに <code>BuildDepends</code> が追加されるのを確認する責任があります．
			</p>
			<p>
				<b>ポリシー詳細</b>
			</p>
			<p>
				以下ではさらに詳しく解説します．
				まず新規にソフトウェアをポートする際のポリシーを，次に既存 Fink パッケージのアップグレードを解説します．
				現在進行形のポリシーの例としては libpng, libjpeg や libtiff を参照して下さい．
			</p>
			<p>
				Darwin にポートされたソフトウェアはできる限り共有ライブラリをビルドすることになります．
				(パッケージにとって適切な場合にパッケージメインテナが静的ライブラリをビルドするのは自由です．
				または静的ライブラリのみを含むパッケージを登録することも問題ありません．)
				共有ライブラリをビルドする場合，<b>ふたつの</b>相互関連する Fink パッケージを作成しなければいけません．
				それらは例えば foo と foo-shlibs といった名称になります．
				共有ライブラリは foo-shlibs に，ヘッダは foo に入ります．
				これら2つのパッケージを単一の .info ファイルから作れます．
				それには後述のフィールド <code>SplitOff</code> を利用します．
				(現実には3つ以上のパッケージに分割する必要がある場合も多く，
				この場合は <code>SplitOff2</code>, <code>SplitOff3</code> と追加していきます．)
			</p>
			<p>
				共有ライブラリが作れるソフトウェアパッケージには，それぞれの<b>「メジャー・バージョン番号」</b> N がなければいけません．
				「メジャー・バージョン番号」はライブラリの API にパッケージ間で非互換な変更が加えられたときのみ変わることになっています．
				Fink では，名称は以下の要領で作成されます．
				すなわち， upstream パッケージ名が bar なら，そのFinkパッケージの名前は barN と barN-shlibs になります．
				(この規約が厳密に適用されるのは新規に作られるパッケージと「メジャーバージョン」が変わったパッケージのみです．)
				例えば既存のFinkパッケージ libpng の「メジャーバージョン」は 2 でしたが，最近のものでは 3 になっています．
				そこで当面はこのライブラリに関わるFinkパッケージは4種類あることになります:
				libpng, libpng-shlibs, libpng3, libpng3-shlibs です．
				libpng と libpng3 はどちらか片方しか同時にインストールできませんが，libpng-shlibs と libpng3-shlibs は同時にインストールできます．
				(これら4つのパッケージのビルドに必要な .info ファイルは2つだけであることに注意して下さい．)
			</p>
			<p>
				共有ライブラリ自身とそれに関わるファイルはパッケージ barN-shlibs に入ります．
				また「インクルード」ファイルとその他のファイルはパッケージ barN に入ります．
				これら2つに重複して含まれるファイルがあってはならず，また barN-shlibs に含まれるファイルのいずれにも，
				何らかの形で「メジャーバージョン」 N を含むパス名が付けられなくてはいけません．
				多くの場合，パッケージは，(典型的には <code>%i/lib/bar</code> や
				<code>%i/share/bar/</code> にインストールされる) いくつかのファイルを実行時に必要とします．
				そのときはインストール先パスを <code>%i/lib/bar/N</code> や
				<code>%i/share/bar/N/</code> に修正することになります．
			</p>
			<p>
				「メジャーバージョン」が N であるようなパッケージ bar に依存するパッケージは，全て次のような依存情報を使うことになります．
			</p>
<pre>
Depends: barN-shlibs
BuildDepends: barN
</pre>
			<p>
				この方式が機能するようになって以降は，他のパッケージが barN 自体に依存するようにしてはいけません．
				(後方互換性のため，既存のパッケージは barN に依存して構いません．)
				以上を他の開発者に知らせるため，barN のパッケージ記述情報の中に次の真偽値フィールドを設けます．
			</p>
<pre>
BuildDependsOnly: True
</pre>
			<p>
				共有ライブラリと実行可能プログラムの両方を含むパッケージの場合，実行可能プログラムが (ビルド時だけでなく) 実行時に必要であれば，
				それらの実行可能プログラムは barN-bin という名の第3のパッケージに split off されなければいけません．
				他のパッケージが barN-shlibs の他に barN-bin に依存しても構いません．
			</p>
			<p>
				「メジャーバージョン」が N の共有ライブラリをビルドするとき，その共有ライブラリの "install_name" が
				<code>%p/lib/bar.N.dylib</code> になることが重要です．
				(install_name は，ライブラリに <code>otool -L</code> を実行するとわかります．)
				実際のライブラリファイルのインストール先は，
			</p>
<pre>
%i/lib/bar.N.x.y.dylib
</pre>
			<p>
				でなければならず，パッケージ側で次のようにシンボリックリンクを貼らなければいけません．
			</p>
<pre>
%i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
%i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
</pre>
			<p>
				静的ライブラリもビルドする場合，次の場所にインストールされることになります．
			</p>
<pre>
%i/lib/bar.a
</pre>
			<p>
				パッケージが libtool を利用する場合，上記のことはほぼ自動的に処理されますが，
				どの段階でも処理が適切に行われたかチェックしなければいけません．
				また， current_version と compatibility_version が適切に定義されているかも確認して下さい．
				(これらも <code>otool -L</code> で表示されます．)
			</p>
			<p>
				次にファイルを以下のように2つのパッケージに分類します．
			</p>
			<ul>
				<li>パッケージ barN-shlibs:
<pre>
%i/lib/bar.N.x.y.dylib
%i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
%i/lib/bar/N/*
%i/share/bar/N/*
%i/share/doc/barN-shlibs/*
</pre>
				</li>
				<li>パッケージ barN:
<pre>
%i/include/*
%i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
%i/lib/bar.a
%i/share/doc/barN/*
必要に応じて，他のファイルも含める
</pre>
				</li>
			</ul>
			<p>
				どちらのパッケージにもライセンスに関する何らかの文書が必要ですが， DocFiles を含むディレクトリは異なることに注意して下さい．
			</p>
			<p>
				このことはフィールド <code>SplitOff</code> を使えば実際には非常に簡単です．
				以下に上の例を実現するためにどのように記述するか (の一部) を示します．
			</p>
<pre>
Package: barN
Version: N.x.y
Revision: 1
License: GPL
Depends: barN-shlibs (= %v-%r)
BuildDependsOnly: True
DocFiles: COPYING
SplitOff: &lt;&lt;
Package: barN-shlibs
Files: lib/bar.N.x.y.dylib lib/bar.N.dylib lib/bar/N
DocFiles: COPYING
&lt;&lt;
</pre>
			<p>
				フィールド <code>SplitOff</code> の実行で，指定したファイルとディレクトリが，
				メインパッケージのインストールディレクトリ %I から splitoff パッケージのインストールディレクトリ %i に移動します．
				(これは命名法とも似ています．
				すなわち，%N が中核パッケージの「パッケージ名」で，%n が splitoff パッケージの「パッケージ名」です．)
				次に <code>DocFiles</code> のコマンドはドキュメントファイルを <code>%i/share/doc/barN-shlibs</code> にコピーします．
			</p>
			<p>
				barN-shlibs の正確な「バージョン」 (これは "%N-shlibs (= %v-%r)" と略記できます)
				をメインパッケージ barN の依存情報に含めたことに注意して下さい．
				これにより「バージョン」が確かに適合するようになり，
				さらにパッケージ barN が自動的にパッケージ barN-shlibs の依存情報を「継承する」ことを保証します．
			</p>
			<p>
				<b>フィールド Shlibs:</b>
			</p>
			<p>
				共有ライブラリを適切なパッケージに分類する他に， Fink ポリシー第4版では，
				共有ライブラリを持つパッケージ全てがフィールド <code>Shlibs</code> を使うようにしなければいけません．
				このフィールドでは，各共有ライブラリに対して 1) ライブラリの -install_name， 2) ライブラリの -compatibility_version，
				3) そのライブラリを提供する Fink パッケージを指定するバージョン付き依存性情報 (ただし -compatibility_version が同じでなければならない)
				を1行ずつ記します．
				依存性情報は <code>foo (&gt;= バージョン-版)</code> という形式で示します．
				ここで <code>バージョン-版</code> にはこの (-compatibility_version が同じ) ライブラリを利用可能にしてくれる
				Fink パッケージの<b>最初</b>の「バージョン」を使います．
				例えば次の宣言は，
			</p>
<pre>
Shlibs: &lt;&lt;
%p/lib/bar.1.dylib 2.1.0 bar1 (&gt;= 1.1-2)
&lt;&lt;
</pre>
			<p>
				<code>-install_name</code> が %p/lib/bar.1.dylib で <code>-compatibility_version</code> が 2.1.0 のライブラリが，
				Fink パッケージ <b>bar1</b> の「バージョン」1.1-2 以降でインストールされるようになることを示します．
				それに加え，この宣言は「この名前がついていて compatibility_version が少なくとも 2.1.0 のライブラリは，
				Fink パッケージ bar1 の今後のバージョンには必ず含まれている」というメインテナからの保証にも相当します．
			</p>
			<p>
				ライブラリの名称には %p を使用するよう注意して下さい．
				これによって，インストールディレクトリに関係なく Fink ユーザが正しい <code>-install_name</code> を検索することができるようになります．
			</p>
			<p>
				パッケージが更新されたとき，
				普通は次の「バージョン」または「版」の finkinfo ファイルにフィールド <code>Shlibs</code> をコピーするだけで構いません．
				例外は， <code>-compatibility_version</code> が増加したときです．
				その場合，依存性情報の中の「バージョン」は新しい「バージョン」または「版」に従って更新されなければいけません．
				(新しい「バージョン」または「版」とは，
				新しい compatibility_version のライブラリを提供する最初の「バージョン」または「版」のことです．)
			</p>
			<p>
				<b>メジャーバージョン番号が変わるとき:</b>
			</p>
			<p>
				「メジャーバージョン」が N から M に変化したときは，2つの新しいパッケージ barM と barM-shlibs を作ることになります．
				パッケージ barM-shlibs と barN-shlibs に重複するファイルがあってはいけません．
				これは，多くのユーザにとって両方を同時にインストールする必要があるからです．
				パッケージ barM には以下の依存性情報を指定します．
			</p>
<pre>
Conflicts: barN
Replaces: barN
</pre>
			<p>
				同様に barN の方も次の依存性情報を含むように改訂します．
			</p>
<pre>
Conflicts: barM
Replaces: barM
</pre>
			<p>
				するとユーザは，問題の共有ライブラリの片方のバージョンに依存する他の様々なパッケージがビルドされるときに
				barN や barM が代わる代わる入ってくるのを目にするでしょうが，
				barN-shlibs と barM-shlibs はいつまでもインストールしたままでいられます．
			</p>
			<p>
				<b>既存の Fink パッケージをアップグレードする方法:</b>
			</p>
			<p>
				共有または静的ライブラリをインストールする既存のFinkパッケージについては，
				アップグレードの最良の方法は，問題のパッケージ foo の新しい「バージョン」を作り，
				上のポリシーを満たす新しいパッケージ foo-shlibs を付属させることです．
				共有ライブラリ (または foo-shlibs にも含まれる任意のファイル) が以前にもインストールされていたら，
				その新パッケージ foo で次のように指定します．
			</p>
<pre>
Replaces: foo (&lt;&lt; 同等な.旧式パッケージの.バージョン)
</pre>
			<p>
				これはアップグレードをユーザに意識させないためです．
				("Conflicts: foo" ではアップグレードが阻害されるので，<b>使用しないで下さい</b>．)
			</p>
			<p>
				アップグレード後，"Depends: foo" となっているパッケージは普通に機能し続けます．
				しかし，そのようなFinkパッケージのメインテナ全てに連絡し，
				できる限り早くそれらのパッケージで "Depends: foo-shlibs, BuildDepends: foo" とするよう要請しなければいけません．
				そのようなメインテナ全員がその措置を終えるまで，
				新しい「メジャーバージョン」の共有ライブラリを提供する新パッケージ fooM と fooM-shlibs を作ることはできません．
			</p>
			<p>
				既存のパッケージで， install_name の名称や，共有ライブラリの名称やシンボリックリンクの名称を正しく使っていない場合，
				注意してケースバイケースで対処することになります．
				パッケージを新ポリシーに従ってアップグレードする方法を決定することが困難であれば，メーリングリスト fink-devel で議論して下さい．
			</p>
			<p>
				<b>実行可能ファイルとライブラリの両方を含むパッケージ:</b>
			</p>
			<p>
				upstream パッケージが実行可能ファイルとライブラリの両方を含む場合，
				Fink パッケージを作成する際にいくつかの注意が必要です．
				唯一の実行可能ファイルが (恐らくビルド時のみに使われ，実行時には使われない) foo-config のようなものという場合もあります．
				その場合，実行可能ファイルはパッケージ <code>foo</code> 内にヘッダファイルと同梱して構いません．
			</p>
			<p>
				そうでない場合，実行可能ファイルは実行時に他の Fink パッケージから必要とされることになりますが，
				それらは <code>foo-bin</code>foo-bin 等という名前の個別の Fink パッケージに split off しなければいけません．
				パッケージ <code>foo-bin</code> はパッケージ <code>foo-shlibs</code> に依存するようにします．
				他のパッケージのメインテナは次のようにして，暗黙のうちに <code>foo-shlibs</code> を考慮するべきです．
			</p>
<pre>
Depends: foo-bin
BuildDepends: foo
</pre>
			<p>
				しかしこの場合，アップグレードは問題を起こします．
				ユーザは <code>foo-bin</code> をインストールするよう指示されないからです．
				この問題の回避のため， <code>foo</code> に依存している全てのパッケージのメインテナがパッケージを上記のように改定するまで，
				あなたのパッケージ <code>foo</code> で次のようにして構いません．
			</p>
<pre>
Depends: foo-shlibs (= 正確な.バージョン), foo-bin
</pre>
			<p>
				こうすると大半のユーザのシステムで，他のパッケージのメインテナが各々のパッケージを <code>foo</code> に依存するように改訂するときまで，
				<code>foo-bin</code> のインストールが要求されます．
			</p>

		

		<h2><a name="perlmods">3.4 Perl モジュール</a></h2>
			
			<p>
				2003年5月以来，Finkには Perl モジュールに対する新しいポリシーがあります．
			</p>
			<p>
				伝統的に，perlモジュールのFinkパッケージには <code>-pm</code> が後置され，
				ディレクティブ <code>Type: perl</code> を使ってビルドされて来ました．
				このディレクティブは Perl モジュールのファイルを
				<code>/sw/lib/perl5</code> 及び/または <code>/sw/lib/perl5/darwin</code> に格納していました．
				新ポリシーでは，ここには，コンパイルに使われる Perl のバージョンに依存しない Perl モジュールのみを格納します．
			</p>
			<p>
				バージョンに依存する Perl モジュールは XS モジュールと呼ばれていて，
				純粋な Perl コードの他にしばしば C コードからコンパイルされたファイルを含みます．
				このことを区別する方法はいくつもありますが，例えば拡張子 <code>.bundle</code> を持つファイルがあるか調べる方法があります．
			</p>
			<p>
				バージョンに依存する Perl モジュールは該当バージョンの付いた Perl の実行可能ファイル (perl5.6.0 など) でビルドされなければいけません．
				また，できたファイルは標準の Perl のディレクトリ内の，バージョンの付いたサブディレクトリ
				(例えば <code>/sw/lib/perl5/5.6.0</code> や <code>/sw/lib/perl5/5.6.0/darwin</code>) に格納しなければいけません．
				導入が進んでいる新しい命名規約は，バージョン 5.6.0 に依存する Perl モジュールに <code>-pm560</code> を後置するというものです．
				格納場所と命名方法に関する同様の規約が他のバージョンの Perl に対しても有効で，間もなく perl 5.6.1 と perl 5.8.0 でもそうなります．
			</p>
			<p>
				新しいディレクティブ <code>Type: perl 5.6.0</code> は自動的にバージョンの付いた Perl の実行可能ファイルを使い，
				できたファイルを適切なサブディレクトリに格納します．
				(このディレクティブは Fink 0.13.0 から導入されています．)
			</p>
			<p>
				この他に， <code>-pm</code> の付くパッケージとして作成することもできます．
				これは本質的には「バンドル」パッケージで， <code>-pm560</code> などの付く同等なパッケージ (他に変種があればそちらも) をロードします．
				アップグレードを簡単にするため，XSモジュールのための既存のFinkパッケージに対してはこの方式が推奨されます．
			</p>
			<p>
				Fink 0.13.0 から利用可能になったコマンド <code>fink validate</code> は，.deb ファイルに適用されると，
				その Fink パッケージが XS モジュールで，バージョンの付かないディレクトリにインストールされるかチェックし，そうなら警告を発します．
			</p>

		
	<p align="right">
Next: <a href="fslayout.php?phpLang=ja">4 ファイルシステムのレイアウト</a></p>

<? include_once "footer.inc"; ?>
