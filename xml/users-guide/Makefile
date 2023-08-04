# $Id: Makefile,v 1.18 2019/01/19 11:22:33 nieder Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = uguide
TARGET = \
	index.php \
	intro.php \
	install.php \
	upgrade.php \
	packages.php \
	conf.php \
	usage.php

WANT_HTML = 1
DESTDIR = doc/users-guide

LANGUAGES_AVAILABLE = en de es fr ja pt ru zh
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

# eof
