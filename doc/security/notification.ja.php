<?
$title = "セキュリティポリシー - 告知";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/07/08 15:50:32';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="セキュリティポリシー Contents"><link rel="prev" href="updating.php?phpLang=ja" title="セキュリティ更新手段">';


include_once "header.ja.inc";
?>
<h1>セキュリティポリシー - 5. 告知</h1>
        
        
        
			<p>
				ユーザーによっては頻繁にソフトウェアを更新しない人もいます。
				セキュリティ上の問題があるパッケージを使っている人々に知らせるために、 Fink announce リストに告知を出します。
			</p>
        
        <h2><a name="who">5.1 誰が告知するか?</a></h2>
            
			<p>				
				この場合の告知は <b>Fink Security Team</b> によってのみ送信されます。
				ほとんどの場合、下記の PGP キーフィンガープリント付きの dmalloc@users.sourceforge.net から送信されます
				:
            </p>
                <ul>
                    <li>
                FD77 F0B7 5C65 F546 EB08 A4EC 3CCA 1A32 7E24
                291E.
                </li>
                <li>Found at
                http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0x7E24291E</li></ul>
                <p>
                上記は故意にリンクされていません。</p>
				<p> 
					他の正式なチームメンバーは (ここに皆の公開鍵を追加):
				</p>
				<p>peter@pogma.com signed by the PGP key with the fingerprint:</p>
	        <ul>
	            <li>
		4D67 1997 DD32 AE8E D7ED  9C79 8491 2AB7 DF3B 6004.</li>
		<li>
		Found at http://pgp.mit.edu:11371/pks/lookup?op=get&amp;search=0xDF3B6004
        </li>
            </ul>
        
        <h2><a name="how">5.2 送信の方法</a></h2>
            
			<p>
				通常のセキュリティ告知のように、全てのセキュリティ告知は<b>下記のテンプレートに沿って書かれます</b>。
			</p>
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
                        References: KEYWORD (see above) Ref-URL: URL </pre>
            
            <p>以下は例です:</p>
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
                        Description: Multiple vulnerabilities in CVS found my ematters
                        Security. References: BID 
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
			<p>
				<b>Affected</b> キーワードは、 Fink パッケージ化されたものlだけでなく、全てのバージョンを指します。
				例でわかるでしょう。
			</p>
        
    
<? include_once "../../footer.inc"; ?>


