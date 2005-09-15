<?
$title = "Source Release Download";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2005/09/15 01:56:35 $';

include "header.inc";
?>

<h1>下载 Fink 源代码版本</h1>

<p>
源代码版本包括 fink 软件包管理器，软件包描述文件和补丁。
它会从原始的发布下载站点下载源代码并在你的计算机上构建好它们。
</p>
<? 
include "../fink_version.inc";
?>

<p>
Fink <? print $fink_version; ?> 已经于 
<? print $release_date; ?> 正式发布。

</p>
<ul>
<!-- start translation -->
<li><a
href="http://prdownloads.sourceforge.net/fink/fink-<? print $fink_version; ?>-full-XCode-2.1.tar.gz">Fink
<? print $release_version; ?></a> (for OS X 10.4 with XCode 2.1)
- 6241K, .tar.gz format</li>
<!-- end translation -->
</ul>

<p>
<b>重要提示：</b>
不要使用 StuffIt 来解压本压缩档，它会破坏一些文件名。
请使用命令行 <tt>tar</tt> 工具。
有关使用指南请参阅安装文档。
</p>

<p>
在发布的压缩档里面包括了安装和使用指南。
请阅读它们－Fink 不是那种“一点即用”的软件。
README，INSTALL 和 USAGE 三个文件以纯文本（供命令行阅读）和 HTML （供使用浏览器阅读和打印）方式提供。
它们也可以在网上：<a
href="../doc/index.php">文档部分</a>获得。
</p>
<p>
要通知新版本发布消息，请订阅 <a
href="../lists/fink-announce.php">fink-声明 邮件列表</a>.
</p>


<?
include "footer.inc";
?>
