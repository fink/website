<?php
$title = "Guia do usuário - Instalação";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:17';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Guia do usuário Contents"><link rel="next" href="packages.php?phpLang=pt" title="Instalando pacotes"><link rel="prev" href="intro.php?phpLang=pt" title="Introdução">';


include_once "header.pt.inc";
?>
<h1>Guia do usuário - 2. Instalação inicial</h1>
    
    

    
      <p>Durante a instalação inicial, um sistema básico contendo as
      ferramentas de gerenciamento de pacotes é instalado em sua máquina.
      Depois disso você precisa configurar seu ambiente do shell para usar o
      software instalado pelo Fink. Você só precisa fazer isso uma única vez;
      você pode atualizar qualquer instalação do Fink in loco, sem que seja
      necessário reinstalá-lo. Este procedimento é coberto no <a href="upgrade.php?phpLang=pt">capítulo Atualizando o Fink</a>.</p>

      <p>Uma vez que você possua as ferramentas de gerenciamento de pacotes
      instaladas, você pode usá-las para instalar mais softwares. Este
      procedimento é descrito no <a href="packages.php?phpLang=pt">capítulo Instalando
      pacotes</a>.</p>
    

    <h2><a name="bin">2.1 Instalando a distribuição de binários</a></h2>
      

      <p>A distribuição de binários vem através de um pacote de instalação para
      o Mac OS X (.pkg) que por sua vez está dentro de uma imagem de disco
      (.dmg). Depois de baixar a imagem de disco da <a href="/download/bindist.php">página de
      downloads</a> (talvez você precise usar os comandos "Salvar como..."
      ou "Salvar no disco" no navegador), dê um duplo clique para montá-la.
      Abra o ícone do disco "Fink 0.x.x Installer" que aparece na sua área de
      trabalho (ou onde quer que você o haja baixado) depois que o Disk Utility
      tenha verificado o arquivo.  Dentro você encontrará alguma documentação e
      o pacote de instalação. Dê um duplo clique no pacote de instalação e siga
      as instruções na tela.</p>

      <p>Uma senha de administrador será solicitada e alguns textos serão
      exibidos. Por favor, leia-os - eles podem estar mais atualizados do que
      este guia do usuário. Quando o instalador solicitar-lhe um drive para
      instalação, tenha certeza de escolher o seu volume do sistema (aquele no
      qual você instalou o Mac OS X). Se você escolher o volume errado, a
      instalação irá prosseguir mas o Fink não funcionará mais tarde. Quando o
      instalador tiver terminado, prossiga à seção <a href="#setup">Configurando seu ambiente</a>.</p>
    

    <h2><a name="src">2.2 Instalando a distribuição de códigos fontes</a></h2>
      

      <p>A distribuição de códigos fontes é disponibilizada como um tarball
      padrão Unix (.tar.gz). Ela contém somente o gerenciador de pacotes
      <code>fink</code>  e irá baixar os
      códigos fontes dos pacotes quando necessário. Você pode obter esta
      distribuição na <a href="/download/srcdist.php">página de
      downloads</a>. Versões mais antigas do StuffIt Expander são
      problemáticas para lidar com nomes longos de arquivos então, se você
      tiver algum problema, você precisará remover a pasta que ele gera e
      seguir as seguintes instruções para linha de comando.</p>

      <p>A versão em código fonte precisa ser instalada a partir da linha de
      comando, então abra o Terminal.app e posicione-se no diretório onde você
      colocou o arquivo  <code>fink-0.27.x.tar.gz</code>. Talvez seu
      navegador Web tenha extraído parcialmente o arquivo; neste caso você terá
      o arquivo <code>fink-0.27.x.tar</code> no seu diretório de
      download e deverá pular o primeiro comando abaixo. Os comandos abaixo
      fazem a extração do arquivo:</p>

      

      <pre>gunzip fink-0.27.x.tar.gz
tar -xf fink-0.27.x.tar</pre>

      <p>Isto cria um diretório com o mesmo nome do arquivo. Continuaremos
      usando 
      <code>fink-0.27.x</code> aqui, mas este nome pode mudar conforme
      a versão que você tenha baixado.  Agora posicione-se nesse diretório e
      execute o script de carga inicial:</p>

      <pre>cd fink-0.27.x
./bootstrap</pre>

      <p>O script fará algumas verificações no seu sistema e usar o sudo para
      se tornar root, o que fará com que sua senha seja solicitada. Depois
      disso, o script lhe perguntará o diretório de instalação. A menos que
      você possua uma boa razão, use o diretório padrão
      <code>/sw</code>.  Somente essa escolha de diretório lhe
      permitirá baixar posteriormente pacotes binários. Além disso, todos os
      exemplos usam esse diretório; esteja certo de fazer a substituição
      apropriada caso você use um diretório diferente.</p>

      <p>A seguir vem a configuração do Fink. Serão solicitadas informações
      como configurações de proxy e espelhos, e qual o nível de detalhe de
      mensagens que você deseja. Se você não entender uma pergunta, tecle
      Return para aceitar a escolha padrão. Você poderá executar novamente este
      procedimento mais tarde através do comando <code>fink
      configure</code>.</p>

      <p>Quando o script de carga inicial tiver todas as informações de que
      necessita, ele irá começar a baixar o código fonte do sistema básico e
      compilá-lo. Nenhuma interação será necessária durante este procedimento.
      Não se preocupe caso veja alguns pacotes serem compilados duas vezes.
      Isto é necessário porque, para compilar um pacote binário que pertença ao
      próprio gerenciador de pacotes, é necessário primeiro ter o gerenciador
      de pacotes disponível.</p>

      <p>Quando a carga inicial tiver terminado, proceda à seção <a href="#setup">Configurando seu ambiente</a>.</p>
    

    <h2><a name="setup">2.3 Configurando seu ambiente</a></h2>
      

      <p>Para usar os softwares instalados na hierarquia de diretórios do Fink,
      incluindo os programas de gerenciamento de pacotes em si, você precisa
      ajustar sua variável de ambiente PATH (e algumas outras) de forma
      apropriada. As versões atuais do Fink fazem isto automaticamente e em
      geral você só precisará abrir uma nova janela do Terminal.app para
      garantir que estas configurações sejam aplicadas. Entretanto, em alguns
      casos você precisará efetuar o procedimento manualmente.</p>

      <p>Na maior parte dos casos, você pode fazê-lo através da execução do
      comando</p>

      <pre>/sw/bin/pathsetup.sh</pre>

      <p>em uma janela de terminal.</p>

      <p>Observe que em algumas versões antigas do Fink o programa era
      denominado <code>pathsetup.command</code>, o qual poderia ser
      executado através de <code>open /sw/bin/pathsetup.command</code>.</p>

      <p>Entretanto, se isto não funcionar por algum motivo, você pode
      configurá-lo manualmente. Isto dependerá do shell que você estiver
      usando. Você pode determinar qual o shell que esteja usando abrindo um
      terminal e executando o seguinte comando:</p>

      <pre>echo $SHELL</pre>

      <p>Se a resposta for "csh" ou "tcsh", você está usando o C shell. Se for
      bash, zsh, sh ou algo similar, você está usando uma variante do Bourne
      shell.</p>

      <ul>
        <li>
          <p>Bourne Shell (padrão no Mac OS X 10.3 e mais
          recentes)</p>

          <p>Se você usa um shell no estilo Bourne (por exemplo, sh, bash,
          zsh), adicione as seguintes linhas ao arquivo <code>.profile</code>
          no seu diretório home (ou, se você tiver um arquivo
          <code>.bash_profile</code> existente, use esse no lugar do
          <code>.profile</code>):</p>

          <pre>. /sw/bin/init.sh</pre>

          <p>Se você não sabe como adicionar a linha, execute estes
          comandos:</p>

          <pre>cd
pico .profile</pre>

          <p>Você está agora em um editor de textos e pode começar a digitar a
          linha <code>. /sw/bin/init.sh</code>. Não há problema caso o editor
          indique que seja um novo arquivo. Tenha certeza de haver teclado
          Return pelo menos uma vez após digitar a linha e tecle Control-O,
          Return, Control-X para sair do editor.</p>
        </li>

        <li>
          <p>C Shell (padrão no Mac OS X 10.2 e versões
          anteriores)</p>

          <p>Se você usa tcsh, adicione a linha seguinte ao arquivo
          <code>.cshrc</code> no seu diretório home:</p>

          <pre>source /sw/bin/init.csh</pre>

          <p>Se você não sabe como adicionar a linha, execute estes
          comandos:</p>

          <pre>cd
pico .cshrc</pre>

          <p>Você está agora em um editor de textos e pode começar a digitar a
          linha <code>. /sw/bin/init.sh</code>. Não há problema caso o editor
          indique que seja um novo arquivo. Tenha certeza de haver teclado
          Return pelo menos uma vez após digitar a linha e tecle Control-O,
          Return, Control-X para sair do editor.</p>

          <p>Existem algumas situações comuns em que você poderá precisar
          editar arquivos adicionais:</p>

          <ol>
            <li>
              <p>Você possui um arquivo <code>~/.tcshrc</code>.</p>

              <p>Algumas vezes esse arquivo é criado por aplicações de
              terceiros ou talvez você mesmo o tenha criado. De qualquer forma,
              o que acontece é que <code>~/.tcshrc</code> será lido e
              <code>~/.cshrc</code> será ignorado. O procedimento recomendado é
              editar o arquivo <code>~/.tcshrc</code> de forma similar à usada
              para editar o arquivo <code>~/.cshrc</code> conforme acima e
              então adicionar a seguinte linha no final do arquivo:</p>

              <pre>source ~/.cshrc</pre>

              <p>Desta forma, se você precisar remover o arquivo
              <code>~/.tcshrc</code>, você poderá rodar o Fink mesmo assim.</p>
            </li>

            <li>
              <p>Você seguiu as instruções contidas em
              <code>/usr/share/tcsh/examples/README</code>.</p>

              <p>Essas instruções o informam a criar os arquivos
              <code>~/.tcshrc</code> e <code>~/.login</code>. O problema nesse
              caso é com o arquivo <code>~/.login</code>, o qual é executado
              após <code>~/.tcshrc</code>, e inclui o arquivo
              <code>/usr/share/tcsh/examples/login</code>. Este último contém
              uma linha que sobrescreve sua configuração anterior da variável
              PATH. O que você precisa fazer nesse caso é criar o arquivo
              <code>~/Library/init/tcsh/path</code>:</p>

              <pre>mkdir -p ~/Library/init/tcsh
pico ~/Library/init/tcsh/path</pre>

              <p>e inserir a linha:</p>

              <pre>source ~/.cshrc</pre>

              <p>nele. Você também precisa modificar seu
              <code>.tcshrc</code> como no item 1 acima para garantir que sua
              variável PATH seja definida corretamente para situações em que
              <code>~/.login</code> não seja lido.</p>
            </li>
          </ol>

          <p>Editar <code>.cshrc</code> (e outros arquivos de inicialização)
          afetará somente novos shells (i.e. novas janelas de Terminal),
          portanto você também precisará executar esse comando em todas as
          janelas de Terminal que você tenha aberto antes de editar o arquivo.
          Você também precisará executar <code>rehash</code> porque o tcsh faz
          um cache interno da lista de comandos disponíveis.</p>
        </li>
      </ul>

      <p>Observe que os scripts <code>init.sh</code> e
      <code>init.csh</code> também adicionam
      <code>/usr/X11R6/bin</code> e <code>/usr/X11R6/man</code>
      à variável PATH e portanto você poderá usar o X11 quando tiver sido
      instalado. Os pacotes do Fink podem adicionar suas próprias
      configurações, como por exemplo a variável de ambiente QTDIR que é
      adicionada pelo pacote qt.</p>

      <p>Uma vez que seu ambiente tenha sido configurado,  você precisará obter descrições de pacotes conforme o
      capítulo <a href="upgrade.php?phpLang=pt">Atualizando o Fink</a>, na seção
      <b>Atualizando a distribuição de códigos fontes</b>, e então proceder
      ao capítulo <a href="packages.php?phpLang=pt">Instalando pacotes</a> para
      verificar como efetivamente instalar pacotes úteis usando as várias
      ferramentas de gerenciamento de pacotes que são parte do Fink.</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="packages.php?phpLang=pt">3. Instalando pacotes</a></p>
<?php include_once "../../footer.inc"; ?>


