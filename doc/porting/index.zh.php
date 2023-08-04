<?php
$title = "移植";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2014/10/25 09:21:47';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="移植 Contents"><link rel="next" href="basics.php?phpLang=zh" title="基本知识">';


include_once "header.zh.inc";
?>
<h1>移植 Unix 软件到 Darwin 和 Mac OS X 上</h1>
		<p>本文档包含如何移植 Unix 软件到 Darwin 和 Mac OS X 平台上的提示。
		这里的信息适用于 Mac OS X 10.0.x 和 Darwin 1.3.x。
		这两种操作系统我们都用 Darwin 来指代，因为 Mac OS X 实际上只是 Darwin 的一个超集。</p>
	<h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="basics.php?phpLang=zh"><b>1 基本知识</b></a><ul><li><a href="basics.php?phpLang=zh#heritage">1.1 Darwin 的来历</a></li><li><a href="basics.php?phpLang=zh#compiler">1.2 编译器和工具</a></li><li><a href="basics.php?phpLang=zh#host-type">1.3 主机类型</a></li><li><a href="basics.php?phpLang=zh#libraries">1.4 函数库</a></li><li><a href="basics.php?phpLang=zh#other-sources">1.5 其它信息来源</a></li></ul></li><li><a href="shared.php?phpLang=zh"><b>2 共享代码</b></a><ul><li><a href="shared.php?phpLang=zh#lib-and-mod">2.1 共享库和可加载模块对比</a></li><li><a href="shared.php?phpLang=zh#version">2.2 版本编号</a></li><li><a href="shared.php?phpLang=zh#cflags">2.3 编译器标志</a></li><li><a href="shared.php?phpLang=zh#build-lib">2.4 构建一个共享库</a></li><li><a href="shared.php?phpLang=zh#build-mod">2.5 构建一个模块</a></li></ul></li><li><a href="libtool.php?phpLang=zh"><b>3 GNU libtool</b></a><ul><li><a href="libtool.php?phpLang=zh#situation">3.1 有关情况</a></li><li><a href="libtool.php?phpLang=zh#patch-135">3.2 1.3.5 补丁</a></li><li><a href="libtool.php?phpLang=zh#fixing-14x">3.3 修正 1.4.x</a></li><li><a href="libtool.php?phpLang=zh#notes">3.4 更多注解</a></li></ul></li><li><a href="preparing-10.2.php?phpLang=zh"><b>4 为 10.2 做准备</b></a><ul><li><a href="preparing-10.2.php?phpLang=zh#bash">4.1 bash shell</a></li><li><a href="preparing-10.2.php?phpLang=zh#gcc3">4.2 gcc3 编译器</a></li></ul></li><li><a href="preparing-10.3.php?phpLang=zh"><b>5 为 10.3 做准备</b></a><ul><li><a href="preparing-10.3.php?phpLang=zh#perl">5.1 Perl</a></li><li><a href="preparing-10.3.php?phpLang=zh#typedef">5.2 New symbol definitions</a></li><li><a href="preparing-10.3.php?phpLang=zh#system-libs">5.3 New builtin system libraries</a></li></ul></li><li><a href="preparing-10.4.php?phpLang=zh"><b>6 为 10.4 做准备</b></a><ul><li><a href="preparing-10.4.php?phpLang=zh#perl">6.1 Perl</a></li><li><a href="preparing-10.4.php?phpLang=zh#typedef">6.2 New symbol definitions</a></li><li><a href="preparing-10.4.php?phpLang=zh#system-libs">6.3 New builtin system libraries</a></li></ul></li></ul>
<!--Generated from $Fink: porting.zh.xml,v 1.9 2014/10/25 09:21:47 gecko2 Exp $-->
<?php include_once "../../footer.inc"; ?>


