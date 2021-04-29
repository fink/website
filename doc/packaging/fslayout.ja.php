<?php
$title = "パッケージ作成 - ファイルシステム";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2021/04/28 19:08:00';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ作成 Contents"><link rel="next" href="compilers.php?phpLang=ja" title="コンパイラ"><link rel="prev" href="policy.php?phpLang=ja" title="パッケージ化ポリシー">';


include_once "header.ja.inc";
?>
<h1>パッケージ作成 - 4. ファイルシステムのレイアウト</h1>
		
		
		
			<p>
				以下はファイルシステムのレイアウトのガイドラインで， Fink のパッケージ作成ポリシーの一部です．
			</p>
		
		<h2><a name="fhs">4.1 ファイルシステム構造標準 (Filesystem Hierarchy Standard)</a></h2>
			
			<p>
				Fink は
				<a href="http://www.pathname.com/fhs/">
					ファイルシステム構造標準 (Filesystem Hierarchy Standard, 略して FHS )
				</a>
				の精神に従います．
				しかし従えるのは飽くまでも精神のみです．
				それは FHS が <code>/</code> 以下と <code>/usr</code> 以下の階層を管理できるシステムベンダ向けに作られたからです．
				Fink はインストールディレクトリ (別名「プリフィクス」) 以下のみを管理するアドオン・ディストリビューションです．
				以降の例ではデフォルトの「プリフィクス」 <code>/sw</code> を使います．
			</p>
		
		<h2><a name="dirs">4.2 ディレクトリ</a></h2>
			
			<p>
				ファイルは以下のサブディレクトリに保存します:
			</p>
			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>
						<code>/sw/bin</code>
					</td><td>
						<p>
							一般的な実行可能プログラム用．
							サブディレクトリはなし．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/sbin</code>
					</td><td>
						<p>
							管理者のみが使うことを意図した実行可能プログラム用．
							バックグラウンドで動くデーモンもここに入る．
							サブディレクトリはなし．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/include</code>
					</td><td>
						<p>
							C と C++ のヘッダファイル用．
							必要に応じてサブディレクトリを作成してよい．
							標準の C ヘッダファイルと混同しそうなヘッダファイルをインストールする場合は<b>必ず</b>サブディレクトリに入れること．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/lib</code>
					</td><td>
						<p>
							アーキテクチャ依存のデータファイルやライブラリ用．
							静的および共有ライブラリは，避ける理由が特にない限り <code>/sw/lib</code> 直下に置きます．
							ユーザが直接起動することのない実行可能プログラム
							(普通なら <code>libexec</code> 下に置かれるはずのもの) もここに置きます．
						</p>
						<p>
							パッケージは，固有のデータやロード可能モジュールを保存するサブディレクトリを自由に作成できます．
							必ず互換性を考慮したディレクトリ名を使って下さい．
							賢明な方法は，そのサブディレクトリの名前にパッケージの「メジャーバージョン」を含めたり，
							「メジャーバージョン」をディレクトリ名にしたさらに深い階層を作ることです
							(<code>/sw/lib/perl5</code> や <code>/sw/lib/apache/1.3</code> など)．
							ディレクトリにホストの種類を使うときには注意が必要です．
							<code>powerpc-apple-darwin1.3.3</code> は，互換性の観点から問題があります．
							<code>powerpc-apple-darwin1.3</code> または単に <code>powerpc-apple-darwin</code> とします．
						</p>
					</td></tr><tr valign="top"><td><code>/sw/lib/ppc64</code>
<code>/sw/lib/x86_64</code></td><td>
<p>
このディレクトリは 64-bit ライブラリ用で，
powerpc アーチテクチャーでは <code>/sw/lib/ppc64</code> が，
i386 アーチテクチャーでは <code>/sw/lib/x86_64</code> が用いられます．
'fat' としてビルドされたライブラリは， <code>/sw/lib</code> に保存されます．
</p>
</td></tr><tr valign="top"><td>
						<code>/sw/share</code>
					</td><td>
						<p>
							アーキテクチャに依存しないデータファイル用で， <code>/sw/lib</code> と同じルールが当てはまります．
							よく使われるサブディレクトリについては後述します．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share/man</code>
					</td><td>
						<p>
							man ページ用．
							この中は man のセクションに従って分類されます．
							<code>/sw/bin</code> と <code>/sw/sbin</code> の中の全てのプログラムには，
							対応した man ページがここになければいけません．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share/info</code>
					</td><td>
						<p>
							Texinfo ソースから生成される Info 形式のドキュメント用．
							索引ファイル <code>dir</code> のメンテナンスは
							Debian 版 <code>install-info</code> (パッケージ <code>dpkg</code> の一部) が自動的に行う．
							パッケージ記述のフィールド <code>InfoDocs</code> を使って，
							パッケージスクリプト <code>PostInst</code> 及び <code>PreRm</code> で使うための適切なコードを自動生成する．
							Fink は，それぞれのパッケージが勝手に <code>dir</code> ファイルを作成しないことを保証する．
							サブディレクトリはなし．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share/doc</code>
					</td><td>
						<p>
							man でも Info でもないドキュメント用．
							README, LICENSE, COPYING はここに保存する．
							全てのパッケージは，ここに各「パッケージ名」に対応したサブディレクトリを作らなければいけない．
							名前には (「パッケージ名」そのものの一部でない限り) 「バージョン」を含めてはいけない．
							単に <code>%n</code> を使うとよいでしょう．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share/locale</code>
					</td><td>
						<p>
							国際化で使うメッセージカタログ用．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/var</code>
					</td><td>
						<p>
							ディレクトリ <code>var</code> には変化するデータを保存する．
							(スプールディレクトリ，ロックファイル，状態のデータベース，ゲームのハイスコアやログファイルなど)
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/etc</code>
					</td><td>
						<p>
							設定ファイル用．
							複数のファイルを使用するパッケージは，ここにサブディレクトリを作らなければいけない．
							区別のため，そのサブディレクトリにはパッケージまたはその中のプログラムの名前を付けなければいけない．
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/src</code>
					</td><td>
						<p>
							ソースコードを保存，ビルドするディレクトリ．
							パッケージはここに何もインストールしてはいけない．
						</p>
					</td></tr><tr valign="top"><td><code>/sw/Applications</code></td><td>
<p>このディレクトリには，コマンドラインから実行するのではなく，ダブルクリックで実行する OS X 型のアプリケーションを保存する．</p>
</td></tr><tr valign="top"><td><code>/sw/Library/Frameworks</code></td><td>
<p>このディレクトリには，OS X 型のアプリケーションが使用する，OS X 型のフレームワークを保存する．</p>
</td></tr></table>
		
		<h2><a name="avoid">4.3 避けるべきこと</a></h2>
			
			<p>
				<code>/sw</code> 下には，上述のもの以外ディレクトリを作ってはいけません．
				特に以下のディレクトリを作らないこと:
				<code>/sw/man</code>, <code>/sw/info</code>, <code>/sw/doc</code>,
				<code>/sw/libexec</code>, <code>/sw/lib/locale</code>
			</p>
		
	<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="compilers.php?phpLang=ja">5. コンパイラ</a></p>
<?php include_once "../../footer.inc"; ?>


