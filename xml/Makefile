# $Id: Makefile,v 1.3 2001/07/15 20:13:53 chrisp Exp $

# generate all documents

SUBDIRS = faq cvsaccess packaging usage install x11

all clean force:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

.PHONY: all clean force

# eof
