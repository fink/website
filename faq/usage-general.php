<?
$title = "F.A.Q. - Usage (1)";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2002/02/24 02:41:30';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-packages.php" title="Package Usage Problems - Specific Packages"><link rel="prev" href="comp-packages.php" title="Compile Problems - Specific Packages">';

include "header.inc";
?>

<h1>F.A.Q. - 6 Package Usage Problems - General</h1>



<a name="gnome-icons"><div class="question"><p><b>Q6.1: Some GNOME applications display
black icons only. What's wrong?</b></p></div>
<div class="answer"><p><b>A:</b> 
This is caused by limitations in the operating system kernel.
The only solution so far is to turn off shared memory.
The Running X11 document has <a href="http://fink.sourceforge.net/doc/x11/trouble.php#black">details</a>.
</p></div></a>

<a name="xlocale"><div class="question"><p><b>Q6.2: I'm getting lots of messages
like "locale not supported by C library". Is that bad?</b></p></div>
<div class="answer"><p><b>A:</b> 
It's not bad, it just means that the program will use the default
English messages, date formats, etc.
The program will function normally otherwise.
The Running X11 document has <a href="http://fink.sourceforge.net/doc/x11/trouble.php#locale">details</a>.
</p></div></a>

<a name="passwd"><div class="question"><p><b>Q6.3: There are suddenly a number of 
strange users on my system, with names like "mysql", "pgsql", and "games".  
Where did they come from?</b></p></div>
<div class="answer"><p><b>A:</b> 
You have used Fink to install a package which is dependent on another package,
passwd.  passwd installs a number of extra users on your system for security 
reasons -- on Unix systems, files and processes belong to "owners", which 
allows
system administrators to fine-tune the permissions and security of the system. 
 Programs such as Apache and MySQL need an "owner", and it is insecure to 
assign these daemons to root (imagine what would happen if Apache were to be 
compromised and suddenly had write permission to all files on the system).  
Thus, the passwd package takes the work out of setting up these extra users 
for Fink packages that require this.</p><p>It can be alarming to suddenly discover a number of unexpected users in your
 "System Preferences: Users" pane, but suppress the urge to delete them:
</p><ul>
<li>First of all, you have obviously chosen to install a package which requires
 their use, so deleting the user doesn't make much sense, does it?</li>
<li>There are in fact a number of extra users already installed on Mac OS X 
that you may not have known about:  www, daemon, nobody, are just a few of 
them.
The presence of these extra users is a standard Unix convention for running 
certain services; the passwd package simply adds a couple of extra that Apple 
did not provide.  You can see these Apple-installed users in NetInfo 
Manager.app, or by running
<tt><nobr>niutil -list . /users</nobr></tt></li>
<li>If you do decide to delete these users, be very careful of how you go about
 it.  Using the "System Preferences: Users" pane will assign all of their files
 to a random administrator account, and there have been reports of havoc played
 with the administrator account's permissions.  This is a bug with System 
Preferences, and has been submitted to Apple.  A safer way to remove these 
users from your system is to do so from within NetInfo Manager.app or use the 
command line tool <tt><nobr>niutil</nobr></tt> in Terminal.  Read the man page
 for <tt><nobr>niutil</nobr></tt> for more information about NetInfo.</li>
</ul><p>Fink <i>does</i> request permission to install these additional users on 
your system during the installation of the passwd package, so this should not 
have come as a surprise.
</p></div></a>

<p align="right">
Next: <a href="usage-packages.php">7 Package Usage Problems - Specific Packages</a></p>


<?
include "footer.inc";
?>
