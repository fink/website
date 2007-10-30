<a name="2007-10-26%20%E5%BD%93%E9%9D%A2%E3%81%AE%20Leopard%20%E3%82%B5%E3%83%9D%E3%83%BC%E3%83%88"><span class="news-date">2007-10-26: </span><span class="news-headline">当面の Leopard サポート</span></a><?php gray_line(); ?>
    <p>The Fink Project は Mac OS X Leopard (10.5) のサポートを開始します。</p>
<p>10.5 を利用されている方は、バイナリディストリビューションができるまでは、bootstrap で行う必要があります。
fink-0.27.7 を<a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">ここから</a>ダウンロードしてください。</p>
<p>10.4から10.5への更新は、 <code>fink selfupdate</code> を実行することで <code>fink-0.27.7</code> に更新されます。
10.5 でこれを行う場合は、 XCode 3.0 がインストールされていることを確認してください。
10.5 がインストールされましたら、<code>fink reinstall fink</code> を実行してください。</p>
<p>10.3 から 10.5 へ直接移行する方法は今のところありません。
どうしても使いたい方は、 <code>fink-0.27.7</code> tarball をダウンロードし、上述のように Fink ツリーを　bootstrap する必要があります。</p>
<p><b>Update 2007年10月29日:</b> アップグレードした場合、 <code>fink cleanup</code> を実行すると<b>全ての</b> .deb ファイルが削除されます。
この問題は次回のアップデート時に解決される予定です。</p>
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
<p><b>Update: 2006年8月21日:</b> サーバーが復旧されました。</p>
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
		
