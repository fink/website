<?
$title = "Running X11 - トラブルシューティング";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/05/29 15:43:25';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Running X11 Contents"><link rel="next" href="tips.php?phpLang=ja" title="使用上の Tips"><link rel="prev" href="other.php?phpLang=ja" title="その他の X11">';


include_once "header.ja.inc";
?>
<h1>Running X11 - 7. XFree86 トラブルシューティング</h1>


<h2><a name="immedate-quit">7.1 XDarwin を起動した直後に終了かクラッシュします</a></h2>

<p>
慌てない、慌てない。
XFree86 をおかしくする原因は沢山あります。
このなかで、起動に関連するものは特に多いです。
起動時に問題があった場合、当然 XDarwin がクラッシュすることもよくあります。
この節では起こりうる問題についての対処の完全な一覧を提供していきたいと思います。
まず最初は、二種類の情報が必要です。
</p>
<p>
<b>XDarwin バージョン</b>
XDarwin のバージョンは、 Finder の XDarwin アイコンを <b>一回だけ</b> クリックして、メニューから " 情報を見る" を選択します。
バージョンは、新しいバイナリテストリリースが XonX プロジェクトから出たときだけあがります。
つまり、 "1.0a1" は実際は 1.0a1 と 1.0a2 の間にあります。
</p>
<p>
<b>エラーメッセージ</b>
これは問題を特定するために必須の情報です。
エラーメッセージを見るのは、どうやって XDarwin を起動したかによって変わります。
<code>startx</code> をターミナルから起動した場合、そのウィンドウ内に出力されます。
スクロールアップして見つけて下さい。
XDarwin アイコンをダブルクリックして起動した場合、メッセージはシステムログに書かれます。
アプリケーションフォルダ内のユーティリティーから Console を起動し、該当するメッセージを探して下さい。
</p>
<p>
メッセージについての説明をします:
</p>
<pre>_XSERVTransmkdir: Owner of /tmp/.X11-unix should be set to root</pre>
<pre>_IceTransmkdir: Owner of /tmp/.ICE-unix should be set to root</pre>
<p>
Class: Harmless.
X11 は隠しディレクトリを /tmp に作り、ソケット "ファイル" をローカル接続用に作成します。
セキュリティー上の問題から、 X11 は root を所有者にしますが、誰でも書き込めるため実行時には問題にはなりません。
(注記: ディレクトリを root に持たせることは困難です。
Mac OS X では /tmp を 再起同時に削除し、 XDarwin 自体は root 権限では実行されないためです)
</p>
<pre>QuartzAudioInit: AddIOProc returned 1852797029</pre>
<pre>-[NSCFArray objectAtIndex:]: index (2) beyond bounds (2)</pre>
<pre>kCGErrorIllegalArgument : CGSGetDisplayBounds (display 35434400)</pre>
<pre>No core keyboard</pre>
<p>
Class: Bogus (嘘八百).
これは前のエラーをリセットする際に発生するものです。
この間、起動バナーがもう一つできますが、これは XDarwin では動作しないため、このエラーを出力します。
もしこのメッセージが出てきたら、ターミナルまたは Console をさらにスクロールアップして他のメッセージを探して下さい。
この問題は 1.0a3 あで存在しましたが、これ以降では修正されました。
</p>
<pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>
<p>
Class: Mostly harmless.
このメッセージがどこからきたのかわかっていません。
動作には特に影響しないようです。
これはホームディレクトリ内で <code>touch .Xauthority</code> を起動すると取り除くことができます。
</p>
<pre>Gdk-WARNING **: locale not supported by C library</pre>
<p>
Class: Harmless.
これは、文字通りのことで、アプリケーションの実行には関係しません。
詳細は、<a href="#locale">下記を参照</a>して下さい。
</p>
<pre>Gdk-WARNING **: locale not supported by Xlib, locale set to C
Gdk-WARNING **: can not set locale modifiers</pre>
<p>
Class: Bad, but not fatal.
このメッセージは上記のメッセージと一緒に出てくることがあります。
これは、 XFree86 のロケールデータファイルが存在しないことを示しています。
ソースからビルドした場合、このエラーは発生しないようです。
ほとんどのアプリケーションは動作しますが、 GNU Emacs は例外です。
</p>
<pre>Unable to open keymapping file USA.keymapping.
Reverting to kernel keymapping.</pre>
<p>
Class: Often fatal.
これは XDarwin 1.0a1 で "Load from file" keymapping オプションがオンの場合に発生します。
このバージョンでは Preferences ダイアログでファイルを指定する場合にフルパスで指定する必要がありますが、コマンドラインで指定した場合は自動的に検索します。
このメッセージは通常、下の "assert" メッセージが続きます。
この問題を解決するには、下に書かれていることに従って下さい。
</p>
<pre>Fatal server error:
assert failed on line 454 of darwinKeyboard.c!</pre>
<pre>Fatal server error:
Could not get kernel keymapping! Load keymapping from file instead.</pre>
<p>
Class: Fatal.
Apple の Mac OS X 10.1 における変更が XFree86 のキーボードレイアウトをオペレーティングシステムカーネルから読むコードを壊しました。
上記のメッセージはこのために出てきます。
Mac OS X 10.1 上では "Load from file" keymapping オプションを使わなければなりません。
この設定は XDarwin Preferences ダイアログにあります。
ファイルが選択されているか確認します ("Pick file" ボタンを使う) 。
XDarwin のバージョンによってはチェックボックスをオンにするだけでは動作しません。
もし XDarin が直ぐに終了して Preferences ダイアログまでたどり着けない場合、
<code>startx -- -quartz -keymap USA.keymapping</code> を実行してターミナルから起動します。
これで通常は XDarwin が起動します。
Preferences で設定を保存します。
</p>
<pre>Fatal server error:
Could not find keymapping file .</pre>
<p>
Class: Fatal (メッセージの通り).  
これは Panther でキーマッピングファイルがないために発生します。
<code>xfree86-4.3.99-16</code> 以降のバージョンではキーマッピングファイルを必要としないので、これをインストールして下さい。
</p>
<pre>Warning: no access to tty (Inappropriate ioctl for device).
Thus no job control in this shell.</pre>
<p>
Class: Mostly harmless.
XDarwin 1.0a2 以降ではクライアント起動ファイル (.xinitrc) を実行する際に裏で対話的にシェルを起動しています。
これによって PATH を設定せずにすんでいます。
シェルによっては、実際のターミナルには接続していないとメッセージを発しますが、ジョブ管理などにはシェルを使わないので無視します。
</p>
<pre>Fatal server error:
failed to connect as window server!</pre>
<p>
Class: Fatal.
Aqua が存在しているのにコンソールモードのサーバ (純粋な Darwin) が起動されたことを意味しています。
通常、公式 XFree バイナリディストリビューションをインストールして XQuartz.tgz tarball 
を残していた場合にこのエラーが発生します。
また、 /usr/X11R6/bin のシンボリックリンクが壊れていたり、ターミナルから<code>XDarwin</code> 
を実行しても発生することがあります
(ターミナルからの起動には startx を使います。<a href="run-xfree86.php?phpLang=ja">XFree86の起動</a> を参照) 。
</p>
<p>
いずれの場合も、 <code>ls -l /usr/X11R6/bin/X*</code> を実行して出力の、特に以下のようになっている４カ所を見ます。
<code>X</code> <code>XDarwinStartup</code> へのシンボリックリンク;
<code>XDarwin</code>, 実行可能ファイル (コンソールモードサーバ);
<code>XDarwinQuartz</code> <code>/Applications/XDarwin.app/Contents/MacOS/XDarwin</code> へのシンボリックリンク;
<code>XDarwinStartup</code> 小さい実行可能ファイル。
もしどれか一つでもないか、違うファイルへリンクされていたら、修正する必要があります。
修正の方法はどうやって XFree86 をインストールしたかによって変わります。
Fink で XFree86 をインストールした場合、
<code>xfree86</code> パッケージ (または OS 10.2 以前は<code>xfree86-rootless</code>)
を再インストールする必要があります。
手動でインストールした場合、Xquartz.tgz からファイルを取得します。
</p>
<pre>The XKEYBOARD keymap compiler (xkbcomp) reports:
&gt; Error:            Can't find file "unknown" for geometry include
&gt;                   Exiting
&gt;                   Abandoning geometry file "(null)"
Errors from xkbcomp are not fatal to the X server</pre>
<p>
Class: Mostly harmless.
メッセージの通り、致命的ではありません。
私が知っている限り、 XDarwin は XKB 拡張は使っていません。
おそらくクライアントプログラムによっては使ってることもあるでしょうが...
</p>
<pre>startx: Command not found.</pre>
<p>
Class: Fatal.
これは XDarwin 1.0a2 と 1.0a3 で シェルの初期かファイルが /usr/X11R6/bin 
を PATH 変数に追加しない場合に発生します。
Fink を使っていてデフォルトのシェルを変えていない場合、 (Fink の解説の通り)
<code>source /sw/bin/init.csh</code> という一行をホームディレクトリ内の 
<code>.cshrc</code> に追加すれば十分です。
</p>
<pre>_XSERVTransSocketUNIXCreateListener: ...SocketCreateListener() failed
_XSERVTransMakeAllCOTSServerListeners: server already running</pre>
<pre>Fatal server error:
Cannot establish any listening sockets - Make sure an X server isn't already
running</pre>
<p>
Class: Fatal.
これは、間違って複数の XDarwin を起動しようとしたときに発生します。
あるいは、 (クラッシュなど) XDarwin を正常に終了しなかった場合もあり得ます。
または、ローカル接続用ソケットのファイル権限の問題かもしれません。
<code>rm -rf /tmp/.X11-unix</code> できれいにするか、コンピュータの再起動でなおります
(Mac OS X では自動的に起動時に /tmp をきれいにし、ネットワークスタックをリセットします) 。
</p>
<pre>Xlib: connection to ":0.0" refused by server
Xlib: Client is not authorized to connect to Server</pre>
<p>
Class: Fatal.
誤った認証データのためにクライアントプログラムが表示サーバ (XDarwin) に接続できません。
これはある種の VNC インストール、 root で XDarwin を起動、あるいはすごく変な状況下が原因となります。
通常、ホームディレクトリから <code>.Xauthority</code> ファイル 
(認証データが保存されている) を削除し、空ファイルを作成します:
</p>
<pre>cd
rm .Xauthority
touch .Xauthority</pre>
<p>
この他に、 <code>.xinitrc</code> ファイルが原因となることもあります。
<code>.xinitrc</code> が実行されて直ぐに終了するような場合、 <code>xinit</code> は
ユーザーのセッションが終了したと解釈して XDarwin を終了します。
<a href="run-xfree86.php?phpLang=ja#xinitrc">.xinitrc 節</a> の詳細をご覧下さい。
PATH を設定し、終了しないプログラムをバックグラウンドでひとつだけ起動させることは絶対に忘れないで下さい。
<code>exec xterm</code> を追加して、ウィンドウマネージャが見つからない場合の安全策にする方法もあります。
</p>

<h2><a name="black">7.2 GNOME パネルや GNOME アプリケーションメニュのアイコンが黒い</a></h2>

<p>
よくある問題に、アイコンや他の画像が黒い長方形や輪郭だけ表示されるといったものがあります。
究極的には、これはオペレーティングシステムの限界によるものです。
この問題は Apple に報告されていますが、現時点では修正する気はないようです。
<a href="http://www.opensource.apple.com/bugs/X/Kernel/2691632.html">Darwin bug report</a> をお読みください。
</p>
<p>
現状は、 X11 プロトコルの MIT-SHM 拡張 が Darwin と Mac OS X では実用的には使用できないようです。
このプロトコル拡張はサーバ側またはクライアント側で無効化することができます。
Fink でインストールされた XFree86 サーバ (xfree86-server と xfree86-rootless) は既に無効化しています。
GIMP と GNOME パネルも対処しています。
他のアプリケーションで同様の問題が発生した場合、 <code>--no-xshm</code> 
コマンドラインオプションをつけて実行してみて下さい。
</p>

<h2><a name="keyboard">7.3 キーボードが XFree86 で反応しない</a></h2>

<p>
この問題は今のところノート (PowerBook, iBook) だけで発生するようです。
この問題を回避するために "Load from file" keymapping オプションが実装されました。
現在では古い方法 (カーネルからマッピングを読む) は Mac OS X 10.1 で使えなくなったため、デフォルトになっています。
もしこのオプションが有効になっていない場合、 XDarwin の Preferences ダイアログで有効にできます。
"Load from file" チェックボックスをチェックしてキーマッピングファイルを選択して下さい。
 XDarwin を再起動後、キーボードが使えるはずです (下記参照)。
</p>
<p>
XFree86 をコマンドラインから実行している場合、オプションとしてキーマッピングファイルを渡すこともできます:
</p>
<pre>startx -- -quartz -keymap USA.keymapping</pre>

<h2><a name="delete-key">7.4 Back Space キーが動かない</a></h2>

<p>
これは、 "Load keymapping from file" オプションを有効にした場合におこることがあります。
マッピングファイルはバックスペースキーを "Delete" キーとして登録し、 "Backspace" ではありません。
これは、 <code>.xinitrc</code> ファイルに以下の行を追加して直します:
</p>
<pre>xmodmap -e "keycode 59 = BackSpace"</pre>
<p>
もし私の記憶が正しければ、 XDarwin 1.0a2 以降では自動的に Backspace キーとしてマップしています。
</p>

<h2><a name="locale">7.5 "Warning: locale not supported by C library"</a></h2>

<p>
このメッセージはよく見かけますが、無害です。
メッセージの通り、国際化が標準 C ライブラリを通してサポートされていないので、プログラムはデフォルトの英語でメッセージ、日時などを使います。
この問題の対処法はいくつかあり:
</p>
<ul>
<li>
<p>
無視する.

</p>
</li>
<li>
<p>
環境変数 LANG をアンセットしてメッセージが出てこなくする。
これは、国際化されている他のプログラムが (gettext/libintl の) サポートを使用しなくなるので注意して下さい。
<code>.xinitrc</code> の例として、  
</p>
<pre>unset LANG</pre>
<p>
<code>.cshrc</code> の例:
</p>
<pre>unsetenv LANG</pre>
</li>
<li>
<p>
(10.1 のみ) <code>libxpg4</code> Fink パッケージを使用する。
これはシステムライブラリより前にロードされる (DYLD_INSERT_LIBRARIES 環境変数を使った)
ロケール関数などを含む小さなライブラリです。
この場合、 LANG 環境変数に完全な値、例えば <code>ja_JP.eucJP</code> を使う必要があります。
<code>ja</code> や <code>ja_JP</code> では動作しません。
</p>
</li>
<li>
<p>
Apple に将来の Mac OS X に、ちゃんとしたロケールサポートを追加してもらう。
</p>
</li>
</ul>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="tips.php?phpLang=ja">8. 使用上の Tips</a></p>
<? include_once "../../footer.inc"; ?>



