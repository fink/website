<?
$title = "F.A.Q. - 使用法 (2)";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/07/24 14:10:18';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="prev" href="usage-general.php?phpLang=ja" title="パッケージ使用上の問題 - 一般">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 9. パッケージ使用上の問題 - 特定のパッケージ</h1>


<a name="xmms-quiet">
<div class="question"><p><b><? echo FINK_Q ; ?>9.1: XMMS から音がでません。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> XMMS設定で "eSound Output Plugin" を選択しているか確認してください。
おかしなことに、デフォルトでは disk writer プラグインが選択されています。
</p><p>これでも音がでないか、 XMMS がサウンドカードを見つけられないといっているなら:</p><ul>
<li>Mac OS X で無音にしていないか確認。</li>
<li><code>esdcat /usr/libexec/config.guess</code> を実行 (あるいは他の小さいファイル)。
何か音が聞こえたら、 eSound が動作しているので、正しく設定されていれば XMMS でも動作するはずです。
何も聞こえなければ、 esd が何らかの理由で動作していません。
<code>esd &amp;</code> を起動してみて、メッセージを監視してください。</li>
<li>まだ動作しないなら、 <code>/tmp/.esd</code> と <code>/tmp/.esd/socket</code> のパーミッションを確認してください。
あなたのアカウントが所有者として設定されているはずですが、そうでなければ、 esd が動作していれば kill して、 root 権限でディレクトリを削除してください (<code>sudo rm -rf /tmp/.esd</code>)。
この後、 esd を再起動してください (root ではなく、一般ユーザーとして)。
</li>
</ul><p>esd は root ではなく一般ユーザーで実行されるよう設計されていることに注意してください。
通常、ファイルシステムソケット <code>/tmp/.esd/socket</code> を経由して通信します。
esd クライアントを別のマシンでネットワーク経由で実行する場合、 <code>-tcp</code> と <code>-port</code> の切替えのみが必要です。
</p><p>この他に、 10.1 で XMMS がクラッシュするという報告があります。
この件に関しては、まだ分析も修正もしていません。</p></div>
</a>
<a name="nedit-window-locks">
<div class="question"><p><b><? echo FINK_Q ; ?>9.2: nedit でファイルを編集していると、他のファイルを開く時にウィンドウが出ますが、反応がありません。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> これは最近のバージョンの <code>nedit</code> と <code>lesstif</code> の既知の問題で、他のシステムでも同様です。
File--&gt;New でウィンドウを開き、次のファイルを開くと問題を回避できます。</p><p>この問題は <code>nedit-5.3-6</code> で <code>lesstif</code> から <code>openmotif3</code> に依存するようになり、解決されました。</p></div>
</a>
<a name="xdarwin-start">
<div class="question"><p><b><? echo FINK_Q ; ?>9.3: 助けて!
XDarwin を起動してもすぐ終了しちゃう!</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
慌てない、慌てない。
Running X11 ドキュメントには、この問題の <a href="http://fink.sourceforge.net/doc/x11/trouble.php#immediate-quit">問題対処法の節</a> (英語版) があります。</p></div>
</a>
<a name="no-server">
<div class="question"><p><b><? echo FINK_Q ; ?>9.4: XDarwin を起動しようとすると、このメッセージがでます
"xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH"。
</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> まず、X の起動スクリプト <code>~/.xinitrc</code> が init.sh を読み込んでいるか確認してください。</p><p>Jaguar では、全ての <code>xfree86</code> パッケージがビルドされるが、実際には <code>xfree86-base</code> と <code>xfree86-base-shlibs</code> だけがインストールされていることがあります。
<code>xfree86-rootless</code> と <code>xfree86-rootless-shlibs</code> がインストールされているかを確認し、なければ <code>fink install xfree86-rootless</code> で解決です。</p><p>もしインストールされているなら、 <code>fink rebuild xfree86-rootless</code> を試してください。
これがうまくいかない場合、 <code>/usr/bin/X11R6</code> が PATH に含まれているか確認してください。</p></div>
</a>
<a name="xterm-error">
<div class="question"><p><b><? echo FINK_Q ; ?>9.5: xterm が "dyld: xterm Undefined symbols: xterm undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib" といって終了します。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 10.1 版の XFree86 を 10.2 で使用するとこの問題が発生します。
10.2 版にアップグレードしてください。</p><p>Fink <code>xfree86</code> パッケージを使っている場合、通常の方法でアップグレードできます
(ソースからの場合、
"<code>fink selfupdate-cvs ; fink update-all</code>"、バイナリからの場合、
"<code>fink selfupdate ; ; sudo apt-get update; sudo apt-get dist-upgrade</code>")。</p><p>XFree86 を他の手段でインストールした場合、最新版パッチが
<a href="http://mrcla.com/XonX">XonX web site</a>
から入手できます。</p></div>
</a>
<a name="libXmuu">
<div class="question"><p><b><? echo FINK_Q ; ?>9.6: XFree86 を起動しようとすると、下記のエラーのひとつがでます。
"dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib"
または "dyld: xinit can't open library: /usr/X11R6/lib/libXext.6.dylib"</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> これは、 <code>xfree86-base-(threaded)-shlibs</code> からインストールされたはずのファイルが見つからないことが原因です。
ソースの場合、<code>fink reinstall xfree86-base-shlibs</code> (threaded 版の XFree86 パッケージ場合、<code>fink reinstall xfree86-base-threaded-shlibs</code>)、
バイナリの場合、 <code>sudo apt-get install --reinstall xfree86-base-shlibs</code> を再インストールする必要があります。</p></div>
</a>
<a name="apple-x-bugs">
<div class="question"><p><b><? echo FINK_Q ; ?>9.7: Fink の XFree86 を Apple X11 に置き換えたのですが、なんでもかんでもクラッシュするようになりました!</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> まず、以前 threaded 版の Fink XFree86 があったのなら、クラッシュしたアプリケーションを再ビルドする必要があります。
プログラムによっては、ビルド時に thread の対応を確認し、以降は thread があるものと仮定されます。</p><p>これが原因でなければ、次の可能性としては Apple X11 のバグに当たったのかも知れません。
これを書いている時点でも Apple チームはバグを認識していて作業中です。
</p><p>Apple X11 に関する一般的な質問で Fink に直接関係が無いものは、
<a href="http://www.lists.apple.com/x11-users">Apple 公式 X11 ディスカッションリスト</a>
を確認してみてはいかがでしょうか。
このサイトで<a href="http://developer.apple.com/bugreporter">Apple へバグレポートを送る</a>よう薦めています。</p></div>
</a>
<a name="apple-x-delete">
<div class="question"><p><b><? echo FINK_Q ; ?>9.8: Apple X11 の delete キーを、 XDarwin のように使いたいのです。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> XDarwin と Apple X11 で <code>delete</code> キーの挙動が違うという報告がありますが、これは X の起動ファイルに以下を追加することで調整できます:</p><p>
<b>.Xmodmap:</b>
</p><pre>keycode 59 = Delete</pre><p>
<b>.Xresources:</b>
</p><pre>
xterm*.deleteIsDEL: true
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?
</pre><p>
<b>.xinitrc</b>
</p><pre>xrdb -load $HOME/.Xresources
xmodmap $HOME/.Xmodmap</pre><p></p></div>
</a>
<a name="gnome-two">
<div class="question"><p><b><? echo FINK_Q ; ?>9.9: GNOME 1.x から GNOME 2.x にアップグレードしたら、 <code>gnome-session</code> がウィンドウマネージャーを開かなくなりました。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> GNOME 1.x <code>gnome-session</code> は自動的に <code>sawfish</code> ウィンドウマネージャーを呼出していましたが、 GNOEM 2.x では <code>~/.xinitrc</code>  で <code>gnome-session</code> の前に呼び出さなくてはなりません。</p><pre>...
exec metacity &amp;
exec gnome-session</pre><p>
注記: この問題は <b>GNOME 2.4</b> では発生しません。
<code>gnome-session</code> を実行することでウィンドウマネージャーを呼び出すようになりました。
</p></div>
</a>
<a name="apple-x11-no-windowbar">
<div class="question"><p><b><? echo FINK_Q ; ?>9.10: Panther で Apple X11 にアップグレードしたら、ウィンドウのタイトルバーが消えました。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> あなたは X11 を Panther に付属する "X11 1.0 - XFree86 4.3.0" にアップグレードしなかったようです。
Disk 3 の X11.pkg から X11 をインストールできます。</p></div>
</a>
<a name="apple-x11-wants-xfree86">
<div class="question"><p><b><? echo FINK_Q ; ?>9.11: Apple X11 をインストールしたけれども、 Fink が XFree86 をインストールしろといい続けます。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 二つの可能性があります。</p><ul>
		<li><b>バイナリからのインストール:</b> 
		お使いの <code>fink</code> パッケージのバージョンが 0.17.0 より前のものであれば
		(Fink-0.6.2 インストーラに含まれていたものも)
		fink を更新することで直ります。
		<pre>sudo apt-get update
sudo apt-get install fink</pre>
		<p>
		これで駄目なら、 X11User パッケージを再インストールする必要があります。
		インストーラがファイルをインストールしないことがあるためです。</p>
		<pre>fink list -i system-xfree86</pre> 
		<p>で
		<code>system-xfree86</code> と <code>system-xfree86-shlibs</code>
		のパッケージがインストールされているかはわかります。
		</p>
		<p>
		X11User パッケージの再インストールができない場合、
		<a href="#special-x11-debug">special debug</a> 解決法を参照。
		</p>
		</li>
		<li><b>ソースからのインストール: </b>
		<code>fink</code> のバージョンが 0.17 以前であれば、
		<code>fink</code> を更新します。
		<pre>fink selfupdate</pre>
		(CVS または rsync 更新が有効になっている必要があります。)
		<p>最新版の fink により、</p>
		<pre>fink list -i system-xfree86</pre>
		<p>
		を実行することで，<code>system-xfree86</code>, <code>system-xfree86-shlibs</code>, 
		and <code>system-xfree86-dev</code> がインストールされているか分かります。
		最初の二つのうちいずれかがない場合、 X11User パッケージを再インストールします。
		<code>-dev</code> がない場合、 X11SDK を(再)インストールします。
		これは、 Xcode CD に入っていますが、デフォルトではインストール<b>されません</b>。
		Xcode をインストールしても、 X11SDK はデフォルトではインストール<b>されません</b>。
		Xcode のインストール時にカスタムを選択するか、<code>Packages</code> フォルダ内の
		<code>X11SDK</code> pkg をダブルクリックします。
		</p>
 		<p>
		<b>Jaguar (X11 beta 3) ユーザーへの注記</b>:  
		XCode を使っていないため、ダウンロード済みの X11SDK パッケージが必要です。
		X11 beta 3 は既に有効期限が切れ、X11SDK パッケージ (と X11User パッケージ)
		はダウンロードできません。
		バイナリ版をインストールするか、 Panther に更新する必要があります。
		</p>
		<p>これで問題が解決されない場合、
		<a href="#special-x11-debug">special debug</a> 解決法を参照。</p>
		</li>
	</ul></div>
</a>

<a name="wants-xfree86-on-upgrade">
<div class="question"><p><b><? echo FINK_Q ; ?>9.12: 
    10.2 Fink バージョンから 10.2-gcc3.3 あるいは 10.3 に切り替えたら、 Apple X11 があるのに XFree86 をインストールしろと言われます。
    </b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
    以下の古い代替パッケージのうちいずれかを削除する必要があります:
    <code>system-xfree86</code>, <code>system-xfree86-42</code>, 
    <code>system-xfree86-43</code> 。
    自分でインストールした X11 の設定を Fink が行ない、バーチャルパッケージを作成します。
    他のパッケージが <code>system-xfree86</code> に依存しているため、以下のコマンドを使い
    </p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43</pre><p>
    古いバージョンを削除します。
    インストールの確認は、
    </p><pre>fink list -i system-xfree86</pre><p>
    とし、 <code>system-xfree86</code> と <code>system-xfree86-shlibs</code>
    があるか確認します。
    X11SDK もインストールされている場合、 <code>system-xfree86-dev</code> も確認します。
    </p><p>
    これでも問題が解決されない場合、上の
    <a href="#apple-x11-wants-xfree86">Fink wants XFree86</a>
    を参照してください。
    </p></div>
</a>

<a name="special-x11-debug">
<div class="question"><p><b><? echo FINK_Q ; ?>9.13: まだ X11 と Fink の問題が解決されません。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
		<a href="#apples-x11-wants-xfree86">Fink tries to install XFree86</a> や
		<a href="#wants-xfree86-on-upgrade">X11 and upgrade from 10.2</a> 
		のヒントで問題が解決されないか、自分の問題と異なる場合、
		X11 をきれいに削除し、代替パッケージと X11 関連パッケージを削除します:
		<a href="#apples-x11-wants-xfree86">Fink tries to install XFree86</a>
		</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xfree86 xfree86-shilbs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg
fink selfupdate; fink index</pre><p>
		(最初の行で存在しないパッケージを削除しようとしているという警告が出ます)
		次に、Apple X11 (および必要に応じて X11SDK) または XFree86 を再インストールします。
		</p><p>
		これでも問題があり、 <code>fink-0.19.0</code> 以降を使っている場合、
		</p><pre>fink-virtual-pkgs --debug</pre><p>で何が不足しているかの情報が得られます。</p><p>
		古いバージョンの  <code>fink</code> を使っている場合、Perl スクリプト
		(Martin Costabel 作成)　で同様の情報が得られます。
		</p><ul>
          <li>入手先: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
          </li>
          <li>好きな場所に保存</li>
          <li>ターミナルウィンドウから実行: <pre>perl fink-x11-debug</pre>
          </li>
        </ul></div>
</a>


<? include_once "../footer.inc"; ?>


