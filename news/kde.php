<?
$title = "KDE Support In Fink";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2005/06/03 19:43:08 $';

include "header.inc";
?>

<h1>KDE Support In Fink</h1>

<p>
 KDE support in Fink is reaching maturity, and there isn't much reason
 to refer to this page for special notes on installing it anymore.
</p>

<h1>Installation</h1>

<p>
 To install all of KDE, install either the <em>bundle-kde-ssl</em> or
 <em>bundle-kde</em> (if the law restricts the use of OpenSSL strong
 cryptography in your country) packages.
</p>

<p>
 For the latest instructions on configuring or removing the kde packages, the
 instructions in '<em>fink info bundle-kde</em>' should give you everything
 you need to know.  To see a list of available KDE packages, see the
 <a href="http://fink.sf.net/pdb/section.php/kde">KDE section of the
 package database</a>.
</p>
<p>
 If you are still running 3.0.7 or earlier (which do not have instructions in
 the fink info), here is a copy of the instructions at the time of this
 writing:
</p>

<pre>---[ Installation ]---------------------------------------------------

To install all of the official KDE packages, install "bundle-kde" or
"bundle-kde-ssl" (depending on whether crypotgraphic laws permit
downloading strong cryptography).  Unless you have a specific reason
not to, "bundle-kde-ssl" is suggested.

---[ Configuration ]--------------------------------------------------

To use KDE as your windowing system in XDarwin, create a file called
".xinitrc" in your home directory, containing the following line:

  source /sw/bin/init.sh
  /sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1

See http://fink.sourceforge.net/doc/x11/run-xfree86.php#xinitrc
for more information on the xinitrc files and how they work.

If you want to use Apple's X11 instead of the KDE window manager,
put the following line before the startkde line in .xinitrc:

  export KDEWM=quartz-wm

Note that depending on your version of Apple's X11, this can cause
strange resizing issues with the kicker (KDE task bar).

---[ Startup ]--------------------------------------------------------

Once you have created an ~/.xinitrc file, you should be able to start
KDE by clicking on the "XDarwin" icon in your Applications folder.  

NOTE: By default, X11 on Mac OS X runs in "rootless" mode, generally.
If you run KDE in rootless mode, it will take over your desktop with
a window that covers everything up.  You can remove this by disabling
desktop icons in the KDE control center.  Open the control center
(either from the "K" menu bar, or by typing "kcontrol" in an xterm)
then expand the "Desktop" list, click "Behavior", and uncheck the
"Show icons on desktop" checkbox.
   
---[ Removal ]--------------------------------------------------------
   
To remove all of the official KDE packages, you can remove the KDE
libraries and anything that depends on them by running, in a terminal:
   
  sudo apt-get remove kdelibs3-ssl-shlibs kdelibs3-shlibs

To remove an individual KDE package collection (like kdenetwork3 or
kdesdk3) you can generally remove [package]-base.  For example, to
remove all of the kdenetwork3 packages, run:

  sudo apt-get remove kdenetwork3-base
</pre>
 

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
 The <a href="http://www.freenode.net/">Freenode IRC network</a>
 (<b>irc.freenode.net</b>).  A number of the people involved in the
 KDE port usually hang out there.
</p>

<?
include "footer.inc";
?>
