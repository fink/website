# $Id: Makefile,v 1.13 2005/02/01 02:34:17 horsager Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = uguide.xml
TARGET = index.php intro.php install.php upgrade.php packages.php conf.php usage.php
WANT_HTML = 1
DESTDIR = doc/users-guide

LANGUAGES_AVAILABLE = en ja zh fr es de ru
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
