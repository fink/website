<?
$title = "Setting up Fink CVS access";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/04/20 15:20:29 $';

include "header.inc";
?>


<h1>Setting up Fink CVS access</h1>

<p>Since version 0.1.5, Fink is developed via CVS. This means that you
can stay up to date between releases and always get the newest
stuff. This page tells you how to set up an existing Fink installation
for updating via CVS. <b>The information on this page applies to Fink
0.1.x only.</b> Instructions for the 0.2.x series are not available
yet.</p>

<h2>Initial Setup</h2>

<p>Initially, you must replace the fink directory with one checked out
from CVS. Start by changing into the /sw (or equivalent)
directory. Move the existing fink directory out of the way (but don't
delete it yet):
<pre>  mv fink fink-old</pre>
Then, check out the current tree from CVS:
<pre>  cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login
  cvs -z3 -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co fink</pre>
The login command will ask for a password - just press return. The
second command creates a new fink directory containing the latest code
and packages. Now, copy back your Fink configuration file:
<pre>  cp fink-old/config fink</pre>
You're now ready to use Fink again. There will be some more files in
the fink directory, but they won't interfere with normal
operation. You can now run commands like
<pre>  fink update-all</pre>
to bring all packages up to the newest revision.</p>

<h2>Updating</h2>

<p>To update such an installation with the newest stuff, go to the
/sw/fink directory (or equivalent) and execute
<pre>  cvs -z3 update -d</pre>
Then, proceed as usual (e.g. fink update-all).</p>

<h2>Public Beta / Darwin 1.2 Branch</h2>

<p>The current release no longer works on Mac OS X Public Beta and
Darwin 1.2. The last version that worked has been tagged in CVS with
the tag &quot;pb_compat&quot;. To retrieve it, run
<pre>  cvs update -d -P -r pb_compat</pre>
Note that the tag is sticky, that is CVS will automatically use the
tag in future cvs update runs until you run &quot;cvs update
-A&quot;.</p>


<?
include "footer.inc";
?>
