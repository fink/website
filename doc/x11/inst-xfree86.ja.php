<?
$title = "Running X11 - XFree86 のインストール";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/05/29 15:43:25';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Running X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=ja" title="XFree86 の起動"><link rel="prev" href="history.php?phpLang=ja" title="歴史">';


include_once "header.ja.inc";
?>
<h1>Running X11 - 3. XFree86 の入手とインストール</h1>


<h2><a name="fink">3.1 Fink を使ったインストール</a></h2>

<p>
Fink はどのような X11 がインストールされていても問題なく動作しますが、また独自の XFree86
パッケージも提供しています。
<code>fink install ...</code> と入力すれば、ソースコードをダウンロードしてコンパイルを開始します。
もし <code>apt-get install ...</code> か <code>dselect</code> フロントエンドを使ったら、
XFree86 の公式ディストリビューションに似たコンパイル済みのパッケージをインストールします。
</p>
<p>
<code>xfree86-base</code> パッケージは、 XDarwin サーバを除く全ての XFree86 4.2.1.1 (10.1 ユーザーは 4.2.0) を含んでいます。
<code>xfree86-rootless</code> パッケージは、標準 XFree 4.2.1.1 安定板のサーバで、フルスクリーンとルートレスに対応、 OpenGL をサポートしています。
(以前は Fink にフルスクリーンモードのみに対応している <code>xfree86-server</code> パッケージがありましたが、今はありません。)
別の選択肢として、自分でサーバをインストールすることもできます。
下記に詳しく書かれていますが、この場合は
<code>xfree86-base</code> をインストールするだけですが、手動でインストールしたサーバは Fink が上書きするおそれがあります。
現在の最新安定板である<code> xfree86-base</code> (4.2.1.1-3) はビルドプロセス中に <code>xfree86-rootless</code>, 
<code>xfree86-base-shlibs</code>,  <code>xfree86-rootless-shlibs</code> を作成することに注意してください。
この４つのパッケージは XFree86 を動作させるために必要です。
</p>
<p>
<code> xfree86-base-threaded</code> と <code>xfree86-rootless-threaded</code> 
の二つのパッケージは、本質的には同じものですが、後者はスレッドをサポートするよう修正されています。
現在スレッドを必要とするアプリケーションは<code>xine</code> など少数です。
</p>
<p>
XFree86 4.2.1.1 (unthreaded) は、10.2 と Fink における安定版という位置づけにあります。
XFree86 4.3.0 も入手可能ですが、実験的で、このドキュメントの執筆時点では unstable ツリーにしかありません。
このバージョンはスレッドを組み込んでいて、 4.2.1.1 より速くなっています。
インストールするには <code>xfree86</code> パッケージを選択します。
このバージョンから、 -base と -rootless の区分はなくなりましたが、ライブラリが <code>xfree86-shlibs</code> と分かれました。
4.3 用にバイナリをビルドした場合、 4.2.1.1 や Apple X11 では動作しない可能性がありますので注意してください。
</p>
<p>
<b>10.3 の使用:</b>  
バージョン 4.3.99.16-2 以降が必要です。
これは XFree86-4.4 のプレリリースです。
バイナリディトリビューションを使用している場合、パッケージ詳細をアップデートしてください (例 <code>sudo apt-get update</code>) 。
</p>

<h2><a name="apple-binary">3.2 Apple のバイナリ</a></h2>

<p>
2003年1月7日、 Apple は<a href="http://apple.co.jp/macosx/features/x11/index.html">XFree86-4.2 ベースの X11</a> をリリースしました。
これは Quart レンダリングエンジンや高速化 OpenGL をサポートしています。
新しいバージョンが2003年2月10日にリリースされ、機能追加とバグ修正がなされました。
３回目のリリース (Beta 3) は 2003年3月17日に行われ、さらに機能追加とバグ修正がなされました。
このバージョンは Jaguar で使うことができます。
</p>
<p>
2003年10月24日、 Apple は Panther (10.3) をリリースしました。
これには X11 が同梱されていて、このバージョンは XFree86-4.3 をベースにしたものです。
</p>
<p>
アップルのバイナリを使うには、 <b>X11 User</b> パッケージがインストールされている必要があります。
また、Fink の <a href="http://fink.sourceforge.net/doc/users-guide/upgrade.php">update</a> も行ってください。
</p>
<p>
<code>fink-0.16.2</code> では <b>X11 SDK</b> パッケージも必要です。
インストール後、 Fink は <code>system-xfree86</code> バーチャルパッケージを作成します。
</p>
<p>
<code>fink-0.17.0</code> 以降は、 X11 SDK はソースからパッケージをビルドする場合のみ必要になります。
この場合、 SDK がなくても <code>system-xfree86</code> バーチャルパッケージが存在します。
SDK をインストールした場合は、 <code>system-xfree86-shlibs</code> パッケージと <code>system-xfree86-dev</code> が追加され、それぞれライブラリとヘッダファイルを表しています。
</p>
<p>
XFree86 ディストリビューションが既にある場合、 Fink でインストールしたかどうかに関わらず
<a href="inst-xfree86.php?phpLang=ja#switching-x11">X11 パッケージをべつのものに切り替える方法</a>
を参照して下さい。
この場合、まず最初に既存パッケージを削除してから Apple X11 (および必要に応じて X11 SDK) をインストールしてください。
</p>
<p>
Apple X11 使用上の注意:
</p>
<ul>
<li>
<p>
<code>autocutsel</code> パッケージは不要です。
もし X11 で選択している場合、無効にして下さい。
</p>
</li>
<li>
<p>
Apple X11 は <code>~/.xinitrc</code> ファイルを使います。
Quartz を完全に生かしたい場合、ウィンドウマネージャに <code>/usr/X11R6/bin/quartz-wm</code> を使う必要があります。
<code>~/.xinitrc</code> を編集するか、完全に削除して下さい。
</p>  
<p>
他のウィンドウマネージャを使いたいけれどカットアンドペーストも使いたい場合、以下の例のようにして下さい:
</p>
<pre>/usr/X11R6/bin/quartz-wm --only-proxy &amp;
exec /sw/bin/fvwm2</pre>
<p>
もちろん、 <code>startkde</code> のようなウィンドウマネージャ起動も書く必要があります。
</p>
</li>
<li>
<p>
<code>quartz-wm</code> は Gnome/KDE ウィンドウマネージャのヒント機能を完全にはサポートしていません。
無駄なデコレーションをされたウィンドウを見ることがあると思います。
</p>
</li>
<li>
<p>
Apple X11 は Fink の環境設定をデフォルトでは認識しません。
Fink でインストールした起動アプリケーション (例 ウィンドウマネージャ, gnome-session, その他の<code>/sw/bin</code> 内のアプリケーション) 
を呼び出すには、 <code>~/.xinitrc</code> の上の方 ("<code>#!/bin/sh</code>" より下、他のプログラムより上) に以下の行を追加します;
</p>
<pre> . /sw/bin/init.sh
</pre>
<p>
これにより Fink 環境が初期化されます。
注記: <code>init.sh</code> を使います。
<code>.xinitrc</code> は <code>tcsh</code> ではなく <code>sh</code> によって実行されるので <code>init.csh</code> は使用しません。
</p>
</li>
<li>
<p>
Fink ツリー下にあるプログラムをアプリケーションメニューから呼び出すときに、そのプログラムが他のプログラムを呼ぶようなものの場合、特別な処置が必要です。
このような場合、フルパスを追加するのではなく、例えば
</p>
<pre>/sw/bin/emacs</pre>
<p>ではなく、 bash であれば:</p>
<pre>. /sw/bin/init.sh ; emacs</pre>
<p>tcsh であれば:</p>
<pre>source /sw/bin/init.sh ; emacs</pre>
<p>
これにより PATH 情報が正しく伝わります。
Fink でインストールしたアプリケーションなら、どれでもこの方法が使えます。
</p>
</li>
<li>
<p>もし Apple X11 用にパッケージをビルドしようとして、以下のようなエラーが出た場合:</p>
<pre>ld: err.o illegal reference to symbol: _XSetIOErrorHandler 
defined in indirectly referenced dynamic library 
/usr/X11R6/lib/libX11.6.dylib</pre>
<p>
リンク時に <code>-lX11</code> がされているかどうか確認して下さい。
パッケージの設定オプションを確認し、この引数の追加方法を調べて下さい。
</p>
</li>
<li>
<p>
もし以前に <code>xfree86</code> を使っていて、 Apple X11 (10.2.x または 10.3.x) に切り替えた場合、
バイナリ互換ではないので <code>xfree86</code> 用にビルドしたパッケージをビルドし直す必要があります。
</p>
</li>
</ul>

<h2><a name="official-binary">3.3 公式バイナリ</a></h2>

<p>
XFree86 プロジェクトには公式の Xfree86 4.2.0 バイナリディストリビューションがあり、パッチにより 4.2.1.1 にアップグレードされます。
これは <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 ミラー</a> 内の
<code>4.2.0/binaries/Darwin-ppc-5.x</code> ディレクトリにあります。
<code>Xprog.tgz</code> と <code>Xquartz.tgz</code> は、たとえオプショナルと書かれてあっても忘れずに入手して下さい。
もし何が必要なファイルかわからなければ、ディレクトリごとダウンロードして下さい。
<code>Xinstall.sh</code> スクリプトを root で実行してインストールします。
(インストール前に <a href="http://www.xfree86.org/4.2.0/Install.html">official instructions</a> を読むといいでしょう。)
また、 XonX による<a href="http://prdownloads.sourceforge.net/xonx/XInstall_10.1.sit?download">バイナリ</a>もあります。
これは同じソースを使っていますが、もっと簡単です。
どちらの場合でも、ダウンロード、解凍後、以下のようにアップグレードして下さい:
</p>
<ol>
<li>10.1 の場合: <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.1.zip?download">4.2.0 -&gt; 4.2.0.1 アップグレード</a>.  
10.2 の場合:  <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.2.zip?download">4.2.0 -&gt; 4.2.0.1 アップグレード</a>
</li>
<li>10.1 と 10.2:  <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.1.1.zip?download">4.2.0.1 -&gt; 4.2.1.1 アップグレード</a>
</li>
</ol>
<p>
公式の XFree86 4.3.0 バイナリディストリビューションも <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 ミラー</a>
の <code>4.3.0/binaries/Darwin-ppc-6.x</code> 内にあります。
<code>Xprog.tgz</code> と <code>Xquartz.tgz</code> は、たとえオプショナルと書かれてあっても忘れずに入手して下さい。
もし何が必要なファイルかわからなければ、ディレクトリごとダウンロードして下さい。
<code>Xinstall.sh</code> スクリプトを root で実行してインストールします。
<code>Xinstall.sh</code> スクリプトを root で実行してインストールします。
(インストール前に <a href="http://www.xfree86.org/4.2.0/Install.html">official instructions</a> を読むといいでしょう。)
</p>
<p>
どのバージョンを選択しても、これで Mac OS X 上でフルスクリーンとルートレスの XFree86 が入りました。
</p>

<h2><a name="official-source">3.4 公式ソース</a></h2>

<p>
もし時間が許せば、 XFree86 4.2.0 はソースからビルドすることもできます。
ソースは <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 ミラー</a> の <code>4.2.0/source</code> ディレクトリ内にありますので
<code>X420src-#.tgz</code> の３つの tarball を同じディレクトリ内で取得・解凍して下さい。
XFree86 ソースツリーにある <code>config/cf/host.def</code> ファイルにマクロ定義をすることで、ビルドをカスタマイズできます。
(注記: #ifndef チェックがされているマクロだけが、 host.def で上書きできるマクロです。)
</p>
<p>
設定を終了したら、以下のコマンドで XFree86 をコンパイルしてインストールしましょう。
</p>
<pre>make World
sudo make install install.man</pre>
<p>4.2.1.1 にアップデートするには、 <a href="#official-binary">公式バイナリ</a> 節の解説を参照して下さい。</p>
<p>
4.3.0 をインストールするには、上述の "2" のところを "3" に変えて実行して下さい。
ただし、4.2.1.1 へのアップグレードは無視して下さい。
</p>
<p>
公式バイナリと同様、これで Mac OS X でフルスクリーンとルートレスの XFree86 とサーバがインストールされました。
</p>

<h2><a name="latest-cvs">3.5 最新の開発用ソース</a></h2>

<p>
もし時間だけではなく、図太い神経もあるようでしたら、最新の開発版の XFree86 を公開 CVS レポジトリから手に入れることもできます。
コードは常に開発中ですので、今日手に入るものと昨日手に入れたものは違うものになっていますので注意して下さい。
</p>
<p>
インストールするには、 <a href="http://www.xfree86.org/cvs/">XFree86 CVS</a> の解説に従い、 <code>xc</code> モジュールをダウンロードします。
あとは上述のソースからのビルドに従って下さい。
</p>

<h2><a name="xonx-bin">3.6 XonX バイナリテストリリース (XAqua, XDarwin)</a></h2>

<p>
4.1.0 のリリース以前に、 XonX チームは XAqua というバイナリテストリリースを出しています。
これはいずれも古いので使用しないで下さい。
</p>
<p>
XFree86 の主流 CVS にルートレスモードが導入されて以来 (4.1.0 のリリース後) 、
XonX チームは再びバイナリテストリリースを出していますが、これは XDarwin という名称です。
現在では XDarwin は 4.2.0 と一緒にリリースされています。
</p>
<p>
<a href="http://www.mrcla.com/XonX/">XonX ウェブページ</a> には 4.2.0 以降の XDarwin 
のテストバージョンをいずれ出すと書かれていますが、今のところ出ていません。
これはおそらく 4.2.0 (以降) の上にインストールされると思われます。
</p>

<h2><a name="macgimp">3.7 MacGimp</a></h2>

<p>
MacGimp の人々によって 2001年に作られたインストーラには XFree86 は含まれていません。
(XFree86 設定ファイルは書き換えられてしまうものがあります。)
</p>
<p>
<a href="http://www.macgimp.com/">MacGimp, Inc.</a> の CD には XFree86 が入っていると言われていますが、どのバージョンが入っているかはわかりません。
おそらくは 4.0.3 と 4.1.0, 開発中などのミックスだと思われます。
サーバは 4.1.0 以前のパッチによるルートレスモードをサポートしています。
</p>

<h2><a name="rootless">3.8 ネット上のルートレスサーバ</a></h2>

<p>
ネット上にはルートレスサーバのバイナリがよく転がっていますが、公式の 4.2.0 バイナリが出た現在、これは好ましいものではありません。
</p>

<h2><a name="switching-x11">3.9 X11 の削除</a></h2>

<p>
以前に Fink で XFree86 パッケージをインストールして削除や他のものに変えたい場合の方法は簡単です。
dpkg データベースをそのままにするため、強制的に古いパッケージを削除し、新しいものをインストールします。
</p>
<p>
これには二つの方法があります:
</p>
<ol>
<li>
<p>FinkCommander を使う</p>
<p>
<a href="http://finkcommander.sourceforge.net/">FinkCommander</a> を使っている場合、メニューから force removal を選択します。
例えば、 <code>xfree86-rootless</code> がインストールされていてスレッド版に変えたい場合、
<code>xfree86-rootless</code>, <code>xfree86-rootless-shlibs</code>, 
<code>xfree86-base</code>, <code>xfree86-base-shlibs</code> を選択して:
</p>
<pre>Source -&gt; Force Remove</pre>
</li>
<li>
<p>を実行します。</p>
<p>コマンドラインから手動で行う</p>
<p>
手動で行う場合、 <code>dpkg</code> を --force-depends のオプションをつけて実行します:
</p>
<pre>sudo dpkg -r --force-depends xfree86-rootless\ 
xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
<p>
もしスレッド版の XFree86 を必要とするアプリケーションがある場合、force remove 
を行って他のXFree86 や代替パッケージをインストールすると、 dpkg 
データベースに問題が生じることがありますので注意して下さい。
</p>
</li>
</ol>
<p>逆に Fink 以外でインストールした X11 が既にある場合、コマンドラインから削除します:</p>
<pre>sudo rm -rf /usr/X11R6 /etc/X11</pre> 
<p>
これは Fink 以外の X11 を削除する正しい方法です。
また、インストールしたものによって <code>XDarwin.app</code> | <code>X11.app</code> も削除する必要があるでしょう。
Apple X11 を削除する場合は <code>.xinitrc</code> を開いて <code>quartz-wm</code> を実行しないか確認して下さい。
これで新しい X11 を手動でも Fink でもインストールすることができます。
</p>  

<h2><a name="fink-summary">3.10 Fink パッケージの要点</a></h2>

<p>
インストールオプションと必要な Fink パッケージの要点:
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Install Type</th><th align="left">Fink packages</th></tr><tr valign="top"><td>Fink でビルドした 4.2.x</td><td>
<p>
<code>xfree86-base</code> と <code>xfree86-rootless</code> (とその <code>-shlibs</code>)</p>
<p>または <code>xfree86-base-threaded</code> と <code>xfree86-rootless-threaded</code> (と <code>-shlibs</code>)</p>
</td></tr><tr valign="top"><td>Fink でビルドした 4.3.x</td><td>
<p>
<code>xfree86</code> と <code>xfree86-shlibs</code>
</p>
</td></tr><tr valign="top"><td>4.x 公式バイナリ</td><td>
<p>
<code>system-xfree86</code> のみ (+おまけ)</p>
</td></tr><tr valign="top"><td>ソースあるいは CVS からビルドした 4.x</td><td>
<p>
<code>system-xfree86</code> のみ (+おまけ)</p>
</td></tr><tr valign="top"><td>Apple の 4.2.x</td><td>
<p>
<code>system-xfree86</code> のみ (+おまけ)
</p>
</td></tr><tr valign="top"><td>Apple の 4.3.x</td><td><p>
<code>system-xfree86</code> のみ (+おまけ)
</p>
</td></tr></table>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=ja">4. XFree86 の起動</a></p>
<? include_once "../../footer.inc"; ?>


