# $Id: Makefile,v 1.10 2004/03/24 18:14:59 dmrrsn Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = readme.xml
TARGET = readme.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc

LANGUAGES = fr en ja zh
include $(basedir)/Makefile.i18n.common

install-hook:
	cp readme.en.html $(basedir)/fink/README.html
	cp readme.*.html $(basedir)/fink/
	cp readme.en.txt $(basedir)/fink/README

# eof
