<?
/* $Id: footer.inc,v 1.30 2005/03/07 12:19:21 babayoshihiko Exp $ */
?>

</td></tr>
<? /* end content table */ ?>
</table>


<table width="100%" cellspacing="0" class="footer">
<tr valign="bottom">
<td class="footer_left" width="120">
	<p style="border-style: solid ; border-width: 3px 0px 0px 0px ; border-color: #999999 ; padding: 6px ; margin: 0px ; text-align: center; background-image:url(<? echo $root; ?>img/stripes.gif)">
		<a href="<? echo $root; ?>legal.php" style="text-decoration:none ; color:black ; font-size:8pt;">
			Copyright &copy 2001-05<br>The&nbsp;Fink&nbsp;Project
	 	</a>
	</p>
</td><td class="footer">
		<? /* Inserts Links to Available Languages */ ?>
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
			print gmstrftime(FINK_DATE_FORMAT, $dyndate);
		} else {
		 	// print gmstrftime(str_replace("{author}", $author, FOOTER_LAST_CHANGED), $date);
			$print_lastchanged = FOOTER_LAST_CHANGED;
			$date_converted = gmstrftime(FINK_DATE_FORMAT, $date);
			$date_encoding = mb_detect_encoding($date_converted);
			$date_converted = mb_convert_encoding($date_converted, "UTF-8", FINK_SF_ENCODING);
			
			$print_lastchanged = str_replace("{author}", $author, $print_lastchanged);
			$print_lastchanged = str_replace("{date}", $date_converted, $print_lastchanged);
			$print_lastchanged = str_replace("{time}", gmstrftime(" %R GMT", $date), $print_lastchanged);
			print $print_lastchanged;
		}
		?>
		</div>
</td>
</tr>
</table>
</body>
</html>
