# $Id: Makefile,v 1.8 2002/04/15 19:53:09 fingolfin Exp $

# generate all documents

SUBDIRS = fink-readme usage install \
	  faq users-guide \
	  cvsaccess porting packaging x11

all clean force install:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

# validate the XML files

check:
	find -name "*.xml" | xargs xmllint --noout --valid

.PHONY: all clean force install

# eof
