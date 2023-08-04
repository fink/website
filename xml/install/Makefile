# $Id: Makefile,v 1.12 2019/01/19 11:22:33 nieder Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = install
TARGET = \
	index.php \
	install-fast.php \
	install-first.php \
	install-up03.php \
	install-up02.php \
	install.en.txt

WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/install

LANGUAGES_AVAILABLE = en de
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

install-hook:
	mkdir -p $(basedir)/fink/
	cp install.en.html $(basedir)/fink/INSTALL.html
	cp install.*.html $(basedir)/fink/
	cp install.en.txt $(basedir)/fink/INSTALL

# eof
