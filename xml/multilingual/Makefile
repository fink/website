# $Id: Makefile,v 1.4 2004/10/20 11:11:23 dmacks Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = multilingual.xml
TARGET = index.php intro.php files.php procedure.php resources.php appendix.php
WANT_HTML = 1
DESTDIR = doc/multilingual

LANGUAGES_AVAILABLE = en fr zh
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
