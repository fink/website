<?
$title = "常见疑问（F.A.Q.） - 镜像服务器";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/04/17 13:39:48';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="upgrade-fink.php?phpLang=zh" title="升级 Fink （解决特定版本的问题）"><link rel="prev" href="relations.php?phpLang=zh" title="与其它项目的关系">';

include_once "header.inc";
?>

<h1>常见疑问（F.A.Q.） - 3 Fink 镜像</h1>
    
    
    <a name="when-use">
      <div class="question"><p><b>Q3.1: 什么是 Fink 镜像？</b></p></div>
      <div class="answer"><p><b>A:</b> 
	Fink 镜像是一些 rsync 服务器，它镜像保存 Fink 的当前和稳定版本的描述文件。Fink 需要使用这些描述文件来从源代码构建软件包。
       </p></div>
    </a>
    <a name="why">
      <div class="question"><p><b>Q3.2: 为什么我需要使用 rsync 镜像服务器？</b></p></div>
      <div class="answer"><p><b>A:</b> Rsync 是一种很快速的协议。它可以用比过去的 CVS 更新方法更快的速度来更新描述文件。另外，CVS 总是通过 sourceforge.net 进行更新，而 rsync 则可以选择离你比较近的镜像服务器进行更新。</p></div>
    </a>
    <a name="where">
      <div class="question"><p><b>Q3.3: 在哪里我可以找到关于 Fink 镜像的更多信息？</b></p></div>
      <div class="answer"><p><b>A:</b> 所有的 Fink 镜像都建立在 finkmirrors.net 域名之下。http://finkmirrors.net/ 这个网站会提供更多的信息。
</p></div>
    </a>
    <a name="when-not">
      <div class="question"><p><b>Q3.4: 我不能连接 rsync 服务器，我应该怎么办？</b></p></div>
      <div class="answer"><p><b>A:</b> 有些时候，一些很严格的防火墙规则会进制你访问 rsync 服务。如果是这样的话，简单的办法是使用 CVS 方式。
</p></div>
    </a>
    <a name="otherinfogone">
      <div class="question"><p><b>Q3.5: 我现在已经改换到 rsync 方法，但所有没有用到的代码树都消失了？</b></p></div>
      <div class="answer"><p><b>A:</b> 这时正常现象。rsync 只会更新活跃的代码树，比方说，10.3。同时它也会删除 CVS
子目录。
</p></div>
    </a>
    <a name="howswitch">
      <div class="question"><p><b>Q3.6: 我怎么在这两种方法中切换？</b></p></div>
      <div class="answer"><p><b>A:</b> 使用 fink selfupdate-rsync 或 fink selfupdate-cvs 来切换到 rsync 或 CVS。</p></div>
    </a>
    <a name="status">
      <div class="question"><p><b>Q3.7: 我可以看到 rsync 镜像的当前状态吗？</b></p></div>
      <div class="answer"><p><b>A:</b> 可以，访问 http://finkmirrors.net/status.html。</p></div>
    </a>
    <a name="Master">
      <div class="question"><p><b>Q3.8: 什么是 Distfiles 镜像？</b></p></div>
      <div class="answer"><p><b>A:</b> 有些时候从互联网上获取某个版本的源代码会比较困难。Distfile 镜像会保存这些 Fink 需要使用的源代码软件包。</p></div>
    </a>
  <p align="right">
Next: <a href="upgrade-fink.php?phpLang=zh">4 升级 Fink （解决特定版本的问题）</a></p>

<? include_once "footer.inc"; ?>
