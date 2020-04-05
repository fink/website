<?php
$title = "Perguntas frequentes - Uso (2)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/04/05 5:48:20';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="prev" href="usage-general.php?phpLang=pt" title="Problemas no uso de pacotes - Geral">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 9. Problemas no uso de pacotes - Pacotes específicos</h1>
    
    
    
    <a name="xmms-quiet">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.1: Não consigo som no XMMS.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Assegure-se de ter selecionado o "eSound Output Plugin" nas
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
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.2: Se estou editando um arquivo no nedit, quando abro outro arquivo a
        janela abre mas não responde.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Este é um problema conhecido que ocorre com versões recentes do
        <code>nedit</code> e <code>lesstif</code> em todas as
        plataformas. A solução é abrir uma nova janela com File--&gt;New e
        então abrir o próximo arquivo em que você queira trabalhar.</p><p>Este problema foi corrigido no <code>nedit-5.3-6</code>, o
        qual depende de <code>openmotif3</code> no lugar de
        <code>lesstif</code>.</p></div>
    </a>
    <a name="xdarwin-start">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.3: Preciso de ajuda! Quando inicio o XDarwin, ele termina
        imediatamente!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Não entre em pânico. O documento Executando o X11 tem uma vasta
        <a href="/doc/x11/trouble.php#immediate-quit">seção
        de resolução de problemas</a> para este problema comum.</p></div>
    </a>
    <a name="no-server">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.4: Quando tento iniciar o XDarwin eu recebo a mensagem "xinit: No such
        file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Em primeiro lugar, assegure-se de estar carregando o init.sh no seu
        arquivo de inicialização do X <code>~/.xinitrc</code>.</p><p>No Jaguar, às vezes todos os pacotes <code>xfree86</code> são
        compilados mas apenas <code>xfree86-base</code> e
        <code>xfree86-base-shlibs</code> são instalados. Verifique se você tem
        os pacotes <code>xfree86-rootless</code> e
        <code>xfree86-rootless-shlibs</code> instalados. Em caso negativo,
        execute o comando <code>fink install xfree86-rootless</code>.</p><p>Caso os pacotes estejam instalados, tente <code>fink rebuild
        xfree86-rootless</code>. Se isto não funcionar, verifique se você tem
        <code>/usr/bin/X11R6</code> no seu PATH.</p></div>
    </a>
    <a name="apple-x-delete">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.5: Quero que a tecla Delete no X11.app da Apple comporte-se como no
        XDarwin.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Alguns usuários relataram que o comportamento da tecla
        <code>delete</code> é diferente entre o XDarwin e o X11 da Apple. Isto
        pode ser corrigido através da edição dos arquivos de inicialização do X
        apropriados:</p><p><b>.Xmodmap:</b></p><pre>keycode 59 = Delete</pre><p><b>.Xresources:</b></p><pre>xterm*.deleteIsDEL: true 
xterm*.backarrowKey: false
xterm*.ttyModes: erase ^?</pre><p><b>.xinitrc</b></p><pre>xrdb -load $HOME/.Xresources 
xmodmap $HOME/.Xmodmap</pre></div>
    </a>
    <a name="apple-x11-wants-xfree86">
      
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.6: Estou tendo problemas com X11 e Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Há duas possibilidades a considerar.</p><ul>
          <li>
            <b>Você está instalando a partir de binários:</b>
            <p>Geralmente, o que você precisa fazer é reinstalar o pacote
            X11User, já que o instalador às vezes não instala algum arquivo.
            Você pode ter que precisar fazer isto múltiplas vezes. O
            comando</p>
	    <pre>fink list -i system-xfree86</pre>
            <p>deve mostrar que os pacotes <code>system-xfree86</code> e
            <code>system-xfree86-shlibs</code> estão instalados, e</p>
            <pre>fink list x11</pre>
            <p>deve indicar que os pacotes virtuais <code>x11-shlibs</code> e
            <code>x11</code> estão presentes.</p>
            <p>Se a reinstalação do pacote X11User não funcionar, consulte as
            instruções para <a href="#special-x11-debug">depuração</a>
            abaixo.</p>
          </li>
          <li>
            <b>Você está instalando a partir de códigos fontes:</b>
            <p>De forma geral, este erro significa que você precisa
            (re)instalar o X11SDK, o qual é <b>obrigatório</b> se você deseja
            compilar pacotes a partir do código fonte. Ele está presente na
            pasta Xcode Tools do DVD do Tiger, ou (Optional Installs/)Xcode
            Tools/Packages no(s) seu(s) DVD(s) de instalação do Leopard. Se
            você executar o comando</p>
            <pre>fink list -i system-xfree86  </pre>
            <p>ele deve mostar que os pacotes <code>system-xfree86</code>,
            <code>system-xfree86-shlibs</code> e
            <code>system-xfree86-dev</code> estão instalados. Se o pacote
            <code>-dev</code> estiver faltando, reinstale o X11SDK já que por
            vezes o instalador da Apple não instala alguns arquivos. Talvez
            você tenha que fazer isto repetidas vezes. Se algum dos outros dois
            pacotes estiver faltando, reinstale o pacote X11User (mesmo
            motivo). O comando</p>
            <pre>fink list x11</pre>
            <p>deve então mostrar que os pacogtes virtuais
            <code>x11-dev</code>, <code>x11-shlibs</code> e <code>x11</code>
            estejam presentes.</p>
            <p>Se a reinstalação dos pacotes X11SDK ou X11User não funcionar,
            consulte as instruções para <a href="#special-x11-debug">depuração</a> abaixo.</p>
          </li>
        </ul></div>
    </a>
    <a name="special-x11-debug">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.7: Ainda estou tendo problemas com o X11 e o Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Se as dicas em <a href="#apple-x11-wants-xfree86">O Fink tenta
        instalar Xfree86 ou X.org</a> não
        ajudarem ou não são aplicáveis à sua situação, você pode ter que limpar
        sua instalação do X11 e remover quaisquer sinalizadores ou pacotes
        relacionados a X11 que tenham sido parcial ou completamente
        instalados:</p><p>No Leopard, use</p><pre>sudo pkgutil --forget com.apple.pkg.X11User
sudo pkgutil --forget com.apple.pkg.X11SDKLeo</pre><p>Em seguida, tanto no OS X 10.4 quanto no 10.5, execute</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42    system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg \
/Library/Receipts/X11Update*.pkg
fink selfupdate; fink index</pre><p>(a primeira linha pode lhe apresentar aviso sobre tentar remover
        pacotes que não existem). Reinstale o X11 da Apple (e o X11SDK caso
        necessário) ou, caso esteja usando o OS X 10.4, uma implementação do
        X11 alternativa, como XFree86 ou X.org.</p><p>Se ainda estiver tendo problemas então você executar</p><pre>fink-virtual-pkgs --debug</pre><p>para obter informações sobre o que está faltando.</p><p>Se estiver executando uma versão mais antiga do <code>fink</code>,
        há um script em Perl (cortesia de Martin Costabel) que você pode baixar
        e executar para obter as mesmas informações.</p><ul>
          <li>Obtenha-o aqui: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a></li>
          <li>Salve-o no lugar que melhor lhe aprouver.</li>
          <li>Execute-o em uma janela de terminal através do comando
          <pre>perl fink-x11-debug</pre></li>
        </ul></div>
    </a>
    <a name="tiger-gtk">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.8: Sempre que uso um aplicativo GTK, recebo mensagens de erro em
        relação a <code>_EVP_idea_cbc</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Isto é causado por um possível bug no linkeditor dinâmico do Tiger
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
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.9: Não consigo fazer funcionar a ajuda de nenhum aplicativo GNOME.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Você precisa instalar o pacote <code>yelp</code>. Este pacote não
        foi colocado junto com o restante do GNOME porque usa criptografia e
        foi decidido não colocar todo o GNOME na árvore crypto só por causa do
        sistema de ajuda.</p></div>
    </a>
  
<?php include_once "../footer.inc"; ?>


