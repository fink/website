#!/usr/bin/perl -w
use strict;

my ($text, $tag_author, $tag_date);

while (<>) {
  $text .= $_;
}

$tag_author = '$Author'.'$';
$tag_date = '$Date'.'$';

if ($text =~ m|Id: \S+ \S+ (\d{2,4}/\d{1,2}/\d{1,2} \d{1,2}:\d{1,2}:\d{1,2}) (\S+)|) {
  $tag_author = "Author: $2";
  $tag_date = "Date: $1";
}

$text =~ s|<html>.*<head>.*<title>|<?\n\$title = "|s;
while ($text =~ s|(</title>.*[^\\])'(.*</head>)|$1\\'$2|s) {
}
$text =~ s|</title>|";\n\$cvs_author = '$tag_author';\n\$cvs_date = '$tag_date';\n\n\$metatags = '|s;
$text =~ s|</head>.*<body>|';\n\ninclude "header.inc";\n?>\n\n|s;
$text =~ s|</body>.*</html>|\n\n\n<?\ninclude "footer.inc";\n?>\n|s;
$text =~ s|\$Id|\$Fink|g;

print $text;

exit 0;
