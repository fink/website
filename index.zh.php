<?
$title = "Home";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2005/09/15 01:55:29 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, 一个 Mac OS X 和 Darwin 上的 Unix 软件发布系统">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, 软件, 发布, Fink">
';

include dirname(__FILE__) . "/header.inc";
?>

<p>
Fink 项目希望把 Unix 上各种<a href="http://www.opensource.org/">开放源码</a>软件带到
<a href="http://www.opensource.apple.com/">Darwin</a> 和
<a href="http://www.apple.com/macosx/">Mac OS X</a> 平台上。
我们通过修改 Unix 软件使得它可以在 Mac OS X 上编译和运行（“移植”）,并提供一个方便的分发系统使得每个人都可以下载和使用它。
Fink 使用 <a href="http://www.debian.org/">Debian</a> 中的象 dpkg
和 apt-get 等工具来提供强大的二进制软件包管理。
你可以随意选择是下载预编译好的二进制安装包或从源代码自己构建一切。
<a href="about.php">阅读更多信息…</a>
</p>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>新闻</h1>

<?
// Include news items
include dirname(__FILE__) . "/news/news.zh.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=zh">以前的消息…</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>当前状况</h1>
<? 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink <? print $fink_version ?> 已经于 <? print convert_date_to_locale($release_date) ?> 发布。 
它包括源代码和二进制文件两种发行方式，同时也包括二进制形式可执行的安装程序，它们都是针对 OS X 10.4 设计。
Fink 0.7.2 (针对 OS X 10.3), Fink 0.6.4 (针对 OS X 10.2) 和 0.4.1 (针对 OS X 10.1) 仍然可以获得。
</p>

<h1>资源</h1>

<p>
如果你在寻求技术支持的话，请访问 <a
href="help/index.php">帮助页面</a>。
帮助页面还列有支持本项目的几种方法以及如何提交反馈。
</p>

<p>
Fink 项目建立于
<a href="http://sourceforge.net/">SourceForge</a>中。
除了提供本网站的主机服务以及下载支持外，SourceForge
还为本项目提供下面的资源：
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">SourceForge 项目概述页面</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">汇报和检视软件缺陷</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">请求一个还不在 Fink 中的软件包</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">请求一个 fink（程序）中还没有的功能</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">提交一个新的 Fink 软件包（非核心开发者）</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">提交 fink（程序）的一个补丁。</a></li>
<li><a href="lists/index.php">邮件列表</a></li>
<li>CVS (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink">在线浏览</a>, <a href="doc/cvsaccess/index.php">如何访问</a>)</li>
</ul>
<p>
请注意：要使用其中的一些资源（比如，汇报一个软件缺陷或请求一个新的 Fink 软件包），你需要先登录进你的 SourceForge 帐号。如果你现在还没有帐号，你可以在 <a href="http://sourceforge.net/">SourceForge 网站</a>免费注册一个。
</p>
<!-- start translation -->
<p>Additional resources hosted outside SourceForge include:</p>
<ul>
<li><a href="http://wiki.opendarwin.org/index.php/Fink">The Fink developer wiki</a>, thanks to the generosity of <a href="http://www.opendarwin.org">the OpenDarwin project</a>.</li>
</ul>
<!-- end translation -->

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include dirname(__FILE__) . "/footer.inc";
?>
