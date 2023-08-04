<?php
$title = "Guia do usuário - A ferramenta fink";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Guia do usuário Contents"><link rel="prev" href="conf.php?phpLang=pt" title="O arquivo de configuração do Fink">';


include_once "header.pt.inc";
?>
<h1>Guia do usuário - 6. Usando a ferramenta fink a partir da linha de comando</h1>
    
    

    <h2><a name="using">6.1 Usando a ferramenta fink</a></h2>
      

      <p>A ferramenta <code>fink</code> usa vários comandos para operar em
      pacotes de uma distribuição de códigos abertos. Alguns comandos requerem
      o nome de ao menos um pacote mas podem operar em vários nomes de pacotes
      de uma vez só. Você pode especificar apenas o nome do pacote (por
      exemplo, gimp) ou um nome completamente qualificado com o número da
      versão (por exemplo, gimp-1.2.1) ou com os números de versão e revisão
      (por exemplo, gimp-1.2.1-3). O Fink irá escolher automaticamente a última
      versão e revisão disponível caso não tenham sido especificadas. Outros
      comandos possuem opções diferentes.</p>

      <p>Apresentamos a seguir a lista de comandos da ferramenta
      <code>fink</code>.</p>
    

    <h2><a name="options">6.2 Opções globais</a></h2>
      

      <p>Há algumas opções que são aplicáveis a todos os comandos do fink. Se
      você digitar <code>fink --help</code> você obterá a lista de opções:</p>

      <p>(no contexto da versão <code>fink-0.26.0</code>)</p>

      <p><b>-h, --help</b> - exibe texto de ajuda.</p>

      <p><b>-q, --quiet</b>  - faz com que o <code>fink</code> exiba menos
      informações, o contrário de <b>--verbose</b>.  Sobrescreve a opção
      <a href="conf.php?phpLang=pt#optional">Verbose</a> em
      <code>fink.conf</code>.</p>

      <p><b>-V, --version</b> - exibe informações sobre a versão.</p>

      <p><b>-v, --verbose</b> - faz com que o <code>fink</code> exiba mais informações, o contrário de
      <b>--quiet</b>.  Sobrescreve a opção <a href="conf.php?phpLang=pt#optional">Verbose</a> em <code>fink.conf</code>.</p>

      <p><b>-y, --yes</b> - nas perguntas interativas, responde
      automaticamente com a resposta padrão.</p>

      <p><b>-K, --keep-root-dir</b>   - Faz com que o <code>fink</code> não
      remova o diretório <code>raiz-[nome]-[versão]-[revisão]</code> em
      <a href="conf.php?phpLang=pt#optional">Buildpath</a> após compilar um
      pacote. Corresponde à opção <a href="conf.php?phpLang=pt#developer">KeepRootDir</a> no arquivo
      <code>fink.conf</code>.</p>

      <p><b>-k, --keep-build-dir</b>  - Faz com que o <code>fink</code> não
      remova o diretório <code>[nome]-[versão]-[revisão]</code> em
      <a href="conf.php?phpLang=pt#optional">Buildpath</a> após compilar um
      pacote. Corresponde à opção <a href="conf.php?phpLang=pt#developer">KeepBuildDir</a> no arquivo
      <code>fink.conf</code>.</p>

      <p><b>-b, --use-binary-dist</b> - faz o download de pacotes
      pré-compilados na distribuição de binários caso estejam disponíveis (por
      exemplo, para diminuir o tempo de compilação ou utilização do disco).
      Note que este modo instrui o fink a baixar a versão procurada caso ela
      esteja disponível para download; o modo não faz com que o fink escolha
      uma versão qualquer que esteja disponível sob a forma de binário.
      Corresponde à opção <a href="conf.php?phpLang=pt#downloading">UseBinaryDist</a> no arquivo
      <code>fink.conf</code>.</p>

      <p><b>--no-use-binary-dist</b> - Não usa pacotes binários
      pré-compilados da distribuição de binários, o oposto da opção
      --use-binary-dist. Este é o comportamento padrão a menos que haja sido
      sobrescrito por <code>UseBinaryDist: true</code> no arquivo de
      configuração <code>fink.conf</code>.</p>
      
      <p><b>--build-as-nobody</b> - Usa um usuário sem privilégios
      administrativos durante o processo de extrair, ajustar, compilar e
      instalar pacotes. Note que os pacotes compilados com esta opção podem não
      funcionar corretamente. Esta opção deve ser usada apenas para
      desenvolvimento de pacotes e depuração de erros.</p>
      
      <p><b>-m, --maintainer</b> (<code>fink-0.25</code> e mais recentes)
      Executa ações úteis para mantenedores de pacotes: efetua a validação do
      arquivo <code>.info</code> antes de começar a compilação e no
      arquivo <code>.deb</code> após compilar um pacote; faz com que
      alguns avisos de tempo de compilação se tornem erros fatais;
      (<code>fink-0.26</code> e mais recentes) executa as suítes de testes
      conforme especificado no campo, fazendo com que <b>--tests</b> e
      <b>--validate</b> estejam <code>on</code>.</p>

      <p><b>--tests[=on|off|warn]</b> - (<code>fink-0.26.0</code> e mais
      recentes) Faz com que os campos <code>InfoTest</code> sejam ativados e as
      suítes de testes especificadas via <code>TestScript</code> sejam
      executadas (veja o <a href="../packaging/reference.php#fields">Manual de
      empacotamento para o Fink</a>). Se nenhum argumento for informado
      para esta opção ou se o argumento estiver <code>on</code>, então falhas
      nas suítes de testes serão consideradas erros fatais durante a
      compilação. Se o argumento for <code>warn</code> então as falhas serão
      tratadas como avisos.</p>
      
      <p><b>--validate[=on|off|warn]</b> - Faz com que os pacotes sejam
      validados durante a compilação. Se nenhum argumento for fornecido a esta
      opção ou se o argumento for <code>on</code>, então falhas de validação
      serão consideradas erros fatais durante a compilação. Se o argumento for
      <code>warn</code>, então falhas serão tratadas como avisos.</p>

      <p><b>-l, --log-output</b> - Guarda uma cópia da saída do terminal
      durante cada processo de compilação de pacote. Por padrão, o arquivo é
      armazenado em
      <code>/tmp/fink-build-log_[nome]-[versão]-[revisão]_[data]-[hora]</code>
      mas a opção <b>--logfile</b> pode ser usada para especificar um nome
      alternativo.</p>

      <p><b>--no-log-output</b> - Não guarda uma cópia da saída do terminal
      durante a compilação de pacotes, o oposto da opção <b>--log-output</b>.
      É o padrão.</p>

      <p><b>--logfile=nomedearquivo</b> - Guarda os logs de compilação de
      pacotes no arquivo <code>nomedearquivo</code> no lugar do arquivo
      padrão (veja a opção <b>--log-output</b>, que é implicitamente ativada
      pela opção <b>--logfile</b>). Você pode usar os códigos de expansão %
      para incluir automaticamente informações específicas do pacote. Uma lista
      completa de códigos de expansão está disponível no <a href="../packaging">Manual de
      empacotamento do Fink</a>; alguns códigos de expansão são:</p>

      <ul>
        <li><b>%n</b> - nome do pacote</li>
        <li><b>%v</b> - versão do pacote</li>
        <li><b>%r</b> - revisão do pacote</li>
      </ul>

      <p><b>-t, --trees=expr</b> - Considera apenas os pacotes em árvores que
      casem com <b>expr</b>. O formato de expr é uma lista de especificações
      de árvores separadas por vírgula. Árvores listadas em
      <code>fink.conf</code> são comparadas com <b>expr</b>. Somente
      aquelas que casarem com pelo menos uma das especificações são
      consideradas pelo <code>fink</code>, na ordem da primeira especificação
      com que casarem. Se a opção <b>--trees</b> for usada, todas as árvores
      listadas em <code>fink.conf</code> são incluídas em ordem. Uma
      especificação de árvore pode conter o caracter barra (/), sendo que neste
      caso é necessário um casamento exato com uma árvore. Por exemplo,
      <b>--trees=unstable/main</b> casaria somente com a árvore
      <b>unstable/main</b>, enquanto que <b>--trees=unstable</b> casaria
      tanto com <b>unstable/main</b> quanto com <b>unstable/crypto</b>. Há
      algumas especificações mágicas que podem ser incluídas em
      <b>expr</b>:</p>

      <ul>
        <li><b>status</b> - Inclui pacotes no banco de dados de status do
        dpkg.</li>

        <li><b>virtual</b> - Inclui pacotes virtuais que refletem as
        características do sistema.</li>
      </ul>

      <p>Exclusão (ou falha de inclusão) dessas árvores mágicas só são
      suportadas atualmente para operações que não instalem ou removam
      pacotes.</p>

      <p><b>-T, --exclude-trees=expr</b> Considera apenas pacotes em árvores
      que não casem com <b>expr</b>. A sintaxe de <b>expr</b> é a mesma de
      <b>--trees</b>, incluindo as especificações mágicas. Entretanto, as
      árvores que casarem são excluídas no lugar de incluídas. Note que árvores
      que casem tanto com <b>--trees</b> quanto com <b>--exclude-trees</b>
      são excluídas.</p>

      <p>Exemplos de <b>--trees</b> e <b>--exclude-trees</b>:</p>

      <ul>
        <li>
          <code>fink --trees=stable,virtual,status install <b>foo</b></code> 

          <p>Instala <b>foo</b> como se o <code>fink</code> estivesse usando
          a árvore stable mesmo que unstable esteja habilitada em
          <code>fink.conf</code>.</p>
        </li>

        <li>
          <code>fink --exclude-trees=local install <b>foo</b></code> 

          <p>Instala a versão de <b>foo</b> que estiver no Fink e não a
          versão que foi modificada localmente.</p>
        </li>

        <li>
          <code>fink --trees=local/main list -i</code>

          <p>Lista pacotes modificados localmente que foram instalados.</p>
        </li>
      </ul>

      <p>A maior parte destas opções são autoexplicativas. Várias também podem
      ser definidas no <a href="conf.php?phpLang=pt">arquivo de configuração do
      Fink</a> (<code>fink.conf</code>) caso queira defini-las
      permanentemente e não apenas para uma execução do <code>fink</code> em
      particular.</p>
    

    <h2><a name="install">6.3 install</a></h2>
      

      <p>O comando <b>install</b> é usado para instalar pacotes. Ele baixa,
      configura, compila e instala os pacotes cujo nome você fornecer. Ele
      também instala automaticamente as dependências necessárias mas irá
      pedir-lhe confirmação antes de fazê-lo. Exemplo:</p>
      
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      <p>O uso da opção <a href="#options">--use-binary-dist</a> com
      <code>fink install</code> pode aumentar significativamente a velocidade
      de compilação de pacotes complicados.</p>

      <p>Apelidos para o comando install: <b>update, enable, activate,
      use</b> (a maior parte destes por motivos históricos).</p>
    

    <h2><a name="remove">6.4 remove</a></h2>
      

      <p>O comando remove elimina pacotes do sistema por intermédio do comando
      '<code>dpkg --remove</code>'. A implementação possui uma falha: ela não
      verifica dependências por si própria mas sim delega toda a verificação
      para a ferramenta dpkg. Normalmente isto não causa problemas.</p>

      <p>O comando <b>remove</b> somente elimina os arquivos do pacote (a
      menos dos arquivos de configuração), deixando intacto o arquivo
      <code>.deb</code> contendo o pacote. Isto significa que você pode
      reinstalar um pacote mais tarde sem precisar passar novamente pelo
      processo de compilação. Se você precisar liberar espaço em disco, você
      pode remover os arquivos <code>.deb</code> na árvore
      <code>/sw/fink/dists</code>.</p>

      <p>As opções a seguir podem ser usadas em conjunto com o comando <b>fink
      remove</b>.</p>

      <pre>-h,--help       - Exibe as opções disponíveis.
-r,--recursive  - Também remove pacotes que dependam do(s) pacote(s) a ser(em) removido(s)
                  (ou seja, uma solução para a falha mencionada acima).</pre>

      <p>Apelidos: <b>disable, deactivate, unuse, delete</b>.</p>
    

    <h2><a name="purge">6.5 purge</a></h2>
      

      <p>O comando <b>purge</b> elimina pacotes do sistema. Executa o mesmo
      que o comando <b>remove</b> e também elimina arquivos de
      configuração.</p>

      <p>As seguintes opções são reconhecidas pelo comando:</p>
      <pre>-h,--help
-r,--recursive</pre>
    

    <h2><a name="update-all">6.6 update-all</a></h2>
      

      <p>Este comando atualiza todos os pacotes instalados para que estejam na
      versão mais recente. Ele não precisa de que você informe uma lista de
      pacotes, bastando digitar:</p>

      <pre>fink update-all</pre>
      <p>A opção <a href="#options">--use-binary-dist</a> também é útil
      para este comando.</p>
    

    <h2><a name="list">6.7 list</a></h2>
      

      <p>Este comando produz uma lista dos pacotes disponíveis, exibindo o
      status de instalação, a versão mais recente e uma descrição curta. Caso
      você o execute sem parâmetros, ele listará todos os pacotes disponíveis.
      Você também pode passar um nome ou padrão do shell e o fink listará todos
      os pacotes que casarem.</p>

      <p>A primeira coluna mostra o status da instalação com os seguintes
      significados:</p>
      <pre>    não instalado
 i  a versão mais recente está instalada
(i) instalado, mas uma versão mais recente está disponível
 p  um pacote virtual provido por um pacote que esteja instalado</pre>

      <p>A coluna de versão sempre lista a versão mais recente (maior)
      conhecida para um dado pacote independentemente de qual versão esteja
      instalada, caso esteja. Para ver todas as versões de um pacote
      disponíveis para o seu sistema, use o comando <a href="#dumpinfo">dumpinfo</a>.</p>

      <p>O comando <code>fink list</code> também aceita algumas opções:</p>

      <pre>
-h,--help
	  Exibe as informações disponíveis.
-t,--tab
          Exibe a lista em formato delimitado por tabulações, útil para
          processar a saída através de um script.
-i,--installed
          Exibe apenas os pacotes que estejam instalados.
-o,--outdated
          Exibe apenas os pacotes que estejam desatualizados.
-u,--uptodate
          Exibe apenas os pacotes que estejam atualizados.
-n,--notinstalled
          Exibe apenas os pacotes que não estejam instalados.
-s expr,--section=expr
          Exibe apenas os pacotes cujas seções casem com a expressão
          regular expr.
-m expr,--maintainer=expr
          Exibe apenas os pacotes cujo mantenedor case com a expressão
          regular expr.
-w=xyz,--width=xyz
          Define a largura da tela de saída para a qual você deseja
          formatar a saída. xyz é ou um valor numérico ou auto.
          auto irá definir a largura com base na largura do terminal.
          O valor padrão é auto.</pre>

      <p>Alguns exemplos de uso:</p>

      <pre>
fink list                 - lista todos os pacotes
fink list bash            - verifica se o bash está disponível e em que versão
fink list --tab --outdated | cut -f 2     
                          - lista apenas os nomes de pacotes desatualizados
fink list --section=kde   - lista os pacotes na seção kde
fink list --maintainer=fink-devel
                          - lista os pacotes sem mantenedores
fink --trees=unstable list --maintainer=fink-devel
                          - lista os pacotes sem mantenedores e que estejam
                            na árvore unstable
fink list "gnome*"        - lista todos os pacotes cujos nomes comecem com
                            'gnome'</pre>

      <p>As aspas no último exemplo são necessárias para impedir que o shell
      interprete o padrão.</p>
    

    <h2><a name="apropos">6.8 apropos</a></h2>
      

      <p>Este comando se comporta de forma quase idêntica a <a href="#list">fink list</a>. A maior diferença é que o <code>fink
      apropos</code> também lê as descrições de pacotes para buscar pacotes. A
      segunda diferença é que a string de pesquisa precisa ser fornecida, não
      sendo opcional.</p>

      <pre>
fink apropos irc          - lista os pacotes para os quais 'irc' aparece
			    no nome ou na descrição.
fink apropos -s=kde irc   - o mesmo que acima, mas restrito a pacotes que
			    estejam na seção kde.</pre>
    

    <h2><a name="describe">6.9 describe</a></h2>
      

      <p>Este comando exibe uma descrição do pacote cujo nome você haja
      fornecido na linha de comando. Note que somente uma pequena parte dos
      pacotes possui uma descrição.</p>

      <p>Apelidos: <b>desc, description, info</b></p>
    

    <h2><a name="plugins">6.10 plugins</a></h2>
      

      <p>Lista os plugins (opcionais) disponíveis para o programa
      <code>fink</code>. Atualmente lista os mecanismos de notificação e
      algoritmos para detecção de erros nos tarballs com códigos fontes.</p>
    

    <h2><a name="fetch">6.11 fetch</a></h2>
      

      <p>Baixa os pacotes enumerados mas não os instala. Este comando irá
      baixar os tarballs mesmo que eles já tenham sido baixados
      previamente.</p>

      <p>As seguintes opções podem ser usadas com o comando
      <code>fetch</code>:</p>

      <pre>-h,--help		Exibe as opções disponíveis.
-i,--ignore-restrictive	Não baixa pacotes com License: Restrictive.
                        Útil para espelhos porque alguns pacotes com licenças
                        restritivas não permitem que sejam espelhados.
-d,--dry-run		Exibe apenas informações sobre o(s) arquivo(s) que
                        seria(m) baixado(s) para baixar o pacote; não faça
                        efetivamente o download.
-r,--recursive		Baixe também pacotes que sejam dependências do(s)
                        pacote(s) a ser(s) baixado(s).</pre>
    

    <h2><a name="fetch-all">6.12 fetch-all</a></h2>
      

      <p>Baixa <b>todos</b> os arquivos com os códigos fontes dos pacotes. Da
      mesma forma que <a href="#fetch">fetch</a>, os tarballs são
      baixados mesmo que já o tenham sido anteriormente.</p>

      <p>As seguintes opções podem ser usadas com o comando <code>fink
      fetch-all</code>:</p>

      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
    

    <h2><a name="fetch-missing">6.13 fetch-missing</a></h2>
      

      <p>Baixa <b>todos</b> os arquivos com os códigos fontes de pacotes que
      estejam faltando. Este comando somente baixará arquivos que não estejam
      presentes no sistema.</p>

      <p>Ass eguintes opções podem ser usadas com o comando <code>fink
      fetch-missing</code>:</p>

      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
    

    <h2><a name="build">6.14 build</a></h2>
      

      <p>Compila um pacote mas não o instala. Como de hábito, os tarballs
      contendo os códigos fontes são baixados caso não possam ser encontrados.
      O resultado deste comando é um arquivo de pacote .deb instalável que pode
      ser usado posteriormente para rapidamente instalar o pacote através do
      comando install. Este comando não fará nada caso o arquivo .deb já
      exista. Note que as dependências ainda são <b>instaladas</b> e não
      apenas compiladas.</p>

      <p>A <a href="#options">opção --use-binary-dist option</a> pode
      ser usada com este comando.</p>
    

    <h2><a name="rebuild">6.15 rebuild</a></h2>
      

      <p>Compila um pacote (da mesma forma que o comando build) mas ignora e
      sobrescreve o arquivo .deb já existente. Se o pacote for instalado, o
      recém-criado arquivo .deb também pode ser instalado no sistema através do
      <code>dpkg</code>. Bastante útil durante o desenvolvimento de
      pacotes.</p>
    

    <h2><a name="reinstall">6.16 reinstall</a></h2>
      

      <p>Igual ao install porém o pacote será instalado via <code>dpkg</code>
      mesmo que ele já esteja instalado. Você pode usar este comando caso tenha
      acidentalmente apagado arquivos de um pacote ou mudado arquivos de
      configuração e queira ter a configuração inicial de volta.</p>
    

    <h2><a name="configure">6.17 configure</a></h2>
      

      <p>Roda novamente o processo de configuração do <code>fink</code>. Dentre
      outros, permite que você mude a configuração dos servidores espelhos ou
      de proxy.</p>

      <p><b>Característica nova</b> no <code>fink-0.26.0</code>: este comando
      também permite que você habilite árvores unstable caso queira.</p>
    

    <h2><a name="selfupdate">6.18 selfupdate</a></h2>
      

      <p>Este comando automatiza o processo de atualização para uma nova versão
      do Fink. Ele verifica o site do Fink para ver se uma nova versão está
      disponível. Em seguida, ele baixa as descrições de pacotes e atualiza os
      pacotes básicos incluindo o próprio <code>fink</code>. Este comando pode
      fazer a atualização para versões regulares e também configurar seu
      diretório <code>/sw/fink/dists</code> para atualizações diretas
      por meio de git ou rsync caso você tenha selecionado uma destas opções na
      primeira vez em que o comando for executado. Isto significa que você
      poderá portanto acessar as últimas versões de todos os pacotes.</p>

      <p>Caso a <a href="#options">opção --use-binary-dist</a> esteja
      habilitada, a lista de pacotes disponíveis na distribuição de binários
      também será atualizada.</p>
    

    <h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>
      

      <p>Use este comando para fazer com que <code>fink selfupdate</code> use o
      rsync para atualizar sua lsitagem de pacotes.</p>

      <p>Esta é a forma recomendada para atualizar o Fink quando se compila a
      partir do código fonte.</p>

      <p><b>Observação:</b> atualizações via rsync somente atualizam as <a href="conf.php?phpLang=pt#optional">árvores</a> ativas (por exemplo, se
      unstable não estiver habilitada no <code>fink.conf</code> então a lista
      de pacotes instáveis não será atualizada.</p>
    

    <h2><a name="selfupdate-git">6.20 selfupdate-git</a></h2>
      

      <p>Use este comando para fazer com que <code>fink selfupdate</code> use
      acesso Git para atualizar sua listagem de pacotes.</p>

      <p>A atualização do Rsync é preferida, exceto para desenvolvedores e pessoas
      que estão por trás de firewalls que não permitem o rsync.</p>
    

    <h2><a name="index">6.21 index</a></h2>
      

      <p>Reconstrói o cache de pacotes. Normalmente você não precisa executar
      este comando manualmente já que o <code>fink</code> deveria detectar
      automaticamente se precisa ser atualizado.</p>
    

    <h2><a name="validate">6.22 validate</a></h2>
      

      <p>Este comando executa várias validações em arquivos
      <code>.info</code> e <code>.deb</code>. Mantenedores de
      pacotes devem rodar este comando em suas descrições de pacotes e pacotes
      compilados correspondentes antes de os submeter.</p>

      <p>As seguintes opções facultativas podem ser usadas:</p>

      <pre>-h,--help            - Exibe as opções disponíveis.
-p,--prefix          - Simula um prefixo de diretório base alternativo nos
                       arquivos sendo validados.
--pedantic, --no-pedantic
                     - Controla a exibição de avisos de formatação.
                      --pedantic é o padrão.</pre>

      <p>Apelidos: <b>check</b></p>
    

    <h2><a name="scanpackages">6.23 scanpackages</a></h2>
      

      <p>Atualiza o banco de dados de .debs do <code>apt-get</code>. O padrão é
      atualizar todas as árvores mas isto pode ser restrito a uma ou mais
      árvores especificadas como argumentos.</p>
    

    <h2><a name="cleanup">6.24 cleanup</a></h2>
      

      <p>Remove arquivos obsoletos e temporários. Este comando pode liberar
      bastante espaço em disco. Um ou vários modos podem ser especificados:</p>

      <pre>--debs               - Remove arquivos .deb (pacotes de binários compilados)
                       correspondentes às versões de pacotes que não estejam nem
                       descritas por um arquivo de descrição de pacote (.info)
                       nas árvores ativas nem instaladas no momento.
--sources,--srcs     - Remove códigos fontes (tarballs, etc) que não estejam sendo
                       usadas por algum arquivo de descrição de pacotes (.info) nas
                       árvores ativas no momento.
--buildlocks, --bl   - Remove pacotes cuja compilação tenha travado.
--dpkg-status        - Remove do banco de dados de status do dpkg as entradas de
                       pacotes que não estejam instalados.
--obsolete-packages  - Tenta desinstalar todos os pacotes que estejam obsoletos
                       (característica nova no fink-0.26.0).
--all                - Todos os modos acima (característica nova no fink-0.26.0).</pre>

      <p>Caso nenhum modo tenha sido especificado, a ação padrão é <code>--debs
      --sources</code>.</p>

      <p>Além disso, as seguintes opções podem ser usadas:</p>

      <pre>-k,--keep-src        - Move arquivos antigos com código fonte para /sw/src/old no
                                        lugar de os remover.
-d,--dry-run         - Imprime os nomes dos arquivos que seriam removidos mas
                       não os remove de fato.
-h,--help            - Exibe os modos e opções disponíveis.</pre>
      
    

    <h2><a name="dumpinfo">6.25 dumpinfo</a></h2>
      

      <p>Exibe como o <code>fink</code> analisa as partes de um arquivo de
      pacote <code>.info</code>. Vários campos e expansões de códigos
      serão exibidos conforme as <b>opções</b> abaixo:</p>

      <pre>-h, --help           - Exibe as opções disponíveis.
-a, --all            - Exibe todos os campos da descrição do pacote. É o modo
                       padrão quando nem --field ou --percent forem informados.
-f fieldname,        - Mostra os campos na ordem
  --field=fieldname    em que forem listados.
-p key,              - Mostra os códigos de expansão na
   --percent=key       ordem em que forem listados.</pre>
    

    <h2><a name="show-deps">6.26 show-deps</a></h2>
      

      <p>Exibe uma lista legível das dependências, tanto de compilação quanto
      de execução (instalação), dos pacotes listados.</p>
    
  
<?php include_once "../../footer.inc"; ?>


