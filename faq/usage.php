<?
$title = "F.A.Q. - Usage";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/09/16 15:34:49';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="packages.php" title="Problems With Certain Packages"><link rel="prev" href="install.php" title="Installation Questions">';

include "header.inc";
?>

<h1>F.A.Q. - Usage Questions</h1>



<a name="what-packages"><div class="question"><p><b>Q: How can I find out what packages Fink supports?</b></p></div>
<div class="answer"><p><b>A:</b> 
Since Fink 0.2.3, there is the <tt><nobr>list</nobr></tt> command.
It produces a list of all packages known to your Fink installation.
Example:
</p><pre>fink list</pre><p>
If you're using the binary distribution, <tt><nobr>dselect</nobr></tt> gives
you a nice browsable listing of available packages.
Note that you must run it as root if you want to select and install
packages from withing dselect.
</p><p>
There's also the <a href="http://fink.sourceforge.net/pdb/">package
database</a> at the website.
</p></div></a>

<a name="unstable"><div class="question"><p><b>Q: There's this package in
unstable that I want to install, but Fink just says 'no package
found'. How can I install it?</b></p></div>
<div class="answer"><p><b>A:</b> 
First make sure you understand what 'unstable' means.
Packages in there usually have not been tested at all, many have
problems or just won't compile.
That is why Fink doesn't search the unstable tree by default.
</p><p>
If you only want one or two specific packages, it is safer to copy
those .info files (and their associated .patch files, if there are
any) from <tt><nobr>/sw/fink/dists/unstable/main/finkinfo</nobr></tt>
to <tt><nobr>/sw/fink/dists/local/main/finkinfo</nobr></tt>.
If you want Fink to use all of unstable, edit
<tt><nobr>/sw/etc/fink.conf</nobr></tt> and add
<tt><nobr>unstable/main</nobr></tt> to the <tt><nobr>Trees:</nobr></tt>
line.
</p></div></a>

<a name="sudo"><div class="question"><p><b>Q: I'm tired of typing my password into sudo again
and again. Is there a way around this?</b></p></div>
<div class="answer"><p><b>A:</b> If you're not paranoid, you can configure sudo to not ask you for a
password. To do this, edit <tt><nobr>/etc/sudoers</nobr></tt> as root
and add a line like this:</p><pre>username  ALL = NOPASSWD: ALL</pre><p>Replace <tt><nobr>username</nobr></tt> with your actual username, of course. This
line allows you to run any command via sudo without typing your
password.</p></div></a>

<a name="exec-init-csh"><div class="question"><p><b>Q: When I try to run
init.csh, I get a "Permission denied" error. What am I doing
wrong?</b></p></div>
<div class="answer"><p><b>A:</b> init.csh is not supposed to be run like normal commands. It
sets environment variables like PATH and MANPATH in your shell. To
have a lasting effect on the shell, it must be processed with the
<tt><nobr>source</nobr></tt> command, like this:</p><pre>source /sw/bin/init.csh</pre><p>The same goes for Bourne-type shells and init.sh.</p></div></a>

<p align="right">
Next: <a href="packages.php">Problems With Certain Packages</a></p>


<?
include "footer.inc";
?>
