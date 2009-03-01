<?
$title = "Guia do usuário - Atualização";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2009/03/01 14:09:07';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Guia do usuário Contents"><link rel="next" href="conf.php?phpLang=pt" title="O arquivo de configuração do Fink"><link rel="prev" href="packages.php?phpLang=pt" title="Instalando pacotes">';


include_once "header.pt.inc";
?>
<h1>Guia do usuário - 4. Atualizando o Fink</h1>
    
    

    
      <p>Este capítulo cobre os procedimentos usados para atualizar sua
      instalação do Fink para os pacotes mais recentes.</p>
    

    <h2><a name="bin">4.1 Atualizando através de pacotes binários</a></h2>
      

      <p>Caso você use exclusivamente a distribuição de binários, não há um
      procedimento de atualização separado. Basta solicitar à sua ferramenta
      predileta que obtenha do servidor a listagem de pacotes mais recentes e
      proceda à atualização de todos os pacotes.</p>

      <p>Para o dselect, basta escolher as opções "[U]pdate" e em seguida
      "[I]nstalar". É claro que você pode também escolher a opção "[S]eleciona"
      para conferir quais os pacotes que você selecionou e talvez descobrir
      novos pacotes.</p>

      <p>Para o apt, execute o comando <code>apt-get update</code> para receber
      a listagem de pacotes mais recente e então execute o comando
      <code>apt-get upgrade</code> para atualizar todos os pacotes que tenham
      versões novas disponíveis.</p>

      <p>Para o Fink Commander, escolha Binary-&gt;Update descriptions para
      atualizar a listagem de pacotes e em seguida Binary-&gt;Dist-Upgrade
      packages para proceder à atualização para versões novas.</p>

      <p>Para mais informações, consulte a <a href="http://www.finkproject.org/download/upgrade.php">Matriz de
      atualização</a>.</p>
    

    <h2><a name="src">4.2 Atualizando a distribuição de códigos fontes</a></h2>
      

      <p>Se você usa a distribuição de códigos fontes então o procedimento é
      composto por dois passos. No primeiro passo, você baixa as descrições
      mais recentes dos pacotes em seu computador. No segundo passo, essas
      descrições de pacotes são usadas para compilar novos pacotes; o código
      fonte é baixado quando necessário.</p>

      <p>O primeiro passo pode ser feito através da execução do comando
      <code>fink selfupdate</code>. Este comando verificará no site do Fink se
      há uma nova versão pontual disponível e irá automaticamente baixar e
      instalar as descrições de pacotes associadas. Você também tem a opção de
      obter as descrições de pacotes diretamente do CVS ou através do rsync. O
      CVS é um repositório com versionamento onde as descrições de pacotes são
      armazenadas e gerenciadas. A vantagem do CVS é que ele é atualizado
      continuamente. A desvantagem é que há um único servidor CVS para o Fink e
      ele pode não ser muito confiável quando há tráfego intenso.  Por esta
      razão, recomenda-se que usuários em geral usem o rsync. Existem vários
      espelhos disponíveis para o rsync e a única desvantagem é que as
      descrições de pacotes levam por volta de uma hora para migrar aos
      espelhos rsync depois de terem sido adicionadas ao CVS.</p>

      <p>Caso você encontre problemas na atualização de uma instalação a partir
      de códigos fontes, consulte <a href="http://www.finkproject.org/download/fix-upgrade.php">estas
      instruções especiais</a>).</p>

      <p>Uma vez que você tenha atualizado suas descrições de pacotes (não
      importa como), você pode atualizar todos os pacotes de uma vez só através
      do comando <code>fink update-all</code>.</p>

      <p>Para atualizar a distribuição de códigos fontes através do Fink
      Commander, escolha Source-&gt;Selfupdate para baixar as novas descrições
      de pacotes e em seguida Source-&gt;Update-all  para atualizar os
      pacotes.</p>
    

    <h2><a name="mix">4.3 Misturando binários e códigos fontes</a></h2>
      

      <p>Caso você use pacotes binários pré-compilados para alguns pacotes e
      compile outros a partir do código fonte, você precisará seguir os dois
      conjuntos de instruções acima para atualizar sua instalação do Fink, ou
      seja: primeiro use <code>dselect</code> ou <code>apt-get</code> para
      obter as versões mais recentes dos pacotes que estão disponíveis como
      binários e então use <code>fink selfupdate</code> e <code>fink
      update-all</code> para obter as descrições de pacotes mais recentes e
      atualizá-los.</p>

      <p>Se você usar a opção UseBinaryDist, configurável através da <a href="usage.php?phpLang=pt#options">opção --use-binary-dist (ou -b)</a>
      ou no <a href="conf.php?phpLang=pt">arquivo de configuração do Fink</a>, as
      descrições de pacotes (tanto os binários quanto os de códigos fontes)
      serão atualizadas se você executar o comando <code>fink
      selfupdate</code>. Neste caso você não precisa mais executar
      separadamente o comando <code>apt-get</code>.</p>

      <p>Se você estiver usando o Fink Commander, escolha Binary-&gt;Update
      descriptions para atualizar a listagem de pacotes e em seguida
      Binary-&gt;Dist-Upgrade packages para atualizar os pacotes de binários
      para suas novas versões. Depois disso, escolha Source-&gt;Selfupdate para
      baixar os novos arquivos com informações sobre os pacotes e em seguida
      escolha Source-&gt;Update-all (veja as seções anteriores para mais
      detalhes).</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="conf.php?phpLang=pt">5. O arquivo de configuração do Fink</a></p>
<? include_once "../../footer.inc"; ?>


