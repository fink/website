#!/usr/bin/perl -w
use strict;

# configuration
my $linelength = 76;

# input
my ($text);

while (<>) {
  $text .= $_;
}

# output state
my ($s, $prefix, $newprefix, $ptype, $leading, $uscore);
$s = "";
$prefix = "";
$newprefix = "";
$ptype = 99;
$leading = 0;
$uscore = 0;

# output routine
sub render {
  my ($line, $pos, $t);

  print "\n"x$leading;
  $leading = 1;

  $s =~ s/&quot;/\"/g;   # xsltproc quirk - converts all " to &quot;

  if ($ptype == 3) {
    # preformatted
    foreach $line (split(/\n/, $s)) {
      print $prefix.$line."\n";
      $prefix = $newprefix;
    }
  } else {
    # normal text flow

    $s =~ s/^\n+//s;       # no newlines at the beginning (but a blank is okay)
    $s =~ s/\s+/ /gs;      # collapse whitespace (removes newlines, too)
    $s =~ s/\s+$//s;       # no whitespace at the end
    $s =~ s/((\S+)\s\[(\S+)\])/
      ($2 eq $3) ? ("<".$3.">") : $1/ge;   # collapse links with URL = text
    $s =~ s/\$Id/\$Fink/g; # hide CVS tag from CVS
    $s =~ s/&lt;/</g;      # HTML entities
    $s =~ s/&gt;/>/g;      #  "
    $s =~ s/&amp;/&/g;     #  "

    my $space = $linelength - length($prefix);
    while (length($s) > $space) {
      $pos = rindex($s," ",$space);
      if ($pos < 0) {
	$t = substr($s,0,$space);
	$s = substr($s,$space);
      } else {
	$t = substr($s,0,$pos);
	$s = substr($s,$pos+1);
      }
      print $prefix.$t."\n";
      $prefix = $newprefix;
      $space = $linelength - length($prefix);
    }
    print $prefix.$s."\n";
    $prefix = $newprefix;
  }

  $s = "";
}

# tag callbacks
sub starttag {
  my $tag = shift;

  if ($tag eq "h1") {
    $leading = 2;
    $leading = 1 if $ptype == 98;
    $leading = 0 if $ptype == 99;
    $ptype = 1;
    $s = " ";
  } elsif ($tag eq "h2") {
    $leading = 2;
    $leading = 1 if $ptype == 98;
    $leading = 0 if $ptype == 99;
    $leading = 1 if $ptype == 1;
    $ptype = 2;
    $s = " ";
  } elsif ($tag eq "p") {
    if ($ptype == 2 or $ptype == 99 or $ptype == 98) {
      $leading = 0;
    } else {
      $leading = 1;
    }
    if ($ptype == 99 or $ptype == 98) {
      $ptype = 98;
    } else {
      $ptype = 0;
    }
    $s = "";
  } elsif ($tag eq "pre") {
    $ptype = 3;
    $prefix .= "   ";
    $newprefix .= "   ";
    $leading = 1;
    $s = "";
  } elsif ($tag eq "li") {
    $prefix .= " * ";
    $newprefix .= "   ";
  } elsif ($tag eq "dd") {
    $prefix .= "   ";
    $newprefix .= "   ";
  } elsif ($tag eq "u") {
    #$s .= "_";
    $uscore++;
  }
}

sub endtag {
  my $tag = shift;
  my ($cnt);

  if ($tag eq "h1") {
    $cnt = length($s)+1;
    &render();
    print "="x$cnt."\n";
  } elsif ($tag eq "h2") {
    $cnt = length($s)+1;
    &render();
    print "-"x$cnt."\n";
  } elsif ($tag eq "p") {
    &render();
  } elsif ($tag eq "pre") {
    &render();
    $prefix = substr($prefix,0,-3);
    $newprefix = substr($newprefix,0,-3);
    $ptype = 0;
  } elsif ($tag eq "li") {
    $prefix = substr($prefix,0,-3);
    $newprefix = substr($newprefix,0,-3);
  } elsif ($tag eq "dd") {
    $prefix = substr($prefix,0,-3);
    $newprefix = substr($newprefix,0,-3);
  } elsif ($tag eq "u") {
    #$s .= "_";
    $uscore--;
    $uscore = 0 if $uscore < 0;
  }
}

sub addtext {
  my $part = shift;

  if ($uscore > 0) {
    $part =~ tr/ /_/;
  }
  $s .= $part;
}


# input parser
my ($pos, $endpos, $t, $tag);
while (length($text) > 0) {
  $pos = index($text,"<");
  if ($pos < 0) {
    last;
  }
  if ($pos > 0) {
    &addtext(substr($text,0,$pos));
  }

  $endpos = index($text,">",$pos);
  if ($endpos <= $pos) {
    last;
  }
  $tag = substr($text,$pos+1,$endpos-$pos-1);
  if (substr($tag,0,1) eq "/") {
    &endtag(substr($tag,1));
  } else {
    &starttag($tag);
  }

  $text = substr($text,$endpos+1);
}

print "\n\nEOF.\n";

exit 0;
