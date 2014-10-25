<?php
$title = "Matriz de atualização";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2014/10/25 08:18:50 $';

include "header.inc";
?>

<h1>Matriz de atualização do Fink</h1>

<p>(Para versões do OS X &gt;= 10.2)</p>

<h3>Mesmo OS:</h3>

<p>Todas as versões atuais do Fink podem ser atualizadas in loco para a versão
mais recente na versão do Mac OS X correspondente, i.e., <strong>não</strong>
baixe o novo instalador!</p>

<p>Verifique a versão do Fink que você possui através do comando "<code>fink
--version</code>" em uma janela de terminal.</p>

<p>Você pode compará-la às últimas versões disponíveis para o seu OS no <a
href="http://pdb.finkproject.org/pdb/package.php/fink">banco de dados de pacotes</a>.</p>

<h2>Atualização do binário</h2>

<p>Atualize através do <tt>dselect</tt>: escolha "[U]pdate" e então
"[I]nstalar" ou execute "<tt>sudo apt-get update ; sudo apt-get
dist-upgrade</tt>".</p>

<p>Ou, no <em>FinkCommander</em>, escolha "Update" seguido por "Dist-Upgrade"
(ambos no menu <tt>Binary</tt>).</p>

<h2>Atualização do código fonte</h2>

<p>Execute "<tt>fink selfupdate</tt>".</p>

<p>Ou, no <em>FinkCommander</em>, escolha Source-&gt;selfupdate.</p>

<h3>Nova versão do OS:</h3>

<p>Cada atualização do OS X tem requerido uma estratégia diference e instruções
específicas estarão descritas na <a href="http://fink.sourceforge.net">página
principal</a> para indicar o que é necessário.</p>

<h2>Atualização do binário</h2>

<ol>
  <li>Atualize o Fink conforme o item <em>Atualização de binário</em> acima
  dentro da seção <em>Mesmo OS</em> para a última versão do seu OS atual.</li>

  <li>Se você crê que pode compilar a partir do código fonte em algum momento,
  você deve remover seu Xcode Tools (Developer Tools) antigo através do comando
  "<tt>/Developer/Tools/uninstall-devtools.pl</tt>" em uma janela de
  terminal.</li>

  <li>Atualize o OS.</li>

  <li>Atualize novamente o Fink e o restante dos seus pacotes conforme acima.</li>

  <li>Caso decida compilar algo a partir do código fonte, instale a versão do
  Xcode Tools (Developer Tools) adequada ao seu OS.</li>
</ol>

<h2>Atualização do código fonte</h2>

<p>A estratégia geral (válida para todas as versões suportadas do OS no momento
em que este texto foi escrito) é:</p>

<ol>
  <li>Atualize o Fink para a última versão apropriada e suportada pelo seu OS
  (conforme acima no item <em>Atualização de código fonte</em> na seção
  <em>Mesmo OS</em>) -- você não precisa ativar a árvore unstable.</li>

  <li>Remova seu Xcode Tools (Developer Tools) antigo através do comando
  "<tt>/Developer/Tools/uninstall-devtools.pl</tt>" em um terminal.</li>

  <li>Atualize então seu OS.</li>

  <li>Instale a versão apropriada do Xcode Tools/Developer Tools.</li>

  <li>Execute "<tt>/sw/lib/fink/postinstall.pl</tt>" em um terminal -- isto
  redirecionará o Fink à distribuição correta para sua versão do OS.</li>

  <li>Execute "<tt>fink scanpackages</tt>" no terminal (Source-&gt;scanpackages
  para usuários do Fink Commander).</li>

  <li>Execute "<tt>sudo apt-get update</tt>" no terminal
  (Binary-&gt;update).<br>
  (Os dois comandos acima evitam erros relacionados à distribuição de
  binários.)</li>

  <li>Execute "<tt>fink selfupdate</tt>" no terminal
  (Source-&gt;selfupdate).</li>

  <li>Execute "<tt>fink update-all</tt>" na janela do terminal
  (Source-&gt;update-all).
  <p>Isto é necessário para garantir que todos os seus pacotes de fato executem
  na sua nova versão do OS. Você talvez tenha que repetir este comando para que
  sejam compilados todos os novos pacotes.</p></li>
</ol>

<?php
include "footer.inc";
?>
