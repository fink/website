<?php /* $Id: footer.inc,v 1.52 2020/03/28 16:19:00 nieder Exp $ */ ?>

<?php /* end content table */ ?>
</div>
<div id="footer-left">
		<a href="<?php print $linkroot ?>legal.php" style="text-decoration:none ; color:black ;">
			Copyright &copy; 2001-2025<br>The&nbsp;Fink&nbsp;Project
	 	</a>
</div>
<div id="footer">
	<?php
		if (function_exists('AddLanguageNames')) {
			echo FOOTER_AVAILABLE_LANGUAGES . ': ';
			AddLanguageNames(' | ', false); 
		} else {
			echo "&nbsp;";
		}
	?>
	<br>
	<?php /* The Real Footer */ ?>
	
	<?php
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
<?php
	if ($has_analytics && !isset($skip_analytics)) {
		analytics_print();
	}
?>
</body>
</html>
