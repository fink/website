<?php
$title = "Mailing Lists - fink-devel";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:15:12 $';

include "header.inc";
?>


<h1>fink-devel Mailing List</h1>

<p>
The main purpose of the fink-devel list is to coordinate the package
maintainers efforts.
Some discussion of development of the fink program itself also takes place here.
Anyone is welcome to subscribe to the list and listen to what
goes on behind the scenes.
If you want to package your favourite piece of software for Fink, this
is the place to go for help.
This list also serves as a contact point for packages in Fink that
have no maintainer.
</p>
<p>
If you just want to request that someone port a package to Fink, or if
you have written a package description that you would like to be
reviewed for possible inclusion in Fink, please use the Sourceforge
trackers listed in the &quot;Resources&quot; section of the <a
href="../../index.php">Fink homepage</a>.
</p>
<p>
Please don't use HTML or rich text mails.
Attachments are okay for package descriptions and error reports, but
please don't submit complete compile logs and the like here.
The list has a strict size limit of 40K.
</p>
<p>
The <a
href="http://news.gmane.org/gmane.os.apple.fink.devel">list
archives</a> are a valuable resource for package maintainers.
</p>


<h2>Subscribe</h2>

<p>
You can subscribe to fink-devel by filling out this form.
You will be sent email requesting confirmation, to prevent others from
gratuitously subscribing you.
Your email address will not be displayed on any public page.
</p>

<blockquote>
<form method="POST" action="https://lists.sourceforge.net/lists/subscribe/fink-devel">
<table border="0" cellpadding="2" cellspacing="5">

<tr><td bgcolor="#dddddd">Your email address:</td>
<td><input type="text" name="email" size="30"></td></tr>

<tr><td colspan="2">You must enter a privacy password. This provides
only mild security, but should prevent others from messing with your
subscription. <b>Do not use a valuable password</b> as it will
occasionally be emailed back to you in cleartext. Once a month, your
password will be emailed to you as a reminder.</td></tr>

<tr><td bgcolor="#dddddd">Pick a password:</td>
<td><input type="password" name="pw" size="15"></td></tr>

<tr><td bgcolor="#dddddd">Reenter password to confirm:</td>
<td><input type="password" name="pw-conf" size="15"></td></tr>

<tr><td>Would you like to receive list mail batched in a daily
digest?</td>
<td><input type="radio" name="digest" value="0" checked> No
<input type="radio" name="digest" value="1"> Yes
</td></tr>

<tr><td></td><td>
<input type="submit" name="email-button" value="Subscribe">
</td></tr>

</table>
</form>
</blockquote>


<p>
<form Method=POST ACTION="https://lists.sourceforge.net/lists/options/fink-devel">
To change your subscription (set options like digest and delivery modes, get a reminder of your password, or unsubscribe), enter your subscription email address:<p>
<center> 
<input name="email" type="TEXT" value="" size="30" >  
<input name="UserOptions" type="SUBMIT" value="Unsubscribe or edit options" >
</center>
</form>


<p>Powered by <a href="http://www.list.org/">Mailman</a>.</p>


<?php
include "footer.inc";
?>
