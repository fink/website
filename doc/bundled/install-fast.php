<?
$title = "Installation - Fast Track";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2003/06/22 15:35:13';

$metatags = '<link rel="contents" href="install.php" title="Installation Contents"><link rel="next" href="install-first.php" title="First Time Installation"><link rel="prev" href="install.php" title="Installation Contents">';

include "header.inc";
?>

<h1>Installation - 1 The Fast Track</h1>




<p>
This section is for the impatient who don't want to take the time to
learn their way around the command line world and don't care that they
don't know what they're actually doing.
</p>
<p>
If you're looking for the real instructions, skip to the <a href="install-first.php">next section</a>.
(You can still use this section as an example.)
</p>



<h2><a name="install">1.1 First Time Installation Fast
Track</a></h2>
<p>
Start out by copying the <code>fink-0.5.2-full.tar.gz</code>
file to your home folder.
Then, open Terminal.app and follow the session below.
Computer output is in <code>normal face</code>, your input is in
<code><b>bold face</b></code> (or otherwise highlighted).
The actual input prompts from the shell may vary, and some chunks of
the output have been omitted (<code>...</code>).
</p>
<pre>[frodo:~] testuser% <b>tar xzf fink-0.5.2-full.tar.gz</b>
[frodo:~] testuser% <b>cd fink-0.5.2-full</b>
[frodo:~/fink-0.5.2-full] testuser% <b>./bootstrap.sh /sw</b>

Welcome to Fink.

...
Choose a method: [1] <b>1</b>

sudo /Users/testuser/fink-0.5.2-full/bootstrap.pl .sudo '/sw'
Password:<b>(your normal password here)</b>
...
OK, I'll ask you some questions and update the configuration file in
'/sw/etc/fink.conf'.

In what additional directory should Fink look for downloaded tarballs? [] <b>(press return)</b>
Always print verbose messages? [y/N] <b>(press return)</b>

Proxy/Firewall settings
Enter the URL of the HTTP proxy to use, or 'none' for no proxy. The URL
should start with http:// and may contain username, password or port
specifications. [none] <b>(press return)</b>
Enter the URL of the proxy to use for FTP, or 'none' for no proxy. The URL
should start with http:// and may contain username, password or port
specifications. [none] <b>(press return)</b>
Use passive mode FTP transfers (to get through a firewall)? [Y/n] <b>y</b>

Mirror selection
Choose a continent:
...
<b>(enter the numbers corresponding to your location)</b>
...
Writing updated configuration to '/sw/etc/fink.conf'...
Bootstrapping a base system via /sw/bootstrap.
...
<b>(take a coffee break while Fink downloads and compiles the base packages)</b>
...

You should now have a working Fink installation in '/sw'.

Run 'source /sw/bin/init.csh ; rehash' to set up this Terminal's environment
to use Fink. To make the software installed by Fink available in all of your
shells, add 'source /sw/bin/init.csh' to the init script '.cshrc' in your
home directory. Enjoy.

[frodo:~/fink-0.5.2-full] testuser% <b>cd</b>
[frodo:~] testuser% <b>rm -r fink-0.5.2-full</b>
[frodo:~] testuser% <b>open /sw/bin/pathsetup.command</b></pre>
<p>
The last command runs a little script to help set up your Unix paths
(and other things) for use with Fink.  In most cases, it will run
automatically, and prompt you for permission to make changes.  If
the script fails, you'll have to do things by hand.
</p><p>
(If you need to do things by hand, and you are using csh or tcsh,
you need to make sure that the command 
<code>source /sw/bin/init.csh</code> is executed during startup of
your shell, either by .login, .cshrc, .tcshrc, or something else
appropriate.  If you are using bash or similar shells, the command
you need is <code>. /sw/bin/init.sh</code>, and places where it
might get executed include .bashrc and .profile.)
</p>
<p>
Once you have set up the paths, open a new Terminal.app window, and close
all other ones.
That's it, you now have a base system installed.
</p>
<p>
You can now install additional packages with the <code>fink</code>
command, like this:
</p>
<pre>[frodo:~] testuser% <b>fink install xfree86-server gimp</b>
sudo /sw/bin/fink 'install' 'xfree86-server' 'gimp'
Password:<b>(your normal password here)</b>
Reading package info...
Information about 147 packages read.
The following 14 additional packages will be installed:
 audiofile dlcompat esound giflib glib gnome-libs gtk+ imlib libjpeg libpng
 libtiff orbit xfree86-base zlib
Do you want to continue? [Y/n] <b>y</b>
...</pre>
<p>
If these instructions don't work for you, well, you'll have to take
the time to read through the rest of this document and the <a href="http://fink.sourceforge.net/faq/">online FAQ</a>.
You can also ask on the <a href="http://fink.sourceforge.net/lists/fink-users.php">fink-users
mailing list</a>, but expect to be pointed back at the
documentation when your problem actually is well-documented.
</p>



<h2><a name="update">1.2 Update Fast Track</a></h2>
<p>
Start out by copying the <code>fink-0.5.2-full.tar.gz</code>
file to your home folder.
Then, open Terminal.app and follow the session below.
Computer output is in <code>normal face</code>, your input is in
<code><b>bold face</b></code> (or otherwise highlighted).
The actual input prompts from the shell may vary, and some chunks of
the output have been omitted (<code>...</code>).
</p>
<pre>[frodo:~] testuser% <b>tar xzf fink-0.5.2-full.tar.gz</b>
[frodo:~] testuser% <b>cd fink-0.5.2-full</b>
[frodo:~/fink-0.5.2-full] testuser% <b>./inject.pl /sw</b>
sudo ./inject.pl /sw
Password:<b>(your normal password here)</b>
Copying package descriptions
...
Done.

Your Fink installation in '/sw' was updated with new fink packages.

[frodo:~/fink-0.5.2-full] testuser% <b>cd pkginfo</b>
[frodo:~/fink-0.5.2-full/pkginfo] testuser% <b>./inject.pl /sw</b>
sudo ./inject.pl /sw
Copying...
...

Your Fink installation in '/sw' was updated with new package description
files. Use appropriate fink commands to update the packages, e.g. 'fink
update-all'.

[frodo:~/fink-0.5.2-full/pkginfo] testuser% <b>cd</b>
[frodo:~] testuser% <b>rm -r fink-0.5.2-full</b>
[frodo:~] testuser% <b>fink update-all</b>
...</pre>



<p align="right">
Next: <a href="install-first.php">2 First Time Installation</a></p>


<?
include "footer.inc";
?>

