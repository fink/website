<?
$title = "i18n - Fichiers";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="i18n Contents"><link rel="next" href="procedure.php?phpLang=fr" title="Procedure for Updating Documents"><link rel="prev" href="intro.php?phpLang=fr" title="Introduction">';

include_once "header.inc";
?>

<h1>i18n - 2 Fichiers de documentation</h1>
    

    

    
      <p>Le but de ce chapitre est de vous expliquer quels sont les fichiers de documentation de Fink, comment y accéder et comment envoyer et activer les modifications que vous y faites sur le site web de Fink.</p>
    

    <h2><a name="requirements">2.1 Conditions requises</a></h2>
      

      <p>Pour travailler sur les fichiers de documentation en tant que membre d'une équipe de traduction, il vous faut :</p>

      <ul>
        <li>Un client CVS qui vous permette de télécharger la documentation à partir de la branche xml de Fink.</li>

        <li>Un éditeur de texte qui gère l'encodage UTF-8 ; éventuellement un éditeur XML, car de nombreux fichiers du site web de Fink sont générés à partir de fichiers XML.</li>

        <li>Faire un checkout de l'arbre xml de Fink, comme expliqué dans les <a href="#acquiring">instructions</a> ci-dessous.</li>

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
        </b>Connectez-vous anonymement à cvs.sourceforge.net : <ol>
            <li><pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login</pre></li>

            <li>Appuyez sur la touche retour chariot (pas de mot de passe, anonyme par défaut)</li>

            <li>Faites un check out du module xml : 
            <pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co xml</pre></li>
          </ol><b>Chefs d'équipe : </b>faites un check out en utilisant votre nom d'utilisateur :<ol>
            <li>Vous n'avez pas à vous connecter, exécutez directement :
            <pre>cvs -d:ext:votrenomutilisateur@cvs.sourceforge.net:/cvsroot/fink co xml</pre>
            où <b>votrenomutilisateur</b> est, bien sûr, votre nom d'utilisateur sur SourceForge. Il se peut que vous ayez un message vous disant que la clé DSA du serveur est inconnue. Répondez "yes" à ce message. </li>

            <li>Dans ce cas, vous devez saisir votre phrase d'identification SourceForge à l'invite.</li>
          </ol></li>
      </ol>
    

    <h2><a name="file-standards">2.4 Types de fichiers</a></h2>
      

      <p>En tant que traducteur, vous devrez distinguer deux types de fichiers :</p>

      <ol>
        <li><b>Fichiers statiques (fichiers PHP seuls)</b> <p>Ce sont des documents dont l'organisation (c'est-à-dire la numérotation des articles) a peu de chances de varier d'un jour sur l'autre. Dans ce cas, le document est représenté par un fichier PHP, que vous devez traduire.</p></li>

        <li><b>Fichiers dynamiques (fichiers XML générant des fichiers PHP et HTML)</b> <p>Ces documents (par exemple les QFP) sont mis à jour et restructurés plus souvent, il faut donc pouvoir les réorganiser dynamiquement. Ils ont pour base un fichier XML à partir duquel sont créés des fichiers PHP et HTML au moyen d'un script. En tant que traducteur, vous devez traduire le fichier XML.</p></li>
      </ol>
    

    <h2><a name="updating">2.5 Récupération de la révision la plus récente</a></h2>
      

      <p>Comme d'autres traducteurs vont changer certains fichiers (ne paniquez pas, CVS gère très bien les changements),  il vous est conseillé de mettre à jour fréquemment votre copie de travail après le premier check out. Pour mettre à jour, suivez les étapes suivantes :</p>

      <ol>
         <li>Déplacez-vous dans le répertoire qui contient les fichiers récupérés, par exemple :
        <pre>cd ~/Documents/Fink-i18n/xml</pre></li>

        <li>Mettez-les à jour :
        <pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink update -dP</pre>
        pour les membres d'équipe sans accès commit, ou 
        <pre>cvs update -dP</pre>
        pour les chefs d'équipe.</li>
      </ol>

      <p>Vous verrez peut-être une lettre devant un ou plusieurs noms de fichiers lors de la mise à jour.  Consultez l'<a href="appendix.php?phpLang=fr">Annexe</a> pour de plus amples informations, ainsi que la man page cvs.</p>
    

    <h2><a name="initial-translation">2.6 Traduction initiale</a></h2>
      

      <p>Voici les fichiers à traduire, classés par ordre de priorité :</p>

      <p>Noms (des fichiers de la version anglaise)</p>

      <ol>
        <li>Fichiers de constantes (<code>xml/web/constants.*.inc</code>) (voir ci-dessous)</li>

        <li>Fichiers statiques PHP (<code>xml/web/*.en.php</code>)</li>

        <li>Guide utilisateur (<code>xml/uguide.en.xml</code>)</li>

        <li>QFP (<code>xml/faq.en.xml</code>)</li>

        <li>Utilisation de X11 (<code>xml/x11/x11.en.xml</code>)</li>

        <li>Index de la documentation (<code>xml/doc/doc.en.xml</code></li>

        <li>Construction de paquets (<code>xml/packaging/packaging.en.xml</code>)</li>

        <li>Portage (<code>xml/porting/porting.en.xml</code>)</li>

        <li>Dernières nouvelles (<code>xml/news/news.xml</code>)</li>
      </ol>

      <p>Les fichiers <code>constants.*.inc</code> servent à traduire des mots inclus tels quels dans les fichiers PHP. La plupart correspondent à des articles de menu, situés en haut et à gauche des pages. Il vous faut les isoler des scripts  et créer un fichier constants.xx.inc pour votre langue. Pour ce faire, exécutez la commande suivante dans une fenêtre de terminal :</p>
      <pre>cp constants.de.inc constants.xx.inc</pre>
      <p>où xx est votre code langue (par exemple fr pour le français).
      Ensuite, il vous faudra traduire la partie située entre guillemets simple de chaque ligne commençant par define. Si vous ne comprenez l'allemand, voici la traduction en anglais :</p>

      <pre>
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
      
/* Contents as Table of Contents. Used in FAQ/Documentation Sections */ 
define (FINK_CONTENTS, 'Contents');</pre>

      <p>Quand vous traduisez, vous devez suivre les étapes suivantes (disons que vous traduisez en français le document Running X11) :</p>

      <ol>
        <li>Copier le fichier xml
        <pre>cp x11.en.xml x11.fr.xml</pre></li>

        <li>Modifiez les premières lignes pour indiquer que le texte du fichier est écrit en français et que l'encodage est UTF-8 :
        <pre>&lt;?xml version='1.0' encoding='utf-8' ?&gt; ...
&lt;document filename="index" lang="fr" &gt; ...</pre></li>

        <li>Sauvegardez le fichier avec encodage UTF-8. Assurez-vous que l'encodage du texte est bien utf-8 et  ne modifiez que la partie texte dans le fichier.</li>

        <li>Quand vous aurez fini la traduction, ou quand vous voulez la tester, modifiez le fichier 
        <code>Makefile</code> pour ajouter votre langue :
        <pre>LANGUAGES = en ja fr include $(basedir)/Makefile.i18n.common</pre> 
<p>Puis exécutez <code>make</code> dans le répertoire. Cela créera les fichiers PHP (et éventuellement d'autres fichiers), ainsi que tous les fichiers correspondant aux langues présentes dans le Makefile.</p></li>
      </ol>

      <p>Note : si vous constatez des fautes d'orthographe ou des erreurs dans le fichier anglais, ne le modifiez pas de vous-même, mais signalez-les à la <a href="http://fink.sourceforge.net/lists/fink-i18n.php">liste de diffusion fink-i18n
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

            <li>Le moyen le plus simple de tout voir est déplacer votre copie locale de la branche <code>xml </code> dans le sous-répertoire 
            <code>Sites </code> de votre répertoire utilisateur. Vous pourrez alors ouvrir la page d'accueil dans votre navigateur à l'URL suivante :
            <pre>http://127.0.0.1/~<b>NOMUTILISATEUR</b>/xml/web/index.php</pre>
            où <code>NOMUTILISATEUR</code> doit être remplacé par votre nom d'utilisateur.</li>
          </ol></li>
      </ul>
    

    <h2><a name="change-checkout">2.8 When You Get Commit Access (Team Leaders)</a></h2>
      

      <p>Once you have been given commit access, you should</p>

      <ul>
        <li>Set up an SSH key for your SourceForge account.<ol>
            <li>Set the key up on your machine following the <a href="http://sourceforge.net/docman/display_doc.php?docid=761&amp;group_id=1#keygenopenssh">instructions</a>
            from SourceForge.</li>

            <li>Type in the terminal: 
            <pre>cat ~/.ssh/id_dsa.pub | pbcopy</pre>
            This will copy the contents of the file directly
            to your pasteboard, to avoid spurious linebreaks. Make sure not to
            copy anything else to the pasteboard until you're done.</li>

            <li>Log in to your account on SourceForge.</li>

            <li>Select "Account Options"</li>

            <li>Go to the "Host Access Information" area, and click on "Edit
            SSH Keys for Shell/CVS"</li>

            <li>Click on the form and use Cmd-A, Cmd-V</li>

            <li>Click the button.</li>
          </ol></li>

        <li>Check out the <code>xml </code>tree using your username.<ol>
            <li>If you checked out the whole <code>xml </code>tree
            initially, then you should rename your local copy. You can use the
            Finder for this.</li>

            <li>Move to that directory in a terminal window: 
            <pre>cd ~/Documents/Fink-i18n</pre></li>

            <li>Do the checkout of the xml tree:
            <pre>cvs -d:ext:yourusername@cvs.sourceforge.net:/cvsroot/fink co xml</pre>
            where <b>yourusername</b> is of course your
            SourceForge username. Enter your passphrase where prompted.</li>

            <li>Copy the files that you were working on from your old tree to
            the new one. Feel free to use the Finder, making sure that they go
            in the same subfolder as they were initially.</li>
          </ol></li>
      </ul>
    

    <h2><a name="committing">2.9 Committing the Changes (Team Leaders)</a></h2>
      

      <p>Now you need to send your changes to the main server. To do this you
      need to make sure that you have commit access. You also should make sure
      that you are always using the latest version of XSLT in unstable tree, which is 
      <code>libxslt-1.1.2-2</code> from Fink as the time of writing this document.</p>

      <p>The procedure is different accourding to the nature - static or dynamic - of the documents:</p>

      <ul>
        <li><b>Static: </b>(PHP files only) To commit these documents do the
        following: <ol>
            <li>Open a terminal.</li>

            <li>Move to the directory that contains the file you want to check
            in, e.g: 
            <pre>cd ~/Documents/Fink-i18n/xml/web</pre>
            <p>if you created your <code>xml</code> tree under
            <code>Documents/Fink-i18n/</code> in your home folder, and
            you want to commit a PHP file from the xml/web directory.</p></li>

            <li>If the file is a new one that you've created, then you need to
            add it to the list of files, e,g.:
            <pre>cvs add download.ru.php</pre>
            Give your SourceForge passphrase at the
            prompt.<p>If the file already
            exists, you can skip to the next step.</p></li>

            <li>Commit the file, e.g. in the prior example:
            <pre>cvs ci -m "message" download.ru.php</pre>
            where once again
            <b>message </b>should indicate what you've done. Give your
            SourceForge passphrase at the prompt. Don't forget to also commit the Makefile if you've changed it (i.e. you've added your langague in it)
            <p>Note: you can commit multiple files at once.</p></li>
            </ol></li>

        <li><b>Dynamic: </b>(XML and PHP) After you've modified the XML
        file, do the following:<ol>
            <li>Open a terminal</li>

            <li>Move to the directory that contains the file you've added or
            modified, e.g.
            <pre>cd ~/Documents/Fink-i18n/xml/faq</pre>
            if you've been working on
            the FAQ.</li>

            <li>Now run
            <pre>make check</pre>
            To ensure that the
            file is valid.</li>

            <li>If the XML file is a new one that you've created, then you
            need to add it to the list of files, e,g.:
            <pre>cvs add faq.ru.xml</pre>
            You'll need to give your SourceForge
            passphrase.<p>If the file already exists, you can
            skip to the next step.</p></li>

            <li>Commit the file, e.g.:
            <pre>cvs ci -m "message" faq.ru.xml</pre>
            <p> where <b>message</b> is a descriptive
            message about what you've done. Enter your SourceForge passphrase at
            the prompt.</p></li>

            <li>Now run
            <pre>make &amp;&amp; make install</pre></li>

            <li>Move into your copy of the Fink xml tree, e.g: 
            <pre>cd ~/Documents/Fink-i18n/xml</pre>
            <p>if you created your
            <code>xml</code> tree under
            <code>Documents/Fink-i18n/</code> in your home
            folder.</p></li>

            <li>If the XML file was new, you'll need to do some more CVS
            adding. For example, if you have been working on the FAQ, then,
            you'll want to run (e.g.):
<pre>cvs add web/faq/index.en.php web/faq/general.ru.php \ 
web/faq/relations.ru.php web/faq/usage-fink.ru.php \ 
web/comp-general.ru.php web/faq/comp-packages.ru.php \ 
web/faq/usage-general.ru.php web/faq/usage-packages.ru.php \ 
web/faq/upgrade-fink.ru.php web/faq/mirrors.ru.php \ 
web/faq/faq.ru.html web/faq/header.ru.inc \ 
scripts/installer/dmg/faq.ru.html</pre>
For other
            documents, the files will of course be different--use whatever
            gets created for your language when you run <code>make
            install</code>.</li>

         <li>Don't forget to add and commit any file you've created (be it constants.xx.inc, header.xx.inc, nav.xx.inc, etc.)
          <p>If the file already exists, you can
            skip to the next step.</p></li>

            <li>Commit the whole tree:
            <pre>cvs ci -m "message"</pre>
            <p>Where once again <b>message</b> is a
            descriptive log message (you may want to use the same one as when
            you committed the XML file). Enter your SourceForge passphrase at
            the prompt.</p><p>The reason that you have to do two
            commits in this case is that it's required to ensure that the
            files show the correct creation time and person who last modified
            them.</p></li>
          </ol></li>
      </ul>
    

    <h2><a name="website">2.10 Update our website</a></h2>
      

      <p>Want to see your efforts from our website right now? Just do the
      following:</p>

      <ol>
        <li>Open a terminal</li>

        <li>log in web server via ssh: 
        <pre>ssh username@shell.sourceforge.net</pre>
        You'll need to give your
        SourceForge passphrase.</li>

        <li>Move to the directory which contains our web pages: 
        <pre>cd /home/groups/f/fi/fink/htdocs</pre></li>

        <li>update the website from CVS:
        <pre>./update.sh</pre></li>

        <li>log out from web server: 
        <pre>exit</pre></li>

        <li>See your efforts: 
        <pre>open http://fink.sourceforge.net/</pre></li>
      </ol>
    
  <p align="right">
Next: <a href="procedure.php?phpLang=fr">3 Procedure for Updating Documents</a></p>

<? include_once "footer.inc"; ?>
