<?
$title = "运行 X11 - 启动 X11";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:57';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="运行 X11 Contents"><link rel="next" href="xtools.php?phpLang=zh" title="Xtools"><link rel="prev" href="inst-xfree86.php?phpLang=zh" title="获取和安装 X11">';


include_once "header.zh.inc";
?>
<h1>运行 X11 - 4. 启动 X11</h1>
    
    
    <h2><a name="darwin">4.1 Darwin</a></h2>
      
      <p>
在纯 Darwin 环境下，XFree86 和其它 Unix 环境的使用基本一样。
通常的启动方式是在控制台运行 <code>startx</code>； 
这会启动服务器程序可一些最初的客户程序，例如窗口管理器和一个运行 shell 的终端模拟程序。
在纯 Darwin 中，不需要指明任何参数，只需要输入：
</p>
      <pre>startx</pre>
      <p>
你可以通过你自己主目录中的几个文件来定制需要启动什么。
<code>.xinitrc</code> 控制什么客户程序会被启动。
<code>.xserverrc</code> 可以控制服务器程序的选项，甚至启动一个不同的服务器。
如果你碰到麻烦（比如，只有一个空白的屏幕或退回了控制台），你可以通过把这些文件暂时移开来确定问题所在。
当 <code>startx</code> 找不到这些文件的时候，它会使用安全的默认设置，一般这时候应该能正常工作。
</p>
      <p>
另外的办法是，你可以直接通过一个 XDMCP 选项直接启动服务器，象这样：
</p>
      <pre>X -query remotehost</pre>
      <p>
关于它的详细信息请查看 <code>Xserver</code> 的手册页面。
</p>
      <p>
最后，可以有些选项设置 <code>xdm</code>；请阅读它的手册页面获取详细信息。
</p>
      <p>
注意：如果你使用 Mac OS X Panther 之前的版本，你可以在登录窗口输入 <code>&gt;console</code>　来获得一个和纯 Darwin 环境等效的纯文本控制台。如果你在登录窗口看不到输入用户的地方，你可以按下随便一个用户名的第一个字母，然后按 Option+Return 组合键。
然后，你可以使用上面描述的启动方法，除了 <code>xdm</code> 作为一个例外。
</p>
<p>如果你运行的是 Panther or later，你不能从控制台窗口启动 XFree86。</p>
    
    <h2><a name="macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></h2>
      
      <p>
基本上，在 Mac OS X 下启动 XFree86 有两种办法。
一种办法是在你<code>应用程序</code>中双击 <code>XDarwin.app</code> 程序图标。在启动过程中会有一个对话框让你选择是全屏幕模式还是无根模式。你可以在偏好设定对话框中设定总是使用你选择模式并禁用选择对话框。  
</p>
      <p>
在 4.2.0 之前，它会自动启动全屏幕模式，没有办法通过双击程序来进入无根模式。
</p>
      <p>
另外一种在 Mac OS X 中启动 XFree86 的办法是在<code>终端程序</code>中运行
<code>startx</code>。
如果你用这种办法启动服务器程序，你必须告诉它应该与 Quartz 并行使用。
这可以通过使用 <code>-fullscreen</code> 参数，比如：
</p>
      <pre>startx -- -fullscreen</pre>
      <p>
这会以全屏幕模式启动服务器，以及你的 <code>.xinitrc</code> 文件里面的客户程序。  
</p>
      <p>
注意，在 4.2 之前，使用 <code>-quartz</code> 参数来进入全屏幕模式。
</p>
      <p>
你可以用 <code>-rootless</code> 参数用无根模式启动：</p>
      <pre>startx -- -rootless</pre>
      <p>
<code>-quartz</code> 选项不再选择全屏幕模式，而是使用偏好设定里面的默认设置。
</p>
      <p>对于 4.3，如果不带参数地使用 <code>startx</code>，会显示启动对话框。</p>
    
    
    <h2><a name="starting-xorg">4.3 Starting X.org</a></h2>
      
     <p>X.org works identically to XFree86 in all respects.</p>
    
    <h2><a name="starting-apples-x11">4.4 Starting Apple's X11</a></h2>
      
       <p>
	Functionally, Apple's X11 works similarly to XFree86 (e.g. using a <code>.xinitrc</code> file to control the clients that are launched on startup).  The normal way to run it is by double-clicking the <code>X11.app</code> icon (whose default location is <code>/Applications/Utilities</code>).  You can use <code>startx</code>, as well, but it doesn't have a commmand-line option to set the display mode; <code>X11.app</code> will start up in whatever mode was previously set in its Preferences.</p>
<p>If you don't set up a different window manager you will be running Apple's <code>quartz-wm</code> window manager.  <b>X11.app</b>'s Preferences give the option to switch between fullscreen and rootless modes without restarting.  However, this doesn't work for quartz-wm; it is necessary to choose a different window manager (e.g. in <code>.xinitrc</code>)</p>
    
    <h2><a name="applex11tools">4.5 The applex11tools package</a></h2>
      
      <p>Fink's <code>applex11tools</code> package allows the use of <code>X11.app</code> and <code>quartz-wm</code> under OS 10.3 and later with XFree86 4.4 or later or X.org.</p>
      <p>To install this package you must enable the <a href="http://www.finkproject.org/faq/usage-fink.php#unstable">unstable tree</a>, and have <code>X11User.pkg</code> somewhere within <code>/Users</code> or <code>/Volumes</code>.  <code>X11.app</code> will be installed in the <code>Applications</code> folder within your Fink tree.  You can now use either <code>X11.app</code>  or <code>XDarwin.app</code>.</p>

    
    <h2><a name="xinitrc">4.6 .xinitrc 文件</a></h2>
      
      <p>
如果在你的主目录中有一个 <code>.xinitrc</code> 文件，它可以用于启动一些最初的 X 客户程序，比如，窗口管理器，或者一些 xterm 终端或象 GNOME 这样的桌面环境。<code>.xinitrc</code> 文件实际上是包括一些命令 shell 脚本。
<b>不</b> 需要把通常的 <code>#!/bin/sh</code> 放在第一行和把这个文件设为可执行；xinit 知道怎么在 shell 里面运行它。
</p>
      <p>
如果在你的主目录里面没有 <code>.xinitrc</code> 文件，X11 会使用它的默认文件，
<code>/private/etc/X11/xinit/xinitrc</code>。
你可以使用这个默认文件作为你自己的 .xinitrc 文件的一个起点：
</p>
      <pre>cp /private/etc/X11/xinit/xinitrc ~/.xinitrc</pre>
      <p>
如果你使用 Fink，你可以在文件的开头使用 source <code>init.sh</code>
来确保环境被正确设置。
</p>
      <p>
虽然原则上你可以在 <code>.xinitrc</code> 中使用任意命令，但是还是有些需要注意的地方。
首先，解释这个文件的 shell 默认情况下会等待一个程序执行完毕才会执行下一个程序。
因此，如果你希望同时运行多个程序，你需要告诉 shell 应该"在后台"运行他们。这可以通过在一行命令的末尾加一个 <code>&amp;</code> 号来实现。
</p>
      <p>
第二，<code>xinit</code> 会等待 <code>.xinitrc</code>
脚本执行完，然后认为 "这个部分已经执行完毕，现在我应该关闭 X 服务器了"。
这意味着你的 <code>.xinitrc</code> 文件里面的最后一个命令一定不能是后台运行的，而且它应该是一个一直运行的程序。
一般情况下，窗口管理器正好可以用于这个用途。
事实上，多数窗口管理器会假设 <code>xinit</code> 在等待它结束运行，并以此来作为它们菜单里面"注销"功能的工作原理。
（注意：为了节省一些内存和 CPU 的消耗，你可以象下面的例子一样在最后一条命令前加上
<code>exec</code>。）
</p>
      <p>

A simple example that starts up GNOME on XFree86 or Xorg:

</p>
      <pre>. /sw/bin/init.sh
exec gnome-session</pre>
      <p>
一个稍微复杂一点的针对 bash 用户的例子会关闭 X11 响铃，启动一些客户程序，最后运行 Enlightenment 窗口管理器：
</p>
      <pre>. /sw/bin/init.sh

xset b off

xclock -geometry -0+0 &amp;
xterm &amp;
xterm &amp;

exec enlightenment</pre>



<p>To start GNOME 2.4 and later under Apple's X11:</p>

 <pre>. /sw/bin/init.sh
quartz-wm --only-proxy &amp;
exec gnome-session
</pre>
 
<p>在苹果的 X11 下启动 KDE 3.2 (版本大于 3.2.2-21)：</p>
<pre>. /sw/bin/init.sh
export KDEWM=kwin
quartz-wm --only-proxy &amp;
/sw/bin/startkde &lt;/tmp/kde.log 2&lt;&amp;1
</pre>

<p>最后，在苹果的 X11 下启动最新的非稳定版 KDE：</p>
<pre>. /sw/bin/init.sh
/sw/bin/startkde &lt;/tmp/kde.log 2&lt;&amp;1
</pre>
    
    
    <h2><a name="oroborosx">4.7 OroborOSX</a></h2>
    
    <p><a href="http://oroborosx.sourceforge.net">OroborOSX</a> is a an alternative to the X11.app and XDarwin display servers.  It requires a preexisting X11 installation to work.  <code>X11.app</code> or <code>XDarwin.app</code> continue to function, as well</p>
    <p>When run, <b>OroborOSX</b> starts its own rootless-only window manager, and doesn't read in either the system's <code>xinitrc</code> or user's <code>.xinitrc</code> files.  After starting, it does have a menu option to execute <code>.xinitrc</code>.  However, it does have its own method to set up applications to run when it starts.
It also provides a mechanism to start X11 applications from the Finder via startup scripts.</p>  
<p>For more information visit the <a href="http://oroborosx.sourceforge.net">OroborOSX homepage</a>.</p>
    
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="xtools.php?phpLang=zh">5. Xtools</a></p>
<? include_once "../../footer.inc"; ?>


