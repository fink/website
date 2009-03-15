# $Id: Makefile,v 1.13 2009/03/15 00:37:07 monipol Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = x11.xml
TARGET = index.php intro.php history.php \
	 inst-xfree86.php run-xfree86.php xtools.php other.php \
	 trouble.php tips.php
WANT_HTML = 1
DESTDIR = doc/x11

LANGUAGES_AVAILABLE = en es fr ja zh ru pt
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
