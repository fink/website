<?php
$title = "Advanced - Binary Distro Server";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Advanced Contents"><link rel="prev" href="index.php?phpLang=ja" title="Advanced Contents">';


include_once "header.ja.inc";
?>
<h1>Advanced - 1. バイナリ・ディストリビューション・サーバーの設定</h1>
    
    
    <h2><a name="intro">1.1 はじめに</a></h2>
      
      <p>
本節では、複数の Fink ユーザーの環境へバイナリを提供するための中央ビルドサーバーを構築方法について解説します。
      </p>
      <p>
(<b>注記:</b> この文書中では fink version &gt;= 0.24.0 を想定しています。
これより古いバージョンの場合は<a href="#remarks">注意点を参照</a>してください。)
      </p>
      <p>
<a href="#master">"master" サーバー</a> と
<a href="#client">client マシン</a>での作業が必要となります:
      </p>
    
    <h2><a name="master">1.2 "master" (build) サーバーでの作業</a></h2>
      
      <ol>
        <li>
Fink を <code>/opt/sw</code> にインストール (既定のパス、あるいは必要に応じて symlink を作成)。
        </li>
        <li>
パッケージを通常通りビルド。
ビルドのみ必要で、インストールする必要はない。
        </li>
        <li>
          <p>
ビルドしたパッケージのあるディレクトリ内で <code>fink scanpackages</code> を実行。
これにより、 fink は有効なツリー内の apt インデックスを作成する。
          </p>
          <p>
若しくは、 <code>fink cleanup</code> を実行して古いソースとバイナリパッケージを削除しても良い。
<code>scanpackages</code> は cleanup プロセスの最後に呼び出される。
          </p>
        </li>
        <li>
ウェブサーバーを開始: 例えば、システム環境設定中のネットワーク共有で、"パーソナルWeb共有" を開始する。
<code>/etc/httpd/httpd.conf</code> ファイルを以下のように編集し、 <code>/opt/sw/fink</code> を提供するように設定する。
<pre>Alias /fink /opt/sw/fink
&lt;Directory /opt/sw/fink&gt;
  Options Indexes FollowSymLinks
&lt;/Directory&gt;</pre>
        </li>
        <li>
<code>sudo /usr/sbin/apachectl graceful</code> を実行し、ウェブサーバーを(再)起動する。
        </li>
      </ol>
      <p>
"master" サーバー上の、ビルド・更新したパッケージのあるディレクトリ中で
<code>fink scanpackages</code> (または <code>fink cleanup</code>) を(再)実行し、
外のマシンから見えるようにする。
      </p>
      <p>
<b>注記:</b>
      </p>
      <p>
'fink' というユーザーを作成し、上記の行を
<code>/etc/httpd/users/fink.conf</code>
に追加しても良い。
      </p>
      <p>
Fink の apache2 パッケージを使用している場合は、上記のパスを適宜変更する必要がある。
      </p>
    
    <h2><a name="client">1.3 クライアント・マシンでの操作</a></h2>
      
      <ol>
        <li>
Fink を <code>/opt/sw</code> (既定のパス) にインストール
        </li>
        <li>
<code>fink configure</code> を実行し、
バイナリ・ディストリビューションからパッケージをダウンロードするようオプション設定します。
 (<code>/opt/sw/etc/fink.conf</code> ファイル中で "UseBinaryDist: true")
        </li>
        <li>
<code>/opt/sw/etc/apt/sources.list</code> を編集し、 Fink ツリーを表す行を追加します。
例えば、ビルドボックスの IP アドレスが 192.168.42.7 であれば、以下のように追加します:
<pre>deb http://192.168.42.7/fink stable main crypto
deb http://192.168.42.7/fink unstable main crypto
deb http://192.168.42.7/fink local main</pre>
        </li>
        <li>
<code>fink selfupdate</code>を実行します。
(verbose レベルが &gt;=1 の場合) 更新プロセスの最後のあたりで以下のように表示されるはずです:
<pre>...
Hit http://192.168.42.7 stable/main Packages
Hit http://192.168.42.7 stable/main Release
Hit http://192.168.42.7 stable/crypto Packages
...</pre>
        </li>
      </ol>
      <p>
<code>fink update-all</code> または <code>fink install &lt;package&gt;</code>
を実行し、 "master" サーバーにバイナリがある場合は、そこからダウンロードします。
      </p>
    
    <h2><a name="remarks">1.4 注意点</a></h2>
      
      <ul>
        <li>
"master" サーバーは、クライアントマシンで使われている最低バージョンの X11 を使う必要があります。
クライアント側の一台でも Apple X11 を使用している場合、"master" でも同じものを使わなければなりません。
        </li>
        <li>
such as <code>apt</code>. 
ビルドマシンの容量を節約したい場合、ビルド時依存のみのパッケージ (実行されないパッケージ) は削除してもかまいません。
<code>debfoster</code> パッケージは便利なツールです。
<code>apt</code> のような必須パッケージを削除しないように注意してください。
       </li>
        <li>
fink version &lt; 0.24.0 をクライアント側で使用している場合、
<code>fink selfupdate</code> ではなく
<code>sudo apt-get update</code> を実行する必要があります。
その後、 <code>sudo apt-get install &lt;package&gt;</code> でバイナリパッケージをインストールします。
      </li>
      </ul>
      <p>
この文書の一部は、 RangerRick の
<a href="http://ranger.befunk.com/blog/archives/000258.html">"Sharing the Fink"</a>
から引用しています。
感謝!
      </p>
    
  
<?php include_once "../../footer.inc"; ?>


