<?
$title = "Security Policy - Notification";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/03/31 01:41:35';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Security Policy Contents"><link rel="prev" href="updating.php?phpLang=en" title="Security update procedure.">';


include_once "header.en.inc";
?>
<h1>Security Policy - 5. Sending notifications</h1>
        
        
        
            <p>Some users might choose not to update their software too
                frequently. To ensure that those who install their packages from
                source are using updated packages which have been reported to
                have security issues as soon as possible, a maintainer may call
                for a notification to be sent to the Fink announcement list.</p>
        
        <h2><a name="who">5.1 Who may send them?</a></h2>
            
            <p>These announcements may only be sent by the <b>Fink Security
                Team</b>. Most announcement will be sent from
                dmalloc@users.sourceforge.net signed by the PGP key with the
                fingerprint:
            </p>
                <ul>
                    <li>
                FD77 F0B7 5C65 F546 EB08 A4EC 3CCA 1A32 7E24
                291E.
                </li>
                <li>Found at
                http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0x7E24291E</li></ul>
                <p>
                The above is intentionally not marked as a link.</p>
            <p> Other authorised Team members are: (here you add your email +
                public key like I did above)</p>
	        <p>peter@pogma.com signed by the PGP key with the fingerprint:</p>
	        <ul>
	            <li>
		4D67 1997 DD32 AE8E D7ED  9C79 8491 2AB7 DF3B 6004.</li>
		<li>
		Found at http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xDF3B6004
        </li>
            </ul>
	        <p>ranger@befunk.com signed by the PGP key with the fingerprint:</p>
	        <ul>
	            <li>
		6401 D02A A35F 55E9 D7DD  71C5 52EF A366 D3F6 65FE.</li>
		<li>
		Found at http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xD3F665FE
        </li>
            </ul>
        
        <h2><a name="how">5.2 How to submit </a></h2>
            
            <p> To ensure that a common look for security notifications is met,
                all security notices <b>must</b> follow the following common
                template. </p>
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
                        References: KEYWORD (see above) 
			Ref-URL: URL 
			</pre>
            
            <p>A sample report could look somewhat like this:</p>
            <pre> ID: FINK-2004-06-01 
                        Reported:             2004-06-09 
                        Updated:              2004-06-09 
                        Package:              cvs
                        Affected:             &lt;= 1.11.16, &lt;= 1.12.8
                        Maintainer:           Sylvain Cuaz 
                        Tree(s):    10.3/stable, 10.3/unstable, 10.2-gcc3.3/stable,10.2-gcc3.3/unstable 
                        Mac OS X version: 10.3, 10.2 
                        Fix: upstream
                        Updated by: forced update (dmalloc@users.sourceforge.net)
                        Description: Multiple vulnerabilities in CVS found by Ematters
                        Security. 
			References: BID 
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
            <p> Please note that the <b>Affected</b> keyword refers to all vulnerable software versions not
            only those that might be packaged for Fink. The sample report shows this clearly.</p>
        
    
<? include_once "../../footer.inc"; ?>


