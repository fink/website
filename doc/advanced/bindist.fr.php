<?
$title = "Notions complexes - Serveur de distribution binaire";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2005/03/02 06:32:51';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Notions complexes Contents"><link rel="prev" href="index.php?phpLang=fr" title="Notions complexes Contents">';


include_once "header.fr.inc";
?>
<h1>Notions complexes - 1. Mise en place d'un serveur de distribution binaire</h1>


<h2><a name="intro">1.1 Introduction</a></h2>

<p>Cette section décrit une méthode d'utilisation d'un serveur central de compilation ( serveur "maître") pour distribuer des paquets binaires à tous les clients des stations de travail. Elle s'applique aux stations de travail utilisant plusieurs installations de Fink.</p>
<p><b>Note :</b> dans les instructions suivantes, on a supposé que toutes les machines clientes ont une version de fink supérieure ou égale à la version 0.24.0. Voir plus loin la section <a href="#remarks">remarques</a> si les machines ont une version de fink antérieure.</p>
<p>La méthode se compose des étapes suivantes sur le <a href="#master">serveur "maître"</a> et sur les <a href="#client">machines clientes</a> :</p>

<h2><a name="master">1.2 Étapes sur le serveur "maître" (serveur de compilation) </a></h2>

<ol>
<li>Installez Fink dans le répertoire <code>/sw</code> (chemin par défaut, utilisez un lien symbolique si nécessaire).</li>
<li>Construisez les paquets comme d'habitude. Il n'est pas nécessaire de les installer.</li>
<li><p>Exécutez <code>fink scanpackages</code> chaque fois que le jeu de paquets construits change. Fink génèrera alors des indexs apt pour tous les arbres activés.</p>
<p>Au lieu de la commande précédente, vous pouvez exécuter <code>fink cleanup</code>. Les paquets sources et binaires obsolètes seront alors supprimés. La commande <code>scanpackages</code> est appelée automatiquement à la fin du processus de nettoyage.</p></li>
<li>Démarrez un serveur web : vous pouvez, par exemple, activer "Partage Web personnel" dans la section Partage des Préférences Système, puis configurer <code>httpd</code> de telle sorte qu'il serve le répertoire <code>/sw/fink</code> en ajoutant les lignes suivantes au fichier <code>/etc/httpd/httpd.conf</code> :
<pre>
Alias /fink /sw/fink
&lt;Directory /sw/fink&gt;
  Options Indexes FollowSymLinks
&lt;/Directory&gt;
</pre></li>
<li>Exécutez <code>sudo /usr/sbin/apachectl graceful</code> pour (re)démarrer votre serveur web.</li>
</ol>
<p>N'oubliez pas de réexécuter <code>fink scanpackages</code> (ou <code>fink cleanup</code>) chaque fois que vous construisez ou mettez à jour des paquets sur le serveur "maître", de façon à ce qu'ils soient disponibles sur les machines éloignées.</p>
<p><b>Notes</b> :</p>
<p>Vous pouvez aussi créer un utilisateur "fink" et ajouter les lignes ci-dessus au fichier <code>/etc/httpd/users/fink.conf</code>.</p>
<p>Si vous utilisez le paquet apache2 de Fink, vous devrez modifier les chemins ci-dessus.</p>

<h2><a name="client">1.3 Étapes sur les machines clientes</a></h2>

<ol>
<li>Installez Fink sur <code>/sw</code> (chemin de base par défaut).</li>
<li>Exécutez <code>fink configure</code> et activez l'option de téléchargement des paquets à partir de la distribution binaire : "UseBinaryDist: true" dans le fichier <code>/sw/etc/fink.conf</code>.</li>
<li>Ouvrez le fichier <code>/sw/etc/apt/sources.list</code> et ajoutez-y les lignes correspondant à vos arbres Fink. Par exemple, si l'adresse IP de votre machine de compilation est 192.168.42.7, vous devez ajouter les lignes suivantes :
<pre>
deb http://192.168.42.7/fink stable main crypto
deb http://192.168.42.7/fink unstable main crypto
deb http://192.168.42.7/fink local main
</pre></li>
<li>Exécutez <code>fink selfupdate</code>. Vous devriez voir apparaître les lignes suivantes :
<pre>
...
Hit http://192.168.42.7 stable/main Packages
Hit http://192.168.42.7 stable/main Release
Hit http://192.168.42.7 stable/crypto Packages
...
</pre>
à la fin du processus de mise à jour, si le niveau de verbosité est supérieur ou égal à 1.</li>
</ol>
<p>L'exécution de <code>fink update-all</code> ou de <code>fink install &lt;paquet&gt;</code> téléchargera alors les paquets en tant que paquets binaires s'ils sont disponibles sur le serveur "maître".</p>

<h2><a name="remarks">1.4 Remarques</a></h2>

<ul>
<li>Le serveur "maître" doit utiliser une version de X11 identique à la plus ancienne version installée sur l'ensemble des clients. Par exemple, si l'une des machines clientes utilise X11 d'Apple, le serveur "maître" doit l'utiliser lui aussi.</li>
<li>Vous pouvez supprimer les paquets qui ne sont que des dépendances de compilation (c'est-à-dire qui ne sont pas nécessaires à l'exécution d'autres paquets). Le paquet <code>debfoster</code> permet de le faire facilement. Faîtes toutefois attention à ne pas supprimer de paquets essentiels, tel <code>apt</code>.</li>
<li>Si vous utilisez une version de fink inférieure à la version 0.24.0 sur une machine client, vous devez exécuter <code>sudo apt-get update</code> au lieu de <code>fink selfupdate</code>. Vous devez alors installer les paquets binaires via <code>sudo apt-get install &lt;paquet&gt;</code>. </li>
</ul>
<p>Ce document est adapté pour part de <a href="http://ranger.befunk.com/blog/archives/000258.html">"Sharing the Fink"</a> par RangerRick. Merci !</p>


<? include_once "../../footer.inc"; ?>


