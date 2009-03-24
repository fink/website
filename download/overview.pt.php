<?
$title = "Download: Visão geral";
$cvs_author = '$Author: monipol $';
$cvs_date = '$Date: 2009/03/24 23:01:59 $';

include "header.inc";
?>

<h1>Download: Visão geral</h1>

<p>Há várias formas diferentes de obter o Fink. Nesta página, tentamos explicar
as várias opções e suas (algumas vezes confusas) diferenças. Em primeiro lugar,
há dois itens importantes a considerar:</p>

<p><b>Pacotes de códigos fontes vs. binários.</b> Um pacote pode vir em dois
formatos: código fonte e binário. Um pacote de binários é um pacote que contém
programas pré-compilados e prontos a serem executados. Você pode usá-lo de
imediato; ele só precisa ser baixado e extraído (instalado). Um pacote de
códigos fontes é composto pelo código fonte original, ajustes específicos
feitos pelo Fink e instruções de compilação. Pacotes de códigos fontes levam
algum tempo para instalar porque o código fonte é compilado em seu computador a
fim de produzir os programas executáveis.</p>

<p><b>Todas as instalações do Fink são criadas da mesma forma.</b> Não importa
como você tenha instalado o Fink, você sempre tem a opção de compilar um pacote
específico a partir do código fonte. Da mesma forma, você sempre tem a opção de
baixar e instalar pacotes de binários <u>desde que o Fink tenha sido instalado
em <tt>/sw</tt></u>. Tudo o que você tem a fazer é usar as ferramentas e
procedimentos de atualização apropriados.</p>

<p>Então quais são as opções? Cá estão, do mais prático à vanguarda:</p>

<p>A <a href="bindist.php">distribuição de binários</a> usa pacotes de
binários. Ela vem com um pacote de instalação gráfico para a instalação inicial
e um navegador de pacotes com seleção de aplicativos (dselect). Ela trabalha
com a última versão de códigos fontes; geralmente leva-se algum dias para
sincronizar quando uma nova versão de código fonte é lançada. Ocasionalmente,
há atualizações entre lançamentos. Atualizar para novas versões é automático -
basta solicitar ao dselect ou apt-get que baixem as últimas listagens de
pacotes. O ponto negativo da distribuição de binários é que nem todos os
pacotes estão disponíveis sob a forma de binários. Alguns não seguem nossos
padrões de qualidade ou têm problemas técnicos, alguns não podem ser
distribuídos devido a suas licenças restritivas e alguns são sujeitos a
restrições de exportação de criptografia.</p>

<p>A <a href="srcdist.php">distribuição de códigos fontes</a> compila tudo a
partir do código fonte (a menos que você escolha de outra forma) e é orientada
a scripts de linha de comando. Esta distribuição pode atualizar-se para a
última versão através do comando 'fink selfupdate'. O ponto positivo é que você
conseguirá obter todos os pacotes que tenham sido marcados como 'stable'
(estáveis). Os pontos negativos já foram mencionados - compilar a partir do
código fonte leva tempo e você precisa digitar comandos para instalar
pacotes.</p>

<p>O desenvolvimento da distribuição do Fink em si acontece em um repositório
CVS. Você pode usá-lo para estar na vanguarda até que seja lançada uma próxima
versão. O uso é equivalente à distribuição de códigos fontes com a diferença de
que você terá que executar o comando 'fink selfupdate-cvs' uma única vez para
informar o Fink de que as descrições de pacotes devem ser obtidas via CVS.
Veja as <a href="../doc/cvsaccess/index.php">instruções para CVS</a> para mais
detalhes.</p>

<?
include "footer.inc";
?>
