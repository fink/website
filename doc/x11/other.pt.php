<?php
$title = "Executando o X11 - Outros";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Executando o X11 Contents"><link rel="next" href="trouble.php?phpLang=pt" title="Resolução de problemas com o XFree86"><link rel="prev" href="xtools.php?phpLang=pt" title="Xtools">';


include_once "header.pt.inc";
?>
<h1>Executando o X11 - 6. Outras possibilidades de X11</h1>
    
    

    <h2><a name="vnc">6.1 VNC</a></h2>
      

      <p>O VNC é um sistema de exibição gráfica com suporte a rede similar em
      projeto ao X11. Entretanto, ele trabalha em um nível mais baixo, tornando
      sua implementação mais fácil. Com o servidor Xvnc e um cliente de
      exibição Mac OS X, é possível executar aplicações X11 com o Mac OS X. A
      <a href="http://www.cdc.noaa.gov/~jsw/macosx_xvnc/">página do
      Xvnc</a> de Jeff Whitaker possui mais informações a respeito.</p>
    

    <h2><a name="wiredx">6.2 WiredX</a></h2>
      
      <p>O <a href="http://www.jcraft.com/wiredx/">WiredX</a> é um
      servidor X11 escrito em Java. Também suporta modo sem raiz. Um pacote
      Installer.app está disponível no site.</p>
    

    <h2><a name="exodus">6.3 eXodus</a></h2>
      
      <p>De acordo com o site, o <a href="http://www.powerlan-usa.com/exodus/">eXodus 8</a>, desenvolvido
      pela Powerlan USA, roda nativamente no Mac OS X. Não se sabe a partir de
      que código ele foi desenvolvido e se/como ele provê suporte a clientes
      locais. Por causa disto, não há suporte especial ao eXodus no Fink. Se
      você tiver mais informações, envie-nos.</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="trouble.php?phpLang=pt">7. Resolução de problemas com o XFree86</a></p>
<?php include_once "../../footer.inc"; ?>


