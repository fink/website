<?php
/* $Id: header.inc,v 1.6 2014/10/23 22:32:37 thesin Exp $ */

$fsroot = $root = "../";

$skip_analytics = true;

include_once $fsroot."download/nav.inc";
include_once $fsroot."header.inc";
include_once $fsroot."analytics.inc";

analytics_print();

?>
