<?
$title = "Guia rápido para download";
$cvs_author = '$Author: monipol $';
$cvs_date = '$Date: 2009/11/10 01:08:21 $';

include_once "header.inc";
include_once "../fink_version.inc";
?>

<h1>Downloads dos Fink</h1>

<p>Há várias formas de instalar ou atualizar o Fink. Para usuários novos,
recomendamos as instruções abaixo para rapidamente instalar o Fink. Em caso
contrário, consulte a <a href="overview.php?phpLang=pt">visão geral</a> e a <a
href="upgrade.php?phpLang=pt">matriz de atualização</a>.</p>

<h2>Guia rápido</h2>

<p>Você é novo no Fink? Estas instruções irão ajudá-lo a instalar rapidamente a
versão de binários.</p>

<ol>
  <li><p>Usuários 10.6: no momento não há um instalador binário. Siga as
  instruções para <a href="srcdist.php">instalação a partir do código
  fonte</a>.<br/>
  Usuários 10.5: Baixe a imagem de disco contendo o instalador:<br>
  <? analytics_download_link("http://prdownloads.sourceforge.net/fink/Fink-" .
  $fink_version . "-PowerPC-Installer.dmg?download",
  "Instalador binário do Fink " . $fink_version .  " (PowerPC)", "/downloads/FinkPPC") ?>
  - <?= $dmg_size ?><br>
  <? analytics_download_link("http://prdownloads.sourceforge.net/fink/Fink-" .
  $fink_version . "-Intel-Installer.dmg?download",
  "Instalador binário do Fink " . $fink_version . " (Intel)",  "/downloads/FinkINTEL") ?>
  - <?= $intel_dmg_size ?><br>
  (usuários 10.4 - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.8.1-PowerPC-Installer.dmg?download">Fink 0.8.1 (PowerPC)</a> ou <a href="http://prdownloads.sourceforge.net/fink/Fink-0.8.1-Intel-Installer.dmg?download">Fink 0.8.1 (Intel)</a>)<br>
  (usuários 10.3 - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.7.2-Installer.dmg?download">Fink 0.7.2</a>)<br>
  (usuários 10.2 - use  <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.4-Installer.dmg?download">Fink 0.6.4</a>)<br>
  (usuários 10.1 - use <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink 0.4.1</a>)</p></li>

  <li><p>Dê um duplo clique em &quot;Fink-<? print $fink_version;
  ?>-XYZ-Installer.dmg&quot; (onde XYZ é ou PowerPC ou Intel) para montar a
  imagem de disco e em seguida dê um duplo clique no pacote &quot;Fink <? print
  $fink_version; ?> XYZ Installer.pkg&quot;. Siga as instruções que aparecerão
  no monitor.</p></li>

  <li><p>Ao fim da instalação, o utilitário pathsetup será iniciado. Ser-lhe-á
  solicitada permissão antes de que seus arquivos de configuração do shell
  sejam editados. Quando o utilitário houver terminado, você já poderá começar
  a usar o Fink!</p></li>

  <li></p>Caso algo dê errado durante este processo, você pode tentar novamente
  através do aplicativo pathsetup que aparece no disco do instalador ou
  executando o comando abaixo em uma janela do Terminal.app</p>
  <pre>/sw/bin/pathsetup.sh</pre>
  <p>(Este passo precisa ser repetido por quaisquer outros usuários em seu
  sistema: cada usuário precisa executar o pathsetup em sua conta.)</p>
  <p>Caso o pathsetup gere mensagens de erro, consulte a documentação, em
  particular a <a href="../doc/users-guide/install.php#setup">seção 2.3
  "Configurando seu ambiente"</a> do Guia do usuário.</p></li>

  <li><p>Abra uma nova janela do Terminal.app e execute &quot;<code>fink
  scanpackages; fink index</code>&quot; ou use o aplicativo gráfico Fink
  Commander (o qual precisa ser colocado em um diretório real no seu sistema,
  não devendo ser executado a partir da imagem de disco) e execute os seguintes
  comandos do seu menu: <em>Source-&gt;scanpackages</em> seguido por
  <em>Source-&gt;Utilities-&gt;index</em>.</p></li>

  <li><p>Uma vez que esses dois comandos tenham terminado, sugerimos que você
  atualize o pacote <code>fink</code> para o caso de ter havido mudanças
  significativas desde o último lançamento. Depois disso você pode instalar
  outros pacotes. Há várias formas de fazê-lo:
  <ul>
    <li><p>Use o Fink Commander para escolher e instalar pacotes. O Fink
    Commander provê uma interface gráfica para o Fink que é fácil de usar. Esse
    é o método recomendado para usuários novos ou usuários que não se sentem
    confortáveis com a linha de comando. O Fink Commander possui os menus
    Binary (binário) e Source (fonte). Você deve instalar a partir de binários
    caso não tenha o Xcode/Developer Tools instalado ou não queira compilar
    pacotes.
    <ul>
      <li><p>A sequência no Fink Commander para atualizar o pacote
      <code>fink</code> a partir dos binários é como segue:</p>
      <ol>
        <li>Binary-&gt;Update descriptions</li>
        <li>Select the <code>fink</code> package.</li>
        <li>Binary-&gt;Install</li>
      </ol></li>

      <li><p>A sequência recomendada no Fink Commander para atualizar o pacote
      <code>fink</code> a partir do código fonte é como segue:</p>
      <ol>
        <li>Source-&gt;Selfupdate</li> 
        <li>Tools-&gt;Interact with Fink...
        <li>Assegure-se de que &quot;Accept default response&quot; esteja
        selecionado e clique &quot;Submit&quot;.</li>
        <li>O <code>fink</code> e outros pacotes bases serão compilados e executados automaticamente</li>
      </ol></li></ul>
      <p>Agora que você atualizou o <code>fink</code>, você pode instalar
      outros pacotes.</p>
      <ul>
        <li>Para instalar a partir de binários, escolha o pacote e use
        Binary-&gt;Install.</li>

        <li>Para instalar a partir de código fonte, escolha o pacote e use
        Source-&gt;Install</li>
      </ul></li>

      <li><p>Use o apt-get. O apt-get baixará e instalará pacotes de binários
      para você, economizando tempo de compilação. Você deve usar ou este
      método ou o método para binários no Fink Commander (conforme acima) caso
      não tenha o Xcode/Developer Tools instalado.</p>
      <p>Para atualizar o <code>fink</code>, abra uma janela do Terminal.app e
      digite <code>sudo apt-get update ; sudo apt-get install fink</code></p>
      <p>Uma vez que você tenha atualizado o <code>fink</code>, você pode
      instalar outros pacotes usando a mesma sintaxe, por exemplo <code>sudo
      apt-get install gimp2</code> para instalar o Gimp 2. Observe,
      entretanto, que nem todos os pacotes do Fink estão disponíveis na forma
      de binários.</p></li>

      <li><p>Instale a partir do código fonte (requer que o Xcode Tools
      [Developer Tools no 10.2] esteja instalado). Para atualizar o
      <code>fink</code> execute o comando <code>fink selfupdate</code>. Quando
      lhe for solicitado, escolha a opção (1), &quot;rsync&quot;. Isto fará com
      que o pacote <code>fink</code> seja automaticamente atualizado.</p>
      <p>Uma vez que o <code>fink</code> tenha sido atualizado, você pode usar
      o comando &quot;<code>fink install</code>&quot; para baixar e compilar a
      partir do código fonte. Por exemplo, para instalar o Gimp 2, execute o
      comando <code>fink install gimp2</code>.</p></li>
  </ul></li> 
</ol>

<h2>Itens adicionais a instalar</h2>

<h3>Xcode Tools/Developer Tools</h3>

<p>Você pode chegar a ver que usar somente pacotes de binários limita a
utilidade do Fink. Há menos pacotes disponíveis em formato binário do que a
partir do código fonte e as versões binárias são geralmente mais antigas. Para
compilar a partir do código fonte, você precisará instalar o Xcode Tools
(conhecido como Developer Tools no Mac OS 10.2 e anteriores).</p>

<p>Apesar de uma versão do Xcode Tools/Developer Tools geralmente vir na sua
mídia de instalação do Mac OS, você provavelmente irá querer uma versão mais
recente. Visite a página do <a href="http://connect.apple.com">the Apple
Developer Connection</a> para baixar uma versão mais recente (e quaisquer
atualizações) após registrar-se gratuitamente.</p>

<table>
  <caption>Versões do Xcode Tools/Developer Tools recomendadas por versão do
  Mac OS</caption>
  <tbody>
    <tr>
      <td>10.5</td>
      <td>Xcode 3.0 ou 3.1</td>
    </tr>
    <tr>
      <td>10.4 (Intel)</td>
      <td>Xcode 2.5</td>
    </tr>
    <tr>
      <td>10.4 (PowerPC)</td>
      <td>Xcode 2.5, e o Xcode Legacy Tools (para pacotes que necessitem do
      <code>gcc3.1</code> ou <code>gcc2.95</code> para compilar)</td>
    </tr>
    <tr>
      <td>10.3</td>
      <td>Xcode 1.5 e o atualizador do <code>gcc3.3</code> de novembro de
      2004</td>
    </tr>
    <tr>
      <td>10.2</td>
      <td>Developer Tools de dezembro de 2002 e atualizador do <code>gcc3.3 de
      agosto de 2003</code></td>
    </tr>
  </tbody>
</table>

<h3>X11</h3>

<p>Quase todos os aplicativos do Fink que tenham interfaces gráficas precisam
de algum variante do X11 (já que a maior parte foi originalmente desenvolvida
em plataformas em que o X11 era a única opção gráfica).</p>

<p>A Apple fornece sua própria distribuição de X11 para OS 10.3, 10.4 e 10.5.
Esta é a opção mais fácil para começar. Escolheu-se dividi-la em duas
partes:</p>

<ul>
  <li>O pacote <em>X11User</em> contém tudo de que você precisa para apenas
  executar o X11 da Apple. Ele está disponível na sua mídia de instalação do
  Mac OS 10.3, 10.4 e 10.5 como uma instalação opcional.</li>

  <li>O pacote <em>X11SDK</em> contém os arquivos de cabeçalho para
  desenvolvimento. Você vai precisar dele caso queira compilar, a partir do
  código fonte, qualquer pacote que use o X11. Este pacote está disponível como
  parte do Xcode Tools e é instalado por padrão no Xcode 2.x e 3.x</li>

  <li>A <em>Atualização do X11 de 2006</em> (2006 X11 Update) para o 10.4
  (disponível via Atualização de Software ou download manual) é suportada.</li>

  <li>Todas as atualizações oficiais do X11 no 10.5 são suportadas, bem como a
  <em>community X11 update</em> do macosxforge.org.</li>
</ul>

<p>Uma vez que você tenha instalado o X11, o Fink deverá reconhecê-lo
automaticamente. Caso esteja tendo problemas, verifique o <a
href="http://www.finkproject.org/faq/usage-packages.php?phpLang=en#apple-x11-wants-xfree86">item
das Perguntas frequentes</a> sobre problemas de instalação do X11.</p>

<h2>Informações adicionais</h2>

<p>Para mais informações, por favor consulte as
<a href="../faq/index.php">Perguntas frequentes</a> e a
<a href="../doc/index.php">seção de documentação</a>.
Caso suas perguntas não sejam respondidas por esses documentos, verifique a
<a href="../help/index.php">página de ajuda</a>.</p>

<p>Para ser notificado de novas versões, assine a
<a href="../lists/fink-announce.php">lista de discussão fink-announce</a>.</p>

<p>O código fonte dos pacotes presentes na imagem de disco do instalador podem ser baixados deste site clicando
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">aqui</a>.</p>

<?
include "footer.inc";
?>
