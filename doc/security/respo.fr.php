<?
$title = "Charte de sécurité - Responsabilité";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/10 18:09:57';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Charte de sécurité Contents"><link rel="next" href="severity.php?phpLang=fr" title="Délais de réponse et actions immédiates."><link rel="prev" href="index.php?phpLang=fr" title="Charte de sécurité Contents">';


include_once "header.fr.inc";
?>
<h1>Charte de sécurité - 1. Responsabilité</h1>
        
        
        <h2><a name="who">1.1 Qui est responsable ?</a></h2>
            
            <p>Chaque paquet de Fink a un mainteneur. On obtient ses coordonnées en exécutant en ligne de commande : <code>fink info nomdupaquet</code>. Cette commande affiche une série de renseignements, parmi lesquels on trouve un champ similaire au suivant : Maintainer: Fink Core Group &lt;fink-core@lists.sourceforge.net&gt;. Le mainteneur est pleinement responsable de son/ses paquet(s).</p>
        
        <h2><a name="contact">1.2 Qui contacter ?</a></h2>
            
            <p>Si des failles de sécurité apparaissent dans un paquet, vous devez contacter le mainteneur du paquet ainsi que <b>l'équipe Fink Core.</b> L'adresse email du mainteneur se trouve dans le fichier info du paquet, celle de <b>l'équipe Fink Core</b> est fink-core@lists.sourceforge.net </p>
        
        <h2><a name="prenotifications">1.3 Pré-notifications</a></h2>
            
            <p>La découverte de failles critiques de sécurité dans un programme empaqueté par Fink peuvent vous conduire à pré-notifier le mainteneur de ce paquet. Comme il se peut que ce mainteneur ne soit pas joignable dans un délai raisonnable, vous devez toujours envoyer une copie de la pré-notification à <b>l'équipe de sécurité de Fink</b>. Vous trouverez la liste des membres de l'équipe plus loin. Veuillez noter que fink-core@lists.sourceforge.net est une liste de diffusion dont les archives sont publiques. Les pré-notifications privées ne doivent <b>jamais</b> être envoyées à cette liste.</p>
        
        <h2><a name="response">1.4 Réponse</a></h2>
            
            <p><b>L'équipe Fink Core</b> répond aux rapports de failles de sécurité envoyés. Chaque mainteneur doit accuser réception lui-même du problème soumis. Dans l'hypothèse où le mainteneur ne serait pas disponible ou qu'il n'ait pas accusé réception du rapport dans les 24 heures suivant l'envoi, une note doit être envoyée à <b>l'équipe Fink Core</b> pour l'informer que le mainteneur ne semble pas réagir.</p>
            <p>Si vous avez tenté de contacter le mainteneur du paquet et que vous ayez reçu un message d'erreur de distribution du système de courrier, vous devez immédiatement informer <b>l'équipe Fink Core</b> de ce que le mainteneur n'est pas joignable et que le paquet doit être mis à jour sans tenir compte du mainteneur.</p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="severity.php?phpLang=fr">2. Délais de réponse et actions immédiates.</a></p>
<? include_once "../../footer.inc"; ?>


