<?
$title = "i18n - Mise à jour";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="i18n Contents"><link rel="next" href="resources.php?phpLang=fr" title="Autres ressources"><link rel="prev" href="files.php?phpLang=fr" title="Fichiers de documentation">';

include_once "header.inc";
?>

<h1>i18n - 3 Procédure de mise à jour des documents</h1>
    

    

    
      <p>Pour que tout se passe bien, vous devez suivre les procédures suivantes.</p>
    

    <h2><a name="new-translation">3.1 Nouvelles traductions</a></h2>
      

      <p>Quand une nouvelle langue est ajoutée, un gel de la mise à jour de tous les fichiers de documentation (anglais ou autres) est déclaré, de façon à ce que la nouvelle équipe de traduction ne soit pas perturbée par un changement sur les fichiers qu'elle est en train de traduire. Dans ce cas, les documents sont mis en ligne et activés dès qu'ils sont prêts.</p>
    

    <h2><a name="doc-updates">3.2 Mises à jour du contenu des fichiers</a></h2>
      

      <p>Comme la documentation anglaise est la documentation maître, elle doit être mise à jour en premier. Une telle mise à jour peut être effectuée par un membre de l'équipe i18n (par exemple par les rédacteurs anglais) ou directement par les développeurs.</p>

      <p>Voici les catégories de mises à jour utilisées pour la documentation :</p>

      <ol>
        <li><b>Urgent (sécurité, bogues résolus, etc...) :</b> La documentation anglaise est mise à jour immédiatement, les traducteurs mettent à jour les fichiers correspondants dans leur langue et les mettent en ligne le plus vite possible.</li>

        <li><b>Non urgent :</b> Dans ce cas, la documentation anglaise est mise à jour, mais n'est pas mise en ligne immédiatement. Les traducteurs ont un à deux jours pour mettre à jour leur traduction, puis toutes les versions sont mises en ligne au même moment.</li>
      </ol>
    

    <h2><a name="call-to-translate">3.3 Demande de traduction</a></h2>
      

      <p>Quand les fichiers anglais sont prêts, les traducteurs sont prévenus par un message envoyé sur la liste de diffusion fink-18n. Le message doit contenir les informations suivantes :</p>

      <ul>
        <li>Une note dans l'objet du message indiquant qu'il s'agit d'une demande de traduction, par exemple : "[translation]", ou "[translation-urgent]" pour les documents anglais qui sont mis immédiatement en ligne.</li>

        <li>De plus, le nom du fichier concerné doit être inclus dans le corps du message.</li>

        <li>Un diff doit être inclus pour indiquer les modifications faites, par exemple :
        <pre>diff -Nru3 -r<b>last_revision</b> r<b>head</b> </pre>
</li>
      </ul>

      <p>Note : comme la simple exécution du commit d'un fichier XML génère un message sur la liste de diffusion fink-commits qui remplit tous les critères mentionnés ci-dessus, le plus simple est de rediriger le message en changeant son objet.</p>
    

    <h2><a name="translate">3.4 Traduction</a></h2>
      

      <p>Une fois cela fait, le travail de traduction peut commencer. On effectue un commit sur chaque fichier dès qu'il est traduit.</p>
    

    <h2><a name="activation">3.5 Activation des changements</a></h2>
      

      <p>Il y a deux façon d'activer les changements selon l'urgence des modifications :</p>

      <ol>
        <li>Pour les modifications urgentes, les changements sont activés dès que le fichier a été modifié.</li>

        <li>Pour les modifications non urgentes, les changements sont activés après que toutes les versions du fichier ont été modifiées.</li>
      </ol>
    
  <p align="right">
Next: <a href="resources.php?phpLang=fr">4 Autres ressources</a></p>

<? include_once "footer.inc"; ?>
