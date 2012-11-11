<?
$title = "Executando o X11 - Introdução";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Executando o X11 Contents"><link rel="next" href="history.php?phpLang=pt" title="História"><link rel="prev" href="index.php?phpLang=pt" title="Executando o X11 Contents">';


include_once "header.pt.inc";
?>
<h1>Executando o X11 - 1. Introdução</h1>
    
    

    <h2><a name="def-x11">1.1 O que é o X11?</a></h2>
      

      <p>O <a href="http://www.x.org/">Sistema de Janelas X (X Window
      System)</a> Versão 11, ou simplesmente X11, é um sistema de exibição
      de gráficos com uma arquitetura cliente-servidor transparente em relação
      à rede. Ele permite que aplicativos desenhem pixels, linhas, textos,
      imagens etc em seu monitor. O X11 vem também c om bibliotecas adicionais
      que permite que os aplicativos desenhem interfaces facilmente, isto é,
      botões, campos para entrada de texto e assim por diante.</p>

      <p>O X11 é o padrão de facto para sistemas gráficos no mundo Unix. Ele
      faz parte do Linux, dos *BSDs e a maior parte dos sistemas Unix
      comerciais. Ambientes de área de trabalho como CDE, KDE e GNOME rodam em
      cima dele.</p>
    

    <h2><a name="def-macosx">1.2 O que é o Mac OS X?</a></h2>
      

      <p>O <a href="http://www.apple.com/macosx/">Mac OS X</a> é um
      sistema operacional produzido pela <a href="http://www.apple.com/">Apple</a>. Da mesma forma que seus
      predecessores NeXTStep e OpenStep, ele é baseado em BSD e é portando um
      membro da família de sistemas operacionais Unix. Entretanto, ele vem com
      um sistema de exibição de gráficos proprietário. O mecanismo gráfico é
      chamado Quartz e sua aparência visual é chamada Aqua, ainda que os dois
      nomes sejam frequentemente usados de forma intercambiável.</p>
    

    <h2><a name="def-darwin">1.3 O que é o Darwin?</a></h2>
      

      <p>O <a href="http://opendarwin.org/">Darwin</a> é basicamente uma
      versão reduzida do Mac OS X que está disponível de forma gratuita e com o
      código fonte completo. Ele não contém Quartz, Aqua ou qualquer outra
      tecnologia relacionada. Por padrão, ele oferece apenas um console
      texto.</p>
    

    <h2><a name="def-xfree86">1.4 O que é o XFree86?</a></h2>
      

      <p>O <a href="http://www.xfree86.org/">XFree86</a> é uma
      implementação de código aberto do X11. Ele foi inicialmente desenvolvido
      para rodar em PCs Intel x86, por isso seu nome. Hoje em dia, ele roda em
      várias arquiteturas e sistemas operacionais, incluindo OS/2, Darwin, Mac
      OS X e Windows.</p>
    

    <h2><a name="def-xtools">1.5 O que é o Xtools?</a></h2>
      

      <p>O Xtools é um produto da X <a href="http://www.tenon.com/">Tenon
      Intersystems</a>. É uma versão do X11 para Mac OS X baseada no
      XFree86.</p>

      <p>Observação: O desenvolvimento aparentemente foi interrompido antes de
      o OS 10.3 ser lançado.</p>
    

    <h2><a name="client-server">1.6 Cliente e servidor</a></h2>
      

      <p>O X11 tem uma arquitetura cliente-servidor. Há um programa central que
      faz o desenho em si e coordena o acesso por vários aplicativos; este é o
      servidor. Um aplicativo que queira desenhar usando o X11 conecta-se ao
      servidor e lhe diz o que desenhar. Portanto, aplicativos são denominados
      clientes no mundo X11.</p>

      <p>O X11 permite que o servidor e os clientes estejam em máquinas
      diferentes, o que geralmente resulta em confusão sobre os termos. Em um
      ambiente com estações de trabalho e servidores, você executará o servidor
      de exibição do X11 em uma estação de trabalho e os aplicativos (clientes
      X11) na máquina servidora. Portanto, quando se fala sobre o "servidor",
      isto significa o programa servidor de exibição do X11 e não a máquina
      escondida no seu armário.</p>
    

    <h2><a name="rootless">1.7 O que significa sem raiz (rootless)?</a></h2>
      

      <p>Um pouco de história: o X11 modela a tela como sendo uma hierarquia de
      janelas contidas umas nas outras. No topo da hierarquia está uma janela
      especial que possui o tamanho da tela e contém todas as outras janelas.
      Esta janela contém o fundo da área de trabalho é denominada "janela
      raiz".</p>

      <p>Voltando ao assunto: como qualquer ambiente gráfico, o X11 foi escrito
      para estar sozinho e ter controle completo da tela. No Mac OS X, o Quartz
      já está governando a tela, portanto é necessário fazer ajustes para que
      ambos coexistam.</p>

      <p>Uma configuração é permitir que ambos se alternem. Cada ambiente
      recebe uma tela completa mas apenas um deles está visível em um dado
      instante de tempo e o usuário pode trocar entre eles. Este modo é
      denominado tela cheia (full-screen) ou com raiz (rooted). Ele é
      denominado com raiz porque há uma janela raiz perfeitamente normal na
      tela do X11 e que funciona como em outros sistemas.</p>

      <p>Outra configuração é misturar os dois ambientes janela por janela.
      Isto elimina a necessidade de alternar entre duas telas. Isto também
      elimina a janela raiz do X11 porque o Quartz já toma conta do fundo da
      área de trabalho. Uma vez que não há uma janela raiz (visível), este modo
      é denominado sem raiz (rootless). É a forma mais confortável de usar o
      X11 no Mac OS X.</p>
    

    <h2><a name="wm">1.8 O que é um gerenciador de janelas?</a></h2>
      

      <p>Na maior parte dos ambientes gráficos, a aparência das bordas de uma
      janela (barra de título, botão de fechar etc) é definida pelo sistema. No
      X11 é diferente. Com o X11, as bordas da janela (também chamadas
      decoração) são fornecidas por um programa separado denominado gerenciador
      de janelas. Sob vários aspectos, o gerenciador de janelas é apenas outro
      aplicativo cliente; ele é iniciado da mesma forma e conversa com o
      servidor X através dos mesmos canais.</p>

      <p>Há um grande número de gerenciadores de janelas diferentes para
      escolher. O site <a href="http://www.xwinman.org/">xwinman.org</a> 
      possui uma lista abrangente. Os mais populares permitem que o usuário
      ajuste a aparência das janelas através de  <a href="http://www.themes.org/">temas</a>. Vários gerenciadores de
      janelas fornecem também funcionalidades adicionais, como menus pop-up na
      janela raiz e barras de ícones.</p>

      <p>Muitos gerenciadores de janelas foram empacotados no Fink. Aqui está
      uma <a href="http://pdb.finkproject.org/pdb/section.php/x11-wm">lista
      atualizada</a>.</p>
    

    <h2><a name="desktop">1.9 O que são Quartz/Aqua, Gnome e KDE?</a></h2>
      

      <p>São gerenciadores de área de trabalho, e há vários outros. Seu
      propósito é fornecer um suporte adicional a aplicativos tal que sua
      aparência, forma de interação e comportamento sejam visualmente
      consistentes. Por exemplo,</p>

      <ul>
        <li>mecanismo gráfico: X11</li>
        <li>gerenciador de janelas: <a href="http://sawmill.sourceforge.net/">sawfish</a></li>
        <li>área de trabalho: <a href="http://www.gnome.org/">Gnome</a></li>
      </ul>

      <p>Os limites entre o sistema de exibição gráfica, gerenciador de janelas
      e de área de trabalho não são muito delimitados porque às vezes uma certa
      funcionalidade, ou uma funcionalidade similar, pode ser implementada por
      mais de um deles. Esta é a razão pela qual um gerenciador de janelas em
      particular pode não poder ser usado com um determinado ambiente de área
      de trabalho.</p>

      <p>Muitos aplicativos são desenvolvidos para serem integrados a uma área
      de trabalho em particular. De forma geral, instalando as bibliotecas
      desses ambientes de área de trabalho (e outras bibliotecas subjacentes)
      para o qual um aplicativo foi desenvolvido, o aplicativo funcionará sem
      perda de funcionalidade. Como exemplo, a grande quantidade de <a href="http://pdb.finkproject.org/pdb/section.php/gnome">aplicativos
      GNOME</a> que podem ser instalados e executados sem rodar o GNOME em
      si. Infelizmente, ainda não se chegou ao mesmo ponto em relação aos <a href="/faq/usage-fink.php#kde">aplicativos
      KDE</a>.</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="history.php?phpLang=pt">2. História</a></p>
<? include_once "../../footer.inc"; ?>


