<?
$title = "F.A.Q.";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/10/28 07:57:01';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="next" href="general.php" title="General Questions">';

include "header.inc";
?>

<h1>The Fink F.A.Q.</h1>
<p>This is the list of frequently asked questions about Fink. Like
in most FAQs, some questions are taken from real life and some are
made up. It's really more like a documentation written in an ad-hoc,
question and answer style.</p>
<p>The FAQ consists of several pages, one for each section. All
questions are listed and linked in the table of contents below.</p>
<h2>Contents</h2><ul>
<li><a href="general.php"><b>General Questions</b></a></li>
<ul>
<li><a href="general.php#what">What is Fink?</a></li>
<li><a href="general.php#naming">What does the name Fink stand for?</a></li>
<li><a href="general.php#bsd-ports">How is Fink different
from the BSD port mechanism (this includes OpenPackages and
GNU-Darwin)?</a></li>
<li><a href="general.php#usr-local">Why doesn't Fink install into
/usr/local?</a></li>
<li><a href="general.php#why-sw">Then why did you choose
/sw?</a></li>
</ul>
<li><a href="relations.php"><b>Relations with Other Projects</b></a></li>
<ul>
<li><a href="relations.php#upstream">Do you contribute your patches
back to the upstream maintainers?</a></li>
<li><a href="relations.php#debian">What is your relation with the
Debian project? Are you porting Debian Linux to Mac OS X?</a></li>
<li><a href="relations.php#apple">What is your relation with
Apple?</a></li>
<li><a href="relations.php#openosx">What is your relation with
OpenOSX.com?</a></li>
<li><a href="relations.php#forked">What is your relation with
macosx.forked.net?</a></li>
</ul>
<li><a href="usage-fink.php"><b>Installing, Using and Maintaining Fink</b></a></li>
<ul>
<li><a href="usage-fink.php#what-packages">How can I find out what packages Fink supports?</a></li>
<li><a href="usage-fink.php#proxy">I'm behind a firewall. How do I
configure Fink to use an HTTP proxy?</a></li>
<li><a href="usage-fink.php#moving">Can I move Fink to another
location after installation?</a></li>
<li><a href="usage-fink.php#moving-symlink">If I move Fink after
installation and provide a symlink from the old location, will it
work?</a></li>
<li><a href="usage-fink.php#kde">Why are there no packages for
KDE?</a></li>
<li><a href="usage-fink.php#unstable">There's this package in
unstable that I want to install, but Fink just says 'no package
found'. How can I install it?</a></li>
<li><a href="usage-fink.php#sudo">I'm tired of typing my password into sudo again
and again. Is there a way around this?</a></li>
<li><a href="usage-fink.php#exec-init-csh">When I try to run
init.csh, I get a "Permission denied" error. What am I doing
wrong?</a></li>
<li><a href="usage-fink.php#dselect-access">Help! I used the
"[A]ccess" menu entry in dselect and now I can't download packages any
more!</a></li>
</ul>
<li><a href="comp-general.php"><b>Compile Problems - General</b></a></li>
<ul>
<li><a href="comp-general.php#head">I'm getting a strange usage message
from the head command. What's broken?</a></li>
</ul>
<li><a href="comp-packages.php"><b>Compile Problems - Specific Packages</b></a></li>
<ul>
<li><a href="comp-packages.php#nedit">nedit is broken.</a></li>
<li><a href="comp-packages.php#gnome-libs-db">gnome-libs complains about
dbopen and lots of other stuff.</a></li>
<li><a href="comp-packages.php#libiconv">libiconv fails with errors that
mention ANSI C++.</a></li>
<li><a href="comp-packages.php#xaw3d">Xaw3D fails to compile with a
two-level namespace error.</a></li>
</ul>
<li><a href="usage-general.php"><b>Package Usage Problems - General</b></a></li>
<ul>
<li><a href="usage-general.php#gnome-icons">Some GNOME applications display
black icons only. What's wrong?</a></li>
<li><a href="usage-general.php#xlocale">I'm getting lots of messages
like "locale not supported by C library". Is that bad?</a></li>
</ul>
<li><a href="usage-packages.php"><b>Package Usage Problems - Specific Packages</b></a></li>
<ul>
<li><a href="usage-packages.php#gnome-panel">The GNOME panel displays
black icons only. What's wrong?</a></li>
<li><a href="usage-packages.php#xmms-quiet">I get no sound from
XMMS</a></li>
<li><a href="usage-packages.php#gnome-terminal">Why won't gnome-terminal
start up?</a></li>
<li><a href="usage-packages.php#xdarwin-start">Help! When I start
XDarwin, it immediately quits!</a></li>
<li><a href="usage-packages.php#xfree-keymapping">I just upgraded to Mac
OS X 10.1 and now XFree86 always quits immediately. In the messages it
says "assert failed on line 454 of darwinKeyboard.c!". What's
wrong?</a></li>
</ul>
</ul><p>Generated from <i>$Fink: faq.xml,v 1.21 2001/10/28 07:57:01 chrisp Exp $</i></p>


<?
include "footer.inc";
?>
