<?

$title = "用户指南";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2004/02/29 13:02:38';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=zh\" title=\"用户指南 Contents\" /><link rel=\"next\" href=\"intro.php?phpLang=zh\" title=\"介绍\" />";

include_once "header.zh.inc"; 
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
<li><a href="intro.php?phpLang=zh"><b>1 介绍</b></a></li>
<ul>
<li><a href="intro.php?phpLang=zh#what">1.1 Fink 是什么？</a></li>
<li><a href="intro.php?phpLang=zh#req">1.2 系统要求</a></li>
<li><a href="intro.php?phpLang=zh#supported-os">1.3 支持的操作系统</a></li>
<li><a href="intro.php?phpLang=zh#src-vs-bin">1.4 源代码与二进制安装包的对比</a></li>
</ul>
<li><a href="install.php?phpLang=zh"><b>2 首次安装</b></a></li>
<ul>
<li><a href="install.php?phpLang=zh#bin">2.1 安装二进制发行版</a></li>
<li><a href="install.php?phpLang=zh#src">2.2 安装源代码发行版</a></li>
<li><a href="install.php?phpLang=zh#setup">2.3 设置你的环境</a></li>
</ul>
<li><a href="packages.php?phpLang=zh"><b>3 安装软件包</b></a></li>
<ul>
<li><a href="packages.php?phpLang=zh#bin-dselect">3.1 用 dselect 安装二进制包</a></li>
<li><a href="packages.php?phpLang=zh#bin-apt">3.2 用　apt-get　安装二进制包</a></li>
<li><a href="packages.php?phpLang=zh#bin-exceptions">3.3 安装没有二进制版本的依赖软件包</a></li>
<li><a href="packages.php?phpLang=zh#src">3.4 从源代码安装软件包</a></li>
<li><a href="packages.php?phpLang=zh#fink-commander">3.5 Fink Commander</a></li>
<li><a href="packages.php?phpLang=zh#">3.6 可用版本</a></li>
<li><a href="packages.php?phpLang=zh#x11">3.7 找到 X11</a></li>
</ul>
<li><a href="upgrade.php?phpLang=zh"><b>4 升级 Fink</b></a></li>
<ul>
<li><a href="upgrade.php?phpLang=zh#bin">4.1 用二进制包进行升级</a></li>
<li><a href="upgrade.php?phpLang=zh#src">4.2 升级从源码安装版本</a></li>
<li><a href="upgrade.php?phpLang=zh#mix">4.3 混合使用二进制和源文件安装的情况</a></li>
</ul>
<li><a href="conf.php?phpLang=zh"><b>5 Fink 配置文件</b></a></li>
<ul>
<li><a href="conf.php?phpLang=zh#about">5.1 关于 fink.conf</a></li>
<li><a href="conf.php?phpLang=zh#syntax">5.2 fink.conf 文件的语法</a></li>
<li><a href="conf.php?phpLang=zh#required">5.3 必需的设置</a></li>
<li><a href="conf.php?phpLang=zh#optional">5.4 可选用户设置</a></li>
<li><a href="conf.php?phpLang=zh#downloding">5.5 下载设置</a></li>
<li><a href="conf.php?phpLang=zh#mirrors">5.6 镜像站点设置</a></li>
<li><a href="conf.php?phpLang=zh#developer">5.7 开发人员设置</a></li>
</ul>
<li><a href="usage.php?phpLang=zh"><b>6 在命令行使用 Fink 工具</b></a></li>
<ul>
<li><a href="usage.php?phpLang=zh#using">6.1 使用 Fink 工具</a></li>
<li><a href="usage.php?phpLang=zh#install">6.2 install</a></li>
<li><a href="usage.php?phpLang=zh#remove">6.3 remove</a></li>
<li><a href="usage.php?phpLang=zh#update-all">6.4 update-all</a></li>
<li><a href="usage.php?phpLang=zh#list">6.5 list</a></li>
<li><a href="usage.php?phpLang=zh#apropos">6.6 apropos</a></li>
<li><a href="usage.php?phpLang=zh#describe">6.7 describe</a></li>
<li><a href="usage.php?phpLang=zh#fetch">6.8 fetch</a></li>
<li><a href="usage.php?phpLang=zh#fetch-all">6.9 fetch-all</a></li>
<li><a href="usage.php?phpLang=zh#fetch-missing">6.10 fetch-missing</a></li>
<li><a href="usage.php?phpLang=zh#build">6.11 build</a></li>
<li><a href="usage.php?phpLang=zh#rebuild">6.12 rebuild</a></li>
<li><a href="usage.php?phpLang=zh#reinstall">6.13 reinstall</a></li>
<li><a href="usage.php?phpLang=zh#configure">6.14 configure</a></li>
<li><a href="usage.php?phpLang=zh#selfupdate">6.15 selfupdate</a></li>
<li><a href="usage.php?phpLang=zh#index">6.16 index</a></li>
<li><a href="usage.php?phpLang=zh#validate">6.17 validate</a></li>
<li><a href="usage.php?phpLang=zh#scanpackages">6.18 scanpackages</a></li>
<li><a href="usage.php?phpLang=zh#checksums">6.19 checksums</a></li>
<li><a href="usage.php?phpLang=zh#cleanup">6.20 cleanup</a></li>
</ul>
</ul><p>Generated from <i>$Id: index.zh.php,v 1.1 2004/02/29 13:21:18 fingolfin Exp $</i></p><? include_once "../../footer.inc"; ?>
