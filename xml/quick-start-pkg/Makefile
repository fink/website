# $Id: Makefile,v 1.3 2004/10/20 11:11:24 dmacks Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = quick-start-pkg.xml
# The second example is not ready yet...
#TARGET = index.php howtostart.php example.php example2.php
TARGET = index.php howtostart.php example.php
WANT_HTML = 1
DESTDIR = doc/quick-start-pkg

LANGUAGES_AVAILABLE = en fr
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
