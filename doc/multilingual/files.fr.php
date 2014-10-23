<?php
$title = "i18n - Fichiers";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:15';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="i18n Contents"><link rel="next" href="procedure.php?phpLang=fr" title="Procédure de mise à jour des documents"><link rel="prev" href="intro.php?phpLang=fr" title="Introduction">';


include_once "header.fr.inc";
?>
<h1>i18n - 2. Fichiers de documentation</h1>



<p>Le but de ce chapitre est de vous expliquer quels sont les fichiers de documentation de Fink, comment y accéder et comment envoyer et activer les modifications que vous y faites sur le site web de Fink.</p>

<h2><a name="requirements">2.1 Conditions requises</a></h2>

<p>Pour travailler sur les fichiers de documentation en tant que membre d'une équipe de traduction, il vous faut :</p>
<ul>
<li>Un client CVS qui vous permette de télécharger la documentation à partir de la branche xml de Fink.</li>
<li>Un éditeur de texte qui gère l'encodage UTF-8 ; éventuellement un éditeur XML, car de nombreux fichiers du site web de Fink sont générés à partir de fichiers XML.</li>
<li>Faire un check out de l'arbre xml de Fink, comme expliqué dans les <a href="#acquiring">instructions</a> ci-dessous.</li>
<li>Le cas échéant, une bonne connaissance de Fink.</li>
</ul>
<p><b>Note :</b> un "membre de l'équipe" est une personne qui traduit, mais n'est pas responsable du téléchargement des fichiers sur le site web de Fink.</p>
<p>En plus de remplir les conditions ci-dessus, les chefs d'équipe doivent avoir :</p>
<ul>
<li>Un compte SourceForge (enregistrement gratuit).</li>
<li>Un accès de commit  à la branche documentation de Fink. Pour l'obtenir, envoyez un message à la liste de diffusion fink-18n dans lequel vous indiquez votre nom d'utilisateur SourceForge. L'un des chefs de projet i18n entreprendra les démarches pour que vous ayez un accès CVS à la branche documentation.</li>
</ul>
<p><b>Note : </b>un "chef d'équipe" est une personne qui est responsable du téléchargement des fichiers modifiés sur le site web et de l'activation des modifications.</p>

<h2><a name="setting-up">2.2 Configuration de l'environnement</a></h2>

<p>Vous pouvez configurer votre environnement pour réduire au maximum les saisies répétitives. Les directives suivantes supposent que vous utilisez les outils en ligne de commande de Mac OS X ou d'un autre système opératoire à base d'Unix.</p>
<ol>
<li><b>Chefs d'équipe :</b> modifiez votre fichier de login pour ajouter la variable d'environnement CVS_RSH.<ol>
<li>Si vous utilisez <code>bash</code> ou
<code>zsh</code>, ajoutez la ligne suivante :
<pre>export CVS_RSH=ssh</pre>
au fichier <code>.profile</code>.</li>
<li>Si vous utilisez <code>tcsh</code>, ajoutez la ligne suivante : 
<pre>setenv CVS_RSH ssh</pre>
au fichier <code>.cshrc</code>. <p>
<code>cvs</code> utilisera alors ssh pour accéder aux fichiers. Ceci est absolument nécessaire.</p></li>
</ol></li>
<li><b>Tout membre :</b> créez un fichier nommé .cvsrc dans votre répertoire utilisateur et ajoutez-lui la ligne suivante :
 <pre>cvs -z3</pre>
 De cette façon, CVS utilisera le niveau de compression 3 par défaut (ce qui est une bonne chose !).</li>
</ol>
<p>Ensuite, ouvrez une nouvelle fenêtre de terminal pour que la variable d'environnement CVS_RSH soit réellement prise en compte.</p>

<h2><a name="acquiring">2.3 Récupération  des fichiers de travail</a></h2>

<p>Pour l'instant, vous devez exécuter un check out de la branche xml du site web :</p>
<ol>
<li>Ouvrez un terminal</li>
<li>Créez un répertoire pour accueillir la branche xml de Fink, par exemple :
<pre>mkdir -p ~/Documents/Fink-i18n</pre></li>
<li>Déplacez vous dans ce répertoire :
<pre>cd ~/Documents/Fink-i18n</pre></li>
<li><b>Pour les membres d'une équipe (ou les chefs d'équipe n'ayant pas encore d'accès commit) :
</b>Connectez-vous anonymement à fink.cvs.sourceforge.net : <ol>
<li><pre>cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink login</pre></li>
<li>Appuyez sur la touche retour chariot (pas de mot de passe, anonyme par défaut)</li>
<li>Faites un check out du module xml : 
<pre>cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink co xml</pre></li>
</ol><b>Chefs d'équipe : </b>faites un check out en utilisant votre nom d'utilisateur :<ol>
<li>Vous n'avez pas à vous connecter, exécutez directement :
<pre>cvs -d:ext:votrenomutilisateur@fink.cvs.sourceforge.net:/cvsroot/fink co xml</pre>
où <b>votrenomutilisateur</b> est, bien sûr, votre nom d'utilisateur sur SourceForge. Il se peut que vous ayez un message vous disant que la clé DSA du serveur est inconnue. Répondez "yes" à ce message. </li>
<li>Dans ce cas, vous devez saisir votre phrase d'authentification SourceForge à l'invite.</li>
</ol></li>
</ol>

<h2><a name="file-standards">2.4 Types de fichiers</a></h2>

<p>En tant que traducteur, vous devrez distinguer deux types de fichiers :</p>
<ol>
<li><b>Fichiers statiques (fichiers PHP seuls)</b> <p>Ce sont des documents dont l'organisation (c'est-à-dire la numérotation des articles) a peu de chances de varier d'un jour à l'autre. Dans ce cas, le document est représenté par un fichier PHP, que vous devez traduire.</p></li>
<li><b>Fichiers dynamiques (fichiers XML générant des fichiers PHP et HTML)</b> <p>Ces documents (par exemple les QFP) sont mis à jour et restructurés plus souvent, il faut donc pouvoir les réorganiser dynamiquement. Ils ont pour base un fichier XML à partir duquel sont créés des fichiers PHP et HTML au moyen d'un script. En tant que traducteur, vous devez traduire le fichier XML.</p></li>
</ol>
<p>De plus, vous devrez traduire ou modifier d'autres fichiers, tels les Makefile, les fichiers de type nac.xx.inc et constants.xx.inc. En leur absence, soit les pages n'apparaîtront sur le site web, soit elles n'apparaîtront pas correctement.</p>
<p>Tous les fichiers sont <b>encodés en utf-8</b>. Il en résulte que vous ne devez pas changer l'encodage à moins qu'il ne soit incorrect. De même vous ne devez utiliser aucune entité html autre que celles existant déjà dans les fichiers anglais.</p>

<h2><a name="updating">2.5 Récupération de la révision la plus récente</a></h2>

<p>Comme d'autres traducteurs vont changer certains fichiers (ne paniquez pas, CVS gère très bien les changements),  il vous est conseillé de mettre à jour fréquemment votre copie de travail après le premier check out. Pour mettre à jour, suivez les étapes suivantes :</p>
<ol>
 <li>Déplacez-vous dans le répertoire qui contient les fichiers récupérés, par exemple :
<pre>cd ~/Documents/Fink-i18n/xml</pre></li>
<li>Mettez-les à jour :
<pre>cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink update -dP</pre>
pour les membres d'équipe sans accès commit, ou :
<pre>cvs update -dP</pre>
pour les chefs d'équipe.</li>
</ol>
<p>Vous verrez peut-être une lettre devant un ou plusieurs noms de fichiers lors de la mise à jour.  Consultez l'<a href="appendix.php?phpLang=fr">Annexe</a> pour de plus amples informations, ainsi que la man page cvs.</p>

<h2><a name="initial-translation">2.6 Traduction initiale</a></h2>

<p>Voici les fichiers à traduire, classés par ordre de priorité :</p>
<p>Noms (des fichiers de la version anglaise)</p>
<ol>
<li>Fichiers de constantes ( par exemple <code>xml/web/constants.*.inc</code>) (voir ci-dessous)</li>
 <li>Fichiers statiques PHP ( par exemple <code>xml/web/*.en.php</code>)</li>
 <li>Fichiers de navigation dans la documentation (par exemple <code>xml/web/doc/nav.*.inc</code>) (même traitement que constants.*.inc)</li>
 <li>Index de la documentation (<code>xml/doc/doc.en.xml</code>)</li>
 <li>Guide utilisateur (<code>xml/users-guide/uguide.en.xml</code>)</li>
 <li>Notions complexes (<code>xml/advanced/advanced.en.xml</code>)</li>
 <li>Guide utilisateur (<code>xml/users-guide/uguide.en.xml</code>)</li>
 <li>Utilisation de X11 (<code>xml/x11/x11.en.xml</code>)</li>
 <li>Accès CVS (<code>xml/cvsaccess/cvs.en.xml</code>)</li>
 <li>ReadMe (<code>xml/fink-readme/readme.en.xml</code>)</li>
<li>Internationalisation (<code>xml/multilingual/multilingual.en.xml</code>)</li>
 <li>Étiquette net (<code>xml/netiquette/netiquette.en.xml</code>)</li>
 <li>Sécurité (<code>xml/security/security.en.xml</code>)</li>
 <li>Tutoriel d'empaquetage (<code>xml/quick-start-pkg/quick-start-pkg.en.xml</code>)</li>
 <li>Construction de paquets (<code>xml/packaging/packaging.en.xml</code>)</li>
 <li>Portage (<code>xml/porting/porting.en.xml</code>)</li>
 <li>Dernières nouvelles (<code>xml/news/news.xml</code>)</li>
</ol>
<p>Vérifiez qu'il n'y a pas d'autres fichiers php, constantes ou navigation à traduire dans les sous-répertoires du répertoire <code>xml/web</code></p>
<p>Ne traduisez et ne modifiez aucun fichier php situé dans le répertoire <code>xml/web</code> ou ses sous-répertoires, s'il existe au début de ce fichier une ligne contenant "Generated from". Vous trouverez le fichier xml correspondant à traduire ou à modifier dans l'arborescence <code>xml</code>.</p>
<p>Les fichiers <code>constants.*.inc</code> servent à traduire des mots inclus tels quels dans les fichiers PHP. La plupart correspondent à des articles de menu, situés en haut et à gauche des pages. Il vous faut les isoler des scripts  et créer un fichier constants.xx.inc pour votre langue. Pour ce faire, exécutez la commande suivante dans une fenêtre de terminal :</p>
<pre>cp constants.fr.inc constants.xx.inc</pre>
<p>où xx est votre code langue (par exemple de pour l'allemand).
Ensuite, il vous faudra traduire la partie située entre guillemets simples de chaque ligne commençant par define. Si vous ne comprenez pas l'allemand, voici la traduction en anglais :</p>
<p>N'oubliez pas de changer la locale, c'est-à-dire de changer en_US en de_DE pour l'allemand.</p>
<pre>
/* The Sections.  Used in Menu Navigation Bar */
define (FINK_LC_ALL, 'en_US');

/* The Sections. Used in Menu Navigation Bar */ 
define (FINK_SECTION_HOME, 'Home'); 
define (FINK_SECTION_DOWNLOAD, 'Download');
define (FINK_SECTION_PACKAGE, 'Packages'); 
define (FINK_SECTION_HELP, 'Help'); 
define (FINK_SECTION_FAQ, 'F.A.Q.'); 
define (FINK_SECTION_DOCUMENTATION, 'Documentation'); 
define (FINK_SECTION_MAILING_LISTS, 'Mailing Lists'); 

/* The Home Subsections. Used in Menu Navigation Bar */ 
define (FINK_SECTION_HOME_INDEX, 'Index'); 
define (FINK_SECTION_HOME_NEWS, 'News'); 
define (FINK_SECTION_HOME_ABOUT, 'About'); 
define (FINK_SECTION_HOME_CONTRIBUTORS, 'Contributors'); 
define (FINK_SECTION_HOME_LINKS, 'Links'); 

/* The word 'Sections'. Used in Menu Navigation Bar */ 
define (FINK_SECTIONS, 'Sections'); 

/* Used in FAQ/Documentation Sections: */
/* Contents as Table of contents, Next as next page */ 
/* Q as question, A as anwer */
define (FINK_CONTENTS, 'Contents');
define (FINK_NEXT, 'Next');
define (FINK_Q, 'Q');
define (FINK_A, 'A');

/* Printer */
define (FINK_PRINTER, 'Printer');
define (FINK_PRINT_VERSION, 'Print Version');

/* Footer */
define (META_KEYWORDS, 'Mac OS X, Fink, Debian, Macintosh, Apple, UNIX, Open Source,
 download, free software, port, development, package management');
define (META_DESCRIPTION, 'The Fink project wants to bring the full world of Unix Open
 Source software to Darwin and Mac OS X. We modify Unix software so that it 
 compiles and runs on Mac OS X and make it available for download as a coherent
 distribution.');
define (HEADER_HOSTED_BY, 'Hosted by {img}');
define (FOOTER_AVAILABLE_LANGUAGES, 'Available Languages');
define (FOOTER_GENERATED_DYNAMICALLY, 'Generated dynamically from');
define (FOOTER_DATABASE_LAST_UPDATED, 'Last updated on %a, %d %B %Y,  %R %Z');
define (FOOTER_LAST_CHANGED, 'Last changed by {author} on %a, %d %B %Y,  %R %Z');
</pre>
<p><b>Note :</b> les premières lignes de la section Footer ont été coupées pour des raisons d'affichage. Ne les coupez pas dans le fichier.</p>
<p>Quand vous traduisez, vous devez suivre les étapes suivantes (disons que vous traduisez en français le document Running X11) :</p>
<ol>
<li>Copiez le fichier xml
<pre>cp x11.en.xml x11.fr.xml</pre></li>
<li>Modifiez les premières lignes pour indiquer que le texte du fichier est écrit en français et que l'encodage est UTF-8 :
<pre>&lt;?xml version='1.0' encoding='utf-8' ?&gt; ...
&lt;document filename="index" lang="fr" &gt; ...</pre></li>
<li><b>Note très importante</b> : Vérifiez que la ligne cvsid en début de fichier n'est pas coupée en deux.</li>
<li>Sauvegardez le fichier avec encodage UTF-8. Assurez-vous que l'encodage du texte est bien utf-8 et  ne modifiez que la partie texte dans le fichier.</li>
<li>Quand vous aurez fini la traduction, ou quand vous voulez la tester, modifiez le fichier 
<code>Makefile</code> pour ajouter votre langue :
<pre>LANGUAGES_AVAILABLE = en ja fr</pre>
<p>Puis exécutez <code>make</code> dans le répertoire. Cela créera les fichiers PHP (et éventuellement d'autres fichiers), ainsi que tous les fichiers correspondant aux langues présentes dans le Makefile.</p></li>
</ol>
<p>Note : si vous constatez des fautes d'orthographe ou des erreurs dans le fichier anglais, ne le modifiez pas de vous-même, mais signalez-les à la <a href="/lists/fink-i18n.php">liste de diffusion fink-i18n
list</a>, de telle sorte que le fichier anglais - fichier maître - soit modifié.</p>

<h2><a name="check-work">2.7 Vérification du travail</a></h2>

<p>Avant de télécharger votre travail sur le site web de Fink, vous devez vérifier que vos documents s'affichent correctement. Il existe deux façons de le faire :</p>
<ul>
<li><b>La plus simple : </b>ouvrez les fichiers HTML et PHP dans votre navigateur web. Les fichiers PHP ne s'afficheront toutefois pas exactement comme vous les verrez sur le site web de Fink.</li>
<li><b>La meilleure : </b>Vous pouvez utiliser le serveur web inclus dans le système opératoire pour afficher vos documents de la même façon que sur le site web de Fink. En supposant que vous utilisez le serveur inclus :<ol>
<li>Modifiez le fichier <code>/etc/httpd/httpd.conf</code>, par exemple avec :<pre>sudo pico /etc/httpd/httpd.conf</pre></li>
<li>Cherchez la ligne :
<pre>#LoadModule php4_module libexec/httpd/libphp4.so</pre>
et supprimez le signe # au début de cette ligne.</li>
<li>Cherchez la ligne 
<pre>#AddModule mod_php4.c</pre>
et supprimez le signe # au début de cette ligne.</li>
<li>Si vous utilisez une version d'Apache antérieure à celle incluse dans Panther, vous devez aussi rechercher la ligne :
<pre>AddType application/x-httpd-php   .php</pre>
et insérez un signe # au début de cette ligne.</li>
<li>Sauvegardez le fichier et fermez l'éditeur.</li>
<li>Démarrez le partage web personnel dans les préférences système. S'il est déjà activé, désactivez-le, puis réactivez-le.</li>
<li>Le moyen le plus simple de tout voir est de déplacer votre copie locale de la branche <code>xml </code> dans le sous-répertoire 
<code>Sites </code> de votre répertoire utilisateur. Vous pourrez alors ouvrir la page d'accueil dans votre navigateur à l'URL suivante :
<pre>http://127.0.0.1/~<b>NOMUTILISATEUR</b>/xml/web/index.php</pre>
où <code>NOMUTILISATEUR</code> doit être remplacé par votre nom d'utilisateur.</li>
</ol></li>
</ul>

<h2><a name="change-checkout">2.8 Après obtention de l'accès au commit (chefs d'équipe)</a></h2>

<p>Lorsque que vous aurez obtenu l'accès au commit, vous devrez :</p>
<ul>
<li>Créer une paire de clés SSH pour votre compte SourceForge.<ol>
<li>Créez-la sur votre machine en suivant les <a href="http://sourceforge.net/docman/display_doc.php?docid=761&amp;group_id=1#keygenopenssh">instructions</a>
données sur SourceForge.</li>
<li>Exécutez dans une fenêtre de terminal la commande suivante : 
<pre>cat ~/.ssh/id_dsa.pub | pbcopy</pre>
Cette commande copie directement le contenu du fichier dans le presse-papiers, de façon à éviter de générer des caractères de fin de ligne intempestifs. Ne copiez surtout rien d'autre dans le presse-papiers avant d'avoir terminé la procédure.</li>
<li>Connectez-vous à votre compte sur SourceForge.</li>
<li>Cliquez sur "Account Options"</li>
<li>Allez dans la zone "Host Access Information" et cliquez sur  "Edit
SSH Keys for Shell/CVS"</li>
<li>Cliquez dans le formulaire et exécutez Cmd-A, Cmd-V</li>
<li>Cliquez sur OK.</li>
</ol></li>
<li>Faire un check out de l'arborescence <code>xml</code> en utilisant votre nom d'utilisateur.<ol>
<li>Si vous avez déjà fait un check out de l'arborescence <code>xml</code> au départ, vous devez renommer votre copie locale. Vous pouvez utiliser le Finder pour ce faire.</li>
<li>Exécutez la commande suivante dans une fenêtre de terminal de façon à vous déplacer dans le répertoire où réside votre arbre : 
<pre>cd ~/Documents/Fink-i18n</pre></li>
<li>Faites un check out de l'arbre xml :
<pre>cvs -d:ext:votrenomutilisateur@fink.cvs.sourceforge.net:/cvsroot/fink co xml</pre>
où <b>votrenomutilisateur</b> est, bien entendu, votre nom d'utilisateur sur SourceForge. Saisissez la phrase d'authentification à l'invite.</li>
<li>Copiez dans la nouvelle arborescence les fichiers sur lesquels vous aviez travaillé antérieurement, et qui résident dans la copie que vous venez de faire. Vous pouvez utiliser le Finder pour cela, faites cependant très attention de copier les fichiers exactement là où ils se trouvaient dans l'ancienne arborescence.</li>
</ol></li>
</ul>

<h2><a name="committing">2.9 Commit des modifications (chefs d'équipe)</a></h2>

<p>Maintenant, vous devez envoyer les modifications au serveur principal. Tout d'abord, vous devez vous assurer que vous avez effectivement accès au commit. Vous devez aussi vérifier que vous utilisez toujours la dernière version de XSLT dans l'arborescence instable de Fink, qui est, à l'heure où ce document est écrit, <code>libxslt-1.1.2-2</code>.</p>
<p>La procédure de commit est différente selon la nature - statique ou dynamique - des documents :</p>
<ul>
<li><b>Fichiers statiques : </b>(fichiers PHP seulement). Pour faire un commit de ces documents, exécutez les étapes suivantes :<ol>
<li>Ouvrez une fenêtre de terminal.</li>
<li>Déplacez-vous dans le répertoire qui contient le fichier sur lequel vous voulez faire un check in, par exemple :
<pre>cd ~/Documents/Fink-i18n/xml/web</pre>
<p>si vous avez créé votre arborescence <code>xml</code> dans le sous-répertoire 
<code>Documents/Fink-i18n/</code> de votre répertoire utilisateur et que vous voulez faire un commit d'un fichier PHP résidant dans le répertoire xml/web.</p></li>
<li>Si le fichier est un fichier que vous venez de créer, vous devez l'ajouter à la liste des fichiers, par exemple :
<pre>cvs add download.ru.php</pre>
Saisissez votre phrase d'authentification à l'invite.<p>Si le fichier existe déjà, sautez cette étape.</p></li>
<li>Faites un commit du fichier, par exemple :
<pre>cvs ci -m "message" download.ru.php</pre>
où 
<b>message</b> indique ce que vous avez fait. Saisissez votre phrase d'authentification à l'invite.
<p>Note : vous pouvez faire un commit de plusieurs fichiers à la fois.</p></li>
</ol></li>
<li><b>Fichiers dynamiques : </b>(XML et PHP). Après avoir modifié le fichier XML, effectuez les opérations suivantes : <ol>
<li>Ouvrez une fenêtre de terminal</li>
<li>Déplacez-vous dans le répertoire qui contient le fichier que vous avez créé ou modifié, par exemple :
<pre>cd ~/Documents/Fink-i18n/xml/faq</pre>
si vous avez travaillé sur les QFP.</li>
<li>Lancez :
<pre>make check</pre>
pour vérifier que le fichier est valide.</li>
<li>Si le fichier XML est un fichier que vous venez de créer, vous devez l'ajouter à la liste des fichiers, par exemple :
<pre>cvs add faq.ru.xml</pre>
Saisissez votre phrase d'authentification SourceForge à l'invite.<p>Si le fichier existe déjà, sautez cette étape.</p></li>
<li>Faites un commit du fichier, par exemple :
<pre>cvs ci -m "message" faq.ru.xml</pre>
<p>où <b>message</b> décrit ce que vous avez fait. Saisissez votre phrase d'authentification SourceForge à l'invite. 
N'oubliez pas de faire aussi un commit du Makefile si vous l'avez modifié (c'est-à-dire si vous avez ajouté votre langue dans le fichier).</p></li>
<li>Ensuite, lancez :
<pre>make &amp;&amp; make install</pre></li>
<li>Si vous obtenez un messsage d'erreur vous indiquant qu'un répertoire <code>foo</code> n'existe pas dans l'arborescence <code>xml/scripts/installer/dmg</code>, déplacez-vous y avec la commande suivante : <pre>cd ../scripts/installer/dmg</pre> et créez le répertoire manquant avec : <pre>mkdir -p foo</pre> Puis retournez dans le précédent répertoire et réexécutez : <pre>make &amp;&amp; make install</pre></li>
<li>Déplacez-vous à la racine de l'arborescence xml de Fink, par exemple :  
<pre>cd ~/Documents/Fink-i18n/xml</pre>
<p>si vous avez créé votre arborescence 
<code>xml</code> dans le sous-répertoire 
<code>Documents/Fink-i18n/</code> de votre répertoire utilisateur.</p></li>
<li>Si le fichier XML est un fichier que vous venez de créer, il vous faut ajouter d'autres fichiers à la liste des fichiers gérés par CVS. Par exemple, si vous avez travaillé sur les QFP, vous devez exécuter :
<pre>cvs add web/faq/index.en.php web/faq/general.ru.php \ 
web/faq/relations.ru.php web/faq/usage-fink.ru.php \ 
web/comp-general.ru.php web/faq/comp-packages.ru.php \ 
web/faq/usage-general.ru.php web/faq/usage-packages.ru.php \ 
web/faq/upgrade-fink.ru.php web/faq/mirrors.ru.php \ 
web/faq/faq.ru.html web/faq/header.ru.inc \ 
scripts/installer/dmg/faq.ru.html</pre>
Pour les autres documents, les fichiers à ajouter ne sont, bien entendu, pas les mêmes - utilisez les noms des fichiers créés lorsque vous avez exécuté <code>make
install</code>.</li>
 <li>N'oubliez pas d'ajouter et de faire un commit de tout fichier que vous avez créé (que ce soit constants.xx.inc, header.xx.inc, nav.xx.inc, etc...)
<p>Si le fichier existe déjà, sautez cette étape.</p></li>
<li>Faites un commit de l'ensemble de l'arborescence :
<pre>cvs ci -m "message"</pre>
<p>où <b>message</b> est une description que ce que vous avez fait (vous pouvez utiliser le même que celui que vous avez utilisé pour faire un commit du fichier XML). Saisissez votre phrase d'authentification à l'invite.</p><p>La raison pour laquelle vous devez exécuter deux commits dans ce cas, est que c'est la seule façon de faire pour que la date de création et le nom de la personne qui a modifié les fichiers en dernier ressort soient corrects.</p></li>
</ol></li>
</ul>

<h2><a name="website">2.10 Mise à jour de notre site web</a></h2>

<p>Si vous avez envie de voir tout de suite le fruit de votre travail, exécutez les étape suivantes :</p>
<ol>
<li>Ouvrez une fenêtre de terminal</li>
<li>Connectez-vous au serveur web via ssh : 
<pre>ssh nomutilisateur@shell.sourceforge.net</pre>
Saisissez votre phrase d'authentification SourceForge.</li>
<li>Déplacez-vous dans le répertoire qui contient nos pages web :
<pre>cd /home/groups/f/fi/fink/htdocs</pre></li>
<li>Mettez à jour le site web à partir de CVS :
<pre>./update.sh</pre></li>
<li>Déconnectez-vous du serveur web : 
<pre>exit</pre></li>
<li>Admirez votre travail : 
<pre>open /</pre></li>
</ol>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="procedure.php?phpLang=fr">3. Procédure de mise à jour des documents</a></p>
<?php include_once "../../footer.inc"; ?>


