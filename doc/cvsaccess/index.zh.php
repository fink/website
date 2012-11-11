<?
$title = "Fink CVS 访问";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:13';
$metatags = '';


include_once "header.inc";
?>
<h1>设置 Fink CVS 访问</h1>
<!--Generated from $Fink: cvs.zh.xml,v 1.5 2012/11/11 15:20:13 gecko2 Exp $-->
<p>
Fink 被开发为支持 CVS。
这意味着你可以在两个发布版之间都可以一直保持使用当前最新的版本，总是可以获得最新的功能。
本页介绍如何配置一个已安装的 Fink 通过 CVS 进行更新。
本页的资讯适用于 Fink 0.3.x 或更新的版本。
</p>
<h2><a name="">Fink CVS 结构</a></h2>
<p>Fink 有几个 CVS 模块。模块 <code>dists</code>（<a href="http://fink.cvs.sourceforge.net/fink/">《查看 CVS》</a>）包含软件包描述和对 OS X 10.2 及更新版本的补丁。
这里面还有被 Fink 开发者使用的其它模块，其它人可以查看，但多数用户都不会对他们感兴趣。</p>
<h2><a name="">更新软件包描述</a></h2>
<p>过去，这是一个比较冗长的过程，但在现在的 Fink 版本中，这是一个非常简单的过程。
只需要运行这个命令：
</p>
<pre>fink selfupdate-cvs</pre>
<p>Fink 会为你执行必需的步骤。
这包括获取最新一套软件包描述文件，以及更新一些重要的核心软件包（中间包括 Fink 软件包管理器）。
</p>
<p>如果你在防火墙之后，参考<a href="/faq/usage-fink.php#proxy">《常见疑问 3.2》</a>。
</p>
<p>在你这样更新了你的软件包描述之后，你可以接着更新你的软件包到最新的版本。这可以使用下面的命令：
</p>
<pre>fink update-all</pre>
<h2><a name="">更新软件包管理器</a></h2>
<p>
<b>注意：</b>从 2001 年 9 月 20 日开始，不再需要单独更新软件包管理器了它已经被单独看作普通软件包中的一个。
它仍然可以直接从 CVS 进行更新，虽然通常只用软件包的开发者才会对此感兴趣，普通用户不会关心它。
</p>

<p>软件包管理器需要通过一个单独的目录以及一个 <code>inject.pl</code> 脚本进行更新。这个脚本把软件包描述文件和 Fink 程序的压缩档以及基本文件软件包到你的 Fink 目录树中并构建它们。</p>
<p>第一的过程中，你需要创建一个空的（或至少不包括称为 'fink' 的子目录）临时目录（比如称为 <code>tempdir</code>）。
操作过程大致如下：</p>
<pre>cd tempdir
cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink login
cvs -z3 -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink co fink
cd fink
./inject.pl</pre>
<p>登录命令会询问密码──只需要按回车就好了。
再此过程以后你可以删除临时目录，但不过保留它们呢，那么下次的更新会简单一些。
接着的步骤是：</p>
<pre>cd tempdir/fink
cvs -z3 update -d
./inject.pl</pre>

<? include_once "../../footer.inc"; ?>


