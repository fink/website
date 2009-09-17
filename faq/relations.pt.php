<?
$title = "Perguntas frequentes - Relacionamentos";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/08/28 12:02:43';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="mirrors.php?phpLang=pt" title="Espelhos do Fink"><link rel="prev" href="general.php?phpLang=pt" title="Perguntas gerais">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 2. Relacionamentos com outros projetos</h1>
    
    
    <a name="upstream">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.1: Vocês repassam suas correções e ajustes para os mantenedores
        oficiais?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Estamos tentando. Às vezes repassar correções e ajustes é fácil e
        todos ficam felizes assim que seja liberada a nova versão do pacote.
        Infelizmente, isto não é fácil na maioria dos pacotes. Alguns problemas
        comuns:</p><ul>
          <li>O mantenedor do pacote no Fink está muito ocupado e está sem
          tempo para enviar os ajustes, correções e explicações correspondentes
          para os mantenedores oficiais.</li>
          <li>Os mantenedores oficiais rejeitam as correções e ajustes. Há
          várias razões válidas para isto. A maior parte dos mantenedores
          oficiais estão bastante interessados em código limpo, verificações
          limpas e compatibilidade com outras plataformas.</li>
          <li>Os mantenedores oficiais aceitam os ajustes e correções porém o
          tempo para liberar novas versões de seus pacotes levam semanas ou
          meses.</li>
          <li>O pacote foi abandonado pelos autores originais e não haverá
          novas versões que possam incorporar os ajustes e correções.</li>
        </ul></div>
    </a>
    <a name="debian">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.2: Qual o seu relacionamento com o projeto Debian? Vocês estão portando
        o Debian Linux para rodar no Mac OS X?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Não há relacionamento formal entre o Fink e o <a href="http://www.debian.org">Debian</a> O Fink <b>não</b> é um port
        da distribuição Debian GNU/Linux. O que nós fizemos foi portar as
        ferramentas de gerenciamento de pacotes do Debian (dpkg, dselect,
        apt-get), usando-as juntamente com o formato de pacote binário .deb. Os
        pacotes em si são feitos sob medida para Mac OS X/Darwin e nós não
        usamos o formato de pacote de fontes do Debian.</p></div>
    </a>
    <a name="apple">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.3: Qual o seu relacionamento com a Apple</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> A <a href="http://www.apple.com/">Apple</a> tem ciência do Fink
        e nos deu algum suporte como parte dos seus esforços de relacionamento
        com a comunidade de código aberto. No verão e no outono de 2001, eles
        nos forneceram pré-versões novas do Mac OS X na esperança de que os
        pacotes do Fink pudessem ser adaptados em tempo para a liberação da
        versão. Citação: <b>"Esperamos que isto reforce nosso comprometimento
        que várias pessoas suspeitam que não queiramos oferecer. Com o tempo,
        nós melhoraremos nossa estratégia em relação a código aberto."</b>
        Obrigado, Apple!</p></div>
    </a>
    <a name="darwinports">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.4: Qual o seu relacionamento com o Darwinports?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Darwinports e Fink são projetos complementares. Existe certa
        interseção entre os dois projetos e várias pessoais contribuem com
        ambos. Por exemplo, Benjamin Reed está trabalhando nos pacotes KDE dos
        dois projetos. O Darwinports e o Fink estão livres para usar as
        correções e ajustes uns dos outros, e nós já discutimos como colaborar
        em um novo mecanismo de dependências.</p><p>O Darwinports começou do zero com o objetivo de tentar um enfoque
        diferente para o sistema de empacotamento. Leia a declaração no <a href="http://darwinports.opendarwin.org/">site do Darwinports</a>
        para mais detalhes.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="mirrors.php?phpLang=pt">3. Espelhos do Fink</a></p>
<? include_once "../footer.inc"; ?>


