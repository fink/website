<?

$title = "运行 X11 - 其它东西";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/05 03:26:57';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=zh\" title=\"运行 X11 Contents\">\n\t<link rel=\"next\" href=\"trouble.php?phpLang=zh\" title=\"XFree86 故障排除\">\n\t<link rel=\"prev\" href=\"xtools.php?phpLang=zh\" title=\"Xtools\" />";

include_once "header.zh.inc"; 
?><h1>运行 X11 - 6 其它 X11 可能</h1>
    
    
    <h2><a name="vnc">6.1 VNC</a></h2>
      
      <p>
VNC 是一个在设计上和 X11 类似的网络图象显示系统。
不过，它工作于更底层，而使得实现更为简单。
使用 Xvnc 服务器和一个 Mac OS X 显示客户程序，有可能在 Mac OS X 上运行 X11 应用程序。
Jeff Whitaker 的 <a href="http://www.cdc.noaa.gov/~jsw/macosx_xvnc/">Xvnc 页面</a>有关于它的更多信息。
</p>
    
    <h2><a name="wiredx">6.2 WiredX</a></h2>
      
      <p>
        <a href="http://www.jcraft.com/wiredx/">WiredX</a> 是一个由 Java 写成的 X11 服务器程序。
它也支持无根模式。
在它的网站上可以下载得到一个安装程序。
</p>
    
    <h2><a name="exodus">6.3 eXodus</a></h2>
      
      <p>
根据<a href="http://www.powerlan-usa.com/exodus/">eXodus 8</a>网站的资料，这个由 Powerlan USA 开发的程序可以在 Mac OS X 直接运行。
现在还不知道它使用代码基础，以及它是否支持本地客户程序。
因此，在 Fink 中对 eXodus 没有什么特别的支持。
如果你有更多的信息，请告诉我们。
</p>
    
  <p align="right">
Next: <a href="trouble.php?phpLang=zh">7 XFree86 故障排除</a></p><? include_once "../../footer.inc"; ?>
