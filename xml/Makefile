# $Id: Makefile,v 1.1 2001/06/18 13:51:50 chrisp Exp $

# generate all documents

SUBDIRS = faq cvsaccess usage

all clean force:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

.PHONY: all clean force

# eof
