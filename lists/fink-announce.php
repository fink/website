<?
$title = "Mailing Lists - fink-announce";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/07/30 17:30:10 $';

include "header.inc";
?>


<h1>fink-announce Mailing List</h1>

<p>
The fink-announce list is a low traffic list where release
announcements are posted, usually some minutes after the release
happened.
If you want to be the first to hear about new releases, subscribe to
this list.
</p>
<p>
The list is moderated to make sure that only release announcements are
posted.
If you have other announcements to make, post them to
<a href="fink-users.php">fink-users</a> instead.
</p>

<h2>Subscribe</h2>

<p>
You can subscribe to fink-announce by filling out this form.
You will be sent email requesting confirmation, to prevent others from
gratuitously subscribing you.
Your email address will not be displayed on any public page.
</p>

<blockquote>
<form method="POST" action="http://lists.sourceforge.net/lists/subscribe/fink-announce">
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

<input type="hidden" name="digest" value="0">

<tr><td></td><td>
<input type="submit" name="email-button" value="Subscribe">
</td></tr>

</table>
</form>
</blockquote>


<p>Powered by <a href="http://www.list.org/">Mailman</a>.</p>


<?
include "footer.inc";
?>
