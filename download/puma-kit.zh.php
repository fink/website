<?php
$title = "Upgrade Kit for Mac OS X 10.1";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:38 $';

include "header.inc";
?>


<h1>Mac OS X 10.1 升级工具箱</h1>

<p>
由于旧版本的 apt 不能在 Mac OS X 10.1 下使用，下面是一些升级现有的二进制安装的 Fink 特殊步骤。
</p>
<p>
一个很类似的步骤可以用于升级非常古老的 Fink 0.2.x 安装（包括 MacGIMP 和 OpenOSX 的 GIMP
CD 的第一版）。
唯一的要求是 Fink 是安装在 <tt>/sw</tt> 目录而不是其它地方。
参见<a href="#oldversion">下面</a>。
</p>

<h2>Fink 0.3.0 或更新</h2>

<p>
从版本 0.3.0 开始，Fink 已经完全与 Mac OS X 10.1 兼容。
因此你不需要做什么特别的操作。
</p>

<h2>Fink 0.2.4 至 0.2.6</h2>

<p>
本过程假设你使用官方二进制安装程序安装 Fink。
第一个这样的程序是基于 Fink 0.2.4。
操作过程有三个主要步骤：
</p>
<ol>

<li><p>获取合用的 apt 软件。
下载
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
和
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>
软件包。
在终端程序窗口，进入你下载的文件所在的目录，并运行下面命令：
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb</pre>
<p>
（如果你使用 bash 作为你的 shell 程序，第一行需要换成 source /sw/bin/init.sh）
</p>
<p>
安装 apt 以后，使用下面的命令更新软件包清单：
</p>
<pre>rehash
fink scanpackages
sudo apt-get update</pre>
</li>

<li><p>升级基本软件包。
很重要一点是要安装有最新的软件包管理工具，
你系统里面现有的已经过期了。
</p>
<pre>sudo apt-get install base-files gettext dpkg fink</pre>
</li>

<li><p>更新你系统的其余部分。你可以通过 <tt>dselect</tt>（推荐方式）<b>或</b>使用这个 apt 命令：
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>

<h2><a name="oldversion">Fink 0.2.3 或更早</a></h2>

<p>
本过程假设你已经安装了一个很旧的 Fink 版本（通常是0.2.1），你可能是把它作为象 MacGIMP
安装程序或 OpenOSX 的 GIMP 安装程序的一部分安装到你系统上的。
这个过程分为四步：
</p>
<ol>

<li><p>获取合用的 apt 和 fink 软件。
下载
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt_0.5.4-4_darwin-powerpc.deb">apt-0.5.4-4</a>
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-4_darwin-powerpc.deb">apt-shlibs-0.5.4-4</a>
和
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.4.1/main/binary-darwin-powerpc/base/fink_0.10.0-1_darwin-powerpc.deb">fink-0.10.0-1</a>
软件包
（是的，这个版本号是真实的。Fink 软件包里面的 <tt>fink</tt> 命令的版本与 Fink 发行版的版本号是相互独立的）。
在终端程序窗口，进入你下载的文件所在的文件夹，运行下面命令以安装软件：
</p>
<pre>sudo dpkg -i apt-shlibs_0.5.4-4_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-4_darwin-powerpc.deb
sudo dpkg -i fink_0.10.0-1_darwin-powerpc.deb</pre>
<p>
安装好以后，使用这些命令来升级软件包清单：
</p>
<pre>rehash
fink scanpackages
sudo apt-get update</pre>
</li>

<li><p>升级其它基础软件包。
很重要的一件事是你已经安装了最新的软件包管理工具，
你系统里面的现有版本可能会有很多缺陷，或太旧而无法处理现有的软件包版本。
</p>
<pre>sudo apt-get install base-files gettext dpkg</pre>
</li>

<li><p>分离出 X11。
在下一步操作之前，你需要分离出 X11 的依赖关系。
对于 MacGIMP 和 OpenOSX 的软件包，你有一个“手工”的 XFree86 安装（在 Fink 看来如此），所以你需要安装 <code>system-xfree86</code> 软件包：
</p>
<pre>sudo apt-get install system-xfree86</pre>
<p>
如果软件包显示你的 XFree86 安装版本太旧，你应该首先升级它，然后再次运行上面的命令。
</p>
</li>

<li><p>升级系统的其余部分。
你可以用 <tt>dselect</tt>（推荐方式）<b>或</b>使用这个 apt 命令：
</p>
<pre>sudo apt-get dist-upgrade</pre>
</li>

</ol>


<?php
include "footer.inc";
?>
