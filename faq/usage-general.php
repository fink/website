<?
$title = "F.A.Q. - Usage (1)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/02/11 14:04:32';

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
like &quot;locale not supported by C library&quot;. Is that bad?</b></p></div>
<div class="answer"><p><b>A:</b> 
It's not bad, it just means that the program will use the default
English messages, date formats, etc.
The program will function normally otherwise.
The Running X11 document has <a href="http://fink.sourceforge.net/doc/x11/trouble.php#locale">details</a>.
</p></div></a>

<a name="passwd"><div class="question"><p><b>Q6.3: There are suddenly a number of 
strange users on my system, with names like &quot;mysql&quot;, &quot;pgsql&quot;, and &quot;games&quot;.  
Where did they come from?</b></p></div>
<div class="answer"><p><b>A:</b> 
You have used Fink to install a package which is dependent on another package,
passwd.  passwd installs a number of extra users on your system for security 
reasons -- on Unix systems, files and processes belong to &quot;owners&quot;, which 
allows
system administrators to fine-tune the permissions and security of the system. 
 Programs such as Apache and MySQL need an &quot;owner&quot;, and it is insecure to 
assign these daemons to root (imagine what would happen if Apache were to be 
compromised and suddenly had write permission to all files on the system).  
Thus, the passwd package takes the work out of setting up these extra users 
for Fink packages that require this.</p><p>It can be alarming to suddenly discover a number of unexpected users in your
 &quot;System Preferences: Users&quot; pane, but suppress the urge to delete them:
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
 it.  Using the &quot;System Preferences: Users&quot; pane will assign all of their files
 to a random administrator account, and there have been reports of havoc played
 with the administrator account's permissions.  This is a bug with System 
Preferences, and has been submitted to Apple.  A safer way to remove these 
users from your system is to do so from within NetInfo Manager.app or use the 
command line tool <tt><nobr>niutil</nobr></tt> in Terminal.  Read the man page
 for <tt><nobr>niutil</nobr></tt> for more information about NetInfo.</li>
</ul><p>Fink <b>does</b> request permission to install these additional users on 
your system during the installation of the passwd package, so this should not 
have come as a surprise.
</p></div></a>

<a name="compile-myself"><div class="question"><p><b>Q6.4: How do I compile something
myself using fink-installed software?</b></p></div>
<div class="answer"><p><b>A:</b> When compiling something yourself outside of fink, the compiler and
linker need to be told where to find the fink-installed libraries and
headers. For a package that uses standard configure/make process, you
need to set the CFLAGS, CPPFLAGS, CXXFLAGS, and LDFLAGS environment
variables:
</p><pre>
setenv CFLAGS -I/sw/include
setenv LDFLAGS -L/sw/lib
setenv CXXFLAGS $CFLAGS
setenv CPPFLAGS $CXXFLAGS
</pre><p>
It is often easiest just to add these to your .tcshrc or .cshrc so they
are set automatically.
If a package does not use these variables, you may need to add the
&quot;-I/sw/include&quot; (for headers) and &quot;-L/sw/lib&quot; (for libraries) to the
compile lines yourself. Some packages may use similar non-standard
variables such as EXTRA_CFLAGS or --with-qt-dir= configure options.
&quot;./configure --help&quot; will usually give you a list of the extra configure
options.
</p><p>In addition, you may need to install the development headers (e.g. <b>foo-1.0-1-dev</b> for the library packages that you are using, if they aren't already installed.</p></div></a>

<p align="right">
Next: <a href="usage-packages.php">7 Package Usage Problems - Specific Packages</a></p>


<?
include "footer.inc";
?>

