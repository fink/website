<?

$title = "用户指南";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/02/19 07:13:51';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=cn\" title=\"用户指南 Contents\" /><link rel=\"next\" href=\"intro.php?phpLang=cn\" title=\"介绍\" />";

include_once "header.cn.inc"; 
?><h1>Fink 用户指南</h1>
    <p>
      <b>本文档尚在不断修改中。</b>
下面的旧文档可以给你更详尽的概念：
<a href="http://fink.sourceforge.net/doc/bundled/install.php">安装</a>,
<a href="http://fink.sourceforge.net/doc/bundled/usage.php">使用</a>
以及包括在发行安装版本的磁盘映象中的 ReadMe.rtf 文件。
同时也可以查阅本网站的
<a href="http://fink.sourceforge.net/doc/">文档部分</a> ，它包括一些其它的有用资讯。
</p>
    <p>
欢迎查看 Fink 用户指南。
本指南包括从源代码或安装包来初次安装或升级 Fink 的步骤。
同时也会涉及软件包的安装和维护。
</p>
  <h2>Contents</h2><ul>
<li><a href="intro.php?phpLang=cn"><b>1 介绍</b></a></li>
<ul>
<li><a href="intro.php?phpLang=cn#what">1.1 Fink 是什么？</a></li>
<li><a href="intro.php?phpLang=cn#req">1.2 系统要求</a></li>
<li><a href="intro.php?phpLang=cn#supported-os">1.3 支持的操作系统</a></li>
<li><a href="intro.php?phpLang=cn#src-vs-bin">1.4 源代码与二进制安装包的对比</a></li>
</ul>
<li><a href="install.php?phpLang=cn"><b>2 首次安装</b></a></li>
<ul>
<li><a href="install.php?phpLang=cn#bin">2.1 安装二进制发行版</a></li>
<li><a href="install.php?phpLang=cn#src">2.2 安装源代码发行版</a></li>
<li><a href="install.php?phpLang=cn#setup">2.3 设置你的环境</a></li>
</ul>
<li><a href="packages.php?phpLang=cn"><b>3 安装软件包</b></a></li>
<ul>
<li><a href="packages.php?phpLang=cn#bin-dselect">3.1 用 dselect 安装二进制包</a></li>
<li><a href="packages.php?phpLang=cn#bin-apt">3.2 用　apt-get　安装二进制包</a></li>
<li><a href="packages.php?phpLang=cn#bin-exceptions">3.3 安装没有二进制版本的依赖软件包</a></li>
<li><a href="packages.php?phpLang=cn#src">3.4 从源代码安装软件包</a></li>
<li><a href="packages.php?phpLang=cn#fink-commander">3.5 Fink Commander</a></li>
<li><a href="packages.php?phpLang=cn#">3.6 可用版本</a></li>
<li><a href="packages.php?phpLang=cn#x11">3.7 找到 X11</a></li>
</ul>
<li><a href="upgrade.php?phpLang=cn"><b>4 升级 Fink</b></a></li>
<ul>
<li><a href="upgrade.php?phpLang=cn#bin">4.1 用二进制包进行升级</a></li>
<li><a href="upgrade.php?phpLang=cn#src">4.2 升级从源码安装版本</a></li>
<li><a href="upgrade.php?phpLang=cn#mix">4.3 混合使用二进制和源文件安装的情况</a></li>
</ul>
<li><a href="conf.php?phpLang=cn"><b>5 Fink 配置文件</b></a></li>
<ul>
<li><a href="conf.php?phpLang=cn#about">5.1 关于 fink.conf</a></li>
<li><a href="conf.php?phpLang=cn#syntax">5.2 fink.conf 文件的语法</a></li>
<li><a href="conf.php?phpLang=cn#required">5.3 必需的设置</a></li>
<li><a href="conf.php?phpLang=cn#optional">5.4 可选用户设置</a></li>
<li><a href="conf.php?phpLang=cn#downloding">5.5 下载设置</a></li>
<li><a href="conf.php?phpLang=cn#mirrors">5.6 镜像站点设置</a></li>
<li><a href="conf.php?phpLang=cn#developer">5.7 开发人员设置</a></li>
</ul>
<li><a href="usage.php?phpLang=cn"><b>6 在命令行使用 Fink 工具</b></a></li>
<ul>
<li><a href="usage.php?phpLang=cn#using">6.1 使用 Fink 工具</a></li>
<li><a href="usage.php?phpLang=cn#install">6.2 install</a></li>
<li><a href="usage.php?phpLang=cn#remove">6.3 remove</a></li>
<li><a href="usage.php?phpLang=cn#update-all">6.4 update-all</a></li>
<li><a href="usage.php?phpLang=cn#list">6.5 list</a></li>
<li><a href="usage.php?phpLang=cn#apropos">6.6 apropos</a></li>
<li><a href="usage.php?phpLang=cn#describe">6.7 describe</a></li>
<li><a href="usage.php?phpLang=cn#fetch">6.8 fetch</a></li>
<li><a href="usage.php?phpLang=cn#fetch-all">6.9 fetch-all</a></li>
<li><a href="usage.php?phpLang=cn#fetch-missing">6.10 fetch-missing</a></li>
<li><a href="usage.php?phpLang=cn#build">6.11 build</a></li>
<li><a href="usage.php?phpLang=cn#rebuild">6.12 rebuild</a></li>
<li><a href="usage.php?phpLang=cn#reinstall">6.13 reinstall</a></li>
<li><a href="usage.php?phpLang=cn#configure">6.14 configure</a></li>
<li><a href="usage.php?phpLang=cn#selfupdate">6.15 selfupdate</a></li>
<li><a href="usage.php?phpLang=cn#index">6.16 index</a></li>
<li><a href="usage.php?phpLang=cn#validate">6.17 validate</a></li>
<li><a href="usage.php?phpLang=cn#scanpackages">6.18 scanpackages</a></li>
<li><a href="usage.php?phpLang=cn#checksums">6.19 checksums</a></li>
<li><a href="usage.php?phpLang=cn#cleanup">6.20 cleanup</a></li>
</ul>
</ul><p>Generated from <i>$Id: index.cn.php,v 1.1 2004/02/29 11:45:18 dmalloc Exp $</i></p><? include_once "../../footer.inc"; ?>
