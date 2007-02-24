<?
/* $Id: footer.inc,v 1.38 2007/02/24 14:12:56 rangerrick Exp $ */
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
<!-- BMR 02/23/2007 - feedburner login went to fink-core-private -->
<script src="http://feeds.feedburner.com/~s/FinkProjectNews" type="text/javascript" charset="utf-8"></script>
<!-- BMR 02/24/2007 - added back in, got a login  :) -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-305132-6";
urchinTracker();
</script> 
</body>
</html>
