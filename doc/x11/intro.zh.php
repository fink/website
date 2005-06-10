<?
$title = "运行 X11 - 介绍";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/06/10 00:51:23';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="运行 X11 Contents"><link rel="next" href="history.php?phpLang=zh" title="历史"><link rel="prev" href="index.php?phpLang=zh" title="运行 X11 Contents">';


include_once "header.zh.inc";
?>
<h1>运行 X11 - 1. 介绍</h1>
    
    
    <h2><a name="def-x11">1.1 什么是 X11？</a></h2>
      
      <p>
<a href="http://www.x.org/">X Window 系统</a>版本 11，简称 X11，是一个对网络透明的客户／服务器架构的图形显示系统。
它支持应用程序在你的屏幕上绘制象素，线条，文字，图象等等。
X11 还包括一些其它的辅助的函数库，使得它可以容易地绘制用户界面，例如：按钮，文本输入区等等。</p>
      <p>
X11 是 Unix 事实上的图形系统标准。
Linux，各种 BSD 版本和多数的商用 Unix 都采用它。
类似 CDE，KDE 和 GNOME 等桌面环境都运行在它之上。
</p>
    
    <h2><a name="def-macosx">1.2 什么是 Mac OS X？</a></h2>
      
      <p>
        <a href="http://www.apple.com/macosx/">Mac OS X</a> 是<a href="http://www.apple.com/">苹果电脑</a>开发的一个操作系统。
和它的祖先 NeXTStep 和 OpenStep 一样，它基于 BSD，因此属于 Unix 操作系统家族的一份子。
不过，它包括一个专有的图形显示系统。
这个图形引擎称为 Quartz（石英），而其外观风格则称为 Aqua（水）。很多时候这两个名字通常会相互代替使用。
</p>
    
    <h2><a name="def-darwin">1.3 什么是 Darwin？</a></h2>
      
      <p>
        <a href="http://OpenDarwin.org/">Darwin</a> 基本上是 Mac OS X 的免费和公开源码的精简版本。
它不包括 Quartz，Aqua，或其它相关技术。
默认情况下，它只包括一个文字终端。
</p>
    
    <h2><a name="def-xfree86">1.4 什么是 XFree86？</a></h2>
      
      <p>
        <a href="http://www.xfree86.org/">XFree86</a> 是对 X11 的一个开放源码的实现。最初它开发运行在 Intel x86 PC 上，因此得名。
现在，它可以运行在主要的硬件架构和操作系统上，包括 OS/2，Darwin，Mac OS X 和 Windows。
</p>
    
    <h2><a name="def-xtools">1.5 什么是 Xtools？</a></h2>
      
      <p>
Xtools 是 <a href="http://www.tenon.com/">Tenon
Intersystems</a> 的一个产品。
它有针对 Mac OS X 上基于 XFree86 的 X11 的产品。
</p>
      
      <p>Note:  Development apparently stopped sometime before OS 10.3 was released.</p>
      
    
    <h2><a name="client-server">1.6 客户和服务器</a></h2>
      
      <p>
X11 使用客户／服务器体系架构。
有一个中央的程序负责实际的绘图工作以及协调不同程序的访问要求，这个程序称为服务器。
想要绘图的程序使用 X11 与服务器连接告诉它要画什么，
这些程序在 X11 中称为客户（程序）。
</p>
      <p>
X11 允许服务器和客户在不同的机器上，
这种情况下很容易发生术语的混淆。
在一个工作站和服务器的环境中，你在工作站计算机上运行 X11 显示服务器程序，在服务器计算机上运行应用程序（X 客户）。
所以，我们这里谈到"服务器"时，我们指的是 X11 显示服务程序，而不是藏在你衣橱里面的计算机。
</p>
    
    <h2><a name="rootless">1.7 “无根的”（rootless）是什么意思？</a></h2>
      
      <p>
一点背景：
X11 把屏幕描绘成按层次关系嵌套在一起的许多窗口。
在层次关系的顶端，有一个特殊的窗口，它的大小是整个屏幕，并包括全部其它窗口。
这个窗口包含背景，并被称为"根（root）窗口"。
</p>
      <p>
现在回到题目：
和任何图形环境一样，X11 被设计成独立运行并完全控制整个屏幕。
在 Mac OS X 中，Quartz 已经控制了屏幕，所以当这两个一起运行的时候，其中一个必须做出特殊的处理。
</p>
      <p>
一种办法让两个程序轮流控制。
每个环境都有完整的屏幕，但同一时间只有一个可见，用户可以在两种环境中间切换。
这个模式称为全屏幕或有根模式。
之所以称为有根模式是因为在 X11 屏幕上的确存在通常的根窗口，和其它系统一样。
</p>
      <p>
另外一种版本是根据窗口来混合两种环境。
这消除了切换两种模式屏幕的需要。
它也消除了了 X11 的根窗口，因为 Quartz 已经管理了桌面背景。
因为没有（可见的）根窗口，这种模式称为"无根"模式。这是在 Mac OS X 上使用 X11 最舒服的一种方式。
</p>
    
    <h2><a name="wm">1.8 什么是窗口管理器？</a></h2>
      
      <p>
在多数图形环境中，窗口边框的外观（标题栏，关闭按钮，等）是由系统定义的。
X11 则不是这样。
在 X11 中，窗口的框架（也称为"装饰"）是由一个称为窗口管理器的单独程序提供的。
一般认为，窗口管理器只是另外一个客户程序；它用通常的办法启动，并与 X 服务器按同样的方法通信。
</p>
      <p>
由很多不同的窗口管理器供我们选择。
<a href="http://www.xwinman.org/">xwinman.org</a>有一个详细的清单。
多数常见的窗口管理器都允许用户定制称为<a href="http://www.themes.org/">主题</a>的窗口外观。
许多窗口管理器还提供额外的功能，象在根窗口上的弹出菜单，docks，或程序启动按钮。
</p>
      <p>
Fink 已经打包了很多窗口器，这里是一个
<a href="http://fink.sourceforge.net/pdb/section.php/x11-wm/">当前的清单
</a>。
      </p>
    
    <h2><a name="desktop">1.9 什么是 Quartz/Aqua，Gnome 和 KDE？</a></h2>
      
      <p>
他们都是桌面环境，另外还有很多类似的环境。
他们的用途是给应用程序提供额外框架，使得他们的外观，使用感觉和行为在视觉上保持一致。例如：
</p>
      <p> 图形引擎：X11
</p>
      <p> 窗口管理器：
<a href="http://sawmill.sourceforge.net/">sawfish</a>
      </p>
      <p> 桌面：<a href="http://www.gnome.org/">Gnome</a>
      </p>
      <p>
图形显示引擎，窗口管理器和桌面之间的界限是模糊的，因为有些类似或相同的功能，会被其中之一或多个所同时实现。这也是为什么某个特定的窗口管理器可能不可以被另外一个特定的桌面环境所使用的原因。

</p>
      <p>
许多的程序会针对特定的桌面环境开发。
多数程序可以在安装对应的桌面环境的函数库（以及相应的更底层的函数库）后，能够不减损或有限减损功能地运行。 
其中的例子是越来越多的 
<a href="http://fink.sourceforge.net/pdb/section.php/gnome">
GNOME 程序精选
</a>
可以在不运行 GNOME 的情况下安装和运行。  
不幸的是，对 <a href="http://www.kde.org/">KDE 应用程序</a>却
<a href="http://fink.sourceforge.net/faq/usage-fink.php#kde">
还没有取得类似的进展
</a>。 
      </p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="history.php?phpLang=zh">2. 历史</a></p>
<? include_once "../../footer.inc"; ?>


