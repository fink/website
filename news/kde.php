<?
$title = "KDE Support In Fink";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2002/07/07 19:49:49 $';

include "header.inc";
?>


<h1>KDE Support In Fink</h1>

<p>
 The Fink team is happy to announce support for
 <a href="http://www.kde.org/">KDE</a> on 
 <a href="http://www.apple.com/macosx/">MacOS X</a>.
</p>
<p>
 To find out more about the K Desktop Environment, see
 <a href="http://www.kde.org/whatiskde/index.html">What is KDE?</a>
 at the KDE web site.
</p>

<p>
Screenshots:
[<a href="kde3-thesin-gimp.html">#1</a>]
[<a href="kde3-vasi-oroborosx_and_konq.html">#2</a>]
[<a href="kde3-rangerrick-ie_and_konq.html">#3</a>]
[<a href="kde3-rangerrick-koffice.html">#4</a>]
</p>

<p>
 Work has been progressing steadily on getting KDE 3.0.x ported to
 run in XFree86 on MacOS X.  Packages and pre-built binaries are now
 available for users interested in running KDE on MacOS X via Fink.
</p>
<p>
 There are a large number of issues remaining before the port is truly
 complete, but the vast majority of KDE builds and runs just fine.
 The work-in-progress KDE source tree is being graciously hosted by the
 folks at <a href="http://www.opendarwin.org/">OpenDarwin</a>. More info
 on our progress and things that need to be done are regularly updated
 in the <a href="http://www.opendarwin.org/cgi-bin/cvsweb.cgi/proj/KDE-Darwin/README.Darwin?rev=HEAD&amp;content-type=text/x-cvsweb-markup">README.Darwin</a>
 file available at the top of the KDE-Darwin tree.
</p>

<h1>What's New?</h1>
<p>
 <font color="#ff0000" size="+1">
  The current Fink binary dist of KDE is 3.0.2. <br>
  The current Fink source dist of KDE is 3.0.2.
 </font>
</p>
<p>
 New in the 3.0.2 release of the KDE fink packages is a number of
 cleanups in package dependencies, and the kio-kmd package.  Also note that
 kdebindings depends on mozilla, which is now only available in crypto, so
 kdebindings has been moved there as well.  You will need to remove it, or
 add the crypto tree to your configuration to upgrade.
</p>

<h1>Upgrading Fink KDE</h1>

<p>
 <font color="#ff0000" size="+1">If you are upgrading from the previous
 release of the Fink KDE packages, read this carefully.</font>
</p>
<p>
 The initial KDE packages exposed a bug in the xfree86-base package that was
 in Fink unstable that required users of the KDE binaries to upgrade to the
 xfree86-base package from Fink (rather than using XDarwin or an older
 XFree86 4.2 release).  This has been fixed in the latest packages.  If
 you have already installed KDE from the fink binary release,
 <strong>please</strong> run the following set of commands to upgrade:
</p>
<p>
	 <nobr><b><tt>sudo apt-get update; sudo apt-get dist-upgrade</tt></b></nobr>
</p>
<p>
Note that you will need to do a "dist-upgrade", and not just an "upgrade",
because there are new dependencies (CUPS, among other things).
</p>

<h1>Before You Start -- Getting XFree86</h1>
<p>
 <strong>Be sure you know which XFree86 server you will be using!</strong>
</p>

<ul>
 <li>
  <p> If you already have XDarwin installed from another source (XonX, hand-built, or
  any number of other places), install the "<b>system-xfree86</b>" package, so that
  fink knows you already have a set of XFree86 libraries and an X server.  </p>
 </li>
 <li>
  <p> If you are planning on using OroborOSX, you will still need the XFree86 libraries,
  and so we suggest you install "<b>xfree86-base</b>" along side your OroborOSX X
  server. </p>
 </li>
 <li>
  <p> If you have no XFree86 server installed at all, install
  "<b>xfree86-rootless</b>". </p>
 </li>
</ul>

<h1>Installing KDE On Fink</h1>

<p>
 First, make sure you are comfortable with the instructions on 
 building and/or installing packages in the <a
 href="http://fink.sourceforge.net/doc/users-guide/index.php">Fink User's Guide</a>.
 <font color="#ff0000">This is TFM!  If you get on the discussion list or IRC and ask
 a question that is already in the documentation, you are likely going to get pointed
 here.  Please read the documentation before asking questions.</font>
</p>

<p>
 There are two ways to install the KDE packages via Fink:
</p>
<ul>
 <li>
  <p>
   <strong>
	Install from source packages in the unstable tree.
   </strong>
  </p>
  <p>
   First of all, make sure you have the unstable distribution enabled in your fink
   configuration.  If you used the defaults when installing fink, just:
  </p>
  <p>
   <ol>
	<li> <p><strong> Add the unstable tree(s) to your /sw/etc/fink.conf. </strong></p>
	 <p> Add <b>"unstable/main"</b> (without the quotes) to the "<b>Trees:</b>"
	 line in fink.conf.  If US export laws allow it, you can add
	 <b>"unstable/crypto"</b> as well (required for HTTPS support in the Konqueror
	 browser). </p> </li>
	<li> <p><strong> Update your package index. </strong></p>
	 <p>Run "<b><tt>fink selfupdate-cvs</tt></b>" in a terminal window to get the
	 latest package descriptions from the fink site.  If this is your first time
	 running it, it may ask you some questions.  If you don't know what to answer,
	 the defaults are perfectly safe. </p> </li>
	<li> <p><strong> Install KDE. </strong></p>
         <p> First, install the XFree86 server you decided to use in the <b>Before
         You Start</b> section above, using "<b><tt>fink install
         &lt;your_choice&gt;</tt></b>". </p>
	 <p> Then, if you want to install the base KDE system, run "<b><tt>fink install
	 kdebase3</tt></b>" (or, if you have crypto support, "<b><tt>fink install
	 kdebase3-ssl</tt></b>").  If you want to build all of the official KDE
	 distribution that has been ported, there is a convenience package that
	 will build everything for you.  Just run "<b><tt>fink install
	 bundle-kde</tt></b>" (or "<b><tt>fink install bundle-kde-ssl</tt></b>").
         </p> </li>
	<li> <p><strong> Wait.  A long, long time. </strong></p>
	 <p> Seriously, building all of bundle-kde from scratch took over 24 hours
	 on a G4/800 with 640MB RAM.  This is not a small project to build -- if
	 you really want to build from source, be prepared to spend some time
	 doing something other than using your computer.  :) </p> </li>
   </ol>
  </p>
 </li>
 <li>
  <p>
   <strong>
	Install from pre-build binary packages with apt or dselect.
   </strong>
  </p>
  <ol>
  <li>
   <p>First add the following line to your <i>/sw/etc/apt/sources.list</i> file:</p>
   <p>
	 <nobr><b><tt>deb http://us.dl.sourceforge.net/fink/direct_download fink-kde main</tt></b></nobr>
   </p>
   <p>If export laws in the US allow exporting strong cryptography to your country,
   you can instead use this line which will allow you (besides other things) to access
   secure web pages in konqueror:
   </p>
   <p>
	 <nobr><b><tt>deb http://us.dl.sourceforge.net/fink/direct_download fink-kde main crypto</tt></b></nobr>
   </p>
  </li>
  <li>
   <p>Next, update your package cache by running <b><tt>sudo apt-get update</tt></b>. This
   will update the local list of all available binary packages.</p>
  </li>
  <li>
   If all went well, you should now be able to install any of the KDE packages. First,
   install the XFree86 server you decided to use in the <b>Before You Start</b> section
   above, using "<b><tt>sudo apt-get install &lt;your_choice&gt;</tt></b>".  Then, to
   install everything up to the the base set of packages required to run KDE
   apps, run "<b><tt>sudo apt-get install kdebase3</tt></b>" (or
   "<b><tt>sudo apt-get install kdebase3-ssl</tt></b>" if you enabled crypto support in step 1).
   If you want to install all of the official KDE packages that have been
   ported so far, run "<b><tt>sudo apt-get install bundle-kde</tt></b>" (or
   "<b><tt>sudo apt-get install bundle-kde-ssl</tt></b>").  Alternatively
   you can also select and install individual packages via the <b><tt>dselect</tt></b>
   command in an interactive fashion.
  </li>
  </ol>
 </li>
</ul>

<h1>Running KDE</h1>
<p>
 To start the KDE environment on MacOS X, all you need to do is make an
 <b><tt>~/.xinitrc</tt></b> file with the following line in it:
</p>
<p>
  <nobr><b><tt>source /sw/bin/init.sh</tt></b></nobr><br />
  <nobr><b><tt>/sw/bin/startkde</tt></b></nobr>
</p>
<p>
 (Note that you should always use init.sh, even if tcsh is your login shell.  The
 .xinitrc file is a bourne-shell script.)
</p>
<p>
 Then just start XFree86 (by running the <b>XDarwin</b> application in your
 "Applications" folder) and KDE should come up.  Dynamic loading in KDE is still
 pretty slow at the moment, so there are usually noticeable pauses in the amount
 of time KDE apps can take to start up if a library they use has not been loaded before.
</p>
<p>
 If you have problems starting, try changing your startkde line to:
</p>
<p>
 <nobr><b><tt>/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1</tt></b></nobr>
</p>
<p>
 ...and then check <b>/tmp/kde.log</b> for errors.
</p>
<p>
 <b>Tip</b>: to run KDE in rootless mode, disable desktop icons by starting the
 "Control Center" app, then going to "Desktop" and unchecking "Enable Icons on Desktop".
</p>
<h1>If You Have Problems...</h1>
<p>
 Before you do anything else, make sure you've read the documentation at
 <a href="http://fink.sourceforge.net/doc/">http://fink.sourceforge.net/doc/</a>,
 notably the parts on how to install and use packages with fink, dselect, and apt-get,
 and the documentation on installing and using XFree86.  If your questions are not
 answered there, please check the
 <a href="http://fink.sourceforge.net/lists/index.php">list archives</a> and
 <a href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">bug tracker</a>
 before posting questions.  You can also try the
 <b><a href="http://www.aquaflux.org/~fink/">#fink</a></b> channel on
 The <a href="http://www.openprojects.net/">OpenProjects IRC network</a>
 (<b>irc.openprojects.net</b>).  A number of the people involved in the
 KDE port usually hang out there.
</p>

<?
include "footer.inc";
?>
