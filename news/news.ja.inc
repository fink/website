<a name="2005-06-09 新しい Fink リリース."><span class="news-date">2005-06-09: </span><span class="news-headline">新しい Fink リリース.</span></a><?php gray_line(); ?>
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

<a name="2005-04-29 Fink と Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink と Tiger.</span></a><?php gray_line(); ?>
			<p>
Fink が OS X 10.4 に対応! 更新は以下の通り:
</p>
			<ul>
				<li>
バイナリの利用者に、バイナリインストーラは数週間以内に提供いたします。
それまでの間は、新規インストールは下記のように bootstrap してください。
</li>
				<li>
stable ツリーの利用者は、現在の fink を <code>sudo rm -Rf /sw</code> で削除し、
<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043&amp;release_id=326600">
fink-0.23.10.tar.gz</a> をダウンロード後、解凍し、"bootstrap"します。
つまり、 <code>tar -xvzf fink-0.23.10.tar.gz</code> し、
<code>fink-0.23.10</code> 内で <code>./bootstrap.sh </code> を実行します。
その後、<code>fink selfupdate</code> を実行する必要があります。
</li>
				<li>
unstable ツリーの利用者は、 fink のバージョンが 0.24.6 以前であれば <code>fink selfupdate</code> 
することでアップグレードされます。
10.4 にアップグレードしたら、<code>fink --version</code> で現在の fink のバージョンを確認してください。
0.24.6 以前であれば、 <code>fink selfupdate</code> を実行してください。
次に、 selfupdate をしたいても、していなくても、 <code>fink rebuild fink</code> し <code>fink selfupdate</code> を実行してください。
</li>
			</ul>
			<p>
全てのパッケージが 10.4 で動作する訳ではありませんが、数週間で改善されるでしょう。
stable ツリーのパッケージは 10.3 よりもだいぶ少ないですが、全てがコンパイルできるはずです。
</p>
		<a name="2004-11-20 gcc 問題の解決"><span class="news-date">2004-11-20: </span><span class="news-headline">gcc 問題の解決</span></a><?php gray_line(); ?>
			<p>Apple は、2004年11月に gcc3 アップデータをリリースしました。
(無料登録の後、) connect.apple.com からダウンロードできます。
このアップデータは、XCode 1.5 に含まれる gcc3 コンパイラの問題を修正しています。
XCode 1.5 の利用者はこのアップデータをインストールしてください。
(このアップデータは、何も手をつけていない XCode 1.5 をアップデートし、また Fink Project が以前推奨していた回避策をインストールしていてもアップデートします)</p>
			<p>この件に関して、われわれの報告に対処し、迅速に解決していただいた Apple に謝意を表します。</p>
		
