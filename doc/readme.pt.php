<?php
$title = "Leia-me";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:15';
$metatags = '';


include_once "header.inc";
?>
<h1>Leia-me do Fink</h1>
<!--Generated from $Fink: readme.pt.xml,v 1.2 2012/11/11 15:20:15 gecko2 Exp $-->
  <p>Este é o Fink, um sistema de gerenciamento de pacotes cujo objetivo é
  trazer todo o mundo do software de código aberto ao Darwin e ao Mac OS X.</p>

  <p>Com a ajuda do dpkg, o Fink mantém uma hierarquia de diretórios separada.
  Ele baixa versões originais de códigos fontes, faz ajustes caso necessário,
  configura-os para o Darwin, compila-os e os instala. As informações sobre
  pacotes disponíveis e ajustes necessários (as "descrições de pacotes") são
  mantidas em separado mas são geralmente incluídas com esta distribuição. O
  código fonte em si é baixado da Internet quando necessário.</p>

  <p>Apesar de o Fink ainda não poder ser considerado "maduro" e ter alguns
  ajustes a fazer e funcionalidades a implementar, ele é usado com sucesso por
  um grande número de pessoas. Por favor, leia as instruções cuidadosamente e
  não se surpreenda caso algo não funcione conforme esperado. Há boas
  explicações para a maior parte das falhas; veja o site caso necessite de
  ajuda.</p>

  <p>O Fink é distribuído conforme os termos da licença GPL da GNU. Veja
  o arquivo COPYING para mais detalhes.</p>
<h2><a name="req">Requisitos</a></h2>
  <p>Você precisa de:</p>

  <ul>
    <li><p>Um sistema Mac OS X instalado, versão 10.4 ou mais recente. É
    possível que funcione no Darwin 8.0 mas isto não foi testado. Versões
    anteriores de ambos <b>não</b> funcionarão.</p></li>

    <li><p>Ferramentas de desenvolvimento. No Mac OS X, instale o pacote
    XcodeTools.pkg da mídia de instalação. Assegure-se de que as ferramentas
    que você instalar são apropriadas para sua versão do Mac OS X. No Darwin,
    as ferramentas deveriam ser instaladas por padrão.</p></li>

    <li><p>Acesso à Internet. Todo código fonte é baixado de sites
    espelhos.</p></li>

    <li><p>Paciência. Compilar vários pacotes grandes leva tempo: horas ou até
    mesmo dias.</p></li>
  </ul>
<h2><a name="install">Instalação</a></h2>
  <p>O processo de instalação é descrito em detalhes no arquivo INSTALL. Por
  favor, leia-o primeiro; o processo não é trivial. O arquivo também descreve o
  procedimento de atualização.</p>
<h2><a name="usage">Usando o Fink</a></h2>
  <p>O arquivo USAGE descreve como configurar seus caminhos e como instalar e
  remover pacotes. Também possui uma lista completa dos comandos
  disponíveis.</p>
<h2><a name="questions">Outras perguntas?</a></h2>
  <p>Se a documentação aqui incluída não responder sua pergunta, visite o site
  do Fink em <a href="/">/</a> e
  consulte a página de Ajuda: <a href="/help/">/help/</a>.
  Ela indicará outros documentos que estão disponíveis e onde procurar por
  ajuda caso precise.</p>

  <p>Se você gostaria de contribuir algo ao Fink, a página de Ajuda mencionada
  acima também contém uma lista de coisas que você pode fazer como testar ou
  criar pacotes.</p>
<h2><a name="uptodate">Mantendo-se informado</a></h2>
  <p>O site do projeto está localizado em <a href="/">/</a>.</p>

  <p>Para ser informado de novos lançamentos, vá à página <a href="/lists/fink-announce.php">http://www.finkproject.orgt/lists/fink-announce.php</a>
  e assine a lista de discussão fink-announce. Esta lista é moderada e possui
  baixo tráfego.</p>

<?php include_once "../footer.inc"; ?>
