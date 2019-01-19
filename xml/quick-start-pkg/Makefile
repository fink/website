# $Id: Makefile,v 1.7 2019/01/19 11:22:33 nieder Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = quick-start-pkg
# The second example is not ready yet...
#TARGET = index.php howtostart.php example.php example2.php
TARGET = \
	index.php \
	howtostart.php \
	example.php

WANT_HTML = 1
DESTDIR = doc/quick-start-pkg

LANGUAGES_AVAILABLE = en de fr
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

# eof
