<?php
$title = "Perguntas frequentes - Compilação (1)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/04/05 5:48:20';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="comp-packages.php?phpLang=pt" title="Problemas de compilação - Pacotes específicos"><link rel="prev" href="usage-fink.php?phpLang=pt" title="Instalação, uso e manutenção do Fink">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 6. Problemas de Compilação - Geral</h1>
    
    
    
    <a name="compiler">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.1: Um script de configuração reclama que não consegue encontrar um
        "acceptable cc". O que é isso?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Leia a documentação! Para compilar pacotes a partir do código fonte,
        você precisa instalar o Xcode que, dentre outros, contém o compilador
        C, <code>cc</code>.</p></div>
    </a>
    <a name="cvs">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.2: Quando tento executar o comando <code>fink selfupdate-cvs</code> eu
        recebo esta mensagem: "cvs: Command not found." ("cvs: Comando não
        encontrado").</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Você precisa instalar o Xcode.</p></div>
    </a>
    <a name="missing-make">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.3: Estou recebendo uma mensagem de erro envolvendo o
        <code>make</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Caso sua mensagem seja do formato</p><pre>make: command not found</pre><pre>(make: comando não encontrado)</pre><p>ou</p><pre>Can't exec "make": 
No such file or directory at /sw/lib/perl5/Fink/Services.pm line 190.</pre><p>Isso significa que você precisa instalar o Xcode.</p><p>Por outro lado, se sua mensagem de erro se parece com</p><pre>make: illegal option -- C</pre><pre>(make: opção ilegal -- C)</pre><p>então você substituiu a versão GNU do utilitário <code>make</code>
        que veio com o Xcode por uma versão BSD do make. Vários pacotes
        dependem de características especiais que são suportadas apenas pelo
        GNU make. Assegure-se de que <code>/usr/bin/make</code> é um link
        simbólico para <code>gnumake</code> e não <code>bsdmake</code>. Além
        disso, assegure-se de que <code>/usr/local/bin</code> não contenha
        outra cópia do <code>make</code>.</p></div>
    </a>
    <a name="head">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.4: Estou recebendo do comando head uma mensagem estranha. O que está
        errado?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Caso esteja vendo isto:</p><pre>Unknown option: 1 Usage: head [-options] &lt;url&gt;...</pre><pre>(Opção desconhecida: 1 Uso: head [-opções] &lt;url&gt;...</pre><p>seguido por uma lista de descrições de opções, você tem um
        executável do <code>head</code> quebrado. Isto acontece quando você
        instala a biblioteca libwww do Perl em um volume de sistema formatado
        com HFS+. Ele tenta criar um novo comando <code>/usr/bin/HEAD</code>
        que sobrescreve o comando <code>head</code> já existente porque o
        sistema de arquivos não diferencia maiúsculas de minúsculas.
        <code>head</code> é um comando padrão usado em muitos scripts de shell
        e Makefiles. Você precisa restaurar o executável original do
        <code>head</code> caso queira usar o Fink.</p><p>O script de instalação inicial do Fink a partir do código fonte
        verifica isso mas ainda assim é possível caso você use a instalação
        binária na primeira instalação ou instale libwww depois de haver
        instalado o Fink.</p><p>Este problema também já foi relatado devido à instalação de
        <code>/sw/bin/HEAD</code> (mas não por um pacote do Fink). Isto
        é fácil de resolver: renomeie <code>/sw/bin/HEAD</code>.</p></div>
    </a>
    <a name="also_in">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.5: Quando tento instalar um pacote, recebo uma mensagem de erro sobre
        tentativa de sobrescrita de um arquivo que está em outro pacote.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Isto acontece ocasionalmente com pacotes múltiplos (isto é, pacotes
        que são divididos em -dev, -shlibs etc) quando um arquivo é movido de
        um pacote para outro (por exemplo, de <code>foo</code> para
        <code>foo-shlibs</code>). O que você pode fazer é sobrescrever o
        arquivo com aquele do pacote que você esteja tentando instalar (já que
        eles são nominalmente o mesmo arquivo):</p><pre>sudo dpkg -i --force-overwrite <b>nomedoarquivo</b></pre><p>onde <b>nomedoarquivo</b> é o arquivo .deb correspondente ao
        pacote que você esteja tentando instalar.</p></div>
    </a>
    <a name="mv-failed">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.6: O que significa "execution of mv failed, exit code 1" quando eu
        tento compilar um pacote?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Se você tiver o StuffIt Pro instalado, pode ser que voce tenha o
        modo "Archive via Real Name" ("Arquivar pelo Nome Real") habilitado.
        Verifique o painel StuffIt na ferramenta Preferências do Sistema e
        desabilite "ArchiveViaRealName" se estiver habilitado. Ele contém uma
        reimplementação falha de algumas chamadas de sistema importante que
        causam erros estranhos e transientes, como esse.</p><p>Caso contrário, um erro no <code>mv</code> geralmente
        significa que outro erro anterior ocorreu durante a compilação mas a
        compilação não foi interrompiada. Para rastrear os arquivos que
        causaram o erro, procure na saída pela compilação de um arquivo que não
        exista. Por exemplo, se você tiver algo parecido com:</p><pre>mv /sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib \
/sw/src/root-foo-shlibs-0.1.2-3/sw/lib/ 
mv: cannot stat `/sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib': 
No such file or directory 
### execution of mv failed, exit code 1 
Failed: installing foo-0.1.2-3 failed</pre><p>então você deve procurar por <code>libbar</code> em algum
        lugar mais acima da lista de mensagens que aparecem durante a
        tentativa de compilação.</p></div>
    </a>
    <a name="node-exists">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.7: Não consito instalar ou atualizar um pacote porque aparece uma
        mensagem dizendo que um nó já existe ("node already exists").</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Estes erros se parecem com o seguinte:</p><pre>Failed: Internal error: node for system-xfree86 already exists</pre><p>O problema é que o mecanismo de dependências está confuso devido a
        mudanças em alguns dos arquivos de descrição de pacotes. Para
        corrigi-lo:</p><ul>
          <li>
            <p>Force a remoção do pacote causador do problema, por exemplo:</p>
            <pre>sudo dpkg -r --force-all system-xfree86</pre>
            <p>para o exemplo listado acima.</p>
          </li>
          <li>
            <p>Tente instalar ou atualizar novamente. Em algum momento uma
            pergunta envolvendo uma dependência virtual ("virtual dependency")
            aparecerá incluindo o pacote que você acabou de morever. Selecione
            o pacote e ele será reinstalado durante sua compilação.</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local-libs">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.8: Ouvi dizer que bibliotecas e arquivos de cabeçalho instalados sob
        /usr/local causam problemas eventuais de compilação no Fink. É
        verdade?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Este é uma fonte de problemas frequente porque o script de
        configuração dos pacotes encontra arquivos de cabeçalho e bibliotecas
        em <code>/usr/local</code> e decide usá-los no lugar daqueles
        que residem no diretório do Fink. Se você estiver tendo problemas de
        compilação que não são cobertos por outra pergunta deste documento,
        você deve verificar se você tem bibliotecas em
        <code>/usr/local/lib</code> ou arquivos de cabeçalho em
        <code>/usr/local/include</code>. Em caso afirmativo, tente
        renomear <code>/usr/local</code> para algum outro nome, por
        exemplo</p><pre>sudo mv /usr/local /usr/local.moved</pre><p>proceda sua compilação e então volte ao nome original de
        <code>/usr/local</code>:</p><pre>sudo mv /usr/local.moved /usr/local</pre><p>Starting with macOS 10.14, it's sometimes not possible to rename <code>/usr/local</code>. If you get an error when renaming <code>/usr/local</code> directly, then rename the subdirectories inside it instead:</p><pre>
        sudo mv /usr/local/include /usr/local/include.moved
        sudo mv /usr/local/lib /usr/local/lib.moved
        </pre><p>do your build, and then you can put <code>/usr/local/include</code> and <code>/usr/local/lib</code>
        back:</p><pre>
        sudo mv /usr/local/include.moved /usr/local/include
        sudo mv /usr/local/lib.moved /usr/local/lib
        </pre></div>
    </a>
    <a name="toc-out-of-date">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.9: Quando tento compilar um pacote, recebo uma mensagem dizendo que um
        sumário ("table of contents") está desatualizado ("out of date"). O que
        preciso fazer?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> A saída dá uma dica de o que fazer. A mensagem é geralmente parecida
        com:</p><pre>ld: table of contents for archive: 
/sw/lib/libintl.a is out of date; 
rerun ranlib(1) (can't load from it)</pre><p>O que você precisa fazer é executar o comando ranlib como root em
        qualquer biblioteca que esteja causando o problema. Por exemplo, para o
        caso acima, você executaria:</p><pre>sudo ranlib /sw/lib/libintl.a</pre></div>
    </a>
    <a name="fc-atlas">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.10: O Fink Commander trava quando tento instalar o pacote atlas.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Isto acontece porque um dos passos durante a compilação do pacote
        <code>atlas</code> faz uma pergunta ao usuário que o Fink Commander não
        detecta. Você terá que executar o comando <code>fink install
        atlas</code> no lugar de instalá-lo pelo Fink Commander.</p></div>
    </a>
    <a name="basic-headers">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.11: Eu recebo mensagens dizendo que os arquivos
        <code>stddef.h</code> | <code>wchar.h</code> |
        <code>stdlib.h</code> | <code>crt1.o</code> estão
        faltando ou que meu compilador C não consegue criar executáveis
        (<q>C compiler cannot create executables</q>).</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ambos estes problemas são geralmente devidos à ausência de arquivos
        de cabeçalho essenciais que são providos pelo pacote DevSDK do Xcode.
        Verifique se <code>/Library/Receipts/DevSDK.pkg</code> existe
        no seu sistema. Em caso negativo, execute novamente o instalador do
        Xcode e instale o pacote DevSDK através do Custom Install (instalação
        customizada).</p><p>O erro <q>cannot create executables</q> também pode ocorrer
        quando sua versão do Xcode é para uma versão anterior do OS.</p></div>
    </a>
    <a name="multiple-dependencies">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.12: Não consigo fazer uma atualização porque o Fink não consegue
        resolver conflito de versão ou dependências múltiplas ("unable to
        resolve version conflict on multiple dependencies").</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Para contornar este problema, tente atualizar um único pacote e
        então tente usar novamente o <code>fink update-all</code>. Se você
        ainda receber a mensagem, repita o processo.</p></div>
    </a>
    <a name="dpkg-parse-error">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.13: Não consigo instalar nada porque recebo a mensagem "dpkg: parse
        error, in file `/sw/var/lib/dpkg/status'"!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> This means that somehow your dpkg database got damaged, usually
        from a crash or some other unrecoverable error.  This most often occurs with a buildlock, e.g:</p><pre>package `fink-buildlock-foo-1.2.3-4':  missing version</pre><p>(of course, replace <code>foo-1.2.3-4</code> with the package name you are seeing).</p><p>When this happens, you should edit <code>/sw/var/lib/dpkg/status</code> as a superuser.
	Then go near the line number which shows up in the error message.
	You should see a <code>fink-buildlock-foo-1.2.3-4</code>
        package whose <code>Status</code> field is marked</p><pre>install ok installed</pre><p>Change that to</p><pre>purge ok not-installed</pre><p>Under other circumstances, there may be garbage in the file.  You can fix this situation by
        copying the previous version of the database, like so:</p><pre>sudo cp /sw/var/lib/dpkg/status-old /sw/var/lib/dpkg/status</pre><p>You may need to re-install the last couple of packages you
        installed before the problem started occurring.</p></div>
    </a>
    <a name="freetype-problems">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.14: Estou recebendo erros envolvendo o freetype.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Existem muitas variedades desses erros. Se você receber o
        seguinte:</p><pre>/usr/bin/ld: can't locate file for: -lfreetype</pre><p>verifique se você tem um executável
        <code>freetype-config</code> perdido através do comando</p><pre>type -a freetype-config</pre><p>caso esteja usando <code>bash</code> ou</p><pre>where freetype-config</pre><p>caso esteja usando <code>tcsh</code>. Sabe-se que o
        framework Mono instala um <code>/usr/bin/freetype-config</code>
        que é um link simbólico para o arquivo que está nesse framework.</p><p>Caso seu erro se pareça com o seguinte:</p><pre>/sw/include/pango-1.0/pango/pangoft2.h:52: 
error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:57:
error: parse error before '*' token
/sw/include/pango-1.0/pango/pangoft2.h:61: 
error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:86: 
error: parse error before "pango_ft2_font_get_face"
/sw/include/pango-1.0/pango/pangoft2.h:86: 
warning: data definition has no type or storage class 
make[2]: *** [rsvg-gz.lo] Error 1
make[1]: *** [all-recursive] Error 1 
make: *** [all-recursive-am] Error 2 
### execution of make failed, exit code 2 
Failed: compiling librsvg2-2.4.0-3 failed</pre><p>ou</p><pre>In file included from vteft2.c:32: 
vteglyph.h:64: error:
parse error before "FT_Library" 
vteglyph.h:64: warning: 
no semicolon at end of struct or union vteft2.c: 
In function `_vte_ft2_get_text_width': 
vteft2.c:236: error: 
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_get_text_height':
vteft2.c:244: error: 
dereferencing pointer to incomplete type
vteft2.c: In function `_vte_ft2_get_text_ascent': 
vteft2.c:252: error:
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_draw_text': 
vteft2.c:294: error: 
dereferencing pointer to incomplete type 
vteft2.c:295: error: 
dereferencing pointer to incomplete type
make[2]: *** [vteft2.lo] Error 1 
make[1]: *** [all-recursive] Error 1 
make: *** [all] Error 2 
### execution of make failed, exit code 2
Failed: compiling vte-0.11.10-3 failed</pre><p>ou</p><pre>checking for freetype-config.../usr/X11R6/bin/freetype-config 
checking For sufficiently new FreeType (at least 2.0.1)... no 
configure: error: pangoxft 
Pango backend found but did not find freetype libraries 
make: *** No targets specified and no makefile found. Stop. 
### execution of LD_TWOLEVEL_NAMESPACE=1 failed, exit code 2 
Failed: compiling gtk+2-2.2.4-2 failed</pre><p>o problema é devido a uma confusão entre arquivos cabeçalhos de 
        pacote <code>freetype</code> | <code>freetype-hinting</code> e os
        arquivos de cabeçalho do <code>freetype2</code> que são parte do X11 |
        XFree86. O comando</p><pre>fink remove freetype freetype-hinting</pre><p>removerá qualquer variante que você haja instalado. Por outro lado,
        se seu erro é parecido com:</p><pre>ld: Undefined symbols: _FT_Access_Frame</pre><p>isto é normalmente devido a um arquivo residual de uma instalação
        prévia do X11. Reinstale o X11 SDK.</p></div>
    </a>
    <a name="dlfcn-from-oo">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.15: Estou recebendo erros de compilação envolvendo "Dl_info".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Se você tem um erro parecido com</p><pre>unix_dl.c: In function `rep_open_dl_library':
unix_dl.c:328: warning: assignment discards qualifiers from pointer target type 
unix_dl.c: In function `rep_find_c_symbol': 
unix_dl.c:466: error: `Dl_info' undeclared (first use in this function)
unix_dl.c:466: error: (Each undeclared identifier is reported only once 
unix_dl.c:466: error: for each function it appears in.)
unix_dl.c:466: error: parse error before "info" 
unix_dl.c:467: error: `info' undeclared (first use in this function) 
make[1]: *** [unix_dl.lo] Error 1</pre><p>então o mais provável é que você tenha um arquivo de cabeçalho
        <code>/usr/local/include/dlfcn.h</code> que é incompatível com o
        Panther. Tire-o do caminho.</p><p>Normalmente, ele é instalado pelo OpenOffice e você deve substituir
        esse arquivo de cabeçalho, bem como a biblioteca
        <code>/usr/local/lib/libdl.dylib</code>, por links simbólicos aos
        arquivos providos pelo Panther:</p><pre>sudo ln -s /usr/include/dlfcn.h /usr/local/include/dlfcn.h
sudo ln -s /usr/lib/libdl.dylib /usr/local/lib/libdl.dylib</pre></div>
    </a>
    <a name="gcc2">
      
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.16: O Fink diz que está faltando <code>gcc2</code> ou
        <code>gcc3.1</code> mas não consigo instalá-lo.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Isto é porque <code>gcc2</code> e
        <code>gcc3.1</code> são pacotes virtuais que indicam a presença
        de gcc-2.95 e gcc-3.1, respectivamente, em seu sistema. Instale o
        pacote gcc2.95 e/ou o gcc.31 do Xcode Tools (versões anteriores do OS
        possuem gcc-2.95 e gcc-3.1 como parte da instalação principal do
        Developer Tools).</p><p><b>Observação:</b> instalar o gcc2.95 ou gcc3.1 não interferirá
        com seu compilador gcc3.3--eles podem coexistir.</p></div>
    </a>
    <a name="system-java">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.17: O Fink apresenta a mensagem <code>Failed: Can't resolve dependency
        "system-java14-dev"</code> mas esse pacote não existe.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> É porque é um pacote virtual. Esse tipo de erro acontece quando o
        Java é atualizado pelo Atualização de Software: os arquivos de
        cabeçalho são removidos, o que faz com que o pacote -dev não seja
        gerado.</p><p>Você precisa baixar o pacote <code>Java Developer
        Tools</code> apropriado do site da <a href="http://connect.apple.com">Apple</a>. Neste caso específico, o
        pacote é <code>Java 1.4.2 Developer Tools</code>.</p></div>
    </a>
    <a name="dpkg-split">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.18: Quando tento instalar qualquer pacote, recebo a mensagem <q>dpkg
        (subprocess): failed to exec dpkg-split to see if it's part of a
        multiparter: No such file or directory</q>. Como faço para corrigir
        isto?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Isto geralmente pode ser corrigido através da configuração correta
        do ambiente conforme <a href="usage-fink.php?phpLang=pt#fink-not-found">esta pergunta</a>.</p></div>
    </a>
    <a name="xml-parser">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.19: Estou recebendo a seguinte mensagem: <q>configure: error:
        XML::Parser perl module is required for intltool</q>. O que preciso
        fazer?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Caso esteja usando a árvore unstable, assegure-se de ter instalado o
        intltool-0.34.1 ou mais recente.</p><p>Caso contrário, você precisa assegurar-se de ter a variante correta
        do pacote xml-parser-pm que case com a versão do Perl em seu sistema.
        Por exemplo, se você estiver no Panther você deveria ter
        <code>xml-parser-pm581</code> no lugar de <code>xml-parser-pm560</code>
        (você também pode ter o substituto <code>xml-parser-pm</code>), já que
        você tem o <code>Perl-5.8.1</code> no lugar de <code>Perl-5.6.0</code>
        Se estiver no Jaguar e estiver usando a versão padrão do Perl para o
        sistema, você terá a variante <code>pm560</code> e se você instalou o
        <code>Perl 5.8.0</code> você pode ter a variante
        <code>pm580</code>.</p></div>
    </a>
    <a name="master-problems">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.20: Estou tentando baixar um pacote mas o Fink vai para um site estranho
        com <q>distfiles</q> no nome e o arquivo não está lá.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> O que aconteceu aqui é que o Fink está tentando usar um dos seus
        espelhos <q>mestres</q>. Eles foram configurados para garantir
        que códigos fontes dos pacotes do Fink estejam disponíveis mesmo que os
        sites oficiais os tenham mudado de lugar. Normalmente esses erros
        ocorrem quando uma nova versão oficial de um pacote é lançada mas ainda
        não chegou aos espelhos mestres.</p><p>Para remediar esta situação, execute o comando <code>fink
        configure</code> e defina a ordem de pesquisa para que use os espelhos
        mestres por último.</p></div>
    </a>
    <a name="compile-options">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.21: Quero que o Fink use opções diferentes na compilação de um
        pacote.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> A primeira coisa a fazer é entrar em contato com o mantenedor do
        pacote para solicitar uma variante. Isto pode ser relativamente fácil
        de ser feito. Caso você não obtenha resposta do mantenedor ou não veja
        os pacotes novos, ou queira tentar uma opção diferente por você mesmo,
        leia o <a href="/doc/quick-start-pkg/index.php">Tutorial
        de empacotamento</a> e o <a href="/doc/packaging/index.php">Manual de
        empacotamento</a>.</p><p><b>Observação: </b> o Fink é deliberadamente configurado para que
        todos os binários oficiais sejam idênticos independentemente da máquina
        em que foram compilados, portanto opções como otimização para o G5 não
        acontecerão com um pacote oficial. Caso as queira, você terá que
        fazê-las por sua própria conta.</p></div>
    </a>
    <a name="alternates">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.22: Sempre que tento compilar a partir do código fonte, o Fink fica
        reclamando sobre versões alternadas da mesma biblioteca.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> É comum que, em uma árvore de compilação complicada, você descubra
        que alguns pacotes dependem de uma versão específica de uma biblioteca
        e outros dependam em uma versão diferente (por exemplo,
        <code>db47</code> vs. <code>db44</code>). Consequentemente, o Fink pode
        tentar trocar para aquela que não estiver instalada atualmente de forma
        a satisfazer a dependência de compilação do pacote que você deseja
        atualizar.</p><p>Infelizmente, devido a limitações do mecanismo de dependências de
        compilação, você pode encontrar a famigerada mensagem</p><pre>Fink::SysState: Could not resolve inconsistent dependencies</pre><p>ao tentar um <code>update-all</code> suficientemente complicado.
        Esta situação geralmente lhe fornece um comando para tentar resolver o
        problema:</p><pre>fink scanpackages
sudo apt-get update
sudo apt-get install foo=1.23-4</pre><p>mas isto pode não funcionar para atualizações suficientemente
        complicadas. Você talvez precise atualizar pacotes um-a-um, ao menos
        por algum tempo.</p></div>
    </a>
    <a name="python-mods">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.23: Estou recebendo erros com relação a
        <code>MACOSX_DEPLOYMENT_TARGET</code> quando tento compilar um módulo
        Python.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Para erros parecidos com:</p><pre>running build
running build_ext
Traceback (most recent call last):
  File "setup_socket_ssl.py", line 21, in ?
    depends = ['socketmodule.h'] )
  File "/sw/src/root-python24-2.4.1-1/sw/lib/python2.4/distutils/core.py", line 166, in setup
SystemExit: error: $MACOSX_DEPLOYMENT_TARGET mismatch: now "10.4" but "10.3" during configure
### execution of /sw/bin/python2.4 failed, exit code 1</pre><p>o problema ocorre porque os pacotes <code>python2*</code> gravam o
        <code>MACOSX_DEPLOYMENT_TARGET</code> atual em um arquivo de
        configuração quando são compilados e os utilitários de compilação do
        python usam esse valor quando compilam módulos. Isto significa que você
        tem, por exemplo, um pacote <code>python24</code> no OS 10.4 que foi
        compilado no OS 10.3, ocorrendo tanto na atualização 10.3 =&gt; 10.4,
        ou através da distribuição binária <b>10.4-transitional</b>, na qual
        o <code>python24</code> não foi recompilado, havendo portanto uma
        diferença entre o que o python acha que
        <code>MACOSX_DEPLOYMENT_TARGET</code> deveria ser (10.3) e o que
        realmente é (10.4).</p><p>A solução é recompilar o pacote <code>python</code> que esteja
        causando problema, por exemplo <code>fink rebuild python24</code> para
        o caso acima.</p><p>Para erros em tempo de execução que exibem o mesmo tipo de mensagem
        de erro acima, recompile o módulo após recompilar o pacote
        <code>python2*</code> apropriado.</p></div>
    </a>
    <a name="libtool-unrecognized-dynamic">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.24: Eu recebo erros <q>unrecognized option `-dynamic'</q> da
        <code>libtool</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> O erro</p><pre> libtool: unrecognized option `-dynamic'</pre><p>normalmente significa que você substituiu a
        <code>/usr/bin/libtool</code> da Apple por uma
        <code>libtool</code> GNU. Infelizmente, as duas
        <code>libtools</code> <b>não</b> funcionam da mesma forma.</p><p>A única maneira de resolver este problema é obter uma
        <code>libtool</code> da Apple que funcione. Ela é instalada
        como parte do pacote <code>DeveloperTools.pkg</code> das
        ferramentas do Xcode e você pode reinstalar todo o pacote se primeiro
        limpar seu arquivo de receita em <code>/Library/Receipts</code>
        (arraste-o para a Lixeira).</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="comp-packages.php?phpLang=pt">7. Problemas de compilação - Pacotes específicos</a></p>
<?php include_once "../footer.inc"; ?>


