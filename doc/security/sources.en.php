<?
$title = "Security Policy - Source";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2004/09/20 20:14:23';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Security Policy Contents"><link rel="next" href="updating.php?phpLang=en" title="Security update procedure."><link rel="prev" href="severity.php?phpLang=en" title="Response times and immediate actions.">';


include_once "header.en.inc";
?>
<h1>Security Policy - 3. Incident Sources</h1>
        
        
        <h2><a name="sources">3.1 Acceptable Incident Sources.</a></h2>
            
            <p>As submitter of a security incident in Fink-packaged software you
                have to ensure that the vulnerability of the software also
                exists on Mac OS X. It is the responsibility of the notifying party
                to ensure that one of the following sources reinforces the
                reported issue for the particular software in question.</p>
            <ol>
                <li>
                    <b>AIXAPAR</b>: AIX APAR (Authorised Problem Analysis Report)</li>
                <li>
                    <b>APPLE</b>: Apple Security Update</li>
                <li>
                    <b>ATSTAKE</b>: @stake security advisory</li>
                <li>
                    <b>AUSCERT</b>: AUSCERT advisory</li>
                <li>
                    <b>BID</b>: Security Focus Bugtraq ID database entry</li>
                <li>
                    <b>BINDVIEW</b>: BindView security advisory</li>
                <li>
                    <b>BUGTRAQ</b>: Posting to Bugtraq mailing list</li>
                <li>
                    <b>CALDERA</b>: Caldera security advisory</li>
                <li>
                    <b>CERT</b>: CERT/CC Advisories</li>
                <li>
                    <b>CERT-VN</b>: CERT/CC vulnerability note</li>
                <li>
                    <b>CIAC</b>: DOE CIAC (Computer Incident Advisory Center) bulletins</li>
                <li>
                    <b>CONECTIVA</b>: Conectiva Linux advisory</li>
                <li>
                    <b>CONFIRM:</b> URL to location where vendor confirms that
                    the problem exists</li>
                <li>
                    <b>DEBIAN</b>: Debian Linux Security Information</li>
                <li>
                    <b>EEYE</b>: eEye security advisory</li>
                <li>
                    <b>EL8</b>: EL8 advisory</li>
                <li>
                    <b>ENGARDE</b>: En Garde Linux advisory</li>
                <li>
                    <b>FEDORA</b>: Fedora Project security advisory</li>
                <li>
                    <b>FULLDISC</b>: Full-Disclosure mailing list</li>
                <li>
                    <b>FreeBSD</b>: FreeBSD security advisory</li>
                <li>
                    <b>GENTOO</b>: Gentoo Linux security advisory</li>
                <li>
                    <b>HERT</b>: HERT security advisory</li>
                <li>
                    <b>HP</b>: HP security advisories</li>
                <li>
                    <b>IBM</b>: IBM ERS/BRS advisories</li>
                <li>
                    <b>IMMUNIX</b>: Immunix Linux advisory</li>
                <li>
                    <b>INFOWAR</b>: INFOWAR security advisory</li>
                <li>
                    <b>ISS</b>: ISS Security Advisory</li>
                <li>
                    <b>KSRT</b>: KSR[T] Security Advisory</li>
                <li>
                    <b>L0PHT</b>: L0pht Security Advisory</li>
                <li>
                    <b>MANDRAKE</b>: Linux-Mandrake advisory</li>
                <li>
                    <b>MISC</b>: generic reference from an URL </li>
                <li>
                    <b>MLIST</b>: generic reference form for miscellaneous
                    mailing lists</li>
                <li>
                    <b>NAI</b>: NAI Labs security advisory</li>
                <li>
                    <b>NETECT</b>: Netect security advisory</li>
                <li>
                    <b>NetBSD</b>: NetBSD Security Advisory</li>
                <li>
                    <b>OPENBSD</b>: OpenBSD Security Advisory</li>
                <li>
                    <b>REDHAT</b>: Security advisories</li>
                <li>
                    <b>RSI</b>: Repent Security, Inc. security advisory</li>
                <li>
                    <b>SEKURE</b>: Sekure security advisory</li>
                <li>
                    <b>SF-INCIDENTS</b>: posting to Security Focus Incidents
                    mailing list</li>
                <li>
                    <b>SGI</b>: SGI Security Advisory</li>
                <li>
                    <b>SLACKWARE</b>: Slackware security advisory</li>
                <li>
                    <b>SNI</b>: Secure Networks, Inc. security advisory</li>
                <li>
                    <b>SUN</b>: Sun security bulletin</li>
                <li>
                    <b>SUNALERT</b>: Sun security alert</li>
                <li>
                    <b>SUNBUG</b>: Sun bug ID</li>
                <li>
                    <b>SUSE</b>: SuSE Linux: Security Announcements</li>
                <li>
                    <b>TRUSTIX</b>: Trustix Security Advisory</li>
                <li>
                    <b>TURBO</b>: TurboLinux advisory</li>
                <li>
                    <b>VULN-DEV</b>: Posting to VULN-DEV mailing list</li>
                <li>
                    <b>VULNWATCH</b>: VulnWatch mailing list</li>
                <li>
                    <b>XF</b>: X-Force Vulnerability Database</li>
                <li>
                    <b>CVE</b>: CVE Candidates </li>
            </ol>
            <p>The above keywords are in full compliance with the CVE
                recommended keyword list found <a href="http://www.cve.mitre.org/cve/refs/refkey.html">here</a>. </p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="updating.php?phpLang=en">4. Security update procedure.</a></p>
<? include_once "../../footer.inc"; ?>


