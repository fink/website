<?
$title = "运行 X11 - 安装 X11";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/06/10 00:51:23';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="运行 X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=zh" title="启动 X11"><link rel="prev" href="history.php?phpLang=zh" title="历史">';


include_once "header.zh.inc";
?>
<h1>运行 X11 - 3. 获取和安装 X11</h1>
    
    
    <h2><a name="fink">3.1 通过 Fink 安装</a></h2>
      
      <p>
Fink 可以让你以你喜欢的方式安装 X11，
不过它也提供自己的 XFree86 软件包。如果你使用 <code>fink install ...</code>，它会下载源代码，并在你的计算机上进行编译。如果你使用 <code>apt-get install ...</code> 或 <code>dselect</code> 前端工具，它会下载预编译的二进制包，类似官方的
XFree86 发行版。
</p>

<p><b>General notes:</b></p>
<ul><li>All of the X11 packages currently available via Fink support both full-screen and rootless
operation, and have OpenGL support.</li>
<li><b>Important note:</b>  Files get moved around between X11 releases.  This frequently means that if you try to downgrade your X11 installation, you will find that binaries (executable programs, etc.) won't work anymore.  You'd have to rebuild any such packages.
<p>You can go the other way though:  packages built vs an older X11 generally work on a later one.</p>
<p>For 10.3, the X11 hierarchy is as follows:</p>
<pre>xorg &gt; xfree86 &gt; Apple's X11 </pre>
</li></ul>
<p><b>10.3 users:</b></p>
<p>You can install version 4.3.99.16-2 (that which is in the current binary distribution) or 4.4 (which is available from source).  You will need both the <code>xfree86</code> and <code>xfree86-shlibs</code> packages to have a fully functional installation.</p>
<p>You can also install the X.org X11 release (currently version 6.8) via the <code>xorg</code> and <code>xorg-shlibs</code> packages in the unstable tree.  This X11 flavor is similar to XFree86-4.4, but includes some bugfixes and new features, and removes some code with a disputed license.</p>

<p><b>10.2 users:</b></p>
<p>10.2 users may install version 4.3 via source or binary, and 4.4 from the unstable tree.  As above, you'll install <code>xfree86</code> and <code>xfree86-shlibs</code>.
</p>
      <p>XFree86 4.2.1.1 is also available for 10.2, in <code>normal</code> and <code>-threaded</code> flavors (later X11s all have threading support), though it is considered to be obsolete. The <code>xfree86-base</code>, <code>xfree86-base-shlibs</code>, <code>xfree86-shlibs</code>, and <code>xfree86-rootless-shlibs</code> packages (or their <code>-threaded</code> counterparts must all be installed for you to have a working XFree86 setup.  In addition, you may need to install the <code>xfree86-base-dev</code> and <code>xfree86-rootless-dev</code> packages (or their <code>-threaded</code> equivalents) to keep Fink from trying to install a newer version.</p>
<p><b>10.1 users:</b></p>
<p>You can install version 4.2.0 from the binary distribution (only).  You will install <code>xfree86-base</code> and <code>xfree86-rootless</code>.</p>
    
    
    <h2><a name="apple-binary">3.2 苹果公司的二进制版本</a></h2>
      
      <p>
2003 年 1 月 7 日，苹果发布了<a href="http://www.apple.com/macosx/x11/">一个基于 XFree86-4.2 的 X11 定制实现</a>，它包括 Quartz 渲染和加速的 OpenGL。2003 年 2 月 10 日发布了补充更多特性和修正缺陷的新版本。第三个版本（Beta 3）2003 年 3 月 17 日，它包括更多的特性和缺陷修正。这个版本可以运行在 Juguar 上。
</p>
      <p>2003 年 10 月 24 日，苹果发布了 Panther (10.3)，包括了它们 X11 的发布版本。这个版本基于 XFree86-4.3。</p>
      <p>2005 年 4 月 29 日，苹果发布了 Tiger (10.4)，包括了它们 X11 的发布版本。这个版本基于 XFree86-4.4。</p>
      <p>
要使用苹果的二进制版本，你需要安装 <b>X11 User</b> 软件包，你还需要
<a href="http://fink.sourceforge.net/doc/users-guide/upgrade.php">更新</a> Fink。</p>
      <p>在 <code>fink-0.16.2</code>下，你需要安装 <b>X11 SDK</b> 软件包。这样以后，Fink 才可以创建 <code>system-xfree86</code> 虚拟软件包。</p>
      <p>在 <code>fink-0.17.0</code> 或更新版本下，只有你需要从源程序编译软件包才必须安装 X11 SDK 。这种情况下，即使你没有安装 SDK，仍然会有 <code>system-xfree86</code> 和 <code>system-xfree86-shlibs</code> 虚拟软件包，后者表示共享函数库。如果你安装了 SDK，那么还会有一个
<code>system-xfree86-dev</code> 软件包，代表头文件。
</p>
      <p>
如果你已经安装了 XFree86，无论是否通过 Fink 安装，你都可以<a href="inst-xfree86.php?phpLang=zh#switching-x11">用一个 X11 软件包来替换另一个</a>。确定你删除了现有的软件包，然后安装苹果的 X11（如果需要的话，还包括 X11 SDK）。
</p>
      <p>
关于使用苹果 X11 的一些注意事项：
</p>
      <ul>
        <li>
          <p><code>autocutsel</code> 软件包已经不在需要。如果正在使用启动这个功能的 X11，你应该关闭它。</p>
        </li>
        <li>
          <p>苹果的 X11 使用你现有的 <code>~/.xinitrc</code> 文件。如果你希望全功能的 Quartz 集成，你应该使用 <code>/usr/X11R6/bin/quartz-wm</code>
作为你的窗口管理器，或者删除 <code>~/.xinitrc</code> 文件。</p>
          <p>如果你只需要拷贝粘贴支持，但希望使用另外一个窗口管理器，你可以按照下面的例子做：</p>
          <pre>/usr/X11R6/bin/quartz-wm --only-proxy &amp;
exec /sw/bin/fvwm2</pre>
          <p>当然，你也可以使用其它的窗口管理器，<code>startkde</code>，等等。</p>
        </li>
        <li>
          <p>
            <code>quartz-wm</code> 不完全支持 Gnome/KDE 窗口管理管器的一些提示参数，所以你可能会看到一些本不应该有边框的窗口会有边框。</p>
        </li>
        <li>
          <p>默认情况下，苹果的 X11 不理会 Fink 的环境变量设置。为了启动你通过 fink 安装的程序（例如窗口管理器，gnome-session，其它在
<code>/sw/bin</code> 下的应用程序），把下面移行放在 <code>~/.xinitrc</code> 文件比较靠前的地方（比如，在最初的 "<code>#!/bin/sh</code>" 的这一行之后，但在运行其它程序以前）：</p>
          <pre> . /sw/bin/init.sh</pre>
          <p>这样 Fink 的环境就被初始化了。注意：我们使用 <code>init.sh</code> 文件而不是 <code>init.csh</code> 文件是因为<code>.xinitrc</code> 是使用 <code>sh</code> 来做解释器，而不是 <code>tcsh</code>。</p>
        </li>
        <li>
          <p>有些程序需要调用 Fink 目录下的其它程序，如果这些程序是通过应用程序菜单启动的话，还需要另外的专门处理。而不仅仅是使用全路径名这个简单。例如：</p>
          <pre>/sw/bin/emacs</pre>
          <p>如果你使用 bash 作为你的默认 shell 程序，你需要象下面这样设置：</p>
          <pre>. /sw/bin/init.sh ; emacs</pre>
          <p>如果你用 tcsh：</p>
          <pre>source /sw/bin/init.csh ; emacs</pre>
          <p>这个确保程序有一个正确的 PATH 环境。你可以对任何 Fink 安装的程序使用这个语法。</p>
        </li>
        <li>
          <p>如果你尝试手工编译一个需要和苹果的 X11 连接的软件包，并且看到类似下面的错误：</p>
          <pre>ld: err.o illegal reference to symbol: _XSetIOErrorHandler 
defined in indirectly referenced dynamic library 
/usr/X11R6/lib/libX11.6.dylib</pre>
          <p>那么你需要在你的连接选项中使用 <code>-lX11</code>。检查你的软件的配置选项，看如何给它添加额外的连接参数。</p>
        </li>
        <li>
          <p>如果你原来使用 <code>xfree86</code> 软件包，后来又转到苹果的 X11 （无论是 10.2.x 还是 10.3.x 上），任何连接到 <code>xfree86</code> 的软件包都需要重新编译，因为他们并不二进制兼容。</p>
        </li>
        
        <li>
          <p><b>10.3 and 10.4 users only:</b>  It is possible to use Apple's display server and window manager on top of XFree86 or X.org.  If you install the <code>applex11tools</code> package, Fink will install what you need, as long as you have a copy of X11User.pkg.</p>
        </li>
        
      </ul>
      
      <p>For more information on using Apple's X11, check out this <a href="http://developer.apple.com/darwin/runningx11.html">article</a> at the Apple Developer Connection.</p>
      
    
    <h2><a name="official-binary">3.3 官方二进制版本</a></h2>
      
      <p>
XFree86 项目又一个针对 XFree86 4.5.0。
你可以在你本地的 <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 镜像站点</a>中的<code>4.5.0/binaries/Darwin-ppc-6.x</code> (<code>4.5.0/binaries/Darwin-ppc-6.x</code> for 10.1) 目录中找到它。
一定要同时下载 <code>Xprog.tgz</code> 和 <code>Xquartz.tgz</code>
这两个压缩档，虽然它们被标为可选的。
如果你不知道你需要些什么，那么可以下载整个目录。
以 root 权限运行 <code>Xinstall.sh</code> 脚本来进行安装。
（在安装之前，你也许要阅读一下<a href="http://www.xfree86.org/4.5.0/Install.html">官方指南</a>）。</p>

      <p>你现在都拥有了一个 XFree86 软件包，其中包括一个可以在 OS X 下支持全屏幕或无根模式的服务器程序。
</p>
    
    <h2><a name="official-source">3.4 官方源代码版</a></h2>
      
      <p>
如果你有时间可花的话，你可以用源代码构建 XFree86 4.5。
你可以在你本地的 <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86 镜像站点</a>的<code>4.5.0/source</code>目录中找到它们。
获取一共三个的 <code>X420src-#.tgz</code> 压缩档，并把它们解压到相同的一个目录里面。
你可以把一些宏定义放到 XFree86 的源代码树的 <code>config/cf/host.def</code> 文件里面，来自己定制构建方式。

查看
<code>config/cf/darwin.cf</code> 文件来获得一些提示。
（注意：只有那些被 #ifndef 包围的宏才可以被 host.def 文件所重定义。）
</p>
      <p>
当你对你的配置满意以后，使用下面指令编译和安装 XFree86：
</p>
      <pre>make World
sudo make install install.man</pre>
      <p>要升级到 4.2.1.1，请按照<a href="#official-binary">官方二进制版</a>部分的指引。</p>
      <p>要安装 4.3.0，按照上面的指引，把 "2" 替换成 "3"，但是不要做 4.2.1.1 的升级步骤。</p>
      <p>
和安装官方二进制版一样，你现在已经拥有了一个 XFree86 软件包，其中包括一个可以在 OS X 下支持全屏幕或无根模式的服务器程序。
</p>
    
    <h2><a name="latest-cvs">3.5 最新的源代码</a></h2>
      
      <p>
如果你不但有时间，还有坚强的神经的话，你可以从公开的 CVS 库里面获取最新的开发过程中的 XFree86 源代码。
注意，代码是处于持续开发过程中的，因此，你今天下载的内容不一定和你昨天下载的相同。
</p>
      <p>
要安装，按照 <a href="http://www.xfree86.org/cvs/">XFree86
CVS</a> 中的办法下载 <code>xc</code> 模块。然后，按照上面的从源代码构建的办法进行。
</p>
    
    

<h2><a name="switching-x11">3.6 替换 X11</a></h2>
      
      <p>
如果你已经安装了一个 Fink X11 软件包，但由于某个原因你希望删除它，换成另外一个。操作过程很简单。首先你需要牵制删除旧的安装包，然后安装新的，保持你的 dpkg 数据库的一致性。
</p>
      <p>
有两个办法这样做：
</p>
      <ol>
        <li>
          <p>使用 FinkCommander</p>
          <p>
   如果你使用<a href="http://finkcommander.sourceforge.net/">FinkCommander</a>，你可以从菜单里面进行强制删除。例如，如果你安装了 <code>xfree86-rootless</code>，但希望改用线程化的版本，你可以选择 <code>xfree86-rootless</code>，
   <code>xfree86-rootless-shlibs</code>，<code>xfree86-base</code> 和
   <code>xfree86-base-shlibs</code> 软件包，然后选择菜单：
  </p>
          <pre>Source -&gt; Force Remove</pre>
        </li>
        <li>
          <p>在命令行手工删除</p>
          <p>
   要手工删除，你可以使用带 --force-depends 参数的 <code>dpkg</code> 命令，象这样：
  </p>
          <pre>sudo dpkg -r --force-depends xfree86-rootless\ 
xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
          <p>
   如果你有需要使用线程化 XFree86 的程序，那么删除它并安装另外一个 XFree86 软件包会有问题。
  </p>
        </li>
      </ol>
      <p>如果，你有一个不是由 Fink 安装的 X11，你需要在命令行删除它：</p>
      <pre>sudo rm -rf /usr/X11R6 /etc/X11</pre>
      <p>上面办法应该对任何不是通过 Fink 安装的 X11 都有效。根据你安装的版本不同，你还需要删除 <code>XDarwin.app</code> 或 
<code>X11.app</code>。如果你删除的是苹果的 X11，那么检查你的 <code>.xinitrc</code> 文件，确定你运行的窗口管理器不是 <code>quartz-wm</code>。你现在可以安装你喜欢的 X11 变种，手工或通过 Fink。</p>
    
    <h2><a name="fink-summary">3.7 Fink 软件包简介</a></h2>
      
      <p>
一个关于安装选项和你应该安装的 Fink 软件包的归纳：
</p>
      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Install Type</th><th align="left">Fink packages</th></tr><tr valign="top"><td>XFree86-4.4.0 or 4.5.0 (10.3 and 10.4)</td><td>
            <p>
              <code>xfree86</code> and <code>xfree86-shlibs</code>
            </p>
          </td></tr><tr valign="top"><td>X.org-6.8.2 (10.3 and 10.4)</td><td>
	    <p><code>xorg</code> and <code>xorg-shlibs</code></p>
	</td></tr><tr valign="top"><td>Apple's X11 (all versions)</td><td>
            <p>
              <code>system-xfree86</code> and <code>system-xfree86-shlibs</code> (+<code>system-xfree86-dev</code> for building X11-based packages)</p>
          </td></tr><tr valign="top"><td>XFree86-4.x official binaries</td><td>
            <p>
	      <code>system-xfree86</code> and <code>system-xfree86-shlibs</code> (+<code>system-xfree86-dev</code> for building X11-based packages)
            </p>  
          </td></tr><tr valign="top"><td>XFree86-4.x built from source, or from the latest CVS source</td><td>
            <p>
	      <code>system-xfree86</code> and <code>system-xfree86-shlibs</code> (+<code>system-xfree86-dev</code> for building X11-based packages)
              </p>
          </td></tr><tr valign="top"><td>XFree86-4.2.1.x (10.2 only) or 4.2.0 (10.1 only)</td><td>
             <p><code>xfree86-base</code> and <code>xfree86-rootless</code> (and their <code>-shlibs</code>)</p>
            <p>or <code>xfree86-base-threaded</code> and <code>xfree86-rootless-threaded</code> (and <code>-shlibs</code>)</p>
          </td></tr></table>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=zh">4. 启动 X11</a></p>
<? include_once "../../footer.inc"; ?>


