# $Id: Makefile,v 1.4 2001/07/25 18:55:23 chrisp Exp $

# generate all documents

SUBDIRS = faq cvsaccess packaging fink-readme usage install x11

all clean force:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

.PHONY: all clean force

# eof
