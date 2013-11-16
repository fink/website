<?php

include_once "finkinfo.inc";

$distributions     = array();
$releases          = array();
$dists_to_releases = array();

### new Distribution('name', 'architecture', 'description', 'rcspath', 'priority', 'isactive', 'isvisible', 'issupported')
foreach(array(
	new Distribution("10.1",        "powerpc", "10.1/powerpc",       "packages/dists",     1, TRUE, TRUE, FALSE),
	new Distribution("10.2",        "powerpc", "10.2/powerpc",       "dists/10.2",         2, TRUE, TRUE, FALSE),
	new Distribution("10.2-gcc3.3", "powerpc", "10.2-gcc3.3/powerpc","dists/10.2-gcc3.3",  3, TRUE, TRUE, FALSE),
	new Distribution("10.3",        "powerpc", "10.3/powerpc",       "dists/10.3",         4, TRUE, TRUE, FALSE),
	new Distribution("10.4",        "powerpc", "10.4/powerpc",       "dists/10.4/stable/main/finkinfo/10.4-EOL",         5, TRUE, TRUE, FALSE),
	new Distribution("10.4",        "i386",    "10.4/i386",          "dists/10.4/stable/main/finkinfo/10.4-EOL",         6, TRUE, TRUE, FALSE),
	new Distribution("10.5",        "powerpc", "10.5/powerpc",       "dists/10.4/stable/main/finkinfo/10.5-EOL",         7, TRUE, TRUE, FALSE),
	new Distribution("10.5",        "i386",    "10.5/i386",          "dists/10.4/stable/main/finkinfo/10.5-EOL",         8, TRUE, TRUE, FALSE),
	new Distribution("10.5",        "x86_64",  "10.5/x86_64",        "dists/10.4/stable/main/finkinfo/10.5-EOL",         9, TRUE, FALSE, FALSE),
	new Distribution("10.6",        "i386",    "10.6/i386",          "dists/10.4",         10, TRUE, TRUE, TRUE),
	new Distribution("10.6",        "x86_64",  "10.6/x86_64",        "dists/10.4",         11, TRUE, TRUE, TRUE),
	new Distribution("10.7",        "x86_64",  "10.7/x86_64",        "dists/10.7",         12, TRUE, TRUE, TRUE),
	new Distribution("10.8",        "x86_64",  "10.8/x86_64",        "dists/10.7",         13, TRUE, TRUE, TRUE),
	new Distribution("10.9",        "x86_64",  "10.9/x86_64",        "dists/10.7",         14, TRUE, TRUE, TRUE),
) as $_dist) {
	$distributions[$_dist->getId()] = $_dist;
}

## new Release('distribution_id', 'type', 'version', 'priority', 'isactive');
foreach(array(
	new Release($distributions["10.1-powerpc"],         "stable",   "current", 1, TRUE),
	new Release($distributions["10.1-powerpc"],         "unstable", "current", 2, TRUE),
	new Release($distributions["10.2-powerpc"],         "stable",   "current", 3, TRUE),
	new Release($distributions["10.2-powerpc"],         "unstable", "current", 4, TRUE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "stable",   "current", 5, TRUE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "unstable", "current", 6, TRUE),
	new Release($distributions["10.3-powerpc"],         "stable",   "current", 7, TRUE),
	new Release($distributions["10.3-powerpc"],         "unstable", "current", 8, TRUE),
	new Release($distributions["10.4-powerpc"],         "stable",   "current", 9, TRUE),
	new Release($distributions["10.4-i386"],            "stable",   "current", 10, TRUE),
	new Release($distributions["10.5-powerpc"],         "bindist",  "0.9.0",   11, TRUE),
	new Release($distributions["10.5-powerpc"],         "stable",   "current", 12, TRUE),
	new Release($distributions["10.5-i386"],            "bindist",  "0.9.0",   13, TRUE),
	new Release($distributions["10.5-i386"],            "stable",   "current", 14, TRUE),
	new Release($distributions["10.5-x86_64"],          "stable",   "current", 15, TRUE),
	new Release($distributions["10.6-i386"],            "stable",   "current", 16, TRUE),
	new Release($distributions["10.6-x86_64"],          "stable",   "current", 17, TRUE),
	new Release($distributions["10.7-x86_64"],          "stable",   "current", 18, TRUE),
	new Release($distributions["10.8-x86_64"],          "bindist",  "current", 19, TRUE),
	new Release($distributions["10.8-x86_64"],          "stable",   "current", 20, TRUE),
	new Release($distributions["10.9-x86_64"],          "stable",   "current", 21, TRUE),
) as $_rel) {
	$releases[$_rel->getId()] = $_rel;
}

foreach($releases as $_rel) {
	$_dist_id = $_rel->getDistribution()->getId();
	$dists_to_releases[$_dist_id][$_rel->getType()] = $_rel;
}

?>
