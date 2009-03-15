<?
$title = "Executando o X11 - História";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/03/15 00:37:07';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Executando o X11 Contents"><link rel="next" href="inst-xfree86.php?phpLang=pt" title="Obtendo e instalando o X11"><link rel="prev" href="intro.php?phpLang=pt" title="Introdução">';


include_once "header.pt.inc";
?>
<h1>Executando o X11 - 2. História</h1>
    
    

    
      <p>[Perdão pela linguagem épica, não consegui resistir...]</p>
    

    <h2><a name="early">2.1 Os primeiros dias</a></h2>
      

      <p>No princípio, havia o vazio. O Darwin ainda estava em seus primeiros
      passos, O Mac OS X ainda em desenvolvimento e não havia implementação do
      X11 para ambos.</p>

      <p>E eis que chegou John Carmack e portou o XFree86 para o Mac OS X
      Server, que era o único SO da família Darwin disponível naquele momento.
      Mais tarde aquele port foi atualizado por Dave Zarzycki para o XFree86
      4.0 e o Darwin 1.0. As modificações acabaram por chegar ao repositório
      CVS do Darwin e lá dormiram, esperando pelo porvir.</p>
    

    <h2><a name="xonx-forms">2.2 A formação do XonX</a></h2>
      

      <p>Um belo dia, Torrey T. Lyons apareceu e deu a atenção que as
      modificações do Darwin estavam esperando. Finalmente, ele as levou para
      um novo lar, o repositório CVS oficial do XFree86. Esta foi a época do
      Mac OS X Public Beta e Darwin 1.2. O XFree86 4.0.2 funcionou bem no
      Darwin, mas no Mac OS X era necessário que os usuários saíssem do Aqua e
      fossem ao console para executarem-no. Então Torrey reuniu o <a href="http://mrcla.com/XonX/">time XonX</a> ao redor de si e juntos
      partiram em uma viagem para levar o XFree86 ao Mac OS X.</p>

      <p>Por volta desta época, a Tenon começou a desenvolver o Xtools usando o
      XFree86 4.0 como base.</p>
    

    <h2><a name="root-or-not">2.3 Raiz ou não raiz</a></h2>
      

      <p>Não se passou muito tempo até o time XonX ter o XFree86 executando em
      modo de tela cheia paralelamente ao Quartz, divulgando versões de testes
      para usuários aventureiros. As versões de teste eram denominadas
      XFree86-Aqua, ou simplesmente XAqua. Como Torrey havia tomado a
      liderança, as modificações foram diretamente ao repositório CVS do
      XFree86, o qual esta indo na direção da versão 4.1.0.</p>

      <p>Nos primeiros estágios, a interface com o Quartz era feita através de
      um pequeno aplicativo denominado Xmaster.app (escrito com Carbon e após
      reescrito com Cocoa). Mais tarde esse código foi integrado ao próprio
      servidor X, dando à luz o XDarwin.app. Suporte a bibliotecas
      compartilhadas também foi adicionado ao time (e Tenon foi convencido a
      usar este conjunto de modificações no lugar das suas para garantir
      compatibilidade binária). Houve até bom progresso em um modo sem raiz
      (usando a API Carbon) mas, infelizmente, era muito tarde para colocá-lo
      no XFree86 4.1.0. E as modificações para usar o modo sem raiz eram
      gratuitas e livres, e continuaram a flutuar pela rede. Depois de o
      XFree86 4.1.0 haver sido liberado apenas com o o modo de tela cheia,
      continuou em andamento o trabalho no modo sem raiz, desta vez usando a
      API Cocoa. Um modo sem raiz experimental foi colocado no repositório CVS
      do XFree86.</p>

      <p>Enquanto isso, a Apple lançou o Mac OS X 10.0 e o Darwin 1.3, e a
      Tenon liberou o Xtools 1.0 algumas semanas após.</p>

      <p>Continuava o desenvolvimento da integração do modo sem raiz no
      XFree86, tal que no momento em que o XFree86 4.2.0 foi lançado em janeiro
      de 2002, a versão do Darwin/Mac OS X havia sido completamente integrada à
      distribuição principal do XFree86.</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="inst-xfree86.php?phpLang=pt">3. Obtendo e instalando o X11</a></p>
<? include_once "../../footer.inc"; ?>


