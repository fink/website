<?
$title = "パッケージ作成 - パッケージ記述情報";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/30 03:09:24';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="next" href="policy.php?phpLang=ja" title="パッケージ化ポリシー"><link rel="prev" href="intro.php?phpLang=ja" title="始めに">';

include_once "header.inc";
?>

<h1>パッケージ作成 - 2 パッケージ記述情報</h1>
		
		

		<h2><a name="trees">2.1 ツリーレイアウト</a></h2>
			
			<p>
				パッケージ記述情報はディレクトリ <code>/sw/fink/dists</code> の下のディレクトリ <code>finkinfo</code> から読み込まれます．
				「ツリー」の設定はファイル <code>/sw/etc/fink.conf</code> にあり，どのディレクトリを読むかを指定します．
				パッケージ記述情報ファイルの名前は，パッケージの正式名称に拡張子 ".info" を付けたものです．
				Fink 0.13.0 以降，手間を省くため，簡略形式の「パッケージ名」に拡張子 ".info" を付けたものも使えます．
			</p>
			<p>
				パッケージ記述情報ツリーはいくつかの階層のディレクトリにまとめられています．
				最上段にあるディレクトリは:
			</p>
			<ul>
				<li>
					<code>dists</code> から始まる．
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
					暗号を使うソフトウェアは別ツリー <code>crypto</code> に収められ，必要に応じて簡単に取り除ける．
				</li>
				<li>
					<code>finkinfo</code> または <code>binary-darwin-powerpc</code>．
					<code>finkinfo</code> は Fink のパッケージ情報記述ファイルとパッチを含み，
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
				パッケージ情報記述ファイルはキーと値の組 (別名「フィールド」) の単純なリストです．
				各行はキーで始まり，コロン (:) 以降が値になります:
			</p>
<pre>Key: Value</pre>
			<p>
				複数行に渡るフィールドには 2 通りの記法があります．
			</p>
			<p>
				1 つ目はシェルスクリプトで言う "here-document" 風の形式で，こちらの方が望ましいです．
				この方式では，第1行はキー，コロンの次に，値として <code>&lt;&lt;</code> が続くものになります．
				その後の行は全て実質的な値となり，行頭に <code>&lt;&lt;</code> を置いた行が値の終端区切りです．
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
				here-document 形式を使えば部分フィールド (含まれる方のフィールド) にも複数行の値が使えます．
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
				推奨されない，旧式の記法は「RFC 822 ヘッダ折り畳み方法」を手本に作られました．
				空白で始まる行を前の行からの続きと認識します．
				例:
			</p>
<pre>InstallScript: mkdir -p %i/share/man
 make install prefix=%i mandir=%i/share/man
 mkdir -p %i/share/doc/%n
 install -m 644 COPYING %i/share/doc/%n</pre>
			<p>
				各行の先頭の空白に気づきましたでしょうか．
			</p>
			<p>
				どちらの形式でも，空行と，シャープ (#) で始まる行は無視されます．
				キー (フィールド名) では大文字と小文字の区別がないので，
				<code>InstallScript</code> を <code>installscript</code> や <code>INSTALLSCRIPT</code> とも書けますが，
				最初の <code>InstallScript</code> という方式が一般的です．
				真偽値を取るフィールドでは "true", "yes", "on", "1" (大文字，小文字の区別なし)
				のいずれも「真」となり，それ以外は全て「偽」になります．
			</p>
		

		<h2><a name="percent">2.3 パーセント記法の展開</a></h2>
			
			<p>
				簡便のため， Fink はいくつかのフィールドで以下の文字列展開をサポートします．
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
						</p>
					</td></tr><tr valign="top"><td>%d</td><td>
						<p>
							<b>d</b>estination．パッケージ化するツリーのビルド先．
							例:<code>/sw/src/root-gimp-1.2.1-1</code>
						</p>
					</td></tr><tr valign="top"><td>%D</td><td>
						<p>
							<b>D</b>estination．
							親パッケージのビルド先 (<code>SplitOff</code> 内部以外では %d と同じ)．
						</p>
					</td></tr><tr valign="top"><td>%i</td><td>
						<p>
							<b>i</b>nstall-phase prefix．インストール過程での完全なプリフィックス． %d%p と等価．
						</p>
					</td></tr><tr valign="top"><td>%I</td><td>
						<p>
							<b>I</b>nstall prefix．
							親パッケージのインストール過程での完全プリフィクス．%D%Pと等価 (<code>SplitOff</code> 内部以外では %i と同じ)．
						</p>
					</td></tr><tr valign="top"><td>%a</td><td>
						<p>
							p<b>a</b>tches ．
							パッチを検索するパス．
						</p>
					</td></tr><tr valign="top"><td>%b</td><td>
						<p>
							<b>b</b>uild．
							ビルドディレクトリ．例: <code>/sw/src/gimp-1.2.1-1/gimp-1.2.1</code>
						</p>
						<p>
							注記: %b は使わざるを得ないときだけ使用して下さい．
							ビルドディレクトリはスクリプトが実行されるときのカレントディレクトリです．
							コマンドでは相対パス名を使って下さい．
						</p>
					</td></tr><tr valign="top"><td>%c</td><td>
						<p>
							The parameters for <b>c</b>onfigure．
							configure に渡すパラメータ: <code>--prefix=%p</code> の他， ConfigureParams で指定したもの全て．
						</p>
					</td></tr><tr valign="top"><td>%m</td><td>
						<p>
							<b>m</b>achine architecture．
							マシンアーキテクチャーを示す記号で，<code>uname -p</code> の出力．
							現在のところ， PPC マシンでは 'powerpc' ， x86 マシンでは 'i386' という値になる
							(0.12.1 以降の CVS版 fink で導入)．
						</p>
					</td></tr><tr valign="top"><td>%%</td><td>
						<p>
							パーセント記号そのもの (これ以降にどの文字が続いても展開されない)．
							展開は厳密に左から右に行われるので， %%n はパッケージ名とは一切関係なく，単なる文字列 %n を表します．
							(fink-0.18.0 で導入)
						</p>
					</td></tr></table>

		

	<p align="right">
Next: <a href="policy.php?phpLang=ja">3 パッケージ化ポリシー</a></p>

<? include_once "footer.inc"; ?>
