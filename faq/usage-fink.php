<?
$title = "F.A.Q. - Fink Usage";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/03/03 14:31:29';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="comp-general.php" title="Compile Problems - General"><link rel="prev" href="relations.php" title="Relations with Other Projects">';

include "header.inc";
?>

<h1>F.A.Q. - 3 Installing, Using and Maintaining Fink</h1>


<a name="what-packages">
<div class="question"><p><b>Q3.1: How can I find out what packages
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
<div class="question"><p><b>Q3.2: I'm behind a firewall. How do I
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
proxy settings.  Make sure that you put the protocol in front of the proxy, e.g.</p><pre>ftp://proxy.yoursite.somewhere</pre><p>If you are still having problems, go into System Preferences, select the Network pane, select the Proxies tab, and make sure that the box labled &quot;Use Passive FTP Mode (PASV)&quot; is checked.</p></div>
</a>
<a name="firewalled-cvs">
<div class="question"><p><b>Q3.3: How do I update available packages from CVS when I am behind a firewall?</b></p></div>
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
<div class="question"><p><b>Q3.4: Can I move Fink to another
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
<div class="question"><p><b>Q3.5: If I move Fink after
installation and provide a symlink from the old location, will it
work?</b></p></div>
<div class="answer"><p><b>A:</b> 
Maybe.
The general expectation is that it should work, but there may be
hidden traps somewhere.
</p></div>
</a>
<a name="removing">
<div class="question"><p><b>Q3.6: How can I remove all
of Fink?</b></p></div>
<div class="answer"><p><b>A:</b> 
Almost all files installed by Fink are in /sw (or wherever you chose
to install it).  Thus in order to get rid of Fink, enter this command:
</p><pre>sudo rm -rf /sw</pre><p>
The only exception to this rule is XFree86. If you also need to remove
XFree86, additionally enter this:
</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>
You also will want to remove the &quot;source /sw/bin/init.csh&quot; line you
added to your .cshrc file. To do this, type &quot;pico ~/.cshrc&quot;. Navigate to
the &quot;source /sw/bin/init.csh&quot; line and type control-K to remove it. Then
type control-O, return, control-X to exit.
</p></div>
</a>
<a name="kde">
<div class="question"><p><b>Q3.7: What is the status of KDE in Fink?</b></p></div>
<div class="answer"><p><b>A:</b> 
It works, but there's still plenty to do.
</p><p>
KDE is perfectly usable, but there are parts that still need porting
or tweaking.  There is a group working on finishing and maintaining the
port; for a report on the current status, see their <a href="http://www.opendarwin.org/cgi-bin/cvsweb.cgi/~checkout~/proj/KDE-Darwin/README.Darwin?rev=HEAD">README file.</a>
</p></div>
</a>
<a name="bindist">
<div class="question"><p><b>Q3.8: The package database at the
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
A package must be in the &quot;stable&quot; section of the latest point release
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
<div class="question"><p><b>Q3.9: There's this package in
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
to <code>/sw/fink/dists/local/main/finkinfo</code>.
If you want Fink to use all of unstable, edit
<code>/sw/etc/fink.conf</code>, add
<code>unstable/main</code> and <code>unstable/crypto</code> 
to the beginning of the <code>Trees:</code>
line, and then run the command <code>fink index</code>
</p></div>
</a>
<a name="sudo">
<div class="question"><p><b>Q3.10: I'm tired of typing my password into sudo again
and again. Is there a way around this?</b></p></div>
<div class="answer"><p><b>A:</b> If you're not paranoid, you can configure sudo to not ask you for a
password. To do this, edit <code>/etc/sudoers</code> as root
and add a line like this:</p><pre>username  ALL = NOPASSWD: ALL</pre><p>Replace <code>username</code> with your actual username, of course. This
line allows you to run any command via sudo without typing your
password.</p></div>
</a>
<a name="exec-init-csh">
<div class="question"><p><b>Q3.11: When I try to run
init.csh, I get a &quot;Permission denied&quot; error. What am I doing
wrong?</b></p></div>
<div class="answer"><p><b>A:</b> init.csh is not supposed to be run like normal commands. It
sets environment variables like PATH and MANPATH in your shell. To
have a lasting effect on the shell, it must be processed with the
<code>source</code> command, like this:</p><pre>source /sw/bin/init.csh</pre><p>The same goes for Bourne-type shells and init.sh.</p></div>
</a>
<a name="dselect-access">
<div class="question"><p><b>Q3.12: Help! I used the
&quot;[A]ccess&quot; menu entry in dselect and now I can't download packages any
more!</b></p></div>
<div class="answer"><p><b>A:</b> 
You probably pointed apt at a Debian mirror, which of course doesn't
have the Fink files.
You can fix this manually or through dselect.
To fix it manually, edit the file
<code>/sw/etc/apt/sources.list</code> in a text editor as root.
Remove lines that mention debian.org and replace them with these:
</p><pre>
deb http://us.dl.sourceforge.net/fink/direct_download release main crypto
deb http://us.dl.sourceforge.net/fink/direct_download current main crypto</pre><p>
(Or if you live in Europe, you can use <code>eu.dl.sourceforge.net</code>
instead of <code>us.dl.sourceforge.net</code>)
</p><p>
To fix it through dselect, run &quot;[A]ccess&quot; again, choose the &quot;apt&quot;
method and enter the following info:
</p><p>
URL: http://us.dl.sourceforge.net/fink/direct_download -
Distribution: release -
Components: main crypto
</p><p>
Then, say you want to add another source and repeat the process with
&quot;current&quot; instead of &quot;release&quot;.
</p><p>
A fixed version of the apt package (which provides the configuration
script as a plug-in for dselect) is making it's way through CVS now.
</p></div>
</a>
<a name="selfupdate-tar-fails">
<div class="question"><p><b>Q3.13: Why doesn't 'fink selfupdate'
work?</b></p></div>
<div class="answer"><p><b>A:</b> When using fink selfupdate to update from 0.3.2 (not 0.3.2a), selfupdate may
freeze during the &quot;untar&quot; phase. This will result in fink hanging after the output:</p><pre>I will now download the package descriptions for Fink 0.3.2 and
update the core packages. After that, you should update the other
packages using commands like 'fink update-all'.

curl -L -s -S -O http://prdownloads.sourceforge.net/fink/packages-0.3.2.tar.gz
tar -xzf -</pre><p>This is a known bug in 0.3.2 that was fixed in 0.3.2a. If you encounter this 
problem, there are two easy workarounds:</p><ul>
<li>
<p>Downgrade to a previous version of fink, then run</p>
<pre>fink selfupdate</pre>
</li>
<li>
<p>Manually install the latest version of the package manager. Go to the
    <a href="http://fink.sourceforge.net/download/srcdist.php">source release
    download page</a> and get the latest version, then update like this:</p>
<pre>tar -xzf fink--full.tar.gz
cd fink--full/
./inject.pl /sw
cd pkginfo
./inject.pl /sw</pre>
</li>
</ul><p>Or, if you are happy with modifying a file in the distribution manually, you can
edit line 479 of <code>/sw/lib/perl5/Fink/SelfUpdate.pm</code> and change:</p><pre>$unpack_cmd = &quot;tar -xz${verbosity}f -&quot;;</pre><p>to</p><pre>$unpack_cmd = &quot;tar -xz${verbosity}f $pkgtarball&quot;;</pre><p>It is always a good idea to make a backup of any file before modifying it.</p></div>
</a>
<a name="cvs-busy">
<div class="question"><p><b>Q3.14: When I try to run &quot;fink selfupdate&quot; or &quot;fink selfupdate-cvs&quot;, I get the error &quot;<code>Updating using CVS failed. Check the error messages above.</code>&quot;
		</b></p></div>
<div class="answer"><p><b>A:</b> If the message is</p><pre>Can't exec &quot;cvs&quot;: No such file or directory at 
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>then you need to install the Developer Tools.</p><p>If, on the other hand, the last line is</p><pre>### execution of su failed, exit code 1</pre><p>you'll need to look further back in the output to see the error.  If you see a message that your connection was refused:</p><pre>
(Logging in to anonymous@cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to cvs.sourceforge.net:2401 failed:
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.
		</pre><p>or a message like the following:</p><pre>cvs [update aborted]: recv() from server cvs.sourceforge.net: 
Connection reset by peer
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.</pre><p>or</p><pre>cvs [update aborted]: End of file received from server</pre><p>or</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>then it's likely that the cvs servers are overloaded and you have to try the update later.</p><p>Another possibility is that you have some bad permissions in your CVS directories, in which case you get &quot;Permission denied&quot; messages:</p><pre>
cvs update: in directory 10.2/stable/main:
cvs update: cannot open CVS/Entries for reading: No such file or  directory
cvs server: Updating 10.2/stable/main
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo:  No such file or directory
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.
</pre><p>In this case you need to reset your cvs directories. Use the command:</p><pre> 
sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {} \;
fink selfupdate-cvs
		</pre><p>If, you don't see either of the above messages, then this almost always means you've modified a file in your /sw/fink/dists tree and now the maintainer has changed it.  Look further back in the selfupdate-cvs output for lines that start with &quot;C&quot;, like so:
</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
...
(other info and patch files)
...
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.</pre><p>The &quot;C&quot; means CVS had a conflict in trying to update the latest version.</p><p>The fix is to delete any files that show up as starting with &quot;C&quot; in the output of selfupdate-cvs, and try again.</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre></div>
</a>
<a name="kernel-panics">
<div class="question"><p><b>Q3.15: When I use fink, my whole machine 
freezes up/kernel panics/dies. Help!</b></p></div>
<div class="answer"><p><b>A:</b>  A number of recent reports on the 
<a href="http://www.mail-archive.com/fink-users@lists.sourceforge.net/">fink-users
mailing list</a> have indicated problems (including kernel panics and
infinite hangs during patching) when using Fink to compile packages while
anti-virus software is installed.  You may need to switch off any anti-virus
software before using Fink.
</p></div>
</a>
<a name="cant-login-anymore">
<div class="question"><p><b>Q3.16: I ran the fink-0.4.1 installer and now I can't log in to my machine!</b></p></div>
<div class="answer"><p><b>A:</b> This is fixed now, but there was a <a href="http://fink.sourceforge.net/news/index.php">problem</a> wherein if one used the 0.4.1 installer twice some key system permissions got screwed up.  Fortunately, this problem can be fixed.</p><p>Perform the follwing sequence of operations:</p><p>1.  Start up in Single-User Mode (press and hold the Command-S key combination during startup until white text appears).</p><p>2.  When the command line appears, do the following commands:</p><pre>
fsck -y
mount -uw
chmod 1775 /
reboot
</pre><p>3.  Your system should reboot.  Once it does, you should perform &quot;<code>sudo rm -rf /Library/Receipts/Fink 0.4.1 Installer.pkg</code>&quot; to prevent this from happening again.</p></div>
</a>
<a name="not-found">
<div class="question"><p><b>Q3.17: I'm trying to install a package, but fink can't download it.  The download site shows a later version number of the package than what fink has.  What do I do?</b></p></div>
<div class="answer"><p><b>A:</b> The package sources get moved around by the upstream sites when new
versions are released.</p><p>The first thing you should do is run <code>fink selfupdate-cvs</code>.
It may be that the package maintainer has already fixed this, and you will
get an updated package description with either a more recent version or a
revised download URL.</p><p>If this doesn't work, please let the package maintainer (available from &quot;<code>fink describe <b>packagename</b>
</code>&quot;) know that the URL is broken; not all maintainers read the mailing lists all of the time.</p><p>To get a usable source, first try hunting around the remote site in
other directories for the same version of the source that fink wants 
(e.g. in an &quot;old&quot;
directory).  Keep in mind, though, that some remote sites like to trash the
old versions of their packages.  If the official site doesn't have it, then
try a web search--sometimes there are unofficial sites that have the 
tarball you want.  Another place to look is <a href="http://us.dl.sf.net/fink/direct_download/source/">http://us.dl.sf.net/fink/direct_download/source/</a>, 
which is where Fink stores sourcefiles from packages that have been 
released in binary form.  If all of the above fail, then you might consider posting on the
<a href="http://www.mail-archive.com/fink-users@lists.sourceforge.net/">fink-users
mailing list</a> to ask if anybody has the old source available to give
you. </p><p>Once you locate the proper source tarball, download it manually, and then move the file into your fink source location (i.e. for a default fink install, &quot;<code>sudo mv <b>package-source.tar.gz</b> /sw/src/</code>&quot;.  Then use '<code>fink install <b>packagename</b>
</code>' as normal.</p><p>If you can't get the source file, then you'll have to wait for the maintainer to deal with the problem.  They may either post a link to the old source, or update the .info and .patch files to use the newer version.
</p></div>
</a>
<a name="fink-not-found">
<div class="question"><p><b>Q3.18: I've edited my .cshrc and started a new terminal, but I still get &quot;command not found&quot; errors when I run fink or anything that I installed with fink.</b></p></div>
<div class="answer"><p><b>A:</b> 
(This assumes you are using <code>tcsh</code>).  When <code>tcsh</code> is started, it first reads system-wide scripts, and then those for your user account.  It looks first for <code>~/.tcshrc</code>, and if that isn't found, <code>~/.cshrc</code>; note that if you have both, only <code>~/.tcshrc</code> gets run.</p><p>What has probably happened is that some application package (e.g. CodeWarrior) has created a <code>~/.tcshrc</code>, and therefore <code>~/.cshrc</code> isn't being read.  A good fix is to add the following line to <code>~/.tcshrc</code>:</p><pre>source ~/.cshrc</pre></div>
</a>
<a name="invisible-sw">
<div class="question"><p><b>Q3.19: I want to hide /sw in the Finder to keep users from damaging the fink setup.</b></p></div>
<div class="answer"><p><b>A:</b> You can indeed do this.  If you have the Development Tools installed, then you can run the following command:</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>This makes /sw invisible, just like the standard system folders (/usr, etc.).  If you don't have the Developer Tools, there are various third-party applications that let you manipulate file attributes--you need to set /sw to be invisible.</p></div>
</a>
<a name="install-info-bad">
<div class="question"><p><b>Q3.20: I can't install anything, because I get the following error: &quot;install-info: unrecognized option `--infodir=/sw/share/info'&quot;</b></p></div>
<div class="answer"><p><b>A:</b> This usually is due to a problem in your PATH.  In a terminal window type:</p><pre>printenv PATH</pre><p>If <code>/sw/sbin</code> doesn't appear at all, then you need to set your environment up as per the <a href="http://fink.sourceforge.net/doc/users-guide/install.php#setup">instructions</a> in the Users Guide.  If <code>/sw/sbin</code> is there, but there are other directories ahead of it (e.g. <code>/usr/local/bin</code>), then you will either want to reorder your PATH so that <code>/sw/sbin</code> is near the beginning, or if you really need the other directory to be before <code>/sw/sbin</code>, then you'll want to temporarily rename the other <code>install-info</code> when you use fink.</p></div>
</a>
<a name="bad-list-file">
<div class="question"><p><b>Q3.21: I can't install or remove anything, because of a problem with a &quot;files list file&quot;.</b></p></div>
<div class="answer"><p><b>A:</b> Typically these errors take the form:</p><p>
<code>files list file for package <b>packagename</b> contains empty filename</code>
</p><p>or</p><p>
<code>files list file for package <b>packagename</b> is missing final newline</code>
</p><p>This can be fixed, with a little work.  If you have the .deb file for the offending package currently available on your system, then check its integrity by running</p><p>
<code>dpkg --contents <b>full-path-to-debfile</b>
</code>
</p><p>e.g.</p><p>
<code>dpkg --contents /sw/fink/10.2/unstable/main/binary-darwin-powerpc/gnome/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</code>
</p><p>If you get back a listing of directories and files, then your .deb is OK.  If the output is something other than directories and files, or if you don't have the deb file, you can still proceed because the error doesn't interfere with builds.  Just use <code>fink rebuild <b>packagename</b>
</code>, to build the .deb--it won't install yet, though.</p><p>Once you have a valid .deb file, then you can reconstitute the file.  First become root by using <code>sudo -s</code> (enter your administrative user password if necessary), and then use the following command (on one line--it's split for readability here):</p><p>
<code># dpkg -c <b>full-path-to-debfile</b>
</code>
</p><p>
<code>| awk '{if ($6 == &quot;./&quot;){ print &quot;/.&quot;; } else if (substr($6, length($6), 1) == &quot;/&quot;)</code>
</p><p>
<code> {print substr($6, 2, length($6) - 2); } else { print substr($6, 2, length($6) - 1);}}' </code>
</p><p>
<code>&gt; /sw/var/lib/dpkg/info/<b>packagename</b>.list</code>
</p><p>e.g.</p><p>
<code># dpkg -c /sw/fink/10.2/unstable/main/binary-darwin-powerpc/gnome/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</code>
</p><p>
<code>| awk '{if ($6 == &quot;./&quot;) { print &quot;/.&quot;; } else if (substr($6, length($6), 1) == &quot;/&quot;)</code>
</p><p>
<code>{print substr($6, 2, length($6) - 2); } else { print substr($6, 2, length($6) - 1);}}'</code>
</p><p>
<code>&gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</code>
</p><p>What this does is to extract the contents of the .deb file, remove everything but the filenames, and write these to the .list file.</p></div>
</a>
<p align="right">
Next: <a href="comp-general.php">4 Compile Problems - General</a></p>


<?
include "footer.inc";
?>

