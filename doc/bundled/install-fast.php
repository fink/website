<?
$title = "Installation - Fast Track";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/07/25 18:53:30';

$metatags = '<link rel="start" href="install.php" title="Installation Contents"><link rel="contents" href="install.php" title="Installation Contents"><link rel="next" href="install-first.php" title="First Time Installation"><link rel="prev" href="install.php" title="Installation Contents">';

include "header.inc";
?>

<h1>Installation - The Fast Track</h1>




<p>
This section is for the impatient who don't want to take the time to
learn their way around the command line world and don't care that they
don't know what they're actually doing.
</p>
<p>
If you're looking for the real instructions, skip to the <a href="install-first.php">next section</a>.
</p>


<a name="install"><h2>First Time Installation Fast
Track</h2></a>
<p>
Start out by copying the <tt><nobr>fink-0.2.3-full.tar.gz</nobr></tt> file to
your home folder.
Then, open Terminal.app and follow the session below.
Computer output is in <tt><nobr>normal face</nobr></tt>, your input is in
<tt><nobr><b>bold face</b></nobr></tt> (or otherwise highlighted).
The actual input prompts from the shell may vary, and some chunks of
the output have been omitted (<tt><nobr>...</nobr></tt>).
</p>
<pre>[frodo:~] testuser% <b>tar xzf fink-0.2.3-full.tar.gz</b>
[frodo:~] testuser% <b>cd fink-0.2.3-full</b>
[frodo:~/fink-0.2.3-full] testuser% <b>./bootstrap.sh /sw</b>

Welcome to Fink.

...
Choose a method: [1] <b>1</b>

sudo /Users/testuser/fink-0.2.3-full/bootstrap.pl .sudo '/sw'
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
Use passive mode FTP transfers (to get through a firewall)? [y/N] <b>y</b>

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
cp -f wget-ssl-1.7-1.patch /sw/fink/dists/stable/crypto/finkinfo/

You should now have a working Fink installation in '/sw'. Use
'/sw/bin/init.csh' to set up your environment to use it. Enjoy.

[frodo:~/fink-0.2.3-full] testuser% <b>cd</b>
[frodo:~] testuser% <b>pico .cshrc</b></pre>
<p>
The last command launches you into a text file editor.
Type <tt><nobr>source /sw/bin/init.csh</nobr></tt>, press return, press
control-O, press return, press control-X.
You're now back at the prompt:
</p>
<pre>[frodo:~] testuser% <b>source .cshrc</b>
[frodo:~] testuser% <b>rehash</b>
[frodo:~] testuser% </pre>
<p>
If you have several Terminal.app windows open, close the other ones.
That's it.
You can now install additional packages with the <tt><nobr>fink</nobr></tt>
command, like this:
</p>
<pre>[frodo:~] testuser% <b>fink install xfree86-server gimp</b>
Reading configuration...
sudo /sw/bin/fink 'install' 'xfree86-server' 'gimp'
Password:<b>(your normal password here)</b>
Reading configuration...
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
You can also ask on the fink-users mailing list, but expect to be
pointed back at the documentation when your problem actually is
well-documented.
</p>


<p align="right">
Next: <a href="install-first.php">First Time Installation</a></p>


<?
include "footer.inc";
?>
