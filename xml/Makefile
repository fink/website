# $Id: Makefile,v 1.15 2005/03/02 05:47:20 michga Exp $

# generate all documents

SUBDIRS = \
	advanced \
	cvsaccess \
	doc \
	faq \
	fink-readme \
	install \
	multilingual \
	netiquette \
	news \
	packaging \
	porting \
	quick-start-pkg \
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
