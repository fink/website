<?
$title = "Portage";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2005/08/08 02:59:00';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Portage Contents"><link rel="next" href="basics.php?phpLang=fr" title="Notions de base">';


include_once "header.fr.inc";
?>
<h1>Portage de logiciel sur Darwin et Mac OS X</h1>
<p>Ce document contient quelques conseils pour réaliser le portage d'applications Unix vers Darwin et Mac OS X. Ces informations s'appliquent aux systèmes d'exploitation Mac OS X versions 10.x.x et Darwin "pur". Nous ferons référence aux deux systèmes sous le nom de Darwin, puisque Mac OS X est, en fait, un sur-ensemble de Darwin.</p>
<h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="basics.php?phpLang=fr"><b>1 Notions de base</b></a><ul><li><a href="basics.php?phpLang=fr#heritage">1.1 D'où vient Darwin ?</a></li><li><a href="basics.php?phpLang=fr#compiler">1.2 Le compilateur et les outils</a></li><li><a href="basics.php?phpLang=fr#host-type">1.3 Le type de la machine hôte</a></li><li><a href="basics.php?phpLang=fr#librairies">1.4 Librairies</a></li><li><a href="basics.php?phpLang=fr#other-sources">1.5 Autres sources d'information</a></li></ul></li><li><a href="shared.php?phpLang=fr"><b>2 Code partagé</b></a><ul><li><a href="shared.php?phpLang=fr#lib-and-mod">2.1 Librairies partagées ou modules chargeables</a></li><li><a href="shared.php?phpLang=fr#version">2.2 Numérotation de version</a></li><li><a href="shared.php?phpLang=fr#cflags">2.3 Options de compilation</a></li><li><a href="shared.php?phpLang=fr#build-lib">2.4 Construction d'une librairie partagée</a></li><li><a href="shared.php?phpLang=fr#build-mod">2.5 Construction d'un module</a></li></ul></li><li><a href="libtool.php?phpLang=fr"><b>3 GNU libtool</b></a><ul><li><a href="libtool.php?phpLang=fr#situation">3.1 État des lieux</a></li><li><a href="libtool.php?phpLang=fr#patch-135">3.2 Rustine 1.3.5</a></li><li><a href="libtool.php?phpLang=fr#fixing-14x">3.3 Adaptation de la version 1.4.x</a></li><li><a href="libtool.php?phpLang=fr#notes">3.4 Notes supplémentaires</a></li></ul></li><li><a href="preparing-10.2.php?phpLang=fr"><b>4 Préparation pour la version 10.2</b></a><ul><li><a href="preparing-10.2.php?phpLang=fr#bash">4.1 Shell bash</a></li><li><a href="preparing-10.2.php?phpLang=fr#gcc3">4.2 Compilateur gcc3</a></li></ul></li><li><a href="preparing-10.3.php?phpLang=fr"><b>5 Préparation pour la version 10.3</b></a><ul><li><a href="preparing-10.3.php?phpLang=fr#perl">5.1 Perl</a></li><li><a href="preparing-10.3.php?phpLang=fr#typedef">5.2 Nouvelles définitions de symboles</a></li><li><a href="preparing-10.3.php?phpLang=fr#system-libs">5.3 Nouvelles librairies systèmes incorporées</a></li></ul></li><li><a href="preparing-10.4.php?phpLang=fr"><b>6 Préparation pour la version 10.4</b></a><ul><li><a href="preparing-10.4.php?phpLang=fr#perl">6.1 Perl</a></li></ul></li></ul>
<!--Generated from $Fink: porting.fr.xml,v 1.10 2005/08/08 02:59:00 dmacks Exp $-->
<? include_once "../../footer.inc"; ?>


