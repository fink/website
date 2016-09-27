# $Id: Makefile,v 1.8 2011/10/25 01:55:44 fingolfin Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = usage
TARGET = usage.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/bundled

include $(basedir)/Makefile.common

install-hook:
	mkdir -p $(basedir)/fink/
	cp usage.html $(basedir)/fink/USAGE.html
	cp usage.txt $(basedir)/fink/USAGE

# eof
