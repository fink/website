<?
$title = "Setting up Fink CVS Access";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/19 16:21:18 $';

include "header.inc";
?>


<h1>Setting up Fink CVS Access</h1>

<p>Fink is developed via CVS. This means that you can stay up to date
between releases and always get the newest stuff. This page tells you
how to set up an existing Fink installation for updating via
CVS. The information on this page applies to Fink 0.2.x. Instructions
for Fink 0.1.x have been <a href="cvs-01.php">archived.</a></p>

<h2>Fink CVS Structure</h2>

<p>Fink 0.2 has two CVS modules. The module <tt>fink</tt> (<a
href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink/fink/">ViewCVS</a>)
contains the package manager plus the stuff needed for bootstrap. The
module <tt>packages</tt> (<a
href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink/packages/">ViewCVS</a>)
contains the package descriptions and patches. In theory, these two
are separate entities and can be updated independently. In practice,
however, you should always keep both up to date because sometimes
packages (in the packages module) use new features in the package
manager (in the fink module) that have recently been added. They will
misbehave when those features are not supported...</p>

<h2>Updating the Package Manager</h2>

<p>The package manager must be updated through a separate directory
and the <tt>inject.pl</tt> script. That script puts package
descriptions and tarballs for the fink and base-files packages in your
Fink tree and builds them.</p>
<p>For the first time procedure, you need a temporary directory
(called <tt>tempdir</tt> in the example) which is empty (or at least
doesn't contain a subdirectory named 'fink'). The procedure goes like
this:</p>
<pre>  cd tempdir
  cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login
  cvs -z3 -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co fink
  cd fink
  ./inject.pl</pre>
<p>The login command will ask for a password - just press return. You
could delete the temporary directory after the procedure, but if you
leave it around, updating is easier the next time. The procedure is
then:</p>
<pre>  cd tempdir/fink
  cvs -z3 update -d
  ./inject.pl</pre>

<h2>Updating the Package Descriptions</h2>

<p>The procedure for the package descriptions is almost identical. The
main difference is that the <tt>inject.pl</tt> script just copies the
descriptions into your Fink installation. To build the new packages,
you must use regular fink commands, like <tt>fink update-all</tt> or
<tt>fink update <i>&lt;package&gt;</i></tt>.</p>
<p>The first time procedure:</p>
<pre>  cd tempdir
  cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login
  cvs -z3 -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co packages
  cd packages
  ./inject.pl</pre>
<p>After doing the above once, you can use this:</p>
<pre>  cd tempdir/packages
  cvs -z3 update -d
  ./inject.pl</pre>


<p><br>more to be written...</p>


<?
include "footer.inc";
?>
