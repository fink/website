<?
$title = "Security Policy - Updates";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/07/13 21:24:49';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="Security Policy Contents"><link rel="next" href="notification.php?phpLang=zh" title="发送通知"><link rel="prev" href="sources.php?phpLang=zh" title="安全漏洞信息来源">';


include_once "header.zh.inc";
?>
<h1>Security Policy - 4. 安全性更新流程</h1>
        
        
        <h2><a name="procedure">4.1 添加安全性有关更新。</a></h2>
            
            <p>安全性更新只能在软件包的原作者检验并发现是安全性问题以后才可实施。在更新之前，<b>必须</b> 附和下述条件之一或以上：</p>
            <ul>
                <li>软件的作者已经和维护及/或 <b>Fink 核心团队</b> 直接联系并提供补丁或临时的解决办法。</li>
                <li>上述关键字表中的之一发表了安全性警告并对软件提供了更新过的源代码。</li>
                <li>下面的组织提出了补丁：BUGTRAQ，FULLDISC，SF-INCIDENTS，VULN-DEV。</li>
                <li>已经发布了官方的警告并进入CVE Candidate 状态，描述了脆弱性，提供了临时措施，补丁或连接到已更新的源代码。</li>
                <li>预通知已经发送到维护者和/或 <b>Fink 核心团队</b>，并附有一个补丁或临时解决办法，并要求采取行动。</li>
            </ul>
        
        <h2><a name="moving">4.2 Unstable 到 stable 的迁移。</a></h2>
            
            <p>对某个软件包的安全性更新会首先应用在 unstable 分支。经过不少于 <b>12</b> 小时的间隔以后软件包的信息文件(最终还将包括补丁文件)会同样放入 stable 分支。这个间隔时间应该用来密切注视更新软件包的工作情况以及安全更新不会导致新的安全问题。</p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="notification.php?phpLang=zh">5. 发送通知</a></p>
<? include_once "../../footer.inc"; ?>


