<?
$title = "Fink CVS Access";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2003/11/04 10:08:40';

$metatags = '';

include "header.inc";
?>

<h1>Setting up Fink CVS Access</h1><p>Generated from <i>$Fink: cvs.xml,v 1.11 2003/11/04 10:08:40 dmacks Exp $</i></p>
<p>
Fink is developed via CVS.
This means that you can stay up to date between releases and always
get the newest stuff.
This page tells you how to set up an existing Fink installation for
updating via CVS.
The information on this page applies to Fink 0.3.x and later.
</p>
<h2><a name="">Fink CVS Structure</a></h2>
<p>Fink has several CVS modules. The module <code>dists</code> (<a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink/dists/">ViewCVS</a>)
contains the package descriptions and patches for OS X 10.2 and above. There are other modules
used by Fink developers, which anyone can view, but these are
not interesting for most users.</p>
<h2><a name="">Updating the Package Descriptions</a></h2>
<p>In the past this was a bit tedious procedure; but in the current Fink
versions, this is a very simple procedure. Just issue this command:
</p>
<pre>fink selfupdate-cvs</pre>
<p>Fink will perform all necessary steps automatically for you. This
includes retrieving the latest set of Package Descriptions, and updating
a few essential core packages (among them the Fink package manager).
</p>
<p>If you are behind a firewall consult <a href="http://fink.sourceforge.net/faq/usage-fink.php#proxy">FAQ 3.2</a>.
</p>
<p>After you have updated your package descriptions this way, you may
want to update your packages to the latest available versions. You can
do so by with the following command:
</p>
<pre>fink update-all</pre>
<h2><a name="">Updating the Package Manager</a></h2>
<p>
<b>Note:</b> As of September 20, 2001 it is no longer necessary to update
the package manager separately; it is treated like any other package.
It's still possible to update it directly from CVS, though this is
usually only interesting for people creating packages, not the average
user.
</p>

<p>The package manager must be updated through a separate directory
and the <code>inject.pl</code> script. That script puts package
descriptions and tarballs for the fink and base-files packages in your
Fink tree and builds them.</p>
<p>For the first time procedure, you need a temporary directory
(called <code>tempdir</code> in the example) which is empty (or at least
doesn't contain a subdirectory named 'fink'). The procedure goes like
this:</p>
<pre>cd tempdir
cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login
cvs -z3 -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co fink
cd fink
./inject.pl</pre>
<p>The login command will ask for a password - just press return. You
could delete the temporary directory after the procedure, but if you
leave it around, updating is easier the next time. The procedure is
then:</p>
<pre>cd tempdir/fink
cvs -z3 update -d
./inject.pl</pre>



<?
include "footer.inc";
?>

