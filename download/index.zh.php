<?
$title = "Download Quick Start";
$cvs_author = '$Author: jeff_yecn $';
$cvs_date = '$Date: 2004/03/02 03:24:11 $';

include "header.inc";
?>


<h1>下载 Fink</h1>
<p>
有很多办法可以安装或升级。
对新用户，推荐参考下面“快速上手”里面的方法。
其它用户，请参考<a href="overview.php">概述</a>和<a href="upgrade.php">升级矩阵</a>。
</p>

<h2>快速上手</h2>
<p>
刚刚接触 Fink？这个“快速上手”指南正是使你可以迅速用上我们的二进制发行版。
</p>
<? 
include "../fink_version.inc";
?>

<ol>
<li><p>
下载安装程序磁盘映象：<br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Installer.dmg?download">Fink
<? print $fink_version; ?> 二进制安装包</a> - <? print $dmg_size; ?><br>
（10.1 用户 － 使用 <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink
0.4.1</a>）
</p>
</li>
<li><p>
双击 "Fink-<? print $fink_version; ?>-Installer.dmg" 文件装载磁盘映象，
然后双击里面 "Fink <? print $fink_version; ?> Installer.pkg" 程序。接着按照屏幕的提示进行操作。
</p></li>
<li><p>
在安装的最后阶段，会打开一个终端程序，pathsetup.command 脚本会被自动运行。在编辑你的 shell 配置文件前，会提示请求你的同意。当脚本运行完毕，关闭终端窗口以后，一切都安装就绪了！
</p></li>
<li><p>
如果在此过程中发生了什么错误，你可以尝试重新运行一次安装程序宗卷里面的 pathsetup.command 文件（需要在终端窗口里面运行）。 
</p><pre>open /sw/bin/pathsetup.command <RETURN></pre><p>
（这个过程应该对你机器的每个帐号都运行一次：每个用户应该登录到自己的帐号运行一次 pathsetup.command 脚本）。
</p><p>
如果 pathsetup.command 产生了错误信息，请参考文档，
尤其是《用户指南》里面的
<a href="../doc/users-guide/install.php#setup">2.3 “设置你的环境”</a>。</p>
</li>
<li><p>
打开一个新的终端程序并运行下面的命令 "<code>fink scanpackages; fink index</code>"，或使用所附的 Fink Commander 图形界面程序（你应该把它拖拽到你你系统的合适文件夹里面，而不要在磁盘映象里面运行）选择菜单：<em>Source->scanpackages</em> followed by <em>Source->Tools->index</em>。
</p>
</p></li>
<li><p>一旦做完上面的两个命令，你应该更新 <code>fink</code> 软件包，比确保已经读取发布以后可能又有的重要变化。在这以后你可以安装其它软件包。你有几种办法：
<ul>
<li>
<p>使用所附的 Fink Commander 来选择和安装软件包。Fink Commander 提供一个 Fink 的简单易用的图形界面。对新用户或不习惯命令行的用户这是一个推荐的办法。Fink Commander 有二进制（Binary）和源代码（Source）两个菜单。如果你没有安装开发工具包或不希望自己编译源程序，你应该用二进制方式安装。</p>
<ul><li><p>Fink Commander 中用二进制文件更新 <code>fink</code> 的操作步骤为：</p>
<ol>
<li>Binary->Update descriptions</li>
<li>选择 <code>fink</code> 软件包。</li>
<li>Binary->Install</li>
</ol></li>
<li><p>推荐的在 Fink Commander 中从源代码更新 <code>fink</code> 的操作步骤为：</p>
<ol>
<li>Source->Selfupdate</li> 
<li>Tools->Interact with Fink...
<li>确认 "Accept default response" 已经选中，然后点击 "Submit"。</li>
<li><code>fink</code> 和其它基础软件包会自动构建和运行</li>
</ol></li></ul>
<p>现在你已经更新好 <code>fink</code>，你可以安装其它软件包。</p>  
<ul>
<li>要从二进制文件安装，选择软件包，然后使用 Binary->Install。</p></li>
<li>要从源代码安装，选择软件包，然后 Source->Install。</li>
</ul>
</li>
<li>
<p>使用 Use apt-get。Apt-get 可以为你获取和安装二进制软件包，而节省编译的时间。如果你没有安装开发工具包的话，你也可以使用这个办法或 Fink Commander 的二进制安装模式（见上）。</p>
<p>要更新 <code>fink</code>，打开终端程序窗口，输入 <code> sudo apt-get update ; sudo apt-get install fink</code></p>
<p>在你更新了 <code>fink</code>以后，你可以使用类似的语法安装其它的软件包，例如：<code>sudo apt-get install gimp</code> 来安装 Gimp。注意，并不是全部 fink 软件包都有二进制安装版本的。</p>
</li>
<li>
<p>从源代码安装。要更新 <code>fink</code>，运行 <code>fink selfupdate</code> 命令。在后面会有提示让你选择，请选择 (1), "rsync"。这会自动更新 <code>fink</code> 软件包。</p>
<p>一旦 <code>fink</code> 已经更新，你可以使用 "<code>fink install</code>" 来获取和编译源代码形式提供的软件包。例如，要安装 Gimp，运行 <code>fink install gimp</code>。</p> 
</li> 
</ul>

</li> 
</ol>

<p>
要了解更多信息，请参考<a
href="../faq/index.php">常见疑问</a>和<a
href="../doc/index.php">文档</a>。
如果在上面的文档中找不到答案，请查看<a
href="../help/index.php">帮助页面</a>。
</p>
<p>
希望通知新版本发布的消息，可以订阅 <a
href="../lists/fink-announce.php">fink-声明 邮件列表</a>.
</p>

<p>
安装磁盘映象文件里面的软件的源代码可以在本站
<a
href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">这里</a>下载。
</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
