<?
$title = "用户指南 - 软件包";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/07 01:55:45';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="用户指南 Contents"><link rel="next" href="upgrade.php?phpLang=zh" title="升级 Fink"><link rel="prev" href="install.php?phpLang=zh" title="首次安装">';

include_once "header.inc";
?>

<h1>用户指南 - 3 安装软件包</h1>
    
    
    
      <p>
现在你已经做完了一些可以称为 Fink 安装的事情。
本章介绍怎么用 Fink 来安装一些实际的软件包，这也是你安装 Fink 的目的。
在我们解释如何用源码或二进制包安装前，有一些重要的信息是对这两种方式都适用的。
</p>
    
    <h2><a name="bin-dselect">3.1 用 dselect 安装二进制包</a></h2>
      
      <p>
        <code>dselect</code> 是一个让你查看可用的软件包清单的程序，同时也可以选择你所需要安装的包。
它在 Terminal.app 程序中运行，但会占用整个"屏幕" 并使用简单的键盘进行控制浏览。
和其它软件包管理工具一样 <code>dselect</code> 需要
root 用户权限，所以你需要在使用它之前转换成 root 或使用 sudo：
</p>
      <pre>sudo dselect</pre>
      <p>
        <b>注意：</b>
        <code>dselect</code> 已知在 OS X 的终端程序中运行存在问题。你需要套在使用它前运行下面的命令，或把它们放到合适的启动文件中（例如 <code>.cshrc</code> 或 <code>.profile</code>）：</p>
      <p>对 tcsh 用户：</p>
      <pre>setenv TERM xterm-color</pre>
      <p>对 bash 用户：</p>
      <pre>export TERM=xterm-color</pre>
      <p>
在主菜单里面有几个选择：
</p>
      <ul>
        <li>
          <p>
            <b>[A]ccess</b> - 这个选项配置所使用的网络访问方法。
<b>你不需要运行这个</b>，因为 Fink 已经为你预先配置好一切东西了。
事实上，你应该避免使用这个菜单，因为它可能会用一些不合适的选项来覆盖默认的配置。
</p>
        </li>
        <li>
          <p>
            <b>[U]pdate</b> - 这个选项从 Fink 站点中下载所有可用的软件包的清单。
这个选项并不实际安装或更新任何软件包，它只是更新软件包浏览器中所使用的清单。
在安装 Fink 以后你必须知道运行它一次。
</p>
        </li>
        <li>
          <p>
            <b>[S]elect</b> - 这个选项告诉你实际的软件包清单，在这里你可以按你的希望选择或反选你系统里面的软件包。在后面我们会详细介绍这一点。
</p>
        </li>
        <li>
          <p>
            <b>[I]nstall</b> - 这是开始实际操作的地方。
以上的菜单项只是影响 dselect 的软件包列表和状态数据库。而这个菜单项则是实际开始下载和安装你要求的软件包。
它也会删除你在浏览器中反选的软件包。
</p>
        </li>
        <li>
          <p>
            <b>[C]onfig</b> and <b>[R]emove</b> - 这是 apt 之前的留下来的遗迹。
你不需要使用它们，虽然它们不会有什么害处。
</p>
        </li>
        <li>
          <p>
            <b>[Q]uit</b> - 这应该不需要更多解释。
</p>
        </li>
      </ul>
      <p>
多数时间你会在软件包浏览器中使用 dselect，这可以通过 "[S]elect" 菜单项访问。
在 dselect 显示软件包清单之前，它会显示一个介绍性的帮助屏幕。
你可以按 'k' 按钮来获得一个键盘命令的详细清单，或按空格键进入软件包清单。
</p>
      <p>
你可以使用上下方向键来在清单中进行浏览。
你可以用 '+' and '-'　来进行选择。
当你选择的软件包安装时需要其它的软件包时，dselect 会显示一个相关的子列表。
多数情况下，你只需要按回车键来接受 dselect　的选择。
你可以在子列表中进行调整（例如，选择另外一个可替代的软件包依赖关系），或者按 'R'
（即是 Shift-R）来回到原来的状态。
子列表和主软件包清单都是通过按回车键离开。
当你对你的选择感到满意以后，离开主清单并使用 "[I]nstall" 菜单项来实际安装软件包。
</p>
    
    <h2><a name="bin-apt">3.2 用　apt-get　安装二进制包</a></h2>
      
      <p>
        <code>dselect</code> 本身并不实际安装软件包。
相反，它会运行 apt 来做这些实际工作。
如果你喜欢一个纯命令行界面，你可以用 <code>apt-get</code> 命令直接使用 apt　的功能。
</p>
      <p>
和 dselect　一样，你首先需要用这个命令下载可用的软件包清单：
</p>
      <pre>sudo apt-get update</pre>
      <p>
象 dselect 中的"[U]pdate" 菜单项一样，它并不会实际更新你计算机中的文件，而只是更新 apt 的可用软件包列表。要安装软件包，你需要给 apt-get 一个名字，象这样：
</p>
      <pre>sudo apt-get install lynx</pre>
      <p>
如果 apt-get 发现这个软件还需要其它软件包安装，它会告诉你一个清单，让你确认。
然后它会下载和安装所要求的软件包。
删除已安装的软件包也很容易：
</p>
      <pre>sudo apt-get remove lynx</pre>
      <p>
      </p>
    
    <h2><a name="bin-exceptions">3.3 安装没有二进制版本的依赖软件包</a></h2>
      
      <p>有些时候，当我们执行一个二进制软件包安装的时候，你会或得一个依赖关系不能安装的错误信息。比如：</p>
      <pre>Sorry, but the following packages have unmet
dependencies:
foo: Depends: bar (&gt;= version) but it is
not installable
E: Sorry, broken packages</pre>
      <p>这种现象的原因时你要安装的软件包需要依赖于另外一个软件包，但是那个软件包由于版权许可问题不能以二进制包方式发布。你必须用源代码来安装这个依赖关系（见下一部分）。</p>
    
    <h2><a name="src">3.4 从源代码安装软件包</a></h2>
      
      <p>首先，你需要在你的系统中安装合适版本的开发工具。在 <a href="http://connect.apple.com">http://connect.apple.com</a>中免费注册以后可以下载得到它。</p>
      <p>
要获得可以从源代码安装的软件包清单，可以用 <code>fink</code> 工具查询：
</p>
      <pre>fink list</pre>
      <p>
第一列是安装状态（空白表示没有安装，<code>i</code> 表示已安装，<code>(i)</code> 表示已安装但是并不是最新的版本），后面是软件包的名字，最新版本，以及一个简要的描述。
你可以用　"describe" 命令 （"info" 是它的一个别名）来获得某个软件包的更多信息：
</p>
      <pre>fink describe xmms</pre>
      <p>
当你找到一个你希望的软件包以后，可以使用
"install" 命令：
</p>
      <pre>fink install wget-ssl</pre>
      <p>
<code>fink</code> 命令首先会检查所有需要先安装的软件（"依赖关系"）是否已经存在，然后询问你时候可以安装那些现在还不存在的软件包。
然后它会开始下载源代码，解包，给它打上必要的补丁，编译，然后把最终的结果安装到你的系统上。
这可能会花费比较长的时间。
如果你发现此过程中发生了错误，请首先查看
<a href="http://fink.sourceforge.net/faq/">FAQ</a>。
</p>
    
    <h2><a name="fink-commander">3.5 Fink Commander</a></h2>
      
      <p>Fink Commander 是 <code>apt-get</code> 和 <code>fink</code> 工具的 Aqua 界面。二进制包菜单可以让你管理二进制安装包，源程序菜单则相应管理源程序安装包。</p>
      <p>Fink Commander 被包括在 Fink 的二进制安装包中。如果你想要单独下载它（比方说，你是从源代码开始建立 Fink 的），或者需要额外的信息，可以访问 <a href="http://finkcommander.sourceforge.net">Fink Commander 网站</a>。</p>
    
    <h2><a name="">3.6 可用版本</a></h2>
      
      <p>当你希望安装一个软件包，你应该首先查看 <a href="http://fink.sourceforge.net/pdb/index.php">软件包数据库</a> 来找找是不是可以通过 Fink 获得。软件包的各个可用版本会在一个表格的多个行中出现。就象这样：</p>
      <ul>
        <li>
          <p>
            <b>0.4.1:</b>  this is the version that can be installed from binaries for OS 10.1.</p>
        </li>
        <li>
          <p>
<b>0.6.2:</b>  This is the base version that can be installed from binaries for OS 10.2 or OS 10.3, under the current Fink release.  If you <a href="upgrade.php?phpLang=zh">upgrade</a> Fink, there may be an OS-specific newer version that isn't shown here.</p> 
        </li>
        <li>
          <p>
            <b>10.2-gcc3.3 stable:</b>  This is the most recent stable version that can be installed from source for OS 10.2 with the <code>gcc 3.3</code> update to the Developer Tools.  To be able to install this version, you may need to enable <a href="http://fink.sourceforge.net/doc/cvsaccess/index.php">CVS</a> or rsync access.  If you have not applied the <code>gcc 3.3</code> update you may not see ths version (or possibly even the package).</p>
          <p>Note:  Unlike the case for some other projects, Fink distributes the most recent stable versions of packages via CVS, as well as versions in need of testing (see the section on unstable below).  Enabling CVS | rsync updating  gives you access to new stable versions of packages before the binary distribution is updated. 
</p>
        </li>
<li><p><b>10.3 stable:</b>  This is the most recent version that can be installed from source for OS 10.3.  Once again, CVS | rsync access may be needed to access this version.</p>
</li> 
        <li>
          <p>
            <b>10.2-gcc3.3 unstable:</b>  This is the latest unstable version that can be installed from source for OS 10.2 with <code>gcc 3.3</code>.  To install this version, follow the <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">instructions</a> on how to install unstahle packages.</p>
          <p>Note:  unstable doesn't necessarily mean unusable, but install such packages at your own risk.
</p>
        </li>
<li><b>10.3 unstable:</b>  This is the latest unstable version that can be installed from source for OS 10.3.  Enable the unstable tree as mentioned above.</li>
      </ul>
    
    <h2><a name="x11">3.7 找到 X11</a></h2>
      
      <p>许多 Fink 中的软件包都要求已经安装某种形式的 X11。因此，首先要做的第一件事情是选择一种 X11 实现。</p>
      <p>
由于在 Mac OS X 上有几种 X11 实现（XFree86, Tenon Xtools, eXodus），以及几种不同的方式去安装它们（手工或通过 Fink），所以存在有几种可选的软件包 - 每种设置方式一个。
Fink 并不能猜测你需要什么，所以很重要的是在你开始安装 X11 应用程序之前先选择一种合适的安装好。
这里是可用的软件包和　X11　安装方法：
</p>
      <ul>
        <li>
          <p>
            <b>xfree86-base:</b>
（仅限 10.1 或 10.2）这个软件包是一个真正的安装包。它把整个 XFree86 4.2.1.1 作为一个 Fink 包进行安装。为了获取最大的灵活性，这个软件包并不包含实际的 XDarwin 服务器。
要安装它，你需要先安装 xfree86-rootless 软件包。
</p>
        </li>
        <li>
          <p>
            <b>xfree86:</b>
这是一个单独的软件包（包括显示服务器），它会安装 XFree86 4.3.0 （仅限 10.2)，或 4.3.99 （仅限10.3 ）。
这个版本比 4.2.1.1 要快，但没有经过非常多的测试。
</p>
        </li>
        <li>
          <p>
system-xfree86:
这个软件包是自动生成的（对于 Fink 0.6.2 或更新），如果你是手工安装 XFree86 的话。这包括从源码安装或从官方（或非官方）的二进制发行包，或者安装苹果的 X11。
它会作为一个依赖关系的占位符。
</p>
        </li>
        <li>
          <p>
system-xtools:
如果你安装了 Tenon 的 Xtools 产品，你需要安装这个软件包。
和 system-xfree86 一样，这只是执行一个可用性校验，并不修改实际的文件。
</p>
        </li>
      </ul>
      <p>
关于安装和运行 X11 的更多信息，请参考
<a href="http://fink.sourceforge.net/doc/x11/">Darwin
及 Mac OS X 上 X11 的文档</a>.
</p>
    
  <p align="right">
Next: <a href="upgrade.php?phpLang=zh">4 升级 Fink</a></p>

<? include_once "footer.inc"; ?>
