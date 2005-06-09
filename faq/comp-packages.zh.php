<?
$title = "常见疑问（F.A.Q.） - 编译（２）";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/06/09 21:34:45';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="usage-general.php?phpLang=zh" title="一般性软件包使用问题"><link rel="prev" href="comp-general.php?phpLang=zh" title="一般性编译问题">';


include_once "header.zh.inc";
?>
<h1>常见疑问（F.A.Q.） - 7. 编译问题－特定软件包</h1>
    
    
    <a name="libgtop">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.1: 一个软件包构建失败，错误和 <code>sed</code> 有关。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 如果你的登录脚本（例如 <code>~/.cshrc</code>）向终端输出了些信息，比如 "<code>echo Hello</code>" 或 <code>xttitle</code>，可能会导致这个错误。要消除这个问题，最简单的办法是注释掉这些行。</p><p>如果你想保留这些回显信息，你可以这样做：</p><pre>if ( $?prompt) then
echo Hello
endif</pre></div>
    </a>
    <a name="cant-install-xfree">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.2: 我想改用 Fink　的 XFree86 软件包，但我不能安装 <code>xfree86-base</code> 或 <code>xfree86</code>，因为它和 <code>system-xfree86</code> 冲突。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 很不幸，各种 X11 都不可避免地要安装在 /usr/X11R6 中。因此 Fink 的 <code>xfree86-base</code> 和 <code>xfree86-rootless</code> 软件包也需要安装在那里。不过，由于 Fink 不会删除任何没有在它数据库里面的文件，它不会自动替换非 Fink 安装的 X11。</p><p></p><p>下面是应该怎么做：</p><p></p><p>
          <b>注意：安装了新版（0.16.2 或更新）Fink 的 10.2.x 用户和 10.3.x 的用户应该跳过下面的步骤 1（事实上，他们也做不了步骤 1）。</b>
        </p><p>1. 删除 <code>system-xfree86</code>。如果你暂时还没有依赖于 X11 的软件包，这很简单。但通常情况是，已经安装了需要依赖于 X11 的软件包。如果不想全部删除他们，你可以使用：</p><pre>sudo dpkg --remove --force-depends system-xfree86</pre><p>来进行删除，而保持其它软件包仍然存在。如果你没有安装 <code>system-xfree86</code>，那么跳到步骤 3。</p><p>2. 手工删除所有 XFree86。可以这么做：</p><pre>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</pre><p>如果你正在使用的是苹果的 X11，同时也删除 X11 程序。</p><p>3. 要获取 XFree86-4.2.1，用通常的办法安装 Fink 的 <code>xfree86-base</code> 和 <code>xfree86-rootless</code> 软件包：对使用源代码安装的用户　"<code>fink install</code>"；对二进制安装的用户 "<code>apt-get install</code>" 或 <code>dselect</code>。</p><p>或</p><p>3a. 要获取 XFree86-4.3.x 或更高版本，使用 "fink install xfree86" 安装 Fink 的 <code>xfree86</code> 软件包，最新版本(2004年5月25日的 XFree86-4.4.x 版本)目前还没有二进制安装版发布，而且仅有未稳定的版本[参阅 <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">how to install unstable package</a>]。</p></div>
    </a>
    <a name="change-thread-nothread">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.3: 怎么把 Fink 的 XFree86 从非线程化的版本改为线程化的版本（或相反）？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 如果你正在使用 Fink 版本的 XFree86，并且你希望在线程化或非线程化的版本之间转换，你需要手工删除旧的版本，你可以用下面的命令行命令实现：</p><pre>
sudo dpkg -r --force-depends xfree86-base
sudo dpkg -r --force-depends xfree86-shlibs
sudo dpkg -r --force-depends xfree86-rootless
sudo dpkg -r --force-depends xfree86-rootless-shlibs
	</pre><p>或者删除线程化的版本：</p><pre>
sudo dpkg -r --force-depends xfree86-base-threaded
sudo dpkg -r --force-depends xfree86-shlibs-threaded
sudo dpkg -r --force-depends xfree86-rootless-threaded
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs
	</pre><p>FinkCommander 也可以删除软件包。在源代码版本窗口，选择一个软件包，然后在 <code>Source Menu</code> 使用 "<code>Force Remove</code>"。</p><p>如果你正在使用 system-xfree86，查看前面关于删除它的问题。</p><p>安装你需要的 xfree86 版本：</p><p>
          <code>xfree86-base</code> 和 <code>xfree86-rootless</code>
        </p><p>
          <code>xfree86-base-threaded</code> 和 <code>xfree86-rootless-threaded</code>
        </p><p>你可以使用通常的办法：对源代码安装用户 "<code>fink install</code>"；对二进制安装用户 "<code>apt-get install</code>" or <code>dselect</code> 。</p></div>
    </a>
    <a name="cctools">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.4: "当我安装 KDE 的时候，我碰到下面的信息：'Can't resolve dependency "cctools (&gt;= 446-1)"'</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这个晦涩的消息表明你需要安装 December 2002 开发工具。</p></div>
    </a>
  
    
    <a name="libiconv-gettext">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.5: I can't update <code>libiconv</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you get errors of the form:</p><pre>libtool: link: cannot find the library `/sw/lib/libiconv.la'</pre><p>you can solve this problem by running</p><pre>fink remove gettext-dev
fink install libiconv</pre></div>
    </a>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=zh">8. 一般性软件包使用问题</a></p>
<? include_once "../footer.inc"; ?>


