<?php
$title = "Repairing the Upgrade Path";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:37 $';

include "header.inc";
?>


<h1>修复升级路径</h1>

<p>
某些版本的 Fink 在运行 <code>fink selfupdate</code> （不是通过 CVS）命令进行升级的时候会碰到困难。现象是反馈的信息说 Fink 已经是最新版本，但事实上（根据报告的信息）安装的版本却比最新的版本要旧。
下面是这种情况下的升级方法：
</p>
<ol>

<li><p>安装一个更早版本的 fink 软件包管理器，这可以在终端程序窗口运行下面的命令：
</p>
<pre>curl -O http://us.dl.sourceforge.net/fink/direct_download/dists/fink-0.5.1/main/binary-darwin-powerpc/base/fink_0.11.1-10_darwin-powerpc.deb
sudo dpkg -i fink_0.11.1-10_darwin-powerpc.deb
rm fink_0.11.1-10_darwin-powerpc.deb</pre></li>
<li><p>
然后按通常的方法运行 <code>fink selfupdate</code> 命令进行升级。
</p></li>

</ol>



<?php
include "footer.inc";
?>
