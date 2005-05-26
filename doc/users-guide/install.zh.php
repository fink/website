<?
$title = "用户指南 - 安装";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/05/26 02:14:38';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="用户指南 Contents"><link rel="next" href="packages.php?phpLang=zh" title="安装软件包"><link rel="prev" href="intro.php?phpLang=zh" title="介绍">';


include_once "header.zh.inc";
?>
<h1>用户指南 - 2. 首次安装</h1>
    
    
    
      <p>
在第一次安装时，一套基本的软件包管理工具会被安装到你的计算机上。
在这之后你需要设置好你的 shell 来使用 Fink 所安装的软件。
你只需要做一次这件事情，以后你可以直接从任何 Fink 安装版本（高于 0.2.0 发布版）升级，而不需要重新安装。
这会在<a href="upgrade.php?phpLang=zh">如何升级</a>一章进行介绍。
</p>
      <p>
在软件包管理工具安装好以后，你可以用它来安装更多的软件。
这会在 <a href="packages.php?phpLang=zh">安装软件包</a>一章进行介绍。
</p>
    
    <h2><a name="bin">2.1 安装二进制发行版</a></h2>
      
      <p>
二进制发行版以 Mac OS X 安装包 (.pkg) 的形式提供，它被打包在一个磁盘映象文件(.dmg)中。
从<a href="http://fink.sourceforge.net/download/bindist.php">下载页面</a>下载了磁盘映象文件以后（你可能需要使用你的浏览器的 "保存目标为..." 或 "下载到磁盘" 功能），双击这个磁盘文件来装载上它。
在 "磁盘工具" 程序（10.3以前是 "磁盘拷贝"）校验完你下载的文件后，在你的桌面上（或你下载到的文件夹里面）会出现一个 "Fink 0.x.x Installer" 的磁盘图标，打开它。
在里面你会看到一些文档和一个安装包。
双击安装包并按照屏幕上的说明完成剩下的安装。
</p>
      <p>
你会被要求输入管理员密码，同时会显示一些文本。
请阅读它们 —— 它会比这份用户指南的版本更新。
当安装程序让你选择一个宗卷进行安装时，一定要选择系统宗卷（也就是你安装 OS X 的宗卷）。
如果你选择了错误的宗卷，安装仍然可以进行，但是安装后的 Fink 不能正常工作。
当安装程序运行完毕以后，继续
<a href="#setup">设置你的环境</a>部分。
</p>
    
    <h2><a name="src">2.2 安装源代码发行版</a></h2>
      
      <p>
源代码发行版以标准的 Unix tarball (.tar.gz)　方式提供。
它仅包含 <code>fink</code> 软件包管理器以及它自己的软件包描述，整个软件包的其它部分会在安装的过程中才下载。
你可以从这个
<a href="http://fink.sourceforge.net/download/srcdist.php">下载页面</a>获得它。
很重要的是，你不能用 StuffIt Expander 来解压缩下载后的 tar 压缩档。
由于某些原因，StuffIt 仍然不能处理长文件名。
如果 StuffIt Expander 已经自动解压了你下载的压缩档，把它解压产生的文件夹删除掉。
</p>
      <p>
源代码发行版必须从命令行安装，因此请打开　Terminal.app 并进入到你保存所下载到的
fink-0.x.x-full.tar.gz 压缩档的目录。
以下的命令将解压压缩档：
</p>
      <pre>tar -xzf fink-0.x.x-full.tar.gz</pre>
      <p>
它会创建一个与压缩档同名的新目录。
我们将继续使用 <code>fink-0.x.x-full</code> 这个名称来代表它。
现在，进入这个新目录，并运行 bootstrap 脚本：
</p>
      <pre>cd fink-0.x.x-full
./bootstrap.sh</pre>
      <p>
这个脚本会对你的系统进行一些检查，然后使用 sudo 把你提升到 root 权限——这时会提示你输入你的密码。然后，脚本会询问你安装的路径，除非你有一个很好的理由，否则你应该使用默认的——
<code>/sw</code>。
只有这样，以后你才可以顺利安装下载的二进制方式提供的安装包。另外，我们全部的例子都使用这个路径，所以如果你使用其它的安装路径，你要记住进行相应的替换。
</p>
      <p>
下一步是 Fink 的配置。
它会询问你一些象代理和镜象服务器设置以及是否需要详细信息输出等问题。
如果你不是很明白有些问题，你可以按回车键接受默认的选择。
以后你还可以通过 <code>fink　configure</code> 这个命令重新这个配置过程。
</p>
      <p>
当 bootstrap 收集到它所需要的所有信息以后，它会下载基本系统所需要的源代码并编译它。
这以后不再需要用户的交互。
如果你看到一些软件包被反复编译两次不需要担心。
这是正常的现象，因为要构件一个软件包管理器的二进制安装包，你首先需要有一个软件包管理器。
</p>
      <p>
当 bootstrap 脚本执行完毕，请继续
<a href="#setup">设置你的环境</a>部分。
</p>
    
    <h2><a name="setup">2.3 设置你的环境</a></h2>
      
      <p>
要使用 Fink 目录下安装的软件，包括软件包管理器本身，你必须相应设置 PATH 环境变量。

In most cases, you can do this by entering the command

      </p>
      <pre>/sw/bin/pathsetup.sh</pre>
      
      <p>
	in a terminal window. Note that for some older versions of
	fink called this <code>pathsetup.command</code>, and one could
	run it by entering the command:
      </p>
      
      <pre>open /sw/bin/pathsetup.command</pre>
      <p>
如果由于某种情况这种方法不奏效，你可以手工配置它。不过，这会随你使用的 Shell 程序不同而不同。
你可以通过打开终端窗口并运行下面指令来查看你 shell 类型：
</p>
      <pre>echo $SHELL</pre>
      <p>
如果命令输出 "csh" 或 "tcsh" ，那么你使用的是 C shell。如果输出是　bash，zsh，sh　或其它类似的东西，你很可能是在使用 Bourne shell 的一个变种。
</p>
      <ul>
        <li>
          <p>
            Bourne Shell（在 Mac OS X 10.3 后是默认的shell程序） </p>
          <p>
   如果你使用 Bourne 风格的 shell （比如 sh，bash，zsh），把下面的几行添加到你的主目录下的 <code>.profile</code> 文件中（或者，如果你已经有一个 <code>.bash_profile</code> 文件，你也可以添加到那里）：
  </p>
          <pre>. /sw/bin/init.sh</pre>
          <p>
   如果你不知道如何添加，运行下面的命令：
  </p>
          <pre>cd
pico .profile</pre>
          <p>
   你现在进入到一个全屏幕（准确地说，全终端窗口）文本编辑器，应该很容易能够输入 <code>. /sw/bin/init.sh</code> 这一行。如果有个提示说 "New file"，这不是什么问题。确定在这行的末尾你至少输入了回车，然后按 Control-O，再回车，最后　Control-X 退出编辑器。
  </p>
        </li>
        <li>
          <p>
            C Shell（在 Mac OS X 10.2 或更早的版本是默认 Shell) </p>
          <p>
   如果你使用 tcsh，在你主目录下的<code>.cshrc</code>文件中添加下面一行：
  </p>
          <pre>source /sw/bin/init.csh</pre>
          <p>
   如果你不懂怎么添加，运行下面的命令：
  </p>
          <pre>cd
pico .cshrc</pre>
          <p>
   你现在进入到一个全屏幕（准确地说，全终端窗口）文本编辑器，应该很容易能够输入 <code>source /sw/bin/init.sh</code> 这一行。如果有个提示说 "New file"，这不是什么问题。确定在这行的末尾你至少输入了回车，然后按 Control-O，再回车，最后　Control-X 退出编辑器。
  </p>
          <p>有些情况下你需要编辑更多的文件：</p>
          <ol>
            <li>
              <p>你已经有一个<code>~/.tcshrc</code>文件。</p>
              <p>有些第三方软件会创建这个文件，或者你自己这样做。
  这时，<code>~/.tcshrc</code> 将会被读取，而 
  <code>~/.cshrc</code> 则被忽略了。
  推荐的步骤是用你上面编辑<code>~/.cshrc</code>时类似的方法编辑 <code>~/.tcshrc</code>，并在最后加入这样一行：</p>
              <pre>source ~/.cshrc</pre>
              <p>这样，如果你要删除 <code>~/.tcshrc</code>，你还可以运行 Fink。</p>
            </li>
            <li>
              <p>你曾经按照 <code>/usr/share/tcsh/examples/README</code> 文档里面的要求进行操作。</p>
              <p>这些指南告诉你创建一个 <code>~/.tcshrc</code> 文件及一个 <code> ~/.login</code> 文件。这种情况下的问题是 <code>~/.login</code> 文件在 <code>~/.tcshrc</code> 文件之后运行，并用 source 语句引用 <code>/usr/share/tcsh/examples/login</code> 文件的内容。后者包括一条语句重写了你前面设置的 PATH 环境变量。在这种情况下，你需要做的是创建 <code>~/Library/init/tcsh/path</code>文件：</p>
              <pre>mkdir -p ~/Library/init/tcsh
  pico ~/library/init/tcsh/path</pre>
              <p>并加入：</p>
              <pre>source ~/.cshrc</pre>
              <p>到文件里面。你还需要按照第一点所说的那样修改你的 .tcshrc 文件，以确保在 <code>~/.login</code> 文件没有被读取的时候 PATH 仍然被正确设置。</p>
            </li>
          </ol>
          <p>
  编辑 .cshrc （以及其它启动文件）只会影响新的 Shell（也就是说，新打开的终端窗口），所以你也需要在你编辑这个文件之前打开的所有终端窗口中运行这个命令。
  你还需要运行 <code>rehash</code> 命令，因为 tcsh 会在内部缓存所有可用的命令。
  </p>
        </li>
      </ul>
      <p>
注意这个脚本还添加了 <code>/usr/X11R6/bin</code> 和
<code>/usr/X11R6/man</code> 到你 PATH 环境变量中，使得你可以在安装了 X11 以后使用它。
Fink 软件包可以添加它们自己的设置，例如，qt 软件会设置 QTDIR 环境变量。
</p>
      <p>
一旦你的环境设置好，继续
<a href="packages.php?phpLang=zh">安装软件包</a> 章节来了解如何用 Fink 所包括的软件包管理工具来安装一些实际的软件包。
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="packages.php?phpLang=zh">3. 安装软件包</a></p>
<? include_once "../../footer.inc"; ?>


