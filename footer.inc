<?
/* $Id: footer.inc,v 1.10 2002/04/17 17:20:27 fingolfin Exp $ */
?>

</td></tr>

<? /* end content table */ ?>
</table>
</td></tr>



<? /* horizontal stripe */ ?>
<tr><td height="3" style="background-image:url(<? print $root ?>img/top-line2.gif)">
</td></tr>

<? /* copyright-and-footer row of top-level table */ ?>
<tr valign="middle" align="left">
<td bgcolor="#eeeeee" align="center" width="120"
    style="background-image:url(<? print $root ?>img/stripes.gif)">
  <a href="<? print $root ?>legal.php" style="text-decoration:none;color:black;font-size:10pt;">
    Copyright&nbsp;&copy;&nbsp;2002 The&nbsp;Fink&nbsp;Project
  </a>
</td>
<td>

<? /* footer table */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td>&nbsp;</td></tr>
<tr><td width="100%">
<p class="footer" align="center"><?
if ($dyndate == 1) {
  print "Generated dynamically";
  $date = 0;
} elseif ($dyndate) {
  print "Database last updated on ";
  $date = $dyndate;
} else {
  print "Last changed by $author on ";
}
if ($date)
  print strftime("%a, %b %d %Y", $date);
?></p>
</td></tr>
<tr><td height="7">
 <img src="<? print $root ?>img/shim.gif" width="1" height="7" border="0" alt="">
</td></tr>
</table>

</td>
</tr>

<? /* horizontal stripe */ ?>
<tr><td colspan="2" height="3" style="background-image:url(<? print $root ?>img/top-line2.gif)">
</td></tr>

</table>


</body>
</html>
