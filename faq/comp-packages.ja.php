<?
$title = "F.A.Q. - コンパイル (2)";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/06/27 12:56:55';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="usage-general.php?phpLang=ja" title="パッケージ使用上の問題 - 一般"><link rel="prev" href="comp-general.php?phpLang=ja" title="コンパイルの問題 - 一般">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 7. コンパイルの問題 - 特定のバージョン</h1>


<a name="libgtop">
<div class="question"><p><b><? echo FINK_Q ; ?>7.1: <code>sed</code> を使うパッケージビルドが失敗します。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> これはログインスクリプト (例 <code>~/.cshrc</code>) が "<code>echo Hello</code>" であるとか <code>xttitle</code> といったことをターミナルに書くと発生します。
いちばん簡単な解決方法は、問題の行をコメントアウトすることです。
</p><p>もし echo を残しておきたいなら、次のようにすることもできます:</p><pre>if ( $?prompt) then
echo Hello
endif</pre></div>
</a>
<a name="cant-install-xfree">
<div class="question"><p><b><? echo FINK_Q ; ?>7.2: Fink の XFree86 パッケージに切替えたいけれど、 <code>system-xfree86</code>  とコンフリクトしているため <code>xfree86-base</code> | <code>xfree86</code> がインストールできません。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> どのような X11 でも、残念なことに、 /usr/X11R6 にインストールしなければなりません。
Fink の <code>xfree86-base</code> と <code>xfree86-rootless</code> もここにインストールします。
しかし、 Fink はデータベースに無いファイルは削除しないため、 Fink 以外の X11 を自動的に置き換えることはありません。
</p><p>という訳で、:</p><p><b>注記: 10.2.x と 最新版の Fink (&gt;= 0.16.2) のユーザーと 10.3.x ユーザーはステップ 1 を飛ばしてください (実行しても何も起きませんが)。</b></p><p>1. <code>system-xfree86</code> を削除します。
X11 に依存するパッケージがない場合、これは単純です。
しかし、 X11 に依存するパッケージがインストールされていることの方が多いでしょう。
これを全てアンインストールする代わりに、次のコマンドをうちます:</p><pre>sudo dpkg --remove --force-depends system-xfree86</pre><p>これで、他のパッケージは触らずに削除します。
<code>system-xfree86</code> がなければステップ 3 に進みます。
</p><p>2. XFree86 を全て手動で削除する。これは:</p><pre>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</pre><p>Apple X11 から切替える場合、 X11 アプリケーションも削除します。</p><p>3. XFree86-4.2.1 を入れるには、 Fink の <code>xfree86-base</code> と 
<code>xfree86-rootless</code> をインストールします。
これは、ソースからなら "<code>fink install</code>" で、
バイナリからなら  "<code>apt-get install</code>" または <code>dselect</code> です。</p><p> -あるいは-</p><p>3a. XFree86-4.3.x 以降を入れるには、 Fink の <code>xfree86</code> パッケージを、
"fink install xfree86" でインストールします。
最新版 (2004年5月25日時点で XFree86-4.4.x) はまだバイナリ版がなく、 unstable ツリーのみなので、 
[<a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable%5C">unstable パッケージのインストール</a> を参照]
</p></div>
</a>
<a name="change-thread-nothread">
<div class="question"><p><b><? echo FINK_Q ; ?>7.3: non-threaded 版の Fink XFree86 パッケージから threaded 版 (またはその逆) にはどうしたら切替えることができますか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Fink 版の xfree86 を使っていて、 threaded と non-threaded を切替えたいのなら、 手動で古いバージョンを削除する必要があります。
これは、コマンドラインで:</p><pre>sudo dpkg -r --force-depends xfree86-base
sudo dpkg -r --force-depends xfree86-shlibs
sudo dpkg -r --force-depends xfree86-rootless
sudo dpkg -r --force-depends xfree86-rootless-shlibs</pre><p>threaded 版の場合:</p><pre>sudo dpkg -r --force-depends xfree86-base-threaded
sudo dpkg -r --force-depends xfree86-shlibs-threaded
sudo dpkg -r --force-depends xfree86-rootless-threaded
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs</pre><p>FinkCommander でもパッケージを削除することができます。
ソース画面で、パッケージを選択し、次に <code>Source Menu</code> で "<code>Force Remove</code>." を選択します。
</p><p>system-xfree86 を使っている場合、 前の質問を参照して削除してください。</p><p>希望するバージョンの xfree86 をインストールします: </p><p>
<code>xfree86-base</code> と <code>xfree86-rootless</code>
</p><p>
<code>xfree86-base-threaded</code> と <code>xfree86-rootless-threaded</code>
</p><p>普通は、ソースインストールは: "<code>fink install</code>" で、バイナリインストールは: "<code>apt-get install</code>" または <code>dselect</code> です。</p></div>
</a>
<a name="cctools">
<div class="question"><p><b><? echo FINK_Q ; ?>7.4: KDE をインストール使用とすると、次のメッセージが出ます: 'Can't resolve dependency "cctools (&gt;= 446-1)"'</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> このなんとも暗号のようなメッセージは、 December 2002 Developer Tools をインストールしろという意味です。</p></div>
</a>
<a name="libiconv-gettext">
<div class="question"><p><b><? echo FINK_Q ; ?>7.5: <code>libiconv</code> が更新できません。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 下記の形式のエラーでしたら:</p><pre>libtool: link: cannot find the library `/sw/lib/libiconv.la'</pre><p>以下のように実行して直すことが出来ます</p><pre>fink remove gettext-dev
fink install libiconv</pre></div>
</a>
    <a name="cplusplus-filt">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.6: <code>g77</code> 我インストールできません。<code>c++filt</code> がないからです。 
        これはどこにありますか?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> もし、Tiger にアップデート後にエラーが</p><pre>xgcc: installation problem, cannot exec `c++filt': No such file or directory</pre><p>とでたら、以下のようにします:</p><ul>
          <li>ターミナルで、
          <pre>/Developer/Tools/uninstall-devtools.pl</pre>
          	と実行し、古い Developer Tools を削除します。
          	次に、 XCode (2.0 以降) をインストールします。
          </li>
          <li>(Tiger のインストーラから)  <code>BSD.pkg</code> をインストールします。
         	<code>/usr/bin/c++filt</code> が現れるまで何度もインストールしてみてください。</li>
        </ul><p>
1) Flush out your old
2) Reinstall BSD.pkg (from your main OS install)</p></div>
    </a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=ja">8. パッケージ使用上の問題 - 一般</a></p>
<? include_once "../footer.inc"; ?>


