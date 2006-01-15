<a name="2006-01-10%20Fink%20%E3%81%8C%20XCode%202.2%20%E3%81%AB%E5%AF%BE%E5%BF%9C%20(Intel%20%E3%81%AF%E6%9C%AA%E5%AF%BE%E5%BF%9C)."><span class="news-date">2006-01-10: </span><span class="news-headline">Fink が XCode 2.2 に対応 (Intel は未対応).</span></a><?php gray_line(); ?>
<p>
Fink は XCode 2.2 への準備ができました。例外は openoffice.org パッケージです
(10.4 ツリーへ移行時には機能すると予定されています）。
ユーザーは、都合のいいときに XCode 2.2 へアップグレードしてください。
10.4 ツリーがリリースされるさいには、 XCode 2.2 が必要です。
</p>
<p>
他方、本日の Apple の発表にも関わらず、Fink はまだ Intel プロセッサに対応していません。
Fink チームは、数週間以内に Intel 対応版の fink をリリースできるものを考えております。
Fink チームとしては、新しい iMac に Fink をインストールせず、対応バージョンがリリースされるまで待つようお願い申し上げます。
</p>
<p>
Fink パッケージメンテナの方は、新しい <code>Architecture</code> フィールドに注意してください。
パッケージ化のマニュアルに説明されています。
</p>
<a name="2005-11-16%20XCode%202.2%20(10.4%20only)."><span class="news-date">2005-11-16: </span><span class="news-headline">XCode 2.2 (10.4 only).</span></a><?php gray_line(); ?>
<p>
Fink チームは、 XCode 2.2 コンパイラによるビルドがうまくいかないという報告を受けています。
問題が解決されるあmで、XCode のアップグレードを控えてください。
</p>
<p>
既に XCode 2.2 をインストールし、2.1 に戻したくない方は、
動作しないパッケージを見つけ、修正していただくようご協力をお願い申し上げます!
</p>

<a name="2005-06-09%20%E6%96%B0%E3%81%97%E3%81%84%20Fink%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9."><span class="news-date">2005-06-09: </span><span class="news-headline">新しい Fink リリース.</span></a><?php gray_line(); ?>
<p>
３つの新しい Fink リリースが今日から
<a href="<?php print $root; ?>download/index.php">ダウンロードできます</a>
 : version 0.8.0 (for 10.4),
version 0.7.2 (for 10.3), および version 0.6.4 (for 10.2).
いずれも、ソースファイル、バイナリパッケージ、新規ユーザー用インストーラが含まれています。
</p>
<p>
10.4 用の新しいリリースは、現在のすべての "stable" パッケージを、ソースとバイナリで提供します:
これは 1565 あり、10.3 リリースの 1909 パッケージの80%を超えるものです。
更なるパッケージの提供にむけて fink 開発者は作業を続けています。
</p>
<p>
新しい 10.2 用のリリースは、最後の公式リリースとなります。
今後の更新は (セキュリティアップデートを含めて) ありませんが、0.6.4 リリ−スは数年間の使用に耐えることができるでしょう。
</p>
<p>
10.4 へアップグレードするには、
<code>fink selfupdate</code> を実行し、
(10.4 で初めての更新時には) <code>sudo /sw/lib/fink/postinstall.pl</code> を実行し、
<code>fink scanpackages</code> と <code>sudo apt-get update</code> を実行します。
現在は bootstrap を勧めていません。
これは、Apple の XCode 2.1 では動作しないためです。
</p>
<p>
追補 6/19/05: 
Fink-0.8.0 バイナリインストーラが、volume does not support symlinks という場合、
(アプリケーションフォルダー内のユーティリティ内の) ディスクユーティリティから問題のボリュームを
選択し、"ディスクのアクセス権を修復"をクリックします。
また、インストールには管理者権限を必要とします。管理者権限のあるユーザでインストールを行ってください。
</p>
<p>
追補 6/30/05:  
古いヘッダファイルなどの混在を避けるため、ソースからパッケージをビルドされる方は
XCode をクリーンインストールすることをお勧めします。これを行うには、
<code>/Developer/Tools/uninstall-devtools.pl</code> スクリプトを実行します。
OS を更新する前にこの操作を行うことが一番確実です。
</p>


