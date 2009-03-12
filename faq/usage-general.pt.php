<?
$title = "Perguntas frequentes - Uso (1)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2009/03/12 17:49:31';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="usage-packages.php?phpLang=pt" title="Problemas no uso de pacotes - Pacotes específicos"><link rel="prev" href="comp-packages.php?phpLang=pt" title="Problemas de compilação - Pacotes específicos">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 8. Problemas no uso de pacotes - Geral</h1>
    
    
    
    <a name="xlocale">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.1: Estou recebendo várias mensagens como "locale not supported by C
        library" ("local não suportado por biblioteca C"). Isso é ruim?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Não é ruim, apenas significa que o programa usará por padrão as
        mensagens em inglês, formatos de data etc. O programa funcionará
        normalmente. O documento Executando o X11 tem mais <a href="http://www.finkproject.org/doc/x11/trouble.php#locale">detalhes</a>.</p></div>
    </a>
    <a name="passwd">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.2: Surgiram de repente vários usuários estranhos no meu sistema com
        nomes como "mysql", "pgsql" e "games". De onde eles vieram?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Você usou o Fink para instalar um pacote que depende de outro
        pacote, o passwd. O passwd instala vários usuários extras no seu
        sistema por razões de segurança -- em sistemas Unix, arquivos e
        processos pertencem a "proprietários", o que permite que
        administradores de sistema façam ajustes finos nas permissões e
        segurança do sistema. Programas como o Apache e o MySQL precisam de um
        "proprietário" e não é seguro atribuir-lhes o usuário root (imagine o
        que aconteceria se o Apache fosse comprometido e subitamente tivesse
        acesso de escrita a todos os arquivos do sistema). Por conseguinte, o
        pacote passwd faz o trabalho de configurar esses usuários extras para
        os pacotes do Fink que os necessitam.</p><p>Pode ser alarmante descobrir repentinamente vários usuários não
        esperados no painel "Preferências do Sistema: Contas", mas evite
        removê-los:</p><ul>
          <li>Em primeiro lugar, você obviamente escolheu instalar um pacote
          que requer os usuários, então eliminá-los não faz muito sentido,
          faz?</li>
          <li>Na verdade há vários usuários extras já instalados no Mac OS X
          que você talvez nem conheça: www, daemon, nobody são alguns deles. A
          presença desses usuários extras é uma convenção padrão do Unix para a
          execução de certos serviços; o pacote passwd simplesmente adiciona
          alguns outros usuários extras que não foram fornecidos pela Apple.
          Você pode ver os usuários instalados pela Apple no aplicativo NetInfo
          Manager.app ou através do comando <code>niutil -list .
          /users</code></li>
          <li>Caso você decida remover esses usuários, tenha muito cuidado em
          como proceder. Usar o painel "Preferências do Sistema: Contas" fará
          com que todos os arquivos desses usuários sejam atribuídos a uma
          conta de administrador aleatória e tem havido relatos de grandes
          confusões devidas às permissões das contas de administradores. Há um
          erro no Preferências do Sistema que já foi relatado à Apple. Uma
          forma mais segura de remover esses usuários do sistema é fazê-lo
          através do NetInfo Manager.app ou usar a ferramenta de linha de
          comando <code>niutil</code> no Terminal. Leia o manual do
          <code>niutil</code> para mais informações sobre o NetInfo.</li>
        </ul><p>O Fink <b>de fato</b> solicita permissão para instalar esses
        usuários adicionais em seu sistema durante a instalação do pacote
        passwd, portanto eles não deveriam ser de todo uma surpresa.</p></div>
    </a>
    <a name="compile-myself">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.3: Como faço para compilar algo usando softwares instalados pelo
        Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Quando você for compilar algo fora do Fink, o compilador e o
        linkeditor precisam saber onde estão as bibliotecas e arquivos de
        cabeçalho instalados pelo Fink. Para um pacote que use o processo
        configure/make padrão, você precisa definir algumas variáveis de
        ambiente:</p><p>-bash-</p><pre>export CFLAGS=-I/sw/include 
export LDFLAGS=-L/sw/lib 
export CXXFLAGS=$CFLAGS 
export CPPFLAGS=$CXXFLAGS 
export ACLOCAL_FLAGS="-I /sw/share/aclocal"
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"
export MACOSX_DEPLOYMENT_TARGET=10.4</pre><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
setenv LDFLAGS -L/sw/lib 
setenv CXXFLAGS $CFLAGS 
setenv CPPFLAGS $CXXFLAGS 
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal"
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"
setenv MACOSX_DEPLOYMENT_TARGET 10.4</pre><p>Normalmente é mais fácil adicionar essas definições ao seu arquivo
        de inicialização do shell (<code>.profile</code> |
        <code>.cshrc</code>) para que as variáveis sejam definidas
        automaticamente. Se um pacote não usa essas variáveis, você precisará
        adicionar "-I/sw/include" (para arquivos de cabeçalho) e "-L/sw/lib"
        (para bibliotecas) aos comandos de compilação. Alguns pacotes podem
        usar algumas variáveis similares mas que não são padrão como
        EXTRA_FLAGS ou opções extras para o configure como --with-qt-dir=.
        "./configure --help" normalmente exibe uma lista das opções extras.</p><p>Além disso, você pode precisar instalar os arquivos de cabeçalho
        para desenvolvimento (por exemplo, <b>foo-1.0-1-dev</b>) para os
        pacotes de bibliotecas que você esteja usando caso ainda não tenham
        sido instalados.</p></div>
    </a>
    <a name="apple-x11-applications-menu">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.4: Não consigo rodar nenhuma dos meus aplicativos instalados via Fink
        quando uso o menu Applications (Aplicativos) do X11 da Apple.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> O X11 da Apple não considera as configurações de ambiente do Fink, o
        que significa que o menu Applications (Aplicativos) não possui o PATH
        configurado corretamente para achar os aplicativos do Fink. A solução é
        colocar, no começo do nome de um aplicativo instalado pelo Fink, o
        texto</p><pre>source /sw/bin/init.sh ;</pre><p>Por exemplo, caso queira rodar um GIMP instalado pelo Fink,
        coloque</p><pre>source /sw/bin/init.sh ; gimp</pre><p>no campo Command (Comando) da sua opção GIMP.</p><p>Você também pode editar seu arquivo .xinitrc (no seu diretório de
        usuário) e adicionar:</p><pre>source /sw/bin/init.sh</pre><p>após a primeira linha.</p></div>
    </a>
    <a name="x-options">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.5: Estou perplexo com as opções de X11: X11 da Apple, XFree86 etc. Qual
        devo instalar?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Todas são variantes do XFree86 (são baseadas no código do XFree86)
        mas possuem algumas pequenas diferenças entre elas. Há opções
        diferentes para o Panther e para o Jaguar.</p><p>No Panther você pode escolher dentre:</p><ul>
          <li>
            <p>X11 da Apple (no terceiro disco). Não se esqueça de instalar o
            X11 SDK (no disco do Xcode) caso queira compilar programas ou
            pretenda instalar, via código fonte, outros pacotes do Fink
            relacionados ao X11.</p>
          </li>
          <li>
            <p>4.4.x compilado via Fink: instale os pacotes
            <code>xfree86</code> e <code>xfree86-shlibs</code></p>
          </li>
          <li>
            <p>X.org compilado via Fink: instale os pacotes <code>xorg</code> e
            <code>xorg-shlibs</code></p>
          </li>
        </ul><p>No Jaguar, as escolhas mais populares e pacotes do Fink associados
        são:</p><ul>
          <li>
            <p>4.2.x compilado via Fink: install os pacotes
            <code>xfree86-base</code> e <code>xfree86-rootless</code> ou
            <code>xfree86-base-threaded</code> e
            <code>xfree86-rootless-threaded</code> (e <code>-shlibs</code>
            respectivos)</p>
          </li>
          <li>
            <p>4.3.x compilado via Fink: instale os pacotes
            <code>xfree86</code> e <code>xfree86-shlibs</code></p>
          </li>
          <li>
            <p>4.2.x da Apple (suponto que você tenha os pacotes User + SDK
            instalados):o pacote <code>system-xfree86</code> é automaticamente
            gerado pelas versões atuais do Fink; NÃO o instale. (Note que que o
            beta público do X11 da Apple para o Jaguar não está mais
            disponível, então esta é a única opção para você que já o tem
            instalado a partir do momento em que estava disponível.)</p>
          </li>
        </ul><p>Também há outras opções. Um tratamento mais extensivo deste tema
        está disponível no documento <a href="http://www.finkproject.org/doc/x11/index.php">Executando o
        X11</a>.</p></div>
    </a>
    <a name="no-display">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.6: Quando tento rodar um aplicativo, recebo uma mensagem que diz
        "cannot open display:" ("não foi possível abrir o display:"). O que
        preciso fazer?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Este erro significa que o sistema não está se conectado ao display
        do X. Faça o seguinte:</p><p>1. Inicie o X (X11 da Apple, XFree86, ...).</p><p>2. Assegure-se de que sua variável de ambiente DISPLAY esteja
        definida corretamente. Se você está usando a configuração padrão do X,
        você pode fazê-lo com</p><pre>export DISPLAY=:0</pre><p>caso esteja usando o <code>bash</code> ou</p><pre>setenv DISPLAY :0</pre><p>caso esteja usando o<code>tcsh</code>.</p></div>
    </a>
    <a name="suggest-package">
      <div class="question"><p><b><? echo FINK_Q ; ?>8.7: Não estou vendo meu programa favorito no Fink. Como faço para
        sugerir que um novo pacote seja incluído no Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Faça a requisição no <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package
        Request Tracker</a> na página do projeto Fink.</p><p>Note que você precisa ter uma conta no SourceForge para fazê-lo.</p></div>
    </a>
    <a name="virtpackage">
      
      <div class="question"><p><b><? echo FINK_Q ; ?>8.8: O que são esses "pacotes virtuais" <code>system-*</code> que às
        vezes estão presentes mas que não consigo eu mesmo instalar ou
        remover?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Pacotes com nomes como <code>system-perl</code> são pacotes
        sinalizadores. Eles não contêm arquivos em si mas servem meramente como
        um mecanismo para que o fink saiba sobre os programas que foram
        instalados manualmente fora do Fink.</p><p>A maior parte desses pacotes sinalizadores não são de fato pacotes
        que você possa instalar ou remover, mas sim "pacotes virtuais", que são
        estruturas de dados de pacotes gerados pelo programa fink em resposta a
        uma lista pré-configurada com os programas instalados manualmente. Para
        cada pacote virtual, o fink procura por certos arquivos e certos locais
        e, caso estejam presentes, considera o pacote virtual como
        "instalado".</p><p>Você pode rodar o programa <code>fink-virtual-pkgs</code> (faz parte
        do pacote fink) para obter uma lista de exatamente quais pacotes o fink
        crê que estejam instalados. Adicionar a opção <code>--debug</code>
        mostra várias informações de diagnóstico sobre exatamente quais
        arquivos o fink está verificando.</p><p>Infelizmente, não há um mecanismo pelo qual você mesmo possa
        instalar um programa arbitrário (fora do fink) e fazer com que o fink
        reconheça esse programa além de você mesmo instalá-lo. É muito difícil,
        no caso geral, fazer o fink verificar as opções de configuração e
        compilação, caminhos de arquivos etc.</p><p>Abaixo listamos os pacotes virtuais mais importantes definidos pelo
        fink:</p><ul>
          <li>system-perl: [pacote virtual representando o perl]
            <p>Representa <code>/usr/bin/perl</code>, o qual é parte da
            instalação padrão do OS X. Este pacote também provê
            <code>system-perlXXX</code> e <code>perlXXX-core</code> conforme a
            versão X.X.X do interpretador do perl.</p>
          </li>
          <li>system-javaXXX: [pacote virtual representando o Java X.X.X]
            <p>Representa o Java Runtime Environment que é parte do OS X (e da
            Atualização de Software da Apple). Veja a <a href="http://www.apple.com/java">página da Apple sobre Java</a>
            para mais informações.</p>
          </li>
          <li>system-javaXXX-dev: [virtual package representing Java X.X.X development headers]
	    <p>
              Representa o Java SDK, o qual deve ser baixado manualmente de
              <a href="http://connect.apple.com">connect.apple.com</a> (é
              necessário registrar-se gratuitamente) e instalado. Caso você
              tenha atualizado seu Java Runtime Environment, pode ser que seu
              SDK não seja atualizado automaticamente (e talvez até mesmo
              removido!). Lembre-se de verificar (e baixar/instalar se
              necessário) o SDK após instalar ou atualizar seu Runtime
              Environment. Veja também <a href="comp-general.php?phpLang=pt#system-java">esta pergunta do FAQ</a>.</p>
          </li>
          <li>system-java3d: [pacote virtual representando o Java3D]</li>
          <li>system-javaai: [pacote virtual representando o Java Advanced Imaging]
            <p>Representa as extensões do Java para gráficos 3D e processamento
            de imagens, as quais precisam ser baixadas da Apple e instaladas
            manualmente. Veja a <a href="http://docs.info.apple.com/article.html?artnum=120289">página
            da Apple</a> para mais informações.</p>
          </li>
          <li>system-xfree86: [sinalizador para o X11 instalado pelo usuário]</li>
          <li>system-xfree86-shlibs: [sinalizador para as bibliotecas compartilhadas do X11 instaladas pelo usuário]
            <p>Representa o X11/Darwin da Apple, uma parte opcional do OS X
            (X11User.pkg). Estes pacotes proveem <code>x11</code> e
            <code>x11-shlib</code> respectivamente. Veja também <a href="comp-packages.php?phpLang=pt#cant-install-xfree">esta
            pergunta</a>.</p>
          </li>
          <li>system-xfree86-dev [sinalizador para as ferramentas de desenvolvimento do X11 instaladas pelo usuário]
            <p>Representa o SDK do X11 da Apple/XDarwin, uma parte opcional do
            OS X (X11SDK.pkg). Este pacote provê <code>x11-dev</code> Veja
            também <a href="comp-packages.php?phpLang=pt#cant-install-xfree">esta pergunta</a>.
	    </p>
          </li>
        </ul></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-packages.php?phpLang=pt">9. Problemas no uso de pacotes - Pacotes específicos</a></p>
<? include_once "../footer.inc"; ?>


