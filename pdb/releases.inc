<?php

include_once "finkinfo.inc";

$distributions     = array();
$releases          = array();
$dists_to_releases = array();

foreach(array(
	new Distribution("10.1",        "powerpc", "10.1",               "packages/dists",     1, FALSE, FALSE, FALSE),
	new Distribution("10.2-gcc3.3", "powerpc", "10.2 (gcc3.3 only)", "dists/10.2-gcc3.3",  2, TRUE, FALSE, FALSE),
	new Distribution("10.3",        "powerpc", "10.3",               "dists/10.3",         3, TRUE, FALSE, FALSE),
	new Distribution("10.4",        "powerpc", "10.4/powerpc",       "dists/10.4",         4, TRUE, TRUE, FALSE),
	new Distribution("10.4",        "i386",    "10.4/i386",          "dists/10.4",         5, TRUE, TRUE, FALSE),
	new Distribution("10.5",        "powerpc", "10.5/powerpc",       "dists/10.4",         6, TRUE, TRUE, TRUE),
	new Distribution("10.5",        "i386",    "10.5/i386",          "dists/10.4",         7, TRUE, TRUE, TRUE),
	new Distribution("10.5",        "x86_64",  "10.5/x86_64",        "dists/10.4",         8, TRUE, FALSE, FALSE),
	new Distribution("10.6",        "i386",    "10.6/i386",          "dists/10.4",         9, TRUE, TRUE, TRUE),
	new Distribution("10.6",        "x86_64",  "10.6/x86_64",        "dists/10.4",        10, TRUE, TRUE, TRUE),
) as $_dist) {
	$distributions[$_dist->getId()] = $_dist;
}

foreach(array(
	new Release($distributions["10.1-powerpc"],         "bindist",  "0.4.1a",  1, FALSE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "bindist",  "0.6.4",   1, TRUE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "stable",   "current", 2, TRUE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "unstable", "current", 3, TRUE),
	new Release($distributions["10.3-powerpc"],         "bindist",  "0.7.2",   1, TRUE),
	new Release($distributions["10.3-powerpc"],         "stable",   "current", 2, TRUE),
	new Release($distributions["10.3-powerpc"],         "unstable", "current", 3, TRUE),
	new Release($distributions["10.4-powerpc"],         "bindist",  "0.8.1",   1, TRUE),
	new Release($distributions["10.4-powerpc"],         "stable",   "current", 2, TRUE),
	new Release($distributions["10.4-powerpc"],         "unstable", "current", 3, TRUE),
	new Release($distributions["10.4-i386"],            "bindist",  "0.8.1",   1, TRUE),
	new Release($distributions["10.4-i386"],            "stable",   "current", 2, TRUE),
	new Release($distributions["10.4-i386"],            "unstable", "current", 3, TRUE),
	new Release($distributions["10.5-powerpc"],         "bindist",  "0.9.0",   1, TRUE),
	new Release($distributions["10.5-powerpc"],         "stable",   "current", 2, TRUE),
	new Release($distributions["10.5-powerpc"],         "unstable", "current", 3, TRUE),
	new Release($distributions["10.5-i386"],            "bindist",  "0.9.0",   1, TRUE),
	new Release($distributions["10.5-i386"],            "stable",   "current", 2, TRUE),
	new Release($distributions["10.5-i386"],            "unstable", "current", 3, TRUE),
#	new Release($distributions["10.5-x86_64"],          "bindist",  "0.9.0",   1, TRUE),
	new Release($distributions["10.5-x86_64"],          "stable",   "current", 2, TRUE),
	new Release($distributions["10.5-x86_64"],          "unstable", "current", 3, TRUE),
#	new Release($distributions["10.6-i386"],            "bindist",  "0.10.0",  1, TRUE),
	new Release($distributions["10.6-i386"],            "stable",   "current", 2, TRUE),
	new Release($distributions["10.6-i386"],            "unstable", "current", 3, TRUE),
#	new Release($distributions["10.6-x86_64"],          "bindist",  "0.10.0",  1, TRUE),
	new Release($distributions["10.6-x86_64"],          "stable",   "current", 2, TRUE),
	new Release($distributions["10.6-x86_64"],          "unstable", "current", 3, TRUE),
) as $_rel) {
	$releases[$_rel->getId()] = $_rel;
}

foreach($releases as $_rel) {
	$_dist_id = $_rel->getDistribution()->getId();
	$dists_to_releases[$_dist_id][$_rel->getType()] = $_rel;
}

?>
