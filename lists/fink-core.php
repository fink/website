<?
$title = "Mailing Lists - fink-core";
$cvs_author = '$Author: rangerrick $';
$cvs_date = '$Date: 2004/01/11 18:51:45 $';

include "header.inc";
?>


<h1>fink-core Mailing List</h1>

<p>
The fink-core list is a low traffic list for discussion of
management of the base Fink system and the project as a whole.
It is generally used for bug reports and packaging discussion
of Fink "base" packages.
</p>

<h2>Subscribe</h2>

<p>
You can subscribe to fink-core by filling out this form.
You will be sent email requesting confirmation, to prevent others from
gratuitously subscribing you.
Your email address will not be displayed on any public page.
</p>

<blockquote>
<form method="POST" action="http://lists.sourceforge.net/lists/subscribe/fink-core">
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
<form Method=POST ACTION="http://lists.sourceforge.net/lists/subscribe/fink-core">
To change your subscription (set options like digest and delivery modes, get a reminder of your password, or unsubscribe), enter your subscription email address:<p>
<center> 
<input name="info" type="TEXT" value="" size="30" >  
<input name="UserOptions" type="SUBMIT" value="Edit Options" >
</center>
</form>

<p>Powered by <a href="http://www.list.org/">Mailman</a>.</p>


<?
include "footer.inc";
?>
