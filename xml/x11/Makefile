# $Id: Makefile,v 1.11 2004/10/27 12:42:57 zifra Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = x11.xml
TARGET = index.php intro.php history.php \
	 inst-xfree86.php run-xfree86.php xtools.php other.php \
	 trouble.php tips.php
WANT_HTML = 1
DESTDIR = doc/x11

LANGUAGES_AVAILABLE = en es fr ja zh
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
