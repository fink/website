<?php
$title = "Switching to the Rsync Upgrade Method";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:38 $';

include "header.inc";
?>

<h1>转换到使用 Rsync 升级</h1>

<p>
fink 软件包管理器现在提供通过 rsync 升级的方式，作为 CVS 升级方式的替代方法。如果你现在使用 CVS 有困难，或者，你不能使用 CVS 来升级软件包管理器！
</p><p>
如果你在升级上发生困难，首先你应该从 <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">SourceForge 的 Fink 文件清单页面</a>获取 fink （版本 0.14.0 或更新）的源程序压缩档。
使用<code> tar -xfz </code>来解压压缩档，然后 <code>cd</code>
进入它创建的目录中，并运行命令
<code>./inject.pl</code>
</p>
<p>这应该会安装最新的软件包管理器。这样安装以后，运行命令 <code>fink selfupdate-rsync</code> 会使你切换到新的升级方式。切换以后，你可以继续后面的升级，通过简单的 <code>fink selfupdate</code> 命令。
</p>


<?php
include "footer.inc";
?>
