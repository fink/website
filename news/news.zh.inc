<a name="2004-10-15 Workaround for gcc problems."><span class="news-date">2004-10-15: </span><span class="news-headline">Workaround for gcc problems.</span></a><?php gray_line(); ?>
<p>
The version of gcc included with XCode 1.5 is known to produce 
incorrect output from c++ code under certain circumstances.
Fink now has a mechanism to warn users about this, and Fink will soon
refuse
to use the "broken" gcc to compile packages which are known to
have this problem.
</p><p>
If you have already upgraded XCode to version 1.5, there is a workaround,
described <a href="<?php print $root; ?>http://article.gmane.org/gmane.os.apple.fink.beginners/13580/match=cc1plus+download+costabel"> here </a>.
</p><p> If you have not yet upgraded, you should consider remaining with
XCode version 1.2 until the problem has been resolved.
</p>


<a name="2004-09-20 Fink 0.7.1 released."><span class="news-date">2004-09-20: </span><span class="news-headline">Fink 0.7.1 released.</span></a><?php gray_line(); ?>
<p>
最新的 Fink 发行版，0.7.1 (针对 OS X 10.3),
现在已经以源代码和二进制版本两种形式向用户提供。这个版本是针对 OS X 的 Panther (10.3) 版本而设计的。针对 Jaguar (10.2) 的 0.6.3 版也仍然可以下载得到。 
</p>

<p>
这个新的发行版包括了对软件包管理器的修正，以及加进了许多以前没有包括的二进制软件包，现在二进制包的总数已经达到 1650 个。其中包括 KDE 3.1.4 和 GNOME 2.4。
</p>

<p>
要安装一个新的 Fink，你可以按照
<a href="<?php print $root; ?>download/index.php">这里</a>的指南来进行。
你可以在你当前的版本的基础上直接升级到最新的版本。

关于 0.7.0 和 0.7.1 的区别的完整清单可以在
<a href="<?php print $root; ?>http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable%26cmp=0%26tree2=0.7.0-stable%26splitoffs=on%26sort=name">这个页面</a>查看得到。
</p>

<p>
如果你有任何疑问，请尝试使用 Fink 的邮件列表。你可以在
<a href="<?php print $root; ?>lists/index.php">这里</a>了解到更多的有关知识。
</p>

<p>
请确定你选择了适合你使用的操作系统版本的<b>合适的安装程序</b>。
Fink 0.6.3 只能安装在 Mac OS X 10.2 上，* 而 Fink 0.7.1 则只能安装在 Mac OS X 10.3 上。*
</p>

<p>
Fink 团队谨向它众多的贡献者，帮助者和开发者致谢。它们使得这个版本的发布成为了现实。
我们也向我们的用户社区表示感谢，他们下载上一个版本 0.7.0 超过 130,000 次。 
没有他们一直一来的支持和建议，Fink 不可能取得今天的成就。
</p>

<a name="2004-08-23 Problems with XCode 1.5"><span class="news-date">2004-08-23: </span><span class="news-headline">Problems with XCode 1.5</span></a><?php gray_line(); ?>
	<p>
	In the past few days, there have been reports that some fink packages 
	do not compile correctly using XCode 1.5.  If you have not already
	upgraded to XCode 1.5, we suggest that you wait until this issue
	is resolved before doing so.
	</p><p>
	If you are having problems with a package which compiled under
	XCode 1.2 but does not compile correctly under XCode 1.5, 
	please report the package to
	the fink-devel mailing list.  (The usual symptom is: some symbols
	are  missing after compiling with g++.)  
	Packages already known to have this problem include
	octave, singular-factory, singular-libfac, and possibly sdl.
	</p>
	
