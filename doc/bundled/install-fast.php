<?php
$title = "Installation - Fast Track";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2015/11/01 02:12:02';
$metatags = '<link rel="contents" href="install.php" title="Installation Contents"><link rel="next" href="install-first.php" title="First Time Installation"><link rel="prev" href="install.php" title="Installation Contents">';

include_once "header.inc";
?>

<h1>Installation - 1 The Fast Track</h1>




<p>
This section is for the impatient who don't want to take the time to
learn their way around the command line world and don't care that they
don't know what they're actually doing.
</p>
<p>
If you're looking for the real instructions, skip to the <a href="install-first.php">next section</a>.
(You can still use this section as an example.)
</p>


<h2><a name="req">1.1 Requirements</a></h2>
<p>
You need:
</p>
<ul>
<li><p>
An installed Mac OS X system, version 10.9 or later.
</p></li>
<li><p>
The Xcode Command Line Tools are mandatory. This package can be installed either by 
downloading it directly via developer.apple.com, or by running the</p>
<pre>xcode-select --install</pre>
<p>command and choosing the   
<b>Install</b> button in the window that pops up.
You may also need to use this command to update the tools,
especially if you're having build problems.</p>
<p>If you're doing a manual download, make sure that the tools you install match your
OS X version as well as your Xcode app version (if that is present).</p>
<p>You will need to accept the Xcode license as root.  To do that, run</p>
<pre>sudo xcodebuild -license</pre>
<p>then scroll to the bottom of the text and type</p>
<pre>agree</pre>
<p>Some packages require the full Xcode.</p>
</li>
<li><p>Java.  Entering</p>
<pre>javac</pre>
<p>from a Terminal.app window should suffice to make the system download it for you.</p></li>
<li><p>
Many other things that come with Mac OS X.
This includes perl and curl.
</p></li>
<li><p>
Internet access.
All source code is downloaded from mirror sites.
</p></li>
<li><p>
Patience.
Compiling several big packages takes time.
I'm talking hours or even days here.
</p></li>
</ul>


<h2><a name="scripted-install">1.2 First Time Installation Very Fast
Track</a></h2>
<p>
Download the <a href="https://raw.githubusercontent.com/fink/scripts/master/srcinstaller/Install%20Fink.tool">
Install Fink.tool</a> script and double-click on it.  This will automate the downloads
in the steps below.
</p>
<p>
The script may have to stop for you to do something.  If so, run it again.
</p>

<h2><a name="install">1.3 First Time Installation Fast
Track</a></h2>
<p>
Start out by copying the <code>fink-0.39.3.tar.gz</code>
file to your home folder (it might also show up as <code>fink-0.39.3.tar</code> if you
used Safari to download it).
Then, open Terminal.app and follow the session below.
Computer output is in <code>normal face</code>, your input is in
<code><b>bold face</b></code> (or otherwise highlighted).
The actual input prompts from the shell may vary, and some chunks of
the output have been omitted (<code>...</code>).
</p>
<p>Note:  after you start the install process you may see
dialog windows asking whether you want to install XQuartz.
If you want to do so, go ahead.  You won't have to stop the Fink install
to do that.</p>
<pre>[frodo:~] testuser% <b>tar xf fink-0.39.3.tar.gz</b>
[frodo:~] testuser% <b>cd fink-0.39.3</b>
[frodo:~/fink-0.39.3] testuser% <b>./bootstrap</b>

Fink must be installed and run with superuser (root) privileges
...
Choose a method: [1] <b>1</b>

sudo /Users/testuser/fink-0.39.3/bootstrap .sudo '/sw'
Password: <b>(your normal password here)</b>
...
OK, I'll ask you some questions and update the configuration file in
'/sw/etc/fink.conf'.

In what additional directory should Fink look for downloaded tarballs? [] <b>(press return)</b>

Which directory should Fink use to build packages? (If you don't know what this
means, it is safe to leave it at its default.) [] <b>(press return)</b>

"Fink can set the UID and GID of its build user dynamically...
...Allow Fink to set the UID/GID dynamically? [Y] <b>(press return)</b>

(1)	Quiet (do not show download statistics)
(2)	Low (do not show tarballs being expanded)
(3)	Medium (will show almost everything)
(4)	High (will show everything)

How verbose should Fink be? [2] <b>(press return)</b>

Proxy/Firewall settings
Enter the URL of the HTTP proxy to use, or 'none' for no proxy. The URL
should start with http:// and may contain username, password or port
specifications. [none] <b>(press return)</b>
Enter the URL of the proxy to use for FTP, or 'none' for no proxy. The URL
should start with http:// and may contain username, password or port
specifications. [none] <b>(press return)</b>
Use passive mode FTP transfers (to get through a firewall)? [Y/n] <b>(press return)</b>

Enter the maximum number of simultaneous build jobs.
...
Maximum number of simultaneous build jobs: [&lt;number of cpus&gt;] <b>(press return)</b>

Mirror selection
Choose a continent:
...
<b>(enter the numbers corresponding to your location)</b>
...
Writing updated configuration to '/sw/etc/fink.conf'...
Bootstrapping a base system via /sw/bootstrap.
...
<b>(take a coffee break while Fink downloads and compiles the base packages)</b>
...

You should now have a working Fink installation in '/sw'.
[frodo:~/fink-0.39.3] testuser% <b>cd</b>
[frodo:~] testuser% <b>rm -r fink-0.39.3</b>
[frodo:~] testuser% <b>/sw/bin/pathsetup.sh</b></pre>
<p>
The last command runs a little script to help set up your Unix paths
(and other things) for use with Fink.  In most cases, it will run
automatically, and prompt you for permission to make changes.  If
the script fails, you'll have to do things by hand (see below).
</p>
<p>
(If you need to do things by hand, and you are using csh or tcsh,
you need to make sure that the command 
<code>source /sw/bin/init.csh</code> is executed during startup of
your shell, either by .login, .cshrc, .tcshrc, or something else
appropriate.  If you are using bash or similar shells, the command
you need is <code>. /sw/bin/init.sh</code>, and places where it
might get executed include .bashrc and .profile.)
</p>
<p>
Once you have set up the paths, open a new Terminal.app window, and close
all other ones.
That's it, you now have a base Fink system installed.
</p>
<p>
Before you can install additional packages, you will need to download their
descriptions.  To do this, in your new Terminal.app window, ether use:</p>
<pre>[frodo:~] testuser% <b>fink selfupdate-rsync</b>
Password: <b>(your normal password here)</b>
Please note: the simple command 'fink selfupdate' should be used for routine
updating; you only need to use a command like 'fink selfupdate-cvs' or 'fink
selfupdate --method=rsync' if you are changing your update method.
...
<b>(wait for the downloads to finish)</b></pre>
<p> (preferred) or</p>
<pre>[frodo:~] testuser% <b>fink selfupdate-cvs</b>
Password: <b>(your normal password here)</b>

Please note: the simple command 'fink selfupdate' should be used for routine
updating; you only need to use a command like 'fink selfupdate-cvs' or 'fink
selfupdate --method=rsync' if you are changing your update method. 

fink is setting your default update method to cvs

Fink has the capability to run the CVS commands as a normal user. That has some
advantages - it uses that user's CVS settings files and allows the package
descriptions to be edited and updated without becoming root. Please specify the
user login name that should be used: [&lt;your username&gt;] <b>(press return)</b>

For Fink developers only: Enter your SourceForge login name to set up full CVS
access. Other users, just press return to set up anonymous read-only access.
[anonymous] <b>(press return)</b>

Checking to see if we can use hard links to merge the existing tree. Please
ignore errors on the next few lines.
Now logging into the CVS server. When CVS asks you for a password, just press
return (i.e. the password is empty).
/usr/bin/su hansen -c 'cvs -d":pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink" login'
Logging in to :pserver:anonymous@fink.cvs.sourceforge.net:2401/cvsroot/fink
CVS password: <b>(press return)</b>
Logging in to :pserver:anonymous@fink.cvs.sourceforge.net:2401/cvsroot/fink
...
<b>(wait for the downloads to finish)</b></pre>
<p>
especially if you are using a proxy.    
</p>
<p>
You can now install packages with the <code>fink</code>
command, like this:
</p>
<pre>[frodo:~] testuser% <b>fink install gimp2</b>
Password:
Scanning package description files..........
Information about 6230 packages read in 1 seconds.

fink needs help picking an alternative to satisfy a virtual dependency. The
candidates:

(1)	db51-aes: Berkeley DB embedded database - crypto
(2)	db51: Berkeley DB embedded database - non crypto

Pick one: [1] 
The following package will be installed or updated:
 gimp2
The following 308 additional packages will be installed:
 aalib aalib-bin aalib-shlibs asciidoc atk1 atk1-shlibs autoconf2.6
 automake1.11 automake1.11-core blt-dev blt-shlibs boost1.46.1.cmake
 boost1.46.1.cmake-shlibs cairo cairo-shlibs celt-dev celt-shlibs cmake
 cpan-meta-pm5124 cpan-meta-requirements-pm5124 cpan-meta-yaml-pm
 cyrus-sasl2-dev cyrus-sasl2-shlibs daemonic db51-aes db51-aes-shlibs db53-aes
 db53-aes-shlibs dbus dbus-glib1.2-dev dbus-glib1.2-shlibs dbus1.3-dev
 dbus1.3-shlibs dirac-dev dirac-shlibs docbook-bundle docbook-dsssl-ldp
 docbook-dsssl-nwalsh docbook-dtd docbook-xsl doxygen expat1 expat1-shlibs
 exporter-pm extutils-cbuilder-pm extutils-command-pm extutils-install-pm
 extutils-makemaker-pm extutils-makemaker-pm5124 extutils-manifest-pm
 file-copy-recursive-pm file-temp-pm5124 fink-package-precedence flag-sort
 fltk-x11 fltk-x11-shlibs fontconfig-config fontconfig2-dev fontconfig2-shlibs
 freeglut freeglut-shlibs freetype219 freetype219-shlibs gawk gconf2-dev
 gconf2-shlibs gd2 gd2-bin gd2-shlibs gdbm3 gdbm3-shlibs getoptbin
 gettext-tools ghostscript ghostscript-fonts giflib giflib-bin giflib-shlibs
 gimp2-shlibs glib2-dev glib2-shlibs glitz glitz-shlibs gmp5 gmp5-shlibs
 gnome-doc-utils gnutls-2.12 gnutls-2.12-shlibs graphviz graphviz-shlibs grep
 gtk+2 gtk+2-dev gtk+2-shlibs gtk-doc gtkglext1 gtkglext1-shlibs gts75
 gts75-shlibs guile18 guile18-dev guile18-libs guile18-shlibs ilmbase
 ilmbase-shlibs intltool40 iso-codes jack-dev jack-shlibs json-pp-pm lame-dev
 lame-shlibs lcms lcms-shlibs libavcodec52-shlibs libavformat52-shlibs
 libavutil50-shlibs libbabl0.1.0-dev libbabl0.1.0-shlibs libbonobo2
 libbonobo2-dev libbonobo2-shlibs libcelt0.2-dev libcelt0.2-shlibs libcroco3
 libcroco3-shlibs libdatrie1 libdatrie1-shlibs libexif12 libexif12-shlibs
 libflac8 libflac8-dev libgcrypt libgcrypt-shlibs libgegl0.1.0-dev
 libgegl0.1.0-shlibs libgettext3-dev libgettext3-shlibs libgettextpo2-dev
 libgettextpo2-shlibs libglade2 libglade2-shlibs libgmpxx5-shlibs libgpg-error
 libgpg-error-shlibs libgsf1.114-dev libgsf1.114-shlibs libgsm1-dev
 libgsm1-shlibs libhogweed-shlibs libidl2 libidl2-shlibs libidn libidn-shlibs
 libjasper.1 libjasper.1-shlibs libjpeg libjpeg-bin libjpeg-shlibs libjpeg8
 libjpeg8-shlibs liblzma5 liblzma5-shlibs libming1-dev libming1-shlibs libmng2
 libmng2-shlibs libncursesw5 libncursesw5-shlibs libogg libogg-shlibs
 liboil-0.3 liboil-0.3-shlibs libopencore-amr0 libopencore-amr0-shlibs
 libopenexr6-shlibs libopenjpeg libopenjpeg-shlibs libopenraw1-dev
 libopenraw1-shlibs libpaper1-dev libpaper1-shlibs libpcre1 libpcre1-shlibs
 libpng14 libpng14-shlibs libpng15 libpng15-shlibs libpng3 libpng3-shlibs
 librarian.08-shlibs librsvg2 librsvg2-shlibs libschroedinger
 libschroedinger-shlibs libsigsegv2 libsigsegv2-shlibs libsndfile1-dev
 libsndfile1-shlibs libsoup2.4.1-ssl libsoup2.4.1-ssl-shlibs libspeex1
 libspeex1-shlibs libspiro0 libspiro0-shlibs libtasn1-3 libtasn1-3-shlibs
 libthai libthai-dev libthai-shlibs libtheora0 libtheora0-shlibs
 libtheoradec1-shlibs libtheoraenc1-shlibs libtiff libtiff-bin libtiff-shlibs
 libtool2 libtool2-shlibs libvorbis0 libvorbis0-shlibs libvpx libwmf
 libwmf-shlibs libx264-115-dev libx264-115-shlibs libxml2 libxml2-bin
 libxml2-py27 libxml2-shlibs libxslt libxslt-bin libxslt-shlibs lua51 lua51-dev
 lua51-shlibs lynx m4 nasm netpbm10 netpbm10-shlibs nettle4a nettle4a-shlibs
 ocaml openexr openexr-dev openjade openldap24-dev openldap24-shlibs opensp-bin
 opensp5-dev opensp5-shlibs openssl100-dev openssl100-shlibs orbit2 orbit2-dev
 orbit2-shlibs pango1-xft2-ft219 pango1-xft2-ft219-dev pango1-xft2-ft219-shlibs
 parse-cpan-meta-pm passwd-core passwd-messagebus pixman pixman-shlibs
 pkgconfig poppler-data poppler4 poppler4-glib poppler4-glib-shlibs
 poppler4-shlibs popt popt-shlibs python27 python27-shlibs rarian rarian-compat
 readline5 readline5-shlibs readline6 readline6-shlibs sdl sdl-shlibs
 sgml-entities-iso8879 shared-mime-info sqlite3-dev sqlite3-shlibs swig
 system-openssl-dev tcltk tcltk-dev tcltk-shlibs test-harness-pm5124
 test-simple-pm5124 texi2html texinfo version-pm5124
 version-requirements-pm5124 xdg-base xft2-dev xft2-shlibs xinitrc
 xml-parser-pm5124 xmlto xvidcore xvidcore-shlibs xz yasm
The following 2 packages might be temporarily removed:
 lcms tcltk-dev
Do you want to continue? [Y/n]
...</pre>
<p>
If these instructions don't work for you, well, you'll have to take
the time to read through the rest of this document and the <a href="/faq/">online FAQ</a>.
You can also ask on the <a href="/lists/fink-users.php">fink-users
mailing list</a>, but expect to be pointed back at the
documentation when your problem actually is well-documented.
</p>


<p align="right">
Next: <a href="install-first.php">2 First Time Installation</a></p>

<?php include_once "footer.inc"; ?>
