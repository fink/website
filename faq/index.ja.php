<?php
$title = "F.A.Q.";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/04/05 5:48:20';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="general.php?phpLang=ja" title="一般的な質問">';


include_once "header.ja.inc";
?>
<h1>The Fink F.A.Q.</h1>
<p>このページは Fink の FAQ です。
質問は、他の FAQ と同様に実際に質問されたものと、あらかじめ予想して作られたものがあります。
質問と回答の形をとった仮のドキュメントとなっています。</p>
<p>FAQは節毎にページがわかれています。
下記の目次にすべての質問があります。
それぞれリンクされていますので、辿っていってください。</p>
<h2><?php echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="general.php?phpLang=ja"><b>1 一般的な質問</b></a><ul><li><a href="general.php?phpLang=ja#what">1.1 Fink とは何ですか?</a></li><li><a href="general.php?phpLang=ja#naming">1.2 Fink とはどういう意味ですか?</a></li><li><a href="general.php?phpLang=ja#bsd-ports">1.3 
Fink と BSD の port メカニズムはどう違うのですか (OpenPackages や GNU-Darwin も含めて)?
</a></li><li><a href="general.php?phpLang=ja#usr-local">1.4 なぜ Fink は /usr/local にインストールしないのですか?</a></li><li><a href="general.php?phpLang=ja#why-sw">1.5 ではなぜ /sw を選んだのですか?</a></li></ul></li><li><a href="relations.php?phpLang=ja"><b>2 他のプロジェクトとの関係</b></a><ul><li><a href="relations.php?phpLang=ja#upstream">2.1 パッチを送るなど、本家のメンテナに貢献していますか?</a></li><li><a href="relations.php?phpLang=ja#debian">2.2 Debian プロジェクトとは関係がありますか。 Debian Linux を Mac OS X に移植しようとしているのですか?</a></li><li><a href="relations.php?phpLang=ja#apple">2.3 Apple とは関係がありますか?</a></li><li><a href="relations.php?phpLang=ja#darwinports">2.4 Darwinports とは関係がありますか?</a></li></ul></li><li><a href="mirrors.php?phpLang=ja"><b>3 Fink ミラー</b></a><ul><li><a href="mirrors.php?phpLang=ja#when-use">3.1 Fink ミラーとは何ですか?</a></li><li><a href="mirrors.php?phpLang=ja#why">3.2 なぜ rsync ミラーを使わないといけないのですか?</a></li><li><a href="mirrors.php?phpLang=ja#where">3.3 Fink ミラーの情報はどこにありますか?</a></li><li><a href="mirrors.php?phpLang=ja#when-not">3.4 rsync サーバーに接続できません。どうしたら良いですか?</a></li><li><a href="mirrors.php?phpLang=ja#otherinfogone">3.5 rsync 方式に変えたら、unused ツリーの info ファイルが全て消えてしまいました。</a></li><li><a href="mirrors.php?phpLang=ja#howswitch">3.6 どのように方式を切り替えるのですか?</a></li><li><a href="mirrors.php?phpLang=ja#Master">3.7 Distfiles ミラーとは何ですか?</a></li></ul></li><li><a href="upgrade-fink.php?phpLang=ja"><b>4 Fink のアップグレード (バージョン固有の問題対処法)</b></a><ul><li><a href="upgrade-fink.php?phpLang=ja#leopard-bindist1">4.1 rsync や cvs の selfupdate を実行しても、Fink が新しいパッケージを読み込んでくれません。</a></li><li><a href="upgrade-fink.php?phpLang=ja#leopard-bindist2">4.2 何かをインストールしようとすると、'Can't resolve dependency "fink (&gt;= 0.28.0)"' というエラーが出ます。</a></li><li><a href="upgrade-fink.php?phpLang=ja#stuck-gettext">4.3 Fink が、'sudo apt-get install libgettext3-dev=0.14.5-2' を実行して問題のある依存性を解消するように言ってきますが、まだおかしいです。</a></li><li><a href="upgrade-fink.php?phpLang=ja#stuck-dpkg">4.4 Fink が 'Can't resolve dependency "dpkg (&gt;= 1.10.21-1229)" for package "dpkg-base-files-0.3-1"' って言うてはりますけど、  
          どないしたらよろしいですやろ？
          </a></li></ul></li><li><a href="usage-fink.php?phpLang=ja"><b>5 Fink のインストール、使用、メンテナンス</b></a><ul><li><a href="usage-fink.php?phpLang=ja#what-packages">5.1 Fink がサポートしているパッケージはどのように探せますか?</a></li><li><a href="usage-fink.php?phpLang=ja#proxy">5.2 ファイヤーウォールの内側にいます。どう設定したら Fink で HTTP プロキシが使えますか?</a></li><li><a href="usage-fink.php?phpLang=ja#firewalled-cvs">5.3 ファイヤーウォールの内側から CVS でパッケージをアップデートするにはどうしたらいいですか?</a></li><li><a href="usage-fink.php?phpLang=ja#moving">5.4 インストール後に Fink を他の場所に移動できますか?</a></li><li><a href="usage-fink.php?phpLang=ja#moving-symlink">5.5 Fink をインストール後、他の場所に移動してシンボリックリンクを張ったら、動きますか?</a></li><li><a href="usage-fink.php?phpLang=ja#removing">5.6 Fink を全てアンインストールするには?</a></li><li><a href="usage-fink.php?phpLang=ja#bindist">5.7 ウェブのパッケージデータベースは、パッケージ xxx を表示しているのに、 apt-get と dselect は何もしない。どっちが嘘をついてるのですか?
</a></li><li><a href="usage-fink.php?phpLang=ja#unstable">5.8 unstable にあるパッケージをインストールしようとすると、 fink が 'no package found' といいます。どうしたらインストールできるのですか?</a></li><li><a href="usage-fink.php?phpLang=ja#unstable-onepackage">5.9 
          unstable にあるパッケージをひとつだけインストールするにも、 unstable 全体を有効にしなければなりませんか?
        </a></li><li><a href="usage-fink.php?phpLang=ja#sudo">5.10 sudo でパスワードを何度も何度も入力するのは疲れます。何か良い方法はありませんか?</a></li><li><a href="usage-fink.php?phpLang=ja#exec-init-csh">5.11 init.csh or init.sh を実行しようとすると、 "Permission denied" エラーが出ます。
何がおかしいのですか?</a></li><li><a href="usage-fink.php?phpLang=ja#dselect-access">5.12 うぎゃ! dselect で "[A]ccess" メニューを使ったら、パッケージをダウンロードできなくなった!</a></li><li><a href="usage-fink.php?phpLang=ja#cvs-busy">5.13 <q>fink selfupdate</q> か "fink selfupdate-cvs" を実行しようとした時、  "<code>Updating using CVS failed. Check the error messages above.</code>" エラーが出ました。</a></li><li><a href="usage-fink.php?phpLang=ja#kernel-panics">5.14 Fink を使うと、マシンがフリーズする/カーネルパニックする/固まる。助けて!</a></li><li><a href="usage-fink.php?phpLang=ja#not-found">5.15 パッケージをインストールしようとすると、 Fink がダウンロードできません。
ダウンロードサイトとは Fink よりも新しいバージョンを示しています。
何をしたらいいですか?</a></li><li><a href="usage-fink.php?phpLang=ja#fink-not-found">5.16 Fink や Fink でインストールしたものを実行しようとすると
"command not found" エラーが出ます。</a></li><li><a href="usage-fink.php?phpLang=ja#invisible-sw">5.17 Finder で /sw を隠して、ユーザーが Fink の構成を壊すのを防ぎたい。</a></li><li><a href="usage-fink.php?phpLang=ja#install-info-bad">5.18 何もインストールできません。
"install-info: unrecognized option `--infodir=/sw/share/info'"
のエラーが出るだけです。</a></li><li><a href="usage-fink.php?phpLang=ja#bad-list-file">5.19 何もインストールできないし、削除もできません。 "files list file" と出るだけです。</a></li><li><a href="usage-fink.php?phpLang=ja#dselect-garbage">5.20 <code>dselect</code> でパッケージを選択すると、大量のゴミがでてきます。
これはどうやったら使えますか?</a></li><li><a href="usage-fink.php?phpLang=ja#cant-upgrade">5.21 Fink のバージョンをアップデートできないようです。</a></li><li><a href="usage-fink.php?phpLang=ja#spaces-in-directory">5.22 名前に空白が入っているボリュームやディレクトリに Fink を入れることはできますか?</a></li><li><a href="usage-fink.php?phpLang=ja#packages-gz">5.23 バイナリアップデートをしようとすると、 "File not found" または "Couldn't stat package source list file" というメッセージが大量に出ます。</a></li><li><a href="usage-fink.php?phpLang=ja#wrong-tree">5.24 OS を変えたら、 Fink が認識してくれません。</a></li><li><a href="usage-fink.php?phpLang=ja#lost-command-line-tools">5.25 After installing a macOS update, Fink no longer recognizes my installed Command Line Tools.</a></li><li><a href="usage-fink.php?phpLang=ja#seg-fault">5.26 何かをインストールしようとしたら <code>gzip</code> | <code>dpkg-deb</code> のエラーが出る! 助けて!</a></li><li><a href="usage-fink.php?phpLang=ja#pathsetup-keeps-running">5.27 ターミナルウィンドウを開くと、
"Your environment seems to be correctly set up for Fink already."
というメッセージが出てログアウトします。</a></li><li><a href="usage-fink.php?phpLang=ja#ext-drive">5.28 
	メインパーティション以外に Fink をインストールしていますが、
	ソースからの更新ができません。
	<q>chowname</q> を含んだエラーが出ます。
	</a></li><li><a href="usage-fink.php?phpLang=ja#mirror-gnu">5.29 
	Fink がパッケージを更新しません。
	'gnu' ミラーが見つからないと言っています。
	</a></li><li><a href="usage-fink.php?phpLang=ja#cant-move-fink">5.30 
	Fink を更新できません。
	/sw/fink を移動できないからです。
	</a></li><li><a href="usage-fink.php?phpLang=ja#fc-cache">5.31 "No fonts found" というメッセージが出ます。</a></li><li><a href="usage-fink.php?phpLang=ja#non-admin-installer">5.32 インストーラから Fink をインストールできません。"volume doesn't support symlinks" エラーが出ます。</a></li><li><a href="usage-fink.php?phpLang=ja#wrong-arch">5.33 Fink を更新できない。 <q>package architecture (darwin-i386) がシステム (darwin-powerpc) に合っていない。</q>
</a></li></ul></li><li><a href="comp-general.php?phpLang=ja"><b>6 コンパイルの問題 - 一般</b></a><ul><li><a href="comp-general.php?phpLang=ja#compiler">6.1 configure スクリプトが "acceptable cc" が見つからないといってきます。
これは何ですか?</a></li><li><a href="comp-general.php?phpLang=ja#cvs">6.2 "fink selfupdate-cvs" をしようとしたら、このメッセージが出てきました: "cvs: Command not found."
</a></li><li><a href="comp-general.php?phpLang=ja#missing-make">6.3 <code>make</code> に関連したエラーがでました。</a></li><li><a href="comp-general.php?phpLang=ja#head">6.4 head コマンドから変な使用方法メッセージが出ています。何がおかしいのですか?</a></li><li><a href="comp-general.php?phpLang=ja#also_in">6.5 あるパッケージをインストールしようとすると、他のパッケージのファイルを上書きしようとしているというエラーメッセージが出ました。
</a></li><li><a href="comp-general.php?phpLang=ja#mv-failed">6.6 パッケージをインストールしようとした時の "execution of mv failed, exit code 1" とはどういう意味ですか?</a></li><li><a href="comp-general.php?phpLang=ja#node-exists">6.7 '"node" already exists' というエラーメッセージが出て、インストール | アップデートができません。</a></li><li><a href="comp-general.php?phpLang=ja#usr-local-libs">6.8 /usr/local にインストールされているライブラリやヘッダが 
	Fink のビルドの問題を起こすことがあると聞いたけど、本当ですか?</a></li><li><a href="comp-general.php?phpLang=ja#toc-out-of-date">6.9 パッケージをビルドしようとしたら、 "table of contents" が古いというメッセージが出ました。何をしたらいいですか?
</a></li><li><a href="comp-general.php?phpLang=ja#fc-atlas">6.10 atlas をインストールしようとすると、 Fink Commander がハングアップします。</a></li><li><a href="comp-general.php?phpLang=ja#basic-headers">6.11 <code>stddef.h</code> | <code>wchar.h</code> | <code>stdlib.h</code> | <code>crt1.o</code> が見つからない、
あるいは、"C compiler cannot create executables" というメッセージが出ます。
これはどこにありますか?</a></li><li><a href="comp-general.php?phpLang=ja#multiple-dependencies">6.12 Fink が "unable to resolve version conflict on multiple dependencies" と言って、アップデートできません。</a></li><li><a href="comp-general.php?phpLang=ja#dpkg-parse-error">6.13 "dpkg: parse error, in file `/sw/var/lib/dpkg/status'"
というメッセージが出て、何もインストールできません!</a></li><li><a href="comp-general.php?phpLang=ja#freetype-problems">6.14 freetype に関係したエラーが出ます。</a></li><li><a href="comp-general.php?phpLang=ja#dlfcn-from-oo">6.15 `Dl_info' のエラーが出ます。</a></li><li><a href="comp-general.php?phpLang=ja#gcc2">6.16 Fink が <code>gcc2</code> がないと言っていますが、インストールも出来ないようです。</a></li><li><a href="comp-general.php?phpLang=ja#system-java">6.17 Fink が <code>Failed: Can't resolve dependency "system-java14-dev"</code>
と言っていますが、そのようなパッケージはありません。
</a></li><li><a href="comp-general.php?phpLang=ja#dpkg-split">6.18 
何をインストールしようとしても、
<q>dpkg (subprocess): failed to exec dpkg-split to see if it's part of a multiparter: No such file or directory</q>
というエラーが出ます。
どうしたらいいですか?
</a></li><li><a href="comp-general.php?phpLang=ja#xml-parser">6.19 
	次のメッセージが出ます:<q>configure: error: XML::Parser perl module is required for intltool</q>。
	どうしたら良いでしょうか?
	</a></li><li><a href="comp-general.php?phpLang=ja#master-problems">6.20 
		パッケージをダウンロードしようとすると、 Fink が変なサイトに行こうとするけれど、 <q>distfiles</q>
		と書いてあるだけで、しかもそのファイルはそこに存在しません。
	</a></li><li><a href="comp-general.php?phpLang=ja#compile-options">6.21 パッケージをビルドするときに、 Fink に違うオプションを使わせたい。</a></li><li><a href="comp-general.php?phpLang=ja#alternates">6.22 
	  ソースからビルドしようとすると必ず、同じライブラリの二つのバージョンをいったりきたりします。
	</a></li><li><a href="comp-general.php?phpLang=ja#python-mods">6.23 Python モジュールをビルドする際に、<code>MACOSX_DEPLOYMENT_TARGET </code> の問題が出ます。</a></li><li><a href="comp-general.php?phpLang=ja#libtool-unrecognized-dynamic">6.24 
      <q>unrecognized option `-dynamic'</q> というエラーが <code>libtool</code> から出たとです。
    </a></li></ul></li><li><a href="comp-packages.php?phpLang=ja"><b>7 コンパイルの問題 - 特定のバージョン</b></a><ul><li><a href="comp-packages.php?phpLang=ja#libgtop">7.1 <code>sed</code> を使うパッケージビルドが失敗します。</a></li><li><a href="comp-packages.php?phpLang=ja#cant-install-xfree">7.2 Fink の XFree86 パッケージに切替えたいけれど、 <code>system-xfree86</code>  とコンフリクトしているため <code>xfree86-base</code> | <code>xfree86</code> がインストールできません。</a></li><li><a href="comp-packages.php?phpLang=ja#change-thread-nothread">7.3 non-threaded 版の Fink XFree86 パッケージから threaded 版 (またはその逆) にはどうしたら切替えることができますか?</a></li><li><a href="comp-packages.php?phpLang=ja#libiconv-gettext">7.4 <code>libiconv</code> が更新できません。</a></li><li><a href="comp-packages.php?phpLang=ja#cplusplus-filt">7.5 パッケージがインストールできません。<code>c++filt</code> がないからです。 
        これはどこにありますか?</a></li><li><a href="comp-packages.php?phpLang=ja#gettext-tools">7.6 Fink が、 <code>gettext</code> の依存性に矛盾があるとだけ表示し、更新してくれません。</a></li><li><a href="comp-packages.php?phpLang=ja#Leopard-libXrandr">7.7 OS 10.5 で <b>gtk+2</b> がインストールできません。</a></li><li><a href="comp-packages.php?phpLang=ja#all-others">7.8 ここに載っていないパッケージで問題があります。</a></li></ul></li><li><a href="usage-general.php?phpLang=ja"><b>8 パッケージ使用上の問題 - 一般</b></a><ul><li><a href="usage-general.php?phpLang=ja#xlocale">8.1 このようなメッセージが大量に出ます。
"locale not supported by C library"
これはまずいことですか?</a></li><li><a href="usage-general.php?phpLang=ja#passwd">8.2 いきなり変なユーザーがシステムに現れました。
ユーザー名は、 "mysql", "pgsql", "games" などです。
こいつらはどこから来たのですか?</a></li><li><a href="usage-general.php?phpLang=ja#compile-myself">8.3 Fink でインストールしたソフトウェアを使って、自分で何かをコンパイルするにはどうしたらいいのですか?</a></li><li><a href="usage-general.php?phpLang=ja#apple-x11-applications-menu">8.4 Apple X11 の Application メニューを使うと、 Fink からインストールしたアプリケーションの起動できません。</a></li><li><a href="usage-general.php?phpLang=ja#x-options">8.5 X11 の種類が多くて迷っています。
	Apple X11, XFree86 などなど、どれをインストールしたら良いのですか?</a></li><li><a href="usage-general.php?phpLang=ja#no-display">8.6 アプリケーションを実行しようとすると、
"cannot open display:"
というメッセージがでます。
どうしたら良いですか?</a></li><li><a href="usage-general.php?phpLang=ja#suggest-package">8.7 自分の好きなプログラムが Fink にありません。
Fink に推薦したいのですが、どうしたら良いですか?</a></li><li><a href="usage-general.php?phpLang=ja#virtpackage">8.8 
	  <code>system-*</code> "virtual packages" というのを時々見かけますが、
	  インストールも削除もできません。
	  これはいったいなんですか?
	</a></li></ul></li><li><a href="usage-packages.php?phpLang=ja"><b>9 パッケージ使用上の問題 - 特定のパッケージ</b></a><ul><li><a href="usage-packages.php?phpLang=ja#xmms-quiet">9.1 XMMS から音がでません。</a></li><li><a href="usage-packages.php?phpLang=ja#nedit-window-locks">9.2 nedit でファイルを編集していると、他のファイルを開く時にウィンドウが出ますが、反応がありません。</a></li><li><a href="usage-packages.php?phpLang=ja#xdarwin-start">9.3 助けて!
XDarwin を起動してもすぐ終了しちゃう!</a></li><li><a href="usage-packages.php?phpLang=ja#no-server">9.4 XDarwin を起動しようとすると、このメッセージがでます
"xinit: No such file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH"。
</a></li><li><a href="usage-packages.php?phpLang=ja#apple-x-delete">9.5 Apple X11 の delete キーを、 XDarwin のように使いたいのです。</a></li><li><a href="usage-packages.php?phpLang=ja#gnome-two">9.6 GNOME 1.x から GNOME 2.x にアップグレードしたら、 <code>gnome-session</code> がウィンドウマネージャーを開かなくなりました。</a></li><li><a href="usage-packages.php?phpLang=ja#apple-x11-no-windowbar">9.7 Panther で Apple X11 にアップグレードしたら、ウィンドウのタイトルバーが消えました。</a></li><li><a href="usage-packages.php?phpLang=ja#apple-x11-wants-xfree86">9.8 X11 と Fink に問題があります。</a></li><li><a href="usage-packages.php?phpLang=ja#special-x11-debug">9.9 まだ X11 と Fink の問題が解決されません。</a></li><li><a href="usage-packages.php?phpLang=ja#tiger-gtk">9.10 
        	Tiger (OS 10.4) にアップデート後、GTK アプリを使うと必ず
        	<code>_EVP_idea_cbc</code> に関連したエラーが出ます。
        </a></li><li><a href="usage-packages.php?phpLang=ja#yelp">9.11 どの GNOME アプリケーションでも、ヘルプ機能が使えません。</a></li></ul></li></ul>
<!--Generated from $Fink: faq.ja.xml,v 1.48 2020/04/05 5:48:20 nieder Exp $-->
<?php include_once "../footer.inc"; ?>


