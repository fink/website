<?
$title = "パッケージ化 - ポリシー";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/09 15:29:17';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ化 Contents"><link rel="next" href="fslayout.php?phpLang=ja" title="ファイルシステムのレイアウト"><link rel="prev" href="format.php?phpLang=ja" title="パッケージ詳細">';

include_once "header.inc";
?>

<h1>パッケージ化 - 3 パッケージ化ポリシー</h1>
		
		

		<h2><a name="licenses">3.1 パッケージのライセンス</a></h2>
			
			<p>
				Fink に含まれているパッケージのライセンスには様々なものがあります。
				ほとんどのものはソースや、特にバイナリを再配布することに制限を設けています。
				Fink のパッケージの中には、ライセンス制限上の問題でバイナリ配布を行えないものもあります。
				メンテナはパッケージのライセンスには十分注意をして下さい。
			</p>
			<p>
				バイナリで配布されるパッケージは必ずライセンスと一緒に配布する必要があります。
				これは doc ディレクトリ、つまり <code>%p/share/doc/%n</code> にインストールされます。
				DocFiles フィールドに記述することでその他は自動的に処理されます。
				元のソースに明示的なライセンスが存在しない場合、そのパッケージの状態についてのメモを書いたテキストを代わりとします。
				ほとんどの場合、配布時にライセンスを付与することになっています。
			</p>
			<p>
				バイナリ配布のメンテナンスを自動化するために、配布されるパッケージは必ず 
				<code>ライセンス</code> フィールドを記述して下さい。
				このフィールドはライセンスの性質に関するもので、当該パッケージがバイナリ配布できるかどうかを決定する際に確認されます。
				上述のように、このフィールドは、ライセンスがバイナリパッケージに付属する場合のみ存在する場合もあります。
			</p>
			<p>
				<code>ライセンス</code>フィールドを有効に使用するため、値は下記の中から選択して下さい。
				下記の選択肢の中から選べないようなパッケージがある場合、開発用メーリングリストへ質問を投げかけて下さい。
			</p>
			<ul>

				<li>
					<code>GPL</code> - GNU General Public License。
					このライセンスではソースがバイナリと同じ場所から入手できる必要がある。
				</li>
				<li>
					<code>LGPL</code> - GNU Lesser General Public License。
					このライセンスではソースがバイナリと同じ場所から入手できる必要がある。
				</li>
				<li>
					<code>GPL/LGPL</code> - 
					これはパッケージの一部 (実行可能ファイルなど) が GPL で、別の部分 (ライブラリなど) が LGPL などの特殊な場合。
				</li>

				<li>
					<code>BSD</code>  - 
					BSD形式のライセンス。
					これには、いわゆる"オリジナル" BSD ライセンス、"修正" BSD ライセンスおよび 
					"MIT" ライセンスが含まれる。
					Apache ライセンスも BSD に含まれる。
					これらのライセンスでは、ソースコードの配布は必須ではない。
				</li>

				<li>
					<code>Artistic</code> - 
					Artistic ライセンスとその派生ライセンス。
				</li>

				<li>
					<code>Artistic/GPL</code> - 
					Artistic と GPL の２重ライセンス。
				</li> 

				<li>
					<code>GNU Free Documentation License</code> and <code>Linux
						Documentation Project</code> -
					付属ドキュメントが明示的にこのライセンスのどちらかを採用している場合、
					<code>/GFDL</code> あるいは <code>/LDP</code> 
					または両方を組み合わせて追加する。
					例: "GFDL", "GPL/GFDL", "LGPL/GFDL", "GPL/LGPL/GFDL", 
					"LDP", "GPL/LGPL/LDP".
				</li>

				<li>
					<code>OSI-Approved</code> - 
					その他のオープンソースライセンスで、<a href="http://www.opensource.org/">Open Source Initiative</a>
					が承認したもの。
					OSI の必要条件の一つとして、バイナリとソースの自由な配布があry。
					複数のライセンスを採用しているパッケージは、この値を使用することもできる。
				</li>

				<li>
					<code>Restrictive</code> - 
					制限付きのライセンス。
					ソースは作者から自由に入手・使用できるが、自由な配布が認められていない場合に使用する。
				</li>

				<li>
					<code>Restrictive/Distributable</code> - 
					制限付きのライセンスで、ソースとバイナリの配布が認められているもの。
					作者から入手でき、ソースとバイナリの配布が許可されているがオープンソースライセンスと認められない制限がある場合に使用する。
				</li>

				<li>
					<code>Commercial</code> - 
					制限付きの商用ライセンス。
					商用パッケージ (例: フリーウェア、シェアウェア) で、ソースやバイナリの自由な再配布を認めていないもの。
				</li>

				<li>
					<code>Public Domain</code> - 
					パブリックドメインにあるパッケージ。
					パブリックドメインとは、作者がコードに対するコピーライトを放棄したことを指す。
					この場合、パッケージにはライセンスが存在せず、だれが何をしても良い。
				</li>

			</ul>

		


		<h2><a name="prefix">3.2 基本システムインターフェイス</a></h2>
			
			<p>
				Fink は基本のシステムとは別のディレクトリにインストールされるディストリビューションです。
				パッケージは Fink のディレクトリ外にはファイルをインストールすることはできません。
			</p>
			<p>
				XFree86 の例など、他に選択肢がない場合には例外的に認められることがあります。
				この場合、パッケージは事前に必ず既存ファイルを確認し、書き換えをするような場合はインストールを中止します。
				また、パッケージはそのパッケージが削除されるときに Fink ディレクトリ外にインストールしたファイルを全て削除するか、
				あるいは残しても問題がないかを十分確認する必要があります
				(例えば、実行前にバイナリが存在するかなどのチェックなどを行う必要があります)。
			</p>
		

		<h2><a name="sharedlibs">3.3 共有ライブラリ (Shared Libraries)</a></h2>
			
			<p>
				Fink は共有ライブラリに関して新しいポリシーを設定し、 2002年２月から施行しています。
				本節ではこのポリシーのバージョン4 、 Fink 自体に関しては 0.5.0 リリースについて解説します。
				最初に要点をかいつまんで述べ、詳細は後で解説する文体をとります。
			</p>
			<p>
				共有ライブラリをビルドするパッケージで、
				(1) stable ツリーに入っているか、または (2) 新規のパッケージである場合、
				Fink ポリシーに従って共有ライブラリを扱う必要があります。
				これは:
			</p>
			<ul>
				<li>
					<code>otool -L</code> を使い、
					それぞれのライブラリの install_name 、互換性、現在のバージョン番号が正しいか
					確認する。
				</li>
				<li>
					共有ライブラリを別パッケージとし (例外は libfoo.dylib から install_name へのリンク) 、
					パッケージに <code>Shlibs</code> フィールドを設ける。
				</li>
				<li>
					ヘッダと libfoo.dylib からの最後のリンクをパッケージにいれ、
					<code>BuildDependsOnly: True</code> として他のパッケージがこれに依存しないこととする。
				</li>
			</ul>
			<p>
				このポリシーに反し、パッケージを分割しない場合には DescPackaging に理由を記述する。
			</p>
			<p>
				パッケージによっては、主パッケージと -shlib パッケージを作成するとポリシー通りとなる場合もある。
				こうならない場合、さらに別のパッケージを作成する。
				<code>SplitOff</code> という新しいフィールドを使用すると便利です。
			</p>
			<p>
				３つのパッケージが必要となった場合、パッケージにとってライブラリとバイナリのどちらが重要かによって名称が変わる。
				パッケージ、つまりバイナリが重要な場合、以下の様式を使用する。
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
						<p>バイナリなど</p>
					</td></tr></table>

			<p>ライブラリが重要な場合:</p>
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
						<p>バイナリなど</p>
					</td></tr></table>

			<p>
				後者は既存パッケージをアップグレードすることが難しくなります。
				アップグレードする際に、<code>Depends: foo</code> と記述されている全てのパッケージに
				<code>BuildDepends: foo-dev</code> を追加する必要があります。
				他にも、(中間にまた別のパッケージがあり) 間接的に当該パッケージに依存している別のパッケージがあれば、
				<code>BuildDepends: foo</code> あるいは <code>BuildDepends: foo-dev</code>
				を含む必要がある場合があります。
				これがないとアップグレードに失敗する可能性があり、当該パッケージのメンテナが他のパッケージの
				<code>BuildDepends</code> を確認する責任を負います。
			</p>
			<p>
				<b>ポリシー詳細</b>
			</p>
			<p>
				以下ではさらに詳しく解説していきます。
				最初に新しくソフトウェアをポートする際のポリシーを、次に既存 Fink パッケージのアップグレードを解説します。
				ポリシーの実例としては libpng, libjpeg, libtiff パッケージを参考にして下さい。
			</p>
			<p>
				Darwin にポートされたソフトウェアはできる限り共有ライブラリを使用します。
				(パッケージメンテナは必要に応じて静的ライブラリをビルドし、静的ライブラリのパッケージを作成しても構いません)
				共有ライブラリを使用する場合、<b>ふたつの</b>相互関連するパッケージが作成され、 foo と foo-shlibs といった名称になります。
				共有ライブラリは foo-shlibs に入り、ヘッダは foo に入ります。
				両パッケ−ジは <code>SplitOff</code> を利用して .info ファイルを共有することもできます。
				この方法は下記を参照して下さい。
				(現実にはさらに多くのパッケージに分割する必要がある場合も多く、この場合は
				<code>SplitOff2</code>, <code>SplitOff3</code> と追加していきます。)
			</p>
			<p>
				共有ライブラリ用にビルドされるソフトウェアには、それぞれ<b>メジャーバージョン番号</b> N を付けます。
				メジャー番号は API の上位互換性がないような変更がされた場合にのみ変更されます。
				Fink では、名称は以下の要領で作成されます。
				上リュのパッケージ名が bar であるとき、 Fink パッケージは barN と barN-shlibs となります。
				(これは新規パッケージと、古いパッケージがメジャーバージョンアップする場合に厳密に適用されています)
				例えば、libpng では当初メジャーバージョン番号が 2 で、現在では 3 になっています。
				このため、 Fink では４つのパッケージが存在します: libpng, libpng-shlibs, libpng3, libpng3-shlibs 。
				libpng と libpng3 はどちらか一つしかインストールすることはできません。
				libpng-shlibs と libpng3-shlibs は同時にインストールされます。
				(この４つの例では、 .info ファイルは二つだけ必要になります。)
			</p>
			<p>
				共有ファイル自体などのファイルは barN-shlibs パッケージに含まれます。
				"include" ファイルなどのファイルは barN パッケージに含まれます。
				両者に重複するファイルは許されす、barN-shlibs に含まれるものは全てメジャーバージョン番号 N に対応したパス名を使います。
				多くの場合、パッケージは実行時に <code>%i/lib/bar/</code> や
				<code>%i/share/bar/</code> にあるファイルを必要としますので、インストールパスを
				<code>%i/lib/bar/N/</code> や <code>%i/share/bar/N/</code> のように調整して下さい。
			</p>
			<p>
				bar のメジャーバージョン N に依存する他のパッケージは、全て以下の依存性を使って下さい。
			</p>
<pre>
Depends: barN-shlibs
BuildDepends: barN
</pre>
			<p>
				現在では、他のパッケージが barN 自体に依存することは認められていません。
				(互換性のために古いパッケージに関しては認められています)
				以下のフィールドは他の開発者にこのことを明示しています:
			</p>
<pre>
BuildDependsOnly: True
</pre>
			<p>
				共有ライブラリとバイナリファイルをもつパッケージの場合、バイナリファイルが (ビルド時だけでなく) 実行時に必要であれば、
				3つ目のパッケージを作成して下さい。
				他のパッケージは barN-bin と barN-shlibs の両方に依存できるようになります。
			</p>
			<p>
				共有ライブラリをビルドしている時は、メジャーバージョン番号 N に対して、ライブラリの"install_name"を
				<code>%p/lib/bar.N.dylib</code> とします。
				(install_name は、ライブラリに <code>otool -L</code> を実行するとわかります。)
				実際のライブラリファイルのインストール先は、
			</p>
<pre>
%i/lib/bar.N.x.y.dylib
</pre>
			<p>
				とし、パッケージ側でシンボリックリンクを作成します。
			</p>
<pre>
%i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
%i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
</pre>
			<p>
				静的ファイルをビルドする場合、インストール先は
			</p>
<pre>
%i/lib/bar.a
</pre>
			<p>
				パッケージが libtool を使っている場合、上記のことはほぼ自動的に処理されますが、各イベントごとに正しくされているか確認するようにして下さい。
				また、 current_version と compatibility_version が適切に定義されているかも確認して下さい。
				(これは <code>otool -L</code> クエリでも表示されます。)
			</p>
			<p>
				ファイルは、以下のように二つに分割されます。
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
other files, if needed
</pre>
				</li>
			</ul>
			<p>
				両パッケージはライセンス文書が必要ですが、 DocFiles を含むディレクトリが違うことに気づいたでしょうか。
			</p>
			<p>
				この処理は実際、 <code>SplitOff</code> を使うと非常に簡単です。
				以下は実行 (の途中) の例です:
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
				<code>SplitOff</code> フィールドの実行は、指定ファイルと指定ディレクトリをメインパッケージのインストールディレクトリ %I から スプリットオフのインストールディレクトリ %i に移動させます。
				(名称規則は同様に、 %N がメインパッケージの名称で、 %n が現在のパッケージの名称になります。)
				<code>DocFiles</code> コマンドは <code>%i/share/doc/barN-shlibs</code> にドキュメントをコピーします。
			</p>
			<p>
				メインパッケージ barN は、barN-shlibs の現在のバージョン (%N-shlibs (= %v-%r)) に、正確に依存するよう注意して下さい。
				これによってバージョンが一致し、また barN が barN-shlibs の依存性を取り込む結果になります。
			</p>
			<p>
				<b>Shlibs フィールド:</b>
			</p>
			<p>
				共有ライブラリを正しいパッケージに入れることに加え、ポリシーの第４版では全ての共有ライブラリを <code>Shlibs</code> フィールドで宣言して下さい。
				このフィールドは共有ライブラリごとに行を追加し、各行はライブラリの <code>-install_name</code>、
				<code>-compatibility_version</code> 、 バージョン依存情報を含みます。
				依存性の書式は <code> foo (&gt;= version-revision)</code> で、<code>version-revision</code> 
				で Fink に導入されている (互換性のある) <b>最初の</b>バージョンを指します。
				例えば:
			</p>
<pre>
Shlibs: &lt;&lt;
%p/lib/bar.1.dylib 2.1.0 bar1 (&gt;= 1.1-2)
&lt;&lt;
</pre>
			<p>
				という宣言は、 <code>-install_name</code> %p/lib/bar.1.dylib と 
				<code>-compatibiliary_version</code> 2.1.0 
				というライブラリが、
				<b>bar1</b> パッケージの 1.1-2 バージョン以降からインストールされていることを示しています。
				さらに、この宣言は、メンテナがこの名称で互換バージョン 2.1.0 以降のライブラリが今後も <b>bar1</b> パッケージに含まれることを約束したことにもなっています。
			</p>
			<p>
				ライブラリの名称には %p を使用するよう注意して下さい。
				これによって、インストールディレクトリに関係なく Fink ユーザが正しい <code>-install_name</code> を検索することができるようになります。
			</p>
			<p>
				パッケージが更新されるとき、通常は <code>Shlibs</code> フィールドは次のバージョン/リビジョンへコピーされるだけです。
				例外では <code>-compatibility_version</code> の番号も増えます。
				この場合、依存情報のバージョン番号も新しいバージョン/リビジョンに変更する必要があります
				(これが新しい互換バージョン番号のライブラリの最初のバージョン/リビジョンになります) 。
			</p>
			<p>
				<b>メジャーバージョン番号が変わるとき:</b>
			</p>
			<p>
				メジャーバージョン番号が N から M に変わるとき、新規に barM と barM-shlibs を作成します。
				多くのユーザは両方のパッケージをインストールするため、 パッケージ barM-shlibs と barN-shlibs は独立させます。
				パッケージ barM では、依存性は
			</p>
<pre>
Conflicts: barN
Replaces: barN
</pre>
			<p>
				となり、同時に barN も以下の依存情報を含むようにします
			</p>
<pre>
Conflicts: barM
Replaces: barM
</pre>
			<p>
				ユーザから見ると、他のパッケージをビルドすることで、依存している共有ライブラリの異なる barN や barM が代わる代わる入ってくることになりますが、barN-shlibs と barM-shlibs はずっとインストールされたままになります。
			</p>
			<p>
				<b>既存の Fink パッケージをアップグレードする:</b>
			</p>
			<p>
				既存のパッケージで静的ライブラリや共有ライブラリをインストールしるものをアップグレードするには、上記ポリシーに従って、 foo の新バージョンと foo-shlibs という新しいパッケージを作成することが最善策です。
				共有ライブラリ (あるいは foo-shlibs 内の他のファイル) が既にインストールされている場合、このパッケージは
			</p>
<pre>
Replaces: foo (&lt;&lt; earliest.compliant.version)
</pre>
			<p>
				と言い、ユーザに見せずにアップグレードします。
				("Conflicts: foo" ではアップグレードが止まるので、<b>使用しないで下さい</b>。)
			</p>
			<p>
				アップグレード後、"Depends: foo" と言っているパッケージは普通に動作します。
				それでもこのパッケージのメンテナに対してできる限り早く "Depends: foo-shlibs, BuildDepends: foo" と修正するように伝える必要があります。
				メンテナが適切に対応するまで、新しいメジャーバージョン番号の共有ライブラリを使った fooM, fooM-shlibs というパッケージを作成することはできません。
			</p>
			<p>
				既存のパッケージで、 install_name の名称や、共有ライブラリの名称やシンボリックリンクの名称を正しく使っていない場合、注意してケースバイケースで対処することになります。
				自分がメンテナンスしているパッケージを新ポリシーにあってアップグレードさせる方法を決定することが困難であれば、 fink-devel メーリングリストで議論して下さい。
			</p>
			<p>
				<b>バイナリとライブラリの両方を含むパッケージ:</b>
			</p>
			<p>
				上流パッケージがバイナリとライブラリの両方を含んでいる場合、 
				Fink パッケージを作成する際の注意点があります。
				場合によっては、バイナリファイルは <code>foo-config</code> 
				のような名称で、推測するとビルド時に使用されるだけで実行時には使われない可能性もあります。
				この場合、バイナリはヘッダファイルとともに <code>foo</code> パッケージに入ります。
			</p>
			<p>
				これと異なり、他のパッケージがバイナリファイルを実行時に呼び出すような場合、
				<code>foo-bin</code> のような名称で分割したパッケージにする必要があります。
				<code>foo-bin</code> パッケージは <code>foo-shlibs</code> パッケージに依存し、他のパッケージのメンテナは
			</p>
<pre>
Depends: foo-bin
BuildDepends: foo
</pre>
			<p>
				とするようにして下さい。
				これによって foo-shlibs に依存します。
			</p>
			<p>
				このような状況では、ユーザには <code>foo-bin</code> をインストールするように知らせないため、アップグレード時に問題が発生します。
				この問題を回避するため、他のパッケージメンテナが見直し、<code>foo</code> に依存しているパッケージがアップグレードされるまで、 <code>foo</code> パッケージは
			</p>
<pre>
Depends: foo-shlibs (= exact.version), foo-bin
</pre>
			<p>
				と言い、強制的に foo-bin をインストールします。
			</p>

		

		<h2><a name="perlmods">3.4 Perl モジュール</a></h2>
			
			<p>Fink は Perl モジュールについてのポリシーを 2003年５月より施行しています。
			</p>
			<p>
				伝統的に、 Fink の Perl モジュールには <code>-pm</code> がつけられて、<code>Type: perl</code> ディレクティブを使ってビルドされていました。
				Perl モジュールのファイルは <code>/sw/lib/perl5</code> および/または 
				<code>/sw/lib/perl5/darwin</code> にインストールされていました。
				新ポリシーでは、この保存先はコンパイル時に使う Perl のバージョンと関係ない Perl モジュールだけに許されています。
			</p>
			<p>
				バージョンに依存する Perl モジュールは、 XS モジュールと呼ばれていて、純粋な Perl のコードの他にコンパイルされた C のコードを含んでいることが多いようです。
				このモジュールは、ファイル名の拡張子に <code>.bundle</code> が付いています。
			</p>
			<p>
				バージョンに依存する Perl モジュールは、該当バージョンの Perl を使ってビルドを行い、ファイルをサブディレクトリに保存します。例えば、 
				<code>perl5.6.0</code> であれば <code>/sw/lib/perl5/5.6.0</code> と 
				<code>/sw/lib/perl5/5.6.0/darwin</code> になります。
				また、新たに接尾語の使用がが導入されています。
				Perl 5.6.0 のモジュールであれば、 <code>-pm560</code> を使い、Perl 5.6.1 や Perl 5.8.0 など他のバージョンの Perl も同様の命名規則が適用されます。
			</p>
			<p>
				新しいディレクティブの <code>Type: perl 5.6.0</code> 
				は、自動的にバージョン化された Perl バイナリを使い、ファイルを正しいサブディレクトリに保存します。
				(このディレクティブは Fink 0.13.0 から導入されています。)
			</p>
			<p>
				この他に、 <code>-pm</code> パッケージとして作成することもできます。
				これは、本質的には "バンドル"パッケージで、 <code>-pm560</code> または他のパッケージをロードします。
				アップグレードを簡単にするため、既存の Fink XS モジュールにはこの方式が推奨されています。
			</p>
			<p>
				Fink 0.13.0 より、 <code>fink validate</code> コマンドを用いて指定の 
				<code>.deb</code> ファイルが バージョン化されずにインストールされた XS モジュールか検証し、
				XS モジュールであれば警告を発します。
			</p>


		
	<p align="right">
Next: <a href="fslayout.php?phpLang=ja">4 ファイルシステムのレイアウト</a></p>

<? include_once "footer.inc"; ?>
