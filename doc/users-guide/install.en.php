<?
$title = "User's Guide - Install";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2007/05/29 03:58:51';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="User\'s Guide Contents"><link rel="next" href="packages.php?phpLang=en" title="Installing Packages"><link rel="prev" href="intro.php?phpLang=en" title="Introduction">';


include_once "header.en.inc";
?>
<h1>User's Guide - 2. First Time Installation</h1>
    
    
    
      <p>
During first time installation, a base system with the package
management tools is installed on your machine.
After that you must set up your shell environment to use the software
installed by Fink.
You only need to do this once; you can upgrade any Fink installation
(starting with release 0.2.0) in place, without reinstalling.
This is covered in the <a href="upgrade.php?phpLang=en">Upgrading
chapter</a>.
</p>
      <p>
Once you have the package management tools installed, you can use them
to install more software.
This is covered in the <a href="packages.php?phpLang=en">Installing Packages
chapter</a>.
</p>
    
    <h2><a name="bin">2.1 Installing the Binary Distribution</a></h2>
      
      <p>
The binary distribution comes as a Mac OS X installer package (.pkg),
wrapped in a disk image (.dmg).
After downloading the disk image from the
<a href="http://www.finkproject.org/download/bindist.php">download page</a>
(you may have to use your browser's "Save Target as..." or "Download
to Disk" function), double-click it to mount it.
Open the "Fink 0.x.x Installer" disk icon that appears on your desktop (or wherever you downloaded it) after Disk Utility (Disk Copy for OS versions prior to 10.3) has verified the file.
Inside you'll find some documentation and an installer package.
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
    
    <h2><a name="src">2.2 Installing the Source Distribution</a></h2>
      
      <p>
The source distribution comes as a standard Unix tarball (.tar.gz).
It contains only the <code>fink</code> package manager and its package
descriptions and will download the source for packages on the fly.
You can get it from the
<a href="http://www.finkproject.org/download/srcdist.php">download page</a>.
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
(Note: If you have OS X 10.4 and XCode 2.1, you should use
<code>fink-0.8.0-full-XCode-2.1.tar.gz</code> instead, and make
the appropriate changes below.)
The following command extracts the archive:
</p>
      <pre>tar -xzf fink-0.x.x-full.tar.gz</pre>
      <p>
That creates a directory with the same name as the archive.
We'll just keep on using the placeholder <code>fink-0.x.x-full</code>
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
<code>/sw</code>.
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
You can re-run this process later using the <code>fink
configure</code> command.
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
    
    <h2><a name="setup">2.3 Setting Up Your Environment</a></h2>
      
      <p>
To use the software installed in Fink's directory hierarchy, including
the package management programs themselves, you must set your PATH
environment variable (and some others) accordingly.
In most cases, you can do this by entering the command
      </p>
      <pre>/sw/bin/pathsetup.sh</pre>
      <p>
	in a terminal window. </p>
      <p>Note that for some older versions of
	fink the program was called  <code>pathsetup.command</code>, and one could
	run it via <code>open /sw/bin/pathsetup.command</code>.      </p>
      <p>However, if this doesn't work for some reason, you can configure it
manually.  This will depend on the shell you are using, however.
You can determine the shell you are using by opening a terminal and
running the command:
</p>
      <pre>echo $SHELL</pre>
      <p>
 If it says "csh" or "tcsh" in it, you are using the C shell.  If it is
 bash, zsh, sh, or something similar, you are likely running a variant
 of the bourne shell.
</p>
      <ul>
        <li>
          <p>
            Bourne Shell (default on Mac OS X 10.3 and later) </p>
          <p>
   If you use a Bourne style shell (e.g. sh, bash, zsh), add the following
   lines to the file <code>.profile</code> in your home directory (or, if
   you have an existing <code>.bash_profile</code> file, you should use that
   instead):
  </p>
          <pre>. /sw/bin/init.sh</pre>
          <p>
   If you don't know how to add the line, run these commands:
  </p>
          <pre>cd
pico .profile</pre>
          <p>
   You are now in a full-screen (well, full terminal window) text editor and
   can simply start typing the <code>. /sw/bin/init.sh</code> line.  It's
   okay if there is a note that says "New file".  Be sure that you pressed
   Return at least once after the line, then press Control-O, Return,
   Control-X to get out of the editor.
  </p>
        </li>
        <li>
          <p>
            C Shell (default on Mac OS X 10.2 and earlier) </p>
          <p>
   If you use tcsh, add the following line to
   the file <code>.cshrc</code> in your home directory:
  </p>
          <pre>source /sw/bin/init.csh</pre>
          <p>
   If you don't know how to add the line, run these commands:
  </p>
          <pre>cd
pico .cshrc</pre>
          <p>
   You are now in a full-screen (well, full terminal window) text editor
   and can simply start typing the <code>source /sw/bin/init.csh</code>
   line.
   It's okay if there is a note that says "New file".
   Be sure that you pressed Return at least once after the line, then
   press Control-O, Return, Control-X to get out of the editor.
  </p>
          <p>There are a couple of common situations where you may need to edit additional files:</p>
          <ol>
            <li>
              <p>You have a <code>~/.tcshrc</code>.</p>
              <p>Such a file occasionally gets created by third-party applications, or 
  you may have done it yourself.
  In any case what will happen is that <code>~/.tcshrc</code> gets read and 
  <code>~/.cshrc</code> is ignored.
  The recommended procedure is to edit <code>~/.tcshrc</code> in a similar 
  manner to how you edited
  <code>~/.cshrc</code> above, and add the following line at the end:</p>
              <pre>source ~/.cshrc</pre>
              <p>That way, if you ever need to remove <code>~/.tcshrc</code>, you will be able to run Fink.</p>
            </li>
            <li>
              <p>You followed the instructions under <code>/usr/share/tcsh/examples/README</code>.</p>
              <p>These instructions tell you to create a <code>~/.tcshrc</code> and a<code> ~/.login</code> .  The problem in this case is with <code>~/.login</code>, which gets run after <code>~/.tcshrc</code>, and sources <code>/usr/share/tcsh/examples/login</code>.  The latter contains a line that overwrites your previous PATH setup.  What you should do in this case is create <code>~/Library/init/tcsh/path</code>:</p>
              <pre>mkdir -p ~/Library/init/tcsh
  pico ~/library/init/tcsh/path</pre>
              <p>and put:</p>
              <pre>source ~/.cshrc</pre>
              <p>in it.  You should also modify your .tcshrc as in item 1 above, to make sure that your PATH is set correctly for situations where <code>~/.login</code> doesn't get read.</p>
            </li>
          </ol>
          <p>
  Editing .cshrc (and other startup files) will only affect new shells (i.e. newly opened Terminal
  windows), so you should also run this command in all Terminal windows
  that you opened before you edited the file.
  You'll also need to run <code>rehash</code> because tcsh caches the
  list of available commands internally.
  </p>
        </li>
      </ul>
      <p>
Note that the <code>init.sh</code> and <code>init.csh</code> scripts also add <code>/usr/X11R6/bin</code> and
<code>/usr/X11R6/man</code> to your PATH so you can use X11 when
it is installed.
Fink packages have the ability to add settings of their own, e.g. the
qt package sets the QTDIR environment variable.
</p>
      <p>
Once your environment is set up, proceed to the
<a href="packages.php?phpLang=en">Installing Packages</a> chapter to see how
you can install some actually useful packages using the various
package management tools included in Fink.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="packages.php?phpLang=en">3. Installing Packages</a></p>
<? include_once "../../footer.inc"; ?>


