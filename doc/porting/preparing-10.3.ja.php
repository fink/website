<?
$title = "移植 - 10.3 に向けて";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2005/03/16 18:01:45';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="移植 Contents"><link rel="prev" href="preparing-10.2.php?phpLang=ja" title="10.2 に向けて">';


include_once "header.ja.inc";
?>
<h1>移植 - 5. 10.3 に向けて</h1>



<h2><a name="perl">5.1 Perl</a></h2>

  <p>
    OS X 10.2 では， <code>/usr/bin/perl</code> は perl 5.6.0 であり， architecture 文字列は "darwin" でした．
  	OS X 10.3 では， <code>/usr/bin/perl</code> は perl 5.8.1 にアップグレードされ， architecture 文字列が "darwin-thread-multi-2level" に変更されました．
  	この変更は， それぞれの perl 実行ファイルはモジュールを探す場所を知っているので，パッケージ作成時に perl 実行ファイルを使用する分には<b>おそらく</b>影響がないでしょう．
  	perl モジュール ("-pm") パッケージのメンテナは，<a href="http://fink.sourceforge.net/packaging/policy.php#perlmods">Perl
    モジュールのパッケージ化ポリシー</a>に従い，<code>CompileScript</code> と <code>InstallScript</code>
    が適切に作成されるようにしてください。
  </p>



<h2><a name="typedef">5.2 新しいシンボル定義</a></h2>

  <p>
    Mac OS X 10.3 より，常に <code>socklen_t</code> タイプの完全な定義があります．
    この typpedef 定義を知るには，プログラムに以下を追加する必要があるかもしれません:
  </p>
  <pre>
#include &lt;sys/types.h&gt;
#include &lt;sys/socket.h&gt;
  </pre>



<h2><a name="system-libs">5.3 新しいシステムのライブラリ</a></h2>

  <p>
    Mac OS X 10.3 には，これまでのシステムでは提供していないために fink パッケージとして提供していたものがあります:
  </p>

  <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>libpoll</td><td>
	<p>
	  <code>/usr/lib/libpoll.dylib</code> と <code>/usr/include/poll.h</code> 
	  というファイルが含まれています．しかし，OS X によるライブラリは不完全です．
	  もしこれで十分であれば， Fink "libpoll" への依存性を削除することもできます．
	  ライブラリのコードは，実際は libSystem に統合されているため，自動的にリンクされます．
	  つまり， OS X のものを使用する際には <code>-lpoll</code> も不要となります．
	  OS X は <code>libpoll.dylib</code> も提供しているため， <code>-lpoll</code> をすると
	  Fink "libpoll" パッケージがインストールされているかいないかで結果が変わることには注意をしてください．
	</p>
      </td></tr><tr valign="top"><td>libdl</td><td>
	<p>
	  <code>/usr/lib/libdl.dylib</code> と <code>/usr/include/dlfcn.h</code>
	  というファイルが含まれています．このため，Fink の "dlcompat",
	  "dlcompat-dev", "dlcompat-shlibs" パッケージは不要となります．
	  ライブラリのコードは，実際は libSystem に統合されているため，自動的にリンクされます．
	  つまり， OS X のものを使用する際には <code>-ldl</code> も不要となります (あっても影響はありません)．
	</p>
      </td></tr><tr valign="top"><td>GNU getopt</td><td>
	<p>
	  このライブラリは， <code>getopt_long()</code> 関数を含めて， libSystem と
	  <code>/usr/include/getopt.h</code> に統合されました．
	  このため， Fink の"libgnugetopt" と "libgnugetopt-shlibs" 
	  を使用する必要はありません．
	  libSystem は自動的にリンクされ， <code>/usr/include</code> 
	  も自動的に検索されるため， Fink の "libgnugetopt" へアクセスするために手動で追加していた
	  <code>-lgnugetopt</code> と <code>-I/sw/include/gnugetopt</code> を削除することができます．
	</p>
      </td></tr></table>

  <p>
    OS X 10.3 へパッケージを投入する際には，これらのパッケージは将来的に削除されるので，上述の不要となった依存性を削除してください．
    このため，それぞれのツリー用に別々のパッケージ記述ファイルを用意する必要があります．
    <code>Revision</code> は通常通りあげる必要があります．
    この方法で，OS X 10.2 から 10.3 へアップグレードするユーザーは，10.2 用のパッケージより 10.3 用のパッケージの方が"より新しい"と認識することができます．
    低い方のツリーでの変更があるかもしれないので，<code>Revision</code> は 10 あげてください．
  </p>

  <p>
    10.3 へ統合されるパッケージをテストする際は， <code>BuildDepends</code> から削除したパッケージをアンインストールしてください．
    そうでないと Fink が提供するライブラリにリンクする可能性があります．
  </p>



<? include_once "../../footer.inc"; ?>


