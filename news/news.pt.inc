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
    
