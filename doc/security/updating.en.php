<?
$title = "Security Policy - Updates";
$cvs_author = 'Author: dmalloc';
$cvs_date = 'Date: 2004/07/10 13:51:48';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Security Policy Contents"><link rel="next" href="notification.php?phpLang=en" title="Sending notifications"><link rel="prev" href="sources.php?phpLang=en" title="Incident Sources">';


include_once "header.en.inc";
?>
<h1>Security Policy - 4. Security update procedure.</h1>
        
        
        <h2><a name="procedure">4.1 Adding security related updates.</a></h2>
            
            <p>Security updates may only be applied once they have been verified
                by the original Author of the software which has been packaged
                for Fink and found to be vulnerable to a security issue. Before
                an update one or more of the following conditions <b>have</b>
                to be met:</p>
            <ul>
                <li>The author of the software has contacted the maintainer
                    and/or the <b>Fink Core Team</b> directly providing a
                    patch or work around to a vulnerability.</li>
                <li>One of the keyword-denoted sources has issued a security
                    bulletin with updated sources for the software packaged for
                    Fink in question.</li>
                <li>A patch has been issued to one of the following
                    keyword-denoted sources: BUGTRAQ,FULLDISC,SF-INCIDENTS,VULN-DEV.</li>
                <li>An official security bulletin has been issued and assigned
                    CVE Candidate status, describing the vulnerability,
                    supplying a work around, patch or link to updated sources.</li>
                <li>Pre-notification has been sent to the maintainer and/or the
                        <b>Fink Core Team</b> directly providing a patch or
                    work around to a vulnerability asking to take action.</li>
            </ul>
        
        <h2><a name="moving">4.2 Unstable to stable moves.</a></h2>
            
            <p>Security updates for a specific package will first be applied to
                the unstable tree. After a waiting period of no less than
                <b>12</b> hours the packages' info (and eventually patch) files will be moved into the
                stable tree as well. The retention period shall be used to
                carefully observe whether the updated package works and the
                security update does not introduce any new issues.</p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="notification.php?phpLang=en">5. Sending notifications</a></p>
<? include_once "../../footer.inc"; ?>


