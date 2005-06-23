<?
$title = "パッケージ作成 - パッケージ記述";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2005/06/23 20:16:36';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="next" href="policy.php?phpLang=ja" title="パッケージ化ポリシー"><link rel="prev" href="intro.php?phpLang=ja" title="始めに">';


include_once "header.ja.inc";
?>
<h1>パッケージ作成 - 2. パッケージ記述</h1>
		
		
		<h2><a name="trees">2.1 ツリーレイアウト</a></h2>
			
			<p>
				パッケージ記述はディレクトリ <code>/sw/fink/dists</code> 下のディレクトリ <code>finkinfo</code> から読み込まれます．
				「ツリー」の設定はファイル <code>/sw/etc/fink.conf</code> にあり，これでどのディレクトリを読むかを指定します．
				パッケージ記述ファイルの名前は，Fink パッケージの正式名称に拡張子 ".info" を付けたものです．
				Fink 0.13.0 以降では，パッケージのアップデートの手間を省くための，
				「パッケージ名」に拡張子 ".info" を付けただけの簡略形式が便利です．
			</p>
			<p>
				パッケージ記述ツリーはいくつかの階層のディレクトリにまとめられています．
				最上段から順の説明:
			</p>
			<ul>
				<li>
					ツリーは <code>dists</code> から始まる．
					<code>dists</code> ディレクトリは Debian ツールで必須．
				</li>
				<li>
					ディストリビューション．
					<code>stable</code>,<code>unstable</code>, <code>local</code> に分かれる．
					ディレクトリ <code>local</code> は各システムの管理者とユーザが管理する．
					ディレクトリ <code>stable</code> と <code>unstable</code> は Fink システムの一部．
				</li>
				<li>
					ツリー．
					ツリー <code>main</code> にはパッケージの大部分が含まれる．
					暗号を使うソフトウェアは別ツリー <code>crypto</code> に収められ，必要とあらば簡単に取り除ける．
				</li>
				<li>
					<code>finkinfo</code> または <code>binary-darwin-powerpc</code>．
					<code>finkinfo</code> は Fink のパッケージ記述とパッチを含み，
					<code>binary-darwin-powerpc</code> は <code>.deb</code> 形式のバイナリパッケージを含む．
				</li>
				<li>
					セクション．
					ツリー <code>main</code> は，管理しやすくするために種類別に分類されている．
					ツリー <code>crypto</code> は現在のところ分類されていない．
				</li>
			</ul>
		
		<h2><a name="format">2.2 ファイル形式</a></h2>
			
			<p>
				パッケージ記述ファイルはキーと値の組 (別名「フィールド」) の単純なリストです．
				次のように，各行はキーで始まり，コロン (:) 以降が値になります:
			</p>
<pre>Key: Value</pre>
			<p>
				複数行に渡らざるを得ないフィールドには 2 通りの記法があります．
			</p>
			<p>
				1 つ目はシェルスクリプトで言う "here-document" 風の形式で，こちらの方が望ましいです．
				この方式では，第1行は，キー，コロンの次に値として <code>&lt;&lt;</code> が続くものになります．
				その後の行が全て実質的な値となり，行頭に <code>&lt;&lt;</code> を置いた行が値の終端区切りです．
				例:
			</p>
<pre>InstallScript: &lt;&lt;
mkdir -p %i/share/man
make install prefix=%i mandir=%i/share/man
mkdir -p %i/share/doc/%n
install -m 644 COPYING %i/share/doc/%n
&lt;&lt;</pre>
			<p>
				この形式ではインデントを付けて構いません．
				その方が読みやすくなるでしょう．
			</p>
			<p>
				here-document 形式はネストできます．
				これはフィールド <code>SplitOff</code> や <code>SplitOff<b>N</b></code> でよく使われます．
				これらのフィールドは他の (複数行の) フィールドを含むことができ，
				here-document 形式を使えば含まれる方のフィールドにも複数行の値が使えます．
				内側でも同じ区切り <code>&lt;&lt;</code> が使われます．
			</p>
<pre>
SplitOff: &lt;&lt;
    Package: %N-shlibs
    InstallScript: &lt;&lt;
        ln -s %p/lib/libfoo.2.dylib %i/lib/libfoo.%v.dylib
    &lt;&lt;
&lt;&lt;
</pre>
			<p>
				今は推奨されない旧式の記法は「RFC 822 ヘッダ折り畳み方法」を手本に作られました．
				空白で始まる行を前の行からの続きと認識します．
				例:
			</p>
<pre>InstallScript: mkdir -p %i/share/man
 make install prefix=%i mandir=%i/share/man
 mkdir -p %i/share/doc/%n
 install -m 644 COPYING %i/share/doc/%n</pre>
			<p>
				各行頭の空白は必須であることに注意して下さい．
			</p>
			<p>
				どちらの形式でも，空行と，シャープ (#) で始まる行は無視されます．
				キー (フィールド名) では大文字と小文字の区別がないので，
				<code>InstallScript</code> を <code>installscript</code> や <code>INSTALLSCRIPT</code> とも書けますが，
				最初の <code>InstallScript</code> という方式が読み易いのでこれを使いましょう．
				真偽値を取るフィールドでは "true", "yes", "on", "1" (大文字，小文字の区別なし)
				のいずれも「真」となり，それ以外は全て「偽」になります．
			</p>
		
		<h2><a name="percent">2.3 パーセント展開</a></h2>
			
			<p>
				簡便のため， Fink はいくつかのフィールドで以下の文字列展開をサポートします．
				曖昧さをさけるため，波括弧を使ってどの文字までがパーセント展開を受けるのかを明示できます．
				例えば <code>%{n}</code> は <code>%n</code> と同義です．
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left"></th><th align="left"></th></tr><tr valign="top"><td>%n</td><td>
						<p>
							<b>n</b>ame．「パッケージ名」．
						</p>
					</td></tr><tr valign="top"><td>%N</td><td>
						<p>
							<b>N</b>ame．親パッケージの「パッケージ名」． (<code>SplitOff</code> 内部以外では %n と同じ)
						</p>
					</td></tr><tr valign="top"><td>%e</td><td>
						<p>
							<b>e</b>poch．パッケージの「エポック」．
						</p>
					</td></tr><tr valign="top"><td>%v</td><td>
						<p>
							<b>v</b>ersion．「バージョン」．
						</p>
					</td></tr><tr valign="top"><td>%r</td><td>
						<p>
							<b>r</b>evision．パッケージの「版」．
						</p>
					</td></tr><tr valign="top"><td>%f</td><td>
						<p>
							<b>f</b>ull package name．%n-%v-%r と等価．
						</p>
					</td></tr><tr valign="top"><td>%p, %P</td><td>
						<p>
							<b>p</b>refix．Fink のインストール場所．例: <code>/sw</code>．
							全てのユーザーが <code>/sw</code> に Fink をインストールしているわけではない．
							<code>%p</code> で正しいパスを取得する．
						</p>
					</td></tr><tr valign="top"><td>%d</td><td>
						<p>
							<b>d</b>estination．パッケージ化するツリーのビルド先．
							例:<code>/sw/src/root-gimp-1.2.1-1</code>
							この一時ディレクトリはパッケージをコンパイルする際のインストール段階でルートディレクトリの役を果たす．
							<code>root-%f</code> が <code>%p/src</code> の中にあることを当てにしてはいけない．
							ユーザが設定ファイル <code>/sw/etc/fink.conf</code> でフィールド <code>Buildpath</code>
							を指定すればこの場所は変わってしまう．
						</p>
					</td></tr><tr valign="top"><td>%D</td><td>
						<p>
							<b>D</b>estination．
							親パッケージのビルド先 (<code>SplitOff</code> 内部以外では %d と同じ)．
						</p>
					</td></tr><tr valign="top"><td>%i</td><td>
						<p>
							the full <b>i</b>nstall-phase prefix．インストール段階での一時インストールディレクトリの完全名． %d%p と等価．
						</p>
					</td></tr><tr valign="top"><td>%I</td><td>
						<p>
							<b>I</b>nstall prefix．
							親パッケージのインストール段階での一時インストールディレクトリの完全名．
							%D%Pと等価 (<code>SplitOff</code> 内部以外では %i と同じ)．
						</p>
					</td></tr><tr valign="top"><td>%a</td><td>
						<p>
							p<b>a</b>tches．
							パッチを検索するディレクトリパス．
						</p>
					</td></tr><tr valign="top"><td>%b</td><td>
						<p>
							<b>b</b>uild．
							ビルドディレクトリ．例: <code>/sw/src/gimp-1.2.1-1/gimp-1.2.1</code>
							<code>%f</code> が <code>%p/src</code> の中にあることを当てにしてはいけない．
							ユーザが設定ファイル <code>/sw/etc/fink.conf</code> でフィールド <code>Buildpath</code>
							を指定すればこの場所は変わってしまう．
							最も内側のディレクトリ名は， <code>Source</code> ファイル名か， (もしあれば) <code>SourceDirectory</code> 
							フィールドの値となります．
							ただし， <code>NoSourceDirectory</code> が <code>true</code>
							であれば使用されません．
						</p>
						<p>
							注記: %b は使わざるを得ないときだけ使用して下さい．
							ビルドディレクトリはスクリプトが実行されるときのカレントディレクトリです．
							コマンドでは相対パス名を使わなければいけません．
						</p>
					</td></tr><tr valign="top"><td>%c</td><td>
						<p>
							configure に渡すパラメータ: <code>--prefix=%p</code> の他，フィールド <code>ConfigureParams</code> で指定したもの全て．
						</p>
					</td></tr><tr valign="top"><td>%m</td><td>
						<p>
							<b>m</b>achine architecture．
							マシンアーキテクチャーを示す記号で，<code>uname -p</code> の出力．
							現在のところ， PPC マシンでは 'powerpc' ， x86 マシンでは 'i386' という値になる
							(0.12.1 CVS版以降の Fink で導入)．
						</p>
					</td></tr><tr valign="top"><td>%%</td><td>
						<p>
							パーセント記号そのもの (これ以降にどの文字が続いても展開されない)．
							展開は厳密に左から右に行われるので， %%n はパッケージ名とは一切関係なく，単なる文字列 %n を表すことになる．
							(fink-0.18.0 で導入)
						</p>
					</td></tr><tr valign="top"><td>%type_raw[<b>タイプ</b>], %type_pkg[<b>タイプ</b>]</td><td>
						<p>
							指定された <b>タイプ</b> のサブタイプを返す疑似ハッシュ．
							詳細は後述のフィールド <code>Type</code> の解説を参照．
							_raw 形式はサブタイプの文字列をそのまま返すが， _pkg 形式はドット (.) を 全て取り除いた文字列を返す．
							(Fink のパッケージ命名規約の「プログラミング言語-バージョン」方式に使う．他にもうまい使い方があるかも)．
							(0.19.2 CVS 版以降の Fink で利用可能)
						</p>
					</td></tr><tr valign="top"><td>%{ni}, %{Ni}</td><td>
						<p>
							"<b>n</b>ame <b>i</b>nvariant"．
							%n や %N と似ているが， %type_pkg[] と %type_raw[] に当たる部分は全て空白に変わる．
							(0.19.2 CVS 版以降の Fink で利用可能)
							%n や %N を使った際の混乱を避けるためには %{ni} や %{Ni} を使うこと．
						</p>
					</td></tr><tr valign="top"><td>%{default_script}</td><td>
						<p>
							<code>*Script</code> フィールドでのみ有効．
							<code>*Script</code> フィールドでのデフォルトフィールド．
							値は <code>Type</code> に依存するが，常に存在する（または空欄）．
							<code>SplitOff: InstallScript</code> で使われる場合，
							<code>SplitOff</code> パッケージの <code>InstallScript</code> デフォルトが空欄であっても，
							この展開は<b>親</b>のデフォルトになる．
							
						</p>
					</td></tr></table>
		
	<p align="right"><? echo FINK_NEXT ; ?>:
<a href="policy.php?phpLang=ja">3. パッケージ化ポリシー</a></p>
<? include_once "../../footer.inc"; ?>


