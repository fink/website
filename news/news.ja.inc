<a name="2006-05-10%20CVS%20%E3%83%88%E3%83%A9%E3%83%96%E3%83%AB"><span class="news-date">2006-05-10: </span><span class="news-headline">CVS トラブル</span></a><?php gray_line(); ?>
      <p>
Fink ユーザの多くが気づいているように、sourceforge.net の Fink CVS レポジトリは3月30日より、完全には機能していませんでした。
anonymous CVS アクセスは、この時より update ができていません。
数日前より、開発者もどのような形であれ CVS update ができませんでした。
</p><p>
sourceforge のスタッフによる現在の計画を理解する限り 
(<a href="http://sourceforge.net/docman/display_doc.php?docid=2352&amp;group_id=1">サイト状態ページ</a>を参照)、
古い CVS サーバは、現在の形では戻ってこないようです。
これにより、Fink ユーザの分断が予想されますが、どのような形で分断されるかは今の段階では述べることができません。
</p><p>
Fink ユーザへの現在のアドバイスとしては、更新方法を 'rsync' に変更することです
(コマンド 'fink selfupdate-rsync' を実行します)。
これにより、５月７日時点の fink インストールにまで上げることができます。
もし、fink の通常の selfupdate コマンドで、新しい CVS へ完全に更新することが不可能であれば、
更新手順が決まり次第、ここでお知らせいたします。
</p>
<p>Update 5/24/06: CVS は再び機能しています。
rsync による selfupdate を行っているユーザは、最新の情報を得ることができます。
cvs を用いている場合で、 rsync にスイッチできない (またはしたくない) 場合、
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=69685">the
Sourceforge file release page</a>
から
<code>fink-mirrors-0.24.15.2.tar.gz</code>
というファイルをダウンロードし、解凍し、
<code>fink-mirrors-0.24.15.2</code> ディレクトリ内で
<code>./inject.pl</code> を実行します。
この後、 <code>fink selfupdate</code> コマンドが通常通り機能するはずです。
</p>
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

