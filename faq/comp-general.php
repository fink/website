<?
$title = "F.A.Q. - Compiling (1)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2003/07/17 12:23:19';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="comp-packages.php" title="Compile Problems - Specific Packages"><link rel="prev" href="usage-fink.php" title="Installing, Using and Maintaining Fink">';

include "header.inc";
?>

<h1>F.A.Q. - 4 Compile Problems - General</h1>


<a name="compiler">
<div class="question"><p><b>Q4.1: A configure script complains
that it can't find an &quot;acceptable cc&quot;. What's that?</b></p></div>
<div class="answer"><p><b>A:</b> 
Read the docs next time.
To compile packages from source, you must install the Developer Tools,
which among other stuff contains the C compiler, <code>cc</code>.
</p></div>
</a>
<a name="cvs">
<div class="question"><p><b>Q4.2: When I try a &quot;fink selfupdate-cvs&quot; I get this message: &quot;cvs: Command not found.&quot; </b></p></div>
<div class="answer"><p><b>A:</b> You need to install the Developer Tools.</p></div>
</a>
<a name="make">
<div class="question"><p><b>Q4.3: make: illegal option -- C</b></p></div>
<div class="answer"><p><b>A:</b> 
You've replaced the GNU version of the <code>make</code> utility
installed as part of the Developer Tools with a BSD version of make.
Many packages rely on special features only supported by GNU make.
Make sure that <code>/usr/bin/make</code> is a symlink to
<code>gnumake</code>, not <code>bsdmake</code>. Furthermore,
make sure that <code>/usr/local/bin/</code> does not contain another
copy of <code>make</code>.
</p></div>
</a>
<a name="head">
<div class="question"><p><b>Q4.4: I'm getting a strange usage message
from the head command. What's broken?</b></p></div>
<div class="answer"><p><b>A:</b> If you're seeing this:</p><pre>Unknown option: 1
Usage: head [-options] &lt;url&gt;...</pre><p>followed by a list of option descriptions, you have a broken
<code>head</code> executable.
This happens when you install the Perl libwww library on an HFS+
system volume.
It tries to create a new command <code>/usr/bin/HEAD</code>, which
overwrites the existing <code>head</code> command because the file
system is case-insensitive.
<code>head</code> is a standard command used in many shell scripts and
Makefiles.
You need to get the original <code>head</code> executable back if you
want to use Fink.
</p><p>
The bootstrap script of the source release now checks for this, but
you can still run into it if you use the binary release for first-time
installation or install libwww after you installed Fink.
</p></div>
</a>
<a name="also_in">
<div class="question"><p><b>Q4.5: When I try to install a package I get an error message about trying to overwrite a file that is in another package.</b></p></div>
<div class="answer"><p><b>A:</b> This occasionally happens with splitoff packages (i.e. the ones with -dev, -shlibs, etc.) when a file gets moved from one part of the splitoff to another (e.g. from <code>foo</code> to <code>foo-shlibs</code>.  What you can do is overwrite the file with that from the package you are trying to install (since they are nominally the same):</p><pre>sudo dpkg -i --force-overwite packagename</pre><p>where <b>packagename</b> is the package that you are trying to install.</p></div>
</a>
<a name="weak_lib">
<div class="question"><p><b>Q4.6: After I installed the December 2002 Development Tools I get messages about &quot;weak libraries&quot;.</b></p></div>
<div class="answer"><p><b>A:</b> This is new with the December 2002 Tools.  You may occasionally see messages like (choosing libgdk-pixbuf as an example):</p><p>
<code>ld: warning dynamic shared library: /sw/lib/libgdk-pixbuf.dylib not made a weak library in output with MACOSX_DEPLOYMENT_TARGET environment variable set to: 10.1</code>
</p><p>You may regard these as harmless.  If you are curious, read through the release notes in the developer documentation directory, 
especially GCC's and the linker's, for more info.  It essentially has to 
do with whether missing symbols at runtime is considered a fatal error on 
startup or not, for applications that use weak references.</p></div>
</a>
<a name="mv-failed">
<div class="question"><p><b>Q4.7: What does &quot;execution of mv failed, exit code 1&quot; mean when I try to build a package?</b></p></div>
<div class="answer"><p><b>A:</b> It typically means that another error happened earlier in the build, and so one or more files weren't created, but the build process didn't stop.  To track down the offending file(s), search in the output of the build for the nonexistent file, e.g. if you have something like:</p><pre>mv /sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib \
 /sw/src/root-foo-shlibs-0.1.2-3/sw/lib/
 mv: cannot stat `/sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib': 
 No such file or directory
### execution of mv failed, exit code 1
Failed: installing foo-0.1.2-3 failed</pre><p>then you should look for <code>libbar</code> somewhere further back in the output of your build attempt.</p></div>
</a>
<a name="node-exists">
<div class="question"><p><b>Q4.8: I can't install a package | update because I get a message that a &quot;node&quot; already exists.</b></p></div>
<div class="answer"><p><b>A:</b> These errors look something like this:</p><pre>Failed: Internal error: node for system-xfree86 already exists</pre><p>This problem is that the dependency engine is confused, due to changes in some of the package info files.  To fix it:</p><ul>
<li>
<p>Remove the offending package by force, e. g.</p>
<pre>sudo dpkg -r --force-all system-xfree86</pre>
<p>for the example given above.</p>
</li>
<li>
<p>Try again to install | upgrade.  At some point a &quot;virtual dependency&quot; prompt will come up that includes the package you just removed.  Select it, and it will be reinstalled during your build.</p>
</li>
</ul></div>
</a>
<a name="usr-local-libs">
<div class="question"><p><b>Q4.9: I've heard that libraries installed in /usr/local/lib sometimes cause build problems for Fink.  Is this true?</b></p></div>
<div class="answer"><p><b>A:</b> This is a frequent source of problems, because the package configuration script finds libraries under <code>/usr/local/lib</code> before searching in the Fink path.  If you are having problems with a build that aren't covered by another FAQ entry, you should check whether you have libraries in <code>/usr/local/lib</code>.  If so, then try renaming <code>/usr/local</code> to something else, e.g.:</p><pre>sudo mv /usr/local /usr/local.moved</pre><p>do your build, and then put <code>/usr/local</code> back:</p><pre>sudo mv /usr/local.moved /usr/local</pre></div>
</a>
<a name="toc-out-of-date"><div class="question"><p><b>Q4.10: When I try to build a package, I get a message that a &quot;table of contents&quot; is out of date.  What do I need to do?</b></p></div>
<div class="answer"><p><b>A:</b> The output hints at what to do.  The message is usually something like:</p><pre>ld: table of contents for archive: /sw/lib/libintl.a is out of date; rerun ranlib(1) (can't load from it)</pre><p>What you need to do is run ranlib (as root) on whatever library is causing the problem.  As an example, for the case above, you would run:</p><pre>sudo ranlib /sw/lib/libintl.a</pre></div>
</a>
<p align="right">
Next: <a href="comp-packages.php">5 Compile Problems - Specific Packages</a></p>


<?
include "footer.inc";
?>

