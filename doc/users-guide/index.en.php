<?php
$title = "User's Guide";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="User\'s Guide Contents"><link rel="next" href="intro.php?phpLang=en" title="Introduction">';


include_once "header.en.inc";
?>
<h1>Fink User's Guide</h1>
    <p>
This document gives an overview over all features of Fink.
(The following older documents may offer a broader view:
<a href="/doc/install/index.php">Installation</a>,
<a href="/doc/usage/index.php">Usage</a>
and the ReadMe.rtf included in the binary distribution disk image.)
Also check out the
<a href="/doc/">documentation
section</a> of the web site, it has some other useful documents
beyond that.
</p>
    <p>
Welcome to the Fink User's Guide.
This guide covers first time installation and upgrade procedures for
both the source and the binary distribution.
Package installation and maintenance is covered as well.
</p>
  <h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="intro.php?phpLang=en"><b>1 Introduction</b></a><ul><li><a href="intro.php?phpLang=en#what">1.1 What is Fink?</a></li><li><a href="intro.php?phpLang=en#req">1.2 Requirements</a></li><li><a href="intro.php?phpLang=en#supported-os">1.3 Supported Systems</a></li><li><a href="intro.php?phpLang=en#src-vs-bin">1.4 Source vs. Binary</a></li></ul></li><li><a href="install.php?phpLang=en"><b>2 First Time Installation</b></a><ul><li><a href="install.php?phpLang=en#bin">2.1 Installing the Binary Distribution</a></li><li><a href="install.php?phpLang=en#src">2.2 Installing the Source Distribution</a></li><li><a href="install.php?phpLang=en#setup">2.3 Setting Up Your Environment</a></li></ul></li><li><a href="packages.php?phpLang=en"><b>3 Installing Packages</b></a><ul><li><a href="packages.php?phpLang=en#bin-dselect">3.1 Installing Binary Packages with
dselect</a></li><li><a href="packages.php?phpLang=en#bin-apt">3.2 Installing Binary Packages with
apt-get</a></li><li><a href="packages.php?phpLang=en#bin-exceptions">3.3 Installing Dependent Packages that are Unavailable in the Binary Distribution</a></li><li><a href="packages.php?phpLang=en#src">3.4 Installing Binary and Source Packages with fink</a></li><li><a href="packages.php?phpLang=en#fink-commander">3.5 Fink Commander</a></li><li><a href="packages.php?phpLang=en#available-versions">3.6 Available versions</a></li><li><a href="packages.php?phpLang=en#x11">3.7 Getting X11 Sorted Out</a></li></ul></li><li><a href="upgrade.php?phpLang=en"><b>4 Upgrading Fink</b></a><ul><li><a href="upgrade.php?phpLang=en#bin">4.1 Upgrading using Binary Packages</a></li><li><a href="upgrade.php?phpLang=en#src">4.2 Upgrading the Source Distribution</a></li><li><a href="upgrade.php?phpLang=en#mix">4.3 Mixing Binaries and Source</a></li></ul></li><li><a href="conf.php?phpLang=en"><b>5 The Fink Configuration File</b></a><ul><li><a href="conf.php?phpLang=en#about">5.1 About fink.conf</a></li><li><a href="conf.php?phpLang=en#syntax">5.2 fink.conf syntax</a></li><li><a href="conf.php?phpLang=en#required">5.3 Required Settings</a></li><li><a href="conf.php?phpLang=en#optional">5.4 Optional User Settings</a></li><li><a href="conf.php?phpLang=en#downloading">5.5 Download Settings</a></li><li><a href="conf.php?phpLang=en#mirrors">5.6 Mirror Settings</a></li><li><a href="conf.php?phpLang=en#developer">5.7 Developer Settings</a></li><li><a href="conf.php?phpLang=en#advanced">5.8 Advanced Settings</a></li><li><a href="conf.php?phpLang=en#sourceslist">5.9 Managing apt's sources.list file</a></li></ul></li><li><a href="usage.php?phpLang=en"><b>6 Using the fink Tool from the Command Line</b></a><ul><li><a href="usage.php?phpLang=en#using">6.1 Using the fink tool</a></li><li><a href="usage.php?phpLang=en#options">6.2 Global options</a></li><li><a href="usage.php?phpLang=en#install">6.3 install</a></li><li><a href="usage.php?phpLang=en#remove">6.4 remove</a></li><li><a href="usage.php?phpLang=en#purge">6.5 purge</a></li><li><a href="usage.php?phpLang=en#update-all">6.6 update-all</a></li><li><a href="usage.php?phpLang=en#list">6.7 list</a></li><li><a href="usage.php?phpLang=en#apropos">6.8 apropos</a></li><li><a href="usage.php?phpLang=en#describe">6.9 describe</a></li><li><a href="usage.php?phpLang=en#plugins">6.10 plugins</a></li><li><a href="usage.php?phpLang=en#fetch">6.11 fetch</a></li><li><a href="usage.php?phpLang=en#fetch-all">6.12 fetch-all</a></li><li><a href="usage.php?phpLang=en#fetch-missing">6.13 fetch-missing</a></li><li><a href="usage.php?phpLang=en#build">6.14 build</a></li><li><a href="usage.php?phpLang=en#rebuild">6.15 rebuild</a></li><li><a href="usage.php?phpLang=en#reinstall">6.16 reinstall</a></li><li><a href="usage.php?phpLang=en#configure">6.17 configure</a></li><li><a href="usage.php?phpLang=en#selfupdate">6.18 selfupdate</a></li><li><a href="usage.php?phpLang=en#selfupdate-rsync">6.19 selfupdate-rsync</a></li><li><a href="usage.php?phpLang=en#selfupdate-git">6.20 selfupdate-git</a></li><li><a href="usage.php?phpLang=en#index">6.21 index</a></li><li><a href="usage.php?phpLang=en#validate">6.22 validate</a></li><li><a href="usage.php?phpLang=en#scanpackages">6.23 scanpackages</a></li><li><a href="usage.php?phpLang=en#cleanup">6.24 cleanup</a></li><li><a href="usage.php?phpLang=en#dumpinfo">6.25 dumpinfo</a></li><li><a href="usage.php?phpLang=en#show-deps">6.26 show-deps</a></li></ul></li></ul>
<!--Generated from $Fink: uguide.en.xml,v 1.57 2019/01/19 10:11:12 nieder Exp $-->
<?php include_once "../../footer.inc"; ?>


