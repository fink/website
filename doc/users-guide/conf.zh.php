<?php
$title = "用户指南 - fink.conf";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:49:23';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="用户指南 Contents"><link rel="next" href="usage.php?phpLang=zh" title="在命令行使用 Fink 工具"><link rel="prev" href="upgrade.php?phpLang=zh" title="升级 Fink">';


include_once "header.zh.inc";
?>
<h1>用户指南 - 5. Fink 配置文件</h1>
    
    
    
      <p>
本章会解释 Fink 配置文件（fink.conf）中的设置项，以及他们会对 Fink 的工作产生什么作用，尤其是 <code>fink</code> 命令行工具（也就是说使用源代码发布版本）。
</p>
    
    <h2><a name="about">5.1 关于 fink.conf</a></h2>
      
      <p>
在 Fink 安装的时候，它会询问你几个问题以建立起你的配置文件，就好像选择你希望使用来下载文件的 <a href="#mirrors">镜像网站</a> 以及如何获得超级用户权限。你可以用<code>fink configure</code> 命令来重新进行这个过程。而有一些选项，则需要直接编辑 <b>fink.conf</b> 文件。通常来说，这些选项对于熟练用户才会有用。
</p>
      <p>
<b>fink.conf</b> 文件的位置在
<code>/opt/sw/etc/fink.conf</code>，它可以用你喜欢的纯文本编辑器来编辑它。要编辑它，你需要超级用户的权限。
</p>
    
    <h2><a name="syntax">5.2 fink.conf 文件的语法</a></h2>
      
      <p>
你的 fink.conf 文件由多行组成，格式是：</p>
      <pre>选项名: 选项值</pre>
      <p>每行一个选项，选项名和选项值之间以一个冒号和一个空格分开。选项值的内容取决每个不同的选项，但通常会是一个布尔值（"True" 或 "False"），一个字符串，或用空格分开的多个字符串。 
例如：
</p>
      <pre>
BooleanOption: True
StringOption: Something
ListOption: Option1 Option2 Option3
</pre>
    
    <h2><a name="required">5.3 必需的设置</a></h2>
      
      <p>
<b>fink.conf</b> 文件里面的一些设置是不可缺的。如果缺少它们，Fink 就无法正常工作。下面的设置就属于这一类。
</p>
      <ul>
        <li>
          <p>
            <b>Basepath:</b> 路径</p>
          <p>
它告诉 Fink 它被安装在什么位置。默认的情况是 <b>/opt/sw</b>，除非你在第一次安装的时候更改了它的位置。安装以后，你<b>决不能</b>再更改这个设置，否则会使 <b>fink</b> 陷入混乱中。
</p>
        </li>
      </ul>
    
    <h2><a name="optional">5.4 可选用户设置</a></h2>
      
      <p>
有很多设置用户可以进行调整，来对 Fink 进行优化。
</p>
      <ul>
        <li>
          <p>
            <b>RootMethod:</b> su 或 sudo 或 none</p>
          <p>对一些操作，Fink 需要有超级用户权限。可供选择的选项包括 <b>sudo</b> 或 <b>su</b>。你也可以把它设为
<b>none</b>，这时，你需要自己转换到 root 权限后再运行 Fink。默认值是 <b>sudo</b>，多数情况下这不应该修改。</p>
        </li>
        <li>
          <p>
            <b>Trees:</b> 代码树列表</p>
          <p>可供选择的代码树包括：</p>
          <pre>
local/main      - 所有你希望安装的本地软件包
local/bootstrap - Fink　安装过程需要使用的软件包
stable/crypto   - 稳定的可靠（经过数字签名）软件包
stable/main     - 其它稳定软件包
unstable/crypto - 未稳定的可靠（经过数字签名）软件包
unstable/main   - 其它未稳定软件包
</pre>
          <p>
你可以根据需要在　<code>/opt/sw/fink/dists</code>　目录中加入你自己的代码树，但通常来说不需要这样做。默认的代码树是 "local/main local/bootstrap　stable/main"。这个设置清单应该与 <code>/opt/sw/etc/apt/sources.list</code> 文件内容保持一致。

(As of fink 0.21.0, <code>fink</code> does this for you automatically.)

</p>

<p>The order of the trees is meaningful, as packages from later trees in the list may
override packages from earlier ones.</p>

        </li>
        <li>
          <p>
            <b>Distribution:</b> 10.1、10.2、10.2-gcc3.3, 10.3 或 10.4</p>
          <p>Fink 需要知道你使用的 Mac OS X 版本是什么。10.0 或更早的版本不能够被支持，从这个版本的 Fink 开始，10.1 或 10.2 也不被支持。
          
          Mac OS X 10.2 users are restricted to fink-0.24.7, released in June 2005.
          
          这个字段是通过运行 <code>/opt/sw/lib/fink/postinstall.pl</code> 来设置的。你不应该手工改变这个设置值。
</p>
        </li>
        <li>
          <p>
            <b>FetchAltDir:</b> 路径</p>
          <p>通常来说 <code>fink</code> 会保存它下载的源代码到
<code>/opt/sw/src</code>　目录中。你可以用这个选项来更换保存下载源程序的目录。例如：
</p>
          <pre>FetchAltDir: /usr/src</pre>
        </li>
        <li>
          <p>
            <b>Verbose:</b> 0 到 3　之间的数字</p>
          <p>
这个选项设置 Fink 应该在运行过程中告诉你详细到什么程度的信息。取值的含义是：
<b>0</b>
            Quiet (安静模式)（不显示下载状态）
<b>1</b>
            Low (低模式)（不显示正在展开的压缩档的信息）
<b>2</b>
            Medium (中模式)（几乎显示所有信息）
<b>3</b>
            High (高模式)（显示所有信息）
默认值是 1。
</p>
        </li>
        
        <li><p><b>SkipPrompts:</b> a comma-delimited list</p><p>(<code>fink-0.25</code> and later) This option instructs <code>fink</code> to refrain from asking for input when
           the user does not want to be prompted. Each prompt belongs to a
           category. If a prompt's category is in the SkipPrompts list then
           the default option will be chosen within a very short period of
           time.</p><p>Currently, the following categories of prompts exist:</p><p><b>fetch</b> - Downloads and mirrors</p><p><b>virtualdep</b> - Choosing between alternative packages</p><p> By default, no prompts are skipped.</p></li>
        
        <li>
          <p>
            <b>NoAutoIndex:</b> 布尔值</p>
          <p>Fink 会缓存它的软件包描述文件在 /opt/sw/var/db/fink.db 中，这会减少每次运行时读取和解析这些文件的时间。除非这个值被设成 "True"，否则 Fink 会每次都检查软件包的索引时候需要更新。默认情况下它被设成 "False"。我们不推荐你更改它。如果你真的改动了它，你需要手工运行　<code>fink index</code> 命令来更新索引。</p>
        </li>
        <li>
          <p>
            <b>SelfUpdateNoCVS:</b> 布尔值</p>
          <p><code>fink selfupdate</code>　命令会更新 Fink软件管理器到最新的版本。当这个选项设为 True 的时候，将保证不会使用协作式版本管理系统（CVS）来更新软件包。它由 <code>fink　selfupdate-cvs</code> 命令自动设置，所以你不需要手工改变它。</p>
        </li>
        <li>
        		<p><b>Buildpath:</b> 路径</p>
        		
        		<p>Fink 在从源代码编译的时候，需要创建几个临时的目录。默认情况下，它们被放置在 <code>/opt/sw/src</code> (on Panther and earlier) 下， <code>/opt/sw/src/fink.build</code> (on Tiger) 下，不过，如果你想把它们放在其它地方的话，可以在这里指明路径。查阅本文档后面关于 <code>KeepRootDir</code> 和 <code>KeepBuildDir</code> 字段的描述获取关于这个临时目录的更多信息 (<a href="#developer">Developer Settings</a>)。</p>
	    <p>On Tiger, it is recommended that the Buildpath end with <code>.noindex</code>
or <code>.build</code>. Otherwise, Spotlight will attempt to index the temporary files in
the Buildpath, slowing down builds.
    	</p>
                
        </li>

        <li><p><b>Bzip2Path:</b> the path to your <code>bzip2</code> (or compatible) binary
          </p><p>(<code>fink-0.25</code> and later) The Bzip2Path option lets you override the default path for the
           <code>bzip2</code> command-line tool.  This allows you to specify an alternate
           location to your <code>bzip2</code> executable, pass optional command-line
           options, or use a drop-in replacement like <code>pbzip2</code> for decompressing
           <code>.bz2</code> archives.</p></li>

      </ul>
    
    <h2><a name="downloading">5.5 下载设置</a></h2>
      
      <p>有几个设置会影响 Fink 下载软件包数据的方式。</p>
      <ul>
        <li>
          <p>
            <b>ProxyPassiveFTP:</b> 布尔值</p>
          <p>这个选项使得 Fink 使用 "被动" 模式来进行 FTP 下载。某些 FTP 服务器或网络配置会要求这个设置必须为 。建议永远保持这个选项为打开，因为主动模式的 FTP 已经过时了。</p>
        </li>
        <li>
          <p>
            <b>ProxyFTP:</b> url</p>
          <p>如果你使用 FTP 代理，那么你应该这里输入它的地址，例如：</p>
          <pre>ProxyFTP: ftp://yourhost.com:2121/</pre>
          <p>留空这一项，如果你不需要使用 FTP 代理。</p>
        </li>
        <li>
          <p>
            <b>ProxyHTTP:</b> url</p>
          <p>如果你使用 HTTP 代理，那么你应该在这里输入它的地址，例如：</p>
          <pre>ProxyHTTP: http://yourhost.com:3128/</pre>
          <p>留空这一项，如果你不需要使用 HTTP 代理。</p>
        </li>
        <li>
          <p>
            <b>DownloadMethod:</b> wget 或 curl 或 axel 或 axelautomirror</p>
          <p>Fink 可以使用三种不同的程序来从网上下载程序 —— <b>wget</b>，<b>curl</b> 或 <b>axel</b>。而 <b>axelautomirror</b> 会使用 <b>axel</b> 的一种实验中的模式，这种模式会自动检测包含你要下载的文件的离你最近的服务器。目前不推荐使用 <b>axelmirror</b>。默认值是 <b>curl</b>。
<b>你这里选择的程序必须已经安装在你的计算机上！</b>
          
          (i.e. <code>fink</code>won't fall back to <b>curl</b> if you try to use a download application that isn't present.
          
          </p>
        </li>

        <li>
          <p>
            <b>SelfUpdateMethod:</b> point, rsync or git</p>
          <p>
<code>fink</code> can use some different methods to update the package info files.
<b>rsync</b> is the recommended setting; it uses rsync to download only
modified files in the <a href="#optional">trees</a> that you have enabled. Note that if you have
changed or added to files in the <code>stable</code> or <code>unstable</code> trees, using rsync will
delete them. Make a backup first, e.g. in your <code>local</code> tree. <b>git</b> will download using anonymous or
Github access from the Fink repository. This has the disadvantage that git
can not switch mirrors; if the server is unavailable you will not be able to
update. <b>point</b> will download only the latest released version of the
packages. It is not recommended as your packages may be quite out of date.
          </p>
        </li>
        <li><p><b>SelfUpdateCVSTrees:</b> list of trees
           </p><p>(<code>fink-0.25</code> and later) By default, the <b>cvs</b> selfupdate method will update only the current
           distribution's tree.  This option overrides the list of distribu-
           tion versions that will be updated during a selfupdate.

           Please note that you will need a recent "cvs" binary installed if
           you wish to include directories that do not have CVS/ directories
           in their entire path (e.g., dists/local/main or similar).</p></li>
        <li>
          <p>
            <b>UseBinaryDist:</b> boolean</p>
          <p>
Causes <code>fink</code> to try to download pre-compiled binary packages from the binary
distribution if available and if the binary package is not already on the
system. This can save a lot of installation time and it is therefore 
recommended to set this option. Passing fink the 
<a href="usage.php?phpLang=zh">--use-binary-dist</a> option (or the <code>-b</code> flag) has the same effect,  
but only operates on that single <code>fink</code> invocation.  Passing <code>fink</code> the
           <code>--no-use-binary-dist</code> flag overrides this, and compiles from source
           for that single <code>fink</code> invocation.
<b>Only available as of  fink version 0.23.0</b>.
          </p><p>Note that this mode instructs <code>fink</code> to download an available binary  
           if that version is the latest available version of the package; it does <b>not</b> cause <code>fink</code>
           to choose a version based on its binary availability.
</p>
        </li>

      </ul>
    
    <h2><a name="mirrors">5.6 镜像站点设置</a></h2>
      
      <p>从网上获取软件可能会是一个冗长的过程。经常下载的速度不会象我们所希望的那样快。镜像服务器会从其它服务器中拷贝文件，但可能它会有一个更快的网络连接，或者它在地理上离你更近，这样从它上面下载会更快些。同时它们也可以分担主服务器的负担，其中一个例子是<b>ftp.gnu.org</b>，在一个访问不到的时候，它会提供另一个替代的服务器。</p>
      <p>为了让 Fink 能够使用最合适你的镜像服务器，你要告诉它你居住在哪个洲和哪个国家。如果不能从某个服务器下载，它会提示你是：重试相同的镜像站点，连接与你在相同国家或洲的另一个镜像服务器，还是世界上任意一个镜像服务器。</p>
      <p><b>fink.conf</b> 文件中保存着你希望使用哪些镜像服务器的信息。</p>
      <ul>
        <li>
          <p>
            <b>MirrorContinent:</b> 三个字母的代号</p>
          <p>你应该使用 <code>fink configure</code>
命令来更改这些取值。三个字母的代号可以在 <code>/opt/sw/lib/fink/mirror/_keys</code> 文件中找到。
例如，如果你住在亚洲：</p>
          <pre>MirrorContinent: asi</pre>
        </li>
        <li>
          <p>
            <b>MirrorCountry:</b> 六个字母代号</p>
          <p>你应该使用 <code>fink configure</code>
命令来更改这些取值。六个字母由三个字母的洲代号（见上面的描述），一个减号，以及两个字母的国家代号组成。你可以在 <code>/opt/sw/lib/fink/mirror/_keys</code> 文件中找到它们。
例如，如果你住在中国：</p>
          <pre>MirrorCountry: asi-CN</pre>
        </li>
        <li>
          <p>
            <b>MirrorOrder:</b> MasterFirst 或 MasterLast 或 MasterNever 或 ClosestFirst</p>
          <p>
Fink 支持 '主（master）镜像服务器'，它镜像保存了 Fink 中有的所有软件包的源程序压缩档。使用主镜像服务器的好处是下载源程序的链接不会失效。用户可以选择使用这些由 Fink 团队维护的镜像服务器，或使用那些原始的源程序站点和外部的镜像服务器：例如 gnome，KDE 和 　debian 的镜像网站。
另外，用户还可以选择结合两种设置，并按上文所说的办法以邻近的次序来进行搜索。如果使用 MasterFirst 或 MasterLast 选项，当某个服务器失效时，用户可以“跳转到”到主服务器（或非主服务器）组。选项包括：
</p>
          <pre>
MasterFirst - 优先搜索 "主" 镜像服务器。
MasterLast - 最后搜索 "主" 镜像服务器。
MasterNever - 不搜索 "主" 镜像服务器。
ClosestFirst - 优先搜索最近的镜像服务器（把所有镜像服务器合在一组）。
</pre>
        </li>
        
        <li><p><b>Mirror-rsync:</b>
           </p><p>(<code>fink-0.25.2</code> and later) When doing <code>fink selfupdate</code> with the <b>SelfupdateMethod</b> set to <code>rsync</code>,
           this is the rsync url to sync from.  This should be an anonymous
           rsync url, pointing to a directory which contains all the fink Dis-
           trubutions and Trees.
</p></li>
		
      </ul>
    
    <h2><a name="developer">5.7 开发人员设置</a></h2>
      
      <p>在 <b>fink.conf</b> 中一些选项只是对开发人员有用。我们不推荐 Fink 用户修改它们。下面的一些选项属于这一类。</p>
      <ul>
        <li>
          <p>
            <b>KeepRootDir:</b> 布尔值</p>
          <p>使得 <code>fink</code> 不会在构建好一个软件包以后删除 <code>root-[name]-[version]-[revision]</code> 目录会在 <b>BuildPath</b>。默认值是 False。<b>注意，使用这个选项可以很快塞满你的硬盘！</b>
          传递 <b>-K</b> 标志给 <b>fink</b> 可以起到相同的效果，但只对单次的 <code>fink</code> 调用起作用。
          </p>
        </li>
        <li>
          <p>
            <b>KeepBuildDir:</b> boolean</p>
          <p>使得 Fink 不会在构建好一个软件包以后删除 <code>[name]-[version]-[revision]</code> 目录会在 <b>BuildPath</b>。默认值是 False。<b>注意，使用这个选项可以很快塞满你的硬盘！</b>
          传递 <b>-K</b> 标志给 <code>fink</code> 可以起到相同的效果，但只对单次的 <code>fink</code> 调用起作用。
          </p>
        </li>
      </ul>
    
    
    <h2><a name="advanced">5.8 Advanced Settings</a></h2>
      
      <p>There are some other options which may be useful, but require some knowledge to get right.</p>
      <ul>
        <li>
          <p>
            <b>MatchPackageRegEx:</b> </p>
          <p>Causes fink not to ask which package to install if one (and only one) of the choices matches the perl Regular Expression given here. Example:</p>
          <pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>
          <p>will match packages ending in '-ssl', and will match 'xfree86' and 'xfree86-shlibs' exactly.</p>
        </li>
        <li>
          <p>
            <b>CCacheDir:</b> path</p>
          <p>If the Fink package <code>ccache-default</code> is installed, the cache files it makes
while building Fink packages will be placed here. Defaults to <code>/opt/sw/var/ccache</code>. If set to <code>none</code>, fink will not set the CCACHE_DIR environment variable and ccache will use <code>$HOME/.ccache</code>, potentially putting root-owned files into your home directory.
<b>Only available in fink newer than version 0.21.0</b>.
          </p>
        </li>
        <li><p><b>NotifyPlugin:</b> plugin</p><p>
           Specify a notification plugin to tell you when packages have been
           installed/uninstalled.  Defaults to Growl (requires <code>Mac::Growl</code> to
           operate).  Other plugins can be found in the
           <code>/opt/sw/lib/perl5/Fink/Notify</code> directory.
</p></li>
        
        <li><p><b>AutoScanpackages:</b> boolean
           </p><p>When <code>fink</code> builds new packages, <code>apt-get</code> does not immediately know about
           them.  Historically, the command <code>fink scanpackages</code> had to be run
           for <code>apt-get</code> to notice the new packages, but now this happens auto
           matically. If this option is present and <b>false</b>, then <code>fink
           scanpackages</code> will no longer be run automatically after packages are
           built.  Defaults to <b>true</b>.
</p></li>
        <li><p><b>ScanRestrictivePackages:</b> boolean
           </p><p>When scanning the packages for <code>apt-get</code>, <code>fink</code> normally scans all
           packages in the current trees. However, if the resuting apt repository will be made publically available, the administrator may be
           legally obligated not to include packages with <code>Restrictive</code> or
           <code>Commercial</code> licenses. If this option is present and <b>false</b>, then Fink
           will omit those packages when scanning.</p></li>
		
      </ul>
    
    
    
    <h2><a name="sourceslist">5.9 Managing apt's sources.list file</a></h2>
      
      <p>Starting with fink 0.21.0, fink actively manages the file
<code>/opt/sw/etc/apt/sources.list</code> which is used by apt to locate
binary files for installation.  The default sources.list file looks 
something like this, adjusted to match your Distribution and Trees:
</p>
      <pre># Local modifications should either go above this line, or at the end.
#
# Default APT sources configuration for Fink, written by the fink program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in 
# /opt/sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding Packages.gz files
deb file:/opt/sw/fink local main
deb file:/opt/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main crypto

# Put local modifications to this file below this line, or at the top.
</pre>
      <p>With this default file, apt-get first looks in your local installation
for already-compiled binaries, and then looks in the official binary
distribution.  You can alter this by making entries at the beginning of
the file (which will be searched first) or at the end of the file (which
will be searched last).</p>
      <p>If you change your Trees line or the Distribution you are using,
fink will automatically modify the "default" portion of the file to
correspond to the new values.  Fink will, however, preserve any local
modifications you have made to the file, provided that you confine your
modifications to the top of the file (above the first default line) and
the bottom of the file (below the last default line).
</p>
      <p>
Note: If you had modified <code>/opt/sw/etc/apt/sources.list</code> prior to upgrading
to fink 0.21.0, you will find your former file stored at <code>/opt/sw/etc/apt/sources.list.finkbak</code> .
</p>
    
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=zh">6. 在命令行使用 Fink 工具</a></p>
<?php include_once "../../footer.inc"; ?>


