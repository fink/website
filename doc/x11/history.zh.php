<?
$title = "运行 X11 - 历史";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/07/06 19:14:48';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="运行 X11 Contents"><link rel="next" href="inst-xfree86.php?phpLang=zh" title="获取和安装 XFree86"><link rel="prev" href="intro.php?phpLang=zh" title="介绍">';


include_once "header.zh.inc";
?>
<h1>运行 X11 - 2. 历史</h1>
    
    
    
      <p>［请原谅我使用史诗的风格，我没法抗拒…］</p>
      <p>［也请原谅我没有能力完全表达英语原文的神韵－中文译者］</p>
    
    <h2><a name="early">2.1 早期岁月</a></h2>
      
      <p>
创世之初，一切荒芜。
Darwin 还是一个初生婴儿，Mac OS X 仍然在开发。它们上面都没有 X11 的实现。
</p>
      <p>
John Carmack 到来了，他把 XFree86 带到了 Mac OS X 服务器版，当时 Darwin 家族唯一可用的操作系统。
后来，Dave ZarzyckiLater 把移植代码升级到 XFree86 4.0，并运行在 Darwin 1.0 上。
这些补丁最后飘落到 Darwin 项目的 CVS 库中，沉睡着，等待某一天的到来…
</p>
    
    <h2><a name="xonx-forms">2.2 XonX 出世</a></h2>
      
      <p>
某个美好的日子，Torrey T. Lyons 经过那里，Darwin 补丁终于等到了它们所一直等待的人。
Torrey 把它们带到了新家：官方 XFree86 CVS 库。
现在是 Mac OS X Public Beta 和 Darwin 1.2 的时代。
XFree86 4.0.2 能在 Darwin 上运行得很好，但在 Mac OS X 上却需要退出 Aqua 界面回到控制台上去运行。
因此，Torrey 把 <a href="http://mrcla.com/XonX/">XonX 团队</a>召集到他身边，开始了把 XFree86 带到 Mac OS X 上的征途。
</p>
      <p>
在差不多相同的时候，Tenon 开始使用 XFree86 4.0 为基础建造 Xtools。
</p>
    
    <h2><a name="root-or-not">2.3 有根到无根</a></h2>
      
      <p>
很快，XonX 团队成功地使 XFree86 以全屏幕方式与 Quartz 同时运行。他们发布了测试版本给那些勇于尝试的用户。
测试版本叫做 XFree86-Aqua，简称 XAqua。
由于 Torrey 是团队的领导者，因此所做的修改直接加进了 XFree86 的 CVS 库，并一起向 4.1.0
版本迈进。
</p>
      <p>
早期，与 Quartz 的界面是通过一个叫 Xmaster.app （最初用 Carbon 编写，后来用 Cocoa 重写了）的小程序来完成的。
后来这些代码被集成到 X server 中，导致了 XDarwin.app 的诞生。
这个时候，共享库的支持也被加入了（Tenon 用它们来代替自己的补丁程序，很方便地实现了二进制兼容）。
同时，在无根模式上也获得了重要的进展（使用 Carbon API），可惜，那时候要加进 XFree86 4.1.0 中已经太晚了。
不过无根模式的补丁是免费软件，因此得以不断地在网上传播。
在 XFree86 4.1.0 仅以全屏幕模式发布以后，无根模式的工作仍在进展，不过改为使用 Cocoa API 了。
最终，一个试验性的无根模式被加进了 XFree86 的 CVS 库。
</p>
      <p>
这时，苹果发布了 Mac OS X 10.0 和 Darwin 1.3，
几个星期以后，Tenon 发布了 Xtools 1.0。
</p>
      <p>把无根模式集成进 XFree86 的开发工作一直在进行，到 2002 年一月 XFree86 4.2.0 发布的时候，Darwin/Mac OS X 的版本已经完全集成到 XFree86 的主发布版本中了。
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="inst-xfree86.php?phpLang=zh">3. 获取和安装 XFree86</a></p>
<? include_once "../../footer.inc"; ?>


