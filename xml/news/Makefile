# $Id: Makefile,v 1.4 2004/11/09 14:33:04 babayoshihiko Exp $

# process XML files with stylesheet to produce HTML

CURRDATE := `date '+%a, %d %b %Y %H:%M:%S %Z'`

basedir = ..

SOURCE = news.xml
TARGET = news.inc news.rdf index.php
#WANT_HTML = 1
DESTDIR = news

# Custom stylesheet
STYLESHEET_WEBSITE = finknews.i18n.xsl
STYLESHEET_RDF = finknews-rdf.i18n.xsl

LANGUAGES_AVAILABLE = en de es fr zh
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# Custom rendering
%.inc.tmp: $(SOURCE) $(STYLESHEET_WEBSITE)
	xmllint --noout --valid $(SOURCE)
	$(foreach LANGUAGE, $(LANGUAGES), xsltproc -o index.$(LANGUAGE).php.tmp $(STYLESHEET_WEBSITE) news.$(LANGUAGE).xml; )
	echo '<? include_once "../phpLang.inc.php"; ?>' > index.php.tmp
	echo '<? include_once "news.en.inc"; ?>' > news.inc.tmp

news.rdf %.rdf: $(SOURCE) $(STYLESHEET_RDF)
	xmllint --noout --valid $(SOURCE)
	$(foreach XMLFILE, $(SOURCE), xsltproc --stringparam currdate "$(CURRDATE)" -o $(subst .xml,.rdf,$(XMLFILE)) $(STYLESHEET_RDF) $(XMLFILE); )
	-cp news.en.rdf news.rdf

%.inc: %.inc.tmp $(PROCESS_WEBSITE)
	$(PROCESS_WEBSITE) <$< >$@

# eof 
