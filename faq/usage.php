<?
$title = "F.A.Q. - Usage";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/05/24 10:32:48 $';

$metatags = '<link rel="contents" href="index.php" title="FAQ Contents">
<link rel="start" href="index.php" title="FAQ Contents">
<link rel="prev" href="install.php" title="Installation">
<link rel="next" href="packages.php" title="Problems with certain packages">
';

include "header.inc";
?>


<h1>Fink F.A.Q. - Usage Questions</h1>

<p><a name="what-packages"><b>How can I find out what packages Fink supports?</b></a></p>

<p>For Fink 0.1.x, look in the fink/info directory, e.g.:
<pre>ls /sw/fink/info</pre></p>
<p>For Fink 0.2.x, you may want to try this:
<pre>find /sw/fink -name '*.info'</pre></p>

<p><a name="unstable"><b>There's this package in unstable that I want
to install, but Fink just says 'no package found'. How can I install
it?</b></a></p>

<p>First make sure you understand what 'unstable' means. Packages
in there usually have not been tested at all, many have problems or
just won't compile. That is why Fink doesn't search the unstable
tree by default.</p>
<p>If you only want one or two specific packages, it is safer
to copy those .info files (and their associated .patch files, if there
are any) from /sw/fink/dists/unstable/main/finkinfo to
/sw/fink/dists/local/main/finkinfo. If you want Fink to use all of
unstable, edit /sw/etc/fink.conf and add <tt>unstable/main</tt> to the
<tt>Trees:</tt> line.</p>

<p><a name="sudo"><b>I'm tired of typing my password into sudo again
and again. Is there a way around this?</b></a></p>

<p>If you're not paranoid, you can configure sudo to not ask you for a
password. To do this, edit /etc/sudoers as root and add a line like
this:
<pre>username  ALL = NOPASSWD: ALL</pre>
Replace <tt>username</tt> with your actual username, of course. This
line allows you to run any command via sudo without typing your
password.</p>


<?
include "footer.inc";
?>
