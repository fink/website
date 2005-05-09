<?
$title = "パッケージ作成 - リファレンス";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/05/09 08:49:23';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="prev" href="fslayout.php?phpLang=ja" title="ファイルシステムのレイアウト">';


include_once "header.ja.inc";
?>
<h1>パッケージ作成 - 5. リファレンスマニュアル</h1>
		
		
		<h2><a name="build">5.1 ビルドプロセス</a></h2>
			
			<p>
				各フィールドの意味を理解するには， Fink のビルドプロセスに関する知識がある程度必要です．
				このプロセスは 5 段階になっていて，それぞれ解凍段階，パッチ段階，コンパイル段階，インストール段階，ビルド段階 と呼ばれます．
				下記の例では <code>/sw</code> にパッケージ gimp-1.2.1-1 をインストールするものとします．
			</p>
			<p>
				<b>解凍段階</b>では，ディレクトリ <code>/sw/src/gimp-1.2.1-1</code> が作成されてソースの tar ボールがそこに解凍されます．
				大抵，解凍によりソースを含むディレクトリ <code>gimp-1.2.1</code> が作られます．
				これ以降のステップはすべてこの中 (すなわち <code>/sw/src/gimp-1.2.1-1/gimp-1.2.1</code>) で行われます．
				詳細はフィールド SourceDirectory, NoSourceDirectory や Source<b>N</b>ExtractDir (Nは数字) で変更できます．
			</p>
			<p>
				<b>パッチ段階</b>では Darwin でビルドするためのパッチがソースに当てられます．
				フィールド UpdateConfigGuess, UpdateLibtool, Patch や PatchScript で指定されたアクションを，この順で実行します．
			</p>
			<p>
				<b>コンパイル段階</b>ではソースの configure とコンパイルが行われます．
				普通はスクリプト <code>configure</code> を適切な引数で起動し，コマンド <code>make</code> を実行することになります．
				詳細はフィールド CompileScript を参照して下さい．
			</p>
			<p>
				<b>インストール段階</b>では，パッケージは仮ディレクトリ
				<code>/sw/src/root-gimp-1.2.1-1</code> (%d と同じ) にインストールされます
				("root-" が付いていることに注意)．
				ディレクトリ <code>/sw</code> にインストールされる予定のファイルは全て，
				<code>/sw/src/root-gimp-1.2.1-1/sw</code> (%i すなわち %d%p に同じ) にインストールされます．
				詳細はフィールド InstallScript を参照して下さい．
			</p>
			<p>
				(<b>Fink 0.9.9 で導入:</b>
				フィールド <code>SplitOff</code> を用いると，単一のパッケージ記述から複数のパッケージを生成できます．
				インストール段階の最後のあたりでパッケージそれぞれに対して個別のインストールディレクトリが作られ，
				ファイルが適当なディレクトリに振り分けられます．)
			</p>
			<p>
				<b>ビルド段階</b>では，仮ディレクトリからバイナリパッケージ (.deb ファイル) が作られます．
				この段階を直接制御することはできません．
				代わりに，パッケージ記述からの様々な情報を使って dpkg 用の <code>control</code> ファイルが作成できます．
			</p>
		
		<h2><a name="fields">5.2 フィールド</a></h2>
			
			<p>
				フィールドを分類して解説します．
				以下の一覧は完全ではありません．
				<code>:-)</code>
			</p>
			<p>
				<b>初期データ関連</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Package</td><td>
						<p>
							「パッケージ名」．
							値には英小文字，数字及び ドット (.), プラス (+), ハイフン (-) が使える．
							下線 (_) と英大文字は使えない．
							必須フィールド．
						</p>
						<p>
							このフィールドで行われるパーセント展開は %N, %{Ni}, %type_raw[] と %type_pkg[] のみです．
						</p>
						<p>
							Fink のパッケージングポリシーでは，
							どのパッケージも常に同じオプションを有効にしてコンパイルされるようにします．
							あるパッケージに複数の変種を設ける場合は (フィールド <code>Type</code> の説明を参照)，
							変種を区別する情報をフィールド <code>Package</code> に含めなければいけません
							(パーセント展開 %type_pkg[] の説明を参照)．
							これにより，各変種に固有の (どのオプションが有効かが分かる) 「パッケージ名」が与えられます．
							フィールド <code>Package</code> 内でパーセント展開 %type_pkg[] および %type_raw[] を使うことは最近導入されたばかりで，
							古い Fink とは非互換であるため，注意が必要です．
							そのため，そのようなパッケージ記述はフィールド <code>InfoN</code> (ただし N&gt;=2) 内に埋め込むようにします．
						</p>
					</td></tr><tr valign="top"><td>Version</td><td>
						<p>
							upstream のバージョン．
							値にはフィールド Package と同じ制限がある．
							必須フィールド．
						</p>
						<p>
							プログラムによっては被標準的なバージョン番号の付け方をしていて，ソートや当フィールドで認められていない字を使っている場合がある．
							このような状況では，上流のバージョンを適切にソートされるものに変える．
							バージョン文字列のソートのされ方がわからない場合，<code>dpkg</code> コマンドをシェルで入力する．例えば，
						</p>
<pre> 
 dpkg --compare-versions 1.2.1 lt 1.3 &amp;&amp; echo "true"
</pre>
						<p>
							これは "1.2.1" の方が "1.3" より小さいため "true" を出力する．
							詳細は <code>dpkg</code> man ページを参照．
						</p>
					</td></tr><tr valign="top"><td>Revision</td><td>
						<p>
							Fink パッケージとしての「版」．
							upstream のバージョンが同じパッケージのパッケージ記述を書き換えたら，ここを 1 ずつ増やす．
							最初は 1 で始まる．
							必須フィールド．
						</p>
						<p>
							Fink のポリシーでは，パッケージのバイナリ (コンパイル済み) 形式 (<code>.deb</code> ファイル)が変わる<b>いかなる</b>場合でも，<code>Revision</code> をあげなければ<b>ならない</b>．
							例えば，<code>Depends</code> や他のパッケージ一覧フィールド， Splitoff パッケージの追加・削除・名称変更， Splitoff パッケージ間でのファイルの移動など．
							パッケージのツリーを統合 (例えば 10.2 から 10.3) する場合，新しい方のツリーでは <code>Revision</code> を 10 あげて古い方のツリーでのパッケージの更新に対応できるようにする．
 						</p>
					</td></tr><tr valign="top"><td>Epoch</td><td>
						<p>
							<b>Fink 0.12.0 で導入:</b>
							パッケージの「エポック」を指定する (指定されていない場合は 0 と見なされる)．
							詳細は
							<a href="http://www.debian.org/doc/debian-policy/ch-controlfields.html#s-f-Version">Debian Policy Manual</a>
							を参照．
							省略可能フィールド．
						</p>
					</td></tr><tr valign="top"><td>Description</td><td>
						<p>
							パッケージの短い説明．(それが何であるか)
							一覧表示に使われる1行紹介文なので，簡潔かつ分かり易く．
							(半角) 45文字以下が望ましい．
							60文字を超えないこと．
							ここで「パッケージ名」を繰りかえす必要はない．
							必ず一緒に表示されるからだ．
							必須フィールド．
						</p>
					</td></tr><tr valign="top"><td>Type</td><td>
						<p>
							値が <code>bundle</code> の場合:
							バンドルパッケージは関連するパッケージをひとまとめにするために使われます．
							各パッケージには，依存関係はありえますが，ソースコードにも，インストールされるファイルにも関連はありません．
							フィールド Source, PatchScript, CompileScript, InstallScript とそれらの関連フィールドは，
							バンドルパッケージでは無視されます．
						</p>
						<p>
							値が <code>nosource</code> の場合:
							これは <code>bundle</code> と非常に似ています．
							これはソースの tar ボールが存在しないことを示します．
							よって何も取り寄せられず，解凍段階では空ディレクトリが作られます．
							しかしパッチ，コンパイル，インストールの各段階は通常通り実行されます．
							このようにして全てのソースコードをパッチと共に配布したり，
							または InstallScript を使ってディレクトリを作るだけのことができます．
							Fink 0.18.0 以降では <code>Source: none</code> と設定しても同じ挙動が実現できます．
							これにより，フィールド <code>Type</code> を他の目的に使えます (<code>Type: perl</code> など)．
						</p>
						<p>
							値が <code>perl</code> の場合 (Fink 0.9.5 以降):
							コンパイル及びインストール段階のスクリプトのデフォルト値が変わります．
							Fink 0.13.0 からは，この値の変種として <code>perl $version</code> が使えます．
							ここで "$version" は perl の特定のバージョンで，3つの数をピリオドで区切ったもの
							(<code>perl 5.6.0</code> など)．
						</p>
						<p>
							CVS 版の Fink 0.19.2 以降では，
							「プログラミング言語」または「プログラミング言語-バージョン」という記法は一般化され，
							メンテナの定義した任意のタイプとそれに関連するサブタイプが指定できるようになり，
							あるパッケージに複数のタイプを指定できるようになりました．
							タイプとサブタイプにはそれぞれ空白以外からなる任意の文字列が使えます．
							(しかし括弧，大括弧，カンマ，パーセント記号を使ってはいけません．)
							ここではパーセント展開は行われません．
							また，タイプの値は小文字に変換されます(が，サブタイプは変換されません)．
							複数のタイプを指定するにはカンマ区切りのリストを使います
							(各タイプに空白区切りのサブタイプリストが伴うことができます)．
							
						</p>
						<p>
							これに加えて「変種」という概念があります．
							単一のパッケージ記述が，有効なコンパイルオプションだけが違う複数のパッケージを生成するとき，
							これらのパッケージは「変種」になります．
							このプロセスの鍵はサブタイプリストの利用です．
							単一の文字列ではなく，文字列の空白区切りリストを括弧で括ったものを使います．
							Fink はリスト内のサブタイプ毎にパッケージ記述をコピーし，各コピー内ではリストを単一のサブタイプに置き換えます．
							例:
						</p>
						<pre>Type: perl (5.6.0 5.8.1)</pre>
						<p>
							これは 2 つのパッケージ記述を生成します．
							片方は <code>Type: perl 5.6.0</code> と，もう片方は <code>Type: perl 5.8.1</code> と同等になります．
							特殊なサブタイプリスト "(boolean)" が意味するのは，(サブでない) タイプ自身とドット '.' から成るリストです．
							つまり以下の 2 つは同一です．
						</p>
<pre>
Type: -x11 (boolean)
Type: -x11 (-x11 .)
</pre>
						<p>
							サブタイプリストの展開とそれに伴うパッケージ変種の作成は，再帰的に行われます．
							またサブタイプリストを持つタイプが複数ある場合は，あり得る組み合わせが全て生成されます．
						</p>
<pre>Type: -ssl (boolean), perl (5.6.0 5.8.1)</pre>
						<p>
							Type 以外のフィールドから特定の変種のサブタイプを得るには，疑似ハッシュ %type_raw[] および %type_pkg[] を使います．
							以下にパッケージ記述の例の一部を示します．
						</p>
<pre>
Info2: &lt;&lt;
Package: foo-pm%type_pkg[perl]
Type: perl (5.6.0 5.8.1)
Depends: perl%type_pkg[perl]-core
 &lt;&lt;
</pre>
<pre>
Info2: &lt;&lt;
Package: bar%type_pkg[-x11]
Type: -x11 (boolean)
Depends: (%type_raw[-x11] = -x11) x11
CompileScript:  &lt;&lt;
  #!/bin/bash -ev
  if ["%type_raw[-x11]" == "-x11"]; then
    ./configure %c --with-x11
  else
    ./configure %c --without-x11
  fi
  make
&lt;&lt;
&lt;&lt;
</pre>
					</td></tr><tr valign="top"><td>License</td><td>
						<p>
							パッケージ配布の際にパッケージの従うライセンスの性質を表す．
							値は <a href="policy.php?phpLang=ja#licenses">パッケージのライセンス</a> で示した選択肢から選ばなければいけない．
							それに加え，パッケージが実際にパッケージング・ポリシーに従うとき，
							すなわちライセンスのコピーがパッケージの doc ディレクトリにインストールされるときでなければ
							このフィールドを指定してはいけない．
						</p>
					</td></tr><tr valign="top"><td>Maintainer</td><td>
						<p>
							パッケージに責任を負っている人物の名前とメールアドレス．
							必須フィールド．
							値は以下の形式で，名前とメールアドレスはそれぞれ一つだけとする．
						</p>
<pre>名前 名字 &lt;アカウント@ドメイン.example.com&gt;</pre>
						<p>
							訳注: 名前はローマ字表記です．
							順序は，特に指定はありませんが， YAMADA Taro などとするのが一般的です．
						</p>
					</td></tr><tr valign="top"><td>InfoN</td><td>
						<p>
							このフィールドにより Fink はパッケージ記述の構文の非互換な変更に対処できる．
							任意のバージョンの Fink には扱える "N" (整数) の最大値が設定されている．
							それより大きいNを持つフィールド InfoN はいずれも無視される．
							だからこの機構の利用は必要最低限に止めなければいけない．
							そうしないと古いバージョンの Fink のユーザが必然性なしに仲間外れにされてしまう．
							他のフィールドの解説には，どのバージョンの Fink ではどのNの InfoN を使わなければいけないか記されているだろう．
							この機構を使うには，パッケージ記述全体をフィールド InfoN の値に埋め込む．
							複数行に渡る値の記述方法については，前述の「ファイル形式」を参照．
						</p>
					</td></tr></table>
			<p>
				<b>依存性関連</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Depends</td><td>
						<p>
							そのパッケージがビルドできるようになる前にインストールされていなければいけないパッケージのリスト．
							このフィールドではパーセント展開が行われる
							(「依存性関連」の他のフィールドでも同様:
							BuildDepends, Provides, Conflicts, Replaces, Recommends, Suggests および Enhances)
							普通，値は「パッケージ名」の単なるカンマ区切りリストだが，
							現在の Fink は (dpkgと同じ形式の) 「代替パッケージ節」と「バージョン節」に対応している．
							それらを全て盛りこんだ例:
						</p>
<pre>Depends: daemonic (&gt;= 20010902-1), emacs | xemacs</pre>
						<p>
							本当の意味で「省略可能」な依存性を表現する方法がないことに注意．
							あるパッケージが別のパッケージがあってもなくても動作するとき，
							もう片方のパッケージが (存在するときであっても) 確かに使われていないか確かめるか，
							またはフィールド Depends に加えるかのどちらかを行うこと．
							ユーザにどちらの使い方をも提供したいときは，2 つの別々のパッケージ (例えば wget と wget-ssl) を作る．
						</p>
						<p>
							0.18.2 CVS版以降の Fink では，条件付き依存性を記述できる．
							それを指定するには「パッケージ名」の前に <code>(string1 op string2)</code> を付ける．
							パーセント記法が普通に展開され，その後オペレータ <code>op</code> によって2つの文字列が比較される．
							<code>op</code> には以下のものが使える: &lt;&lt;, &lt;=, =, !=, &gt;&gt;, &gt;=．
							その直後に「パッケージ名」の記されたパッケージには，比較が真を返したときのみ依存性があると判断される．
						</p>
						<p>
							この機能は，複数の似通ったパッケージを管理する際に手間を省くためにも使える．
							例えば elinks と elinks-ssl は次のように列挙できるが，
						</p>
<pre>Depends: (%n = elinks-ssl) openssl097-shlibs, expat-shlibs</pre>
						<p>
							これは elinks の方で
						</p>
<pre>Depends: expat-shlibs</pre>
						<p>
							とし， elinks-ssl の方で
						</p>
<pre>Depends: openssl097-shlibs, expat-shlibs</pre>
						<p>
							とすることと同じである．
						</p>
						<p>
							この他の文法として， <code>(string)</code> 指定をすることもできる．
							<code>string</code> が null でない場合， "true" を返す．
						</p>
<pre>
Package: nethack%type_pkg[-x11]
Type: -x11 (boolean)
Depends: (%type_pkg[-x11]) x11
</pre>
						<p>
							これにより，nethack-x11 は x11 パッケージに依存するが， nethack は依存しない．
						</p>
						<p>
							Depends/BuildDepends を，複数のメジャーバージョンを持つ共有ライブラリパッケージに使用する場合，下記のようにしては<b>いけない</b>:
 </p>
<pre>
  Package: foo
  Depends: id3lib3.7-shlibs | id3lib4-shlibs
  BuildDepends: id3lib3.7-dev | id3lib4-dev
</pre>
						<p>
							どちらのライブラリとも動作するパッケージであっても，どちらか一つ (適切に動作する高い方のバージョンが望ましい) のパッケージを選び，パッケージ内で統一する． 
						</p>
						<p>
							<a href="policy.php?phpLang=ja#sharedlibs">共有ライブラリポリシー</a>で説明したように， -dev パッケージがインストールされるのは一つだけである．
							各パッケージは -shlibs パッケージに関連づけられた異なるファイル名へ同じ名前のシンボリックリンクを作成することがある．
							しかし，パッケージ foo をコンパイルする際には実際の (-shlibs パッケージ内の) ファイル名の方が foo バイナリにハードコードされる．
							パッケージは，コンパイル時にインストールされた -dev に合った -shlibs パッケージを必要とする．
							このため， <code>Depends</code> でどちらも満たすようにはできないのである．
						</p>
					</td></tr><tr valign="top"><td>BuildDepends</td><td>
						<p>
							<b>Fink 0.9.0 で導入:</b>
							ビルド時のみに適用される依存性のリスト．
							ビルド時には必要だが，実行時には使われないツール (flexなど) を示すのに使う．
							書式は Depends と同じ．
						</p>
					</td></tr><tr valign="top"><td>Provides</td><td>
						<p>
							そのパッケージが「提供」すると考えられる「パッケージ名」のカンマ区切りのリスト．
							パッケージ pine で <code>Provides: mailer</code> となっている場合，
							pine がインストールされると mailer についての全ての依存性は解決したものとされる．
							普通，そのようなパッケージは pine のフィールド Conflicts や Replaces にも入れるとよい．
						</p>

						<p>
							Provides 項目には，バージョン番号に関連した情報はない．
							親パッケージから取得することも，Provides フィールド自体にはバージョン番号を特定するような仕組みなどもない．
							バージョンを指定する依存性があっても，Provides を持つパッケージによって満たすことはできない．
							結果として，同一の代理パッケージを提供するバリアントが多数あるのは危険である．
							これによってバージョンを指定した依存性ができなくなるためである．
							例えば， foo-gnome と foo-nogome が "Provides: foo" を提供する場合，"Depends: foo (&gt; 1.1)" は動作しない．
						</p>
					</td></tr><tr valign="top"><td>Conflicts</td><td>
						<p>
							そのパッケージと同時にインストールしてはいけない「パッケージ名」のカンマ区切りのリスト．
							バーチャルパッケージでは，そのパッケージが提供する「パッケージ名」をここに指定してもよい．
							それらは適切に扱われる．
							このフィールドはフィールド Depends のようにバージョン付きの依存性情報にも対応しているが，
							代替パッケージには対応していない (意味をなさない)．
							あるパッケージがそれ自身のパッケージ記述の Conflicts に入っていると， (暗黙のうちに) そこから取り除かれる．
							(Fink のバージョン 0.18.2 CVS 以降で導入)
						</p>
						<p>
							<b>注記:</b> Fink自身はこのフィールドを無視する．
							しかしこれは dpkg に渡され，そこで適切に扱われる．
							要するにこのフィールドが影響するのはビルド時でなく実行時だ．
						</p>
					</td></tr><tr valign="top"><td>Replaces</td><td>
						<p>
							Conflicts と共に使われる．
							そのパッケ−ジが，衝突するパッケ−ジの機能の代わりになるだけでなく，共通するファイルを持つときに使われる．
							このフィールドがないと，dpkg はパッケージのインストール時にエラーを出すかも知れない．
							それはいくつかのファイルが依然として元あった方のパッケージに属しているからだ．
							それら 2 つのパッケージが純粋な意味で互いに代替物であり，どちらか好きな方を選べるようなときはこれを使うとよい．
							あるパッケージがそれ自身のパッケージ記述の Conflicts に入っていると， (暗黙のうちに) そこから取り除かれる．
							(Fink のバージョン 0.18.2 CVS 以降で導入)
						</p>
						<p>
							<b>注記:</b> Fink自身はこのフィールドを無視する．
							しかしこれは dpkg に渡され，そこで適切に扱われる．
							要するにこのフィールドが影響するのはビルド時でなく実行時だ．
						</p>
					</td></tr><tr valign="top"><td>Recommends, Suggests, Enhances</td><td>
						<p>
							これらのフィールドはパッケージ同士の付加的な関係情報を指定する．
							書式は他の依存情報フィールドと同じ．
							これら 3 つの情報は dpkg や apt-get によるインストール過程そのものには影響しないが，
							dselect や他のフロントエンドが，微妙な選択を行うユーザの判断を助けるのに使われる．
						</p>
					</td></tr><tr valign="top"><td>Pre-Depends</td><td>
						<p>
							フィールド Depends の特別なもので，意味の上で厳密さが必要になる．
							このフィールドを使うのは，開発者用メーリングリストで議論を行い，確かに使う必要があるとの同意が得られた場合に限る．
						</p>
					</td></tr><tr valign="top"><td>Essential</td><td>
						<p>
							必須パッケージを表す真偽値フィールド．
							必須パッケージはブートストラップ・プロセスの一環としてインストールされる．
							必須パッケージでないパッケージは必須パッケージに暗黙のうちに依存して構わない．
							dpkg は，このフィールドの指示に優先する特別なフラグを使わない限り，必須パッケージをシステムから取り除くことを拒む．
						</p>
					</td></tr><tr valign="top"><td>BuildDependsOnly</td><td>
						<p>
							<b>Fink 0.9.9 で導入:</b>
							真偽値フィールド．
							他パッケージはこのパッケージを BuildDepend に入れてもよいが， Depend に入れてはいけないことを示します．
							通常の真偽値とは異なり，<code>BuildDependsOnly</code> は３つの状態があります．
							未定義 (何も指定しない) の場合と明示的に False を指定するのとは異なります．
							詳細は<a href="policy.php?phpLang=ja#sharedlibs">共有ライブラリポリシー</a>を参照してください．
						</p>
						<p>
							fink 0.20.5 より，このフィールドが設定されているか，設定されている場合その値が，
							パッケージがビルドされる際には .deb ファイルに記録されます．
							このため， BuildDependsOnly の値を変更したり，追加・削除時には Rivision 番号をあげる必要があります．
						</p>
					</td></tr></table>
			<p>
				<b>解凍段階関連:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>CustomMirror</td><td>
						<p>
							ミラーサイトのリスト．
							各ミラーサイトは <code>&lt;場所&gt;: &lt;url&gt;</code> という書式に従って 1 行ずつ記述する．
							<b>場所</b> には大陸コード (例えば nam) や国コード (例えば nam-us) など (何でもよい) を使う．
							ミラーサイトはここに記述した順に試される．
							例:
						</p>
<pre>CustomMirror: &lt;&lt;
nam-US: ftp://ftp.fooquux.com/pub/bar
asi-JP: ftp://ftp.qiixbar.jp/pub/mirror/bar
eur-DE: ftp://ftp.barfoo.de/bar
Primary: ftp://ftp.barbarorg/pub/
&lt;&lt;</pre>
						<p>
							大陸及び国のコードは  <code>/sw/lib/fink/mirror/_keys</code> にある．
							これは， fink および fink-mirrors パッケージの一部である．
						</p>
					</td></tr><tr valign="top"><td>Source</td><td>
						<p>
							ソースの tar ボールの URL ．
							HTTP または FTP でなければいけないが，Fink はそれを単に wget に渡すだけなので，実際には問題にならない．
							このフィールドは，ミラーサイトを示す特別な記法に対応している．
							すなわち <code>mirror:&lt;ミラー名称&gt;:&lt;相対パス&gt;</code> だ．
							こうすると Fink に <b>ミラー名称</b> として設定された URL を探し，
							その後ろに <b>相対パス</b> を付け加え，それを実際の URL として使う．
							Fink の認識する <b>ミラー名称</b> の一覧は <code>/sw/lib/fink/mirror/_list</code>
							(パッケージ fink または fink-mirrors の一部) に記される．
							または <b>ミラー名称</b> に <code>custom</code> と書くことで，
							Fink にフィールド <code>CustomMirror</code> を使わせることもできる．
							URL が wget に渡される前に，パーセント記法の展開が行われる．
							%n は %type_ 系で示される変種データ全てを含む文字列に展開されることに注意．
							ここでは %{ni} を (場合によっては特定の %type_ の展開値と共に) 使うとよい．
						</p>
						<p>
							Fink 0.18.0 以降では <code>Source: none</code> は特殊な意味を持ち，取り寄せるべきソースは存在しないことを表す．
							詳細についてはフィールド Type の説明を参照．
							<code>gnu</code> という値は <code>mirror:gnu:%n/%n-%v.tar.gz</code> の，
							<code>gnome</code> という値は <code>mirror:gnome:stable/sources/%n/%n-%v.tar.gz</code> の省略形．
							デフォルト値は <code>%n-%v.tar.gz</code>  (すなわちマニュアル・ダウンロード) になっている．
							暗示的に <code>Source</code> を指定するのは廃止予定である (明示的に簡単なファイル名指定/手動ダウンロードするのは可)．
						</p>
					</td></tr><tr valign="top"><td>Source<b>N</b></td><td>
						<p>
							パッケージが複数の tar ボールから形成されている場合，それらはこの (省略可能) フィールドで指定する．
							N は 2 から始まる数．
							つまり最初の tar ボール (ある意味「メイン」になるもの) をフィールド <code>Source</code> に，
							2 番目の tar ボールをフィールド <code>Source2</code> に，という風になる．
							値の書式は <code>Source</code> と共通だが，
							<code>gnu</code> や <code>gnome</code> という省略形は展開されない (結局，意味をなさない)．
							バージョン 0.19.2 以降の CVS 版 Fink では， 2 以上の任意の (つまり，必ずしも連続しない) 整数を N に使える．
							しかし，重複はやはり許されない．
						</p>
					</td></tr><tr valign="top"><td>SourceDirectory</td><td>
						<p>
							tar ボールが単一のディレクトリに展開されはするが，
							そのディレクトリ名が tar ボールのファイル名から拡張子を除いたものと異なる場合には，これを設定しなければいけない．
							つまり，普通なら "foo-1.0.tar.gz" という tar ボールは "foo-1.0" というディレクトリを生成する．
							しかし生成されるディレクトリ名がそれと異なる場合，そのディレクトリ名をこのフィールドで指定する．
							パーセント展開が行われる．
						</p>
					</td></tr><tr valign="top"><td>NoSourceDirectory</td><td>
						<p>
							真偽値フィールド．
							tar ボールが単一のディレクトリに展開されないときにこのフィールドを設定する．
							つまり，普通なら "foo-1.0.tar.gz" という tar ボールは "foo-1.0" というディレクトリを生成する．
							しかし tar ボールを展開したときにファイルがカレントディレクトリに撒き散らされる場合は，
							このフィールドを "true" に設定する．
						</p>
					</td></tr><tr valign="top"><td>Source<b>N</b>ExtractDir</td><td>
						<p>
							普通，補助的な tar ボールは「メイン」の tar ボールと同じディレクトリで展開される．
							それを特定のサブディレクトリ内で展開して欲しいときは，このフィールドでサブディレクトリ名を指定する．
							ご想像の通り， <code>Source2ExtractDir</code> は <code>Source2</code> で指定した tar ボールに対応する．
							用例についてはパッケージ ghostscript, vim や tetex を参照．
						</p>
					</td></tr><tr valign="top"><td>SourceRename</td><td>
						<p>
							このフィールドを使うと，ビルド時にソースの tarball をリネームできる．
							これが便利なのは，例えば，ソースのバージョンがサーバのディレクトリ名には示されているが，
							tar ボールそのものはどのバージョンでも同じ名前のときだ．
							(例えば <code>http://www.foobar.org/coolapp/1.2.3/source.tar.gz</code> というとき)
							このことで起きる問題を回避するためには次のようにすればよい．
						</p>
<pre>SourceRename: %n-%v.tar.gz</pre>
						<p>
							この例では，ご想像の通り， tar ボールは <code>/sw/src/coolapp-1.2.3.tar.gz</code> として格納されることになる．
						</p>
					</td></tr><tr valign="top"><td>Source<b>N</b>Rename</td><td>
						<p>
							これはフィールド <code>SourceRename</code> と同じだが，
							<code>Source<b>N</b></code> で指定された N 番目の tar ボールのリネームに使う．
							用例についてはパッケージ context や hyperref を参照．
						</p>
					</td></tr><tr valign="top"><td>Source-MD5</td><td>
						<p>
							<b>Fink 0.10.0 で導入:</b>
							このフィールドではソースファイルの MD5 チェックサムを指定します．
							Fink はこの情報によりおかしなソースファイル，
							すなわち Fink パッケージの作成者が指定したものではない tar ボールを見分けられます．
							この問題の原因には，以下のようなものがあります:
							tar ボールのダウンロードに失敗した，upstreamのメンテナが知らないうちに tar ボールを更新した，トロイの木馬などの攻撃，など．
						</p>
						<p>
							このフィールドの典型的な用例は次の通り．
						</p>
<pre>Source-MD5: 4499443fa1d604243467afe64522abac</pre>
						<p>
							チェックサムの算出にはツール <code>md5sum</code> を使います．
							tar ボール <code>/sw/src/apache_1.3.23.tar.gz</code> のチェックサムが知りたいときには，
							次のコマンドを実行します (出力も一緒に示した)．
						</p>
<pre>fingolfin% md5sum /sw/src/apache_1.3.23.tar.gz
4499443fa1d604243467afe64522abac  /sw/src/apache_1.3.23.tar.gz</pre>
						<p>
							左に表示された値がここで必要なものです．
						</p>
					</td></tr><tr valign="top"><td>Source<b>N</b>-MD5</td><td>
						<p>
							<b>Fink 0.10.0 で導入:</b>
							フィールド <code>Source-MD5</code> と同様だが，
							フィールド <code>Source<b>N</b></code> に対応する N 番目の tar ボールの MD5 チェックサムを指定する．
						</p>
					</td></tr><tr valign="top"><td>TarFilesRename</td><td>
						<p>
							<b>Fink 0.10.0 で導入:</b>
							このフィールドは tar 形式を使うソースファイルにのみ適用されます．
						</p>
						<p>
							このフィールドを使うと，任意のソース tar ボールの中のファイルを， tar ボールの展開中にリネームできます．
							ファイルシステム HFS+ がケースインセンシティブである (大文字と小文字を区別しない) ことを回避するために非常に便利でしょう．
							普通の Mac OS X システムでは，ファイル <code>install</code> と <code>INSTALL</code> は衝突してしまいます．
							このフィールドを使うと， tar ボールをわざわざ再パッケージしなくとも (以前はこのような場合に行われていた)，
							こういった問題を回避することができます．
						</p>
						<p>
							このフィールドでは，単に，リネームされるファイルのリストを指定します．
							ワイルドカードも使うことができます．
							デフォルトでは，指定されたファイルは，いずれも元の名前に <code>_tmp</code> を後置したファイル名にリネームされます．
							デフォルト値に優先する指定をするには，
							フィールド <code>Files</code> や <code>DocFiles</code> と同様の書式を使います．
							すなわち 元のファイル名，コロン (:)，新ファイル名，という順です．
							例:
						</p>
<pre>TarFilesRename: foo bar.* qux:quux
Tar2FilesRename: direcory/INSTALL:directory/INSTALL.txt</pre>
					</td></tr><tr valign="top"><td>Tar<b>N</b>FilesRename</td><td>
						<p>
							<b>Fink 0.10.0 で導入:</b>
							フィールド <code>TarFilesRename</code> と同様だが，
							フィールド <code>Source<b>N</b></code> に対応する N 番目の tar ボールに対して機能する．
						</p>
					</td></tr></table>
			
			<p>
				<b>パッチ段階関連:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>UpdateConfigGuess</td><td>
						<p>
							真偽値フィールド．
							"true" にすると，ビルド用ディレクトリ内のファイル config.guess と config.sub が
							Darwin に対応したバージョンに取り換えられる．
							その動作は，パッチ段階の，PatchScript が実行される前に行われる．
							これが必要だと分かっているとき，
							すなわち configure スクリプトが "unknown host" というメッセージで失敗するとき<b>のみ</b>使うこと．
						</p>
					</td></tr><tr valign="top"><td>UpdateConfigGuessInDirs</td><td>
						<p>
							<b>0.9.0 CVS バージョン以降で導入:</b>
							サブディレクトリのリストを指定する．
							これは UpdateConfigGuess と同じことを行うが，
							ソースツリー中の複数のディレクトリに古い config.guess が入っているパッケージで便利だ．
							以前はコピーや移動を行うよう PatchScript に手動で指定する必要があったが，
							この新フィールドを使えばディレクトリを単に列挙するだけでよい．
							ビルド用ディレクトリ自身のファイルの更新には <code>.</code> とする．
						</p>
					</td></tr><tr valign="top"><td>UpdateLibtool</td><td>
						<p>
							真偽値フィールド．
							"true" にすると，ビルド用ディレクトリ内のファイル ltconfig と ltmain.sh が
							Darwin に対応したバージョンに取り換えられる．
							その動作は，パッチ段階の， PatchScript が実行される前に行われる．
							これが必要だと分かっているとき<b>のみ</b>使うこと．
							libtool 関連のスクリプトをバージョンの合わないものに取り換えると壊れるパッケージもある．
							詳細については<a href="http://fink.sourceforge.net/doc/porting/libtool.php">libtool のページ</a>を参照．
						</p>
					</td></tr><tr valign="top"><td>UpdateLibtoolInDirs</td><td>
						<p>
							<b>0.9.0 CVS バージョン以降で導入:</b>
							サブディレクトリのリストを指定する．
							これは UpdateLibtool と同じことを行うが，
							ソースツリー中の複数のディレクトリに古い libtool 1.3.x 系列のスクリプトが入っているパッケージで便利だ．
							以前はコピーや移動を行うよう PatchScript に手動で指定する必要があったが，
							この新フィールドを使えばディレクトリを単に列挙するだけでよい．
							ビルド用ディレクトリ自身のファイルの更新には <code>.</code> とする．
						</p>
					</td></tr><tr valign="top"><td>UpdatePoMakefile</td><td>
						<p>
							真偽値フィールド．
							"true" にすると，サブディレクトリ <code>po</code> 内のファイル
							<code>Makefile.in.in</code> が，パッチの当たったものと取り換えられる．
							その動作は，パッチ段階の， PatchScript が実行される前に行われる．
						</p>
						<p>
							パッチの当たった <code>Makefile.in.in</code> は DESTDIR の指定を優先し，メッセージカタログを，
							<code>/sw/lib/locale</code> ではなく，確実に <code>/sw/share/locale</code> に格納する．
							このフィールドを利用する前に，入れ換えによってパッケージを破壊していないこと，また入れ換えが本当に必要かどうかを確認すること．
							<code>diff</code> を実行すれば，パッケージ付属のものと Fink 向けのもの
							(<code>/sw/lib/fink/update</code> 内にある) との違いが分かる．
						</p>
					</td></tr><tr valign="top"><td>Patch</td><td>
						<p>
							<code>patch -p1 &lt;<b>パッチファイル</b></code> として適用されるパッチのファイル名．
							これには単なるファイル名を指定する．
							適切なパスは自動的に前置される．
							このフィールドではパーセント展開が行われるので，典型的な値は単に <code>%f.patch</code> または <code>%n.patch</code> となる．
							PatchScript が指定されている場合，パッチはその後に実行される．
						</p>
						<p>
							%n は %type_ 系で示される変種データ全てを含む文字列に展開されることに注意．
							ここでは %{ni} を (場合によっては特定の %type_ の展開値と共に) 使うとよい．
							単一のパッチファイルを管理し，
							各変種固有の変更点を <code>PatchScript</code> に記述する方が，
							各変種毎にパッチファイルを作るより手間が少ない．
						</p>
					</td></tr><tr valign="top"><td>PatchScript</td><td>
						<p>
							パッチ段階で実行されるコマンドのリスト．
							下記のスクリプトの注意書きを参照してください．
							ここには，パッチを当てるか，またはパッケージに変更を加えるコマンドを指定します．
							下記の<a href="reference.php?phpLang=ja#scripts">スクリプトに関する注記</a>もあわせて参照してください．
							コマンド実行前に，<a href="format.php?phpLang=ja#percent">パーセント展開</a>が行われます．
							デフォルト値はありません．
						</p>
					</td></tr></table>
			<p>
				<b>コンパイル段階関連:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Set<b>環境変数名</b></td><td>
						<p>
							コンパイルおよびインストールの段階の間，環境変数を設定しておく．
							コンパイラフラグなどを configure スクリプトや Makefile に渡すために使われる．
							現在，対応している変数は次の通り: 
							CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, DYLD_LIBRARY_PATH, JAVA_HOME,
							LD_PREBIND, LD_PREBIND_ALLOW_OVERLAP, LD_FORCE_NO_PREBIND, LD_SEG_ADDR_TABLE,
							LD, LDFLAGS, LIBRARY_PATH, LIBS, MACOSX_DEPLOYMENT_TARGET, MAKE, 
							MFLAGS, MAKEFLAGS.
							指定した値の中では前節で説明したパーセント展開が行われる．
							よく使われる例:
						</p>
<pre>SetCPPFLAGS: -no-cpp-precomp</pre>
						<p>
							環境変数には，既定値を持つものもある．
							この場合に値を指定すると，既定値に追加される．
							既定値を持つ変数とその値は:
						</p>
<pre>
CPPFLAGS: -I%p/include
LDFLAGS: -L%p/lib
</pre>
						<p>
							fink 0.17.0 からはさらに以下が追加されている:
						</p>
<pre>
LD_PREBIND: 1
LD_PREBIND_ALLOW_OVERLAP: 1
LD_SEG_ADDR_TABLE: $basepath/var/lib/fink/prebound/seg_addr_table
</pre>
						<p>
							fink 0.24.3 (と 0.23.7) からの 10.3 および 10.4-transitional 用ディストリビューションでは
						</p>
<pre>
CXXFLAGS: -fabi-version=1
</pre>
						<p>
							10.4 以降のディストリビューションでは
						</p>
<pre>
CXXFLAGS: -fabi-version=2
</pre>
						<p>
							がある．
							MACOSX_DEPLOYMENT_TARGET は OSX のバージョンを既定値として持つ．
							これに値を指定することで (値の追加ではなく) 既定値を書き換える．
						</p>

					</td></tr><tr valign="top"><td>NoSet<b>環境変数名</b>
					</td><td>
						<p>
							真の場合，既定値を持つ変数 (上述の CPPFLAGS, LDFLAGS, CXXFLAGS など) の既定値を使わない．
							例えば，LDFLAGS を unset のままにしたい場合， <code>NoSetLDFLAGS: true</code> とする．
						</p>
					</td></tr><tr valign="top"><td>ConfigureParams</td><td>
						<p>
							configure スクリプトに渡す付加的なパラメータ．
							(詳細は CompileScript を参照)

							バージョン 0.13.7 以降の Fink では，
							このパラメータは <code>Type: Perl</code> となっている perl モジュールにも使える．
							その場合，指定した値はデフォルトの文字列 perl Makefile.PL の後ろに追加される．
						</p>
						<p>
							fink-0.22.0 より，このフィールドは条件をサポートする．
							文法は <code>Depends</code> や他のパッケージ一覧フィールドと同様である．
							条件は，スペースデリミティッドな "word"  の直後に記述する．
							例えば:
						</p>
<pre>
Type: -x11 (boolean)
ConfigureParams: --mandir=%p/share/man (%type_pkg[-x11]) --with-x11 --disable-shared
</pre>
						<p>
							これは<code>--mandir</code> と <code>--disable-shared</code> フラグを送り， -x11 バリアントの場合のみ <code>--with-x11</code> を送る．
						</p>
					</td></tr><tr valign="top"><td>GCC</td><td>
						<p>
							当フィールドは，パッケージ内の C++ コードが使用する GCC-ABI を指定する．
							(このフィールドは，ABI が２度変わり，C++ コードと，それがリンクするライブラリが同じ ABI でなければならないために必要である．)
						</p><p>
							値としては:
							<code>2.95.2</code> (or <code>2.95</code>),
							<code>3.1</code>,
							<code>3.3</code>
							がある．
							最後の値は， gcc 3.1 およびそれ以降の gcc の GCC-ABI である．
						</p><p>
							注記: GCC 値が既定値と異なる場合， (CC や CXX フラグを設定するなど) パッケージ内でコンパイラを指定する必要がある．
							また， (virtual) gcc パッケージへの依存性を指定する．
						</p>
						<p>
							Fink 0.13.8 以降，このフラグが指定されると， gcc のバージョンは <code>gcc_select</code> によって調べられ，
							誤ったバージョンのものが存在すると Fink はエラー終了する．
						</p>
						<p>
							このフィールドは gcc コンパイラ間の移行をメンテナが知ることができるように Fink に加えられた．
							gcc では， C++ コードの関わるライブラリ間で，実行可能・ファイル同士の (バージョン名に反映されない) 非互換が生じることがある．
						</p>
					</td></tr><tr valign="top"><td>CompileScript</td><td>
						<p>
							コンパイル段階で実行されるコマンドのリスト．
							下記のスクリプトの注意書きを参照してください．
							パッケージの configure およびコンパイルを行うコマンドをここに指定します．
							下記の<a href="reference.php?phpLang=ja#scripts">スクリプトに関する注記</a>もあわせて参照してください．
							コマンド実行前に，<a href="format.php?phpLang=ja#percent">パーセント展開</a>が行われます．
							通常は以下の通り．
						</p>
<pre>./configure %c
make</pre>
						<p>
							これは GNU autoconf を利用するパッケージには適切でしょう．
							Perl タイプ (フィールド Type で指定される) のパッケージのうち perl のバージョン指定がないものでは，
							通常，次のようになります (0.13.4) ．
						</p>
<pre>perl Makefile.PL PREFIX=%p \
 INSTALLPRIVLIB=%p/lib/perl5 \
 INSTALLARCHLIB=%p/lib/perl5/darwin \
 INSTALLSITELIB=%p/lib/perl5 \
 INSTALLSITEARCH=%p/lib/perl5/darwin \
 INSTALLMAN1DIR=%p/share/man/man1 \
 INSTALLMAN3DIR=%p/share/man/man3 \
 INSTALLSITEMAN1DIR=%p/share/man/man1 \
 INSTALLSITEMAN3DIR=%p/share/man/man3 \
 INSTALLBIN=%p/bin \
 INSTALLSITEBIN=%p/bin \
 INSTALLSCRIPT=%p/bin
make
make test</pre>
						<p>
							タイプが <code>perl $version</code> となっていて，バージョンが指定されているものでは
							(例えば <code>$version</code> は 5.6.0 とする)，
							デフォルト値は次のようになる．
						</p>
<pre>perl$version Makefile.PL \
 PERL=perl$version PREFIX=%p \
 INSTALLPRIVLIB=%p/lib/perl5/$version \
 INSTALLARCHLIB=%p/lib/perl5/$version/$perlarchdir \
 INSTALLSITELIB=%p/lib/perl5/$version \
 INSTALLSITEARCH=%p/lib/perl5/$version/$perlarchdir \
 INSTALLMAN1DIR=%p/share/man/man1 \
 INSTALLMAN3DIR=%p/share/man/man3 \
 INSTALLSITEMAN1DIR=%p/share/man/man1 \
 INSTALLSITEMAN3DIR=%p/share/man/man3 \
 INSTALLBIN=%p/bin \
 INSTALLSITEBIN=%p/bin \
 INSTALLSCRIPT=%p/bin
make
make test</pre>
<p>
ここで， <code>$perlarchdir</code> はバージョン 5.8.0 以前では "darwin" であり，
バージョン 5.8.1 以降では "darwin-thread-multi-2level" である．
</p>
					</td></tr><tr valign="top"><td>NoPerlTests</td><td>
						<p>
							<b>Fink 0.13.7 以降で導入:</b>
							真偽値フィールド．
							Perl モジュールのパッケージでのみ指定する．
							"true" にすると， <code>CompileScript</code> のうち <code>make test</code> の部分が，
							その perl モジュールのパッケージでは無視される．
						</p>
					</td></tr></table>
			<p>
				<b>インストール段階関連:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>UpdatePOD</td><td>
						<p>
							<b>Fink 0.9.5 で導入:</b>
							真偽値フィールド．
							Perl モジュールのパッケージでのみ指定する．
							"true" にすると， install, postrm および postinst スクリプトに，
							perl パッケージの提供する .pod ファイルを管理するためのコードを追加する．
							これには，中央のファイル <code>/sw/lib/perl5/darwin/perllocal.pod</code> に .pod ファイルのデータを追加したり，
							そこから削除することも含まれる．
							(<code>perl $version</code> のように，5.6.0 などの perl の特定のバージョンと共にタイプが指定された場合は，
							それらのスクリプトが扱う中央 .pod ファイルは <code>/sw/lib/perl5/$version/perllocal.pod</code> になる．)
						</p>
					</td></tr><tr valign="top"><td>InstallScript</td><td>
						<p>
							インストール段階におけるコマンドの一覧．
							ここでコマンドを指定することで，必要な全てのファイルを一時 dpkg ディレクトリにコピーします．
							下記の<a href="reference.php?phpLang=ja#scripts">スクリプトに関する注記</a>もあわせて参照してください．
							コマンド実行前に，<a href="format.php?phpLang=ja#percent">パーセント展開</a>が行われます．
							通常，デフォルトでは:
						</p>
<pre>make install prefix=%i</pre>
						<p>
							となります．
							このデフォルト値は GNU autoconf を利用するパッケージには適切です．
							Perl タイプ (フィールド Type で指定される) のパッケージのうち perl のバージョン指定がないものでは，
							デフォルト値は次のようになります．
						</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5 \
INSTALLARCHLIB=%i/lib/perl5/darwin \
INSTALLSITELIB=%i/lib/perl5 \
INSTALLSITEARCH=%i/lib/perl5/darwin \
INSTALLMAN1DIR=%i/share/man/man1 \
INSTALLMAN3DIR=%i/share/man/man3 \
INSTALLSITEMAN1DIR=%i/share/man/man1 \
INSTALLSITEMAN3DIR=%i/share/man/man3 \
INSTALLBIN=%i/bin \
INSTALLSITEBIN=%i/bin \
INSTALLSCRIPT=%i/bin
</pre>
						<p>
							タイプが <code>perl $version</code> となっていて，バージョンが指定されているものでは 
							(例えば <code>$version</code> は 5.6.0 とする)，
							デフォルト値は次のようになる．
						</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5/$version \
INSTALLARCHLIB=%i/lib/perl5/$version/$perlarchdir \
INSTALLSITELIB=%i/lib/perl5/$version \
INSTALLSITEARCH=%i/lib/perl5/$version/$perlarchdir \
INSTALLMAN1DIR=%i/share/man/man1 \
INSTALLMAN3DIR=%i/share/man/man3 \
INSTALLSITEMAN1DIR=%i/share/man/man1 \
INSTALLSITEMAN3DIR=%i/share/man/man3 \
INSTALLBIN=%i/bin \
INSTALLSITEBIN=%i/bin \
INSTALLSCRIPT=%i/bin
</pre>
<p>
ここで， <code>$perlarchdir</code> はバージョン 5.8.0 以前では "darwin" であり，
バージョン 5.8.1 以降では "darwin-thread-multi-2level" である．
</p>
						<p>
							パッケージが対応しているなら，代わりに <code>make install DESTDIR=%d</code> を使うことが望ましい．
						</p>
					</td></tr><tr valign="top"><td>AppBundles</td><td>
						<p>
							<b>post-0.23.1 バージョンから導入</b>
							当フィールドは，アプリケーションバンドルを <code>%p/Applications</code> にインストールし， <code>/Applications/Fink</code>  にシンボリックリンクを作成する．
							例:
						</p>
<pre>AppBundles: build/*.app Foo.app</pre>
					</td></tr><tr valign="top"><td>JarFiles</td><td>
						<p>
							<b>Fink 0.10.0 で導入:</b>
							このフィールドは DocFiles に似ている．
							ここで指定した jar ファイルは <code>%p/share/java/%n</code> にインストールされる．
							例:
						</p>
<pre>JarFiles: lib/*.jar foo.jar:fooBar.jar</pre>
						<p>
							こうすると，ディレクトリ lib 内の全ての jar ファイルをインストールし，
							foo.jar を fooBar.jar としてインストールする．
						</p>
						<p>
							また，これらの jar ファイル (正確にはディレクトリ <code>%p/share/java/%n</code> 内にある .jar で終わるファイル)
							は環境変数 CLASSPATH に確実に追加される．
							このフィールドにより， configure や ant といったツールが，インストールされた jar ファイルを適切に認識できるようになる．
						</p>
					</td></tr><tr valign="top"><td>DocFiles</td><td>
						<p>
							このフィールドにより，ファイル README や COPYING を，
							パッケージの doc ディレクトリ (<code>%p/share/doc/%n</code>) に容易にインストールできる．
							値にはスペース区切りのファイルのリストを指定する．
							ビルド用ディレクトリのサブディレクトリからファイルをコピーすることはできるが，
							それらのファイルは doc ディレクトリそのものに入れなければいけない (そのサブディレクトリに入れてはいけない)．
							シェルのワイルドカードが利用できる．
							単一のファイルを，実行時にリネームすることもできる．
							新ファイル名はコロンで区切って後置する．
							例:
							<code>libgimp/COPYING:COPYING.libgimp</code>.
							このフィールドは InstallScript に適切な <code>install</code> コマンドを追加することで動作する．
						</p>
					</td></tr><tr valign="top"><td>Shlibs</td><td>
						<p>
							<b>Fink 0.11.0 で導入:</b>
							このフィールドでは，そのパッケージでインストールされる共有ライブラリを指定する．
							各共有ライブラリ毎に1行ずつ，空白文字で区切った以下の3項目を記述する．
							1) ライブラリの <code>-install_name</code> 2) ライブラリの <code>-compatibility_version</code>
							3) そのライブラリを提供する Fink パッケージを指定するバージョン付き依存性情報
							(ただし -compatibility_version が同じでなければならない)．
							依存情報は <code>foo (&gt;= バージョン-版)</code> という型式で指定しなければいけない．
							ここで <code>バージョン-版</code> は， (互換性バージョンの同じ) そのライブラリを利用可能にしてくれる Fink パッケージの
							<b>一番古い</b>バージョンを指す．
							フィールド Shlibs の設定は「この名前がついていて compatibility_version がこれ以上のライブラリは，
							その Fink パッケージの今後のバージョンでも必ず含まれている」というメンテナからの保証に相当する．
						</p>
					</td></tr><tr valign="top"><td>RuntimeVars</td><td>
						<p>
							<b>Fink 0.10.0 で導入:</b>
							このフィールドにより，実行時に環境変数を何らかの固定された値に設定できる．
							(柔軟性が必要なら<a href="#profile.d">profile.d スクリプトの節</a>を参照．)
							そのパッケージがインストールされる限り，
							ここに指定した環境変数はスクリプト <code>/sw/bin/init.[c]sh</code> によって設定される．
						</p>
						<p>
							環境変数の値には空白文字が使える (値の末尾に来ると取り除かれるが)．
							またパーセント展開が行われる．
							例:
						</p>
<pre>RuntimeVars: &lt;&lt;
SomeVar: %p/Value
AnotherVar: foo bar
&lt;&lt;</pre>
						<p>
							これは2つの環境変数 'SomeVar' および 'AnotherVar' を，
							それぞれ '/sw/Value' (あなたの環境のインストールディレクトリの値による) および 'foo bar' に設定する．
						</p>
						<p>
							このフィールドは InstallScript に適切なコマンドを追加することで機能する．
							それらのコマンドは，各環境変数に対してパッケージの profile.d スクリプトに setenv/export を追加する．
							よってパッケージメンテナ独自の環境変数は上書きされないので，自由に追加できる．
							これらの行はスクリプトに前置されるので，これらの環境変数をスクリプト内で利用できる．
						</p>
					</td></tr><tr valign="top"><td>SplitOff</td><td>
						<p>
							<b>Fink 0.9.9 で導入:</b>
							1 回のコンパイル/インストール操作で第 2 のパッケージを生成する．
							詳細については，個別に書かれた<a href="#splitoffs">splitoff の節</a>を参照．
						</p>
					</td></tr><tr valign="top"><td>SplitOff<b>N</b></td><td>
						<p>
							<b>Fink 0.9.9 で導入:</b>
							これはフィールド <code>SplitOff</code> と同様だが，
							1 回のコンパイル/インストール操作で第 3 ，第 4 のパッケージを生成するために使われる．
							バージョン 0.19.2 以降の CVS 版 Fink では， 2 以上の任意の (つまり，必ずしも連続しない) 整数を N に使える．
							しかし，重複はやはり許されない．
						</p>
					</td></tr><tr valign="top"><td>Files</td><td>
						<p>
							<b>Fink 0.9.9 で導入:</b>
							フィールド <code>SplitOff</code> または <code>SplitOff<b>N</b></code> の内部<b>のみ</b>で使われる．
							ここでは，splitoff したパッケージのインストールディレクトリ %i に親パッケージのインストールディレクトリ %I から
							どのファイルやディレクトリを移動するかを指定する．
							注記:
							これが実行されるタイミングは，親パッケージの InstallScript や DocFiles のコマンドの実行後で，
							splitoff したパッケージの InstallScript や Docfiles の実行前．
						</p>
					</td></tr></table>
			<p>
				<b>ビルド段階関連:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>PreInstScript, PostInstScript, PreRmScript, PostRmScript</td><td>
						<p>
							これらのフィールドには，パッケージがインストール，アップグレード，または削除される時点で実行されるシェルスクリプトの断片を記述します．
							Fink はシェルスクリプトのヘッダ <code>#!/bin/sh</code> を自動的に追加します．
							また <code>set -e</code> で実行するので，どのコマンドが実行に失敗しても，スクリプトはその時点で停止します．
							また Fink は末尾に <code>exit 0</code> を追加します．
							エラーの発生を示すには，非ゼロの終了コードでスクリプトから exit します．
							第 1 実引数 (<code>$1</code>) は，どのアクションが実行されているかを示す値に設定されます．
							値としては <code>install</code>, <code>upgrade</code>, <code>remove</code> および <code>purge</code> が使用できます．
							ただしこれらの他にも使われる値があることに注意してください．
							エラー回復や，別パッケージのインストールによりパッケージを取り除くことを表す値などがあります．
						</p>
						<p>
							各スクリプトは以下のタイミングで実行される．
						</p>
						<ul>
							<li>PreInstScript: パッケージが初めてインストールされたときと，パッケージをそのバージョンにアップグレードする前．</li>
							<li>PostInstScript: パッケージを解凍し，設定する前．</li>
							<li>PreRmScript: パッケージが削除される前，または新しいバージョンにアップグレードされる前．</li>
							<li>PostRmScript: パッケージが削除された後，または新しいバージョンにアップグレードされた後．</li>
						</ul>
						<p>
							補足説明: アップグレードは新バージョンの ...InstScript と，旧バージョンの ...RmScript を実行します．
							詳細については the Debian Policy Manual,
							<a href="http://www.debian.org/doc/debian-policy/ch-maintainerscripts.html">第6章</a> を参照．
						</p>
						<p>
							スクリプト内ではパーセント展開が行われます．
							一般に，コマンドはフルパスを指定しなくても実行できます．
						</p>
					</td></tr><tr valign="top"><td>ConfFiles</td><td>
						<p>
							ユーザが修正し得る設定ファイルの空白区切りのリスト．
							パーセント展開が行われる．
							ファイルは，次のように絶対パスで指定しなければいけない．
							<code>%p/etc/%n.conf</code>.
							dpkg はここで指定されたファイルを特別扱いする．
							パッケージがアップグレードされたとき，新設定ファイルが提供され，しかもユーザが旧パッケージの設定ファイルが修正していた場合は，
							ユーザはどちらのバージョンを使うか尋ねられ，設定ファイルのバックアップが作られる．
							パッケージを "remove" しても，設定ファイルは削除されずにディスク上に残る．
							設定ファイルも削除されるのは "purge" を命じたときのみ．
						</p>
					</td></tr><tr valign="top"><td>InfoDocs</td><td>
						<p>
							パッケージが <code>%p/share/info</code> にインストールする Info 文書のリスト．
							この設定により，Info ディレクトリ・ファイル <code>dir</code> を管理するための適切なコードが
							postinst および prerm スクリプトに追加される．
							この機能はまだ流動的で，将来，精密な管理のためにさらにフィールドが追加されるかも知れない．
						</p>
					</td></tr><tr valign="top"><td>DaemonicFile</td><td>
						<p>
							<code>daemonic</code> のサービスの説明を記述する．
							Fink は <code>daemonic</code> を使ってデーモン・プロセス (web サーバなど) のための StartupItems を生成したり削除する．
							説明は <code>%p/etc/daemons/<b>名前</b>.xml</code> という名前のファイルとしてパッケージに追加される．
							ここで <b>名前</b> はフィールド DaemonicName で指定される (デフォルト値は「パッケージ名」)．
							このフィールドの値ではパーセント展開が行われる．
							パッケージが <code>daemonic</code> を利用するなら，それを依存性リストに加えなければいけないことに注意．
						</p>
					</td></tr><tr valign="top"><td>DaemonicName</td><td>
						<p>
							<code>daemonic</code> サービスの記述ファイルの名前．
							詳細はフィールド DaemonicFile を参照．
						</p>
					</td></tr></table>
			<p>
				<b>付加的データ関連:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Homepage</td><td>
						<p>
							upstream パッケージのホームページの URL．
						</p>
					</td></tr><tr valign="top"><td>DescDetail</td><td>
						<p>
							フィールド <code>Description</code> よりも詳しい説明．
							(それが何であるか，何のために使うものか？)
							複数行に渡ってよい．
							このフィールドは児童開業されずに表示されるので， (可能ならば) 手動で改行を挿入して各行 79 文字以内に収める．
						</p>
					</td></tr><tr valign="top"><td>DescUsage</td><td>
						<p>
							パッケージを利用する上で必要になる情報を記述する．
							(そのパッケージはどのように使うものなのか？)
							例えば「 WindowMaker を使う前に wmaker.inst を起動．」等を (訳注: 英語で) ここに記述します．
							複数行に渡ってよい．
							このフィールドはワードラップの恩恵に預らずに表示されるので， (可能ならば) 手動で改行を挿入して各行 79 文字以内に収める．
						</p>
					</td></tr><tr valign="top"><td>DescPackaging</td><td>
						<p>
							パッケージングに関する注意書き．
							「ファイルを適切な場所に置くために Makefile にパッチを当てる」等を (英語で) ここに記述する．
							複数行に渡ってよい．
						</p>
					</td></tr><tr valign="top"><td>DescPort</td><td>
						<p>
							パッケージを Darwin に移植する場合に特有の注意書き．
							「config.guess と libtool スクリプトはアップデートする． -no-cpp-precomp が必要」等を (英語で) ここに記述する．
							複数行に渡ってよい．
						</p>
					</td></tr></table>
		
		<h2><a name="splitoffs">5.3 スプリットオフ (SplitOff)</a></h2>
			
			<p>
				Fink 0.9.9 で導入．
				単一の .info ファイルで複数のパッケージを作成することが可能です．
				インストール段階は普通に始まり， <code>InstallScript</code> と <code>DocFiles</code> コマンドを実行します．
				フィールド <code>SplitOff</code> や <code>SplitOff<b>N</b></code> が存在すれば，それらに対しインストールディレクトリを作成します．
				<code>SplitOff</code> や <code>SplitOff<b>N</b></code> の中では，対応して新しく作られたインストールディレクトリは %i で，
				親パッケージのインストールディレクトリは %I で参照されます．
			</p>
			<p>
				フィールド <code>SplitOff</code> や <code>SplitOff<b>N</b></code> には，独自のフィールドが多数あります．
				完全なパッケージ記述とよく似ていますが，抜けているフィールドもあります．
				以下は <code>SplitOff</code> に含まれる部分パッケージ記述 (分野別)です．
			</p>
			<ul>
				<li>
					初期データ関連:
					指定する必要があるのは <code>Package</code> のみで，
					その他は全て親パッケージから引き継がれる．
					<code>Type</code> と <code>License</code> は
					<code>SplitOff</code> や <code>SplitOff<b>N</b></code> の中で宣言することで変更できる．
					パーセント展開も使える．
					特に，親パッケージの名称を参照する %N が便利だ．
				</li>
				<li>
					依存性関連: 全てのフィールドが記述可能．
				</li>
				<li>
					解凍段階, パッチ段階, コンパイル段階関連: これらのフィールドは意味がないため無視される．
				</li>
				<li>
					インストール段階, ビルド段階関連: 全てのフィールドが記述可能．
					(ただし <code>SplitOff</code> や <code>SplitOff<b>N</b></code> を入れ子にしてはいけない．)
				</li>
				<li>
					付加的データ関連: 親パッケージから引き継がれるが，
					<code>SplitOff</code> や <code>SplitOff<b>N</b></code> の中で宣言して修正できる．
				</li>
			</ul>
			<p>
				インストール段階では，まず親パッケージの <code>InstallScript</code> と <code>DocFiles</code> が実行される．
				次にフィールド <code>SplitOff</code> や <code>SplitOff<b>N</b></code> の処理が行われる．
				すなわち，そのそれぞれの中の <code>Files</code> のコマンドが実行され，
				指定されたファイルやディレクトリが親インストールディレクトリ %I から splitoff パッケージのインストールディレクトリ %i に移される．
				続いて <code>SplitOff</code> や <code>SplitOff<b>N</b></code> の中の
				<code>InstallScript</code> や <code>DocFiles</code> などが順に実行される．
			</p>
			<p>
				現在の Fink では，最初に <code>SplitOff</code> が (あれば) 処理され，その後に
				<code>SplitOff2</code>, <code>SplitOff3</code> などがさらに存在する場合，数の順に処理される．
				しかしこの順番は将来変更されるかもしれません．
				よって， <code>SplitOff</code> が <code>SplitOff2</code> より先に処理される現状でしか正しく動作しない，次のようなコード
			</p>
<pre>
SplitOff: &lt;&lt;
  Description: Some header files
  Files: include/foo.h include/bar.h
&lt;&lt;
SplitOff2: &lt;&lt;
  Description: All other header files
  Files: include/*
&lt;&lt;
</pre>
			<p>
				を避け，それぞれの中で明示的なファイル名を使うか，より精密なファイルグロブ (いわゆるワイルドカード) を使う方がよいでしょう．
			</p>
			<p>
				ビルド段階では，各パッケージの pre/post install/remove スクリプトをビルド段階コマンドを使って作成します．
			</p>
			<p>
				ビルドされるパッケージは，ライセンス条項を <code>%i/share/doc/%n</code> に明記する必要があります
				(%n の値は当然パッケージ毎に異なる)．
				<code>DocFiles</code> はファイルを移動ではなくコピーすることに注意．
				よって <code>DocFiles</code> を使えば同一のドキュメントを各 splitoff パッケージ向けに複数回インストールできます．
			</p>
		
		<h2><a name="scripts">5.4 スクリプト</a></h2>
			
			<p>
				フィールド PatchScript, CompileScript, InstallScript には，実行させたいシェルコマンドを記述できる．
				形式は 2 種類ある．
			</p>
			<p>
				このフィールドには単にコマンドを列挙すれば，シェルスクリプトと同様です．
				しかし，コマンドが一行ごとに system() によって実行される点が異なります．
				よって変数の設定やディレクトリの移動はその行内でのみ有効になる．
				0.18.2 以降の CVS 版 Fink では，
				通常のシェルスクリプトと同様に長い行を改行できます．
				行末にバックスラッシュ (<code>\</code>) を置くと次の行は継続行になります．
			</p>
			<p>
				または，任意のスクリプト処理系の完全なスクリプトを記述することもできます．
				その場合，他の Unix のスクリプトファイルと同様，第1行目は <code>#!</code> にインタプリタのフルパス名を続け，
				さらに必要なフラグを続けたものでなければいけない
				(<code>#!/bin/csh</code>, <code>#!/bin/bash -ev</code> など)．
				その場合，フィールド *Script の値全体が一時ファイルにダンプされ，実行されます．
			</p>
		
		<h2><a name="patches">5.5 パッチ</a></h2>
			
			<p>
				パッケージを Darwin でコンパイルするために (または Fink と協調して動作するようにするために) パッチが必要な場合，
				パッチにはパッケージ記述の拡張子 ".info" を ".patch" に変えたファイル名を使い， .info ファイルと同じディレクトリに入れます．
				パッケージファイル名に完全名を使っている場合は，次のどちらかを使う (どちらも同等)．
			</p>
<pre>Patch: %f.patch</pre>
<pre>PatchScript: patch -p1 &lt;%a/%f.patch</pre>
			<p>
				新しく導入された方の簡潔なパッケージファイル命名規則を採用しているなら， %f でなく %n を使うこと．
				これら2つのフィールドは互いに排他的ではなく，両方指定してもよい (すると PatchScript, Patch の順に両方実行される)．
			</p>
			<p>
				パッチファイルではユーザがインストールディレクトリを選択できるようにする方がよいので，
				<code>/sw</code> という決め打ちではなく <code>@PREFIX@</code> 等の変数を使います．
				以下のようにすると良いでしょう．
			</p>
<pre>PatchScript: sed 's|@PREFIX@|%p|g' &lt;%a/%f.patch | patch -p1</pre>
			<p>
				パッチの書式は unidiff (unified diff) でなければいけません．
				普通，次のようにして生成できます．
			</p>
<pre>diff -urN &lt;originalsourcedir&gt; &lt;patchedsourcedir&gt;</pre>
			<p>
				エディタに Emacs を使っているなら，上記のコマンド diff の引数に <code>-x'*~'</code> を加え，
				自動生成されたバックアップファイルを比較対象から除きます．
			</p>
			<p>
				巨大なサイズのパッチを cvs に入れるのは好ましくないことにも注意．
				そういうパッチは web/ftp サーバに置き，フィールド <code>SourceN:</code> に指定します．
				自分のウェブサイトを持っていなくても，
				Fink プロジェクトの管理者がそのファイルを Fink のサイトからダウンロードできるようにすることも可能です．
				パッチが 30KB より大きければ，独立にダウンロードする方法を考慮した方がよいでしょう．
			</p>
		
		<h2><a name="profile.d">5.6 Profile.d スクリプト</a></h2>
			
			<p>
				パッケージが実行時に何らかの初期化 (環境変数の設定など) を必要とするなら， profile.d スクリプトを使えばよいでしょう．
				これらのスクリプト断片はスクリプト <code>/sw/bin/init.[c]sh</code> によって読み込まれます．
				通常，全ての Fink ユーザがシェルのスタートアップファイル (<code>.cshrc</code> またはそれと互換なファイル) でそれを読み込むようになっています．
				パッケージの方では，どのスクリプトにも2種類を用意しなければいけません:
				sh 互換シェル (sh, zsh, bash, ksh, ...) 用と， csh 互換シェル (csh, tcsh) 用です．
				両スクリプトとも <code>/sw/etc/profile.d/%n.[c]sh</code> としてインストールされる必要があります．
				(ここで %n は，他と同様に「パッケージ名」を表す．)
				また，正しく読み込まれるためには，それらのパーミッションは実行，読み込みが共に可能でなければいけません．
				(すなわち，それらのインストールには引数 <code>-m 755</code> を付ける．)
			</p>
			<p>
				環境変数をいくつか設定したいだけなら (QTDIR を '/sw' にする，など)，フィールド RuntimeVars を使えばよいでしょう．
				このフィールドはまさにその作業を簡略化するために用意されたものです．
			</p>
		
	
<? include_once "../../footer.inc"; ?>


