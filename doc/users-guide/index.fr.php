<?
$title = "Guide utilisateur";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/29 06:31:25';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Guide utilisateur Contents"><link rel="next" href="intro.php?phpLang=fr" title="Introduction">';


include_once "header.fr.inc";
?>
<h1>Guide de l'utilisateur Fink</h1>
<p>
<b>Ce document est en cours d'élaboration.</b>
Les documents suivants, bien que plus anciens, sont plus complets :
<a href="http://fink.sourceforge.net/doc/bundled/install.php">Installation</a>,
<a href="http://fink.sourceforge.net/doc/bundled/usage.php">Utilisation</a>
et le fichier ReadMe.rtf inclus dans l'image disque de la distribution binaire.
Voir aussi la 
<a href="http://fink.sourceforge.net/doc/">section documentation</a> du site web, qui contient d'autres documents utiles.
</p>
<p>
Bienvenue dans le Guide de l'Utilisateur Fink. 
Ce guide couvre les procédures de première installation et de mise à jour des distributions source et binaire, ainsi que l'installation de paquets et la maintenance.
</p>
  <h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=fr"><b>1 Introduction</b></a><ul><li><a href="intro.php?phpLang=fr#what">1.1 Qu'est-ce que Fink ?</a></li><li><a href="intro.php?phpLang=fr#req">1.2 Configuration requise</a></li><li><a href="intro.php?phpLang=fr#supported-os">1.3 Systèmes supportés</a></li><li><a href="intro.php?phpLang=fr#src-vs-bin">1.4 Source ou binaire</a></li></ul></li><li><a href="install.php?phpLang=fr"><b>2 Première installation</b></a><ul><li><a href="install.php?phpLang=fr#bin">2.1 Installation de la distribution binaire</a></li><li><a href="install.php?phpLang=fr#src">2.2 Installation de la distribution source</a></li><li><a href="install.php?phpLang=fr#setup">2.3 Définition de votre environnement</a></li></ul></li><li><a href="packages.php?phpLang=fr"><b>3 Installation de paquets</b></a><ul><li><a href="packages.php?phpLang=fr#bin-dselect">3.1 Installation de paquets binaires avec dselect</a></li><li><a href="packages.php?phpLang=fr#bin-apt">3.2 Installation de paquets binaires avec
apt-get</a></li><li><a href="packages.php?phpLang=fr#bin-exceptions">3.3 Installation de paquets dépendants non disponibles dans la distribution binaire</a></li><li><a href="packages.php?phpLang=fr#src">3.4 Installation de paquets à partir du source</a></li><li><a href="packages.php?phpLang=fr#fink-commander">3.5 Fink Commander</a></li><li><a href="packages.php?phpLang=fr#">3.6 Versions disponibles</a></li><li><a href="packages.php?phpLang=fr#x11">3.7 Implémentation de X11</a></li></ul></li><li><a href="upgrade.php?phpLang=fr"><b>4 Mise à niveau de Fink</b></a><ul><li><a href="upgrade.php?phpLang=fr#bin">4.1 Mise à niveau à partir de paquets binaires</a></li><li><a href="upgrade.php?phpLang=fr#src">4.2 Mise à niveau de la distribution source</a></li><li><a href="upgrade.php?phpLang=fr#mix">4.3 Mélange de binaires et de source</a></li></ul></li><li><a href="conf.php?phpLang=fr"><b>5 Fichier de Configuration de Fink</b></a><ul><li><a href="conf.php?phpLang=fr#about">5.1 À propos de fink.conf</a></li><li><a href="conf.php?phpLang=fr#syntax">5.2 Syntaxe de fink.conf</a></li><li><a href="conf.php?phpLang=fr#required">5.3 Éléments obligatoires</a></li><li><a href="conf.php?phpLang=fr#optional">5.4 Options utilisateur</a></li><li><a href="conf.php?phpLang=fr#downloading">5.5 Options de téléchargement</a></li><li><a href="conf.php?phpLang=fr#mirrors">5.6 Configuration des miroirs</a></li><li><a href="conf.php?phpLang=fr#developer">5.7 Configuration Développeur</a></li><li><a href="conf.php?phpLang=fr#advanced">5.8 Variables pour les utilisateurs avertis</a></li><li><a href="conf.php?phpLang=fr#sourceslist">5.9 Gestion du fichier sources.list d'apt</a></li></ul></li><li><a href="usage.php?phpLang=fr"><b>6 Utilisation de l'outil fink en ligne de commande</b></a><ul><li><a href="usage.php?phpLang=fr#using">6.1 Utilisation de l'outil fink</a></li><li><a href="usage.php?phpLang=fr#install">6.2 install - installation</a></li><li><a href="usage.php?phpLang=fr#remove">6.3 remove - suppression</a></li><li><a href="usage.php?phpLang=fr#update-all">6.4 update-all - tout mettre à jour</a></li><li><a href="usage.php?phpLang=fr#list">6.5 list - liste</a></li><li><a href="usage.php?phpLang=fr#apropos">6.6 apropos - à propos</a></li><li><a href="usage.php?phpLang=fr#describe">6.7 describe - description</a></li><li><a href="usage.php?phpLang=fr#fetch">6.8 fetch - téléchargement</a></li><li><a href="usage.php?phpLang=fr#fetch-all">6.9 fetch-all - tout télécharger</a></li><li><a href="usage.php?phpLang=fr#fetch-missing">6.10 fetch-missing - télécharger paquets manquants</a></li><li><a href="usage.php?phpLang=fr#build">6.11 build - compiler</a></li><li><a href="usage.php?phpLang=fr#rebuild">6.12 rebuild - recompiler</a></li><li><a href="usage.php?phpLang=fr#reinstall">6.13 reinstall - réinstaller</a></li><li><a href="usage.php?phpLang=fr#configure">6.14 configure - configurer</a></li><li><a href="usage.php?phpLang=fr#selfupdate">6.15 selfupdate - mise à jour automatique</a></li><li><a href="usage.php?phpLang=fr#index">6.16 index - indexer</a></li><li><a href="usage.php?phpLang=fr#validate">6.17 validate - valider</a></li><li><a href="usage.php?phpLang=fr#scanpackages">6.18 scanpackages - création de fichiers Packages</a></li><li><a href="usage.php?phpLang=fr#checksums">6.19 checksums - sommes de contrôle</a></li><li><a href="usage.php?phpLang=fr#cleanup">6.20 cleanup - épuration</a></li><li><a href="usage.php?phpLang=fr#dumpinfo">6.21 dumpinfo - analyse des fichiers info</a></li></ul></li></ul><!--Generated from $Fink: uguide.fr.xml,v 1.14 2004/07/29 06:31:25 michga Exp $-->
<? include_once "../../footer.inc"; ?>


