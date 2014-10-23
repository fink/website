<?php
$title = "Mailing Lists - fink-tracker";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:15:12 $';

include "header.inc";
?>


<h1>fink-tracker Mailing List</h1>

<p>
The fink-tracker list is a read-only list for being notified of
bug reports and package submissions on the
<a href="http://sourceforge.net/tracker/?group_id=17203">Fink trackers</a>.
</p>

<h2>Subscribe</h2>

<p>
You can subscribe to fink-tracker by filling out this form.
You will be sent email requesting confirmation, to prevent others from
gratuitously subscribing you.
Your email address will not be displayed on any public page.
</p>

<blockquote>
<form method="POST" action="https://lists.sourceforge.net/lists/subscribe/fink-tracker">
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

<p>
<form Method=POST ACTION="https://lists.sourceforge.net/lists/options/fink-tracker">
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
