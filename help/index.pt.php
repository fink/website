<?php
$title = "Ajuda";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2019/01/27 23:10:05 $';

include "header.inc";
?>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>Obtendo ajuda</h1>

<p>Precisa de ajuda para usar o Fink? Aqui estão suas opções.</p>

<p><b>Documentação.</b> A <a href="../doc/index.php">seção de documentação</a>
deste site possui vários documentos úteis. Alguns dos documentos podem estar
desatualizados ou incompletos mas certamente são úteis.</p>

<p><b>As Perguntas frequentes.</b> Problemas comuns e suas soluções estão
documentados nas <a href="../faq/index.php">Perguntas frequentes</a>.</p>

<p><b>As listas de discussão.</b> Caso você não consiga resolver o problema
sozinho, você pode pedir ajuda nas listas de discussão <a
href="../lists/fink-beginners.php">fink-beginners</a>ou on the
<a href="../lists/fink-users.php">fink-users</a>. Talvez você queira dar uma
olhada primeiro no <a
href="http://sourceforge.net/mailarchive/forum.php?forum=fink-beginners">arquivo
da lista fink-beginners</a> e também no <a
href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">arquivo
da lista fink-users</a> - é cansativo responder a mesma pergunta o tempo
todo.</p>

<p>Quando submeter um relato de problema, assegure-se de incluir informações
relevantes - nós não podemos ajudá-lo(a) caso você não saiba qual o seu
problema. Algumas coisas para incluir: a versão do Fink, a versão do Mac
OS&nbsp;X, versões dos pacotes relevantes, o comando fink que falhou, quaisquer
mensagens de erro que pareçam úteis. Diga-nos também se você possui software de
terceiros instalado em /usr/local ou se usa um compilador customizado (e.g. gcc
3).</p>

<p><b>O canal IRC.</b> Existe um canal <tt>#fink</tt> na rede de IRC
<a href="http://freenode.net">freenode</a>. Lá você pode conversar com outros
usuários do Fink e alguns dos desenvolvedores.</p>

<p><b>Outros sites.</b> Alguns links para fóruns de discussão na Web:
<a href="https://www.xquartz.org/Mailing-Lists.html">XQuartz</a> -
<a href="http://www.xdarwin.org/forum/">fórums do xdarwin.org</a> -
<a href="http://forums.macnn.com/forumdisplay.php?forumid=54">MacNN
Unix forum</a> -
<a href="http://macosx.com/">macosx.com</a> (há vários fóruns Unix lá)</p>

<p>
Alguns links para sites com informações que podem ser úteis:
<a href="https://www.xquartz.org/">XQuartz</a> -
<a href="http://macosx.org/">macosx.org</a> -
<a href="http://macosxhints.com/">macosxhints.com</a>
</p>

</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>Oferecendo ajuda</h1>

<p>O Fink é um esforço de voluntários. Veja aqui como <b>você</b> pode
ajudar.</p>

<p><b>Feedback.</b> Nada é mais valioso do que feedback dos usuários. Relatos
de problemas, estórias de sucesso, sugestões e contribuições são sempre
bem-vindos. Mesmo não podendo prometer consertar tudo de imediato, ajuda muito
saber quais partes do Fink precisam de mais atenção.</p>

<p>Você pode dar feedback através das <a href="../lists/index.php">listas de
discussão</a>, através dos vários trackers no SourceForge (veja a página
inicial para links diretos) ou diretamente aos mantenedores de pacotes.</p>

<p><b>Espalhe a idéia.</b> Caso goste do Fink, espalhe a idéia. Isto ajuda você
uma vez que constrói uma comunidade útil; ajuda o projeto Fink pois os pacotes
são mais testados; e ajuda o mundo Unix de forma geral porque ajuda a
reconhecer o Mac OS&nbsp;X como sendo um sistema operacional Unix para o qual
vale a pena prover suporte.</p>

<p>Você também pode <a href="https://www.apple.com/feedback/macos.html">informar à
Apple</a> que você gostou do caminho que eles tomaram com a base BSD do Mac OS
X e que você gostaria de que eles melhorassem a camada BSD.</p>

<p><b>Proveja suporte.</b> Se você tem alguma experiência para compartilhar,
assine a lista de discussão <a href="../lists/fink-users.php">fink-users</a> e
ajude a resolver os problemas lá enviados por outros usuários.</p>

<p><b>Teste pacotes.</b> Obtenha as descrições de pacotes mais recentes via <a
href="../doc/gitaccess/index.php">Git</a>, configure o Fink para <a
href="../faq/usage-fink.php#unstable">usar a árvore unstable</a> e teste os
pacotes. O banco de dados de pacotes lista os <a
href="http://pdb.finkproject.org/pdb/testing.php">pacotes que precisam de teste</a> em uma página
separada. Você pode enviar relatos de sucesso ou falha ao mantenedor do pacote
ou à lista de discussão de sua preferência.</p>

<p><b>Documentação.</b> Sempre há falta de pessoas que queiram escrever
documentação.</p>

<p><b>Faça pacotes.</b> Caso você tenha alguma experiência em instalação de
software Unix a partir do código fonte, você pode ajudar fazendo novos pacotes.
Para começar, leia o <a href="../doc/quick-start-pkg/index.php">Packaging
Tutorial</a>. Veja em seguida o <a href="../doc/packaging/index.php">Packaging
Manual</a>, leia-o cuidadosa e completamente, assine a lista de discussão <a
href="../lists/fink-devel.php">fink-devel</a> e submeta seus pacotes ao <a
href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">package
submission tracker</a>. Note que sua submissão será muito provavelmente
rejeitada ou tratada com baixa prioridade a menos que esteja de acordo com a
política de empacotamento.</p>

</td></tr></table>

<?php
include "footer.inc";
?>
