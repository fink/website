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
	print "  var gaJsHost = ((\"https:\" == document.location.protocol)? \"https://ssl.\":\"http://www.\");\n";
	print "  document.write(\"\\<script src='\" + gaJsHost + \"google-analytics.com/ga.js' type='text/javascript'>\\<\\/script>\");\n";
	print "</script>\n";

	print "<script type=\"text/javascript\">\n";
	print "  var pageTracker = _gat._getTracker(\"$account\");\n";
	print "  pageTracker._initData();\n";
	if ($virtual_page != null) {
		print "  pageTracker._trackPageview(\"$virtual_page\");\n";
	} else {
		print "  pageTracker._trackPageview();\n";
	}
	print "</script>\n";
}

function analytics_download_link($href, $contents, $analytics_name) {
	print "<a href=\"$href\" onClick=\"pageTracker._trackPageview('" . str_replace(array("'", "\""), array("\\'", "\&quot;"), $analytics_name) . "');\">" . $contents . '</a>';
}

?>
