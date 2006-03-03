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
    <a name="2004-09-20 Fink 0.7.1 リリース"><span class="news-date">2004-09-20: </span><span class="news-headline">Fink 0.7.1 リリース</span></a><?php gray_line(); ?>
      <p>最新版の Fink、バージョン0.7.1 (10.3用) がソースとバイナリユーザーを対象にリリースされました。このリリースは Panther (10.3) 系の Mac OS X 用です。 Jaguar (10.2) 系の Mac OS X バージョンには、今まで通り0.6.3 リリースをお使いください。</p>
      <p>パッケージマネージャの修正と、多くのバイナリパッケージの追加によって1650のバイナリパッケージ化がこのリリースの内容です。KDE 3.1.4 と GNOME 2.4 のバイナリを含んでいます。</p>
      <p>Fink を完全にインストールするには、<a href="<?php print $root; ?>download/index.php">ここ</a>に投稿された方法で行う必要があります。現在の Fink を最新の Fink にアップグレードすることもできます。0.7.0と0.7.1の変更一覧は<a href="http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable&amp;cmp=0&amp;tree2=0.7.0-stable&amp;splitoffs=on&amp;sort=name">このページ</a>にあります。
</p>
      <p>疑問や問題がある場合、 Fink メーリングリストをご利用ください。リストについては<a href="<?php print $root; ?>lists/index.php">ここ</a>を参照してください。</p>
      <p>自分のプラットフォーム用のインストーラを使用してください。
Fink 0.6.3 が Mac OS X 10.2.* 用で、 Fink 0.7.1 が Mac OS X 10.3.* 用です。</p>
      <p>Fink Team は、このリリースの貢献者、手伝ってくれた方、開発者の方々に謝意を表します。
また、 この前の 0.7.0 リリースを 130,000 以上もダウンロードしてくれたコミュニティにも感謝しています。
彼らの永きにわたる支持と価値あるポインタなくして、現在の Fink はありえませんでした。</p>
    
