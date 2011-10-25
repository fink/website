# $Id: Makefile,v 1.16 2011/10/25 01:55:44 fingolfin Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = readme
TARGET = readme.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc

LANGUAGES_AVAILABLE = fr en es ja zh ru pt
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

install-hook:
	cp readme.en.html $(basedir)/fink/README.html
	cp readme.*.html $(basedir)/fink/
	cp readme.en.txt $(basedir)/fink/README

# eof
