# $Id: Makefile,v 1.7 2004/03/17 20:38:16 jeff_yecn Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = readme.xml
TARGET = readme.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/bundled

LANGUAGES = fr en ja zh
include $(basedir)/Makefile.i18n.common

install-hook:
	cp readme.en.html $(basedir)/fink/README.html
	cp readme.en.txt $(basedir)/fink/README

# eof
