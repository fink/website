<?php
$title = "Source Release Download";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2019/01/19 10:11:12 $';

include "header.inc";
?>

<h1>下载 Fink 源代码版本</h1>
<!--AKH 2007-05-31.  Fix when we have a release tarball that works with OS > 10.4.9
<p>
源代码版本包括 fink 软件包管理器，软件包描述文件和补丁。
它会从原始的发布下载站点下载源代码并在你的计算机上构建好它们。
</p>
-->
<!-- start translation -->
<p>The source tarball contains the <em>fink</em> package manager.  After you have installed it, you will be able to get package descriptions and patches.  It will use these to download the source code from the original distribution sites or the Fink project's mirrors and build them on your local machine.</p>
<!-- end translation -->
<?php 
include "../fink_version.inc";
?>
<!--
<p>
Fink <?php print $fink_version; ?> 已经于 
<?php print $release_date; ?> 正式发布。
</p>
-->
<p><em>fink-0.28.0</em> 已经于 2007-11-02 正式发布。</p>
<ul>
<li><a href="https://downloads.sourceforge.net/fink/fink-0.28.0.tar.gz">fink-0.28.0</a> - 1308K, .tar.gz format</li>
</ul>

<p>
<!-- <b>重要提示：</b>
不要使用 StuffIt 来解压本压缩档，它会破坏一些文件名。
请使用命令行 <tt>tar</tt> 工具。
有关使用指南请参阅安装文档。 -->

<!-- start translation -->
You will also need to install the Xcode Tools (c.f. <a href="./index.en.php" >the Quick Start page</a>).</p>
  <p>Unpack the tar.gz archive if this hasn't been done automatically, e.g. via</p>
<pre>tar -xvzf fink-0.28.0.tar.gz</pre>

<p>in a terminal window.  Then, in a terminal window, change to the resulting <em>fink-0.28.0</em> directory, and use</p>
<pre>./bootstrap</pre>
<p>to start the boostrapping operation, which will install the Fink base setup.</p>
<p>After you have installed <em>fink</em> and the other base packages, the commands</p>
<pre>fink selfupdate-rsync</pre>
<p>or</p>
<pre>fink selfupdate-git</pre>

<p>will download the package description files and patches.</p>
<!-- end translation -->

<p>在发布的压缩档里面包括了安装和使用指南。
请阅读它们－Fink 不是那种“一点即用”的软件。
README，INSTALL 和 USAGE 三个文件以纯文本（供命令行阅读）和 HTML （供使用浏览器阅读和打印）方式提供。
它们也可以在网上：<a
href="../doc/index.php">文档部分</a>获得。
</p>
<!-- start translation -->
<p>After you have installed <em>fink</em> and the other base packages, the commands</p>
<pre>fink selfupdate-rsync</pre>
<p>or</p>
<pre>fink selfupdate-git</pre>
<p>will download the package description files and patches.</p>
<!-- end translation -->
<p>
要通知新版本发布消息，请订阅 <a
href="../lists/fink-announce.php">fink-声明 邮件列表</a>.
</p>


<?php
include "footer.inc";
?>
