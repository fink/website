<?xml version="1.0" encoding="iso-8859-1"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                version="1.0">

<xsl:output method="xml" encoding="iso-8859-1" />

<!-- ***** whole document ***** -->

<xsl:template match="document">
<document>

<xsl:apply-templates select="cvsid" />

<h1><xsl:value-of select="title"/></h1>

<xsl:apply-templates select="preface" />

<xsl:apply-templates select="chapter" />

</document>
</xsl:template>

<!-- ***** chapter ***** -->

<xsl:template match="chapter">

<h1><xsl:value-of select="title"/></h1>

<xsl:apply-templates/>

</xsl:template>

<!-- ***** article ***** -->

<xsl:template match="article">
<document>

<xsl:apply-templates select="cvsid" />

<h1><xsl:value-of select="title"/></h1>

<xsl:apply-templates select="preface" />

<xsl:apply-templates select="section" />

</document>
</xsl:template>


<!-- ***** other structure elements ***** -->

<xsl:template match="preface">
<xsl:apply-templates/>
</xsl:template>

<xsl:template match="section">
<h2><xsl:value-of select="title"/></h2>
<xsl:apply-templates/>
</xsl:template>

<xsl:template match="faqentry">
<xsl:apply-templates/>
</xsl:template>

<xsl:template match="question">
<p><xsl:text>Q: </xsl:text>
<xsl:for-each select="p">
<xsl:if test='position() = 1'><xsl:call-template name="plain"/></xsl:if>
</xsl:for-each>
</p>
<xsl:for-each select="p">
<xsl:if test='position() > 1'><xsl:apply-templates select="."/></xsl:if>
</xsl:for-each>
</xsl:template>

<xsl:template match="answer">
<p><xsl:text>A: </xsl:text>
<xsl:for-each select="p">
<xsl:if test='position() = 1'><xsl:call-template name="plain"/></xsl:if>
</xsl:for-each>
</p>
<xsl:for-each select="p | codeblock | ul">
<xsl:if test='position() > 1'><xsl:apply-templates select="."/></xsl:if>
</xsl:for-each>
</xsl:template>

<!-- ***** block-level elements ***** -->

<xsl:template match="p">
<p><xsl:apply-templates/></p>
</xsl:template>

<xsl:template match="codeblock">
<pre><xsl:apply-templates/></pre>
</xsl:template>

<xsl:template match="ul">
<ul><xsl:apply-templates/></ul>
</xsl:template>

<xsl:template match="li">
<li><xsl:apply-templates/></li>
</xsl:template>

<!-- dl, dt, dd, itemtable, pairtable, item, itemt, itemd -->

<xsl:template match="cvsid">
<p><xsl:text>Generated from </xsl:text><xsl:apply-templates/></p>
</xsl:template>


<!-- ***** character-level elements ***** -->

<xsl:template match="em">
<u><xsl:apply-templates/></u>
</xsl:template>

<!-- i -->

<xsl:template match="code|filename|literal">
<xsl:apply-templates/>
</xsl:template>

<xsl:template match="link">
<xsl:apply-templates/>
<xsl:text> [</xsl:text><xsl:value-of select="@url"/><xsl:text>]</xsl:text>
</xsl:template>

<!-- xref -->


<!-- *** special stuff *** -->

<xsl:template match="title|shorttitle">
</xsl:template>

<xsl:template name="plain">
<xsl:apply-templates/>
</xsl:template>



</xsl:stylesheet>
