<?
$title = "移植 - libtool";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/12 15:06:20';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="移植 Contents"><link rel="next" href="preparing.php?phpLang=zh" title="为 10.2 做准备"><link rel="prev" href="shared.php?phpLang=zh" title="共享代码">';


include_once "header.zh.inc";
?>
<h1>移植 - 3. GNU libtool</h1>




<p>
要构建共享库的 GNU 软件包使用 GNU libtool 来在构建和安装过程中隐藏那些平台相关的过程。
</p>


<h2><a name="situation">3.1 有关情况</a></h2>
<p>
宏观地说，可以找到 libtool 的四个分支：
</p>
<ul>

<li><p>
<b>libtool 1.3</b>：
最常见的分支。
这个分支的最新版本是 1.3.5。
它不认识 Darwin 并且只构建静态库。
可以通过源代码树中 <code>ltconfig</code> 和 <code>ltmain.sh</code> 两个文件的存在来识别它。
</p></li>

<li><p>
<b>libtool 1.4</b>：
经过很长的时间的改进，最被作为新的稳定版本发布，这个分支具有更好的 autoconf 集成。
不幸的是，那使得从 1.3 移植软件包变得不那么容易。
它本身就支持 Darwin 1.3 / Mac OS X 10.0，并需要一点小修补来使得它能在 Mac OS X 10.1 下工作。
它可以通过 <code>ltconfig</code> 文件的不存在来识别。
那些版本号为 1.3b 或 1.3d 的实际上是 1.4 的开发过程中的版本，必需小心对待。
</p></li>

<li><p>
<b>多语言分支版本(multi-language-branch)</b>：
也称为 MLB，这个版本是一个并行开发的版本，以添加对 C++ 和 Java (通过 gcj) 的支持。
它已经被合并回主开发线中。
最近的版本本身支持 Darwin 1.3 和 Mac OS X 10.0。
MLB 可以通过 <code>ltcf-c.sh</code>，<code>ltcf-cxx.sh</code> 和 <code>ltcf-gcj.sh</code> 文件识别。
</p></li>

<li><p>
<b>当前开发分支</b>：
这个开发中的版本将来会以 libtool 1.5 发布。
它是 1.4 和 MLB 合并的结果。
它支持 C，C++ 和 Java (通过 gcj)。
不幸的是，它不太容易和 1.4 区分开，你需要查找 <code>ltmain.sh</code> 里面的版本号信息。
</p></li>

</ul>
<p>
作为结论，libtool 1.3.x 以及使用它的软件包(它们是使用 libtool 的软件包的主流)需要进行补丁后在可以在 Darwin 上构建共享库。
Apple 在 Mac OS X 中包括了一个修正的版本，但在多数情况下不能正常工作。Christoph Pfisterer 通过把正确的路径和完整的版本编号固定编程的方法改进了那个补丁。
从 1.4 开始，这个修改被加进了上游的 libtool 发型版中。
Fink 团队的成员仍然不对 libtool 进行改进，并把他们的结果反馈会 libtool 的维护者。
版本编号方案对于所有 libtool 版本都是兼容的。
</p>
<p>
附注：
所有 libtool 版本所包括的 libltdl 库只有在安装了 dlcompat 的 Darwin 才可以使用。
</p>



<h2><a name="patch-135">3.2 1.3.5 补丁</a></h2>
<p>
如果你自己构建 libtool 1.3.5，你需要应用<a href="http://fink.sourceforge.net/files/libtool-1.3.5-darwin.patch">这个补丁</a> <b>[updated 2002-06-09]</b> 到 libtool 1.3.5 的源程序，然后删除 ltconfig 和 ltmain.sh 两个文件(它们会在你运行 configure 和 make 的时候从合适的 .in 文件中重建)。
在 Fink 的 libtool 1.3.5 软件包中，这个过程是自动的。</p><p>
但那仅是全部工作的一半 ─ 每个软件包是通过它自己附带的 ltconfig 和 ltmain.sh 来使用 libtool。
所以如果你需要构建共享库的时候，你要把每个软件包里面的这两个文件替换掉。
注意，你要在运行配置脚本之前做这个事情。
方便起见，你可以在这里获取这两个文件：
<a href="http://fink.sourceforge.net/files/ltconfig">ltconfig</a> (98K) 和
<a href="http://fink.sourceforge.net/files/ltmain.sh">ltmain.sh</a> (110K)
<b>[both updated 2002-06-09]</b>。</p>


<h2><a name="fixing-14x">3.3 修正 1.4.x</a></h2>
<p>
现在广泛使用的 libtool 1.4.x 至少有三个不同版本(1.4.1，1.4.2，和更新的开发版本)，它们在 Darwin 上都有一些问题。不过在它们上面如何修正的方法却是不同的。Fink 所提供的 libtool14 软件包已经包括了所有需要的修正。
不过，你仍然需要手工修正受影响的文件包的 ltmain.sh/configure 文件来使它可以正常工作。
</p>

<ol>
<li>
<b>flat_namespace 问题</b>：
这个问题只发生在 Mac OS X10.1 和更新的版本上使用 libtool 的时候。
原因是 libtool 尝试使用 <code>-undefined suppress</code> 来允许未定义的标识符，但没有同时使用 <code>-flat_namespace</code> 选项。
从 10.1 开始，这不再可以工作了。典型的补丁是这样的：
<pre>
diff -Naur gdk-pixbuf-0.16.0.old/configure gdk-pixbuf-0.16.0.new/configure
--- gdk-pixbuf-0.16.0.old/configure	Wed Jan 23 10:11:48 2002
+++ gdk-pixbuf-0.16.0.new/configure	Thu Jan 31 03:19:54 2002
@@ -3334,7 +3334,7 @@
     ;;
 
   darwin* | rhapsody*)
-    allow_undefined_flag='-undefined suppress'
+    allow_undefined_flag='-flat_namespace -undefined suppress'
     # FIXME: Relying on posixy $() will cause problems for
     #        cross-compilation, but unfortunately the echo tests do not
     #        yet detect zsh echo's removal of \ escapes.
</pre>
</li>
<li>
<b>可加载模块问题</b>：
这个问题是由于 zsh (在 10.0 和 10.1 上是默认的 shell；从 10.2 开始，它被替换为 bash) 的非标准行为引起的。
Zsh 的非标准引号处理方式使得可加载模块不能正确地构建，最后它们被构建程共享库(不象 Linux，在 Darwin 上这是完全不同的东西)。一个典型的修正办法是(你不能完全不经修改地照搬)：
<pre>
diff -Naur gnome-core-1.4.0.6.old/configure gnome-core-1.4.0.6.new/configure
--- gnome-core-1.4.0.6.old/configure	Sun Jan 27 08:19:48 2002
+++ gnome-core-1.4.0.6.new/configure	Fri Feb  8 01:10:21 2002
@@ -4020,7 +4020,7 @@
     # FIXME: Relying on posixy $() will cause problems for
     #        cross-compilation, but unfortunately the echo tests do not
     #        yet detect zsh echo's removal of \ escapes.
-    archive_cmds='$nonopt $(test "x$module" = xyes &amp;&amp; echo -bundle || echo -dynamiclib) ...'
+    archive_cmds='$nonopt $(test x$module = xyes &amp;&amp; echo -bundle || echo -dynamiclib) ...'
     # We need to add '_' to the symbols in $export_symbols first
     #archive_expsym_cmds="$archive_cmds"' &amp;&amp; strip -s $export_symbols'
     hardcode_direct=yes
</pre>
<p>
这个问题在 1.4.2 后的某个 libtool 版本修正了。
</p>
</li>
<li>
<b>简易库问题</b>:
在一些情况下，libtool 不能连接简易库，而给出 "multiple definitions" 错误。
这是有 libtool 里面的一些更根本的问题导致的。
有一个治标不治本，不过在实践中很有效的办法来解决(感谢 Dave Vasilevsky)：
<pre>
--- ltmain.sh.old       2002-04-27 00:01:23.000000000 -0400
+++ ltmain.sh   2002-04-27 00:01:45.000000000 -0400
@@ -2894,7 +2894,18 @@
        if test -n "$export_symbols" &amp;&amp; test -n "$archive_expsym_cmds"; then
          eval cmds=\"$archive_expsym_cmds\"
        else
+         save_deplibs="$deplibs"
+         for conv in $convenience; do
+       tmp_deplibs=
+       for test_deplib in $deplibs; do
+         if test "$test_deplib" != "$conv"; then
+           tmp_deplibs="$tmp_deplibs $test_deplib"
+         fi
+       done
+       deplibs="$tmp_deplibs"
+         done
          eval cmds=\"$archive_cmds\"
+         deplibs="$save_deplibs"
        fi
        save_ifs="$IFS"; IFS='~'
        for cmd in $cmds; do
</pre>
</li>
<li>
<b>DESTDIR 问题</b>:
有些设置了 DESTDIR 并使用 libtool 1.4.2 的软件包会在重新连接的时候有问题。
这个问题在这些邮件消息里面被讨论：
<p>
<a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html</a></p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html</a></p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html</a>,</p>
<p>对这个问题的补丁在这里被讨论：</p>
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html</a>.</p>
</li>
</ol>


<h2><a name="dylibversionfix">3.4 修正 libtool 产生的 dylib 的版本字符串</a></h2>

<p>由 libtool 产生的库可能会有错误的版本号。
这是由于软件包的 Makefile 文件的一个错误标识而导致的。
当 libtool 在这样一个 Makefile 文件里面被调用的时候：
<code>
-release "version"
</code>
在 make 命令运行以后产生的二进制文件是这样的：</p>
<ol>
<li> libname.dylib</li>
<li> libname-"version".dylib</li>
</ol>
<p>
你可以很容易分辨在你的 Makefile 里面是不是使用了 <code>-release</code>。
你也许还注意到在函数库名后面的 <b>-</b>。
这表明 libtool 是以 <code>-release</code> 参数被调用来产生二进制文件的。
一些其它的情况下，产生的二进制文件是类似这样的：
</p>

<ol>
<li>libname.dylib</li>
<li>libname-"version".x.x.x.dylib</li>
</ol>
<p>
表明两个的标志 <code>-release</code> 和 <code>-version-info</code> 都被使用了。</p>
<p>
设置正确的 <code>-version-info</code> 可以是一项很复杂的工作。
苹果在它的开发者工具文档里面提供了一些很有用的信息。 
因为你在运行 Fink，所以你应该安装了某个版本的开发工具。
对当前 Mac OS X 系统的 libtool 的精确解释可以在<a href="file://localhost/Developer/Documentation/DeveloperTools/libtool/libtool_6.html#SEC34">文档</a>中找到。
为了使本文档完整化，我们引用了上面提到的文档的一个摘要。
</p>
<p>
引自《开发者文档》：
libtool 库版本由三个整数来描述：
</p>

<ul><li>
<b>当前</b>
<p>
这个函数库实现的最近的调用界面版本。
</p>
</li>
<li>
<b>修订版</b>
<p>
当前调用界面的实现版本。
</p>
</li>
<li>
<b>年龄</b>
<p>
这个函数库实现的最近和最旧的调用界面的版本号差别。
换句话说，这个函数库实现从当前版本往前年龄范围内的全部调用界面─到现在的年龄。如果两个函数库由相同的当前和年龄号，那么动态连接器选择比较大修订版号的一个进行连接。
</p>

</li>
</ul>
<p>
使用 libtool 设置和更新函数库的版本的更多信息可以在上面链接的文档中找到。
它完整地包括了如何使用 <code>-version-info</code> 创建和更新一个函数库版本号。
</p>





<h2><a name="notes">3.5 更多注解</a></h2>
<p>关于 libtool 本身以及它的进展的更多信息，查看<a href="http://www.gnu.org/software/libtool/libtool.html">libtool 首页</a>。</p>

<p>
附注：
苹果的开发工具包中也包括一个叫做 libtool 的程序，用于编译器构建共享库。
不过，这和 GNU libtool 一点关系也没有。
苹果提供的 GNU libtool 则被安装为 <code>glibtool</code>。
这可以通过
<code>--program-transform-name=s/libtool/glibtool/</code>
来配置 GNU libtool 来解决。
</p>


<p align="right"><? echo FINK_NEXT ; ?>:
<a href="preparing.php?phpLang=zh">4. 为 10.2 做准备</a></p>
<? include_once "../../footer.inc"; ?>


