<?
/* $Id: footer.inc,v 1.8 2002/03/24 21:50:46 fingolfin Exp $ */
?>

</td></tr>

<? /* end content table */ ?>
</table>
</td></tr>


<? /* copyright-and-footer row of top-level table */ ?>

<tr valign="bottom" align="left">
<td bgcolor="#eeeeee"><a href="<?
print $root ?>legal.php"><img src="<? print $root ?>img/copyright.gif"
width="120" height="44" border="0"
alt="Copyright (c) 2001 The Fink Project"></a></td>
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
<tr><td style="background-image:url(<? print $root ?>img/bottom-line2.gif)">
<img src="<? print $root ?>img/bottom-line2.gif" width="32" height="10" border="0" alt="">
</td></tr>
</table>

</td>
</tr>

<tr><td>&nbsp;</td></tr>

</table>


</body>
</html>
