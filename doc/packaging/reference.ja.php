<?
$title = "パッケージ作成 - リファレンス";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/30 03:03:07';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="prev" href="fslayout.php?phpLang=ja" title="ファイルシステムのレイアウト">';

include_once "header.inc";
?>

<h1>パッケージ作成 - 5 リファレンスマニュアル</h1>
		
		

		<h2><a name="build">5.1 ビルドプロセス</a></h2>
			

			<p>
				各フィールドの意味を理解するには， Fink のビルドプロセスに関する知識が必要となります．
				このプロセスは５段階になっていて，それぞれ解凍段階，パッチ段階，コンパイル段階，インストール段階，ビルド段階 と呼ばれます．
				下記の例では <code>/sw</code> にパッケージ gimp-1.2.1-1 をインストールするものとします．
			</p>
			<p>
				<b>解凍段階</b>では，ディレクトリ <code>/sw/src/gimp-1.2.1-1</code> が作成されてソースの tar ボールがそこに解凍されます．
				大抵，解凍によりソースを含むディレクトリ <code>gimp-1.2.1</code> が作られます．
				これ以降のステップはすべてこの中 (<code>/sw/src/gimp-1.2.1-1/gimp-1.2.1</code> など) で行われます．
				詳細はフィールド SourceDirectory, NoSourceDirectory や Source<b>N</b>ExtractDir (Nは数字) で変更できます．
			</p>
			<p>
				<b>パッチ段階</b>では，Darwin でビルドするためのパッチがソースに当てられます．
				フィールド UpdateConfigGuess, UpdateLibtool, Patch や PatchScript で指定されたアクションを，この順で実行します．
			</p>
			<p>
				<b>コンパイル段階</b>では，ソースの configure とコンパイルが行われます．
				普通，ここではスクリプト <code>configure</code> を適切な引数で起動し，コマンド <code>make</code> を実行することになります．
				詳細はフィールド CompileScript を参照して下さい．
			</p>
			<p>
				<b>インストール段階</b>では，パッケージは仮ディレクトリ
				<code>/sw/src/root-gimp-1.2.1-1</code> (%d と同じ) にインストールされます．
				("root-" が付いていることに注意．)
				ディレクトリ <code>/sw</code> にインストールされる予定のファイルは全て，
				<code>/sw/src/root-gimp-1.2.1-1/sw</code> (%i すなわち %d%p に同じ) にインストールされます．
				詳細はフィールド InstallScript を参照して下さい．
			</p>
			<p>
				(<b>Fink 0.9.9 で導入された機能:</b>
				フィールド <code>SplitOff</code> を用いると，単一の finkinfo ファイルから複数のパッケージを生成できます．
				インストール段階の最後のあたりでパッケージそれぞれに対して個別のインストールディレクトリが作られ，
				ファイルを適当なディレクトリに振り分けていきます．)
			</p>
			<p>
				<b>ビルド段階</b>では，仮ディレクトリからバイナリパッケージ (.deb ファイル) が作られます．
				この段階を直接制御することはできません．
				代わりに， finkinfo ファイルからの様々な情報を使って dpkg 用の <code>control</code> ファイルが作成できます．
			</p>
		

		<h2><a name="fields">5.2 フィールド</a></h2>
			

			<p>
				フィールドを分類して解説します．
				以下の一覧は完全ではありません．
				<code>:-)</code>
			</p>
			<p>
				<b>初期データ:</b>
			</p>

			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Package</td><td>
						<p>
							「パッケージ名」．
							値には英小文字，数字及び ドット '.', プラス '+', ハイフン '-' が使える．
							下線 ('_') と英大文字は使えない．
							必須フィールド．
						</p>
						<p>
							Fink 0.9.9 以降では，パーセント記法の展開が有効です．
							パーセント記法は他にフィールド
							Depends, BuildDepends, Provides, Conflicts, Replaces, Recommends, Suggests, Enhances で使えます．
						</p>
					</td></tr><tr valign="top"><td>Version</td><td>
						<p>
							upstream のバージョン．
							値にはフィールド Package と同じ制限があります．
							必須フィールド．
						</p>
					</td></tr><tr valign="top"><td>Revision</td><td>
						<p>
							Finkパッケージとしての「版」．
							upstream のバージョンが同じパッケージの finkinfo を書き換えたら，ここを1ずつ増やすこと．
							最初は1で始まる．
							必須フィールド．
						</p>
					</td></tr><tr valign="top"><td>Epoch</td><td>
						<p>
							<b>Fink 0.12.0 で導入</b>
							パッケージの「エポック」を指定する (指定されていない場合，デフォルト値は0) ．
							詳細は <a href="http://www.debian.org/doc/debian-policy/ch-controlfields.html#s-f-Version">Debian Policy Manual</a>
							を参照．
							省略可能フィールド．
						</p>
					</td></tr><tr valign="top"><td>Description</td><td>
						<p>
							パッケージの短い説明．(それが何であるか)
							一覧表示に使われる1行紹介文なので，簡潔かつわかりやすく．
							(半角) 45文字以下が望ましい．
							60文字を超えないこと．
							ここで「パッケージ名」を繰りかえす必要はない．
							必ず一緒に表示されるからだ．
							必須フィールド．
						</p>
					</td></tr><tr valign="top"><td>Type</td><td>
						<p>
							値が <code>bundle</code> の場合:
							バンドルパッケージは関連するパッケージをひとまとめにするために使われる．
							それらには依存関係こそありますが，ソースコードにも，インストールされるファイルにも関連はありません．
							フィールド Source, PatchScript, CompileScript, InstallScript とその関連フィールドは，
							バンドル・パッケージでは無視される．
						</p>
						<p>
							値が <code>nosource</code> の場合:
							これは bundle と非常に似ている．
							これは，ソースの tar ボールがないことを示す．
							よって何のソースも取り寄せられず，解凍段階では空ディレクトリが作られるだけになる．
							しかしパッチ，コンパイル，インストールの各段階は通常通り実行される．
							このようにして全てのソースコードをパッチと共に配布したり，
							または InstallScript を使ってディレクトリを作るだけのことができる．
							Fink 0.18.0 以降では <code>Source: none</code> と設定しても同じ挙動が実現できる．
							こちらを使用すると，フィールド <code>Type</code> を他の目的に使える (<code>Type: perl</code> など)．
						</p>
						<p>
							値が <code>perl</code> の場合 (Fink 0.9.5 以降):
							こうするとコンパイル及びインストールのスクリプトのデフォルト値が違うものになります．
							Fink 0.13.0 からは，この値の変種として <code>perl $version</code> が使えます．
							ここで "$version" はperlの特定のバージョンで，3つの数をピリオドで区切ったものです．
							(<code>perl 5.6.0</code> など)
						</p>
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
					</td></tr></table>
			<p>
				<b>依存性関連</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Depends</td><td>
						<p>
							そのパッケージがビルドできるようになる前にインストールされていなければいけないパッケージのリスト．
							普通，これは「パッケージ名」の単なるカンマ区切りのリストだが，
							現在のFinkは代替パッケージとバージョンを (dpkgと同じ形式で) 指定する形式に対応している．
							それらを全て盛りこんだ例:
						</p>
<pre>Depends: daemonic (&gt;= 20010902-1), emacs | xemacs</pre>
						<p>
							本当の意味で省略可能な依存性を表現する方法がないことに注意．
							あるパッケージが別のパッケージがあってもなくても動作するとき，
							もう片方のパッケージが (存在するときであっても) 確かに使われていないか確かめるか，
							またはフィールド Depends に加えるかのどちらかを行うこと．
							ユーザにどちらの使い方をも提供したいときは，2つの別々のパッケージ (例えば wget と wget-ttl) を作る．
						</p>
						<p>
							Finkのバージョン post-0.18.2 CVS 以降では，条件付き依存性を記述できる．
							それを指定するには「パッケージ名」の前に <code>(string1 op string2)</code> を付ける．
							パーセント記法が普通に展開され，オペレータ <code>op</code> によって2つの文字列が比較される．
							<code>op</code> には以下のものが使える: &lt;&lt;, &lt;=, =, !=, &gt;&gt;, &gt;=．
							その直後に続くパッケージへの依存性は，比較が真を返したときのみ存在すると判断される．
						</p>
						<p>
							この機能は，複数の似通ったパッケージを管理する際に手間を省くためにも使える．
							例えば elinks と elinks-ssl は次のように列挙できますが，
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
							とすることと同じです．
						</p>
					</td></tr><tr valign="top"><td>BuildDepends</td><td>
						<p>
							<b>Fink 0.9.0 で導入</b>
							ビルド時のみに適用される依存性のリスト．
							ビルド時には必要だが，実行時には使われないツール (flexなど) を列挙するのに使う．
							書式は Depends と同じ．
						</p>
					</td></tr><tr valign="top"><td>Provides</td><td>
						<p>
							そのパッケージが「提供」すると考えられる「パッケージ名」のカンマ区切りのリスト．
							パッケージ pine の finkinfo に <code>Provides: mailer</code> とある場合，
							pine がインストールされると mailer についての全ての依存性は解決したものとされる．
							普通，そのようなパッケージは pine のフィールド Conflicts や Replaces にも入れるとよい．
						</p>
					</td></tr><tr valign="top"><td>Conflicts</td><td>
						<p>
							そのパッケージと同時にインストールしてはいけない「パッケージ名」のカンマ区切りのリスト．
							バーチャル・パッケージでは，そのパッケージが提供する「パッケージ名」をここに指定してもよい．
							それらは適切に扱われる．
							このフィールドはフィールド Depends のようにバージョン付きの依存性情報にも対応しているが，
							代替パッケージには対応していない (意味をなさない)．
							あるパッケージがそれ自身のフィールド Conflicts に入っていると， (暗黙のうちに) そこから取り除かれる．
							 (Fink のバージョン post-0.18.2 CVS で導入された．)
						</p>
						<p>
							<b>注意:</b> Fink自身はこのフィールドを無視する．
							しかしこれは dpkg に渡され，そこで適切に扱われる．
							要するにこのフィールドが影響するのはビルド時でなく実行時だ．
						</p>
					</td></tr><tr valign="top"><td>Replaces</td><td>
						<p>
							Conflicts と共に使われる．
							そのパッケ−ジが，衝突するパッケ−ジの機能の代わりになるだけでなく，共通するファイルを持つときに使われる．
							このフィールドがないと，dpkgはパッケージのインストール時にエラーを出すかも知れない．
							それはファイルが依然として元あった方のパッケージに属しているからだ．
							それら2つのパッケージが純粋な意味で互いに代替物であり，どちらかがあればもう片方は要らないようなときはこれを使うとよい．
							あるパッケージのフィールド Replaces 内にそのパッケージそのものが含まれていたら， (暗黙のうちに) 取り除かれる．
							 (Finkのバージョン post-0.18.2 CVS で導入された．)
						</p>
						<p>
							<b>注意:</b> Fink自身はこのフィールドを無視する．
							しかしこれは dpkg に渡され，そこで適切に扱われる．
							要するにこのフィールドが影響するのはビルド時でなく実行時だ．
						</p>
					</td></tr><tr valign="top"><td>Recommends, Suggests, Enhances</td><td>
						<p>
							これらのフィールドはパッケージ同士の付加的な関係情報を指定する．
							書式は他の依存情報フィールドと同じ．
							これら3つの関係情報は dpkg や apt-get によるインストール過程そのものには影響しない．
							しかしこれらの情報は，dselect や他のフロントエンドが，微妙な選択を行うユーザの判断を助けるのに使われます．
						</p>
					</td></tr><tr valign="top"><td>Pre-Depends</td><td>
						<p>
							フィールド Depends の特別なもので，意味の上で厳密さが必要になる．
							このフィールドを使うのは，開発者用メーリングリストで議論を行い，確かに使う必要があるとの同意が得られた場合に限る．
						</p>
					</td></tr><tr valign="top"><td>Essential</td><td>
						<p>
							必須パッケージを表すのに使われる真偽値フィールド．
							必須パッケージはブートストラップ・プロセスの一環としてインストールされる．
							必須パッケージでない全てのパッケージは，必須パッケージに暗黙のうちに依存して構わない．
							dpkg は，このフィールドの指示に優先する特別なフラグを使わない限り，必須パッケージをシステムから取り除くことを拒む．
						</p>
					</td></tr><tr valign="top"><td>BuildDependsOnly</td><td>
						<p>
							<b>Fink 0.9.9 で導入された．</b>
							真偽値フィールド．
							他のパッケージはそのパッケージを (フィールド BuildDepends に入れてもよいが) Depends に入れてはいけないことを示す．
						</p>
					</td></tr></table>
			<p>
				<b>解凍段階:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>CustomMirror</td><td>
						<p>
							ミラーサイトのリスト．
							各ミラーサイトは <code>&lt;場所&gt;: &lt;url&gt;</code> という書式に従って1行に1つずつ記述する．
							<b>場所</b> には大陸コード (例えば nam) や国コード (例えば nam-us) など (何でもよい) を使う．
							ミラーサイトはここに記述した順に試される．
							例:
						</p>
<pre>CustomMirror: &lt;&lt;
nam-US: ftp://ftp.fooquux.com/pub/bar
asi-JP: ftp://ftp.qiixbar.jp/pub/mirror/bar
eur-DE: ftp://ftp.barfoo.de/bar
Primary: ftp://ftp.barbarorg/pub/
&gt;&gt;</pre>
					</td></tr><tr valign="top"><td>Source</td><td>
						<p>
							ソースのtarボールのURL．
							HTTPまたはFTPでなければいけないが，Finkはそれを単にwgetに渡すだけなので，実際には問題にならない．
							このフィールドは，ミラーサイトのための特殊なURL記法に対応している．
							すなわち <code>mirror:&lt;ミラー名称&gt;:&lt;相対パス&gt;</code> だ．
							こうするとFinkに &lt;ミラー名称&gt; として設定されたURLを探し，その後ろに &lt;相対パス&gt; を付け加え，それを実際のURLとして使う．
							Finkの認識する &lt;ミラー名称&gt; の一覧は /sw/lib/fink/mirror/_list  (パッケージ fink または fink-mirrors の一部) の中にある．
							または， &lt;ミラー名称&gt; に custom と書くことで，フィールド CustomMirror をFinkに使わせることもできる．
							URLが wget に渡される前に，パーセント記法の展開が行われる．
						</p>
						<p>
							Fink 0.18.0 以降では Source: none は特殊な意味を持ち，取り寄せるべきソースは存在しないことを表す．
							詳細についてはフィールド Type の説明を参照．
							<code>gnu</code> という値は <code>mirror:gnu:%n/%n-%v.tar.gz</code> の，
							<code>gnome</code> という値は <code>mirror:gnome:stable/sources/%n/%n-%v.tar.gz</code> の省略形．
							デフォルトでは <code>%n-%v.tar.gz</code>  (すなわちマニュアル・ダウンロード) になっている．
						</p>
					</td></tr><tr valign="top"><td>Source<b>N</b>
					</td><td>
						<p>
							パッケージが複数のtarボールから形成されているときは，これらの (省略可能な) フィールドで指定を行う．
							Nは数で，2から始まる．
							つまり最初のtarボール (ある意味「メイン」になるもの) をフィールド <code>Source</code> に，
							2番目のtarボールをフィールド <code>Source2</code> に，という風になる．
							値の書式は <code>Source</code> と共通だが， <code>gnu</code> や <code>gnome</code> という省略形は展開されない (結局，意味をなさない)．
						</p>
					</td></tr><tr valign="top"><td>SourceDirectory</td><td>
						<p>
							tar ボールが単一のディレクトリに展開されはするが，
							そのディレクトリ名が tar ボールのファイル名から拡張子を除いたものと異なるときに使う．
							つまり，普通なら "foo-1.0.tar.gz" という tar ボールは "foo-1.0" というディレクトリを生成する．
							しかし生成されるディレクトリ名がそれと異なる場合，そのディレクトリ名をこのフィールドで指定する．
							パーセント記法は展開される．
						</p>
					</td></tr><tr valign="top"><td>NoSourceDirectory</td><td>
						<p>
							真偽値フィールド．
							tar ボールが単一のディレクトリに展開されないときにこのフィールドを設定する．
							つまり，普通なら "foo-1.0.tar.gz" という tar ボールは "foo-1.0" というディレクトリを生成する．
							しかし tar ボールを展開したときにファイルがカレントディレクトリに撒き散らされる場合は，
							このフィールドの値を true に設定する．
						</p>
					</td></tr><tr valign="top"><td>Source<b>N</b>ExtractDir</td><td>
						<p>
							普通，補助的な tar ボールは「メイン」の tar ボールと同じディレクトリで展開される．
							それを特定のサブディレクトリ内で展開して欲しいときは，このフィールドで指定する．
							ご想像の通り， Source2ExtractDir は Source2 で指定した tar ボールに対応する．
							用例についてはパッケージ ghostscript, vim や tetex を参照．
						</p>
					</td></tr><tr valign="top"><td>SourceRename</td><td>
						<p>
							このフィールドを使うと，ビルド時にソースの tar ボールをリネームできる．
							これが便利なのは，例えば，ソースのバージョンがサーバのディレクトリ名には示されているが，
							tar ボールそのものはどのバージョンでも同じ名前のときだ．
							(例えば ://www.foobar.org/coolapp/1.2.3/source.tar.gz というとき)
							このことで起きる問題を回避するためには次のようにすればよい．
						</p>
<pre>SourceRename: %n-%v.tar.gz</pre>
						<p>
							この例では，ご想像の通り， tar ボールは <code>/sw/src/coolapp-1.2.3.tar.gz</code> として格納されることになる．
						</p>
					</td></tr><tr valign="top"><td>Source<b>N</b>Rename</td><td>
						<p>
							これはフィールド <code>SourceRename</code> と同じだが，
							<code>Source<b>N</b>
							</code> で指定された N 番目の tar ボールのリネームに使う．
							用例についてはパッケージ context や hyperref を参照．
						</p>
					</td></tr><tr valign="top"><td>Source-MD5</td><td>
						<p>
							<b>Fink 0.10.0 で導入．</b>
							このフィールドではソースファイルの MD5 チェックサムを指定する．
							Fink はこの情報によりおかしなソースファイル，
							すなわち fink パッケージの作成者が指定したものではない tar ボールを見分けられる．
							この問題の原因は，大抵次のようなものだ:
							tar ボールのダウンロードに失敗した，upstreamのメインテナが知らないうちに tar ボールを更新した，トロイの木馬のような攻撃，等々．
						</p>
						<p>
							このフィールドの典型的な用例は次のようなものだ．
						</p>
<pre>Source-MD5: 4499443fa1d604243467afe64522abac</pre>
						<p>
							チェックサムの算出にはツール <code>md5sum</code> が使われる．
							tar ボール <code>/sw/src/apache_1.3.23.tar.gz</code> のチェックサムが知りたいときには，
							次のコマンドを実行する (出力も一緒に示した)．
						</p>
<pre>fingolfin% md5sum /sw/src/apache_1.3.23.tar.gz
4499443fa1d604243467afe64522abac  /sw/src/apache_1.3.23.tar.gz</pre>
						<p>
							ご覧のように，左に表示された値がここで必要なものだ．
						</p>
					</td></tr><tr valign="top"><td>Source<b>N</b>-MD5</td><td>
						<p>
							<b>Fink 0.10.0 で導入．</b>
							フィールド <code>Source-MD5</code> と同様だが，
							フィールド <code>Source<b>N</b>
							</code> に対応する N 番目の tar ボールの MD5 チェックサムを指定する．
						</p>
					</td></tr><tr valign="top"><td>TarFilesRename</td><td>
						<p>
							<b>Fink 0.10.0 で導入．</b>
							このフィールドは tar 形式を使うソースファイルにのみ適用される．
						</p>
						<p>
							このフィールドを使うと，任意のソース tar ボールの中のファイルを， tar ボールの展開中にリネームできる．
							ファイルシステム HFS+ がケースインセンシティブだ (大文字と小文字を区別しない) という事実を回避するのためには，これは非常に便利だ．
							普通の Mac OS X システムでは，ファイル <code>install</code> と <code>INSTALL</code> は衝突してしまう．
							このフィールドを使うと， tar ボールをわざわざ再パッケージしなくとも (以前，そういう場合には行われていた)，
							そういった問題を回避できる．
						</p>
						<p>
							このフィールドでは，リネームされるファイルのリストを単に指定する．
							ワイルドカードも使える．
							デフォルトでは，任意のファイルは，元の名前に <code>_tmp</code> を後置したファイル名にリネームされる．
							フィールド <code>Files</code> や <code>DocFiles</code> と同様の書式を使って，このデフォルト値より優先した指定ができる．
							すなわち，元のファイル名，コロン (:)，新ファイル名，という順だ．
							例:
						</p>
<pre>TarFilesRename: foo bar.* qux:quux
Tar2FilesRename: direcory/INSTALL:directory/INSTALL.txt</pre>
						<p>
							<b>注意:</b>
							このフィールドは， BSD tar の特殊機能を使って実装されている．
							GNU tar はこの機能に対応していない．
							デフォルトでは Fink は GNU tar を使うが (GNU tar でしか展開できない tar ボールがあるため)，
							パッケージに TarFilesRename が使われているときは，
							Fink は常に (<code>/usr/bin/tar</code> という直接指定により) BSD tar を使う．
						</p>
					</td></tr><tr valign="top"><td>Tar<b>N</b>FilesRename</td><td>
						<p>
							<b>Fink 0.10.0 で導入．</b>
							フィールド <code>TarFilesRename</code> と同様だが，
							フィールド <code>Source<b>N</b>
							</code> に対応する N 番目の tar ボールに対して機能する．
						</p>
					</td></tr></table>

			
			<p>
				<b>パッチ段階:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>UpdateConfigGuess</td><td>
						<p>
							真偽値フィールド．
							真にすると，ビルド用ディレクトリ内のファイル config.guess と config.sub が Darwin に対応したバージョンに取り換えられる．
							その動作は，パッチ段階で，PatchScript が実行される前に行われる．
							これが必要だと分かっているとき<b>のみ</b>使うこと．
							すなわち，スクリプト configure が "unknown host" というメッセージで失敗するとき．
						</p>
					</td></tr><tr valign="top"><td>UpdateConfigGuessInDirs</td><td>
						<p>
							<b>post-0.9.0 CVS バージョンで導入．</b>
							サブディレクトリのリストを指定する．
							これは UpdateConfigGuess と同じことを行うが，ソースツリー中の複数のディレクトリに古い config.guess が入っているパッケージで便利だ．
							以前はコピーや移動を行うよう PatchScript に手動で指定する必要があったが，この新フィールドではディレクトリを単に列挙するだけでよい．
							ビルド用ディレクトリ自身の中のファイルの更新には <code>.</code> とする．
						</p>
					</td></tr><tr valign="top"><td>UpdateLibtool</td><td>
						<p>
							真偽値フィールド．
							真にすると，ビルド用ディレクトリ内のファイル ltconfig と ltmain.sh が Darwin に対応したバージョンに取り換えられる．
							その動作は，パッチ段階で，PatchScript が実行される前に行われる．
							これが必要だと分かっているとき<b>のみ</b>使うこと．
							libtool 関連のスクリプトをバージョンの合わないものに取り換えると壊れるパッケージもある．
							詳細については<a href="http://fink.sourceforge.net/doc/porting/libtool.php">libtool のページ</a>を参照．
						</p>
					</td></tr><tr valign="top"><td>UpdateLibtoolInDirs</td><td>
						<p>
							<b>post-0.9.0 CVS バージョンで導入</b>
							サブディレクトリのリストを指定する．
							これは UpdateLibtool と同じことを行うが，ソースツリー中の複数のディレクトリに古い libtool 1.3.x 系列のスクリプトが入っているパッケージで便利だ．
							以前はコピーや移動を行うよう PatchScript に手動で指定する必要があったが，この新フィールドではディレクトリを単に列挙するだけでよい．
							ビルド用ディレクトリ自身の中のファイルの更新には <code>.</code> とする．
						</p>
					</td></tr><tr valign="top"><td>UpdatePoMakefile</td><td>
						<p>
							真偽値フィールド．
							真にすると，サブディレクトリ <code>po</code> 内のファイル <code>Makefile.in.in</code> が，パッチの当たったものと取り換えられる．
							その動作は，パッチ段階で，PatchScript が実行される前に行われる．
						</p>
						<p>
							パッチの当たった <code>Makefile.in.in</code> は DESTDIR の指定を優先し，メッセージカタログを，
							<code>/sw/lib/locale</code> ではなく，確実に <code>/sw/share/locale</code> に格納する．
							このフィールドを利用する前に，入れ換えによってパッケージを破壊していないこと，また入れ換えが本当に必要かどうかを確認すること．
							<code>diff</code> を実行すれば，パッケージ付属のものと Fink 向けのもの (<code>/sw/lib/fink/update</code> 内にある) との違いが分かる．
						</p>
					</td></tr><tr valign="top"><td>Patch</td><td>
						<p>
							<code>patch -p1 &lt;<b>パッチファイル</b>
							</code> として適用されるパッチのファイル名．
							これには単なるファイル名を指定する．
							適切なパスは自動的に前置される．
							このフィールドではパーセント記法が展開されるので，典型的な場合では，値は単に <code>%f.patch</code> または <code>%n.patch</code> となる．
							PatchScript が指定されているとき，パッチはその後に実行される．
						</p>
					</td></tr><tr valign="top"><td>PatchScript</td><td>
						<p>
							パッチ段階で実行されるコマンドのリスト．
							以下のスクリプトの注意書きを参照．
							ここには，パッチを当てるか，またはパッケージに変更を加えるコマンドを指定する．
							デフォルト値はない．
							コマンドが実行される前に，パーセント記法が展開される (前節を参照)．
						</p>
					</td></tr></table>
			<p>
				<b>コンパイル (Compile Phase):</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Set<b>環境変数名</b>
					</td><td>
						<p>
							コンパイルおよびインストールの段階の間，環境変数を設定しておく．
							コンパイラ・フラグ等を configure スクリプトや Makefile に渡すために使われる．
							現在，対応している変数は次の通り: CC, CFLAGS, CPP, CPPFLAGS, CXX, CXXFLAGS, LD, LDFLAGS, LIBS, MAKE, MFLAGS, MAKEFLAGS.
							指定した値では，前節で説明したパーセント記法が展開される．
							よく使われる例:
						</p>
<pre>SetCPPFLAGS: -no-cpp-precomp</pre>
						<p>
							変数 CPPFLAGS および LDFLAGS は特別で，それぞれ <code>-I%p/include</code> および <code>-L%p/lib</code> というデフォルト値を持つ．
							これらの環境変数に値を指定すると，指定した値はデフォルト値の前に加えられる (デフォルト値は常に含まれる)．
						</p>
					</td></tr><tr valign="top"><td>NoSet<b>ENVVAR</b>
					</td><td>
						<p>
							真偽値フィールド．
							真にすると，上述の CPPFLAGS および LDFLAGS に対するデフォルト値は無効になる．
							すなわち， LDFLAGS の値を空にしたいときには <code>NoSetLDFLAGS: true</code> とする．
						</p>
					</td></tr><tr valign="top"><td>ConfigureParams</td><td>
						<p>
							configure スクリプトに渡す付加的なパラメータ．
							(詳細は CompileScript を参照．)

							0.13.7 より上のバージョンの Fink では，
							このパラメータは <code>Type: Perl</code> となっている perl モジュールにも使える．
							その場合，デフォルトの perl Makefile.PL 文字列に後置される．
						</p>
					</td></tr><tr valign="top"><td>GCC</td><td>
						<p>
							コンパイルに使う gcc に要求されるバージョン．
							指定できる値は以下の通り:
							<code>2.95.2</code> または <code>2.95</code> (パッケージ・ツリー 10.1 でのみ利用可能)，
							<code>3.1</code> (パッケージ・ツリー 10.1 でのみ利用可能)，
							<code>3.3</code> (パッケージ・ツリー 10.2-gcc3.3 および 10.3 でのみ利用可能)．
						</p>
						<p>
							Fink 0.13.8 以降，このフラグが指定されると， gcc のバージョンは <code>gcc_select</code> によって調べられ，
							誤ったバージョンのものが存在すると Fink はエラー終了する．
						</p>
						<p>
							このフィールドは gcc コンパイラ間の移行を助けるために Fink に加えられた．
							gcc では， C++ コードの関わるライブラリ間で，実行可能・ファイル同士の (バージョン名に反映されない) 非互換が生じることがある．
						</p>
					</td></tr><tr valign="top"><td>CompileScript</td><td>
						<p>
							コンパイル段階で実行されるコマンドのリスト．
							See the note on scripts below.
							パッケージの configure およびコンパイルを行うコマンドをここに指定する．
							普通，デフォルトは次のようなものだ．
						</p>
<pre>./configure %c
make</pre>
						<p>
							これは GNU autoconf を利用するパッケージには適切だ．
							Perl タイプ (フィールド Type で指定される) のパッケージのうち perl のバージョン指定がないものでは，
							デフォルト値は次のようになる．
						</p>
<pre>perl Makefile.PL PREFIX=%p \
INSTALLPRIVLIB=%p/lib/perl5 \
INSTALLARCHLIB=%p/lib/perl5/darwin \
INSTALLSITELIB=%p/lib/perl5 \
INSTALLSITEARCH=%p/lib/perl5/darwin \
INSTALLMAN1DIR=%p/share/man/man1 \
INSTALLMAN3DIR=%p/share/man/man3
make
make test</pre>
						<p>
							タイプが <code>perl $version</code> となっていて，バージョンが指定されているものでは (例えば $version は 5.6.0 とする)，
							デフォルト値は次のようになる．
						</p>
<pre>perl$version Makefile.PL \
PERL=perl$version PREFIX=%p \
INSTALLPRIVLIB=%p/lib/perl5/$version \
INSTALLARCHLIB=%p/lib/perl5/$version/darwin \
INSTALLSITELIB=%p/lib/perl5/$version \
INSTALLSITEARCH=%p/lib/perl5/$version/darwin \
INSTALLMAN1DIR=%p/share/man/man1 \
INSTALLMAN3DIR=%p/share/man/man3
make
make test</pre>
						<p>
							コマンドの実行前に，パーセント記法が展開される (前節を参照)．
						</p>
					</td></tr><tr valign="top"><td>NoPerlTests</td><td>
						<p>
							<b>Fink &gt; 0.13.7 で導入．</b>
							真偽値フィールド．
							Perl モジュールのパッケージでのみ指定する．
							真にすると， <code>CompileScript</code> のうち <code>make test</code> の部分が，その perl モジュールのパッケージでは無視される．
						</p>
					</td></tr></table>
			<p>
				<b>インストール段階:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>UpdatePOD</td><td>
						<p>
							<b>Fink 0.9.5 で導入．</b>
							真偽値フィールド．
							Perl モジュールのパッケージでのみ指定する．
							真にすると，スクリプト install, postrm および postinst に， perl パッケージの提供する .pod ファイルを管理するためのコードを追加する．
							このとき，中央のファイル <code>/sw/lib/perl5/darwin/perllocal.pod</code> に .pod ファイルのデータを追加したり，そこから削除も行う．
							(タイプが， <code>perl $version</code> のように，perl の特定のバージョン (例えば 5.6.0) と共に指定された場合は，
							それらのスクリプトが扱う中央 .pod ファイルは <code>/sw/lib/perl5/$version/perllocal.pod</code> になる．)
						</p>
					</td></tr><tr valign="top"><td>InstallScript</td><td>
						<p>
							インストール段階で実行されるコマンドのリスト．
							See the note on scripts below.
							ここには必要な全てのファイルをパッケージの stow directory にコピーするコマンドを指定する．
							普通，デフォルト値は次のようになる．
						</p>
<pre>make install prefix=%i</pre>
						<p>
							これは GNU autoconf を利用するパッケージには適切だ．
							Perl タイプ (フィールド Type で指定される) のパッケージのうち perl のバージョン指定がないものでは，
							デフォルト値は次のようになる．
						</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5 \
INSTALLARCHLIB=%i/lib/perl5/darwin \
INSTALLSITELIB=%i/lib/perl5 \
INSTALLSITEARCH=%i/lib/perl5/darwin \
INSTALLMAN1DIR=%i/share/man/man1 \
INSTALLMAN3DIR=%i/share/man/man3</pre>
						<p>
							タイプが <code>perl $version</code> となっていて，バージョンが指定されているものでは (例えば $version は 5.6.0 とする)，
							デフォルト値は次のようになる．
						</p>
<pre>make install INSTALLPRIVLIB=%i/lib/perl5/$version \
INSTALLARCHLIB=%i/lib/perl5/$version/darwin \
INSTALLSITELIB=%i/lib/perl5/$version \
INSTALLSITEARCH=%i/lib/perl5/$version/darwin \
INSTALLMAN1DIR=%i/share/man/man1 \
INSTALLMAN3DIR=%i/share/man/man3</pre>
						<p>
							パッケージが対応しているなら，代わりに <code>make install DESTDIR=%d</code> を使うことが望ましい．
							コマンドの実行前に，パーセント記法が展開される (前節を参照)．
						</p>
					</td></tr><tr valign="top"><td>JarFiles</td><td>
						<p>
							<b>Fink-0.10.0で導入</b>
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
							また，これらの jar ファイル (特にディレクトリ <code>%p/share/java/%n</code> 内にある .jar で終わるファイル)
							は環境変数 CLASSPATH に確実に追加される．
							このフィールドにより， configure や ant といったツールが，インストールされる jar ファイルを適切に判別できるようになる．
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
							このフィールドは InstallScript に適切な <code>install</code> コマンドを前置することで動作する．
						</p>
					</td></tr><tr valign="top"><td>Shlibs</td><td>
						<p>
							<b>Fink-0.11.0 バージョンで導入</b>
							このフィールドでは，そのパッケージでインストールされる共有ライブラリを指定する．
							各共有ライブラリ毎に1行ずつ，空白文字で区切った以下の3項目を記述する．
							1) ライブラリの <code>-install_name</code> 2) ライブラリの<code>-compatibility_version</code>
							3) バージョン付き依存性情報で，その -compatibility_version を持つこのライブラリを提供するFinkパッケージを指定するもの
							依存情報は <code>foo (&gt;= バージョン-版)</code> という型式で指定しなければいけない．
							ここで <code>バージョン-版</code> は， (互換性バージョンの同じ) そのライブラリを利用可能にしてくれる Fink パッケージの
							<b>一番古い</b>バージョンを指す．
							フィールド Shlibs の設定は「この名前がついていて compatibility_version がこれ以上のライブラリは，
							その Fink パッケージの今後のバージョンでも必ず含まれている」というメインテナからの保証に相当する．
						</p>
					</td></tr><tr valign="top"><td>RuntimeVars</td><td>
						<p>
							<b>Fink-0.10.0 バージョンで導入</b>
							このフィールドは，実行時に環境変数を何らかの固定された値に設定する簡便な方法を提供する．
							(柔軟性が必要なら <a href="#profile.d">profile.d スクリプト section</a> を参照．)
							そのパッケージがインストールされる限り，
							ここに指定した環境変数はスクリプト <code>/sw/bin/init.[c]sh</code> によって設定される．
						</p>
						<p>
							環境変数の値には空白文字が使える (値の末尾に来ると取り除かれるが)．
							またパーセント記法は展開される．
							例:
						</p>
<pre>RuntimeVars: &lt;&lt;
SomeVar: %p/Value
AnotherVar: foo bar
&lt;&lt;</pre>
						<p>
							これは2つの環境変数 'SomeVar' および 'AnotherVar' を，それぞれ '/sw/Value' (あなたの環境のプリフィクスの値による) および 'foo bar' に設定する．
						</p>
						<p>
							このフィールドは InstallScript に適切なコマンドを後置することで機能する．
							それらのコマンドは，各環境変数に対して setenv/export 行をパッケージの profile.d スクリプトに追加する．
							よってあなた独自の環境変数は上書きされないので，自由に追加できる．
							これらの行はスクリプトに前置されるので，これらの環境変数をスクリプト内で利用できる．
						</p>
					</td></tr><tr valign="top"><td>SplitOff</td><td>
						<p>
							<b>Fink-0.9.9 バージョンで導入</b>
							1回のコンパイル/インストール操作で第2のパッケージを生成する．
							これの動作の詳細については，個別に書かれた <a href="#splitoffs">splitoff の章</a> を参照．
						</p>
					</td></tr><tr valign="top"><td>SplitOff<b>N</b>
					</td><td>
						<p>
							<b>Fink-0.9.9 バージョンで導入</b>
							これはフィールド <code>SplitOff</code> と同様だが，1回のコンパイル/インストール操作で第3，第4のパッケージを生成するために使われる．
						</p>
					</td></tr><tr valign="top"><td>Files</td><td>
						<p>
							<b>Fink-0.9.9 バージョンで導入</b>
							フィールド <code>SplitOff</code> または <code>SplitOff<b>N</b>
							</code> の内部<b>のみ</b>で使われる．
							ここでは，親パッケージのインストールディレクトリ %I から splitoff したパッケージのインストールディレクトリ %i に
							どのファイルやディレクトリを移動するべきかを指定する．
							これが実行されるタイミングは，親パッケージの InstallScript や DocFiles に指定したコマンドの実行後で，
							splitoff したパッケージの InstallScript や Docfiles の実行前であることに注意．
						</p>
					</td></tr></table>
			<p>
				<b>ビルド段階:</b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>PreInstScript, PostInstScript, PreRmScript, PostRmScript</td><td>
						<p>
							これらのフィールドには，パッケージがインストール，アップグレード，または削除されるときに実行されるシェルスクリプトの断片を記述する．
							Fink はシェルスクリプトのヘッダ <code>#!/bin/sh</code> を自動的に追加し，また <code>set -e</code> を実行してくれる．
							よってどのコマンドが実行に失敗しても，スクリプトはその時点で停止する．
							また Fink は末尾に <code>exit 0</code> を追加する．
							エラーの発生を示すには，非ゼロの終了コードでスクリプトから exit する．
							第1実引数 (<code>$1</code>) は，どのアクションが実行されているかを示す値に設定される．
							値としては <code>install</code>, <code>upgrade</code>, <code>remove</code> および <code>purge</code> が使われ得る．
							Note that there are more values,
							used during error rollback or when removing a package in favor of another one.
						</p>
						<p>
							このスクリプトは以下のタイミングで実行される．
						</p>
						<ul>
							<li>PreInstScript: パッケージが初めてインストールされたときと，パッケージをそのバージョンにアップグレードする前．</li>
							<li>PostInstScript: パッケージの解凍後で，パッケージを設定する前．</li>
							<li>PreRmScript: パッケージが削除される前，または新しいバージョンにアップグレードされる前．</li>
							<li>PostRmScript: パッケージが削除された後，または新しいバージョンにアップグレードされた後．</li>
						</ul>
						<p>
							補足説明: アップグレードは新バージョンの ...Inst スクリプトと，旧バージョンの ...Rm スクリプトを実行する．
							詳細については the Debian Policy Manual,
							<a href="http://www.debian.org/doc/debian-policy/ch-maintainerscripts.html">第6章</a> を参照．
						</p>
						<p>
							スクリプト内ではパーセント記法は展開される．
							一般に，コマンドはフルパスを指定しなくても実行できる．
						</p>
					</td></tr><tr valign="top"><td>ConfFiles</td><td>
						<p>
							ユーザが修正し得る設定ファイルの空白区切りのリスト．
							ファイルは，次のように絶対パスで指定しなければいけない．
							<code>%p/etc/foo.conf</code>.
							dpkg はここで指定されたファイルを特別扱いする．
							パッケージがアップグレードされたとき，新設定ファイルが提供され，しかもユーザが旧パッケージの設定ファイルが修正していた場合は，
							ユーザはどちらのバージョンを使うか尋ねられ，設定ファイルのバックアップが作られる．
							パッケージを "remove" しても，設定ファイルは削除されずにディスク上に残る．
							設定ファイルも削除されるのは "purge" を命じたときのみ．
						</p>
					</td></tr><tr valign="top"><td>InfoDocs</td><td>
						<p>
							パッケージが %p/share/info にインストールする Info 文書のリスト．
							この設定により，Info ディレクトリ・ファイル <code>dir</code> を管理するための適切なコードがスクリプト postinst および prerm に追加される．
							この機能はまだ流動的で，将来，精密な管理のためにさらにフィールドが追加されるかも知れない．
						</p>
					</td></tr><tr valign="top"><td>DaemonicFile</td><td>
						<p>
							<code>daemonic</code> のサービスの説明を記述する．
							Fink は <code>daemonic</code> を使ってデーモン・プロセス (web サーバ等) のための StartupItems を生成したり削除する．
							The description will added to the package as a file named <code>%p/etc/daemons/<b>name</b>.xml</code>,
							ここで <b>name</b> はフィールド DaemonicName で指定される (デフォルト値は「パッケージ名」)．
							このフィールドの値ではパーセント記法が展開される．
							パッケージが <code>daemonic</code> を利用するなら，依存性リストに加えなければいけないことに注意．
						</p>
					</td></tr><tr valign="top"><td>DaemonicName</td><td>
						<p>
							<code>daemonic</code> サービスの情報記述ファイルが使う名前．
							詳細についてはフィールド DaemonicFile の説明を参照．
						</p>
					</td></tr></table>
			<p>
				<b>付加的データ: </b>
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>Homepage</td><td>
						<p>
							upstreamパッケージのホームページの URL．
						</p>
					</td></tr><tr valign="top"><td>DescDetail</td><td>
						<p>
							フィールド <code>Description</code> よりも詳しい説明．
							(それが何であるか，何のために使うものか？)
							複数行に渡ってよい．
							このフィールドはワードラップの恩恵に預らずに表示されるので， (可能ならば) 手動で改行を挿入して1行を79文字以内に収めること．
						</p>
					</td></tr><tr valign="top"><td>DescUsage</td><td>
						<p>
							パッケージを利用する上で必要になる情報を記述する．
							(そのパッケージはどのように使うものなのか？)
							例えば「 WindowMaker を使う前に wmaker.inst を起動．」等を (英語で) ここに記述する．
							複数行に渡ってよい．
							このフィールドはワードラップの恩恵に預らずに表示されるので， (可能ならば) 手動で改行を挿入して1行を79文字以内に収めること．
						</p>
					</td></tr><tr valign="top"><td>DescPackaging</td><td>
						<p>
							パッケージングに関する注意書き．
							「ファイルを適切な場所に置くために Makefile にパッチを当てる」等を (英語で) ここに記述する．
							複数行に渡ってよい．
						</p>
					</td></tr><tr valign="top"><td>DescPort</td><td>
						<p>
							パッケージを Darwin に移植する場合について特有の注意書き．
							「config.guess と libtool スクリプトはアップデートする． -no-cpp-precomp が必要」等を (英語で) ここに記述する．
							複数行に渡ってよい．
						</p>
					</td></tr></table>
		

		<h2><a name="splitoffs">5.3 スプリットオフ (SplitOff)</a></h2>
			
			<p>
				Fink 0.9.9 に導入．
				ひとつの .info ファイルで複数のパッケージを作成できる．
				インストール段階は普通に始まり， <code>InstallScript</code> と <code>DocFiles</code> コマンドを実行する．
				<code>SplitOff</code> フィールドが存在すれば，２つ目のインストールディレクトリを作成する．
				<code>SplitOff</code> フィールドでは，新規インストールディレクトリは %I で参照され，元のインストールディレクトリは %i で参照される．
			</p>
			<p>
				<code>SplitOff</code> フィールドには多くのフィールドを含み，実質上，完全なパッケージ記述情報とよく似ている．
				しかし <code>SplitOff</code> フィールドにはないフィールドもある．
				以下は <code>SplitOff</code> に含まれる副詳細 (分野別)．
			</p>
			<ul>
				<li>
					初期データ (Initial Data):
					<code>Package</code> のみ特定する必要があります．
					その他は全て親パッケージから引き継がれます．
					<code>Type</code> と <code>License</code> は <code>SplitOff</code> 内で宣言することで変更することができます．
					パーセント拡張も使うことができます．
					特に，親パッケージの名称を参照する %N は便利です．
				</li>
				<li>依存性 (Dependency): 全てのフィールドが対象です．</li>
				<li>
					解梱段階 (Unpack Phase), パッチ段階 (Patch Phase), コンパイル段階 (Compile Phase): このフィールドは関連がないため無視されます．
				</li>
				<li>
					インストール段階 (Install Phase), ビルド段階 (Build Phase): いずれも全てのフィールドを修正可能
					(<code>SplitOff</code> は <code>SplitOff</code> 内では使用できない)．
				</li>
				<li>
					追加データ: 親パッケージから引き継がれるが， <code>SplitOff</code> 内で宣言して修正できる．
				</li>
			</ul>
			<p>
				インストール段階では，まず親パッケージの <code>InstallScript</code> と <code>DocFiles</code> が実行されます．
				次に， <code>SplitOff</code> フィールド内の <code>Files</code> が実行され，
				親インストールディレクトリ %I から 現在のインストールディレクトリ %i にファイルを移し，
				<code>SplitOff</code> パッケージ内の <code>InstallScript</code> や <code>DocFiles</code> などが実行されます．
			</p>
			<p>
				<code>SplitOff2</code>, <code>SplitOff3</code> など，さらに副パッケージが存在する場合，
				同じ順序 (<code>Files</code>, <code>InstallScript</code>, <code>DocFiles</code>) で順々に実行されていきます．
			</p>
			<p>
				ビルド段階中，各パッケージの pre/post install/remove スクリプトをビルド段階コマンドを使って作成します．
			</p>
			<p>
				それぞれのパッケージは，ビルド時に %i/share/doc/%n 内にあるライセンスの同意を得る必要があります
				(%n の値は当然パッケージごとに異なります)．
				<code>DocFiles</code> はファイルを移動ではなくコピーします．
				これにより， <code>DocFiles</code> を使ってそれぞれのパッケージに同一のドキュメントをインストールします．
			</p>

		

		<h2><a name="scripts">5.4 スクリプト</a></h2>
			

			<p>
				フィールド PatchScript, CompileScript, InstallScript には，実行させたいシェルコマンドを記述します．
				形式は2種類あります．
			</p>
			<p>
				このフィールドはコマンド一覧です．
				これは一見シェルスクリプトのようですが， system() を通して実行されます．
				一行ごとに実行し，変数の設定やディレクトリの移動はその行内でのみ有効です．
				0.18.2 以降の CVS 版では通常のシェルスクリプトと同様に長い行をバックスラッシュ (<code>\</code>) で改行できるようになりました．
			</p>
			<p>
				または，ここには，任意のスクリプト処理系の完全なスクリプトを記述することもできる．
				その場合，他の Unix のスクリプトファイルと同様，第1行目は <code>#!</code> にインタプリタのフルパス名を続け，
				さらに必要なフラグを続けたものでなければいけない．
				(<code>#!/bin/csh</code>, <code>#!/bin/bash -ev</code> 等．)
				その場合，フィールド *Script の値全体が一時ファイルにダンプされ，実行される．
			</p>
		

		<h2><a name="patches">5.5 パッチ</a></h2>
			

			<p>
				パッケージを Darwin でコンパイルするために (または Fink と協調して動作するようにするために) パッチが必要な場合，
				パッケージ情報記述ファイルの拡張子 ".info" を ".patch" に変えたファイル名を使い， .info ファイルと同じディレクトリに入れる．
				パッケージファイル名に full package を使っている場合は，次のどちらかを使う (どちらも同等)．
			</p>
<pre>Patch: %f.patch</pre>
			<pre>PatchScript: patch -p1 &lt;%a/%f.patch</pre>
			<p>
				新しく導入された方の簡潔なパッケージファイル命名規則を採用しているなら， %f でなく %n を使うこと．
				これら2つのフィールドは互いに排他的ではなく，両方指定してもよい (すると PatchScript, Patch の順に両方実行される)．
			</p>
			<p>
				パッチファイルを使ってユーザがプリフィクスを選択できるようにする方がよいので，
				<code>/sw</code> という決め打ちではなく <code>@PREFIX@</code> 等の変数を使った方がよい．
				そして次のようにする．
			</p>
<pre>PatchScript: sed 's|@PREFIX@|%p|g' &lt;%a/%f.patch | patch -p1</pre>
			<p>
				パッチの書式は unidiff (unified diff) でなければいけない．
				普通，次のようにして生成できる．
			</p>
<pre>diff -urN &lt;originalsourcedir&gt; &lt;patchedsourcedir&gt;</pre>
			<p>
				エディタに Emacs を使っているなら，上記のコマンド diff の引数に <code>-x'*~'</code> を加え，
				自動生成されたバックアップファイルを比較対象から除くとよい．
			</p>
			<p>
				巨大なファイルサイズのパッチを cvs に入れるのはまずいことにも注意．
				そういうパッチは web/ftp サーバに置き，フィールド <code>SourceN:</code> に指定する．
				自分のウェブサイトを持っていなくても， Fink プロジェクトの管理者がそのファイルを Fink のサイトそのものからダウンロードできるようにしてくれる．
				パッチが 30KB より大きければ，独立にダウンロードする方法を考慮した方がよい．
			</p>
		

		<h2><a name="profile.d">5.6 Profile.d スクリプト</a></h2>
			

			<p>
				パッケージが実行時に何らかの初期化 (環境変数の設定など) を必要とするなら， profile.d スクリプトを使えばよい．
				これらのスクリプト断片はスクリプト <code>/sw/bin/init.[c]sh</code> に読み込まれる．
				普通，全ての Fink ユーザがシェルのスタートアップファイル (<code>.cshrc</code> またはそれと互換なファイル) でそれを読み込むはずだ．
				パッケージでは，どのスクリプトにも2種類を用意しなければいけない:
				sh 互換シェル (sh, zsh, bash, ksh, ...) 用と， csh 互換シェル (csh, tcsh) 用だ．
				それらのスクリプトは <code>/sw/etc/profile.d/%n.[c]sh</code> としてインストールされなければいけない．
				(ここで %n は，他と同様に「パッケージ名」を表す．)
				また，それらのパーミッションは実行，読み込みが共に可能でなければいけない．
				(すなわち，それらのインストールには引数 -m 755 を付ける．)
				そうでないと正しく読み込まれないからだ．
			</p>
			<p>
				いくつかの環境変数を単に設定したいだけなら (QTDIR を '/sw' にする，など)，フィールド RuntimeVars を使えばよい．
				このフィールドはまさにその作業を簡略化するために用意されたものだ．
			</p>
		

	

<? include_once "footer.inc"; ?>
