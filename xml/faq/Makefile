# $Id: Makefile,v 1.12 2004/05/19 12:22:21 babayoshihiko Exp $

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

LANGUAGES = en fr ja zh es
include $(basedir)/Makefile.i18n.common

# eof
