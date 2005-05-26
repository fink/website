<a name="2005-04-29 Fink と Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink と Tiger.</span></a><?php gray_line(); ?>
			<p>
Fink が OS X 10.4 に対応! 更新は以下の通り:
</p>
			<ul>
				<li>
バイナリの利用者に、バイナリインストーラは数週間以内に提供いたします。
</li>
				<li>
stable ツリーの利用者は、現在の fink を <code>sudo rm -Rf /sw</code> で削除し、
<a href="<?php print $root; ?>http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043&amp;release_id=323774">
fink-0.23.9.tar.gz</a> をダウンロード後、解凍し、"bootstrap"します。
つまり、 <code>tar -xvzf fink-0.23.9.tar.gz</code> し、
<code>fink-0.23.9</code> 内で <code>./bootstrap.sh </code> を実行します。
その後、<code>fink selfupdate</code> を実行する必要があります。
</li>
				<li>
unstable ツリーの利用者は、 fink のバージョンが 0.24.5 以前であれば <code>fink selfupdate</code> 
することでアップグレードされます。
10.4 にアップグレードしたら、<code>fink --version</code> で現在の fink のバージョンを確認してください。
0.24.5 以前であれば、 <code>fink selfupdate</code> を実行してください。
次に、 selfupdate をした人もしていない人も、 <code>fink reinstall fink</code> し、 <code>fink selfupdate</code> を実行してください。
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
		<a name="2004-10-15 gcc 問題の回避"><span class="news-date">2004-10-15: </span><span class="news-headline">gcc 問題の回避</span></a><?php gray_line(); ?>
			<p>XCode 1.5 に付属されているバージョンの gcc は、特定の条件下で c++ コードから間違った出力をすることがわかっています。Fink にはユーザーに警告するメカニズムがあり、この問題のある"壊れた" gcc を使ったパッケージのコンパイルを拒否します。</p>
			<p>既に XCode をバージョン1.5にアップグレードしている場合の回避方法は、<a href="http://article.gmane.org/gmane.os.apple.fink.beginners/13580">ここ</a>と<a href="http://article.gmane.org/gmane.os.apple.fink.beginners/14200">ここ</a>に書かれています。</p>
			<p>まだアップグレードしていない方は、この問題が解決されるまで XCode バージョン1.2を使う方が良いかもしれません。
</p>
		
