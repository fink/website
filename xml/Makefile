# $Id: Makefile,v 1.13 2004/09/20 20:14:22 rangerrick Exp $

# generate all documents

SUBDIRS = \
	cvsaccess \
	doc \
	faq \
	fink-readme \
	install \
	news \
	packaging \
	porting \
	security \
	usage \
	users-guide \
	x11

all clean force install check:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

.PHONY: all clean force install

# eof
