<?php
$title = "Perguntas frequentes - Compilação (2)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/04/05 5:48:20';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="usage-general.php?phpLang=pt" title="Problemas no uso de pacotes - Geral"><link rel="prev" href="comp-general.php?phpLang=pt" title="Problemas de Compilação - Geral">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 7. Problemas de compilação - Pacotes específicos</h1>
    
    
    <a name="libgtop">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.1: Um pacote não compila devido a erros em relação ao
        <code>sed</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Isto pode acontecer caso seu script de login (por exemplo,
        <code>~/.profile</code>) imprima algo no terminal, por exemplo
        "<code>echo Hello</code>" ou <code>xttitle</code>. Para livrar-se do
        problema, a solução fácil é comentar as linhas que imprimam na
        tela.</p><p>Se você quiser manter a impressão na tela, então você pode fazer
        algo parecido com</p><pre>if ( $?prompt) then 
	echo Hello 
endif</pre></div>
    </a>
    <a name="cant-install-xfree">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.2: Eu quero mudar para os pacotes XFree86 do Fink mas não consigo
        instalar <code>xfree86-base</code> | <code>xfree86</code> devido a
        conflito com <code>system-xfree86</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Infelizmente, todas as variantes do X11 realmente precisam ser
        instaladas em /usr/X11R6. Por causa disto, o pacote
        <code>xfree86-base</code> do Fink também é instalado lá. Entretanto,
        como o Fink não remove arquivos que não estejam em seu banco de dados,
        ele não irá substituir automaticamente uma instalação do X11 que não
        foi feita pelo Fink.</p><p>Proceda da seguinte forma:</p><p>1. Remova manualmente tudo relacionado ao XFree86. Isto pode ser
        feito com o comando</p><pre>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</pre><p>Se você está mudando do Apple X11, remova também o aplicativo
        X11.</p><p>2. Para obter o XFree86-4.2.1, instale o pacote
        <code>xfree86-base</code> da forma tradicional: "<code>fink
        install</code>" caso use códigos fontes, "<code>apt-get install</code>"
        or <code>dselect</code> para binários.</p><p>-ou-</p><p>2a. Para obter o XFree86-4.3.x ou mais recentes, instale o pacote
        <code>xfree86</code> através do comando <code>fink install
        xfree86</code> -- a versão mais recente (XFree86-4.4.x de 25/maio/2004)
        ainda não está na distribuição de binários e só está disponível na
        árvore unstable (veja <a href="/faq/usage-fink.php#unstable%5C">como
        instalar pacotes instáveis</a>).</p></div>
    </a>
    <a name="change-thread-nothread">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.3: Como faço para mudar de uma versão sem threads do pacote XFree86 do
        Fink para uma versão com threads (ou vice-versa)?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Se você está rodando a versão do XFree86 do Fink e quer trocar entre
        versões do Fink com ou sem threads, você precisa remover manualmente a
        versão antiga. Isto é feito através dos seguintes comandos:</p><pre>sudo dpkg -r --force-depends xfree86-base 
sudo dpkg -r --force-depends xfree86-shlibs 
sudo dpkg -r --force-depends xfree86-rootless 
sudo dpkg -r --force-depends xfree86-rootless-shlibs</pre><p>ou para remover as versões com threads:</p><pre>sudo dpkg -r --force-depends xfree86-base-threaded 
sudo dpkg -r --force-depends xfree86-shlibs-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs</pre><p>O Fink Commander também possui uma forma de remover pacotes. Na
        janela de fontes, selecione um pacote e então use a opção "<code>Force
        Remove</code>" do menu <code>Source Menu</code>.</p><p>Caso esteja usando o system-xfree86, veja como removê-lo na pergunta
        anterior.</p><p>Instale a versão do xfree86 que você deseja:</p><p><code>xfree86-base</code></p><p><code>xfree86-base-threaded</code></p><p>da forma usual: "<code>fink install</code>" para usuários de códigos
        fontes, "<code>apt-get install</code>" ou "<code>dselect</code>" para
        binários.</p></div>
    </a>
    <a name="libiconv-gettext">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.4: Não consigo atualizar a <code>libiconv</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Caso esteja recebendo erros no formato:</p><pre>libtool: link: cannot find the library `/sw/lib/libiconv.la'</pre><p>você pode resolver o problema executando os comandos</p><pre>fink remove gettext-dev
fink install libiconv</pre></div>
    </a>
    <a name="cplusplus-filt">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.5: Não consigo instalar um pacote porque está faltando o
        <code>c++filt</code>. De onde posso obtê-lo?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Caso esteja recebendo erros no formato</p><pre>xgcc: installation problem, cannot exec `c++filt': No such file or directory</pre><p>desde que atualizou para o Tiger, então você precisa fazer o
        seguinte:</p><ul>
          <li>Reinstale o <code>BSD.pkg</code> que está presente em sua mídia
          de instalação. Se o <code>/usr/bin/c++filt</code> não aparecer,
          continue tentando.</li>
        </ul><p>Talvez você precise verificar se não há artefatos antigos do
        Developer/Xcode Tools presentes em seu sistema:</p><ul>
          <li><b>10.4:</b> Elimine suas versões antigas do Xcode Tools
          através do comando
          <code>/Developer/Tools/uninstall-devtools.pl</code> em um terminal.
          Então (re)instale o Xcode (2.4.1 ou mais recente).</li>
          <li><b>10.5:</b> Elimine suas versões antigas do Xcode Tools
          através do comando <code>/Developer/Library/uninstall-devtools</code>
          em um terminal. Então (re)instale o Xcode (3.0 ou mais recente).</li>
        </ul></div>
    </a>
    <a name="gettext-tools">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.6: O Fink se recusa a atualizar o pacote <code>gettext</code>,
        reclamando que as dependências estão em um estado inconsistente.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Após executar o comando <code>fink selfupdate</code> para garantir
        que tenha as últimas versões, execute o comando <code>fink update
        gettext-tools</code>. Uma versão mais antiga do pacote
        <code>gettext-tools</code> pode estar impedindo a atualização do
        <code>gettext</code>.</p></div>
    </a>
  <a name="Leopard-libXrandr">
    <div class="question"><p><b><?php echo FINK_Q ; ?>7.7: Não consigo instalar o <b>gtk+2</b> no OS 10.5.</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Esse erro está normalmente relacionado a bibliotecas ausentes, tais
	  como <code>/usr/X11/lib/libXrandr.2.0.0.dylib</code> ou
	  <code>/usr/X11/lib/libXdamage.1.1.0.dylib</code> (ou outras
	  versões de bibliotecas em <code>/usr/X11/lib/</code>).</p><p>Até onde podemos perceber, a melhor forma de corrigir esse problema é
	  instalar o Xcode 3.1.3 ou mais recentes.</p></div>
  </a>
    <a name="all-others">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.8: Estou tendo problemas com um pacote que não está listado aqui.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Dado que problemas com pacotes tendem a ser transientes, decidimos
        colocá-los no wiki do Fink. Veja a <a href="http://wiki.finkproject.org/index.php/Fink:Package_issues">página
        de Problemas em pacotes (package issues)</a>.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=pt">8. Problemas no uso de pacotes - Geral</a></p>
<?php include_once "../footer.inc"; ?>


