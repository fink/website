<?
$title = "Política de segurança - Fontes";
$cvs_author = 'Author: monipol';
$cvs_date = 'Date: 2009/07/26 11:13:27';
$metatags = '<link rel="contents" href="index.php?phpLang=pt" title="Política de segurança Contents"><link rel="next" href="updating.php?phpLang=pt" title="Política de atualização de segurança"><link rel="prev" href="severity.php?phpLang=pt" title="Tempos de resposta e ações imediatas">';


include_once "header.pt.inc";
?>
<h1>Política de segurança - 3. Fontes de incidentes</h1>
    
    

    <h2><a name="sources">3.1 Fontes de incidentes aceitas</a></h2>
      

      <p>Como relator de um incidente segurança em um software empacotado pelo
      Fink, você deve garantir que a vulnerabilidade do software também existe
      no Mac OS X. É responsabilidade da parte notificadora garantir que uma
      das seguintes fontes reforce o problema relatado para o software em
      questão.</p>

      <ol>
        <li><b>AIXAPAR</b>: AIX APAR (Authorised Problem Analysis Report)</li>
        <li><b>APPLE</b>: Apple Security Update</li>
        <li><b>ATSTAKE</b>: @stake security advisory</li>
        <li><b>AUSCERT</b>: AUSCERT advisory</li>
        <li><b>BID</b>: Security Focus Bugtraq ID database entry</li>
        <li><b>BINDVIEW</b>: BindView security advisory</li>
        <li><b>BUGTRAQ</b>: Posting to Bugtraq mailing list</li>
        <li><b>CALDERA</b>: Caldera security advisory</li>
        <li><b>CERT</b>: CERT/CC Advisories</li>
        <li><b>CERT-VN</b>: CERT/CC vulnerability note</li>
        <li><b>CIAC</b>: DOE CIAC (Computer Incident Advisory Center) bulletins</li>
        <li><b>CONECTIVA</b>: Conectiva Linux advisory</li>
        <li><b>CONFIRM:</b> URL do local onde o fornecedor confirma que o problema existe</li>
        <li><b>DEBIAN</b>: Debian Linux Security Information</li>
        <li><b>EEYE</b>: eEye security advisory</li>
        <li><b>EL8</b>: EL8 advisory</li>
        <li><b>ENGARDE</b>: En Garde Linux advisory</li>
        <li><b>FEDORA</b>: Fedora Project security advisory</li>
        <li><b>FULLDISC</b>: Full-Disclosure mailing list</li>
        <li><b>FreeBSD</b>: FreeBSD security advisory</li>
        <li><b>GENTOO</b>: Gentoo Linux security advisory</li>
        <li><b>HERT</b>: HERT security advisory</li>
        <li><b>HP</b>: HP security advisories</li>
        <li><b>IBM</b>: IBM ERS/BRS advisories</li>
        <li><b>IMMUNIX</b>: Immunix Linux advisory</li>
        <li><b>INFOWAR</b>: INFOWAR security advisory</li>
        <li><b>ISS</b>: ISS Security Advisory</li>
        <li><b>KSRT</b>: KSR[T] Security Advisory</li>
        <li><b>L0PHT</b>: L0pht Security Advisory</li>
        <li><b>MANDRAKE</b>: Linux-Mandrake advisory</li>
        <li><b>MISC</b>: referência a uma URL genérica</li>
        <li><b>MLIST</b>: referência genérica a listas de discussão</li>
        <li><b>NAI</b>: NAI Labs security advisory</li>
        <li><b>NETECT</b>: Netect security advisory</li>
        <li><b>NetBSD</b>: NetBSD Security Advisory</li>
        <li><b>OPENBSD</b>: OpenBSD Security Advisory</li>
        <li><b>REDHAT</b>: Security advisories</li>
        <li><b>RSI</b>: Repent Security, Inc. security advisory</li>
        <li><b>SEKURE</b>: Sekure security advisory</li>
        <li><b>SF-INCIDENTS</b>: mensagem na lista de discussão Security Focus Incidents</li>
        <li><b>SGI</b>: SGI Security Advisory</li>
        <li><b>SLACKWARE</b>: Slackware security advisory</li>
        <li><b>SNI</b>: Secure Networks, Inc. security advisory</li>
        <li><b>SUN</b>: Sun security bulletin</li>
        <li><b>SUNALERT</b>: Sun security alert</li>
        <li><b>SUNBUG</b>: Sun bug ID</li>
        <li><b>SUSE</b>: SuSE Linux: Security Announcements</li>
        <li><b>TRUSTIX</b>: Trustix Security Advisory</li>
        <li><b>TURBO</b>: TurboLinux advisory</li>
        <li><b>VULN-DEV</b>: Posting to VULN-DEV mailing list</li>
        <li><b>VULNWATCH</b>: VulnWatch mailing list</li>
        <li><b>XF</b>: X-Force Vulnerability Database</li>
        <li><b>CVE</b>: CVE Candidates </li>
      </ol>

      <p>As palavras-chaves acima estão de acordo com a <a href="http://www.cve.mitre.org/cve/refs/refkey.html">lista de
      palavras-chaves recomendadas pelo CVE</a>.</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="updating.php?phpLang=pt">4. Política de atualização de segurança</a></p>
<? include_once "../../footer.inc"; ?>


