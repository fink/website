<?
$title = "Installation - Fast Track";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/03/09 13:58:02';

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



<a name="install"><h2>1.1 First Time Installation Fast
Track</h2></a>
<p>
Start out by copying the <tt><nobr>fink-0.3.2a-full.tar.gz</nobr></tt> file to
your home folder.
Then, open Terminal.app and follow the session below.
Computer output is in <tt><nobr>normal face</nobr></tt>, your input is in
<tt><nobr><b>bold face</b></nobr></tt> (or otherwise highlighted).
The actual input prompts from the shell may vary, and some chunks of
the output have been omitted (<tt><nobr>...</nobr></tt>).
</p>
<pre>[frodo:~] testuser% <b>tar xzf fink-0.3.2a-full.tar.gz</b>
[frodo:~] testuser% <b>cd fink-0.3.2a-full</b>
[frodo:~/fink-0.3.2a-full] testuser% <b>./bootstrap.sh /sw</b>

Welcome to Fink.

...
Choose a method: [1] <b>1</b>

sudo /Users/testuser/fink-0.3.2a-full/bootstrap.pl .sudo '/sw'
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

[frodo:~/fink-0.3.2a-full] testuser% <b>cd</b>
[frodo:~] testuser% <b>rm -r fink-0.3.2a-full</b>
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
That's it, you now have a base system installed.
</p>
<p>
You can now install additional packages with the <tt><nobr>fink</nobr></tt>
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



<a name="update"><h2>1.2 Update Fast Track</h2></a>
<p>
Start out by copying the <tt><nobr>fink-0.3.2a-full.tar.gz</nobr></tt> file to
your home folder.
Then, open Terminal.app and follow the session below.
Computer output is in <tt><nobr>normal face</nobr></tt>, your input is in
<tt><nobr><b>bold face</b></nobr></tt> (or otherwise highlighted).
The actual input prompts from the shell may vary, and some chunks of
the output have been omitted (<tt><nobr>...</nobr></tt>).
</p>
<pre>[frodo:~] testuser% <b>tar xzf fink-0.3.2a-full.tar.gz</b>
[frodo:~] testuser% <b>cd fink-0.3.2a-full</b>
[frodo:~/fink-0.3.2a-full] testuser% <b>./inject.pl /sw</b>
sudo ./inject.pl /sw
Password:<b>(your normal password here)</b>
Copying package descriptions
...
Done.

Your Fink installation in '/sw' was updated with new fink packages.

[frodo:~/fink-0.3.2a-full] testuser% <b>cd pkginfo</b>
[frodo:~/fink-0.3.2a-full/pkginfo] testuser% <b>./inject.pl /sw</b>
sudo ./inject.pl /sw
Copying...
...

Your Fink installation in '/sw' was updated with new package description
files. Use appropriate fink commands to update the packages, e.g. 'fink
update-all'.

[frodo:~/fink-0.3.2a-full/pkginfo] testuser% <b>cd</b>
[frodo:~] testuser% <b>rm -r fink-0.3.2a-full</b>
[frodo:~] testuser% <b>fink update-all</b>
...</pre>



<p align="right">
Next: <a href="install-first.php">2 First Time Installation</a></p>


<?
include "footer.inc";
?>
