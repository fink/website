<?
$title = "Mac OS X 10.1 Compatibility Report";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/09/26 07:01:59 $';

include "header.inc";
?>


<h1>Mac OS X 10.1 Compatibility Report</h1>

<p>
This page gives a quick overview of Fink's compatibility with Mac OS X
10.1.
There have been some significant changes that affect compiling Unix
software.
The top issue is the new linker, which now uses a different symbol
resolution strategy by default (to increase launch performance) and as
a result has become much more pedantic.
In other news, 10.1 finally has /dev/random and /dev/urandom.
Unfortunately there are also new bugs, old issues like broken SysV
shared memory and locale support appear to be still there.
</p>

<p>
The bad news first: apt-get currently doesn't work on 10.1.
You'll get the message <tt>The package cache file is corrupted</tt>
when you run it.
The cause is still unknown, but it's a top priority to resolve this.
</p>
<p>
The following packages in Fink 0.2.6 don't compile on Mac OS X 10.1,
but have fixed versions in unstable:
apache, php, librep, tcltk, python, enlightenment.
</p>
<p>
PostgreSQL also doesn't compile on 10.1.
We have been provided with a patch, but there are problems with it and
there's no updated package yet.
</p>
<p>
OpenSSH has been fixed, a new package is in stable CVS.
The new package also supports incoming X11 forwarding.
</p>
<p>
GNOME 1.4 has been patched for 10.1 and is in stable CVS.
</p>
<p>
Apple has removed wget and replaced it with curl due to licensing
concerns.
Since Fink 0.2.6, the package manager checks the system and uses
whatever is available to download source tarballs.
The latest versions of both wget and curl are available as packages.
</p>
<p>
There are no further known issues with 10.1 beyond those listed here;
Fink 0.2.6 already included fixes for most library-bearing packages.
If you run into problems, please report them on the <a
href="../lists/fink-users.php">mailing list</a> or through the <a
href="http://sourceforge.net/tracker/?atid=117203&group_id=17203">bug
tracker</a> at SourceForge.
Expect a new Fink release once the apt-get issue has been fixed.
</p>


<?
include "footer.inc";
?>
