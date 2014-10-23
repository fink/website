<?php
$title = "Guia do usuário - fink.conf";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:17';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Guia do usuário Contents"><link rel="next" href="usage.php?phpLang=pt" title="Usando a ferramenta fink a partir da linha de comando"><link rel="prev" href="upgrade.php?phpLang=pt" title="Atualizando o Fink">';


include_once "header.pt.inc";
?>
<h1>Guia do usuário - 5. O arquivo de configuração do Fink</h1>
    
    

    
      <p>Este capítulo explica as configurações disponíveis no arquivo de
      configuração do Fink (fink.conf) e como elas influenciam o comportamento
      do Fink, em particular a ferramenta de linha de comando
      <code>fink</code>, ou seja, focando principalmente o caso de distribuição
      de códigos fontes.</p>
    

    <h2><a name="about">5.1 Sobre o fink.conf</a></h2>
      

      <p>Na instalação inicial do Fink você teve que responder algumas
      perguntas cujas respostas são armazenadas no arquivo de configuração,
      tais como quais <a href="#mirrors">espelhos</a> você gostaria de
      usar para baixar os arquivos e qual método deve ser usado para obter
      privilégios administrativos. Você pode passar novamente por este processo
      através da execução do comando <code>fink configure</code>. Entretanto,
      algumas configurações só podem ser ajustadas através da edição manual do
      arquivo <b>fink.conf</b>. Normalmente essas configurações são
      direcionadas a usuários avançados.</p>

      <p>O arquivo <b>fink.conf</b> está localizado em
      <code>/sw/etc/fink.conf</code> e pode ser editado com seu editor de
      textos predileto. Você precisará de privilégios administrativos para
      editá-lo.</p>
    

    <h2><a name="syntax">5.2 A sintaxe do fink.conf</a></h2>
      

      <p>Seu arquivo fink.conf é composto por várias linhas seguindo o
      formato</p>

      <pre>NomeDaOpcao: Valor</pre>

      <p>Cada linha indica uma única opção e o nome da opção é separado de seu
      valor por : seguido de um único espaço em branco. O conteúdo do valor
      depende da opção, sendo normalmente um valor booleano ("True" ou
      "False"), uma string, ou uma lista de strings delimitadas por um espaço
      em branco. Por exemplo:</p>

      <pre>
OpcaoBooleana: True
OpcaoString: AlgumaCoisa
OpcaoLista: Opcao1 Opcao2 Opcao3
</pre>
    

    <h2><a name="required">5.3 Configurações obrigatórias</a></h2>
      

      <p>Algumas das configurações no arquivo <code>fink.conf</code> são
      mandatórias. Sem elas o Fink não consegue funcionar adequadamente. As
      seguintes configurações pertencem a esta categoria.</p>

      <ul>
        <li>
          <p>
            <b>Basepath:</b> diretório
          </p>

          <p>Informa ao <b>fink</b> onde ele foi instalado. O valor padrão é
          <b>/sw</b> a menos que você tenha informado outro diretório durante
          a instalação inicial do Fink. Você <b>não</b> deve mudar este valor
          após a instalação pois isto irá confundir o <b>fink</b>.</p>
        </li>
      </ul>
    

    <h2><a name="optional">5.4 Configurações de usuário opcionais</a></h2>
      

      <p>Há várias configurações opcionais que os usuários podem usar para
      adequar o comportamento do Fink.</p>

      <ul>
        <li>
          <p>
            <b>RootMethod:</b> su ou sudo ou none
          </p>

          <p>O Fink precisa de privilégios administrativos para algumas
          operações. Os valores aceitos para esta opção são <b>sudo</b> ou
          <b>su</b>. Você também pode definir esta opção como tendo o valor
          <b>none</b> e neste caso você deverá executar o Fink como root. O
          valor padrão é <b>sudo</b> e na maior parte dos casos não se deve
          alterá-lo.</p>
        </li>

        <li>
          <p>
            <b>Trees:</b> lista de árvores
          </p>

          <p>As árvores disponíveis são:</p>

          <pre>
local/main      - pacotes locais que você deseja instalar
local/bootstrap - pacotes usados durante a instalação do Fink
stable/crypto   - pacotes de criptografia estáveis
stable/main     - outros pacotes estáveis
unstable/crypto - pacotes de criptografia instáveis
unstable/main   - outros pacotes instáveis
</pre>

          <p>Você também pode adicionar suas próprias árvores em
          <code>/sw/fink/dists</code> caso queira mas isto em geral não é
          necessário. As árvores padrão são "local/main local/bootstrap
          stable/main". Esta lista deve ser mantida sincronizada com o arquivo
          <code>/sw/etc/apt/sources.list</code> - <code>fink</code> sincroniza
          automaticamente.</p>

          <p>A ordem das árvores tem importância uma vez que pacotes de árvores
          mais ao fim da lista podem sobrescrever pacotes de árvores listadas
          mais ao começo da lista.</p>
        </li>

        <li>
          <p>
            <b>Distribution:</b> 10.1, 10.2-gcc3.3, 10.3 ou 10.4
          </p>

          <p>O Fink precisa saber qual versão do Mac OS X você está usando. O
          Mac OS X 10.0 e versões anteriores não são suportados, e as versões
          10.1 e 10.2 não são mais suportadas pelas versões atuais do
          <code>fink</code>. Usuários do Mac OS X 10.2 são restritos ao
          fink-0.24.7, liberado em junho de 2005. Este campo é definido através
          da execução do script <code>/sw/lib/fink/postinstall.pl</code>. Você
          não deveria precisar alterar este valor manualmente.</p>
        </li>

        <li>
          <p><b>FetchAltDir:</b> diretório</p>

          <p>Normalmente o <code>fink</code> armazenará os códigos fontes em
          <code>/sw/src</code>. Usando esta opção, você pode especificar um
          diretório alternativo para indicar ao Fink onde procurar por códigos
          fontes baixados. Por exemplo:</p>

          <pre>FetchAltDir: /usr/src</pre>
        </li>

        <li>
          <p><b>Verbose:</b> um número de 0 a 3</p>

          <p>Esta opção define a quantidade de informações que o Fink lhe
          informa sobre o que ele está fazendo. Os valores são:
            <b>0</b> Quiet (não exibe estatísticas de download)
            <b>1</b> Low (não exibe a descompressão de tarballs)
            <b>2</b> Medium (exibe quase tudo)
            <b>3</b> High (exibe tudo).
            O valor padrão é 1.</p>
        </li>

        <li>
          <p><b>SkipPrompts:</b> uma lista de valores separados por vírgula</p>
          
          <p>(<code>fink-0.25</code> e mais recentes) Esta opção restringe o
          <code>fink</code> no tocante a evitar que o usuário precise responder
          a perguntas durante a execução do <code>fink</code>. Cada pergunta
          pertence a uma categoria. Se uma categoria estiver na lista de
          SkipPrompts então a opção padrão será escolhida após esperar por um
          curto período de tempo.</p>

          <p>Atualmente existem as seguintes categorias de perguntas:</p>
          
          <p><b>fetch</b> - Downloads e espelhos</p>
          <p><b>virtualdep</b> - Escolha dentre pacotes alternativos</p>
          <p>Por padrão nenhuma pergunta é evitada.</p>
        </li>

        <li>
          <p><b>NoAutoIndex:</b> booleano</p>

          <p>O Fink guarda uma cópia dos arquivos de descrição de pacotes em
          /sw/var/db/fink.db para evitar que seja necessário lê-los e
          analisá-los toda vez em que é executado. O Fink verifica se é
          necessário atualizar o índice de pacotes a menos que esta opção seja
          definida como "True". O valor padrão é "False" e não é recomendado
          que você o altere. Caso o faça, você pode precisar ter que executar o
          comando <code>fink index</code> manualmente para atualizar o
          índice.</p>
        </li>

        <li>
          <p><b>SelfUpdateNoCVS:</b> booleano</p>

          <p>O comando <code>fink selfupdate</code> atualiza o gerenciador de
          pacotes Fink para a versão mais recente. Com o valor "True", Esta
          opção garante que o CVS não seja usado para fazer essa atualização.
          esta opção é automaticamente ajustada quando se executa o comando
          <code>fink selfupdate-cvs</code>, portanto não deveria ser necessário
          que você a ajuste manualmente.</p>
        </li>

        <li>
	  <p><b>Buildpath:</b> diretório</p>

          <p>O Fink precisa criar vários diretórios temporários para cada
          pacote que ele compila a partir do código fonte. Por padrão, eles são
          situados em <code>/sw/src</code> no Panther e anteriores, e
          <code>/sw/src/fink.build</code> no Tiger. Se você quer que
          eles residam em outro lugar, especifique aqui o diretório. Veja as
          descrições das opções <code>KeepRootDir</code> e
          <code>KeepBuildDir</code> na seção <a href="#developer">Configurações para desenvolvedores</a> deste
          documento para mais informações sobre estes diretórios
          temporários.</p>

          <p>No Tiger, recomenda-se que o Buildpath termine com
          <code>.noindex</code> ou <code>.build</code>. Caso
          contrário, o Spotlight tentará indexar os arquivos temporários no
          Buildpath, fazendo com que as compilações levem mais tempo.</p>
	</li>

        <li>
          <p><b>Bzip2Path:</b> a localização do executável
          <code>bzip2</code> (ou compatível)</p>
          
          <p>(<code>fink-0.25</code> e mais recentes) A opção Bzip2Path permite
          que você sobrescreva a localização da ferramenta de linha de comando
          <code>bzip2</code>. Desta forma, você pode especificar um
          local alternativo do executável <code>bzip2</code>, passar
          opções de linha de comando opcionais, ou usar um substituto como o
          <code>pbzip2</code> para descompactar arquivos
          <code>.bz2</code>.</p>
        </li>
      </ul>
    

    <h2><a name="downloading">5.5 Configurações de download</a></h2>
      

      <p>Há várias configurações que influenciam a forma como o Fink baixa os
      dados dos pacotes.</p>

      <ul>
        <li>
          <p><b>ProxyPassiveFTP:</b> booleano</p>

          <p>Esta opção faz com que o Fink use o modo "passivo" para os
          downloads por FTP. Alguns servidores FTP ou configurações de rede
          necessitam de que esta opção seja definida como True.
          Recomenda-se que você sempre deixe esta opção ligada pois FTP ativo
          está obsoleto.</p>
        </li>

        <li>
          <p><b>ProxyFTP:</b> URL</p>

          <p>Se você usa um proxy FTP então você precisa colocar seu endereço
          aqui, como por exemplo:</p>

          <pre>ProxyFTP: ftp://seuproxyftp.com:2121/</pre>

          <p>Deixe esta opção em branco caso você não use um proxy FTP.</p>
        </li>

        <li>
          <p><b>ProxyHTTP:</b> URL</p>

          <p>Se você usa um proxy HTTP então você precisa colocar seu endereço
          aqui, como por exemplo:</p>

          <pre>ProxyHTTP: http://seuproxyhttp.com:3128/</pre>

          <p>Deixe esta opção em branco caso você não use um proxy HTTP.</p>
        </li>

        <li>
          <p><b>DownloadMethod:</b> wget ou curl ou axel ou axelautomirror</p>

          <p>O Fink pode usar três diferentes aplicativos para baixar arquivos
          da Internet - <b>wget</b>, <b>curl</b> ou <b>axel</b>. O valor
          <b>axelautomirror</b>  usa um modo experimental do <b>axel</b>
          que tenta determinar o servidor mais próximo que possui um certo
          arquivo. O uso de <b>axel</b> e <b>axelautomirror</b> ainda não é
          recomendado. O valor padrão é <b>curl</b>. <b>A aplicação que você
          escolheu para DownloadMethod DEVE estar instalada!</b> (i.e. o
          <code>fink</code> não tentará usar o <b>curl</b> caso você tente
          usar um aplicativo de download que não esteja presente.</p>
        </li>

        <li>
          <p><b>SelfUpdateMethod:</b> point, rsync ou cvs</p>

          <p>O <code>fink</code> pode usar diferentes métodos para atualizar os
          arquivos com informações sobre os pacotes. <b>rsync</b> é a
          configuração recomendada; o rsync é usado para baixar apenas os
          arquivos modificados nas <a href="#optional">árvores</a> que
          você tenha habilitado. Observe que se você houver alterado ou
          adicionado arquivos nas árvores <code>stable</code> ou
          <code>unstable</code>, usar o rsync irá eliminá-los. Faça um backup
          primeiro, por exemplo na sua árvore <code>local</code>. <b>cvs</b>
          irá efetuar o download do repositório do Fink usando acesso CVS
          anônimo ou :ext:. Esta configuração tem a desvantagem de que o CVS
          não pode trocar de espelhos; se o servidor não estiver disponível
          você não conseguirá fazer a atualização. <b>point</b> fará somente
          o download das últimas versões dos pacotes que tenham sido liberadas
          e não é recomendado porque seus pacotes podem ficar um tanto quanto
          desatualizados.</p>
        </li>

        <li>
          <p><b>SelfUpdateCVSTrees:</b> lista de árvores</p>

          <p>(<code>fink-0.25</code> e mais recentes) Por padrão, o método de
          autoatualização <b>cvs</b> atualizará apenas a árvore de
          distribuição atual. Esta opção sobrescreve a lista de versões de
          distribuição que serão atualizadas durante uma autoatualização.
          Observe que você irá precisar de um binário "cvs" recente instalado
          caso queira incluir diretórios que não possuam diretórios CVS/ no seu
          caminho completo (por exemplo, dists/local/main ou similares).</p>
        </li>

        <li>
          <p><b>UseBinaryDist:</b> booleano</p>

          <p>Faz com que o <code>fink</code> tente baixar pacotes de binários
          pré-compilados a partir da distribuição de binário caso estejam
          disponíveis e se o pacote de binários já não estiver disponível no
          sistema. Isto pode trazer uma boa economia de tempo de instalação e
          portanto recomenda-se que esta opção esteja ligada. Passar ao fink a
          <a href="usage.php?phpLang=pt">opção --use-binary-dist</a> option (ou
          <code>-b</code>) tem o mesmo efeito mas só ocorre nessa execução do
          <code>fink</code> em particular. Caso você passe ao <code>fink</code>
          a opção <code>--no-use-binary-dist</code> faz com que esta
          configuração seja ignorada, acarretando a compilação a partir de
          código fonte para essa execução do <code>fink</code> em
          particular.</p>

          <p>Note que este modo instrui o <code>fink</code> a baixar um binário
          disponível caso a versão seja a última versão disponível do pacote;
          este modo <b>não</b> faz com que o <code>fink</code> escolha uma
          versão baseado na disponibilidade do binário do pacote.</p>
        </li>
      </ul>
    

    <h2><a name="mirrors">5.6 Configurações de espelhos</a></h2>
      

      <p>Obter software da Internet pode ser tedioso e normalmente os downloads
      não são tão rápidos quanto gostaríamos. Servidores espelhos hospedam
      cópias de arquivos disponíveis em outros servidores e podem ter uma
      conexão mais rápida ou estarem geograficamente mais próximos a você,
      aumentando a velocidade de download. Eles também ajudam a reduzir a carga
      nos servidores principais que geralmente estão mais ocupados, como por
      exemplo <b>ftp.gnu.org</b>, e eles oferecem uma alternativa no caso de
      um servidor não estar disponível.</p>

      <p>Para que o Fink escolha o melhor espelho para você, você precisa
      informar o continente e país em que reside. Se os downloads de um
      servidor falharem, o Fink perguntará se você deseja tentar novamente o
      mesmo espelho, um espelho diferente no mesmo país ou continente, ou ainda
      um espelho diferente em qualquer lugar do mundo.</p>

      <p>O arquivo <b>fink.conf</b> contém as configurações de quais espelhos
      você gostaria de usar.</p>

      <ul>
        <li>
          <p><b>MirrorContinent:</b> código de três letras</p>

          <p>Você deve alterar este valor usando o comando <code>fink
          configure</code>. O código de três letras pode ser encontrado em
          <code>/sw/lib/fink/mirror/_keys</code>. Por exemplo, caso more na
          Europa:</p>

          <pre>MirrorContinent: eur</pre>
        </li>

        <li>
          <p><b>MirrorCountry:</b> código de seis letras</p>

          <p>Você deve alterar este valor usando o comando <code>fink
          configure</code>. O código de seis letras pode ser encontrado em
          <code>/sw/lib/fink/mirror/_keys</code>. Por exemplo, caso more na
          Áustria:</p>

          <pre>MirrorCountry: eur-AT</pre>
        </li>

        <li>
          <p><b>MirrorOrder:</b> MasterFirst ou MasterLast ou MasterNever ou ClosestFirst</p>

          <p>O Fink suporta espelhos 'mestres', que são repositórios espelhados
          dos tarballs de códigos fontes de todos os pacotes do Fink. A
          vantagem de usar um espelho mestre é que as URLs para download de
          código fontes sempre estarão disponíveis. Os usuários podem escolher
          usar esses espelhos que são mantidos pelo time do Fink, ou usar
          somente as URLs de códigos fontes originais e espelhos externos como
          os do gnome, do KDE ou do debian. Além disso, usuários podem escolher
          combinar os dois conjuntos, sendo que eles serão pesquisados de
          acordo com a proximidade (conforme documentado acima). Ao escolher as
          opções MasterFirst ou MasterLast, o usuário pode pular para o mestre
          (ou não-mestre) caso um download falhe. As opções são:</p>

          <pre>MasterFirst - Procure primeiro por espelhos mestres.
MasterLast - Procure espelhos mestres por último.
MasterNever - Nunca use espelhos mestres.
ClosestFirst - Procure primeiro por espelhos mais próximos
               (combine todos os espelhos em um único conjunto).</pre>
        </li>

        <li>
          <p><b>Mirror-rsync:</b> URL</p>

          <p>(<code>fink-0.25.2</code> e mais recentes) Ao efetuar um
          <code>fink selfupdate</code> com <b>SelfUpdateMethod</b> definido
          como <code>rsync</code>, esta é a URL rsync a partir da qual deve ser
          feita a sincronização. Deve ser uma URL rsync anônima apontando para
          o diretório que contém todas as distribuições e árvores do Fink.</p>
        </li>
      </ul>
    

    <h2><a name="developer">5.7 Configurações para desenvolvedores</a></h2>
      

      <p>Algumas opções do arquivo <code>fink.conf</code> são úteis apenas para
      desenvolvedores. Não recomendamos que usuários convencionais as
      modifiquem. As seguintes opções estão nesta categoria.</p>

      <ul>
        <li>
          <p><b>KeepRootDir:</b> booleano</p>

          <p>Faz com que o <code>fink</code> não remova o diretório
          <code>raiz-[nome]-[versão]-[revisão]</code> no
          <b>Buildpath</b> após compilar um pacote. O padrão é
          False. <b>Tenha cuidado, esta opção pode rapidamente lotar
          seu disco rígido!</b> Passar ao <code>fink</code> a opção
          <b>-K</b> tem o mesmo efeito mas apenas para aquela execução do
          <code>fink</code> em particular.</p>
        </li>

        <li>
          <p><b>KeepBuildDir:</b> booleano</p>

          <p>Faz com que o <code>fink</code> não remova o diretório
          <code>[nome]-[versão]-[revisão]</code> no <b>Buildpath</b>
          após compilar um pacote. O padrão é False. <b>Tenha
          cuidado, esta opção pode rapidamente lotar seu disco rígido!</b>
          Passar ao <code>fink</code> a opção <b>-k</b> tem o mesmo efeito
          mas apenas para aquela execução do <code>fink</code> em
          particular.</p>
        </li>
      </ul>
    

    <h2><a name="advanced">5.8 Configurações avançadas</a></h2>
      

      <p>Há algumas outras opções que podem ser úteis mas requerem algum
      conhecimento para funcionarem a contento.</p>

      <ul>
        <li>
          <p><b>MatchPackageRegEx:</b></p>

          <p>Faz com que o fink não pergunte qual pacote instalar caso uma (e
          apenas uma) das escolhas case com a expressão regular do Perl
          colocada aqui. Exemplo:</p>

          <pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>

          <p>irá casar os pacotes terminados em '-ssl' e irá casar de forma
          exata os pacotes 'xfree86' e 'xfree86-shlibs'.</p>
        </li>

        <li>
          <p><b>CCacheDir:</b> diretório</p>

          <p>Se o pacote <code>ccache-default</code> for instalado, os arquivos
          de cache gerados pelo Fink durante a compilação serão armazenados
          nesse diretório. O padrão é <code>/sw/var/ccache</code>. Caso
          seja definido como <code>none</code>, o fink não irá definir a
          variável de ambiente CCACHE_DIR e o ccache usará o diretório
          <code>$HOME/.ccache</code>, potencialmente colocando arquivos
          com proprietário root no seu diretório home.</p>
        </li>

        <li>
          <p><b>NotifyPlugin:</b> plugin</p>
          
          <p>Especifica um plugin de notificação para informar quandos os
          pacotes tiverem sido instalados ou desinstalados. O padrão é Growl
          (requer <code>Mac::Growl</code> para funcionar). Outros plugins podem
          ser encontrados no diretório
          <code>/sw/lib/perl5/Fink/Notify</code>. A partir do
          <code>fink-0.25</code> os plugins podem ser listados através do
          comando <code>fink plugins</code>. Consulte <a href="http://wiki.finkproject.org/index.php/Fink:Notificati%20%20%20%20%20%20%20%20%20%20%20on_Plugins">Fink Developer Wiki</a> para mais informações.</p>
        </li>
          
        <li>
          <p><b>AutoScanpackages:</b> booleano</p>

          <p>Quando o <code>fink</code> compila pacotes novos, o
          <code>apt-get</code> não sabe deles imediatamente. Historicamente, o
          comando <code>fink scanpackages</code> tinha que ser executado para
          informar o <code>apt-get</code> dos novos pacotes mas agora isto
          acontece de forma automática. Caso esta opção esteja presente e com
          valor False, então o comando <code>fink scanpackages</code>
          não mais será executado automaticamente após a compilação de pacotes.
          O valor padrão é True.</p>
        </li>

        <li>
          <p><b>ScanRestrictivePackages:</b> booleano</p>
          
          <p>Ao efetuar a varredura de pacotes para o <code>apt-get</code>, o
          <code>fink</code> normalmente varre todos os pacotes nas árvores
          atuais. Entretanto, caso o repositório apt resultante venha a se
          tornar disponível publicamente, o administrador pode ser obrigado
          por lei a não incluir pacotes com licenças <code>Restrictive</code>
          ou <code>Commercial</code>. Caso esta opção esteja presente e com
          valor False, então o Fink irá omitir esses pacotes durante a
          varredura.</p>
        </li>
      </ul>
    

    <h2><a name="sourceslist">5.9 Gerenciando o arquivo sources.list do apt</a></h2>
      

      <p>O arquivo <code>/sw/etc/apt/sources.list</code>, que é usado pelo apt
      para localizar arquivos binários para instalação, é automaticamente
      gerenciado pelo fink. O arquivo sources.list padrão, conforme suas
      próprias distribuições e árvores, se parece com:</p>

      <pre># Local modifications should either go above this line, or at the end.
#
# Default APT sources configuration for Fink, written by the fink program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in 
# /sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding Packages.gz files
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main crypto

# Put local modifications to this file below this line, or at the top.</pre>

      <p>Usando esse arquivo padrão, o apt-get procura primeiro na sua
      instalação local por binários que já tenham sido compilados, e após
      procura na distribuição de binários oficial. Você pode alterar este
      comportamento ajustando os valores no começo deste arquivo (que será lido
      em primeiro lugar) ou no fim do arquivo (que será lido por último).</p>

      <p>Se você alterar a linha Trees do arquivo fink.conf ou a distribuição
      que estiver usando, o fink irá automaticamente modificar a parte
      "default" do arquivo para refletir os novos valores. O Fink irá,
      entretanto, preservar quaisquer modificações locais que você tenha feito
      no arquivo desde que você as limite ao começo do arquivo (antes da
      primeira linha padrão) e ao fim do arquivo (abaixo da última linha
      padrão).</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=pt">6. Usando a ferramenta fink a partir da linha de comando</a></p>
<?php include_once "../../footer.inc"; ?>


