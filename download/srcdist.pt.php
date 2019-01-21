<?php
$title = "Download: Distribuição de código fonte";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2019/01/19 10:11:12 $';

include "header.inc";
include "../fink_version.inc";
?>

<h1>Download: Distribuição de código fonte</h1>

<p><strong>OS 10.6:</strong></p>

<p>O tarball com o código fonte contém o gerenciador de pacotes <em>fink</em>.
Depois de o haver instalado, você poderá obter as descrições e ajustes de
pacotes, os quais serão usados para baixar o código fonte dos sites de
distribuição originais ou dos espelhos do projeto Fink e compilá-lo em sua
máquina local.</p>

<p>O <em>fink-0.29.10</em> foi lançado oficialmente em 27 de setembro de
2009.</p>

<ul>
  <li><?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.29.10.tar.gz", "fink-0.29.10.tar.gz", "/downloads/FinkSOURCE") ?> - 1172K<br>
</ul>

<p>Você também precisará instalar o Xcode Tools (conforme
<a href="./index.en.php" >o Guia rápido</a>).</p>

<p>Descompacte o arquivo tar.gz caso isto não tenha sido feito automaticamente,
por exemplo via</p>

<pre>tar -xvzf fink-0.29.10.tar.gz</pre>

<p>ou</p>

<pre>tar -xvf fink-0.29.10.tar</pre>

<p>caso ele ainda não tenha sido descompactado parcialmente, em uma janela de
terminal. Então, em uma janela de terminal, posicione-se no diretório
fink-0.29.10 que foi criado e digite</p>

<pre>./bootstrap</pre>

<p>para iniciar a operação de instalação preliminar do Fink.</p>

<p>Após a instalação terminar, execute o comando</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>para configurar seu ambiente para o Fink (considerando que você tenha
instalado o Fink em /sw). Se você abrir uma nova janela de terminal, a sessão
usará essa configuração de ambiente. Uma vez que você haja instalado o fink e
os outros pacotes bases, o comando:</p>

<pre>fink selfupdate</pre>

<p>baixará os arquivos de descrições e ajustes de pacotes desde que você
<strong>não</strong> tenha escolhido o método "point release". O rsync é
geralmente preferível ao git para a maior parte das pessoas.</p>

<p>Instruções de instalação e formas de uso estão dentro do tarball da
distribuição. Por favor, leia-os - o Fink não é algo que você possa clicar uma
vez e tudo está feito. Os documentos README, INSTALL e USAGE são fornecidos em
formato texto (para serem lidos a partir da linha de comando) e HTML (para
serem lidos e impressos em um navegador). Eles também estão disponíveis na <a
href="../doc/index.php">seção de documentação</a>.</p>

<p>Para receber notificações dos lançamentos de novas versões, assine a <a
href="../lists/fink-announce.php">lista de discussão fink-announce</a>.</p>

<p><strong>OS 10.5:</strong></p>

<p>A distribuição de código fonte contém o gerenciador de pacotes <em>fink</em>
mais descrições e ajustes de pacotes. Ela baixará os códigos fontes dos sites
de distribuição originais e os compilará localmente em sua máquina.</p>

<p>O Fink <?php print $fink_version; ?> foi oficialmente lançado em
<?php print $release_date; ?>.

<ul>
  <li><?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-" . $fink_version . "-full.tar.gz", "fink-" . $fink_version . "-full.tar.gz", "/downloads/FinkFullSOURCE") ?> - 3524k<br></li>
</ul>

<p>Você também precisará instalar o Xcode Tools (conforme <a
href="./index.en.php" >o Guia rápido</a>).</p>

<p>Descompacte o arquivo tar.gz caso isto não tenha sido feito automaticamente,
por exemplo via</p>

<pre>tar -xvzf fink-<?php print $fink_version; ?>-full.tar.gz</pre>

<p>ou</p>

<pre>tar -xvf fink-<?php print $fink_version; ?>-full.tar</pre>

<p>caso ele ainda não tenha sido descompactado parcialmente, em uma janela de
terminal. Então, em uma janela de terminal, posicione-se no diretório
<em>fink-<?php print $fink_version; ?></em> que foi criado e digite</p>

<pre>./bootstrap</pre>

<p>para iniciar a operação de instalação preliminar do Fink.</p>

<p>Após a instalação terminar, execute o comando</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>para configurar seu ambiente para o Fink (considerando que você tenha
instalado o Fink em /sw). Se você abrir uma nova janela de terminal, a sessão
usará essa configuração de ambiente. Uma vez que você haja instalado o
<em>fink</em> e os outros pacotes bases, a sequência de comandos:</p>

<pre>fink selfupdate</pre>

<p>usando qualquer das opções <em>point</em>, <em>rsync</em> ou <em>git</em>,
seguido por</p>

<pre>fink index -f</pre>

<p>seguido por</p>

<pre>fink selfupdate-rsync</pre>

<p>ou</p>

<pre>fink selfupdate-git</pre>

<p>baixará os arquivos de descrições e ajustes de pacotes desde que você
<strong>não</strong> tenha escolhido o método "point release". O rsync é
geralmente preferível ao git para a maior parte das pessoas.</p>

<p><strong>Outras versões do OS X com suporte oficial</strong></p>

<p>O tarball com o código fonte contém o gerenciador de pacotes <em>fink</em>.
Depois de o haver instalado, você poderá obter as descrições e ajustes de
pacotes, os quais serão usados para baixar o código fonte dos sites de
distribuição originais ou dos espelhos do projeto Fink e compilá-lo em sua
máquina local.</p>

<p>O <em>fink-0.29.10</em> foi lançado oficialmente em 28 de setembro de
2009.</p>

<ul>
  <li><?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.29.10.tar.gz", "fink-0.29.10.tar.gz", "/downloads/FinkSOURCE") ?> - 1172K<br></li>
</ul>

<p>Você também precisará instalar o Xcode Tools (conforme
<a href="./index.en.php" >o Guia rápido</a>).</p>

<p>Descompacte o arquivo tar.gz caso isto não tenha sido feito automaticamente,
por exemplo via</p>

<pre>tar -xvzf fink-0.29.10.tar.gz</pre>

<p>ou</p>

<pre>tar -xvf fink-0.29.10.tar</pre>

<p>caso ele ainda não tenha sido descompactado parcialmente, em uma janela de
terminal. Então, em uma janela de terminal, posicione-se no diretório
fink-0.29.10 que foi criado e digite</p>

<pre>./bootstrap</pre>

<p>para iniciar a operação de instalação preliminar do Fink.</p>

<p>Após a instalação terminar, execute o comando</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>para configurar seu ambiente para o Fink (considerando que você tenha
instalado o Fink em /sw). Se você abrir uma nova janela de terminal, a sessão
usará essa configuração de ambiente. Uma vez que você haja instalado o fink e
os outros pacotes bases, o comando:</p>

<pre>fink selfupdate</pre>

<p>baixará os arquivos de descrições e ajustes de pacotes desde que você
<strong>não</strong> tenha escolhido o método "point release". O rsync é
geralmente preferível ao git para a maior parte das pessoas.</p>

<p>Instruções de instalação e formas de uso estão dentro do tarball da
distribuição. Por favor, leia-os - o Fink não é algo que você possa clicar uma
vez e tudo está feito. Os documentos README, INSTALL e USAGE são fornecidos em
formato texto (para serem lidos a partir da linha de comando) e HTML (para
serem lidos e impressos em um navegador). Eles também estão disponíveis na <a
href="../doc/index.php">seção de documentação</a>.</p>

<p>Para receber informações dos lançamentos de novas versões, assine a <a
href="../lists/fink-announce.php">lista de discussão fink-announce</a>.</p>

<?php
include "footer.inc";
?>
