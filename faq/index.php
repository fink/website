<?
$title = "F.A.Q.";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/08/30 20:55:38';

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
<li><a href="relations.php#forked">2.5 What is your relation with macosx.forked.net?</a></li>
<li><a href="relations.php#darwinports">2.6 What is your relation with Darwinports?</a></li>
</ul>
<li><a href="usage-fink.php"><b>3 Installing, Using and Maintaining Fink</b></a></li>
<ul>
<li><a href="usage-fink.php#what-packages">3.1 How can I find out what packages
Fink supports?</a></li>
<li><a href="usage-fink.php#proxy">3.2 I'm behind a firewall. How do I
configure Fink to use an HTTP proxy?</a></li>
<li><a href="usage-fink.php#firewalled-cvs">3.3 How do I update available packages from CVS when I am behind a firewall?</a></li>
<li><a href="usage-fink.php#moving">3.4 Can I move Fink to another
location after installation?</a></li>
<li><a href="usage-fink.php#moving-symlink">3.5 If I move Fink after
installation and provide a symlink from the old location, will it
work?</a></li>
<li><a href="usage-fink.php#removing">3.6 How can I remove all
of Fink?</a></li>
<li><a href="usage-fink.php#kde">3.7 What is the status of KDE in Fink?</a></li>
<li><a href="usage-fink.php#bindist">3.8 The package database at the
website lists package xxx, but apt-get and dselect know nothing about
it. Who's lying?</a></li>
<li><a href="usage-fink.php#unstable">3.9 There's this package in
unstable that I want to install, but the fink command just says 'no
package found'. How can I install it?</a></li>
<li><a href="usage-fink.php#sudo">3.10 I'm tired of typing my password into sudo again
and again. Is there a way around this?</a></li>
<li><a href="usage-fink.php#exec-init-csh">3.11 When I try to run
init.csh, I get a "Permission denied" error. What am I doing
wrong?</a></li>
<li><a href="usage-fink.php#dselect-access">3.12 Help! I used the
"[A]ccess" menu entry in dselect and now I can't download packages any
more!</a></li>
<li><a href="usage-fink.php#cvs-busy">3.13 When I try to run <q>fink selfupdate</q> or "fink selfupdate-cvs", I get the error "<code>Updating using CVS failed. Check the error messages above.</code>"</a></li>
<li><a href="usage-fink.php#kernel-panics">3.14 When I use fink, my whole machine 
freezes up/kernel panics/dies. Help!</a></li>
<li><a href="usage-fink.php#not-found">3.15 I'm trying to install a package, but fink can't download it.  The download site shows a later version number of the package than what fink has.  What do I do?</a></li>
<li><a href="usage-fink.php#fink-not-found">3.16 I've edited my .cshrc and started a new terminal, but I still get "command not found" errors when I run fink or anything that I installed with fink.</a></li>
<li><a href="usage-fink.php#invisible-sw">3.17 I want to hide /sw in the Finder to keep users from damaging the fink setup.</a></li>
<li><a href="usage-fink.php#install-info-bad">3.18 I can't install anything, because I get the following error: "install-info: unrecognized option `--infodir=/sw/share/info'"</a></li>
<li><a href="usage-fink.php#bad-list-file">3.19 I can't install or remove anything, because of a problem with a "files list file".</a></li>
<li><a href="usage-fink.php#error-nineteen">3.20 When I use the Fink binary installer package, I get a big "19" in the window and can't install anything.</a></li>
<li><a href="usage-fink.php#dselect-garbage">3.21 I get a bunch of garbage when I select packages in <code>dselect</code>.  How can I use it?</a></li>
<li><a href="usage-fink.php#perl-undefined-symbol">3.22 Why do I get a bunch of "dyld: perl undefined symbols" errors when I run Fink commands?</a></li>
<li><a href="usage-fink.php#cant-upgrade">3.23 I can't seem to update Fink's version.</a></li>
<li><a href="usage-fink.php#spaces-in-directory">3.24 Can I put Fink in a volume or directory with a space in its name?</a></li>
</ul>
<li><a href="comp-general.php"><b>4 Compile Problems - General</b></a></li>
<ul>
<li><a href="comp-general.php#compiler">4.1 A configure script complains
that it can't find an "acceptable cc". What's that?</a></li>
<li><a href="comp-general.php#cvs">4.2 When I try a "fink selfupdate-cvs" I get this message: "cvs: Command not found." </a></li>
<li><a href="comp-general.php#make">4.3 make: illegal option -- C</a></li>
<li><a href="comp-general.php#head">4.4 I'm getting a strange usage message
from the head command. What's broken?</a></li>
<li><a href="comp-general.php#also_in">4.5 When I try to install a package I get an error message about trying to overwrite a file that is in another package.</a></li>
<li><a href="comp-general.php#weak_lib">4.6 After I installed the December 2002 Development Tools I get messages about "weak libraries".</a></li>
<li><a href="comp-general.php#mv-failed">4.7 What does "execution of mv failed, exit code 1" mean when I try to build a package?</a></li>
<li><a href="comp-general.php#node-exists">4.8 I can't install a package | update because I get a message that a "node" already exists.</a></li>
<li><a href="comp-general.php#usr-local-libs">4.9 I've heard that libraries installed in /usr/local/lib sometimes cause build problems for Fink.  Is this true?</a></li>
<li><a href="comp-general.php#toc-out-of-date">4.10 When I try to build a package, I get a message that a "table of contents" is out of date.  What do I need to do?</a></li>
<li><a href="comp-general.php#fc-atlaas">4.11 Fink Commander hangs when I try to install atlas.</a></li>
<li><a href="comp-general.php#basic-headers">4.12 I get messages saying that I'm missing stddef.h.  Where do I find it?</a></li>
</ul>
<li><a href="comp-packages.php"><b>5 Compile Problems - Specific Packages</b></a></li>
<ul>
<li><a href="comp-packages.php#libgtop">5.1 libgtop fails to build with errors involving sed.</a></li>
<li><a href="comp-packages.php#cant-install-xfree">5.2 I want to switch to fink's xfree86 packages, but I can't install xfree86-base, because it conflicts with system-xfree86.</a></li>
<li><a href="comp-packages.php#change-thread-nothread">5.3 How do I change from the non-threaded version of fink's XFree86 packages to the threaded version (or vice-versa)?</a></li>
<li><a href="comp-packages.php#apple-x11">5.4 I've installed the Apple X11 package, but system-xfree86 won't install.</a></li>
<li><a href="comp-packages.php#cctools">5.5 "When I try to install KDE, I get the following message:  'Can't resolve dependency "cctools (&gt;= 446-1)"'</a></li>
<li><a href="comp-packages.php#system-xfree86-upgrade">5.6 I can't update system-xfree86, because of a conflict with x11.</a></li>
</ul>
<li><a href="usage-general.php"><b>6 Package Usage Problems - General</b></a></li>
<ul>
<li><a href="usage-general.php#xlocale">6.1 I'm getting lots of messages
like "locale not supported by C library". Is that bad?</a></li>
<li><a href="usage-general.php#passwd">6.2 There are suddenly a number of 
strange users on my system, with names like "mysql", "pgsql", and "games".  
Where did they come from?</a></li>
<li><a href="usage-general.php#compile-myself">6.3 How do I compile something
myself using fink-installed software?</a></li>
<li><a href="usage-general.php#apple-x11-applications-menu">6.4 I can't run any of my fink-installed applications using the Applications menu in Apple X11.</a></li>
<li><a href="usage-general.php#x-options">6.5 I'm bewildered by the Xwindows options:  Apple X11, XFree86, etc.  What should I install?</a></li>
</ul>
<li><a href="usage-packages.php"><b>7 Package Usage Problems - Specific Packages</b></a></li>
<ul>
<li><a href="usage-packages.php#xmms-quiet">7.1 I get no sound from
XMMS</a></li>
<li><a href="usage-packages.php#nedit-window-locks">7.2 If I am editing a file in nedit, when I open another file its window pops up but is unresponsive.</a></li>
<li><a href="usage-packages.php#xdarwin-start">7.3 Help! When I start
XDarwin, it immediately quits!</a></li>
<li><a href="usage-packages.php#no-server">7.4 When I try to start XDarwin I get the message "xinit:  No such file or directory (errno 2):  no server "/usr/X11R6/bin/X" in PATH".</a></li>
<li><a href="usage-packages.php#xfree-keymapping">7.5 I just upgraded to Mac
OS X 10.1 and now XFree86 always quits immediately. In the messages it
says "assert failed on line 454 of darwinKeyboard.c!". What's
wrong?</a></li>
<li><a href="usage-packages.php#xterm-error">7.6 xterm fails with "dyld: xterm Undefined symbols:  xterm undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib".</a></li>
<li><a href="usage-packages.php#libXmuu">7.7 When I try to start XFree86 I get one of the following errors:  "dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib" or "dyld: xinit can't open library:  /usr/X11R6/lib/libXext.6.dylib"</a></li>
<li><a href="usage-packages.php#apple-x-bugs">7.8 I had Fink's XFree86 installed, and I've replaced it with Apple's X11, and now everything's crashing!</a></li>
<li><a href="usage-packages.php#apple-x-delete">7.9 I want the delete key in Apple's X11.app to behave like that in XDarwin.</a></li>
</ul>
</ul><p>Generated from <i>$Fink: faq.xml,v 1.126 2003/08/30 20:55:38 alexkhansen Exp $</i></p>


<?
include "footer.inc";
?>

