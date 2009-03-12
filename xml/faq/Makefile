# $Id: Makefile,v 1.18 2009/03/12 17:49:31 alexkhansen Exp $

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

LANGUAGES_AVAILABLE = en fr ja zh es ru pt
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.i18n.common

# eof
