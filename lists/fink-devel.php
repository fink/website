<?
$title = "Mailing Lists - fink-devel";
$cvs_author = '$Author: fingolfin $';
$cvs_date = '$Date: 2003/04/14 12:56:02 $';

include "header.inc";
?>


<h1>fink-devel Mailing List</h1>

<p>
The main purpose of the fink-devel list is to coordinate the package
maintainers efforts.
Still, anyone is welcome to subscribe to the list and listen to what
goes on behind the scenes.
If you want to package your favourite piece of software for Fink, this
is the place to go.
People without CVS commit access can post their package descriptions
on the list to have them reviewed and added to Fink.
</p>
<p>
Please don't use HTML or rich text mails.
Attachments are okay for package descriptions, but please don't use
them for compile logs and the like.
The list has a strict size limit of 40K.
</p>
<p>
The <a
href="http://sourceforge.net/mailarchive/forum.php?forum=fink-devel">list
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
<form method="POST" action="http://lists.sourceforge.net/lists/subscribe/fink-devel">
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
<form Method=POST ACTION="http://lists.sourceforge.net/lists/subscribe/fink-devel">
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
