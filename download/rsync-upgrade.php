<?
$title = "Switching to the Rsync Upgrade Method";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2003/10/13 01:06:14 $';

include "header.inc";
?>


<h1>Switching to the Rsync Upgrade Method</h1>

<p>
The fink package manager now offers upgrading via rsync, as
an alternative to the CVS upgrade method.  If you are having troubles
with CVS, though, 
you may not be able to use the CVS method to upgrade the package
manager!
</p><p>
If you are having difficulties upgrading, you should first obtain the source
tarball for fink (version 0.14.0 or later) at
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">the 
SourceForge File List page for Fink</a>.
Use <code> tar xfz </code> to unpack the tarball, then <code>cd</code>
into the directory it creates, and run the command
<code>./inject.pl</code>
</p>
<p>That should install the latest package manager.  Once it is installed,
running the command <code>fink selfupdate-rsync</code> will switch you
to the new method.  Once you have switched, you can do subsequent updates
with the simple command <code>fink selfupdate</code>
</p>


<?
include "footer.inc";
?>
