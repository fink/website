<?
$title = "Charte de sécurité - Délais";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/10 18:09:57';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Charte de sécurité Contents"><link rel="next" href="sources.php?phpLang=fr" title="Sources répertoriant les failles"><link rel="prev" href="respo.php?phpLang=fr" title="Responsabilité">';


include_once "header.fr.inc";
?>
<h1>Charte de sécurité - 2. Délais de réponse et actions immédiates.</h1>
        
        
        
            <p>Les temps de réponse et les actions engagées dépendent principalement de la sévérité des pertes engendrées par un défaut dans un programme empaqueté pour Fink. Dans tous les cas de figure, <b>l'équipe Fink Core</b> engagera immédiatement les actions qu'elle jugera nécessaires pour protéger la communauté des utilisateurs de Fink.</p>
        
        <h2><a name="resptimes">2.1 Temps de réponse</a></h2>
            
            <p>Tout mainteneur de paquet doit faire son possible pour tenir les délais de réponse indiqués ci-dessous. <b>L'équipe Fink Core</b> peut décider d'engager des actions immédiates pour certains types de vulnérabilité. Dans ce cas, l'un des membres de <b>l'équipe Fink Core</b> devra notifier le mainteneur du paquet. Gardez toutefois à l'esprit que, bien que nous fassions tout notre possible pour tenir les délais, Fink est basé sur le bénévolat et que ces délais ne peuvent donc être garantis.</p>
            <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Vulnérabilité</th><th align="left">Temps de réponse</th></tr><tr valign="top"><td>Exploit à distance sur root</td><td>
                        <p>minimum : <b>immédiat</b>; maximum : <b>12</b> heures.</p>
                    </td></tr><tr valign="top"><td>Exploit local sur root</td><td>
                        <p>minimum : <b>12</b> heures ; maximum : <b>36</b> heures.</p>
                    </td></tr><tr valign="top"><td>Déni de service à distance</td><td>
                        <p>minimum : <b>6</b> heures ;  maximum : <b>12</b> heures.</p>
                    </td></tr><tr valign="top"><td>Déni de service local</td><td>
                        <p>minimum : <b>24</b> heures ;  maximum : <b>72</b> heures.</p>
                    </td></tr><tr valign="top"><td>Corruption de données à distance</td><td>
                        <p>minimum : <b>12</b> heures ;  maximum : <b>24</b> heures.</p>
                    </td></tr><tr valign="top"><td>Corruption locale de données</td><td>
                        <p>minimum : <b>24</b> heures ;  maximum : <b>72</b> heures.</p>
                    </td></tr></table>
        
        <h2><a name="forced">2.2 Mises à jour forcées</a></h2>
            
            <p>Un membre de <b>l'équipe Fink Core</b> peut décider de mettre à jour un paquet sans attendre que le mainteneur le fasse. On appelle cela une mise à jour forcée. Le fait de ne pas tenir le délai de réponse pour une vulnérabilité donnée dans un paquet de Fink entraîne également une mise à jour forcée de ce paquet.</p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="sources.php?phpLang=fr">3. Sources répertoriant les failles</a></p>
<? include_once "../../footer.inc"; ?>


