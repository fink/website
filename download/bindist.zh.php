<?
$title = "Binary Release Download";
$cvs_author = '$Author: jeff_yecn $';
$cvs_date = '$Date: 2004/03/02 03:24:11 $';

include "header.inc";
?>

<h1>下载 Fink 二进制发布版本</h1>

<p>
Fink 的二进制发布版本可以节省你在自己机器上进行编译的时间。
在使用安装软件安装了基本系统以后，你可以使用 dselect 和 apt-get 工具从本站下载其它预编译好的二进制软件包。
只有一部分软件包有二进制形式提供；
其它只能通过源代码版本从源代码编译安装。
这主要是因为受影响（缺少）的软件具有一些法律上的问题。
</p>
<? 
include "../fink_version.inc";
?>
<p>
<b>当前状态：</b>
Fink <? print $fink_version; ?> 的二进制安装版本已经发布。
本安装版本是完整的。
</p>
<ul>
<li><a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Installer.dmg?download">Fink
<? print $fink_version; ?> 基本安装</a> - <? print $dmg_size; ?>，压缩的 .dmg 磁盘映象</li>
<li><a href="http://prdownloads.sourceforge.net/fink/direct_download/">查看发布档</a>－这里可以查看到二进制软件包及对应源程序文件。</li>
</ul>
<p>
目前文档还不是很充足。
安装磁盘映象中包括一些说明文件（Fink ReadMe.rtf），以及一份初步的 Fink 用户指南。
你可以在本站的<a
href="../doc/index.php">文档部分</a>找到更多的资料。
</p>
<p>
要收到新版本的通知，可以订阅 <a
href="../lists/fink-announce.php">fink-声明 邮件列表</a>.
</p>


<?
include "footer.inc";
?>
