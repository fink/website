<?php
$title = "常见疑问（F.A.Q.） - 关系";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 04:42:29';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="mirrors.php?phpLang=zh" title="Fink 镜像"><link rel="prev" href="general.php?phpLang=zh" title="一般性问题">';


include_once "header.zh.inc";
?>
<h1>常见疑问（F.A.Q.） - 2. 与其它项目的关系</h1>
    
    
    <a name="upstream">
      <div class="question"><p><b><?php echo FINK_Q ; ?>2.1: 你是否会把你的补丁反馈给上游维护者？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
我们正在尝试这么做。
有些时候反馈补丁是很容易的，在下一个版本出来以后会皆大欢喜。
不幸的是对于多数软件包并不那么容易。
一些常见的原因：
</p><ul>
          <li>Fink 软件包的维护者很忙，没有时间将补丁发回给上游的维护者并附上需要修改的解释。</li>
          <li>上游维护者拒绝接受补丁。这样做有很多正常的理由。多数的上游维护者都强烈希望保持代码，配置检测的整洁，以及与其它平台的兼容。</li>
          <li>上游维护者接受了补丁，但需要数周或数月才会发布新的版本。</li>
          <li>软件包已经被原始作者所放弃，因此不会有新的融合了补丁的版本发布。</li>
        </ul></div>
    </a>
    <a name="debian">
      <div class="question"><p><b><?php echo FINK_Q ; ?>2.2: 你们和 Debian 项目的关系是什么？你们在把 Debian Linux 移植到 Mac OS X 上吗？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
Fink 和
<a href="http://www.debian.org">Debian</a> 之间没有正式的关系。
Fink <b>不是</b> Debian GNU/Linux 发布版的一个移植。
我们的确移植了 Debian 的软件包管理工具（dpkg，dselect，apt-get），并使用这些工具以及 .deb 二进制包的格式。
实际的软件包是针对 Mac OS X / Darwin 进行了修正，并不使用 Debian 原始的包格式。
</p></div>
    </a>
    <a name="apple">
      <div class="question"><p><b><?php echo FINK_Q ; ?>2.3: 你们和苹果公司的关系是什么？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
          <a href="http://www.apple.com/">苹果公司</a>了解 Fink 的存在并作为他们开放源码支持的一部分给予过我们一些帮助。
在 2001 年夏秋两季，他们给我们提供了新的 Mac OS X 的预发布版本以希望 Fink 软件包可以在它发布的时候能与它相配合。
引文：
<b>"希望这会明确消除对于我们不愿意提供（帮助）的怀疑。我们将在开放源代码的游戏中逐步做得更好。"</b>
感谢你，苹果公司！
</p></div>
    </a>
    <a name="darwinports">
      <div class="question"><p><b><?php echo FINK_Q ; ?>2.4: 你们和 Darwinports 的关系是什么？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Darwinports and Fink are complementary projects. There is some overlap between the two projects, and several people contribute to both the Fink and DarwinPorts projects. For example, Benjamin Reed is doing the KDE packages for both. Darwinports and Fink are free to make use of each other's patches, and we have discussed collaboration on a new dependency engine.</p><p>
			OpenDarwin 尝试用一种不同的方法来重头建立软件包系统。请阅读 <a href="http://darwinports.opendarwin.org/">OpenDarwin.org</a> 上的声明来获取详细信息。
		</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="mirrors.php?phpLang=zh">3. Fink 镜像</a></p>
<?php include_once "../footer.inc"; ?>


