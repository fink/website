<?php
$title = "用户指南 - 介绍";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:17';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="用户指南 Contents"><link rel="next" href="install.php?phpLang=zh" title="首次安装"><link rel="prev" href="index.php?phpLang=zh" title="用户指南 Contents">';


include_once "header.zh.inc";
?>
<h1>用户指南 - 1. 介绍</h1>
    
    
    <h2><a name="what">1.1 Fink 是什么？</a></h2>
      
      <p>
Fink 是 OS X 和 Darwin 上的开放源代码的 Unix 软件。
它给你的 Mac 带来种类众多的 Linux 和其他类似系统上开发的免费命令行及图形界面软件。
</p>
    
    <h2><a name="req">1.2 系统要求</a></h2>
      
      <p>
任何情况下你都需要：
</p>
      <ul>
        <li>
          <p>
安装了 Mac OS X 10.2 或以上的系统，或着相对应的 Darwin 版本。
两者的更早版本<b>不能</b>使用。
后面有关于支持系统的更多信息。
</p>
        </li>
        <li>
          <p>
互联网访问。
要安装的源代码或可执行安装包都需要从互联网下载站点进行下载。
</p>
        </li>
      </ul>
      <p>
如果你需要使用源代码发布的版本（详见底下），你还需要：
</p>
      <ul>
        <li>
          <p>

Developer tools.  
On Mac OS X, install the Developer.pkg package from the Developer
Tools (known as XCode for 10.3 and 10.4) CD (they're on the main DVD for OS 10.4), or <a href="http://connect.apple.com">download</a> the latest version--this is often desirable, as later versions frequently fix issues (though admittedly sometimes they break things).    
Note that the tools must match your Mac OS X version.
On Darwin, the tools should be present in the default install.

</p>
          <p>
即使你不打算从源代码编译安装软件，安装开发工具仍然是个很好的主意。
开发工具包安装的一些程序实际上是一些通用的命令行工具。
后面你要安装的一些软件包可能需要有他们才可以运行。
</p>
        </li>
        <li>
          <p>
耐心。
编译一些大的软件包需要花比较长时间。
我这里指的是按小时或者甚至是按天计算的时间。
</p>
        </li>
      </ul>
    
    <h2><a name="supported-os">1.3 支持的操作系统</a></h2>
      
      
      <p><b>Mac OS X 10.4</b> is the leading-edge platform, and is considered to be <q>fully supported and tested</q>, though as a newer operating system there are still some issues.  Most of the developers run it, and those who are running 10.3 have 10.4 users test their work. Note, however, that
fink on intel hardware is still considered to be of <b>beta</b> quality.</p>
      <p>
        <b>Mac OS X 10.3</b> is is considered to be <q>fully supported and tested</q>, although there may still be stray compile problems with single packages. Many of the developers run it, and those who don't have 10.3 users test their work.
</p>
      <p><b>Mac OS X 10.2</b> is still supported to some extent.  Fink 0.6.4 is the last distribution to suppport this OS.</p>
      
      <p>
        <b>Mac OS X 10.1</b> 在某种程度仍然被支持。
你只能运行 Fink 0.4.1，在它上面没有更新的版本。
</p>
      <p>
Darwin 8.x 是与 Mac OS X 10.4 对应的 Darwin 版本，
而 Darwin 7.x 是与 Mac OS X 10.3 对应的 Darwin 版本，
而 <b>Darwin 6.x</b> 则是与 Mac OS X　10.2 相应的版本。
总体来讲它们都可以使用，但没有经过非常详细的测试。因为多数人都只是在 Mac OS X 上运行。
对于一些使用了 OS X 专有特性的软件你可能会碰到问题 —— 受影响的软件包包括 XFree86，可能也包括 esound。
</p>
    
    <h2><a name="src-vs-bin">1.4 源代码与二进制安装包的对比</a></h2>
      
      <p>
软件是用人们可阅读的编程语言来编写（"开发"）而成的；这种形式称为 "源代码"。
要使得计算机能够真正运行它，它必须转换为一种底层的机器指令代码（对多数人来说，这些代码是不可读的）。
这个转换过程称为 "编译" 经过转换后的程序称为　"可执行" 或 "二进制"程序。
（这个过程有时候也称为 "构建"，因为实际上它还包括除编译以外的其它步骤）。
</p>
      <p>
当你购买商业软件的时候，你不会看到源代码。这些公司甚至把它当作商业机密。
你只能获得一个已经可以运行的可执行程序，这意味着你没有办法修改程序，甚至没有办法知道它在运行过程究竟做了什么事情。
</p>
      <p>
对于 <a href="http://www.opensource.org/">开放源码</a>
软件（简称开源软件）则不是这样。
顾名思义，它的源代码是公开给任何人查看和修改的。
事实上，对多数的开源软件的作者只是以源代码方式发布他们的作品，你需要在你自己的计算机上进行编译以后才可以使用。</p>
      <p>
Fink 可以让你自己在两种方式中间选择。
使用 "源代码" 发行版本的话，你将现在原始的源程序，并在上面应用 OS X 和 Fink 的编译规则，然后在你的机器上进行编译。
整个过程是全自动的，但是会花较长的时间。
使用 "二进制" 发行版本的话，你将下载从 Fink 站点下载已经编译好的软件包进行安装，这可以节省你自己编译的时间。
事实上也可以按照你的需要混合这两种方式。
本指南的其余部分将介绍如何做到这一点。
</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="install.php?phpLang=zh">2. 首次安装</a></p>
<?php include_once "../../footer.inc"; ?>


