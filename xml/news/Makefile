# $Id: Makefile,v 1.11 2011/10/25 02:12:33 fingolfin Exp $

# process XML files with stylesheet to produce HTML

CURRDATE := `date '+%a, %d %b %Y %H:%M:%S %Z'`
W3CDTFDATE := `LANG=C date '+%Y-%m-%dT%H:%M:%S%z' | perl -pe 's,^(.*)(\d\d)$$,$$1:$$2,'`

basedir = ..

SOURCE = news
TARGET = news.inc news.rdf index.php
#WANT_HTML = 1
DESTDIR = news
INC_BASENAME = news

# Custom stylesheet
STYLESHEET_WEBSITE = finknews.i18n.xsl
STYLESHEET_RDF = finknews-rdf.i18n.xsl

LANGUAGES_AVAILABLE = en de es fr zh ja pt
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

# Custom rendering
%.inc.tmp: $(SOURCE) $(STYLESHEET_WEBSITE)
	xmllint --noout --valid $(SOURCE)
	$(foreach LANGUAGE, $(LANGUAGES), xsltproc -o index.$(LANGUAGE).php.tmp $(STYLESHEET_WEBSITE) news.$(LANGUAGE).xml; )

%.rdf: $(SOURCE) $(STYLESHEET_RDF)
	xmllint --noout --valid $(SOURCE)
	$(foreach XMLFILE, $(SOURCE), xsltproc --stringparam currdate "$(W3CDTFDATE)" -o $(subst .xml,.rdf,$(XMLFILE)) $(STYLESHEET_RDF) $(XMLFILE); )

%.inc: %.inc.tmp $(PROCESS_WEBSITE)
	$(PROCESS_WEBSITE) <$< >$@

index.php:
	echo '<? include_once "../phpLang.inc.php"; ?>' > $@

news.inc:
	echo '<? include_once dirname(__FILE__) . "/news.en.inc"; ?>' > $@

news.rdf: news.en.rdf
	-cp news.en.rdf news.rdf

all: news.inc index.php news.rdf


# eof 
