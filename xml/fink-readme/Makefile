# $Id: Makefile,v 1.17 2015/02/17 21:14:26 k-m_schindler Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = readme
TARGET = readme.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc

LANGUAGES_AVAILABLE = en de es fr ja pt ru zh
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

install-hook:
	cp readme.en.html $(basedir)/fink/README.html
	cp readme.*.html $(basedir)/fink/
	cp readme.en.txt $(basedir)/fink/README

# eof
