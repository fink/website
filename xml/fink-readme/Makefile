# $Id: Makefile,v 1.13 2005/02/17 04:55:04 horsager Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = readme.xml
TARGET = readme.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc

LANGUAGES_AVAILABLE = fr en es ja zh ru
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

install-hook:
	cp readme.en.html $(basedir)/fink/README.html
	cp readme.*.html $(basedir)/fink/
	cp readme.en.txt $(basedir)/fink/README

# eof
