# $Id: Makefile,v 1.9 2019/01/19 11:22:33 nieder Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = usage
TARGET = \
	index.php \
	usage.en.txt

WANT_TEXT = 1
WANT_HTML = 1
DESTDIR = doc/usage

LANGUAGES_AVAILABLE = en de es
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

install-hook:
	mkdir -p $(basedir)/fink/
	cp usage.en.html $(basedir)/fink/USAGE.html
	cp usage.*.html $(basedir)/fink/
	cp usage.en.txt $(basedir)/fink/USAGE

# eof
