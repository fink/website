# $Id: Makefile,v 1.10 2004/02/11 16:42:48 chris01 Exp $

# generate all documents

SUBDIRS = fink-readme usage install \
	  faq users-guide \
	  cvsaccess porting packaging x11 \
	  news

all clean force install:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

# validate the XML files

check:
	/usr/bin/find . -name "*.xml" | xargs xmllint --noout --valid

.PHONY: all clean force install

# eof
