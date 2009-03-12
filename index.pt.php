<?
$title = "Página inicial";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2009/03/12 18:01:48 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, uma distribuição de software Unix para Mac OS X e Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribuição, Fink">
';

include "header.inc";
?>


<p>
O projeto Fink deseja trazer para o <a
href="http://www.opensource.apple.com/">Darwin</a> e o
<a href="http://www.apple.com/macosx/">Mac OS X</a> todo o mundo de software
Unix de <a href="http://www.opensource.org/">código aberto</a>.
Nós modificamos softwares Unix para que eles sejam compilados e executados no
Mac OS X (nós os "portamos") e os disponibilizamos para download sob a forma de
uma distribuição coerente.
O Fink usa ferramentas do <a href="http://www.debian.org/">Debian</a> como dpkg
e apt-get para prover uma solução robusta de gerenciamento de pacotes binários.
Você pode escolher baixar pacotes binários pré-compilados ou compilar os
programas a partir do código fonte.
<a href="about.php">Leia mais...</a>
</p>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1><a href="<? print $rdf_file; ?>" title="Assine meu feed, Notícias do Projeto Fink" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"/></a>
&nbsp;Notícias</h1>
<?
// Include news items
include $fsroot."news/news.inc";
?>
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=en">Notícias antigas...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>Status</h1>
<? 
include "fink_version.inc";
?>

<p>
A versão <? print $fink_version ?> do Fink foi liberada em
<? print convert_date_to_locale($release_date) ?>.  
Esta versão inclui pacotes binários e de código fonte, bem como instaladores
binários para PowerPC e Intel, para os usuários do OS X versão 10.5.
O Fink 0.8.1 (para OS X 10.4), 0.7.2 (para OS X 10.3), 0.6.4 (para OS X 10.2)
e 0.4.1 (para OS X 10.1) também continuam disponíveis.
</p>
<p>
<!-- interim -->
<strong>Suporte a 10.5:</strong> 
Encorajamos os usuários a atualizarem para OS 10.5.2 ou mais recente, através
da Atualização de Software, para obter as correções de erros e melhorias do
X11. Atualizações subsequentes continuam a ser disponibilizadas na
<a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">Página de
Atualização do XQuartz.</a>
</p>

<h1>Recursos</h1>

<p>
Se você está procurando por suporte, dê uma olhada na
<a href="help/index.php">página de ajuda</a>.
Essa página lista também várias opções para ajudar o projeto e dar feedback.
</p>

<p> 
Se você está procurando pelos códigos fontes que correspondem aos binários
distribuídos pelo projeto Fink, por favor consulte as instruções
<a href="download/sources_for_binaries.php">nesta página</a>.
</p>

<p>
O projeto Fink é hospedado pelo
<a href="http://sourceforge.net/">SourceForge</a>.
Além de hospedar este site e os downloads, o SourceForge provê os seguintes
recursos para o projeto:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">Página de sumário do projeto no SourceForge</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Relatar ou visualizar erros</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Solicitar um pacote que não esteja no Fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Solicitar uma característica que não esteja no programa fink</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Submeter um novo pacote Fink (desenvolvedores que não sejam principais)</a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Submeter uma correção para o programa fink</a></li>
<li><a href="lists/index.php">Listas de discussão</a></li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">navegar
online</a>, <a href="doc/cvsaccess/index.php">instruções de acesso</a>)</li>
</ul>
<p>
Observe que para usar alguns desses recursos (por exemplo, para reltar um erro
ou solicitar um novo pacote Fink) você necessitará estar logado com uma conta
no Sourceforge. Se você não possui uma, você pode cadastrar-se gratuitamente no
<a href="http://sourceforge.net/">site do SourceForge</a>.
</p>
<p>Alguns recursos adicionais hospedados fora do SourceForge:</p>
<ul>
<li><a href="http://wiki.finkproject.org/">Wiki do desenvolvedor Fink</a> (em novo local).</li>
</ul>

</td></tr></table>

<?
include "footer.inc";
?>
