<?
/* $Id: header.inc,v 1.5 2007/12/13 19:47:08 rangerrick Exp $ */

$fsroot = $root = "../";

$skip_analytics = true;

include_once $fsroot."download/nav.inc";
include_once $fsroot."header.inc";
include_once $fsroot."analytics.inc";

analytics_print();

?>
