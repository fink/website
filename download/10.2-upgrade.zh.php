<?php
$title = "Binary Upgrade Instructions for Mac OS X 10.2";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>


<h1>Mac OS X 10.2 下二进制安装升级指南</h1>

<p>
本文介绍如何在 Mac OS X 10.2 下升级 Fink 的二进制安装，
包括 Fink 官方二进制发布版，版本 0.3.x 或更新。
</p>
<p>升级过程有几个步骤：
</p>
<ol>

<li><p>过去正确的 apt 软件包。
下载
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.5.0a/main/binary-darwin-powerpc/base/apt_0.5.4-7_darwin-powerpc.deb">apt-0.5.4-7</a>
和
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.5.0a/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-7_darwin-powerpc.deb">apt-shlibs-0.5.4-7</a>
软件包。
在终端程序窗口，进入你下载这些文件的文件夹里面，运行这些命令：
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-7_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-7_darwin-powerpc.deb</pre>
<p>
（如果你使用 bash 作为你的 shell 程序，则应该把第一条命令换成 ". /sw/bin/init.sh"）
</p>
</li>
<li><p>
安装 apt 后，使用这些命令升级 apt 和你已经安装的软件包：
</p>
<pre>sudo apt-get update
sudo apt-get dist-upgrade
fink scanpackages
sudo apt-get update
sudo apt-get install storable-pm</pre>
</li>

<li><p>最后，用下面的命令升级软件包描述：
</p>
<pre>sudo touch /sw/fink/stamp-rel-0.3.0
fink selfupdate</pre>
</li>

</ol>



<?php
include "footer.inc";
?>
