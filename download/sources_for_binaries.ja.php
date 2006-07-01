<?
$title = "Getting the Source Files for Binary Packages";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2006/07/01 03:01:07 $';

include "header.inc";
?>

<h1>バイナリパッケージ用ソースファイルの取得</h1>

<p>
Fink は、<quote>stable</quote> パッケージのコンパイル済みバージョンを、(ライセンスが許可している場合に) 自動インストール向けに提供しています。
これらのパッケージの多くは GNU Public License (GPL) の下でリリースされ、Fink プロジェクトでは GPL 下での制限を遵守しています。
</p><p>
<a href="http://bindist.finkmirrors.net/bindist/dists/">Archive Brower</a> は、利用者がこれらバイナリパッケージや、対応するソースファイル、パッチ、ビルド手順を入手できるようにしています。
これは通常、自動的に行われます。
fink が Fink プロジェクトの提供するバイナリパッケージをダウンロードする際、Archive から入手し、fink がソースファイルをダウンロードする際、Archive のソースレポジトリから
(<quote>Master</quote> ソースミラーを通して) 入手することが多い。
Archive Browser では、これら、特にバイナリパッケージや対応するソースファイル、を手動で入手することができます。
</p><p>
Archive Browser は、以下のように構成されています:
アーカイブ中の各 <quote>distribution</quote> (OS X のバージョンごとにある) は、
<quote>crypto</quote> と <quote>main</quote> のセクションに分けられ、
それぞれさらに細かく分けられています。
<code>binary-darwin-<em>architecture</em></code> ディレクトリは、トピックごとに分けられて、バイナリパッケージを含んでいます。
<code>finkinfo</code> ディレクトリは、ビルド手順を記述した対応するファイルとパッチファイルを含み、
<code>source</code> ディレクトリにはソースがあります。
</p><p>
この方法で、パッケージ名称がわかれば、利用者はソースファイルだけでなく、バイナリパッケージを作成するために必要な、全てのパッチファイルやビルド手順を手に入れることができます。
ビルド手順で使われている文法は、<a href="../doc/packaging/index.php">Fink パッケージ化マニュアル</a>に書かれています。
(注記: ビルド手順ファイルのいくつかは、複数パッケージをビルドするようになっています。
正しいファイルを探すためには、ディレクトリ内のビルド手順ファイルを検索するか、<a href="http://pdb.finkproject.org/pdb/index.php">Online Package Database</a> で、そのパッケージの<quote>親</quote>を探してください。)
</p>
<p>
最後の注記: Fink インストーラは、(Apple のインストーラを用いて基本的なセットアップをしますが)、
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">Sourceforge.net の fink ファイルリリースページ</a>にて提供されています。
このようにして、バイナリパッケージのソースファイルも Sourceforge.net にてホストされています。
インストーラは <quote>distribution</quote> リリースに、ソースファイルは <quote>miscellaneous/bootstrap</quote> と <quote>fink</quote> リリースにあります。

<?
include "footer.inc";
?>
