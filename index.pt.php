<?php
$title      = "Página inicial";
$cvs_author = '$Author: nieder $';
$cvs_date   = '$Date: 2025/03/03 04:43:12 $';
$is_home    = 1;

$metatags = '<meta name="description" content="Fink, uma distribuição de software Unix para Mac OS X e Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribuição, Fink">
';

require dirname(__FILE__) . "/header.inc";
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

<h1><a href="<?php print $rdf_file; ?>" title="Assine as minhas notícias: Notícias do Projeto Fink" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Notícias</h1>
<?php
// Include news items
require dirname(__FILE__) . "/news/news.pt.inc";
?>
<div align="right"><a href="<?php print $root; ?>news/index.php?phpLang=pt">Notícias Antigas...</a></div>


</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable"
title="Atualizações de pacotes no Fink (Stable)" rel="alternate"
type="application/rss+xml"><img src="img/feed-icon16x16.png" alt=""
style="border:0"></a> &nbsp;Atualizações recentes de pacotes</h1>

<?php include "package-updates.inc" ?>

<a href="package-updates.php">mais...</a>
</tr><tr valign="top"><td width="50%">
<h1>Status</h1>
<?php 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink currently supports macOS 10.15 (Catalina), macOS 10.14 (Mojave), macOS 10.13 (High Sierra), 
macOS 10.12 (Sierra), OS X 10.11 (El Capitan), OS X 10.10 (Yosemite), OS X 10.9 (Mavericks), 
and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="download/srcdist.php">source
release page</a>.
</p>
<p>Xcode must be installed before Fink.</p>  
<p>
<strong>macOS 11 through macOS 13 Support:</strong> 
Work in progress support is available for macOS 11 through macOS 13.
Users must first install the following version of Xcode for their system version (newest available is generally preferred):</p>
<ul>
<li>macOS 11: Xcode 13 - Xcode 13.2.1</li>
<li>macOS 12: Xcode 13.3 - Xcode Xcode 14.2</li>
<li>macOS 13: Xcode 14.3 - Xcode 15.0</li>
</ul> 
<p>Xcode is available via a free download from the AppStore, 
or must at least install the Command Line Tools (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.8.5 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.15 Support:</strong> 
10.15 users must install Xcode version 10.3 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 10.3 (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.11 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.13 and 10.14 Support:</strong> 
10.13 and 10.14 users must install Xcode version 10.1 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 10.1 (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.11 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.12 Support:</strong> 
10.12 users must install Xcode version 8.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 6.0 for Sierra (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.11 Support:</strong> 
10.11 users must install Xcode version 7.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 7.0 for El Capitan (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.10 Support:</strong> 
10.10 users must install Xcode version 6.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 6.0 for Yosemite (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.9 Support:</strong> 
10.9 users must install Xcode version 5.0.1 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 5.0 for Mavericks (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.4 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.8 Support:</strong> 
10.8 users must install Xcode version 4.4 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 4.4 for Mountain Lion (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences). Note that if you had an 
earlier version of Xcode than 4.3 installed prior to updating from 10.7, you need 
to <b>uninstall</b> the old version first by running 
<i>/Developer/Library/uninstall-devtools</i>. 
You can determine your current version of Xcode by running 
<i>xcodebuild -version</i> .</p>
<p>If you need X11 you should install Xquartz-2.7.2 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.7 Support:</strong> 
10.7 users must install or update Xcode to version 4.1 or later 
(via a free download from the AppStore), (version 4.6.3 is recommended) or must at least
install the Command Line Tools for 
Xcode 4.3 or later (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences (4.3 or later).  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall an outdated one, if needed.</p>
<p>We don't support Xquartz on 10.7, so don't remove Apple's official X11.</p>
<p>
<strong>10.6 Support:</strong>
For best results, 10.6 users are
encouraged to upgrade Xcode to version 3.2.6, or to version 4.2.1 if you
paid for a 4.x Developer preview.  Version 4.0.2 is known to have some
bugs in its linker that prevent certain packages from building.  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall it, if needed.</p>
<p>We don't support Xquartz on 10.6, so don't remove Apple's official X11.</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
<h1>Recursos</h1>

<p>Caso esteja procurando por suporte, verifique a <a
href="help/index.php">página de ajuda</a>. Essa página também lista várias
opções para ajudar o projeto e enviar comentários.</p>
<p>Caso esteja procurando pelos arquivos com código fonte correspondentes aos
binários distribuídos pelo projeto Fink, por favor consulte <a
href="download/sources_for_binaries.php">esta página</a> para instruções.</p>
<p>O projeto Fink é hospedado pelo
<a href="http://sourceforge.net/">SourceForge</a>.
Além de hospedar este site e os downloads, o SourceForge e o GitHub fornecem os seguintes
recursos para o projeto:</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">Página de resumo do projeto no SourceForge</a></li>
<li><a
href="https://github.com/fink/fink/issues">Relatar ou visualizar erros</a></li>
<li><a
href="https://sourceforge.net/p/fink/package-requests/">Solicitar um pacote que não esteja no Fink</a></li>
<li><a
href="https://sourceforge.net/p/fink/feature-requests/">Solicitar uma funcionalidade que não esteja no Fink (o programa)</a></li>
<li><a
href="https://github.com/fink/fink-distributions/pulls">Submeter um novo pacote para o Fink (desenvolvedores avulsos)</a></li>
<li><a
href="https://github.com/fink/fink/pulls">Submeter uma correção para o fink (o programa)</a></li>
<li><a href="lists/index.php">Listas de Discussão</a></li>
<li>Git (<a href="https://github.com/fink/">navegue
online</a>, <a href="doc/gitaccess/index.php">instruções de acesso</a>)</li>
</ul>
<p>Por favor observe que alguns destes recursos (isto é, relatar um erro ou
solicitar um novo pacote para o Fink) necessitam de que você tenha uma conta no
SourceForge. Caso não tenha uma, você pode inscrever-se gratuitamente no <a
href="http://sourceforge.net/">site do SourceForge</a>.</p>
<p>Recursos adicionais hospedados fora do SourceForge:</p>
<ul>
    <li><a href="http://wiki.finkproject.org/">O wiki de desenvolvedores do Fink</a> (em novo local).</li>
    <li>
        <a href="https://github.com/fink/fink">
            New github repository for the source code of the <code>fink</code> package manager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            New github repository for the <code>fink-mirrors</code> package.
        </a>
    </li>
</ul>

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?php
include "footer.inc";
?>
