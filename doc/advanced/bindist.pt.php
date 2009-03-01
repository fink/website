<?
$title = "Advanced - Servidor de Distr. de Binários";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2009/03/01 02:42:14';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Advanced Contents"><link rel="prev" href="index.php?phpLang=pt" title="Advanced Contents">';


include_once "header.pt.inc";
?>
<h1>Advanced - 1. Rodando seu próprio servidor de distribuição de binários</h1>
    
    

    <h2><a name="intro">1.1 Introdução</a></h2>
      

      <p>Esta seção descreve um método para grupos de trabalho com mais de uma
      instalação do Fink para que usem um servidor central de compilação
      ("mestre") que distribui pacotes binários para todos os clientes no
      grupo.</p>

      <p>O método é composto pelos seguintes passos no <a href="#master">servidor "mestre"</a> e nas <a href="#client">máquinas clientes</a>:</p>
    

    <h2><a name="master">1.2 Passos a serem executados no servidor "mestre"</a></h2>
      

      <ol>
        <li>
          Instale o Fink em <code>/sw</code> (diretório padrão, use um
          link simbólico se for necessário).
        </li>

        <li>
            Compile os pacotes da forma habitual. Eles não precisam estar
            necessariamente instalados, mas apenas compilados.
        </li>

        <li>
          <p>Execute o comando <code>fink scanpackages</code> sempre que o seu
          conjunto de pacotes compilados for alterado. Isto faz com que o fink
          gere os índices apt para todas as árvores habilitadas.</p>

          <p>De forma alternativa, você pode executar o comando <code>fink
          cleanup</code> que irá limpar todos os pacotes binários e de códigos
          fontes. O comando <code>fink scanpackages</code> pode ser chamado
          após o processo de limpeza.</p>
        </li>

        <li>
          Inicie um servidor Web. Por exemplo, habilite o "Compartilhamento Web
          Pessoal" na seção Compartilhamento das Preferências do Sistema.
          Configure então o httpd para publicar seu diretório
          <code>/sw/fink</code> através da adição das seguintes linhas
          ao seu arquivo <code>/etc/httpd/httpd.conf</code>:

          <pre>Alias /fink /sw/fink
&lt;Directory /sw/fink&gt;
  Options Indexes FollowSymLinks
&lt;/Directory&gt;</pre>
        </li>

        <li>
          Execute o comando <code>sudo /usr/sbin/apachectl graceful</code> para
          (re)iniciar seu servidor Web.
        </li>
      </ol>

      <p>Lembre-se de executar novamente o comando <code>fink
      scanpackages</code> (ou <code>fink cleanup</code>) sempre que
      compilar/atualizar pacotes no servidor "mestre" para que eles fiquem
      disponíveis para suas máquinas remotas.</p>

      <p><b>Observações:</b></p>

      <p>Você também pode criar um usuário 'fink' e adicionar as linhas acima
      ao arquivo <code>/etc/httpd/users/fink.conf</code>.</p>

      <p>Se você usa o pacote apache2 do Fink, ajuste os diretórios acima de
      forma correspondente.</p>
    

    <h2><a name="client">1.3 Passos a serem executados nas máquinas clientes</a></h2>
      

      <ol>
        <li>
          Instale o Fink no diretório <code>/sw</code> (diretório
          padrão).
        </li>

        <li>
          Execute o comando <code>fink configure</code> e habilite a opção para
          baixar pacotes da distribuição de binários.  ("UseBinaryDist: true"
          no arquivo <code>/sw/etc/fink.conf</code>).
        </li>

        <li>
          Edite o arquivo <code>/sw/etc/apt/sources.list</code> e
          adicione as linhas que representam suas árvores do Fink. Por exemplo,
          se o endereço IP do servidor mestre for 192.168.42.7, você deve
          adicionar:

          <pre>deb http://192.168.42.7/fink stable main crypto
deb http://192.168.42.7/fink unstable main crypto
deb http://192.168.42.7/fink local main</pre>
        </li>

        <li>
          Execute o comando <code>fink selfupdate</code>. Você deverá ver algo
          parecido com:

          <pre>...
Hit http://192.168.42.7 stable/main Packages
Hit http://192.168.42.7 stable/main Release
Hit http://192.168.42.7 stable/crypto Packages
...</pre>

          ao fim do processo de atualização (caso o nível de quantidade de
          informações seja &gt;= 1).
        </li>
      </ol>

      <p>Quando os comandos <code>fink update-all</code> ou <code>fink install
      &lt;package&gt;</code> forem executados, eles irão baixar os pacotes
      necessários do servidor "mestre" caso estejam disponíveis.</p>
    

    <h2><a name="remarks">1.4 Observações</a></h2>
      

      <ul>
        <li>
          Seu servidor "mestre" precisa usar a versão mais antiga do X11 dentre
          as que são usadas em todos os clientes, ou seja, se alguma das
          máquinas clientes usa o X11 da Apple, o servidor "mestre" também
          precisa usá-lo.
        </li>

        <li>
          Para salvar espaço em disco na máquina "mestre", você pode remover
          pacotes que sejam apenas dependências de compilação (ou seja, que não
          sejam necessários para executar algo). O pacote
          <code>debfoster</code> provê uma boa forma de fazer isto. Tenha
          cuidado para não remover pacotes essenciais como o <code>apt</code>.
        </li>
      </ul>

      <p>Esta documentação foi parcialmente adaptada do documento <a href="http://ranger.befunk.com/blog/archives/000258.html">"Sharing the
      Fink"</a> escrito por RangerRick. Obrigado!</p>
    
  
<? include_once "../../footer.inc"; ?>


