# $Id: Makefile,v 1.2 2001/07/06 20:17:25 chrisp Exp $

# generate all documents

SUBDIRS = faq cvsaccess usage packaging install

all clean force:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

.PHONY: all clean force

# eof
