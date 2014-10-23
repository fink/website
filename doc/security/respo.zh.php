<?php
$title = "Security Policy - Responsibility";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/04/09 16:12:59';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="Security Policy Contents"><link rel="next" href="severity.php?phpLang=zh" title="响应时间和立即行动。"><link rel="prev" href="index.php?phpLang=zh" title="Security Policy Contents">';


include_once "header.zh.inc";
?>
<h1>Security Policy - 1. 责任</h1>
        
        
        <h2><a name="who">1.1 由谁负责？</a></h2>
            
            <p>每个 Fink 软件包都有一个维护人。可以在命令行输入 <code>fink info packagename</code> 命令来查询到这个维护人。这会返回一系列信息，其中一段类似：
				Maintainer: Fink
                    Core Group
                &lt;fink-core@lists.sourceforge.net&gt;。维护者对他/她的软件包负有全部责任。</p>
        
        <h2><a name="contact">1.2 我应该联系谁？</a></h2>
            
            <p>如果你发现某个软件包存在安全性问题，你应该通知该软件包的维护者以及 <b>Fink 核心团队</b>。维护者的电子又见可以在软件包信息里面找到，而 <b>Fink 核心团队</b> 的是 fink-core@lists.sourceforge.net </p>
        
        <h2><a name="prenotifications">1.3 预通知</a></h2>
            
            <p>我们要求你对于 Fink 的严重安全性问题需要预先通知软件包的维护者。由于不一定能在固定的事件内联系到维护者，预通知同时也应该提交到 <b>Fink 安全团队</b>。该团队的每个成员的电子邮件地址会在本文档的稍后地方列出。请注意 fink-core@lists.sourceforge.net 是一个公开的邮件列表，内部性的预通知<b>绝对不能</b>发送到这个列表中。</p>
        
        <h2><a name="response">1.4 回应</a></h2>
            
            <p>关于安全性问题所提交的报告会由 <b>Fink 核心团队</b>进行回应。每个维护者都被要求自行回复处理被报告的问题。在不太常见的情况下，如果找不到维护者或维护者不能在 24 小时之内回复，应该向 <b>Fink 核心团队</b> 发送信息通知他们维护者似乎没有回应。</p>
            <p>如果你尝试通知维护者但是却被邮件系统退信，你应该立即通知 <b>Fink 核心团队</b>联系不到维护者这样软件包可以不经过维护者而得到更新。</p>
        
    <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="severity.php?phpLang=zh">2. 响应时间和立即行动。</a></p>
<?php include_once "../../footer.inc"; ?>


