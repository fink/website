<?
$title = "打包";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2004/07/21 18:45:15';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="打包 Contents"><link rel="next" href="intro.php?phpLang=zh" title="介绍">';


include_once "header.zh.inc";
?>
<h1>创建 Fink 软件包</h1>
<p>
本手册记录如何创建 Fink 软件包管理的软件包描述文件。
它还提供关于 Fink 发布的一些规则和指引。
描述文件格式和发布规则都在不断完善中，所以请查看"最后修改"信息和 CVS 标记来检查是否更新。
你现在阅读的是用于 fink 0.9.0 开发版软件包管理器之后的描述文件和规则。
</p>
<p>
如果你打算为 Fink 创建软件包，你可以订阅
<a href="http://lists.sourceforge.net/lists/listinfo/fink-devel">fink-devel</a>
邮件列表。
如果你希望帮助 Fink 项目，而你在这方面又有专长，你可以考虑选择接受一个
<a href="http://fink.sourceforge.net/pdb/nomaintainer.php">尚未有维护人员的软件包。</a>
</p>
<h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=zh"><b>1 介绍</b></a><ul><li><a href="intro.php?phpLang=zh#def1">1.1 什么是软件包？</a></li><li><a href="intro.php?phpLang=zh#ident">1.2 识别一个软件包</a></li></ul></li><li><a href="format.php?phpLang=zh"><b>2 软件包描述文件</b></a><ul><li><a href="format.php?phpLang=zh#trees">2.1 文件树结构</a></li><li><a href="format.php?phpLang=zh#format">2.2 文件格式</a></li><li><a href="format.php?phpLang=zh#percent">2.3 百分号展开</a></li></ul></li><li><a href="policy.php?phpLang=zh"><b>3 打包相关规则</b></a><ul><li><a href="policy.php?phpLang=zh#licenses">3.1 软件包授权协议</a></li><li><a href="policy.php?phpLang=zh#prefix">3.2 避免干扰基本系统</a></li><li><a href="policy.php?phpLang=zh#sharedlibs">3.3 共享函数库</a></li><li><a href="policy.php?phpLang=zh#perlmods">3.4 Perl 模块</a></li><li><a href="policy.php?phpLang=zh#emacs">3.5 Emacs 规则</a></li></ul></li><li><a href="fslayout.php?phpLang=zh"><b>4 文件系统布局</b></a><ul><li><a href="fslayout.php?phpLang=zh#fhs">4.1 文件系统层次结构标准</a></li><li><a href="fslayout.php?phpLang=zh#dirs">4.2 目录</a></li><li><a href="fslayout.php?phpLang=zh#avoid">4.3 应该避免的事情</a></li></ul></li><li><a href="reference.php?phpLang=zh"><b>5 操作手册</b></a><ul><li><a href="reference.php?phpLang=zh#build">5.1 构建过程</a></li><li><a href="reference.php?phpLang=zh#fields">5.2 字段</a></li><li><a href="reference.php?phpLang=zh#splitoffs">5.3 剥离分支(SplitOffs)</a></li><li><a href="reference.php?phpLang=zh#scripts">5.4 脚本</a></li><li><a href="reference.php?phpLang=zh#patches">5.5 补丁</a></li><li><a href="reference.php?phpLang=zh#profile.d">5.6 Profile.d 脚本</a></li></ul></li></ul><!--Generated from $Fink: packaging.zh.xml,v 1.14 2004/07/21 18:45:15 dmacks Exp $-->
<? include_once "../../footer.inc"; ?>


