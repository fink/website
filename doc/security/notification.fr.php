<?
$title = "Charte de sécurité - Notification";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/02 17:12:03';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Charte de sécurité Contents"><link rel="prev" href="updating.php?phpLang=fr" title="Procédure de correctif de sécurité">';


include_once "header.fr.inc";
?>
<h1>Charte de sécurité - 5. Envoi des notifications</h1>
        
        
        
            <p>Certains utilisateurs peuvent décider de ne pas mettre à jour leurs programmes très souvent. Pour s'assurer que ceux qui ont installé des paquets à partir du source utilisent le plus vite possible des paquets corrigés (dans le cas où ces paquets ont fait l'objet d'alertes de sécurité), le mainteneur du paquet peut demander à ce qu'une notification soit envoyée sur la liste de diffusion d'annonces de Fink.</p>
        
        <h2><a name="who">5.1 Qui envoie les notifications ?</a></h2>
            
            <p>Ces annonces ne peuvent être faites que par dmalloc@users.sourceforge.net et signé avec une clé PGP dont l'empreinte est : </p>
                <ul>
                    <li>
                FD77 F0B7 5C65 F546 EB08 A4EC 3CCA 1A32 7E24 291E.
                </li>
                <li>située sur 
                http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0x7E24291E</li></ul>
                <p>C'est intentionnellement que le lien n'est pas marqué en tant que tel.</p>
            <p> Autres membres autorisés : (ajoutez ici votre adresse email et votre clé publique comme je l'ai fait ci-dessus).</p>
  	        <p>peter@pogma.com signé avec une clé PGP dont l'empreinte est :</p>
	        <ul>
	            <li>
		4D67 1997 DD32 AE8E D7ED  9C79 8491 2AB7 DF3B 6004.</li>
		<li> située sur http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xDF3B6004
        </li>
            </ul> 
        
        <h2><a name="how">5.2 Comment les envoyer</a></h2>
            
            <p>Pour donner à toutes les notifications de sécurité un aspect semblable, elles <b>devront</b> toutes se conformer au modèle suivant :</p>
            <p>NdT: c'est intentionnellement que le modèle n'est pas traduit, car toute notification de sécurité doit être envoyée en anglais.</p>
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
            <p>Exemple :</p>
            <pre>
                ID:               FINK-2004-06-01
                Reported:         2004-06-09
                Updated:          2004-06-09
                Package:          cvs 
                Affected:             &lt;= 1.11.16, &lt;= 1.12.8
                Maintainer:       Sylvain Cuaz
                Tree(s):          10.3/stable, 10.3/unstable, 10.2-gcc3.3/stable, 10.2-gcc3.3/unstable   
                Mac OS X version: 10.3, 10.2
                Fix:              upstream
                Updated by:       forced update (dmalloc@users.sourceforge.net)
                Description:      Multiple vulnerabilities in CVS found my ematters Security.
                References:       BID
                   Ref-URL:       http://www.securityfocus.com/bid/10499
                References:       CVE
                   Ref-URL:       http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0414
                References:       CVE
                   Ref-URL:       http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0416
                References:       CVE
                   Ref-URL:       http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0417
                References:       CVE
                   Ref-URL:       http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0418
                References:       FULLDISCURL
                   Ref-URL:       http://lists.netsys.com/pipermail/full-disclosure/2004-June/022441.html
                References:       MISC
                   Ref-URL:       http://security.e-matters.de/advisories/092004.html
            </pre>
            <p>Notez que les mots clés <b>Affected</b> correspondent à toutes les versions vulnérables du logiciel et non pas aux seules versions empaquetés pour Fink. L'exemple ci-dessus le montre clairement.</p>
        
    
<? include_once "../../footer.inc"; ?>



