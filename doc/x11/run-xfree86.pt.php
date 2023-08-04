<?php
$title = "Executando o X11 - Iniciando o X11";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Executando o X11 Contents"><link rel="next" href="xtools.php?phpLang=pt" title="Xtools"><link rel="prev" href="inst-xfree86.php?phpLang=pt" title="Obtendo e instalando o X11">';


include_once "header.pt.inc";
?>
<h1>Executando o X11 - 4. Iniciando o X11</h1>
    
    

    <h2><a name="darwin">4.1 Darwin</a></h2>
      
      <p>No Darwin puro, o XFree86 se comporta da mesma forma que em qualquer
      outro Unix. A forma usual de iniciá-lo é através de <code>startx</code>
      no console, iniciando o servidor e alguns clientes iniciais como o
      gerenciador de janelas e um emulador de terminal com um shell. No Darwin
      puro não é necessário especificar quaisquer parâmetros portanto você pode
      digitar apenas:</p>

      <pre>startx</pre>

      <p>Você pode customizar o que é iniciado através de vários arquivos em
      seu diretório home. <code>.xinitrc</code> controla quais clientes
      são iniciados. <code>.xserverrc</code> controla opções do
      servidor e pode até mesmo iniciar um servidor diferente. Se você estiver
      tendo problema (por exemplo, a tela fica completamente em branco ou o
      XFree86 termina e volta direto pro console), você pode iniciar um
      procedimento de resolução de problemas movendo estes arquivos para outro
      lugar. Quando o <code>startx</code> não encontra esses arquivos, ele
      usará opções padrões seguras que devem funcionar sempre.</p>

      <p>De forma alternativa, você pode iniciar o servidor diretamente com uma
      das opções XDMCP tais como:</p>

      <pre>X -query remotehost</pre>

      <p>Detalhes sobre isto podem ser encontrados na página de manual do
      Xserver.</p>

      <p>Finalmente, há a opção de configurar o <code>xdm</code>; leia sua
      página de manual para detalhes.</p>

      <p>Observação: você não pode iniciar o XFree86 a partir da janela de
      console do Mac OS X.</p>
    

    <h2><a name="macosx-41">4.2 Mac OS X + XFree86 4.x.y</a></h2>
      

      <p>Há basicamente duas formas de iniciar o XFree86 no Mac OS X. Uma é dar
      um duplo clique no aplicativo <code>XDarwin.app</code> em seu
      diretório <code>Aplicativos</code>
      (<code>Applications</code>), o que lhe permitirá escolher,
      através de uma janela de diálogo apresentado na inicialização, dentre
      modo de tela cheia ou sem raiz. Você pode desabilitar a janela de diálogo
      e configurar o XDarwin para usar sempre o modo de sua preferência através
      da caixa de diálogo Preferências (Preferences).</p>

      <p>Antes da versão 4.2.0 ele sempre abria em tela cheia e não havia como
      escolher o modo sem raiz através de um duplo clique na aplicação.</p>

      <p>A outra forma de iniciar o XFree86 no Mac OS X é através de
      <code>startx</code> no <code>Terminal.app</code>. Se você iniciar
      o servidor desta forma, você precisa dizer-lhe para executar em paralelo
      com o Quartz. Isto é feito através da opção <code>-fullscreen</code>:</p>

      <pre>startx -- -fullscreen</pre>

      <p>Isto iniciará o servidor em modo de tela cheia assim como os clientes
      enumerados no seu arquivo <code>.xinirc</code>.</p>

      <p>Observação: antes da versão 4.2, a opção <code>-quartz</code> era
      usada para o modo de tela cheia.</p>

      <p>Você pode iniciá-lo em modo sem raiz através da opção
      <code>-rootless</code>:</p>

      <pre>startx -- -rootless</pre>

      <p>A opção <code>-quartz</code> não mais seleciona o modo de tela cheia
      mas sim usa o modo padrão definido nas preferências.</p>

      <p>A partir da versão 4.2, você pode usar <code>startx</code> sem
      argumentos; a caixa de diálogo aparecerá na inicialização.</p>
    

    <h2><a name="starting-xorg">4.3 Iniciando o  X.org</a></h2>
      

      <p>O X.org funciona de forma idêntica ao XFree86, sob todos os
      aspectos.</p>
    

    <h2><a name="starting-apples-x11">4.4 Iniciando o X11 da Apple</a></h2>
      

      <p>Funcionalmente, o X11 da Apple trabalha de forma similar ao XFree86
      (por exemplo, usando um arquivo <code>.xinitrc</code> para
      controlar quais clientes são executados na inicialização). A forma usual
      de executá-lo é através de um duplo clique no ícone
      <code>X11.app</code> (cuja localização padrão é
      <code>/Aplicativos/Utilitários</code>
      (<code>/Applications/Utilities</code>). Você pode usar
      <code>startx</code> também mas não há uma opção de linha de comando para
      definir o modo de exibição; o <code>X11.app</code> iniciará no
      modo que foi previamente definido através das Preferências
      (Preferences).</p>

      <p>Se você não configurou um gerenciador de janelas diferente, você
      estará rodando o gerenciador de janelas <code>quartz-wm</code> da Apple.
      As Preferências (Preferences) do <b>X11.app</b> permitem trocar entre
      os modos de tela cheia e sem raiz sem precisar reiniciar. Entretanto,
      isto não funciona para o quartz-wm; é necessário escolher um gerenciador
      de janelas diferente (por exemplo, no arquivo
      <code>.xinitrc</code>).</p>
    

    <h2><a name="applex11tools">4.5 O pacote applex11tools</a></h2>
      

      <p>O pacote <code>applex11tools</code> do Fink permite que você use o
      <code>X11.app</code> e o <code>quartz-wm</code> no OS 10.3 e mais
      recentes com o XFree86 4.4 ou mais recentes ou o X.org.</p>

      <p>Para instalar este pacote, você precisa habilitar a <a href="/faq/usage-fink.php#unstable">árvore
      unstable</a> e ter o arquivo <code>X11User.pkg</code>
      em algum lugar dentro de <code>/Users</code> ou
      <code>/Volumes</code>. O <code>X11.app</code> será
      instalado no diretório <code>Applications</code> dentro da sua
      árvore do Fink. Você poderá então usar tanto <code>X11.app</code>
      quanto <code>XDarwin.app</code>.</p>
    

    <h2><a name="xinitrc">4.6 O arquivo .xinitrc</a></h2>
      

      <p>Caso um arquivo chamado <code>.xinitrc</code> exista em seu
      diretório home, ele será usado para iniciar alguns clientes X iniciais,
      por exemplo o gerenciador de janelas e alguns xterms ou um ambiente de
      área de trabalho como o GNOME. O arquivo <code>.xinitrc</code> é
      um script de shell que contém os comandos para fazer isto. <b>Não</b> é
      necessário colocar o tradicional <code>#!/bin/sh</code> na primeira linha
      e ligar o bit de execução no arquivo; o xinit irá de qualquer forma
      executá-lo através de um shell.</p>

      <p>Caso não exista um arquivo <code>.xinitrc</code> em seu
      diretório home, o X11 usa seu arquivo padrão,
      <code>/private/etc/X11/xinit/xinitrc</code>. Você pode usar o
      arquivo padrão como um ponto de partida para seu próprio
      <code>.xinitrc</code>:</p>

      <pre>cp /private/etc/X11/xinit/xinitrc ~/.xinitrc</pre>

      <p>Caso esteja usando o Fink, você precisa incluir (através do comando
      <code>.</code>) o script <code>/opt/sw/bin/init.sh</code> bem no
      começo para garantir que o ambiente seja configurado corretamente.</p>

      <p>Você pode colocar comandos arbitrários em um
      <code>.xinitrc</code> mas há algumas restrições. Em primeiro
      lugar, o shell que interpreta o arquivo possui o comportamento padrão de
      esperar por todo programa encerrar antes de iniciar o próximo. Se você
      quer que vários programas rodem em paralelo, você precisa dizer ao shell
      para colocá-los em segundo plano (background) através de
      <code>&amp;</code> ao final de cada linha.</p>

      <p>Em segundo lugar, o <code>xinit</code> espera pelo script
      <code>.xinitrc</code> encerrar, interpretando este evento como "a
      sessão terminou, posso encerrar o servidor X também". Isto significa que
      o último comando de seu <code>.xinitrc</code> não pode ser
      executado em segundo plano e deve ser um programa que fique em execução
      por bastante tempo. Normalmente o gerenciador de janelas é usado para
      este fim. De fato, a maior parte dos gerenciadores de janelas pressupõem
      que o <code>xinit</code> esteja esperando que eles terminem e usam isto
      para fazer funcionar a opção de menu "Sair" ("Log out"). (Observação:
      para economizar memória e ciclos de CPU, você pode colocar um
      <code>exec</code> antes da última linha como nos exemplos abaixo).</p>

      <p>Um exemplo simples que inicia o GNOME no XFree86 ou X.org:</p>

      <pre>. /opt/sw/bin/init.sh
exec gnome-session</pre>

      <p>Um exemplo mais complexo para usuários bash que desliga a campainha do
      X11, inicia alguns clientes e finalmente executa o gerenciador de janelas
      Enlightenment:</p>

      <pre>. /opt/sw/bin/init.sh

xset b off

xclock -geometry -0+0 &amp;
xterm &amp;
xterm &amp;

exec enlightenment</pre>
 

      <p>Para iniciar o GNOME 2.4 e mais recentes no X11 da Apple:</p>

      <pre>. /opt/sw/bin/init.sh
quartz-wm --only-proxy &amp;
exec gnome-session</pre>

      <p>Para iniciar o KDE 3.2 (versão &lt; 3.2.2-21) no X11 da Aple:</p>

      <pre>. /opt/sw/bin/init.sh
export KDEWM=kwin
quartz-wm --only-proxy &amp;
/opt/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1</pre>

      <p>E finalmente para iniciar a versão instável mais recente do KDE no X11
      da Apple:</p>

      <pre>. /opt/sw/bin/init.sh
/opt/sw/bin/startkde &gt;/tmp/kde.log 2&gt;&amp;1</pre>
    

    <h2><a name="oroborosx">4.7 OroborOSX</a></h2>
      

      <p>O <a href="http://oroborosx.sourceforge.net">OroborOSX</a> é uma
      alternativa para servidores de exibição X11.app e XDarwin. Ele requer uma
      instalação do X11 pré-existente para funcionar. O
      <code>X11.app</code> ou o <code>XDarwin.app</code> também
      continuam a funcionar.</p>

      <p>Ao ser executado, o <b>OroborOSX</b> inicia sem próprio gerenciador
      de janelas que é sempre sem raiz e não lê nem o arquivo
      <code>xinitrc</code> do sistema nem o <code>.xinitrc</code> do usuário.
      Após iniciar, ele tem uma opção de menu para executar o
      <code>.xinitrc</code>. Entretanto, ele tem seu próprio método para
      configurar aplicações que sejam executadas quando ele inicia. Ele também
      fornece um mecanismo para iniciar aplicativos X11 a partir do Finder via
      scripts de inicialização.</p>

      <p>Para mais informações, visite o <a href="http://oroborosx.sourceforge.net">site do OroborOSX</a>.</p>
      
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="xtools.php?phpLang=pt">5. Xtools</a></p>
<?php include_once "../../footer.inc"; ?>


