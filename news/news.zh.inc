<a name="2005-06-09 New Fink releases."><span class="news-date">2005-06-09: </span><span class="news-headline">New Fink releases.</span></a><?php gray_line(); ?>
<p>
Three new Fink releases are 
<a href="<?php print $root; ?>download/index.php">available</a>
 today: version 0.8.0 (for 10.4),
version 0.7.2 (for 10.3), and version 0.6.4 (for 10.2).
All three releases include source files, binary packages, and a Fink
installer for new users.
</p>
<p>
The new release for 10.4 includes all currently-available "stable" packages
in source and binary form: there are 1565 of these, which constitutes more
than 80% of the 1909 packages available in the 10.3 release.  Work continues
by the fink developers on bringing more of the stable packages to Tiger.
</p>
<p>
The new release for 10.2 will be the last official release for that
version of Mac OS X.  Although no further updates (not even security
updates) will be provided by the Fink team, we anticipate that the
0.6.4 release will be usable for years to come.
</p>
<p>
Users upgrading to 10.4 can now simply issue a 
<code>fink selfupdate</code> command, followed by
<code>sudo /sw/lib/fink/postinstall.pl</code> (for first-time updaters
on 10.4), <code>fink scanpackages</code> and <code>sudo apt-get update</code>.
We don't recommend bootstrapping at the moment, since bootstrapping does
not work with the newly-released XCode 2.1 from Apple.
</p>
<p>
Note added 6/19/05: If the Fink-0.8.0 binary installer complains that the
volume does not support symlinks, try launching Disk Utility (from the 
Utilities folder inside the Applications folder), selecting the 
problematic volume and clicking on "repair disk permissions."  
Also, the installer requires you to have administrative privileges, so be 
sure that you're running it as such a user.
</p>
<p>
Note added 6/30/05:  To avoid contamination with obsolete headers and 
the like, we recommend that people who want to build packages from source 
should perform a clean install of XCode via running the 
<code>/Developer/Tools/uninstall-devtools.pl</code> script.  For best 
results, you may want to do this before updating your OS.
</p>

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



