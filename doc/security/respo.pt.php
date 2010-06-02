<?
$title = "Política de segurança - Responsabilidade";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/07/26 11:13:27';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Política de segurança Contents"><link rel="next" href="severity.php?phpLang=pt" title="Tempos de resposta e ações imediatas"><link rel="prev" href="index.php?phpLang=pt" title="Política de segurança Contents">';


include_once "header.pt.inc";
?>
<h1>Política de segurança - 1. Responsabilidade</h1>
    
    

    <h2><a name="who">1.1 Quem é responsável?</a></h2>
      

      <p>Todo pacote do Fink possui um mantenedor. O mantenedor de um pacote
      específico pode ser determinado pelo comando <code>fink info
      nomedopacote</code> executado na linha de comando. Ele irá retornar uma
      listagem com um campo similar a este: Maintainer: Fink Core Group
      &lt;fink-core@lists.sourceforge.net&gt;. O mantenedor é
      integralmente responsável por seu(s) pacote(s).</p>
    

    <h2><a name="contact">1.2 Quem devo contactar?</a></h2>
      

      <p>Caso haja incidentes de segurança em uma determinada parte de um
      software empacotado, você deve notificar o mantenedor do pacote bem como
      o <b>Grupo Central do Fink</b>. O email do mantenedor pode ser
      encontrado pelo comando da seção anterior e o email do <b>Grupo Central
      do Fink</b> é fink-core@lists.sourceforge.net</p>
    

    <h2><a name="prenotifications">1.3 Pré-Notificações</a></h2>
      

      <p>Incidentes sérios de segurança em software empacotado pelo Fink pode
      requerer que você pré-notifique o mantenedor daquele pacote. Como é
      possível que o mantenedor não possa ser encontrado em tempo hábil,
      pré-notificações devem ser sempre enviadas ao <b>Time de Segurança do
      Fink</b>. O email de cada membro do time está listado individualmente
      mais ao fim deste documento. Por favor, observe que, como o histórico da
      lista fink-core@lists.sourceforge.net está disponível publicamente,
      pré-notificações privadas <b>nunca</b> devem ser enviadas àquela
      lista.</p>
    

    <h2><a name="response">1.4 Resposta</a></h2>
      

      <p>Relatórios sobre um incidente de segurança que tenham sido submetidos
      serão respondidos pelo <b>Grupo Central do Fink</b>. O Fink obriga cada
      mantenedor a confirmar individualmente o problema relatado. No caso
      improvável de o mantenedor não estar disponível e não confirmar o
      relatório dentro de 24 horas, uma observação deve ser enviada ao <b>Grupo
      Central do Fink</b> informando o time de que o mantenedor pode não estar
      respondendo.</p>

      <p>Caso você haja tentado notificar o mantenedor do pacote em questão mas
      o sistema de email retornou um erro de entrega para aquele email, você
      deve notificar o <b>Grupo Central do Fink</b> imediatamente para
      informar-lhes que o mantenedor não pode ser contactado e que o pacote
      pode ser atualizado independentemente do mantenedor.</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="severity.php?phpLang=pt">2. Tempos de resposta e ações imediatas</a></p>
<? include_once "../../footer.inc"; ?>


