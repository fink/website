<?

$title = "Running X11 - Tips";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/02/28 17:21:14';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=ja\" title=\"Running X11 Contents\">\n\t<link rel=\"prev\" href=\"trouble.php?phpLang=ja\" title=\"XFree86 トラブルシューティング\" />";

include_once "header.ja.inc"; 
?><h1>Running X11 - 8 使用上の Tips</h1>


<h2><a name="terminal-app">8.1 
ターミナル.app からの X11 アプリの起動
</a></h2>

<p>
X11 アプリケーションをターミナル.app から起動するには、環境変数 "DISPLAY" が必要です。
この値はアプリケーションにどこで X11 ウィンドウサーバを探すかを指定します。
デフォルト設定では、 XDarwin は同じマシン上で動作し、 tcsh では以下のように環境変数を設定します:
</p>
<pre>setenv DISPLAY :0.0</pre>
<p>
ログイン時に XDarwin.app を起動するようにし (システム環境設定のログインパネルで) 、以下を 
<code>.cshrc</code> に追加するとよいでしょう:
</p>
<pre>if (! $?DISPLAY) then
  setenv DISPLAY :0.0
endif</pre>
<p>
全てのシェルで DISPLAY を自動的に設定しますが、既に設定されている場合は上書きをしません。
これにより、 X11 アプリケーションを遠隔から、 ssh や X11 トンネリングで実行することができます。
</p>

<h2><a name="open">8.2 xterm からの Aqua アプリケーションの起動</a></h2>

<p>
Aqua アプリケーションの xterm (他のシェルでも) からの起動方法は、 <code>open</code> コマンドを使います。
例えば:
</p>
<pre>open /Applications/TextEdit.app
open SomeDocument.rtf
open -a /Applications/TextEdit.app index.html</pre>
<p>
２番目の例では、アプリケーションに関連するドキュメントを開いています。
３番目の例では、明示的にアプリケーションを指定しています。
</p>

<h2><a name="copy-n-paste">8.3 コピーとペースト</a></h2>

<p>
コピーとペーストは Aqua と X11 環境間でも使うことができますが、バグもまだ残っています。
Emacs は現在の選択に好き嫌いが多いという報告があります。
Classic と X11 間では、コピーとペーストはできません。
</p>
<p>
いずれにせよ、それぞれの環境でそれぞれの方法を使うだけです。
テキストを Aqua から X11 へ移すには、 Aqua で Cmd-C とし、移す先のウィンドウを開いて
"ミドルマウスボタン" 、ワンボタンマウスの場合は Option-click を押して
(これは XDarwin の Preferences で設定できます) ペーストします。
テキストを X11 から Aqua に移す場合、 X11 ではマウスでテキストを選択し、 Aqua 
側で Cmd-V してペーストします。
</p>
<p>
X11 システムは複数のクリップボード (X11 的な言葉では カットバッファ) 
を持っていて、 アプリケーションによっては変なことをしているものもあります。
特に、 GNU Emacs や XEmacs にペーストするときにうまく行かないことがあります。
<code>autocutsel</code> というプログラムは、これを解消するために自動的に両方のカットバッファを同期させます。
これを実行するには、 Fink パッケージの autoculset をインストールして、以下の行を
<code>.xinitrc</code> に追加します:
</p>
<pre>autocutsel &amp;</pre>
<p>
(注記: ウィンドウマネージャを exec する<b>前に</b>、バックグラウンドで実行して下さい。
最後に追加するだけでは起動されません。)
</p>
<p>
Apple X11 を使う場合、通常の Map アプリのように Command-C か Edit-&gt;Copy 
を使ってクリップボードにコピーすることができます。
しかし、 Apple X11 で Command-V を使ったペーストはまだできません。
</p>

<? include_once "../../footer.inc"; ?>
