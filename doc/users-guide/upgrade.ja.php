<?
$title = "ユーザーガイド - アップグレード";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2004/08/12 15:01:33';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="ユーザーガイド Contents"><link rel="next" href="conf.php?phpLang=ja" title="Fink 設定ファイル"><link rel="prev" href="packages.php?phpLang=ja" title="パッケージのインストール">';


include_once "header.ja.inc";
?>
<h1>ユーザーガイド - 4. Fink のアップグレード</h1>



<p>
この章は、 Fink を最新かつ最高に更新する方法を解説します。
</p>

<h2><a name="bin">4.1 バイナリパッケージでのアップグレード</a></h2>

<p>
バイナリディストリビューションだけを使っている場合、特にすることはありません。
最新の一覧に更新し、全てのパッケージを更新するだけです。
</p>
<p>
dselect の場合、"[U]pdate" を押して "[I]nstall" するだけです。
もちろん、この間に "[S]elect" を実行して選択されたものと新しいパッケージを確認することもできます。
</p>
<p>
apt では、 <code>apt-get update</code> を実行して最新の一覧を取得し、 <code>apt-get upgrade</code> を実行して全てのパッケージを最新に更新します。
</p>
<p>
Fink Commander では、
Binary-&gt;Update descriptions 
を選択してパッケージリストを更新し、
Binary-&gt;Dist-Upgrade 
で新しいバージョンに更新します。
</p>
<p>
詳細、特に 0.3.0 より前のバージョンの Fink からアップグレードする場合は、
<a href="http://fink.sourceforge.net/download/upgrade.php">アップグレード表</a>
を御覧下さい。
</p>

<h2><a name="src">4.2 ソースディストリビューションのアップグレード</a></h2>

<p>
アップグレードは２ステップあります。
1. パッケージ記述をダウンロードします。
2. このパッケージ記述を使って新しいパッケージをコンパイルします。
必要に応じてソースコードもダウンロードします。
</p>
<p>
Fink 0.2.5 以降であれば、最初のステップは <code>fink selfupdate</code> を実行します。
このコマンドは Fink ウェブサイトを新しいリリースが用意されているか確認し、自動的にパッケージ記述をダウンロード、インストールします。
最近のバージョンの <code>fink</code> コマンドでは、 CVS または rsync から直接パッケージ記述を取得する選択肢もあります。
CVS はバージョン管理レポジトリで、パッケージ記述が保存・管理されています。
CVS には連続して更新できる利点がありますが、CVS サーバーが一つしかなく、トラフィック量に依って不安定になりやすい欠点があります。
このため、一般ユーザーは rsync を使うことをおすすめします。
rsync にはミラーが複数あり、欠点は CVS からのパッケージ記述の更新に１時間かかることです。
</p>
<p>(ソースインストールで問題がある場合、<a href="http://fink.sourceforge.net/download/fix-upgrade.php">特殊な方法</a>を参照して下さい)</p>
<p>
0.2.5 より古いバージョンの Fink の場合、手動でパッケージ記述をダウンロードして下さい。
<a href="http://sourceforge.net/project/showfiles.php?group_id=17203">ダウンロードエリア</a>で最新の packages-0.x.x.tar.gz tarball を "distribution" モジュール内で探します。
ダウンロード後、以下のようにインストールします:
</p>
<pre>tar -xzf packages-0.x.x.tar.gz
cd packages-0.x.x
./inject.pl</pre>
<p>
パッケージ記述をダウンロード後 (どのような方法であれ)、全てのパッケージを <code>fink
update-all</code> で一括更新します。
</p>
<p>
Fink Commander を使ってソースディストリビューションを更新する場合、
Source-&gt;Selfupdate 
を選択して新しいパッケージ情報ファイルをダウンロードし、
Source-&gt;Updata-all
を選択して古いパッケージを更新します。
</p> 

<h2><a name="mix">4.3 バイナリとソースの混在</a></h2>

<p>
もし、コンパイル済みパッケージとソースからビルドしたものを使っている場合、両方のアップグレード方法をする必要があります。
最初に <code>dselect</code> か <code>apt-get</code> を使ってバイナリで提供されているパッケージの最新バージョンを取得し、次に <code>fink selfupdate</code> と <code>fink update-all</code> で現在のパッケージ記述を取得し、残りのパッケージを更新します。
</p>
<p>
fink 0.23.0 からは、 UseBinaryDist オプション (
<a href="usage.php?phpLang=ja#options">--use-binary-dist (or -b) オプション</a>
あるいは <a href="conf.php?phpLang=ja">Fink 設定ファイル</a>で設定可能) 
を使用することで、 <code>fink selfupdate</code> 実行時にソースとバイナリ記述を更新します。
これにより、 <code>apt-get</code> の実行は必要なくなりました。
</p>
<p>
Fink Commander を使用している場合、 Binary-&gt;Update descriptions を選択してパッケージ一覧を更新し，
Binary-&gt;Dist-Upgrade packages でパッケージを更新します。
この後、 Source-&gt;Selfupdate で新しい情報ファイルをダウンロードし、
Source-&gt;Update-all を行います(詳細は前の節を参照)。
</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="conf.php?phpLang=ja">5. Fink 設定ファイル</a></p>
<? include_once "../../footer.inc"; ?>


