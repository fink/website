# $Id: Makefile,v 1.7 2001/12/25 15:41:18 fingolfin Exp $

# generate all documents

SUBDIRS = fink-readme usage install \
	  faq users-guide \
	  cvsaccess porting packaging x11

all clean force install:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

.PHONY: all clean force install

# eof
