<?php
$title = "Executando o X11 - Instalando o  X11";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Executando o X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=pt" title="Iniciando o X11"><link rel="prev" href="history.php?phpLang=pt" title="História">';


include_once "header.pt.inc";
?>
<h1>Executando o X11 - 3. Obtendo e instalando o X11</h1>
    
    

    <h2><a name="fink">3.1 Instalando o X11 via Fink</a></h2>
      

      <p>O Fink permite que você instale o X11 de várias maneiras, dentre as
      quais pacotes XFree86 providos pelo Fink. Se você usar <code>fink install
      ...</code>, ele irá baixar o código fonte e compilá-lo em seu computador.
      Se você usar <code>apt-get install ...</code> ou a interface
      <code>dselect</code>, ele irá baixar pacotes binários pré-compilados,
      similar à distribuição oficial do XFree86.</p>

      <p><b>Observações gerais:</b></p>

      <ul>
        <li>Todos os pacotes X11 disponíveis atualmente via Fink suportam tanto
        operação em tela cheia ou sem raiz, e suportam OpenGL.</li>

        <li><b>Observação importante:</b> arquivos mudam de lugar entre
        versões X11. Isto geralmente significa que se você tentar baixar a
        versão da sua instalação do X11, você descobrirá que binários
        (programas executáveis etc) não funcionam mais. Você terá que
        recompilar esses pacotes.
          <p>Você pode ir no sentido contrário: pacotes compilados em relação a
          uma versão do X11 mais antiga geralmente funcionam em uma versão
          posterior.</p>

          <p>Para 10.3 ou 10.4, a hierarquia do X11 (mais recente -&gt; mais
          antigo) é:</p>

          <pre>xorg &gt; xfree86 &gt; X11 da Apple</pre></li>
      </ul>

      <p><b>Usuários do Mac OS X 10.4:</b></p>

      <p>Você pode instalar a versão 4.5.0-23 do XFree86 a partir do código
      fonte. Você irá precisar de ambos os pacotes <code>xfree86</code> e
      <code>xfree86-shlibs</code> para ter uma instalação completamente
      funcional.</p>

      <p>Você também pode instalar a versão X11 do X.org (atualmente na versão
      6.8.2-35) através dos pacotes <code>xorg</code> e
      <code>xorg-shlibs</code>.</p>






      

    

    <h2><a name="apple-binary">3.2 Binários da Apple</a></h2>
      

      <p>Em 7 de janeiro de 2003, a Apple lançou <a href="http://www.apple.com/macosx/x11/">uma implementação customizada do
      X11 baseada no XFree86-4.2</a> incluindo o renderização Quartz e
      OpenGL acelerado. Uma nova versão foi lançada em 10 de fevereiro de 2003
      com funcionalidades adicionais e correções de erros. Uma terceira versão
      (isto é, Beta 3) foi lançada em 17 de março de 2003 com novas
      funcionalidades e correções de erros. Esta versão é suficientemente
      estável para execução no Jaguar.</p>

      <p>Em 24 de outubro de 2003, a Apple lançou o Panther (10.3) incluindo
      uma versão oficial da sua distribuição X11. Essa versão é baseada no
      XFree86-4.3.</p>

      <p>Em 29 de abril de 2005, a Apple lançou o Tiger (10.4) incluindo uma
      versão oficial do X11 da Apple baseado no XFree86-4.4.</p>

      <p>Para usar os binários da Apple, você precisa assegurar-se de que o
      pacote <b>X11 User</b> esteja instalado, e você deve <a href="/doc/users-guide/upgrade.php">atualizar</a>
      o Fink.</p>


      <p>Você só precisa instalar o X11 SDK caso queira compilar pacotes a
      partir do código fonte. Neste caso, mesmo que você não tenha o SDK,
      haverá os pacotes virtuais <code>system-xfree86</code> e
      <code>system-xfree86-shlibs</code>, o último representando as bibliotecas
      compartilhadas. Se você instalar o SDK, haverá também um pacote
      <code>system-xfree86-dev</code> representando os arquivos de
      cabeçalho.</p>

      <p>Caso você tenha uma distribuição do XFree86 instalada, seja através do
      Fink ou de outras formas, você pode seguir as <a href="inst-xfree86.php?phpLang=pt#switching-x11">instruções para substituir
      um pacote X11 por outro</a>. Assegure-se de remover seus pacotes
      existentes e então instalar o X11 da Apple (e o X11 SDK se necessário ou
      desejado).</p>
      
      <p>Algumas observações sobre o uso do X11 da Apple:</p>

      <ul>
        <li>
          <p>O pacote <code>autocutsel</code> não é mais necessário.
          Se você estiver iniciando o X11 com ele habilitado, você deve
          desabilitá-lo.</p>
        </li>

        <li>
          <p>O X11 da Apple usa seu arquivo <code>~/.xinitrc</code>
          caso exista. Se você quiser integração completa com o Quartz, você
          deve usar <code>/usr/X11R6/bin/quartz-wm</code> como seu
          gerenciador de janelas ou remover completamente seu
          <code>~/.xinitrc</code>.</p>

          <p>Se você deseja apenas integração do copiar-e-colar mas quer usar
          um gerenciador de janelas diferente, você pode fazê-lo como no
          seguinte exemplo:</p>

          <pre>/usr/X11R6/bin/quartz-wm --only-proxy &amp;
exec /sw/bin/fvwm2</pre>

          <p>Você pode obviamente chamar outro gerenciador de janela,
          <code>startkde</code> etc.</p>
        </li>

        <li>
          <p>O <code>quartz-wm</code> não suporta completamente dicas
          de gerenciador de janela geradas pelo GNOME ou KDE, então é possível
          que você perceba um comportamento estranho em janelas que não
          deveriam ter decorações mas têm.</p>
        </li>

        <li>
          <p>O X11 da Apple por padrão não considera as configurações de
          ambientes do Fink. Para chamar aplicativos que sejam carregados no
          início do X e que você haja instalado pelo fink (por exemplo,
          gerenciadores de janelas, gnome-session, outros aplicativos em
          <code>/sw/bin</code>), coloque a seguinte linha próxima ao
          início de <code>~/.xinitrc</code> (isto é, depois da linha
          "<code>#!/bin/sh</code>" mas antes que você execute quaisquer
          programas):</p>

          <pre>. /sw/bin/init.sh </pre>

          <p>tal que o ambiente do Fink seja inicializado. Observação
          <code>init.sh</code> é usado no lugar de
          <code>init.csh</code> porque <code>.xinitrc</code> é
          executado por <code>sh</code> e não por
          <code>tcsh</code>.</p>
        </li>

        <li>
          <p>Aplicativos que requeiram chamar outros programas que residam na
          árvore do Fink por causa de algumas de suas funções necessitam de
          tratamento especial para fazê-los funcionar quando chamados pelo menu
          Application. No lugar de apenas colocar o caminho completo do
          arquivo, por exemplo</p>

          <pre>/sw/bin/emacs</pre>

          <p>você deverá usar algo como o seguinte caso bash seja seu shell
          padrão:</p>

          <pre>. /sw/bin/init.sh ; emacs</pre>

          <p>e se você estiver usando tcsh:</p>

          <pre>source /sw/bin/init.csh ; emacs</pre>

          <p>Isto faz com que o aplicativo tenha a informação de PATH correta.
          Você pode usar essa sintaxe para qualquer aplicativo instalado via
          Fink.</p>
        </li>

        <li>
          <p>Se você estiver tentando compilar na mão um pacote e veja uma
          falha como:</p>

          <pre>ld: err.o illegal reference to symbol: _XSetIOErrorHandler 
defined in indirectly referenced dynamic library 
/usr/X11R6/lib/libX11.6.dylib</pre>

          <p>então você precisa garantir que <code>-lX11</code> esteja presente
          durante a linkedição. Verifique as opções de configuração do seu
          pacote para ver como colocar este argumento extra.</p>
        </li>

        <li>
          <p>Se você usa o pacote <code>xfree86</code> e mais tarde trocar para
          o X11 da Apple (tanto na 10.2.x quanto na 10.3.x), quais pacotes
          compilados com o <code>xfree86</code> terão que ser recompilados já
          que os binários não são compatíveis.</p>
        </li>

        <li>
          <p><b>Somente para usuários 10.3 e 10.4;</b> é possível usar o
          servidor de exibição e o gerenciador de janelas da Apple em cima do
          XFree86 ou X.org. Se você instalar o pacote
          <code>applex11tools</code>, o Fink instalará o que você precisa desde
          que você tenha uma cópia de <code>X11User.pkg</code>.</p>
        </li>
      </ul>

      <p>Para mais informações sobre o uso do X11 da Apple, verifique este
      <a href="http://developer.apple.com/darwin/runningx11.html">artigo</a> no
      Apple Developer Connection.</p>
    

    <h2><a name="official-binary">3.3 Os binários oficiais</a></h2>
      

      <p>O projeto XFree86 tem uma distribuição oficial de binários do XFree86
      4.5.0. Você pode encontrá-lo em seu <a href="http://www.xfree86.org/mirrors">espelho local do XFree86</a> no
      diretório <code>4.5.0/binaries/Darwin-ppc-6.x</code>. Assegure-se de
      baixar os tarballs <code>Xprog.tgz</code> e
      <code>Xquartz.tgz</code> mesmo que estejam marcados como
      opcionais ("optional"). Se você não estiver certo de o que precisa, baixe
      todo o diretório. Execute o script <code>Xinstall.sh</code> como
      root e proceda à instalação. (Você talvez queira ler as <a href="http://www.xfree86.org/4.5.0/Install.html">instruções
      oficiais</a> antes de instalar.)</p>

      <p>Você terá agora no Mac OS X o XFree86 com um servidor que pode entrar
      em tela cheia ou sem raiz.</p>
    

    <h2><a name="official-source">3.4 O código fonte oficial</a></h2>
      

      <p>Se estiver com tempo livre, você pode compilar o XFree86 4.5 a partir
      do código fonte. Você pode encontrar o código fonte no seu <a href="http://www.xfree86.org/mirrors/">espelho local do XFree86</a> no
      diretório <code>4.5.0/source</code>. Baixe todos os sete tarballs
      <code>XFree86-4.5.0-src-#.tgz</code> e extraia-os no mesmo
      diretório. Você pode customizar a compilação colocando definições de
      macros no arquivo <code>config/cf/hosts.def</code> localizado na
      árvore do XFree86. Veja <code>config/cf/darwin.cf</code> para
      algumas dicas. (Observação: somente as macros que tiverem uma verificação
      #ifndef ao seu redor podem ser sobrescritas no host.def.)</p>

      <p>Quando estiver satisfeito com sua configuração, compile e instale o
      XFree86 através dos seguintes comandos:</p>

      <pre>make World
sudo make install install.man</pre>

      <p>Assim como no caso dos binários oficiais, você terá então um XFree86
      rodando no Mac OS X com o servidor que pode entrar em tela cheia ou sem
      raiz.</p>
    

    <h2><a name="latest-cvs">3.5 O código fonte mais recente</a></h2>
      

      <p>Se você tiver não apenas tempo mas também paciência, você pode obter a
      última versão de desenvolvimento do XFree86 através do repositório CVS
      público. Note que o código está sob constante desenvolvimento; o que você
      baixar hoje geralmente não é o mesmo que você baixou ontem.</p>

      <p>Para instalar, siga as instruções do <a href="http://www.xfree86.org/cvs/">CVS do XFree86</a> para baixar o
      módulo <code>xc</code>. Em seguida, siga as instruções acima para
      compilar o código fonte.</p>

    
    

    <h2><a name="switching-x11">3.6 Substituindo o X11</a></h2>
      

      <p>Caso você já tenha instalado um dos pacotes X11 do Fink mas por alguma
      razão tenha decidido remover um e substituí-lo por outro, o procedimento
      é bastante direto. Você precisa forçar a remoção dos pacotes antigos e
      então instalar os novos para que seu banco de dados dpkg fique
      consistente.</p>

      <p>Há duas formas diferentes de fazê-lo:</p>

      <ol>
        <li>
          <p>Use o FinkCommander</p>

          <p>Caso esteja usando o <a href="http://finkcommander.sourceforge.net/">FinkCommander</a>,
          você pode forçar a remoção através do menu. Por exemplo, se você
          tiver o <code>xfree86-rootless</code> instalado mas queira a
          versão com threads, você pode selecionar os pacotes
          <code>xfree86-rootless</code>,
          <code>xfree86-rootless-shlibs</code>,
          <code>xfree86-base</code> e
          <code>xfree86-base-shlibs</code> e então executar:</p>

          <pre>Source -&gt; Force Remove</pre>
        </li>

        <li>
          <p>Remova manualmente usando a linha de comando</p>

          <p>Para removê-los manualmente, use o <code>dpkg</code> com a
          opção --force-depends:</p>

          <pre>sudo dpkg -r --force-depends xfree86-rootless \
xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>

          <p>Note que, caso você tenha aplicativos que requeiram o XFree86 com
          threads, você pode ter problemas com seu banco de dados dpkg caso
          você o remova forçadamente e instale um pacote XFree86 diferente ou
          um pacote sinalizador.</p>
        </li>
      </ol>

      <p>Se por outro lado você tiver uma versão do X11 que não foi instalada
      via Fink, você precisará removê-la via linha de comando:</p>

      <pre>sudo rm -rf /usr/X11R6 /etc/X11</pre>

      <p>Isto se aplica para qualquer variante do X11 que você não tenha
      instalado através do Fink. Você também precisará remover
      <code>XDarwin.app</code> | <code>X11.app</code> dependendo de
      qual você houver instalado. Assegure-se de verificar seu
      <code>.xinitrc</code> caso esteja removendo o X11 da Apple para
      garantir que você não tente executar o <code>quartz-wm</code>.
      Você poderá então instalar qualquer X11 que queira, manualmente ou pelo
      Fink.</p>
    

    <h2><a name="fink-summary">3.7 Sumário dos pacotes do Fink</a></h2>
      

      <p>Um rápido sumário das opções de instalação e pacotes do Fink que você
      deveria instalar:</p>

      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Tipo de instalação</th><th align="left">Pacotes do Fink</th></tr><tr valign="top"><td>XFree86-4.4.0 ou 4.5.0 (10.3 e 10.4)</td><td>
            <p><code>xfree86</code> e <code>xfree86-shlibs</code></p>
          </td></tr><tr valign="top"><td>X.org-6.8.2 (10.3 e 10.4)</td><td>
	    <p><code>xorg</code> e <code>xorg-shlibs</code></p>
	</td></tr><tr valign="top"><td>X11 da Apple (todas as versões)</td><td>
            <p><code>system-xfree86</code> e <code>system-xfree86-shlibs</code>
            (+<code>system-xfree86-dev</code> para compilar pacotes baseados no
            X11)</p>
          </td></tr><tr valign="top"><td>Binários oficiais do XFree86-4.x</td><td>
            <p><code>system-xfree86</code> e <code>system-xfree86-shlibs</code>
            (+<code>system-xfree86-dev</code> para compilar pacotes baseados no
            X11)</p>  
          </td></tr><tr valign="top"><td>XFree86-4.x compilado a partir do fonte ou último fonte do
          CVS</td><td>
            <p><code>system-xfree86</code> e <code>system-xfree86-shlibs</code>
            (+<code>system-xfree86-dev</code> para compilar pacotes baseados no
            X11)</p>
          </td></tr></table>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=pt">4. Iniciando o X11</a></p>
<?php include_once "../../footer.inc"; ?>


