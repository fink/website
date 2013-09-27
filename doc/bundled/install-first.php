<?
$title = "Installation - First Time";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2013/07/09 02:28:43';
$metatags = '<link rel="contents" href="install.php" title="Installation Contents"><link rel="next" href="install-up03.php" title="Upgrading Fink"><link rel="prev" href="install-fast.php" title="The Fast Track">';

include_once "header.inc";
?>

<h1>Installation - 2 First Time Installation</h1>



<h2><a name="req">2.1 Requirements</a></h2>
<p>
You need:
</p>
<ul>
<li><p>
Development tools.  For 10.6, you should install Xcode 3.2.6 or 4.2, 
which can be downloaded from connect.apple.com after registering.
For 10.7 and 10.8, installing the Xcode Command Line Tools is mandatory to use 
the most current build applications. This can be installed either by downloading
it directly via connect.apple.com or through the Xcode application via the Components 
page of the Downloads tab of the Preferences.  On 10.7 one can install an earlier 
monolithic Xcode (4.2.1 and earlier), but this isn't recommended.
</p></li>
<li><p>On 10.7 and 10.8 you will need to install Java.  Entering</p>
<pre>javac</pre>
<p>from a Terminal.app window should suffice to make the system download it for you.</p></li>
<li><p>
Many other things that come with Mac OS X and the Developer Tools.
This includes perl and curl.
</p></li>
<li><p>
Internet access.
All source code is downloaded from mirror sites.
</p></li>
<li><p>
Patience.
Compiling several big packages takes time.
I'm talking hours or even days here.
</p></li>
</ul>


<h2><a name="directory">2.2 Choosing A Directory</a></h2>
<p>
Before you install, you must decide where Fink's directory hierarchy
will live. The recommended place is /sw, and all examples in this
document will use that. Any other directory should be fine as well, as
long as you don't use existing directories like /usr/local or
/usr. The bootstrap script tries to catch these.
</p>
<p>
The directory that you choose must not contain any spaces or similar characters.
Both Unix itself and the bulk of Unix software were written under this
assumption.
Using symlinks to trick the bootstrap script simply won't work.
</p>


<h2><a name="install">2.3 Installation</a></h2>
<p>
First, you need to unpack the fink-0.35.2.tar.gz tarball (it might also show up as <code>fink-0.35.2.tar</code> if you
used Safari to download it).  So, in a terminal window, go to the directory where you put the tarball, and run this
command:
</p>
<pre>tar xf fink-0.35.2.tar.gz</pre>
<p>
You now have a directory named fink-0.35.2.
Change to it with <code>cd fink-0.35.2</code>.
</p>
<p>
The actual installation is performed by the perl script
bootstrap.
So, to start installation, go to the fink-0.35.2 directory and run
this command:
</p>
<pre>./bootstrap</pre>
<p>
After running some tests, the script will ask you what method should
be used to gain root privileges.
The most useful choice is 'sudo'.
On a default install of Mac OS X, sudo is already enabled for the user
account created during installation.
The script will immediately use the method you choose to become root.
This is required for the installation.
</p>
<p>
Next, the script will ask you for the installation path.
See 'Choosing A Directory' above for hints about this.
The script will create the directory and set it up for the bootstrap
that will be done later.
</p>
<p>
Next up is Fink configuration.
The process should be self-explaining.
You will be asked how you want to set up
fink's build user account.  If you are on a networked system where
the users and groups are on a central server, you can select the
parameters manually--check with your network administrator as to
what to use.
You will also be asked about proxies--again, check with your network
administrator, and to select mirror sites for downloads.
If you don't know what to say, you can just press Return and Fink will
use a reasonable default value.
</p>
<p>
Finally, the script has enough information to conduct the bootstrap
process.
That means it will now download, build and install some essential
packages.
Don't worry if you see some packages apparently being compiled twice.
This is required because to build a binary package of the package
manager, you first must have the package manager available.
</p>
<p>Note:  on 10.8, after you start the install process you may see
dialog windows asking whether you want to install Xquartz.
If you want to do so, go ahead.  You won't have to stop the Fink install
to do that.</p>
<p>
After the bootstrap procedure finishes, run<code>/sw/bin/pathsetup.sh</code>
to help set up your shell environment for use with Fink.  In most cases, it will run
automatically, and prompt you for permission to make changes.  If
the script fails, you'll have to do things by hand (see below).</p>
<p>
(If you need to do things by hand, and you are using csh or tcsh,
you need to make sure that the command 
<code>source /sw/bin/init.csh</code> is executed during startup of
your shell, either by .login, .cshrc, .tcshrc, or something else
appropriate.  If you are using bash or similar shells, the command
you need is <code>. /sw/bin/init.sh</code>, and places where it
might get executed include .bashrc and .profile.)
</p>
<p>
Once your environment is set up, start a new terminal window to ensure that
the changes get implemented.  You will now need to have Fink download package
descriptions for you.</p>
<p>
You can use 
</p>
<pre>fink selfupdate-rsync</pre>
<p>
to download package descriptions using rsync.  This is the preferred option for
most users, since it is quick and there are multiple mirror sites available.
</p>
<p>
However, rsync is often blocked by network administrators.  If your firewall
doesn't allow you to use rsync, then you can try
</p>

<pre>fink selfupdate-cvs</pre>
<p>
to download package descriptions using cvs.  If you have an HTTP proxy set up, fink
will pass its information along to cvs.  Note: you can only use anonymous cvs (pserver)
through a proxy.
</p>
<p>
If you are using Xcode 4.3 or later, you should also run
</p>
<pre>
sudo xcodebuild -license
</pre>
<p>
and enter <b>agree</b> so that Fink's unprivileged user can build packages that need more than just the basic tools.
</p>
<p>
You can now use <code>fink</code> commands to install packages.
</p>
<pre>fink --help</pre>
<p>
is a useful place to get more information about how to use <code>fink</code>.
</p>


<h2><a name="x11">2.4 Getting X11 Sorted Out</a></h2>
<p>
Fink uses virtual packages to declare dependencies on X11.  As of
OS 10.6, we don't provide any packages of our own.  The supported options are:
</p>
<ul>
<li><p>10.6:  Only Apple's standard X11, since XQuartz installs in a different directory tree
(<code>/opt/X11</code>) than the standard X11 (<code>/usr/X11</code>) for
10.6 and later so that they can coexist.</p></li>
<li><p>10.7:  Only Apple's standard X11.</p></li>
<li><p>10.8:  Only Xquartz 2.7.2 and later.</p></li>
</ul>
<p>
For more information on installing and running X11, refer to the
online <a href="/doc/x11/">X11 on Darwin
and Mac OS X document</a>.
</p>


<p align="right">
Next: <a href="install-up03.php">3 Upgrading Fink</a></p>

<? include_once "footer.inc"; ?>
