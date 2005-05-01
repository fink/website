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
对于那些使用未稳定代码树的用户，你可以通过安装 fink-0.24.5 版本的方式进行升级。在升级到 10.4 
完成后，你可以用 <code>fink reinstall fink</code> 来重新安装 fink 软件包，在这之后再用 
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


<a name="2004-10-15 gcc 问题的临时解决办法。"><span class="news-date">2004-10-15: </span><span class="news-headline">gcc 问题的临时解决办法。</span></a><?php gray_line(); ?>
<p>
在 XCode 1.5 中包括的 gcc 版本已经被发现在某些情况下会对 c++ 代码产生错误的输出。
Fink 现在会对存在这个问题的用户提出告警信息，Fink 也将会拒绝使用有问题的 gcc 来编译一直存在这个问题的软件包。
</p><p>
如果你已经升级 XCode 到版本 1.5，下面是一个临时解决办法，
在 <a href="http://article.gmane.org/gmane.os.apple.fink.beginners/13580">这里</a>
和<a href="http://article.gmane.org/gmane.os.apple.fink.beginners/14200">这里</a>有详细的描述。
</p><p>如果你还没有升级，你应该考虑继续使用版本 1.2，直到这个问题获得解决。
</p>



