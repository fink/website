<?
$title = "セキュリティポリシー - 返答";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/07/08 15:50:32';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="セキュリティポリシー Contents"><link rel="next" href="sources.php?phpLang=ja" title="事件ソース"><link rel="prev" href="respo.php?phpLang=ja" title="責任">';


include_once "header.ja.inc";
?>
<h1>セキュリティポリシー - 2. 返答時間と即時行動</h1>
        
        
        
				<p>
					返答時間と行動は Fink パッケージ化されたソフトウェアの欠陥による損失の度合いによって変わります。
					どのような場合であれ、 <b>Fink Core Team</b> は Fink コミュニティを守るために必要と思われる行動を直ちにとります。
				</p>
        
        <h2><a name="resptimes">2.1 応答時間</a></h2>
            
				<p>
					各パッケージは以下の返答時間を満たすよう最大限の努力を払わなければならない。
					問題によっては、 <b>Fink Core Team</b> が即時行動をとることもある。
					このような場合、 Core Team のメンバーがメンテナに告知を行う。
					返答時間を満たすよう最大限の努力を払うが、 Fink は有志による活動のため、保証はできない。
				</p>
            <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">問題</th><th align="left">返答時間</th></tr><tr valign="top"><td>remote root exploit</td><td>
                        <p>minimum: <b>immediate</b>; maximum: <b>12</b> hours.</p>
                    </td></tr><tr valign="top"><td>local root exploit</td><td>
                        <p>minimum: <b>12</b> hours; maximum: <b>36</b> hours.</p>
                    </td></tr><tr valign="top"><td>remote DOS</td><td>
                        <p>minimum: <b>6</b> hours; maximum: <b>12</b> hours.</p>
                    </td></tr><tr valign="top"><td>local DOS</td><td>
                        <p>minimum: <b>24</b> hours; maximum: <b>72</b> hours.</p>
                    </td></tr><tr valign="top"><td>remote data corruption</td><td>
                        <p>minimum: <b>12</b> hours; maximum: <b>24</b> hours.</p>
                    </td></tr><tr valign="top"><td>local data corruption</td><td>
                        <p>minimum: <b>24</b> hours; maximum: <b>72</b> hours.</p>
                    </td></tr></table>
        
        <h2><a name="forced">2.2 強制更新</a></h2>
            
				<p>
					<b>Fink Core Team</b> は、パッケージメンテナの行動を待たずしてパッケージを更新することがある。
					これは強制更新 (forced update) と呼ばれる。
					返答の最大時間を満たしていない特にも forced update が行使される。
				</p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="sources.php?phpLang=ja">3. 事件ソース</a></p>
<? include_once "../../footer.inc"; ?>


