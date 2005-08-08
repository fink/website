<?
$title = "移植 - 为 10.2 做准备";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2005/08/08 02:59:00';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="移植 Contents"><link rel="next" href="preparing-10.3.php?phpLang=zh" title="为 10.3 做准备"><link rel="prev" href="libtool.php?phpLang=zh" title="GNU libtool">';


include_once "header.zh.inc";
?>
<h1>移植 - 4. 为 10.2 做准备</h1>




<h2><a name="bash">4.1 bash shell</a></h2>
<p>
Fink 使得从 OS X 10.0 到 OS X 10.1 的转换很容易， 这得益于在转换到来之前就已经做好了计划。
我们计划在下一次转换到来之前也做好准备，但现在还不是太多的细节。
</p>
<p>我们直到 OS X 10.2 将使用 bash 而不是 zsh 来提供
<code>/bin/sh</code> 的功能。这至少对 fink 有三点联系。
</p>
<ul><li>
过去，一些 fink 软件包会创建了一个 CompileScript (或 PatchScript 或
InstallScript)，它并不实际做什么事情，而只是简单的在脚本里面放一个分号。
这种做法在 bash 下面是不行的，而必需替换为
<pre>
  CompileScript: echo "nothing to do"
</pre>
</li>
<li>
过去，一些 fink 软件包使用 <code>lib(foo|bar).dylib</code>
结构来同时引用两个库；现在在 bash 底下不能这么使用 (bash 里面的替代语句 <code>lib{foo,bar}.dylib</code> 在 zsh 下不能使用)。解决方案：完整地写出名字。
</li>
<li>
在很多情况下，需要使用一个 libtool 补丁，来避免在 bash 下面构建没有版本的库。<b>注意：对于 libtool-1.3.5 你不需要这些补丁，比如，你使用 UpdateLibtool:
 True。</b>
现象：在 bash 下执行构建操作，
你看到
<pre>
../libtool: test: too many arguments
</pre>
当发生这种情况时，<code>configure</code> 会包含下面的内容：
<pre>
archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $(test -n "$verstring" -a x$verstring != 
x0.0 &amp;&amp; echo $verstring)'
</pre>
下面是一个补丁(但必需小心使用，因为有些时候同时会有其它的 libtool 问题，所以这个补丁必需手工应用)：
<pre>
diff -Naur gdk-pixbuf-0.16.0/configure gp-new/configure
--- gdk-pixbuf-0.16.0/configure 2002-01-22 20:11:48.000000000 -0500
+++ gp-new/configure    2002-05-10 03:02:44.000000000 -0400
@@ -3338,7 +3338,7 @@
      # FIXME: Relying on posixy $() will cause problems for
      #        cross-compilation, but unfortunately the echo tests do not
      #        yet detect zsh echo's removal of \ escapes.
-    archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $(test -n "$verstring" -a x$verstring != 
x0.0 &amp;&amp; echo $verstring)'
+    archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $tmp_verstring'
      # We need to add '_' to the symbols in $export_symbols first
      #archive_expsym_cmds="$archive_cmds"' &amp;&amp; strip -s $export_symbols'
      hardcode_direct=yes
diff -Naur gdk-pixbuf-0.16.0/ltmain.sh gp-new/ltmain.sh
--- gdk-pixbuf-0.16.0/ltmain.sh 2002-01-22 20:11:43.000000000 -0500
+++ gp-new/ltmain.sh    2002-05-10 03:04:49.000000000 -0400
@@ -2862,6 +2862,11 @@
        if test -n "$export_symbols" &amp;&amp; test -n "$archive_expsym_cmds";
	then
          eval cmds=\"$archive_expsym_cmds\"
        else
+         if test "x$verstring" = "x0.0"; then
+           tmp_verstring=
+         else
+           tmp_verstring="$verstring"
+         fi
          eval cmds=\"$archive_cmds\"
        fi
        IFS="${IFS=     }"; save_ifs="$IFS"; IFS='~'
</pre>
</li>
</ul>

<h2><a name="gcc3">4.2 gcc3 编译器</a></h2>

	<p>Mac OS X 10.2 使用 gcc3 编译器。</p>
	
	<p>一些使用可加载模块及 libtool 的软件包会因为一个 install_name 错误而失败，因为 libtool 甚至会和 -bundle 标志一起传递 -install_name 标志(即使这不是严格必需的)。
	这种情况在 gcc2 编译器下是可接受的，那对 gcc3 就不行了。修正方法可以在<a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02025.html">这里</a>找到。
注意，如果你的软件包使用 libtool-1.3.5
(例如，如果你使用 <code>UpdateLibtool: True</code>)，你不需要这个补丁。
因为它已经被包括到 fink 的 ltconfig 文件的修订版本中了(在 fink 的预发布版本中提供)。
</p>

<p>另外一个关于 gcc3 编译器的问题是 gcc2 和 gcc3 之间对 C++ ABI 的不兼容性。
在实践中，这意味着用 gcc3 编译的 C++ 程序不能链接到用 gcc2 编译的库。</p>




<p align="right"><? echo FINK_NEXT ; ?>:
<a href="preparing-10.3.php?phpLang=zh">5. 为 10.3 做准备</a></p>
<? include_once "../../footer.inc"; ?>


