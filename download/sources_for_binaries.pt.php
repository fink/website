<?
$title = "Obtendo os códigos fontes dos pacotes de binários";
$cvs_author = '$Author: monipol $';
$cvs_date = '$Date: 2009/03/30 00:18:08 $';

include "header.inc";
?>

<h1>Obtendo os códigos fontes dos pacotes de binários</h1>

<p>O Fink disponibiliza versões pré-compiladas de seus pacotes da árvore stable
para instalação automática (quando a licença do pacote o permite). Muitos
desses pacotes foram lançados sob a licença GPL (GNU Public License) e o
projeto Fink leva a sério suas obrigações em relação à GPL.</p>

<p>O <a href="http://bindist.finkmirrors.net/bindist/dists/">Archive
Browser</a> permite ao usuário obter quaisquer desses pacotes de binários ou
seus códigos fontes correspondentes, arquivos de ajustes e instruções de
compilação. Normalmente isto é automático: quando o fink baixa um pacote de
binários fornecido pelo projeto Fink, ele o obtém desse repositório; quando o
fink baixa um arquivo de código fonte ele geralmente o obtém desse repositório
(através dos espelhos de fontes mestres). O repositório permite que você
obtenha arquivos manualmente, em particular pacotes de binários, assim como os
arquivos fontes correspondentes.</p>

<p>O repositório possui uma organização hierárquica: cada "distribuição" dentro
do repositório (que é específica a uma versão do OS&nbsp;X em particular) é
dividida nas seções "crypto" e "main", cada qual com subdivisões. Os diretórios
<code>binary-darwin-<em>arquitetura</em></code> contêm os pacotes de binários,
sendo também subdivididos por tópico. Os diretórios <code>finkinfo</code>
contêm arquivos correspondentes aos binários: instruções de compilação,
arquivos de ajustes e os códigos fontes, estes localizados nos diretórios
<code>source</code>.</p>

<p>Desta forma, um usuário que saiba o nome do pacote pode obter não apenas o
código fonte mas também todos os arquivos de ajustes e instruções de compilação
necessários que foram usados para criar a versão binária. A sintaxe usada nas
instruções de compilação está documentada no <a
href="../doc/packaging/index.php">Fink Packaging Manul</a>. (Note que alguns
dos arquivos de instruções de compilação são usados para compilar mais de um
pacote. Pode-se pesquisar todos os arquivos de instruções de compilação em um
dado diretório para encontrar o arquivo correto ou consultar o <a
href="http://pdb.finkproject.org/pdb/index.php">Banco de dados de pacotes</a>
para determinar o "pai" de um dado pacote.)</p>

<p>Uma observação final: o instalador do Fink (que usa o aplicativo de
instalação da Apple para instalar uma configuração básica do fink) é
distribuído através da <a
href="http://sourceforge.net/project/showfiles.php?group_id=17203">página de
lançamento de versões do fink no sourceforge.net</a>. Por conseguinte, os
arquivos fontes dos pacotes de binários incluídos no instalador também são
hospedados no sourceForge.net: o instalador está no release "distribution" e os
arquivos fontes estão nos releases "miscellaneous/bootstrap" e "fink".</p>

<?
include "footer.inc";
?>
