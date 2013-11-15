<?php

include_once "finkinfo.inc";

$distributions     = array();
$releases          = array();
$dists_to_releases = array();

foreach(array(
	new Distribution("10.2-EOL",        "powerpc", "10.2-EOL/powerpc",       "dists/10.2",         1, TRUE, TRUE, TRUE),
	new Distribution("10.2-gcc3.3-EOL", "powerpc", "10.2-gcc3.3-EOL/powerpc","dists/10.2-gcc3.3",  2, TRUE, TRUE, TRUE),
	new Distribution("10.3-EOL",        "powerpc", "10.3-EOL/powerpc",       "dists/10.3",         3, TRUE, TRUE, TRUE),
	new Distribution("10.4-EOL",        "powerpc", "10.4-EOL/powerpc",       "dists/10.4",         4, TRUE, TRUE, TRUE),
	new Distribution("10.4-EOL",        "i386",    "10.4-EOL/i386",          "dists/10.4",         5, TRUE, TRUE, TRUE),
	new Distribution("10.5-EOL",        "powerpc", "10.5-EOL/powerpc",       "dists/10.4",         6, TRUE, TRUE, TRUE),
	new Distribution("10.5-EOL",        "i386",    "10.5-EOL/i386",          "dists/10.4",         7, TRUE, TRUE, TRUE),
	new Distribution("10.5-EOL",        "x86_64",  "10.5-EOL/x86_64",        "dists/10.4",         8, TRUE, FALSE, FALSE),
	new Distribution("10.6",            "i386",    "10.6/i386",              "dists/10.4",         9, TRUE, TRUE, TRUE),
	new Distribution("10.6",            "x86_64",  "10.6/x86_64",            "dists/10.4",        10, TRUE, TRUE, TRUE),
	new Distribution("10.7",            "x86_64",  "10.7/x86_64",            "dists/10.7",        11, TRUE, TRUE, TRUE),
	new Distribution("10.8",            "x86_64",  "10.8/x86_64",            "dists/10.7",        12, TRUE, TRUE, TRUE),
	new Distribution("10.9",            "x86_64",  "10.9/x86_64",            "dists/10.7",        13, TRUE, TRUE, TRUE),
) as $_dist) {
	$distributions[$_dist->getId()] = $_dist;
}

foreach(array(
	new Release($distributions["10.2-EOL-powerpc"],         "stable",   "current", 2, TRUE),
	new Release($distributions["10.2-EOL-powerpc"],         "unstable", "current", 3, TRUE),
	new Release($distributions["10.2-gcc3.3-EOL-powerpc"],  "stable",   "current", 2, TRUE),
	new Release($distributions["10.2-gcc3.3-EOL-powerpc"],  "unstable", "current", 3, TRUE),
	new Release($distributions["10.3-EOL-powerpc"],         "stable",   "current", 2, TRUE),
	new Release($distributions["10.3-EOL-powerpc"],         "unstable", "current", 3, TRUE),
	new Release($distributions["10.4-EOL-powerpc"],         "stable",   "current", 2, TRUE),
	new Release($distributions["10.4-EOL-powerpc"],         "unstable", "current", 3, TRUE),
	new Release($distributions["10.4-EOL-i386"],            "stable",   "current", 2, TRUE),
	new Release($distributions["10.4-EOL-i386"],            "unstable", "current", 3, TRUE),
	new Release($distributions["10.5-EOL-powerpc"],         "bindist",  "0.9.0",   1, TRUE),
	new Release($distributions["10.5-EOL-powerpc"],         "stable",   "current", 2, TRUE),
	new Release($distributions["10.5-EOL-powerpc"],         "unstable", "current", 3, TRUE),
	new Release($distributions["10.5-EOL-i386"],            "bindist",  "0.9.0",   1, TRUE),
	new Release($distributions["10.5-EOL-i386"],            "stable",   "current", 2, TRUE),
	new Release($distributions["10.5-EOL-i386"],            "unstable", "current", 3, TRUE),
	new Release($distributions["10.5-EOL-x86_64"],          "stable",   "current", 2, TRUE),
	new Release($distributions["10.5-EOL-x86_64"],          "unstable", "current", 3, TRUE),
	new Release($distributions["10.6-i386"],                "stable",   "current", 2, TRUE),
	new Release($distributions["10.6-i386"],                "unstable", "current", 3, TRUE),
	new Release($distributions["10.6-x86_64"],              "stable",   "current", 2, TRUE),
	new Release($distributions["10.6-x86_64"],              "unstable", "current", 3, TRUE),
	new Release($distributions["10.7-x86_64"],              "stable",   "current", 3, TRUE),
	new Release($distributions["10.8-x86_64"],              "bindist",  "current", 1, TRUE),
	new Release($distributions["10.8-x86_64"],              "stable",   "current", 3, TRUE),
	new Release($distributions["10.9-x86_64"],              "stable",   "current", 3, TRUE),
) as $_rel) {
	$releases[$_rel->getId()] = $_rel;
}

foreach($releases as $_rel) {
	$_dist_id = $_rel->getDistribution()->getId();
	$dists_to_releases[$_dist_id][$_rel->getType()] = $_rel;
}

?>
