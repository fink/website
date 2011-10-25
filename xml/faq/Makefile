# $Id: Makefile,v 1.20 2011/10/25 01:55:44 fingolfin Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = faq
TARGET = index.php general.php relations.php \
	 usage-fink.php comp-general.php comp-packages.php \
	 usage-general.php usage-packages.php upgrade-fink.php mirrors.php
#TARGET = index.php general.php relations.php \
#	 install.php usage.php packages.php
WANT_HTML = 1
DESTDIR = faq

LANGUAGES_AVAILABLE = en fr ja zh es ru pt
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

# eof
