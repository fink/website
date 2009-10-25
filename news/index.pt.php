<?
$title = "News";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/10/25 06:15:55';
$metatags = '';

include_once "header.inc";
?>

<a name="2009-10-24%20Problemas%20com%20o%20servidor"><span class="news-date">2009-10-24: </span><span class="news-headline">Problemas com o servidor</span></a><?php gray_line(); ?>
	  <p>Estamos com problemas no servidor e por conseguinte o site e a
	  distribuição oficial de binários estão fora do ar, e os servidores rsync
	  não estão atualizando. Enquanto resolvemos os problemas, você pode:</p>
	  <ul>
		<li>Usar o <a href="http://fink.thetis.ig42.org">http://fink.thetis.ig42.org</a>
		caso necessite das informações do site;</li>
		<li>Usar o CVS como seu método de selfupdate caso você necessite de
		pacotes atualizados. Ele é mais devagar do que o rsync porém está
		funcionando já que é hospedado no SourceForge.net. Caso queira, você
		poderá voltar ao rsync mais tarde. Para mudar para o CVS, execute o
		comando <code>fink selfupdate-cvs</code>;</li>
		<li>Editar o arquivo <code>/sw/etc/fink.conf</code> e substituir a
		linha <code>Mirror-apt: http://bindist.finkmirrors.net/bindist</code>
		por <code>Mirror-apt: http://fink-bindist.gecko.ig42.org</code></li>
		<li>Editar o arquivo <code>/sw/etc/apt/sources.list</code> e substituir
		<code>http://bindist.finkmirrors.net/bindist</code> por
		<code>http://fink-bindist.gecko.ig42.org</code></li>
		<li>Run <code>fink scanpackages</code>.</li>
	  </ul>
      <p>Pedimos desculpas pela inconveniência.</p>
	<a name="2009-08-28%20Fink%20no%20OS%20X%2010.6"><span class="news-date">2009-08-28: </span><span class="news-headline">Fink no OS X 10.6</span></a><?php gray_line(); ?>
      <p>O Fink está pronto para ser usado no Snow Leopard (OS X 10.6). Os
      usuários precisam escolher dentre a versão do Fink de 32 bits e a de 64
      bits para o 10.6. A versão de 32 bits possui mais pacotes disponíveis no
      momento mas a versão de 64 bits representa a direção futura tanto do OS X
      quanto do Fink; os usuários precisam fazer a escolha por conta própria.
      <b>Não</b> será possível fazer uma atualização de 32 bits para 64 bits
      (ou vice-versa) sem que o Fink seja completamente reinstalado.</p>
      <p>No presente momento, dois métodos estão disponíveis para instalar o
      Fink no Snow Leopard. Um instalador binário não está disponível,
      portanto é importante <b>instalar primeiro o Xcode da pasta Optional
      Installs no disco do Snow Leopard.</b> Usuários que queiram a versão de
      64 bits ou que estejam atualizando diretamente do OS X 10.4 ou anteriores
      devem instalar o Fink do zero a partir da tarball de distribuição (versão
      0.29.9 ou posteriores) disponível no <a href="http://sourceforge.net/projects/fink/files/fink/0.29.9/fink-0.29.9.tar.gz/download">sourceforge.net</a>;
      as instruções de instalação estão <a href="<?php print $root; ?>download/srcdist.php">aqui</a>. Por outro lado, os usuários
      podem atualizar diretamente do OS X 10.5 para a versão de 32 bits
      seguindo as instruções abaixo. (Aviso: usuários que tenham instalado uma
      versão de desenvolvimento do Fink a partir do CVS no lugar de uma versão
      efetivamente lançada podem encontrar problemas; por favor, antes de
      começar, mude para uma versão oficialmente lançada e remova os arquivos
      .deb que possuam versões maiores.)</p>
      <p>Para fazer a atualização, siga os quatro passos a seguir. <b>Passo
      1:</b> edite o arquivo <code>/sw/etc/fink.conf</code> e adicione uma
      linha contendo <code>NoAutoIndex: true</code> (talvez você tenha que usar
      o <code>sudo</code> para obter as permissões corretas para editar o
      arquivo.) <b>Passo 2:</b> execute o comando <code>fink reinstall
      fink</code> para dizer ao Fink que agora você está no OS X 10.6.
      (Caso encontre uma mensagem sobre corrupção do banco de dados de pacotes,
      execute o comando <code>fink index -f</code> e tente este passo
      novamente.) <b>Passo 3:</b> execute o comando <code>fink update
      fink</code> para obter a última versão do Fink para o OS X 10.6.
      <b>Passo 4:</b> execute o comando <code>fink install
      perl588-core</code> para substituir a versão do Perl que foi alterada
      pela Apple durante a atualização do OS X caso você possua pacotes que
      dependam dele.</p>
      <p>Depois da atualização, talvez você queira executar o comando
      <code>fink configure</code> para fazer uma limpeza.</p>
      <p>Quase todos os pacotes do Fink na árvore stable vão compilar no OS X
      10.6 mas esteja ciente de que apenas uma fração dos pacotes do 10.5 estão
      disponíveis para o 10.6. Em um futuro próximo, o banco de dados de
      pacotes do Fink será atualizado para que inclua informações sobre pacotes
      para o 10.6; você poderá consultá-lo para verificar se seus pacotes
      prediletos estão disponíveis.</p>
    <a name="2009-07-25%20Mudan%C3%A7as%20no%20Grupo%20Central"><span class="news-date">2009-07-25: </span><span class="news-headline">Mudanças no Grupo Central</span></a><?php gray_line(); ?>
      <p>O Grupo Central do Fink anuncia dois novos membros: Alexander Hansen
      (<b>akh</b>) e Augusto Devegili (<b>monipol</b>), tendo ambos estado
      bastante ativos no projeto. Una-se a nós e dê as boas-vindas aos novos
      membros!</p>
      <p>A equipe também anuncia que Christian Schaeffner retirou-se do grupo,
      voltando ao status de colaborador regular. Agradecemos ao Christian por
      sua ajuda na equipe nos últimos anos.</p>
      <p>Membros do projeto Fink estão trabalhando arduamente para prover
      suporte ao usuário, manter o Fink atualizado, e preparar para o futuro
      lançamento do Snow Leopard. Sempre precisamos de mais voluntários,
      portanto cogite contribuir de alguma forma!</p>
    <a name="2008-07-23%20Fim%20do%20suporte%20ao%2010.3."><span class="news-date">2008-07-23: </span><span class="news-headline">Fim do suporte ao 10.3.</span></a><?php gray_line(); ?>
      <p>O projeto Fink não pode mais oferecer suporte a usuários do Fink no
      Mac OS X 10.3. Na verdade tem havido pouco suporte por algum tempo então
      este anúncio simplesmente formaliza esse fato.</p>
      <p>Isto significa que não haverá atualizações futuras, nem mesmo de
      segurança, para usuários do Mac OS X 10.3. Suas instalações atuais
      continuarão a funcionar mas o software que estiver instalado não será
      atualizado.</p>
      <p>Acreditamos que a maioria dos nossos usuários estejam usando Mac OS X
      10.4 ou 10.5 e esperiamos que esta decisão não seja inconveniente a
      muitas pessoas.</p>
    <a name="2008-07-17%20Migra%C3%A7%C3%A3o%20em%20passa%20de%20pacotes."><span class="news-date">2008-07-17: </span><span class="news-headline">Migração em passa de pacotes.</span></a><?php gray_line(); ?>
      <p>A atualização massiva do GNOME que esteve em andamento por várias
      meses foi incorporada à árvore unstable. Os pacotes foram bem testados e
      as atualizações feitas por usuários aparentam estar ocorrendo
      tranquilamente.</p>
      <p>Estamos agora incorporando a atualização do GNOME à árvore stable.
      Devido ao fato de não termos podido testar antecipadamente as
      dependências desses novos pacotes, os usuários podem esperar que a árvore
      stable não esteja tão estável durante as próximas semanas, enquanto os
      erros serão corrigidos.</p>
      <p>Se você está ansioso para usar imediatamente essa atualização massiva
      do GNOME, sugerimos que mude para a árvore unstable. Caso não queira,
      sugerimos que suspenda a execução de "fink selfupdate" por algum tempo
      (talvez uma semana ou duas) até que tudo esteja estabilizado
      novamente.</p>
    <a name="2008-06-26%20Nova%20vers%C3%A3o%20do%20Fink."><span class="news-date">2008-06-26: </span><span class="news-headline">Nova versão do Fink.</span></a><?php gray_line(); ?>
      <p>Uma nova versão (binária) do Fink para o OS X 10.5 (Leopard) está
      <a href="<?php print $root; ?>download/index.php">disponível</a> a partir de hoje:
      versão 0.9.0, a qual pode ser instalada em hardware Intel ou PowerPC.
      Esta versão inclui códigos fontes, pacotes de binários e instaladores do
      Fink para ambos os tipos de hardware.</p>
      <p>Usuários que já tenham instalado o Fink no Leopard a partir do código
      fonte e que queiram mudar para a distribuição de binários podem fazer o
      seguinte. Em primeiro lugar, execute <code>fink selfupdate</code> para
      atualizar para a última versão do gerenciador de pacotes fink. Em
      seguida, execute <code>fink configure</code> e assegure-se de
      <b>mudar</b> sua escolha sobre usar a distribuição de binários de Não
      para Sim. Finalmente, execute <code>fink scanpackages</code> para ativar
      a distribuição de binários.</p>
      <p><b>Atualização, 2008-07-11:</b> se você usa o instalador binário,
      você precisa executar <code>fink selfupdate</code> após a instalação.</p>
    

<? include_once "footer.inc"; ?>
