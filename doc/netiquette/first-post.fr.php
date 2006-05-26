<?
$title = "Etiquette net - Premier message";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/05/26 13:14:22';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Etiquette net Contents"><link rel="next" href="reply.php?phpLang=fr" title="Réponses aux messages"><link rel="prev" href="before-post.php?phpLang=fr" title="Phase de préparation">';


include_once "header.fr.inc";
?>
<h1>Etiquette net - 2. Premier message</h1>
    
    
    <h2><a name="system">2.1 Description de votre installation</a></h2>
      
      <p>Si vous avez un problème lors de l'installation d'un paquet, vous devez fournir les informations suivantes sur votre système :</p>
      <ul>
        <li>La version de votre système d'exploitation.</li>
        <li>La version de Fink installée. Le plus simple est de poster le résultat de la commande <pre>fink --version</pre> lancée dans une fenêtre de terminal.</li>
        <li>Vous devez indiquez si l'installation se fait à partir de paquets binaires, c'est-à-dire si vous utilisez <code>apt-get</code>, ou à partir de sources, c'est-à-dire si vous utilisez  <code>fink install</code>.<p>Dans ce dernier cas, vous devez aussi mentionner la version des Developer Tools que vous utilisez.</p></li>
        <li><p>Si vous installez un paquet qui nécessite X11, vous devez indiquer lequel vous utilisez : X11 d'Apple ou XFree86.  Dans ce dernier cas, indiquez la version.</p><p>En cas de doute, fournissez ces informations.</p></li>
      </ul>
    
    <h2><a name="problem-description">2.2 Description du problème</a></h2>
      
      <ul>
        <li><b>Indiquez le nom et la version du paquet à l'origine de votre problème.</b>  <p>Cette information doit se trouver dans l'objet du message.</p><p>Si vous avez un problème avec <code>foo-3.141-6</code>, n'indiquez pas juste <code>foo</code>.</p><p>Si vous installez un paquet (par exemple, <code>baz-2.18-1</code>) qui dépend d'autres paquets (<code>foo-3.141-6</code>, <code>bar-16.0-9</code>, ...), et que vous avez un problème avec <code>foo</code>, vous devez mentionner <code>foo-3.141-6</code>, et non <code>baz-2.18-1</code>.</p></li>
        <li><b>Décrivez le problème.</b>  <p>Cela signifie que vous devez poster un extrait des messages d'erreurs.</p><ol>
            <li>Pour les problèmes issus d'installation de binaires, commencez à partir du dépaquetage du paquet :
<pre>...
Selecting previously deselected package foo
error unpacking foo
...</pre>et allez jusqu'à la fin.<p></p></li>
            <li>Il peut y avoir quelques problèmes avec les installations à partir du source :<ol>
                <li>si la compilation échoue pendant la phase initiale de configuration, c'est en général assez rapide. Postez des derniers tests juste avant le message d'erreur jusqu'à la fin :<pre>....
Checking for bar-config...no
Error:  bar-config not found
....</pre><p>Si vous pensez que cela peut aider, vous pouvez poster la partie correspondante du fichier log de configuration, par exemple <code>/sw/src/foo-3.141-6/foo-3.141/config.log</code>. <b>Ne postez pas le fichier dans son entier, car il peut être très gros.</b></p></li>
                <li>Ou l'erreur peut apparaître immédiatement après le début de la construction du paquet. Dans ce cas, postez de la dernière ligne de compilation jusqu'à la fin :<pre>...
gcc &lt;drapeaux, fichiers, etc...&gt;
&lt;messages d'erreur&gt;
...</pre></li>
                <li>Si vous avez une erreur du genre <code>execution of mv failed</code>, on vous dira de chercher dans le résultat de compilation une erreur antérieure à ce message. Vous avez donc intérêt à la chercher avant de poster.</li>
              </ol></li>
          </ol>    </li>
      </ul>
    
    <h2><a name="remedies">2.3 Essais préalables</a></h2>
      
      <p>Mentionnez ce que vous avez essayé de faire pour résoudre le problème, par exemple :</p>
      <ul>
        <li>Appliquer les instructions trouvées dans les QFP ou d'autre partie de la documentation</li>
        <li>Supprimer les paquets qui semblent entrer en conflit avec celui que vous vouliez installer</li>
        <li>Reconstruire / réinstaller le paquet</li>
        <li>Mettre à jour les descriptions de paquets</li>
        <li>etc...</li>
      </ul>
      <p>De cette façon, on ne vous suggérera pas de faire ce que vous avez déjà fait.</p>
    
    <h2><a name="future-plans">2.4 Tentatives futures</a></h2>
      
      <p>Dans cette catégorie tombent :</p>
      <ul>
        <li>Poster ce que vous envisagez de faire si vous n'obtenez une réponse immédiate.</li>
        <li>Demander si telle ou telle procédure paraît convenir.</li>
      </ul>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="reply.php?phpLang=fr">3. Réponses aux messages</a></p>
<? include_once "../../footer.inc"; ?>


