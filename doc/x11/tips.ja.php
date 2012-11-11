<?
$title = "Running X11 - Tips";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Running X11 Contents"><link rel="prev" href="trouble.php?phpLang=ja" title="XFree86 トラブルシューティング">';


include_once "header.ja.inc";
?>
<h1>Running X11 - 8. 使用上の Tips</h1>


<h2><a name="terminal-app">8.1 
ターミナル.app からの X11 アプリの起動
</a></h2>

<p>
X11 アプリケーションをターミナル.app から起動するには、環境変数 "DISPLAY" が必要です。
この値はアプリケーションにどこで X11 ウィンドウサーバを探すかを指定します。
デフォルト設定では、 XDarwin は同じマシン上で動作し、以下のように環境変数を設定します:
</p>
<ul>
<li><p>tcsh の場合:</p>
<pre>setenv DISPLAY :0.0</pre>
</li>
<li><p>bash の場合:</p>
<pre>export DISPLAY=":0.0"</pre>
</li>
</ul>
<p>
ログイン時に XDarwin.app を起動するようにし (MacOSX 10.2 の場合、システム環境設定のログインパネルで、
MacOSX 10.3 の場合、アカウントパネルの起動項目で) 、
</p>
<ul>
<li><p>tcsh の場合: 以下を <code>.cshrc</code> に追加:</p>
<pre>if (! $?DISPLAY) then
  setenv DISPLAY :0.0
endif</pre>
</li>
<li><p>bash の場合: 以下を <code>.bashrc</code> に追加:</p>
<pre>[[ -z $DISPLAY ]] &amp;&amp; export DISPLAY=":0.0"</pre>
</li>
</ul>
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
これを実行するには、 Fink パッケージの autocutsel をインストールして、以下の行を
<code>.xinitrc</code> に追加します:
</p>
<pre>autocutsel &amp;</pre>
<p>
(注記: ウィンドウマネージャを exec する<b>前に</b>、バックグラウンドで実行して下さい。
最後に追加するだけでは起動されません。)
これは Apple X11 では必要ではありません。
(<a href="inst-xfree86.php?phpLang=ja#apple-binary">Apple X11 を使う際の注意点</a> を参照)。
</p>
<p>
Apple X11 を使う場合、通常の Map アプリのように Command-C か Edit-&gt;Copy 
を使ってクリップボードにコピーすることができます。
ペーストは、マウスの中ボタンをクリックか Command-V を押します。
</p>
<p>
いずれにせよ、 Aqua と X11 の間のコピー・ペーストで問題が合った場合、
まずはペーストを２回試してください
(コピーに時間がかかる場合があるようです)。
これで駄目なら、他のアプリケーションを試してください。
例: Aqua 側では TextEdit や Terminal.app 、
X11 側では nedit や xterm 。
私の経験上、これでうまく行きます。
</p>


<? include_once "../../footer.inc"; ?>


