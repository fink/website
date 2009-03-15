<?
$title = "Executando o X11 - Xtools";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/03/15 00:37:07';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Executando o X11 Contents"><link rel="next" href="other.php?phpLang=pt" title="Outras possibilidades de X11"><link rel="prev" href="run-xfree86.php?phpLang=pt" title="Iniciando o X11">';


include_once "header.pt.inc";
?>
<h1>Executando o X11 - 5. Xtools</h1>
    
    

    <h2><a name="install">5.1 Instalando o Xtools</a></h2>
      

      <p>Obtenha o instalador, dê um duplo clique nele e siga as instruções.
      Assegure-se de escolher o volume de inicialização quando solicitado.</p>

      <p>Caso esteja usando o Fink, você deve instalar o pacote
      <code>system-xtools</code> após haver instalado o Xtools. Este pacote não
      instalará arquivos quaisquer, mas verfiicará que as bibliotecas etc
      existem, funcionando como um sinalizador no sistema de dependências do
      Fink.</p>
    

    <h2><a name="run">5.2 Executando o Xtools</a></h2>
      

      <p>Para executar o Xtools, dê um duplo clique em Xtools.app no seu
      diretório Aplicativos (Applications). Da mesma forma que o XFree86, o
      Xtools executará os clientes que você especificar em seu arquivo
      <code>.xinitrc</code>. Além disso, o Xtools permite que você
      inicie clientes através do menu.</p>
    

    <h2><a name="opengl">5.3 Observações sobre OpenGL</a></h2>
      

      <p>O Xtools incorpora aceleração OpenGL em hardware no modo sem raiz e
      vem com as bibliotecas que a suportam. Enquanto que a biblioteca libGL
      principal está ok, as bibliotecas libGLU e libglut estão presentes apenas
      como bibliotecas estáticas, o que não é suficiente para compatibilidade
      binária total com o XFree86. Além disso, alguns arquivos de cabeçalho
      estão faltando. O Fink, no presente momento, não oferece uma solução
      alternativa. Esperamos que isto seja corrigido no Xtools 1.1 quando for
      lançado.</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="other.php?phpLang=pt">6. Outras possibilidades de X11</a></p>
<? include_once "../../footer.inc"; ?>


