# $Id: Makefile,v 1.2 2003/01/05 19:37:05 rangerrick Exp $

# process XML files with stylesheet to produce HTML

CURRDATE := `date '+%Y-%m-%dT%H:%M:%S-05:00'`

basedir = ..

SOURCE = news.xml
TARGET = index.php news.inc news.rdf
#WANT_HTML = 1
DESTDIR = news

# Custom stylesheet
STYLESHEET_WEBSITE = finknews.xsl
STYLESHEET_RDF = finknews-rdf.xsl

include $(basedir)/Makefile.common

# Custom rendering
news.inc.tmp index.php.tmp: news.xml $(STYLESHEET_WEBSITE)
	xmllint --noout --valid news.xml
	xsltproc -o index.php.tmp $(STYLESHEET_WEBSITE) news.xml

news.rdf: news.xml $(STYLESHEET_RDF)
	xmllint --noout --valid news.xml
	xsltproc --stringparam currdate "$(CURRDATE)" -o news.rdf $(STYLESHEET_RDF) news.xml

%.inc: %.inc.tmp $(PROCESS_WEBSITE)
	$(PROCESS_WEBSITE) <$< >$@

# eof
