# $Id: Makefile,v 1.12 2004/10/20 11:11:25 dmacks Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = uguide.xml
TARGET = index.php intro.php install.php upgrade.php packages.php conf.php usage.php
WANT_HTML = 1
DESTDIR = doc/users-guide

LANGUAGES_AVAILABLE = en ja zh fr es de
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
