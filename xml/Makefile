# $Id: Makefile,v 1.5 2001/07/31 15:56:02 chrisp Exp $

# generate all documents

SUBDIRS = fink-readme usage install \
	  faq \
	  cvsaccess porting packaging x11

all clean force:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

.PHONY: all clean force

# eof
