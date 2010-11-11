<?
$title = "F.A.Q. - 使用法 (2)";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2010/11/11 02:54:41';
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
Running X11 ドキュメントには、この問題の <a href="http://www.finkproject.org/doc/x11/trouble.php#immediate-quit">問題対処法の節</a> (英語版) があります。</p></div>
</a>
<a name="no-server">
<div class="question"><p><b><? echo FINK_Q ; ?>9.4: XDarwin を起動しようとすると、このメッセージがでます
"xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH"。
</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> まず、X の起動スクリプト <code>~/.xinitrc</code> が init.sh を読み込んでいるか確認してください。</p><p>Jaguar では、全ての <code>xfree86</code> パッケージがビルドされるが、実際には <code>xfree86-base</code> と <code>xfree86-base-shlibs</code> だけがインストールされていることがあります。
<code>xfree86-rootless</code> と <code>xfree86-rootless-shlibs</code> がインストールされているかを確認し、なければ <code>fink install xfree86-rootless</code> で解決です。</p><p>もしインストールされているなら、 <code>fink rebuild xfree86-rootless</code> を試してください。
これがうまくいかない場合、 <code>/usr/bin/X11R6</code> が PATH に含まれているか確認してください。</p></div>
</a>

<a name="apple-x-delete">
<div class="question"><p><b><? echo FINK_Q ; ?>9.5: Apple X11 の delete キーを、 XDarwin のように使いたいのです。</b></p></div>
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
<div class="question"><p><b><? echo FINK_Q ; ?>9.6: GNOME 1.x から GNOME 2.x にアップグレードしたら、 <code>gnome-session</code> がウィンドウマネージャーを開かなくなりました。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> GNOME 1.x <code>gnome-session</code> は自動的に <code>sawfish</code> ウィンドウマネージャーを呼出していましたが、 GNOEM 2.x では <code>~/.xinitrc</code>  で <code>gnome-session</code> の前に呼び出さなくてはなりません。</p><pre>...
exec metacity &amp;
exec gnome-session</pre><p>
注記: この問題は <b>GNOME 2.4</b> では発生しません。
<code>gnome-session</code> を実行することでウィンドウマネージャーを呼び出すようになりました。
</p></div>
</a>
<a name="apple-x11-no-windowbar">
<div class="question"><p><b><? echo FINK_Q ; ?>9.7: Panther で Apple X11 にアップグレードしたら、ウィンドウのタイトルバーが消えました。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> あなたは X11 を Panther に付属する "X11 1.0 - XFree86 4.3.0" にアップグレードしなかったようです。
Disk 3 の X11.pkg から X11 をインストールできます。</p></div>
</a>
<a name="apple-x11-wants-xfree86">
<div class="question"><p><b><? echo FINK_Q ; ?>9.8: X11 と Fink に問題があります。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 二つの可能性が考えられます。</p><ul>
          <li>
            <b>バイナリからインストールしている場合:</b>
            <p>
	      通常、X11User を再インストールする必要があります。
	      インストーラは、稀にファイルをインストールし忘れるためです。
	      何度か再インストールする必要があるかもしれません。
	    </p>
	    <pre>fink list -i system-xfree86</pre>
	    <p>
	      とすると、<code>system-xfree86</code> と <code>system-xfree86-shlibs</code>
	      がインストールされているかを示します。
	    </p>
	    <pre>fink list x11</pre>
	    <p>
	      とすると、<code>x11-shlibs</code> と <code>x11</code>
	      の virtual package があるかを示します。
	    </p>
	    <p>
	      もし、X11User の再インストールでもダメな場合、
	      下記の<a href="#special-x11-debug">特別なデバッグ</a> をお読みください。
	    </p>
          </li>
          <li>
            <b>ソースからインストールしている場合:</b>
	    <p>
	      通常、X11SDK を(再)インストールする必要があります。
	      これはソースからパッケージをビルドする際に<b>必ず必要</b>です。
	      Tiger DVD か、Leopard DVD の(Optional Installs/)Xcode Tools/Packages にあります。
	    </p>
            <pre>fink list -i system-xfree86  </pre>
            <p>
	      とすれば、 <code>system-xfree86</code>, <code>system-xfree86-shlibs</code>, および <code>system-xfree86-dev</code>
	      がインストールされているとわかるでしょう。
	      <code>-dev</code> パッケージがない場合、X11SDK を再インストールします。
	      Apple のインストーラは、稀にファイルを忘れるためです。
	      もし他の二つのどれかがない場合、同じ理由で X11User を再インストールします。
	      この後、
	    </p>
	    <pre>fink list x11</pre>
	    <p>
	      とすれば、<code>x11-dev</code>, <code>x11-shlibs</code>, および <code>x11</code>
	      の virtual package があることを確認できるでしょう。
	    </p>
	    <p>
	      もし、X11User と X11SDK の再インストールでもダメな場合、
	      下記の<a href="#special-x11-debug">特別なデバッグ</a> をお読みください。
	    </p>
           </li>
        </ul></div>
    </a>
    
<a name="special-x11-debug">
<div class="question"><p><b><? echo FINK_Q ; ?>9.9: まだ X11 と Fink の問題が解決されません。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
		<a href="#apple-x11-wants-xfree86">Fink が XFree86 または X.org を要求する</a> や
		<a href="#wants-xfree86-on-upgrade">10.2 からの X11 とアップグレード</a> 
		のヒントで問題が解決されないか、自分の問題と異なる場合、
		X11 をきれいに削除し、代替パッケージと X11 関連パッケージを削除します:
		</p><p>Leopard では、</p><pre>
sudo pkgutil --forget com.apple.pkg.X11User
sudo pkgutil --forget com.apple.pkg.X11SDKLeo
</pre><p>を実行します。次に、10.4 と 10.5 では、</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shilbs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg
fink selfupdate; fink index</pre><p>
	  と実行します。
	  (最初の行は、存在しないパッケージを削除しようとしているという警告の場合もあります)
	  次に、Apple X11 (および、必要であれば X11SDK) を再インストールするか、
	  10.4 の場合、XFree86 や X.org などの他の X11 を再インストールします。
	</p><p>まだ問題がある場合、</p><pre>fink-virtual-pkgs --debug</pre><p>と実行することで何が不足しているかの情報が得られます。</p><p>
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
    <a name="tiger-gtk">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.10: 
        	Tiger (OS 10.4) にアップデート後、GTK アプリを使うと必ず
        	<code>_EVP_idea_cbc</code> に関連したエラーが出ます。
        </b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
        	これは、 Tiger (10.4.1 現在) のダイナミックリンカのバグによるものです。
        	以下のようにコマンド名の前に追加することで、とりあえず起動させることができます:
		</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>例えば、 <code>gnucash</code> の場合</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>
        	この方法は、Apple X11 のアプリケーションメニューからでも、ターミナルからでも有効です。
        </p><p>
        	これをグローバルに設定する (スタートアップスクリプトと <code>.xinitrc</code>、GNOME を使う場合には必須) のも良いでしょう。
        	(ログインシェルに関わらず) <code>.xinitrc</code> と、 <b>bash</b> ユーザーは <code>.profile</code> (または他のスタートアップスクリプト) に、
        </p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>と記述し、<b>tcsh</b> ユーザーは、同様に <code>.cshrc</code> (または他のスタートアップスクリプト) に、</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>と記述します。</p><p>これは <code>base-files-1.9.7-1</code> 以降では自動的に追加されます。</p></div>
    </a>
  <a name="yelp">
    <div class="question"><p><b><? echo FINK_Q ; ?>9.11: どの GNOME アプリケーションでも、ヘルプ機能が使えません。</b></p></div>
	<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
		  <code>yelp</code> というパッケージをインストーする必要があります。
		  このパッケージは、暗号化を使用するため GNOME バンドルに含まれていません。
		  ヘルプシステムを使用するためだけの理由で、GNOME 全てを crypto ツリーに入れることはしないという判断がされています。
		</p></div>
  </a>

<? include_once "../footer.inc"; ?>


