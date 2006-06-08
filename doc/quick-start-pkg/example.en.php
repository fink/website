<?
$title = "Packaging Tutorial - Example";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2006/06/08 22:13:34';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Packaging Tutorial Contents"><link rel="prev" href="howtostart.php?phpLang=en" title="How to Start">';


include_once "header.en.inc";
?>
<h1>Packaging Tutorial - 2. Example - the Maxwell Package</h1>







<h2><a name="Basics">2.1 Basics</a></h2>
<p>
First Maxwell. Lets open our editor and get started. We know the package name,
its version and where to grab the source tar ball from. So we'll type this into
our editor window:
</p>
<pre>
Package: maxwell
Version: 0.5.1
Revision: 1
Source: mirror:sourceforge:%n/%n-%v.tar.gz
</pre>
<p>
So we have the name and version which are easy to understand, but what of these
other two fields? Revision is the "version" of the Fink package,
Version, on the other hand is the upstream source version. Since this is the
first time we have attempted to make a maxwell-0.5.1 package, it is revision 1.
</p>
<p>
The Source field is where fink will grab the source tarball from. Because 
<a href="http://sourceforge.net">Sourceforge</a> has a system where
packages are mirrored around the world, and since <code>fink</code> knows about it,
we use <code>mirror:sourceforge:</code>. <code>%n</code> expands to the package name,
maxwell, and <code>%v</code> expands to the package version, 0.5.1.
</p>
<p>
Now we can save this as <code>maxwell.info</code> in 
<code>/sw/fink/dists/local/main/finkinfo/</code>. That done, we can see how we
are doing by using <code>fink validate</code>.
</p>
<pre>
finkdev% fink validate maxwell.info 
Validating package file maxwell.info...
Error: Required field "Maintainer" missing. (maxwell.info)
</pre>
<p>
Oops, looks like we missed a couple of fields. Lets add some more:
</p>
<pre>
Maintainer: John Doe &lt;jdoe@example.com&gt;
HomePage: http://maxwell.sourceforge.net
License: MIT
</pre>
<p>
We add ourselves as the maintainer of the Fink maxwell package and add it's
homepage, looking at the sourceforge project page, we see that it is MIT
Licensed, so we add that too. Now lets try again:
</p>
<pre>
finkdev% fink validate maxwell.info
Validating package file maxwell.info...
Warning: Unknown license "MIT". (maxwell.info)
Error: No MD5 checksum specified for "source". (maxwell.info)
Error: No package description supplied. (maxwell.info)
</pre>
<p>
Aaargh! We seem to be getting worse, not better, never mind, head off over to
the <a href="http://fink.sourceforge.net/doc/packaging/policy.php#licenses">
Packaging Manual</a> to see what is allowed for License, and we see that we
can just change MIT to OSI-Approved, as the MIT license is, indeed, approved
by the <a href="http://www.opensource.org/">OSI</a>. We can also grab a
one line description of the package from the homepage. So we change those:
</p>
<pre>
License: OSI-Approved
Description: Mac OS X S.M.A.R.T. Tool
</pre>
<p>
But what to do about that warning about MD5 checksums? Well, why don't we just
ask fink to fetch the source?
</p>
<pre>
finkdev% fink fetch maxwell
/usr/bin/sudo /sw/bin/fink  fetch maxwell
Reading package info...
Updating package index... done.
Information about 3377 packages read in 30 seconds.
WARNING: No MD5 specified for Source of package maxwell-0.5.1-1 \
Maintainer: John Doe &lt;jdoe@example.com&gt;
curl -f -L -O http://distfiles.opendarwin.org/maxwell-0.5.1.tar.gz
  % Total    % Received % Xferd  Average Speed          Time             Curr.
                                 Dload  Upload Total    Current  Left    Speed
  0     0    0     0    0     0      0      0 --:--:--  0:00:00 --:--:--     0
curl: (22) The requested URL returned error: 404
### execution of curl failed, exit code 22
Downloading the file "maxwell-0.5.1.tar.gz" failed.

(1)      Give up
(2)      Retry the same mirror
(3)      Retry another mirror from your continent
(4)      Retry another mirror
(5)      Retry using next mirror set "sourceforge"

How do you want to proceed? [3] 5
curl -f -L -O http://west.dl.sourceforge.net/sourceforge/maxwell/maxwell-0.5.1.tar.gz
  % Total    % Received % Xferd  Average Speed          Time             Curr.
                                 Dload  Upload Total    Current  Left    Speed
100  7856  100  7856    0     0  19838      0  0:00:00  0:00:00  0:00:00 6511k
</pre>
<p>
The tarball couldn't be downloaded from the Fink mirrors (distfiles) since
your package is not added to the distribution yet. That's why you need to 
change to the next mirror set. More information about this problem is in the
<a href="http://fink.sourceforge.net/faq/comp-general.php#master-problems">FAQ</a>.
</p>
<p>
So we can now get the md5 by running <code>md5sum /sw/src/maxwell-0.5.1.tar.gz</code>,
and add it to the .info file:
</p>
<pre>
Source-MD5: ce5c354b2fed4e237524ad0bc59997a3
</pre>
<p>
And now we find that <code>fink validate</code> passes, yippee!
</p>



<h2><a name="build">2.2 Build</a></h2>
<p>
Now we can build the package, let's just try it:
</p>
<pre>
finkdev% fink build maxwell
/usr/bin/sudo /sw/bin/fink  build maxwell
Reading package info...
Updating package index... done.
Information about 3498 packages read in 32 seconds.
The following package will be built:
 maxwell
gzip -dc /sw/src/maxwell-0.5.1.tar.gz | /sw/bin/tar -xvf -  \
--no-same-owner --no-same-permissions 
maxwell-0.5.1/
maxwell-0.5.1/LICENSE
maxwell-0.5.1/Makefile
maxwell-0.5.1/maxwell.8
maxwell-0.5.1/maxwell.c
maxwell-0.5.1/README
./configure --prefix=/sw 
Can't exec "./configure": No such file or directory at \
/sw/lib/perl5/Fink/Services.pm line 403.
</pre>
<p>
Hmm, well that did not go all that well. Let's read the README 
(which you can find at <code>/sw/src/maxwell-0.5.1-1/maxwell-0.5.1/README</code>)
and see what it says...
</p>
<pre>
To build type 'make'.

To install in /usr/local type 'sudo make install', to install elsewhere, type 
'sudo make install prefix=/elsewhere'
</pre>
<p>
Ah hah, so we can't use the default CompileScript and InstallScript here, 
we need our own, that's easily resolved:
</p>
<pre>
CompileScript: make
InstallScript: &lt;&lt;
#! /bin/sh -ev
make install prefix=%i
&lt;&lt;
</pre>
<p>
We need to use <code>prefix=%i</code> since fink builds the binary deb file
from the files in <code>%i</code>. These files are later installed into 
<code>%p</code> (which is <code>/sw</code> by default) when you use 
<code>fink install maxwell</code>. For more details about <code>%p</code> and
<code>%i</code> please consult the 
<a href="http://fink.sourceforge.net/doc/packaging/format.php#percent">
Packaging Manual</a>.
</p>
<p>
Normally the lines in the Script fields are passed line by line to the shell.
But the <code>#! /bin/sh -ev</code> line makes fink run it as a separate script.
The parameter <code>-e</code> means "die on error" and <code>-v</code> means
"verbose".
</p>
<p>
So, let's validate the package again and try to rebuild it:
</p>
<pre>
finkdev% fink validate maxwell.info 
Validating package file maxwell.info...
Package looks good!
finkdev% fink build maxwell
/usr/bin/sudo /sw/bin/fink  build maxwell
Reading package info...
Updating package index... done.
Information about 3498 packages read in 32 seconds.
The following package will be built:
 maxwell
gzip -dc /sw/src/maxwell-0.5.1.tar.gz | /sw/bin/tar -xvf -  \
--no-same-owner --no-same-permissions 
maxwell-0.5.1/
maxwell-0.5.1/LICENSE
maxwell-0.5.1/Makefile
maxwell-0.5.1/maxwell.8
maxwell-0.5.1/maxwell.c
maxwell-0.5.1/README
make
cc  -L/sw/lib -c -o maxwell.o maxwell.c
cc  -I/sw/include -o maxwell -framework IOKit -framework CoreFoundation maxwell.o
/bin/rm -rf /sw/src/root-maxwell-0.5.1-1
/bin/mkdir -p /sw/src/root-maxwell-0.5.1-1/sw
/bin/mkdir -p /sw/src/root-maxwell-0.5.1-1/DEBIAN
/var/tmp/tmp.1.A3sRc2
#! /bin/sh -ev
make install prefix=/sw/src/root-maxwell-0.5.1-1/sw
/usr/bin/install -d -m 755 /sw/src/root-maxwell-0.5.1-1/sw/doc/maxwell
/usr/bin/install -m 644 LICENSE /sw/src/root-maxwell-0.5.1-1/sw/doc/maxwell/LICENSE
/usr/bin/install -m 644 README /sw/src/root-maxwell-0.5.1-1/sw/doc/maxwell/README
/usr/bin/install -d -m 755 /sw/src/root-maxwell-0.5.1-1/sw/bin
/usr/bin/install -m 755 maxwell /sw/src/root-maxwell-0.5.1-1/sw/bin/maxwell
/usr/bin/install -d -m 755 /sw/src/root-maxwell-0.5.1-1/sw/man/man8
/usr/bin/install -m 644 maxwell.8 /sw/src/root-maxwell-0.5.1-1/sw/man/man8/maxwell.8
/bin/rm -f /sw/src/root-maxwell-0.5.1-1/sw/info/dir \
/sw/src/root-maxwell-0.5.1-1/sw/info/dir.old \
/sw/src/root-maxwell-0.5.1-1/sw/share/info/dir \
/sw/src/root-maxwell-0.5.1-1/sw/share/info/dir.old
Writing control file...
Finding prebound objects...
Writing dependencies...
Writing package script postinst...
dpkg-deb -b root-maxwell-0.5.1-1 /sw/fink/dists/local/main/binary-darwin-powerpc
dpkg-deb: building package `maxwell' in \
`/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb'.
</pre>
<p>
Fink seems to have installed everything into the correct place: 
<code>/sw/src/root-maxwell-0.5.1-1</code> from where the binary package 
<code>maxwell_0.5.1-1_darwin-powerpc.deb</code> was built.
</p>
<p>
Also note how fink automatically included some compiler flags to enable it to
access other fink packages (e.g. <code>-I/sw/include</code>).
</p>
<p>
Let's have a look at what is in the binary package:
</p>
<pre>
finkdev% dpkg -c \
/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb
drwxr-xr-x root/admin        0 2004-07-15 09:40:38 ./
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/bin/
-rwxr-xr-x root/admin    29508 2004-07-15 09:40:39 ./sw/bin/maxwell
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/doc/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/doc/maxwell/
-rw-r--r-- root/admin     1076 2004-07-15 09:40:39 ./sw/doc/maxwell/LICENSE
-rw-r--r-- root/admin     1236 2004-07-15 09:40:39 ./sw/doc/maxwell/README
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/man/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/man/man8/
-rw-r--r-- root/admin     1759 2004-07-15 09:40:39 ./sw/man/man8/maxwell.8
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/lib/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/lib/fink/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/lib/fink/prebound/
drwxr-xr-x root/admin        0 2004-07-15 09:40:39 ./sw/var/lib/fink/prebound/files/
-rw-r--r-- root/admin       16 2004-07-15 09:40:39 ./sw/var/lib/fink/prebound/files/maxwell.pblist
</pre>
<p>
Seems ok, right? But we have to verify that it complies with the Fink
packaging policy. So let's validate it with:
</p>
<pre>
finkdev% fink validate \
/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb 
Validating .deb file \
/sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb...
Warning: File installed into deprecated directory /sw/doc/
                                        Offender is /sw/doc/
Warning: File installed into deprecated directory /sw/doc/
                                        Offender is /sw/doc/maxwell/
Warning: File installed into deprecated directory /sw/doc/
                                        Offender is /sw/doc/maxwell/LICENSE
Warning: File installed into deprecated directory /sw/doc/
                                        Offender is /sw/doc/maxwell/README
Warning: File installed into deprecated directory /sw/man/
                                        Offender is /sw/man/
Warning: File installed into deprecated directory /sw/man/
                                        Offender is /sw/man/man8/
Warning: File installed into deprecated directory /sw/man/
                                        Offender is /sw/man/man8/maxwell.8
</pre>
<p>
Oops... something is wrong. Let's consult the 
<a href="http://fink.sourceforge.net/doc/packaging/fslayout.php#fhs">Packaging Manual</a>
again. It tells us to install man pages into <code>/sw/share/man</code> and files such
as <code>README</code> into <code>/sw/share/doc/%n</code>. If we look into the 
<code>Makefile</code> of maxwell we see that the mandir and datadir can be set:
</p>
<pre>
prefix = /usr/local
mandir = ${prefix}/man
man8dir = ${mandir}/man8
bindir = ${prefix}/bin
datadir = ${prefix}/doc/maxwell
</pre>
<p>
One easy way to fix that is to change the InstallScript to
</p>
<pre>
make install prefix=%i mandir=%i/share/man datadir=%i/share/doc/%n
</pre>
<p>
and rebuild the package with
</p>
<pre>
finkdev% fink rebuild maxwell
</pre>
<p>
(We used <code>fink rebuild</code> because <code>fink build</code> would not do 
anything since the package was already built successfully.)
</p>
<p>
Review the contents of your deb file (with <code>dpkg -c</code>) to see where 
the files got installed now. Then validate the deb file again with 
<code>fink validate</code>. If all is well you can install the new package with:
</p>
<pre>
finkdev% fink install maxwell
/usr/bin/sudo /sw/bin/fink  install maxwell
Information about 3377 packages read in 30 seconds.
The following package will be installed or updated:
 maxwell
dpkg -i /sw/fink/dists/local/main/binary-darwin-powerpc/maxwell_0.5.1-1_darwin-powerpc.deb
Selecting previously deselected package maxwell.
(Reading database ... 56046 files and directories currently installed.)
Unpacking maxwell (from .../maxwell_0.5.1-1_darwin-powerpc.deb) ...
Setting up maxwell (0.5.1-1) ...
</pre>
<p>
You can now run the software by typing
</p>
<pre>
finkdev% maxwell
</pre>
<p>
Congratulations, you just finished your first Fink package! Now try to
package something yourself by following the 
<a href="http://fink.sourceforge.net/doc/quick-start-pkg/index.php">
Packaging tutorial</a> from the beginning.
</p>
<p>
We are looking forward to your contributions to Fink!
</p>




<? include_once "../../footer.inc"; ?>


