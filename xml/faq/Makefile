# $Id: Makefile,v 1.17 2005/01/19 09:44:32 dmacks Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = faq.xml
TARGET = index.php general.php relations.php \
	 usage-fink.php comp-general.php comp-packages.php \
	 usage-general.php usage-packages.php upgrade-fink.php mirrors.php
#TARGET = index.php general.php relations.php \
#	 install.php usage.php packages.php
WANT_HTML = 1
DESTDIR = faq

LANGUAGES_AVAILABLE = en fr ja zh es ru
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
