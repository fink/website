<?
$title = "Acesso via CVS";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/03/30 11:31:56';
$metatags = '';


include_once "header.inc";
?>
<h1>Configurando acesso via CVS para o Fink</h1>
<!--Generated from $Fink: cvs.pt.xml,v 1.1 2009/03/30 11:31:56 monipol Exp $-->
  <p>O Fink é desenvolvido via CVS. Isto significa que você pode manter-se
  atualizado entre os lançamentos e sempre obter os arquivos mais recentes.
  Esta página informa como configurar uma instalação do Fink para fazer
  atualizações via CVS. As informações nesta página aplicam-se ao Fink 0.3.x e
  posteriores.</p>
<h2><a name="">A estrutura do CVS do Fink</a></h2>
  

  <p>O Fink possui vários módulos CVS. O módulo <code>dists</code>
  (<a href="http://fink.cvs.sourceforge.net/fink/">ViewCVS</a>) contém as
  descrições de pacotes e ajustes para o OS X 10.2 e posteriores. Há outros
  módulos usados pelos desenvolvedores do Fink que podem ser vistos por
  qualquer um. Todavia, esses módulos não são de interesse para a maior parte
  dos usuários.</p>
<h2><a name="">Atualizando as descrições de pacotes</a></h2>
  

  <p>No passado, esse era um procedimento tedioso. Entretanto, nas versões
  atuais do Fink, tornou-se um procedimento bastante simples. Basta executar o
  comando:</p>
  <pre>fink selfupdate-cvs</pre>
  <p>O Fink executará automaticamente todos os passos para você. Isto inclui a
  obtenção do conjunto mais recente de descrições de pacotes e atualização de
  alguns pacotes bases essenciais, dentre os quais o gerenciador de pacotes
  Fink.</p>

  <p>Caso esteja atrás de um firewall, consulte a <a href="http://www.finkproject.org/faq/usage-fink.php#proxy">Pergunta frequente
  3.2</a>.</p>

  <p>Após haver atualizado suas descrições de pacotes desta forma, você pode
  querer atualizar seus pacotes para as últimas versões disponíveis. Você pode
  fazê-lo com o seguinte comando:</p>
  <pre>fink update-all</pre>
<h2><a name="">Atualizando o gerenciador de pacotes</a></h2>
  

  <p><b>Observação:</b>Desde 20 de setembro de 2001, não é mais necessário
  atualizar o gerenciador de pacotes em separado; ele é tratado como qualquer
  outro pacote. Ainda é possível atualizá-lo diretamente via CVS apesar de que
  isto geralmente só é de interesse para as pessoas que criam pacotes e não os
  usuários comuns.</p>

  <p>O gerenciador de pacotes deve ser atualizado através de um diretório
  separado e o script <code>inject.pl</code>. Esse script coloca as descrições
  de pacotes e tarballs referentes ao fink e pacotes bases em uma árvore
  especial do Fink e os compila.</p>

  <p>Para o procedimento inicial, você precisa de um diretório temporário
  (denominado <code>tempdir</code> no exemplo) que esteja vazio (ou ao menos
  não contenha um subdiretório denominado 'fink'). O procedimento é como
  segue:</p>

  <pre>cd tempdir
cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink login
cvs -z3 -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink co fink
cd fink
./inject.pl</pre>

  <p>O comando login solicitará uma senha - basta pressionar Return. Você pode
  remover o diretório temporário após esse procedimento mas, caso você o
  mantenha, a atualização será mais fácil na próxima vez, bastando digitar os
  seguintes comandos:</p>
  <pre>cd tempdir/fink
cvs -z3 update -d
./inject.pl</pre>

<? include_once "../../footer.inc"; ?>


