<?
$title = "移植 - libtool";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2011/07/17 00:52:32';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="移植 Contents"><link rel="next" href="preparing-10.2.php?phpLang=ja" title="10.2 に向けて"><link rel="prev" href="shared.php?phpLang=ja" title="共有コード">';


include_once "header.ja.inc";
?>
<h1>移植 - 3. GNU libtool</h1>
    
    
    
      <p>
ライブラリをビルドする GNU パッケージは，ライブラリをビルド・インストールする際のプラットフォーム依存の手続きを隠すため GNU libtool を使います．
</p>
    
    <h2><a name="situation">3.1 状況</a></h2>
      
      <p>
粗く言って，４つの libtool の流派があります:
</p>
      <ul>
        <li>
          <p><b>libtool 1.3</b>:
最も一般的な流派．
この流派の最新のリリースは 1.3.5．
Darwin には非対応で，静的ライブラリのみをビルドする．
ソースツリーに<code>ltconfig</code> と <code>ltmain.sh</code> があることで判定できる．
</p>
        </li>
        <li>
          <p><b>libtool 1.4</b>:
長らく開発途中で，最近新しい安定版がリリースされた．
このブランチは改良された autoconf との統合がされている．
残念ながら， 1.3 からのパッケージの統合を難しくしている．
Darwin 1.3 / Mac OS X 10.0 に対応し，小さいパッチを当てることで Mac OS X 10.1 にも対応する．
<code>ltconfig</code> がないことで判定できる．
1.3b や 1.3d などのバージョンがついたものも， 1.4 の開発スナップショットであり，扱いには注意が必要である．
</p>
        </li>
        <li>
          <p><b>多言語版</b>:
MLB (multi-language-branch) ともいい，このバージョンは C++ や (gcj を通して) Java へのサポートを追加した平行開発ブランチである．
現在は主開発ブランチに統合されている．
最新版は Darwin 1.3 と Mac OS X 10.0 に対応している．
MLB は <code>ltcf-c.sh</code>, <code>ltcf-cxx.sh</code>, <code>ltcf-gcj.sh</code> などのファイルで判定できる．
</p>
        </li>
        <li>
          <p><b>現在の開発ブランチ</b>:
いずれ libtool 1.5 としてリリースされる開発バージョン．
1.4 と MLB を統合してできた．
C, C++, (gcj を通して) Java に対応．
残念ながら， 1.4 との違いは簡単にはわからない．
<code>ltmain.sh</code> の中のバージョン番号を確認する必要がある．
</p>
        </li>
      </ul>
      <p>
結論として，libtool 1.3.x とこれを使うパッケージ (libtool を使うパッケージの主流) は， Darwin で共有ライブラリをビルドするにはパッチが必要になります．
Apple は libtool 1.3.5 のパッチが当たったバージョンを Mac OS X に組み込んでいますが，ほとんどの場合うまく行きません．
Christoph Pfisterer がこのパッチを改良し，正しいパスのハードコーディングと完全なバージョニングを行うようになりました．
この変更は上流の libtool リリースと 1.4 で始まる開発バージョンに統合されました．
Fink チームのメンバーはこれからも改良を続け， libtool メンテナに送っていきます．
バージョン番号のスキームは全ての libtool バージョンで一致しています．
</p>
      <p>
注記:
全てのバージョンの libtool に関して，付属の libltdl ライブラリは dlcompat がインストールされている場合に限り Darwin 上で動作します．
10.3以降の OSX には付属されています．
これ以前のバージョンでは，"dlcompat" 関連のパッケージをインストールします．
</p>
    
    <h2><a name="patch-135">3.2 1.3.5 パッチ</a></h2>
      
      <p>
libtool 1.3.5 を自分でビルドする場合，
<a href="http://www.finkproject.org/files/libtool-1.3.5-darwin.patch">このパッチ</a> <b>[updated 2002-06-09]</b> 
をソースにあて，ltconfig と ltmain.sh というファイルを削除します．
(これらのファイルは，configure と make をすることで .in ファイルにより再生成されます．)
Fink パッケージの libtool 1.3.5 では自動的に行われます．
</p>
      <p>
ここまででやっと半分です - libtool を使うパッケージはそれぞれ独自の ltconfig と ltmain.sh を持っています．
共有ライブラリとしてビルドする全てのパッケージについて，これらのファイルを置き換える必要があります．
これは configure スクリプトを実行する前に行う必要があります．
両ファイルは以下から取得することができます:
<a href="http://www.finkproject.org/files/ltconfig">ltconfig</a> (98K) と
<a href="http://www.finkproject.org/files/ltmain.sh">ltmain.sh</a> (110K)
<b>[both updated 2002-06-09]</b>.</p>
    
    <h2><a name="fixing-14x">3.3 1.4.x を修正</a></h2>
      
      <p>
現在，よく使われている libtool 1.4.x には３つのバージョンがあります (1.4.1, 1.4.2, 最新開発スナップショット)．
いずれも Darwin ではいくつかの問題があり，修正方法も異なります．
Fink で提供している libtool14 は全てのパッチを含んでいます．
しかし，これによって影響されるパッケージの ltmain.sh/configure ファイルを修正する必要があります．
</p>
      <ol>
        <li><b>flat_namespace バグ</b>:
この問題は， Mac OS X 10.1 上で libtool を使用する際に発生します．
何が起こるかというと，libtool は未定義シンボルを許可するために <code>-undefined suppress</code> を使おうとするが，これに伴う <code>-flat_namespace</code> を指定しません．
10.1 からは，これでは動作しません．
パッチは以下のようになります:
<pre>
diff -Naur gdk-pixbuf-0.16.0.old/configure gdk-pixbuf-0.16.0.new/configure
--- gdk-pixbuf-0.16.0.old/configure	Wed Jan 23 10:11:48 2002
+++ gdk-pixbuf-0.16.0.new/configure	Thu Jan 31 03:19:54 2002
@@ -3334,7 +3334,7 @@
     ;;
 
   darwin* | rhapsody*)
-    allow_undefined_flag='-undefined suppress'
+    allow_undefined_flag='-flat_namespace -undefined suppress'
     # FIXME: Relying on posixy $() will cause problems for
     #        cross-compilation, but unfortunately the echo tests do not
     #        yet detect zsh echo's removal of \ escapes.
</pre></li>
        <li><b>ローダブル・モジュールのバグ</b>:
このバグは，zsh (10.0 と 10.1 のデフォルトシェル; 10.2 では bash に変更される見込み) の非標準的な挙動によります．
zsh の非標準的なクォートの挙動により，ローダブル・モジュールが正しくビルドされず，(Linux と異なり，Darwin では本質的に別ものな) 共有ライブラリになります．
修正方法の例 (の一部なので，そのままでは使えません):
<pre>
diff -Naur gnome-core-1.4.0.6.old/configure gnome-core-1.4.0.6.new/configure
--- gnome-core-1.4.0.6.old/configure	Sun Jan 27 08:19:48 2002
+++ gnome-core-1.4.0.6.new/configure	Fri Feb  8 01:10:21 2002
@@ -4020,7 +4020,7 @@
     # FIXME: Relying on posixy $() will cause problems for
     #        cross-compilation, but unfortunately the echo tests do not
     #        yet detect zsh echo's removal of \ escapes.
-    archive_cmds='$nonopt $(test "x$module" = xyes &amp;&amp; echo -bundle || echo -dynamiclib) ...'
+    archive_cmds='$nonopt $(test x$module = xyes &amp;&amp; echo -bundle || echo -dynamiclib) ...'
     # We need to add '_' to the symbols in $export_symbols first
     #archive_expsym_cmds="$archive_cmds"' &amp;&amp; strip -s $export_symbols'
     hardcode_direct=yes
</pre><p>
この問題は 1.4.2 以降のバージョンでは修正されました．
</p></li>
        <li><b>convenience ライブラリのバグ</b>:
条件によっては，libtool は convinience ライブラリをリンクすることができず， "multiple definitions" エラーを出します．
これは libtool の本質的な問題によるようです．
現在のところ回避策として (原因ではなく症状を治すだけでですが，成功します)，この修正を行います (Dave Vasilevsky に感謝):
<pre>
--- ltmain.sh.old       2002-04-27 00:01:23.000000000 -0400
+++ ltmain.sh   2002-04-27 00:01:45.000000000 -0400
@@ -2894,7 +2894,18 @@
        if test -n "$export_symbols" &amp;&amp; test -n "$archive_expsym_cmds"; then
          eval cmds=\"$archive_expsym_cmds\"
        else
+         save_deplibs="$deplibs"
+         for conv in $convenience; do
+       tmp_deplibs=
+       for test_deplib in $deplibs; do
+         if test "$test_deplib" != "$conv"; then
+           tmp_deplibs="$tmp_deplibs $test_deplib"
+         fi
+       done
+       deplibs="$tmp_deplibs"
+         done
          eval cmds=\"$archive_cmds\"
+         deplibs="$save_deplibs"
        fi
        save_ifs="$IFS"; IFS='~'
        for cmd in $cmds; do
</pre></li>
        <li><b>DESTDIR バグ</b>:
DESTDIR を設定し， libtool 1.4.2 を使用するパッケージのなかで，再リンクに問題がある場合があります．
この問題は，以下のメールで議論されました:
<p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00019.html</a></p><p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00021.html</a></p><p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00025.html</a>,</p><p>パッチに関する議論は:</p><p><a href="http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html">http://mail.gnu.org/archive/html/libtool/2002-04/msg00043.html</a>.</p></li>
      </ol>
    
    <h2><a name="notes">3.4 さらなる注記</a></h2>
      
      <p>libtool 自体と，libtool が何をするかについての詳細は <a href="http://www.gnu.org/software/libtool/libtool.html">libtool ホームページ</a>を参照．</p>
      <p>
注記:
Apple の Developer Tools には libtool というプログラムがはいっていて，コンパイラドライバが共有ライブラリをビルドする際に使われます．
しかし，これは GNU の libtool とは全く関係がありません．
Apple の提供する GNU libtool は <code>glibtool</code> としてインストールされています．
これは， GNU libtool を<code>--program-transform-name=s/libtool/glibtool/</code> と configure することで得られます．
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="preparing-10.2.php?phpLang=ja">4. 10.2 に向けて</a></p>
<? include_once "../../footer.inc"; ?>


