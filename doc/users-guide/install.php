<?
$title = "User's Guide - Install";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/04/13 21:14:22';

$metatags = '<link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="next" href="packages.php" title="Installing Packages"><link rel="prev" href="intro.php" title="Introduction">';

include "header.inc";
?>

<h1>User's Guide - 2 First Time Installation</h1>




<p>
During first time installation, a base system with the package
management tools is installed on your machine.
After that you must set up your shell environment to use the software
installed by Fink.
You only need to do this once; you can upgrade any Fink installation
(starting with release 0.2.0) in place, without reinstalling.
This is covered in the <a href="upgrade.php">Upgrading
chapter</a>.
</p>
<p>
Once you have the package management tools installed, you can use them
to install more software.
This is covered in the <a href="packages.php">Installing Packages
chapter</a>.
</p>


<a name="bin"><h2>2.1 Installing the Binary Distribution</h2></a>
<p>
The binary distribution comes as a Mac OS X installer package (.pkg),
wrapped in a disk image (.dmg).
After downloading the disk image from the
<a href="http://fink.sourceforge.net/download/bindist.php">download page</a>
(you may have to use your browser's &quot;Save Target as...&quot; or &quot;Download
to Disk&quot; function), double-click it to mount it.
Open the &quot;Fink 0.x.x Installer&quot; disk icon that appears on your desktop
after Disk Copy has verified the file.
Inside you'll find some documentation and a installer package.
Double-click the installer package and follow the instructions on
screen.
</p>
<p>
You will be asked for an administrator password and shown some texts.
Please read them - they may be more up-to-date than this user's guide.
When the installer prompts you for a drive to install to, be sure to
pick your system volume (the one on which you installed Mac OS X).
If you pick the wrong volume, the install will proceed, but Fink won't
work afterwards.
When the installer is finished, proceed with the
<a href="#setup">Setting Up Your Environment</a> section.
</p>


<a name="src"><h2>2.2 Installing the Source Distribution</h2></a>
<p>
The source distribution comes as a standard Unix tarball (.tar.gz).
It contains only the <tt><nobr>fink</nobr></tt> package manager and its package
descriptions and will download the source for packages on the fly.
You can get it from the
<a href="http://fink.sourceforge.net/download/srcdist.php">download page</a>.
It is important that you don't use StuffIt Expander to extract the tar
archive.
For some reason StuffIt still can't handle long file names.
If StuffIt Expander already extracted the archive, throw away the
folder it created.
</p>
<p>
The source release must be installed from the command line, so open
Terminal.app and change to the directory where you put the
fink-0.x.x-full.tar.gz archive.
The following command extracts the archive:
</p>
<pre>tar -xzf fink-0.x.x-full.tar.gz</pre>
<p>
That creates a directory with the same name as the archive.
We'll just keep on using the placeholder <tt><nobr>fink-0.x.x-full</nobr></tt>
here.
Now, change into that directory and run the bootstrap script:
</p>
<pre>cd fink-0.x.x-full
./bootstrap.sh</pre>
<p>
The script will run some checks on your system and use sudo to become
root - that will prompt you for your password.
Then, the script will ask you for the installation path.
Unless you have a good reason, you should use the default -
<tt><nobr>/sw</nobr></tt>.
Only that will allow you to install downloaded binary packages later
on.
Also, all examples use that path; be sure to substitute your actual
path if you use a different one.
</p>
<p>
Next up is Fink configuration.
You'll be asked for things like proxy and mirror settings and whether
you want verbose messages.
If you don't understand a question, just press return to accept the
default choice.
You can re-run this process later using the <tt><nobr>fink
configure</nobr></tt> command.
</p>
<p>
When the bootstrap script has all the information it needs, it will
start to download the source code for the base system and compile it.
No further interaction should be necessary at this point.
Don't worry if you see some packages being compiled twice.
This is required because to build a binary package of the package
manager, you first must have the package manager available.
</p>
<p>
When the bootstrap is finished, proceed with the
<a href="#setup">Setting Up Your Environment</a> section.
</p>


<a name="setup"><h2>2.3 Setting Up Your Environment</h2></a>
<p>
To use the software installed in Fink's directory hierarchy, including
the package management programs themselves, you must set your PATH
environment variable (and some others) accordingly.
Shell scripts are provided to make this easy.
If you use tcsh (the default on Mac OS X), add the following line to
the file <tt><nobr>.cshrc</nobr></tt> in your home directory:
</p>
<pre>source /sw/bin/init.csh</pre>
<p>
If you don't know how to add the line, run these commands:
</p>
<pre>cd
pico .cshrc</pre>
<p>
You're not in a full-screen (well, full terminal window) text editor
and can simply start typing the <tt><nobr>source /sw/bin/init.csh</nobr></tt>
line.
It's okay if there is a note that says &quot;New file&quot;.
Be sure that you pressed Return at least once after the line, then
press Control-O, Return, Control-X to get out of the editor.
</p>
<p>
Editing .cshrc will only affect new shells (i.e. newly opened Terminal
windows), so you should also run this command in all Terminal windows
that you opened before you edited the file.
You'll also need to run <tt><nobr>rehash</nobr></tt> because tcsh caches the
list of available commands internally.
</p>
<p>
If you use a Bourne style shell (e.g. sh, bash, zsh), use
<tt><nobr>/sw/bin/init.sh</nobr></tt> instead.
The file to edit varies with the shell, although <tt><nobr>.profile</nobr></tt>
should work for all Bourne style shells.
</p>
<p>
Note that the scripts also add /usr/X11R6/bin and /usr/X11R6/man to
your path so you can use X11 when it is installed.
Fink packages have the ability to add settings of their own, e.g. the
qt package sets the QTDIR environment variable.
</p>
<p>
Once your environment is set up, proceed to the
<a href="packages.php">Installing Packages</a> chapter to see how
you can install some actually useful packages using the various
package management tools included in Fink.
</p>


<p align="right">
Next: <a href="packages.php">3 Installing Packages</a></p>


<?
include "footer.inc";
?>

