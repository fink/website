<?
$title = "Setting up Fink CVS access";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/03/15 22:35:46 $';

include "header.inc";
?>


<h1>Setting up Fink CVS access</h1>

<p>Since version 0.1.5, Fink is developed via CVS. This means that you
can stay up to date between releases and always get the newest
stuff. This page tells you how to set up an existing Fink installation
for updating via CVS.</p>

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


<?
include "footer.inc";
?>
