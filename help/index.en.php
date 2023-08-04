<?php
$title = "Help";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2021/05/27 20:26:32 $';

include "header.inc";
?>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>Getting Help</h1>

<p>
Need help using Fink? Here are your options.
</p>

<p>
<b>Documentation.</b>
The <a href="../doc/index.php">documentation section</a> of this
website has a bunch of useful documents.
Naturally, those documents are a work in progress and many are
incomplete, but they're definitely helpful.
</p>

<p>
<b>The FAQ.</b>
Common problems and their solutions are documented in the <a
href="../faq/index.php">online FAQ</a>.
</p>

<p>
<b>The users mailing list.</b>
If you can't figure out your problem by yourself, you can ask on the
<a href="../lists/fink-beginners.php">fink-beginners</a> mailing list or
on the <a href="../lists/fink-users.php">fink-users</a> mailing list.
You may want to check the 
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-beginners">fink-beginners archives</a>
and also the
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users archives</a>
first - it is tiresome to answer the same question over and over again.
</p>
<p>
When posting a problem report, be sure to include relevant information
- we can't help you if we don't know what your problem is.
Some things to include: Fink version, Mac OS X version, versions of
relevant packages, the fink command that failed, any error messages
that look useful.
Also say if you have software from other sources installed in
/usr/local or use a custom compiler (e.g. gcc 3).
</p>

<p>
<b>The IRC channel.</b>
There is a <tt>#fink</tt> channel on the
<a href="https://libera.chat/">Libera.chat</a> IRC network.
You can chat with other Fink users and some of the developers there.
</p>

<p>
<b>Other Sites.</b>
Some links to web discussion forums:
<a href="https://www.xquartz.org/Mailing-Lists.html">XQuartz forums at
SourceForge</a> -
<a href="http://www.xdarwin.org/forum/">xdarwin.org forums</a> -
<a href="http://forums.macnn.com/forumdisplay.php?forumid=54">MacNN
Unix forum</a> -
<a href="http://macosx.com/">macosx.com</a> (there are several Unix
forums there)
</p>
<p>
Some links to sites with more or less useful information:
<a href="https://www.xquartz.org/">XQuartz</a> -
<a href="http://macosx.org/">macosx.org</a> -
<a href="http://macosxhints.com/">macosxhints.com</a>
</p>

</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>Giving Help</h1>

<p>
Fink is a volunteer effort.
Here's how <b>you</b> can help.
</p>

<p>
<b>Feedback.</b>
Nothing is more valuable than feedback from users.
Problem reports, success stories, suggestions and contributions are
always welcome.
Even if we can't promise to fix everything immediately, 
it helps a lot to know which parts of Fink need the most attention.
</p>
<p>
You can provide feedback through the
<a href="../lists/index.php">mailing lists</a>, through the various
trackers at SourceForge (see the home page for direct links), or
directly to package maintainers.
</p>

<p>
<b>Spread the word.</b>
If you like Fink, spread the word.
It helps you, because it builds a helpful community;
it helps the Fink project, because the packages get more testing;
and it helps the Unix world in general, because it helps the
recognition of Mac OS X as a Unix OS worth supporting.
</p>
<p>
You can also <a href="https://www.apple.com/feedback/macos.html">tell Apple</a> that you like the path they have taken with
the BSD underpinnings of Mac OS X and you would like them to further
improve the BSD layer.
</p>

<p>
<b>Provide Support.</b>
If you have some experience to share, join the <a
href="../lists/fink-users.php">fink-users</a> mailing list and help
solve the problems posted there by other users.
</p>

<p>
<b>Test packages.</b>
Grab the latest package descriptions from <a
href="../doc/gitaccess/index.php">Git</a>, configure Fink to <a
href="../faq/usage-fink.php#unstable">use unstable</a> and test the
packages.
The package database lists <a href="http://pdb.finkproject.org/pdb/testing.php">packages that
need testing</a> on a separate page.
You can send success and failure reports to the package maintainer or
a mailing list of your choice.
</p>

<p>
<b>Documentation.</b>
The project is always short on people willing to write
documentation. 
</p>

<p>
<b>Make packages.</b>
If you have some experience installing Unix software from source, you
can help by making new packages. To get started read the <a href="../doc/quick-start-pkg/index.php">Packaging Tutorial</a>. Then grab the <a href="../doc/packaging/index.php">Packaging Manual</a>, read it carefully and thoroughly, subscribe to <a href="../lists/fink-devel.php">fink-devel</a>, and post your packages to the <a href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">package submission tracker</a>.
Note that your submission will likely be rejected or treated with low
priority unless it is compliant with the packaging policy.
</p>


</td></tr></table>


<?php
include "footer.inc";
?>
