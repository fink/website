# $Id: Makefile,v 1.9 2011/10/25 01:55:44 fingolfin Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = install
TARGET = install.php install-fast.php install-first.php \
	 install-up03.php install-up02.php install-up01.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/bundled

include $(basedir)/Makefile.common

install-hook:
	cp install.html $(basedir)/fink/INSTALL.html
	cp install.txt $(basedir)/fink/INSTALL

# eof
