<?
$title = "打包 - 规则";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2008/08/27 05:20:53';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="打包 Contents"><link rel="next" href="fslayout.php?phpLang=zh" title="文件系统布局"><link rel="prev" href="format.php?phpLang=zh" title="软件包描述文件">';


include_once "header.zh.inc";
?>
<h1>打包 - 3. 打包相关规则</h1>



<h2><a name="licenses">3.1 软件包授权协议</a></h2>
<p>
Fink 中包括的软件包包括很广范围的授权协议种类。
多数都对重新发布全部源代码有限制，尤其对发布二进制版本有限制。
有些软件包因为这些授权协议而不能提供二进制发行版。因此，很重要的一点是软件包的维护者需要仔细地检查他们维护的软件包的授权协议限制。
</p>
<p>
每个以二进制包形式发布的软件都必须包含一些授权协议。
它必须被安装在 doc 目录，
也就是说：<code>%p/share/doc/%n</code>。
（当然，在 InstallScript 中，应该用 %i 代替 %p。DocFiles 字段会自动处理这些细节。）
如果在原始的程序中没有明确的授权协议声明，那个包含一小段文字来说明这个软件包的状态。
多数的授权协议要求在发布版中包括一份授权协议。
Fink 的规则要求总是这么做，即使软件本身没有明确要求。
</p>
<p>
为了使得二进制发行版的维护可以自动化，所有准备发布的软件包都必须有一个 <code>License</code> 字段。
这个字段表明授权协议的性质，并被用于决定是否为它制作二进制发行版。
按照前面解释的原因，只有在实际的授权协议条文被放进二进制包中，这个字段才会起作用。</p>
<p>
要使得 <code>License</code> 字段有用，必须使用下面之一的预定义值。
如果你在打包的程序并不适合下面中的一种，请在开发者邮件列表中要求帮助。
</p>
<ul>

<li><code>GPL</code>－GNU 通用公开授权协议。这个协议要求与二进制包一起提供源代码。</li>
<li><code>LGPL</code>－GNU 较宽松通用公开授权协议。
这个协议要求与二进制包一起提供源代码。</li>
<li><code>GPL/LGPL</code>－这是一种混合使用 GPL 和 LGPL 的特殊情况，比如说可执行程序部分使用 GPL，而库部分则使用 LGPL。</li>

<li><code>BSD</code>－BSD 风格授权协议。
这包括：称为"原始的" BSD 授权协议，"修改的"" BSD
授权协议和 MIT 授权协议。Apache 授权协议也被认为是 BSD 的一种。这些协议下发布源代码是可选的。</li>

<li><code>Artistic</code>－对于 Artistic 授权协议及其派生授权协议。</li>

<li><code>Artistic/GPL</code>－在 Artistic 和 GPL 下的双重授权协议。</li> 

<li><code>GNU Free Documentation License</code> 和 <code>Linux
Documentation Project</code>－如果文档中的其中一个软件包明显地被指出是这两种授权协议之一。那么应该在原来的协议后面加上 <code>/GFDL</code> 或 <code>/LDP</code>，这应该是下面的组合之一："GFDL"，"GPL/GFDL"，"LGPL/GFDL"，"GPL/LGPL/GFDL"，"LDP"，或"GPL/LGPL/LDP"。
</li>


<li><code>DFSG-Approved</code> - for software that meets the guidelines
of the <a href="http://www.debian.org/social_contract">Debian Social Contract</a>.
</li>


<li><code>OSI-Approved</code>－那些由<a href="http://www.opensource.org/">开放源码组织</a>所批准的开放源码授权协议。OSI 的要求之一是二进制文件和源代码的自由发放。这个值也用于对双重协议的软件包的遮蔽。</li>

<li><code>Restrictive</code>－限制性授权协议。
用于那些作者允许免费使用源代码，但不允许自由地重新发布的软件包。</li>

<li><code>Restrictive/Distributable</code>－针对那些允许发布源和二进制包的限制性授权协议。这应用那些提供源程序，允许对源程序和二进制包进行再发布，但是却有些限制性的条款使得它称为非开源协议的软件包。</li>

<li><code>Commercial</code>－对于限制性，商业授权协议。
应用商业软件包（比如：免费软件，共享软件），它们不允许对源程序或二进制程序进行自由的重发布。</li>

<li><code>Public Domain</code>－对于那些在公开域的软件包，即那些作者放弃对代码的版权的软件。这些软件包没有授权协议，任何人都可以随意使用它。</li>

</ul>




<h2><a name="openssl">3.2 The GPL and OpenSSL</a></h2>
<p>
(Policy change effective April, 2005.)
</p>
<p>
Due to the apparent incompatibilty of the OpenSSL license with the GPL and 
LGPL licenses, fink packages which link to openssl but are licensed under 
the GPL or LGPL are marked as "Restrictive."  As a consequence, the Fink 
project will not distribute binaries of such packages, although users are 
free to compile them from source at their discretion.
</p>
<p>
Package maintainers are encouraged to record the original package license in 
the <code>DescPackaging</code> field.
</p>




<h2><a name="prefix">3.3 避免干扰基本系统</a></h2>
<p>
Fink 是一个安装在基本系统之外的独立目录里面的外加的软件系统。
保证不要把文件安装到 Fink 的目录之外对一个软件包来说是非常重要的。
</p>
<p>
唯一的例外是没有其它的选择的情况下，比如：XFree86。
这种情况下，软件包必须在安装前检查现有的文件，如果发现可能要覆盖现有的文件，它应该拒绝安装。
软件包必须要保证它安装在 Fink 目录之外的文件要能够在删除软件包的时候同时被删除。或者留在那里保证不会造成危害（就是说，他们需要在调用它之前检查它是否在那里）。
</p>


<h2><a name="sharedlibs">3.4 共享函数库</a></h2>
<p>
Fink 对于共享库有了新的规则，它从 2002 年 2 月开始生效。
本段内容讨论的是规则的第四版，它是与 Fink's 0.5.0 一同发布的

as modified in December, 2006 to handle 64bit libraries
and from January, 2008 to handle private shared libraries. (In addition,
the discussion was updated in June, 2008 to eliminate obsolete references to a
transitional period for implementing the shared libraries policy.)
We begin with a quick summary, and then discuss things in more detail.

我们首先以一个简要的概括开始，然后讨论更多的细节问题。
</p><p>
任何会产生共享库的软件包，都应该使得他们的库满足 Fink 的规则。即：</p>
<ul>
<li>   使用 <code>otool -L</code> (或 otool64 -L for 64bit libraries) 验证每个库的安装名（install_name），兼容性和当前版本号是正确的。</li>
<li>   把共享库放到一个单独的软件包（除了从 libfoo.dylib 连接 install_name 的以外），并在软件包中包括 <code>Shlibs</code> 字段</li>
<li>   把头文件以最终从 libfoo.dylib 的连接放到一个软件包中，并分类为： <code>BuildDependsOnly: True</code>，应该不会有其他软件包会依赖它。</li>
</ul>

<p>Note that a package may also install private shared libraries, which
are not intended to be linked from any other package.  In this case, the
libraries need not go into a separate package, but a <code>Shlibs</code>
field must still be part of the package containing shared libraries.  Also,
maintainers should try to avoid storing a final link from libfoo.dylib
in the main library directory <code>%i/lib</code> 
(or its 64-bit equivalent), to prevent
other programs from accidentally linking to this library.
</p>
<p>
  如果某个维护者因为某个原因而不能遵循这个规则，没有分离软件包的话，应该在 DescPackaging 字段中说明原因。
</p><p>
对于一些软件，可以通过一个主软件包和一个 -shlibs 软件包来组成；另外的一些情况下，你还需要第三个软件包。新的
<code>SplitOff</code> 字段正是为了简化这种情况。
</p><p>
当需要第三个软件包的时候，有两种不同的命名办法，取决于共享库是软件包的主要功能(情况一)，还是可执行程序是主要功能(情况二)。对于第一种情况，使用下面的命名模式：
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>共享库</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>头文件</p></td></tr><tr valign="top"><td><code>foo-bin</code></td><td><p>二进制执行文件，等等</p></td></tr></table>

<p>对于第二种情况，使用下面的命名模式：</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>共享库</p></td></tr><tr valign="top"><td><code>foo-dev</code></td><td><p>头文件</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>二进制执行文件，等等</p></td></tr></table>

<p><b>规则细节</b></p>
<p>
我们现在讨论更多的细节。我们使用 libpng，libjpeg 和 libtiff 软件包作为规则的实际例子。
</p><p>
已经移植到 Darwin 的软件应该尽可能编译共享库（当然，根据软件包的实际需要，维护者也可以选择编译静态库；如果他们愿意的话，也可以只提交包含静态库的版本）。
当编译共享库的时候
，应该创建<b>两个</b>密切相关的 fink 软件包，分别名为 foo 
和 foo-shlibs。共享库放到 foo-shlibs 中，而头文件在放到 foo 中。这两个软件包可以用同一个 .info 文件产生，象下面描述的那样，使用 <code>SplitOff</code> 字段（事实上，通常需要从源程序中编译出不止两个软件包，这时可以使用 <code>SplitOff2</code>，<code>SplitOff3</code>…，等等）
</p><p>


Each software package for which public shared libraries are built must have
a <b>major version number</b> N, which is included in the shared
library's filename (for example, <code>libbar.N.dylib</code>).

当共享库的 API 不再后向兼容以后，才会去改变主版本号。Fink 使用下面的命名约定：如果上游的软件包叫做 bar，那么 fink 软件称为 barN 和 
barN-shlibs（只有在新软件包或主版本号发生改变的软件包上，才会严格应用这个规则）。例如，现存的 libpng 软件包的主版本号是 3，但当前版本的库的主版本号是 3。所以现在有四个软件包：libpng, libpng-shlibs, libpng3, libpng3-shlibs。
在 libpng 和 libpng3 之间只能同时安装一个，但 libpng-shlibs 和 libpng3-shlibs 则可以同时安装。
（注意创建这四个软件包只需要两个 .info 文件）
</p><p>
共享库本身和一些相关文件会被放到 barN-shlibs 软件包中；头文件和一些其它文件会被放到 barN 的软件包。两个软件包中间没有相同的文件，放在 barN-shlibs 的文件的路径应该包含主版本号 N。多数情况下，你的软件包在运行时需要的文件原本时安装到 <code>%i/lib/bar/</code> 或 
<code>%i/share/bar/</code> 目录中；你应该把安装路径调整到 <code>%i/lib/bar/N/</code> 或
<code>%i/share/bar/N/</code>。
</p><p>
所有依赖于主版本号为 N 的 bar 软件包的其它软件，需要使用依赖关系
</p>
<pre>
  Depends: barN-shlibs
  BuildDepends: barN
</pre>
<p>
It is not be permitted for 
another package to depend on barN itself.  (Although there may still be
a few such dependencies involving packages which were in place prior to 
February, 2002.)  This is
signaled to other developers by a boolean field
</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>
来告诉其它开发者。
</p><p>
如果你的软件包包括共享库和二进制文件，而且二进制文件需要在运行时使用（而不仅仅时编译时），那么这些二进制文件应该被分离到第三个软件包中，这个软件包命名为 barN-bin。其它软件包可以依赖于 barN-shlibs 及 barN-bin。
</p><p>
当编译主版本号为 N 的共享库时，很重要的是要使 <code>%p/lib/libbar.N.dylib</code> 来作为 "install_name"。（你可以用 <code>otool -L</code> 或 otool64 -L for 64bit libraries 来查看你的库的 install_name）。实际的库文件应该被安装在
</p>
<pre>
  %i/lib/bar.N.x.y.dylib
</pre>
<p>
而你的软件包应该创建符号链接
</p>
<pre>
  %i/lib/libbar.N.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/libbar.dylib -&gt; %p/lib/libbar.N.x.y.dylib
</pre>
<p>from the install_name path and from the linking path to the actual
library.  (The first will not be needed if the library is in fact
installed at the install_name path, which is becoming more common.)
</p>
<p>
如果还构建了静态库，那么它应该被安装在
</p>
<pre>
  %i/lib/libbar.a
</pre>
<p>
如果软件包使用 libtool，这些事情通常会被自动处理，
但无论任何情况下，你都应该检查结果时候正确。你还应该检查你的共享库是否已经定义了正确的 current_version 和 compatibility_version 值（
<code>otool -L</code> 或 <code>otool64 -L</code> for 64bit libraries 应该也可以查询得到这些设置值）。
</p><p>
文件应该象下面一样分到两个文件包中
</p>
<ul>
<li>  在 barN-shlibs 软件包中：
<pre>
  %i/lib/libbar.N.x.y.dylib
  %i/lib/libbar.N.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/libbar/N/*
  %i/share/bar/N/*
  %i/share/doc/barN-shlibs/*
</pre></li>
<li>  在 barN 软件包中：
<pre>
  %i/include/*
  %i/lib/libbar.dylib -&gt; %p/lib/libbar.N.x.y.dylib
  %i/lib/libbar.a
  %i/share/doc/barN/*
  如果需要的话，包括其它文件
</pre></li></ul>
<p>
注意两个文件包都需要一些关于授权协议的文档，但包括文档文件的目录是不同的。
</p><p>
在实践中使用它是很容易的，这可以使用 
<code>SplitOff</code> 字段。下面是关于如何实现上面情况的例子（部分）：
</p>
<pre>
Package: barN
Version: N.x.y
Revision: 1
License: GPL
Depends: barN-shlibs (= %v-%r)
BuildDependsOnly: True
DocFiles: COPYING
SplitOff: &lt;&lt;
  Package: barN-shlibs
  Files: lib/libbar.N.x.y.dylib lib/libbar.N.dylib lib/bar/N
  DocFiles: COPYING
&lt;&lt;
</pre>
<p>
在 <code>SplitOff</code> 字段执行的时候，有关的文件和目录会被从主文件包的 %I 安装目录移动到剥离的文件包的 %i 目录（对于名字同样有类似的约定：%N 是主软件包的名字，%n 是当前软件包的名字）。
<code>DocFiles</code> 命令然后会把一份文档放到
<code>%i/share/doc/barN-shlibs</code> 中。
</p><p>
注意我们已经把当前版本的 barN-shlibs 包含为主软件包 barN（
%N-shlibs (= %v-%r) 的缩写）的依赖关系。
这可以确保版本会匹配，而且保证 barN
自动继承 "inherits" barN-shlibs 的所有依赖关系。
</p>

<p><b>The BuildDependsOnly field</b>
</p><p>
When libraries are being upgraded over time, it is often necessary to have
two versions of the header files available during a transition period,
with one version used for compiling some things and the other version
used for compiling others.  For this reason, the packages containing
header files must be constructed with some care.  If both foo-dev and
bar-dev contain overlapping headers, then foo-dev should declare
</p>
<pre>
  Conflicts: bar-dev
  Replaces: bar-dev
</pre>
<p>and similarly bar-dev declares Conflicts/Replaces on foo-dev.
</p><p>
In addition, both packages should declare
</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>This inhibits others from writing packages which depend on foo-dev or
bar-dev, since any such dependency will prevent the smooth operation of the
Conflicts/Replaces method.
</p><p>
There are some packages containing header files for which it's not
appropriate to declare BuildDependsOnly to be true.  In that case,
the package should declare
</p>
<pre>
  BuildDependsOnly: False
</pre>
<p>and the reason must be given in the DescPackaging field.
</p><p>
The BuildDependsOnly field should only be mentioned in the package's .info
file if the package contains header files, installed into /sw/include.
</p><p>
As of fink 0.20.5, "fink validate" will issue a warning for any .deb
which contains header files and at least one dylib, and does not declare
BuildDependsOnly to be either true or false.  (It is possible that in
future versions of fink, this warning will be expanded to cover the case of
a .deb with header files and a static library as well.)
</p>
<p>
  The goal of the Shared Library Policy is to allow assure
  compatibility between libraries supplied by one package and
  libraries or programs that use them in a different package. Some
  packages may have shared libraries that are not designed to be used
  by other packages. Common situations include a suite of programs
  that come with a back-end library of utility functions or a program
  that comes with plugins to handle various features. Because these
  libraries are "private" to the package that has them, they do not
  require being packaged with separate -shlibs
  or <code>BuildDependsOnly</code> SplitOffs.
</p>
<p><b>Shlibs 字段：</b>
</p><p>
除了把共享库放到合适的软件包中外，作为规则版本 4，你还需要用 <code>Shlibs</code> 字段声明全部共享库。

This field has one line for each
shared library, which contains the <code>-install_name</code> of the
library. If the library is public, its <code>Shlibs</code> entry also
lists the <code>-compatibility_version</code>, versioned
dependency information specifying the Fink package which provides
this library at this compatibility version, and the library
architecture.  (The library architecture may either be "32", "64", or
"32-64", and may be absent; the value defaults to "32" if it is absent.)

依赖关系应该用 <code>foo (&gt;= version-revision)</code> 的形式指明。其中
<code>version-revision</code> 指提供这个与（本版本兼容）的共享库的 Fink 软件包的<b>第一个</b>版本。例如，这样</p>
<pre>
  Shlibs: &lt;&lt;
    %p/lib/libbar.1.dylib 2.1.0 bar1 (&gt;= 1.1-2) 32
  &lt;&lt;
</pre>
<p>一个声明表示从 <b>bar1</b> 软件包的版本 1.1-2 开始，已经开始安装一个 <code>-install_name</code> 为 %p/lib/libbar.1.dylib，<code>-compatibiliary_version</code> 为 2.1.0 的函数库。另外，这个声明还表示维护者承诺这个名字及 compatibility-version 至少为 2.1.0 以上的 (32bit) 函数库可以在 <b>bar1</b> 软件包的以后版本中找到。
</p><p>
注意在库的名字中使用 %p，这使得无论他们选择什么安装路径前缀，Fink 的所有用户都可以找到正确的 <code>-install_name</code> 代表的函数库。
</p><p>
当一个软件包被更新的时候，通常 <code>Shlibs</code> 字段会被简单地拷贝到软件包的下一个版本／修订版中。例外的情况是如果 <code>-compatibility_version</code> 增加了：那种情况下，依赖信息的版本号应该改变到当前的版本号／修订版号（这是使用新兼容版本号的第一个函数库）。
</p>

<p>
The <code>Shlibs</code>
entry for a private library uses a different syntax:
</p>
<pre>
  Shlibs: &lt;&lt;
    !%p/lib/%N/libbar.1.dylib
  &lt;&lt;
</pre>
<p>The leading exclamation point indicates that this is a private library,
and since the other information is not relevant in this case, it is 
not included.</p>
<p>Note that in this example, the private shared library has been placed
in its own subdirectory <code>%N</code> of the 
<code>%i/lib</code> directory (which was named after the
package).  This is a recommended procedure for private libraries,
as an additional safety measure, to prevent other packages from accidentally
linking to this library.
</p>

<p><b>当主版本号发生变化的时候应该做什么：</b>
</p><p>
如果主版本号从 N 改到了 M，你需要创建两个新的软件包 barM 和 barM-shlibs。 软件包 barM-shlibs 可以不覆盖 barN-shlibs，因为许多用户会同时安装这两个版本。在软件包 barM 中，你应该使用依赖关系
</p>
<pre>
  Conflicts: barN
  Replaces: barN
</pre>
<p>
类似地，你应该修改 barN 来包括依赖关系
</p>
<pre>
  Conflicts: barM
  Replaces: barM
</pre>
<p>
用户会看到在构建其它软件包的时候，根据不同的软件的设置，会选择连接 barN 或 barM 作为共享库。这样，我们实现 barN-shlibs 和 barM-shlibs 在系统里面的共存。
</p>
<p><b>Packages containing both binary files and libraries:</b></p>
<p>
如果上游软件包包含二进制文件和库，那么在构建 fink 软件包的时候有些事情需要特别注意。有些情况下，那些二进制文件仅仅是一些类似 <code>foo-config</code> 的程序 ，它们只需要在构建的时候使用，而不需要在运行时使用。这种情况下，二进制文件可以和头文件一样包括在 <code>foo</code>
软件包中。
</p><p>
其它情况下，这些二进制文件可能需要在运行时被其它软件包使用，这时，它们需要被剥离到一个单独的文件包中，这个软件包的名字大约是 <code>foo-bin</code>。<code>foo-bin</code> 软件包应该依赖于 <code>foo-shlibs</code> 软件包，其它软件包的维护者最好能够使用：
</p>
<pre>
  Depends: foo-bin
  BuildDepends: foo
</pre>
<p>
来隐式地处理 foo-shlibs。
</p><p>
在升级的时候会有一个问题，因为用户不会被提示安装 <code>foo-bin</code>。要避免这个问题，在全部其它软件包维护者象上面所说的一样修改它们的软件包之前，你的 <code>foo</code> 软件包可以这样声明：
</p>
<pre>
  Depends: foo-shlibs (= exact.version), foo-bin
</pre>
<p>
这可以强制安装 foo-bin 在多数用户的系统里面，只要有一天其它软件包维护者也升级了依赖于 <code>foo</code> 的软件包。
</p>

<p>
  As of fink-0.28.0 (released in January 2008), the format of
  the <code>Shlibs</code> entry for a "private" shared library has
  changed (see earlier discussion of the difference between a public
  and a private shared library). Note that the Shared Library Policy
  has always required all shared libraries to be listed; the change
  here is only in the syntax of the <code>Shlibs</code> field. Because
  this type of shared library is not designed to be used by external
  packages, there is no need to document its compatilibity or other
  versioning. Instead, an exclamation-mark is used.  For example,
  if <code>libquux.3.dylib</code> is
  the <code>install_name</code> of a private shared library, it would
  be listed as follows:
</p>
<pre>
  Shlibs: &lt;&lt;
    !%p/lib/libquux.3.dylib
  &lt;&lt;
</pre>



<h2><a name="perlmods">3.5 Perl 模块</a></h2>
<p>Fink 从 2003 年 5 月开始实施的对 perl 模块的规则，在 2004 年 4 月进行了修改。
</p><p>
传统上，关于 perl 模块的 Fink 软件包具有
<code>-pm</code> 后缀，并使用 <code>Type: perl</code> 
指令来构建，它把 perl 模块的文件保存在 <code>/sw/lib/perl5</code> 和/或
<code>/sw/lib/perl5/darwin</code>中。按照现行规则，这个存储位置仅允许用于那些与编译它们的 perl 程序版本无关的 perl 模块(同时也不应该依赖于那些不具备版本无关性的其它模块)。
</p><p>
那些版本相关的 perl 模块称为 XS 模块，
通常除了纯粹的 perl 子程序外，还包括编译好的 C 代码。有很多办法可以识别这个情况，包括存在带有 <code>.bundle</code> 后缀的文件等。
</p><p>
版本相关的 perl 模块必须使用标明版本号的 perl 程序来编译，比方说 <code>perl5.6.0</code>，而且必须把它的文件标准 perl 目录下面的一个标明版本号的子目录中，例如
<code>/sw/lib/perl5/5.6.0</code> 和 <code>/sw/lib/perl5/5.6.0/darwin</code>。习惯上，使用后缀 <code>-pm560</code> 的命名约定来代表针对 5.6.0 的 perl 模块。类似的存储和命名约定也会用于其它版本的 perl，包括 perl 5.6.1 (仅用于 10.2 代码树), perl 5.8.0 (仅用于 10.3 代码树), perl 5.8.1, perl 5.8.4, 和 perl 5.8.6。
</p><p>
<code>Type: perl 5.6.0</code> 指令会自动使用相应标定版本的 perl 程序，并把文件存储在正确的子目录中。
(这个指令从 fink 0.13.0 版本开始提供)。</p>
<p>按照 2003 年 5 月的规则，可以允创建一个 <code>-pm</code> 软件包，它实际是去加载 <code>-pm560</code> 或其它存在的相应版本的"束"软件包。按照 2004 年 4 月的规则，不再鼓励这样做，而且经过一个过渡期后，将会完全放弃这种做法。(唯一的例外是 <code>storable-pm</code> 软件包因为自举的需要仍然需要保持这种形式)。</p>

<p>As of fink 0.20.2, the system-perl virtual package automatically
"Provides" certain perl modules when the version of Perl present on
the system is at
least 5.8.0.  In the case of system-perl-5.8.1-1, these are:
<b>attribute-handlers-pm581, cgi-pm581, digest-md5-pm581, file-spec-pm581, 
file-temp-pm581, filter-simple-pm581, filter-util-pm581, getopt-long-pm581, 
i18n-langtags-pm581, libnet-pm581, locale-maketext-pm581, memoize-pm581, 
mime-base64-pm581, scalar-list-utils-pm581, test-harness-pm581, 
test-simple-pm581, time-hires-pm581.</b>
(This list was slightly different in fink 0.20.1: package maintainers are
encouraged to check to be sure that they are assuming the correct list.)
</p>
<p>
Users may have more than one version of perl installed at a time, so
any perl-versioned module packages must be written to allow more than
one version of themselves to be installed concurrently. One must use
care when installing manpages and binary or other script executables
in these packages in order to prevent installation conflicts due to
filename collisions. 
You are not allowed to have any files in a package whose name ends
with -pm<b>XYZ</b> that would have an identical pathname across
different <b>XYZ</b>. Using <code>Replaces</code> to allow the
same-named files to overwrite each other in different perl-versions of
these perl-module packages is no longer acceptable.
As a simple solution for manpages, starting in
March 2005, Fink has defined alternate locations in MANPATH:
<code>%p/lib/perl5/X.Y.Z/man</code> for each perl-X.Y.Z. You
no longer need to create mutually-exclusive -man or -doc SplitOff
packages. For
example, to avoid conflicts between uri-pm581 and uri-pm586, the
same-named <code>URI.3pm</code> manpage is installed
as <code>%p/lib/perl5/5.8.1/man/man3/URI.3pm</code> and
<code>%p/lib/perl5/5.8.6/man/man3/URI.3pm</code>,
respectively. Note that the default scripts provided by <code>Type:
perl X.Y.Z</code> have not changed, so you will have to locate the
manpages here manually in your <code>InstallScript</code>. If you
don't have a highly customized script, you can still use the default
one, and then simply move the files manually:
</p>
<pre>
%{default_script}
mv %i/share/man %i/lib/perl5/5.8.1
</pre>
<p>
That will move all manpages. If you wish to move only one section of
manpages (for example, only section 3, the module manpages, not script
manpages in section 1), a similar approach works:
</p>
<pre>
%{default_script}
mkdir -p %i/lib/perl5/5.8.1/man
mv %i/share/man/man3 %i/lib/perl5/5.8.1/man
</pre>
<p>
If you have executables, for example, demo or utility scripts
in <code>%p/bin</code>, you have several options. One example
is to put these files (and their associated manpages and/or other
related files) in a %N-bin splitoff package. Use of
<code>Conflicts</code> and <code>Replaces</code> fields ensures that
installation of different perl-version forms of these packages, which
contain files of the same name, is mutually excluve. The user can
install many different perl-versions of the runtime modules, and then
choose whichever one perl-version of the scripts he wants at a given
time. For example, Tk.pm comes with an
executable <code>ptksh</code>, so the set of tk-pm* packages
could be constructed as follows:
</p>
<pre>
Info2: &lt;&lt;
Package: tk-pm%type_pkg[perl]
Type: perl (5.8.1 5.8.4 5.8.6)
InstallScript: &lt;&lt;
  %{default_script}
  mkdir -p %i/lib/perl5/%type_raw[perl]/man
  mv %i/share/man/man3 %i/lib/perl5/%type_raw[perl]/man
&lt;&lt;
SplitOff: &lt;&lt;
  Package: %N-bin
  Depends: %N
  Conflicts: %{Ni}5.8.1, %{Ni}5.8.4, %{Ni}5.8.6
  Replaces: %{Ni}5.8.1, %{Ni}5.8.4, %{Ni}5.8.6
  Files: bin share/man/man1
&lt;&lt;
&lt;&lt;
</pre>
<p>
An alternative arrangement is to rename the scripts and their manpages
to include perl-version information. This method means there is no
naming conflict at all, so one does not need the mutually-exclusive
%N-bin splitoffs:
</p>
<pre>
Info2: &lt;&lt;
Package: tk-pm%type_pkg[perl]
Type: perl (5.8.1 5.8.4 5.8.6)
InstallScript: &lt;&lt;
  %{default_script}
  mkdir -p %i/lib/perl5/%type_raw[perl]/man
  mv %i/share/man/man3 %i/lib/perl5/%type_raw[perl]/man
  mv %i/bin/ptksh %i/bin/ptksh%type_raw[perl]
  mv %i/share/man/man1/ptksh.1 %i/share/man/man1/ptksh%type_raw[perl].1
&lt;&lt;
&lt;&lt;
</pre>
<p>
The user accesses ptksh for whichever perl she wants. For convenience,
one could use <code>update-alternatives</code> to allow users to be
able to access these by their generic (no perl-version) names as well.
</p>
<p>
Also as of March 2005, the location of manpages and modules installed
by fink packages for perl itself (packages perlXYZ and perlXYZ-core
other than the perl-version provided by Apple) has changed. As a
result of this relocation, other fink packages that supply updated
versions of core perl modules should not list any perlXYZ or
perlXYZ-core packages in the <code>Replaces</code> field.
</p>



<h2><a name="emacs">3.6 Emacs 规则</a></h2>
<p>Fink 项目选择遵循 Debian 项目针对 emacs 的规则，但稍微有些差别。
（Debian 规则文档可以在
<a href="http://www.debian.org/doc/packaging-manuals/debian-emacs-policy">
http://www.debian.org/doc/packaging-manuals/debian-emacs-policy</a> 找到）。
在 Fink 的规则中有两点区别。
首先，在 fink 中这个规则目前仅应用于 emacs20 和 emacs21 软件包，而不应用于 xemacs。（这在将来可能会有改变）。
第二，不象 Debian 的规则，Fink 软件包允许安装东西到 /sw/share/emacs/site-lisp 目录中。
</p>



<p align="right"><? echo FINK_NEXT ; ?>:
<a href="fslayout.php?phpLang=zh">4. 文件系统布局</a></p>
<? include_once "../../footer.inc"; ?>


