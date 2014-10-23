<?php
$title = "移植 - 基本知识";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:16';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="移植 Contents"><link rel="next" href="shared.php?phpLang=zh" title="共享代码"><link rel="prev" href="index.php?phpLang=zh" title="移植 Contents">';


include_once "header.zh.inc";
?>
<h1>移植 - 1. 基本知识</h1>
		
		

		<h2><a name="heritage">1.1 Darwin 的来历</a></h2>

			<p>Darwin 是从 NeXTStep / OpenStep 演化而来的类 Unix 操作系统。
			据资料上它最初从 4.4BSD Lite 分支出来。
			BSD 的继承关系在它上面仍然表现出来，事实上，最近 Darwin 仍然使用 FreeBSD 和 NetBSD 的代码来进行改进。</p>

			<p>Darwin 的核心基于 Mach 3.0，BSD 和专利的面向对象驱动层 IOKit 的结合。虽然 Mach 最初是一个微内核的设计，但在它之上的 BSD 核心则是全功能形式的，由于现在两者如此紧密地缠绕在一起，所以应该把它们看成一个整体单一的全功能内核。</p>

			<p>随 Darwin 提供的用户级工具主要是 BSD 家族的，而不是 Linux 所提供的 GNU 家族。
			不过苹果在这方面并不象其它 BSD 版本那么严格，而只是以一种折衷的态度来对待。
			例如，苹果同时提供 BSD make 和 GNU make，默认安装的是 GNU make。</p>
		
		

		<h2><a name="compiler">1.2 编译器和工具</a></h2>
			
			
			<p>简单地说：使用的编译器是从 gcc 衍生物，但安装为 <code>cc</code>；你可能需要修改 Makefiles。
			多数软件包都不能构建共享库。
			如果你获得有关宏的编译错误，使用 <code>-no-cpp-precomp</code> 选项。</p>

			<p>详细地说：Mac OS X 开发工具里面的编译器工具组合是一个怪兽。
			编译器是基于 gcc 2.95.2 套件的，但做了些修改以支持 Objective C 语言和一些 Darwin 特殊东西。
			预编译器 (<code>cpp</code>) 有两个版本。
			一个是从 gcc 2.95.2 来的标准的预编译器，另外一个是苹果编写的专门的预编译器，它支持对头文件的预编译。
			后者是默认使用的版本，因为它比较快一些。
			不过，一些代码不能用苹果的预编译器编译，所以你需要使用 <code>-no-cpp-precomp</code> 选项来转用标准的预编译器。
			(注意：我以前推荐 <code>-traditional-cpp</code> 选项。
			不过，在 GCC 3 中，它的含义发生了一些轻微的改变，使得对多数使用它的软件包都不可用了。
			<code>-no-cpp-precomp</code> 则对于当前的开发工具和将来基于 GCC 3 的编译器都会有相同的我们希望的效果。)</p>

			<p>汇编器是基于 gas 1.38 的。连接器不是基于 GNU 工具的。
			这在构建共享库的时候会有问题，因为 GNU libtool 和它产生的 configure 脚本不知道如何处理苹果的连接器。</p>
		
		

		<h2><a name="host-type">1.3 主机类型</a></h2>
			
			
			<p>简单地说：如果配置过程出现 "Can't determine host type" 错误，从 /usr/share/libtool (在 10.2 之前的版本是 /usr/libexec) 拷贝 config.guess 和 config.sub 文件到当前目录。</p>

			<p>详细地说：GNU 世界使用一个规范的格式来描述系统类型。
			它由三部分组成：cpu 类型，制造商和操作系统。
			有些时候会加上第四部分-这时第三部分表示内核，而第四部分表示操作系统。
			所有部分都使用小写字母，并以破折号连接。
			例如：<code>i586-pc-linux-gnu</code>，<code>hppa1.1-hp-hpux10.20</code>，<code>sparc-sun-solaris2.6</code>。
			对应于 Mac OS X 10.0 的主机类型是 <code>powerpc-apple-darwin1.3</code>。
			
			Versions of Mac OS X 10.2 bring various <code>powerpc-apple-darwin6.x.0</code> and 10.3 gives <code>powerpc-apple-darwin7.x.0</code>, where "x" depends on the exact OS version.
			
			</p>

			<p>许多使用 autoconf 的软件包需要知道它们所编译于的系统平台。(附注：为了支持交叉编译和移植，实际上会有三种类型-主机类型，构建类型，目标类型。通常来说，它们是相同的)。
			你可以把主机类型作为参数传递给 configure 脚本，或让它自己猜测。</p>

			<p>配置脚本使用两个配套的脚本来检测主机类型。<code>config.guess</code> 尝试猜测主机类型，<code>config.sub</code> 用于验证和规范主机类型。
			这些脚本是作为独立的实体进行维护的，但它们会被包括在每个使用它们的软件包中。
			直到最近，这些脚本才能够认识 Darwin 或 Mac OS X。
			如果你有一个不认识 Darwin 的软件包，你需要替换包括在软件包里面的 config.guess 和 config.sub 脚本。
			幸运的是，苹果放了一个可用的版本在 /usr/share/libtool (对 10.2 之前的版本是 /usr/libexec) 中，所以你只需要从那里拷贝就可以了。</p>
            
			<p>If you are constructing a Fink package, you can use the <code>UpdateConfigGuess</code>
			and/or <code>UpdateConfigGuessInDirs</code> fields in your <code>.info</code> 
			package description file to do this update automatically.</p>
            
		

		<h2><a name="libraries">1.4 函数库</a></h2>
			

			<p>简单地说：你可以从 Makefile 中删除 <code>-lm</code>，这不会造成问题，但你不需要这样做。</p>

			<p>详细地说：Mac OS X 没有单独的 libc，libm，libcurses，libpthread 等函数库。
			它们都是系统函数库 libSystem 的一部分(在更早的版本中，它们实际上是系统框架(framework))。
			不过，苹果在 /usr/lib 中放置了合适的符号连接，所以连接到 <code>-lm</code> 也是可以的。
			唯一的例外是 <code>-lutil</code>。在其它系统中，libutil 包含与伪终端和登录记帐有关的函数。
			这些函数在 libSystem 中，但没有提供 libutil.dylib 的符号连接。</p>

		

		<h2><a name="other-sources">1.5 其它信息来源</a></h2>
			

			<p>关于移植的另外一个信息来源是一个在 <a href="http://www.metapkg.org/wiki">MetaPkg Wiki</a> 的 Wiki 站点。</p>

			<p>你可以阅读苹果的技术文摘 <a href="http://developer.apple.com/technotes/tn2002/tn2071.html">TN2071</a>：《移植 Unix 命令行工具到 Mac OS X》。</p>

		

	<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="shared.php?phpLang=zh">2. 共享代码</a></p>
<?php include_once "../../footer.inc"; ?>


