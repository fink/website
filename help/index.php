<?
$title = "Help";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/08/31 21:13:47 $';

include "header.inc";
?>


<p><table border="0" cellpadding="0" cellspacing="0" width="100%">
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
<a href="../lists/fink-users.php">fink-users</a> mailing list.
You may want to check the <a
href="http://www.geocrawler.com/redir-sf.php3?list=fink-users">archives</a>
first - it is tiresome to answer the same question over and over
again.
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
<a href="http://openprojects.net">openprojects.net</a> IRC network.
You can chat with other Fink users and some of the developers there.
</p>

<p>
<b>Other Sites.</b>
Some links to web discussion forums:
<a href="http://sourceforge.net/forum/?group_id=18034">XonX forums at
SourceForge</a> -
<a href="http://www.xdarwin.org/forum/">xdarwin.org forums</a> -
<a href="http://forums.macnn.com/cgi-bin/ultimatebb.cgi?ubb=forum&f=1">MacNN
Unix forum</a> -
<a href="http://macosx.com">macosx.com</a> (look for the Unix forums)
</p>
<p>
Some links to sites with more or less useful information:
<a href="http://mrcla.com/XonX/">XonX</a> -
<a href="http://macgimp.org/">macgimp.org</a> -
<a href="http://macosx.org/">macosx.org</a>
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
Even if we can't promise to fix everything immediately <tt>;-)</tt>,
it helps a lot to know which parts of Fink need the most attention.
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
You can also tell Apple that you like the path they have taken with
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
href="../doc/cvsaccess/index.php">CVS</a>, configure Fink to <a
href="../faq/usage.php#unstable">use unstable</a> and test the
packages.
The package database lists <a href="../pdb/testing.php">packages that
need testing</a> on a separate page.
You can send success and failure reports to the package maintainer or
a mailing list of your choice.
</p>

<p>
<b>Documentation.</b>
The project is always short on people willing to write
documentation. <tt>;-)</tt>
</p>

<p>
<b>Make packages.</b>
If you have some experience installing Unix software from source, you
can help by making new packages.
Grab the <a href="../doc/packaging/index.php">Packaging Manual</a>,
read it carefully and thoroughly, subscribe to <a
href="../lists/fink-devel.php">fink-devel</a> and post your packages
there.
Note that your submission will likely be rejected or treated with low
priority unless it is compliant with the packaging policy.
</p>


</td></tr></table></p>


<?
include "footer.inc";
?>
