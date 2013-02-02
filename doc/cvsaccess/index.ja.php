<?
$title = "Fink CVS アクセス";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:13';
$metatags = '';


include_once "header.inc";
?>
<h1>Fink CVS アクセスを設定</h1>
<!--Generated from $Fink: cvs.ja.xml,v 1.4 2012/11/11 15:20:13 gecko2 Exp $-->
<p>
Fink は CVS を用いて開発されています。 すなわち、リリース前にも、つねに最新の状態でいることができます。 このページでは、すでに Fink をインストールしている方を対象に、CVS での更新方法をお伝えいたします。 ここの情報は、 Fink 0.3.x 以降で有効です。
</p>
<h2><a name="">Fink CVS の構造</a></h2>
<p>
Fink には、いくつかの CVS モジュールがあります。
<code>dists</code> モジュール
(<a href="http://fink.cvs.sourceforge.net/fink/">ViewCVS</a>)
には、OS X 10.2 以降のパッケージ記述ファイルとパッチが格納されています。
この他にも Fink 開発者によって使われているモジュールがあり、
誰でも見ることができますが、
おそらくほとんどのユーザーには関心がないことでしょう。
</p>
<h2><a name="">パッケージ記述の更新</a></h2>
<p>
以前は、これはちょっと手間のかかることでした。
しかし、現在の Fink では、とてもシンプルです。
以下のコマンドを実行してください。
</p>
<pre>fink selfupdate-cvs</pre>
<p>
あとは Fink が、必要なステップを自動的に行います。
これにより、最新のパッケージ記述の取得と必須コアパッケージ (Fink パッケージマネージャーを含む) の更新が行われます。
</p>
<p>
ファイアーウォールの内側にいる場合、
<a href="/faq/usage-fink.php#proxy">FAQ 3.2</a>
をご参考にしてください。
</p>
<p>
この方法でパッケージ記述を更新し、
インストール済みのパッケージを最新バージョンに更新したい場合、
以下のコマンドで行うことができます。
</p>
<pre>fink update-all</pre>
<h2><a name="">パッケージマネージャーの更新</a></h2>
<p>
<b>注記:</b> 2001年9月20日より、
パッケージマネージャーを個別に更新する必要はなくなりました。
他のパッケージと全く同様に行うことができます。
今でも CVS から直接更新することは可能ですが、
これはパッケージ制作者のためのもので、
一般ユーザーにはあまり関係ないことでしょう。
</p>

<p>
パッケージマネージャーは、独立したディレクトリを通して、
 <code>inject.pl</code> スクリプトで更新しなければなりません。
</p>
<p>
初めての場合、仮ディレクトリ（ここでは <code>tempdir</code> とする）が必要です。
これは空でなくてはいけません (あるいは少なくとも fink という名のサブディレクトリがあってはいけない)。
これは、その後、このようになります。
</p>
<pre>cd tempdir
cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink login
cvs -z3 -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink co fink
cd fink
./inject.pl</pre>
<p>
ログインコマンドは、パスワードを尋ねてきます。
何も入力せずリターンキーを押してください。
この後、仮ディレクトリは削除してもかまいません。
ただし、残しておくと次回から更新が容易になります。
次回からは、
</p>
<pre>cd tempdir/fink
cvs -z3 update -d
./inject.pl</pre>

<? include_once "../../footer.inc"; ?>


