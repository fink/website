<?
$title = "F.A.Q.";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/01/29 14:24:16';

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
<li><a href="relations.php#openosx">2.4 What is your relation with OpenOSX.com?</a></li>
<li><a href="relations.php#forked">2.5 What is your relation with macosx.forked.net?</a></li>
<li><a href="relations.php#darwinports">2.6 What is your relation with Darwinports?</a></li>
</ul>
<li><a href="upgrade-fink.php"><b>3 Upgrading Fink (version-specific troubleshooting)</b></a></li>
<ul>
<li><a href="upgrade-fink.php#gcc-0.16.0">3.1 I just upgraded to 0.16.0 and it tells me "Your version of the
gcc 3.3 compiler is out of date." What do I do?</a></li>
</ul>
<li><a href="usage-fink.php"><b>4 Installing, Using and Maintaining Fink</b></a></li>
<ul>
<li><a href="usage-fink.php#what-packages">4.1 How can I find out what packages
Fink supports?</a></li>
<li><a href="usage-fink.php#proxy">4.2 I'm behind a firewall. How do I
configure Fink to use an HTTP proxy?</a></li>
<li><a href="usage-fink.php#firewalled-cvs">4.3 How do I update available packages from CVS when I am behind a firewall?</a></li>
<li><a href="usage-fink.php#moving">4.4 Can I move Fink to another
location after installation?</a></li>
<li><a href="usage-fink.php#moving-symlink">4.5 If I move Fink after
installation and provide a symlink from the old location, will it
work?</a></li>
<li><a href="usage-fink.php#removing">4.6 How can I uninstall all of Fink?</a></li>
<li><a href="usage-fink.php#bindist">4.7 The package database at the
website lists package xxx, but apt-get and dselect know nothing about
it. Who's lying?</a></li>
<li><a href="usage-fink.php#unstable">4.8 There's this package in unstable that I want to install, but the fink command just says 'no package found'. How can I install it?</a></li>
<li><a href="usage-fink.php#sudo">4.9 I'm tired of typing my password into sudo again
and again. Is there a way around this?</a></li>
<li><a href="usage-fink.php#exec-init-csh">4.10 When I try to run init.csh or init.sh, I get a "Permission denied" error. What am I doing wrong?</a></li>
<li><a href="usage-fink.php#dselect-access">4.11 Help! I used the
"[A]ccess" menu entry in dselect and now I can't download packages any
more!</a></li>
<li><a href="usage-fink.php#cvs-busy">4.12 When I try to run <q>fink selfupdate</q> or "fink selfupdate-cvs", I get the error "<code>Updating using CVS failed. Check the error messages above.</code>"</a></li>
<li><a href="usage-fink.php#kernel-panics">4.13 When I use Fink, my whole machine 
freezes up/kernel panics/dies. Help!</a></li>
<li><a href="usage-fink.php#not-found">4.14 I'm trying to install a package, but Fink can't download it. The download site shows a later version number of the package than what Fink has. What do I do?</a></li>
<li><a href="usage-fink.php#fink-not-found">4.15 I've edited my .cshrc and started a new terminal, but I still get "command not found" errors when I run Fink or anything that I installed with Fink.</a></li>
<li><a href="usage-fink.php#invisible-sw">4.16 I want to hide /sw in the Finder to keep users from damaging the Fink setup.</a></li>
<li><a href="usage-fink.php#install-info-bad">4.17 I can't install anything, because I get the following error: "install-info: unrecognized option `--infodir=/sw/share/info'"</a></li>
<li><a href="usage-fink.php#bad-list-file">4.18 I can't install or remove anything, because of a problem with a "files list file".</a></li>
<li><a href="usage-fink.php#error-nineteen">4.19 When I use the Fink binary installer package, I get a big "19" in the window and can't install anything.</a></li>
<li><a href="usage-fink.php#dselect-garbage">4.20 I get a bunch of garbage when I select packages in <code>dselect</code>. How can I use it?</a></li>
<li><a href="usage-fink.php#perl-undefined-symbol">4.21 Why do I get a bunch of "dyld: perl undefined symbols" errors when I run Fink commands?</a></li>
<li><a href="usage-fink.php#cant-upgrade">4.22 I can't seem to update Fink's version.</a></li>
<li><a href="usage-fink.php#spaces-in-directory">4.23 Can I put Fink in a volume or directory with a space in its name?</a></li>
<li><a href="usage-fink.php#packages-gz">4.24 When I try to do a binary update, there are many messages with "File not found"</a></li>
<li><a href="usage-fink.php#wrong-tree">4.25 I've changed my OS | Developer Tools, but Fink doesn't recognize the change.</a></li>
<li><a href="usage-fink.php#seg-fault">4.26 I get errors with <code>gzip</code> | <code>dpkg-deb</code> when I try to install anything! Help!</a></li>
<li><a href="usage-fink.php#pathsetup-keeps-running">4.27 When I open a Terminal window, I get a message that "Your environment seems to be correctly
set up for Fink already.", and it logs out.</a></li>
</ul>
<li><a href="comp-general.php"><b>5 Compile Problems - General</b></a></li>
<ul>
<li><a href="comp-general.php#compiler">5.1 A configure script complains
that it can't find an "acceptable cc". What's that?</a></li>
<li><a href="comp-general.php#cvs">5.2 When I try a "fink selfupdate-cvs" I get this message: "cvs: Command not found." </a></li>
<li><a href="comp-general.php#make">5.3 make: illegal option -- C</a></li>
<li><a href="comp-general.php#head">5.4 I'm getting a strange usage message
from the head command. What's broken?</a></li>
<li><a href="comp-general.php#also_in">5.5 When I try to install a package I get an error message about trying to overwrite a file that is in another package.</a></li>
<li><a href="comp-general.php#weak_lib">5.6 After I installed the December 2002 Development Tools I get messages about "weak libraries".</a></li>
<li><a href="comp-general.php#mv-failed">5.7 What does "execution of mv failed, exit code 1" mean when I try to build a package?</a></li>
<li><a href="comp-general.php#node-exists">5.8 I can't install a package | update because I get a message that a "node" already exists.</a></li>
<li><a href="comp-general.php#usr-local-libs">5.9 I've heard that libraries installed in /usr/local/lib sometimes cause build problems for Fink. Is this true?</a></li>
<li><a href="comp-general.php#toc-out-of-date">5.10 When I try to build a package, I get a message that a "table of contents" is out of date. What do I need to do?</a></li>
<li><a href="comp-general.php#fc-atlas">5.11 Fink Commander hangs when I try to install atlas.</a></li>
<li><a href="comp-general.php#basic-headers">5.12 I get messages saying that I'm missing stddef.h. Where do I find it?</a></li>
<li><a href="comp-general.php#multiple-dependencies">5.13 I can't update, because Fink is "unable to resolve version conflict on multiple dependencies".</a></li>
<li><a href="comp-general.php#dpkg-parse-error">5.14 I can't install anything because I get "dpkg: parse error, in file `/sw/var/lib/dpkg/status'"!</a></li>
<li><a href="comp-general.php#freetype-problems">5.15 I get errors involving freetype.</a></li>
<li><a href="comp-general.php#dlfcn-from-oo">5.16 I get build errors involving `Dl_info'.</a></li>
</ul>
<li><a href="comp-packages.php"><b>6 Compile Problems - Specific Packages</b></a></li>
<ul>
<li><a href="comp-packages.php#libgtop">6.1 A package fails to build with errors involving <code>sed</code>.</a></li>
<li><a href="comp-packages.php#cant-install-xfree">6.2 I want to switch to Fink's XFree86 packages, but I can't install <code>xfree86-base</code> | <code>xfree86</code>, because it conflicts with <code>system-xfree86</code>.</a></li>
<li><a href="comp-packages.php#change-thread-nothread">6.3 How do I change from the non-threaded version of Fink's XFree86 packages to the threaded version (or vice-versa)?</a></li>
<li><a href="comp-packages.php#cctools">6.4 "When I try to install KDE, I get the following message: 'Can't resolve dependency "cctools (&gt;= 446-1)"'</a></li>
</ul>
<li><a href="usage-general.php"><b>7 Package Usage Problems - General</b></a></li>
<ul>
<li><a href="usage-general.php#xlocale">7.1 I'm getting lots of messages
like "locale not supported by C library". Is that bad?</a></li>
<li><a href="usage-general.php#passwd">7.2 There are suddenly a number of 
strange users on my system, with names like "mysql", "pgsql", and "games".
Where did they come from?</a></li>
<li><a href="usage-general.php#compile-myself">7.3 How do I compile something
myself using Fink-installed software?</a></li>
<li><a href="usage-general.php#apple-x11-applications-menu">7.4 I can't run any of my Fink-installed applications using the Applications menu in Apple X11.</a></li>
<li><a href="usage-general.php#x-options">7.5 I'm bewildered by the X11 options: Apple X11, XFree86, etc. What should I install?</a></li>
<li><a href="usage-general.php#no-display">7.6 When I try to run an application, I get a message that says "cannot open display:". What do I need to do?</a></li>
<li><a href="usage-general.php#suggest-package">7.7 I don't see my favorite program in Fink. How do I suggest a new package for inclusion in Fink?</a></li>
</ul>
<li><a href="usage-packages.php"><b>8 Package Usage Problems - Specific Packages</b></a></li>
<ul>
<li><a href="usage-packages.php#xmms-quiet">8.1 I get no sound from
XMMS</a></li>
<li><a href="usage-packages.php#nedit-window-locks">8.2 If I am editing a file in nedit, when I open another file its window pops up but is unresponsive.</a></li>
<li><a href="usage-packages.php#xdarwin-start">8.3 Help! When I start
XDarwin, it immediately quits!</a></li>
<li><a href="usage-packages.php#no-server">8.4 When I try to start XDarwin I get the message "xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</a></li>
<li><a href="usage-packages.php#xterm-error">8.5 xterm fails with "dyld: xterm Undefined symbols: xterm undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib".</a></li>
<li><a href="usage-packages.php#libXmuu">8.6 When I try to start XFree86 I get one of the following errors: "dyld: xinit can't open library: /usr/X11R6/lib/libXmuu.1.dylib" or "dyld: xinit can't open library: /usr/X11R6/lib/libXext.6.dylib"</a></li>
<li><a href="usage-packages.php#apple-x-bugs">8.7 I had Fink's XFree86 installed, and I've replaced it with Apple's X11, and now everything's crashing!</a></li>
<li><a href="usage-packages.php#apple-x-delete">8.8 I want the delete key in Apple's X11.app to behave like that in XDarwin.</a></li>
<li><a href="usage-packages.php#gnome-two">8.9 I upgraded from GNOME 1.x to GNOME 2.x and now <code>gnome-session</code> won't open a window manager.</a></li>
<li><a href="usage-packages.php#apple-x11-no-windowbar">8.10 I upgraded to Apple's X11 in Panther and now my window title bars are missing.</a></li>
<li><a href="usage-packages.php#apple-x11-wants-xfree86">8.11 I installed Apple's X11 in Panther but Fink keeps asking to install xfree86.</a></li>
<li><a href="usage-packages.php#apple-x11-beta-wants-xfree86">8.12 I installed Apple's X11 with the 10.2-gcc3.3 version of Fink but Fink keeps asking to install xfree86.</a></li>
</ul>
</ul><p>Generated from <i>$Fink: faq.xml,v 1.165 2004/01/29 14:24:16 alexkhansen Exp $</i></p>


<?
include "footer.inc";
?>

