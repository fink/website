# $Id: Makefile,v 1.14 2005/01/03 03:27:42 dmrrsn Exp $

# generate all documents

SUBDIRS = \
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
