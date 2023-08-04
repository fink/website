<?php
$title = "Installation - First Time";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/03 20:24:10';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Installation Contents"><link rel="next" href="install-up03.php?phpLang=en" title="Upgrading Fink"><link rel="prev" href="install-fast.php?phpLang=en" title="The Fast Track">';


include_once "header.en.inc";
?>
<h1>Installation - 2. First Time Installation</h1>



<h2><a name="req">2.1 Requirements</a></h2>
<p>
You need:
</p>
<ul>
<li><p>
An installed Mac OS X system, version 10.9 or later.
</p></li>
<li><p>
The Xcode Command Line Tools are mandatory. This package can be installed either by 
downloading it directly via developer.apple.com, or by running the</p>
<pre>xcode-select --install</pre>
<p>command and choosing the   
<b>Install</b> button in the window that pops up.
You may also need to use this command to update the tools,
especially if you're having build problems.</p>
<p>If you're doing a manual download, make sure that the tools you install match your
OS X version as well as your Xcode app version (if that is present).</p>
<p>You will need to accept the Xcode license as root.  To do that, run</p>
<pre>sudo xcodebuild -license</pre>
<p>then scroll to the bottom of the text and type</p>
<pre>agree</pre>q
<p>Some packages require the full Xcode.</p>
</li>
<li><p>Java.  Entering</p>
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
will live. The recommended place is /opt/sw, and all examples in this
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
First, you need to unpack the fink-0.45.6.tar.gz tarball (it might also show up as <code>fink-0.45.6.tar</code> if you
used Safari to download it).  So, in a terminal window, go to the directory where you put the tarball, and run this
command:
</p>
<pre>tar xf fink-0.45.6.tar.gz</pre>
<p>
You now have a directory named fink-0.45.6.
Change to it with <code>cd fink-0.45.6</code>.
</p>
<p>
The actual installation is performed by the perl script
bootstrap.
So, to start installation, go to the fink-0.45.6 directory and run
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
<p>Note:  on 10.8, 10.9, and 10.10, after you start the install process you may see
dialog windows asking whether you want to install XQuartz.
If you want to do so, go ahead.  You won't have to stop the Fink install
to do that.</p>
<p>
After the bootstrap procedure finishes, run<code>/opt/sw/bin/pathsetup.sh</code>
to help set up your shell environment for use with Fink.  In most cases, it will run
automatically, and prompt you for permission to make changes.  If
the script fails, you'll have to do things by hand (see below).</p>
<p>
(If you need to do things by hand, and you are using csh or tcsh,
you need to make sure that the command 
<code>source /opt/sw/bin/init.csh</code> is executed during startup of
your shell, either by .login, .cshrc, .tcshrc, or something else
appropriate.  If you are using bash or similar shells, the command
you need is <code>. /opt/sw/bin/init.sh</code>, and places where it
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
<li><p>10.9:  Only XQuartz 2.7.4 and later.</p></li>
<li><p>10.10-11:  Only XQuartz 2.7.7 and later.</p></li>
</ul>
<p>
For more information on installing and running X11, refer to the
online <a href="/doc/x11/">X11 on Darwin
and Mac OS X document</a>.
</p>


<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="install-up03.php?phpLang=en">3. Upgrading Fink</a></p>
<?php include_once "../../footer.inc"; ?>


