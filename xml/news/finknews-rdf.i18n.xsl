<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:rss091="http://purl.org/rss/1.0/modules/rss091#"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:admin="http://webns.net/mvcb/"
	xmlns="http://purl.org/rss/1.0/"
	version="1.1">

<!-- set the variables used throughout the document -->
<xsl:variable name="lang-ext" ><xsl:value-of select="news/@lang" /></xsl:variable>

<xsl:output indent="yes" />

<xsl:include href="../url-encode.xsl" />
<xsl:param name="currdate" />

<xsl:template match="news">
 <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:rss091="http://purl.org/rss/1.0/modules/rss091#" xmlns="http://purl.org/rss/1.0/">
  <channel rdf:about="http://fink.sourceforge.net/news/">
   <title>Fink Project News</title>
   <link>http://fink.sourceforge.net/news/</link>
   <description>Fink Project News</description>
   <lastBuildDate><xsl:value-of select="$currdate" /></lastBuildDate>
   <rss091:language rdf:parseType="Literal" xmlns="" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><xsl:value-of select="$lang-ext" /></rss091:language>
  </channel>
 <xsl:apply-templates select="newsitem[position()&lt;=15]" />
</rdf:RDF>
</xsl:template>

<xsl:template match="newsitem">
<item channel="http://fink.sourceforge.net/news/">

<xsl:choose>
  <xsl:when test="boolean(headline)">
    <xsl:variable name="headline-uri"><xsl:value-of select="date" /><xsl:text> </xsl:text><xsl:value-of select="headline" /></xsl:variable>
    <xsl:attribute name="rdf:about">
     <xsl:text>http://fink.sourceforge.net/news/#</xsl:text><xsl:call-template name="url-encode">
      <xsl:with-param name="str" select="$headline-uri" />
     </xsl:call-template>
    </xsl:attribute>
    <title><xsl:value-of select="headline" /></title>
    <link>
     <xsl:text>http://fink.sourceforge.net/news/#</xsl:text><xsl:call-template name="url-encode">
      <xsl:with-param name="str" select="$headline-uri" />
     </xsl:call-template>
    </link>
  </xsl:when>
  <xsl:otherwise>
    <title><xsl:text>News Item: </xsl:text><xsl:value-of select="date" /></title>
    <xsl:variable name="headline-uri"><xsl:value-of select="date" /></xsl:variable>
    <link>
     <xsl:text>http://fink.sourceforge.net/news/#</xsl:text><xsl:call-template name="url-encode">
      <xsl:with-param name="str" select="$headline-uri" />
     </xsl:call-template>
    </link>
  </xsl:otherwise>
</xsl:choose>

<dc:date><xsl:value-of select="date" /></dc:date>
<description><xsl:apply-templates select="body" /></description>

</item>

</xsl:template>

</xsl:stylesheet>
