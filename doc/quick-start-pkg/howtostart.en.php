<?php
$title = "Packaging Tutorial - How to Start";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:18:11';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Packaging Tutorial Contents"><link rel="next" href="example.php?phpLang=en" title="Example - the Maxwell Package"><link rel="prev" href="index.php?phpLang=en" title="Packaging Tutorial Contents">';


include_once "header.en.inc";
?>
<h1>Packaging Tutorial - 1. How to Start</h1>



<h2><a name="Learn">1.1 Learn the Basics</a></h2>
<p>
<b>Please note:</b> In this document we assume that <code>fink</code> is installed into
<code>/opt/sw</code> - the default location. If you see a codeblock similar to
</p>
<pre>
finkdev% somecommand
</pre>
<p>
it means that you have to type <code>somecommand</code> into Terminal.app or
any other terminal on your Mac.
</p>
<p>
First you should learn a few basic concept about how to build Fink packages. 
We suggest you:
</p>

<ul>
<li>
Have a look at 
<a href="/doc/UsingFink.pdf">
Using Fink: A Developer's How To</a>
(2MB pdf file) - slides from a presentation at the 
<a href="http://conferences.oreillynet.com/macosx2002/">O'Reilly Mac OS X Conference</a>.
</li>
<li>




Read and try to understand the 
<a href="example.php?phpLang=en#basics">example here</a>.
</li>
<li>
Look at other, similar packages in your 
<code>/opt/sw/fink/dists/unstable/main/finkinfo/</code> directory or 
<a href="http://fink.cvs.sourceforge.net/fink/dists/">
in the online CVS repository</a> and take one (or several) info file(s) as 
a starting point.
</li>
<li>
Search the 
<a href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Package Submission Tracker</a>
if somebody else already tried to package the same and the 
<a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package Request Tracker</a>
if there is a matching request. You might find valuable information there.
</li>
<li>
Maybe browse the 
<a href="/doc/packaging/index.php">Packaging Manual</a>
if you think you need more detailed information.
</li>
</ul>




<h2><a name="Make">1.2 Make your Package</a></h2>
<p>
Save your new info file (and patch file - if needed) into your 
<code>/opt/sw/fink/dists/local/main/finkinfo/</code> directory. The file should be named
<code>packagename.info</code> (and <code>packagename.patch</code>) where 
<code>packagename</code> is the name of your package. If this directory doesn't 
exist you need to create it manually.
</p>
<p>
<b>Please note:</b>
Make sure you are running an up-to-date <code>fink</code> tool by running
</p>
<pre>
finkdev% fink selfupdate
</pre>
<p>
Now run
</p>
<pre>
finkdev% fink configure
</pre>
<p>
and set the verbosity level to the highest value and enable the unstable tree. 
After that you should check if <code>fink</code> found your package by typing:
</p>
<pre>
finkdev% fink list packagename
</pre>
<p>
If it doesn't show up in the list you might need to change your
<a href="/doc/users-guide/conf.php#optional">fink configuration file</a>
to include your local tree.
</p>
<p>
Maybe you also have to manually re-index your packages by typing:
</p>
<pre>
finkdev% fink index
</pre>
<p>
If you need more information read the 
<a href="/doc/packaging/index.php">Packaging Manual</a>
or use one or more of different 
<a href="/help/index.php">help sources</a>.
You should also subscribe to the 
<a href="/lists/index.php">fink-devel</a>
mailing list.
</p>



<h2><a name="Validate">1.3 Validate your Package</a></h2>
<p>
During validation of your package you should set the verbose level of 
<code>fink</code> to the highest possible value. Check the section on the
<a href="/doc/users-guide/conf.php#optional">fink configuration file</a>
about how to change the verbose level.
</p>
<p>
Check if your package passes validation by running:
</p>
<pre>
finkdev% fink validate /opt/sw/fink/dists/local/main/finkinfo/packagename.info
</pre>
<p>
If the validation passes try to build your package with:
</p>
<pre>
finkdev% fink -m --build-as-nobody rebuild packagename
</pre>
<p>
Watch the output of the build process carefully for errors or warnings.
Especially make sure that everything is installed into the destination directory
(which is located at <code>/opt/sw/src/root-packagename-%v-%r/opt/sw</code>) from where
<code>fink</code> builds the binary package. Nothing should be installed directly into
<code>/opt/sw</code>.
</p>
<p>
If you use the <code>--keep-build-dir</code> or <code>-k</code> option to <code>fink</code>, it will 
keep the build directory. This is where <code>fink</code> expands the downloaded source and 
where the package gets built. This might help if you need to debug the build
process. Type <code>man fink</code> for details.
</p>
<p>
You may also want to use the <code>--keep-root-dir</code> or <code>-K</code> option, it will keep the destination directory. This is where <code>fink</code> builds the installation tree for the package. Comparing build and destination directories may help you debugging the installation phase.
</p>
<p>
If the build succeeds check the content of the binary package with:
</p>
<pre>
finkdev% dpkg -c /opt/sw/fink/dists/local/main/binary-darwin-powerpc/packagename.deb
</pre>
<p>
Check if all files that you think should be in the package are actually
in the .deb file. Again: make sure that nothing is installed directly into 
<code>/opt/sw</code>.
</p>
<p>
Now you can also validate the binary package by doing:
</p>
<pre>
finkdev% fink validate /opt/sw/fink/dists/local/main/binary-darwin-powerpc/packagename.deb
</pre>
<p>
If all is well install the package with:
</p>
<pre>
finkdev% fink install packagename
</pre>
<p>
and test the functionality of your package.
</p>
<p>
If any of the above steps fail try to correct the errors and restart at the 
top with the <code>fink validate</code> step.
</p>



<h2><a name="Submit">1.4 Submit your Package</a></h2>
<p>
If your package passes all the checks above you now can submit the info 
(and patch if necessary) file to the 
<a href="http://sourceforge.net/tracker/?func=add&amp;group_id=17203&amp;atid=414256">
Package Submission Tracker</a>.
</p>
<p>
A package reviewer should now take a look at your package submission and
add it to the Fink unstable tree if the package seems ready. If not you
will be asked to bring the package into compliance with the policy.
</p>
<p>
<b>Important:</b>
</p>
<ul>
<li>
If feasible add multiple items one at a time to the same tracker item 
(e.g. info and patch files).
</li>
<li>
Add a note whether your package is intended for the <code>10.3</code> tree, 
<code>10.4</code> tree, or both,
</li>
<li>
which <code>section</code> (graphics, sci, etc.) you feel it belongs in, and
</li>
<li>
that you have run the command <code>fink validate</code> on your info and deb files.
</li>
<li>
Set the <code>Group</code> field of the tracker item to 
<code>Undergoing Validation</code> when you create the new tracker. Also change it 
back to <code>Undergoing Validation</code> whenever you fixed problems package 
reviewers found in your submission.
</li>
<li>
Set the <code>Category</code> field of the tracker item to the correct value.
</li>
</ul>



<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="example.php?phpLang=en">2. Example - the Maxwell Package</a></p>
<?php include_once "../../footer.inc"; ?>


