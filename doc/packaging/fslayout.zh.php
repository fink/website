<?
$title = "打包 - 文件系统布局";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/14 00:06:18';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="打包 Contents"><link rel="next" href="reference.php?phpLang=zh" title="操作手册"><link rel="prev" href="policy.php?phpLang=zh" title="打包相关规则">';

include_once "header.inc";
?>

<h1>打包 - 4 文件系统布局</h1>





<p>
下述的文件系统布局指南是 Fink 打包规则的一部分。
</p>



<h2><a name="fhs">4.1 文件系统层次结构标准</a></h2>
<p>
Fink 遵循<a href="http://www.pathname.com/fhs/">《文件系统层次结构标准》(Filesystem Hierarchy
Standard)</a>，简称 FHS 的精神。
我们只能说遵循它的精神，是因为 FHS 是为操作系统提供者所涉及的，因此它是在 <code>/</code> 和
<code>/usr</code> 层次级别上来控制。而 Fink 只是一个附加的系统，它指控制它自己的安装目录(或安装前缀指定的目录)。
本章的例子使用默认的前缀 <code>/sw</code>。
</p>


<h2><a name="dirs">4.2 目录</a></h2>
<p>
文件应该分类存放在层次结构中下列子目录中：
</p>

<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td><code>/sw/bin</code></td><td>
<p>
这个目录存放通常的可执行程序。里面没有子目录。
</p>
</td></tr><tr valign="top"><td><code>/sw/sbin</code></td><td>
<p>
这个目录存放那些应该只由系统管理员使用的命令。
后台守护进程程序会放在这里。
里面没有子目录。
</p>
</td></tr><tr valign="top"><td><code>/sw/include</code></td><td>
<p>
这个目录存放 C 和 C++ 头文件。
如果需要的话，可以创建子目录。
如果软件包安装的头文件可能与标准的 C 头文件发生混淆的话，这些头文件<b>必须</b>放到子目录中。
</p>
</td></tr><tr valign="top"><td><code>/sw/lib</code></td><td>
<p>
这个目录存放那些系统架构相关的数据文件和函数库。
除非有特别的理由，否则静态和动态连接库应该直接保存在 <code>/sw/lib</code>。
这里通常还保存那些不应该由用户直接运行的可执行程序(否则的话，应该放在 libexec)。
</p>
<p>
软件包可以创建子目录来存放私有数据或可加载模块。
请确定使用那些对保持兼容性有利的目录名。
在目录名或目录层次中使用主版本号是个好办法，例如：<code>/sw/lib/perl5</code>
或 <code>/sw/lib/apache/1.3</code>。
Care should be taken when the host type is used to create
directories.
<code>powerpc-apple-darwin1.3.3</code> 这样的目录对兼容性是不利的，<code>powerpc-apple-darwin1.3</code> 或仅仅是
<code>powerpc-apple-darwin</code> 是个好些的选择。
</p>
</td></tr><tr valign="top"><td><code>/sw/share</code></td><td>
<p>
这个目录是存放那些系统体系架构无关的数据文件。
那些 <code>/sw/lib</code> 中的规则也适用于这里。
下面描述一些通常的子目录。
</p>
</td></tr><tr valign="top"><td><code>/sw/share/man</code></td><td>
<p>
这些目录中包括帮助页。它按照通常的分类方法进行组织。
在 <code>/sw/bin</code> 和
<code>/sw/sbin</code> 中的每个程序都应该有一个对应的帮助页。
</p>
</td></tr><tr valign="top"><td><code>/sw/share/info</code></td><td>
<p>
这个目录包含 Info 格式(从 Texinfo 源文件产生)的文档。
<code>dir</code> 文件的维护是通过 Debian 版本的 <code>install-info</code> (<code>dpkg</code> 软件包的一部分) 来自动进行的。
适用 <code>InfoDocs</code> 描述字段来自动生成 <code>postinst</code> 和 <code>prerm</code> 软件包脚本的合适代码。
Fink 确保不会有软件包会安装它自己的 <code>dir</code> 文件。
这里不会有子目录。
</p>
</td></tr><tr valign="top"><td><code>/sw/share/doc</code></td><td>
<p>
这个目录包括那些既不是帮助页，也不是 Info 的文档。
例如 README，LICENSE 和 COPYING 文件等。
每个软件包必须在这里创建一个子目录，以软件包的名字命名。
目录名不能包括版本号(除非它正好是软件包名的一部分)。
提示：使用 <code>%n</code> 就好了。
</p>
</td></tr><tr valign="top"><td><code>/sw/share/locale</code></td><td>
<p>
这个目录包含国际化所需要的信息目录。
</p>
</td></tr><tr valign="top"><td><code>/sw/var</code></td><td>
<p>
<code>var</code> 目录保存可变数据。
它包括队列目录，访问锁文件，状态数据库，游戏最高分和日志文件。
</p>
</td></tr><tr valign="top"><td><code>/sw/etc</code></td><td>
<p>
这个目录保存配置文件。
对于那些需要在这里保存比较多文件(比方超过一两个的数目)的软件包，应该建立一个子目录。
子目录应该和软件包或者里面的程序同名，以方便识别。
</p>
</td></tr><tr valign="top"><td><code>/sw/src</code></td><td>
<p>
这个目录用于保存和构建源代码。
软件包不应该在这个目录里面安装任何东西。
</p>
</td></tr></table>



<h2><a name="avoid">4.3 应该避免的事情</a></h2>
<p>
除了上面提到的以外，在 <code>/sw</code> 中不应该有其它的目录。
特别地，不应该使用下面这些目录：
<code>/sw/man</code>，<code>/sw/info</code>，
<code>/sw/doc</code>，<code>/sw/libexec</code>，
<code>/sw/lib/locale</code>。
</p>



<p align="right">
Next: <a href="reference.php?phpLang=zh">5 操作手册</a></p>

<? include_once "footer.inc"; ?>
