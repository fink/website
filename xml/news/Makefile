# $Id: Makefile,v 1.1 2002/05/30 21:21:02 fingolfin Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = news.xml
TARGET = index.php news.inc
#WANT_HTML = 1
DESTDIR = news

# Custom stylesheet
STYLESHEET_WEBSITE = finknews.xsl

include $(basedir)/Makefile.common

# Custom rendering
news.inc.tmp index.php.tmp: news.xml $(STYLESHEET_WEBSITE)
	xmllint --noout --valid news.xml
	xsltproc -o index.php.tmp $(STYLESHEET_WEBSITE) news.xml

%.inc: %.inc.tmp $(PROCESS_WEBSITE)
	$(PROCESS_WEBSITE) <$< >$@

# eof
