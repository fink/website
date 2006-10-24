#!/usr/bin/perl -w
use strict;

my ($filename, $currentlanguage);

if ($ARGV[0] =~ /(.+)\.([^.]+)\.html\.tmp/) {
    $filename = $1;
    $currentlanguage = $2;
}

my %phpLang_languages = (
	"en"		=>	['en', 'english', 'English'],
	"fr"		=>	['fr', 'french', 'Fran&ccedil;ais'],
	"cs"								=>	['cs', 'czech', ''],
	"da"								=>	['da', 'danish', 'Dansk'],
	"nl"			=>	['nl', 'dutch', 'Nederlands'],
	"de"		=>	['de', 'german', 'Deutsch'],
	"fi"							=>	['fi', 'finnish', ''],
	"is"							=>	['is', 'icelandic', ''],
	"it"							=>	['it', 'italian', 'Italiano'],
	"ja"							=>	['ja', 'japanese', '&#26085;&#26412;&#35486; (Nihongo)'],
	"no"							=>	['no', 'norwegian', ''],
	"pl"								=>	['pl', 'polish', 'Polski'],
	"ru"							=>	['ru', 'russian', '&#1056;&#1091;&#1089;&#1089;&#1082;&#1080;&#1081; (Russkiy)'],
	"sk"								=>	['sk', 'slovak', ''],
	"es"		=>	['es', 'spanish', 'Espa&ntilde;ol'],
	"thi"								=>	['th', 'thai', ''],
	"pt-br"								=>	['pt-br', 'brazilian portuguese'],
	"pt"	=>	['pt', 'portuguese', 'Portugu&ecirc;s'],
	"uk"		=>	['ua', 'ukrainian', ''],
	"zh-tw"								=>	['zh-tw', 'chinese_traditional', ''],
	"zh"		=>	['zh', 'chinese_simplified', '&#20013;&#25991; (&#31616;) (Simplified Chinese)']
);

my $newheader = '<table width="100%" cellspacing="0">' .
"\n" . '<tr valign="bottom">' . "\n" . '<td align="center">' . "\n" .
    'Available Languages:  | ' . "\n";

for my $language (sort @ARGV) {
    if (exists $phpLang_languages{$language}) {
	if ($language eq $currentlanguage) {
	    $newheader .= "${$phpLang_languages{$language}}[2] | \n";
	} else {
	    $newheader .= "<a href=\"$filename.$language.html\">${$phpLang_languages{$language}}[2]</a> | \n";
	}
    }
}

$newheader .= "</td>\n</tr>\n</table>\n" ;

open(INFILE,"$ARGV[0]") or die "Can't open $ARGV[0]: $!";

my $text;

while (<INFILE>) {
    $_ =~ s/\$Id/\$Fink/g;
    $_ =~ s/<body>/<body>\n$newheader/;
  $text .= $_;
}

close INFILE;

print $text;

exit 0;
