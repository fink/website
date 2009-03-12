<?
$title = "Perguntas frequentes - Generalidades";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2009/03/12 17:49:31';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="relations.php?phpLang=pt" title="Relacionamentos com outros projetos"><link rel="prev" href="index.php?phpLang=pt" title="Perguntas frequentes Contents">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 1. Perguntas gerais</h1>
    
    
    <a name="what">
      <div class="question"><p><b><? echo FINK_Q ; ?>1.1: O que é o Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> O Fink deseja trazer mais software Unix para o Mac OS X, o que
        resulta dois objetivos principais:</p><p>O objetivo número um é portar software para o Mac OS X. Isto
        significa que nós pegamos software Unix de código aberto e fazemos os
        ajustes necessários para que ele possa ser compilado e executado no Mac
        OS X. Algumas vezes isto é fácil mas pode também ser bastante difícil
        ou até mesmo impossível para alguns pacotes. Estamos tentando prover
        ferramentas e documentação para tornar este processo mais fácil.</p><p>O objetivo número dois é tornar os resultados disponíveis para os
        usuários convencionais. Para isto, nós montamos uma distribuição usando
        ferramentas de gerenciamento de pacotes portadas do Linux, o
        <code>dpkg</code> e o <code>apt-get</code>, escritas por e para o
        projeto <a href="http://www.debian.org/">Debian GNU/Linux</a>. A
        distribuição de binários usa o formato de pacote <code>.deb</code>.
        Para compilar pacotes a partir do código fonte, temos nossa própria
        ferramenta, chamada <code>fink</code>, que cria arquivos de pacote
        <code>.deb</code>.</p></div>
    </a>
    <a name="naming">
      <div class="question"><p><b><? echo FINK_Q ; ?>1.2: O que significa o nome Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Nada, é apenas um nome. Não é nem mesmo uma sigla.</p><p>Na verdade, Fink é o nome do pintassilgo em alemão (na verdade, uma
        família de pássaros à qual o pintassilgo pertence, os fringilídeos). Eu
        estava procurando por um nome para o projeto e o nome do sistema
        operacional, Darwin, levou-me a pensar sobre Charles Darwin, as Ilhas
        Galápagos e evolução. Lembrei-me de uma passagem da época da escola
        sobre os fringilídeos encontrados por Darwin nas Ilhas Galápagos e seus
        bicos característicos e, bem, foi isso...</p></div>
    </a>
    <a name="bsd-ports">
      <div class="question"><p><b><? echo FINK_Q ; ?>1.3: Qual a diferença entre o Fink e o mecanismo de ports do BSD
        (incluindo OpenPackages e GNU-Darwin)?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Algumas vantagens principais:</p><ul>
          <li>
            <p>É escrito em Perl e não make/shell. Por conseguinte, dispensa as
            características especiais que só são encontradas no make do BSD e
            não é necessário sinalizar os pacotes que necessitam do GNU make
            para compilá-los.</p>
          </li>
          <li>
            <p>O dpkg fornece um gerenciado de pacotes de binários bem
            sofisticado - atualização tranquila, gerenciamento especial de
            arquivos de configuração, pacotes virtuais e outras dependências
            avançadas.</p>
          </li>
          <li>
            <p>O Fink não instala no diretório /usr/local a menos que isto haja
            sido solicitado de forma explícita e não necessita de artimanhas
            para lidar com o /usr/bin/make ou outros comandos providos pelo
            sistema. Isto faz com que ele seja mais seguro para usar e reduz ao
            mínimo possível interferências com o Mac OS X e pacotes de
            terceiros.</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local">
      <div class="question"><p><b><? echo FINK_Q ; ?>1.4: Por que o Fink não instala no /usr/local?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Há várias razões, mas de forma geral é "porque algo vai dar
        errado".</p><p>Primeira razão: softwares de terceiros. O diretório /usr/local é um
        lugar bem padronizado para se colocar software que não seja parte do
        sistema que foi distribuído pelo fabricante. Isto significa que é um
        bom lugar para se instalar programas. Entretanto, isto também significa
        que outras pessoas irão colocar suas coisas nesse diretório. A maior
        parte das rotinas de instalação simplesmente sobrescreve o que estiver
        lá - isto também se aplica ao dpkg. Pode-se, claro, escolher não
        instalar softwares de terceiros no /usr/local. Infelizmente, a maior
        parte dos programas de instalação não avisa de antemão que irão
        instalar nesse diretório.</p><p>Segunda razão: /usr/local/bin está no PATH padrão. Isto significa
        que seu shell irá encontrar os programas instalados sem que sejam
        necessárias medidas adicionais. Mas isto também significa que você
        precisa tomar medidas adicionais caso não queira usar os programas. Em
        casos extremos, isto também pode afetar o sistema em si - muitas partes
        dependem de scripts de shell.</p><p>Terceira razão: os programas de compilação leem o diretório
        /usr/local por padrão: o compilador procura arquivos de cabeçalho em
        /usr/local/include e o linkeditor procura bibliotecas em
        /usr/local/lib. Uma vez mais, às vezes isto é conveniente, porém é
        dificíl desabilitar este comportamento caso necessário. É muito fácil
        desabilitar um comportador caso um arquio <code>stdio.h</code> contendo
        lixo seja colocado em /usr/local/include.</p><p>De qualquer forma, é possível instalar o Fink em /usr/local. O
        script de instalação irá avisá-lo explicitamente mas você pode
        prosseguir sabendo que você está fazendo isso por sua própria conta e
        risco.</p></div>
    </a>
    <a name="why-sw">
      <div class="question"><p><b><? echo FINK_Q ; ?>1.5: Por que vocês escolheram /sw?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Essa escolha é arbitrária e deverá continuar desta forma por motivos
        práticos (atualização) e também pelo fato de que é uma escolha segura
        no tocante ao conflito com outros sistemas de empacotamento.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="relations.php?phpLang=pt">2. Relacionamentos com outros projetos</a></p>
<? include_once "../footer.inc"; ?>


