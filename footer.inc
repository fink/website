<?
/* $Id: footer.inc,v 1.5 2001/07/13 20:27:33 chrisp Exp $ */
?>

</td></tr>
<tr><td>&nbsp;</td></tr>
</table>

<? /* footer */ ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr><td colspan="4" background="<? print $root ?>img/footer-top.gif"><img
src="<? print $root ?>img/footer-top.gif" width="32" height="8" border="0"
alt="-----"></td></tr>

<tr valign="middle">
<td background="<? print $root ?>img/footer-back.gif">&nbsp;&nbsp;&nbsp;</td>
<td align="left" background="<? print $root ?>img/footer-back.gif" width="50%">
<p class="footer"><?
if ($dyndate) {
  print "Database last updated on ";
  $date = $dyndate;
} else {
  print "Last changed by $author on ";
}
print strftime("%a, %b %d %Y", $date);
?></p>
</td>
<td align="right" background="<? print $root ?>img/footer-back.gif" width="50%">
<p class="footer"><a href="<? print $root ?>legal.php">Copyright</a> &copy; 2001
Christoph Pfisterer</p>
</td>
<td background="<? print $root ?>img/footer-back.gif">&nbsp;&nbsp;&nbsp;</td>
</tr>

<tr><td colspan="4" background="<? print $root ?>img/footer-bottom.gif"><img
src="<? print $root ?>img/footer-bottom.gif" width="32" height="8" border="0"
alt="-----"></td></tr>

<tr valign="top"><td>&nbsp;</td></tr>
</table>


</body>
</html>
