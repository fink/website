<?
$title = "常见疑问（F.A.Q.） - 使用（１）";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/05/26 01:24:04';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="usage-packages.php?phpLang=zh" title="特定软件包使用问题"><link rel="prev" href="comp-packages.php?phpLang=zh" title="编译问题－特定软件包">';


include_once "header.zh.inc";
?>
<h1>常见疑问（F.A.Q.） - 8. 一般性软件包使用问题</h1>
  
    
    
    <a name="xlocale">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.1: 我碰到很多这样的消息："locale not supported by C library"。有问题吗？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
没有什么问题，它只是表示程序会使用默认的英语信息提示，日期格式等。
程序其它的功能应该是正常的。
X11 文档有更多的<a href="http://fink.sourceforge.net/doc/x11/trouble.php#locale">细节</a>。
</p></div>
    </a>
    <a name="passwd">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.2: 我的系统上突然多很很多陌生的用户，名字象 "mysql"，"pgsql"，和 "games"。
它们是哪来的？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
你用 Fink 安装了一些软件包，这些软件包依赖于另外一个叫 passwd 的软件包。passwd 出于安全的原因在你的系统上增加了一些额外的用户－Unix 系统上，文件和进程由一些（不同的） "owners" 所有，这可以使得系统管理员可以微调系统的权限和安全性设置。
象 Apache 和 MySQL 这样的程序需要有 "owner"，把这些守护进程由 root 来运行是不安全的（想像一下如果 Apache 被攻破而它又有对系统所有文件的写权限的情况）。
因此，passwd 软件按照 Fink 软件包的需要建立了这些额外的用户。</p><p>如果在你的"系统预置：用户"(对 10.2)或"系统预置：帐号"(对 10.3)面板里面突然出现了这些用户，那么要警惕，但不要那么着急去删除它们：
</p><ul>
          <li>首先，很明显你选择安装了那些需要这些用户的软件包，所以删除它们是不合情理的，不是吗？</li>
          <li>事实上，在 Mac OS X 里面已经有很多这些你不是很清楚的额外用户：www，daemon，nobody，只是其中的一部分。
这些额外用户的存在是标准的 Unix 运行某些服务的方式；passwd 软件包只是添加了一些苹果没有提供的一些额外的用户。你可以在 NetInfo管理器程序或运行
<code>niutil -list . /users</code> 命令看到这些苹果定义的用户。
          </li>
          <li>如果你的确决定要删除这些用户，那么你要很小心如何去做。使用 "系统预置：用户" (对 10.2)或"系统预置：帐号"(对 10.3)面板去删除会把它们拥有的文件随机分配给一个管理员帐号，而且的确已经发生过因此而造成的使用管理员帐号的大混乱。这是系统预置的一个软件缺陷，并已经被提交给苹果公司。一个从你的系统中删除这些用户的安全的办法是使用 NetInfo管理器程序或使用命令行工具 <code>niutil</code>。阅读 <code>niutil</code> 的帮助页可以获得关于 NetInfo　的更多信息。</li>
        </ul><p>Fink 在你安装 passwd 软件包的时候<b>确实</b>曾经向你要求安装这些额外用户的许可， 所以这些用户的存在本不应该觉得奇怪的。
</p></div>
    </a>
    <a name="compile-myself">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.3: 如何使用 Fink 安装的软件编译一些我自己的东西？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 当你编译一些不属于 Fink 的东西的时候，编译器和连接器需要知道去哪里找 Fink 安装的库和头文件。对于那些使用标准 configure/make 过程的软件，你需要设置这些环境变量：
</p><p>对于 tcsh</p><pre>setenv CFLAGS -I/sw/include
setenv LDFLAGS -L/sw/lib
setenv CXXFLAGS $CFLAGS
setenv CPPFLAGS $CXXFLAGS
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal"
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"</pre><p>对于 bash</p><pre>export CFLAGS=-I/sw/include
export LDFLAGS=-L/sw/lib
export CXXFLAGS=$CFLAGS
export CPPFLAGS=$CXXFLAGS
export ACLOCAL_FLAGS="-I /sw/share/aclocal"
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"</pre><p>
通常最简单的办法是把这些东西加到你的启动脚本文件（比如 <code>.cshrc</code> 或 <code>.profile</code>），这样他们就可以自动被设置。
如果一个软件包不使用这些环境变量，你需要自己添加
"-I/sw/include" (对头文件) 和 "-L/sw/lib" (对库文件) 到编译指令的一行。有些软件包会使用类似 EXTRA_CFLAGS 或 --with-qt-dir= 这样的非标准配置选项。
通常 "./configure --help" 会告诉你额外的编译选项。
</p><p>另外，你也许需要安装那些你使用的软件包的开发版的头文件（例如 <b>foo-1.0-1-dev</b>），如果你还没有安装它们的话）。</p></div>
    </a>
    <a name="apple-x11-applications-menu">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.4: 我不能在苹果的 X11 的应用程序菜单里面运行任何 Fink 安装的程序。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 苹果的 X11 不使用 Fink 的环境变量设置，这意味着应用程序菜单没有正确的环境变量设置来找到你的 Fink 程序。解决办法是在 Fink 安装的程序前面加上：</p><pre>source /sw/bin/init.sh ; </pre><p>例如，如果你希望运行 Fink 安装的 GIMP，那么填入</p><pre>source /sw/bin/init.sh ; gimp</pre><p>到你 GIMP 项的命令一栏。</p><p>你也可以编辑你的 .xinitrc 文件（在你的用户目录中）并添加：</p><pre>source /sw/bin/init.sh</pre><p>到第一行之后。</p></div>
    </a>
    <a name="x-options">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.5: 我被 X11 的选择弄糊涂了：苹果 X11，XFree86，等等。我应该安装哪一个？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这些都是 XFree86 的变种（它们都基于 XFree86 的代码），但相互之间有一些轻微的差别。对于在 Panther 和 Jaguar 下有不同的可选方式。在 Panther 下你可以选择：</p><ul>
        <li><p>苹果的 X11 （在第三张光盘上）。不要忘记同时安装 X11 SDK （在 XCode 光盘上），如果你希望编译程序，或着你希望用 Fink 从源代码安装和 X 有关的软件包。</p></li>
        <li><p>Fink 的 4.4.x 版本。安装 xfree86 和 xfree86-shlibs 软件包。</p></li>
        <li><p>Fink 的 X.org 版本。安装 <code>xorg</code> 和 <code>xorg-shlibs</code> 软件包。</p></li>
        </ul><p>在 Jaguar 下，多数的选择是通过 Fink 安装的：</p><ul>
          <li>
            <p>Fink 的 4.2.x 版：安装 <code>xfree86-base</code> 和 <code>xfree86-rootless</code> 或 <code>xfree86-base-threaded</code> 和 <code>xfree86-rootless-threaded</code> （以及相应的 <code>-shlibs</code>）</p>
          </li>
          <li>
            <p>Fink 的 4.3.x 版：安装 <code>xfree86</code> 和 <code>xfree86-shlibs</code> 软件包</p>
          </li>
          <li>
            <p>苹果的 4.2.x 版（假设你安装了用户和 SDK 软件包）： <code>system-xfree86</code> 软件包是自动产生的，不要去安装它。(注意苹果的 X11 Jaguar 公开测试版已经不再提供，所以除非你在以前可以获得的时候已经安装了它，这才可以是一个选择。</p>
          </li>
        </ul><p>还有另外一些选择。在 <a href="http://fink.sourceforge.net/doc/x11/index.php">运行 X11 的文档</a>里面有专门的叙述。</p></div>
    </a>
    <a name="no-display">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.6: 当我试图运行一个程序，我碰到一个错误信息说： "cannot open display:"。我应该怎么办？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这个错误意味着系统不能连接到你的 X 显示。确定你按下面的步骤处理：</p><p>1. 启动 X （苹果的 X11，XFree86，…）。</p><p>2. 确定你正确设置了 DISPLAY 环境变量。如果你使用 X 的默认设置，你应该这么做：</p><p>如果你使用 <code>tcsh</code></p><pre>setenv DISPLAY :0</pre><p>或如果你使用 <code>bash</code></p><pre>export DISPLAY=:0</pre></div>
    </a>
    <a name="suggest-package">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.7: 我在 Fink 里面看不到我喜欢的那个程序。我应该怎么建议增加一个新的软件包到 Fink 里面？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 在 Fink 项目的<a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">软件包需求追踪器</a>。</p><p>注意你需要一个 SourceForge 帐号才可以添加。</p></div>
    </a>
    <a name="virtpackage">
    
      <div class="question"><p><b><? echo FINK_Q ; ?>8.8: 这些名为 <code>system-*</code> 的“虚拟软件包”有些时候会存在，但我却不能自己安装或删除它们？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
	  名为类似 <code>system-perl</code> 的软件包是占位软件包。它们不包含实际的文件，而仅仅作为 fink 识别在它之外手工安装的程序一种机制。
	</p><p>
	  从 10.3 版本开始，多数软件包什么不是你可以安装或删除的实际软件包。
	  相反，它们是“虚拟软件包”，软件包数据由 fink 程序自身根据一个手工安装的程序的预配置清单来产生。
	  对每个虚拟软件包，fink 会检查特定位置的一些特定文件，如果找到这些文件，就会认为这个虚拟软件包“已经安装”。
	</p><p>
	  你可以运行 <code>fink-virtual-pkgs</code> 程序(fink 软件包的一部分)来获取被检测到已经安装的虚拟软件包的清单。
	  使用 <code>--debug</code> 标志可以获取有关 fink 检查了哪些文件诊断信息。
	</p><p>
	  不幸的是，没有办法让你自己安装任意的软件(在 fink 之外)并让 fink 识别到它，而不是 fink 自己的版本。
	  要通用地检查配置和编译标志，路径名等等参数太困难了。
	</p><p>
	  下面是 fink 定义的最重要的一些虚拟软件包(对 fink-0.19.2)：
	</p><ul>
          <li>system-perl: [virtual package representing perl]
	    <p>
	      代表 <code>/usr/bin/perl</code>，它是默认 OS X 安装的一部分。这个软件包同时提供 <code>system-perlXXX</code> 和 <code>perlXXX-core</code>，根据 perl 解析器的版本号 X.X.X。
	    </p>
	  </li>
          <li>system-javaXXX: [virtual package representing Java X.X.X]
	    <p>
	      代表 Java 运行时环境，它是 OS X(和苹果的软件更新)的一部分。参考<a href="http://www.apple.com/java">苹果的 Java 网页</a>来获取更多信息。
	    </p>
	  </li>
          <li>system-javaXXX-dev: [virtual package representing Java X.X.X development headers]
	    <p>
	      代表 Java SDK，它需要从 <a href="http://connect.apple.com">connect.apple.com</a> 手工下载(需要免费注册)并安装。
	      如果你更新了你的 Java 运行时环境，你的 SDK 并不会自动相应更新(甚至可能被删除！)。
	      记得在安装或升级的运行时环境以后检查(如果需要的话重新下载和安装)这个 SDK。
	      参考 <a href="comp-general.php?phpLang=zh#system-java">这个 FAQ 条目</a>。
	    </p>
	  </li>
          <li>system-java3d: [virtual package representing Java3D]</li>
          <li>system-javaai: [virtual package representing Java Advanced Imaging]
	    <p>
	      代表 Java 的三维图形和图象处理的扩展，它需要从苹果手工下载和安装。
	      查看<a href="http://docs.info.apple.com/article.html?artnum=120289">苹果网站</a>来获取详细信息。
	    </p>
	  </li>
          <li>system-xfree86: [placeholder for user installed x11]</li>
          <li>system-xfree86-shlibs: [placeholder for user installed x11 shared libraries]
	    <p>
	      代表苹果的 X11/XDarwin，OS X 的一个可选部分(X11User.pkg)。这些软件包提供 <code>x11</code> 和 <code>x11-shlibs</code>。参阅<a href="comp-packages.php?phpLang=zh#cant-install-xfree">这个 FAQ 条目</a>。
	    </p>
	  </li>
          <li>system-xfree86-dev [placeholder for user installed x11 development tools]
	    <p>
	      代表苹果的 X11/XDarwin SDK，OS X 的一个可选安装(X11SDK.pkg)。这个软件包提供 <code>x11-dev</code>。参阅<a href="comp-packages.php?phpLang=zh#cant-install-xfree">这个 FAQ 条目</a>。
	    </p>
	  </li>
        </ul></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-packages.php?phpLang=zh">9. 特定软件包使用问题</a></p>
<? include_once "../footer.inc"; ?>


