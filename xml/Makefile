# $Id: Makefile,v 1.16 2019/01/19 10:11:12 nieder Exp $

# generate all documents

SUBDIRS = \
	advanced \
	cvsaccess \
	doc \
	faq \
	fink-readme \
	gitaccess \
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
