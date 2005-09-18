<?
$title = "打包 - 软件包描述文件";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/09/18 21:16:57';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="打包 Contents"><link rel="next" href="policy.php?phpLang=zh" title="打包相关规则"><link rel="prev" href="intro.php?phpLang=zh" title="介绍">';


include_once "header.zh.inc";
?>
<h1>打包 - 2. 软件包描述文件</h1>



<h2><a name="trees">2.1 文件树结构</a></h2>
<p>
软件包描述文件保存在 <code>/sw/fink/dists</code> 目录树内的 <code>finkinfo</code> 目录中。
<code>/sw/etc/fink.conf</code> 中的 "Trees" 设置控制会控制应该读取那个目录。
软件包描述文件的名字必须要软件包全名加上 ".info" 扩展名组成。
从 fink 0.13.0 开始，为了简化软件包的升级，也可以允许简单地使用软件包加 ".info" 来组成。
</p>
<p>
到软件包描述文件的目录树由几层目录组成。
自上而下顺序为：
</p>
<ul>
<li><code>dists</code> 是目录的起点。<code>dists</code>
对 Debian 工具来说是必须的。</li>
<li>发布类型。可以是 <code>stable</code>，
<code>unstable</code> 和 <code>local</code>。<code>local</code>
目录由本机的管理员／用户控制。<code>stable</code> 和 <code>unstable</code> 目录则是 Fink 的一部分。</li>
<li>目录树。<code>main</code> 目录树包含软件包的实际部分。加密功能的软件被放到一个称为 <code>crypto</code> 的单独的目录树中，使得需要删除的时候会容易一些。</li>
<li><code>finkinfo</code>
及 <code>binary-darwin-powerpc</code>。<code>finkinfo</code> 目录中包含了  Fink 软件包描述文件和补丁，而
<code>binary-darwin-powerpc</code> 则包含了 <code>.deb</code>
二进制软件包。</li>
<li>分组。<code>main</code>目录树按类别被分成几组以方便管理。<code>crypto</code> 目录树目前没有被分组。</li>
</ul>


<h2><a name="format">2.2 文件格式</a></h2>
<p>
描述文件只是键－值对的简单列表，一个键－值对有时也称为一个“字段”。
每一行由一个以冒号（:）为结束的键开始，然后跟着是相对应的值，就象这样：
</p>
<pre>Key: Value</pre>
<p>
当你需要把一个分成几行书写的时候，可以有两种标记办法。
</p><p>
推荐的方式是通常用于在 shell 脚本 here-document 语法。这种方法第一行是键，然后跟着以 <code>&lt;&lt;</code> 为它的取值。
在这之后，在下一个 <code>&lt;&lt;</code> 之前的所有行会被视作实际的取值。
下面是一个例子：
</p>
<pre>InstallScript: &lt;&lt;
mkdir -p %i/share/man
make install prefix=%i mandir=%i/share/man
mkdir -p %i/share/doc/%n
install -m 644 COPYING %i/share/doc/%n
&lt;&lt;</pre>
<p>
在这种格式下，缩进是可选的，但它可以改进可阅读性。
</p><p>
这种 here-document 语法格式可以嵌套使用。这通常使用于 <code>SplitOff</code> 或 <code>SplitOff<b>N</b></code> 字段。
这些字段包含其它字段（多行），因此通过这种语法可以使得子字段也可以具有多行。在子的 here-document 块中同样使用的 <code>&lt;&lt;</code> 作为终结符。
下面是一个例子：
</p>
<pre>
SplitOff: &lt;&lt;
  Package: %N-shlibs
  InstallScript: &lt;&lt;
    ln -s %p/lib/libfoo.2.dylib %i/lib/libfoo.%v.dylib
  &lt;&lt;
&lt;&lt;
</pre>
<p>
另外一种旧的，已经过时的标记方法是参照 RFC 822 数据包头的分行方式。
以空白字符开始的行会被当作上一行的继续。
例子：
</p>
<pre>InstallScript: mkdir -p %i/share/man
 make install prefix=%i mandir=%i/share/man
 mkdir -p %i/share/doc/%n
 install -m 644 COPYING %i/share/doc/%n</pre>
<p>
注意上面续行中强制要求的缩进格式。
</p><p>
在两种格式中，空行或以井号（#）打头的行都会被忽略。
键（字段名）在 Fink 中是区分大小写的，你可以随便使用
<code>InstallScript</code>，<code>installscript</code> 或
<code>INSTALLSCRIPT</code>。
不过，建议使用首字母大写的方式以方便阅读。
对于那些使用布尔值的字段－"true"，"yes"，"on"，"1"（不区分大小写），都会被认为是真值，而其它的值则会被认为是假值。
</p>


<h2><a name="percent">2.3 百分号展开</a></h2>
<p>
为了简化一些书写，Fink 在一些字段中支持一套展开（替换）规则。
为了避免含混，你可以使用大括号来指明确切是那些字母需要作为百分号展开。
例如，<code>%{n}</code> 与 <code>%n</code> 的含义是一样的。
目前支持的展开包括：
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left"></th><th align="left"></th></tr><tr valign="top"><td>%n</td><td>
<p>
当前软件包的名字（<b>n</b>ame）
</p>
</td></tr><tr valign="top"><td>%N</td><td>
<p>
父软件包的名字（<b>N</b>ame），除非在 <code>SplitOff</code> 中，否则应该和 %n 相同
</p>
<p>
注意：如果父 <code>Package</code> 字段包含 %type_*[]，那些百分号扩展的值<b>将</b>被包括在 <code>SplitOff</code> 块的 %N 中(因为它们被包括在父字段的 %n 中)。
</p>
</td></tr><tr valign="top"><td>%e</td><td>
<p>
软件包的额外版本标识（<b>e</b>poch）。它主要用于强行替代版本号的顺序，比方说你现在已经有一个 2.0Beta1 版，然后现在 2.0 版出来了，显然 2.0 版应该是一个更新的版本。但是 字符串比较的结果却是 2.0Beta1 &lt; 2.0。所以，要么你只能把 2.0 命名为 2.0Final，要么你使用 epoch 来强行制定版本的先后顺序。比方说：epcho 1, version 1.0 是一个比 epcho 0, version 2.0 更新的版本。
</p>
</td></tr><tr valign="top"><td>%v</td><td>
<p>
软件包的版本号（<b>v</b>ersion）
</p>
</td></tr><tr valign="top"><td>%r</td><td>
<p>
软件包的修订版号（<b>r</b>evision）
</p>
</td></tr><tr valign="top"><td>%f</td><td>
<p>
完整的（<b>f</b>ull）软件包名，即 %n-%v-%r
</p>
</td></tr><tr valign="top"><td>%p, %P</td><td>

<p>
the <b>p</b>refix where Fink is installed, e.g. <code>/sw</code>. You must not assume all users have Fink installed in <code>/sw</code>; use <code>%p</code> to ge the correct path.
</p>

</td></tr><tr valign="top"><td>%d</td><td>
<p>
要打包的全套文件将被构建于的目标（<b>d</b>estination）目录，例如：
<code>/sw/src/fink.build/root-gimp-1.2.1-1</code>。
这个临时目录在编译过程的安装阶段将作为根目录位置。
你不应该假设 <code>root-%f</code> 会在 <code>%p/src</code> 中，因为用户可以通过 <code>/sw/etc/fink.conf</code> 文件中的 <code>Buildpath</code> 字段来改变它的位置。
</p>
</td></tr><tr valign="top"><td>%D</td><td>
<p>
父文件包的目标（<b>D</b>estination）目录（除非是在 <code>SplitOff</code> 中，否则和 %d 相同）
</p>
</td></tr><tr valign="top"><td>%i</td><td>
<p>
安装态（<b>i</b>nstall-phase）的完整路径前缀，等于 %d%p。安装态是指从源代码编译安装到临时位置后的状态，然后我们需要把它封装成 .deb 包。
</p>
</td></tr><tr valign="top"><td>%I</td><td>
<p>
父软件包的安装（<b>I</b>nstall）态路径前缀，等于 %D%P（除非是 <code>SplitOff</code> 中，否则应该和 %i 相等）
</p>
</td></tr><tr valign="top"><td>%a</td><td>
<p>
补丁（p<b>a</b>tches）程序所在的路径
</p>
</td></tr><tr valign="top"><td>%b</td><td>
<p>
构建（<b>b</b>uild）过程所在的目录，例如：<code>/sw/src/fink.build/gimp-1.2.1-1/gimp-1.2.1</code>。
你不应该假设 <code>%f</code> 一定在 <code>%p/src</code> 中，因为用户可以通过 <code>/sw/etc/fink.conf</code> 文件中的 <code>Buildpath</code> 字段来改变它。
最内部的目录根据 <code>Source</code> 文件名来命名，或是 <code>SourceDirectory</code> 字段(如果存在的话)的值，或在 <code>NoSourceDirectory</code> 为 <code>true</code> 的时候不使用它。
</p>
<p>
注意：仅在没有其它选择的情况下才使用它。构建目录是脚本运行的当前目录；在命令中你应该使用相对路径。
</p>
</td></tr><tr valign="top"><td>%c</td><td>
<p>
<b>c</b>onfigure 命令将使用的参数：<code>--prefix=%p</code> 加上 ConfigureParams 指定的其它参数。
</p>
</td></tr><tr valign="top"><td>%m</td><td>
<p>
机器（<b>m</b>achine）体系架构类型字符串，这和
<code>uname -p</code> 的输出一致。目前 'powerpc' 代表 ppc 类的计算机，'i386' 代表 x86 类（在 0.12.1 之后的一个 CVS 版本开始引入）
</p>
</td></tr><tr valign="top"><td>%%</td><td>
<p>
百分号字符（它部分展开后面跟着它的东西）。展开严格按照从左到右的顺序进行，所以 %%n 和软件包名没有关系，而只是字符串 %n。（从 fink-0.18.0 开始引入）
</p>
</td></tr><tr valign="top"><td>%type_raw[<b>类型</b>], %type_pkg[<b>类型</b>]</td><td>
<p>
对给定<b>类型</b>返回的代表子类型的伪哈希值。
查阅本文档后面关于 <code>Type</code> 字段的内容。
_raw 形式表明使用子类型字符串的精确形式，
_pkg 形式表明使用去除句点之后的形式(就好象 Fink 的语言版本软件包的命名约定一样)。(在 fink 的 CVS 0.19.2 后版本中引入)。
</p>
</td></tr><tr valign="top"><td>%{ni}, %{Ni}</td><td>
<p>
软件包的固定名称(<b>n</b>ame <b>i</b>nvariant)部分。
它们和 %n 和 %N 类似，除了所有 %type_pkg[] 和 %type_raw[] 被去掉。
(在 fink 的 CVS 0.19.2 后版本中引入)。
你应该使用 %{ni} 和 %{Ni} 以避免与 %n 和 %N 扩展相混淆。
</p>
</td></tr><tr valign="top"><td>%{default_script}</td><td>
<p>
Valid only in <code>PatchScript</code>, <code>CompileScript</code>, and <code>InstallScript</code> fields, the default contents of
that type of field. The value is often dependent on
the <code>Type</code> field, and is always defined (though it may be
blank). When used in the <code>InstallScript</code> of a <code>SplitOff</code> (or <code>SplitOff<b>N</b></code>), this
expansion will yield the <b>parent's</b> default, even though the
default for <code>InstallScript</code> in a <code>SplitOff</code>
package is blank. (Introduced in fink-0.20.6)
</p>
</td></tr></table>



<p align="right"><? echo FINK_NEXT ; ?>:
<a href="policy.php?phpLang=zh">3. 打包相关规则</a></p>
<? include_once "../../footer.inc"; ?>


