<?
$title = "F.A.Q. - 使用法 (1)";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/27 00:34:25';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="usage-packages.php?phpLang=ja" title="パッケージ使用上の問題 - 特定のパッケージ"><link rel="prev" href="comp-packages.php?phpLang=ja" title="コンパイルの問題 - 特定のバージョン">';

include_once "header.inc";
?>

<h1>F.A.Q. - 8 パッケージ使用上の問題 - 一般</h1>


<a name="xlocale">
<div class="question"><p><b>Q8.1: このようなメッセージが大量に出ます。
"locale not supported by C library"
これはまずいことですか?</b></p></div>
<div class="answer"><p><b>A:</b> まずいことという訳ではありません。
これはデフォルトの英語メッセージや日付フォーマットなどを使うという意味です。
これ以外はプログラムは普通に動作します。
X11 のドキュメントに、 <a href="http://fink.sourceforge.net/doc/x11/trouble.php#locale">詳細</a> があります。</p></div>
</a>
<a name="passwd">
<div class="question"><p><b>Q8.2: いきなり変なユーザーがシステムに現れました。
ユーザー名は、 "mysql", "pgsql", "games" などです。
こいつらはどこから来たのですか?</b></p></div>
<div class="answer"><p><b>A:</b> Fink を使って passwd というパッケージをインストールしたのでしょう。
passwd は、セキュリティー上の問題からいくつかのユーザーを追加します。
Unix システムでは、ファイルやプロセスの "所有者" を使ってパーミッションやセキュリティーをチューニングするのです。
Apache や MySQL のようなプログラムは、"所有者" が必要で、これらの daemon に root を割り当てると安全ではなくなります。
(Apache に、システム上の全てのファイルへいきなり書き込み権限が与えられたと思ってみてください)
このため、 passwd パッケージはユーザーを必要とするパッケージにユーザーを追加するのです。</p><p>急にユーザーが "システム環境設定: ユーザー" ペインに現れるのは不安ですが、削除したい気持ちを押えてください。</p><ul>
<li>第一に、あなたはユーザーを利用するパッケージをインストールする選択をしたのです。
 ユーザーを削除したら意味がありませんよね?</li>
<li>実際、 Mac OS X には既にユーザーが追加されていますが、気づいていないのです。
www, daemon, nobody などがそうです。
これらのユーザーは、ある種のサービスを行なう Unix 流のやり方なのです。
passwd パッケージは、 Apple が提供していないユーザーを追加するだけです。
Apple がインストールしたユーザーは、 NetInfo マネージャ.app で見ることができます:
<code>niutil -list . /users</code>
</li>
<li>このユーザーを削除することにした場合、十分気をつけてください。
"システム環境設定: ユーザー" ペインから追加したユーザーには管理者権限が割り振られ、管理者アカウントのパーミッションには混乱が報告されています。
これはシステム環境設定のバグで、 Apple には報告されています。
安全にユーザーを削除するには、 NetInfo マネージャ.app を使うか、ターミナルから <code>niutil</code> コマンドを入力します。
NetInfo の詳細については、 <code>niutil</code> の man ページを読んでください。
 </li>
</ul><p>passwd パッケージのインストール中に、Fink がユーザーを追加するか<b>尋ねます</b>ので、実際はいきなりではないはずです。</p></div>
</a>
<a name="compile-myself">
<div class="question"><p><b>Q8.3: Fink でインストールしたソフトウェアを使って、自分で何かをコンパイルするにはどうしたらいいのですか?</b></p></div>
<div class="answer"><p><b>A:</b> 外でコンパイルする時は、コンパイラとリンカに Fink がインストールしたライブラリとヘッダの場所を教える必要があります。
普通の configure/make を使うパッケージの場合、環境変数を設定する必要があります:</p><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
setenv LDFLAGS -L/sw/lib
setenv CXXFLAGS $CFLAGS
setenv CPPFLAGS $CXXFLAGS
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal"
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"</pre><p>-bash-</p><pre>export CFLAGS=-I/sw/include 
export LDFLAGS=-L/sw/lib 
export CXXFLAGS=$CFLAGS 
export CPPFLAGS=$CXXFLAGS 
export ACLOCAL_FLAGS="-I /sw/share/aclocal"
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"</pre><p>これを起動ファイル (.cshrc か .profile) に追加すると、自動的に設定されて便利です。
この環境変数を使わないパッケージの場合、
"-I/sw/include" (ヘッダ用) and "-L/sw/lib" (ライブラリ用)
をコンパイルの行に追加する必要があるでしょう。
パッケージの中には、 EXTRA_CFLAGS や --with-qt-dir= のような、非標準的な configure オプションを使うものもあります。
"./configure --help" で configure オプションの一覧がわかるでしょう。</p><p>さらに、あなたが使うライブラリの開発用ヘッダ (例 <b>foo-1.0-1-dev</b>) もインストールする必要があります。</p></div>
</a>
<a name="apple-x11-applications-menu">
<div class="question"><p><b>Q8.4: Apple X11 の Application メニューを使うと、 Fink からインストールしたアプリケーションの起動できません。</b></p></div>
<div class="answer"><p><b>A:</b> Apple X11 は Fink の環境設定を関知しません。
このため、Applications メニューも PATH を認識せず、 Fink アプリケーションを探すことができません。
解決するには、 Fink からインストールしたアプリケーションに:
</p><pre>source /sw/bin/init.sh ; </pre><p>と追加します。例えば、 Fink からインストールした GIMP の場合、 GIMP の Command 欄に:</p><pre>source /sw/bin/init.sh ; gimp</pre><p>と入力します。</p><p>あるいは、 .xinitrc ファイル (自分のディレクトリ内の) の一行目に:</p><pre>source /sw/bin/init.sh</pre><p>と追加します。</p></div>
</a>
<a name="x-options">
<div class="question"><p><b>Q8.5: X11 の種類が多くて迷っています。
Apple X11, XFree86 などなど、どれをインストールしたら良いのですか?</b></p></div>
<div class="answer"><p><b>A:</b> いずれも (XFree86 のコードをベースとした) XFree86 の派生ですが、小さな違いがあります。
Apple X11 は XFree86-4.2.1 を改良したものです。
XFree86-4.3 は標準の XFree86-4.2.1.1 より速いのですが、後者の方が安定しています。
4.2.1.1 を改良したものもあり、 thread サポートが追加されていて、これを必要とするパッケージもあります。</p><p>現在は、 Panther では (三枚目のディスクにある) Apple X11 が唯一の選択です。
コンパイルすることがあるなら、 (XCode ディスクにある) X11SDK のインストールも忘れないでください。</p><p>Jaguar では、一番使われていて Fink パッケージが使えるのは:</p><ul>
<li>
<p>Fink でビルドする 4.2.x: <code>xfree86-base</code> と <code>xfree86-rootless</code> または <code>xfree86-base-threaded</code> と <code>xfree86-rootless-threaded</code> (および、それぞれの <code>-shlibs</code>) をインストール</p>
</li>
<li>
<p>Fink でビルドする 4.3.x: <code>xfree86</code> と <code>xfree86-shlibs</code> パッケージをインストール</p>
</li>
<li>
<p>Apple の 4.2.x (User+SDK パッケージをインストール): <code>system-xfree86</code> パッケージをインストール</p>
</li>
</ul><p>これ以外の選択は、 <a href="http://fink.sourceforge.net/doc/x11/index.php">Running X11 document</a> を参照してください。</p></div>
</a>
<a name="no-display">
<div class="question"><p><b>Q8.6: アプリケーションを実行しようとすると、
"cannot open display:"
というメッセージがでます。
どうしたら良いですか?</b></p></div>
<div class="answer"><p><b>A:</b> このエラーは、システムが X ディスプレイと通信できていないことを意味します。
以下を確認してください:</p><p>1. X (Apple's X11, XFree86, ...) を起動。</p><p>2. DISPLAY 環境変数が設定されていることを確認する。デフォルトに設定された X では、 tcsh では:
</p><pre>setenv DISPLAY :0</pre><p>bash の場合:</p><pre>export DISPLAY=:0</pre><p>と入力します。</p></div>
</a>
<a name="suggest-package">
<div class="question"><p><b>Q8.7: 自分の好きなプログラムが Fink にありません。
Fink に推薦したいのですが、どうしたら良いですか?</b></p></div>
<div class="answer"><p><b>A:</b> <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package Request Tracker</a>
の Fink プロジェクトページから推薦してください。</p><p>注記: SourceFourge の ID が必要です。</p></div>
</a>
<p align="right">
Next: <a href="usage-packages.php?phpLang=ja">9 パッケージ使用上の問題 - 特定のパッケージ</a></p>

<? include_once "footer.inc"; ?>
