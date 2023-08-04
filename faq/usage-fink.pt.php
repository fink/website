<?php
$title = "Perguntas frequentes - Uso do Fink";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 04:42:29';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="comp-general.php?phpLang=pt" title="Problemas de Compilação - Geral"><link rel="prev" href="upgrade-fink.php?phpLang=pt" title="Atualizando o Fink (resolução de problemas específicos a uma
    versão)">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 5. Instalação, uso e manutenção do Fink</h1>
    
    
    <a name="what-packages">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.1: Como posso saber quais os pacotes que o Fink suporta?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> O comando <code>list</code> lista todos os pacotes conhecidos pela
        sua instalação do Fink:</p><pre>fink list</pre><p>Se você está usando uma distribuição de binários, o
        <code>dselect</code> apresenta uma listagem navegável de todos os
        pacotes disponíveis.  Note que você precisa executar o dselect como root
        para selecionar e instalar pacotes.</p><p>Você também pode consultar oe <a href="http://pdb.finkproject.org/pdb/">banco de dados de pacotes</a>
        disponível no site.</p></div>
    </a>
    <a name="proxy">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.2: Estou atrás de um firewall. Como configuro o Fink para usar um proxy
        HTTP?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> O comando <code>fink</code> suporta configurações explícitas de
        proxy que são repassadas para o <code>wget</code> ou o
        <code>curl</code>. Caso você não tenha configurado os proxies na
        instalação inicial, você pode executar o comando <code>fink
        configure</code> para configurá-los. Você também pode executar esse
        comando a qualquer momento para reconfigurar o comando
        <code>fink</code>. Se você seguiu as instruções do guia de instalação e
        usa os arquivos <code>/opt/sw/bin/init.sh</code> ou
        <code>/opt/sw/bin/init.csh</code>, então tanto o
        <code>apt-get</code> quanto o <code>dselect</code> usam essas
        configurações de proxy. Tenha certeza de colocar o protocolo na frente
        do proxy, como por exemplo</p><pre>ftp://proxy.seusite.com</pre><p>Caso você ainda esteja tendo problemas, vá às Preferências de
        Sistema, escolha o painel Rede, selecione a aba Proxies e tenha certeza
        de marcar a caixa "Use Modo Passivo do FTP (PASV)".</p></div>
    </a>
    <a name="firewalled-cvs">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.3: Como faço para atualizar os pacotes disponíveis via CVS se eu
        estiver atrás de um firewall?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> O pacote <b>cvs-proxy</b> pode ser usado para criar um túnel
        através de proxies HTTP.</p><ul>
          <li>
            <p>Instale o pacote <b>cvs-proxy</b> através do comando:</p>
            <p>
              <code>fink --use-binary-dist install <b>cvs-proxy</b>
              </code>
            </p>
          </li>
          <li>
	    <p>Mude para o método de atualização via CVS através do comando:</p>
             <p>
              <code>fink selfupdate-cvs</code>
            </p>
          </li>
        </ul><p>Caso o fink não tenha sido configurado para usar seu proxy, mude as
        configurações através do comando:</p><p><code>fink configure</code>.</p></div>
    </a>
    <a name="moving">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.4: Posso mover o Fink para outro diretório após a instalação?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Não. É claro que você pode mover os arquivos usando o mv ou o Finder
        mas 99% dos programas não irão mais funcionar caso o faça. Isto é
        devido ao fato de software Unix depende de diretórios fixos para
        encontrar arquivos de dados, bibliotecas e outros.</p></div>
    </a>
    <a name="moving-symlink">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.5: Se eu mover o Fink após instalá-lo e criar um link simbólico do
        diretório antigo, isso vai funcionar?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Talvez. De forma geral deveria funcionar, mas pode ser que haja
        alguns problemas.</p></div>
    </a>
    <a name="removing">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.6: Como faço para desinstalar o Fink completamente?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Quase todos os arquivos instalados pelo Fink estão no diretório /opt/sw
        (ou onde quer que você tenha escolhido instalá-lo). Portanto, para
        remover o Fink, digite o comando abaixo:</p><pre>sudo rm -rf /opt/sw</pre><p>A única exceção é o XFree86 ou o X.org. Caso você tenha instalado um
        servidor X através do Fink (isto é, se você instalou os pacotes
        <code>xfree86</code> ou <code>xorg</code> no lugar do pacote
        <code>system-xfree86</code>, você também precisará digitar o comando
        abaixo:</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>Se você não estiver planejando reinstalar o Fink você também
        precisará remover a linha <code>source /opt/sw/bin/init.sh</code> que foi
        adicionada ao seu arquivo <code>.bashrc</code> (ou a linha
        <code>source /opt/sw/bin/init.csh</code> no arquivo
        <code>.cshrc</code>) usando um editor de textos.</p></div>
    </a>
    <a name="bindist">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.7: O banco de dados de pacote no site lista o pacote xxx mas nem o
        apt-get nem o dselect sabem desse pacote. Quem está mentindo?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ambos estão corretos. O <a href="http://pdb.finkproject.org/pdb/">banco de dados de pacotes</a>
        conhece todos os pacotes incluindo os que ainda estão na seção de
        pacotes instáveis. Por outro lado, as ferramentas <code>dselect</code>
        e <code>apt-get</code> conhecem apenas os pacotes que estão disponíveis
        sob a forma de pacotes de binários. Muitos pacotes não estão
        disponíveis através destas ferramentas sob a forma de pré-compilados
        por várias razões. Um pacote precisa estar na seção de estáveis da
        última versão pontual a ser considerada e precisa passar por
        verificações adicionais de aderência às políticas e restrições de
        licenciamento e patentes.</p><p>Caso você queira instalar um pacote que não esteja disponível via
        <code>dselect</code> ou <code>apt-get</code>, você precisa compilá-lo a
        partir do código fonte usando o comando <code>fink install
        <b>nomedopacote</b></code>. Tenha certeza de que você haja instalado
        o Xcode antes: ele está disponível no DVD de instalação do Mac OS X ou
        no site <a href="http://connect.apple.com/">Apple Developer
        Connection</a> (você precisará se registrar no site; o registro é
        gratuito). Veja também a pergunta abaixo.</p></div>
    </a>
    <a name="unstable">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.8: Há um pacote na árvore unstable e eu gostaria de instalá-lo mas o
        comando fink diz 'no package found' (nenhum pacote encontrado). Como
        posso instalá-lo?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Em primeiro lugar, tenha certeza de que você compreende o que
        significa unstable. Pacotes na árvore unstable não estão na árvore
        stable por várias razões. Pode ser porque ainda haja problemas, erros
        de validação, ou então não houve respostas suficientes de pessoas
        afirmando que o pacote funciona bem. Por esta razão, o Fink por padrão
        não considera a árvore unstable.</p><p>Caso você habilite a árvore unstable, lembre-se de enviar um e-mail
        ao mantenedor do pacote caso funcione ou não. Feedback de usuários como
        você é algo que usamos para determinar se um pacote está pronto para a
        árvore stable! Para descobrir o mantenedor de um pacote, execute o
        comando <code>fink info <b>nomedopacote</b></code>.</p><p>Para o <code>fink-0.26</code> e posteriores: se você executar
        <code>fink configure</code> uma das perguntas será sobre você querer
        ativar as árvores unstable.</p><p>Para configurar o Fink para que unstable quando você tiver uma
        versão da ferramenta <code>fink</code> anterior à <b>0.26</b>, edite
        o arquivo <code>/opt/sw/etc/fink.conf</code> e adicione
        <code>unstable/main</code> e <code>unstable/crypto</code> à linha
        <code>Trees:</code>.</p><p>Caso você use o Fink Commander, então há uma Preferência para usar
        pacotes instáveis.</p><p>Nenhuma destas opções de fato baixa as descrições de pacotes da
        árvore unstable. Você precisará ativar atualização via
        <code>rsync</code> ou <code>cvs</code> para fazê-lo, sendo estas opções
        de atualização não são ativadas por padrão em uma instalação nova do
        Fink. A seguinte sequência de comandos fará a configuração em uma
        instalação nova do Fink:</p><pre>fink selfupdate</pre><p>seguido por</p><pre>fink selfupdate-rsync</pre><p>ou</p><pre>fink selfupdate-cvs</pre><p>e então</p><pre>fink index -f
fink scanpackages</pre><p><b>Observação:</b> Existem opções análogas no Fink Commander com
        exceção de <code>fink index -f</code>. Você terá que usar a linha de
        comando para tal.</p><p>Se você já estiver configurado com atualização via
        <code>rsync</code> ou <code>cvs</code>, então a seguinte sequência de
        comandos (ou as opções análogas no Fink Commander) são suficientes:</p><pre>fink selfupdate
fink index
fink scanpackages</pre><p>Se você não tiver certeza de qual método de atualização você está
        usando, execute o comando <code>fink --version</code> em uma linha de
        comando e veja se ele menciona <code>cvs</code> ou
        <code>rsync</code>.</p><p>Se você não mais quiser instalar da árvore unstable nada além de
        um(ns) pacote(s) específico(s) e sua(s) dependência(s), (e quaisquer
        pacotes base que foram atualizados) então não use o comando
        <code>update-all</code> até que você desative a árvore unstable.</p></div>
    </a>
    <a name="unstable-onepackage">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.9: Eu preciso <b>realmente</b> habilitar toda a árvore unstable só
        para instalar um pacote instável que eu queira?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Não, mas é altamente recomendável que você o faça. Misturar as
        coisas pode acarretar situações não previstas que tornam difícil
        depurar problemas quando eles surgirem.</p><p>De qualquer forma, se você quiser apenas um ou dois pacotes
        específicos e nada mais da árvore unstable, você precisa mudar para
        atualização via CVS (isto é, use <code>fink selfupdate-cvs</code>)
        porque o rsync só atualiza as árvores que estiverem ativas no seu
        arquivo <code>/opt/sw/etc/fink.conf</code>. Edite esse arquivo e
        adicione <code>local/main</code> à linha <code>Trees:</code> caso ainda
        não esteja lá. Você deverá executar o comando <code>fink
        selfupdate</code> para baixar os arquivos de descrição de pacotes.
        Copie os arquivos <code>.info</code> relevantes (e os arquivos
        <code>.patch</code> associados caso haja) do diretório
        <code>/opt/sw/fink/dists/unstable/main/finkinfo</code> (ou
        <code>/opt/sw/fink/dists/unstable/crypto/finkinfo</code>) para o
        diretório <code>/opt/sw/fink/dists/local/main/finkinfo</code>.
        Entretanto, observe que seu pacote pode depender de outros pacotes (ou
        versões particulares) dos que estejam apenas em unstable. Você também
        precisará mover seus arquivos <code>.info</code> e <code>.patch</code>.
        Depois de mover todos os arquivos, execute o comando <code>fink
        index</code> para que o registro de pacotes disponíveis do Fink seja
        atualizado. Depois de terminar, você pode voltar ao rsync (<code>fink
        selfupdate-rsync</code>) se quiser.</p></div>
    </a>
    <a name="sudo">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.10: Estou cansado de ficar digitando a minha senha no sudo o tempo todo.
        Há alguma forma de contornar isso?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Se você não for paranóico, você pode configurar o sudo para não lhe
        pedir uma senha. Para fazer isso, execute o comando <code>visudo</code>
        como root e adicione uma linha como esta:</p><pre>usuario ALL =(ALL) NOPASSWD: ALL</pre><p>Troque <code>usuario</code> pelo seu nome de usuário. Esta linha
        permitirá que você qualquer comando via sudo sem precisar digitar sua
        senha.</p></div>
    </a>
    <a name="exec-init-csh">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.11: Quando tento rodar o init.sh ou o init.csh, recebo a mensagem de
        erro "Permission denied" ("Permissão negada"). O que estou fazendo de
        errado?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> O init.sh e o init.csh não foram projetados para serem executados
        como comandos quaisquer. Estes arquivos definem variáveis de ambiente
        no shell, tais como PATH e MANPATH. Para que tenham efeito permanente
        no shell, eles precisam ser processados com o comando <code>.</code>
        para bash/zsh ou <code>source</code> para csh/tcsh, desta forma:</p><p>para bash/zsh:</p><pre>. /opt/sw/bin/init.sh</pre><p>para csh/tcsh:</p><pre>source /opt/sw/bin/init.csh</pre></div>
    </a>
    <a name="dselect-access">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.12: Preciso de ajuda! Eu usei a opção "[A]cesso" do menu do select e
        agora não consigo mais baixar pacotes!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Você provavelmente direcionou o apt para um espelho do Debian, o
        qual obviamente não possui arquivos do Fink. Você pode corrigir isso
        manualmente ou através do select. Para corrigir manualmente, edite como
        root o arquivo <code>/opt/sw/etc/apt/sources.list</code> em um editor de
        textos. Remova as linhas que mencionem debian.org e troque-as por
        estas:</p><pre>deb http://bindist.finkmirrors.net/bindist release main crypto
deb http://bindist.finkmirrors.net/bindist current main crypto</pre><p>Para corrigir através do select, rode "[A]cesso" novamente, escolha
        o método "apt" e digite o seguinte:</p><p>URL: http://bindist.finkmirrors.net/bindist - Distribution: release - Components: main crypto</p><p>Em seguida, adicione outro espelho repetindo o processo com
        "current" no lugar de "release".</p></div>
    </a>
    <a name="cvs-busy">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.13: Quando eu tento rodar <q>fink selfupdate</q> ou <q>fink
        selfupdate-cvs</q>, eu recebo a mensagem de erro "<code>Updating
        using CVS failed. Check the error messages above.</code>" ("<code>A
        atualização via CVS falhou. Verifique as mensagens de erro
        acima.</code>")</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Se a mensagem for</p><pre>Can't exec "cvs": No such file or directory at 
/opt/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>então você precisa instalar o Xcode.</p><p>Por outro lado, se a última linha for</p><pre>### execution of su failed, exit code 1</pre><p>você vai precisar olhar as linhas anteriores para ver o erro. Se
        você vir uma mensagem dizendo que sua conexão foi recusada:</p><pre>(Logging in to anonymous@fink.cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to fink.cvs.sourceforge.net:2401 failed: 
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.</pre><p>ou uma mensagem similar a:</p><pre>cvs [update aborted]: recv() from server fink.cvs.sourceforge.net: 
Connection reset by peer 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>ou</p><pre>cvs [update aborted]: End of file received from server</pre><p>ou</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>então é provável que os servidores CVS estejam sobrecarregados e
        você tenha que tentar a atualização mais tarde.</p><p>Outra possibilidade é que você tenha permissões erradas nos diretórios CVS, sendo que neste caso você receberá mensagens de erro de permissão negada "Permission denied":</p><pre>cvs update: in directory 10.2/stable/main: 
cvs update: cannot open CVS/Entries for reading: No such file or directory
cvs server: Updating 10.2/stable/main 
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo: 
No such file or directory 
### execution of su failed, exit code 1 Failed: 
Updating using CVS failed. Check the error messages above.</pre><p>Neste caso você precisa reiniciar seus diretórios cvs. Use o
        comando:</p><pre>sudo find /opt/sw/fink -type d -name 'CVS' -exec rm -rf {}\ ; fink selfupdate-cvs</pre><p>Caso você não haja recebido nenhuma das mensagens acima, então isto quase sempre significa que você modificou um arquivo na sua árvore /opt/sw/fink/dists e agora o mantenedor o mudou. Procure ainda antes na saída do selfupdate-cvs por linhas que comecem com "C", como:</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info 
... (other info and patch files) ... 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>O "C" significa que o CVS encontrou um conflito enquanto
        tentava atualizar para a versão mais recente. Para corrigir este
        problema, remova quaisquer arquivos que apareçam começando com
        "C" na saída do selfupdate-cvs, e tente novamente:</p><pre>sudo rm /opt/sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre><p>Se estiver recebendo erros que mencionem <b>cvs.sourceforge.net</b>:</p><pre>cvs [update aborted]: connect to cvs.sourceforge.net(66.35.250.207):
2401 failed: Operation timed out</pre><p>é por causa de uma reestruturação dos servidores CVS em
        sourceforge.net que ocorreu em 2006. Os arquivos do Fink estão agora em
        <b>fink.cvs.sourceforge.net</b>.</p><p>Verifique a versão da distribuição, por exemplo através do
        comando</p><pre>fink --version</pre><p>Se o resultado mostrar <code>10.4-transitional</code>, então você
        precisa atualizar para a distribuição 10.4 normal. Um <a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">script
        de atualização</a> foi criado para ajudar nesta mudança.</p></div>
    </a>
    <a name="kernel-panics">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.14: Quando uso o Fink, minha máquina trava/dá erro de kernel panic.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Em 2002, houve relatos na <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">lista
        de discussão fink-users</a> indicando problemas (incluindo kernel
        panics e travamentos durante a fase de patching) durante o uso do Fink
        para compilar pacotes na presença de software antivírus. Talvez você
        precise desligar o software antivírus antes de usar o Fink.</p></div>
    </a>
    <a name="not-found">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.15: Estou tentando instalar um pacote mas o Fink não consegue baixá-lo.
        O site de download mostra uma versão do pacote que é mais recente do
        que a versão que o Fink possui. O que devo fazer?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Os códigos fontes do pacote podem mudar de local nos sites originais
        quando novas versões são lançadas.</p><p>A primeira coisa que você deve fazer é executar o comando <code>fink
        selfupdate</code>. Pode ser que o mantenedor do pacote já haja
        corrigido isso e você conseguirá obter uma descrição atualizada do
        pacote com ou uma versão mais recente ou uma nova URL de download.</p><p>Se isto não funcionar, a maior parte dos códigos fontes está
        disponível em <a href="http://distfiles.master.finkmirrors.net/">http://distfiles.master.finkmirrors.net/</a>
        (graças a Rob Braun) e você pode executar o comando <code>fink
        configure</code> e escolher procurar os espelhos mestres de códigos
        fontes a fim de que o Fink automaticamente os use para procurar
        pacotes.</p><p>Caso isto não funcione, por favor notifique o mantenedor (disponível
        através do comando <code>fink describe <b>nomedopacote</b></code> de
        que a URL está quebrada; nem todos os mantenedores leem frequentemente
        todas as listas de discussão.</p><p>Para conseguir um código fonte que você possa usar, procure por
        outros diretórios no site remoto que contenham a mesma versão de que o
        Fink necessita (por exemplo, em um diretório "old"). Entretanto, tenha
        em mente que alguns sites remotos costumam apagar versões antigas. Se o
        site oficial não tiver a versão de que você precisa, tente fazer uma
        busca na Web--em alguns casos há sites não-oficiais que tenham a
        tarball que você quer. Se mesmo assim você não conseguir encontrar,
        envie uma mensagem à <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">lista
        de discussão fink-users</a> e pergunte se alguém não teria o código
        fonte disponível para enviar-lhe.</p><p>Uma vez que você tenha localizado a tarball com o código fonte
        apropriado, baixe-a manualmente e então mova o arquivo para o local
        onde o Fink armazena os códigos fontes (isto é, em uma instalação
        default do Fink, "<code>sudo mv <b>package-source.tar.gz</b>
        /opt/sw/src/</code>". Use então o comando '<code>fink install
        <b>packagename</b></code> normalmente.</p><p>Se você não conseguir o código fonte, então você terá que esperar
        até que o mantenedor corrija o problema. Pode ser que ele coloque um
        link para o código fonte antigo ou atualize os arquivos .info e .patch
        para que usem a versão mais nova.</p></div>
    </a>
    <a name="fink-not-found">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.16: Quando eu executo o Fink ou qualquer coisa que tenha instalado
        através do Fink, recebo o erro <q>command not found</q>
        (<q>comando não encontrado</q>).</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Se isto acontece sempre, então talvez você tenha modificado (ou
        modificado incorretamente) seus scripts de inicialização sem querer.
        Execute o script <code>/opt/sw/bin/pathsetup.sh</code> em uma
        janela de terminal. Este programa tentará detectar seu shell padrão e
        adicionar um comando para carregar o script de inicialização do Fink na
        sua configuração do shell. Você precisará abrir uma nova sessão do
        terminal para que suas configurações de ambiente sejam carregadas. Você
        também pode rodar o aplicativo <code>pathsetup.app</code> que
        vem no disco com a distribuição binária do Fink.</p><p>Por outro lado, se você tiver problemas somente no terminal do X11
        da Apple, a solução mais fácil é modificar a opção "Terminal" no menu
        Application do X11 através da opção <b>Applications-&gt;Customize
        Menu... </b>. No lugar de apenas</p><pre>xterm</pre><p>mude o campo com o comando para</p><pre>xterm -ls</pre><p><code>ls</code> significa <q>shell de login</q> e o
        resultado é que sua configuração completa de login é usada (da mesma
        forma que o Terminal do OS X).</p><p>Esses scripts <code>/opt/sw/bin/init.*</code> fazem muito mais
        do que somente adicionar <code>/opt/sw/bin</code> à variável PATH.
        Muitos pacotes não funcionarão corretamente sem essas ações
        adicionais.</p></div>
    </a>
    <a name="invisible-sw">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.17: Eu quero esconder o diretório /opt/sw no Finder para que os usuários não
        danifiquem a configuração do Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> É possível fazê-lo. Caso você tenha o Xcode instalado, você pode
        executar o seguinte comando:</p><pre>sudo /Developer/Tools/SetFile -a V /opt/sw</pre><p>Isto faz com que o diretório /opt/sw fique invisível, da mesma forma que
        os diretórios de sistema (/usr etc). Se você não tiver o Xcode, existem
        vários aplicativos de terceiros que permitem que você manipule
        atributos de arquivos--você precisa definir que /opt/sw fique
        invisível.</p></div>
    </a>
    <a name="install-info-bad">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.18: Não consigo instalar nada porque recebo a seguinte mensagem de erro:
        "install-info: unrecognized option
        `--infodir=/opt/sw/share/info'"</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Esse é um problema no seu PATH. Em uma janela de terminal, digite:</p><pre>printenv PATH</pre><p>Caso <code>/opt/sw/sbin</code> não apareça, então você precisa
        configurar seu ambiente conforme estas <a href="/doc/users-guide/install.php#setup">instruções</a>
        no Guia do usuário. Se <code>/opt/sw/sbin</code> estiver lá mas
        houver outros diretórios antes (por exemplo,
        <code>/usr/local/bin</code>), então você tem duas opções:
        reordenar seu PATH para que <code>/opt/sw/sbin</code> esteja
        próximo do começo ou, caso realmente queira que o outro diretório
        esteja antes de <code>/opt/sw/sbin</code> e o diretório anterior
        inclua algum outro diretório install-info, então você precisará
        renomear temporariamente esse subdiretório
        <code>install-info</code> quando for usar o Fink.</p></div>
    </a>
    <a name="bad-list-file">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.19: Não consigo instalar ou remover nada por causa de um problema com um
        "files list file" ("arquivo com lista de arquivos").</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Normalmente esses erros são do formato:</p><pre>files list file for package <b>packagename</b> contains empty filename
arquivo com a lista de arquivos para o pacote <b>nomedopacote</b> contém um nome de arquivo em branco</pre><p>ou</p><pre>files list file for package <b>packagename</b> is missing final newline
arquivo com a lista de arquivos para o pacote <b>nomedopacote</b> está com o indicador de fim de linha final faltando</pre><p>Isto pode ser corrigido com um pouco de trabalho. Se você tem
        disponível no seu sistema o arquivo .deb do pacote com problemas, então
        verifique a integridade dele através do comando</p><pre>dpkg --contents <b>caminho-completo-do-arquivo-deb</b>
        </pre><p>Por exemplo,</p><pre>dpkg --contents /opt/sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</pre><p>Caso você veja uma listagem com diretórios e arquivos, então seu
        .deb está ok. Se saída for algo diferente de diretórios e arquivos ou
        se você não tiver o arquivo .deb, você ainda pode proceder porque o
        erro não interefere com as compilações.</p><p>Se você andou instalando a partir da distribuição de binários ou se
        você sabe com certeza que a versão na distribuição de binárias é a
        mesma que você instalou (por exemplo, verificando o <a href="http://pdb.finkproject.org/pdb/index.php">banco de dados de
        pacotes</a>, então você pode obter um arquivo .deb através da
        execução do comando <code>sudo apt-get install --reinstall
        --download-only <b>nomedopacote</b></code>. Caso contrário você mesmo
        pode construir um através do comando <code>fink rebuild
        <b>nomedopacote</b></code>, mas isso ainda não o instalará.</p><p>A partir do momento em que você tiver um arquivo .deb válido, você
        pode reconstituir o arquivo. Em primeiro lugar, torne-se root através
        do comando <code>sudo -s</code> (digite sua senha de usuário
        administrativo caso necessário) e então use o seguinte comando:</p><pre>dpkg -c <b>full-path-to-debfile</b> | awk '{if ($6 == "./"){ print "/."; } \
else if (substr($6, length($6), 1) == "/")\
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}'\ 
&gt; /opt/sw/var/lib/dpkg/info/<b>nomedopacote</b>.list</pre><p>Por exemplo,.</p><pre>dpkg -c /opt/sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb | awk \
'{if ($6 == "./") { print "/."; } \
else if (substr($6, length($6), 1) == "/") \
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}' \ 
&gt; /opt/sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p>Isto extrai o conteúdo do arquivo .deb, remove tudo a menos de nomes
        de arquivos e escreve o resultado no arquivo .list</p></div>
    </a>
    <a name="dselect-garbage">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.20: Quando eu escolho pacotes no <code>dselect</code> aparece um
        monte de lixo. Como faço para usá-lo?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Há alguns problemas entre o <code>dselect</code> e o
        <code>Terminal.app</code>. Uma solução é digitar o seguinte
        comando:</p><p>usuários bash:</p><pre>export TERM=xterm-color</pre><p>usuários tcsh:</p><pre>setenv TERM xterm-color</pre><p>antes de executar o <code>dselect</code> Talvez você queira
        colocar essa linha no seu arquivo de inicialização (por exemplo,
        <code>.profile</code> ou <code>.cshrc</code>) para que seja executada
        sempre.</p></div>
    </a>
    <a name="cant-upgrade">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.21: Não consigo atualizar a versão do Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Se você não consegue atualizar para uma nova versão do Fink através
        do comando <code>fink selfupdate</code> ou <code>sudo apt-get update;
        sudo apt-get dist-upgrade</code>, então talvez você precise baixar
        manualmente uma nova versão do pacote <code>fink</code>. Os comandos
        são:</p><ul>
          <li><b>10.3.x:</b> (distribuição 0.7.1)
		<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.7.1-updates/main/binary-darwin-powerpc/base/fink_0.22.4-1_darwin-powerpc.deb
sudo dpkg -i fink_0.22.4-1_darwin-powerpc.deb
rm fink_0.22.4-1_darwin-powerpc.deb
fink selfupdate</pre></li>
          <li><b>10.2.x:</b> (distribuição 0.6.3)
		<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.6.3/release/main/binary-darwin-powerpc/base/fink_0.18.3-1_darwin-powerpc.deb
sudo dpkg -i fink_0.18.3-1_darwin-powerpc.deb
rm fink_0.18.3-1_darwin-powerpc.deb
fink selfupdate</pre></li>
        </ul></div>
    </a>
    <a name="spaces-in-directory">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.22: Posso colocar o Fink em um volume ou um diretório cujo nome tenha um
        espaço em branco?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Recomendamos que não coloque sua árvore de diretórios do Fink dentro
        de um diretório com espaço em branco nome. O trabalho não vale a
        pena.</p></div>
    </a>
    <a name="packages-gz">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.23: Quando tento fazer uma atualização de binários, surgem várias
        mensagens com "File not found" ("Arquivo não encontrado") ou "Couldn't
        stat package source list file." ("Não foi possível acessar o arquivo
        com a lista de códigos fontes do pacote.").</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Caso você veja algo parecido com o seguinte:</p><pre>Err file: local/main Packages 
File not found 
Ign file: local/main Release 
Err file: stable/main Packages 
File not found 
Ign file: stable/main Release 
Err file: stable/crypto Packages 
File not found 
Ign file: stable/crypto Release 
...
Failed to fetch file:/opt/sw/fink/dists/local/main/binary-darwin-powerpc/Packages
File not found 
Failed to fetch file:/opt/sw/fink/dists/stable/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch file:/opt/sw/fink/dists/stable/crypto/binary-darwin-powerpc/Packages
File not found 
Reading Package Lists... Done 
Building Dependency Tree...Done 
E: Some index files failed to download, 
they have been ignored, or old ones used instead. 
update available list script returned error exit status 1.</pre><p>então tudo o que você precisa fazer é executar o comando <code>fink
        scanpackages</code>, que gera os arquivos que não estão sendo
        encontrados.</p><p>Se você obtiver um erro com o seguinte formato:</p><pre>W: Couldn't stat source package list file: unstable/main Packages
(/opt/sw/var/lib/apt/lists/_sw_fink_dists_unstable_main_binary-darwin-
powerpc_Packages) - stat (2 No such file or directory)</pre><p>então você deve executar</p><pre>sudo apt-get update
fink scanpackages</pre><p>para corrigi-lo.</p></div>
    </a>
    <a name="wrong-tree">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.24: Eu mudei meu OS mas o Fink não reconhece a mudança.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ao trocar a distribuição do Fink (da qual as distribuições de
        códigos fontes e binários são subconjuntos), o Fink precisa ser
        notificado de que isso aconteceu. Para fazê-lo, você pode executar um
        script que normalmente é executado na instalação inicial do Fink:</p><pre>/opt/sw/lib/fink/postinstall.pl</pre><p>Isto corrigirá o Fink.</p></div>
    </a>
    <a name="lost-command-line-tools">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.25: After installing a macOS update, Fink no longer recognizes my installed Command Line Tools.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Updates to macOS routinely break parts of Apple's Command Line Tools. If you get this error after updating your copy of macOS:</p><pre>Can't resolve dependency "xcode (&gt;= 6.2)"</pre><p>Fink has lost track of Apple's Command Line Tools.</p><p>The easiest solution is to download and reinstall the Command Line Tools specific to your macOS version from <a href="https://developer.apple.com/">https://developer.apple.com/</a>.</p><p>Another possible solution is to run the following command:</p><pre>xcode-select --install</pre><p>but this often reports the following:</p><pre>xcode-select: error: command line tools are already installed, use "Software Update" to install updates</pre><p>However, the Tools might be in a non-functional state such that Fink still can't recognize them. In that case, a clean reinstall as described above has always worked to fix their detection with Fink.</p><p>Finally, you may need to run the command:</p><pre>sudo xcodebuild -license</pre><p>to agree to the software license.</p></div>
    </a>
    <a name="seg-fault">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.26: Estou recebendo erros com os aplicativos <code>gzip</code> |
        <code>dpkg-deb</code> do pacote <code>fileutils</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Erros no formato:</p><pre>gzip -dc /opt/sw/src/dpkg-1.10.9.tar.gz | /opt/sw/bin/tar -xf - 
### execution of gzip failed, exit code 139</pre><p>ou</p><pre>gzip -dc /opt/sw/src/aquaterm-0.3.0a.tar.gz | /opt/sw/bin/tar -xf -
gzip: stdout: Broken pipe 
### execution of gzip failed, exit code 138</pre><p>ou</p><pre>dpkg-deb -b root-base-files-1.9.0-1 /opt/sw/fink/dists/unstable/main/binary-darwin-powerpc/base

### execution of dpkg-deb failed, exit code 1
Failed: can't create package base-files_1.9.0-1_darwin-powerpc.deb</pre><p>ou falhas de segmentação na execução de utilitários do
        <code>fileutils</code>, como por exemplo <code>ls</code> ou
        <code>mv</code>, são provavelmente devidos a um erro de pré-ligação em
        uma biblioteca e podem ser corrigidos através da execução do seguinte
        comando:</p><pre>sudo /opt/sw/var/lib/fink/prebound/update-package-prebinding.pl -f</pre></div>
    </a>
    <a name="pathsetup-keeps-running">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.27: Quando abro uma janela do Terminal, recebo a mensagem "Your
        environment seems to be correctly set up for Fink already." ("Seu
        ambiente aparenta já estar corretamente configurado para o Fink") e em
        seguida a sessão é encerrada.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> O que aconteceu é que de alguma forma o programa Terminal do OS X
        foi instruído a executar <code>/opt/sw/bin/pathsetup.command</code> a cada
        vez que você se logar. Você pode corrigir isto removendo o arquivo de
        preferências
        <code>~/Library/Preferences/com.apple.Terminal.plist</code>.</p><p>If you have other preferences that you want to keep, you can edit
        the file with a text editor and remove the reference to
        <code>/opt/sw/bin/pathsetup.command</code>.</p></div>
    </a>
    <a name="ext-drive">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.28: Eu instalei o Fink em um volume que não o do sistema e agora não
        consigo atualizar o pacote Fink a partir do código fonte. Aparecem
        alguns erros envolvendo <q>chowname</q>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Caso o seu erro se pareça com:</p><pre>This first test is designed to die, so please ignore the error
message on the next line.
# Looks like your test died before it could output anything.
./00compile............................ok
./Base/initialize......................ok
./Base/param...........................ok
./Base/param_boolean...................ok
./Command/cat..........................ok
./Command/chowname.....................#     
Failed test (./Command/chowname.t at line 27)
#          got: 'root'
#     expected: 'nobody'</pre><p>então você precisa executar o <b>Obter Informações</b> no volume
        onde o Fink está instalado e desmarcar o botão "Ignorar posse".</p></div>
    </a>
    <a name="mirror-gnu">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.29: O Fink não consegue atualizar meus pacotes porque não pode encontrar
        o espelho 'gnu'.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> If you get an error that ends with</p><p>Se você receber uma mensagem de erro que termine com</p><pre>Failed: No mirror site list file found for mirror 'gnu'.</pre><p>então você provavelmente precisa atualizar o pacote
        <code>fink-mirrors</code>, por exemplo através do comando:</p><p>then most likely you need to update the <code>fink-mirrors</code> package, e.g. via:</p><pre>fink install fink-mirrors</pre></div>
    </a>
    <a name="cant-move-fink">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.30: Não consigo atualizar o Fink porque ele não consegue mover o
        diretório <code>/opt/sw/fink</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> O erro:</p><pre>Failed: Can't move "/opt/sw/fink" out of the way.</pre><p>é, apesar do que a mensagem diz, geralmente devido a erros de
        permissão em um dos diretórios temporários criados durante um
        <code>selfupdate</code>. Remova os diretórios:</p><pre>sudo rm -rf /opt/sw/fink.tmp /opt/sw/fink.old</pre></div>
    </a>
    <a name="fc-cache">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.31: Recebo uma mensagem dizendo <q>No fonts found</q>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Caso veja a seguinte mensagem (até agora só detectada no OS
        10.4):</p><pre>No fonts found; this probably means that the fontconfig
library is not correctly configured. You may need to
edit the fonts.conf configuration file. More information
about fontconfig can be found in the fontconfig(3) manual
page and on http://fontconfig.org.</pre><p>então você pode corrigir o problema executando o comando</p><pre>sudo fc-cache</pre></div>
    </a>
    <a name="non-admin-installer">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.32: Não consigo instalar o Fink através do pacote de instalação porque
        recebo mensage de erro <q>volume doesn't support
        symlinks</q>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Esta mensagem normalmente significa que você tentou exeuctar o
        instalador do Fink como um usuário que não possui privilégios
        administrativos. Assegure-se de fazer o login (na tela de login) como
        um usuário com tais privilégios ou troque para um usuários com tais
        privilégios no Finder (isto é, troca rápida de usuários) antes de
        iniciar o instalador do Fink.</p><p>Caso você tenha problemas mesmo usando uma conta administrativa,
        então é provavelmente um problema com as permissões no seu diretório
        raiz. Use o Utilitário de Disco da Apple (diretório Aplicativos,
        subdiretório Utilitários), escolha o disco em questão, escolha a aba
        Reparador e clique o botão <b>Reparar Permissões do Disco</b>. Se
        isto não funcionar, então você talvez tenha que definir manualmente
        suas permissões através do comando</p><pre>sudo chmod 1775 /</pre></div>
    </a>
    <a name="wrong-arch">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.33: Não consigo atualizar o Fink por causa do erro <q>package
        architecture (darwin-i386) does not match system
        (darwin-powerpc).</q></b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Este erro ocorre quando você usa um instalador PowerPC em uma máquina Intel. Você precisa apagar sua instalação do Fink, por exemplo:</p><pre>sudo rm -rf /opt/sw</pre><p>e então baixar a imagem de disco para máquinas Intel a partir da
        <a href="/download/index.php">página de
        downloads</a>.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="comp-general.php?phpLang=pt">6. Problemas de Compilação - Geral</a></p>
<?php include_once "../footer.inc"; ?>


