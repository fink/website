# process XML files with stylesheet to produce HTML
# post-processing needed to get PHP processing instructions right

SOURCE = faq.xml
STYLESHEET = ../finkdoc.xsl
TARGET = index.php general.php install.php usage.php packages.php


all: $(TARGET)

%.pphp: $(SOURCE) $(STYLESHEET)
	CLASSPATH=../saxon.jar java com.icl.saxon.StyleSheet $(SOURCE) $(STYLESHEET)

%.php: %.pphp
	sed 's/--phpstart--/<?/g ; s/--phpend--/?>/g' <$< >$@

clean:
	rm -rf *.php *.pphp

# eof
