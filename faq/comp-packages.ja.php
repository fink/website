<?
$title = "F.A.Q. - コンパイル (2)";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/27 00:34:25';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="usage-general.php?phpLang=ja" title="パッケージ使用上の問題 - 一般"><link rel="prev" href="comp-general.php?phpLang=ja" title="コンパイルの問題 - 一般">';

include_once "header.inc";
?>

<h1>F.A.Q. - 7 コンパイルの問題 - 特定のバージョン</h1>


<a name="libgtop">
<div class="question"><p><b>Q7.1: <code>sed</code> を使うパッケージビルドが失敗します。</b></p></div>
<div class="answer"><p><b>A:</b> これはログインスクリプト (例 <code>~/.cshrc</code>) が "<code>echo Hello</code>" であるとか <code>xttitle</code> といったことをターミナルに書くと発生します。
いちばん簡単な解決方法は、問題の行をコメントアウトすることです。
</p><p>もし echo を残しておきたいなら、次のようにすることもできます:</p><pre>if ( $?prompt) then
echo Hello
endif</pre></div>
</a>
<a name="cant-install-xfree">
<div class="question"><p><b>Q7.2: Fink の XFree86 パッケージに切替えたいけれど、 <code>system-xfree86</code>  とコンフリクトしているため <code>xfree86-base</code> | <code>xfree86</code> がインストールできません。</b></p></div>
<div class="answer"><p><b>A:</b> すべての X11 は、残念なことに、 /usr/X11E6 にインストールしなければなりません。
Fink の <code>xfree86-base</code> と <code>xfree86-rootless</code> もここにインストールします。
しかし、 Fink はデータベースに無いファイルは削除しないため、 Fink 以外の X11 を自動的に置き換えることはありません。
</p><p></p><p>という訳で、:</p><p></p><p><b>注記: 10.2.x と 最新版の Fink (&gt;= 0.16.2) のユーザーと 10.3.x ユーザーはステップ 1 を飛ばしてください (やっても動きませんが)。</b></p><p>1. <code>system-xfree86</code> を削除します。
X11 に依存するパッケージがない場合、これは単純です。
しかし、 X11 に依存するパッケージがインストールされていることの方が多いでしょう。
これを全てアンインストールする代わりに、次のコマンドをうちます:</p><p>
<code>sudo dpkg --remove --force-depends system-xfree86</code>
</p><p>これにより、他は触らずに削除します。
<code>system-xfree86</code> がなければステップ 3 に進みます。
</p><p>2. XFree86 を全て手動で削除する。これは:</p><p>
<code>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</code>
</p><p>Apple X11 から切替える場合、 X11 アプリケーションも削除します。</p><p>3. XFree86-4.2.1 を入れるには、 Fink の <code>xfree86-base</code> と  <code>xfree86-rootless</code> をインストールします。
これは、ソースからなら "<code>fink install</code>" で、バイナリからなら  "<code>apt-get install</code>" または <code>dselect</code> です。</p><p> -あるいは-</p><p>3a. XFree86-4.3.x を入れるには、 Fink の <code>xfree86</code> パッケージをインストールします。
これはまだバイナリ版がなく、 unstable ツリーのみなので、 "fink install xfree86" と入力します。
</p></div>
</a>
<a name="change-thread-nothread">
<div class="question"><p><b>Q7.3: non-threaded 版の Fink XFree86 パッケージから threaded 版 (またはその逆) にはどうしたら切替えることができますか?</b></p></div>
<div class="answer"><p><b>A:</b> Fink 版の xfree86 を使っていて、 threaded と non-threaded を切替えたいのなら、 手動で古いバージョンを削除する必要があります。
これは、コマンドラインで:</p><pre>
sudo dpkg -r --force-depends xfree86-base
sudo dpkg -r --force-depends xfree86-shlibs
sudo dpkg -r --force-depends xfree86-rootless
sudo dpkg -r --force-depends xfree86-rootless-shlibs
</pre><p>threaded 版の場合:</p><pre>
sudo dpkg -r --force-depends xfree86-base-threaded
sudo dpkg -r --force-depends xfree86-shlibs-threaded
sudo dpkg -r --force-depends xfree86-rootless-threaded
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs
	</pre><p>FinkCommander でもパッケージを削除することができます。
ソース画面で、パッケージを選択し、次に <code>Source Menu</code> で "<code>Force Remove</code>." を選択します。
</p><p>system-xfree86 を使っている場合、 前の質問を参照して削除してください。</p><p>希望するバージョンの xfree86 をインストールします: </p><p>
<code>xfree86-base</code> と <code>xfree86-rootless</code>
</p><p>
<code>xfree86-base-threaded</code> と <code>xfree86-rootless-threaded</code>
</p><p>普通は、ソースインストールは: "<code>fink install</code>" で、バイナリインストールは: "<code>apt-get install</code>" または <code>dselect</code> です。</p></div>
</a>
<a name="cctools">
<div class="question"><p><b>Q7.4: KDE をインストール使用とすると、次のメッセージが出ます: 'Can't resolve dependency "cctools (&gt;= 446-1)"'</b></p></div>
<div class="answer"><p><b>A:</b> このなんとも暗号のようなメッセージは、 December 2002 Developer Tools をインストールしろという意味です。</p></div>
</a>
<p align="right">
Next: <a href="usage-general.php?phpLang=ja">8 パッケージ使用上の問題 - 一般</a></p>

<? include_once "footer.inc"; ?>
