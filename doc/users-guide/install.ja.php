<?php
$title = "ユーザーガイド - インストール";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="ユーザーガイド Contents"><link rel="next" href="packages.php?phpLang=ja" title="パッケージのインストール"><link rel="prev" href="intro.php?phpLang=ja" title="はじめに">';


include_once "header.ja.inc";
?>
<h1>ユーザーガイド - 2. 初めてのインストール</h1>



<p>
初めてインストールする間、マシンには基本システムとパッケージ管理ツールがインストールされます。
これの後には、 Fink からインストールされたソフトウェアを使えるようにするため、シェルの環境変数を設定します。
この作業は一度だけで十分です。
Fink のアップグレードは、再インストールなしで行なうことができます (リリース 0.2.0 以降)。
<a href="upgrade.php?phpLang=ja">アップグレードの章</a>を参照してください。
</p>
<p>
パッケージ管理ツールをインストールしたら、これを使ってさらにソフトウェアをインストールすることができます。
<a href="packages.php?phpLang=ja">パッケージインストールの章</a>を参照してください。
</p>

<h2><a name="bin">2.1 バイナリディストリビューションのインストール</a></h2>

<p>
バイナリディストリビューションは、ディスクイメージ (.dmg) の中に、 Mac OS X インストーラパッケージ形式 (.pkg) で配布されています。
ディスクイメージを<a href="/download/bindist.php">ダウンロードページ</a>からダウンロードし、ダブルクリックしてマウントします。
"Fink 0.x.x Installer" を開きます。
Disk Copy がファイルを点検した後にデスクトップに出てくるディスクアイコンのことです。
この中には、ドキュメンテーションとインストーラパッケージが入っています。
インストーラパッケージをダブルクリックし、説明に従って下さい。
</p>
<p>
管理者パスワードを聞かれ、文章が表示されます。
このユーザーガイドよりも新しいこともあるので、なるべく読んでください。
インストーラがインストール先のドライブを聞いてきたら、システムボリューム (Mac OS X をインストールしたボリューム) を選択してください。
もし間違ったボリュームを選択すると、インストールはできますが、 Fink は動作しません。
インストールが終了したら、<a href="#setup">環境の設定</a>節を参照してください。
</p>

<h2><a name="src">2.2 ソースディストリビューションのインストール</a></h2>

<p>
ソースディストリビューションは標準的な Unix tarball (.tar.bz) で提供されます。
これは <code>fink</code> パッケージマネージャとパッケージ記述だけが含まれていて、パッケージ用のソースをダウンロードするものです。
<a href="/download/srcdist.php">ダウンロードページ</a>から入手することができます。
tar アーカイブを解凍する際に、 StuffIt Expander を使わないように注意してください。
StuffIt はまだ長いファイル名を扱うことができないようです。
StuffIt Expander が解凍してしまっている場合、作成されたフォルダごと捨ててください。
</p>
<p>
ソースリリースはコマンドラインからインストールする必要があります。
まずターミナル.app を開き、 fink-0.x.x-full.tar.gz アーカイブをインストールしたディレクトリに移動します。
(注記: もし、OS X 10.4 を XCode 2.1 を使っている場合は、
<code>fink-0.8.0-full-XCode-2.1.tar.gz</code> 
を代わりに用い、下記の説明も適切に変えてください。)
次のコマンドでアーカイブを解凍します。
</p>
<pre>tar -xzf fink-0.x.x-full.tar.gz</pre>
<p>
これによってアーカイブと同名のディレクトリが作成されます。
以下も <code>fink-0.x.x-full</code> を使います。
このディレクトリ内に入り、ブートストラップコマンドを入力します:
</p>
<pre>cd fink-0.x.x-full
./bootstrap.sh</pre>
<p>
スクリプトがシステムをチェックし、 sudo を使って root になります。
この時、パスワードを聞いてきます。
次に、インストールパスを聞いてきます。
特に理由がない限り、デフォルトのパス /sw を使ってください。
このドキュメントでは、このパスを例として使いますので、パスを換えた場合は適宜置き換えてください。
</p>
<p>
次にくるのは Fink の設定です。
プロキシ、ミラーの設定や verbose メッセージにするかどうか聞かれます。
質問が理解できない場合、リターンキーを押してデフォルト値を選択してください。
このプロセスは、後でも <code>fink configure</code> コマンドで再実行することができます。
</p>
<p>
ブートストラップスクリプトには、必要な情報が全てあり、ソースコードをダウンロードしてコンパイルを始めます。
この時点ではこれ以上のインタラクションは必要ありません。
また、パッケージが二度コンパイルされることがありますが、心配しないでください。
パッケージマネージャのバイナリパッケージをビルドするのにパッケージマネージャが必要なためです。
</p>
<p>
ブートストラップが終ったら、<a href="#setup">環境の設定</a> 節へ進んでください。
</p>

<h2><a name="setup">2.3 環境の設定</a></h2>

<p>
Fink ディレクトリ階層にインストールされたソフトウェア、パッケージ管理プログラムを含めて、を使用するには、 PATH 環境変数などをそれぞれ設定しなければなりません。
これはターミナル上で、
</p>
<pre>/sw/bin/pathsetup.sh</pre>
<p>
と入力します。
古いバージョンの fink の場合、ファイル名が <code>pathsetup.command</code> ですので、次のように入力します。
<code>open /sw/bin/pathsetup.command</code>
として下さい。
これが効かない場合は手動で設定することができますが、シェルによってやり方が異なります。
現在のシェルを知るには、ターミナルを開き:
</p>
<pre>echo $SHELL</pre>
<p>
と入力します。
この中に "csh" か "tcsh" とあったら、 C シェルを使っています。
bash, zsh, sh または似たようなものであれば、 bourne シェルの派生を使っています。
</p>
<ul>
 <li>
  <p>Bourne シェル (Mac OS X 10.3 以降のデフォルト) </p>
  <p>
   Bourne シェル系 (sh, bash, zsh など) を使っている場合、以下の行をホームディレクトリ内の <code>.profile</code> ファイルに追加して下さい (あるいは、 <code>.bash_profile</code> がある場合、こちらを使って下さい):
  </p>
  <pre>. /sw/bin/init.sh</pre>
  <p>
   行追加の方法を知らない場合、以下のコマンドを実行して下さい:
  </p>
  <pre>cd pico .profile</pre>
<p>
フルスクリーン (フル・ターミナルウィンドウ) テキストエディタになり、 
<code>. /sw/bin/init.sh</code> 行をタイプできるようになります。
"New file" という文字が出ていても大丈夫です。
行を追加したら、最低一回はリターンキーを押して下さい。
その後、 Control-O, Return, Control-X と押して、エディタから抜けて下さい。
</p>
 </li>
 <li>
  <p>C シェル (Mac OS X 10.2 までのデフォルト) </p>
  <p>
   tcsh を使っている場合、以下の行をホームディレクトリ内の 
   <code>.cshrc</code> ファイルに追加して下さい:
  </p>
  <pre>source /sw/bin/init.csh</pre>
  <p>
   行追加の方法を知らない場合、以下のコマンドを実行して下さい:
  </p>
<pre>cd
pico .profile</pre>
<p>
フルスクリーン (フル・ターミナルウィンドウ) テキストエディタになり、 
<code>source /sw/bin/init.csh</code> 行をタイプできるようになります。
"New file" という文字が出ていても大丈夫です。
行を追加したら、最低一回はリターンキーを押して下さい。
その後、 Control-O, Return, Control-X と押して、エディタから抜けて下さい。
</p>
  <p>状況によっては、さらに数行編集する必要がある場合もあります:</p>
  <ol>
  <li>
  <p><code>~/.tcshrc</code> があります。</p>
  <p>このファイルはサードパーティーのソフトウェアによって作られることがあります。
  あなたが自分で作ったのかも知れません。
  いずれの場合も、 <code>~/.tcshrc</code> が読まれて、 <code>~/.cshrc</code> は無視されてしまいます。
  <code>~/.tcshrc</code> を <code>~/.cshrc</code> と同じように編集することをお勧めします:
  </p>
  <pre>source ~/.cshrc</pre>
  <p>こうすることで、 <code>~/.tcshrc</code> を削除することなく Fink を使うことができます。</p>
  </li>
  <li>
  <p> <code>/usr/share/tcsh/examples/README</code> に書かれていることを実行した。</p>
  <p>ここに書かれていることは、 <code>~/.tcshrc</code> と <code> ~/.login</code> を作るように指示しています。
  ここで問題は、 <code>~/.login</code> が <code>~/.tcshrc</code> の後で実行され、 <code>/usr/share/tcsh/examples/login</code> を source することです。
  後者は、あなたの設定した PATH を上書きする行を含んでいます。
  <code>~/Library/init/tcsh/path</code> を作成するのがよいでしょう:</p>
<pre>mkdir -p ~/Library/init/tcsh
pico ~/library/init/tcsh/path</pre>
  <p>としてから:</p>
  <pre>source ~/.cshrc</pre>
  <p>を加えて下さい。
  また、 .tcshrc も項目１のように編集して下さい。
  <code>~/.login</code> が読まれない状況で、PATH が正しく設定されたか確認して下さい。</p>
  </li>
  </ol>
  <p>
  .cshrc (と、他の起動ファイル) の編集は、新規シェル (新しくターミナルウィンドウを開いた時) から有効になります。
   このため、ファイルを変更する前から開いていたターミナルウィンドウは、それぞれこのコマンドを実行する必要があります。
  また、 <code>rehash</code> を実行する必要もあります。
  これで tcsh は使用できるコマンドを内部にキャッシュします。
  </p>
 </li>
</ul>
<p>
<code>init.sh</code> と <code>init.csh</code> スクリプトは <code>/usr/X11R6/bin</code> と <code>/usr/X11R6/man</code> をパスに追加することに注意して下さい。
これで X11 がインストールされた時に使えるようになります。
Fink のパッケージはそれぞれ設定を追加することができます。
例えば、 qt パッケージは QTDIR 環境変数を設定します。
</p>
<p>
環境を整えたら、次の<a href="packages.php?phpLang=ja">パッケージのインストール</a>の章に進み、 Fink のパッケージ管理ツールを使ったパッケージのインストール方法をお読み下さい。
</p>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="packages.php?phpLang=ja">3. パッケージのインストール</a></p>
<?php include_once "../../footer.inc"; ?>


