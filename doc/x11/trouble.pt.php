<?php
$title = "Executando o X11 - Resolução de problemas";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Executando o X11 Contents"><link rel="next" href="tips.php?phpLang=pt" title="Dicas de uso"><link rel="prev" href="other.php?phpLang=pt" title="Outras possibilidades de X11">';


include_once "header.pt.inc";
?>
<h1>Executando o X11 - 7. Resolução de problemas com o XFree86</h1>
    
    

    <h2><a name="immedate-quit">7.1 Quando inicio o XDarwin, ele termina ou falha quase que de
      imediato</a></h2>
      

      <p>Em primeiro lugar: não entre em pânico! Há várias coisas que podem dar
      errado com o XFree86 e um bom número delas podem causar falhas de
      inicialização. Além disso, não é incomum que o XDarwin falhe quando
      apresenta problemas de inicialização. Esta seção tenta fornecer uma lista
      abrangente de problemas pelos quais você talvez passe. Mas antes você
      precisa obter duas informações importantes:</p>

      <p><b>A versão do XDarwin.</b> Você pode encontrar a versão do XDarwin
      no Finder clicando <b>uma única vez</b> no ícone XDarwin e então
      escolhendo a opção "Obter Informações" ("Show Info") no menu. A versão só
      é incrementada quando uma versão binária de teste é feita pelo projeto
      XonX, então "1.0a1" pode na verdade ser qualquer versão entre 1.0a1 e
      1.0a2.</p>

      <p><b>Mensagens de erro.</b> São fundamentais para identificar
      precisamente o problema pelo qual você está passando. A forma como você
      recebe as mensagens de erro depende de como você iniciou o XDarwin. Se
      você executou <code>startx</code> em uma janela do Terminal, você terá as
      mensagens ali nessa janela. Lembre-se de que você pode navegar para cima.
      Se você iniciou o XDarwin através de um duplo clique no ícone, as
      mensagens acabam indo para o log do sistema, o qual você pode acessar
      através do aplicativo Console no diretório Utilitários. Assegure-se de
      escolher o conjunto correto de mensagens, isto é, o último.</p>

      <p>Começamos por uma lista de mensagens que você possa encontrar:</p>

      <pre>_XSERVTransmkdir: Owner of /tmp/.X11-unix should be set to root</pre>
      <pre>_IceTransmkdir: Owner of /tmp/.ICE-unix should be set to root</pre>

      <p>Classe: não causa danos. O X11 cria diretórios escondidos em
      <code>/tmp</code> e armazena "arquivos" de sockets para conexões
      locais. Por razões de segurança, o X11 prefere que esses diretórios
      tenham root como proprietário mas, como esses arquivos têm permissão de
      escrita para todos os usuários, o X11 rodará sem problemas. (Observação:
      é razoavelmente difícil que esses diretórios tenham root como
      proprietário já que o Mac OS X zera o diretório <code>/tmp</code>
      quando é reiniciado e o XDarwin não executa (nem precisa executar) com
      privilégio de root.)</p>

      <pre>QuartzAudioInit: AddIOProc returned 1852797029</pre>
      <pre>-[NSCFArray objectAtIndex:]: index (2) beyond bounds (2)</pre>
      <pre>kCGErrorIllegalArgument : CGSGetDisplayBounds (display 35434400)</pre>
      <pre>No core keyboard</pre>

      <p>Classe: falso. Esses são erros que surgem quando o servidor tenta
      reiniciar-se após um erro prévio. Durante este processo, uma outra cópia
      da mensagem de inicialização é exibida, seguida por uma ou mais das
      mensagens acima porque a reinicialização do servidor não funciona de fato
      nas versões do XDarwin afetadas. Então quando você vir mensagens como
      estas, pagine para na janela do Console/Terminal e procure por um outro
      conjunto de mensagem de inicialização e mensagens. Isto afeta todas as
      versões até XDarwin 1.0a3 inclusive; foi corrigido após a versão 1.0a3
      ser lançada.</p>

      <pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>

      <p>Classe: em geral, não causa danos. Não se sabe de onde vêm essas
      mensagens e elas aparentam não ter impacto nas operações. Você pode
      livrar-se delas executando <code>touch .Xauthority</code> no seu
      diretório home.</p>

      <pre>Gdk-WARNING **: locale not supported by C library</pre>

      <p>Classe: não causa danos. Isto apenas significa o que diz -- local não
      suportado pela biblioteca C -- e não fará com que a aplicação deixe de
      funcionar. Para mais informações, veja <a href="#locale">abaixo</a>.</p>

      <pre>Gdk-WARNING **: locale not supported by Xlib, locale set to C
Gdk-WARNING **: can not set locale modifiers</pre>

      <p>Classe: ruim, mas não fatal. Estas mensagens podem aparecer em
      complemento às acima. Isto indica que os arquivos de dados de localização
      do XFree86 não estão presentes. Aparentemente isto acontece quando se
      compila o XFree86 a partir do código fonte, mas não é reproduzível. A
      maior parte das aplicações ainda funciona mas o GNU Emacs é uma exceção
      notável.</p>

      <pre>Unable to open keymapping file USA.keymapping.
Reverting to kernel keymapping.</pre>

      <p>Classe: geralmente fatal. Isto pode acontecer com o XDarwin 1.0a1 e a
      opção de mapeamento de teclado "Load from file" habilitada. Essa versão
      precisa de um caminho completo quando o arquivo a ser carregado é
      definido pela caixa de diálogo Preferências (Preferences), mas procura
      automaticamente quando é passado pela linha de comando. A mensagem será
      geralmente seguida pela mensagem "assert" mostrada abaixo. Para corrigir
      este problema, siga as instruções abaixo.</p>

      <pre>Fatal server error:
assert failed on line 454 of darwinKeyboard.c!</pre>
      <pre>Fatal server error:
Could not get kernel keymapping! Load keymapping from file instead.</pre>

      <p>Classe: fatal. Mudanças que a Apple fez no Mac OS X 10.1 quebraram o
      código do XFree86 que lê o leiaute de teclado no núcleo do sistema
      operacional; a mensagem acima é o resultado disso. Você precisa usar a
      opção de mapeamento de teclado "Load from file" no Mac OS X 10.1. A
      configuração é feita na caixa de diálogo Preferências (Preferences) do
      XDarwin. Assegure-se de que um arquivo haja sido selecionado (isto é, use
      o botão "Escolher arquivo", "Pick file") - simplesmente ativar a caixa de
      verificação pode não ser suficiente em algumas versões do XDarwin. Caso
      você não consiga abrir a caixa de diálogo Preferências porque o
      XDarwin a fecha antes que você consiga usá-la, rode-o a partir do
      Terminal através do comando <code>startx -- -quartz -keymap
      USA.keymapping</code>. Isto geralmente permite que o XDarwin inicie e
      então você pode fazer a escolha permanente na caixa de diálogo
      Preferências.</p>

      <pre>Fatal server error:
Could not find keymapping file .</pre>
      <p>Class: Fatal (as it says).  This error is due to the absence of the keymapping files under Panther.  You need to install <code>xfree86-4.3.99-16</code> or later, since these versions don't need the keymapping files.</p>
      <pre>Warning: no access to tty (Inappropriate ioctl for device).
Thus no job control in this shell.</pre>

      <p>Classe: em geral, não causa danos. O XDarwin 1.0a2 e posteriores abrem
      um shell interativo por debaixo dos panos para rodar seu arquivo de
      inicialização do cliente (<code>.xinitrc</code>). Isto foi feito
      para que você não tenha que adicionar comandos para configuração de PATH
      nesse arquivo. Alguns shells reclamam que não estão conectados a um
      terminal real mas isto pode ser ignorado pois essa instância do shell não
      é usada para qualquer coisa que requeira controle de jobs ou
      similares.</p>

      <pre>Fatal server error:
failed to connect as window server!</pre>

      <p>Classe: fatal. Isto significa que o servidor em modo console (para o
      Darwin puro) foi iniciado enquanto você estava logado no Aqua.
      Normalmente isto acontece quando você instala uma distribuição binária
      oficial do XFree86 e esquece o tarball Xquartz.tgz. Isto também pode
      acontecer quando os links simbólicos em
      <code>/usr/X11R6/bin</code> estão bagunçados ou quando você
      executa o comando <code>XDarwin</code> em uma janela de Terminal para
      iniciar o servidor (você deveria usar <code>startx</code>; veja <a href="run-xfree86.php?phpLang=pt">Iniciando o XFree86</a>.).</p>

      <p>De qualquer forma, você pode executar <code>ls -l
      /usr/X11R6/bin/X*</code> e verificar a saída. Você deveria ver quatro
      entradas relevantes: <code>X</code>, um link simbólico apontando para
      <code>XDarwinStartup</code>; <code>XDarwin</code>, um arquivo executável
      (esse é o servidor em modo console); <code>XDarwinQuartz</code>, um link
      simbólico apontando para
      <code>/Applications/XDarwin.app/Contents/MacOS/XDarwin</code>; e
      <code>XDarwinStartup</code>, um arquivo executável pequeno. Se algum
      desses estiver faltando ou apontando para arquivos diferentes, você
      precisa corrigir.  Como fazê-lo depende do método usado para instalar o
      XFree86. Se você instalou o XFree86 com o Fink então você precisa
      reinstalar o pacote <code>xfree86</code> (ou
      <code>xfree86-rootless</code> para o OS 10.2 e anteriores). Se foi
      instalado por você mesmo, então obtenha os arquivos a partir de uma cópia
      de <code>Xquartz.tgz</code>.</p>

      <pre>The XKEYBOARD keymap compiler (xkbcomp) reports:
&gt; Error:            Can't find file "unknown" for geometry include
&gt;                   Exiting
&gt;                   Abandoning geometry file "(null)"
Errors from xkbcomp are not fatal to the X server</pre>

      <p>Classe: em geral, não causa danos. Como a própria mensagem diz, não é
      um erro fatal. Até onde eu saiba, o XDarwin não chega a usar extensões
      XKB. Provavelmente algum programa cliente tentou usá-las...</p>

      <pre>startx: Command not found.</pre>

      <p>Classe: fatal. Isto pode acontecer com o XDarwin 1.0a2 e 1.0a3 quando
      seus arquivos de inicialização do shell não foram configurados para
      adicionar <code>/usr/X11R6/bin</code> à variável PATH. Caso você
      use o Fink e não haja mudado seu shell padrão, adicionar a linha
      <code>source /sw/bin/init.csh</code> ao arquivo
      <code>.cshrc</code> em seu diretório home (conforme recomendado
      pelas instruções do Fink) deve ser suficiente.</p>

      <pre>_XSERVTransSocketUNIXCreateListener: ...SocketCreateListener() failed
_XSERVTransMakeAllCOTSServerListeners: server already running</pre>
      <pre>Fatal server error:
Cannot establish any listening sockets - Make sure an X server isn't already
running</pre>

      <p>Classe: fatal. Isto pode acontecer quando você executa acidentalmente
      várias instâncias do XDarwin de uma vez, ou talvez após uma finalização
      problemática (isto é, uma folha) do XDarwin. Pode ser também um problema
      com permissão de arquivo com os sockets para conexões locais. Você pode
      tentar limpá-los com <code>rm -rf /tmp/.X11-unix</code>.. Reiniciar o
      computador também ajuda na maior parte dos casos (o Mac OS X limpa
      automaticamente o diretório <code>/tmp</code> quando é iniciado,
      e a pilha de rede é reiniciada).</p>

      <pre>Xlib: connection to ":0.0" refused by server
Xlib: Client is not authorized to connect to Server</pre>

      <p>Classe: fatal. Os programas clientes não conseguem se conectar ao
      servidor de exibição (XDarwin) porque usam dados de autenticação falsos.
      Isto é causado por algumas instalações do VNC, por rodar o XDarwin
      através do sudo, e provavelmente outros acidentes estranhos. A correção
      usual é apagar o arquivo <code>.Xauthority</code> (o qual
      armazena dados de autenticação) no seu diretório home e recriá-lo em
      branco:</p>
      <pre>cd
rm .Xauthority
touch .Xauthority</pre>
      
      <p>Outra causa comum de erro na inicialização do XFree86 é um arquivo
      <code>.xinitrc</code> incorreto. O que acontece é que
      <code>.xinitrc</code> é executado e por alguma razão termina
      quase que de imediato. O <code>xinit</code> interpreta isto como "a
      sessão do usuário terminou" e encerra o XDarwin. Veja a <a href="run-xfree86.php?phpLang=pt#xinitrc">seção sobre o .xinitrc</a>
      para mais detalhes. Lembre-se de configurar sua variável PATH e ter um
      programa que execute indefinidamente e que não seja iniciado em segundo
      plano. É uma boa idéia adicionar <code>exec xterm</code> como uma
      garantia caso seu gerenciador de janelas ou similar não possa ser
      encontrado.</p>
      
    
    <h2><a name="black">7.2 Ícones pretos no painel do GNOME ou no menu de um aplicativo GNOME</a></h2>
      

      <p>Um problema comum é ícones ou outras imagens sendo exibidos como
      retângulos pretos ou contornos pretos. Em última instância, isto é
      causado por limitações do núcleo do sistema operacional. O problema foi
      relatado para a Apple mas até agora eles aparentam não querer corrigi-lo:
      veja o <a href="http://www.opensource.apple.com/bugs/X/Kernel/2691632.html">relatório
      de erro</a> para detalhes.</p>

      <p>A situação atual é que a extensão MIT-SHM do protocolo X11 é
      praticamente impossível de user usada no Darwin e no Mac OS X. Há duas
      formas de desligar esta extensão de protocolo: no servidor ou nos
      clientes. Os servidores XFree86 instalados pelo Fink (isto é, os pacotes
      <code>xfree86-server</code> e <code>xfree86-rootless</code>) já a
      desligaram. O GIMP e o painel do GNOME também já foram inoculados. Se
      você encontrar ícones pretos em outra aplicação, inicie a aplicação com a
      opção de linha de comando <code>--no-xshm</code>.</p>
    

    <h2><a name="keyboard">7.3 O teclado não funciona no XFree86</a></h2>
      

      <p>Este é um problema conhecido que até agora aparenta afetar apenas os
      laptops (PowerBook, iBook). Para contorná-lo, a opção de mapeamento de
      teclado "Load from file" foi implementada. Hoje em dia tornou-se o padrão
      porque o método antigo (ler o mapeamento do núcleo do SO) parou de
      funcionar com o Mac OS X 10.1. Se você ainda não habilitou esta opção,
      você pode fazê-lo na caixa de diálogo de Preferências do XDarwin. Marque
      a caixa de verificação "Load from file" e escolha o arquivo de mapeamento
      de teclado a ser carregado. Após reiniciar o XDarwin, seu teclado deveria
      funcionar de forma geral (veja abaixo).</p>

      <p>Caso esteja iniciando o XFree86 a partir da linha de comando, você
      pode passar o nome do arquivo de mapeamento de teclado a ser carregado
      como uma opção:</p>

      <pre>startx -- -quartz -keymap USA.keymapping</pre>
    

    <h2><a name="delete-key">7.4 A tecla Backspace não funciona</a></h2>
      

      <p>Isto pode acontecer quando se usa a opção "Load from file" acima. Os
      arquivos de mapeamento descrevem a tecla backspace como "Delete" e não
      como "Backspace". Você pode corrigir isto coloando a seguinte linha no
      seu arquivo <code>.xinitrc</code>:</p>

      <pre>xmodmap -e "keycode 59 = BackSpace"</pre>

      <p>Se estou lembrando corretamente, o XDarwin 1.0a2 e posteriores já têm
      código que mapeia correta e automaticamente a tecla Backspace.</p>
    

    <h2><a name="locale">7.5 "Warning: locale not supported by C library"</a></h2>
      

      <p>Estas mensagens são relativamente comuns mas não causam dano. Elas
      significam exatamente o que dizem - internacionalização não é suportada
      através da biblioteca C padrão, o programa usará as mensagens padrão,
      formatos de data etc em inglês. Há várias formas de lidar com isto:</p>

      <ul>
        <li>
          <p>Ignore as mensagens.</p>
        </li>

        <li>
          <p>Livre-se das mensagens removendo a definição da variável de
          ambiente LANG. Observe que isto também irá desligar a
          internacionalização de programas que de fato a suportem (via
          gettext/libintl). Exemplo para o .xinitrc:</p>

          <pre>unset LANG</pre>

          <p>Exemplo para o .cshrc:</p>

          <pre>unsetenv LANG</pre>
        </li>

        <li>
          <p>(apenas 10.1) Use o pacote <code>libxpg4</code> do Fink. Ele
          compila uma pequena biblioteca que contém funções de local que
          funcionam e faz com que ela seja carregada antes das bibliotecas de
          sistema (usando a variável de ambiente DYLD_INSERT_LIBRARIES). Você
          talvez tenha que definir a variável de ambiente LANG com um valor
          completamente qualificado, por exemplo <code>de_DE.ISO_8859-1</code>
          no lugar de <code>de</code> or <code>de_DE</code>.</p>
        </li>

        <li>
          <p>Solicite à Apple que inclua suporte apropriado para locais em uma
          versão futura do Mac OS X.</p>
        </li>
      </ul>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="tips.php?phpLang=pt">8. Dicas de uso</a></p>
<?php include_once "../../footer.inc"; ?>


