# $Id: Makefile,v 1.7 2003/11/04 10:05:27 fingolfin Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = usage.xml
TARGET = usage.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/bundled

include $(basedir)/Makefile.common

install-hook:
	cp usage.html $(basedir)/fink/USAGE.html
	cp usage.txt $(basedir)/fink/USAGE

# eof
