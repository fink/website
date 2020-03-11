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
	new Distribution("10.4",        "powerpc", "10.4/powerpc",       "dists/10.4",         5, TRUE, TRUE, FALSE),
	new Distribution("10.4",        "i386",    "10.4/i386",          "dists/10.4",         6, TRUE, TRUE, FALSE),
	new Distribution("10.5",        "powerpc", "10.5/powerpc",       "dists/10.4",         7, TRUE, TRUE, FALSE),
	new Distribution("10.5",        "i386",    "10.5/i386",          "dists/10.4",         8, TRUE, TRUE, FALSE),
	new Distribution("10.5",        "x86_64",  "10.5/x86_64",        "dists/10.4",         9, TRUE, FALSE, FALSE),
	new Distribution("10.6",        "i386",    "10.6/i386",          "dists/10.4",         10, TRUE, TRUE, FALSE),
	new Distribution("10.6",        "x86_64",  "10.6/x86_64",        "dists/10.4",         11, TRUE, TRUE, FALSE),
	new Distribution("10.7",        "x86_64",  "10.7/x86_64",        "dists/10.7",         12, TRUE, TRUE, FALSE),
	new Distribution("10.8",        "x86_64",  "10.8/x86_64",        "dists/10.7",         13, TRUE, TRUE, FALSE),
	new Distribution("10.9",        "x86_64",  "10.9/x86_64",        "dists/10.9-libcxx",  14, TRUE, TRUE, TRUE),
	new Distribution("10.10",       "x86_64",  "10.10/x86_64",       "dists/10.9-libcxx",  15, TRUE, TRUE, TRUE),
	new Distribution("10.11",       "x86_64",  "10.11/x86_64",       "dists/10.9-libcxx",  16, TRUE, TRUE, TRUE),
	new Distribution("10.12",       "x86_64",  "10.12/x86_64",       "dists/10.9-libcxx",  17, TRUE, TRUE, TRUE),
	new Distribution("10.13",       "x86_64",  "10.13/x86_64",       "dists/10.9-libcxx",  18, TRUE, TRUE, TRUE),
	new Distribution("10.14",       "x86_64",  "10.14/x86_64",       "dists/10.9-libcxx",  19, TRUE, TRUE, TRUE),
	new Distribution("10.14.5",     "x86_64",  "10.14.5/x86_64",     "dists/10.9-libcxx",  20, TRUE, TRUE, TRUE),
	new Distribution("10.15",       "x86_64",  "10.15/x86_64",       "dists/10.9-libcxx",  21, TRUE, TRUE, TRUE),
) as $_dist) {
	$distributions[$_dist->getId()] = $_dist;
}

## new Release('distribution_id', 'type', 'version', 'priority', 'isactive');
foreach(array(
	new Release($distributions["10.1-powerpc"],         "bindist",          "0.4.1", 1, TRUE),
	new Release($distributions["10.1-powerpc"],         "bindist-unstable", "0.4.1-updates", 2, TRUE),
	new Release($distributions["10.1-powerpc"],         "stable",           "current", 3, TRUE),
	new Release($distributions["10.1-powerpc"],         "unstable",         "current", 4, TRUE),
	new Release($distributions["10.2-powerpc"],         "bindist",          "0.5.3", 5, TRUE),
	new Release($distributions["10.2-powerpc"],         "bindist-unstable", "0.5.3-updates", 6, TRUE),
	new Release($distributions["10.2-powerpc"],         "stable",           "current", 7, TRUE),
	new Release($distributions["10.2-powerpc"],         "unstable",         "current", 8, TRUE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "bindist",          "0.6.4", 9, TRUE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "bindist-unstable", "0.6.4-updates", 10, TRUE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "stable",           "current", 11, TRUE),
	new Release($distributions["10.2-gcc3.3-powerpc"],  "unstable",         "current", 12, TRUE),
	new Release($distributions["10.3-powerpc"],         "bindist",          "0.7.2", 13, TRUE),
	new Release($distributions["10.3-powerpc"],         "bindist-unstable", "0.7.2-updates", 14, TRUE),
	new Release($distributions["10.3-powerpc"],         "stable",           "current", 15, TRUE),
	new Release($distributions["10.3-powerpc"],         "unstable",         "current", 16, TRUE),
	new Release($distributions["10.4-powerpc"],         "bindist",          "0.8.1", 17, TRUE),
	new Release($distributions["10.4-powerpc"],         "bindist-unstable", "0.8.1-updates", 18, TRUE),
	new Release($distributions["10.4-powerpc"],         "stable",           "current", 19, TRUE),
	new Release($distributions["10.4-powerpc"],         "unstable",         "current", 20, TRUE),
	new Release($distributions["10.4-i386"],            "bindist",          "current", 21, TRUE),
	new Release($distributions["10.4-i386"],            "bindist-unstable", "current", 22, TRUE),
	new Release($distributions["10.4-i386"],            "stable",           "current", 23, TRUE),
	new Release($distributions["10.4-i386"],            "unstable",         "current", 24, TRUE),
	new Release($distributions["10.5-powerpc"],         "bindist",          "0.9.0",   25, TRUE),
	new Release($distributions["10.5-powerpc"],         "bindist-unstable", "0.9.0-updates", 26, TRUE),
	new Release($distributions["10.5-powerpc"],         "stable",           "current", 27, TRUE),
	new Release($distributions["10.5-powerpc"],         "unstable",         "current", 28, TRUE),
	new Release($distributions["10.5-i386"],            "bindist",          "0.9.0",   29, TRUE),
	new Release($distributions["10.5-i386"],            "bindis-unstable",  "current", 30, TRUE),
	new Release($distributions["10.5-i386"],            "stable",           "current", 31, TRUE),
	new Release($distributions["10.5-i386"],            "unstable",         "current", 32, TRUE),
	new Release($distributions["10.5-x86_64"],          "bindist",          "current", 33, TRUE),
	new Release($distributions["10.5-x86_64"],          "bindist-unstable", "current", 34, TRUE),
	new Release($distributions["10.5-x86_64"],          "stable",           "current", 35, TRUE),
	new Release($distributions["10.5-x86_64"],          "unstable",         "current", 36, TRUE),
	new Release($distributions["10.6-i386"],            "stable",           "current", 37, TRUE),
	new Release($distributions["10.6-i386"],            "unstable",         "current", 38, TRUE),
	new Release($distributions["10.6-x86_64"],          "stable",           "current", 39, TRUE),
	new Release($distributions["10.6-x86_64"],          "unstable",         "current", 40, TRUE),
	new Release($distributions["10.7-x86_64"],          "stable",           "current", 41, TRUE),
	new Release($distributions["10.8-x86_64"],          "bindist",          "current", 42, TRUE),
	new Release($distributions["10.8-x86_64"],          "stable",           "current", 43, TRUE),
	new Release($distributions["10.9-x86_64"],          "bindist",          "current", 44, TRUE),
	new Release($distributions["10.9-x86_64"],          "stable",           "current", 45, TRUE),
	new Release($distributions["10.10-x86_64"],         "bindist",          "current", 46, TRUE),
	new Release($distributions["10.10-x86_64"],         "stable",           "current", 47, TRUE),
	new Release($distributions["10.11-x86_64"],         "bindist",          "current", 48, TRUE),
	new Release($distributions["10.11-x86_64"],         "stable",           "current", 49, TRUE),
	new Release($distributions["10.12-x86_64"],         "bindist",          "current", 50, TRUE),
	new Release($distributions["10.12-x86_64"],         "stable",           "current", 51, TRUE),
	new Release($distributions["10.13-x86_64"],         "bindist",          "current", 52, TRUE),
	new Release($distributions["10.13-x86_64"],         "stable",           "current", 53, TRUE),
	new Release($distributions["10.14-x86_64"],         "bindist",          "current", 54, TRUE),
	new Release($distributions["10.14-x86_64"],         "stable",           "current", 55, TRUE),
	new Release($distributions["10.14.5-x86_64"],         "stable",           "current", 56, TRUE),
	new Release($distributions["10.15-x86_64"],         "stable",           "current", 57, TRUE),
) as $_rel) {
	$releases[$_rel->getId()] = $_rel;
}

foreach($releases as $_rel) {
	$_dist_id = $_rel->getDistribution()->getId();
	$dists_to_releases[$_dist_id][$_rel->getType()] = $_rel;
}
?>
