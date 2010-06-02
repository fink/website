<?
$title = "Política de segurança - Atualizações";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/07/26 11:13:27';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Política de segurança Contents"><link rel="next" href="notification.php?phpLang=pt" title="Enviando notificações"><link rel="prev" href="sources.php?phpLang=pt" title="Fontes de incidentes">';


include_once "header.pt.inc";
?>
<h1>Política de segurança - 4. Política de atualização de segurança</h1>
    
    

    <h2><a name="procedure">4.1 Adicionando atualizações relacionadas a segurança</a></h2>
      

      <p>Atualizações de segurança só podem ser aplicadas uma vez que tenham
      sido verificadas pelo autor original do software que foi empacotado para
      o Fink e no qual foi encontrada uma vulnerabilidade de segurança. Antes
      de uma atualização, uma ou mais das condições a seguir <b>deve</b>
      valer:</p>

      <ul>
        <li>O autor do software foi contactado pelo mantenedor e/ou diretamente
        pelo <b>Grupo Central do Fink</b> fornecendo uma correção da
        vulnerabilidade ou ação alternativa.</li>

        <li>Uma das fontes denotadas por palavra-chave publicou um boletim de
        segurança com fontes atualizados do pacote em questão.</li>

        <li>Uma correção foi publicada em uma das fontes denotadas por
        palavra-chave a seguir: BUGTRAQ, FULLDISC, SF-INCIDENTS, VULN-DEV.</li>

        <li>Um boletim oficial de segurança foi publicado e recebeu status CVE
        Candidate, descrevendo a vulnerabilidade, fornecendo uma ação
        alternativa, correção ou link para fontes atualizados.</li>

        <li>Uma pré-notificação foi diretamente enviada ao mantenedor e/ou
        <b>Grupo Central do Fink</b> fornecendo uma correção da
        vulnerabilidade ou ação alternativa, requerendo que alguma ação seja
        tomada.</li>
      </ul>
    

    <h2><a name="moving">4.2 Movendo de stable para unstable</a></h2>
      

      <p>Atualizações de segurança de um pacote específico serão primeiramente
      aplicadas na árvore unstable. Após um período de espera de pelo menos
      <b>12</b> horas, os arquivos com descrições e ajustes do pacote também
      serão movidos para a árvore stable. O período de retenção deve ser usado
      para observar cuidadosamente se o pacote atualizado funciona e a
      atualização de segurança não introduz novos problemas.</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="notification.php?phpLang=pt">5. Enviando notificações</a></p>
<? include_once "../../footer.inc"; ?>


