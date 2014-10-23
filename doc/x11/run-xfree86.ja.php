<?php
$title = "Running X11 - X11 の起動";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Running X11 Contents"><link rel="next" href="xtools.php?phpLang=ja" title="Xtools"><link rel="prev" href="inst-xfree86.php?phpLang=ja" title="X11 の入手とインストール">';


include_once "header.ja.inc";
?>
<h1>Running X11 - 4. X11 の起動</h1>


<h2><a name="darwin">4.1 Darwin</a></h2>

<p>
純粋な Darwin 上では XFree86 は他の Unix と同様に動作します。
通常、コンソールから <code>startx</code> で起動させると、サーバとウィンドウマネージャやターミナルエミュレータなどのクライアントが実行されます。
純粋 Darwin 上ではパラメータは必要ありません。
単純に:
</p>
<pre>startx</pre>
<p>
と入力します。
ホームディレクトリにあるファイルを編集することで、何を起動させるかをカスタマイズすることもできます。
<code>.xinitrc</code> はどのクライアントを起動するかを管理します。
<code>.xserverrc</code> はサーバオプションや他のサーバを起動させることもできます。
もし問題があれば (真っ暗な画面やコンソールに戻ってしまったら) 、上述のファイルを削除してみて下さい。
<code>startx</code> はこれらのファイルがない場合は安全なデフォルト設定で起動するはずです。
</p>
<p>
あるいは、サーバに XDMCP オプションをつけて、次のように起動することもできます:
</p>
<pre>X -query remotehost</pre>
<p>
これについての詳細は <code>Xserver</code> のマニュアルページに書かれています。
</p>
<p>
最後に、 <code>xdm</code> オプションを設定して起動することもできます:
これについての詳細はマニュアルページをご覧下さい。
</p>
<p>
注記: Panther 以前のMac OS X では、
ログイン画面で <code>&gt;console</code> と入力することでテキストコンソールに入ることもできます。
これは
</p>
<p>
注記: Mac OS X Panther 以降では、 console ウィンドウからは XFree86 は起動できません。
</p>

<h2><a name="macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></h2>

<p>
Mac OS X で XFree86 を起動するには、基本的に二つの方法があります。
ひとつは<code>アプリケーション</code>フォルダ内の <code>XDarwin.app</code> アプリケーションをダブルクリックします。
この後、起動ダイアログでフルスクリーンかルートレスかを選択します。
このダイアログは毎回でてきますが、 Preferences ダイアログで設定を行うと出てこなくなります。
</p>
<p>
4.2.0 より前は自動的にフルスクリーンモードで、ダブルクリックによる起動ではルートレスに変える方法はありませんでした。
</p>
<p>
もうひとつの方法は、 Mac OS X 上で <code>ターミナル.app</code>から <code>startx</code> を実行します。
この方法でサーバを起動する場合、Quartz と共存することを伝える必要があります。
これは、 <code>-fullscreen</code> オプションをつけて:
</p>
<pre>startx -- -fullscreen</pre>
<p>
とします。
これにより、フルスクリーンモードでサーバが起動します。
クライアントは <code>.xinitrc</code> に書き込んで下さい。
</p>
<p>
注記: 4.2 より前では <code>-quartz</code> でフルスクリーンモードになりました。
</p>
<p>
<code>-rootless</code> オプションを使って:
</p>
<pre>startx -- -rootless</pre>
<p>
<code>-quartz</code> オプションはもうフルスクリーンモードを選択しません。
代わりに、 Preferences のデフォルトモードを使用します。
</p>
<p>4.3 時点では、引数なしで <code>startx</code> を実行すると起動ダイアログが表示されます。</p>

    <h2><a name="starting-xorg">4.3 X.org の起動</a></h2>
      
     <p>X.org は XFree86 と全く同じ要領で起動します。</p>
    
    <h2><a name="starting-apples-x11">4.4 Apple X11 の起動</a></h2>
      
       <p>
	     機能としては、 Apple X11 は XFree86 と同様です (例えば、<code>.xinitrc</code> を
	     使って、クライアントを制御します)
	     通常の起動方法は <code>X11.app</code> をダブルクリックします
	     (これは<code>/アプリケーション/ユーティリティ</code>内にあります)。
	     <code>startx</code>　コマンドを使うことも可能ですが、コマンドラインオプションを使ってディスプレーモードを指定することはできません;
	     <code>X11.app</code> は、初期設定で選択されたモードで起動します。
	   </p>
       <p>
         ウィンドウマネージャーは、ほかの設定をしない限り <code>quartz-wm</code> となります。
         <b>X11.app</b> の初期設定で、再起動することなくフルスクリーンとルートレスを切り替えることができます。
         しかし、これは quartz-wm では動作しません;
         ほかのウィンドウマネージャーを (<code>.xinitrc</code> で設定して) 使う必要があります。
       </p>
    
    <h2><a name="applex11tools">4.5 applex11tools パッケージ</a></h2>
      
      <p>
        Fink の <code>applex11tools</code> を用いると、 OS 10.3 以降では、
        XFree86 4.4 以降や X.org で <code>X11.app</code> と <code>quartz-wm</code> を組み合わせることができます。
      </p>
      <p>
      	このパッケージを使用するには<a href="/faq/usage-fink.php#unstable">unstable ツリー</a> を設定し、<code>X11User.pkg</code> を <code>/Users</code> または <code>/Volumes</code> のどこかに置きます。
      	<code>X11.app</code> は、 Fink ツリー内の <code>Applications</code> フォルダーにインストールされます。
      	これで <code>X11.app</code> や <code>XDarwin.app</code> を使うことができます。</p>

<h2><a name="xinitrc">4.6 .xinitrc ファイル</a></h2>

<p>
ホームディレクトリに <code>.xinitrc</code> という名前のファイルがある場合、自動的にウィンドウマネージャや 
xterm, GNOME などのデスクトップ環境といったX クライアントを起動するために使われます。
<code>.xinitrc</code> はコマンドを実行するシェルスクリプトです。
通常の <code>#!/bin/sh</code> を先頭に書いたり、実行可能フラグをたてる必要は<b>ありません</b>。
xinit はシェルを通して起動する方法を知っています。
</p>
<p>
<code>.xinitrc</code> ファイルがホームディレクトリ内にない場合、 X11 はデフォルトのファイル
<code>/private/etc/X11/xinit/xinitrc</code>.
を使用します。
このデフォルトのファイルを元に編集するとよいかもしれません。
</p>
<pre>cp /private/etc/X11/xinit/xinitrc ~/.xinitrc</pre>
<p>
Fink を使っている場合、 source <code>init.sh</code>
を一番最初に実行します。
これによって環境が正しく設定されます。
</p>
<p>
<code>.xinitrc</code> には任意のコマンドを追加できますが、いくつかの注意点があります。
まず、シェルはデフォルトではプログラムを一つづつ実行していきます。
次にプログラムは、前のプログラムが完全に終了するまで実行されません。
同時に複数のプログラムを実行したい場合、シェルに  "バックグラウンド " 
で実行するよう伝えるため <code>&amp;</code> を各行の最後に追加します。
</p>
<p>
次に、 <code>xinit</code> は <code>.xinitrc</code> スクリプトがが終了しするまで待ち、
"セッションは終了しました。 X サーバを終了します。" 
と解釈します。
この意味は、<code>.xinitrc</code> の最後のコマンドはバックグランドで実行してはならず、ずっと実行されていなければならないということです。
慣習的にウィンドウマネージャはこの目的のために使われてきました。
実際、ほとんどのウィンドウマネージャは <code>xinit</code> が待っていることを想定し、メニューの "ログアウト" ではこれを使います。
(注記: メモリと CPU サイクルを節約するために、下記の例のように <code>exec</code> を追加すると良いでしょう。)
</p>
<p>
以下の簡単な例では、XFree86 または Xorg　上で GNOME を起動しています:
</p>
<pre>source /sw/bin/init.csh
exec gnome-session</pre>
<p>
より複雑に、 bell をオフにし、クライアントをいくつか起動してから Enlightenment ウィンドウマネージャを起動するには:
</p>
<pre>source /sw/bin/init.sh

xset b off

xclock -geometry -0+0 &amp;
xterm &amp;
xterm &amp;

exec enlightenment</pre>

<p>GNOME2.4 以降を Apple X11 下で起動するには:</p>
<pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
exec gnome-session
</pre>
<p>KDE 3.2 (version &lt; 3.2.2-21) を Apple X11 下で起動するには</p>
<pre>. /sw/bin/init.sh
export KDEWM=kwin
quartz-wm --only-proxy &amp;
/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1
</pre>
<p>最後に、最新版の unstable な KDE を Apple X11 下で起動するには:</p>
<pre>. /sw/bin/init.sh
/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1
</pre>

    <h2><a name="oroborosx">4.7 OroborOSX</a></h2>
    
    <p><a href="http://oroborosx.sourceforge.net">OroborOSX</a> は、X11.app や XDarwin ディスプレイマネージャーの代わりになります。
    これは、あらかじめ X11 を必要とします。
    <code>X11.app</code> または <code>XDarwin.app</code> もそのまま使うことができます。
    
    </p>
    <p><b>OroborOSX</b> が実行されると、独自のルートレスのみのウィンドウマネージャーを立ち上げ、
    システムの <code>xinitrc</code> やユーザーの <code>.xinitrc</code> は読み込みません。
    起動後に <code>.xinitrc</code> を実行するメニューがあります。
    しかし、起動時にアプリケーションを設定する独自の方法が採用されています。
    また、Finder から X11 アプリケーションを、スクリプトを用いて起動することができるメカニズムもあります。
    </p>
    <p>詳しい情報は、 <a href="http://oroborosx.sourceforge.net">OroborOSX ホームページ</a>をご覧ください。</p>
      
<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="xtools.php?phpLang=ja">5. Xtools</a></p>
<?php include_once "../../footer.inc"; ?>


