# $Id: Makefile,v 1.4 2003/11/04 10:05:27 fingolfin Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = readme.xml
TARGET = readme.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/bundled

include $(basedir)/Makefile.common

install-hook:
	cp readme.html $(basedir)/fink/README.html
	cp readme.txt $(basedir)/fink/README

# eof
