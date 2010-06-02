<?
$title = "Política de segurança - Notificação";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/07/26 11:13:27';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Política de segurança Contents"><link rel="prev" href="updating.php?phpLang=pt" title="Política de atualização de segurança">';


include_once "header.pt.inc";
?>
<h1>Política de segurança - 5. Enviando notificações</h1>
    
    

    
      <p>Alguns usuários podem escolher não atualizar seus softwares
      frequentemente. Para garantir que aqueles que instalam seus pacotes a
      partir do código fonte atualizem pacotes com vulnerabilidades o mais cedo
      possível, um mantenedor pode solicitar que uma notificação seja enviada à
      lista de anúncios do Fink.</p>
    

    <h2><a name="who">5.1 Quem pode enviá-las?</a></h2>
      

      <p>Estes anúncios somente podem ser enviados pelo <b>Time de Segurança
      do Fink</b>. A maior parte dos anúncios será enviada por
      dmalloc@users.sourceforge.net, assinados pela chave PGP com a seguinte
      impressão digital:</p>

      <ul>
        <li>FD77 F0B7 5C65 F546 EB08 A4EC 3CCA 1A32 7E24 291E.</li>

        <li>Disponível em
          http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0x7E24291E
        </li>
      </ul>

      <p>O endereço acima foi intencionalmente não assinalado como um link.</p>

      <p>Outros membros do time com autorização são:</p>

      <p>peter@pogma.com assinado pela chave PGP com a seguinte impressão
      digital:</p>

      <ul>
        <li>4D67 1997 DD32 AE8E D7ED  9C79 8491 2AB7 DF3B 6004.</li>

        <li>Disponível em
          http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xDF3B6004
        </li>
      </ul>

      <p>ranger@befunk.com assinado pela chave PGP com a seguinte impressão
      digital:</p>

      <ul>
        <li>6401 D02A A35F 55E9 D7DD  71C5 52EF A366 D3F6 65FE.</li>

        <li>Disponível em
          http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xD3F665FE
        </li>
      </ul>
    

    <h2><a name="how">5.2 Como submeter</a></h2>
      

      <p>Para garantir uma apresentação comum para as notificações de
      segurança, todas <b>devem</b> seguir o seguinte modelo padrão.</p>

            <pre> ID: FINK-YYYY-MMDD-NN 
                        Reported: YYYY-MM-DD 
                        Updated:  YYYY-MM-DD 
                        Package:  package-name
                        Affected: &lt;= versionid
                        Maintainer: maintainer-name
                        Tree(s): 10.3/stable, 10.3/unstable, 10.2-gcc3.3/stable,10.2-gcc3.3/unstable
                        Mac OS X version: 10.3, 10.2 
                        Fix: patch|upstream 
                        Updated by: maintainer|forced update (Email)
                        Description: A short description describing the issue.
                        References: KEYWORD (see above) 
			Ref-URL: URL 
			</pre>
            
      <p>Um relatório de exemplo pode-se parecer com:</p>

            <pre> ID: FINK-2004-06-01 
                        Reported:             2004-06-09 
                        Updated:              2004-06-09 
                        Package:              cvs
                        Affected:             &lt;= 1.11.16, &lt;= 1.12.8
                        Maintainer:           Sylvain Cuaz 
                        Tree(s):    10.3/stable, 10.3/unstable, 10.2-gcc3.3/stable,10.2-gcc3.3/unstable 
                        Mac OS X version: 10.3, 10.2 
                        Fix: upstream
                        Updated by: forced update (dmalloc@users.sourceforge.net)
                        Description: Multiple vulnerabilities in CVS found by Ematters
                        Security. 
			References: BID 
                        Ref-URL:    http://www.securityfocus.com/bid/10499 
                        References: CVE 
                        Ref-URL:    http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0414
                        References: CVE 
                        Ref-URL:    http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0416
                        References: CVE 
                        Ref-URL:    http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0417
                        References: CVE 
                        Ref-URL:    http://www.cve.mitre.org/cgi-bin/cvename.cgi?name=CAN-2004-0418
                        References: FULLDISCURL 
                        Ref-URL:    http://lists.netsys.com/pipermail/full-disclosure/2004-June/022441.html
                        References: MISC 
                        Ref-URL:    http://security.e-matters.de/advisories/092004.html </pre>

      <p>Por favor, observe que a palavra-chave <b>Affected</b> se refere a
      todas as versões do software vulneráveis e não apenas aquela que tenha
      sido empacotada para o Fink. O relatório de exemplo mostra isto
      claramente.</p>
    
  
<? include_once "../../footer.inc"; ?>


