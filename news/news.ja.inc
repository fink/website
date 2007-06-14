<a name="2007-03-04%20tar%20%E3%81%AE%E5%95%8F%E9%A1%8C"><span class="news-date">2007-03-04: </span><span class="news-headline">tar の問題</span></a><?php gray_line(); ?>
<p>
fink の unstable ツリーを使用していると、大きなパッケージをビルドする最後に、
<b>tar: File changed as we read it</b> のようなエラーが出ることがあり、
.deb ファイルがビルドされないことがあります。
</p><p>
fink team は、この問題を恒久的に直す方法を研究しています。
当面のところ、この問題にであったら、 <code>fink install tar-1.15.1-14</code>
で回避することができます。
これは、<code>fink update-all</code> をする度に実行する必要があるかもしれません。
</p><p>
この問題を恒久的に直す方法を決定ししだい、こちらで再度告知をいたします。
</p>
<p><b> Update: March 2007年3月16日: </b>
<code>dpkg</code> の新バージョンにて問題が解決されます。
Unstable を利用している方は、通常通り update を実行してください。
</p>
		<a name="2006-08-19%20%E3%82%B5%E3%83%BC%E3%83%90%E3%83%80%E3%82%A6%E3%83%B3;%20%E5%9B%9E%E9%81%BF%E7%AD%96%E6%9C%89%E3%82%8A%E3%80%82"><span class="news-date">2006-08-19: </span><span class="news-headline">サーバダウン; 回避策有り。</span></a><?php gray_line(); ?>
<p><b> Update: 2006年8月21日: </b> サーバーが復旧されました。</p>
	<p> 
現在、fink の４つの重要なサービス (rsync 更新、バイナリ配布, ソースファイルの "master mirror", パッケージデータベース)
をホストしているサーバがダウンしています。
8月21日月曜日頃には復旧すると思われますが、それまでの間は回避策を提供いたします。
</p><p>
fink を更新する際は、primary ミラー以外の rsync ミラーを選択する (次のパラグラフで解説) か、
<code>fink selfupdate-cvs</code> コマンドを使います。
このコマンドはいっぱい実行するだけで、次回からの更新も CVS を用いるようになります。
サーバが復旧したら、<code>fink selfupdate-rsync</code> とすることで rsync 更新に戻すことができます。
</p><p>
バイナリ配布の不在と、ソースファイルの "master mirror" に関しては、
<code>fink configure</code> コマンドを実行します。
以下の質問以外に対しては、既定の答を受け入れてください。
"Should Fink try to download pre-compiled packages from 
the binary distribution if available?" には "no" を
(バイナリ配布を無効化する)。
ミラー設定を変えるか聞かれた場合 "yes" と答える。
この後、"What mirror order should fink use 
when downloading sources?" と聞かれるので、
"2: Search Master Mirrors last"
(master mirror サーバを自動的に選択する機能を無効化)
と答えます。
最後に、 更新に rsync を用いると決めていて、
"Choose a mirror for 'RSync SelfUpdate'" 
と聞かれた場合、
rsync://master.us.finkmirrors.net/finkinfo/
以外を選択してください。
米国にいる場合、残念ながら他には選択肢がないかもしれません。
</p><p>
最後に、パッケージデータベースを使うには、
<a href="http://lists.finkproject.org/pdb">データベースのバックアップ</a>
を使いください。
ただし、これは数週間遅れたデータになります。
</p>
<p><b> Update: 2007年6月2日</b> 10.4.9 の <code>sudo</code> の挙動が変わりました。
これによって、更新スクリプトはそのままでは作動しなくなりました。
最初に <code>sudo -s</code> として、スーパーユーザーにすれば大丈夫です。</p>
		<a name="2006-07-24%20%E6%B3%A8%E6%84%8F:%20%2210.4-transitional%22%20%E3%83%84%E3%83%AA%E3%83%BC%E3%81%AE%E3%82%B5%E3%83%9D%E3%83%BC%E3%83%88%E3%81%AF2006%E5%B9%B48%E6%9C%881%E6%97%A5%E3%81%AB%E7%B5%82%E4%BA%86"><span class="news-date">2006-07-24: </span><span class="news-headline">注意: "10.4-transitional" ツリーのサポートは2006年8月1日に終了</span></a><?php gray_line(); ?>
			<p>
				"10.4-transitional" ツリーは、 GCC 3.3 (Mac OS X 10.3 のデフォルトコンパイラ) と
				GCC 4.0 (Mac OS X 10.4 のデフォルトコンパイラ) のバイナリ間の非互換性問題にたいする暫定的な解決策でした。
				ようやく Fink は GCC 4.0 へ移行する作業が終了しましたので、 "10.4" ツリーへ移行してください。
				"10.4-transitional" ツリーのサポートは、2006年8月1日をもって終了いたします。
			</p>
			<p><b>"fink --version" が "0.8.1.cvs" または "0.8.1.rsync" と表示する場合、特にすることはありません。</b></p>
			<p>
				<a href="<?php print $root; ?>news/#2006-07-01%20July%20is%20%22Fink%20Update%20Month%22">以前述べたとおり</a>、
				"10.4" ツリーへの移行方法は2種類あります。
			</p>
			<p>
				一番簡単な方法は、既存の Fink インストールを削除し、<a href="<?php print $root; ?>download">ダウンロードページ</a>から 0.8.1 インストーラを入手してインストールし直すことです。
			</p>
			<p>
				既存の Fink を残す方法は、
				<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">アップグレードスクリプト</a>
				をダウンロードし、README を読みながら既存のインストールされているものをアップグレードすることです。
				これは Fink インストールをソースから再ビルドし、全てをアップグレードします。
				インストール状況によっては、相当な時間がかかります！
			</p>
			<p>
				アップグレードスクリプトの評判は上々です。多くのユーザがこれで "10.4" ツリーへスイッチしています。
				それでも何か問題がありましたら、<a href="<?php print $root; ?>lists">メーリングリスト</a>にメールをしてください。
			</p>
		
