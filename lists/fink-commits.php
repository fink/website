<?
$title = "Mailing Lists - fink-commits";
$cvs_author = '$Author: benh57 $';
$cvs_date = '$Date: 2003/01/29 08:12:40 $';

include "header.inc";
?>


<h1>fink-commits Mailing List</h1>

<p>
The fink-commits gives you live news from the Fink development front.
Whenever one of the developers commits new code or a new package to
the CVS repository, a mail with the changes is sent to this list.
</p>
<p>
The mails will appear to come from the person who made the commit, so
you can simply hit reply when you have questions about the change.
</p>

<h2>Filtering</h2>

<p>
fink-commits is a high traffic list, and you're strongly advised to
use your mailer's filtering feature.
Here are some Subject substrings you can filter on:
</p>
<table border="0" cellpadding="0" cellspacing="6">

<tr><td><tt>CVS:</tt></td><td>&nbsp;</td>
<td>All fink-commits messages will have this.</td></tr>

<tr><td><tt>CVS: fink</tt></td><td></td>
<td>Changes to the fink module, i.e. the package manager code.</td></tr>

<tr><td><tt>CVS: packages</tt></td><td></td>
<td>New or updated packages.</td></tr>

<tr><td><tt>CVS: packages/dists/unstable</tt></td><td></td>
<td>New or updated unstable packages.</td></tr>

<tr><td><tt>CVS: packages/dists/stable</tt></td><td></td>
<td>Packages that have been moved from unstable to stable.</td></tr>

</table>


<h2>Subscribe</h2>

<p>
You can subscribe to fink-commits by filling out this form.
You will be sent email requesting confirmation, to prevent others from
gratuitously subscribing you.
Your email address will not be displayed on any public page.
</p>

<blockquote>
<form method="POST" action="http://lists.sourceforge.net/lists/subscribe/fink-commits">
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
<form Method=POST ACTION="http://lists.sourceforge.net/lists/subscribe/fink-commits">
To change your subscription (set options like digest and delivery modes, get a reminder of your password, or unsubscribe), enter your subscription email address:<p>
<center> 
<input name="info" type="TEXT" value="" size="30" >  
<input name="UserOptions" type="SUBMIT" value="Edit Options" >
</center>
</form>

<p>Powered by <a href="http://www.list.org/">Mailman</a> and syncmail.</p>


<?
include "footer.inc";
?>
