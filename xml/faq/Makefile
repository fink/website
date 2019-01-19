# $Id: Makefile,v 1.21 2019/01/19 11:22:33 nieder Exp $

# process XML files with stylesheet to produce HTML

basedir = ..

SOURCE = faq
TARGET = \
	index.php \
	general.php \
	relations.php \
	usage-fink.php \
	comp-general.php \
	comp-packages.php \
	usage-general.php \
	usage-packages.php \
	upgrade-fink.php \
	mirrors.php

#TARGET = index.php general.php relations.php \
#	 install.php usage.php packages.php
WANT_HTML = 1
DESTDIR = faq

LANGUAGES_AVAILABLE = en de es fr ja pt ru zh
LANGUAGES = $(LANGUAGES_AVAILABLE)
include $(basedir)/Makefile.common

# eof
