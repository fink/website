<?
/* $Id: footer.inc,v 1.36 2007/02/22 23:45:10 rangerrick Exp $ */
?>

<? /* end content table */ ?>
</div>
<div id="footer-left">
		<a href="/legal.php" style="text-decoration:none ; color:black ;">
			Copyright &copy; 2001-2007<br>The&nbsp;Fink&nbsp;Project
	 	</a>
</div>
<div id="footer">
	<?
		if (function_exists(AddLanguageNames)) {
			echo FOOTER_AVAILABLE_LANGUAGES . ': ';
			AddLanguageNames(' | ', false); 
		} else {
			echo "&nbsp;";
		}
	?>
	<br>
	<? /* The Real Footer */ ?>
	
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
    <script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-305132-1";
urchinTracker();
</script>
</body>
</html>
