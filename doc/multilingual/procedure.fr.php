<?
$title = "i18n - Mise à jour";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="i18n Contents"><link rel="next" href="resources.php?phpLang=fr" title="Autres ressources"><link rel="prev" href="files.php?phpLang=fr" title="Fichiers de documentation">';


include_once "header.fr.inc";
?>
<h1>i18n - 3. Procédure de mise à jour des documents</h1>
    

    

    
 <p>Comme la documentation anglaise est la documentation maître, elle doit être mise à jour en premier. Une telle mise à jour peut être effectuée par un membre de l'équipe i18n (par exemple par les rédacteurs anglais) ou directement par les développeurs.</p>
      <p>Pour que tout se passe bien, vous devez suivre les procédures suivantes.</p>
    
    <h2><a name="call-to-translate">3.1 Demande de traduction</a></h2>
      

      <p>Quand un nouveau document est mis en ligne ou que des changements ont lieu dans la documentation anglaise, les traducteurs sont prévenus par un message envoyé sur la liste de diffusion fink-18n. Le message doit contenir les informations suivantes :</p>

      <ul>
        <li>Une note dans l'objet du message indiquant qu'il s'agit d'une demande de traduction, par exemple : "[translation]", ou "[translation-delayed]" pour les documents anglais qui ne sont pas mis en ligne immédiatement.</li>

        <li>De plus, le nom du fichier concerné doit être inclus dans le corps du message.</li>

        <li>Un diff doit être inclus pour indiquer les modifications faites, par exemple :
        <pre>diff -Nru3 -r<b>last_revision</b> r<b>head</b> </pre>
</li>
      </ul>

      <p>Note : comme la simple exécution du commit d'un fichier XML génère un message sur la liste de diffusion fink-commits qui remplit tous les critères mentionnés ci-dessus, le plus simple est de faire suivre le message en changeant son objet. Néanmoins, cela ne fonctionne pas bien, si le nombre de changements est important.</p>
    
   <h2><a name="doc-updates">3.2 Nouveau document</a></h2>
       
      <p>On fait un <a href="files.php?phpLang=fr#committing">commit</a> sur la version anglaise du document et on l'<a href="files.php?phpLang=fr#website">active</a>, il est ensuite <a href="#new-translations">traduit</a> comme expliqué ci-dessous.</p>
    
  <h2><a name="new-translation">3.3 Nouvelles traductions</a></h2>
      
      <p>Le chef d'équipe de la langue concernée (ou une autre personne ayant un accès CVS) fait un <a href="files.php?phpLang=fr#committing">commit</a> et <a href="files.php?phpLang=fr#website">active</a> les documents dès qu'ils sont prêts.</p>
      <p>On entend par nouvelle traduction :</p>
      <ul>
        <li>la première traduction d'un document existant,</li>
        <li>toute traduction partielle d'un document existant,</li>
        <li>la traduction d'un nouveau document anglais.</li>
      </ul>
    
    <h2><a name="prompt-update">3.4 Mise à jour rapide de la documentation existante</a></h2>
      
      <p>On fait un <a href="files.php?phpLang=fr#committing">commit</a> et l'on <a href="files.php?phpLang=fr#website">active</a> immédiatement la documentation maître anglaise, - quelque soit la personne qui change le fichier XML, elle doit aussi faire le commit des fichiers PHP et HTML et activer les changements. Ensuite les équipes de traduction mettent à jour leurs versions, font un <a href="files.php?phpLang=fr#committing">commit</a> de <b>tous</b> les fichiers (XML et PHP), puis <a href="files.php?phpLang=fr#activate">activent</a> les changements.</p>
      <p><b>Notes :</b></p>
      <ol>
        <li>Les modifications du guide d'internationalisation (ce document) sont <b>toujours</b> faites suivant ce schéma, car les changements affectent l'ensemble des équipes de traduction.</li>
        <li>Les modifications des documents statiques (fichiers PHP non générés via XML) sont <b>toujours</b> faites suivant ce schéma, car il est difficile de <a href="#delayed-update">retarder</a> leur activation.</li>
      </ol>
    
    <h2><a name="delayed-update">3.5 Mise à jour retardée de la documentation existante (fichiers générés via XML uniquement)</a></h2>
      
      <p>Dans ce case, on fait le <a href="files.php?phpLang=fr#committing">commit</a> de la version anglaise du fichier XML, mais <b>pas</b> des fichiers PHP et HTML, c'est-à-dire que l'on s'arrête à l'étape 5 de la section Fichiers dynamiques en <a href="files.php?phpLang=fr#committing">2.9</a>. Tous les traducteurs traduisent dans leurs langues respectives et font le <a href="files.php?phpLang=fr#committing">commit</a> du <b>seul</b> fichier XML (c'est-à-dire le même fichier que pour l'anglais) dans un laps de temps prévu d'avance. La génération, le commit et <a href="files.php?phpLang=fr#website">l'activation</a> de tous les fichiers PHP et HTML sont faits en même temps par un des chefs du projet i18n quand le délai est écoulé.</p>
    
        <h2><a name="summary">3.6 Pour les développeurs et les documentalistes anglais</a></h2>
      
      <p>La règle actuelle est que tous les documents doivent être mis à jour suivant le schéma <a href="#prompt-update">mise à jour rapide</a>, sauf si vous avez une bonne raison de faire autrement.</p>
    

 <p align="right"><? echo FINK_NEXT ; ?>:
<a href="resources.php?phpLang=fr">4. Autres ressources</a></p>
<? include_once "../../footer.inc"; ?>



