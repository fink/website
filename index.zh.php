<?php
$title      = "Home";
$cvs_author = '$Author: nieder $';
$cvs_date   = '$Date: 2019/02/25 22:41:00 $';
$is_home    = 1;

$metatags = '<meta name="description" content="Fink, 一个 Mac OS X 和 Darwin 上的 Unix 软件发布系统">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, 软件, 发布, Fink">
';

require dirname(__FILE__) . "/header.inc";
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

<h1><a href="<?php print $rdf_file; ?>" title="Subscribe to my feed, Fink Project News" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;新闻</h1>

<?php
// Include news items
require dirname(__FILE__) . "/news/news.zh.inc";
?>
<div align="right"><a href="<?php print $root; ?>news/index.php?phpLang=zh">以前的消息…</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Fink Package Updates (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Recent Package Updates</h1>

<?php  include "package-updates.inc" ?>

<a href="package-updates.php">more...</a>
</tr><tr valign="top"><td width="50%">
<h1>当前状况</h1>
<?php
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink currently supports macOS 10.14 (Mojave), macOS 10.13 (High Sierra), 
macOS 10.12 (Sierra), OS X 10.11 (El Capitan), OS X 10.10 (Yosemite), OS X 10.9 (Mavericks), 
and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="download/srcdist.php">source
release page</a>.
</p>
<p>Xcode must be installed before Fink.</p>  
<p>
<strong>10.13 and 10.14 Support:</strong> 
10.13 and 10.14 users must install Xcode version 10.1 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 10.1 (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.11 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.12 Support:</strong> 
10.12 users must install Xcode version 8.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 6.0 for Sierra (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.11 Support:</strong> 
10.11 users must install Xcode version 7.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 7.0 for El Capitan (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.10 Support:</strong> 
10.10 users must install Xcode version 6.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 6.0 for Yosemite (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.9 Support:</strong> 
10.9 users must install Xcode version 5.0.1 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 5.0 for Mavericks (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.4 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.8 Support:</strong> 
10.8 users must install Xcode version 4.4 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 4.4 for Mountain Lion (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences). Note that if you had an 
earlier version of Xcode than 4.3 installed prior to updating from 10.7, you need 
to <b>uninstall</b> the old version first by running 
<i>/Developer/Library/uninstall-devtools</i>. 
You can determine your current version of Xcode by running 
<i>xcodebuild -version</i> .</p>
<p>If you need X11 you should install Xquartz-2.7.2 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.7 Support:</strong> 
10.7 users must install or update Xcode to version 4.1 or later 
(via a free download from the AppStore), (version 4.6.3 is recommended) or must at least
install the Command Line Tools for 
Xcode 4.3 or later (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences (4.3 or later).  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall an outdated one, if needed.</p>
<p>We don't support Xquartz on 10.7, so don't remove Apple's official X11.</p>
<p>
<strong>10.6 Support:</strong>
For best results, 10.6 users are
encouraged to upgrade Xcode to version 3.2.6, or to version 4.2.1 if you
paid for a 4.x Developer preview.  Version 4.0.2 is known to have some
bugs in its linker that prevent certain packages from building.  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall it, if needed.</p>
<p>We don't support Xquartz on 10.6, so don't remove Apple's official X11.</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
<h1>资源</h1>

<p>
如果你在寻求技术支持的话，请访问 <a
href="help/index.php">帮助页面</a>。
帮助页面还列有支持本项目的几种方法以及如何提交反馈。
</p>

<p>
Fink 项目建立于
<a href="http://sourceforge.net/">SourceForge</a>中。
除了提供本网站的主机服务以及下载支持外，SourceForge和GitHub
还为本项目提供下面的资源：
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">SourceForge 项目概述页面</a></li>
<li><a
href="https://github.com/fink/fink/issues">汇报和检视软件缺陷</a></li>
<li><a
href="https://sourceforge.net/p/fink/package-requests/">请求一个还不在 Fink 中的软件包</a></li>
<li><a
href="https://sourceforge.net/p/fink/feature-requests/">请求一个 fink（程序）中还没有的功能</a></li>
<li><a
href="https://github.com/fink/fink-distributions/pulls">提交一个新的 Fink 软件包（非核心开发者）</a></li>
<li><a
href="https://github.com/fink/fink/pulls">提交 fink（程序）的一个补丁。</a></li>
<li><a href="lists/index.php">邮件列表</a></li>
<li>Git (<a href="https://github.com/fink/">在线浏览</a>, <a href="doc/gitaccess/index.php">如何访问</a>)</li>
</ul>
<p>
请注意：要使用其中的一些资源（比如，汇报一个软件缺陷或请求一个新的 Fink 软件包），你需要先登录进你的 SourceForge 帐号。如果你现在还没有帐号，你可以在 <a href="http://sourceforge.net/">SourceForge 网站</a>免费注册一个。
</p>
<!-- start translation -->
<p>Additional resources hosted outside SourceForge include:</p>
<ul>
    <li><a href="http://wiki.finkproject.org/">The Fink developer wiki</a> (now at a new location).</li>
    <li>
        <a href="https://github.com/fink/fink">
            New github repository for the source code of the <code>fink</code> package manager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            New github repository for the <code>fink-mirrors</code> package.
        </a>
    </li>
</ul>
<!-- end translation -->

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?php
include dirname(__FILE__) . "/footer.inc";
?>
