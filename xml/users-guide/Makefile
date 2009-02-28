# $Id: Makefile,v 1.14 2009/02/28 21:54:08 alexkhansen Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = uguide.xml
TARGET = index.php intro.php install.php upgrade.php packages.php conf.php usage.php
WANT_HTML = 1
DESTDIR = doc/users-guide

LANGUAGES_AVAILABLE = en ja zh fr es de ru pt
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
