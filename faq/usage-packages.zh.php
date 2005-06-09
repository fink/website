<?
$title = "常见疑问（F.A.Q.） - 使用（２）";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/06/09 21:34:45';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="prev" href="usage-general.php?phpLang=zh" title="一般性软件包使用问题">';


include_once "header.zh.inc";
?>
<h1>常见疑问（F.A.Q.） - 9. 特定软件包使用问题</h1>
  
    
    
    <a name="xmms-quiet">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.1: 在 XMMS 中我听不到声音。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
确定你在 XMMS 的 preferences 中选择了 "eSound Output Plugin"。
由于一些很奇怪的原因，它默认选择 disk writer 插件。
</p><p>
如果还不行或 XMMS 提示说找不到你的声卡，尝试这个办法：
</p><ul>
          <li>确定你没有在 Mac OS X 中把声音输出设定为静音状态。</li>
          <li>运行 <code>esdcat /usr/libexec/config.guess</code> （或任意一个有一定长度的文件）。
如果你能听到一些短的声音，eSound 工作正常，那么如果配置正确的话 XMMS 应该也可以工作。
如果你听不到任何声音，因为某种原因，esd 没有工作。
你可以尝试手工启动 <code>esd &amp;</code> 并观察消息的输出。
</li>
          <li>
如果还不行，检查
<code>/tmp/.esd</code> 和 <code>/tmp/.esd/socket</code> 文件的权限。
它们应该是被你的普通用户帐号所拥有。
如果它们不是由你拥有，杀掉运行中的 esd 进程，用 root 权限删除那些目录（<code>sudo rm -rf /tmp/.esd</code>），然后重新启动 esd
（作为普通用户，而不是 root）。
</li>
        </ul><p>
注意 esd 是设计为由普通用户运行，而不是 root。
它通常通过文件系统的套接字
<code>/tmp/.esd/socket</code>来通信。
如果你希望在网络上的另一台计算机上运行 esd 客户，你只需要添加 <code>-tcp</code> 和 <code>-port</code> 开关。
</p><p>还有一些报告说 XMMS 在 10.1 下会崩溃或挂掉。目前我们还没有分析或修正。</p></div>
    </a>
    <a name="nedit-window-locks">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.2: 在我用 nedit 编辑一个文件时，想要打开另外一个文件，但窗口出现了，却没有响应。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这是 <code>nedit</code> 和 <code>lesstif</code> 的当前版本在所有平台上的已知问题。暂时的办法时用 File--&gt;New 先打开一个窗口，然后打开你需要打开的另一个文件。</p><p>在 <code>nedit-5.3-6</code> 中这个问题得到修正，这个版本依赖于 <code>openmotif3</code> 而不是 <code>lesstif</code>。</p></div>
    </a>
    <a name="xdarwin-start">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.3: 求救！当我启动 XDarwin，它立刻就退出了！</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
不要惊慌。
现在《运行 X11》文档有专门一部分<a href="http://fink.sourceforge.net/doc/x11/trouble.php#immediate-quit">《故障排除》</a>针对这个常见问题。
</p></div>
    </a>
    <a name="no-server">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.4: 当我尝试启动 XDarwin 的时候，我碰到这个错误信息："xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH"。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 首先，确定你在你的 X 启动文件 <code>~/.xinitrc</code> 中引用了 init.sh 文件。</p><p>在 Jaguar 中，有时会构建了所有的 <code>xfree86</code> 软件包，但只有 <code>xfree86-base</code> 和 <code>xfree86-base-shlibs</code> 被安装了。检查时候已经安装了 <code>xfree86-rootless</code> 和 <code>xfree86-rootless-shlibs</code>。如果没有，运行 <code>fink install xfree86-rootless</code> 应该可以解决问题。</p><p>如果你都安装了它们，那么尝试 <code>fink rebuild xfree86-rootless</code>。如果还不行，检查是否有把 <code>/usr/bin/X11R6</code> 包括在你的 PATH 中。</p></div>
    </a>
    <a name="xterm-error">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.5: xterm 出现错误："dyld: xterm Undefined symbols: xterm undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib"。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这是因为使用了 10.1 版本的 XFree86 在 10.2 上。你需要升级到一个 10.2 的版本。</p><p>如果你使用 Fink <code>xfree86</code> 软件包，那么你不能用通常的办法升级（对于从源代码安装："<code>fink selfupdate-cvs ; fink update-all</code>"；对于从二进制安装：<code>fink selfupdate ; ; sudo apt-get update; sudo apt-get dist-upgrade</code>"）。</p><p>如果你用其它手段安装了 XFree86，你可以在 <a href="http://mrcla.com/XonX">XonX 网站</a>上找到更新的补丁。</p></div>
    </a>
    <a name="libXmuu">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.6: 当我启动 XFree86 时，出现错误："dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib" or "dyld: xinit can't open library: /usr/X11R6/lib/libXext.6.dylib"</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
你缺少一个应该由 <code>xfree86-base-(threaded)-shlibs</code> 安装的文件。你应该用 <code>fink reinstall xfree86-base-shlibs</code>来从源文件重新安装它（如果你使用线程化的 XFree86 软件包，那么应该是 <code>fink reinstall xfree86-base-threaded-shlibs</code>）或用 <code>sudo apt-get install --reinstall xfree86-base-shlibs</code> 从二进制安装。</p></div>
    </a>
    <a name="apple-x-bugs">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.7: 我已经安装了 Fink 的 XFree86，然后我把它换成苹果的 X11，现在一切都崩溃了！</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 首先，如果你以前安装了"线程化"的 Fink XFree86 软件包，你需要重新编译崩溃的软件。一些程序在编译的时候检测时候具有线程支持，然后从此以后就假设总是可以使用线程。 </p><p>第二，也许你碰上苹果的 X11 的一个软件缺陷。在写本文档的时候，已知由几个缺陷正在由苹果团队在修正。
 </p><p>如果你有与 Fink 没有直接联系的苹果 X11 的一般性问题，你可以访问<a href="http://www.lists.apple.com/x11-users">苹果 X11 官方讨论组</a>。他们还希望把缺陷<a href="http://developer.apple.com/bugreporter">提交到苹果软件缺陷报告</a>。
 </p></div>
    </a>
    <a name="apple-x-delete">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.8: 我希望苹果 X11 里面删除键和 XDarwin 中的作用一样。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 有些用户报告说 XDarwin 和苹果 X11 中删除键的行为不一样。这可以通过在恰当的 X 启动文件中添加几行来修正：</p><p>
          <b>.Xmodmap 里面：</b>
        </p><pre>keycode 59 = Delete</pre><p>
          <b>.Xresources 里面：</b>
        </p><pre>
xterm*.deleteIsDEL: true
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?
</pre><p>
          <b>.xinitrc 里面：</b>
        </p><pre>xrdb -load $HOME/.Xresources
xmodmap $HOME/.Xmodmap</pre><p></p></div>
    </a>
    <a name="gnome-two">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.9: 我从 GNOME 1.x 升级到 GNOME 2.x，现在<code>gnome-session</code> 不会打开一个窗口管理器。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 在 GNOME 1.x 下，<code>gnome-session</code> 自动调用 <code>sawfish</code> 窗口管理器；在 GNOME 2.x 下，你要在运行<code>gnome-session</code>之前在 <code>~/.xinitrc</code> 启动窗口管理器：</p><pre>...
exec metacity &amp;
exec gnome-session</pre></div>
    </a>
    <a name="apple-x11-no-windowbar">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.10: 我在 Panther 中升级到苹果 X11，现在看不到窗口的标题栏了。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 你还没有升级到与 Panther 一起提供的 X11 版本 "X11 1.0 - XFree86 4.3.0"。你可以在第三张光盘的 X11.pkg 安装 X11。</p></div>
    </a>
    <a name="apple-x11-wants-xfree86">
    
      <div class="question"><p><b><? echo FINK_Q ; ?>9.11: 我在 Panther 中安装了苹果的 X11，但 Fink 还要我安装 XFree86 或 X.org。</b></p></div>
      
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There are two possibilities to consider.</p><ul>
          <li>
            <b>You are installing from binaries:</b>
            <p>If you have a current version of <code>fink</code> (&gt;=0.18.3-1), typically what you need to do is reinstall the X11User package, since the installer application occasionally misses installing a file.  You may need to do this multiple times. Running</p>
	    <pre>fink list -i system-xfree86</pre>
	    <p>should show that the <code>system-xfree86</code> and <code>system-xfree86-shlibs</code> packages are installed. If reinstalling the X11User package doesn't work, then consult the <a href="#special-x11-debug">special debug</a> instructions, below.</p>
            <p>If you are running an earlier version of the <code>fink</code> package, then updating <code>fink</code> may solve your problem immediately, e.g. via</p>
            <pre>sudo apt-get update
sudo apt-get install fink</pre>
          </li>
          <li>
            <b>You are installing from source:</b>
	    <p>If you have a current version of <code>fink</code>, then typically this error means that you need to (re)install the X11SDK, which is <b>mandatory</b> if you want to build packages from source. It is on the Xcode CD, and is <b>not</b> installed by default. Even if you install XCode, the X11SDK is <b>not</b> installed by default. It has to be installed either with a custom Xcode install, or by clicking on the X11SDK pkg in the <code>Packages</code> folder of the XCode CD.</p>
	    <p>If you are still having problems, run </p>
            <pre>fink list -i system-xfree86  </pre>
            <p>It should show the <code>system-xfree86</code>, <code>system-xfree86-shlibs</code>, and <code>system-xfree86-dev</code> packages as installed.  If the <code>-dev</code> package is missing, reinstall the X11SDK, since sometimes the Apple Installer misses a file.  You may need to keep doing this.  If either of the other two are missing, then reinstall the X11User package (same reason).</p>
            <p>
              <b>Note for Jaguar (X11 beta 3) users</b>:  As you aren't using XCode, you need to have already downloaded a copy of the proper X11SDK package on your system.  Since X11 beta 3 is expired, its X11SDK package (as well as the X11User package) is no longer available for download.  You'll either have to restrict yourself to installing X11 applications via the binary distribution, install XFree86 or X.org, or update to Panther.</p>
            <p>If you are running a version of <code>fink</code> prior to 0.17 then you should update
          <code>fink</code>, e.g. via a </p>
            <pre>fink selfupdate</pre>(assuming that you have either CVS or rsync updating turned on and aren't just using point releases).<p>If you're still having problems, then consult the <a href="#special-x11-debug">special debug</a> instructions, below.</p>
          </li>
        </ul></div>
      
    </a>
    <a name="wants-xfree86-on-upgrade">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.12: 我从 10.2 的 Fink 版本转到 10.2-gcc3.3 或 10.3 的版本，我已经安装了苹果的 X11，但 Fink 要我安装 XFree86 或 X.org。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 你需要删除其中的一个旧的占位虚拟软件包：
        <code>system-xfree86</code>，
        <code>system-xfree86-42</code>，或
        <code>system-xfree86-43</code>。
        Fink 现在会发现你已经安装了一个 X11，比如苹果的版本，并产生相应的虚拟软件包。
        因为其它软件包会依赖于 <code>system-xfree86</code>，你需要使用命令：</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43</pre><p> 来删除那些过时的版本。你可以运行</p><pre>fink list -i system-xfree86</pre><p>来检查你的安装情况。</p><p>and checking to see that the <code>system-xfree86</code> and <code>system-xfree86-shlibs</code> packages are present.  If you installed the X11SDK, then you should also see <code>system-xfree86-dev</code>.</p><p>如果还有问题，请参考前面<a href="#apple-x11-wants-xfree86">《Fink 要求安装 XFree86 到 10.3》</a>这两部分。</p></div>
    </a>
    
    <a name="special-x11-debug">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.13: I'm still having problems with X11 and Fink.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If the hints in the  <a href="#apples-x11-wants-xfree86">Fink tries to install XFree86 or X.org</a> or <a href="#wants-xfree86-on-upgrade">X11 and upgrade from 10.2</a> entries don't help, or aren't applicable to your situation, you may need to flush out your X11 installation and remove any old placeholders and partially/fully installed X11-related packages:</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg
fink selfupdate; fink index</pre><p>(the first line may give you warnings about trying to remove nonexistent packages).  Then, reinstall Apple's X11 (and the X11SDK, if needed), or an alternative X11 implementation, like XFree86 or X.org.</p><p>If you are still having problems and you are running
        <code>fink-0.19.0</code> or later then you can run</p><pre>fink-virtual-pkgs --debug</pre><p>to get information about what's missing.</p><p>If you are running an earlier version of <code>fink</code>, then
        there is a Perl script (courtesy of Martin Costabel) that you can
        download and run to get the same information.</p><ul>
          <li>Get it here: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
          </li>
          <li>Save it wherever you like.</li>
          <li>Run it in a terminal window via <pre>perl fink-x11-debug</pre>
          </li>
        </ul></div>
    </a>
    
  
<? include_once "../footer.inc"; ?>


