<?
$title = "パッケージ化 - FS レイアウト";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/03/09 15:29:17';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="パッケージ化 Contents"><link rel="next" href="reference.php?phpLang=ja" title="参照"><link rel="prev" href="policy.php?phpLang=ja" title="パッケージ化ポリシー">';

include_once "header.inc";
?>

<h1>パッケージ化 - 4 ファイルシステムのレイアウト</h1>
		
		


		
			<p>
				以下はファイルシステムレイアウトのガイドラインで、 Fink のパッケージ化ポリシーに含まれています。
			</p>
		


		<h2><a name="fhs">4.1 ファイルシステム構造標準 (Filesystem Hierarchy Standard)</a></h2>
			
			<p>
				Fink は<a href="http://www.pathname.com/fhs/">ファイルシステム構造標準 (Filesystem Hierarchy Standard)</a>
				あるいは FHS の精神に従っています。
				精神に、と限定しているのは、 FHS は <code>/</code> と <code>/usr</code> ハイエラルキー
				への管理権限を有するシステムベンダー向けに作成されているものだからです。
				Fink は追加型のディストリビューションに過ぎず、その権限はインストールディレクトリまでです。
				例ではデフォルトの接頭部である <code>/sw</code> を使用します。
			</p>
		

		<h2><a name="dirs">4.2 ディレクトリ</a></h2>
			
			<p>
				ファイルは以下のサブディレクトリに保存します:
			</p>

			<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>
						<code>/sw/bin</code>
					</td><td>
						<p>
							一般的な実行可能プログラム。
							サブディレクトリはなし。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/sbin</code>
					</td><td>
						<p>
							管理者が使う実行可能プログラム用のディレクトリ。
							バックグラウンドデーモンもここに保存する。
							サブディレクトリはなし。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/include</code>
					</td><td>
						<p>
							このディレクトリは C と C++ ヘッダファイル用。
							必要に応じてサブディレクトリを作成することができる。
							標準 C ヘッダと混同しそうなヘッダファイルをインストールする場合は<b>必ず</b>サブディレクトリに入れること。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/lib</code>
					</td><td>
						<p>
							アーキテクチャ依存のデータファイルやライブラリを保存するディレクトリ。
							静的ライブラリと共有ライブラリは特に理由がない限りは <code>/sw/lib</code> に置く。
							また、ユーザによって直接実行されない実行可能ファイルもここに置く
							(層でない場合は libexec に置く)。
						</p>
						<p>
							パッケージはデータやローダブルモジュールを保存するサブディレクトリを自由に作成することができます。
							サブディレクトリの名称は、互換性のためにも意味のある、特にメジャーバージョン番号を用いて
							<code>/sw/lib/perl5</code> や <code>/sw/lib/apache/1.3</code>
							などのように付けて下さい。
							ホストタイプを付ける場合、 <code>powerpc-apple-darwin1.3.3</code> 
							などは、互換性を考えるとあまり宜しくありません。
							<code>powerpc-apple-darwin1.3</code> あるいは <code>powerpc-apple-darwin</code> 
							の方が適しています。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share</code>
					</td><td>
						<p>
							このディレクトリはアーキテクチャ比依存のデータファイル用で、
							<code>/sw/lib</code> も同様。
							両者に共通のサブディレクトリについては下記を参照。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share/man</code>
					</td><td>
						<p>
							マニュアルページ用ディレクトリ。
							通常のセクションツリーに構造化されている。
							<code>/sw/bin</code> と <code>/sw/sbin</code> にあるプログラムには全てマニュアルページを添付する。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share/info</code>
					</td><td>
						<p>
							Info 形式のドキュメント用ディレクトリ。
							Texinfo ソースから作成される。 
							<code>dir</code> ファイルのメンテナンスは Debian 版の <code>install-info</code> (<code>dpkg</code> の一部)
							で自動化されている。
							<code>InfoDocs</code> 詳細フィールドを使って自動的に <code>postinst</code> と
							<code>prerm</code> パッケージスクリプトのコードを作成する。
							Fink は、それぞれのパッケージが勝手に <code>dir</code> ファイルを作成しないように確認をする。 
							サブディレクトリはなし。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share/doc</code>
					</td><td>
						<p>
							man でも Info でもないドキュメント用のディレクトリ。
							README, LICENSE, COPYING はここに保存する。
							全てのパッケージはサブディレクトリを作成し、名称はパッケージ名とする。
							名称には (パッケージ名に付いている番号以外の) バージョン番号はつけない。
							<code>%n</code> を使うのがベスト。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/share/locale</code>
					</td><td>
						<p>
							国際化用のメッセージカタログディレクトリ。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/var</code>
					</td><td>
						<p>
							<code>var</code> ディレクトリにはデータを保存する。
							データとは、スプールディレクトリ、ロックファイル、状態のデータベース、ゲームのハイスコアやログファイルがある。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/etc</code>
					</td><td>
						<p>
							設定ファイル用ディレクトリ。
							複数のファイルを使用するパッケージはサブディレクトリを作る方が好ましい。
							サブディレクトリの名称はパッケージ名称かプログラム名とする。
						</p>
					</td></tr><tr valign="top"><td>
						<code>/sw/src</code>
					</td><td>
						<p>
							ソースコードを保存、ビルドするディレクトリ。
							パッケージが何かをインストールする場所ではない。
						</p>
					</td></tr></table>
		


		<h2><a name="avoid">4.3 回避すること</a></h2>
			
			<p>
				上述のディレクトリ以外は /sw に作成をしない。
				特に、
				<code>/sw/man</code>, <code>/sw/info</code>,
				<code>/sw/doc</code>, <code>/sw/libexec</code>,
				<code>/sw/lib/locale</code>
				は作成しない。
			</p>
		


	<p align="right">
Next: <a href="reference.php?phpLang=ja">5 参照</a></p>

<? include_once "footer.inc"; ?>
