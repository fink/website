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

