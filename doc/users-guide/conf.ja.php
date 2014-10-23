<?php
$title = "ユーザーガイド - fink.conf";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:17';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="ユーザーガイド Contents"><link rel="next" href="usage.php?phpLang=ja" title="コマンドライン fink ツールの使用方法"><link rel="prev" href="upgrade.php?phpLang=ja" title="Fink のアップグレード">';


include_once "header.ja.inc";
?>
<h1>ユーザーガイド - 5. Fink 設定ファイル</h1>



<p>
この章では、 Fink 設定ファイル (fink.conf) で提供されている設定と、 Fink にどのように影響するか、特に <code>fink</code> コマンドラインツール (とソースディストリビューション) について説明します。
</p>

<h2><a name="about">5.1 fink.conf について</a></h2>

<p>
最初に Fink がインストールされた時、設定ファイルの設定でいくつか質問をします。
例えば、どの <a href="#mirrors">ミラー</a> を使ってダウンロードをするか、どのように super-user 権限を使うかなどです。
このプロセスは <code>fink configure</code> コマンドでいつでも再実行することができます。
オプションを設定するには <b>fink.conf</b> ファイルを編集する必要があるものもあります。
一般的に、こういった設定は上級者専用のオプションです。
</p>
<p>
<b>fink.conf</b> ファイルは <code>/sw/etc/fink.conf</code> にあります。
自分の好きなテキストエディタで編集することができますが、スーパーユーザー権限が必要です。
</p>

<h2><a name="syntax">5.2 fink.conf 文法</a></h2>

<p>
fink.conf にはたくさんの行がありますが、形式は:</p>
<pre>OptionName: Value</pre>
<p>と、行ごとになっています。
オプション名と値は : と空白ひとつで区切られています。
値の中身はオプションによりますが、通常はブール値 ("True" または "False")、文字列、空白で区切られた文字列などです。
例えば:
</p>
<pre>
BooleanOption: True
StringOption: Something
ListOption: Option1 Option2 Option3
</pre>

<h2><a name="required">5.3 必須設定</a></h2>

<p>
<b>fink.conf</b> の設定には、必須項目で、設定されていないと Fink が動作しないものがあります。
以下の設定はこのカテゴリーに入ります。
</p>
<ul>
<li>
<p>
<b>Basepath:</b> path</p>
<p>
Fink がインストールされている場所を知らせます。
Fink の最初のインストール時に変更していない限り、デフォルトでは <b>/sw</b> です。
この値を変更しては<b>いけません</b>。
<b>fink</b> が混乱します。
</p>
</li>
</ul>

<h2><a name="optional">5.4 ユーザー設定</a></h2>

<p>
ユーザーが Fink の動作をカスタマイズするためのオプション設定があります。
</p>
<ul>
<li>
<p>
Fink はスーパーユーザー権限が必要な時があります。
有効な値は <b>sudo</b> か <b>su</b> です。
<b>none</b> を設定することもできますが、この場合 Fink を root で実行して下さい。
デフォルト値は <b>sudo</b> で、ほとんどの場合そのまま使用して下さい。
</p>
</li>
<li>
<p>
<b>Trees:</b> list of trees</p>
<p>使用できるツリーは:</p>
<pre>
local/main      - インストールしたいローカルパッケージ
local/bootstrap - Fink のインストール時に必要なパッケージ
stable/crypto   - 安定版の暗号パッケージ
stable/main     - 他の安定版パッケージ
unstable/crypto - 非安定版の暗号パッケージ
unstable/main   - 他の非安定版パッケージ
</pre>
<p>
独自のツリーを <code>/sw/fink/dists</code> ディレクトリに追加することもできますが、通常は必要ありません。
デフォルトのツリーは "local/main local/bootstrap
stable/main" です。
この一覧は <code>/sw/etc/apt/sources.list</code> ファイルと同期を保つようにして下さい。
(fink 0.21.0 より、 <code>fink</code> が自動的に行うようになりました)
</p>
<p>ツリーの順序には意味があります。後のツリーにあるパッケージが前のツリーのパッケージを書き換えます。</p>
</li>
<li>
<p>
<b>Distribution:</b> 10.1, 10.2, 10.2-gcc3.3, 10.3, 10.4</p>
<p>Fink はどのバージョンの Mac OS X を使っているか知る必要があります。
10.0 以前はサポートされていません。
10.1 は現バージョンからサポート対象外となりました。
10.2 は August 2003 Developer Tools に更新している場合のみサポートされています。
このフィールドは <code>/sw/lib/fink/postinstall.pl</code> を実行することで設定されます。
ユーザーがこの値を変えてはいけません。
</p>
</li>
<li>
<p>
<b>FetchAltDir:</b> path</p>
<p><code>fink</code> は通常、ソースを <code>/sw/src</code> に保存します。
この値を変えることで、他の場所にダウンロードしたソースコードを探させることもできます。
例えば:
</p>
<pre>FetchAltDir: /usr/src</pre>
</li>
<li>
<p>
<b>Verbose:</b> 0 から 3 の数値</p>
<p>
このオプションは、現在何をしているかをどの程度報告するかを設定します。
例えば:
<b>0</b>
Quiet (ダウンロード状況を報告しない)
<b>1</b>
Low (tarball の展開を報告しない)
<b>2</b>
Medium (ほとんど全て報告する)
<b>3</b>
High (全て報告する)
デフォルト値は 1 です。
</p>
</li>
        <li><p><b>SkipPrompts:</b> コンマで区切られた一覧</p>
        <p>(<code>fink-0.25</code> 以降) 
        このオプションに設定された項目に関し、<code>fink</code> は利用者に聞かなくなります。
        各プロンプトはいずれかのカテゴリに属し、そのカテゴリが SkipPrompts 一覧に指定されている場合、
        直ちに既定値が洗濯されます。</p>
        <p>現在、以下のプロンプトカテゴリがあります。:</p>
        <p><b>fetch</b> - Downloads と mirrors</p>
        <p><b>virtualdep</b> - 代替パッケージの選択</p>
        <p>既定値としてスキップされるプロンプトはありません。</p></li>
<li>
<p>
<b>NoAutoIndex:</b> ブール値</p>
<p>Fink は、パッケージ記述ファイルを /sw/var/db/fink.db にキャッシュし、実行するたびに読み込んでパースする時間をセーブします。
この値が "True" でない限り、 Fink はパッケージインデックスを更新する必要があるか確認します。
デフォルト値は "False" で、変更することは勧めません。
変更した場合、 <code>fink index</code> コマンドを手動で実行してインデックスを更新する必要があります。
</p>
</li>
<li>
<p>
<b>SelfUpdateNoCVS:</b> ブール値</p>
<p><code>fink selfupdate</code> コマンドは、 Fink パッケージマネージャーを最新版にアップグレードします。
このオプションは True の時、 Concurrent Version System (CVS) を使わないことを保証します。
これは <code>fink selfupdate-cvs</code> コマンドが自動的に設定するので、手動では変更しないで下さい。
</p>
</li>
<li>
<p>
<b>Buildpath:</b> パス</p>
<p>
Fink はソースからコンパイルする場合、パッケージごとに仮ディレクトリを作成します。
デフォルトでは Panther 以前では <code>/sw/src</code> 内に、Tiger からは <code>/sw/src/fink.build</code> 内に、
置かれていますが、別の場所を使いたい場合はここでパスを指定します。
仮ディレクトリについては、本文書中<a href="#developer">Developer Settings</a> 節の
の <code>KeepRootDir</code> と <code>KeepBuildDir</code> のフィールドの解説をご覧下さい。
</p>
	    <p>
          Tiger では、BuildPath は <code>.noindex</code> または <code>.build</code> とつけることをお勧めします。
          こうしなければ、Spotlight が BuildPath 内にある仮ファイルをすべてインデックスしようとし、ビルドを遅くします。
    	</p>
</li>
</ul>

<h2><a name="downloading">5.5 ダウンロード設定</a></h2>

<p>Fink がダウンロードする手段を変える設定はいくつかあります。</p>
<ul>
<li>
<p>
<b>ProxyPassiveFTP:</b> ブール値</p>
<p>このオプションを設定すると、 Fink は FTP ダウンロード時に "passive" モードを使います。
FTP サーバーやネットワークによっては、このオプションが True になっている必要があります。
アクティブ FTP 自体が廃止予定なので、常に設定しておくことを勧めます。
</p>
</li>
<li>
<p>
<b>ProxyFTP:</b> url</p>
<p>FTP プロキシを使う場合、アドレスを入力します。
例えば:
</p>
<pre>ProxyFTP: ftp://yourhost.com:2121/</pre>
<p>FTP プロキシを使わない場合は空欄にしておいて下さい。</p>
</li>
<li>
<p>
<b>ProxyHTTP:</b> url</p>
<p>HTTP プロキシを使う場合、アドレスを入力します。
例えば:</p>
<pre>ProxyHTTP: http://yourhost.com:3128/</pre>
<p>HTTP プロキシを使わない場合は空欄にしておいて下さい。</p>
</li>
<li>
<p>
<b>Download Method:</b> wget または curl または axel または axelautomirror</p>
<p>Fink はインターネットからファイルをダウンロードするのに３種類のアプリケーションを使うことができます - <b>wget</b>, <b>curl</b>, または <b>axel</b>。
<b>axelautomirror</b> は、 <b>axel</b> アプリケーションの実験的モードで、特定のファイルがある最も近いサーバーからダウンロードします。
<b>axelmirror</b> の使用は現時点では勧められません。
デフォルト値は <b>curl</b> です。
<b>DownloadMethod に選択したアプリケーションはインストールされている必要があります!</b>
          (i.e. もし存在しないダウンロードアプリケーションを指定しても、<code>fink</code> は <b>curl</b> を使うことはありません。)
</p>
</li>
<li>
<p>
<b>SelfUpdateMethod:</b> point, rsync または cvs</p>
<p>
<code>fink</code> は、数種類の手段でパッケージ情報ファイルを更新することができます。
<b>rsync</b> が推奨される設定で、 rsync を用いて、ユーザーにより指定されたツリー中の、変更されたファイルだけをダウンロードします。
<code>stable</code> や <code>unstable</code> <a href="#optional">trees</a> 中のファイルを編集したり、新たに追加していた場合、削除されることに注意してください。
これらのファイルを必ず事前にバックアップしてください。
<b>cvs</b> では、 anonymous か :ext: cvs アクセスを使用して fink レポジトリから ダウンロードします。
cvs はミラーを使えないという欠点があるため、 CVS サーバーに接続することができない時は更新できません。
<b>point</b> は最近リリースされたものだけをダウンロードします。
ユーザのパッケージがかなり古い場合は更新されないので、おすすめはできません。
</p>
</li>
        <li><p><b>SelfUpdateCVSTrees:</b> ツリーの一覧</p>
        <p>(<code>fink-0.25</code> 以降) 
		既定では、 <b>cvs</b> selfupdate は現在の distribution ツリーのみ更新します。
		このオプションは、selfupdate 時に後進する distribution の一覧を書き換えます。
		
		もし CVS/ ディレクトリの存在しないディレクトリも更新したい場合は、最近の "cvs" バイナリが、
		完全パス中 (例 dists/local/main など) に必要ですので、
		ご注意ください。</p></li>
<li>
<p>
<b>UseBinaryDist:</b> ブール値</p>
<p>
<code>fink</code> に、バイナリ版があり、まだシステム上にバイナリない場合はバイナリをダウンロードするように指示します。
これによりインストール時間を短縮できるので、このオプションを設定することをおすすめします。
<a href="usage.php?phpLang=ja">--use-binary-dist オプション</a>を使用しても同じですが、これは一度だけ有効です。 
<b>fink バージョン 0.23.0 から有効</b>。
</p>
<p>注記：このモードは、選択されたパッケージのバイナリバージョンが最新バージョンに一致する場合にのみ適用されます。
入手可能な最新バージョンを <code>fink</code> が選択するようにはなっていません。</p>
</li>
</ul>

<h2><a name="mirrors">5.6 ミラー設定</a></h2>

<p>インターネットからソフトウェアを取得するのは退屈なことで、イライラすることが多いです。
ミラーサーバーは他のサーバーにあるファイルをコピーしますが、インターネット回線が速かったり、地理的に近いなど、ダウンロードが速い場合があります。
また、 <b>ftp.gnu.org</b> などの主サーバーの負荷を減らす役割もあります。
サーバーが落ちている時に代わりになる場合もあります。
</p>
<p>Fink が最適なミラーを選ぶためには、どの大陸のどの国にいるのかを知らせなければなりません。
サーバーからのダウンロードに失敗した場合、同じミラーを再度試すか、同じ国か大陸の別のミラーを試すか、あるいは世界中から他のミラーを試すかを聞いてきます。
</p>
<p><b>fink.conf</b> ファイルにはどのミラーを使いたいかの設定が書かれています。</p>
<ul>
<li>
<p>
<b>MirrorContinent:</b> 3 字のコード</p>
<p>この値を変えるには、 <code>fink configure</code> コマンドを使います。
3 字のコードは <code>/sw/lib/fink/mirror/_keys</code> にあるものから選択します。
例えば、アジアの場合:
</p>
<pre>MirrorContinent: asi</pre>
</li>
<li>
<p>
<b>MirrorCountry:</b> 6 字のコード</p>
<p>この値を変えるには、 <code>fink configure</code> コマンドを使います。
6 字のコードは <code>/sw/lib/fink/mirror/_keys</code> にあるものから選択します。
例えば、日本の場合:</p>
<pre>MirrorCountry: asi-JP</pre>
</li>
<li>
<p>
<b>MirrorOrder:</b> MasterFirst または MasterLast または MasterNever または ClosestFirst</p>
<p>
Fink は 'Master' ミラーをサポートしています。
これは、全ての Fink パッケージのソース tarball のレポジトリミラーです。
Master ミラーを使うと、ソースダウンロード URL が壊れないことが利点です。
ユーザーは、 Fink チームによってメンテナンスされているミラーを使うか、オリジナルソース URL と gnome, KDE, Debian などのミラーサイトだけを使うか、を選択できます。
この他、両者を組み合わせて、上で述べたように近い順に探して使うこともできます。
MasterFirst か MasterLast を使う場合、ダウンロードに失敗したら Master (あるいは Master 以外) に'スキップする'こともできます。
オプションは:
</p>
<pre>
MasterFirst - "Master" ソースミラーを最初に探す。
MasterLast - "Master" ソースミラーは最後に探す。
MasterNever - "Master"  ソースミラーは使用しない。
ClosestFirst - 最も近いソースミラーを最初に探す (全てのミラーを一緒にする)。
</pre>
</li>
        <li><p><b>Mirror-rsync:</b></p>
        <p>(<code>fink-0.25.2</code> 以降)
           <code>fink selfupdate</code> 時に <b>SelfupdateMethod</b> を 
           <code>rsync</code> 賭した場合、
           ここで指定された URL から rsync します。
           ここで指定する URL は、fink の全ての Distribution と Tree を含んだ anonymous rsync 用でなければなりません。</p></li>
</ul>

<h2><a name="developer">5.7 開発者用設定</a></h2>

<p><b>fink.conf</b> のオプションには、開発者にのみ有用なものがあります。
一般的な Fink ユーザーがこれを変更することは勧めません。
以下のオプションがこれに該当します。</p>
<ul>
<li>
<p>
<b>KeepRootDir:</b> ブール値</p>
<p>パッケージのビルド後に <b>BuildPath</b> 内の <code>root-[name]-[version]-[revision]</code> ディレクトリを削除しません。
デフォルトは false です。
<b>注意、このオプションはハードディスクをいっぱいにします!</b>
一度だけ使いたい場合、 <b>fink</b> に <b>-K</b> フラグを渡して同じ効果が得られます。
</p>
</li>
<li>
<p>
<b>KeepBuildDir:</b> ブール値</p>
<p>パッケージのビルド後に <b>BuildPath</b> 内の <code>[name]-[version]-[revision]</code> ディレクトリを削除しません。
デフォルトは false です。
<b>注意、このオプションはハードディスクをいっぱいにします!</b>
一度だけ使いたい場合、 <b>fink</b> に <b>-K</b> フラグを渡して同じ効果が得られます。
</p>
</li>
</ul>

<h2><a name="advanced">5.8 高度な設定</a></h2>
	
		<p>この他にも有益なオプションがありますが、正しく使うには知識が必要です。</p>
		<ul>
			<li>
				<p><b>MatchPackageRegEx:</b> </p>
				<p>
					perl 正規表現的に適合するパッケージが一つしかない場合、 fink が尋ねてこないようになります。
					例:
				</p>
				<pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>
				<p>'-ssl' で終わるパッケージ、 'xfree86'、および 'xfree86-shlibs' に正確に適合する。
				</p>
			</li>
			<li>
				<p><b>CCacheDir:</b> パス</p>
				<p>
					Fink パッケージ <code>ccache-default</code> がインストールされている場合、
					Fink パッケージを作成中にこれがつくるキャッシュがここに保存される。
					規定値は <code>/sw/var/ccache</code> 。
					<code>none</code> と設定された場合、 fink は CCACHE_DIR 環境変数を設定せず、
					ccache は <code>$HOME/.ccache</code> を使用する。
					ルートに所有されているファイルを自分のホームディレクトリに保存することもあり得る。
					<b>0.21.0 以降でのみ有効</b>.
				</p>
			</li>
        	<li><p><b>NotifyPlugin:</b> プラグイン</p><p>
           			パッケージがいつインストール/アンインストールされたかを答える告知プラグインを指定する。
           			規定値は Growl (<code>Mac::Growl</code> が必要)。
           			他のプラグインは、 <code>/sw/lib/perl5/Fink/Notify</code> にある。
				</p>
			</li>
        <li><p><b>AutoScanpackages:</b> ブール値</p>
           <p>
           <code>fink</code> が新しいパッケージをビルドしても、
           <code>apt-get</code> が直ちに検知する訳ではなりません。
           これまでは、<code>fink scanpackages</code> を実行することで
           <code>apt-get</code> に情報を提供していましたが、
           これを自動化できるようにしました。
           このオプションが <b>false</b> の場合は、パッケージビルド後に
           <code>fink scanpackages</code>
           は自動的に実行されません。
           既定値は <b>true</b> です。
           </p></li>
        <li><p><b>ScanRestrictivePackages:</b> ブール値</p>
           <p><code>apt-get</code> のためにパッケージをスキャンする際、
           <code>fink</code> は通常、現在のツリーにある全てのパッケージをスキャンします。
           しかしながら、apt レポジトリを公開するために、<code>Restrictive</code> や
           <code>Commercial</code> のパッケージを法律上含むことができないこともあるでしょう。
           このオプションが存在し、その値が <b>false</b> であれば、Fink はスキャン時にこれらのパッケージを外します。
           </p></li>
		</ul>
	
	<h2><a name="sourceslist">5.9 apt の sources.list ファイルを管理</a></h2>
		
		<p>
			fink 0.21.0 より、 fink は apt がバイナリファイルをインストールする際に使う
			<code>/sw/etc/apt/sources.list</code> ファイルを積極的に管理します。
			デフォルトの sources.list ファイルは、以下の形式で、 Distribution と Trees が調整されています
		</p>
<pre># Local modifications should either go above this line, or at the end.
#
# Default APT sources configuration for Fink, written by the fink program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in
# /sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding Packages.gz files
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main crypto

# Put local modifications to this file below this line, or at the top.</pre>

		<p>
			このデフォルトファイルにより、 apt-get はまずローカルインストール状況を見て
			コンパイル済みバイナリを探します。次に、公式のバイナリディストリビューションを見ます。
			これをファイルの最初に持ってきたり (最初に検索される) 、
			ファイルの最後に持ってきる (最後に検索される) などの変更が可能です。
		</p>
		<p>
			Trees の行や Distribution を変えると、 fink はファイル中の "default" を新しい値に書き換えます。
			変更がファイルの先頭か末尾であれば、 Fink は、ファイルの変更をそのままにします。
		</p>
		<p>
			注記: fink 0.21.0 にアップグレードする前に <code>/sw/etc/apt/sources.list</code> を変更した場合、
			<code>/sw/etc/apt/sources.list.finkbak</code> として保存されます。
		</p>
	
<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=ja">6. コマンドライン fink ツールの使用方法</a></p>
<?php include_once "../../footer.inc"; ?>


