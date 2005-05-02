<a name="2005-04-29 Fink and Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink and Tiger.</span></a><?php gray_line(); ?>
<p>
Fink can be used on OS X 10.4!  There are several ways you can update:
</p><ul>
<li>
A binary installer will be available within a few weeks, for binary-only
users.
</li><li>
For users of the stable tree, we recommend that you delete your current
fink with <code>sudo rm -Rf /sw</code> and then "bootstrap" an
installation of fink-0.23.9 using
<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043&amp;release_id=323774">
fink-0.23.9.tar.gz</a>--download that file and expand it, 
eg. via
<code>tar -xvzf fink-0.23.9.tar.gz</code>.  After running the command
<code> ./bootstrap.sh </code> in the resulting
<code>fink-0.23.9</code> directory,
you'll need to run <code>fink selfupdate</code>
</li><li>
For users of the unstable tree, you may be able to upgrade just by running <code>fink selfupdate</code> if your version of fink is less than 0.24.5.  It will install fink-0.24.5 for you.  After upgrading to 10.4, first check that you have the right version of fink by issuing <code>fink --version</code>.  If your version is less than 0.24.5, run <code>fink selfupdate</code> to get the right version of fink.  Then reinstall the fink package using <code>fink reinstall fink</code>, followed by <code>fink selfupdate</code>.
</li>
</ul>
<p>Not all packages are working yet under 10.4, but that situation will
improve over the next several weeks.  The stable tree contains substantially
fewer packages than in 10.3, but all of them should compile.
</p>
<p>Of course, some wrinkles still need to be ironed out.  We encourage 
users with mission-critical applications to check in on the mailing 
lists to verify whether anyone has had experience with the package in 
question before upgrading.</p>

<a name="2005-04-29 Fink 和 Tiger"><span class="news-date">2005-04-29: </span><span class="news-headline">Fink 和 Tiger</span></a><?php gray_line(); ?>
<p>
Fink 可以在 OS X 10.4 中使用！ 你可以有几种升级的方法：
</p><ul>
<li>
在最近的几周内，将会有一个安装包发布，提供给那些只使用二进制安装包的用户。
</li><li>
对于那些使用稳定代码树的用户，我们推荐使用 <code>sudo rm -Rf /sw</code> 命令先删除当前的 fink,
然后使用 <a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043&amp;release_id=323774">
fink-0.23.9.tar.gz</a> fink-0.23.9 版本的源代码用 bootstrap 的方式安装。你首先需要从
上面链接下载源代码文件，然后用
<code>tar -xvzf fink-0.23.9.tar.gz</code> 命令解包。在解压后生成的 
<code>fink-0.23.9</code> 文件夹中运行
<code> ./bootstrap.sh </code> 命令，
然后你需要运行 <code>fink selfupdate</code> 做进一步更新。
</li><li>
对于那些使用未稳定代码树的用户，如果你的版本低于 0.24.5，你可以运行 
<code>fink selfupdate</code> 来安装 fink-0.24.5。在升级到 10.4 
完成后，首先用 <code>fink --version</code> 命令来检查你是不是已经升级到正确的版本。
如果你的版本低于 0.24.5，那么你可以用 <code>fink selfupdate</code> 来获得正确的版本。
然后你可以用 <code>fink reinstall fink</code> 来重新安装 fink 软件包，在这之后再用 
<code>fink selfupdate</code> 做进一步的更新。
</li>
</ul>
<p>目前，并非全部软件包都可以在 10.4 上运行，
但这种情况会在将来的几周内获得改善，稳定代码树中软件包的数量会比 10.3 中的明显地少，
但他们应该都可以编译通过。
</p>
<p>当然，还要一些小的细节问题需要完善。
我们鼓励使用 Fink 中软件做为关键应用的用户加入到邮件列表中，以在升级前可以了解其它人时候曾经碰到过问题。
</p>

<a name="2004-11-20 gcc 编译器问题的解决方案。"><span class="news-date">2004-11-20: </span><span class="news-headline">gcc 编译器问题的解决方案。</span></a><?php gray_line(); ?>
<p>
苹果发布了 2004 年十一月的 gcc3 更新，它可以在 connect.apple.com 下载(需要先免费注册)。这个更新修正了 XCode 1.5 中的 gcc3 编译器的问题。如果你正在使用 XCode 1.5，你应该安装这个更新。(这个更新可以正确地更新未经修改的 XCode 1.5，也可以更新那些实施了以前 fink 所推荐的临时办法的用户。)
</p><p>
我们向苹果能够响应我们提交的关于这个问题的报告，并尽快给予解决表示感谢。
</p>



