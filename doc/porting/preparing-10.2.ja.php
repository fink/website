<?php
$title = "移植 - 10.2 に向けて";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:16';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="移植 Contents"><link rel="next" href="preparing-10.3.php?phpLang=ja" title="10.3 に向けて"><link rel="prev" href="libtool.php?phpLang=ja" title="GNU libtool">';


include_once "header.ja.inc";
?>
<h1>移植 - 4. 10.2 に向けて</h1>
    
    
    <h2><a name="bash">4.1 bash シェル</a></h2>
      
      <p>
OS X 10.2 は <code>/bin/sh</code> 機能を提供するため zsh ではなく bash を使用すると理解しています．
これにより fink にとっては３つのことが実現されます．
</p>
      <ul>
        <li>
過去において，セミコロンを追加するだけでは何もしない CompileScript (や PatchScript や
InstallScript) を作成した fink パッケージがありました．
これは bash では動作せず，以下のように置き換える必要があります
<pre>
  CompileScript: echo "nothing to do"
</pre>
</li>
        <li>
過去の fink パッケージでは二つのライブラリを参照するために  <code>lib(foo|bar).dylib</code> という記述を用いたことがあります．
これは bash では動作しません (bash の同様の <code>lib{foo,bar}.dylib</code> は zsh で動作しない)．
解決: 両方の名前をちゃんと記述し直す．
</li>
        <li>
多くの場合，bash 下でバージョン無しでビルドされないように libtool パッチが必要です．
<b>注記: UpdateLibtool: True を使用している場合， libtoool-1.3.5 にはこのパッチは必要ありません．
 </b>
症状: bash 下でビルド時に
<pre>
../libtool: test: too many arguments
</pre>
とあり， <code>configure</code> 内に以下が含まれている場合:
<pre>
archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $(test -n "$verstring" -a x$verstring != 
x0.0 &amp;&amp; echo $verstring)'
</pre>
ここにパッチがあります (が，注意して使用してください．他の libtool 問題の可能性もあるので，その場合は自分でパッチを当ててください):
<pre>
diff -Naur gdk-pixbuf-0.16.0/configure gp-new/configure
--- gdk-pixbuf-0.16.0/configure 2002-01-22 20:11:48.000000000 -0500
+++ gp-new/configure    2002-05-10 03:02:44.000000000 -0400
@@ -3338,7 +3338,7 @@
      # FIXME: Relying on posixy $() will cause problems for
      #        cross-compilation, but unfortunately the echo tests do not
      #        yet detect zsh echo's removal of \ escapes.
-    archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $(test -n "$verstring" -a x$verstring != 
x0.0 &amp;&amp; echo $verstring)'
+    archive_cmds='$CC $(test .$module = .yes &amp;&amp; echo -bundle || echo 
-dynamiclib) $allow_undefined_flag -o $lib $libobjs $deplibs$linkopts 
-install_name $rpath/$soname $tmp_verstring'
      # We need to add '_' to the symbols in $export_symbols first
      #archive_expsym_cmds="$archive_cmds"' &amp;&amp; strip -s $export_symbols'
      hardcode_direct=yes
diff -Naur gdk-pixbuf-0.16.0/ltmain.sh gp-new/ltmain.sh
--- gdk-pixbuf-0.16.0/ltmain.sh 2002-01-22 20:11:43.000000000 -0500
+++ gp-new/ltmain.sh    2002-05-10 03:04:49.000000000 -0400
@@ -2862,6 +2862,11 @@
        if test -n "$export_symbols" &amp;&amp; test -n "$archive_expsym_cmds";
	then
          eval cmds=\"$archive_expsym_cmds\"
        else
+         if test "x$verstring" = "x0.0"; then
+           tmp_verstring=
+         else
+           tmp_verstring="$verstring"
+         fi
          eval cmds=\"$archive_cmds\"
        fi
        IFS="${IFS=     }"; save_ifs="$IFS"; IFS='~'
</pre>
</li>
      </ul>
    
    <h2><a name="gcc3">4.2 gcc3 コンパイラ</a></h2>
      
      <p>gcc3 コンパイラを使用する Mac OS X 10.2</p>
      <p>ローダブル・モジュールを含み， libtool を使用するパッケージで， install_name エラーで失敗するものは， libtool が -install_name フラグと(特に必要なり) -bundle フラグを送るためです ．
gcc2 コンパイラは受け付けていましたが， gcc3 コンパイラでは受け付けません．
修正は<a href="http://www.mail-archive.com/fink-devel@lists.sourceforge.net/msg02025.html">ここ</a>にあります．
libtool-1.3.5 を使うパッケージ (<code>UpdateLibtool: True</code> を使用している場合を含む) はこのパッチは必要ないことに注意してください．
既に fink の ltconfig ファイル (fink のプレリリース版にある) に統合されているためです．
</p>
      <p>他の gcc3 コンパイラの問題は， gcc2 と gcc3 での C++ ABI の非互換性によります．
gcc2 でコンパイルされたライブラリに gcc3 でコンパイルされた C++ プログラムからリンクできないことを意味します．
</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="preparing-10.3.php?phpLang=ja">5. 10.3 に向けて</a></p>
<?php include_once "../../footer.inc"; ?>


