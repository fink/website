<?php
$title = "Guia do usuário - Introdução";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Guia do usuário Contents"><link rel="next" href="install.php?phpLang=pt" title="Instalação inicial"><link rel="prev" href="index.php?phpLang=pt" title="Guia do usuário Contents">';


include_once "header.pt.inc";
?>
<h1>Guia do usuário - 1. Introdução</h1>
    
    

    <h2><a name="what">1.1 O que é o Fink?</a></h2>
      

      <p>O Fink é a uma distribuição de software Unix de código aberto para Mac
      OS X e Darwin, trazendo uma gama variada de softwares livres, sejam de
      linha de comando ou gráficos, desenvolvidos para Linux e sistemas
      operacionais similares, diretamente para seu Mac.</p>
    

    <h2><a name="req">1.2 Requisitos</a></h2>
      

      <p>Você precisará de:</p>

      <ul>
        <li>
          <p>Um sistema Mac OS X instalado, versão 10.4 ou mais recente, ou
          versões do Darwin equivalentes. Versões anteriores <b>não</b> irão
          funcionar. Veja abaixo mais informações sobre os sistemas
          suportados.</p>
        </li>

        <li>
          <p>Acesso à Internet. Tanto os pacotes com binários quanto os com
          códigos fontes são baixados através da Internet.</p>
        </li>
      </ul>

      <p>Se você pretende usar a distribuição de códigos fontes (veja abaixo),
      você também precisará de:</p>

      <ul>
        <li>
          <p>Ferramentas de desenvolvimento. No Mac OS X, instale o pacote
          XcodeTools.mpkg do DVD de instalação ou faça o <a href="http://connect.apple.com">download</a> da versão mais
          recente--o que é mais recomendável, já que versões mais recentes
          geralmente corrigem erros (ainda que algumas vezes elas provoquem
          erros).  Note que as ferramentas precisam estar de acordo com a sua
          versão do Mac OS X.</p>

          <p>É uma boa idéia ter o XCode instalado mesmo que você não pretenda
          montar pacotes a partir do código fonte.  Alguns dos programas
          instalados pelo pacote são, na verdade, ferramentas de linha de
          comando com propósito geral. Alguns pacotes podem precisar delas para
          que possam ser executados.</p>
        </li>

        <li>
          <p>Paciência. Compilar vários pacotes grandes leva tempo: horas, ou
          até mesmo dias.</p>
        </li>
      </ul>
    

    <h2><a name="supported-os">1.3 Sistemas suportados</a></h2>
      

      <p><b>Mac OS X 10.5</b> é a plataforma de vanguarda e é considerada
      como sendo <q>completamente suportada e testada</q> ainda que,
      por ser um sistema operacional mais recente, ainda haja algumas questões
      a resolver. A maior parte dos desenvolvedores usa esta versão e aqueles
      que estão usando a 10.4 possuem usuários na 10.5 para testar seu
      trabalho.</p>

      <p><b>Mac OS X 10.4</b> é considerado como sendo <q>completamente
      suportado e testado</q> apesar de ainda haver alguns problemas de
      compilação espúrios em alguns pacotes. Muitos dos desenvolvedores usa
      esta versão e aqueles que não a usam possuem usuários 10.4 para testar
      seu trabalho.</p>
      
    

    <h2><a name="src-vs-bin">1.4 Código fonte vs. binário</a></h2>
      

      <p>Software é escrito ("desenvolvido") em linguagens de programação
      legíveis a seres humanos; este formato é chamado "código fonte". Antes
      que um computador possa rodar um programa, ele precisa ser transformado
      em instruções de código de máquina de baixo nível que não são legíveis
      para (a maioria dos) seres humanos. Este processo é denominado
      "compilação" e o programa resultante é denominado "executável" ou
      "binário".</p>

      <p>Quando você compra software comercial, você não chega a ver o código
      fonte - as empresas o consideram um segredo industrial. Você obtém
      somente o executável que está pronto para ser executado, o que significa
      que você não pode modificar o programa ou mesmo descobrir o que ele de
      fato faz quando é executado.</p>

      <p>Isto não acontece com software de <a href="http://www.opensource.org/">código aberto</a>. Como o próprio
      nome indica, o código fonte é aberto para qualquer um ver e modificar. De
      fato, a maior parte do software de código aberto somente é distribuída
      por seus autores como código fonte e você precisa compilá-lo no seu
      computador para obter um programa que possa ser executado.</p>

      <p>O Fink permite que você escolha entre os dois modelos. A "distribuição
      de código fonte" irá baixar o código fonte original, adaptá-lo para o Mac
      OS X e a política do Fink, e compilá-lo no seu computador. O processo é
      completamente automatizado mas leva algum tempo. Por outro lado, a
      "distribuição de binários" irá baixar pacotes pré-compilados do site do
      Fink e instalá-los, economizando o tempo de compilação. Na verdade, é
      possível misturar os dois modelos à vontade. O restante deste manual irá
      mostrar-lhe como.</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="install.php?phpLang=pt">2. Instalação inicial</a></p>
<?php include_once "../../footer.inc"; ?>


