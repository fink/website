<?
$title = "运行 X11 - Xtools";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/07 01:55:46';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="运行 X11 Contents"><link rel="next" href="other.php?phpLang=zh" title="其它 X11 可能"><link rel="prev" href="run-xfree86.php?phpLang=zh" title="启动 XFree86">';

include_once "header.inc";
?>

<h1>运行 X11 - 5 Xtools</h1>
    
    
    <h2><a name="install">5.1 安装 Xtools</a></h2>
      
      <p>
现在一切都很简单。获取一个安装程序，双击它，然后安装有关的屏幕指示进行。
注意在提示选择安装宗卷的时候要选择启动宗卷。
</p>
      <p>
如果你使用 Fink，你应该在安装 Xtools 以后，在 Fink 里面安装
<code>system-xtools</code> 软件包。
这个软件包并不安装任何文件，它只是检查必须的库函数，然后做为 Fink 依赖关系系统的一个占位符存在。
</p>
    
    <h2><a name="run">5.2 运行 Xtools</a></h2>
      
      <p>
要运行 Xtools，在你的应用程序文件夹里面双击 Xtools.app 程序图标。
象 XFree86 一样，Xtools 会运行你
<code>.xinitrc</code> 文件里面的客户程序。
Xtools 还可以让你在菜单里面启动客户程序。
</p>
    
    <h2><a name="opengl">5.3 OpenGL 注意事项</a></h2>
      
      <p>
Xtools 可以在无根模式下使用硬件加速的 OpenGL，并包括有关的支持函数库。
虽然主 libGL 函数库没有什么问题，但 libGLU 和 libglut 函数库只是静态连接库，这并不足以提供与 XFree86 的二进制兼容。
另外，还缺乏一些头文件。
Fink 暂时还没有解决的办法。
希望这会在 Xtools 1.1 发布的时候修正。
</p>
    
  <p align="right">
Next: <a href="other.php?phpLang=zh">6 其它 X11 可能</a></p>

<? include_once "footer.inc"; ?>
