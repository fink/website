# $Id: Makefile,v 1.11 2004/10/20 11:11:23 dmacks Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = readme.xml
TARGET = readme.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc

LANGUAGES_AVAILABLE = fr en ja zh
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

install-hook:
	cp readme.en.html $(basedir)/fink/README.html
	cp readme.*.html $(basedir)/fink/
	cp readme.en.txt $(basedir)/fink/README

# eof
