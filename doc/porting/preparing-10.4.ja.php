<?
$title = "移植 - 10.4 に向けて";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:55';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="移植 Contents"><link rel="prev" href="preparing-10.3.php?phpLang=ja" title="10.3 に向けて">';


include_once "header.ja.inc";
?>
<h1>移植 - 6. 10.4 に向けて</h1>


<h2><a name="perl">6.1 Perl</a></h2>

  <p>
    <code>/usr/bin/perl</code> は perl 5.8.6 です．
    architecture string は未だに "darwin-thread-multi-2level" です．
  </p>



<h2><a name="typedef">6.2 新しいシンボル定義</a></h2>

  <p>
    Mac OS X 10.4 は，多くのシンボルの型を変更しました．
    今までに明示的に型を指定したもの、例えば <code>socklen_t</code> を <code>int</code> と定義したようなもの，
    この定義は正しくありません．
  </p>



<h2><a name="system-libs">6.3 新しいシステムライブラリ</a></h2>

  <p>
    Mac OS X 10.3 の <code>poll()</code> 関数は、実際は <code>select()</code> を利用したエミュレーションでした。
    Mac OS X 10.4 では、 <code>poll()</code> はカーネルで実装されている実際の関数です。
    しかし、ソケットと使用する際には壊れています。
    システムの <code>poll()</code> を完全に無視することも検討してください。
    Fink の glib2 パッケージは、完全に機能するエミュレーションを使うようパッチされていますので、
    poll のような機能のライブラリを安全に使うことができます。
  </p>



<? include_once "../../footer.inc"; ?>


