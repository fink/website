<?php
$title = "Rsync アップグレード方法への変更";
$cvs_author = '$Author: thesin $';
$cvs_date = '$Date: 2014/10/23 22:32:38 $';

include "header.inc";
?>

<h1>Rsync アップグレード方法への変更</h1>

<p>
Fink パッケージマネージャは、 CVS アップグレードに加え rsync によるアップグレードを提供しています。
CVS で問題がある場合は CVS 方法ではパッケージマネージャをアップグレードできませんが!
</p><p>
アップグレードの最中に問題が発生したら、 fink (version 0.14.0 以降) のソース tarball を
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">
Fink 用の SourceForge File List ページ</a>
から入手して下さい。
<code> tar -xfz </code>　をして tarball を解凍し、 <code>cd</code> 
で今解凍したディレクトリ内に入り、以下のコマンドを実行します:
<code>./inject.pl</code>
</p>
<p>
これで最新のパッケージマネージャがインストールされます。
インストール後、 <code>fink selfupdate-rsync</code> で rsync 方式に切り替わります。
一度切り替えたら、これ以降は <code>fink selfupdate</code> でアップグレードを行うことができます。
</p>


<?php
include "footer.inc";
?>
