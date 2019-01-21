<?php
$title = "Guia do usuário - Pacotes";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Guia do usuário Contents"><link rel="next" href="upgrade.php?phpLang=pt" title="Atualizando o Fink"><link rel="prev" href="install.php?phpLang=pt" title="Instalação inicial">';


include_once "header.pt.inc";
?>
<h1>Guia do usuário - 3. Instalando pacotes</h1>
    
    

    
      <p>Agora que você tem algo que pode ser chamado de uma instalação do
      Fink, este capítulo mostra como instalar de fato os pacotes de software
      que você deseja. Antes de explicarmos como instalar pacotes usando tanto
      as distribuições de binários quanto as de códigos fontes, listamos alguns
      itens que são aplicáveis a ambas as distribuições.</p>
    

    <h2><a name="bin-dselect">3.1 Instalando pacotes binários com o dselect</a></h2>
      

      <p>O <code>dselect</code> é um programa que lhe permite visualizar a
      lista de pacotes disponíveis e selecionar quais você quer que sejam
      instalados. Ele é executado dentro de uma janela de Terminal, ocupando-a
      completamente, e usa uma navegação simples via teclado. Como outras
      ferramentas de gerenciamento de pacotes, o <code>deselect</code> requer
      privilégios administrativos, portanto você precisará usar o sudo a partir
      de uma conta com privilégios administrativos:</p>

      <pre>sudo dselect</pre>

      <p><b>Observação:</b> O <code>dselect</code> possui algumas
      dificuldades conhecidas quando executado dentro do aplicativo Mac OS X
      Terminal. Você precisa executar os seguintes comandos antes de usá-lo ou
      colocá-los no arquivo de inicialização apropriado (e.g.
      <code>.cshrc</code> / <code>.profile</code>):</p>

      <pre>setenv TERM xterm-color</pre>

      <p>usuários do bash:</p>

      <pre>export TERM=xterm-color</pre>

      <p>usuários do tcsh:</p>

      <p>O menu principal possui várias opções:</p>

      <ul>
        <li>
          <p><b>[A]cesso</b> - configura o método de acesso a rede que deve
          ser usado. <b>Você não precisa desta opção</b> pois o Fink
          pré-configura tudo para você. Na verdade, você deveria evitar esta
          opção já que ela pode sobrescrever a configuração padrão com uma
          outra que talvez não funcione.</p>
        </li>

        <li>
          <p><b>[U]pdate</b> - baixa a lista de pacotes disponíveis a partir
          do site do Fink. Esta opção não instala ou atualiza os pacotes em si,
          mas apenas atualiza a listagem usada pelo navegador de pacotes.
          Você precisa executar esta opção ao menos uma vez após instalar o
          Fink.</p>
        </li>

        <li>
          <p><b>[S]eleciona</b> - apresenta a listagem de pacotes, permitindo
          que você (de-)selecione os pacotes que você deseja no seu sistema.
          Mais informações adiante.</p>
        </li>

        <li>
          <p><b>[I]nstalar</b> - é aqui que as coisas realmente acontecem.
          As opções acima afetam apenas a listagem de pacotes e o banco de
          dados de status. Esta opção efetivamente baixa e instala os pacotes
          que você solicitou, bem como remove os pacotes que você tenha
          de-selecionado no navegador de pacotes.</p>
        </li>

        <li>
          <p><b>[C]onfigura</b> e <b>[R]emover</b> - estas opções são
          relíquias dos tempos anteriores ao apt. Você não precisa delas, ainda
          que elas não farão mal algum.</p>
        </li>

        <li>
          <p><b>[Q]Sair</b> - sai do dselect.</p>
        </li>
      </ul>

      <p>Você irá gastar a maior parte do seu tempo no dselect dentro do
      navegador de pacotes, acessível a partir da opção "[S]eleciona" no menu.
      Antes de o deselect exibir a listagem dos pacotes, ele lhe apresentará
      uma tela de ajuda introdutória. Você pode pressionar 'k' para obter uma
      lista completa com os comandos de teclado ou teclar Espaço para ir à
      listagem de pacotes.</p>

      <p>Você pode se mover através da lista usando as setas para cima e para
      baixo. Seleções são feitas com '+' e '-'. Quando você seleciona um pacote
      que precisa de outros pacotes, o dselect irá mostrar-lhe uma sub-lista com
      os pacotes afetados. Na maior parte dos casos você pode simplesmente
      teclar Return para aceitar as escolhas do dselect. Você também pode fazer
      ajustes na sub-lista (por exemplo, escolher outra alternativa para uma
      dependência de pacote virtual) ou teclar 'R' (i.e. Shift-R) para retornar
      ao estado anterior. Você pode teclar Return para sair tanto das sub-listas
      quanto da listagem principal de pacotes. Quando você estiver pronto com
      suas seleções, saia da lista principal e use a opção de menu "[I]nstalar"
      para efetivamente instalar os pacotes.</p>
    

    <h2><a name="bin-apt">3.2 Instalando pacotes binários com o apt-get</a></h2>
      

      <p>O <code>dselect</code> não faz por si próprio o download dos pacotes.
      Em vez disso, ele executa o apt para fazer o trabalho sujo. Se você
      prefere uma interface que seja puramente linha de comando, você pode
      acessar as funções do apt diretamente através do comando
      <code>apt-get</code>.</p>

      <p>Assim como no caso do dselect, você precisa primeiro baixar a listagem
      corrente dos pacotes disponíveis através do seguinte comando:</p>

      <pre>sudo apt-get update</pre>

      <p>Da mesma forma como na opção "[U]pdate" do dselect, o comando acima não
      atualiza arquivos no seu computador mas sim apenas a lista de pacotes
      disponíveis para o apt. Para instalar um pacote, você só precisa fornecer
      o nome ao apt-get como segue:</p>

      <pre>sudo apt-get install lynx</pre>

      <p>Se o apt-get determina que para instalar um pacote são necessários
      outros pacotes, ele irá mostrar-lhe a lista e pedir confirmação. Ele
      então baixa e instala os pacotes necessários. Remover pacotes é
      igualmente fácil:</p>

      <pre>sudo apt-get remove lynx</pre>

      <p></p>
    

    <h2><a name="bin-exceptions">3.3 Instalando pacotes dependentes que não estão disponíveis na
      distribuição de binários</a></h2>
      

      <p>Às vezes, durante uma instalação de binários, você pode ser informado
      de que uma dependência não pode ser instalada:</p>

      <pre>Os seguintes pacotes têm dependências desencontradas:
foo: Depende: bar (&gt;= version) mas não é instalável
E: Pacotes quebrados</pre>

      <p>O que aconteceu é que o pacote que você está tentando instalar depende
      de um outro pacote que não pode ser distribuído como um binário devido a
      restrições de licenciamento. Você precisa instalar a dependência através
      do código fonte (veja a próxima seção).</p>
    

    <h2><a name="src">3.4 Instalando pacotes binários e com código fonte através do
      fink</a></h2>
      

      <p>A ferramenta <code>fink</code> permite que você instale pacotes que
      ainda não estejam disponíveis na <a href="intro.php?phpLang=pt#src-vs-bin">distribuição de binários</a>.</p>

      <p>Em primeiro lugar, você precisará de uma versão apropriada do
      Developer Tools para o seu sistema. A última versão está disponível para
      download gratuito após registro em <a href="http://connect.apple.com">http://connect.apple.com</a>.</p>

      <p>Para obter uma lista dos pacotes que estão disponíveis para instalação
      a partir do código fonte, pergunte à ferramenta <code>fink</code>:</p>

      <pre>fink list</pre>

      <p>A primeira coluna lista o status de instalação (branco caso não esteja
      instalado, <code>i</code> para instalado, <code>(i)</code> para instalado
      mas não a versão mais recente), seguido pelo nome do pacote, a versão
      mais recente, e uma descrição curta. Você pode solicitar mais informações
      sobre um pacote específico usando o comando "describe" ("info" é um
      apelido para esse comando):</p>

      <pre>fink describe xmms</pre>

      <p>Quando você houver encontrado um pacote que queira instalar, use o
      comando "install":</p>

      <pre>fink install wget-ssl</pre>

      <p>O comando <code>fink</code> irá primeiramente verificar se todos os
      pré-requisitos necessários (dependências) estão presentes e irá
      perguntar-lhe se pode instalá-los caso estejam faltando. Depois ele baixa
      o código fonte, descomprime-o, aplica-lhe modificações, compila-o e
      instala o resultado no seu sistema. Isto pode levar bastante tempo. Caso
      você encontre erros durante este processo, por favor verifique primeiro
      as <a href="/faq/">Perguntas
      frequentes</a>.</p>

      <p>Você pode solicitar ao <code>fink</code> que tente baixar pacotes de
      binários pré-compilados, caso disponíveis, no lugar de compilá-los. Para
      tal, use a <a href="usage.php?phpLang=pt#options">opção
      --use-binary-dist (ou -b)</a> ao chamar o <code>fink</code>. Isto pode
      resultar uma grande economia de tempo. Por exemplo, ao executar</p>

      <pre>fink --use-binary-dist install wget-ssl</pre>

      <p>ou</p>

      <pre>fink -b install wget-ssl</pre>

      <p>será primeiramente feito o download de todas as dependências para
      wget-ssl que estejam disponíveis na distribuição de binários e apenas o
      restante será compilado a partir do código fonte. Esta opção também pode
      ser permanentemente habilitada no <a href="conf.php?phpLang=pt">arquivo de
      configuração do Fink</a> (fink.conf) ou através da execução do comando
      <code>fink configure</code>.</p>

      <p>Mais detalhes sobre a ferramenta <code>fink</code> estão disponíveis
      no capítulo <a href="usage.php?phpLang=pt">Usando a ferramenta fink a partir da
      linha de comando</a>.</p>
    

    <h2><a name="fink-commander">3.5 Fink Commander</a></h2>
      

      <p>O Fink Commander é uma interface Aqua para as ferramentas
      <code>apt-get</code> e <code>fink</code>. O menu Binary permite que você
      faça operações na distribuição de binários e o menu Source faz o mesmo
      para a distribuição de códigos fontes.</p>

      <p>O Fink Commander está incluído no instalador binário do Fink. Para
      baixá-lo em separado (por exemplo, se você fez a carga inicial do Fink a
      partir de código fonte) ou para informações adicionais, veja o <a href="http://finkcommander.sourceforge.net">site do Fink
      Commander</a>.</p>
    

    <h2><a name="available-versions">3.6 Versões disponíveis</a></h2>
      

      <p>Quando você quiser instalar um pacote, verifique primeiro o <a href="http://pdb.finkproject.org/pdb/index.php">banco de dados de
      pacotes</a> e veja se ele está de fato disponível através do Fink. As
      versões disponíveis do pacote serão exibidas em várias linhas de uma
      tabela:</p>

      <ul>
        <li>
          Distribuição de binários

          <ol>
            <li>
              <p><b>0.8.1:</b> Esta é a versão base que pode ser instalada a
              partir de binários para o OS 10.4. Se você <a href="install.php?phpLang=pt#bin">atualizar</a> o Fink, versões
              mais recentes de alguns pacotes poderão estar disponíveis.</p>
            </li>

            <li>
              <p><b>0.9.0:</b> Esta é a versão base que pode ser
              instalada a partir de binários para o OS 10.5. Se você <a href="install.php?phpLang=pt#bin">atualizar</a> o Fink, versões
              mais recentes de alguns pacotes poderâo estar disponíveis.</p>
            </li>
          </ol>
        </li>
      </ul>

      <ul>
        <li>
          Distribuições via CVS/rsync 

          <ol>
            <li>
              <p><b>10.4/powerpc stable:</b> Esta é a versão mais recente que
              pode ser instalada da árvore de códigos fontes stable para
              usuários do OS 10.4 em hardware PowerPC.</p>
            </li>

            <li>
              <p><b>10.4/intel stable:</b> Esta é a versão mais recente que
              pode ser instalada da árvore de códigos fontes stable para
              usuários do OS 10.4 em hardware Intel.</p>
            </li>


            <li>
              <p><b>10.4/powerpc unstable:</b> Esta é a versão mais recente
              que pode ser instalada da árvore de códigos fontes unstable para
              usuários do OS 10.4 em hardware PowerPC.</p>
            </li>

            <li>
              <p><b>10.4/intel unstable:</b> Esta é a versão mais recente que
              pode ser instalada da árvore de códigos fontes unstable para
              usuários do OS 10.4 em hardware Intel.</p>

              <p>Observação: um pacote <b>instável</b> não significa
              necessariamente que não possa ser usado, porém instale tais
              pacotes sob sua própria conta e risco.</p>
            </li>

            <li>
              <p><b>10.5/powerpc stable:</b> Esta é a versão mais recente que
              pode ser instalada da árvore de códigos fontes stable para
              usuários do OS 10.5 em hardware PowerPC.</p>
            </li>

            <li>
              <p><b>10.5/intel stable:</b> Esta é a versão mais recente que
              pode ser instalada da árvore de códigos fontes stable para
              usuários do OS 10.5 em hardware Intel.</p>
            </li>

            <li>
              <p><b>10.5/powerpc unstable:</b> Esta é a versão mais recente
              que pode ser instalada da árvore de códigos fontes unstable para
              usuários do OS 10.5 em hardware PowerPC.</p>
            </li>

            <li>
              <p><b>10.5/intel unstable:</b> Esta é a versão mais recente que
              pode ser instalada da árvore de códigos fontes unstable para
              usuários do OS 10.5 em hardware Intel.</p>
            </li>
          </ol>
        </li>
      </ul>
    

    <h2><a name="x11">3.7 Lidando com o X11</a></h2>
      

      <p>Muitos dos pacotes que estão disponíveis através do Fink requerem a
      instalação de algum tipo de X11. Por causa disto, uma das primeiras
      coisas que normalmente são feitas é escolher uma implementação do
      X11.</p>

      <p>Como há várias implementações do X11 disponíveis para o Mac OS X (X11
      da Apple, XFree86, X.org) e várias formas de as instalar (manualmente ou
      via Fink), há vários pacotes alternativos - um para cada configuração.
      Aqui está a lista dos pacotes X11 disponíveis e métodos de
      instalação:</p>

      <ul>
        <li>
          <p><b>xfree86, xfree86-shlibs:</b> Instale ambos os pacotes para o
          XFree86 4.5.0 (somente para o OS 10.4).</p>
        </li>

        <li>
          <p><b>xorg, xorg-shlibs</b>(somente para o OS 10.4) Instale estes pacotes
          para obter a versão 6.8.2 da distribuição do X11 da X.org.</p>
        </li>

        <li>
          <p><b>system-xfree86 + -shlibs, -dev:</b> Estes pacotes são gerados
          automaticamente caso você instale o X11 da Apple ou instale
          manualmente o XFree86 ou X.org. Eles servem como sinalizadores de
          dependência.</p>
        </li>
      </ul>

      <p>Para mais informações sobre a instalação e execução do X11, consulte o
      documento <a href="/doc/x11/">X11 no Darwin e
      no Mac OS X</a>.</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="upgrade.php?phpLang=pt">4. Atualizando o Fink</a></p>
<?php include_once "../../footer.inc"; ?>


