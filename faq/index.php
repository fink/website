<?
$title = "F.A.Q.";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/17 06:51:21 $';

$metatags = '<link rel="start" href="index.php" title="FAQ Contents">
<link rel="next" href="general.php" title="General questions">
';

include "header.inc";
?>


<h1>The Fink F.A.Q.</h1>

<p>This is the list of frequently asked questions about Fink. Like in
most FAQs, some questions are taken from real life and some are made
up. It's really more like a documentation written in an ad-hoc,
question and answer style.</p>

<p>The FAQ consists of several pages, one for each section. All
questions are listed and linked in the table of contents below.</p>

<h2>Contents</h2>

<ul>
<li><a href="general.php"><b>General questions</b></a></li>
<ul>
<li><a href="general.php#what">What is Fink?</a></li>
<li><a href="general.php#naming">What does the name Fink stand
for?</a></li>
<li><a href="general.php#proxy">I'm behind a firewall. How do I
configure Fink to use an HTTP proxy?</a></li>
</ul>
<li><a href="install.php"><b>Installation</b></a></li>
<ul>
<li><a href="install.php#stow-not-found">Installing Fink fails with a "stow not
found" message.</a></li>
<li><a href="install.php#bzip2">I tried to install Fink 0.2.0, but it
failed to login to cygnus (?) to get bzip. (login denied). Is there an
error in the login script?</a></li>
</ul>
<li><a href="usage.php"><b>Usage</b></a></li>
<ul>
<li><a href="usage.php#what-packages">How can I find out what packages
Fink supports?</a></li>
<li><a href="usage.php#unstable">There's this package in unstable that
I want to install, but Fink just says 'no package found'. How can I
install it?</a></li>
</ul>
<li><a href="packages.php"><b>Problems with certain packages</b></a></li>
<ul>
<li><a href="packages.php#icewm">IceWM won't compile.</a></li>
<li><a href="packages.php#gnomecore">The gnome-core package won't
compile. It complains about multiple definitions of _login_tty. What's
wrong?</a></li>
<li><a href="packages.php#qt">Qt won't compile.</a></li>
<li><a href="packages.php#nedit">nedit is broken.</a></li>
</ul>
</ul>


<?
include "footer.inc";
?>
