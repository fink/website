<?
$title = "Página inicial";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2011/11/26 17:53:53 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, uma distribuição de software Unix para Mac OS X e Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribuição, Fink">
';

include "header.inc";
?>


<p>O projeto Fink deseja trazer todo o mundo de software Unix de
<a href="http://www.opensource.org/">código aberto</a> para o
<a href="http://www.opensource.apple.com/">Darwin</a> e o
<a href="http://www.apple.com/macosx/">Mac OS&nbsp;X</a>.
Nós modificamos software Unix tal que ele compile e rode no Mac OS&nbsp;X ("nós
o portamos") e o tornamos disponível para download sob a forma de uma
distribuição coesa.
O Fink usa ferramentas do <a href="http://www.debian.org/">Debian</a> como dpkg
e apt-get para prover um gerenciamento robusto de pacotes de binários.
Você pode escolher dentre baixar pacotes de binários pré-compilados ou compilar
tudo a partir do código fonte.
<a href="about.php">Leia mais...</a></p>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1><a href="<? print $rdf_file; ?>" title="Assine as minhas notícias: Notícias do Projeto Fink" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Notícias</h1>
<?
// Include news items
include dirname(__FILE__) . "/news/news.pt.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=pt">Notícias Antigas...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-unstable"
title="Atualizações de pacotes no Fink (unstable)" rel="alternate"
type="application/rss+xml"><img src="img/feed-icon16x16.png" alt=""
style="border:0"></a> &nbsp;Atualizações recentes de pacotes</h1>

<? include "package-updates.inc" ?>

<a href="package-updates.php">mais...</a>

<h1>Status</h1>
<? 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink currently supports OS X 10.7 (Lion), 10.6 (SnowLeopard), and 10.5 
(Leopard), and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="srcdist.php">source
release page</a>.
</p><p>
XCode must be installed before Fink.  For best results, 10.6 users are
encouraged to avoid upgrading XCode beyond version 3.2.6.   On the other
hand, 10.7 users must update XCode to version 4.1 or later (via the free download
from the AppStore).  Note that if you installed an earlier version of XCode
prior to updating, you need to <b>uninstall</b> the old version first, by
running <i>/Develper/Library/uninstall-devtools</i> .  You can determine
your current version of XCode by running <i>xcodebuild -version</i> .
</p>
<p>
<strong>10.5 Support:</strong> 
Users are encouraged to update to OS 10.5.2 or later, via Software Update, in order to get bugfixes and enhancements for X11.  Further updates continue to be made available on the <a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">XQuartz Update Page.</a>
(We are not currently supporting Xquartz on 10.6 or 10.7.)
      </p>

<h1>Recursos</h1>

<p>Caso esteja procurando por suporte, verifique a <a
href="help/index.php">página de ajuda</a>. Essa página também lista várias
opções para ajudar o projeto e enviar comentários.</p>
<p>Caso esteja procurando pelos arquivos com código fonte correspondentes aos
binários distribuídos pelo projeto Fink, por favor consulte <a
href="download/sources_for_binaries.php">esta página</a> para instruções.</p>
<p>O projeto Fink é hospedado pelo
<a href="http://sourceforge.net/">SourceForge</a>.
Além de hospedar este site e os downloads, o SourceForge fornece os seguintes
recursos para o projeto:</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">Página de resumo do projeto no SourceForge</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Relatar ou visualizar erros</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Solicitar um pacote que não esteja no Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Solicitar uma funcionalidade que não esteja no Fink (o programa)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Submeter um novo pacote para o Fink (desenvolvedores avulsos)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Submeter uma correção para o fink (o programa)</a></li>
<li><a href="lists/index.php">Listas de Discussão</a></li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">navegue
online</a>, <a href="doc/cvsaccess/index.php">instruções de acesso</a>)</li>
</ul>
<p>Por favor observe que alguns destes recursos (isto é, relatar um erro ou
solicitar um novo pacote para o Fink) necessitam de que você tenha uma conta no
SourceForge. Caso não tenha uma, você pode inscrever-se gratuitamente no <a
href="http://sourceforge.net/">site do SourceForge</a>.</p>
<p>Recursos adicionais hospedados fora do SourceForge:</p>
<ul>
<li><a href="http://wiki.finkproject.org/">O wiki de desenvolvedores do Fink</a> (em novo local).</li>
</ul>

</td></tr></table>

<?
include "footer.inc";
?>
