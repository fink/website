<?
$title = "パッケージ化 - パッケージ詳細";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/09 15:29:17';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ化 Contents"><link rel="next" href="policy.php?phpLang=ja" title="パッケージ化ポリシー"><link rel="prev" href="intro.php?phpLang=ja" title="序章">';

include_once "header.inc";
?>

<h1>パッケージ化 - 2 パッケージ詳細</h1>
		
		

		<h2><a name="trees">2.1 Tree レイアウト</a></h2>
			
			<p>
				パッケージ詳細は <code>/sw/fink/dists</code> ディレクトリ下の
				<code>finkinfo</code> ディレクトリから読み込まれます。
				"Tree" の設定は <code>/sw/etc/fink.conf</code> ファイルにあり、どのディレクトリを読むかを設定することができます。
				パッケージ詳細の名称は完全なパッケージ名に拡張子 ".info" をつけたものです。
				fink 0.13.0 からは、簡便のためパッケージ名に拡張子 ".info" をつけたものも読みこむように採用されました。
			</p>
			<p>
				パッケージ詳細ツリーは多段階に構成されています。
				最上段にあるディレクトリは:
			</p>
			<ul>
				<li>
					<code>dists</code> から始まる。
					<code>dists</code> ディレクトリは Debian ツールで必須。
				</li>
				<li>ディストリビューション。<code>stable</code>,<code>unstable</code>, <code>local</code> がある。
					<code>local</code> ディレクトリはローカルの管理者とユーザが管理する。
					<code>stable</code> と <code>unstable</code> ディレクトリは Fink が管理する。
				</li>
				<li>ツリー。
					<code>main</code> ツリーには沢山のパッケージがある。
					暗号関連のソフトウェアは、削除がしやすいように <code>crypto</code> という別ツリーにある。
				</li>
				<li>
					<code>finkinfo</code> vs. <code>binary-darwin-powerpc</code>。
					<code>finkinfo</code> は Fink パッケージ詳細とパッチを含み、
					<code>binary-darwin-powerpc</code> は <code>.deb</code> バイナリパッケージを含んでいる。
				</li>
				<li>セクション。
					<code>main</code> ツリー内は管理用にセクションごとに分類されている。
					<code>crypto</code> ツリーは現在のところ分類されていない。
				</li>
			</ul>
		

		<h2><a name="format">2.2 ファイル形式</a></h2>
			
			<p>
				詳細ファイルは、単純なキーと値の対の形式になっていて、フィールドとも呼ばれています。
				角行は、以下の例のように、キーで始まりコロン (:) 以降が値になります:
			</p>
<pre>Key: Value</pre>
			<p>
				フィールドが複数行にわたらせるには二つの方法があります。
			</p>
			<p>
				一つ目はシェルスクリプトに使われている here-document 文法で、
				こちらを使うことをお勧めします。
				この文法では、最初の行にキーがあり、 <code>&lt;&lt;</code> 以降 <code>&lt;&lt;</code> までが値です。
				例はこのようになります:
			</p>
<pre>InstallScript: &lt;&lt;
mkdir -p %i/share/man
make install prefix=%i mandir=%i/share/man
mkdir -p %i/share/doc/%n
install -m 644 COPYING %i/share/doc/%n
&lt;&lt;</pre>
			<p>
				インデントを使うとさらに見やすくなるでしょう。
			</p>
			<p>
				here-document 文法はネストすることもできます。
				これは<code>SplitOff</code> と <code>SplitOff<b>N</b>
				</code>  フィールドでよく見られます。
				この文法は、複数業にわたる副フィールドを持つような構造にも対応でき、以下のようになります:
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
				これよりも古い方法は RFC822 ヘッダフォールディング方法で、空白で始まる行を前の行からの続きと認識します。
				例:
			</p>
<pre>InstallScript: mkdir -p %i/share/man
make install prefix=%i mandir=%i/share/man
mkdir -p %i/share/doc/%n
install -m 644 COPYING %i/share/doc/%n</pre>
			<p>
				角行の先頭の空白に気づきましたでしょうか。
			</p>
			<p>
				どちらの形式を採用しても、空行とハッシュ (#) で始まる行は無視されます。
				キー (フィールド名) は Fink では大文字と小文字を区別しませんので、
				<code>InstallScript</code> を <code>installscript</code> や <code>INSTALLSCRIPT</code>
				と記述してもかまいませんが、最初の文字を大文字にする方法が一般的です。
				ブール値をとるフィールドでは、 "true", "yes", "on", "1"
				(大文字、小文字の区別なし) は全て true として認識され、他は全て false として扱われます。
			</p>
		

		<h2><a name="percent">2.3 パーセント拡張</a></h2>
			
			<p>
				簡便のため、 フィールドによっては拡張があります。
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left"></th><th align="left"></th></tr><tr valign="top"><td>%n</td><td>
						<p>
							<b>n</b>ame。パッケージ名称。
						</p>
					</td></tr><tr valign="top"><td>%N</td><td>
						<p>
							<b>N</b>ame。親パッケージの名称 (<code>SplitOff</code> がない場合は %n と同じ)。
						</p>
					</td></tr><tr valign="top"><td>%e</td><td>
						<p>
							<b>e</b>poch。パッケージのエポック。
						</p>
					</td></tr><tr valign="top"><td>%v</td><td>
						<p>
							<b>v</b>ersion。バージョン。
						</p>
					</td></tr><tr valign="top"><td>%r</td><td>
						<p>
							<b>r</b>evision。パッケージのリビジョン
						</p>
					</td></tr><tr valign="top"><td>%f</td><td>
						<p>
							<b>f</b>ull package name。%n-%v-%r と等価。
						</p>
					</td></tr><tr valign="top"><td>%p, %P</td><td>
						<p>
							<b>p</b>refix。Fink のインストール場所。例: <code>/sw</code>。
						</p>
					</td></tr><tr valign="top"><td>%d</td><td>
						<p>
							<b>d</b>estination。パッケージ化するツリーのビルド先。
							例:<code>/sw/src/root-gimp-1.2.1-1</code>
						</p>
					</td></tr><tr valign="top"><td>%D</td><td>
						<p>
							<b>D</b>estination。
							親パッケージのビルド先 (<code>SplitOff</code> がない場合は %d と同じ)。
						</p>
					</td></tr><tr valign="top"><td>%i</td><td>
						<p>
							<b>i</b>nstall-phase prefix
							完全なプリフィックス。
							%d%p と等価。
						</p>
					</td></tr><tr valign="top"><td>%I</td><td>
						<p>
							<b>I</b>nstall prefix。
							親パッケージのビルド先。%D%Pと等価 (<code>SplitOff</code> がない場合は %i と同じ)。
						</p>
					</td></tr><tr valign="top"><td>%a</td><td>
						<p>
							p<b>a</b>tches 。
							パッチを検索するパス。
						</p>
					</td></tr><tr valign="top"><td>%b</td><td>
						<p>
							<b>b</b>uild。
							ビルドディレクトリ。例: <code>/sw/src/gimp-1.2.1-1/gimp-1.2.1</code>
						</p>
						<p>
							注記: これは他に手段がないときだけ使用して下さい。
							ビルドディレクトリはスクリプトが実行されるディレクトリで、通常コマンドでは相対パス名を使って下さい。
						</p>
					</td></tr><tr valign="top"><td>%c</td><td>
						<p>
							the parameters for 

							<b>c</b>onfigure。
							configure パラメータ: <code>--prefix=%p</code> と ConfigureParams で指定するもの全て。
						</p>
					</td></tr><tr valign="top"><td>%m</td><td>
						<p>
							the <b>m</b>achine architecture string.  This is the same as 
							<code>uname -p</code> output.  Current values are 'powerpc' for ppc machines
							and 'i386' for x86 machines. (Introduced in a post-0.12.1 CVS version of fink.)

							<b>m</b>achine architecture。
							マシンアーキテクチャーを示す記号で、<code>uname -p</code> の出力。
							現在の値は、 PPC マシンでは 'powerpc' で x86 マシンでは 'i386' です
							(0.12.1 以降の CVS版 fink で導入)。
						</p>
					</td></tr><tr valign="top"><td>%%</td><td>
						<p>
							パーセント記号 (この後の文字を拡張しない)。
							拡張は厳密に左から右へ解釈していくので、 %%n がパッケージ名称をとられることはありません。
							常に %n と解釈されます。
							(fink-0.18.0 で導入)
						</p>
					</td></tr></table>

		

	<p align="right">
Next: <a href="policy.php?phpLang=ja">3 パッケージ化ポリシー</a></p>

<? include_once "footer.inc"; ?>
