<?
$title = "パッケージ作成 - ポリシー";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/02/08 00:22:05';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="next" href="fslayout.php?phpLang=ja" title="ファイルシステムのレイアウト"><link rel="prev" href="format.php?phpLang=ja" title="パッケージ記述">';


include_once "header.ja.inc";
?>
<h1>パッケージ作成 - 3. パッケージ化ポリシー</h1>
		
		
		<h2><a name="licenses">3.1 パッケージのライセンス</a></h2>
			
			<p>
				Fink に含まれるパッケージのライセンスは多肢に渡ります．
				それらの大部分は，ソース全体の再配布と，特に実行可能ファイルの配布に制限を課します．
				パッケージの中には，ライセンスのために Fink でバイナリ配布を行えないものもあります．
				そのため，パッケージのメンテナがライセンスを注意深くチェックすることが大変に重要です．
			</p>
			<p>
				バイナリ・パッケージとして配布される全てのパッケージは，ライセンスのコピーも含んでいなければいけません．
				ライセンスは doc ディレクトリすなわち <code>%p/share/doc/%n</code> にインストールされます．
				(InstallScript では，当然ながら %p でなく %i を使う必要があります．
				フィールド DocFiles ににより細部は自動的に処理されます．)
				元のソースに明示的なライセンスが存在しない場合，パッケージの状態を記した短いテキストを代わりとします．
				大半のライセンスは，ライセンスが配布物に必ず含まれるよう定めています．
				Finkのポリシーは「ライセンスを含めるよう明示的に要求されなくとも，常にライセンスを含める」ことです．
			</p>
			<p>
				バイナリディストリビューションのメンテナンスを自動化するため，
				配布されるどのパッケージにもフィールド <code>License</code> がなければいけません．
				このフィールドはライセンスの性質に関するもので，
				当該パッケージをバイナリディストリビューションに含めるかどうかを決定する際に参照されます．
				このフィールドは実際のライセンス条項が上記のようにバイナリパッケージに含まれているときのみ存在できます．
			</p>
			<p>
				フィールド License を有効に使用するため，値は以下の既定の選択肢からのみ選べます．
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
					これは特殊な場合で，パッケージの一部 (実行可能プログラムなど) が GPL で，
					別の部分 (ライブラリなど) が LGPL になっているパッケージ．
				</li>
				<li>
					<code>BSD</code>  -
					BSD形式のライセンス．
					これには，いわゆる「オリジナル」 BSD ライセンス，「修正」 BSD ライセンスおよび MIT ライセンスが含まれる．
					The Apache lisence もこの一種とみなす．
					ソースコードを配布することは必須でない．
				</li>
				<li>
					<code>Artistic</code> -
					The Artistic lisence 及びその派生型．
				</li>
				<li>
					<code>Artistic/GPL</code> -
					The Artistic lisence と GPL のデュアルライセンス．
				</li>
				<li>
					<code>GNU Free Documentation License</code> および <code>Linux Documentation Project</code> -
					付属ドキュメントが明示的にこのライセンスのどちらかを採用している場合，
					値に <code>/GFDL</code> と <code>/LDP</code> のいずれか，または両方を後置する．
					結果として以下の組合せが可能: "GFDL", "GPL/GFDL", "LGPL/GFDL", "GPL/LGPL/GFDL",
					"LDP", "GPL/LGPL/LDP".
				</li>
				<li>
					<code>OSI-Approved</code> -
					<a href="http://www.opensource.org/">Open Source Initiative</a> が承認した，その他の Open Source ライセンス．
					OSI はバイナリとソースの自由な配布を許可するよう要求しています．
					デュアルライセンスのパッケージにとりあえずこの選択肢を選ぶこともできます．
				</li>
				<li>
					<code>Restrictive</code> -
					制限付きのライセンス．
					作者からソース形式で free use のために入手できるが，free redistribution は許可されないパッケージに使う．
				</li>
				<li>
					<code>Restrictive/Distributable</code> -
					ソースとバイナリの配布を許可するが制限のあるライセンス．
					当該パッケージが作者からソース形式で入手でき，ソースとバイナリの配布も許可されているが，
					Open Source ライセンスと認められない制限がある場合に使う．
				</li>
				<li>
					<code>Commercial</code> -
					制限付きの商用ライセンス．
					ソースやバイナリの自由な再配布を許可しない商用パッケージ (フリーウェアやシェアウェアなど) に使う．
				</li>
				<li>
					<code>Public Domain</code> -
					パブリックドメインの，すなわち作者がコードに対するコピーライトを放棄したパッケージ．
					この場合，パッケージにはライセンスが存在せず，だれが何をしても良い．
				</li>
			</ul>
		
		<h2><a name="openssl">3.2 The GPL and OpenSSL</a></h2>
			<p>
				(2005年４月より施行)
			</p>
			<p>
				OpenSSL ライセンスが GPL と LPGL ライセンスが明らかに整合性を欠いていることから，
				openssl にリンクをしている fink パッケージのうち， GPL または LGPL ライセンスを使用しているものは
				"Restrictive" となる．
				Fink プロジェクトはこれらのパッケージをバイナリ配布しないことになるが，利用者は自己判断でコンパイルすることができる．				
			</p>
			<p>
				パッケージメンテナは，元のパッケージライセンスを <code>DescPackaging</code> に記述されたい．
			</p>
		
		<h2><a name="prefix">3.3 基盤システムへの干渉問題</a></h2>
			
			<p>
				Finkは基盤システムから分離したディレクトリにインストールされるアドオン・ディストリビューションです．
				パッケージは Fink のディレクトリ外にファイルをインストールしてはしてはいけません．
			</p>
			<p>
				この決まりを破る他に仕方がないときには例外が設けられます (XFree86 など)．
				この場合，パッケージはインストール前に既存のファイルを調べ，上書きの恐れがある場合はインストールを中止する必要があります．
				そのようなパッケージは， Fink ディレクトリ外にインストールしたファイルはそのパッケージが取り除かれるときに全て削除されること，
				あるいはそのようなファイルは残しても問題がないことを保証しなければいけません
				(すなわち，実行可能ファイルを呼び出す前にそれが存在するかどうか調べたりする必要があります)．
			</p>
		
		<h2><a name="sharedlibs">3.4 共有ライブラリ</a></h2>
			
			<p>
				Fink は共有ライブラリに関して新しいポリシーを定め， 2002 年 2 月から施行しています．
				以下では Fink 0.5.0 と共に公布された，共有ライブラリについてのポリシー第 4 版について説明します．
				最初に要点をかいつまんで述べ，後から詳細に移ります．
			</p>
			<p>
				共有ライブラリをビルドするパッケージで，
				(1) ツリー stable に入っているか，または (2) 新規のパッケージである場合，
				Fink ポリシーに従って共有ライブラリを扱う必要があります．
				すなわち以下の約束に従わなければいけません．
			</p>
			<ul>
				<li>
					コマンド <code>otool -L</code> を使い，各ライブラリの install_name ，互換性，バージョンが適切か確認する．
				</li>
				<li>
					共有ライブラリを別パッケージとし (例外は libfoo.dylib から install_name へのリンク) ，
					さらに，そうしてできた別パッケージにフィールド <code>Shlibs</code> を設ける．
				</li>
				<li>
					ヘッダと， libfoo.dylib からの最終的リンクを <code>BuildDependsOnly: True</code> となっているパッケージに入れ，
					他のパッケージが一切そのパッケージに依存しないようにする．
				</li>
			</ul>
			<p>
				このポリシーに反し，パッケージを分割しない場合には，フィールド <code>DescPackaging</code> に理由を記述しなければいけません．
			</p>
			<p>
				パッケージによっては，主パッケージと -shlib パッケージを作成するだけで済みます．
				しかしさらに別のパッケージが必要な場合もあります．
				新設されたフィールド <code>SplitOff</code> を使うとこの作業の手間が省けます．
			</p>
			<p>
				3つのパッケージに分ける必要があるとき，それらの命名法は，
				パッケージの実質的な中身がライブラリなのか (選択肢 1) 実行可能プログラムなのか (選択肢 2) によって変わります．
				選択肢 1 では次の構成を使います．
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td>
						<code>foo-shlibs</code>
					</td><td>
						<p>共有ライブラリ</p>
					</td></tr><tr valign="top"><td>
						<code>foo</code>
					</td><td>
						<p>ヘッダ</p>
					</td></tr><tr valign="top"><td>
						<code>foo-bin</code>
					</td><td>
						<p>実行可能プログラムなど</p>
					</td></tr></table>
			<p>
				選択肢 2 では次の構成を使います．
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td>
						<code>foo-shlibs</code>
					</td><td>
						<p>共有ライブラリ</p>
					</td></tr><tr valign="top"><td>
						<code>foo-dev</code>
					</td><td>
						<p>ヘッダ</p>
					</td></tr><tr valign="top"><td>
						<code>foo</code>
					</td><td>
						<p>実行可能プログラムなど</p>
					</td></tr></table>
			<p>
				選択肢 2 を選ぶと既存のパッケージのアップグレードに手間がかかります．
				アップグレードと同時に， <code>Depends: foo</code> との記述のある全てのパッケージに
				<code>BuildDepends: foo-dev</code> を加える必要があるのです．
				注意すべき点は他にもあります．
				(中間に別のパッケージを経由して) 間接的に当該パッケージに依存するパッケージのアップグレードを確かに成功させるためには，
				そのようなパッケージに <code>BuildDepends: foo</code> あるいは
				<code>BuildDepends: foo-dev</code> を加える必要があるかもしれません．
				当該パッケージのメンテナには，他のパッケージに <code>BuildDepends</code> が追加されるのを確認する責任があります．
			</p>
			<p>
				<b>詳細なポリシー</b>
			</p>
			<p>
				以下ではさらに詳しく解説します．
				まず新規にソフトウェアを Fink に移植する際のポリシーを解説し，次に既存 Fink パッケージのアップグレードに移ります．
				ポリシーが実際に適用された例としては Fink パッケージ libpng, libjpeg や libtiff を参照して下さい．
			</p>
			<p>
				Darwin にポートされたソフトウェアは可能な限り共有ライブラリをビルドしなければいけません．
				(パッケージメンテナが必要に応じて共有ライブラリの他に静的ライブラリもビルドすることは自由です．
				または静的ライブラリのみを含むパッケージを登録することも問題ありません．)
				共有ライブラリをビルドする場合，<b>ふたつの</b>相互関連する Fink パッケージを作成しなければいけません．
				それらの名称は例えば foo と foo-shlibs となります．
				共有ライブラリは foo-shlibs に，ヘッダは foo に入ります．
				これら 2 つのパッケージを単一の .info ファイルから作れます．
				それには後述のフィールド <code>SplitOff</code> を使います．
				(現実には3つ以上のパッケージに分割する必要がある場合も多いですが，
				この場合は <code>SplitOff2</code>, <code>SplitOff3</code> などを使えばだいじょうぶです．)
			</p>
			<p>
				共有ライブラリが作れるソフトウェアパッケージには <b>「メジャーバージョン」</b> N がなければいけません．
				「メジャーバージョン」は，ライブラリの API にパッケージ間で非互換な変更が加えられたときのみ変わることになっています．
				Fink では，名称は以下の要領で作成されます．
				すなわち， upstream パッケージ名が bar なら，そのFinkパッケージの名前は barN と barN-shlibs になります．
				(この規則が厳密に適用されるのは新規に作られるパッケージと「メジャーバージョン」が変わったパッケージのみです．)
				例えば既存の Fink パッケージ libpng の「メジャーバージョン」は 2 でしたが，最近， 3 に変わりました．
				そこで当面は libpng に関わる Fink パッケージは4種類あることになります:
				libpng, libpng-shlibs, libpng3, libpng3-shlibs です．
				libpng と libpng3 はどちらか片方しか同時にインストールできませんが，
				libpng-shlibs と libpng3-shlibs は同時にインストールできます．
				(これら 4 つのパッケージのビルドに必要な .info ファイルは 2 つだけであることに注意して下さい．)
			</p>
			<p>
				共有ライブラリ自身とそれに関わるファイルはパッケージ barN-shlibs に入ります．
				また「インクルード」ファイルとその他のファイルはパッケージ barN に入ります．
				これら 2 つに重複して含まれるファイルがあってはならず，また barN-shlibs に含まれるどのファイルのパス名にも，
				何らかの形で「メジャーバージョン」 N が含まれなくてはいけません．
				多くの場合，パッケージは，典型的には <code>%i/lib/bar</code> や
				<code>%i/share/bar/</code> にインストールされるようなファイルを実行時に必要とします．
				そのときはインストール先パスを <code>%i/lib/bar/N</code> や
				<code>%i/share/bar/N/</code> に修正しなければいけません．
			</p>
			<p>
				「メジャーバージョン」が N であるようなパッケージ bar に依存するパッケージは，全て次の依存情報を使うことになります．
			</p>
<pre>
Depends: barN-shlibs
BuildDepends: barN
</pre>
			<p>
				この方式が機能するようになって以降は，他のパッケージが barN 自体に依存するようにしてはいけません．
				(後方互換性のため，既存のパッケージは barN に依存して構いません．)
				以上を他の開発者に知らせるため，barN のパッケージ記述の中に次の真偽値フィールドを設けます．
			</p>
<pre>
BuildDependsOnly: True
</pre>
			<p>
				共有ライブラリと実行可能プログラムの両方を含むパッケージの場合，実行可能プログラムが (ビルド時だけでなく) 実行時に必要であれば，
				それらの実行可能プログラムは barN-bin という名の第 3 のパッケージに分離されなければいけません．
				他のパッケージが barN-shlibs の他に barN-bin に依存することは構いません．
			</p>
			<p>
				「メジャーバージョン」が N の共有ライブラリをビルドするとき，その共有ライブラリの "install_name" が
				<code>%p/lib/bar.N.dylib</code> になることが重要です．
				(install_name は，ライブラリに対し <code>otool -L</code> を実行すれば分かります．)
				実際のライブラリファイルのインストール先は，
			</p>
<pre>
%i/lib/bar.N.x.y.dylib
</pre>
			<p>
				でなければならず，パッケージ側では次のようにシンボリックリンクを貼らなければいけません．
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
				また，共有ライブラリの current_version と compatibility_version が適切に定義されているかどうかも確認して下さい．
				(これらも <code>otool -L</code> で表示されます．)
			</p>
			<p>
				次に，ファイルを以下のように 2 つのパッケージに分類します．
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
				どちらのパッケージにもライセンスに関する何らかの文書が必要ですが，それらを格納するディレクトリは異なることに注意して下さい．
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
				フィールド <code>SplitOff</code> の処理により，指定されたファイルとディレクトリが，
				メインパッケージのインストールディレクトリ %I から splitoff パッケージのインストールディレクトリ %i に移動します．
				(これは命名法とも似ています．
				すなわち，%N がメインパッケージの「パッケージ名」で，%n が splitoff パッケージの「パッケージ名」でしたね．)
				次に <code>DocFiles</code> によりドキュメントファイルが <code>%i/share/doc/barN-shlibs</code> にコピーされます．
			</p>
			<p>
				barN-shlibs の正確な「バージョン」 (これは "%N-shlibs (= %v-%r)" と略記できます)
				をメインパッケージ barN の依存情報に含めたことに注意して下さい．
				これにより「バージョン」が確かに適合するようになり，
				さらにパッケージ barN がパッケージ barN-shlibs の依存情報を自動的に「継承する」ことを保証します．
			</p>
			<p><b>フィールド BuildDependsOnly:</b></p>
			<p>
				ライブラリが時とともにアップグレードされる場合，
				移行期に二つのバージョンのヘッダファイルが必要になる時もしばしばある．
				一つのバージョンはコンパイル時に使われ，もう一つはまた他のコンパイルに使われる．
				このため，ヘッダファイルを含むパッケージの作成には注意が必要である．
				foo-dev と bar-dev が重複するヘッダを含む場合， foo-dev で，
			</p>
<pre>
   Conflicts: bar-dev
   Replaces: bar-dev
</pre>
			<p>
				と宣言し，同様に bar-dev では foo-dev を Conflicts/Replaces として宣言する．
			</p>
			<p>
				さらに，両方のパッケージで
			</p>
<pre>
   BuildDependsOnly: True 
</pre>
			<p>
				を宣言する．
				これにより，foo-dev または bar-dev に依存してパッケージを記述することを防ぐことができる．
				このような依存性が Conflicts/Replaces 手段を実行することを防ぐからである．
			</p>
			<p>
				ヘッダファイル付きのパッケージで， BuildDependsOnly を True にするのが適切ではないものもある．
				この場合，そのパッケージでは
			</p>
<pre>
   BuildDependsOnly: False
</pre>
			<p>と宣言し，その理由を DescPackaging に記述しなければならない．</p>
			<p>
				BuildDependsOnly フィールドは，パッケージがヘッダファイルを含み /sw/include にインストールされる場合，
				パッケージの .info ファイルに記述されていなければならない．
			</p>
			<p>
				fink 0.20.5 の時点で， "fink validate" とすることで，
				ヘッダファイルと，最低一つの dylib を含み， BuildDependsOnly 値で真偽を宣言していない .deb ファイルに警告を出す．
				(将来のバージョンでは，この機能をヘッダファイルと静的ライブラリに対応するように拡張する可能性もある．)
			</p>
			<p><b>フィールド Shlibs:</b></p>
			<p>
				共有ライブラリを適切なパッケージに分類する他に， Fink ポリシー第 4版では，
				共有ライブラリ全てをフィールド <code>Shlibs</code> を使って宣言しなければいけません．
				このフィールドでは，各共有ライブラリに対して 1 行ずつ 1) ライブラリの -install_name， 2) ライブラリの -compatibility_version，
				3) そのライブラリを提供する Fink パッケージを指定するバージョン付き依存性情報
				(ただし -compatibility_version が同じでなければならない) を記します．
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
				Fink パッケージ <b>bar1</b> の「バージョン」1.1-2 以降でインストールされることを示します．
				それに加え，この宣言は「この名前がついていて compatibility_version が少なくとも 2.1.0 のライブラリは，
				Fink パッケージ bar1 の今後のバージョンには必ず含まれている」というメンテナからの保証にも相当します．
			</p>
			<p>
				ライブラリの名称には %p を使用するよう注意して下さい．
				これによって， Fink ユーザはインストールディレクトリに関係なく正しい <code>-install_name</code> を検索できます．
			</p>
			<p>
				パッケージが更新されたとき，
				普通は次の「バージョン」または「版」のパッケージ記述にフィールド <code>Shlibs</code> をコピーするだけで構いません．
				例外は <code>-compatibility_version</code> が増加したときです．
				その場合，依存性情報の中の「バージョン-版」は新しい「バージョン」または「版」に従って更新されなければいけません．
				(新しい「バージョン」または「版」とは，
				新しい compatibility_version のライブラリを提供する最初の「バージョン」または「版」のことです．)
			</p>
			<p>
				<b>メジャーバージョン番号が変わるとき:</b>
			</p>
			<p>
				「メジャーバージョン」が N から M に変化したときは， 2 つの新しいパッケージ barM と barM-shlibs を作ることになります．
				パッケージ barM-shlibs と barN-shlibs に重複するファイルがあってはいけません．
				これは，多くのユーザにとって両方を同時にインストールする必要があるからです．
				パッケージ barM には以下の依存性情報を指定しなければいけません．
			</p>
<pre>
Conflicts: barN
Replaces: barN
</pre>
			<p>
				同様に barN の方も次の依存性情報を含むように改訂しなければいけません．
			</p>
<pre>
Conflicts: barM
Replaces: barM
</pre>
			<p>
				するとユーザは，問題の共有ライブラリの片方のバージョンに依存する他の様々なパッケージがビルドされるときに
				barN と barM が代わる代わる入ってくるのを目にするでしょうが，
				barN-shlibs と barM-shlibs はいつまでもインストールしたままでいられます．
			</p>
			<p>
				<b>既存の Fink パッケージをアップグレードする方法:</b>
			</p>
			<p>
				共有または静的ライブラリをインストールする既存のFinkパッケージについては，
				アップグレードの最良の方法は，問題のパッケージ foo の新しい「バージョン」を作り，
				上のポリシーを満たす新しいパッケージ foo-shlibs を付属させることです．
				共有ライブラリ (または foo-shlibs に含まれる任意のファイル) が以前からインストールされていたら，
				それらの新パッケージで次のように指定します．
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
				しかし，そのようなFinkパッケージのメンテナ全てに連絡し，
				できる限り早くそれらのパッケージで "Depends: foo-shlibs, BuildDepends: foo" とするよう要請しなければいけません．
				そのようなメンテナ全員がその措置を終えるまで，
				新しい「メジャーバージョン」の共有ライブラリを提供する新パッケージ fooM と fooM-shlibs を作ることはできません．
			</p>
			<p>
				既存のパッケージで， install_name の名称や，共有ライブラリの名称やシンボリックリンクの名称を正しく使っていない場合，
				注意してケースバイケースで対処することになります．
				パッケージを新ポリシーに従ってアップグレードする方法を決定することが困難であれば，メーリングリスト fink-devel で議論して下さい．
			</p>
			<p>
				<b>実行可能プログラムとライブラリの両方を含むパッケージ:</b>
			</p>
			<p>
				upstream パッケージが実行可能プログラムとライブラリの両方を含む場合，
				Fink パッケージを作成する際にいくつかの注意が必要です．
				唯一の実行可能プログラムが (恐らくビルド時のみに使われ，普段は使われない) foo-config のようなものという場合もあります．
				その場合，実行可能プログラムはヘッダファイルと共にパッケージ <code>foo</code> に入れて構いません．
			</p>
			<p>
				そうでない場合，実行可能プログラムは実行時に他の Fink パッケージから必要とされることになりますが，
				それらは <code>foo-bin</code> などの名前の個別の Fink パッケージに split off しなければいけません．
				パッケージ <code>foo-bin</code> はパッケージ <code>foo-shlibs</code> に依存しなければいけません．
				他パッケージのメンテナは，次のようにすることで
			</p>
<pre>
Depends: foo-bin
BuildDepends: foo
</pre>
			<p>
				明示せずに <code>foo-shlibs</code> を処理します．
			</p>
			<p>
				しかしこの場合，アップグレードは問題を起こします．
				ユーザは <code>foo-bin</code> をインストールするよう指示されないからです．
				この問題の回避のため，パッケージ <code>foo</code> に依存している全てのパッケージのメンテナがパッケージを上記のように改訂するまで，
				<code>foo</code> で次のようにして構いません．
			</p>
<pre>
Depends: foo-shlibs (= 正確な.バージョン), foo-bin
</pre>
			<p>
				こうすると， <code>foo</code> に依存する他のパッケージのメンテナが改訂を済ませるまで，
				ユーザのシステムでは大抵 <code>foo-bin</code> のインストールが要求されます．
			</p>
		
		<h2><a name="perlmods">3.5 Perl モジュール</a></h2>
			
			<p>
				2003 年 5 月以来， Fink には Perl モジュールに対する新しいポリシーがあります．
				これは 2004 年 4 月に見直しされました．
			</p>
			<p>
				伝統的に，perl モジュールの Fink パッケージには <code>-pm</code> が後置され，
				ディレクティブ <code>Type: perl</code> を使ってビルドされて来ました．
				このディレクティブは Perl モジュールのファイルを
				<code>/sw/lib/perl5</code> 及び/または <code>/sw/lib/perl5/darwin</code> に格納していました．
				現在のポリシーでは，それらのディレクトリには，コンパイルに使われる Perl のバージョンに依存しない 
				(また，このバージョン非依存性を欠いた Perl モジュールに依存しない)
				Perl モジュールのみを格納します．
			</p>
			<p>
				バージョンに依存する Perl モジュールはいわゆる XS モジュールであり，
				しばしば純粋な Perl コードの他に C コードからコンパイルされたファイルを含みます．
				このことを区別する方法はいくつもありますが，例えば拡張子 <code>.bundle</code> を持つファイルがあるかどうか調べる方法があります．
			</p>
			<p>
				Perl のバージョンに依存する Perl モジュールは該当バージョンの付いた Perl の実行可能プログラム (perl5.6.0 など)
				を使ってビルドされなければいけません．
				またモジュールの含むファイルは，標準の Perl のディレクトリ内の，バージョンの付いたサブディレクトリ
				(<code>/sw/lib/perl5/5.6.0</code> や <code>/sw/lib/perl5/5.6.0/darwin</code> など) に格納しなければいけません．
				命名規約により，バージョン 5.6.0 に依存する Perl モジュールに <code>-pm560</code> を後置するというものです．
				格納場所と命名方法に関する同様の規約が他のバージョンの Perl に対しても有効で，
				perl 5.6.1 (10.2 ツリー) と perl 5.8.0， perl 5.8.1， perl 5.8.4 (間もなく) でもそうなります．
			</p>
			<p>
				ディレクティブ <code>Type: perl 5.6.0</code> は自動的にバージョンの付いた Perl の実行可能ファイルを使い，
				できたファイルを適切なサブディレクトリに格納します．
				(このディレクティブは Fink 0.13.0 で導入されました．)
			</p>
			<p>
				<code>-pm</code> の付くパッケージも作成できます．
				これは本質的には「バンドル」パッケージで， <code>-pm560</code> 
				などの付く同等なパッケージなどをロードします．
				2004 年 4 月より，この方式は順次廃止されていきます
				(bootstrap に必要な <code>storable-pm</code> は例外です)．
			</p>
			<p>
				fink 0.20.2 の時点で， system-perl バーチャルパッケージは，
				システムに 5.8.0 以降の Perl がある場合，自動的に Perl モジュールを提供します．
				system-perl-5.8.1-1 の場合，
				<b>attribute-handlers-pm581, cgi-pm581, digest-md5-pm581, file-spec-pm581,
			 file-temp-pm581, filter-simple-pm581, filter-util-pm581, getopt-long-pm581,
			 i18n-langtags-pm581, libnet-pm581, locale-maketext-pm581, memoize-pm581,
			 mime-base64-pm581, scalar-list-utils-pm581, test-harness-pm581,
			 test-simple-pm581, time-hires-pm581.</b>
				です．
				(この一覧は 0.20.1 から若干変更されています．
				パッケージメンテナは正しい一覧を使用しているかかならず確認してください．)
			</p>
			<p>
				Fink 0.13.0 から利用可能になったコマンド <code>fink validate</code> を .deb ファイルに適用すると，
				その Fink パッケージが XS モジュールで，バージョンの付かないディレクトリにインストールされるかチェックし，そうなら警告を発します．
			</p>
		
		<h2><a name="emacs">3.6 Emacs ポリシー</a></h2>
			
			<p>
				Fink プロジェクトでは Emacs について Debian プロジェクトのポリシーに従うことに決定しましたが，小さな違いもあります．
				(Debian プロジェクトのポリシーについては
				<a href="http://www.debian.org/doc/packaging-manuals/debian-emacs-policy">
					http://www.debian.org/doc/packaging-manuals/debian-emacs-policy
				</a>
				を参照)
				Fink ポリシーとの違いは 2 点です．
				まず，このポリシーは Fink では現在のところパッケージ emacs20 と emacs21 にのみ適用され，パッケージ xemacs には適用されません．
				(この点は将来変わるかも知れません．)
				次に Debian のポリシーと異なり， Fink パッケージはどれもファイルを直接
				<code>/sw/share/emacs/site-lisp</code> にインストールして構いません．
			</p>
		
	<p align="right"><? echo FINK_NEXT ; ?>:
<a href="fslayout.php?phpLang=ja">4. ファイルシステムのレイアウト</a></p>
<? include_once "../../footer.inc"; ?>


