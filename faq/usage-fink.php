<?
$title = "F.A.Q. - Fink Usage";
$cvs_author = 'Author: htodd';
$cvs_date = 'Date: 2003/10/25 01:08:06';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="comp-general.php" title="Compile Problems - General"><link rel="prev" href="upgrade-fink.php" title="Upgrading Fink (version-specific troubleshooting)">';

include "header.inc";
?>

<h1>F.A.Q. - 4 Installing, Using and Maintaining Fink</h1>


<a name="what-packages">
<div class="question"><p><b>Q4.1: How can I find out what packages
Fink supports?</b></p></div>
<div class="answer"><p><b>A:</b> 
Since Fink 0.2.3, there is the <code>list</code> command.
It produces a list of all packages known to your Fink installation.
Example:
</p><pre>fink list</pre><p>
If you're using the binary distribution, <code>dselect</code> gives
you a nice browsable listing of available packages.
Note that you must run it as root if you want to select and install
packages from within dselect.
</p><p>
There's also the <a href="http://fink.sourceforge.net/pdb/">package
database</a> at the website.
</p></div>
</a>
<a name="proxy">
<div class="question"><p><b>Q4.2: I'm behind a firewall. How do I
configure Fink to use an HTTP proxy?</b></p></div>
<div class="answer"><p><b>A:</b> The <code>fink</code> command supports explicit proxy settings that
are passed on to <code>wget</code>/<code>curl</code>.
If you were not asked for proxies on first time installation, you can
run <code>fink configure</code> to set it up.
You can also run that command at any time to reconfigure the
<code>fink</code> command.
If you followed the instructions in the installation guide, and use
<code>/sw/bin/init.csh</code> (or <code>/sw/bin/init.sh</code>),
then <code>apt-get</code> and <code>dselect</code> also will use these
proxy settings.  Make sure that you put the protocol in front of the proxy, e.g.</p><pre>ftp://proxy.yoursite.somewhere</pre><p>If you are still having problems, go into System Preferences, select the Network pane, select the Proxies tab, and make sure that the box labled "Use Passive FTP Mode (PASV)" is checked.</p></div>
</a>
<a name="firewalled-cvs">
<div class="question"><p><b>Q4.3: How do I update available packages from CVS when I am behind a firewall?</b></p></div>
<div class="answer"><p><b>A:</b> The package <b>cvs-proxy</b> can tunnel through HTTP proxies.</p><ul>
<li>
<p>First download the <a href="http://cvs.sourceforge.net/cgi-bin/viewcvs.cgi/fink/dists/10.2/unstable/main/finkinfo/devel/">cvs-proxy</a> files (an .info file and a .patch file) and place them into your local tree (i.e. /sw/fink/dists/local/main/finkinfo/).</p>
</li>
<li>
<p>Install the <b>cvs-proxy</b> package with the command:</p>
<p>
<code>fink install <b>cvs-proxy</b>
</code>
</p>
</li>
<li>
<p>Packages are then updated with the commands:</p>
<p>
<code>fink selfupdate-cvs</code>
</p>
<p>
<code>fink update-all</code>
</p>
</li>
</ul><p>If fink is not configured to use your proxy, change the settings using:</p><p>
<code>fink configure</code>.</p></div>
</a>
<a name="moving">
<div class="question"><p><b>Q4.4: Can I move Fink to another
location after installation?</b></p></div>
<div class="answer"><p><b>A:</b> 
No.
Well, of course you can move the files using mv or the Finder, but 99%
of the programs will stop working when you do.
That's because basically all Unix software depends on hardcoded paths
to find data files, libraries and other stuff.
</p></div>
</a>
<a name="moving-symlink">
<div class="question"><p><b>Q4.5: If I move Fink after
installation and provide a symlink from the old location, will it
work?</b></p></div>
<div class="answer"><p><b>A:</b> 
Maybe.
The general expectation is that it should work, but there may be
hidden traps somewhere.
</p></div>
</a>
<a name="removing">
<div class="question"><p><b>Q4.6: How can I remove all
of Fink?</b></p></div>
<div class="answer"><p><b>A:</b> 
Almost all files installed by Fink are in /sw (or wherever you chose
to install it).  Thus in order to get rid of Fink, enter this command:
</p><pre>sudo rm -rf /sw</pre><p>
The only exception to this rule is XFree86. If you also need to remove
XFree86, additionally enter this:
</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>
You also will want to remove the "source /sw/bin/init.csh" line you
added to your .cshrc file. To do this, type "pico ~/.cshrc". Navigate to
the "source /sw/bin/init.csh" line and type control-K to remove it. Then
type control-O, return, control-X to exit.
</p></div>
</a>
<a name="bindist">
<div class="question"><p><b>Q4.7: The package database at the
website lists package xxx, but apt-get and dselect know nothing about
it. Who's lying?</b></p></div>
<div class="answer"><p><b>A:</b> 
Both are correct.
The <a href="http://fink.sourceforge.net/pdb/">package database</a>
knows about every package, including those that are still in the
unstable section.
The <code>dselect</code> and <code>apt-get</code> tools on the other
hand only know about the packages available as precompiled binary
packages.
Many packages are not available in precompiled form through these
tools for a variety of reasons.
A package must be in the "stable" section of the latest point release
to be considered, and it must pass additional checks for policy
compliance as well as licensing and patent restrictions.
</p><p>
If you want to install a package that is not available via
<code>dselect</code> / <code>apt-get</code>, you have to compile it
from source using <code>fink install <b>packagename</b>
</code>.
Make sure you have the Developer Tools installed before you try this.
(If there is no installer for the Developer Tools in your
<code>/Applications</code> folder, you can get them from the <a href="http://connect.apple.com/">Apple Developer Connection</a> after
free registration.)
See also the question about unstable below.
</p></div>
</a>
<a name="unstable">
<div class="question"><p><b>Q4.8: There's this package in
unstable that I want to install, but the fink command just says 'no
package found'. How can I install it?</b></p></div>
<div class="answer"><p><b>A:</b> 
First make sure you understand what 'unstable' means.
Packages in there usually have not been tested at all, many have
problems or just won't compile.
That is why Fink doesn't search the unstable tree by default.
</p><p>
If you only want one or two specific packages, it is safer to copy
those .info files (and their associated .patch files, if there are
any) from <code>/sw/fink/dists/unstable/main/finkinfo</code>
to <code>/sw/fink/dists/local/main/finkinfo</code>.  However, note that your package may depend on other packages (or particular versions) which are also only in unstable.  You will have to move their .info and .patch files as well.</p><p>If you want Fink to use all of unstable, edit
<code>/sw/etc/fink.conf</code>, add
<code>unstable/main</code> and <code>unstable/crypto</code> 
to the beginning of the <code>Trees:</code>
line, and then run the command <code>fink index</code>.
</p></div>
</a>
<a name="sudo">
<div class="question"><p><b>Q4.9: I'm tired of typing my password into sudo again
and again. Is there a way around this?</b></p></div>
<div class="answer"><p><b>A:</b> If you're not paranoid, you can configure sudo to not ask you for a
password. To do this, edit <code>/etc/sudoers</code> as root
and add a line like this:</p><pre>username  ALL = NOPASSWD: ALL</pre><p>Replace <code>username</code> with your actual username, of course. This
line allows you to run any command via sudo without typing your
password.</p></div>
</a>
<a name="exec-init-csh">
<div class="question"><p><b>Q4.10: When I try to run
init.csh, I get a "Permission denied" error. What am I doing
wrong?</b></p></div>
<div class="answer"><p><b>A:</b> init.csh is not supposed to be run like normal commands. It
sets environment variables like PATH and MANPATH in your shell. To
have a lasting effect on the shell, it must be processed with the
<code>source</code> command, like this:</p><pre>source /sw/bin/init.csh</pre><p>The same goes for Bourne-type shells and init.sh.</p></div>
</a>
<a name="dselect-access">
<div class="question"><p><b>Q4.11: Help! I used the
"[A]ccess" menu entry in dselect and now I can't download packages any
more!</b></p></div>
<div class="answer"><p><b>A:</b> 
You probably pointed apt at a Debian mirror, which of course doesn't
have the Fink files.
You can fix this manually or through dselect.
To fix it manually, edit the file
<code>/sw/etc/apt/sources.list</code> in a text editor as root.
Remove lines that mention debian.org and replace them with these:
</p><pre>deb http://us.dl.sourceforge.net/fink/direct_download release main crypto
deb http://us.dl.sourceforge.net/fink/direct_download current main crypto</pre><p>
(Or if you live in Europe, you can use <code>eu.dl.sourceforge.net</code>
instead of <code>us.dl.sourceforge.net</code>)
</p><p>
To fix it through dselect, run "[A]ccess" again, choose the "apt"
method and enter the following info:
</p><p>
URL: http://us.dl.sourceforge.net/fink/direct_download -
Distribution: release -
Components: main crypto
</p><p>
Then, say you want to add another source and repeat the process with
"current" instead of "release".
</p><p>
A fixed version of the apt package (which provides the configuration
script as a plug-in for dselect) is making it's way through CVS now.
</p></div>
</a>
<a name="cvs-busy">
<div class="question"><p><b>Q4.12: When I try to run <q>fink selfupdate</q> or "fink selfupdate-cvs", I get the error "<code>Updating using CVS failed. Check the error messages above.</code>"</b></p></div>
<div class="answer"><p><b>A:</b> If the message is</p><pre>Can't exec "cvs": No such file or directory at 
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>then you need to install the Developer Tools.</p><p>If, on the other hand, the last line is</p><pre>### execution of su failed, exit code 1</pre><p>you'll need to look further back in the output to see the error.  If you see a message that your connection was refused:</p><pre>(Logging in to anonymous@cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to cvs.sourceforge.net:2401 failed:
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.</pre><p>or a message like the following:</p><pre>cvs [update aborted]: recv() from server cvs.sourceforge.net: 
Connection reset by peer
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.</pre><p>or</p><pre>cvs [update aborted]: End of file received from server</pre><p>or</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>then it's likely that the cvs servers are overloaded and you have to try the update later.</p><p>Another possibility is that you have some bad permissions in your CVS directories, in which case you get "Permission denied" messages:</p><pre>cvs update: in directory 10.2/stable/main:
cvs update: cannot open CVS/Entries for reading: No such file or  directory
cvs server: Updating 10.2/stable/main
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo:  No such file or directory
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.
</pre><p>In this case you need to reset your cvs directories. Use the command:</p><pre>sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {} \;
fink selfupdate-cvs</pre><p>If, you don't see either of the above messages, then this almost always means you've modified a file in your /sw/fink/dists tree and now the maintainer has changed it.  Look further back in the selfupdate-cvs output for lines that start with "C", like so:
</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
...
(other info and patch files)
...
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.</pre><p>The "C" means CVS had a conflict in trying to update the latest version.</p><p>The fix is to delete any files that show up as starting with "C" in the output of selfupdate-cvs, and try again.</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre></div>
</a>
<a name="kernel-panics">
<div class="question"><p><b>Q4.13: When I use fink, my whole machine 
freezes up/kernel panics/dies. Help!</b></p></div>
<div class="answer"><p><b>A:</b>  A number of recent reports on the 
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users
mailing list</a> have indicated problems (including kernel panics and
infinite hangs during patching) when using Fink to compile packages while
anti-virus software is installed.  You may need to switch off any anti-virus
software before using Fink.
</p></div>
</a>
<a name="not-found">
<div class="question"><p><b>Q4.14: I'm trying to install a package, but fink can't download it.  The download site shows a later version number of the package than what fink has.  What do I do?</b></p></div>
<div class="answer"><p><b>A:</b> The package sources get moved around by the upstream sites when new
versions are released.</p><p>The first thing you should do is run <code>fink selfupdate-cvs</code>.
It may be that the package maintainer has already fixed this, and you will
get an updated package description with either a more recent version or a
revised download URL.</p><p>If this doesn't work, please let the package maintainer (available from "<code>fink describe <b>packagename</b>
</code>") know that the URL is broken; not all maintainers read the mailing lists all of the time.</p><p>To get a usable source, first try hunting around the remote site in
other directories for the same version of the source that fink wants 
(e.g. in an "old"
directory).  Keep in mind, though, that some remote sites like to trash the
old versions of their packages.  If the official site doesn't have it, then
try a web search--sometimes there are unofficial sites that have the 
tarball you want.  Another place to look is <a href="http://us.dl.sf.net/fink/direct_download/source/">http://us.dl.sf.net/fink/direct_download/source/</a>, 
which is where Fink stores sourcefiles from packages that have been 
released in binary form.  If all of the above fail, then you might consider posting on the
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users
mailing list</a> to ask if anybody has the old source available to give
you. </p><p>Once you locate the proper source tarball, download it manually, and then move the file into your fink source location (i.e. for a default fink install, "<code>sudo mv <b>package-source.tar.gz</b> /sw/src/</code>".  Then use '<code>fink install <b>packagename</b>
</code>' as normal.</p><p>If you can't get the source file, then you'll have to wait for the maintainer to deal with the problem.  They may either post a link to the old source, or update the .info and .patch files to use the newer version.
</p></div>
</a>
<a name="fink-not-found">
<div class="question"><p><b>Q4.15: I've edited my .cshrc and started a new terminal, but I still get "command not found" errors when I run fink or anything that I installed with fink.</b></p></div>
<div class="answer"><p><b>A:</b> 
(This assumes you are using <code>tcsh</code>).  When <code>tcsh</code> is started, it first reads system-wide scripts, and then those for your user account.  It looks first for <code>~/.tcshrc</code>, and if that isn't found, <code>~/.cshrc</code>; note that if you have both, only <code>~/.tcshrc</code> gets run.</p><p>What has probably happened is that some application package (e.g. CodeWarrior) has created a <code>~/.tcshrc</code>, and therefore <code>~/.cshrc</code> isn't being read.  A good fix is to add the following line to <code>~/.tcshrc</code>:</p><pre>source ~/.cshrc</pre></div>
</a>
<a name="invisible-sw">
<div class="question"><p><b>Q4.16: I want to hide /sw in the Finder to keep users from damaging the fink setup.</b></p></div>
<div class="answer"><p><b>A:</b> You can indeed do this.  If you have the Development Tools installed, then you can run the following command:</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>This makes /sw invisible, just like the standard system folders (/usr, etc.).  If you don't have the Developer Tools, there are various third-party applications that let you manipulate file attributes--you need to set /sw to be invisible.</p></div>
</a>
<a name="install-info-bad">
<div class="question"><p><b>Q4.17: I can't install anything, because I get the following error: "install-info: unrecognized option `--infodir=/sw/share/info'"</b></p></div>
<div class="answer"><p><b>A:</b> This usually is due to a problem in your PATH.  In a terminal window type:</p><pre>printenv PATH</pre><p>If <code>/sw/sbin</code> doesn't appear at all, then you need to set your environment up as per the <a href="http://fink.sourceforge.net/doc/users-guide/install.php#setup">instructions</a> in the Users Guide.  If <code>/sw/sbin</code> is there, but there are other directories ahead of it (e.g. <code>/usr/local/bin</code>), then you will either want to reorder your PATH so that <code>/sw/sbin</code> is near the beginning, or if you really need the other directory to be before <code>/sw/sbin</code>, then you'll want to temporarily rename the other <code>install-info</code> when you use fink.</p></div>
</a>
<a name="bad-list-file">
<div class="question"><p><b>Q4.18: I can't install or remove anything, because of a problem with a "files list file".</b></p></div>
<div class="answer"><p><b>A:</b> Typically these errors take the form:</p><pre>files list file for package <b>packagename</b> contains empty filename</pre><p>or</p><pre>files list file for package <b>packagename</b> is missing final newline</pre><p>This can be fixed, with a little work.  If you have the .deb file for the offending package currently available on your system, then check its integrity by running</p><pre>dpkg --contents <b>full-path-to-debfile</b>
</pre><p>e.g.</p><pre>dpkg --contents /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</pre><p>If you get back a listing of directories and files, then your .deb is OK.  If the output is something other than directories and files, or if you don't have the .deb file, you can still proceed because the error doesn't interfere with builds.</p><p>If you have been installing from the binary distribution or you know for sure that the version in the binary distribution is the same as what you have installed (e.g. by checking the <a href="http://fink.sourceforge.net/pdb/index.php">package database</a>), then you can get a .deb file by running <code>sudo apt=get install --reinstall --download-only <b>packagename</b>
</code>. Otherwise you can build one yourself by running  <code>fink rebuild <b>packagename</b>
</code>, but it won't install yet.</p><p>Once you have a valid .deb file, then you can reconstitute the file.  First become root by using <code>sudo -s</code> (enter your administrative user password if necessary), and then use the following command (on one line--it's split for readability here):</p><pre>dpkg -c <b>full-path-to-debfile</b>
  | awk '{if ($6 == "./"){ print "/."; } else if (substr($6, length($6), 1) == "/")
    {print substr($6, 2, length($6) - 2); } else { print substr($6, 2, length($6) - 1);}}' 
  &gt; /sw/var/lib/dpkg/info/<b>packagename</b>.list</pre><p>e.g.</p><pre>dpkg -c /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb
  | awk '{if ($6 == "./") { print "/."; } else if (substr($6, length($6), 1) == "/")
   {print substr($6, 2, length($6) - 2); } else { print substr($6, 2, length($6) - 1);}}'
  &gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p>What this does is to extract the contents of the .deb file, remove everything but the filenames, and write these to the .list file.</p></div>
</a>
<a name="error-nineteen">
<div class="question"><p><b>Q4.19: When I use the Fink binary installer package, I get a big "19" in the window and can't install anything.</b></p></div>
<div class="answer"><p><b>A:</b> The number 19 appears because your OS X system is localized to a language
other than English. (This is a bug in Apple's Installer, that it doesn't
just show you the English-language error message.)</p><p>The English language error message corresponding to number 19 is</p><p>"A root directory /sw exists. Please see the Read Me file for update instructions, or for information on installing Fink on a separate volume."</p><p>You may be getting this error if you've used finkbefore, and didn't delete <code>/sw</code>.  If you haven't installed Fink before, the most likely cause of this
is that you installed the Virex program available for free to .Mac users.
As explained on Fink's webpage, Virex is incompatible with Fink (due to
the Virex folks having made errors in the way they set things up).</p></div>
</a>
<a name="dselect-garbage">
<div class="question"><p><b>Q4.20: I get a bunch of garbage when I select packages in <code>dselect</code>.  How can I use it?</b></p></div>
<div class="answer"><p><b>A:</b> There are issues between <code>dselect</code> and <code>Terminal.app</code>.  A workaround is to enter the following command</p><pre>setenv TERM xterm-color</pre><p>before you run <code>dselect</code>.</p></div>
</a>
<a name="perl-undefined-symbol">
<div class="question"><p><b>Q4.21: Why do I get a bunch of "dyld: perl undefined symbols" errors when I run Fink commands?</b></p></div>
<div class="answer"><p><b>A:</b> If you see an error sequence like the following:</p><pre>dyld: perl Undefined symbols:
_Perl_safefree
_Perl_safemalloc
_Perl_saferealloc
_Perl_sv_2pv
_perl_call_sv
_perl_eval_sv
_perl_get_sv</pre><p>then what has probably happened is that you updated Perl to a new version and now <code>storable-pm</code> needs to be updated.  
You should update Fink.  During the process you will be prompted to install either <code>perl-core</code> or <code>system-perl</code>; choose the latter. 
In addition, <code>storable-pm</code> should also get updated.</p><p>For OS 10.1.x, perform the following commands (you'll need the Developer Tools):</p><pre>sudo mv /sw/lib/perl5/darwin/Storable.pm /tmp
sudo mv /sw/lib/perl5/darwin/auto/Storable /tmp
fink rebuild storable-pm
fink selfupdate-cvs</pre></div>
</a>
<a name="cant-upgrade">
<div class="question"><p><b>Q4.22: I can't seem to update Fink's version.</b></p></div>
<div class="answer"><p><b>A:</b> THere are <a href="http://fink.sourceforge.net/download/fix-upgrade.php">special instructions</a> to follow under these circumstances.</p></div>
</a>
<a name="spaces-in-directory">
<div class="question"><p><b>Q4.23: Can I put Fink in a volume or directory with a space in its name?</b></p></div>
<div class="answer"><p><b>A:</b> We recommend against putting your Fink directory tree inside a directory with spaces in its name.  It's just not worth the hassle.</p></div>
</a>
<p align="right">
Next: <a href="comp-general.php">5 Compile Problems - General</a></p>


<?
include "footer.inc";
?>

