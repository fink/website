<?

$title = "Running X11 - XFree86 の起動";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/02/28 17:21:14';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=ja\" title=\"Running X11 Contents\" /><link rel=\"next\" href=\"xtools.php?phpLang=ja\" title=\"Xtools\" /><link rel=\"prev\" href=\"inst-xfree86.php?phpLang=ja\" title=\"XFree86 の入手とインストール\" />";

include_once "header.ja.inc"; 
?><h1>Running X11 - 4 XFree86 の起動</h1>


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
注記: Mac OS X では、ログイン画面で <code>&gt;console</code> と入力することでテキストコンソールに入ることもできます。
これは
</p>

<h2><a name="macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></h2>

<p>
Mac OS X で XFree86 を起動するには、基本的に二つの方法があります。
ひとつはアプリケーションフォルダ内の XDarwin.app アプリケーションをダブルクリックします。
この後、起動ダイアログでフルスクリーンかルートレスかを選択します。
このダイアログは毎回でてきますが、 Preferences ダイアログで設定を行うと出てこなくなります。
</p>
<p>
4.2.0 より前は自動的にフルスクリーンモードで、ダブルクリックによる起動ではルートレスに変える方法はありませんでした。
</p>
<p>
もうひとつの方法は、 Mac OS X 上でターミナル.appから <code>startx</code> を実行します。
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
サーバがルートレスモードをサポートしていれば、 <code>-rootless</code> オプションを使って:
</p>
<pre>startx -- -rootless</pre>
<p>
<code>-quartz</code> オプションはもうフルスクリーンモードを選択しません。
代わりに、 Preferences のデフォルトモードを使用します。
</p>
<p>4.3 時点では、引数なしで <code>startx</code> を実行すると起動ダイアログが表示されます。</p>

<h2><a name="xinitrc">4.3 .xinitrc ファイル</a></h2>

<p>
ホームディレクトリに <code>.xinitrc</code> という名前のファイルがある場合、自動的にウィンドウマネージャや 
xterm, GNOME などのデスクトップ環境といったX クライアントを起動するために使われます。
<code>.xinitrc</code> はコマンドを実行するシェルスクリプトです。
通常の <code>#!/bin/sh</code> を先頭に書いたり、実行可能フラグをたてる必要は<b>ありません</b>。
xinit はシェルを通して起動する方法を知っています。
</p>
<p>
<code>.xinitrc</code> ファイルがホームディレクトリ内にない場合、 XFree86 はデフォルトのファイル
<code>/private/etc/X11/xinit/xinitrc</code>.
を使用します。
このデフォルトのファイルを元に編集するとよいかもしれません。
</p>
<pre>cp /private/etc/X11/xinit/xinitrc ~/.xinitrc</pre>
<p>
Fink を使っている場合、 source <code>init.sh</code> を一番最初に実行します。
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
以下のサンプルでは GNOME を起動しています:
</p>
<pre>source /sw/bin/init.sh
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

<p align="right">
Next: <a href="xtools.php?phpLang=ja">5 Xtools</a></p><? include_once "../../footer.inc"; ?>
