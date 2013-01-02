<? /* $Id: footer.inc,v 1.48 2013/01/02 03:44:05 alexkhansen Exp $ */ ?>

<? /* end content table */ ?>
</div>
<div id="footer-left">
		<a href="/legal.php" style="text-decoration:none ; color:black ;">
			Copyright &copy; 2001-2013<br>The&nbsp;Fink&nbsp;Project
	 	</a>
</div>
<div id="footer">
	<?
		if (function_exists('AddLanguageNames')) {
			echo FOOTER_AVAILABLE_LANGUAGES . ': ';
			AddLanguageNames(' | ', false); 
		} else {
			echo "&nbsp;";
		}
	?>
	<br>
	<? /* The Real Footer */ ?>
	
	<?
		if (isset($dyndate) && $dyndate == 1) {
		 	print FOOTER_GENERATED_DYNAMICALLY;
		} elseif (isset($dyndate)) {
			print gmstrftime(FINK_DATE_FORMAT, $dyndate);
		} else {
		 	// print gmstrftime(str_replace("{author}", $author, FOOTER_LAST_CHANGED), $date);
			$print_lastchanged = FOOTER_LAST_CHANGED;
			$date_converted = gmstrftime(FINK_DATE_FORMAT, FILEMDATE);
			$date_encoding = mb_detect_encoding($date_converted);
			$date_converted = mb_convert_encoding($date_converted, "UTF-8", FINK_SF_ENCODING);
			
			$print_lastchanged = str_replace("{author}", $author, $print_lastchanged);
			$print_lastchanged = str_replace("{date}", $date_converted, $print_lastchanged);
			$print_lastchanged = str_replace("{time}", gmstrftime(" %R GMT", FILEMDATE), $print_lastchanged);
			print $print_lastchanged;
		}
	?>
</div>
<?
	if ($has_analytics && !isset($skip_analytics)) {
		analytics_print();
	}
?>
</body>
</html>
