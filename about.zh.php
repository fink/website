<?
$title = "About";
$cvs_author = '$Author: michga $';
$cvs_date = '$Date: 2004/11/14 01:59:29 $';

include "header.inc";
?>


<h1>关于 Fink 的更多信息</h1>

<h2>什么是 Fink？</h2>

<p>
Fink 是一个把 Unix 上各种
<a href="http://www.opensource.org/">开放源码</a>软件带到 
<a href="http://www.opensource.apple.com/">Darwin</a> 和
<a href="http://www.apple.com/macosx/">Mac OS X</a> 平台上的项目。
因此，我们有两个主要目标。
首先，修改现有的开放源码软件使得它可以在 Mac OS X 上编译和运行
（这个过程称为移植）。
其次，使得我们的工作成果能够以方便和舒适的方式分发给普通用户使用，我们希望这种方式能够和 Linux 用户习惯的方式类似。（这个过程称为打包）。
本项目提供预编译的二进制安装包以及完全自动的从源代码编译系统。
</p>
<p>
要达到这个目标，Fink 依赖于
<a href="http://www.debian.org/">Debian</a> 项目建立的优秀软件包管理工具－<code>dpkg</code>，<code>dselect</code> 和 <code>apt-get</code>。
在它们之上，Fink 添加了自己的软件包管理器，名为 <code>fink</code> （奇怪！）。
你可以把 <code>fink</code> 看作一个编译引擎－它输入软件包描述并根据它输出二进制形式的  .deb 软件包。
这个过程中，它从互联网上下载原始的源代码文件，根据需要对它进行修正，然后进行完整的配置和构建软件包的过程。
最后，它把结果封装到一个可用被 <code>dpkg</code> 用于安装的软件包。
</p>
<p>
由于 Fink 建立在 Mac OS X 上，所以它有严格的策略来保证不会干扰基本系统。
结果是，Fink 管理一个独立的目录树并提供容易使用的架构。</p>


<h2>为什么使用 Fink？</h2>

<p>
有五个理由你应该使用 Fink 来安装 Unix 软件到你的 Mac上：
</p>

<p>
<b>强大。</b>
Mac OS X 仅包括了一套基本的命令行工具。
Fink 则带给你对这些工具的增强以及一套精选的为 Linux 和其它 Unix 变种开发的图形界面工具。
</p>

<p>
<b>方便。</b>
使用 Fink，整个编译过程是全自动的，你不再需要担心 Makefiles 或 configure 脚本以及它们（复杂）的参数。
依赖关系系统自动保证所需要的库都存在。
我们的软件包通常都配置为使用它们的最大功能集。
</p>

<p>
<b>安全。</b>
Fink 严格使用“互不影响”的策略，确保你的 Mac OS X 系统的关键部分不会被触及。
你可以随意升级 Mac OS X 而不用担心它会影响 Fink，反之亦然。
另外，软件包管理系统可以使得你安全地删除你不再需要的软件。
</p>

<p>
<b>清晰。</b>
Fink 不是一堆软件包的随意结合，它是一个清晰的发布系统。
所安装的文件被安装在一个可预知的位置。
文档清单被保持最新。
有一个一致的界面来控制服务器的处理过程。
另外，这一切都不需要你的干预。
</p>

<p>
<b>灵活。</b>
你只需要下载和安装你需要的程序。
Fink 可以让你按你喜欢的方式自由地选择安装 XFree86 或其它 X11 解决方案。
如果你根本不希望安装 X11，这也没有问题。
</p>


<p>
<a href="index.php?phpLang=zh">回到首页</a> -
<a href="download/index.php?phpLang=zh">我要下载</a>
</p>


<?
include "footer.inc";
?>
