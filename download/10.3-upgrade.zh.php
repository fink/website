<?
$title = "Upgrade Instructions for Mac OS X 10.3";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2004/11/26 09:27:54 $';

include "header.inc";
?>


<h1>Mac OS X 10.3 下升级指南</h1>

<p>现在可以升级 Fink 以全面利用 gcc 3.3 编译器的特性，或着在 10.3 下使用。源代码安装用户和二进制安装用户都可以进行升级，不过，目前二进制版本要远比源代码版本稳定和可靠。
</p><p>
如果你希望进行升级（以源代码方式），而且你以前曾经安装苹果公司的 June 2003 版开发工具升级，你需要在升级 Fink 前安装 August 2003 版开发工具升级，或者在 10.3 下，确定已经从 XCode 光盘安装 XCode 工具。
</p><p>
运行 "fink selfupdate" 应该可以执行升级的操作。最新版本的 fink 软件包管理器应该可以自动检测到你的 OS X 和 gcc 版本，并自动进行相应调整。
</p><p>
如果你希望在 10.3 系统上进行全新的安装，我们推荐
<a href="http://fink.sourceforge.net/download/srcdist.php">从源代码开始建立最初环境</a>，并从 fink 站点的
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">sourceforge 
下载页</a>中的 fink-full-0.6.1.tar.gz 开始安装。你需要 XCode 来进行安装。
</p><p>
注意如果你已经有 Fink 版本 0.15.0 或更高，你不再需要安装 system-xfree86。Fink 可以自动检测你的 system-xfree86 版本，如果你还没有安装任何 fink x11 软件包。如果你现在安装有任何类型旧的 system-xfree86 软件包，请运行下面的命令：
</p>
<pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43; fink selfupdate; fink index</pre>
<p>
Fink 团队仍然在努力使（全部）Fink 软件包可以 10.3 下面运行，虽然许多许多已经可以运行了。</p>

<?
include "footer.inc";
?>
