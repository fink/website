<?
$title = "Perguntas frequentes - Espelhos";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2009/07/27 18:44:40';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Perguntas frequentes Contents"><link rel="next" href="upgrade-fink.php?phpLang=pt" title="Atualizando o Fink (resolução de problemas específicos a uma
    versão)"><link rel="prev" href="relations.php?phpLang=pt" title="Relacionamentos com outros projetos">';


include_once "header.pt.inc";
?>
<h1>Perguntas frequentes - 3. Espelhos do Fink</h1>
    
    
    <a name="when-use">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.1: O que são os espelhos do Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Os espelhos do Fink são servidores rsync que espelham os arquivos de
        descrição (atuais e estáveis) que o Fink usa para montar os pacotes a
        partir de código fonte.</p></div>
    </a>
    <a name="why">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.2: Por que eu deveria usar espelhos rsync?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Rsync é um protocolo bastante rápido. Ele atualiza os arquivos de
        descrição mais rapidamente do que o antigo método de atualização via
        CVS. Além disso, as atualizações via CVS são sempre feitas a partir do
        sourceforge.net enquanto que as atualizações pelo rsync podem ser
        feitas a partir de um espelho mais próximo a você.</p></div>
    </a>
    <a name="where">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.3: Onde posso encontrar mais informações sobre espelhos do Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Todos os espelhos do Fink estão consolidados sob o domínio
        finkmirrors.net. O site <a href="http://finkmirrors.net">http://finkmirrors.net</a> possui mais
        informações.</p></div>
    </a>
    <a name="when-not">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.4: Não consigo conectar-me a um servidor rsync, o que devo fazer?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Às vezes alguns firewalls bastante restritivos impedem que você se
        conecte a serviços rsync. Se este for o caso você pode usar o método
        CVS.</p></div>
    </a>
    <a name="otherinfogone">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.5: Eu mudei para o método rsync e agora todos os arquivos das árvores
        que não eram usadas foram eliminados</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Isto é normal. O método de atualização via rsync só atualiza sua
        árvore ativa, por exemplo a 10.4, e também elimina todos os
        subdiretórios CVS.</p></div>
    </a>
    <a name="howswitch">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.6: Como posso ficar alternando entre os métodos?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Use os comandos fink selfupdate-rsync ou fink selfupdate-cvs.</p></div>
    </a>
    <a name="status">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.7: Posso verificar o estado atual dos espelhos rsync?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Claro, veja <a href="http://finkmirrors.net/status.html">http://finkmirrors.net/status.html</a>.</p></div>
    </a>
    <a name="Master">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.8: O que é um espelho de distfiles (arquivos de distribuição)?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Às vezes é difícil obter da Internet certas versões de códigos
        fontes. Espelhos de distfiles mantêm e espelham pacotes de código
        fonte que são necessários para que o fink construa seus pacotes de
        código fonte.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade-fink.php?phpLang=pt">4. Atualizando o Fink (resolução de problemas específicos a uma
    versão)</a></p>
<? include_once "../footer.inc"; ?>


