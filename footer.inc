<?
/* $Id: footer.inc,v 1.27 2004/03/11 22:36:57 babayoshihiko Exp $ */
?>

</td></tr>
<? /* end content table */ ?>
</table>


<table width="100%" cellspacing="0" class="footer">
<tr valign="bottom">
<td class="footer_left" width="120">
	<p style="border-style: solid ; border-width: 3px 0px 0px 0px ; border-color: #999999 ; padding: 6px ; margin: 0px ; text-align: center; background-image:url(<? echo $root; ?>img/stripes.gif)">
		<a href="<? echo $root; ?>legal.php" style="text-decoration:none ; color:black ; font-size:8pt;">
			Copyright &copy 2001-04<br>The&nbsp;Fink&nbsp;Project
	 	</a>
	</p>
</td><td class="footer">
		<? /* Inserts Links toAvailable Languages */ ?>
		<div class="footer">
		<?
		if (function_exists(AddLanguageNames)) {
			echo FOOTER_AVAILABLE_LANGUAGES . ': ';
			AddLanguageNames(' | ', false); 
		} else {
			echo "&nbsp;";
		}
		?>
		</div>
		
		<? /* The Real Footer */ ?>
		<div class="footer">
		<?
		if ($dyndate == 1) {
		 	print FOOTER_GENERATED_DYNAMICALLY;
		} elseif ($dyndate) {
			print gmstrftime(FOOTER_DATABASE_LAST_UPDATED, $dyndate);
		} else {
		 	print gmstrftime(str_replace("{author}", $author, FOOTER_LAST_CHANGED), $date);
		}
		?>
		</div>
</td>
</tr>
</table>

</body>
</html>
