<?
$title = "移植 - 共享代码";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/12 15:06:20';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="移植 Contents"><link rel="next" href="libtool.php?phpLang=zh" title="GNU libtool"><link rel="prev" href="basics.php?phpLang=zh" title="基本知识">';


include_once "header.zh.inc";
?>
<h1>移植 - 2. 共享代码</h1>
		
		

		<h2><a name="lib-and-mod">2.1 共享库和可加载模块对比</a></h2>
			
			

			<p>Mach-O 的一个令人吃惊的特性是对共享函数库和可加载模块的严格区分。
			在 ELF 系统上，两者是相同的；任何的共享代码都可以作为函数库或作为动态加载模块。</p>

			<p>Mach-O 共享函数库具有 MH_DYLIB 文件类型，扩展名为 <code>.dylib</code>。
			它们可以通过常用的静态连接标志进行连接，，比如 <code>-lfoo</code> 会连接 libfoo.dylib。
			不过，它们不能以模块形式加载。
			(附注：共享库可以通过一个 API 动态装载。
			不过，那个 API 和一般用于束的 API 并不相同；语法上的差别也使它不能作为 dlopen() 的模拟。
			最值得注意的是，共享库不能被卸载。)</p>

			<p>按 Mach-O 的术语，可加载模块称为束("bundles")。
			它们的文件类型为 MH_BUNDLE。
			由于没有其它的组件会使用它，它们可以有任意的扩展名。
			苹果推荐使用 <code>.bundle</code> 扩展名，但多数移植的软件会因为兼容性的原因而使用 <code>.so</code> 的扩展名。
			束可以通过 dyld API 动态加载和卸载，在这些 API 之上有一个封装来模拟 <code>dlopen()</code>。
			没有办法把束当作共享库来进行连接。
			不过，可以把一个束连接到一个真正的共享库这样在束加载的时候，共享库也会被自动加载。</p>

		

		<h2><a name="version">2.2 版本编号</a></h2>
			

			<p>在 ELF 系统中，版本号通常会添加到共享库的文件名后面，例如：<code>libqt.so.2.3.0</code>。
			在 Darwin 中，版本号被放在函数库名和扩展名之间，例如：<code>libqt.2.3.0.dylib</code>。
			注意，这样使得你可以在连接的时候指定所要连接的版本，比方说对上面的例子，可以使用：<code>-lqt.2.3.0</code>。</p>

			<p>当创建一个共享库时，你可以指定一个在运行时搜索函数库所用的名字。
			通常都会这样去做，而使得可以同时安装一个函数库的不同主版本。
			在 ELF 系统上，这称为 <code>soname</code>。
			区别是在 Darwin 上你可以(而且是必须)指定包括文件名的完整路径。
			这消除了 "rpath" 选项以及 ldconfig/ld.so.cache 系统的需要。
			要使用一个还没有安装的函数库，你可以设置 DYLD_LIBRARY_PATH 环境变量；查阅 dyld 的手册页获取更多细节。</p>

			<p>Mach-O 的格式还提供了真正的次要版本号的检查，在 ELF 系统上这点不是很清楚。
			每个 Mach-O 函数库有两个版本号："当前" 版本号和 "兼容" 版本号。
			这两个版本号都有三组以句点分隔的数字组成，例如：1.4.2。
			第一个数字必需为非零值。
			第二和第三个数字可以不提供，这时缺省为零值。
			没有指定版本号的时候，默认为 0.0.0，这是一种通配值。</p>

			<p>"current"版本号主要是用于信息的用途。
			"compatibility" 版本号用于后面的版本检查。
			当一个可执行程序要连接的时候，库的版本信息被拷贝到可执行程序中。
			当可执行程序运行的时候，这个版本信息会用来和要使用的库的版本进行进行核对。
			除非使用的版本号等于或高于连接时候的库的版本号，否则 dyld 会产生一个运行时错误并终止程序的执行。</p>

		

		<h2><a name="cflags">2.3 编译器标志</a></h2>
			

			<p>在 Darwin 上默认会生成"位置无关代码"(PIC)。
			事实上，PowerPC 的代码在设计上就是位置无关的，所以这不会产生性能的损失。
			因此，在编译共享库或模块的时候，你不需要指定 PIC 选项。
			不过，连接器不允许在共享库中使用 "common" 标志，所以你需要使用 <code>-fno-common</code> 编译器选项。</p>

		

		<h2><a name="build-lib">2.4 构建一个共享库</a></h2>
			

			<p>要构建一个共享库，你要使用 <code>-dynamiclib</code> 选项调用编译器。
			这可以通过一个完整的例子来演示。
			我们要编译一个名为 libfoo 的库，它由 source.c 和 code.c 两个源程序文件组成。
			版本号是 2.4.5，2 是主版本号(发生了不兼容的 API 改变)，4 是次要版本号(后向兼容的 API 改变)，5 是修正错误的修订版计数(有些人把这称为 "teeny" 修订版，它包含完全兼容的改变)。
			函数库不依赖于其它共享库，会被安装在 /usr/local/lib。</p>

<pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -dynamiclib -install_name /usr/local/lib/libfoo.2.dylib \
 -compatibility_version 2.4 -current_version 2.4.5 \
 -o libfoo.2.4.5.dylib source.o code.o
rm -f libfoo.2.dylib libfoo.dylib
ln -s libfoo.2.4.5.dylib libfoo.2.dylib
ln -s libfoo.2.4.5.dylib libfoo.dylib</pre>
<p>
注意版本号的各个部分所使用的地方。
同时也注意静态连接器会使用 libfoo.dylib 符号连接，
而动态连接器会使用 libfoo.2.dylib 符号连接。
也可以把这些符号连接指到函数库的不同次要修订版上。
</p>



<h2><a name="build-mod">2.5 构建一个模块</a></h2>
<p>
要构建一个可加载模块，你用 <code>-bundle</code> 参数调用编译器。
如果模块会使用主程序中的标识符，你需要指定 <code>-undefined suppress</code> 来允许未定义标识符，
同时也配合使用 <code>-flat_namespace</code> 来满足 Mac OS X 10.1 中的新连接器。
一个详细的例子是：
</p>
<pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -bundle -flat_namespace -undefined suppress \
 -o mymodule.so source.o code.o</pre>
<p>
注意这里没有使用版本号码。
理论上来说，可以使用版本号码，但从实用的角度来说，这样做是没有意义的。
另外注意的是，对束没有命名限制。
一些软件包喜欢使用 "lib"，因为在其它系统会有这个要求。这样做不会有问题。
</p>



<p align="right"><? echo FINK_NEXT ; ?>:
<a href="libtool.php?phpLang=zh">3. GNU libtool</a></p>
<? include_once "../../footer.inc"; ?>


