<?
$title = "Security Policy - Responses";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/07/13 21:24:49';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="Security Policy Contents"><link rel="next" href="sources.php?phpLang=zh" title="安全漏洞信息来源"><link rel="prev" href="respo.php?phpLang=zh" title="责任">';


include_once "header.zh.inc";
?>
<h1>Security Policy - 2. 响应时间和立即行动。</h1>
        
        
        
            <p>响应时间和才于的行动主要取决于由于 Fink 中包含的这个软件包安全性漏洞可能导致的损失的严重程度。在任何情况下，如果 <b>Fink 核心团队</b>必须立刻保护 Fink 用户社区，它将会采取立即的行动。</p>
        
        <h2><a name="resptimes">2.1 响应时间</a></h2>
            
            <p>每个软件包都应该争取达到下面的响应时间。
                对一些脆弱性的问题 <b>Fink 核心团队</b>可能会采取立即的行动。在这种情况下，一个核心团队的成员会通知可能存在问题的软件包的维护者。另外，请注意虽然我们努力达到这个响应时间标准，但 Fink 是一个志愿者活动，因此我们并不能保证一定可以达到这点。</p>
            <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Vulnerability</th><th align="left">Repsonse time</th></tr><tr valign="top"><td>远程 root 权限获取</td><td>
                        <p>最短时间：<b>立即</b>；最长时间：<b>12</b> 小时。</p>
                    </td></tr><tr valign="top"><td>本地 root 权限获取</td><td>
                        <p>最短时间：<b>12</b> 小时；最长时间：<b>36</b> 小时。</p>
                    </td></tr><tr valign="top"><td>远程 DoS(拒绝服务攻击)</td><td>
                        <p>最短时间：<b>6</b> 小时；最长时间：<b>12</b> 小时。</p>
                    </td></tr><tr valign="top"><td>本地 DoS</td><td>
                        <p>最短时间：<b>24</b> 小时；最长时间：<b>72</b> 小时。</p>
                    </td></tr><tr valign="top"><td>远程数据破坏</td><td>
                        <p>最短时间：<b>12</b> 小时；最长时间：<b>24</b> 小时。</p>
                    </td></tr><tr valign="top"><td>本地数据破坏</td><td>
                        <p>最短时间：<b>24</b> 小时；最长时间：<b>72</b> 小时。</p>
                    </td></tr></table>
        
        <h2><a name="forced">2.2 强制更新</a></h2>
            
            <p><b>Fink 核心团队</b>中的一个成员有可能会选择更新软件包而不等待软件包的维护者先采取行动。这称为强制更新。对导致某些脆弱性问题的软件包未能在最长时间要求内完成更新也会导致一次强制更新。</p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="sources.php?phpLang=zh">3. 安全漏洞信息来源</a></p>
<? include_once "../../footer.inc"; ?>



