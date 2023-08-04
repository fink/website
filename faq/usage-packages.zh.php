<?php
$title = "常见疑问（F.A.Q.） - 使用（２）";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="prev" href="usage-general.php?phpLang=zh" title="一般性软件包使用问题">';


include_once "header.zh.inc";
?>
<h1>常见疑问（F.A.Q.） - 9. 特定软件包使用问题</h1>
  
    
    
    <a name="xmms-quiet">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.1: 在 XMMS 中我听不到声音。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
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
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.2: 在我用 nedit 编辑一个文件时，想要打开另外一个文件，但窗口出现了，却没有响应。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 这是 <code>nedit</code> 和 <code>lesstif</code> 的当前版本在所有平台上的已知问题。暂时的办法时用 File--&gt;New 先打开一个窗口，然后打开你需要打开的另一个文件。</p><p>在 <code>nedit-5.3-6</code> 中这个问题得到修正，这个版本依赖于 <code>openmotif3</code> 而不是 <code>lesstif</code>。</p></div>
    </a>
    <a name="xdarwin-start">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.3: 求救！当我启动 XDarwin，它立刻就退出了！</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
不要惊慌。
现在《运行 X11》文档有专门一部分<a href="/doc/x11/trouble.php#immediate-quit">《故障排除》</a>针对这个常见问题。
</p></div>
    </a>
    <a name="no-server">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.4: 当我尝试启动 XDarwin 的时候，我碰到这个错误信息："xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH"。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 首先，确定你在你的 X 启动文件 <code>~/.xinitrc</code> 中引用了 init.sh 文件。</p><p>在 Jaguar 中，有时会构建了所有的 <code>xfree86</code> 软件包，但只有 <code>xfree86-base</code> 和 <code>xfree86-base-shlibs</code> 被安装了。检查时候已经安装了 <code>xfree86-rootless</code> 和 <code>xfree86-rootless-shlibs</code>。如果没有，运行 <code>fink install xfree86-rootless</code> 应该可以解决问题。</p><p>如果你都安装了它们，那么尝试 <code>fink rebuild xfree86-rootless</code>。如果还不行，检查是否有把 <code>/usr/bin/X11R6</code> 包括在你的 PATH 中。</p></div>
    </a>

    <a name="apple-x-delete">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.5: 我希望苹果 X11 里面删除键和 XDarwin 中的作用一样。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 有些用户报告说 XDarwin 和苹果 X11 中删除键的行为不一样。这可以通过在恰当的 X 启动文件中添加几行来修正：</p><p>
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
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.6: 我从 GNOME 1.x 升级到 GNOME 2.x，现在<code>gnome-session</code> 不会打开一个窗口管理器。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 在 GNOME 1.x 下，<code>gnome-session</code> 自动调用 <code>sawfish</code> 窗口管理器；在 GNOME 2.x 下，你要在运行<code>gnome-session</code>之前在 <code>~/.xinitrc</code> 启动窗口管理器：</p><pre>...
exec metacity &amp;
exec gnome-session</pre></div>
    </a>
    <a name="apple-x11-no-windowbar">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.7: 我在 Panther 中升级到苹果 X11，现在看不到窗口的标题栏了。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 你还没有升级到与 Panther 一起提供的 X11 版本 "X11 1.0 - XFree86 4.3.0"。你可以在第三张光盘的 X11.pkg 安装 X11。</p></div>
    </a>
    <a name="apple-x11-wants-xfree86">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.8: I'm having problems with X11 and Fink.</b></p></div>
      
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> There are two possibilities to consider.</p><ul>
          <li>
            <b>You are installing from binaries:</b>
            <p>Typically what you need to do is reinstall the X11User package,
	    since the installer application occasionally misses installing a file.
	    You may need to repeat this multiple times. Running</p>
	    <pre>fink list -i system-xfree86</pre>
	    <p>should show that the <code>system-xfree86</code> and
	    <code>system-xfree86-shlibs</code> packages are installed, and</p>
	    <pre>fink list x11</pre>
	    <p>should indicate that the <code>x11-shlibs</code> and <code>x11</code> virtual
	    packages are present.</p>
	    <p>If reinstalling the X11User package doesn't work, then consult the
	    <a href="#special-x11-debug">special debug</a> instructions,
	    below.</p>
          </li>
          <li>
            <b>You are installing from source:</b>
	    <p>Typically this error means that you need to (re)install the X11SDK,
	    which is <b>mandatory</b> if you want to build packages from source.
            It is in the Xcode Tools folder of a Tiger DVD, or (Optional
            Installs/)Xcode Tools/Packages on your Leopard DVD(s). If you
            run</p>
            <pre>fink list -i system-xfree86  </pre>
            <p>it should show the <code>system-xfree86</code>,
	    <code>system-xfree86-shlibs</code>, and <code>system-xfree86-dev</code>
	    packages as installed.  If the <code>-dev</code> package is missing,
	    reinstall the X11SDK, since sometimes the Apple Installer misses a
	    file.  You may need to keep doing this.  If either of the other two
	    are missing, then reinstall the X11User package (same reason).  At
	    this point</p>
	    <pre>fink list x11</pre>
	    <p>should indicate that the <code>x11-dev</code>, <code>x11-shlibs</code>,
	    and <code>x11</code> virtual packages are present.</p>
	    <p>If reinstalling the X11SDK or X11User package doesn't work, then consult the
	    <a href="#special-x11-debug">special debug</a> instructions,
	    below.</p>
           </li>
        </ul></div>
    </a>
    
    
    <a name="special-x11-debug">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.9: I'm still having problems with X11 and Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> If the hints in the  <a href="#apple-x11-wants-xfree86">Fink tries to install XFree86 or X.org</a> or <a href="#wants-xfree86-on-upgrade">X11 and upgrade from 10.2</a> entries don't help, or aren't applicable to your situation, you may need to flush out your X11 installation and remove any old placeholders and partially/fully installed X11-related packages:</p><p>On Leopard, use</p><pre>
sudo pkgutil --forget com.apple.pkg.X11User
sudo pkgutil --forget com.apple.pkg.X11SDKLeo
</pre><p>Then, on either 10.4 or 10.5, run</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg
fink selfupdate; fink index</pre><p>(the first line may give you warnings about trying to remove
	nonexistent packages).  Then, reinstall Apple's X11 (and the X11SDK, if
	needed), or,
	if you're on 10.4, an alternative X11 implementation, like XFree86 or X.org.</p><p>If you are still having problems then you can run</p><pre>fink-virtual-pkgs --debug</pre><p>to get information about what's missing.</p><p>If you are running an earlier version of <code>fink</code>, then
        there is a Perl script (courtesy of Martin Costabel) that you can
        download and run to get the same information.</p><ul>
          <li>Get it here: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
          </li>
          <li>Save it wherever you like.</li>
          <li>Run it in a terminal window via <pre>perl fink-x11-debug</pre>
          </li>
        </ul></div>
    </a>
    <a name="tiger-gtk">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.10: After updating to Tiger (OS 10.4), whenever I use a GTK app, I get errors involving <code>_EVP_idea_cbc</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> This is caused by an apparent bug in Tiger's dynamic linker (current as of 10.4.1).  You can work around this via prefixing the the name of you want as follows:
</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>E.g., if you want to use <code>gnucash</code>, you'd use</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>This method works for applications that are launched via the Application Menu in Apple's X11 as well as a terminal.</p><p>You may find it preferable to set this globally (e.g. in your startup script, and/or in your <code>.xinitrc</code> , which you may need to do to run GNOME).  Put</p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>in your <code>.xinitrc</code> (regardless of your login shell) or your <code>.profile</code> (or other startup script) for <b>bash</b> users and:</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>is the corresponding command to use in e.g. your <code>.cshrc</code> file for <b>tcsh</b> users.</p><p>This will automatically be set if you install 
<code>base-files-1.9.7-1</code> or later.</p></div>
    </a>
    <a name="yelp">
    	<div class="question"><p><b><?php echo FINK_Q ; ?>9.11: I can't get the help to work for any GNOME application.</b></p></div>
	<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> You need to install the <code>yelp</code> package.  This package was not placed within the GNOME bundle because it uses cryptography, and it was decided not to place all of GNOME in the crypto tree just to use the help system.</p></div>
    </a>
    
  
<?php include_once "../footer.inc"; ?>


