<?
$title = "Charte de sécurité - Procédure";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/02 17:12:03';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Charte de sécurité Contents"><link rel="next" href="notification.php?phpLang=fr" title="Envoi des notifications"><link rel="prev" href="sources.php?phpLang=fr" title="Sources répertoriant les failles">';

include_once "header.inc";
?>

<h1>Charte de sécurité - 4 Procédure de correctif de sécurité</h1>
        
        
        <h2><a name="procedure">4.1 Ajout de correctifs de sécurité</a></h2>
            
            <p>Les correctifs de sécurité ne peuvent être appliqués qu'après vérification par l'auteur originel du programme empaqueté pour Fink et pour lequel on a détecté une vulnérabilité concernant la sécurité. L'une au moins des conditions suivantes <b>doit</b> être remplie avant toute mise à jour :</p>
            <ul>
                <li>L'auteur du programme a contacté directement le mainteneur et/ou <b>l'équipe Fink Core</b> et a fourni une rustine ou toute autre forme de travail résolvant la vulnérabilité.</li>
                <li>L'une des sources mentionnées dans la liste des mots-clés a émis une alerte de sécurité contenant des sources corrigées pour le programme empaqueté pour Fink.</li>
                <li>Une rustine a été fournie par l'une des sources mots-clés : BUGTRAQ,FULLDISC,SF-INCIDENTS,VULN-DEV.</li>
                <li>Une alerte de sécurité officielle a été émise avec un statut Candidat CVE ; cette alerte décrit la vulnérabilité, fournit une solution, une rustine ou un lien vers des sources corrigées.</li>
                <li>Une pré-notification a été envoyée directement au mainteneur et/ou à <b>l'équipe Fink Core</b> ; cette pré-notification fournit une rustine ou une solution à une vulnérabilité et requiert qu'une action soit engagée.</li>
            </ul>
        
        <h2><a name="moving">4.2 Passage de la branche instable à la branche stable.</a></h2>
            
            <p>Les correctifs de sécurité pour un paquet donné sont d'abord appliqués à la branche instable. Après une période d'attente maximale de <b>12</b> heures, les fichiers info (et éventuellement patch) du paquet sont aussi mis dans la branche stable. La période de rétention doit être utilisée pour vérifier soigneusement que le paquet mis à jour fonctionne et que le correctif de sécurité n'introduit pas de nouveaux problèmes.</p>
        
    <p align="right">
Next: <a href="notification.php?phpLang=fr">5 Envoi des notifications</a></p>

<? include_once "footer.inc"; ?>
