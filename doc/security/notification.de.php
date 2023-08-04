<?php
$title = "Sicherheitspolitik - Benachrichtigungen";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/24 00:08:32';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Sicherheitspolitik Contents"><link rel="prev" href="updating.php?phpLang=de" title="Sicherheitsaktualisierungen">';


include_once "header.de.inc";
?>
<h1>Sicherheitspolitik - 5. Benachrichtigungen verschicken</h1>
    
    
    
      <p>Manche Nutzer aktualisieren ihre Software nicht sehr häufig.
        Damit möglichst schnell alle Nutzer aktualisierte Versionen der
        Pakete mit Sicherheitslücken installieren und benutzen, kann ein
        Paketbetreuer darum bitten, dass eine entsprechende Ankündigung
        über die Mailing-Liste "Fink announcement" verschickt wird.</p>
    
    <h2><a name="who">5.1 Wer darf verschicken?</a></h2>
      
      <p>Diese Ankündigung darf nur vom <b>Fink Security Team</b>
        verschickt werden. Meistens wird das von
        dmalloc@users.sourceforge.net erledigt und einem PGP-Schlüssel mit
        folgender Signatur:</p>
      <ul>
        <li>FD77 F0B7 5C65 F546 EB08 A4EC 3CCA 1A32 7E24 291E.</li>
        <li>zu finden bei
          http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0x7E24291E</li>
      </ul>
      <p>Das obige ist absichtlich nicht als Link formatiert.</p>
      <p>Weitere autorisierte Mitglieder des Teams sind: (fügen sie hier
        ihre Email-Adresse und den öffentlichen Schlüssel ein.)</p>
      <p>peter@pogma.com signiert durch einen PGP-Schlüssel mit der Signatur:</p>
      <ul>
        <li>4D67 1997 DD32 AE8E D7ED  9C79 8491 2AB7 DF3B 6004.</li>
        <li>
          zu finden bei http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xDF3B6004
        </li>
      </ul>
      <p>ranger@befunk.com signiert durch einen PGP-Schlüssel mit der Signatur:</p>
      <ul>
        <li> 6401 D02A A35F 55E9 D7DD  71C5 52EF A366 D3F6 65FE.</li>
        <li>
          zu finden bei http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xD3F665FE
        </li>
      </ul>
    
    <h2><a name="how">5.2 Wie ankündigen?</a></h2>
      
      <p>Damit sicher gestellt ist, dass Sicherheitsankündigungen ein
        einheitliches Aussehen haben, <b>müssen</b> sich alle an die
        folgende Vorlage halten.</p>
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
      <p>Ein Beispielsbericht könnte so aussehen:</p>
<pre> ID: FINK-2004-06-01
 Reported:         2004-06-09
 Updated:          2004-06-09
 Package:          cvs
 Affected:         &lt;= 1.11.16, &lt;= 1.12.8
 Maintainer:       Sylvain Cuaz
 Tree(s):          10.3/stable, 10.3/unstable, 10.2-gcc3.3/stable,10.2-gcc3.3/unstable
 Mac OS X version: 10.3, 10.2
 Fix:              upstream
 Updated by: forced update (dmalloc@users.sourceforge.net)
 Description: Multiple vulnerabilities in CVS found by Ematters Security.
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
 Ref-URL:    http://security.e-matters.de/advisories/092004.html
</pre>
      <p>Beachten sie bitte, dass sich das Schlüsselwort <b>Affected</b>
        auf alle Versionen der Software bezieht, die Sicherheitslücken
        aufweisen, nicht nur auf die, für die es Fink-Pakete gibt. Das
        Beispiel zeigt dies sehr deutlich.</p>
    
  
<?php include_once "../../footer.inc"; ?>


