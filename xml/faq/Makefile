# $Id: Makefile,v 1.10 2004/03/02 03:15:43 jeff_yecn Exp $

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

LANGUAGES = en ja zh
include $(basedir)/Makefile.i18n.common

# eof
