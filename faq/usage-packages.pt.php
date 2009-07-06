<?
$title = "Perguntas frequentes - Uso (2)";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/03/15 02:15:23';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="prev" href="usage-general.php?phpLang=pt" title="Problemas no uso de pacotes - Geral">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 9. Problemas no uso de pacotes - Pacotes específicos</h1>
    
    
    
    <a name="xmms-quiet">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.1: Não consigo som no XMMS.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Assegure-se de ter selecionado o "eSound Output Plugin" nas
        preferências do XMMS. Por algum motivo estranho, ele seleciona o disk
        writer plugin como padrão.</p><p>Se ainda assim você não conseguir som ou o XMMS reclamar que não
        encontra sua placa de som, tente o seguinte:</p><ul>
          <li>Assegure-se de não haver baixado completamente o volume no Mac OS
          X.</li>
          <li>Execute <code>esdcat /usr/libexec/config.guess</code> (ou
          qualquer outro arquivo com um tamanho decente). Se você ouvir um
          barulho curto, o eSound funciona e o XMMS também deveria funcionar se
          estiver configurado corretamente. Se você não ouvir nada, o esd não
          está funcionando por algum motivo. Você pode tentar iniciá-lo
          manualmente com <code>esd &amp;</code> e verificar as mensagens.</li>
          <li>Se ainda não funcionar, verifique as permissões em
          <code>/tmp/.esd</code> e <code>/tmp/.esd/socket</code>, que deveriam
          ter sua conta normal de usuário como sendo o proprietário. Se elas
          não forem de sua posse, interrompa o esd se ele estiver rodando,
          remova o diretório como root (<code>sudo rm -rf /tmp/.esd</code>) e
          inicie novamente o esd (como um usuário normal, não como root).</li>
        </ul><p>Note que o esd é projeto para ser executado por um usuário normal e
        não pelo root. Ele normalmente se comunica através do socket via
        arquivo de sistema <code>/tmp/.esd/socket</code>. Você só precisa das
        opções <code>-tcp</code> e <code>-port</code> caso queira rodar
        clientes esd em uma outra máquina através da rede.</p><p>Já houve relatos de o XMMS fechar ou travar no OS 10.1. Ainda não
        temos uma análise ou correção.</p></div>
    </a>
    <a name="nedit-window-locks">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.2: Se estou editando um arquivo no nedit, quando abro outro arquivo a
        janela abre mas não responde.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Este é um problema conhecido que ocorre com versões recentes do
        <code>nedit</code> e <code>lesstif</code> em todas as
        plataformas. A solução é abrir uma nova janela com File--&gt;New e
        então abrir o próximo arquivo em que você queira trabalhar.</p><p>Este problema foi corrigido no <code>nedit-5.3-6</code>, o
        qual depende de <code>openmotif3</code> no lugar de
        <code>lesstif</code>.</p></div>
    </a>
    <a name="xdarwin-start">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.3: Preciso de ajuda! Quando inicio o XDarwin, ele termina
        imediatamente!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Não entre em pânico. O documento Executando o X11 tem uma vasta
        <a href="http://www.finkproject.org/doc/x11/trouble.php#immediate-quit">seção
        de resolução de problemas</a> para este problema comum.</p></div>
    </a>
    <a name="no-server">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.4: Quando tento iniciar o XDarwin eu recebo a mensagem "xinit: No such
        file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Em primeiro lugar, assegure-se de estar carregando o init.sh no seu
        arquivo de inicialização do X <code>~/.xinitrc</code>.</p><p>No Jaguar, às vezes todos os pacotes <code>xfree86</code> são
        compilados mas apenas <code>xfree86-base</code> e
        <code>xfree86-base-shlibs</code> são instalados. Verifique se você tem
        os pacotes <code>xfree86-rootless</code> e
        <code>xfree86-rootless-shlibs</code> instalados. Em caso negativo,
        execute o comando <code>fink install xfree86-rootless</code>.</p><p>Caso os pacotes estejam instalados, tente <code>fink rebuild
        xfree86-rootless</code>. Se isto não funcionar, verifique se você tem
        <code>/usr/bin/X11R6</code> no seu PATH.</p></div>
    </a>
    
    <a name="libXmuu">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.5: Quanto tento iniciar o XFree86, eu recebo uma das seguintes
        mensagens de erro: "dyld: xinit can't open library:
        /usr/X11R6/lib/libXmuu.1.dylib" or "dyld: xinit can't open library:
        /usr/X11R6/lib/libXext.6.dylib"</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Está faltando um arquivo que deveria ter sido instalado por
        <code>xfree86-base-(threaded)-shlibs</code>. Você precisa reinstalá-lo
        através do comando <code>fink reinstall xfree86-base-shlibs</code>
        (<code>fink reinstall xfree86-base-threaded-shlibs</code> caso esteja
        usando os pacotes do XFree86 com threads) para código fonte ou
        <code>sudo apt-get install --reinstall xfree86-base-shlibs</code> para
        binários.</p></div>
    </a>
    <a name="apple-x-bugs">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.6: Eu tinha o XFree86 do Fink instalado, troquei-o pelo X11 da Apple e
        agora nada está funcionando!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Em primeiro lugar, se você tinha antes as versões dos pacotes
        XFree86 do Fink com threads, você vai precisar recompilar o aplicativo
        que não está funcionando. Alguns programas verificam a disponibilidade
        de threads na hora de compilá-los e, a partir desse momento, creem que
        as threads lhes estão disponíveis.</p><p>Em segundo lugar, talvez você tenha encontrado um erro no X11 da
        Apple. No momento em que este documento foi escrito, vários erros são
        de conhecimento do time da Apple e eles estão trabalhando nisso.</p><p>Caso tenha perguntas gerais em relação ao X11 da Apple que não
        estejam diretamente relacionadas ao Fink, dê uma olhada na <a href="http://www.lists.apple.com/x11-users">lista de discussão oficial
        da Apple sobre o X11</a>. Eles também recomendaram que erros no X11
        sejam <a href="http://developer.apple.com/bugreporter">submetidos à
        Apple</a>.</p></div>
    </a>
    <a name="apple-x-delete">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.7: Quero que a tecla Delete no X11.app da Apple comporte-se como no
        XDarwin.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Alguns usuários relataram que o comportamento da tecla
        <code>delete</code> é diferente entre o XDarwin e o X11 da Apple. Isto
        pode ser corrigido através da edição dos arquivos de inicialização do X
        apropriados:</p><p><b>.Xmodmap:</b></p><pre>keycode 59 = Delete</pre><p><b>.Xresources:</b></p><pre>xterm*.deleteIsDEL: true 
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?</pre><p><b>.xinitrc</b></p><pre>xrdb -load $HOME/.Xresources 
xmodmap $HOME/.Xmodmap</pre></div>
    </a>
    <a name="gnome-two">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.8: Eu atualizei do GNOME 1.x para o GNOME 2.x e agora o
        <code>gnome-session</code> não abre um gerenciador de janelas.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Enquanto que no GNOME 1.x o <code>gnome-session</code> invoca o
        gerenciador de janelas <code>sawfish</code> automaticamente, no GNOME
        2.x você precisa chamar um gerenciador de janelas no
        <code>~/.xinitrc</code> antes de executar o <code>gnome-session</code>.
        Por exemplo,</p><pre>... 
exec metacity &amp; exec gnome-session</pre><p>Observação: isto não é mais verdade no <b>GNOME 2.4</b>. Ao
        executar o <code>gnome-session</code>, um gerenciador de
        janelas é invocado.</p></div>
    </a>
    <a name="apple-x11-no-windowbar">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.9: Eu atualizei o X11 da Apple no Panther e agora as barras de títulos
        das janelas não aparecem mais.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Você não atualizou o X11 para a versão "X11 1.0 - XFree86 4.3.0"
        incluída no Panther. Você pode instalar o X11 a partir do pacote
        X11.pkg no Disco 3.</p></div>
    </a>
    <a name="apple-x11-wants-xfree86">
      
      <div class="question"><p><b><? echo FINK_Q ; ?>9.10: Eu instalei o X11 da Apple mas o Fink continua solicitando a
        instalação de XFree86 ou X.org.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Há duas possibilidades a considerar.</p><ul>
          <li>
            <b>Você está instalando a partir de binários:</b>
            <p>Se você tem uma versão atual do <code>fink</code>
            (&gt;=0.18.3-1), normalmente o que você precisa fazer é reinstalar
            o pacote X11User, já que o instalador às vezes não instala algum
            arquivo. Você pode ter que precisar fazer isto múltiplas vezes. O
            comando</p>
	    <pre>fink list -i system-xfree86</pre>
            <p>deveria mostrar que os pacotes <code>system-xfree86</code> e
            <code>system-xfree86-shlibs</code> estão instalados. Se reinstalar
            o pacote X11User não funcionar, consulte as instruções para <a href="#special-x11-debug">depuração</a> abaixo.</p>
            <p>Se você estiver rodando uma versão anterior do pacote
            <code>fink</code>, então atualizar o <code>fink</code> pode
            resolver seu problema de imediato, por exemplo via</p>
            <pre>sudo apt-get update
sudo apt-get install fink</pre>
          </li>
          <li>
            <b>Você está instalando a partir de códigos fontes:</b>
            <p>Se você tem uma versão atual do <code>fink</code>, então esse
            erro normalmente significa que você precisa (re)instalar o X11SDK,
            o que é <b>obrigatório</b> se você quiser compilar pacotes a
            partir do código fonte. Ele está no diretório Xcode Tools no DVD de
            instalação do Mac OS X. Mesmo que esse pacote seja instalado por
            padrão quando você escolhe instalar o Xcode, é possível que ele não
            chegue a instalar algum arquivo.</p>
            <p>Se o seu computador não veio com o DVD de instalação, é provável
            que o pacote <code>X11SDK.pkg</code> esteja em algum lugar
            do disco rígido--procure por um diretório
            <code>/Applications/Installers</code> que tenha uma imagem
            de disco do Xcode. O arquivo <code>X11User.pkg</code>
            contendo o pacote pode estar localizado nesse diretório também.</p>
            <p>Caso ainda esteja tendo problemas, execute o comando</p>
            <pre>fink list -i system-xfree86  </pre>
            <p>Ele deve mostar que os pacotes <code>system-xfree86</code>,
            <code>system-xfree86-shlibs</code> e
            <code>system-xfree86-dev</code> estão instalados. Se o pacote
            <code>-dev</code> estiver faltando, reinstale o X11SDK já que por
            vezes o instalador da Apple não instala algum arquivo. Talvez você
            tenha que fazer isto repetidas vezes. Se algum dos outros dois
            pacotes estiver faltando, reinstale o pacote X11USER (mesma
            razão).</p>
          </li>
        </ul></div>
    </a>
    <a name="special-x11-debug">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.11: Ainda estou tendo problemas com o X11 e o Fink.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Se as dicas em <a href="#apple-x11-wants-xfree86">O Fink tenta
        instalar Xfree86 ou X.org</a> ou <a href="#wants-xfree86-on-upgrade">X11 e atualização do 10.2</a> não
        ajudarem ou não são aplicáveis à sua situação, você pode ter que limpar
        sua instalação do X11 e remover quaisquer sinalizadores ou pacotes
        relacionados a X11 que tenham sido parcial ou completamente
        instalados:</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42    system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg \
/Library/Receipts/X11Update*.pkg
fink selfupdate; fink index</pre><p>(a primeira linha pode lhe apresentar aviso sobre tentar remover
        pacotes que não existem). Reinstale o X11 da Apple (e o X11SDK caso
        necessário) ou uma implementação do X11 alternativa, como XFree86 ou
        X.org.</p><p>Se ainda estiver tendo problemas e estiver rodando o
        <code>fink-0.19.0</code> ou mais recente então você executar</p><pre>fink-virtual-pkgs --debug</pre><p>para obter informações sobre o que está faltando.</p><p>Se estiver executando uma versão anterior do <code>fink</code>,
        então há um script em Perl (cortesia de Martin Costabel) que você pode
        baixar e executar para obter as mesmas informações.</p><ul>
          <li>Obtenha aqui: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a></li>
          <li>Salve-o no lugar que melhor lhe aprouver.</li>
          <li>Execute-o em uma janela de terminal através do comando
          <pre>perl fink-x11-debug</pre></li>
        </ul></div>
    </a>
    <a name="tiger-gtk">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.12: Sempre que uso um aplicativo GTK, recebo mensagens de erro em
        relação a <code>_EVP_idea_cbc</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Isto é causado por um possível bug no linkeditor dinâmico do Tiger
        (na versão 10.4.1) mas parece ter sido corrigido na 10.4.3 e o Fink tem
        uma solução no pacote <code>base-files-1.9.7-1</code> ou mais
        recentes.</p><p>Caso você ainda não tenha atualizado o Tiger e/ou o
        <code>base-files</code>, você pode contornar este problema usando um
        prefixo no nome do software que você deseja rodar:</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>Por exemplo, se você quer usar o <code>gnucash</code>, você o
        executaria através do seguinte comando:</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>Este método funciona para aplicações que são iniciadas a partir do
        menu Application (Aplicativos) do X11 da Apple e também a partir do
        terminal.</p><p>Talvez você queira fazer essa definição de forma global (por
        exemplo, no seu script de inicialização e/ou em seu
        <code>.xinitrc</code>, e é possível que você tenha que fazer isso para
        rodar o GNOME). Coloque</p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>em seu arquivo <code>.xinitrc</code> (independentemente de seu shell
        de login) ou seu <code>.profile</code> (ou outro script de
        inicialização) para usuários <b>bash</b>, e:</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>é o comando correspondente para ser usado em, por exemplo, seu
        arquivo <code>.cshrc</code> para usuários do <b>tcsh</b>.</p><p>Observação: isto é feito automaticamente caso você instale uma
        versão suficientemente recente do pacote <code>base-files</code>.</p></div>
    </a>
    <a name="yelp">
      <div class="question"><p><b><? echo FINK_Q ; ?>9.13: Não consigo fazer funcionar a ajuda de nenhum aplicativo GNOME.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Você precisa instalar o pacote <code>yelp</code>. Este pacote não
        foi colocado junto com o restante do GNOME porque usa criptografia e
        foi decidido não colocar todo o GNOME na árvore crypto só por causa do
        sistema de ajuda.</p></div>
    </a>
  
<? include_once "../footer.inc"; ?>


