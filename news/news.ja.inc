<a name="2006-07-01%20%E6%96%87%E6%9C%88%E3%81%AF%20%22Fink%20%E6%9B%B4%E6%96%B0%E6%9C%88%22%20%E3%81%A7%E3%81%99"><span class="news-date">2006-07-01: </span><span class="news-headline">文月は "Fink 更新月" です</span></a><?php gray_line(); ?>
      <p>
PowerPC 上の Fink ユーザは、古い "10.4-transitional" から、より新しい "10.4" ツリーへ fink を更新することをお勧めします。
2006年7月末には 10.4-transitional ツリーはサポートを終了する予定です。
</p><p>
背景: OS X 10.4 とともに来た、新しいバージョンの g++ コンパイラ
(Fink の馬車馬の一頭) は、以前おバージョンとはバイナリ非互換なコードを生成します。
10.4-transitional ツリーを使う際は、Fink は新しい gcc-4.0 コンパイラと古い g++-3.3 コンパイラを組み合わせて使います。
この戦略は、g++-4.0 と語感のパッケージをつくるため、よけいな時間を必要とします。
移行は完了の時期に達し、新しいツリーにのみ依存します。
しかし、g++ ライブラリを用いている、あるいは提供している全てのパッケージを、正しい順序で再ビルドしなければ行けないのが少し厄介です。
</p><p>
OS X 10.4 を使っている方は、
<code>fink --version</code>
というコマンドを実行することで、Fink を更新する必要があるかどうかわかります。
Distribution version が 0.8.1.cvs か 0.8.1.rsync であれば、更新の必要は<b>ありません</b>。
Distribution version が 0.8.0.cvs か 0.8.0.rsync であれば、以下に述べるように更新してください。。
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
コンパイルできても動作しません。
状況の改善作業はこれからも続きます。
</p>
<p>
10.4-transitional ツリー (0.8.0 ディストリビューションから) を使っているこれまでの fink インストールを使っている Fink ユーザには、
2つのアップグレードプォ右方があります。
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
    
