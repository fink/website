<?
$title = "F.A.Q. - Fink Usage";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/10/25 14:32:37';

$metatags = '<link rel="start" href="index.php" title="F.A.Q. Contents"><link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="comp-general.php" title="Compile Problems - General"><link rel="prev" href="relations.php" title="Relations with Other Projects">';

include "header.inc";
?>

<h1>F.A.Q. - Installing, Using and Maintaining Fink</h1>



<a name="what-packages"><div class="question"><p><b>Q: How can I find out what packages Fink supports?</b></p></div>
<div class="answer"><p><b>A:</b> 
Since Fink 0.2.3, there is the <tt><nobr>list</nobr></tt> command.
It produces a list of all packages known to your Fink installation.
Example:
</p><pre>fink list</pre><p>
If you're using the binary distribution, <tt><nobr>dselect</nobr></tt> gives
you a nice browsable listing of available packages.
Note that you must run it as root if you want to select and install
packages from within dselect.
</p><p>
There's also the <a href="http://fink.sourceforge.net/pdb/">package
database</a> at the website.
</p></div></a>

<a name="proxy"><div class="question"><p><b>Q: I'm behind a firewall. How do I
configure Fink to use an HTTP proxy?</b></p></div>
<div class="answer"><p><b>A:</b> 
The <tt><nobr>fink</nobr></tt> command supports explicit proxy settings that
are passed on to <tt><nobr>wget</nobr></tt> resp. <tt><nobr>curl</nobr></tt>.
If you were not asked for proxies on first time installation, you can
run <tt><nobr>fink configure</nobr></tt> to set it up.
You can also run that command at any time to reconfigure the
<tt><nobr>fink</nobr></tt> command.
These settings do not apply to <tt><nobr>apt-get</nobr></tt> and
<tt><nobr>dselect</nobr></tt>, though.
Investigations continue...
</p></div></a>

<a name="moving"><div class="question"><p><b>Q: Can I move Fink to another
location after installation?</b></p></div>
<div class="answer"><p><b>A:</b> 
No.
Well, of course you can move the files using mv or the Finder, but 99%
of the programs will stop working when you do.
That's because basically all Unix software depends on hardcoded paths
to find data files, libraries and other stuff.
</p></div></a>

<a name="moving-symlink"><div class="question"><p><b>Q: If I move Fink after
installation and provide a symlink from the old location, will it
work?</b></p></div>
<div class="answer"><p><b>A:</b> 
Maybe.
The general expectation is that it should work, but there may be
hidden traps somewhere.
</p></div></a>



<a name="kde"><div class="question"><p><b>Q: Why are there no packages for
KDE?</b></p></div>
<div class="answer"><p><b>A:</b> 
Because there simply are none.
</p><p>
Seriously, KDE has (or at least had) serious problems that prevent a
port to Mac OS X.
It assumes it can do things with shared libraries that are only
possible on ELF systems like Linux, *BSD and Solaris.
It could very well be that some people are trying to port it
nevertheless, but we haven't heard of any breakthroughs yet.
Note that Qt is a different story, we have a package for it and it
works fine.
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

<a name="dselect-access"><div class="question"><p><b>Q: Help! I used the
"[A]ccess" menu entry in dselect and now I can't download packages any
more!</b></p></div>
<div class="answer"><p><b>A:</b> 
You probably pointed apt at a Debian mirror, which of course doesn't
have the Fink files.
You can fix this manually or through dselect.
To fix it manually, edit the file
<tt><nobr>/sw/etc/apt/sources.list</nobr></tt> in a text editor as root.
Remove lines that mention debian.org and replace them with these:
</p><pre>deb http://fink.sourceforge.net/bindist relase main crypto
deb http://fink.sourceforge.net/bindist current main crypto</pre><p>
To fix it through dselect, run "[A]ccess" again, choose the "apt"
method and enter the following info:
</p><p>
URL: http://fink.sourceforge.net/bindist -
Distribution: release -
Components: main crypto
</p><p>
Then, say you want to add another source and repeat the process with
"current" instead of "release".
</p><p>
A fixed version of the apt package (which provides the configuration
script as a plug-in for dselect) is making it's way through CVS now.
</p></div></a>

<p align="right">
Next: <a href="comp-general.php">Compile Problems - General</a></p>


<?
include "footer.inc";
?>
