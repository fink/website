<?
$title = "KDE Support In Fink";
$cvs_author = '$Author: dmalloc $';
$cvs_date = '$Date: 2004/07/22 07:34:00 $';

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
downloading strong cryptography).

---[ Configuration ]--------------------------------------------------

To use KDE as your windowing system in XDarwin, create a file called
".xinitrc" in your home directory, with the following commands (it is
safe to cut and paste these):

  echo "source /sw/bin/init.sh" &gt; ~/.xinitrc
  echo "/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1" &gt;&gt; ~/.xinitrc

Note that this will overwrite an existing .xinitrc file!

---[ Startup ]--------------------------------------------------------

Once you have created an ~/.xinitrc file, you should be able to start
KDE by clicking on the "XDarwin" icon in your Applications folder.

NOTE: If you plan on running in rootless mode, you will likely want to
disable desktop icons, or else the root window desktop will cover up
your Aqua destkop.  You can do this by starting the KDE control
center, expanding the "Desktop" list, click "Behavior", and uncheck
the "Enable icons on desktop" checkbox.

---[ Removal ]--------------------------------------------------------

To remove all of the official KDE packages, you can remove aRts and
anything that depends on it, by running (in a terminal):

  sudo apt-get remove arts
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
