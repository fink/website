# $Id: Makefile,v 1.11 2004/02/29 23:07:21 fingolfin Exp $

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

all clean force install:
	@for i in $(SUBDIRS) ; do \
	  $(MAKE) -C $$i -w $@ ; \
	done

# validate the XML files

check:
	/usr/bin/find . -name "*.xml" | xargs xmllint --noout --valid

.PHONY: all clean force install

# eof
