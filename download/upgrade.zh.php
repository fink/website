<?
$title = "Upgrade Matrix";
$cvs_author = '$Author: jeff_yecn $';
$cvs_date = '$Date: 2004/03/02 03:24:11 $';

include "header.inc";
?>

<h1>Fink 升级矩阵</h1>

<p>
从 Fink 0.2.0 版开始，全部 Fink 发布版本都可以直接升级到最新的版本。
这甚至包括从 MacGIMP.com 和 OpenOSX.com 获得的 GIMP 安装；它们的第一个发行版本都是基于 Fink 0.2.1 的。
下面的表格可以帮助你找到升级 Fink 的最佳途径。
</p>
<p>
如果你不确定你安装的 Fink 的版本，请在终端窗口运行
"<code>fink --version</code>" 命令。
</p>
<p>
如果你是从早于 Fink 0.3.1 的版本升级，同时你安装了 tetex，你应该在升级前运行 "fink remove tetex" 命令。（在删除 tetex 前，也许还需要先删除那些需要依赖于 tetex 的其它程序，比如 lyx）。升级以后你可以重新安装 tetex 和其它你删除了的程序。
</p>
<? 
include "../fink_version.inc";
?>

<p>
由于 2002 年春天 SourceForge 站点的重组和 2002 年夏天我们二进制发行版的迁移，升级变得略微有些复杂。请注意仔细跟从升级说明，以确保你的升级能够成功。对二进制安装和源代码安装会有不同的升级指南。
</p>
<p>如果你在升级源代码安装版本的时候碰到困难，请查看<a href="fix-upgrade.php">这些特别指引</a>。</p>
<?
it_start();
it_item('<b>当前安装版本（二进制）</b>', '<b>升级方法</b>');
it_item("Fink 官方二进制发布版，版本 0.5.x",
  '<p>正常地通过 <tt>dselect</tt> 升级：选择 "[U]pdate"，然后 "[I]nstall"。或者用 <tt>FinkCommander</tt>，运行 "Update" 然后 "Dist-Upgrade"（两个都是在 <tt>Binary</tt> 菜单中）。</p>');
it_item("Fink 官方二进制发布版，版本 0.3.x 或 0.4.x",
  '<p>使用<a href="10.1-upgrade.php">10.1 升级指南</a>或<a href="10.2-upgrade.php">10.2 升级指南</a>的办法进行升级。</p>');
it_item("Fink 官方二进制发行版，版本 0.2.x",
  '<p>尝试 <a href="puma-kit.php">最初的10.1升级指南</a>。（Fink
维护者已经没有办法测试这个升级方式）。</p>');
it_item("MacGIMP 或 OpenOSX.com 的 Fink 0.2.1 安装",
  '<p>尝试 <a href="puma-kit.php">最初的10.1升级指南</a>。（Fink
维护者已经没有办法测试这个升级方式）。
  在升级这个软件包前确定安装了 <code>system-xfree86</code>。</p>');
it_item('<b>当前安装版本（源代码）</b>', '<b>升级方法</b>');
it_item("Fink 源代码版本 0.2.5 或更新",
  '<p>运行 "<tt>fink selfupdate</tt>"。如果你现在从 10.1 升级到 10.2，你需要运行它两次来获得完整的升级。</p>');
it_item("Fink 源代码版本 0.2.4 或更早（最低至 0.2.0）",
  "<p>如果你在 OS X 10.1 下升级，下载这个<a
  href=\"http://prdownloads.sourceforge.net/fink/packages-0.4.1.tar.gz\">软件包压缩档</a>，使用 <tt>tar</tt> 工具解压它，然后运行位于 packages-0.4.1 目录里面的 \"<code>./inject.pl</code>\" 命令</p><p>
如果你在 OS X 10.2 下升级，下载这个<a
  href=\"http://prdownloads.sourceforge.net/fink/dists-$fink_version.tar.gz\"> dists
压缩档</a>，使用 <tt>tar</tt> 工具解压它，然后运行位于 dists-$fink_version 目录里面的 \"<code>./inject.pl</code>\" 命令。</p>");
it_end();
?>


<?
include "footer.inc";
?>
