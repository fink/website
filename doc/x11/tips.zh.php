<?

$title = "运行 X11 - 提示";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/07 01:55:46';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=zh\" title=\"运行 X11 Contents\">\n\t<link rel=\"prev\" href=\"trouble.php?phpLang=zh\" title=\"XFree86 故障排除\" />";

include_once "header.zh.inc"; 
?><h1>运行 X11 - 8 使用提示</h1>
    
    
    <h2><a name="terminal-app">8.1 在终端程序窗口启动 X11</a></h2>
      
      <p>
要从终端程序窗口启动 X11 程序，你需要设置 "DISPLAY" 环境变量。
这个变量告诉程序在哪里找到 X11 窗口服务器。
默认设置－XDarwin 运行在相同的机器上，你的 shell 是 tcsh－的情况下，你可以这样设置环境变量：
</p>
      <pre>setenv DISPLAY :0.0</pre>
      <p>
一个不错的设置办法是在你登录的时候让 XDarwin.app 程序自动启动（可以在系统设置的登录面板中设置），并在你的 .cshrc 中加进：
</p>
      <pre>if (! $?DISPLAY) then
  setenv DISPLAY :0.0
endif</pre>
      <p>
这会在每个 shell 中自动设置 DISPLAY 变量。但它不会覆盖已经设置的 DISPLAY 值。这样你仍然可以远程地运行 X11 程序或通过 ssh X11 隧道来使用它。
</p>
    
    <h2><a name="open">8.2 在 xterm 里面启动 Aqua 程序</a></h2>
      
      <p>
在 xterm（或其它 shell）里面启动 Aqua 程序的办法是使用 <code>open</code> 命令，一些例子：
</p>
      <pre>open /Applications/TextEdit.app
open SomeDocument.rtf
open -a /Applications/TextEdit.app index.html</pre>
      <p>
第二个例子用与那个文档关联的程序来打开那个文档，第三个例子则显式制定一个用来打开的程序。
</p>
    
    <h2><a name="copy-n-paste">8.3 拷贝和粘贴</a></h2>
      
      <p>
拷贝和粘贴一般来说可以在 Aqua 和 X11 环境之间进行。
但还有一些缺陷。
据说 Emacs 目前的选择中最好的。
不能 Classic 和 X11 之间拷贝和粘贴。
</p>
      <p>
秘诀在于要使用相应环境的方法。
要从 Aqua 拷贝文字到 X11，在 Aqua 里面使用 Cmd-C，然后把你要粘贴到的 X11 窗口选到最前面，然后使用"鼠标中键"，对于单键鼠标即 Option-鼠标键（这可以在 XDarwin 的偏好设定里面设置）去粘贴。
要从 X11 拷贝文字到 Aqua，简单地用鼠标在 X11 中选中文字，然后在 Aqua 中用 Cmd-V 粘贴。
</p>
      <p>
X11 系统实际上有几个单独的剪贴板（X11 中称为 "剪切缓冲区），有些程序会搞混应该使用哪一个。
对于 GNU Emacs 或 XEmacs，粘贴有些时候不成功就是因为这个原因。
<code>autocutsel</code> 这个程序会有帮助，因为它自动同步两个主要剪切缓冲区。
要运行它，安装 autocutsel Fink 软件包，并在你的 .xinitrc 中添加一行：
</p>
      <pre>autocutsel &amp;</pre>
      <p>
（要把它放在运行窗口管理器<b>之前</b>，否则它不会被运行！不要把它添加在末尾，那样它不会被运行）。
</p>
      <p>如果你使用苹果的 X11，你可以使用 Command-C 或 编辑-&gt;拷贝，就象一般的 mac 程序一样，来拷贝文本到剪贴板。不过，暂时你还不能用 Command-V 粘贴剪贴板里面的内容。</p>
    
  <? include_once "../../footer.inc"; ?>
