# $Id: Makefile,v 1.5 2004/02/29 23:09:09 fingolfin Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = readme.xml
TARGET = readme.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/bundled

LANGUAGES = en ja
include $(basedir)/Makefile.i18n.common

install-hook:
	cp readme.en.html $(basedir)/fink/README.html
	cp readme.en.txt $(basedir)/fink/README

# eof
