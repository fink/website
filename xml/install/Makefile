# $Id: Makefile,v 1.11 2013/03/30 17:22:39 alexkhansen Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = install
TARGET = install.php install-fast.php install-first.php \
	 install-up03.php install-up02.php install.en.txt
WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/bundled

LANGUAGES_AVAILABLE = en de
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

install-hook:
	mkdir -p $(basedir)/fink/
	cp install.en.html $(basedir)/fink/INSTALL.html
	cp install.*.html $(basedir)/fink/
	cp install.en.txt $(basedir)/fink/INSTALL

# eof
