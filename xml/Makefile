# $Id: Makefile,v 1.12 2004/03/07 17:56:18 fingolfin Exp $

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
	usage \
	users-guide \
	x11

all clean force install check:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

.PHONY: all clean force install

# eof
