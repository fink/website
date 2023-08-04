<?php
$title = "Executando o X11 - Dicas";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Executando o X11 Contents"><link rel="prev" href="trouble.php?phpLang=pt" title="Resolução de problemas com o XFree86">';


include_once "header.pt.inc";
?>
<h1>Executando o X11 - 8. Dicas de uso</h1>
    
    

    <h2><a name="terminal-app">8.1 Execução aplicativos X11 a partir do Terminal.app</a></h2>
      

      <p>Para iniciar um aplicativo X11 a partir de uma janela do Terminal.app,
      você precisa definir a variável de ambiente "DISPLAY". Essa variável diz
      aos aplicativos onde encontrar o servidor de janelas X11. Na configuração
      padrão - o XDarwin roda na mesma máquina -, você pode definir a variável
      como segue:</p>

      <ul>
        <li>
          <p>For usuários do bash:</p>
          <pre>export DISPLAY=":0.0"</pre>
        </li>

        <li>
          <p>Para usuários do tcsh:</p>
          <pre>setenv DISPLAY :0.0</pre>
        </li>
      </ul>

      <p>Uma boa configuração é ter o XDarwin.app iniciado quando você se logar
      (pode ser definido no painel Login das Preferências de Sistema no Mac OS
      10.2, no painel Contas, Inicialização no Mac OS 10.3):</p>

      <ul>
        <li>
          <p>Para usuários do bash, adicione o seguinte ao seu arquivo
          .bashrc:</p>
          <pre>[[ -z $DISPLAY ]] &amp;&amp; export DISPLAY=":0.0"</pre>
        </li>

        <li>
          <p>Para usuários do tcsh users, adicione o seguinte ao seu arquivo
          .cshrc:</p>
         <pre>if (! $?DISPLAY) then
  setenv DISPLAY :0.0
endif</pre>
        </li>
      </ul>

      <p>Isto faz com que a variável DISPLAY seja definida automaticamente em
      todo shell. Ela não sobrescreve o valor atual caso a variável DISPLAY já
      esteja definida. Desta forma, você ainda consegue executar aplicativos do
      X11 remotamente ou através de ssh com tunelamento X11.</p>
    

    <h2><a name="open">8.2 Executando aplicativos Aqua a partir do xterm</a></h2>
      

      <p>Uma forma de executar aplicativos Aqua a partir do xterm (ou de
      qualquer outro shell) é através do comando <code>open</code>. Alguns
      exemplos:</p>

      <pre>open /Applications/TextEdit.app
open SomeDocument.rtf
open -a /Applications/TextEdit.app index.html</pre>

      <p>O segundo exemplo abre o documento no aplicativo que esteja lhe esteja
      associado; o terceiro exemplo diz explicitamente qual aplicativo deve ser
      usado.</p>
    

    <h2><a name="copy-n-paste">8.3 Copiar e colar</a></h2>
      

      <p>Copiar e colar geralmente funciona entre ambientes Aqua e X11. Ainda
      há alguns erros. Há relatos de o Emacs ter problemas com a seleção atual.
      Copiar e colar de Classic para X11 não funciona.</p>

      <p>De qualquer forma, o truque é usar os métodos respectivos do ambiente
      em que esteja. Para transferir texto do Aqua para X11, use Cmd-C no Aqua,
      traga a janela de destino para frente e use o "botão do meio do mouse",
      isto é, Option-click em um mouse com um único botão (isto pode ser
      configurado nas Preferências do XDarwin) para colar. Para transferir
      texto do X11 para Aqua, simplesmente selecione o texto com o mouse no X11
      e então use Cmd-V no Aqua para colá-lo.</p>

      <p>O sistema X11 tem na verdade vários clipboards separados (denominados
      "cut buffers" no léxico do X11) e alguns aplicativos têm visões estranhas
      sobre qual deve ser usado. Em particular, colar dentro do GNU Emacs ou
      XEmacs não funciona às vezes por causa disso. O programa
      <code>autocutsel</code> pode ajudar; ele sincroniza automaticamente os
      dois principais cut buffers. Para executá-lo, instale o pacote
      <code>autocutsel</code> do Fink e adicione a seguinte linha ao seu
      <code>.xinitrc</code>:</p>

      <pre>autocutsel &amp;</pre>

      <p>(Assegure-se de que esteja <b>antes</b> da linha que executa o
      gerenciador de janelas e que nunca retorna! Não a adicione simplesmente
      ao fim, ela não será executada.) E lembre-se de que isto não é mais
      necessário para o X11 da Apple. (veja <a href="inst-xfree86.php?phpLang=pt#apple-binary">Algumas observações sobre o uso do X11 da
      Apple</a>).</p>

      <p>Caso esteja usando o X11 da Apple, você pode usar Command-C ou
      Editar-&gt;Copiar (Edit-&gt;Copy), como é de praxe nos aplicativos Mac,
      para copiar texto para o clipboard, e usar o botão do meio do mouse ou
      Command-V para colar do clipboard para o X11 da Apple.</p>

      <p>De qualquer forma, caso encontre problemas ao copiar e colar do Aqua
      para X11 e vice-versa, você pode primeiro tentar colar duas vezes (pode
      ser que o copiar não ocorra de imediato). Você também pode usar
      aplicativos intermediários, por exemplo TextEdit ou Terminal.app no lado
      do Aqua, nedit ou xterm no lado do X11. Em minha experiência, sempre há
      uma solução.</p>
    
  
<?php include_once "../../footer.inc"; ?>


