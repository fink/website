<a name="2006-03-03%20Apple%20%E3%81%AE%E6%9C%80%E6%96%B0%E3%81%AE%20Security%20Update%E3%80%80%E3%81%AB%E4%BB%98%E9%9A%8F%E3%81%99%E3%82%8B%E5%95%8F%E9%A1%8C"><span class="news-date">2006-03-03: </span><span class="news-headline">Apple の最新の Security Update　に付随する問題</span></a><?php gray_line(); ?>
      <p>
Fink チームは、 <code>rsync</code> を実行した際の問題についての報告を受けました。
このプログラムは Apple の Security Update 2006-001 にて更新されました: 
ユーザーによっては、Security Update 後、<code>fink selfupdate</code> が使用不能になります。
(原因は <code>rsync</code> の <code>--delete</code> にあるようです。)
</p>
      <p>
対処方法として、<code>fink install rsync</code> とし、 fink の rsync を用います。
あるいは、Apple の方に特有の機能 (例えば Extended Attributes のサポート) を使いたい場合、
<code>fink selfupdate-cvs</code> として、更新時に rsync の代わりに cvs を用います。
</p>
      <p>
このニュースは、状況が変わりしだい更新されます。
</p>
<p>Update 3/13/06: security update 2006-002 によって修正されました。
<a href="http://docs.info.apple.com/article.html?artnum=303453">アップルの文書を参照</a>。
</p>
    <a name="2006-02-21%20Intel%20%E4%B8%8A%E3%81%A7%E3%81%AE%E6%BA%96%E5%82%99%E3%83%90%E3%83%BC%E3%82%B8%E3%83%A7%E3%83%B3"><span class="news-date">2006-02-21: </span><span class="news-headline">Intel 上での準備バージョン</span></a><?php gray_line(); ?>
<p>
Fink の Intel アーキテクチュアに向けた準備ジャージョンが用意されました。
バイナリパッケージはまだありませんし、まだ細部には荒さが残っていますが、辛抱強いあなたなら使えるでしょう!
</p>
<p>
インストールには、
 <a href="http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=13043">
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

