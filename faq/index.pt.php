<?
$title = "Perguntas frequentes";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/10/17 23:42:51';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="general.php?phpLang=pt" title="Perguntas gerais">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes sobre o Fink</h1>
    <p>Esta é a lista das perguntas frequentes sobre o Fink. Como na maior
    parte das listas de perguntas frqeuentes, algumas perguntas foram tiradas
    da vida e real e outras foram inventadas. Na verdade é mais uma
    documentação escrita de forma ad-hoc em um estilo pergunta+resposta.</p>

    <p>Este documento contém várias páginas, uma para cada seção. O sumário
    abaixo enumera todas as perguntas, cada qual com um link para a página da
    seção contendo a pergunta e a resposta correspondente.</p>
  <h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="general.php?phpLang=pt"><b>1 Perguntas gerais</b></a><ul><li><a href="general.php?phpLang=pt#what">1.1 O que é o Fink?</a></li><li><a href="general.php?phpLang=pt#naming">1.2 O que significa o nome Fink?</a></li><li><a href="general.php?phpLang=pt#bsd-ports">1.3 Qual a diferença entre o Fink e o mecanismo de ports do BSD
        (incluindo OpenPackages e GNU-Darwin)?</a></li><li><a href="general.php?phpLang=pt#usr-local">1.4 Por que o Fink não instala no /usr/local?</a></li><li><a href="general.php?phpLang=pt#why-sw">1.5 Por que vocês escolheram /sw?</a></li></ul></li><li><a href="relations.php?phpLang=pt"><b>2 Relacionamentos com outros projetos</b></a><ul><li><a href="relations.php?phpLang=pt#upstream">2.1 Vocês repassam suas correções e ajustes para os mantenedores
        oficiais?</a></li><li><a href="relations.php?phpLang=pt#debian">2.2 Qual o seu relacionamento com o projeto Debian? Vocês estão portando
        o Debian Linux para rodar no Mac OS X?</a></li><li><a href="relations.php?phpLang=pt#apple">2.3 Qual o seu relacionamento com a Apple</a></li><li><a href="relations.php?phpLang=pt#darwinports">2.4 Qual o seu relacionamento com o Darwinports?</a></li></ul></li><li><a href="mirrors.php?phpLang=pt"><b>3 Espelhos do Fink</b></a><ul><li><a href="mirrors.php?phpLang=pt#when-use">3.1 O que são os espelhos do Fink?</a></li><li><a href="mirrors.php?phpLang=pt#why">3.2 Por que eu deveria usar espelhos rsync?</a></li><li><a href="mirrors.php?phpLang=pt#where">3.3 Onde posso encontrar mais informações sobre espelhos do Fink?</a></li><li><a href="mirrors.php?phpLang=pt#when-not">3.4 Não consigo conectar-me a um servidor rsync, o que devo fazer?</a></li><li><a href="mirrors.php?phpLang=pt#otherinfogone">3.5 Eu mudei para o método rsync e agora todos os arquivos das árvores
        que não eram usadas foram eliminados</a></li><li><a href="mirrors.php?phpLang=pt#howswitch">3.6 Como posso alternar entre os métodos?</a></li><li><a href="mirrors.php?phpLang=pt#Master">3.7 O que é um espelho de distfiles (arquivos de distribuição)?</a></li></ul></li><li><a href="upgrade-fink.php?phpLang=pt"><b>4 Atualizando o Fink (resolução de problemas específicos a uma
    versão)</b></a><ul><li><a href="upgrade-fink.php?phpLang=pt#leopard-bindist1">4.1 O Fink não enxerga pacotes novos mesmo depois de eu rodar uma
        autoatualização via rsync ou CVS.</a></li><li><a href="upgrade-fink.php?phpLang=pt#leopard-bindist2">4.2 Quando eu tento instalar um pacote eu recebo a mensagem de erro
        'Can't resolve dependency "fink (&gt;= 0.28.0)"' (Não é possível resolver
        a dependência "fink (&gt;= 0.28.0)"</a></li></ul></li><li><a href="usage-fink.php?phpLang=pt"><b>5 Instalação, uso e manutenção do Fink</b></a><ul><li><a href="usage-fink.php?phpLang=pt#what-packages">5.1 Como posso saber quais os pacotes que o Fink suporta?</a></li><li><a href="usage-fink.php?phpLang=pt#proxy">5.2 Estou atrás de um firewall. Como configuro o Fink para usar um proxy
        HTTP?</a></li><li><a href="usage-fink.php?phpLang=pt#firewalled-cvs">5.3 Como faço para atualizar os pacotes disponíveis via CVS se eu
        estiver atrás de um firewall?</a></li><li><a href="usage-fink.php?phpLang=pt#moving">5.4 Posso mover o Fink para outro diretório após a instalação?</a></li><li><a href="usage-fink.php?phpLang=pt#moving-symlink">5.5 Se eu mover o Fink após instalá-lo e criar um link simbólico do
        diretório antigo, isso vai funcionar?</a></li><li><a href="usage-fink.php?phpLang=pt#removing">5.6 Como faço para desinstalar o Fink completamente?</a></li><li><a href="usage-fink.php?phpLang=pt#bindist">5.7 O banco de dados de pacote no site lista o pacote xxx mas nem o
        apt-get nem o dselect sabem desse pacote. Quem está mentindo?</a></li><li><a href="usage-fink.php?phpLang=pt#unstable">5.8 Há um pacote na árvore unstable e eu gostaria de instalá-lo mas o
        comando fink diz 'no package found' (nenhum pacote encontrado). Como
        posso instalá-lo?</a></li><li><a href="usage-fink.php?phpLang=pt#unstable-onepackage">5.9 Eu preciso <b>realmente</b> habilitar toda a árvore unstable só
        para instalar um pacote instável que eu queira?</a></li><li><a href="usage-fink.php?phpLang=pt#sudo">5.10 Estou cansado de ficar digitando a minha senha no sudo o tempo todo.
        Há alguma forma de contornar isso?</a></li><li><a href="usage-fink.php?phpLang=pt#exec-init-csh">5.11 Quando tento rodar o init.sh ou o init.csh, recebo a mensagem de
        erro "Permission denied" ("Permissão negada"). O que estou fazendo de
        errado?</a></li><li><a href="usage-fink.php?phpLang=pt#dselect-access">5.12 Preciso de ajuda! Eu usei a opção "[A]cesso" do menu do select e
        agora não consigo mais baixar pacotes!</a></li><li><a href="usage-fink.php?phpLang=pt#cvs-busy">5.13 Quando eu tento rodar <q>fink selfupdate</q> ou <q>fink
        selfupdate-cvs</q>, eu recebo a mensagem de erro "<code>Updating
        using CVS failed. Check the error messages above.</code>" ("<code>A
        atualização via CVS falhou. Verifique as mensagens de erro
        acima.</code>")</a></li><li><a href="usage-fink.php?phpLang=pt#kernel-panics">5.14 Quando uso o Fink, minha máquina trava/dá erro de kernel panic.</a></li><li><a href="usage-fink.php?phpLang=pt#not-found">5.15 Estou tentando instalar um pacote mas o Fink não consegue baixá-lo.
        O site de download mostra uma versão do pacote que é mais recente do
        que a versão que o Fink possui. O que devo fazer?</a></li><li><a href="usage-fink.php?phpLang=pt#fink-not-found">5.16 Quando eu executo o Fink ou qualquer coisa que tenha instalado
        através do Fink, recebo o erro <q>command not found</q>
        (<q>comando não encontrado</q>).</a></li><li><a href="usage-fink.php?phpLang=pt#invisible-sw">5.17 Eu quero esconder o diretório /sw no Finder para que os usuários não
        danifiquem a configuração do Fink.</a></li><li><a href="usage-fink.php?phpLang=pt#install-info-bad">5.18 Não consigo instalar nada porque recebo a seguinte mensagem de erro:
        "install-info: unrecognized option
        `--infodir=/sw/share/info'"</a></li><li><a href="usage-fink.php?phpLang=pt#bad-list-file">5.19 Não consigo instalar ou remover nada por causa de um problema com um
        "files list file" ("arquivo com lista de arquivos").</a></li><li><a href="usage-fink.php?phpLang=pt#dselect-garbage">5.20 Quando eu escolho pacotes no <code>dselect</code> aparece um
        monte de lixo. Como faço para usá-lo?</a></li><li><a href="usage-fink.php?phpLang=pt#cant-upgrade">5.21 Não consigo atualizar a versão do Fink.</a></li><li><a href="usage-fink.php?phpLang=pt#spaces-in-directory">5.22 Posso colocar o Fink em um volume ou um diretório cujo nome tenha um
        espaço em branco?</a></li><li><a href="usage-fink.php?phpLang=pt#packages-gz">5.23 Quando tento fazer uma atualização de binários, surgem várias
        mensagens com "File not found" ("Arquivo não encontrado") ou "Couldn't
        stat package source list file." ("Não foi possível acessar o arquivo
        com a lista de códigos fontes do pacote.").</a></li><li><a href="usage-fink.php?phpLang=pt#wrong-tree">5.24 Eu mudei meu OS | Xcode mas o Fink não reconhece a mudança.</a></li><li><a href="usage-fink.php?phpLang=pt#seg-fault">5.25 Estou recebendo erros com os aplicativos <code>gzip</code> |
        <code>dpkg-deb</code> do pacote <code>fileutils</code>.</a></li><li><a href="usage-fink.php?phpLang=pt#pathsetup-keeps-running">5.26 Quando abro uma janela do Terminal, recebo a mensagem "Your
        environment seems to be correctly set up for Fink already." ("Seu
        ambiente aparenta já estar corretamente configurado para o Fink") e em
        seguida a sessão é encerrada.</a></li><li><a href="usage-fink.php?phpLang=pt#ext-drive">5.27 Eu instalei o Fink em um volume que não o do sistema e agora não
        consigo atualizar o pacote Fink a partir do código fonte. Aparecem
        alguns erros envolvendo <q>chowname</q>.</a></li><li><a href="usage-fink.php?phpLang=pt#mirror-gnu">5.28 O Fink não consegue atualizar meus pacotes porque não pode encontrar
        o espelho 'gnu'.</a></li><li><a href="usage-fink.php?phpLang=pt#cant-move-fink">5.29 Não consigo atualizar o Fink porque ele não consegue mover o
        diretório <code>/sw/fink</code>.</a></li><li><a href="usage-fink.php?phpLang=pt#fc-cache">5.30 Recebo uma mensagem dizendo <q>No fonts found</q>.</a></li><li><a href="usage-fink.php?phpLang=pt#non-admin-installer">5.31 Não consigo instalar o Fink através do pacote de instalação porque
        recebo mensage de erro <q>volume doesn't support
        symlinks</q>.</a></li><li><a href="usage-fink.php?phpLang=pt#wrong-arch">5.32 Não consigo atualizar o Fink por causa do erro <q>package
        architecture (darwin-i386) does not match system
        (darwin-powerpc).</q></a></li></ul></li><li><a href="comp-general.php?phpLang=pt"><b>6 Problemas de Compilação - Geral</b></a><ul><li><a href="comp-general.php?phpLang=pt#compiler">6.1 Um script de configuração reclama que não consegue encontrar um
        "acceptable cc". O que é isso?</a></li><li><a href="comp-general.php?phpLang=pt#cvs">6.2 Quando tento executar o comando <code>fink selfupdate-cvs</code> eu
        recebo esta mensagem: "cvs: Command not found." ("cvs: Comando não
        encontrado").</a></li><li><a href="comp-general.php?phpLang=pt#missing-make">6.3 Estou recebendo uma mensagem de erro envolvendo o
        <code>make</code>.</a></li><li><a href="comp-general.php?phpLang=pt#head">6.4 Estou recebendo do comando head uma mensagem estranha. O que está
        errado?</a></li><li><a href="comp-general.php?phpLang=pt#also_in">6.5 Quando tento instalar um pacote, recebo uma mensagem de erro sobre
        tentativa de sobrescrita de um arquivo que está em outro pacote.</a></li><li><a href="comp-general.php?phpLang=pt#mv-failed">6.6 O que significa "execution of mv failed, exit code 1" quando eu
        tento compilar um pacote?</a></li><li><a href="comp-general.php?phpLang=pt#node-exists">6.7 Não consito instalar ou atualizar um pacote porque aparece uma
        mensagem dizendo que um nó já existe ("node already exists").</a></li><li><a href="comp-general.php?phpLang=pt#usr-local-libs">6.8 Ouvi dizer que bibliotecas e arquivos de cabeçalho instalados sob
        /usr/local causam problemas eventuais de compilação no Fink. É
        verdade?</a></li><li><a href="comp-general.php?phpLang=pt#toc-out-of-date">6.9 Quando tento compilar um pacote, recebo uma mensagem dizendo que um
        sumário ("table of contents") está desatualizado ("out of date"). O que
        preciso fazer?</a></li><li><a href="comp-general.php?phpLang=pt#fc-atlas">6.10 O Fink Commander trava quando tento instalar o pacote atlas.</a></li><li><a href="comp-general.php?phpLang=pt#basic-headers">6.11 Eu recebo mensagens dizendo que os arquivos
        <code>stddef.h</code> | <code>wchar.h</code> |
        <code>stdlib.h</code> | <code>crt1.o</code> estão
        faltando ou que meu compilador C não consegue criar executáveis
        (<q>C compiler cannot create executables</q>).</a></li><li><a href="comp-general.php?phpLang=pt#multiple-dependencies">6.12 Não consigo fazer uma atualização porque o Fink não consegue
        resolver conflito de versão ou dependências múltiplas ("unable to
        resolve version conflict on multiple dependencies").</a></li><li><a href="comp-general.php?phpLang=pt#dpkg-parse-error">6.13 Não consigo instalar nada porque recebo a mensagem "dpkg: parse
        error, in file `/sw/var/lib/dpkg/status'"!</a></li><li><a href="comp-general.php?phpLang=pt#freetype-problems">6.14 Estou recebendo erros envolvendo o freetype.</a></li><li><a href="comp-general.php?phpLang=pt#dlfcn-from-oo">6.15 Estou recebendo erros de compilação envolvendo "Dl_info".</a></li><li><a href="comp-general.php?phpLang=pt#gcc2">6.16 O Fink diz que está faltando <code>gcc2</code> ou
        <code>gcc3.1</code> mas não consigo instalá-lo.</a></li><li><a href="comp-general.php?phpLang=pt#system-java">6.17 O Fink apresenta a mensagem <code>Failed: Can't resolve dependency
        "system-java14-dev"</code> mas esse pacote não existe.</a></li><li><a href="comp-general.php?phpLang=pt#dpkg-split">6.18 Quando tento instalar qualquer pacote, recebo a mensagem <q>dpkg
        (subprocess): failed to exec dpkg-split to see if it's part of a
        multiparter: No such file or directory</q>. Como faço para corrigir
        isto?</a></li><li><a href="comp-general.php?phpLang=pt#xml-parser">6.19 Estou recebendo a seguinte mensagem: <q>configure: error:
        XML::Parser perl module is required for intltool</q>. O que preciso
        fazer?</a></li><li><a href="comp-general.php?phpLang=pt#master-problems">6.20 Estou tentando baixar um pacote mas o Fink vai para um site estranho
        com <q>distfiles</q> no nome e o arquivo não está lá.</a></li><li><a href="comp-general.php?phpLang=pt#compile-options">6.21 Quero que o Fink use opções diferentes na compilação de um
        pacote.</a></li><li><a href="comp-general.php?phpLang=pt#alternates">6.22 Sempre que tento compilar a partir do código fonte, o Fink fica
        reclamando sobre versões alternadas da mesma biblioteca.</a></li><li><a href="comp-general.php?phpLang=pt#python-mods">6.23 Estou recebendo erros com relação a
        <code>MACOSX_DEPLOYMENT_TARGET</code> quando tento compilar um módulo
        Python.</a></li><li><a href="comp-general.php?phpLang=pt#libtool-unrecognized-dynamic">6.24 Eu recebo erros <q>unrecognized option `-dynamic'</q> da
        <code>libtool</code>.</a></li></ul></li><li><a href="comp-packages.php?phpLang=pt"><b>7 Problemas de compilação - Pacotes específicos</b></a><ul><li><a href="comp-packages.php?phpLang=pt#libgtop">7.1 Um pacote não compila devido a erros em relação ao
        <code>sed</code>.</a></li><li><a href="comp-packages.php?phpLang=pt#cant-install-xfree">7.2 Eu quero mudar para os pacotes XFree86 do Fink mas não consigo
        instalar <code>xfree86-base</code> | <code>xfree86</code> devido a
        conflito com <code>system-xfree86</code>.</a></li><li><a href="comp-packages.php?phpLang=pt#change-thread-nothread">7.3 Como faço para mudar de uma versão sem threads do pacote XFree86 do
        Fink para uma versão com threads (ou vice-versa)?</a></li><li><a href="comp-packages.php?phpLang=pt#libiconv-gettext">7.4 Não consigo atualizar a <code>libiconv</code>.</a></li><li><a href="comp-packages.php?phpLang=pt#cplusplus-filt">7.5 Não consigo instalar um pacote porque está faltando o
        <code>c++filt</code>. De onde posso obtê-lo?</a></li><li><a href="comp-packages.php?phpLang=pt#gettext-tools">7.6 O Fink se recusa a atualizar o pacote <code>gettext</code>,
        reclamando que as dependências estão em um estado inconsistente.</a></li><li><a href="comp-packages.php?phpLang=pt#Leopard-libXrandr">7.7 Não consigo instalar o <b>gtk+2</b> no OS 10.5.</a></li><li><a href="comp-packages.php?phpLang=pt#all-others">7.8 Estou tendo problemas com um pacote que não está listado aqui.</a></li></ul></li><li><a href="usage-general.php?phpLang=pt"><b>8 Problemas no uso de pacotes - Geral</b></a><ul><li><a href="usage-general.php?phpLang=pt#xlocale">8.1 Estou recebendo várias mensagens como "locale not supported by C
        library" ("local não suportado por biblioteca C"). Isso é ruim?</a></li><li><a href="usage-general.php?phpLang=pt#passwd">8.2 Surgiram de repente vários usuários estranhos no meu sistema com
        nomes como "mysql", "pgsql" e "games". De onde eles vieram?</a></li><li><a href="usage-general.php?phpLang=pt#compile-myself">8.3 Como faço para compilar algo usando softwares instalados pelo
        Fink?</a></li><li><a href="usage-general.php?phpLang=pt#apple-x11-applications-menu">8.4 Não consigo rodar nenhuma dos meus aplicativos instalados via Fink
        quando uso o menu Applications (Aplicativos) do X11 da Apple.</a></li><li><a href="usage-general.php?phpLang=pt#x-options">8.5 Estou perplexo com as opções de X11: X11 da Apple, XFree86 etc. Qual
        devo instalar?</a></li><li><a href="usage-general.php?phpLang=pt#no-display">8.6 Quando tento rodar um aplicativo, recebo uma mensagem que diz
        "cannot open display:" ("não foi possível abrir o display:"). O que
        preciso fazer?</a></li><li><a href="usage-general.php?phpLang=pt#suggest-package">8.7 Não estou vendo meu programa favorito no Fink. Como faço para
        sugerir que um novo pacote seja incluído no Fink?</a></li><li><a href="usage-general.php?phpLang=pt#virtpackage">8.8 O que são esses "pacotes virtuais" <code>system-*</code> que às
        vezes estão presentes mas que não consigo eu mesmo instalar ou
        remover?</a></li></ul></li><li><a href="usage-packages.php?phpLang=pt"><b>9 Problemas no uso de pacotes - Pacotes específicos</b></a><ul><li><a href="usage-packages.php?phpLang=pt#xmms-quiet">9.1 Não consigo som no XMMS.</a></li><li><a href="usage-packages.php?phpLang=pt#nedit-window-locks">9.2 Se estou editando um arquivo no nedit, quando abro outro arquivo a
        janela abre mas não responde.</a></li><li><a href="usage-packages.php?phpLang=pt#xdarwin-start">9.3 Preciso de ajuda! Quando inicio o XDarwin, ele termina
        imediatamente!</a></li><li><a href="usage-packages.php?phpLang=pt#no-server">9.4 Quando tento iniciar o XDarwin eu recebo a mensagem "xinit: No such
        file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</a></li><li><a href="usage-packages.php?phpLang=pt#apple-x-delete">9.5 Quero que a tecla Delete no X11.app da Apple comporte-se como no
        XDarwin.</a></li><li><a href="usage-packages.php?phpLang=pt#apple-x11-wants-xfree86">9.6 Estou tendo problemas com X11 e Fink.</a></li><li><a href="usage-packages.php?phpLang=pt#special-x11-debug">9.7 Ainda estou tendo problemas com o X11 e o Fink.</a></li><li><a href="usage-packages.php?phpLang=pt#tiger-gtk">9.8 Sempre que uso um aplicativo GTK, recebo mensagens de erro em
        relação a <code>_EVP_idea_cbc</code>.</a></li><li><a href="usage-packages.php?phpLang=pt#yelp">9.9 Não consigo fazer funcionar a ajuda de nenhum aplicativo GNOME.</a></li></ul></li></ul>
<!--Generated from $Fink: faq.pt.xml,v 1.8 2009/10/17 23:42:51 monipol Exp $-->
<? include_once "../footer.inc"; ?>


