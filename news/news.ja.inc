<a name="2007-11-18%20PDB%20Website%20Down"><span class="news-date">2007-11-18: </span><span class="news-headline">PDB Website Down</span></a><?php gray_line(); ?>
    <p>
    パッケージデータベースのウェブが現在停止しており、ご不便をかけております。
    できる限り早く解決できるよう復旧に向けて作業中です。
    ハードウェアとソフトウェアのアップグレードが完了するまでお待ち下さい。
    </p>
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
		
