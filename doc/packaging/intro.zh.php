<?php
$title = "打包 - 介绍";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2024/11/12 10:05:32';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="打包 Contents"><link rel="next" href="format.php?phpLang=zh" title="软件包描述文件"><link rel="prev" href="index.php?phpLang=zh" title="打包 Contents">';


include_once "header.zh.inc";
?>
<h1>打包 - 1. 介绍</h1>




<h2><a name="def1">1.1 什么是软件包？</a></h2>
<p>
软件包是一个以原子状态（也就是说，它不可以被分割成更细小的可独立存在软件）存在的一个软件。
典型的软件包包括一个可执行的程序，必须的数据文件，供国际化和文档使用的消息目录。
在 Fink 中，软件包有两种形式：软件包描述文件和可安装二进制软件包文件。
</p>
<p>
软件包描述文件是一个可阅读的纯文本文件，它包括了构建一个软件包（即，创建二进制软件包文件）所需要的全部信息。
信息包括：元数据（比如软件包的名字，它的作用等），源代码的下载网址和应该如果配置，编译，封装软件包的指引。
描述文件可以还会附有一个补丁文件。
</p>
<p>
二进制软件包文件是一个构成软件包的实际文件的压缩档。这些实际文件包括可执行程序，数据文件，信息目录，函数库，头文件等等。
这种软件包问题还会包括软件包的一些元数据。
安装一个二进制软件包的过程主要就是解压缩而已，因为它实际上已经出于立刻可以使用的状态了。
由于 Fink 构建在 dpkg 软件包管理器上，二进制软件包文件采用 dpkg 的文件格式并具有 .deb 的扩展名。
</p>



<h2><a name="ident">1.2 识别一个软件包</a></h2>
<p>
一个软件包由三个字串来标识：软件包名，版本号和修订版号。
他们均由小写字母（a-z），数字（0-9），减号（-; note: not allowed in the revision），加号（+）以及句点（.）组成。不允许使用其它的字符。
特别地，不能使用大写字母和下划线。
</p>
<p>
软件包名就是软件的名称，例如：openssh。
版本号，也称为上游版本号，是原始软件包的版本标识号。
在版本号中可以使用字母，例如：2.9p1。
fink 和 dpkg 都知道如何正确地给它们排序。
修订版号是一个递增的反映软件包描述被修改的计数。
它从 1 开始递增，让上游版本号发生改变以后，又回到 1 重新开始。
修订版号不可以包括减号。
完整的软件包名称是它们三项的连接，中间用减号分隔，例如：openssh-2.9p1-2。
</p>


<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="format.php?phpLang=zh">2. 软件包描述文件</a></p>
<?php include_once "../../footer.inc"; ?>


