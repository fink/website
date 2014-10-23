<?php
$title = "Security Policy - Notification";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/04/09 16:12:59';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="Security Policy Contents"><link rel="prev" href="updating.php?phpLang=zh" title="安全性更新流程">';


include_once "header.zh.inc";
?>
<h1>Security Policy - 5. 发送通知</h1>
        
        
        
            <p>有些用户不会很经常地更新他们的软件。为了确保那些从源代码安装软件包的用户可以尽快更新发生问题的软件包，维护者可以向 Fink 通知邮件列表发送邮件要求发送通知。</p>
        
        <h2><a name="who">5.1 谁应该发送它们？</a></h2>
            
            <p>这些通知应该只由 <b>Fink 安全团队</b>发布。 多数通知会发自 dmalloc@users.sourceforge.net，邮件会用 PGP 密钥签署，其指纹为：</p>
            <ul>
            <li>FD77 F0B7 5C65 F546 EB08 A4EC 3CCA 1A32 7E24 291E</li>
            <li>可以在http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0x7E24291E找到。</li>
            </ul>
            <p>上述网址是特意设为非链接的。</p>
            <p>其它被授权的团队成员包括：(here you add your email +
                public key like I did above)</p>
				<p>peter@pogma.com，PGP 密钥指纹为：</p>
				<ul>
				<li>4D67 1997 DD32 AE8E D7ED  9C79 8491 2AB7 DF3B 6004</li>
				<li>它可以在 http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xDF3B6004 找到。</li>
				</ul>
            <p>其它被授权的团队成员包括：(here you add your email +
                public key like I did above)</p>
				<p>ranger@befunk.com，PGP 密钥指纹为：</p>
				<ul>
				<li>6401 D02A A35F 55E9 D7DD  71C5 52EF A366 D3F6 65FE</li>
				<li>它可以在 http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xD3F665FE 找到。</li>
				</ul>
        
        <h2><a name="how">5.2 如何提交</a></h2>
            
            <p>为了确保安全性通知有统一的形式，所有安全性通知<b>必须</b>符合下面的模板。</p>
            <pre> ID: FINK-YYYY-MMDD-NN 
                        Reported: YYYY-MM-DD 
                        Updated:  YYYY-MM-DD 
                        Package:  package-name
                        Affected: &lt;= versionid
                        Maintainer: maintainer-name
                        Tree(s): 10.3/stable, 10.3/unstable, 10.2-gcc3.3/stable,10.2-gcc3.3/unstable
                        Mac OS X version: 10.3, 10.2 
                        Fix: patch|upstream 
                        Updated by: maintainer|forced update (Email)
                        Description: A short description describing the issue.
                        References: KEYWORD (see above) Ref-URL: URL </pre>
            
            <p>样板的报告应该大致是这样的：</p>
            <pre> ID: FINK-2004-06-01 
                        Reported:         2004-06-09 
                        Updated:          2004-06-09 
                        Package:          cvs 
                        Affected:             &lt;= 1.11.16, &lt;= 1.12.8
                        Maintainer:       Sylvain Cuaz 
                        Tree(s):    10.3/stable, 10.3/unstable, 10.2-gcc3.3/stable,10.2-gcc3.3/unstable 
                        Mac OS X version: 10.3, 10.2 
                        Fix: upstream
                        Updated by: forced update (dmalloc@users.sourceforge.net)
                        Description: Multiple vulnerabilities in CVS found my Ematters
                        Security. References: BID 
                        Ref-URL:    http://www.securityfocus.com/bid/10499 
                        References: CVE 
                        Ref-URL:    http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0414
                        References: CVE 
                        Ref-URL:    http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0416
                        References: CVE 
                        Ref-URL:    http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0417
                        References: CVE 
                        Ref-URL:    http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0418
                        References: FULLDISCURL 
                        Ref-URL:    http://lists.netsys.com/pipermail/full-disclosure/2004-June/022441.html
                        References: MISC 
                        Ref-URL:    http://security.e-matters.de/advisories/092004.html </pre>
        <p>请注意 <b>Affected</b> 关键字所指的软件包并不只包含 Fink 中的软件包。在样本报告中很清楚地展示了这点。</p>   
        
    
<?php include_once "../../footer.inc"; ?>


