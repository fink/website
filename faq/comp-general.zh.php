<?
$title = "常见疑问（F.A.Q.） - 编译（１）";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/05/31 19:53:35';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="comp-packages.php?phpLang=zh" title="编译问题－特定软件包"><link rel="prev" href="usage-fink.php?phpLang=zh" title="安装，使用和维护 Fink">';


include_once "header.zh.inc";
?>
<h1>常见疑问（F.A.Q.） - 6. 一般性编译问题</h1>
    
    
    <a name="compiler">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.1: 一个配置脚本出错说找不到一个 "acceptable cc"。什么意思？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
下次应该阅读一下文档。
要从源代码编译软件包，你需要安装开发工具包，其中就包括 C 编译器：<code>cc</code>。
</p></div>
    </a>
    <a name="cvs">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.2: 我运行 "fink selfupdate-cvs"，但出现这个错误："cvs: Command not found."。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 你需要安装开发工具包。</p></div>
    </a>
    <a name="missing-make">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.3: 我碰到一个涉及 <code>make</code> 的错误。
        </b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 如果错误信息是这种形式</p><pre>make: command not found</pre><p>或</p><pre>Can't exec "make": No such file or directory at /sw/lib/perl5/Fink/Services.pm line 190.</pre><p>它表示你需要安装开发工具。</p><p>如果你的错误信息是这样的</p><pre>make: illegal option -- C</pre><p>那是因为你把开发工具包里面 GNU 版本的 <code>make</code> 工具换成了 BSD 版本。许多软件包依赖于 GNU Make 的特有功能。
确定 <code>/usr/bin/make</code> 是一个指向
<code>gnumake</code>的符号链接，而不是指向 <code>bsdmake</code>。另外，确定 <code>/usr/local/bin/</code> 中没有另外一个 <code>make</code>。
</p></div>
    </a>
    <a name="head">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.4: 我碰到 head 命令的一个奇怪的错误信息。什么出问题了？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 如果你看到的是：</p><pre>Unknown option: 1
Usage: head [-options] &lt;url&gt;...</pre><p>后面是一列选项描述，你的 <code>head</code> 程序被损坏了。
这会在你安装 Perl 的 libwww 库到一个 HFS+ 系统宗卷时发生。
原因是它会建立一个新的命令 <code>/usr/bin/HEAD</code>，它会覆盖现存的 <code>head</code> 命令，因为 HFS+ 是不区分大小写的。
<code>head</code> 是一个在许多 shell 脚本和 Makefiles 中用到的标准命令。
如果你想使用 Fink，你需要装回原来的 <code>head</code> 程序。
</p><p>
现在源代码发布版的 bootstrap 脚本会检查这一点，但你仍然会碰到这个问题，如果你使用二进制安装或在安装 Fink 以后又安装 libwww。
</p><p>也曾经有报告说发生这个问题是因为安装了 <code>/sw/bin/HEAD</code>（这不是 Fink 软件包安装的）。这种情况很容易解决：重命名 <code>/sw/bin/HEAD</code>。</p></div>
    </a>
    <a name="also_in">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.5: 当我安装一个软件包的时候，我碰到一个错误信息说我试图覆盖另外一个软件包的文件。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 当你安装那些具有版本分支的软件包（也就是那些名字末尾有 -dev，-shlibs，等的）时，如果需要有些文件从一个版本分支移动到另一个版本分支（例如，从 <code>foo</code> 到 <code>foo-shlibs</code>）的时候，你就会碰到这个错误。你可以做的是使用你现在安装的版本来覆盖旧有的版本（因为他们通常是相同的）：</p><pre>sudo dpkg -i --force-overwrite <b>文件名</b>
        </pre><p>这里文件名 <b>filename</b> 是对应于你要安装的软件包的 .deb 文件名称。</p></div>
    </a>
    <a name="weak_lib">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.6: 我安装了 December 2002 开发工具包以后，碰到 "weak libraries" 的错误。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这是 December 2002 工具的新问题。偶尔你会看到这样的信息（比如说选择 libgdk-pixbuf）：</p><p>
          <code>ld: warning dynamic shared library: /sw/lib/libgdk-pixbuf.dylib not made a weak library in output with MACOSX_DEPLOYMENT_TARGET environment variable set to: 10.1</code>
        </p><p>你可以把这些看做一些无害的信息。如果你对此好奇的话，仔细阅读开发者文档目录里面的 release notes，尤其是关于 GCC 和 linker　的部分。补充的信息的是，对于那些使用弱引用的程序，它和程序启动的时候发现一些运行时标识不存在话，是否把它当做致命错误有关。</p></div>
    </a>
    <a name="mv-failed">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.7: 当我构建一个软件包时，"execution of mv failed, exit code 1" 错误是什么意思？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 如果你安装了 StuffIt Pro，这可能是因为你使用了 "Archive Via Real Name" 模式。在系统预置中检查 StuffIt 面板，禁用 "ArchiveViaRealName"。它包括对一些重要的系统调用的不正确的替代，从而引起一些古怪的错误。</p><p>否则，一个 <code>mv</code> 错误通常意味着构建过程更早期发生了错误，但是构建过程并没有因为那个错误而终止。要找到发生的问题的文件，可以搜索那个不存在文件构建时候的输出。比如，如果你碰到这样的错误：</p><pre>mv /sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib \
 /sw/src/root-foo-shlibs-0.1.2-3/sw/lib/
 mv: cannot stat `/sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib': 
 No such file or directory
### execution of mv failed, exit code 1
Failed: installing foo-0.1.2-3 failed</pre><p>那么你应该在你构建输出信息的更前面的地方寻找有关 <code>libbar</code> 的信息。</p></div>
    </a>
    <a name="node-exists">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.8: 我无法安装软件包或更新它，因为我碰到一个错误说一个 "node" 已经存在。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这个错误的大约是这个样子的：</p><pre>Failed: Internal error: node for system-xfree86 already exists</pre><p>这个问题是因为依赖关系引擎发生了混乱，原因是修改了某些软件包的 info 文件。要修正它：</p><ul>
          <li>
            <p>强行删除出现问题的软件包，例如，对于上面的例子，可以：</p>
            <pre>sudo dpkg -r --force-all system-xfree86</pre>
          </li>
          <li>
            <p>再尝试安装或升级。有时会提示一个包含你删除了的软件包的 "virtual dependency"。选择它，它会在构建过程中重新被安装。</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local-libs">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.9: 我听说安装在 /usr/local/lib 的库有时会引起 Fink 构建的问题。是这样吗？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这是一个经常发生的问题，因为软件包的配置脚本会在搜索 <code>/usr/local/lib</code> 之后才在 Fink 路径中搜索库。如果你碰到其它 FAQ 中没有解释的构建问题，你应该检查涉及的库时候在 <code>/usr/local/lib</code> 中。如果是这样的话，尝试把 <code>/usr/local</code> 改成其它名字，例如：</p><pre>sudo mv /usr/local /usr/local.moved</pre><p>完成你的构建，然后把 <code>/usr/local</code> 改回来：</p><pre>sudo mv /usr/local.moved /usr/local</pre></div>
    </a>
    <a name="toc-out-of-date">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.10: 当我构建一个软件包的时候，我碰到一个消息说 "table of contents" 已经过时。我需要怎么办？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 输出已经提示了该怎么办。消息通常是这样的：</p><pre>ld: table of contents for archive: /sw/lib/libintl.a is out of date; rerun ranlib(1) (can't load from it)</pre><p>你需要（以 root 权限）运行 ranlib 处理引起问题的库。例如对上面的情况，你可以运行：</p><pre>sudo ranlib /sw/lib/libintl.a</pre></div>
    </a>
    <a name="fc-atlas">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.11: 当我安装 atlas 时 Fink Commander 挂了。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这原因时在构建 <code>atlas</code> 时，Fink Commander 遗漏了一个发向用户要求选择的信息。你需要使用 <code>fink install atlas</code> 命令来安装。</p></div>
    </a>
    <a name="basic-headers">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.12: 我碰到信息说我缺少 stddef.h 文件。我可以在哪里找到它？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这个头文件，以及很多其它类似文件，都是由开发工具包中的 DevSDK 包提供。检查你系统中是否存在 <code>/Library/Receipts/DevSDK.pkg</code> 文件。如果没有的话，再运行一次开发工具安装程序，并使用定制安装来安装 DevSDK 包。</p></div>
    </a>
    <a name="multiple-dependencies">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.13: 我无法升级，因为 Fink "unable to resolve version conflict on multiple dependencies"。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 要回避这个问题，尝试升级一个单独的软件包，然后再次尝试使用 "fink update-all"。如果你还碰到这个信息，重复这个过程。</p></div>
    </a>
    <a name="dpkg-parse-error">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.14: 我不能安装任何东西，因为我碰到 "dpkg: parse error, in file `/sw/var/lib/dpkg/status'" 错误！</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这意味着你的 dpkg 数据库被损坏了，通常是由于一次程序崩溃或其它不可恢复错误造成。你可以用拷贝以前的版本的数据库办法来解决，象这样：</p><pre>
sudo cp /sw/var/lib/dpkg/status-old /sw/var/lib/dpkg/status
</pre><p>你也许需要重新安装问题发生前安装的最后几个软件包。</p></div>
    </a>
    <a name="freetype-problems">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.15: 我碰到一个涉及 freetype 的错误。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这个错误有几种形式。如果你的错误是这样的：</p><pre>/sw/include/pango-1.0/pango/pangoft2.h:52: error: parse error before '*' token
/sw/include/pango-1.0/pango/pangoft2.h:57: error: parse error before '*' token
/sw/include/pango-1.0/pango/pangoft2.h:61: error: parse error before '*' token
/sw/include/pango-1.0/pango/pangoft2.h:86: error: parse error before "pango_ft2_font_get_face"
/sw/include/pango-1.0/pango/pangoft2.h:86: warning: data definition has no type or storage class
make[2]: *** [rsvg-gz.lo] Error 1
make[1]: *** [all-recursive] Error 1
make: *** [all-recursive-am] Error 2
### execution of make failed, exit code 2
Failed: compiling librsvg2-2.4.0-3 failed</pre><p>或</p><pre>In file included from vteft2.c:32:
vteglyph.h:64: error: parse error before "FT_Library"
vteglyph.h:64: warning: no semicolon at end of struct or union
vteft2.c: In function `_vte_ft2_get_text_width':
vteft2.c:236: error: dereferencing pointer to incomplete type
vteft2.c: In function `_vte_ft2_get_text_height':
vteft2.c:244: error: dereferencing pointer to incomplete type
vteft2.c: In function `_vte_ft2_get_text_ascent':
vteft2.c:252: error: dereferencing pointer to incomplete type
vteft2.c: In function `_vte_ft2_draw_text':
vteft2.c:294: error: dereferencing pointer to incomplete type
vteft2.c:295: error: dereferencing pointer to incomplete type
make[2]: *** [vteft2.lo] Error 1
make[1]: *** [all-recursive] Error 1
make: *** [all] Error 2
### execution of make failed, exit code 2
Failed: compiling vte-0.11.10-3 failed</pre><p>或</p><pre>checking for freetype-config... /usr/X11R6/bin/freetype-config
checking For sufficiently new FreeType (at least 2.0.1)... no
configure: error: pangoxft Pango backend found but did not find freetype libraries
make: *** No targets specified and no makefile found.  Stop.
### execution of LD_TWOLEVEL_NAMESPACE=1 failed, exit code 2
Failed: compiling gtk+2-2.2.4-2 failed</pre><p>问题发生在 <code>freetype</code> 或 <code>freetype-hinting</code> 软件包的头文件和包含在 X11 或 XFree86 中的 <code>freetype2</code> 头文件之间发生混淆。</p><pre>fink remove freetype freetype-hinting</pre><p>命令可以删除你安装的（导致问题的）变种。如果你的错误是这样的：</p><pre>ld: Undefined symbols:
_FT_Access_Frame </pre><p>这通常是用于以前安装的 X11 的残余文件。你需要重新安装 X11 SDK。最后，如果你获得一个这样的错误：</p><pre>dyld: klines Undefined symbols:
/sw/lib/libqt-mt.3.dylib undefined reference to _FT_Access_Frame
</pre><p>那么你很可能安装了一个在 Jaguar 上使用 <code>gcc3.3</code> 编译的二进制包，但它却不能在 Panther 上使用。这现在已经被修正了，所以你只需要更新你的软件包就可以了，例如，通过 <code>sudo apt-get update ; sudo apt-get dist-upgrade</code>。</p></div>
    </a>
    <a name="dlfcn-from-oo">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.16: 我碰到一个涉及 `Dl_info' 的编译错误。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 如果你的错误是这样的</p><pre>unix_dl.c: In function `rep_open_dl_library':
unix_dl.c:328: warning: assignment discards qualifiers from pointer target type
unix_dl.c: In function `rep_find_c_symbol':
unix_dl.c:466: error: `Dl_info' undeclared (first use in this function)
unix_dl.c:466: error: (Each undeclared identifier is reported only once
unix_dl.c:466: error: for each function it appears in.)
unix_dl.c:466: error: parse error before "info"
unix_dl.c:467: error: `info' undeclared (first use in this function)
make[1]: *** [unix_dl.lo] Error 1</pre><p>最可能是你有这样的一个头文件：<code>/usr/local/include/dlfcn.h</code>，它和 Panther 不兼容。</p><p>这一般是由 Open Office 所安装的，你应该通过符号链接把这个头文件和对应的 <code>/usr/local/lib/libdl.dylib</code> 库指向 Panther 的内置文件</p><pre>sudo ln -s /usr/include/dlfcn.h /usr/local/include/dlfcn.h
sudo ln -s /usr/lib/libdl.dylib /usr/local/lib/libdl.dylib</pre></div>
    </a>
    <a name="gcc2">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.17: Fink 说我缺少 <code>gcc2</code>，但我不知道怎么安装它。</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这是因为 <code>gcc2</code> 是一个代表你系统上 gcc-2.95 的虚拟软件包。在 XCode 工具中安装 gcc2.95 软件包（早期操作系统的开发工具安装把 gcc-2.95 作为主要的编译工具安装）。</p></div>
    </a>
    <a name="system-java">
    <div class="question"><p><b><? echo FINK_Q ; ?>6.18: Fink 提示说 <code>Failed: Can't resolve dependency "system-java14-dev"</code>，但我却找不到有这个软件包。</b></p></div>
    <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 这是因为它是一个虚拟软件包。
    这类错误在 Java 通过软件更新升级后造成的：
    有关的头问题被删除了，引起不能生成 -dev 软件包。</p><p>你需要自己从<a href="http://connect.apple.com">苹果网站</a>下载相应的<code>Java 开发工具</code>软件包。在本例的情况中，你需要<code>Java 1.4.2 Developer Tools</code>。</p></div>
    </a>
    <a name="dpkg-split">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.19: 当我尝试安装东西的时候，我碰到 <q>dpkg (subprocess): failed to exec dpkg-split to see if it's part of a multiparter: No such file or directory</q> 这样的错误。我怎么修复它？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 通常来说，这可以通过正确设置你的环境变量来修复。参考 <a href="usage-fink.php?phpLang=zh#fink-not-found">这个 FAQ 条目</a>。</p></div>
    </a>
    <a name="xml-parser">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.20: 我碰到这个 <q>configure: error: XML::Parser perl module is required for intltool</q> 错误信息。我应该怎么办？</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 你需要确定你安装了对应你系统中的 Perl 版本的 xml-parser-pm 软件包。例如，如果你使用 Panther，你应该安装 <code>xml-parser-pm581</code>，而不是 <code>xml-parser-pm560</code>(你可以会有 <code>xml-parser-pm</code> 占位软件包)，因为你使用 <code>Perl-5.8.1</code>，而不是 <code>Perl-5.6.0</code>。</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="comp-packages.php?phpLang=zh">7. 编译问题－特定软件包</a></p>
<? include_once "../footer.inc"; ?>



