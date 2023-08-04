<?php
$title = "F.A.Q. - 使用法 (1)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="usage-packages.php?phpLang=ja" title="パッケージ使用上の問題 - 特定のパッケージ"><link rel="prev" href="comp-packages.php?phpLang=ja" title="コンパイルの問題 - 特定のバージョン">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 8. パッケージ使用上の問題 - 一般</h1>
    


<a name="xlocale">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.1: このようなメッセージが大量に出ます。
"locale not supported by C library"
これはまずいことですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> まずいことという訳ではありません。
これはデフォルトの英語メッセージや日付フォーマットなどを使うという意味です。
これ以外はプログラムは普通に動作します。
X11 のドキュメントに、 <a href="/doc/x11/trouble.php#locale">詳細</a> があります。</p></div>
</a>
<a name="passwd">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.2: いきなり変なユーザーがシステムに現れました。
ユーザー名は、 "mysql", "pgsql", "games" などです。
こいつらはどこから来たのですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fink を使って passwd というパッケージをインストールしたのでしょう。
passwd は、セキュリティー上の問題からいくつかのユーザーを追加します。
Unix システムでは、ファイルやプロセスの "所有者" を使ってパーミッションやセキュリティーをチューニングするのです。
Apache や MySQL のようなプログラムは、"所有者" が必要で、これらの daemon に root を割り当てると安全ではなくなります。
(Apache に、システム上の全てのファイルへいきなり書き込み権限が与えられたと思ってみてください)
このため、 passwd パッケージはユーザーを必要とするパッケージにユーザーを追加するのです。</p><p>急にユーザーが "システム環境設定: ユーザー" ペイン (10.2.x) あるいは
"システム環境設定: アカウント" ペイン (10.3.x) 
に現れるのは不安ですが、削除したい気持ちを押えてください。</p><ul>
<li>第一に、あなたはユーザーを利用するパッケージをインストールする選択をしたのです。
ユーザーを削除したら意味がありませんよね?</li>
<li>実際、 Mac OS X には既にユーザーが追加されていますが、気づいていないのです。
www, daemon, nobody などがそうです。
これらのユーザーは、ある種のサービスを行なう Unix 流のやり方なのです。
passwd パッケージは、 Apple が提供していないユーザーを追加するだけです。
Apple がインストールしたユーザーは、 NetInfo マネージャ.app で見ることができます:
<code>niutil -list . /users</code>
</li>
<li>このユーザーを削除することにした場合、十分気をつけてください。
"システム環境設定: ユーザー" ペイン (10.2.x) あるいは
"システム環境設定: アカウント" ペイン (10.3.x) 
から追加したユーザーのファイルには、適当な管理者権限が割り振られます。
管理者アカウントのパーミッションが混乱するという報告があります。
これはシステム環境設定のバグで、 Apple には報告されています。
安全にユーザーを削除するには、 NetInfo マネージャ.app を使うか、ターミナルから <code>niutil</code> コマンドを入力します。
NetInfo の詳細については、 <code>niutil</code> の man ページを読んでください。
</li>
</ul><p>passwd パッケージのインストール中に、Fink がユーザーを追加するか<b>尋ねます</b>ので、実際はいきなりではないはずです。</p></div>
</a>
<a name="compile-myself">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.3: Fink でインストールしたソフトウェアを使って、自分で何かをコンパイルするにはどうしたらいいのですか?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
	  Fink 以外でなにかをコンパイルしようとする場合、
	  コンパイラとリンカに、Fink がインストールしたライブラリやヘッダがどこにあるのかを伝える必要があります。
	  また、コンパイラにターゲットのアーキテクチャーを使うよう伝える必要もあります。
	  標準的な configure/make を使用するパッケージの場合、
	  以下の環境変数を設定する必要があります:
	</p><p>-bash-</p><pre>export CFLAGS=-I/sw/include 
export LDFLAGS=-L/sw/lib 
export CXXFLAGS=$CFLAGS 
export CPPFLAGS=$CXXFLAGS 
export ACLOCAL_FLAGS="-I /sw/share/aclocal"
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"
export PATH=/sw/var/lib/fink/path-prefix-clang:$PATH
export MACOSX_DEPLOYMENT_TARGET=10.9</pre><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
setenv LDFLAGS -L/sw/lib 
setenv CXXFLAGS $CFLAGS 
setenv CPPFLAGS $CXXFLAGS 
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal"
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"
setenv PATH /sw/var/lib/fink/path-prefix-clang:$PATH
setenv MACOSX_DEPLOYMENT_TARGET 10.9</pre><p>(実行 OS が 10.9 以降の場合)</p><p>
	  これを起動ファイル (e.g. <code>.cshrc</code> | <code>.profile</code>) に入れておくと、自動的に設定され、最も簡単です。
	  これらの環境設定を使用しないパッケージの場合、コンパイル行に
	  "-I/sw/include" (ヘッダファイル) と "-L/sw/lib" (ライブラリ) を追加する必要があるでしょう。
	  パッケージによっては、同様だが非標準な EXTRA_CFLAGS or --with-qt-dir= などのオプションを使っているかもしれません。
	  "./configure --help" をすることで、こうした configure オプションを知ることができます。
	</p><p>
	  また、ライブラリパッケージなどは、
	  対応する開発ヘッダ (e.g. <b>foo-1.0-1-dev</b>) をインストールする必要があるかもしれません。
	</p></div>
</a>
<a name="apple-x11-applications-menu">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.4: Apple X11 の Application メニューを使うと、 Fink からインストールしたアプリケーションの起動できません。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Apple X11 は Fink の環境設定を認識しません。
このため、Applications メニューも PATH を認識せず、 Fink アプリケーションを探すことができません。
解決するには、 Fink からインストールしたアプリケーションに:
</p><pre>source /sw/bin/init.sh ; </pre><p>と追加します。例えば、 Fink からインストールした GIMP の場合、 GIMP の Command 欄に:</p><pre>source /sw/bin/init.sh ; gimp</pre><p>と入力します。</p><p>あるいは、 .xinitrc ファイル (自分のディレクトリ内の) の一行目に:</p><pre>source /sw/bin/init.sh</pre><p>と追加します。</p></div>
</a>
<a name="x-options">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.5: X11 の種類が多くて迷っています。
	Apple X11, XFree86 などなど、どれをインストールしたら良いのですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
	いずれも (XFree86 のコードをベースとした) XFree86 の派生ですが、細かな違いがあります。
	Jaguar と Panther では選択肢も変わります。
	</p><p>Panther では:</p><ul>
		<li>
		<p>
		Apple X11 (3枚目のディスク):
		X11 関連のプログラムをコンパイルや Fink でソースインストールする場合、 
		X11SDK (XCode ディスク) も忘れずにインストールする
		</p>
		</li>
		<li>
		<p>4.4.x built via Fink: 
		<code>xfree86</code> と
		<code>xfree86-shlibs</code> のパッケージをインストールする
		</p>
		</li>
		<li>
			<p> X.org built via Fink: <code>xorg</code> と
			<code>xorg-shlibs</code> のパッケージをインストールする
			</p>
		</li>
	</ul><p>Jaguar では、一番使われていて Fink パッケージが使えるのは:</p><ul>
		<li>
		<p>Fink でビルドする 4.2.x: <code>xfree86-base</code> と 
		<code>xfree86-rootless</code> または <code>xfree86-base-threaded</code> 
		と <code>xfree86-rootless-threaded</code> (および、それぞれの <code>-shlibs</code>) をインストール
		</p>
		</li>
		<li>
		<p>Fink でビルドする 4.3.x: <code>xfree86</code> と <code>xfree86-shlibs</code> 
		パッケージをインストール
		</p>
		</li>
		<li>
		<p>
		Apple の 4.2.x (User+SDK パッケージがインストールされている場合): 
		<code>system-xfree86</code> パッケージが自動的にインストールされる。
		ユーザーはインストールを行わない
		(注記: Jaguar 用の Apple X11 Public Beta は既に入手不可能です。
		この方法は以前入手した人のみに有効です。)
		</p>
		</li>
	</ul><p>
	これ以外の選択は、 <a href="/doc/x11/index.php">Running X11 document</a> を参照してください。
	</p></div>
</a>
<a name="no-display">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.6: アプリケーションを実行しようとすると、
"cannot open display:"
というメッセージがでます。
どうしたら良いですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> このエラーは、システムが X ディスプレイと通信できていないことを意味します。
以下を確認してください:</p><p>1. X (Apple's X11, XFree86, ...) を起動。</p><p>2. DISPLAY 環境変数が設定されていることを確認する。デフォルトに設定された X では、 tcsh では:
</p><pre>setenv DISPLAY :0</pre><p>bash の場合:</p><pre>export DISPLAY=:0</pre><p>と入力します。</p></div>
</a>
<a name="suggest-package">
<div class="question"><p><b><?php echo FINK_Q ; ?>8.7: 自分の好きなプログラムが Fink にありません。
Fink に推薦したいのですが、どうしたら良いですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package Request Tracker</a>
の Fink プロジェクトページから推薦してください。</p><p>注記: SourceFourge の ID が必要です。</p></div>
</a>
<a name="virtpackage">
    
<div class="question"><p><b><?php echo FINK_Q ; ?>8.8: 
	  <code>system-*</code> "virtual packages" というのを時々見かけますが、
	  インストールも削除もできません。
	  これはいったいなんですか?
	</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
	  <code>system-perl</code> のような名前のパッケージは代替パッケージです。
	  これは、実際にはファイル等を含んでいる訳ではなく、
	  fink 外で手動でインストールされたプログラムを fink に伝えるための仕組みとして存在します。
	</p><p>
	  この仕組みは10.3 ディストリビューションから導入されました。
	  ほとんどの代替パッケージは自分でインストールや削除できるものではありません。
	  その代わりに、手動でインストールされたプログラム一覧を元に fink プログラム自体が作成する
	  "Virtual Packages" パッケージデータ構造となっています。
	  fink は、それぞれのパッケージについて特定の場所の特定のファイルを確認し、
	  見つかった場合はバーチャルパッケージがインストール済みと判断します。
	</p><p>
	  fink が認識しているインストール済みの一覧は、
	  <code>fink-virtual-pkgs</code> を実行することで見ることができます。
	  <code>--debug</code> フラグを追加すると、具体的にどのファイルを見ているのかという診断情報も確認できます。
	</p><p>
	  任意のプログラムを (fink 外で) インストールし、 fink にこれを認識させる仕組みは残念ながらありません。
	  configure やコンパイルフラグ、パス名などを確認するのは非常に困難なためです。
	</p><p>
	  以下は、 fink が定義するバーチャルパッケージのうち最も重要なものです (fink-0.19.2 時点) :
	</p><ul>
	  <li>system-perl: [virtual package representing perl]
	    <p>
		  これの実体は <code>/usr/bin/perl</code> で、デフォルトの OS X インストールの一部になっています。
		  このパッケージは、 perl インタープリータのバージョン X.X.X である
		  <code>system-perlXXX</code> と <code>perlXXX-core</code> も提供します。
	    </p>
	  </li>
	  <li>system-javaXXX: [virtual package representing Java X.X.X]
	    <p>
		  これの実体は Java Runtime Environment で、 OS X (および Apple Software Update) の一部です。
		  詳細は、 <a href="http://www.apple.co.jp/java">Apple の Java のページ</a> をご覧ください。
	    </p>
	  </li>
	  <li>system-javaXXX-dev: [virtual package representing Java X.X.X development headers]
	    <p>
		  これの実体は Java SDK で、 <a href="http://connect.apple.com">connect.apple.com</a>
		  (登録が必要) からダウンロードし、インストールする必要があります。
		  Java Runtime Environment を更新した場合、 SDK は自動的に更新されません (削除されることもあります!) 。
		  Runtime Environment をインストールや更新した場合、 SDK を確認 (し、必要に応じてダウンロード、インストール)
		  してください。
		  <a href="comp-general.php?phpLang=ja#system-java">この FAQ</a> も合わせてお読みください。
	    </p>
	  </li>
	  <li>system-java3d: [virtual package representing Java3D]</li>
	  <li>system-javaai: [virtual package representing Java Advanced Imaging]
	    <p>
		  これの実体は、 Java の 3D 画像処理の機能拡張です。
		  Apple からダウンロードし、インストールします。
		  <a href="http://docs.info.apple.com/article.html?artnum=120289">Apple のページ</a>
		  をお読みください。
	    </p>
	  </li>
	  <li>system-xfree86: [placeholder for user installed x11]</li>
	  <li>system-xfree86-shlibs: [placeholder for user installed x11 shared libraries]
	    <p>
		  これの実体は Apple X11/XDarwin で、  OS X のオプション (X11User.pkg) です。
		  二つのパッケージは、それぞれ <code>x11</code> と <code>x11-shlibs</code>
		  になります。
		  <a href="comp-packages.php?phpLang=ja#cant-install-xfree">この FAQ</a> も合わせてお読みください。
	    </p>
	  </li>
	  <li>system-xfree86-dev [placeholder for user installed x11 development tools]
	    <p>
		  これの実体は Apple X11/XDarwin SDK で、  OS X のオプション (X11SDK.pkg) です。
		  <a href="comp-packages.php?phpLang=ja#cant-install-xfree">この FAQ</a> も合わせてお読みください。
	    </p>
	  </li>
	</ul></div>
</a>
<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-packages.php?phpLang=ja">9. パッケージ使用上の問題 - 特定のパッケージ</a></p>
<?php include_once "../footer.inc"; ?>


