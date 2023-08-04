<?php
$title = "F.A.Q. - コンパイル (1)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="comp-packages.php?phpLang=ja" title="コンパイルの問題 - 特定のバージョン"><link rel="prev" href="usage-fink.php?phpLang=ja" title="Fink のインストール、使用、メンテナンス">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 6. コンパイルの問題 - 一般</h1>
    


<a name="compiler">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.1: configure スクリプトが "acceptable cc" が見つからないといってきます。
これは何ですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> ドキュメンテーションを読んでください。
パッケージをソースからコンパイルするには、 Developer Tools が必要です。
これには、 C コンパイラ <code>cc</code> など必要なものが入っています。
</p></div>
</a>
<a name="cvs">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.2: "fink selfupdate-cvs" をしようとしたら、このメッセージが出てきました: "cvs: Command not found."
</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Developer Tools をインストールする必要があります。</p></div>
</a>
<a name="missing-make">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.3: <code>make</code> に関連したエラーがでました。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> もしメッセージが以下のようであれば</p><pre>make: command not found</pre><p>あるいは</p><pre>Can't exec "make": No such file or directory at /sw/lib/perl5/Fink/Services.pm line 190.</pre><p>Developer Tools をインストールする必要があります。</p><p>もしメッセージが以下のようであれば</p><pre>make: illegal option -- C</pre><p>
Developer Tools に入っていた GNU 版の <code>make</code> ユーティリティーを、 BSD 版の make に換えてしまったようです。
パッケージの中には GNU 版の make でのみサポートされている特殊機能に依存しているものも多いので、 
<code>/usr/bin/make</code> が <code>gnumake</code> のシンボリックリンクであることを確認してください。
<code>bsdmake</code> ではありません。
さらに、 <code>/usr/local/bin/</code> に他の <code>make</code> がないことも確認してください。
</p></div>
</a>
<a name="head">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.4: head コマンドから変な使用方法メッセージが出ています。何がおかしいのですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> もしこれでしたら:</p><pre>Unknown option: 1
Usage: head [-options] &lt;url&gt;...</pre><p>(後にオプションの説明リストが続く)
<code>head</code> が壊れています。
これは Perl libwww ライブラリを HFS+ システムボリュームにインストールすると起こります。
この時 <code>/usr/bin/HEAD</code> をインストールしようとするのですが、このファイルシステムは大文字と小文字を区別しないので、 <code>head</code> を上書きしてしまいます。
<code>head</code> の方はシェルスクリプトや Makefile で良く使われる標準的なコマンドです。
Fink を使うには、オリジナルの方の <code>head</code> に戻す必要があります。</p><p>ソースリリースのブートストラップスクリプトは、現在はこれを確認しますが、最初のインストールにバイナリリリースを使う場合、あるいは Fink をインストールした後で libwww をインストールする場合、まだこの問題に当たります。</p><p>この問題は、 <code>/sw/bin/HEAD</code> をインストールした場合も起こることが報告されています (Fink のパッケージではありません)。
これは簡単に解決できます: rename <code>/sw/bin/HEAD</code> </p></div>
</a>
<a name="also_in">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.5: あるパッケージをインストールしようとすると、他のパッケージのファイルを上書きしようとしているというエラーメッセージが出ました。
</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> これはスプリットオフパッケージ (-dev, -shlibs などがついてるもの) において、ファイルが移動する時 (<code>foo</code> から <code>foo-shlibs</code> など) に発生することがあります。
両者は実質同じものなので、インストールしようとしているパッケージから上書きしてしまっても良いでしょう:
</p><pre>sudo dpkg -i --force-overwrite <b>filename</b>
</pre><p>ここで <b>filename</b> はインストールしようとしているパッケージ用の .deb ファイルです。</p></div>
</a>

<a name="mv-failed">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.6: パッケージをインストールしようとした時の "execution of mv failed, exit code 1" とはどういう意味ですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> StuffIt Pro がインストールされている場合、 "Archive Via Real Name" モードが設定されていると思われます。
システム環境設定の StuffIt 設定で "ArchiveViaRealName" を無効化してください。
これはいくつかの重要なシステムコールのバ再実装のバグで、この件のような不思議なエラーをたくさん出します。</p><p>この問題でない場合、 <code>mv</code> のエラーは通常、ビルドの前の方で発生した別のエラーを意味しています。
エラーは発生したもののビルドは続行したものです。
問題のあったファイルを追跡するには、ビルドの出力中の存在しないファイルを探します。
例えば:</p><pre>mv /sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib \
/sw/src/root-foo-shlibs-0.1.2-3/sw/lib/
mv: cannot stat `/sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib':
No such file or directory
### execution of mv failed, exit code 1
Failed: installing foo-0.1.2-3 failed</pre><p>この場合、 <code>libbar</code> ファイルをビルド出力の前の方で探します。</p></div>
</a>
<a name="node-exists">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.7: '"node" already exists' というエラーメッセージが出て、インストール | アップデートができません。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> このようなエラーが出ます:</p><pre>Failed: Internal error: node for system-xfree86 already exists</pre><p>パッケージ info ファイルが変更されて依存性エンジンが混乱しているために出た問題です。
修正するには:</p><ul>
<li>
<p>問題のあるパッケージを強制削除する。上の例の場合は:</p>
<pre>sudo dpkg -r --force-all system-xfree86</pre>
</li>
<li>
<p>再びインストール | アップグレードする。
途中、削除したパッケージの "virtual dependency" のプロンプトが出てくるので、これを選択する。
こうするとビルド中に再インストールされる。</p>
</li>
</ul></div>
</a>
<a name="usr-local-libs">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.8: /usr/local にインストールされているライブラリやヘッダが 
	Fink のビルドの問題を起こすことがあると聞いたけど、本当ですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> そういう場合もよくあります。
これは、パッケージの configure スクリプトは Fink のパスより先に <code>/usr/local</code> 
の中のライブラリとヘッダを検索するからです。
もし問題が発生して、他の FAQ で解決ができそうになければ、 
<code>/usr/local/lib</code> のライブラリと <code>/usr/local/include</code>
のヘッダを確認してください。
これが原因そうであれば、 <code>/usr/local</code> の名前を一時的に変えてください。
例えば:</p><pre>sudo mv /usr/local /usr/local.moved</pre><p>ビルド後、 <code>/usr/local</code> を元に戻しください:</p><pre>sudo mv /usr/local.moved /usr/local</pre><p>Starting with macOS 10.14, it's sometimes not possible to rename <code>/usr/local</code>. If you get an error when renaming <code>/usr/local</code> directly, then rename the subdirectories inside it instead:</p><pre>
sudo mv /usr/local/include /usr/local/include.moved
sudo mv /usr/local/lib /usr/local/lib.moved
</pre><p>do your build, and then you can put <code>/usr/local/include</code> and <code>/usr/local/lib</code>
back:</p><pre>
sudo mv /usr/local/include.moved /usr/local/include
sudo mv /usr/local/lib.moved /usr/local/lib
</pre></div>
</a>
<a name="toc-out-of-date">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.9: パッケージをビルドしようとしたら、 "table of contents" が古いというメッセージが出ました。何をしたらいいですか?
</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> このメッセージは重要なヒントです。
メッセージはこのようなものだと思われます:</p><pre>ld: table of contents for archive: /sw/lib/libintl.a is out of date; 
rerun ranlib(1) (can't load from it)</pre><p>この問題を起こしているライブラリに (root で) ranlib を実行する必要があります。
例えば、この例では:</p><pre>sudo ranlib /sw/lib/libintl.a</pre></div>
</a>
<a name="fc-atlas">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.10: atlas をインストールしようとすると、 Fink Commander がハングアップします。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> <code>atlas</code> のビルド中にユーザーにプロンプトを送るステップがあり Fink Commander がこれを表示しないからです。
代わりに <code>fink install atlas</code> とする必要があります。</p></div>
</a>
<a name="basic-headers">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.11: <code>stddef.h</code> | <code>wchar.h</code> | <code>stdlib.h</code> | <code>crt1.o</code> が見つからない、
あるいは、"C compiler cannot create executables" というメッセージが出ます。
これはどこにありますか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> これらの問題は、いずれも Developer Tools の DevSDK によって提供されるヘッダファイルがないためです。
<code>/Library/Receipts/DevSDK.pkg</code> がシステムにあるか確認し、なければ  Dev Tools インストーラを起動してカスタムインストールを選択、 DevSDK パッケージをインストールして下さい。</p><p>"cannot create executables" エラーは、Developer Tools のバージョンが 以前のバージョンの OS 用である場合にも発生します。</p></div>
</a>
<a name="multiple-dependencies">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.12: Fink が "unable to resolve version conflict on multiple dependencies" と言って、アップデートできません。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> この問題を解決するには、パッケージを一つだけアップデートしてみてください。
次に、再度 "fink update-all" を試してみてください。
まだ問題が出るようなら、これを繰り返してください。
</p></div>
</a>
<a name="dpkg-parse-error">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.13: "dpkg: parse error, in file `/sw/var/lib/dpkg/status'"
というメッセージが出て、何もインストールできません!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
	  これは、クラッシュや回復不可能なエラーなど、何らかの理由で dpkg データベースが壊れたことを意味します。
	  多くの場合、buildlock 中に発生するので、例えば:
	</p><pre>package `fink-buildlock-foo-1.2.3-4':  missing version</pre><p>
	  (もちろん、<code>foo-1.2.3-4</code> はあなたが見ようとしているパッケージ名)
	</p><p>
	  この問題が発生した場合、superuser で <code>/sw/var/lib/dpkg/status</code> を編集します。
	  エラーメッセージにある行の近くにいきます。
	  <code>fink-buildlock-foo-1.2.3-4</code> で、 <code>Status</code> フィールドが、
	</p><pre>install ok installed</pre><p>となっていますが、これを</p><pre>purge ok not-installed</pre><p>
	  と書き換えます。
	</p><p>
	  また、これとは異なり、ファイル中にゴミがある場合があります。
	  この場合は、旧バージョンのデータベースをコピーします:
	</p><pre>sudo cp /sw/var/lib/dpkg/status-old /sw/var/lib/dpkg/status</pre><p>
	  問題が起きる前にインストールしていたパッケージをいくつか再インストールする必要があるかもしれません。
	</p></div>
</a>
<a name="freetype-problems"> 
<div class="question"><p><b><?php echo FINK_Q ; ?>6.14: freetype に関係したエラーが出ます。</b></p></div> 
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> freetype に関係したエラーにはいくつかありますが、以下のものであれば:</p><pre>/usr/bin/ld: can't locate file for: -lfreetype</pre><p>外来の <code>freetype-config</code> があるかどうか、以下のコマンドを実行して確認します。</p><pre>where freetype-config</pre><p>(<code>tcsh</code> の場合)</p><pre>type -a freetype-config</pre><p>(<code>bash</code> の場合)。 Mono フレームワークは、 <code>/usr/bin/freetype-config</code> をインストールし、フレームワーク内へのシンボリックリンクを作ることが知られています。</p><p>もしこのようなものであれば:</p><pre>/sw/include/pango-1.0/pango/pangoft2.h:52: error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:57: error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:61: error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:86: error: parse error before "pango_ft2_font_get_face"
/sw/include/pango-1.0/pango/pangoft2.h:86: warning: data definition has no type or storage class 
make[2]: *** [rsvg-gz.lo] Error 1 
make[1]: *** [all-recursive] Error 1 
make: *** [all-recursive-am] Error 2 
### execution of make failed, exit code 2 
Failed: compiling librsvg2-2.4.0-3 failed</pre><p>あるいは</p><pre>In file included from vteft2.c:32: 
vteglyph.h:64: error: parse error before "FT_Library"
vteglyph.h:64: warning: no semicolon at end of struct or union 
vteft2.c: In function `_vte_ft2_get_text_width': 
vteft2.c:236: error: dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_get_text_height': 
vteft2.c:244: error: dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_get_text_ascent': 
vteft2.c:252: error: dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_draw_text': 
vteft2.c:294: error: dereferencing pointer to incomplete type 
vteft2.c:295: error: dereferencing pointer to incomplete type 
make[2]: *** [vteft2.lo] Error 1 
make[1]: *** [all-recursive] Error 1 
make: *** [all] Error 2 
### execution of make failed, exit code 2 
Failed: compiling vte-0.11.10-3 failed</pre><p>あるいは</p><pre>checking for freetype-config... /usr/X11R6/bin/freetype-config 
checking For sufficiently new FreeType (at least 2.0.1)... no 
configure: error: pangoxft Pango backend found but did not find freetype libraries 
make: *** No targets specified and no makefile found.  Stop. 
### execution of LD_TWOLEVEL_NAMESPACE=1 failed, exit code 2 
Failed: compiling gtk+2-2.2.4-2 failed</pre><p>問題は X11 | XFree86 に含まれている、 <code>freetype</code> | <code>freetype-hinting</code> パッケージ間のヘッダを混同していることだと思われます。</p><pre>fink remove freetype freetype-hinting</pre><p>で、両方のインストールを削除します。
もし問題が上記のようではなく、以下のようであれば:</p><pre>ld: Undefined symbols: 
_FT_Access_Frame </pre><p>おそらく X11 インストールの残りファイルが原因です。
X11 SDK を再インストールしてみて下さい。</p></div> 
</a> 
<a name="dlfcn-from-oo"> 
<div class="question"><p><b><?php echo FINK_Q ; ?>6.15: `Dl_info' のエラーが出ます。</b></p></div> 
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> エラーが下記のようであれば:</p><pre>unix_dl.c: In function `rep_open_dl_library': 
unix_dl.c:328: warning: assignment discards qualifiers from pointer target type 
unix_dl.c: In function `rep_find_c_symbol': 
unix_dl.c:466: error: `Dl_info' undeclared (first use in this function) 
unix_dl.c:466: error: (Each undeclared identifier is reported only once 
unix_dl.c:466: error: for each function it appears in.) 
unix_dl.c:466: error: parse error before "info"
unix_dl.c:467: error: `info' undeclared (first use in this function) 
make[1]: *** [unix_dl.lo] Error 1</pre><p>おそらくヘッダファイル <code>/usr/local/include/dlfcn.h</code> が Panther と非互換だと思われます。
迷うことなく削除して下さい。</p><p>このファイルは通常、 Open Office によってインストールされるようです。
この後、次のヘッダファイルとライブラリ
<code>/usr/local/lib/libdl.dylib</code> を Panther に付随するファイルへのシンボリックリンクに変更します。</p><pre>sudo ln -s /usr/include/dlfcn.h /usr/local/include/dlfcn.h 
sudo ln -s /usr/lib/libdl.dylib /usr/local/lib/libdl.dylib</pre></div> 
</a>
<a name="gcc2"> 
    
<div class="question"><p><b><?php echo FINK_Q ; ?>6.16: Fink が <code>gcc2</code> がないと言っていますが、インストールも出来ないようです。</b></p></div> 
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
<code>gcc2</code> は gcc-2.95 のバーチャルパッケージです。
gcc2.95 を XCode Tools (古い OS バージョンは Developer Tools に gcc-2.95 が含まれていました) からインストールして下さい。</p><p><b>注記:</b> gcc2.95 and/or gcc3.1 は gcc3.3 とコンフリクトしません。両方インストールすることもできます。</p></div>
</a>
<a name="system-java">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.17: Fink が <code>Failed: Can't resolve dependency "system-java14-dev"</code>
と言っていますが、そのようなパッケージはありません。
</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
バーチャルパッケージだからです。
このエラーは、 Java が Software Update によって更新された場合に発生します。
更新時にヘッダファイルが削除され、 -dev パッケージが作成されなくなるためです。
</p><p>
<a href="http://connect.apple.com">Apple</a> から、適切な <code>Java Developer Tools</code> パッケージをダウンロードする必要があります。
この問題の場合は、 <code>Java 1.4.2 Developer Tools</code> です。
</p></div>
</a>
<a name="dpkg-split">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.18: 
何をインストールしようとしても、
<q>dpkg (subprocess): failed to exec dpkg-split to see if it's part of a multiparter: No such file or directory</q>
というエラーが出ます。
どうしたらいいですか?
</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
通常、環境変数を正しく設定することで直ります。
参照: <a href="usage-fink.php?phpLang=ja#fink-not-found">この FAQ 項目</a>
</p></div>
</a>
<a name="xml-parser">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.19: 
	次のメッセージが出ます:<q>configure: error: XML::Parser perl module is required for intltool</q>。
	どうしたら良いでしょうか?
	</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
	自分のシステムにある Perl に合った、正しいバージョンの xml-parser-pm が必要です。
	例えば、 Panther では <code>xml-parser-pm581</code> が正しく、 <code>xml-parser-pm560</code> 
	ではありません
	( <code>xml-parser-pm</code> 代替パッケージでも可)。
	システムにあるのが、 <code>Perl-5.8.1</code> であり、 <code>Perl-5.6.0</code> ではないためです。
	Jaguar でデフォルトのシステム Perl バージョンを使っている場合、 <code>pm560</code> で、
	<code>Perl 5.8.0</code> をインストールしている場合は <code>pm580</code> でも構いません。
	</p></div>
</a>
<a name="master-problems">
<div class="question"><p><b><?php echo FINK_Q ; ?>6.20: 
		パッケージをダウンロードしようとすると、 Fink が変なサイトに行こうとするけれど、 <q>distfiles</q>
		と書いてあるだけで、しかもそのファイルはそこに存在しません。
	</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
		これは、 Fink が <q>マスター</q> と呼ばれるものを使おうとしたために発生しています。
		上流サイトが移動しても Fink パッケージのソースが入手できるための仕組みです。
		この問題は、新しい上流バージョンのパッケージがリリースされたが、
		まだ Master ミラーに反映されていない場合によくおこります。
	</p><p>これを直すには、 <code>fink configure</code> を実行し、マスターミラーを最後に検索するように設定を変更します。</p></div>
</a>
<a name="compile-options">
	<div class="question"><p><b><?php echo FINK_Q ; ?>6.21: パッケージをビルドするときに、 Fink に違うオプションを使わせたい。</b></p></div>
	<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
			まず最初に、バリエーションを作成するようにパッケージメンテナに伝えてみてください。
			これが比較的簡単な方法です。
			メンテナから反応がなかったり、新しいバージョンが出てしまったり、自分で違うオプションを試してみたい場合、
			<a href="/doc/quick-start-pkg/index.php">Packaging Tutorial</a> 
			と <a href="/doc/packaging/index.php">Packaging Manual</a> をお読みください。
		</p><p><b>注記:</b>Fink は、ビルドされたマシンに依存しないよう、全ての公式パッケージにはG5 最適化などのことはされません。このようなことをしたい場合、各自でする必要があります。</p></div>
</a>

    <a name="alternates">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.22: 
	  ソースからビルドしようとすると必ず、同じライブラリの二つのバージョンをいったりきたりします。
	</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
	 非常に複雑なビルドツリーでは、いくつかのパッケージがライブラリの特定バージョンに依存しており、
	 他のパッケージが他のバージョンに依存していることがあります (例 <code>db47</code> vs. <code>db44</code>)。
	 結果、Fink は更新しようとしているパッケージの依存性を満たすためにインストールされていない方をインストールしようとします。
	</p><p>Unfortunately, due to limitations in the build-dependency engine, you
      may wind up with the dreaded
         残念ながら、ビルド依存エンジンの限界により、恐怖の
       </p><pre>Fink::SysState: Could not resolve inconsistent dependencies</pre><p>
        というメッセージを、十分複雑な <code>update-all</code> をした場合に見ることができます。
	これは通常、以下のコマンドで直ります:
      </p><pre>
fink scanpackages
sudo apt-get update
sudo apt-get install foo=1.23-4	
      </pre><p>
        しかし、十分複雑な更新の場合には聞きません。
	いくつかのパッケージを一つ一つ更新してみてください。
      </p></div>
    </a>

    <a name="python-mods">
      <div class="question"><p><b><?php echo FINK_Q ; ?>6.23: Python モジュールをビルドする際に、<code>MACOSX_DEPLOYMENT_TARGET </code> の問題が出ます。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 以下のようであれば:</p><pre>running build
running build_ext
Traceback (most recent call last):
  File "setup_socket_ssl.py", line 21, in ?
    depends = ['socketmodule.h'] )
  File "/sw/src/root-python24-2.4.1-1/sw/lib/python2.4/distutils/core.py", line 166, in setup
SystemExit: error: $MACOSX_DEPLOYMENT_TARGET mismatch: now "10.4" but "10.3" during configure
### execution of /sw/bin/python2.4 failed, exit code 1</pre><p>
        	<code>python2*</code> パッケージは、ビルド時に <code>MACOSX_DEPLOYMENT_TARGET</code> 
        	をある設定ファイルに書き、Python ビルドユーティリティはモジュールをコンパイルする際に
        	この値を使っています。
        	これは、10.3 上でビルドした <code>python24</code> を 10.4 上で使う場合、
        	つまり 10.3 =&gt; 10.4 とアップグレードしたり、 <b>10.4-transitional</b> 
        	バイナリディストリビューションを使ってビルドせずに更新した場合、
        	Python は、実際は 10.4 のところ <code>MACOSX_DEPLOYMENT_TARGET</code> の
        	値が 10.3 だと思い込むミスマッチが発生します。
        </p><p>
          上記の問題の場合であれば、<code>fink rebuild python24</code> を実行し、
          <code>python</code> パッケージを更新すれば修正されます。
        </p></div>
    </a>
<a name="libtool-unrecognized-dynamic">
  <div class="question"><p><b><?php echo FINK_Q ; ?>6.24: 
      <q>unrecognized option `-dynamic'</q> というエラーが <code>libtool</code> から出たとです。
    </b></p></div>
  <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> このエラー:</p><pre> libtool: unrecognized option `-dynamic'</pre><p>
      は、Apple の <code>/usr/bin/libtool</code> を GNU の <code>libtool</code> に変えてしまったことを意味します。
      残念ながら、この二つの <code>libtools</code> は、同じことを<b>してくれません</b>。
    </p><p>
      これを直す唯一の方法は、ちゃんとした Apple <code>libtool</code> をどこから手に入れることです。
      これは、 XCode Tools の <code>DeveloperTools.pkg</code> パッケージの一部で、
      <code>/Library/Receipts</code> のレシートを削除した後、再インストールすることができます。
      (10.4以降ならゴミ箱へ、10.3なら<code>sudo rm -rf /Library/Receipts/DeveloperTools.pkg</code>してください)
    </p></div>
</a>
<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="comp-packages.php?phpLang=ja">7. コンパイルの問題 - 特定のバージョン</a></p>
<?php include_once "../footer.inc"; ?>


