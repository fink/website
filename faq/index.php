<?
$title = "F.A.Q.";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/11/02 13:01:12';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="general.php" title="General Questions">';

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
<li><a href="general.php"><b>1 General Questions</b></a></li>
<ul>
<li><a href="general.php#what">1.1 What is Fink?</a></li>
<li><a href="general.php#naming">1.2 What does the name Fink stand for?</a></li>
<li><a href="general.php#bsd-ports">1.3 How is Fink different
from the BSD port mechanism (this includes OpenPackages and
GNU-Darwin)?</a></li>
<li><a href="general.php#usr-local">1.4 Why doesn't Fink install into
/usr/local?</a></li>
<li><a href="general.php#why-sw">1.5 Then why did you choose
/sw?</a></li>
</ul>
<li><a href="relations.php"><b>2 Relations with Other Projects</b></a></li>
<ul>
<li><a href="relations.php#upstream">2.1 Do you contribute your patches
back to the upstream maintainers?</a></li>
<li><a href="relations.php#debian">2.2 What is your relation with the
Debian project? Are you porting Debian Linux to Mac OS X?</a></li>
<li><a href="relations.php#apple">2.3 What is your relation with
Apple?</a></li>
<li><a href="relations.php#openosx">2.4 What is your relation with
OpenOSX.com?</a></li>
<li><a href="relations.php#forked">2.5 What is your relation with
macosx.forked.net?</a></li>
</ul>
<li><a href="usage-fink.php"><b>3 Installing, Using and Maintaining Fink</b></a></li>
<ul>
<li><a href="usage-fink.php#what-packages">3.1 How can I find out what packages
Fink supports?</a></li>
<li><a href="usage-fink.php#proxy">3.2 I'm behind a firewall. How do I
configure Fink to use an HTTP proxy?</a></li>
<li><a href="usage-fink.php#moving">3.3 Can I move Fink to another
location after installation?</a></li>
<li><a href="usage-fink.php#moving-symlink">3.4 If I move Fink after
installation and provide a symlink from the old location, will it
work?</a></li>
<li><a href="usage-fink.php#removing">3.5 How can I remove all
of Fink?</a></li>
<li><a href="usage-fink.php#kde">3.6 What is the status of KDE in Fink?</a></li>
<li><a href="usage-fink.php#bindist">3.7 The package database at the
website lists package xxx, but apt-get and dselect know nothing about
it. Who's lying?</a></li>
<li><a href="usage-fink.php#unstable">3.8 There's this package in
unstable that I want to install, but the fink command just says 'no
package found'. How can I install it?</a></li>
<li><a href="usage-fink.php#sudo">3.9 I'm tired of typing my password into sudo again
and again. Is there a way around this?</a></li>
<li><a href="usage-fink.php#exec-init-csh">3.10 When I try to run
init.csh, I get a &quot;Permission denied&quot; error. What am I doing
wrong?</a></li>
<li><a href="usage-fink.php#dselect-access">3.11 Help! I used the
&quot;[A]ccess&quot; menu entry in dselect and now I can't download packages any
more!</a></li>
<li><a href="usage-fink.php#selfupdate-tar-fails">3.12 Why doesn't 'fink selfupdate'
work?</a></li>
<li><a href="usage-fink.php#kernel-panics">3.13 When I use fink, my whole machine 
freezes up/kernel panics/dies. Help!</a></li>
<li><a href="usage-fink.php#not-found">3.14 I'm trying to install a package, but fink can't download it.  The download site shows a later version number of the package than what fink has.  What do I do?</a></li>
</ul>
<li><a href="comp-general.php"><b>4 Compile Problems - General</b></a></li>
<ul>
<li><a href="comp-general.php#compiler">4.1 A configure script complains
that it can't find an &quot;acceptable cc&quot;. What's that?</a></li>
<li><a href="comp-general.php#make">4.2 make: illegal option -- C</a></li>
<li><a href="comp-general.php#head">4.3 I'm getting a strange usage message
from the head command. What's broken?</a></li>
</ul>
<li><a href="comp-packages.php"><b>5 Compile Problems - Specific Packages</b></a></li>
<ul>
<li><a href="comp-packages.php#libgtop">5.1 libgtop fails to build with errors involving sed.</a></li>
</ul>
<li><a href="usage-general.php"><b>6 Package Usage Problems - General</b></a></li>
<ul>
<li><a href="usage-general.php#gnome-icons">6.1 Some GNOME applications display
black icons only. What's wrong?</a></li>
<li><a href="usage-general.php#xlocale">6.2 I'm getting lots of messages
like &quot;locale not supported by C library&quot;. Is that bad?</a></li>
<li><a href="usage-general.php#passwd">6.3 There are suddenly a number of 
strange users on my system, with names like &quot;mysql&quot;, &quot;pgsql&quot;, and &quot;games&quot;.  
Where did they come from?</a></li>
<li><a href="usage-general.php#compile-myself">6.4 How do I compile something
myself using fink-installed software?</a></li>
</ul>
<li><a href="usage-packages.php"><b>7 Package Usage Problems - Specific Packages</b></a></li>
<ul>
<li><a href="usage-packages.php#gnome-panel">7.1 The GNOME panel displays
black icons only. What's wrong?</a></li>
<li><a href="usage-packages.php#xmms-quiet">7.2 I get no sound from
XMMS</a></li>
<li><a href="usage-packages.php#xdarwin-start">7.3 Help! When I start
XDarwin, it immediately quits!</a></li>
<li><a href="usage-packages.php#xfree-keymapping">7.4 I just upgraded to Mac
OS X 10.1 and now XFree86 always quits immediately. In the messages it
says &quot;assert failed on line 454 of darwinKeyboard.c!&quot;. What's
wrong?</a></li>
</ul>
</ul><p>Generated from <i>$Fink: faq.xml,v 1.47 2002/11/02 13:01:12 fingolfin Exp $</i></p>


<?
include "footer.inc";
?>

