<?
$title = "News";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2006/08/04 21:17:13';
$metatags = '';

include_once "header.inc";
?>

<a name="2006-07-24%20%E6%B3%A8%E6%84%8F:%20%2210.4-transitional%22%20%E3%83%84%E3%83%AA%E3%83%BC%E3%81%AE%E3%82%B5%E3%83%9D%E3%83%BC%E3%83%88%E3%81%AF2006%E5%B9%B48%E6%9C%881%E6%97%A5%E3%81%AB%E7%B5%82%E4%BA%86"><span class="news-date">2006-07-24: </span><span class="news-headline">注意: "10.4-transitional" ツリーのサポートは2006年8月1日に終了</span></a><?php gray_line(); ?>
			<p>

				"10.4-transitional" ツリーは、 GCC 3.3 (Mac OS X 10.3 のデフォルトコンパイラ) と
				GCC 4.0 (Mac OS X 10.4 のデフォルトコンパイラ) のバイナリ間の非互換性問題の暫定的解決策でした。
				ようやく Fink は GCC 4.0 へ移行する作業が終了し、 "10.4" ツリーへ移行していただくよう、
				"10.4-transitional" ツリーの2006年8月1日をもってサポートを終了いたします。
			</p>
			<p><b>"fink --version" が "0.8.1.cvs" または "0.8.1.rsync" と表示する場合、特にすることはありません。</b></p>
			<p>
				<a href="<?php print $root; ?>news#2006-07-01%20July%20is%20%22Fink%20Update%20Month%22">以前述べたとおり</a>、
				"10.4" ツリーへの以降方法は2種類あります。
			</p>
			<p>
				一番簡単なのは、既存の Fink インストールを削除し、<a href="<?php print $root; ?>download">ダウンロードページ</a>から 0.8.1 インストーラを入手してインストールし直すことです。
			</p>
			<p>
				既存の Fink を残す方法は、
				<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">アップグレードスクリプト</a>
				をダウンロードし、README を読みながら既存のインストールされているものをアップグレードすることです。
				これは Fink インストールをソースから再ビルドし、全てをアップグレードします。
				インストール状況によっては、相当な時間がかかります！
			</p>
			<p>
				アップグレードスクリプトの評判は上々です。多くのユーザがこれでスイッチしています。
				それでも何か問題がありましたら、<a href="<?php print $root; ?>lists">リスト</a>にメールをしてください。
			</p>
		<a name="2006-07-24%20Fink%20Birds-of-a-Feather%20at%20OSCON%202006"><span class="news-date">2006-07-24: </span><span class="news-headline">Fink Birds-of-a-Feather at OSCON 2006</span></a><?php gray_line(); ?>
			<p>Are you at OSCON 2006?  Want to meet up?</p>
			<p>
				<a href="mailto:oscon2006@racoonfink.com">Benjamin Reed</a> (RangerRick on #fink)
				は OSCON に来ており、Fink に興味がある人も嫌いな人も大歓迎です。
			</p>
			<p>
				7月26日午後8時半、 room F150 にて Fink や Mac OS X 、その他諸々のことを話します、
			</p>
		<a name="2006-07-01%20%E6%96%87%E6%9C%88%E3%81%AF%20%22Fink%20%E6%9B%B4%E6%96%B0%E6%9C%88%22%20%E3%81%A7%E3%81%99"><span class="news-date">2006-07-01: </span><span class="news-headline">文月は "Fink 更新月" です</span></a><?php gray_line(); ?>
      <p>
PowerPC 上の Fink ユーザは、古い "10.4-transitional" から、より新しい "10.4" ツリーへ fink を更新することをお勧めします。
2006年7月末には 10.4-transitional ツリーはサポートを終了する予定です。
</p><p>
背景: OS X 10.4 とともに来た、新しいバージョンの g++ コンパイラ
(Fink の馬車馬の一頭) は、以前のバージョンとはバイナリ非互換なコードを生成します。
10.4-transitional ツリーを使う際は、Fink は新しい gcc-4.0 コンパイラと古い g++-3.3 コンパイラを組み合わせて使います。
この戦略は、g++-4.0 と互換のパッケージをつくるため、よけいな時間を必要とします。
移行は完了の時期に達し、新しいツリーにのみ依存します。
しかし、g++ ライブラリを用いている、あるいは提供している全てのパッケージを、正しい順序で再ビルドしなければいけないのが少し厄介です。
</p><p>
OS X 10.4 を使っている方は、
<code>fink --version</code>
というコマンドを実行することで、Fink を更新する必要があるかどうかわかります。
Distribution version が 0.8.1.cvs か 0.8.1.rsync であれば、更新の必要は<b>ありません</b>。
Distribution version が 0.8.0.cvs か 0.8.0.rsync であれば、以下に述べるように更新してください。
</p>
<p>
多くのユーザは、簡単に、fink インストールを削除し、0.8.1 インストーラでインストールしてください。
他の方は、コンパイル済みの基本 fink パッケージと既存 fink インストールを更新するスクリプトの入っている
<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.3.tar.gz?download">10.4-update tarball (v. 0.3)</a> (およそ 12 MB)　
を使うと良いでしょう。
(tarball を解凍後、)詳細については 10.4-update ディレクトリ内の README ファイルを参考にしてください。
</p>
<p>
注記: OS X 10.3 から OS X 10.4 へアップグレードする Fink ユーザは、同じく二つの方法があります。
古い fink インストールを削除して新規にインストールするか、
同じ 10.4-update tarball を使います。
更新スクリプトは、OS X がアップグレードされた後には実行しないでください。
</p>
<a name="2006-06-15%20%E6%96%B0%E3%81%97%E3%81%84%20Fink%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2006-06-15: </span><span class="news-headline">新しい Fink リリース</span></a><?php gray_line(); ?>
      <p>
本日より、10.4 (Tiger) 用の新しい Fink リリースが
<a href="<?php print $root; ?>download/index.php">あります</a>
: version 0.8.1。
これは、Intel または PowerPC のマシンにインストールすることができます。
このリリースには、ソースファイル、バイナリパッケージ、両ハードウェアのインストーラがあります。
</p>
      <p>
Intel プラットフォーム上での Fink は、まだ"ベータ"の扱いで、
多くのパッケージ (特に "unstable" ツリーにあるもの)は、コンパイルできなかったり、
コンパイルできても動作しなかったりします。
状況の改善作業はこれからも続きます。
</p>
<p>
10.4-transitional ツリー (0.8.0 ディストリビューションから) を使っているこれまでの fink インストールを使っている Fink ユーザには、
2つのアップグレード方法があります。
アップグレードの作業には、g++ ライブラリの ABI 変更がライブラリの再コンパイルを必要とするため、問題があります。
多くのユーザは、簡単に、fink インストールを削除し、0.8.1 インストーラでインストールしてください。
他の方は、コンパイル済みの基本 fink パッケージと既存 fink インストールを更新するスクリプトの入っている
<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.3.tar.gz?download">10.4-update tarball (v. 0.3)</a> (およそ 12 MB)　
を使うと良いでしょう。
</p>
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
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203&amp;package_id=69685">
Sourceforge ファイルリリースページ</a>
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
Fink の Intel アーキテクチュアに向けた準備バージョンが用意されました。
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
<a name="2005-11-16%20XCode%202.2%20(10.4%20only)."><span class="news-date">2005-11-16: </span><span class="news-headline">XCode 2.2 (10.4 only).</span></a><?php gray_line(); ?>
<p>
Fink チームは、 XCode 2.2 コンパイラによるビルドがうまくいかないという報告を受けています。
問題が解決されるまで、XCode のアップグレードを控えてください。
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

<a name="2005-04-29%20Fink%20%E3%81%A8%20Tiger."><span class="news-date">2005-04-29: </span><span class="news-headline">Fink と Tiger.</span></a><?php gray_line(); ?>
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
		<a name="2004-11-20%20gcc%20%E5%95%8F%E9%A1%8C%E3%81%AE%E8%A7%A3%E6%B1%BA"><span class="news-date">2004-11-20: </span><span class="news-headline">gcc 問題の解決</span></a><?php gray_line(); ?>
			<p>Apple は、2004年11月に gcc3 アップデータをリリースしました。
(無料登録の後、) connect.apple.com からダウンロードできます。
このアップデータは、XCode 1.5 に含まれる gcc3 コンパイラの問題を修正しています。
XCode 1.5 の利用者はこのアップデータをインストールしてください。
(このアップデータは、何も手をつけていない XCode 1.5 をアップデートし、また Fink Project が以前推奨していた回避策をインストールしていてもアップデートします)</p>
			<p>この件に関して、われわれの報告に対処し、迅速に解決していただいた Apple に謝意を表します。</p>
		<a name="2004-10-15%20gcc%20%E5%95%8F%E9%A1%8C%E3%81%AE%E5%9B%9E%E9%81%BF"><span class="news-date">2004-10-15: </span><span class="news-headline">gcc 問題の回避</span></a><?php gray_line(); ?>
			<p>XCode 1.5 に付属されているバージョンの gcc は、特定の条件下で c++ コードから間違った出力をすることがわかっています。Fink にはユーザーに警告するメカニズムがあり、この問題のある"壊れた" gcc を使ったパッケージのコンパイルを拒否します。</p>
			<p>既に XCode をバージョン1.5にアップグレードしている場合の回避方法は、<a href="http://article.gmane.org/gmane.os.apple.fink.beginners/13580">ここ</a>と<a href="http://article.gmane.org/gmane.os.apple.fink.beginners/14200">ここ</a>に書かれています。</p>
			<p>まだアップグレードしていない方は、この問題が解決されるまで XCode バージョン1.2を使う方が良いかもしれません。
</p>
		<a name="2004-09-20%20Fink%200.7.1%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2004-09-20: </span><span class="news-headline">Fink 0.7.1 リリース</span></a><?php gray_line(); ?>
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
		<a name="2004-08-23%20Problems%20with%20XCode%201.5"><span class="news-date">2004-08-23: </span><span class="news-headline">Problems with XCode 1.5</span></a><?php gray_line(); ?>
			<p>
	In the past few days, there have been reports that some fink packages 
	do not compile correctly using XCode 1.5.  If you have not already
	upgraded to XCode 1.5, we suggest that you wait until this issue
	is resolved before doing so.
	</p>
			<p>
	If you are having problems with a package which compiled under
	XCode 1.2 but does not compile correctly under XCode 1.5, 
	please report the package to
	the fink-devel mailing list.  (The usual symptom is: some symbols
	are  missing after compiling with g++.)  
	Packages already known to have this problem include
	octave, singular-factory, singular-libfac, and possibly sdl.
	</p>
		<a name="2004-08-21%20Error%20in%20fink-0.22.0"><span class="news-date">2004-08-21: </span><span class="news-headline">Error in fink-0.22.0</span></a><?php gray_line(); ?>
			<p>
	The fink-0.22.0 package manager, which was available briefly in the 
	unstable tree this past week, had a bug which prevents further
	updating via rsync.  If you installed this version of fink, you
	can recover by running the command 
	<code>fink install fink-0.21.2-1</code> which will downgrade fink
	to the version in the stable tree, and subsequently running
	<code>fink selfupdate</code>
	</p>
			<p>
	If for any reason those commands don't work, go to 
	<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">the 
	fink file release page at sourceforge</a> and download the
	file <code>fink-0.22.1.tar.gz</code> (or a more recent, i.e.,
	higher numbered, version).  Unpack this file with
	<code>tar xfz fink-0.22.1.tar.gz</code> , and then from within the
	fink-0.22.1 directory, run the command <code>./inject.pl</code>
	</p>
			<p>
	The fink team apologizes for the error, and thanks the user 
	community for bringing it to our attention quickly.
	</p>
		<a name="2004-08-01%20Improving%20our%20mirrors.%20Can%20you%20help?"><span class="news-date">2004-08-01: </span><span class="news-headline">Improving our mirrors. Can you help?</span></a><?php gray_line(); ?>
			<p>
	Fink's decision to gradually build its own network of mirrors
	has paid off. To make sure that we can continue to offer
	a high quality service we need to improve our mirror network.
	It has been some time since we last asked for more mirrors. 
	It is time to do so again. Fink is very grateful for the resources 
	granted to us by our community. To further improve our service to the 
	community we require an even better mirror system. We especially lack 
	mirrors in central Europe, Russia and the Far East. If you feel that 
	you have at least two Mbit to spare for a rsync mirror, or more to offer 
	a distfiles mirror, please <a href="mailto:mirrors@finkmirrors.net">contact us</a>.
	</p>
			<p>
	 To get a better understanding of the different types of mirrors 
	 Fink offers, please review <a href="http://finkmirrors.net/">finkmirrors.net</a>. This is the official homepage for all mirror related issues.
	 If you feel that you can offer other types of resources, 
	 web-space for testing as an example, please do not hesitate in <a href="mailto:mirrors@finkmirrors.net">contacting us</a> as well.
	</p>
		<a name="2004-04-06%20Fink%200.6.3%20and%200.7.0%20released."><span class="news-date">2004-04-06: </span><span class="news-headline">Fink 0.6.3 and 0.7.0 released.</span></a><?php gray_line(); ?>
			<p>
The latest Fink releases, version 0.6.3 (for 10.2) and 0.7.0 (for 10.3), 
are now available for both source and binary users.  The 0.6.3 release has 
been built on <b>10.2</b>, while release 
0.7.0 has been built on <b>10.3</b>. This should facilitate better support for the different platforms. 
	</p>
			<p>
These new releases incorporate various fixes to the package manager, many previously 
unavailable binary packages have been added and problematic packages for 10.3 users have been rebuilt. 
	</p>
			<p>
To complete a new Fink installation you should follow the instructions posted 
<a href="<?php print $root; ?>download/index.php?phpLang=en">here</a>.
You may upgrade your existing Fink installation to the latest Fink release by following the instructions posted <a href="<?php print $root; ?>download/upgrade.php?phpLang=en">here</a>.

If you have questions or problems, please try the Fink mailing lists you can learn more about them 
<a href="<?php print $root; ?>lists/index.php?phpLang=en">here</a>.
		</p>
			<p>
Please make sure you pick the <b>appropriate installer</b> for your Platform.
Fink 0.6.3 will only install on Mac OS X 10.2.* while Fink 0.7.0 will only install on Mac OS X 10.3.* 
		</p>
			<p>
The Fink Team would like to thank its many contributors, frequent helpers 
and developers for making this release happen. 
We also thank our community, without their constant support and valuable 
pointers Fink would not be where we are now.. 

</p>
		<a name="2004-02-19%20Raise%20your%20Flag."><span class="news-date">2004-02-19: </span><span class="news-headline">Raise your Flag.</span></a><?php gray_line(); ?>
			<p>
Thanks to Baba Yoshihiko, Fink has now taken the necessary steps to allow for 
internationalisation efforts. 
The improved infrastructure enables us to display a multilingual web-site to our visitors from all over the world. 
</p>
			<p>
This also means that we need volunteers. The Fink web-site needs to be translated into the language of your choice. 
A translation into Japanese is being worked on and the translation into French has been taken over by Michele Garoche. 
Which language are you willing to translate?
</p>
			<p>
If you are willing to become a member of the internationalisation team or wish to provide feedback on 
the web-site feel free to join the new mailing-list.
You can do so by going to our <a href="<?php print $root; ?>lists/index.php">mailing-lists page</a>. The full announcement on the existing 
mailing lists can be read <a href="http://article.gmane.org/gmane.os.apple.fink.devel/7554">here</a>.
</p>
		<a name="2004-02-02%20Java%201.4.2%20Update%20Removes%20Java%20SDK"><span class="news-date">2004-02-02: </span><span class="news-headline">Java 1.4.2 Update Removes Java SDK</span></a><?php gray_line(); ?>
			<p>
If you previously had Java 1.4.1 and the Java SDK installed, the new
Java 1.4.2 update from apple will upgrade the Java runtime to 1.4.2,
but will <b>remove</b> the previous 1.4.1 Java runtime and
SDK <b>without</b> upgrading the JDK.  To build Java packages in Fink
you will need to <a href="http://connect.apple.com/">go to
connect.apple.com and download the Java 1.4.2 SDK</a> (free
registration required).
	</p>
		<a name="2004-01-18%2010.3%20binaries%20updated"><span class="news-date">2004-01-18: </span><span class="news-headline">10.3 binaries updated</span></a><?php gray_line(); ?>
			<p>
Many of the binary files for 10.3 have been updated, eliminating problems
with qt and kde, among others.  To access the updated files, bring your
index of binary files up-to-date by running the
command <code>sudo apt-get update</code> .  After this, you can use
apt-get, dselect or FinkCommander to install binary files as usual.
	</p>
		<a name="2004-01-10%20Pssst%20want%20to%20install%20GNOME%202.4?"><span class="news-date">2004-01-10: </span><span class="news-headline">Pssst want to install GNOME 2.4?</span></a><?php gray_line(); ?>
			<p>
	Thanks to the new Fink GNOME Core team, including a lot of hard work by packaging
	newcomer Keith Conger and GNOME 1.x maintainer Masanori Sekino, GNOME 2.4 has
	finally been released to the 10.3 unstable tree.
	</p>
			<p>
	It is there for the taking; please offer some of your time and test these packages
	if you are on unstable already.  Because of the massive number of changes, it is
	expected that there will be issues upgrading or installing the new GNOME.  If you
	have problems, you can reach the GNOME-savvy people at
	<a href="mailto:fink-gnome-core@lists.sourceforge.net">fink-gnome-core@lists.sourceforge.net</a>.
	Please do report success stories there as well.  The more good reports we get, the
	faster GNOME 2.4 can be moved to stable.
	</p>
			<p>
	For those of you who do not read our mailing lists, <a href="http://fink.sourceforge.net/lists/index.php">why aren't you subscribed yet</a>?
	Here is a link to detailed 
	<a href="http://article.gmane.org/gmane.os.apple.fink.gnome/57/match=gnome">instructions</a> 
	how to install or upgrade GNOME and what new stuff it brings.
	</p>
		<a name="2004-01-02%20Whaaazaaap%20Dawgs,%20Two%20Zero%20Zero%20Four%20is%20on!"><span class="news-date">2004-01-02: </span><span class="news-headline">Whaaazaaap Dawgs, Two Zero Zero Four is on!</span></a><?php gray_line(); ?>
			<p>
	A happy new year to all of you from the whole team. Blame this outburst of an 
	attempt at slang language on some of us having to watch the MTV Music Awards all
   day long.
	</p>
			<p>
	Last year has been a good year for Fink. We have had hard times keeping up with 
	the changes introduces by Apple, but we also learned that we have a great community
	which is willing to go through great lengths to support us. 
	For this, we say "Thank You". Much of what happens in the Fink project
   happens because of the amazing support and encouragement we get from our users.
	</p>
			<p>
	Two Zero Zero Four should not make us slow down, but speed up. There are some 
	interesting things in the pipeline, including GNOME 2.4, a new release of KDE, major 
	changes to the package manager itself, and organisational restructuring. 
	Hopefully we will advance into an even bigger project with developer conferences, 
	real life meetings, and a CD in your favourite shop.
	</p>
			<p>
	High ambitions can make one fall very deeply, thus we shall take it carefully, but 
	still we are all counting on your support during this year. Tell us what you think 
	about Fink; tell us what you like or dislike; show us ways to improve ourselves.
	Lend us your resources and sponsor a mirror or hardware. Devote some of your time
	to improve the package manager or add another piece of software by creating an
	info file. Browse this website and hopefully indulge yourself. We enjoy serving
	such a nice community; hopefully we shall make it a smooth ride for you and
	your Macintosh in Two Zero Zero Four.
	</p>
		<a name="2003-12-28%20Merry%20Christmas%20and%20a%20happy%20new%20year"><span class="news-date">2003-12-28: </span><span class="news-headline">Merry Christmas and a happy new year</span></a><?php gray_line(); ?>
			<p>
 The Fink team and I wish all of you a merry Christmas and happy Holidays. We are looking
 forward to yet another year where we can help the Macintosh community grow into the 
 world of UNIX together with Mac OS X.
 		</p>
			<p>
 We wish you all, that your hope is not too frail and that you will carry on following 
 through with your wishes. May the world we live in gradually become a better place and
 may peace and understanding settle just for a few days. 
		</p>
			<p>
 Enjoy your quiet time and in case we do not get around to saying it soon enough. 
 A happy new year to all of you, stay with us we count on your support.
		
		</p>
		<a name="2003-11-30%20There%20they%20are!%20New%20mirrors.."><span class="news-date">2003-11-30: </span><span class="news-headline">There they are! New mirrors..</span></a><?php gray_line(); ?>
			<p>
	Thank you, thank you, thank you. What a great community we have.
	Thank you for providing us with more mirrors. 
		</p>
			<p>
	Matthew Healey, member of the Western <a href="http://www.wamug.org.au">
	Australian</a> Macintosh User Group, and their 
	ISP <a href="http://www.extremedsl.com.au">extremedsl</a>
	are providing Fink with a full mirror in Perth, Australia. This is our first
	mirror in down under, thus I am pleased to welcome them to the family.
	Furthermore the <a href="http://www.mirror.ac.uk">UKMIRROR</a> service 
	has accepted us, making distfile services available for Fink 
	on 21 load balanced server.
		</p>
			<p>
	We are very happy about this development, but we still need more rsync mirrors.
	Thus, once more, if you feel like helping, please visit 
	<a href="http://finkmirrors.net">finkmirrors.net</a> and get in touch.
		</p>
		<a name="2003-11-24%20More%20mirrors....pretty%20please?"><span class="news-date">2003-11-24: </span><span class="news-headline">More mirrors....pretty please?</span></a><?php gray_line(); ?>
			<p>While we welcome our latest full mirror in Norway, sponsored by Havar Valeur, 
        we crave more. To improve our service to all of you, we would like to ask that
        you evaluate carefully if you maybe do have the resources to become a mirror. 
        </p>
			<p>     
        All it takes is a 10Mbit link, around 100MB of disk space  and some bandwidth you are 
        willing to share for Fink. The exact setup instructions for rsync mirrors can be found 
        <a href="http://finkmirrors.net/rsync.html">here</a>. Especially mirrors in
        Asia, Australia, New Zealand, South Europe and Middle Europe are welcome, since we have none in 
        those regions yet. If you feel generous and wish to donate even more resources, please visit
        <a href="http://finkmirrors.net">finkmirrors.net</a> to learn about your options.
        </p>
			<p>     
        The current status of all available rsync mirrors can be viewed on the finkmirrors.net pages as well.
        We hope to improve this service in the future, yet this depends on your willingness to help us out. 
        We are looking forward to many new applications and thank our community in advance. 
        </p>
		<a name="2003-11-17%20Fink%200.6.2%20released"><span class="news-date">2003-11-17: </span><span class="news-headline">Fink 0.6.2 released</span></a><?php gray_line(); ?>
			<p>The latest Fink release, version 0.6.2, is now available
for both source and binary users.  This is a bug-fix release, intended
to address two problems: the dselect/user deletion bug, and a 
problem with ownership of files.  The dselect bug was addressed by
updating the fink, dpkg, and apt packages.  After updating to 0.6.2,
it is safe to once again use dselect.  However, if you ran dselect
at any time since 0.6.0, you should carefully check the integrity
of the file at <code>/sw/etc/apt/sources.list</code>.  If you have
any doubts about this file, you should replace it with
<a href="<?php print $root; ?>files/sources.list">the default sources.list file</a>.
</p>
			<p>Users who have installed binary files from the 0.6.1 distribution
may find that certain files in their Fink installation are owned
by UID 2011 rather than by root.  To correct this problem,
run the command:</p>
			<pre>sudo find /sw/ -user 2011 -exec chown root:admin {} \;</pre>
			<p>This release, like the previous one, was built on OS X 10.2
using the gcc 3.3 compiler, and runs fine with some exceptions* on OS X 10.3.  Most Fink 
users who upgrade to 10.3 will continue to
want to only use the binaries from this
new distribution for now, while the Fink team continues to modify
Fink packages for 10.3.
</p>
			<p>*Exceptions include: emacs, qt.
</p>
		<a name="2003-11-04%20User%20Deletion%20Bug/%20Dselect%20Troubles"><span class="news-date">2003-11-04: </span><span class="news-headline">User Deletion Bug/ Dselect Troubles</span></a><?php gray_line(); ?>
			<p><b>Quick Summary: DO NOT USE DSELECT,</b> and if you've used it,
check your /sw/etc/apt/sources.list file carefully.</p>
			<p>Users who have bootstrapped or installed Fink 0.5.3 or Fink 0.6.0
		on Mac OS X 10.3 could exhibit a problem where all users get deleted
		from the netinfo database, and you become unable to log in.
We believe that this problem can only occur if you've used dselect.</p>
			<p>If you are using Mac OS X 10.3, please be sure you're using the
		latest Fink version to avoid the issue.  To make sure you don't have
		upgrade problems, check your <code>/sw/etc/apt/sources.list</code>
		file.  You will need to modify it if it contains <code>deb</code>
		lines that point to "release" or "current" without a version number.
		In other words, if your <code>sources.list</code> file contains
		these lines:</p>
			<pre>deb http://us.dl.sourceforge.net/fink/direct_download release main
deb http://us.dl.sourceforge.net/fink/direct_download current main</pre>
			<p>...you should change them to this:</p>
			<pre>deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main</pre>
			<p>We are working on updating the repository to make sure that even
		if you update you don't get the broken code, and to
repair dselect, but in the meantime,
		make sure your <code>sources.list</code> file has the correct entries.</p>
			<p>Other users have experienced problems with dselect itself, particularly
complaints about a missing "darwin" package.  If you are running dselect
under 10.3 and you <b>don't</b> get this warning, then your 
<code>sources.list</code> file is likely to be corrupted and you should
repair it as above.
</p>
		<a name="2003-11-01%20Fink%200.6.1%20released"><span class="news-date">2003-11-01: </span><span class="news-headline">Fink 0.6.1 released</span></a><?php gray_line(); ?>
			<p>The latest Fink release, version 0.6.1, is now available
for both source and binary users.  This release was built on OS X 10.2
using the gcc 3.3 compiler, and runs well on OS X 10.3.  Most Fink
users who upgrade to 10.3 will want to only use the binaries from this
new distribution for now, while the Fink team continues to modify
Fink packages for 10.3.
</p>
			<p>
If you wish to access the 
new binaries, use apt-get, dselect, or the binary mode of
FinkCommander.  Unless you are interested in helping the Fink team
to test packages which are compiled on 10.3, 
do not use the command-line <code>fink</code> program to do your
installations for the
next few weeks.
</p>
			<p>The simplest way to upgrade a binary installation is to run
"sudo apt-get update".  Further details and
other issues related to upgrading Fink to 10.3 are addressed on the
<a href="<?php print $root; ?>download/10.3-upgrade.php">Special 10.3 upgrade page.</a>
</p>
			<p>
Before using the latest version of
the command-line <code>fink</code> program 
under OS X 10.2, be sure to install the August2003gccUpdater, available
after free registration from connect.apple.com.
</p>
		<a name="2003-10-31%20Happy%20Halloween%20and%20welcome%20new%20mirrors"><span class="news-date">2003-10-31: </span><span class="news-headline">Happy Halloween and welcome new mirrors</span></a><?php gray_line(); ?>
			<p>
		We wish all of you a happy Halloween.
		</p>
			<p>
		Furthermore I would like to welcome our new mirrors to the Fink family.
		From Europe in Rijeka, Croatia a new full mirror joins us. This mirrors 
		has been sponsored by the <a href="http://mac.dir.hr/">Jabucnjak</a> Apple user group. 
		This is our first mirror in Europe, so I hope that more will be joining us 
		soon.
		</p>
			<p>
		Dave Schroeder from the <a href="http://mirror.services.wisc.edu/">University of 
		Wisconsin</a> in Madison is sponsoring a 100Mbit dedicated Master server.
		A. J. Wright and <a href="http://sunsite.utk.edu/">SunSITE@UTK</a> are helping out with 
		another full mirror in the United states. 
		</p>
			<p>
		This raises our full mirror count to four and the rsync mirror count to 
		five. We are happy to have such a great community back us up, but I know 
		that more mirrors will join over time. I will not stop nagging you until
		Fink has its own mirror in every state of the USA. Yet, with such a 
		brilliant community backing us up, I am not too worried about not
		reaching my goal very soon.
		</p>
			<p>
		Trick or treat! Our most wanted treat is more mirrors, so come forth 
		Administrators and fill our bag. Information on how you can be a mirror
		can be found on the official <a href="http://finkmirrors.net">
		mirroring website</a>.
		</p>
		<a name="2003-10-25%20Look%20Ma,%20a%20logo%20for%20Fink"><span class="news-date">2003-10-25: </span><span class="news-headline">Look Ma, a logo for Fink</span></a><?php gray_line(); ?>
			<p>As you surely noticed, Fink has a logo. This is the result of our
	Logo <a href="<?php print $root; ?>logo.php">contest</a> held earlier this year.
	This new, official, logo has been displayed since the 24th of October and
	those of you who wondered how it has been picked and what the name of the
	winner is should read up in the PR <a href="pr/index.php">section</a>.
	</p>
			<p>
	The longer explanation also features a larger version of the logo itself,
	so that you may have a closer look at its details. We like our new logo,
	we hope that you will like it too.
	</p>
			<p>IMPORTANT: We do not yet have a formal licensing agreement for the new
   logo and so are unable to give permission to distribute it.  Currently, it
   can only be displayed on the Fink web page.  Thank you for your understanding.
	</p>
		<a name="2003-10-24%20Upgrade%20to%20gcc%203.3%20and/or%2010.3"><span class="news-date">2003-10-24: </span><span class="news-headline">Upgrade to gcc 3.3 and/or 10.3</span></a><?php gray_line(); ?>
			<p>It is now possible to upgrade Fink to take full advantage of the gcc 3.3
compiler, or to use OS X 10.3 if you have that installed.  Binary packages
corresponding to these upgrades are not yet available, so if you make 
extensive use of binary packages you may wish to wait a few days before 
upgrading.
</p>
			<p>
If you wish to perform this upgrade, and you had previously installed the
June 2003 Developer Tools update from Apple, you will need to install
the August 2003 Developer Tools update BEFORE you upgrade Fink.  Under
10.3, be sure to install XCode from the XCode disk before upgrading
Fink.
</p>
			<p>
Running "fink selfupdate" should perform the upgrade for you.  The latest
version of the fink package manager will automatically detect which
version of OS X and which version of gcc you have installed, and will
adjust itself accordingly.
</p>
			<p>
If you wish to do a fresh install of Fink on a 10.3 system, we recommend
<a href="http://fink.sourceforge.net/download/srcdist.php">bootstrapping from
source,</a> starting from fink-full-0.6.0.tar.gz available
on fink's <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">sourceforge 
download page.</a>  You'll need XCode for this as
well.
</p>
			<p>
Also note that once you have Fink version 0.15.0 or higher, you do
not need to install system-xfree86 anymore.  Fink is
capable of automatically determining your system-xfree86 version if you
don't already have any fink x11 packages installed.  If you currently
have an old system-xfree86 package of any kind installed, please run the
following:
</p>
			<pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 \
system-xfree86-43; fink selfupdate; fink index</pre>
			<p>
The Fink team is still working on getting Fink packages working under 10.3,
but many many packages already work.
</p>
		<a name="2003-10-23%20Say%20Hello%20to%20Mirror%20Numero%20Uno"><span class="news-date">2003-10-23: </span><span class="news-headline">Say Hello to Mirror Numero Uno</span></a><?php gray_line(); ?>
			<p>You are too late. Rus Foster from <a href="http://www.jvds.com">JVDS</a>
	beat you all to it. He is the first one to provide us with resources 
	for a Fink rsync mirror.
	The mirror is located in Atlanta, GA and is updated every two hours, at 35 minutes past.
	</p>
			<p>For those of you who are still waiting, join in. The more mirrors we have
	the faster you can rsync your info files. As per usual, updated and current
	information on the mirror structure can be found on <a href="http://finkmirrors.net"> Finkmirrors.net </a>
	</p>
		<a name="2003-10-22%20Mirror,%20mirror%20on%20the%20wall..."><span class="news-date">2003-10-22: </span><span class="news-headline">Mirror, mirror on the wall...</span></a><?php gray_line(); ?>
			<p>..who will mirror Fink above all? There is a new player on the turf
	and it belongs to the Fink team. <a href="http://finkmirrors.net"> Finkmirrors.net</a> tells you everything you wanted to know about mirroring Fink and its related resources on your Server. As our mirror structure will hopefully grow in the future, this web-site will also hold information about each individual mirror.
	</p>
			<p>To ensure that our service remains as stable as possible and to distribute the load imposed onto our main rsync server, we are looking for rsync mirrors or full mirrors. Those of you who are willing to share resources will find all the necessary information on <a href="http://finkmirrors.net"> Finkmirrors.net</a>. 
</p>
			<p>
UPDATE: Yes, I screwed up when I initially installed the DNS records. If you cannot connect please try again later. I am very sorry for this inconvenience. Thank you for your understanding.
</p>
		<a name="2003-10-12%20New%20update%20method%20available"><span class="news-date">2003-10-12: </span><span class="news-headline">New update method available</span></a><?php gray_line(); ?>
			<p>The latest version of the fink package manager offers a new update
method, <code>fink selfupdate-rsync</code>, as an alternative to the
CVS updates which have been so problematic in the past few months.
If you have difficulty updating to the new version, please follow
<a href="http://fink.sourceforge.net/download/rsync-upgrade.php">these 
special update instructions</a>.
</p>
			<p>In addition, this version of the fink package manager is compatible
with last summer's Developer Tools updates.  After installing both the new
package manager and the Developer Tools update, 
fink will ask you to reset your gcc version whenever
that is necessary.</p>
		<a name="2003-09-02%20Logo%20contest%20ends"><span class="news-date">2003-09-02: </span><span class="news-headline">Logo contest ends</span></a><?php gray_line(); ?>
			<p>The Logo contest held by Fink, announced <a href="http://fink.sourceforge.net/logo.php">here</a>,
ended yesterday. With over 80 different proposals from countries all over the world we 
consider the contest a big success.  
In the next couple of days all the submitted entries will be put on-line in a publicly accessible gallery and more details on the participants shall be published. For those who are 
curious and cannot wait may have a look at an incomplete <a href="http://nour.net/logo/incomplete.html">preview</a>.</p>
			<p>Fink is proud to be part of such a supportive community and would like to thank those who submitted entries and <a href="http://www.macwelt.de">MacWelt</a> for their continued support.
</p>
		<a name="2003-08-18%20Source%20files%20from%20ftp.gnu.org"><span class="news-date">2003-08-18: </span><span class="news-headline">Source files from ftp.gnu.org</span></a><?php gray_line(); ?>
			<p>As announced in <a href="http://www.cert.org/advisories/CA-2003-21.html">this CERT 
advisory</a>, it has recently been discovered that
the ftp servers for GNU software were compromised back in March, 
although it is not believed that any of the source code housed there
was affected.
</p>
			<p>
Fink relies on MD5 checksums when downloading software, and we have had
no reports of incorrect checksums in Fink packages.  The Free Software
Foundation is in the process of verifying the integrity of all of the
source code distributed from that ftp site.  As of this writing, the source
code for the following Fink packages have not yet been verified:
<code>autoconf2.54</code>,
<code>emacs21</code>,
<code>gprolog</code>,
<code>groff</code>,
<code>guile16</code>,
<code>help2man</code>,
<code>jwhois</code>,
<code>libtool14</code>,
<code>libosip1</code>,
<code>sed</code>,
<code>slib</code>.
It may be difficult to install those packages at present.
</p>
		<a name="2003-06-26%20Developer%20Tools%20Update."><span class="news-date">2003-06-26: </span><span class="news-headline">Developer Tools Update.</span></a><?php gray_line(); ?>
			<p>
				<b>Quick Summary: DO NOT INSTALL THIS UPDATE.</b>
			</p>
			<p>
Apple has released a patch to the December 2002 
Developer Tools which includes gcc 3.3,
their new compiler.
</p>
			<p>
Fink does not yet support compiling with gcc 3.3.  In addition, it is important
not to "mix and match" between compilers:  all C++ code in fink packages
needs to be compiled
with the same compiler.
</p>
			<p>
For this reason, the Fink team recommends that if you update your
Developer Tools with the new patch, you should be careful to run
<code>sudo gcc_select 3</code>
prior to any "fink build" or "fink install" commands.
</p>
			<p><b>Update 30 June 2003:</b> A 
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=2680195&amp;forum_id=2056">problem
has now been detected</a> with
the new assembler program which the update installs, which may prevent
certain Fink packages from being compiled at all if you install this
update.  
</p>
			<p><b>Generally, Fortran programs will break if you install the update;
the breakage does not stop by simply switching back to gcc 3.1.</b>
The Fink team is working on a workaround for this problem, but until it
is ready, if you need Fortran-related programs you should not install
the update.</p>
		<a name="2003-06-20%20Darwin%20packaging%20groups%20to%20coordinate%20efforts."><span class="news-date">2003-06-20: </span><span class="news-headline">Darwin packaging groups to coordinate efforts.</span></a><?php gray_line(); ?>
			<p>
The <a href="http://fink.sourceforge.net">Fink</a>, 
<a href="http://www.gentoo.org">Gentoo</a>, 
and 
<a href="http://opendarwin.org/projects/darwinports/">DarwinPorts</a> 
projects are pleased to announce the formation of  a cooperative development 
alliance forged to facilitate delivery of freely available software to 
Mac OS X.  Under this new alliance, the projects will share information and 
coordinate efforts for porting software to 
Apple's <a href="http://www.apple.com/macosx">Mac OS X</a> 
and <a href="http://www.apple.com/darwin">Darwin</a> operating 
systems.  Members of the alliance will share information using 
the <a href="http://www.metapkg.org">www.metapkg.org</a> Web 
site,  which  will provide a home for this cooperative effort. 
</p>
		<a name="2003-06-16%20Fink%20logo%20contest%20begins."><span class="news-date">2003-06-16: </span><span class="news-headline">Fink logo contest begins.</span></a><?php gray_line(); ?>
			<p>Fink and 
<a href="http://www.macwelt.de/">MacWelt</a> have managed to organize a logo contest.
For the next six weeks everyone is invited to submit their logo creations. 
Fink needs a new face and with your help we might just get one.  We are curious to see what you imagine Fink to be as a graphical representation.
The initial announcement by Macnews is in German, for those of you not capable of reading German a translated version can be found
 <a href="http://fink.sourceforge.net/logo.php">here</a>. 
                </p>
			<p>
Fink and MacWelt hope that many of you will participate as we might just find some prices for the winners. Good luck and.... start drawing.
</p>
		<a name="2003-05-05%20KDE%203.1.1%20Binaries%20Available"><span class="news-date">2003-05-05: </span><span class="news-headline">KDE 3.1.1 Binaries Available</span></a><?php gray_line(); ?>
			<p>KDE 3.1.1 binaries are now available.  Since they
have been released after 0.5.2 came out, you will need to update
your package descriptions by running <code>sudo apt-get update</code>
(or equivalent) before they will be available for installation.
For pointers to the changes and security fixes in this release,
see <a href="http://sourceforge.net/mailarchive/forum.php?thread_id=2068947&amp;forum_id=2022">the
announcement</a>.
</p>
		<a name="2003-04-16%20Virex%20problem%20resolved"><span class="news-date">2003-04-16: </span><span class="news-headline">Virex problem resolved</span></a><?php gray_line(); ?>
			<p>McAfee has released Virex 7.2.1, which no longer
overwrites the main Fink directory <code>/sw</code>.  Fink users should
continue to avoid Virex 7.2.
</p>
			<p>Early reports indicate that upgrading Virex from 7.2 to 7.2.1
still leaves some problems however.  If you upgrade Virex with Fink not
installed, and subsequently
wish to install Fink, you will need to delete the <code>/sw</code>
directory by hand before installing.  And if you upgrade Virex with
Fink already installed, you should immediately run
<b>
fink reinstall openssl-shlibs dlcompat-shlibs curl-ssl-shlibs
</b>
to restore files which the Virex upgrade may have deleted.
</p>
		<a name="2003-04-14%20Fink%200.5.2%20released"><span class="news-date">2003-04-14: </span><span class="news-headline">Fink 0.5.2 released</span></a><?php gray_line(); ?>
			<p>Fink is proud to announce that the Fink binary distribution 0.5.2 is available from the <a href="http://fink.sourceforge.net/download.php">download</a> page.
		With over 190 new binary packages, KDE, KOffice and KDevelop binaries amongst other various improvements this is a recommended download for any new and all existing Fink users.
		The full announcement can be read on the <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-announce">fink-announce</a> mailing list.
		</p>
			<p>(If you are having trouble upgrading a source installation, consult
<a href="http://fink.sourceforge.net/download/fix-upgrade.php">these
special instructions</a>.)</p>
		<a name="2003-04-09%20Interview%20on%20OSNews.com"><span class="news-date">2003-04-09: </span><span class="news-headline">Interview on OSNews.com</span></a><?php gray_line(); ?>
			<p><a href="http://osnews.com/">OSNews.com</a> today is featuring a
	<a href="http://osnews.com/story.php?news_id=3236">mini-interview</a> with
	one of our project leaders, Max Horn. It contains some rather unusual questions,
	so even if you know Fink fairly well, you might find it informative.
</p>
		<a name="2003-03-29%20KDE%203.1.1%20Final%20In%20Unstable"><span class="news-date">2003-03-29: </span><span class="news-headline">KDE 3.1.1 Final In Unstable</span></a><?php gray_line(); ?>
			<p>KDE 3.1.1 is now in Fink unstable.  The full announcement can be
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=1898907&amp;forum_id=2022">read here</a>.
	Improvements over 3.1 final include many upstream bugfixes,
	build improvements, koffice bugfixes, kmail crash fixes,
	and other miscellaneous updates.  Binary packages will not
	be available in time for the next binary distribution, but
	will be released as an update shortly thereafter.
</p>
		<a name="2003-03-18%20KDE%203.1%20Final%20In%20Stable"><span class="news-date">2003-03-18: </span><span class="news-headline">KDE 3.1 Final In Stable</span></a><?php gray_line(); ?>
			<p>KDE 3.1 is now in Fink stable.  The full announcement can be
<a href="http://sourceforge.net/mailarchive/forum.php?thread_id=1833081&amp;forum_id=2022">read here</a>.
	Improvements over 3.1 beta1 include an updated audio driver, 
	faster startup times, cleaned up fink package info, support
	for Apple X11's window manager, and many bugfixes.  Binary
	packages will be available in the next binary distribution
	release.
</p>
		<a name="2003-03-17%20Apple%20X11%20Beta%203%20Released"><span class="news-date">2003-03-17: </span><span class="news-headline">Apple X11 Beta 3 Released</span></a><?php gray_line(); ?>
			<p><a href="http://www.apple.com/macosx/x11/download/">A new
version of Apple's X11 for Mac OS X is available</a>.  It fixes a number
of bugs including a few that can cause problems with building Fink packages.
It is recommended that all Fink users who are using Apple X11 upgrade.
A new version of the system-xfree86 package has been released to unstable
that takes the new Apple X11 into account.  It should be appearing in stable
shortly.
</p>
		<a name="2003-02-14%20New%20version%20of%20FinkCommander"><span class="news-date">2003-02-14: </span><span class="news-headline">New version of FinkCommander</span></a><?php gray_line(); ?>
			<p><a href="http://finkcommander.sourceforge.net/">FinkCommander</a>,
 a separate project which provides a GUI for Fink,
has released version 0.5.0, their first Jaguar-only version.  The new
version includes a package browser which allows you to view the files 
that Fink has installed for a particular package, as well as <a href="http://finkcommander.sourceforge.net/pages/VERSION_HISTORY.html">many 
other improvements.</a></p>
		<a name="2003-02-07%20DO%20NOT%20INSTALL%20VIREX%207.2"><span class="news-date">2003-02-07: </span><span class="news-headline">DO NOT INSTALL VIREX 7.2</span></a><?php gray_line(); ?>
			<p>
        The Virex 7.2 package, currently being distributed free to all .Mac 
members, has a serious conflict with Fink.  <b>Fink users should not install 
Virex 7.2 under any circumstances.</b>
  Installing it after Fink is installed
will damage your Fink installation; installing it prior to Fink will make
it impossible to install Fink without damaging Virex.
</p>
			<p>
This bug has been <a href="http://forums.mcafeehelp.com/viewtopic.php?t=6318&amp;sid=33d08f3c34f7e09dc546aa1ddf1c299c">reported 
to Virex's manufacturer.</a>  We will keep the
Fink community informed about the situation as it develops.
</p>
		<a name="2003-01-26%20Apple%20X11%20Library%20Warning"><span class="news-date">2003-01-26: </span><span class="news-headline">Apple X11 Library Warning</span></a><?php gray_line(); ?>
			<p>
	While Apple's X11 works just fine with existing binaries, it
has a bug in the install name of the libraries that can cause some
software to build incorrectly, and will break forward-compatibility
with future X11 releases.
</p>
			<p>
	Ben Hines has created a script (available <a href="http://fink.cvs.sourceforge.net/*checkout*/fink/fix-fink/install_name_fix.pl">here</a>) that you can use
that will fix the install_name entries in Apple's X11 libraries,
but it will not repair software you have already built against the
broken libraries.
</p>
			<p><b>Update 11 February 2003:</b> This script is not needed with 
version 0.2 of Apple's X11.app which was released yesterday.
</p>
		<a name="2003-01-21%20Gnome,%20libpng,%20and%20the%20unstable%20tree"><span class="news-date">2003-01-21: </span><span class="news-headline">Gnome, libpng, and the unstable tree</span></a><?php gray_line(); ?>
			<p>
        A problem was uncovered today concerning the versions of imlib,
 libpng, and gnome in Fink's unstable tree.  The Fink team is hard at
 work addressing this problem.  As a workaround, users can downgrade
their imlib package to the stable version, "<code>fink install
 imlib-1.9.10-9</code>", until the problem is fixed.
</p>
			<p>
   Many Fink users may be using Fink's unstable tree without being
fully aware of what this entails.  For a few months in the fall,
enabling the unstable tree was the only way to gain access to
 10.2-compatible versions of Fink packages.  
<b>That is no longer the case.</b>
Fink users who do not wish to help the Fink team with testing should
disable their unstable tree.  To do this, edit the file
<code>/sw/etc/fink.conf</code> and remove the items
 <code>unstable/main</code> and <code>unstable/crypto</code> from the
 <code>Trees</code> line.
	</p>
			<p>The Fink team appreciates those users who are willing to stick with
the unstable tree, even when there are problems like today's, and provide
the team with prompt feedback.  This is a community effort and we
appreciate your participation.
</p>
		<a name="2003-01-17%20Anonymous%20CVS%20issues%20resolved"><span class="news-date">2003-01-17: </span><span class="news-headline">Anonymous CVS issues resolved</span></a><?php gray_line(); ?>
			<p>
	UPDATE: We are pleased to announce that SourceForge have resolved the issues with anonymous CVS access, and the selfupdate-cvs command should work again. Further details on the downtime can be found on the SourceForge.net <a href="http://sourceforge.net/docman/display_doc.php?docid=2352&amp;group_id=1#cvs">site status</a> page.
	</p>
		<a name="2003-01-07%20Fink%20Interaction%20with%20Apple's%20X11%20Public%20Beta"><span class="news-date">2003-01-07: </span><span class="news-headline">Fink Interaction with Apple's X11 Public Beta</span></a><?php gray_line(); ?>
			<p>
	Fink works just fine with the <a href="http://www.apple.com/macosx/x11/">public beta X11 release</a>
	with some caveats.  Please read <a href="<?php print $root; ?>doc/x11/inst-xfree86.php#apple-binary">the newly added Apple X11</a> section of the Fink X11 Documentation for details.</p>
		<a name="2003-01-07%20RSS%20Feeds%20available"><span class="news-date">2003-01-07: </span><span class="news-headline">RSS Feeds available</span></a><?php gray_line(); ?>
			<p>
	Thanks to Benjamin Reed, it is now possible to receive RSS 1.0 Feeds that contain a lot of valuable information.

<a href="<?php print $root; ?>news/fink-stable.rdf">fink-stable.rdf</a> will tell you about the changes and additions in the stable tree, reflecting packages which have been added or modified.
</p>
			<p><a href="<?php print $root; ?>news/fink-unstable.rdf">fink-unstable.rdf</a> will tell you about changes or additions to the unstable tree and is most likely the most active RSS feed.
The above Feeds are automatically updated every 60 minutes to make sure that they keep you all on top of the latest development.
</p>
			<p><a href="<?php print $root; ?>news/news.rdf">news.rdf</a> This feed reflects the contents of the Fink News Page. The Feed is updated as soon as a new item is added on the Website.
</p>
		<a name="2002-12-22%20New%20Upgrade%20Matrix"><span class="news-date">2002-12-22: </span><span class="news-headline">New Upgrade Matrix</span></a><?php gray_line(); ?>
			<p>A new <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> is
  now available, for use in upgrading earlier versions of Fink to the
  current version, under either OS X 10.1 or OS X 10.2.  Users upgrading
  under 10.1 will be brought to Fink version 0.4.1a, while users
  upgrading under 10.2 will be brought to Fink version 0.5.0a.
  </p>
		<a name="2002-12-11%20New%20Upgrade%20Matrix%20coming"><span class="news-date">2002-12-11: </span><span class="news-headline">New Upgrade Matrix coming</span></a><?php gray_line(); ?>
			<p>The Fink team is aware of the shortcomings of the current
  <b>Upgrade Matrix</b> page, which is inadequate for upgrading
to Fink 0.5.0a.  Please be patient as we construct
  a new version of that page, whose existence will be announced
  here.  In the meantime, some of you may wish to use the <a href="news/jaguar.php">test version of the Jaguar updater</a> which was
made available on 2002-09-08.
  </p>
		<a name="2002-12-09%20Fink%200.5.0a%20Released"><span class="news-date">2002-12-09: </span><span class="news-headline">Fink 0.5.0a Released</span></a><?php gray_line(); ?>
			<p>
    Fink 0.5.0a for Mac OS X 10.2 is now complete. (Note: 0.5.0a is a final
    release, and replaces 0.5.0 which was never officially released.) This
    release includes over 700 
    binary packages for OS X 10.2 as well as over 1800 source packages of
    all kinds. 
  </p>
			<p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
  </p>
			<p>
  This release is for Mac OS X 10.2 only. 10.1 users should use Fink 0.4.1.
  </p>
		<a name="2002-11-11%20Update%20XFree86%20for%20use%20with%20OS%20X%2010.2.2"><span class="news-date">2002-11-11: </span><span class="news-headline">Update XFree86 for use with OS X 10.2.2</span></a><?php gray_line(); ?>
			<p>
Users should update their XFree86 installations to version 4.2.1.1
for use with OS X 10.2.2.  If you are using system-xfree86, you
can get the new version from the <a href="https://sourceforge.net/project/shownotes.php?release_id=118483">XonX 
project</a>.  If you are using Fink's
xfree86 packages, you should update to xfree86-base-4.2.1.1-1 and
xfree86-rootless-4.2.1.1-1.  These packages are recent additions to
the 10.2/unstable tree; to gain access to them, you may need to run 
"fink selfupdate-cvs" and/or enable the unstable tree
  </p>
		<a name="2002-10-30%20Don't%20reuse%20binary%20installer"><span class="news-date">2002-10-30: </span><span class="news-headline">Don't reuse binary installer</span></a><?php gray_line(); ?>
			<p>
  Users are cautioned to use the binary installer for Fink 0.4.1 <b>only
once</b> on a given machine.  Due to an apparent bug in Apple's
Installer.app program, attempting a second installation on the same
machine can result in permissions being altered in the machine's root
directory, in some cases leaving the machine in a non-bootable state.
</p>
			<p> If Installer.app presents you with an "Upgrade" button rather
than an "Install" button when installing Fink 0.4.1, <b>do not proceed
any further!</b> </p>
			<p>A new version of the binary installer for Fink 0.4.1 became available
on November 5.  The new version avoids
the problem of the machine not booting, but even with the new version,
users are advised to only "Install",
not "Upgrade."  (You can recognize the new version by its filesize of
12582912 bytes, while the old version had a filesize of 10541112 bytes.)
</p>
		<a name="2002-09-28%20Fink%200.4.1%20released"><span class="news-date">2002-09-28: </span><span class="news-headline">Fink 0.4.1 released</span></a><?php gray_line(); ?>
			<p>
      The source release and the binary installer are available now, as well as all binary packages. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
    </p>
			<p>
    This is the <b>last release for Mac OS X 10.1</b>. Future versions of Fink will <b>not</b> officially support Mac OS X 10.1 anymore, we are gearing all our efforts towards 10.2.
    </p>
			<p>
    At the same time, this release is not meant for Mac OS X 10.2. Fink 0.5.0. which is targeted for October, will be geared towards 10.2. In the meantime refer to the news item below on how to upgrade Fink for 10.2.
    </p>
		<a name="2002-09-27%20Possible%20conflicts%20with%20anti-virus%20software"><span class="news-date">2002-09-27: </span><span class="news-headline">Possible conflicts with anti-virus software</span></a><?php gray_line(); ?>
			<p> A number of recent reports on the 
<a href="http://www.mail-archive.com/fink-users@lists.sourceforge.net/">fink-users
mailing list</a> have indicated problems (including kernel panics and
infinite hangs during patching) when using Fink to compile packages while
anti-virus software is installed.  You may need to switch off any anti-virus
software before using Fink.
</p>
		<a name="2002-09-08%20Test%20version%20of%20Jaguar%20updater%20available"><span class="news-date">2002-09-08: </span><span class="news-headline">Test version of Jaguar updater available</span></a><?php gray_line(); ?>
			<p>
			A test version of the 10.2 updater for Fink is now available. The update process is somewhat complicated at the moment, but is explained in <a href="<?php print $root; ?>news/jaguar.php">step-by-step instructions for updating</a>. We also have separate <a href="<?php print $root; ?>news/jag-bootstrap.php">instructions to install Fink from scratch on 10.2</a>. 
		</p>
			<p>
			At the moment, approximately 800 out of 1150 Fink packages have been made ready for 10.2. However, virtually all of these packages are still being tested and have not yet been moved to the "stable" tree in the 10.2 section; moreover, binaries for 10.2 packages are not yet available. 
		</p>
		<a name="2002-08-20%20Mac%20OS%20X%2010.2%20/%20Jaguar"><span class="news-date">2002-08-20: </span><span class="news-headline">Mac OS X 10.2 / Jaguar</span></a><?php gray_line(); ?>
			<p>
      During the last few weeks, we got a lot of emails asking whether Fink will work Mac OS X 10.2.
    </p>
			<p>
      The answer is: Yes, we will support 10.2. However, due to some
      major changes in this new OS version, we had to make a lot of adjustments both
      to the Fink tool itself and to many packages. The current binary distribution,
      0.4.0a, will only work partially on 10.2. We are working on an upgrade guide,
      as well as a new Fink release, to support 10.2.
    </p>
			<p>
	 If you upgrade your system to 10.2 before the official Fink update for 10.2 is ready,
	 many Fink packages built on 10.1 are going to work fine, but others need to be rebuilt.
	 Some packages need special changes to build on 10.2. Adding "unstable/main" to your
	 list of trees in /sw/etc/fink.conf (see also the <a href="<?php print $root; ?>faq/usage-fink.php#unstable">FAQ</a>)
	 will give you access to the latest versions of packages, many of which include important
	 fixes for 10.2.
	</p>
			<p>
     As of now, please do not email us asking about 10.2 support. If you can't wait,
     consult the <a href="<?php print $root; ?>lists/index.php">mailing list archives</a> instead.
    </p>
		<a name="2002-08-06%20Fink%20package%20manager%200.10.0%20released"><span class="news-date">2002-08-06: </span><span class="news-headline">Fink package manager 0.10.0 released</span></a><?php gray_line(); ?>
			<p>
      Yesterday version 0.10.0 of the Fink package manager was released to the unstable tree, along with version 1.6 of the base-files package. All Fink users which are using the unstable tree are recommended to update to this version. The easiest way to do so usually is to run 'fink selfupdate-cvs' which will automatically take care of updating these essential packages.
    </p>
			<p>
      Please report any problems you encounter with this version via our bug tracker.
    </p>
			<p>
      An overview of what changed since version 0.9.12 can be found <a href="http://sourceforge.net/project/shownotes.php?release_id=103599">here.</a>
    </p>
		<a name="2002-07-17%20Binary%20distribution%20moves"><span class="news-date">2002-07-17: </span><span class="news-headline">Binary distribution moves</span></a><?php gray_line(); ?>
			<p>
      The Fink binary distribution has moved to a new location. All Fink users wishing to use the binary distribution will have to make sure they are using the new binary distribution (many of you already are using it, maybe without even noticing). If you want to know how to switch and why we do this, <a href="<?php print $root; ?>news/bindist_move.php">read more here.</a>.
    </p>
		<a name="2002-05-29%20KDE%20support"><span class="news-date">2002-05-29: </span><span class="news-headline">KDE support</span></a><?php gray_line(); ?>
			<p>
      Fink <a href="<?php print $root; ?>news/kde.php">announces support</a> for <a href="http://www.kde.org">KDE</a>. Packages are available in the unstable distribution, as well as pre-built binaries. For more information on installing and running it, see the full <a href="<?php print $root; ?>news/kde.php">KDE Support In Fink</a> announcement. 
    </p>
		<a name="2002-05-03%20Bug%20in%20passwd%20package"><span class="news-date">2002-05-03: </span><span class="news-headline">Bug in passwd package</span></a><?php gray_line(); ?>
			<p>
      All Fink users are urged to update their <b> passwd </b> package to version 20020329 or newer. Older versions of the <b> passwd </b> package are affected by a bug which could lead to the loss of all data on your hard disk if you remove system users created by Fink manually from the system via System Preferences. (Removing them via the NetInfo tool is safe.) You can check the version of your passwd package by entering <b> dpkg -s passwd</b>. If your version is outdated, you can update to the current one in two ways: 
    </p>
			<ul>
				<li>
        Via the binary distribution. First make sure you have the latest list of packages available: <b> sudo apt-get update</b>. Then you can perform the actual update: <b> sudo apt-get install passwd</b>. 
      </li>
				<li>
        Via the source distribution. First make sure you have the latest set of package descriptions: <b> fink selfupdate-cvs</b>. Then, update the passwd package: <b> fink update passwd</b> 
      </li>
			</ul>
			<p>
      See <a href="<?php print $root; ?>faq/usage-general.php#passwd">Fink's FAQ, question 6.3,</a> for more information about the passwd package. 
    </p>
		<a name="2002-04-18%20Fink%200.4.0%20released"><span class="news-date">2002-04-18: </span><span class="news-headline">Fink 0.4.0 released</span></a><?php gray_line(); ?>
			<p>
      The source release and the binary installer are available now, as well as many of the binary packages. As usual, the rest of the binaries will be made available during the next few days. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a>. 
    </p>
		<a name="2002-01-16%20Fink%200.3.2a%20is%20released"><span class="news-date">2002-01-16: </span><span class="news-headline">Fink 0.3.2a is released</span></a><?php gray_line(); ?>
			<p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
		<a name="2002-01-09%20Fink%200.3.2%20is%20released"><span class="news-date">2002-01-09: </span><span class="news-headline">Fink 0.3.2 is released</span></a><?php gray_line(); ?>
			<p>
      The source release is available now, the binary installer will follow soon. The bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
		<a name="2002-01-08%20Binary%20distribution%20lost"><span class="news-date">2002-01-08: </span><span class="news-headline">Binary distribution lost</span></a><?php gray_line(); ?>
			<p>
      Due to a faulty script, the whole fink website, including our binary distro, has been wiped! This means you can't use the binary distro right now. I am working as quick as I can on uploading the new Fink 0.3.2 binary distro. In addition, the package database is not working for now. Please bear with us. 
    </p>
		<a name="2001-12-16%20Yes,%20we%20are%20alive!"><span class="news-date">2001-12-16: </span><span class="news-headline">Yes, we are alive!</span></a><?php gray_line(); ?>
			<p>
      Despite the fact that no news were listed here for over a month, the fink project was quite busy in the recent time. Sadly, our leader, Christoph, left us last month. But despite this, development is going on actively. 
    </p>
			<p>
      Version 0.9.5 of the Fink package manager was recently released, and many updated and new packages are in our <a href="<?php print $root; ?>doc/cvsaccess/index.php">CVS</a>. 
    </p>
		<a name="2001-11-04%20Fink%200.3.1%20is%20released"><span class="news-date">2001-11-04: </span><span class="news-headline">Fink 0.3.1 is released</span></a><?php gray_line(); ?>
			<p>
      The source release and the binary installer are available now, the bulk of binary packages will be built and made available gradually over the next few days as usual. For information about upgrading, visit the <a href="<?php print $root; ?>download/upgrade.php">Upgrade Matrix</a> and the recently updated <a href="<?php print $root; ?>doc/users-guide/index.php">User's Guide</a>. 
    </p>
		<a name="2001-11-02%20Running%20X11%20document%20updated"><span class="news-date">2001-11-02: </span><span class="news-headline">Running X11 document updated</span></a><?php gray_line(); ?>
			<p>
      The <a href="<?php print $root; ?>doc/x11/index.php">Running X11</a> document has had a significant update. The troubleshooting section now has a comprehensive list of XDarwin error messages with explanations. 
    </p>
		<a name="2001-10-31"><span class="news-date">2001-10-31</span></a><?php gray_line(); ?>
			<p><a href="http://www.macosxhints.com/">MacOSXHints</a> has
      posted an <a href="http://homepage.mac.com/rgriff/xdarwin.html">
      installation guide</a> for XFree86, Fink, Window Maker and The GIMP.
    </p>
		<a name="2001-10-23%20forked.net"><span class="news-date">2001-10-23: </span><span class="news-headline">forked.net</span></a><?php gray_line(); ?>
			<p>
      In addition to ripping off Fink packages and breaking the GPL, the ports
      collection at <a href="http://macosx.forked.net/">forked.net
      </a> has just gone commercial. More details soon. 
    </p>
		<a name="2001-10-03%20Binary%20distribution%20complete"><span class="news-date">2001-10-03: </span><span class="news-headline">Binary distribution complete</span></a><?php gray_line(); ?>
			<p>The binary distribution update is now complete.
    The <a href="<?php print $root; ?>news/puma.php">10.1 compatibility report</a> has been
    updated to reflect the fixes in Fink 0.3.0.
    </p>
		<a name="2001-09-30%20Fink%200.3.0%20is%20released"><span class="news-date">2001-09-30: </span><span class="news-headline">Fink 0.3.0 is released</span></a><?php gray_line(); ?>
			<p>The source release, the binary installer and a binary upgrade kit for
    broken-by-10.1 installations are available in the new <a href="download/index.php">download section</a>.
    The bulk of the binary distribution will be updated gradually over the
    next few days, as usual.
    </p>
		<a name="2001-09-26%20Mac%20OS%20X%2010.1%20released"><span class="news-date">2001-09-26: </span><span class="news-headline">Mac OS X 10.1 released</span></a><?php gray_line(); ?>
			<p>Mac OS X 10.1 has been officially released yesterday. Before you use Fink
    on 10.1, check out the <a href="<?php print $root; ?>news/puma.php">compatibility report</a>.
    <b>Update:</b> The apt-get issue has been solved, expect a new release
    this weekend.
    </p>
		<a name="2001-09-07%20Binary%20distribution%20fully%20updated"><span class="news-date">2001-09-07: </span><span class="news-headline">Binary distribution fully updated</span></a><?php gray_line(); ?>
			<p>The binary distribution is now fully updated to
    Fink 0.2.6. Enjoy.
    </p>
		<a name="2001-09-04%20Fink%200.2.6%20is%20released"><span class="news-date">2001-09-04: </span><span class="news-headline">Fink 0.2.6 is released</span></a><?php gray_line(); ?>
			<p>Fink 0.2.6 is released, fixing several bootstrap problems. The source
    release is available from the <a href="<?php print $root; ?>download.php">download page</a>
    or via the 'fink selfupdate' command. The binary release will follow soon.
    </p>
		<a name="2001-09-02%20Fink%20IRC%20Channel"><span class="news-date">2001-09-02: </span><span class="news-headline">Fink IRC Channel</span></a><?php gray_line(); ?>
			<p>Chat with the developers and other users! We now have a #fink channel
    on the <a href="http://openprojects.net/">openprojects.net</a>
    IRC network.
    </p>
		<a name="2001-08-25%20Fink%200.2.5%20was%20released"><span class="news-date">2001-08-25: </span><span class="news-headline">Fink 0.2.5 was released</span></a><?php gray_line(); ?>
			<p>The source release is
    available from the <a href="<?php print $root; ?>download.php">download page</a>, the
    binary release will follow soon.
    </p>
		<a name="2001-08-23%20OpenOSX.com"><span class="news-date">2001-08-23: </span><span class="news-headline">OpenOSX.com</span></a><?php gray_line(); ?>
			<p>OpenOSX.com refuses to give fair credit after using Fink to create GIMP
    CDs. Read Christoph's <a href="pr/openosx.php">public statement</a>
    on the issue.
    </p>
		<a name="2001-08-22%20New%20help%20page"><span class="news-date">2001-08-22: </span><span class="news-headline">New help page</span></a><?php gray_line(); ?>
			<p>The new <a href="help/index.php">help page</a> lists various ways
    to get help using Fink. It also lists some ideas how you can give back to
    the project.
    </p>
		<a name="2001-08-13%20Porting%20tips%20and%20X11%20document%20updated"><span class="news-date">2001-08-13: </span><span class="news-headline">Porting tips and X11 document updated</span></a><?php gray_line(); ?>
			<p>The <a href="<?php print $root; ?>doc/porting/index.php">porting tips</a> document has
    a new chapter on shared libraries and modules. The <a href="doc/x11/index.php">X11</a> document was also updated recently.
    </p>
		<a name="2001-08-01%20Version%200.2.4a%20is%20released"><span class="news-date">2001-08-01: </span><span class="news-headline">Version 0.2.4a is released</span></a><?php gray_line(); ?>
			<p>There was a bootstrapping problem in Fink 0.2.4. It is fixed in Fink
    0.2.4a. You only need this if you're doing a first time install, updates
    are not affected.
    </p>
		<a name="2001-08-01%20Version%200.2.4%20is%20released"><span class="news-date">2001-08-01: </span><span class="news-headline">Version 0.2.4 is released</span></a><?php gray_line(); ?>
			<p>Version 0.2.4 is released. Get it from the <a href="download.php">download page</a>. Some highlights: The GIMP
    1.2.2, sound playback and recording via esound (thanks to Shawn Hsiao
    and Masanori Sekino for the CoreAudio patch), xmms 1.2.5.
    </p>
		<a name="2001-07-19%20New%20document:%20X11%20on%20Darwin%20and%20Mac%20OS%20X"><span class="news-date">2001-07-19: </span><span class="news-headline">New document: X11 on Darwin and Mac OS X</span></a><?php gray_line(); ?>
			<p>A comprehensive document about <a href="doc/x11/index.php">X11 on
    Darwin and Mac OS X</a> is now available. It was written to be useful
    for anyone, not just Fink users.
    </p>
		<a name="2001-07-13%20Package%20database%20now%20online"><span class="news-date">2001-07-13: </span><span class="news-headline">Package database now online</span></a><?php gray_line(); ?>
			<p>A prototype of the <a href="pdb/index.php">package database</a>
    is now online.
    </p>
		<a name="2001-07-09%20Version%200.2.3%20is%20released"><span class="news-date">2001-07-09: </span><span class="news-headline">Version 0.2.3 is released</span></a><?php gray_line(); ?>
			<p>Get it from the <a href="<?php print $root; ?>download.php">download page</a>. This
    version fixes the dpkg download problems many of you were having.
    </p>
		<a name="2001-07-03%20Packaging%20Manual%20updated"><span class="news-date">2001-07-03: </span><span class="news-headline">Packaging Manual updated</span></a><?php gray_line(); ?>
			<p>The <a href="<?php print $root; ?>doc/packaging/index.php">Packaging Manual</a> was
    updated to include all recently added fields.
    </p>
		<a name="2001-06-30%20Web%20site%20restructuring"><span class="news-date">2001-06-30: </span><span class="news-headline">Web site restructuring</span></a><?php gray_line(); ?>
			<p>A major restructuring of the web site has started. The non-Fink-specific
    documents were removed because I don't have the time to maintain them. All
    documentation will be consolidated in the new <a href="doc/index.php">
    Documentation section</a>.
    </p>
		<a name="2001-06-24%20Version%200.2.2%20is%20released"><span class="news-date">2001-06-24: </span><span class="news-headline">Version 0.2.2 is released</span></a><?php gray_line(); ?>
			<p>Version 0.2.2 is finally released. Get it from the <a href="download.php">download page</a>. Be sure to read the notes
    about X11 in the INSTALL file.
    </p>
		<a name="2001-05-19%20CVS%20instructions%20updated"><span class="news-date">2001-05-19: </span><span class="news-headline">CVS instructions updated</span></a><?php gray_line(); ?>
			<p>The <a href="<?php print $root; ?>fink/cvs.php">CVS instructions</a> have
    been updated for Fink 0.2.x.
    </p>
		<a name="2001-04-26%20FAQ%20online"><span class="news-date">2001-04-26: </span><span class="news-headline">FAQ online</span></a><?php gray_line(); ?>
			<p>
      This site now sports a <a href="<?php print $root; ?>faq/index.php">FAQ section</a>. Not much content yet, but it's here to stay. 
    </p>
		<a name="2001-04-20%20Version%200.2.0%20is%20released"><span class="news-date">2001-04-20: </span><span class="news-headline">Version 0.2.0 is released</span></a><?php gray_line(); ?>
			<p>
      It now uses dpkg for binary package management. You can get it from the download page, but be aware that this version is not yet as stable as the 0.1.x series. 
    </p>
		<a name="2001-04-15%20Released%20version%200.1.8a"><span class="news-date">2001-04-15: </span><span class="news-headline">Released version 0.1.8a</span></a><?php gray_line(); ?>
			<p>
      Released version 0.1.8a, fixing install problems. You only need this if you downloaded 0.1.8 and had install problems ("stow not found"). Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
		<a name="2001-04-14%20Version%200.1.8%20is%20out"><span class="news-date">2001-04-14: </span><span class="news-headline">Version 0.1.8 is out</span></a><?php gray_line(); ?>
			<p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
		<a name="2001-03-30%20Porting%20notes%20updated"><span class="news-date">2001-03-30: </span><span class="news-headline">Porting notes updated</span></a><?php gray_line(); ?>
			<p>
      The <a href="<?php print $root; ?>darwin/porting.php">porting notes</a> have been updated with information on Mac OS X Final. 
    </p>
		<a name="2001-03-30%20Version%200.1.7%20is%20out!"><span class="news-date">2001-03-30: </span><span class="news-headline">Version 0.1.7 is out!</span></a><?php gray_line(); ?>
			<p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
		<a name="2001-03-24%20Mac%20OS%20X%20is%20released!"><span class="news-date">2001-03-24: </span><span class="news-headline">Mac OS X is released!</span></a><?php gray_line(); ?>
			<p>
      Expect Fink packages to be adapted to the final release within the next one or two weeks. 
    </p>
		<a name="2001-03-15%20Libtool%20page%20updated"><span class="news-date">2001-03-15: </span><span class="news-headline">Libtool page updated</span></a><?php gray_line(); ?>
			<p>
      Updated the <a href="<?php print $root; ?>darwin/libtool.php">libtool page</a> with a revised patch that does full shared library versioning. 
    </p>
		<a name="2001-03-08%20Version%200.1.6%20is%20out"><span class="news-date">2001-03-08: </span><span class="news-headline">Version 0.1.6 is out</span></a><?php gray_line(); ?>
			<p>
      Get it from the <a href="<?php print $root; ?>download.php">download page</a>. 
    </p>
		

<? include_once "footer.inc"; ?>
