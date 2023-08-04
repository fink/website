<?php
$title = "Running X11 - X11 のインストール";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Running X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=ja" title="X11 の起動"><link rel="prev" href="history.php?phpLang=ja" title="歴史">';


include_once "header.ja.inc";
?>
<h1>Running X11 - 3. X11 の入手とインストール</h1>


<h2><a name="fink">3.1 Fink を使ったインストール</a></h2>

<p>
Fink はどのような X11 がインストールされていても問題なく動作しますが、また独自の XFree86
パッケージも提供しています。
<code>fink install ...</code> と入力すれば、ソースコードをダウンロードしてコンパイルを開始します。
もし <code>apt-get install ...</code> か <code>dselect</code> フロントエンドを使ったら、
X11 の公式ディストリビューションに似たコンパイル済みのパッケージをインストールします。
</p>
<p><b>一般的事項:</b></p>
<ul>
	<li>
		Fink の提供する全ての X11 パッケージは、フルスクリーンとルートレスの双方をサポートし、 OpenGL もサポートします。
	</li>
	<li>
		<b>重要事項:</b>
		X11 のリリースによってファイルが異なります。
		これにより、 X11 をダウングレード使用とする場合、バイナリが動作しないことがあります。
		この場合はパッケージを再度ビルドする必要があります。
		<p>
		逆は通常は問題ありません: 古い X11 用にビルドされたパッケージは、後のバージョンでも動作します。
		</p>
		<p>
		10.3 と 10.4 では、X11 のヒエラルキー (新しい -&gt; 古い コードベース) は以下の通り:
		</p>
		<pre>xorg &gt; xfree86 &gt; Apple's X11 </pre>
	</li>
</ul>
<p><b>10.4 利用者:</b></p>
<p>
XFree86 version 4.5.0-23 をソースからインストールすることができます。
<code>xfree86</code> と <code>xfree86-shlibs</code>  の両方が必要です。
</p>
<p>
X.org の X11 リリースをインストールすることもできます (現在のバージョンは 6.8.2-35) 。
これは unstable ツリーの <code>xorg</code> と <code>xorg-shlibs</code> をインストールします。
この X11 は、 XFree86-4.5 に似ていますが、バグフィックス、新しい機能があり、係争中のライセンスのコードが除かれています。
</p>
<p><b>10.3 利用者:</b></p>
<p>
XFree86 version 4.4.0-13 (現在のバイナリディストリビューション内) または
4.5.0-13 (ソースで提供) をインストールすることができます。
<code>xfree86</code> と <code>xfree86-shlibs</code>  の両方が必要です。
</p>
<p>
X.org-6.8.2 は、上記の方法で <code>xorg</code> と <code>xorg-shlibs</code> をインストールします。
</p>

<p><b>10.2 利用者:</b></p>
<p>
10.2 の利用者は、バージョン 4.3 をソースまたはバイナリで、4.4 を unstable ツリーからインストールできます。
上述の通り、<code>xfree86</code> と <code>xfree86-shlibs</code> です。
</p>
<p>
10.2 には、XFree86 4.2.1.1 もあり、<code>normal</code> と <code>-threaded</code> の２種類あります (これ以降は全てスレッドをサポートしています)が、既に古くなっています。
<code>xfree86-base</code>, <code>xfree86-base-shlibs</code>, <code>xfree86-shlibs</code>, and <code>xfree86-rootless-shlibs</code> パッケージ (または <code>-threaded</code> 付き)の全てをインストールする必要があります。
これに加え、Fink が新しいバージョンをインストールしないよう、<code>xfree86-base-dev</code> と <code>xfree86-rootless-dev</code> (または <code>-threaded</code> 付き)をインストールする必要があります。
</p>
<p><b>10.1 利用者:</b></p>
<p>
バイナリディストリビューション (のみ) からバージョン 4.2.0 をインストールすることができます。
<code>xfree86-base</code> と <code>xfree86-rootless</code> をインストールします。
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
2003年10月24日、 Apple は Tiger (10.4) をリリースしました。
これには X11 が同梱されていて、このバージョンは XFree86-4.4 をベースにしたものです。
</p>
<p>
アップルのバイナリを使うには、 <b>X11 User</b> パッケージがインストールされている必要があります。
また、Fink の <a href="/doc/users-guide/upgrade.php">update</a> も行ってください。
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
exec /opt/sw/bin/fvwm2</pre>
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
Fink でインストールした起動アプリケーション (例 ウィンドウマネージャ, gnome-session, その他の<code>/opt/sw/bin</code> 内のアプリケーション) 
を呼び出すには、 <code>~/.xinitrc</code> の上の方 ("<code>#!/bin/sh</code>" より下、他のプログラムより上) に以下の行を追加します;
</p>
<pre> . /opt/sw/bin/init.sh
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
<pre>/opt/sw/bin/emacs</pre>
<p>ではなく、 bash であれば:</p>
<pre>. /opt/sw/bin/init.sh ; emacs</pre>
<p>tcsh であれば:</p>
<pre>source /opt/sw/bin/init.sh ; emacs</pre>
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
<li><p><b>10.3 と 10.4 の利用者:</b>
XFree86 や X.org の上に、Apple のディスプレイサーバとウィンドウマネージャーを使うこともできます。
<code>applex11tools</code> をインストールすれば、 X11User.pkg があれば必要なものがインストールされます。
</p>
</li>
</ul>
<p>Apple X11 の使用に関しては、Apple Developer Connection の<a href="http://developer.apple.com/darwin/runningx11.html">記事</a> が参考になります。</p>

<h2><a name="official-binary">3.3 公式バイナリ</a></h2>

<p>
XFree86 プロジェクトには公式の Xfree86 4.5.0 バイナリディストリビューションがあります。
これは <a href="http://www.xfree86.org/mirrors">XFree86 ミラー</a> 内の
<code>4.5.0/binaries/Darwin-ppc-6.x</code> (10.1 用は <code>4.5.0/binaries/Darwin-ppc-5.x</code> ) ディレクトリにあります。
<code>Xprog.tgz</code> と <code>Xquartz.tgz</code> は、たとえ "optional" と書かれてあっても忘れずに入手して下さい。
もし何が必要なファイルかわからなければ、ディレクトリごとダウンロードして下さい。
<code>Xinstall.sh</code> スクリプトを root で実行してインストールします。
(インストール前に <a href="http://www.xfree86.org/4.5.0/Install.html">official instructions</a> を読むといいでしょう。)
</p>
<p>
これで Mac OS X 上でフルスクリーンとルートレスの XFree86 が入りました。
</p>

<h2><a name="official-source">3.4 公式ソース</a></h2>

<p>
もし時間が許せば、 XFree86 4.5 はソースからビルドすることもできます。
ソースは <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 ミラー</a> の <code>4.5.0/source</code> ディレクトリ内にありますので
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



<h2><a name="switching-x11">3.6 X11 の削除</a></h2>

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

<h2><a name="fink-summary">3.7 Fink パッケージの要点</a></h2>

<p>
インストールオプションと必要な Fink パッケージの要点:
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Install Type</th><th align="left">Fink packages</th></tr><tr valign="top"><td>XFree86-4.4.0 または 4.5.0 (10.3 と 10.4)</td><td>
            <p>
              <code>xfree86</code> と <code>xfree86-shlibs</code>
            </p>
          </td></tr><tr valign="top"><td>X.org-6.8.2 (10.3 と 10.4)</td><td>
	    <p><code>xorg</code> と <code>xorg-shlibs</code></p>
	</td></tr><tr valign="top"><td>Apple's X11 (全てのバージョン)</td><td>
            <p>
              <code>system-xfree86</code> と <code>system-xfree86-shlibs</code> (+<code>system-xfree86-dev</code> が X11 に依存するパッケージのビルド時に必要)</p>
          </td></tr><tr valign="top"><td>XFree86-4.x 公式バイナリ</td><td>
            <p>
	      <code>system-xfree86</code> と <code>system-xfree86-shlibs</code> (+<code>system-xfree86-dev</code> が X11 に依存するパッケージのビルド時に必要)
            </p>  
          </td></tr><tr valign="top"><td>ソースまたは最新の CVS からビルドした XFree86-4.x</td><td>
            <p>
	      <code>system-xfree86</code> と <code>system-xfree86-shlibs</code> (+<code>system-xfree86-dev</code> が X11 に依存するパッケージのビルド時に必要))
              </p>
          </td></tr><tr valign="top"><td>XFree86-4.2.1.x (10.2 のみ) または 4.2.0 (10.1 のみ)</td><td>
             <p><code>xfree86-base</code> と <code>xfree86-rootless</code> (および その <code>-shlibs</code>)</p>
            <p>または <code>xfree86-base-threaded</code> と <code>xfree86-rootless-threaded</code> (および <code>-shlibs</code>)</p>
          </td></tr></table>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=ja">4. X11 の起動</a></p>
<?php include_once "../../footer.inc"; ?>


