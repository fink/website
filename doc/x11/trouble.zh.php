<?

$title = "运行 X11 - 故障排除";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/07 01:55:46';
$metatags = "<link rel=\"contents\" href=\"index.php?phpLang=zh\" title=\"运行 X11 Contents\">\n\t<link rel=\"next\" href=\"tips.php?phpLang=zh\" title=\"使用提示\">\n\t<link rel=\"prev\" href=\"other.php?phpLang=zh\" title=\"其它 X11 可能\" />";

include_once "header.zh.inc"; 
?><h1>运行 X11 - 7 XFree86 故障排除</h1>
    
    
    <h2><a name="immedate-quit">7.1 当我启动 XDarwin，它几乎立刻就退出或崩溃了</a></h2>
      
      <p>
首先：不要惊慌！
在 XFree86 中可能发生问题的地方很多，中间有不少会引起启动失败。
而且，当 XDarwin 碰到启动问题的时候崩溃并不是什么特别奇怪的事情。
本部分提供你可能会碰到的问题的详细清单。
但首先，你需要收集两部分的重要信息：
</p>
      <p>
        <b>XDarwin 版本。</b>
你可以用这个办法获知 XDarwin 的版本：在 Finder 中<b>单击</b> XDarwin 的图标，然后在菜单中选择"显示信息"。
这个版本号只有在 XonX 项目发布一个新的二进制安装版的时候才会增加，所以 "1.0a1" 实际上可能是
1.0a1 和 1.0a2 之间的任何版本。
</p>
      <p>
        <b>出错信息。</b>
这对说明你实际碰到的问题很重要。
如何获取错误信息取决于你如何启动 XDarwin。
如果你在终端窗口运行 <code>startx</code>，你可以在那个窗口直接看到出错信息。
记住，你可以向上翻卷。
如果你通过双击启动 XDarwin，错误信息会保存到系统日志。你可以通过实用工具文件夹里面的控制台程序来察看。
注意，要选择合适部分的信息，通常就是说，应该是最后的一部分信息。
</p>
      <p>
下面是你可能会看到的信息：
</p>
      <pre>_XSERVTransmkdir: Owner of /tmp/.X11-unix should be set to root</pre>
      <pre>_IceTransmkdir: Owner of /tmp/.ICE-unix should be set to root</pre>
      <p>
分类：无害。
X11 会在 /tmp 下创建一些隐藏文件来保存用于本地连接的套接口"文件"。
出于安全的原因，X11 希望这些目录由 root 用户拥有，不过由于它们是所有人可写的，所以它的运行不会有问题。
（注意：要让这些目录由 root 拥有会很困难，因为 Mac OS X
会在每次启动的时候清空 /tmp 目录，而 XDarwin 又不是以 root 权限运行，事实上它也不需要）。
</p>
      <pre>QuartzAudioInit: AddIOProc returned 1852797029</pre>
      <pre>-[NSCFArray objectAtIndex:]: index (2) beyond bounds (2)</pre>
      <pre>kCGErrorIllegalArgument : CGSGetDisplayBounds (display 35434400)</pre>
      <pre>No core keyboard</pre>
      <p>
分类：虚假错误。
这是由于服务器程序由于以前的错误后试图复位自己而产生的后续错误。
在那期间，会打印新的启动标题，以及一个或更多的上述错误，因为对受此影响的 XDarwin 版本，复位功能实际并不能工作。
当你看到上面的信息时，你应该向上翻卷终端程序输出或控制台窗口。并寻找另外一个启动标题和错误信息。受此影响的版本包括 XDarwin 1.0a3 及之前版本，在 1.0a3 发布以后，这个问题被修正了。
</p>
      <pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>
      <p>
分类：多数情况下无害。
暂时还不知道这些信息从哪里来的，但看起来它们没有对任何操作造成影响。
你可以在你目录里面运行 <code>touch .Xauthority</code> 命令来消除这个错误。
</p>
      <pre>Gdk-WARNING **: locale not supported by C library</pre>
      <p>
分类：无害。
正如信息所说的意思，它并不会使程序不能工作。
更多的信息，<a href="#locale">参考下面</a>。
</p>
      <pre>Gdk-WARNING **: locale not supported by Xlib, locale set to C
Gdk-WARNING **: can not set locale modifiers</pre>
      <p>
分类：有些糟糕，但并非致命的。
这些信息可能和前面的一个信息一起出现。
这意味着 XFree86 的本地化数据文件找不到了。
在从 XFree86 源程序编译安装的时候，可能会导致这个问题，但暂时这个问题没有办法固定地重现。
多数程序仍然可以工作，不过 GNU Emacs 是一个重要的例外。
</p>
      <pre>Unable to open keymapping file USA.keymapping.
Reverting to kernel keymapping.</pre>
      <p>
分类：通常是致命的。
这通常发生于 XDarwin 1.0a1，同时启用 "Load from file"
键盘映射选项的时候。
那个版本在要装载的文件是通过偏好设定对话框设置的时候需要文件的全路径，但如果作为命令行参数传递的时候却自动搜索。
这个信息后面通常会紧跟下面的 "assert" 消息。
要修正这个错误，可以按照下面的办法。
</p>
      <pre>Fatal server error:
assert failed on line 454 of darwinKeyboard.c!</pre>
      <pre>Fatal server error:
Could not get kernel keymapping! Load keymapping from file instead.</pre>
      <p>
分类：致命错误。
苹果在 Mac OS X 10.1 所做的改变破坏了 XFree86 从系统核心读取眼键盘布局的代码，上面的信息就是因此而引起的。
在 Mac OS X 10.1 中，你必须使用 "Load from file" 键盘映射选项。
你可以在 XDarwin 的偏好设定对话框中进行设置。
确定已经选择了文件（就是说，使用 "Pick file" 按钮）－对 XDarwin 的一些版本来说，简单的激活对话框并不足够。
如果 XDarwin 在你能够选择偏好设置之前就关闭了，在终端里面运行命令：
<code>startx -- -quartz -keymap USA.keymapping</code>。
这通常可以让 XDarwin 启动起来，然后你可以在偏好设定对话框中进行持久的选择。
</p>
      <pre>Fatal server error:
Could not find keymapping file .</pre>
      <p>分类：致命错误（它也是这么说的）。这个错误是因为在 Panther 下缺乏键盘映射文件。你需要安装 <code>xfree86-4.3.99-16</code> 或更新版本，因为这些版本不需要键盘映射文件。</p>
      <pre>Warning: no access to tty (Inappropriate ioctl for device).
Thus no job control in this shell.</pre>
      <p>
分类：多数时候是无害的。
XDarwin 1.0a2 或更早的版本会启动一个非交互的 shell 程序来执行你的客户启动文件（.xinitrc）。
这么做使得你不需要在那个文件里面添加设置 PATH 的语句。
有些 shells 程序会提示说他们呢没有连接到一个真正的终端，但这一般可以被忽略，因为这些 shell 实例并不需要进行作业控制或其它类似的事情。
</p>
      <pre>Fatal server error:
failed to connect as window server!</pre>
      <p>
分类：致命错误。
这意味着在你登录进 Aqua 时，控制台模式的服务器程序（对纯 Darwin）已经被启动。
这通常发生在你安装了官方的 XFree86 二进制发行版，却遗漏了安装 Xquartz.tgz 压缩档。
它也可能发生在 /usr/X11R6/bin 中的符号连接出现混乱的情况。也可能是因为你在终端窗口使用 <code>XDarwin</code> 命令来启动服务器程序（你应该使用 startx 命令，参阅<a href="run-xfree86.php?phpLang=zh">启动 XFree86</a>）。
</p>
      <p>
上面的任意情况下，你可以运行 <code>ls -l /usr/X11R6/bin/X*</code> 命令并观察输出。
你应该可以看到四个相关的项目：
<code>X</code>，一个指向 <code>XDarwinStartup</code> 的符号连接；
<code>XDarwin</code>，一个可执行文件（这是控制台模式服务器程序）；
<code>XDarwinQuartz</code>，一个指向
<code>/Applications/XDarwin.app/Contents/MacOS/XDarwin</code>的符号连接；
以及 <code>XDarwinStartup</code>，一个很小的可执行文件。
如果任意的一个不存在或指向另外的文件，你需要修正它。
应该如何做取决于你安装 XFree86 的方式。
参考 <a href="inst-xfree86.php?phpLang=zh#rootless">《无根模式服务器介绍》</a>部分获取更多的提示。
</p>
      <pre>The XKEYBOARD keymap compiler (xkbcomp) reports:
&gt; Error:            Can't find file "unknown" for geometry include
&gt;                   Exiting
&gt;                   Abandoning geometry file "(null)"
Errors from xkbcomp are not fatal to the X server</pre>
      <p>
分类：多数情况下无害。
正如消息说的，它是非致命的。
就我所知，XDarwin 根本不使用 XKB 扩展。
也许有些客户程序尝试使用它…
</p>
      <pre>startx: Command not found.</pre>
      <p>
分类：致命错误。
这在 XDarwin 1.0a2 和 1.0a3 下可能会发生，如果你的 shell 初始化文件没有把 /usr/X11R6/bin 加入到 PATH 变量中。
如果你使用 Fink 而且没有改变你的默认 shell，把 <code>source /sw/bin/init.csh</code> 这一行添加到你主目录下的 <code>.cshrc</code>
文件中（这也是 Fink 使用指南所推荐的）应该就足够了。
</p>
      <pre>_XSERVTransSocketUNIXCreateListener: ...SocketCreateListener() failed
_XSERVTransMakeAllCOTSServerListeners: server already running</pre>
      <pre>Fatal server error:
Cannot establish any listening sockets - Make sure an X server isn't already
running</pre>
      <p>
分类：致命错误。
这个错误发生在你碰巧同时运行了多个 XDarwin 的实例，或者更多的情况是一次不完整的 XDarwin 关闭（比如，崩溃）之后。
这也许还有可能是一个用于本地连接的套接口文件的权限错误。
你可以尝试用命令 <code>rm -rf /tmp/.X11-unix</code> 来清理它。
多数情况下重新启动也会有帮助（因为 Mac OS X 在启动时会自动清空 /tmp 目录，同时也复位网络栈）。
</p>
      <pre>Xlib: connection to ":0.0" refused by server
Xlib: Client is not authorized to connect to Server</pre>
      <p>
分类：致命。
客户程序无法连接显示服务器（XDarwin），因为它们使用了错误的认证数据。
这可能由于一些 VNC 安装，或者用 sudo 运行 XDarwin 引起，也有可能因为一些其它奇怪的意外。
通常的处理办法时删除你主目录下的 .Xauthority 文件（它保存了身份验证数据），然后重新建立一个空文件：
</p>
      <pre>cd
rm .Xauthority
touch .Xauthority</pre>
      <p>
另外导致 XFree86 启动失败的原因是不正确的
<code>.xinitrc</code> 文件。
发生的原因是 <code>.xinitrc</code> 被执行，但又由于某种原因立刻终止。
<code>xinit</code> 把这个解析为 "用户执行过程已经结束"
并关闭 XDarwin。
查阅<a href="run-xfree86.php?phpLang=zh#xinitrc">.xinitrc
部分</a>获取更多细节。
记得设置 PATH 变量并不要把最后一个持续运行的程序放到后台执行。
通常添加一个 <code>exec xterm</code> 作为你的窗口管理器或类似的东西不能运行的时候的替代是一个好主意。
</p>
    
    <h2><a name="black">7.2 在 GNOME 面板或 GNOME 程序中出现黑图标</a></h2>
      
      <p>
通常的问题现象是那些图标或图象显示为黑色的方块或边框。
这是由于操作系统核心的限制引起的。
问题已经报告给苹果，但到目前位置，他们似乎还不愿意修复它；查看<a href="http://www.opensource.apple.com/bugs/X/Kernel/2691632.html">Darwin
缺陷报告</a>档案获取详细信息。
</p>
      <p>
当前的情况是 MIT-SHM 对 X11
协议的扩展实际上对 Darwin 和 Mac OS X 不可用。
有两种办法把协议扩展关掉：服务器端或客户程序端。
由 Fink 安装的 XFree86 服务器程序（指 xfree86-server 和
xfree86-rootless 软件包）已经关闭了它。
GIMP 和 GNOME 面板也经过这样的处理。
如果你在其它程序中碰到同样的黑图标问题，用 <code>--no-xshm</code> 命令行参数启动那个程序。
</p>
    
    <h2><a name="keyboard">7.3 在 XFree86 下键盘不能使用</a></h2>
      
      <p>
这是一个仅影响笔记本电脑（PowerBook，iBook）的已知问题。
要暂时解决，使用 "Load from file" 键盘映射选项。
现在这已经成为默认设置，因为传统的办法（从核心读取键盘映射）从 Mac OS X 10.1 开始已经失效。
如果你还没有启用这个选项，你可以在 XDarwin 偏好设置对话框中进行设置。
选中 "Load from file" 选项盒并选择要读取的键盘映射文件。
重新启动 XDarwin 后，你的键盘应该基本能工作（看下面的内容）》
</p>
      <p>
如果你从命令行启动 XFree86，你可以把键盘映射文件作为一个参数传递给程序，象这样：
</p>
      <pre>startx -- -quartz -keymap USA.keymapping</pre>
    
    <h2><a name="delete-key">7.4 回退（Backspace）键不行</a></h2>
      
      <p>
这可能会发生在你使用上面描述的 "Load keymapping from file" 选项时。映射文件把回退键描述为 "Delete"，而不是
"Backspace"。
你可以在你的 .xinitrc 文件中加入一行：
</p>
      <pre>xmodmap -e "keycode 59 = BackSpace"</pre>
      <p>
如果我没有记错的话，XDarwin 1.0a2 及更新版本已经自动可以正确映射回退键。
</p>
    
    <h2><a name="locale">7.5 "Warning: locale not supported by C library"</a></h2>
      
      <p>
这个消息很常见，但无害。
它只是表达它的意思－国际化不能通过标准的 C 函数库支持，程序会使用默认的英语消息，日期格式等等。
有几种办法来处理它：
</p>
      <ul>
        <li>
          <p>
简单地忽略这个信息。
</p>
        </li>
        <li>
          <p>
通过取消定义环境变量 LANG 来消除这个消息。
注意，这也会关闭那些支持国际化的程序（通过 gettext/libintl）的国际化功能。使用 .xinitrc 的例子：
</p>
          <pre>unset LANG</pre>
          <p>
使用 .cshrc 的例子：
</p>
          <pre>unsetenv LANG</pre>
        </li>
        <li>
          <p>
（仅对10.1）使用 <code>libxpg4</code> Fink 软件包。
它建立一个常用 locale 函数的库并在系统库之前装载（使用
DYLD_INSERT_LIBRARIES 环境变量）。
你需要把你的 LANG 环境变量设成完成的形式，比如：<code>de_DE.ISO_8859-1</code> 而不是 <code>de</code>
或 <code>de_DE</code>。
</p>
        </li>
        <li>
          <p>
要求苹果在未来的 Mac OS X 版本中加入合适的本地化支持。
</p>
        </li>
      </ul>
    
  <p align="right">
Next: <a href="tips.php?phpLang=zh">8 使用提示</a></p><? include_once "../../footer.inc"; ?>
