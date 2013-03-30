# $Id: Makefile,v 1.11 2013/03/30 17:22:39 alexkhansen Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = install
TARGET = install.php install-fast.php install-first.php \
	 install-up03.php install-up02.php
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/bundled

include $(basedir)/Makefile.common

install-hook:
	cp install.html INSTALL.htm
	cp install.txt INSTALL

# eof
