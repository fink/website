<?

$title = "用户指南 - fink.conf";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/07 01:55:45';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=zh\" title=\"用户指南 Contents\">\n\t<link rel=\"next\" href=\"usage.php?phpLang=zh\" title=\"在命令行使用 Fink 工具\">\n\t<link rel=\"prev\" href=\"upgrade.php?phpLang=zh\" title=\"升级 Fink\" />";

include_once "header.zh.inc"; 
?><h1>用户指南 - 5 Fink 配置文件</h1>
    
    
    
      <p>
本章会解释 Fink 配置文件（fink.conf）中的设置项，以及他们会对 Fink 的工作产生什么作用，尤其是 <code>fink</code> 命令行工具（也就是说使用源代码发布版本）。
</p>
    
    <h2><a name="about">5.1 关于 fink.conf</a></h2>
      
      <p>
在 Fink 安装的时候，它会询问你几个问题以建立起你的配置文件，就好像选择你希望使用来下载文件的 <a href="#mirrors">镜像网站</a> 以及如何获得超级用户权限。你可以用<code>fink configure</code> 命令来重新进行这个过程。而有一些选项，则需要直接编辑 <b>fink.conf</b> 文件。通常来说，这些选项对于熟练用户才会有用。
</p>
      <p>
<b>fink.conf</b> 文件的位置在
<code>/sw/etc/fink.conf</code>，它可以用你喜欢的纯文本编辑器来编辑它。要编辑它，你需要超级用户的权限。
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
它告诉 Fink 它被安装在什么位置。默认的情况是 <b>/sw</b>，除非你在第一次安装的时候更改了它的位置。安装以后，你<b>决不能</b>再更改这个设置，否则会使 Fink 陷入混乱中。
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
你可以根据需要在　<code>/sw/fink/dists</code>　目录中加入你自己的代码树，但通常来说不需要这样做。默认的代码树是 "local/main local/bootstrap　stable/main"。这个设置清单应该与 <code>/sw/etc/apt/sources.list</code> 文件内容保持一致。
</p>
        </li>
        <li>
          <p>
            <b>Distribution:</b> 10.1 或 10.2</p>
          <p>Fink 需要知道你使用的 Mac OS X 版本是什么。
10.1 指用户使用 Mac OS X 10.1，而 10.2 则只对那些使用 Mac OS X 10.2 "Jaguar" 的用户有效。
Mac OS X 10.0 及更早的版本并不被支持。你不应该改变这个设置值。
</p>
        </li>
        <li>
          <p>
            <b>FetchAltDir:</b> 路径</p>
          <p>通常来说 Fink 会保存它下载的源代码到
<code>/sw/src</code>　目录中。你可以用这个选项来更换保存下载源程序的目录。例如：
</p>
          <pre>FetchAltDir: /usr/src</pre>
        </li>
        <li>
          <p>
            <b>Verbose:</b> 0 到 3　之间的数字</p>
          <p>
这个选项设置 Fink 应该在运行过程中告诉你详细到什么程度的信息。取值的含义是：
<b>0</b>
            安静模式 （不显示下载状态）
<b>1</b>
            低模式 （不显示正在展开的压缩档的信息）
<b>2</b>
            中模式 （几乎显示所有信息）
<b>3</b>
            高模式 （显示所有信息）
默认值是 3。
</p>
        </li>
        <li>
          <p>
            <b>NoAutoIndex:</b> 布尔值</p>
          <p>Fink 会缓存它的软件包描述文件在 /sw/var/db/fink.db 中，这会减少每次运行时读取和解析这些文件的时间。除非这个值被设成 "True"，否则 Fink 会每次都检查软件包的索引时候需要更新。默认情况下它被设成 "False"。我们不推荐你更改它。如果你真的改动了它，你需要手工运行　<code>fink index</code> 命令来更新索引。</p>
        </li>
        <li>
          <p>
            <b>SelfUpdateNoCVS:</b> 布尔值</p>
          <p><code>fink selfupdate</code>　命令会更新 Fink软件管理器到最新的版本。当这个选项设为 True 的时候，将保证不会使用协作式版本管理系统（CVS）来更新软件包。它由 <code>fink　selfupdate-cvs</code> 命令自动设置，所以你不需要手工改变它。</p>
        </li>
      </ul>
    
    <h2><a name="downloding">5.5 下载设置</a></h2>
      
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
命令来更改这些取值。三个字母的代号可以在 <code>/sw/lib/fink/mirror/_keys</code> 文件中找到。
例如，如果你住在亚洲：</p>
          <pre>MirrorContinent: asi</pre>
        </li>
        <li>
          <p>
            <b>MirrorCountry:</b> 六个字母代号</p>
          <p>你应该使用 <code>fink configure</code>
命令来更改这些取值。六个字母由三个字母的洲代号（见上面的描述），一个减号，以及两个字母的国家代号组成。你可以在 <code>/sw/lib/fink/mirror/_keys</code> 文件中找到它们。
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
      </ul>
    
    <h2><a name="developer">5.7 开发人员设置</a></h2>
      
      <p>在 <b>fink.conf</b> 中一些选项只是对开发人员有用。我们不推荐 Fink 用户修改它们。下面的一些选项属于这一类。</p>
      <ul>
        <li>
          <p>
            <b>KeepRootDir:</b> 布尔值</p>
          <p>使得 Fink 不会在构建好一个软件包以后删除 /sw/src/root-name-version 目录。默认值是 False。<b>注意，使用这个选项可以很快塞满你的硬盘！</b>
          </p>
        </li>
        <li>
          <p>
            <b>KeepBuildDir:</b> boolean</p>
          <p>使得 Fink 不会在构建好一个软件包以后删除 /sw/src/name-version 目录。默认值是 False。<b>注意，使用这个选项可以很快塞满你的硬盘！</b>
          </p>
        </li>
      </ul>
    
  <p align="right">
Next: <a href="usage.php?phpLang=zh">6 在命令行使用 Fink 工具</a></p><? include_once "../../footer.inc"; ?>
