<?php

$has_analytics     = true;
$analytics_account = "UA-305132-6";

function analytics_print($virtual_page=null, $account=null) {
	/*
	 * first, the feedburner stuff
	 * login went to fink-core-private, 02/23/2007
	 */
	print "<script src=\"http://feeds2.feedburner.com/~s/FinkProjectNews\" type=\"text/javascript\" charset=\"utf-8\"></script>\n";

	if ($account == null) {
		global $analytics_account;
		$account = $analytics_account;
	}

	// next, google analytics
	print "<script type=\"text/javascript\">\n";
	print "(function ga_init() {\n";
	print "    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;\n";
	print "    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';\n";
	print "    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);\n";
	print "})();\n\n";

	print "var _gaq = _gaq || [];\n";
	print "  _gaq.push(['_setAccount', '$account']);\n";
	print "  _gaq.push(['_gat._anonymizeIp']);\n";
	if ($virtual_page != null) {
		print "  _gaq.push(['_trackPageview', '$virtual_page']);\n";
	} else {
		print "  _gaq.push(['_trackPageview']);\n";
	}
	print "</script>\n";
}

function analytics_download_link($href, $contents, $analytics_name) {
	print "<a href=\"$href\" onClick=\"_gaq.push(['_trackPageview', '" . str_replace(array("'", "\""), array("\\'", "\&quot;"), $analytics_name) . "']);\">" . $contents . '</a>';
}
?>
