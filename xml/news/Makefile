# $Id: Makefile,v 1.3 2003/01/05 22:37:04 rangerrick Exp $

# process XML files with stylesheet to produce HTML

CURRDATE := `date '+%a, %d %b %Y %H:%M:%S %Z'`

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
