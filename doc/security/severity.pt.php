<?php
$title = "Política de segurança - Respostas";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/07/26 11:13:27';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Política de segurança Contents"><link rel="next" href="sources.php?phpLang=pt" title="Fontes de incidentes"><link rel="prev" href="respo.php?phpLang=pt" title="Responsabilidade">';


include_once "header.pt.inc";
?>
<h1>Política de segurança - 2. Tempos de resposta e ações imediatas</h1>
    
    

    
      <p>Tempos de resposta e ações tomadas dependem muito da severidade da
      perda introduzida por uma falha em particular no software que foi
      empacotado pelo Fink. De qualquer forma, o <b>Grupo Central do Fink</b>
      tomará ação imediata sempre que houver a percepção de que é necessário
      proteger a comunidade de usuários do Fink.</p>
    

    <h2><a name="resptimes">2.1 Tempos de resposta</a></h2>
      

      <p>Cada pacote deve primar por respeitar os tempos de resposta seguintes.
      Para alguns tipos de vulnerabilidades, o <b>Grupo Central do Fink</b>
      pode escolher agir imediatamente. Se este for o caso, um dos membros do
      Grupo Central notificará o mantenedor do pacote em questão. Além disso,
      lembre-se de que, ainda que tentemos respeitar estes tempos de resposta,
      o Fink é um esforço de voluntários, e por conseguinte não podemos
      garanti-los.</p>

      <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Vulnerability</th><th align="left">Repsonse time</th></tr><tr valign="top"><td>root exploit remoto</td><td>
            <p>mínimo: <b>imediato</b>; máximo: <b>12</b> horas.</p>
          </td></tr><tr valign="top"><td>root exploit local</td><td>
            <p>mínimo: <b>12</b> horas; máximo: <b>36</b> horas.</p>
          </td></tr><tr valign="top"><td>DOS remoto</td><td>
            <p>mínimo: <b>6</b> horas; máximo: <b>12</b> horas.</p>
          </td></tr><tr valign="top"><td>DOS local</td><td>
            <p>mínimo: <b>24</b> horas; máximo: <b>72</b> horas.</p>
          </td></tr><tr valign="top"><td>corrupção de dados remotos</td><td>
            <p>mínimo: <b>12</b> horas; máximo: <b>24</b> horas.</p>
          </td></tr><tr valign="top"><td>corrupção de dados locais</td><td>
            <p>mínimo: <b>24</b> horas; máximo: <b>72</b> horas.</p>
          </td></tr></table>
    

    <h2><a name="forced">2.2 Atualizações forçadas</a></h2>
      

      <p>Um membro do <b>Grupo Central do Fink</b> pode optar por atualizar um
      pacote sem esperar que o mantenedor aja primeiro. Isto é chamado de
      atualização forçada. Caso o tempo de resposta máximo
      exigido por uma vulnerabilidade específica em um pacote do Fink não seja
      respeitado, isto também resulta em uma atualização
      forçada daquele pacote.</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="sources.php?phpLang=pt">3. Fontes de incidentes</a></p>
<?php include_once "../../footer.inc"; ?>


