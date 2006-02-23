<a name="2006-02-21%20Intel%20%E4%B8%8A%E3%81%A7%E3%81%AE%E6%BA%96%E5%82%99%E3%83%90%E3%83%BC%E3%82%B8%E3%83%A7%E3%83%B3"><span class="news-date">2006-02-21: </span><span class="news-headline">Intel 上での準備バージョン</span></a><?php gray_line(); ?>
<p>
Fink の Intel アーキテクチュアに向けた準備ジャージョンが用意されました。
バイナリパッケージはまだありませんし、まだ細部には荒さが残っていますが、辛抱強いあなたなら使えるでしょう!
</p>
<p>
インストールには、
 <a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043">
Sourceforge の Fink 用ファイルリリースページ</a>
から <code>fink-0.24.12.tar.gz</code> ファイルを取得し、解凍後、 <code>./bootstrap.sh</code>
というコマンドを実行します。
bootstrap プロセスの最後に、 <code>fink selfupdate</code> を実行し、現在インストール可能なパッケージ一覧が取得できます。
</p>
<p>
最後に確認した時点では、およそ1750のパッケージが "stable" ツリーにありましたが、
およそ 150 はビルドできませんでした。
真の意味で stable となった時には、ここで再度アナウンスされます。
</p>
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


