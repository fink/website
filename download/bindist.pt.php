<?
$title = "Download: Distribuição de binários";
$cvs_author = '$Author: monipol $';
$cvs_date = '$Date: 2009/03/24 23:01:59 $';

include "header.inc";
include "../fink_version.inc";
?>

<h1>Download: Distribuição de binários</h1>

<p>A versão do Fink com distribuição de binários evita que os programas sejam
compilados localmente em sua máquina. Depois de instalar um sistema base usando
o pacote do instalador, você pode baixar deste site pacotes de binários
pré-compilados através das ferramentas dselect e apt-get. Somente uma parte dos
pacotes estão disponíveis como pacotes binários; os outros podem ser compilados
a partir do código fonte da mesma forma que na distribuição de códigos fontes.
Isto se deve principalmente a motivos legais que afetam os pacotes
(faltantes).</p>

<p><b>Status:</b> Foi lançado um instalador binário para o Fink
<? print $fink_version; ?>.</p>

<ul>
  <li><a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-PowerPC-Installer.dmg?download">Instalador binário do Fink <? print $fink_version; ?> (PowerPC)</a> - <? print $dmg_size; ?>, imagem de disco .dmg compactada</li>

  <li><a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Intel-Installer.dmg?download">Instalador binário do Fink <? print $fink_version; ?> (Intel)</a> - <? print $intel_dmg_size; ?>, imagem de disco .dmg compactada</li>

  <li><a href="http://prdownloads.sourceforge.net/fink/direct_download/">Consulte o Arquivo de Distribuições</a> - aqui você encontrará os pacotes binários e códigos fontes correspondentes.</li>
</ul>

<p>A imagem de disco com o instalador contém o arquivo Fink LeiaMe.rtf com
algumas observações e também uma cópia dos documentos presente na <a
href="../doc/index.php">seção de documentação</a>.</p>

<p>Para receber informações dos lançamentos de novas versões, assine a <a
href="../lists/fink-announce.php">lista de discussão fink-announce</a>.</p>

<?
include "footer.inc";
?>
