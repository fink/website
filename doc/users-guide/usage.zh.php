<?
$title = "用户指南 - fink 工具";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/04/26 16:54:28';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="用户指南 Contents"><link rel="prev" href="conf.php?phpLang=zh" title="Fink 配置文件">';

include_once "header.inc";
?>

<h1>用户指南 - 6 在命令行使用 Fink 工具</h1>
    
    
    <h2><a name="using">6.1 使用 Fink 工具</a></h2>
      
      <p><code>fink</code> 工具使用几个后缀命令来处理源程序发行包。其中的一些需要至少有一个软件包名称，但同时可以处理多个软件包。你可以简单地应用软件包的名称（例如，　gimp），或包括版本号的全名（例如 gimp-1.2.1) 或包含版本号和修订版号的名称 (例如 gimp-1.2.1-3）。在没有指明版本的情况下，Fink 会自动选择最新的版本。其它还具有不同的选项。</p>
      <p>下面是 <code>fink</code> 工具的命令清单：</p>
    
    <h2><a name="install">6.2 install</a></h2>
      
      <p>install 命令用于安装软件包。它下载，配置，构建和安装你指名的软件包。它还会自动安装需要的依赖关系，但在此之前会要求你确认。例如：</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      <p>install 命令的别名包括： update, enable, activate, use （这些别名多数是因为历史原因形成的）。</p>
    
    <h2><a name="remove">6.3 remove</a></h2>
      
      <p>remove 命令会使用 '<code>dpkg --remove</code>' 命令从系统中删除软件包。当前这个命令实现有一些缺陷：它只对 <code>fink</code> 工具知道的软件包（也就是说，那些有 .info 文件的）有效；而且它自己并不检查依赖关系，而把这个工作完全交给 dpkg 工具（虽然通常情况下这不会有问题）。</p>
      <p>remove 命令只会删除实际软件包包括的文件，而保留 .deb 压缩包文件。这意味着你可以在以后重新安装这个软件包，而不需要重新进行编译。如果你需要磁盘空间，你可以在<code>/sw/fink/dists</code> 代码树中删除它们。</p>
      <p>别名：disable，deactivate，unuse，delete。</p>
    
    <h2><a name="update-all">6.4 update-all</a></h2>
      
      <p>这个命令会更新所有已经安装的软件包到最新的版本。它不需要输入要更新的软件包清单，你只需要输入：</p>
      <pre>fink update-all</pre>
    
    <h2><a name="list">6.5 list</a></h2>
      
      <p>
这个命令产生一个可用的软件包，它的安装情况，最新版本和简单的描述。
如果你不使用其它参数的话，它会列出所有可用软件包。
你可以附上一个名称或 shell 模式，fink 会列出所有匹配的软件包。
</p>
      <p>
第一列显示的安装状态的意义为：
</p>
      <pre>
     未安装
 i   已安装最新版本
(i)  已安装，但不是最新版本
</pre>
      <p>
<code>fink list</code> 命令可以使用下面这些标志：
</p>
      <pre>
-h,--help
	  显示可用的选项。
-t,--tab
	  按制表位输出清单，这对需要在脚本中使用输出很有用。
-i,--installed
	  只显示已安装的软件包。
-o,--outdated
	  只显示已过期的软件包。
-u,--uptodate
	  只显示没有过期的软件包。
-n,--notinstalled
	  只显示没有安装的软件包。
-s=expr,--section=expr
	  只显示满足正则表达式的软件包。
-w=xyz,--width=xyz
	  设定你希望输出格式化为的宽度。xyz 可以为一个数字或者 auto。
	  auto 会根据终端的宽度来设置输出宽度。
	  默认值是 auto。
</pre>
      <p>
一些有用的例子：
</p>
      <pre>
fink list                 - 列出所有的软件包
fink list bash            - 检查 bash 是否可用，以及它的版本
fink list --outdated      - 列出过期的软件包
fink list --section=kde   - 列出属于 kde 部分的软件包
fink list "gnome*"        - 列出所有以 'gnome' 开头的软件包
</pre>
      <p>
在最后一个例子中，引号是必须的。因为这样才可以避免 shell 自己来匹配这个模式。
</p>
    
    <h2><a name="apropos">6.6 apropos</a></h2>
      
      <p>
这个命令的作用几乎和 <code>fink list</code> 一样。最主要区别是 <code>fink apropos</code> 还会搜索软件包描述来寻找软件包。第二个区别是必需提供一个搜索字符串，而不是可选的。
</p>
      <pre>
fink apropos irc          - 寻找在名称或描述中包含 'irc' 的软件包
fink apropos -s=kde irc   - 同上，但只在 kde 部分寻找
</pre>
    
    <h2><a name="describe">6.7 describe</a></h2>
      
      <p>
你在这个命令中给出软件包的名称，命令会输出它的描述。
注意，目前只有一小部分软件包有描述信息。
</p>
      <p>
别名： desc, description, info
</p>
    
    <h2><a name="fetch">6.8 fetch</a></h2>
      
      <p>下载指定的软件包，但不安装它。这个命令下载压缩档，即使以前已经下载过。</p>
    
    <h2><a name="fetch-all">6.9 fetch-all</a></h2>
      
      <p>下载 <b>所有</b> 软件包源程序文件。和 fetch　一样，它会下载即使已经下载过的压缩档。</p>
    
    <h2><a name="fetch-missing">6.10 fetch-missing</a></h2>
      
      <p>下载 <b>所有</b> 缺失的软件包源程序文件。这个命令只下载系统中没有的文件。</p>
    
    <h2><a name="build">6.11 build</a></h2>
      
      <p>构建一个软件包，并不安装它。通常，缺少的源压缩档会自动被下载。这个命令的结果是产生一个可用于安装的 .deb 软件包文件，以后你可以使用 install 命令迅速地安装它。如果 .deb 文件已经存在，这个命令会什么都不干。注意，依赖关系会被<b>安装</b>，而不仅仅是构建。</p>
    
    <h2><a name="rebuild">6.12 rebuild</a></h2>
      
      <p>构建一个软件包（和 build 命令类似），但忽略和覆盖现存的 .deb 文件。如果这个软件包已经安装，新创建的 .deb 文件也会通过 <code>dpkg</code> 安装到系统。对软件包开发过程很有用。</p>
    
    <h2><a name="reinstall">6.13 reinstall</a></h2>
      
      <p>和 install 相同，但会使用 <code>dpkg</code> 安装，即使它已经被安装。你可以用这个命令安装被意外删除的软件包文件或者改变了设置文件以后希望恢复回默认的设置。</p>
    
    <h2><a name="configure">6.14 configure</a></h2>
      
      <p>
重新运行 Fink 的配置过程。
你可以改变镜像站点和代理服务器设置等。
</p>
    
    <h2><a name="selfupdate">6.15 selfupdate</a></h2>
      
      <p>
	这个命令会自动更新到一个新的 Fink 版本。它检查 Fink 网站确定是否有新的版本。然后下载软件包描述并升级核心软件包，包括 <code>fink</code> 本身。这个命令可以升级标准的发布版本，但也可以设置你的 <code>/sw/fink/dists</code> 目录树来使用直接 CVS 进行升级。这意味着你可以访问所有软件包的最新修订版。
</p>
    
    <h2><a name="index">6.16 index</a></h2>
      
      <p>
   重建软件包缓存。通常你不应该手工运行这个命令，因为 <code>fink</code> 应该能够自动检测到什么时候需要更新。
</p>
    
    <h2><a name="validate">6.17 validate</a></h2>
      
      <p>
   这个命令会对 .info 和 .deb 文件进行一些检查。软件包维护人员在提交他们负责的软件包之前，应该运行这个命令来对它的描述和相应的构建好的软件包进行检查。
</p>
      <p>
   别名： check
</p>
    
    <h2><a name="scanpackages">6.18 scanpackages</a></h2>
      
      <p>
   使用指定的代码树来调用 dpkg-scanpackages(8) 命令。
</p>
    
    <h2><a name="checksums">6.19 checksums</a></h2>
      
      <p>
   验证 <code>/sw/src</code>　目录中所有可以验证的压缩档的 MD5 摘要。
</p>
    
    <h2><a name="cleanup">6.20 cleanup</a></h2>
      
      <p>
   删除所有已经有新版本的失效的软件包文件（.info, .patch, .deb）。
   这会释放出大量的磁盘空间。
</p>
    
    <h2><a name="dumpinfo">6.21 dumpinfo</a></h2>
      
      <p>注：仅对 fink CVS 0.20.0 之后版本有效。</p>
      <p>
	显示 Fink 如何解析软件包的 .info 文件的各个部分。各个字段和百分号展开会按照下面<b>选项</b>的设置来显示：
      </p>
      <pre>
-h, --help           - 显示可用的选项。
-a, --all            - 显示软件包描述文件的全部字段。
                       这时没有指定 --field 或 --percent 标志时的默认方式。
-f 字段名,            - 按列出的顺序显示给定的字段名
  --field=字段名
-p 关键字,            - 按列出顺序显示指定的关键字的百分号扩展
   --percent=关键字
      </pre>
    
  

<? include_once "footer.inc"; ?>
