<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:admin="http://webns.net/mvcb/"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	version="1.1">

<!-- set the variables used throughout the document -->
<xsl:variable name="lang-ext" ><xsl:value-of select="news/@lang" /></xsl:variable>

<xsl:output indent="yes" />

<xsl:include href="../url-encode.xsl" />
<xsl:param name="currdate" />

<xsl:template match="news">
 <rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:admin="http://webns.net/mvcb/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:content="http://purl.org/rss/1.0/modules/content/">

  <channel>
   <title>Fink Project News</title>
   <link>http://fink.sourceforge.net/news/</link>
   <description>Fink Project News</description>
   <dc:language><xsl:value-of select="$lang-ext" /></dc:language>
   <!-- <dc:creator>blog@racoonfink.com</dc:creator> -->
   <!-- <dc:rights>Copyright 2005</dc:rights> -->
   <dc:date><xsl:value-of select="$currdate" /></dc:date>
   <admin:errorReportsTo rdf:resource="mailto:fink-core@lists.sourceforge.net"/>
   <xsl:apply-templates select="newsitem[position()&lt;=15]" />
  </channel>
 </rss>
</xsl:template>

<xsl:template match="newsitem">
<xsl:variable name="headline-uri"><xsl:value-of select="date" /><xsl:text> </xsl:text><xsl:value-of select="headline" /></xsl:variable>
<item>

<xsl:choose>
  <xsl:when test="boolean(headline)">
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

<xsl:variable name="articledate" select="date" />

<guid><xsl:text>http://fink.sourceforge.net/news/#</xsl:text><xsl:call-template name="url-encode"><xsl:with-param name="str" select="$headline-uri" /></xsl:call-template></guid>
<!-- <dc:date><xsl:value-of select="date" /></dc:date> -->
<description>
	<xsl:text disable-output-escaping="yes">
		&lt;![CDATA[
	</xsl:text>
	<xsl:apply-templates select="body" />
	<xsl:text disable-output-escaping="yes">
		]]&gt;
	</xsl:text>
</description>
<content:encoded>
	<xsl:text disable-output-escaping="yes">
		&lt;![CDATA[
	</xsl:text>
	<xsl:apply-templates select="body" />
	<xsl:text disable-output-escaping="yes">
		]]&gt;
	</xsl:text>
</content:encoded>

</item>

</xsl:template>

<xsl:template match="varlink">
  <a>
    <xsl:attribute name="href">
      <xsl:text>http://fink.sourceforge.net/</xsl:text>
      <xsl:value-of select="@url" />
    </xsl:attribute>
    <xsl:apply-templates/>
  </a>
</xsl:template>

<xsl:template match="link">
<a href="{@url}"><xsl:apply-templates/></a>
</xsl:template>

<xsl:template match="p">
 <p><xsl:apply-templates /></p>
</xsl:template>

</xsl:stylesheet>
