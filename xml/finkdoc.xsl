<?xml version="1.0" encoding="iso-8859-1"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                version="1.0">

<xsl:output method="text"/>

<!-- ***** whole document (renders contents page) ***** -->

<xsl:template match="document">
<xsl:document href="{@filename}.pphp" method="html" indent="no" encoding="iso-8859-1">
<xsl:text>--phpstart--
$title = "</xsl:text>
<xsl:value-of select="shorttitle"/>
<xsl:text>";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/14 18:39:32 $';

$metatags = '</xsl:text>
<link rel="start" href="{@filename}.php" title="{shorttitle} Contents" />
<link rel="next" href="{chapter/@filename}.php" title="{chapter/title}" />
<xsl:text>
';

include "header.inc";
--phpend--

</xsl:text>

<h1><xsl:value-of select="title"/></h1>

<xsl:apply-templates select="p" />

<!-- start TOC -->

<h2><xsl:text>Contents</xsl:text></h2>

<ul>
<xsl:for-each select="chapter">
<li><a><xsl:attribute name="href">
<xsl:value-of select="@filename"/><xsl:text>.php</xsl:text>
</xsl:attribute>
<b><!--<xsl:number format="1 " />--><xsl:value-of select="title" /></b></a></li>

<ul>
<xsl:for-each select="faqentry">
<li><a><xsl:attribute name="href">
<xsl:value-of select="../@filename" /><xsl:text>.php#</xsl:text><xsl:value-of select="@name" />
</xsl:attribute>
<!--<xsl:number count="chapter" format="1." /><xsl:number format="1 " />-->
<xsl:for-each select="question/p">
<xsl:if test='position() = 1'><xsl:call-template name="plain"/></xsl:if>
</xsl:for-each>
</a></li>
</xsl:for-each>
</ul>

</xsl:for-each>
</ul>

<!-- end TOC -->

<xsl:apply-templates select="chapter" />

<xsl:text>


--phpstart--
include "footer.inc";
--phpend--
</xsl:text>
</xsl:document>
</xsl:template>

<!-- ***** chapter (renders to a separate file) ***** -->

<xsl:template match="chapter">
<xsl:document href="{@filename}.pphp" method="html" indent="no" encoding="iso-8859-1">
<xsl:text>--phpstart--
$title = "</xsl:text>
<xsl:value-of select="../shorttitle"/><xsl:text> - </xsl:text><xsl:value-of select="shorttitle"/>
<xsl:text>";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/14 18:39:32 $';

$metatags = '</xsl:text>
<link rel="start" href="{../@filename}.php" title="{../shorttitle} Contents" />
<link rel="contents" href="{../@filename}.php" title="{../shorttitle} Contents" />

<xsl:for-each select="following-sibling::chapter">
<xsl:if test="position()=1">
<link rel="next" href="{@filename}.php" title="{title}" />
</xsl:if>
</xsl:for-each>

<xsl:for-each select="preceding-sibling::chapter">
<xsl:if test="position()=last()">
<link rel="prev" href="{@filename}.php" title="{title}" />
</xsl:if>
</xsl:for-each>
<xsl:if test="position()=1">
<link rel="prev" href="{../@filename}.php" title="{../shorttitle} Contents" />
</xsl:if>

<xsl:text>
';

include "header.inc";
--phpend--

</xsl:text>

<h1><!--<xsl:number format="1 " />--><xsl:value-of select="../shorttitle"/><xsl:text> - </xsl:text><xsl:value-of select="title"/></h1>
<xsl:apply-templates/>

<xsl:text>


--phpstart--
include "footer.inc";
--phpend--
</xsl:text>
</xsl:document>
</xsl:template>

<!-- ***** article (renders all on one page) ***** -->

<xsl:template match="article">
<xsl:document href="{@filename}.pphp" method="html" indent="no" encoding="iso-8859-1">
<xsl:text>--phpstart--
$title = "</xsl:text>
<xsl:value-of select="shorttitle"/>
<xsl:text>";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/06/14 18:39:32 $';

include "header.inc";
--phpend--

</xsl:text>

<h1><xsl:value-of select="title"/></h1>

<xsl:apply-templates select="p" />

<xsl:apply-templates select="section" />

<xsl:text>


--phpstart--
include "footer.inc";
--phpend--
</xsl:text>
</xsl:document>
</xsl:template>


<!-- ***** other structure elements ***** -->

<xsl:template match="section">
<h2><xsl:value-of select="title"/></h2>
<xsl:apply-templates/>
</xsl:template>

<xsl:template match="faqentry">
<a><xsl:attribute name="name"><xsl:value-of select="@name"/></xsl:attribute>
<xsl:apply-templates/>
</a>
</xsl:template>

<xsl:template match="question">
<div class="question">
<p><b><xsl:text>Q</xsl:text><!--<xsl:number count="chapter" format="1." /><xsl:number count="faqentry" format="1:" /></b>--><xsl:text>: </xsl:text>
<xsl:for-each select="p">
<xsl:if test='position() = 1'><xsl:call-template name="plain"/></xsl:if>
</xsl:for-each>
</b></p>
<xsl:for-each select="p">
<xsl:if test='position() > 1'><xsl:apply-templates select="."/></xsl:if>
</xsl:for-each>
</div>
</xsl:template>

<xsl:template match="answer">
<div class="answer">
<p><b><xsl:text>A:</xsl:text></b><xsl:text> </xsl:text>
<xsl:for-each select="p">
<xsl:if test='position() = 1'><xsl:call-template name="plain"/></xsl:if>
</xsl:for-each>
</p>
<xsl:for-each select="p | codeblock | ul">
<xsl:if test='position() > 1'><xsl:apply-templates select="."/></xsl:if>
</xsl:for-each>
</div>
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


<!-- ***** character-level elements ***** -->

<xsl:template match="em">
<b><xsl:apply-templates/></b>
</xsl:template>

<xsl:template match="code|filename|literal">
<tt><nobr><xsl:apply-templates/></nobr></tt>
</xsl:template>

<xsl:template match="link">
<a><xsl:attribute name="href"><xsl:value-of select="@url"/>
</xsl:attribute><xsl:apply-templates/></a>
</xsl:template>


<!-- *** special stuff *** -->

<xsl:template match="title|shorttitle">
</xsl:template>

<xsl:template name="plain">
<xsl:apply-templates/>
</xsl:template>



</xsl:stylesheet>
