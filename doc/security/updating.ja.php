<?php
$title = "セキュリティポリシー - 更新";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2005/02/04 09:30:20';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="セキュリティポリシー Contents"><link rel="next" href="notification.php?phpLang=ja" title="告知"><link rel="prev" href="sources.php?phpLang=ja" title="事件ソース">';


include_once "header.ja.inc";
?>
<h1>セキュリティポリシー - 4. セキュリティ更新手段</h1>
        
        
        <h2><a name="procedure">4.1 セキュリティ関連の更新の追加</a></h2>
            
				<p>
					セキュリティ更新は、 Fink パッケージ化されて問題が発見されたときに、ソフトウェアの作者によって確認されたときに一度だけ行う。
					更新の前に、下記の条件が<b>満たされる必要がある</b>。
				</p>
            <ul>
				<li>
					ソフトウェアの作者はメンテナと <b>Fink Core Team</b> に直接連絡をし、パッチや回避方法を伝える。
				</li>
				<li>
					問題の Fink パッケージのソースに対し、前述のソースがセキュリティ速報を発行した。
				</li>
				<li>
					下記のソースにパッチが発行された
					: BUGTRAQ,FULLDISC,SF-INCIDENTS,VULN-DEV.</li>
				<li>
					公式セキュリティ報告がなされ、 CVE 候補状況が設定された。
					また、問題の詳細が記述され、回避方法、パッチ、ソースの更新へのリンクが提供されている。
				</li>
				<li>
					パッチまたは回避方法とともに、行動を起こすようにメンテナと <b>Fink Core Team</b> に直接連絡が来た。
				</li>
            </ul>
        
        <h2><a name="moving">4.2 unstable から stable への移動</a></h2>
            
			<p>
				あるパッケージのセキュリティ更新は、まず unstable ツリーに対して行われます。
				<b>12</b> 時間以内にパッケージの info (とパッチ) ファイルは stable ツリーに移されます。
				この間は、更新されたパッケージが動作し、新たな問題を起こさないことを確認します。
			</p>
        
    <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="notification.php?phpLang=ja">5. 告知</a></p>
<?php include_once "../../footer.inc"; ?>


