<?

$title = "用户指南 - 升级";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/02/19 07:13:51';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=cn\" title=\"用户指南 Contents\" /><link rel=\"next\" href=\"conf.php?phpLang=cn\" title=\"Fink 配置文件\" /><link rel=\"prev\" href=\"packages.php?phpLang=cn\" title=\"安装软件包\" />";

include_once "header.cn.inc"; 
?><h1>用户指南 - 4 升级 Fink</h1>
    
    
    
      <p>
本章介绍如何升级你的 Fink 安装到最新和最好的版本。
</p>
    
    <h2><a name="bin">4.1 用二进制包进行升级</a></h2>
      
      <p>
如果你只是使用二进制包进行安装，那么不需要什么特别的升级步骤。
简单地选择你喜欢的工具从服务器上获取最新的软件包，并安装需要的所有软件包就可以了。
</p>
      <p>
对于 dselect，只需要选择 "[U]pdate"，然后 "[I]nstall"　就足够了。
当然，你也许会希望在两个步骤中间运行 "[S]elect" 来查看做了什么选择以及新软件包的有关信息。
</p>
      <p>
对于 apt，运行 <code>apt-get update</code> 来获取最新的软件包清单，然后运行 <code>apt-get upgrade</code> 来更新全部有新版本的软件包。
</p>
<p>对于 Fink Commander，选择 Binary-&gt;Update descriptions 来更新软件包清单，然后选择 Binary-&gt;Dist-Upgrade packages 来升级到新的版本。</p>
      <p>
更多的信息，尤其是关于升级 Fink 0.3.0　之前版本，参见
<a href="http://fink.sourceforge.net/download/upgrade.php">Upgrade Matrix</a>。
</p>
    
    <h2><a name="src">4.2 升级从源码安装版本</a></h2>
      
      <p>
如果你使用的是源码安装，升级会稍微复杂一些。
整个过程由两个步骤组成。
第一步，下载最新的软件包描述到你的计算机。
第二步，使用这些软件包描述来编译新的软件包，实际的源代码会根据需要下载。
</p>
      <p>
如果你使用 Fink 0.2.5 或更新版本，第一步可以运行 <code>fink selfupdate</code>。
这个命令会检查 Fink 网站看是否有一个新的版本发布，如果有的话，会自动下载和安装软件包描述文件。
在最新的 <code>fink</code> 版本的命令中，你可以选择直接从 CVS 或通过 rsync 来直接获取软件包描述。
CVS 是一个具有版本控制功能的储存库，它保存和管理软件包描述文件。
使用 CVS 的优点是它是不断更新的，缺点是对 Fink 只有一个 CVS 服务器，如果访问量太大，它会变得不稳定。因此，对通常用户，我们推荐使用 rsync。对于 rsync，我们有多个镜像站点。唯一得缺点是新得版本在 CVS 发布以后会大约需要一个小时后才会更新到 rsync 镜像站点上。
</p>
      <p>（如果你在升级从源码安装得版本中碰到问题，请查阅　
<a href="http://fink.sourceforge.net/download/fix-upgrade.php">一些特殊指引</a>。）</p>
      <p>
如果你的 Fink 是 0.2.5　之前得版本，你需要手工下载软件包描述文件。
访问 <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">下载区</a>，在 "distribution"　模块中寻找最新的 packages-0.x.x.tar.gz 压缩档。
下载它，然后按下面的办法安装：
</p>
      <pre>tar -xzf packages-0.x.x.tar.gz
cd packages-0.x.x
./inject.pl</pre>
      <p>
更新了软件包描述以后（无论你采用什么办法），
你应该可以用　<code>fink　update-all</code>　命令一次更新所有软件包。
</p>
<p>如果使用 Fink Commander 更新源代码发布版本，选择 Source-&gt;Selfupdate 下载最新的软件包信息文件，然后选择 Source-&gt;Updata-all 来更新所有不是最新的软件包。</p>
    
    <h2><a name="mix">4.3 混合使用二进制和源文件安装的情况</a></h2>
      
      <p>
如果你的某些软件包是使用预编译好的二进制安装包安装，而另外一些则使用源代码安装，你需要使用上面的两套步骤来更新你的 Fink 安装。
也就是说，首先使用 <code>dselect</code> 或 <code>apt-get</code> 来获取可用的二进制安装版本，然后使用 <code>fink selfupdate</code> 和 <code>fink update-all</code>　来过去最新的软件包描述，并更新剩下的软件包。如果你使用 Fink commander，请按照 <a href="#bin">二进制升级</a> 的指引，然后在按 <a href="#src">源代码升级</a>完成剩下的步骤。
</p>

    
  <p align="right">
Next: <a href="conf.php?phpLang=cn">5 Fink 配置文件</a></p><? include_once "../../footer.inc"; ?>
