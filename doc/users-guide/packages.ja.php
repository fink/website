<?
$title = "ユーザーガイド - パッケージ";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2006/04/12 00:08:22';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="ユーザーガイド Contents"><link rel="next" href="upgrade.php?phpLang=ja" title="Fink のアップグレード"><link rel="prev" href="install.php?phpLang=ja" title="初めてのインストール">';


include_once "header.ja.inc";
?>
<h1>ユーザーガイド - 3. パッケージのインストール</h1>



<p>
この時点で、 Fink というものがインストールされました。
この章では実際に、好きなソフトウェアパッケージをインストールする方法を解説します。
パッケージのインストールを説明する前に、ソースとバイナリディストリビューションの両方に当てはまる重要事項を説明します。
</p>

<h2><a name="bin-dselect">3.1 dselect によるバイナリパッケージのインストール</a></h2>

<p>
<code>dselect</code> は、入手可能なパッケージの一覧を表示し、インストールするものを選択できるプログラムです。
これはターミナル.app 内で動作しますが、 "スクリーン" 全体を簡単なキーボードナビゲーションで使います。
他のパッケージ管理ツールと同様、 <code>dselect</code> はルート権限を必要とするので、sudo を使い:
</p>
<pre>sudo dselect</pre>
<p>
とします。
<b>注記：</b>
<code>dselect</code> は Mac OS X ターミナル上では問題があります。
これを避けるには以下のコマンドを先に実行するか、起動ファイル (例 <code>.cshrc</code> | <code>.profile</code>) に書いておく必要があります。
</p>
<p>tcsh の場合:</p>
<pre>setenv TERM xterm-color</pre>
<p>bash の場合:</p>
<pre>export TERM=xterm-color</pre>
<p>メインメニューは:</p>
<ul>
<li>
<p>
<b>[A]ccess</b> - 使用するネットワークのアクセス手段を設定します。
<b>これを実行する必要はありません</b>。
Fink があらかじめ全てを設定します。
これを選択すると、デフォルトの設定を使えない設定に書き換えるおそれがあるので、使用は避けて下さい。
</p>
</li>
<li>
<p>
<b>[U]pdate</b> - パッケージ一覧を Fink サイトからダウンロードします、
パッケージをインストールや更新することはありません。
パッケージブラウザが使用する一覧を更新するだけです。
Fink をインストール後、最低一回は実行して下さい。
</p>
</li>
<li>
<p>
<b>[S]elect</b> - 選択、非選択可能なパッケージ一覧を表示します。
詳細は後に書かれています。
</p>
</li>
<li>
<p>
<b>[I]nstall</b> - これが実際にインストールします。
上のメニュー項目は dselect のパッケージ一覧とステータスデータベースを書き換えるだけでしたが、これは実際に選択されたパッケージのダウンロードとインストールをします。
それだけではなく、非選択したパッケージを取り除くこともします。
</p>
</li>
<li>
<p>
<b>[C]onfig</b> と <b>[R]emove</b> - これらは apt 以前からの遺物です。
使う必要はなく、害もありません。
</p>
</li>
<li>
<p>
<b>[Q]uit</b> - 説明の必要はないでしょう。
</p>
</li>
</ul>
<p>
実際は、"[S]elect" メニュー項目を選択後、パッケージブラウザ内にいることが多いでしょう。
パッケージ一覧を表示する前に dselect はヘルプ画面を表示します。
'k' キーを押すとキーボードコマンドの一覧が表示され、スペースキーでパッケージ一覧が表示されます。
</p>
<p>
一覧の中では、上と下のキーで移動します。
選択は、 '+' と '-' でします。
他のパッケージに依存するパッケージを選択した場合、 dselect は影響するパッケージのサブリストを表示します。
ほとんどの場合、リターンキーを押すだけで dselect に従えば大丈夫ですが、サブリスト内で変更もできます (例、バーチャルパッケージ依存のため他を選択する)。
あるいは、 'R' (Shift-R) を押して元の状態に戻せば、サブリストとパッケージ一覧はそのままです。
選択が終了したなら、一覧から出て "[I]nstall" を選択し、実際にパッケージをインストールします。
</p>

<h2><a name="bin-apt">3.2 apt-get を使ったバイナリインストール</a></h2>

<p>
<code>dselect</code> は実際にはパッケージをダウンロードせず、 apt を実行します。
コマンドラインでの作業がしたい場合、 <code>apt-get</code> コマンドを使って apt の機能を直接実行することができます。
</p>
<p>
dselect のと同じく、まずパッケージ一覧をダウンロードします:
</p>
<pre>sudo apt-get update</pre>
<p>
dselect の "[U]pdate" メニュー項目と同じく、コンピュータ上のファイルではなく、パッケージ一覧を更新するだけです。
パッケージをインストールするには、 apt-get に名前を渡します:
</p>
<pre>sudo apt-get install lynx</pre>
<p>
パッケージが他のパッケージのインストールを必要としていると判断した場合、リストを表示して確認をとります。
その後、パッケージをダウンロード、インストールします。
パッケージを取り除くのも簡単です:
</p>
<pre>sudo apt-get remove lynx</pre>
<p>
</p>

<h2><a name="bin-exceptions">3.3 バイナリディストリビューションにない依存パッケージのインストール</a></h2>

<p>バイナリインストールをしている時、依存しているパッケージがインストールできないというメッセージがでることがあります。例えば:</p>
<pre>Sorry, but the following packages have unmet
dependencies:
foo: Depends: bar (&gt;= version) but it is
not installable
E: Sorry, broken packages</pre>
<p>何が起こったかというと、インストールしようとしているパッケージが、ライセンス上バイナリとして配布されない他のパッケージに依存しているのです。
この場合、ソースからインストールして下さい (次の節を参照)。
</p>

<h2><a name="src">3.4 ソースからのパッケージインストール</a></h2>

<p>まず、適切なバージョンの Development Tools が必要となります。
<a href="http://connect.apple.com">http://connect.apple.com</a>
から最新版を入手して下さい。
</p>
<p>
ソースからインストールできるパッケージの一覧を取得するには、 <code>fink</code> ツールに聞きます:
</p>
<pre>fink list</pre>
<p>
最初の列はインストール状態 (空白は未インストール, <code>i</code> はインストール済, <code>(i)</code> はインストール済だが最新ではない) を示します。
次がパッケージ名、最新バージョン、短い説明です。
特定パッケージの詳細を見るには、"describe" コマンド ("info" はエイリアスです) を使います:
</p>
<pre>fink describe xmms</pre>
<p>
インストールしたいパッケージが見つかったら、 "install" コマンドを使います:
</p>
<pre>fink install wget-ssl</pre>
<p>
<code>fink</code> コマンドは最初に必要なもの ("依存性") があるか確認し、無いものがあればインストールしていいか聞いてきます。
次に、ソースコードをダウンロード、解凍、パッチ当て、コンパイル、インストールをします。
この作業は時間がかかります。
この作業中にエラーが発生した場合、まず <a href="http://fink.sourceforge.net/faq/">FAQ</a> を確認して下さい。
</p>
<p>
<code>fink</code> のバージョン 0.23.0 以降では、コンパイル済みバイナリパッケージを優先的にダウンロードするように指定することができます。
使い方は、
<a href="usage.php?phpLang=ja#options">--use-binary-dist (or -b) option</a>
というオプションを<code>fink</code> に指定します。
これによって時間を大幅に節約することができます。
例えば、
</p>
<pre>fink --use-binary-dist install wget-ssl</pre>
<p>あるいは</p>
<pre>fink -b install wget-ssl</pre>
<p>
とすることで、 wget-ssl が依存しているものをバイナリディストリビューションから最初にダウンロードし、
能古炉だけをソースからビルドします。
このオプションは、
<a href="conf.php?phpLang=ja">Fink 設定ファイル</a> (<code>fink.conf</code>)
あるいは <code>fink configure</code> を実行することで、常に使用するように指定することができます。
</p>
<p>
<code>fink</code> ツールの詳細は、
<a href="usage.php?phpLang=ja">"コマンドライン fink ツールの使用方法"</a>
の章を参照してください。
</p>

<h2><a name="fink-commander">3.5 Fink Commander</a></h2> 
 
<p>
Fink Commander は <code>apt-get</code> と <code>fink</code> の Aqua インターフェイスです。
Binary メニューはバイナリディストリビューションの、 Source メニューはソースディストリビューションの操作を行います。
</p>
<p>
Fink Commander は Fink バイナリインストーラに付属しています。
Fink をソースからインストールした場合など、別にダウンロードしたい場合や詳しい情報は、
<a href="http://finkcommander.sourceforge.net%20">Fink Commander website</a> リンクを辿って下さい。
</p>

<h2><a name="available-versions">3.6 用意されているバージョン</a></h2>

<p>パッケージをインストールする場合、まず<a href="http://fink.sourceforge.net/pdb/index.php">Package Database</a>を確認して Fink にあるかどうか確認して下さい。
用意されているバージョンは次の行に書かれてあります:</p>
      <ul>
        <li>Binary Distribution
		  <ol>
            <li>
              <p>
                <b>0.4.1:</b> OS 10.1 用で、バイナリからインストールできるバージョン。
              </p>
            </li>
            <li>
              <p>
                <b>0.6.4:</b> OS 10.2 用で、バイナリからインストールできるバージョン。
              </p>
            </li>
            <li>
              <p>
                <b>0.7.2:</b> OS 10.3 用で、バイナリからインストールできるバージョン。
                もし、Fink を<a href="install.php?phpLang=ja#bin">更新</a>
                したなら、パッケージによっては新しいバージョンがあるかもしれません。
              </p>
            </li>
            <li>
              <p>
                <b>0.8.0:</b> OS 10.4 用で、バイナリからインストールできるバージョン。
                もし、Fink を<a href="install.php?phpLang=ja#bin">更新</a>
                したなら、パッケージによっては新しいバージョンがあるかもしれません。
              </p>
            </li>
          </ol>
          
        </li>
      </ul>
      <ul>
        <li>CVS/rsync Distributions
          <ol>
            <li>
          <p>
            <b>10.2-gcc3.3 stable:</b>
            これは、OS 10.2 と Developer Tools の <code>gcc 3.3</code> アップデートの組み合わせにむけた、
            安定したソースツリーからインストールされる最新の安定バージョンです。
            このバージョンをインストールするには、 <a href="http://fink.sourceforge.net/doc/cvsaccess/index.php">CVS</a>
            または rsync　でのアクセスが必要です。
            <code>gcc 3.3</code> アップデートを当てていない場合、このバージョン (あるいはパッケージも) は見えないかもしれません。
          </p>
          <p>
            注記: 他のプロジェクトの場合と異なり、 Fink はパッケージの最新の安定板を、テストが必要なバージョン
            (下記を参照) と同様に、CVS で配布しています。
            CVS または rsync 更新をすることで、最新の安定板を、バイナリ配布が更新される前に
            使うことができます。
          </p>
            </li>
            <li>
          <p>
            <b>10.3 stable:</b>
            これは、OS 10.3 用に安定したソースツリーからインストールされる最新の安定バージョンです。
          </p>
            </li>
            <li>
          <p>
            <b>10.4-transitional stable:</b>
            これは、OS 10.4 用に安定したソースツリーからインストールされる最新の安定バージョンです。
          </p>
            </li>
            <li>
          <p>
            <b>10.2-gcc3.3 unstable:</b>
            <code>gcc 3.3</code>. これは、OS 10.2 と <code>gcc 3.3</code> 用の unstable ソースツリーからインストールされる最新の unstable バージョンです。 
            このバージョンをインストールするには、unstable パッケージの
            <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">インストール手順</a> 
            をご覧ください。
          </p>
          <p>
            注記:  unstable は必ずしも不安定な訳ではありませんが、自己責任で使用してください。
          </p>
            </li>
            <li>
          <p><b>10.3 unstable:</b>  
            これは、OS 10.3 用に unstable ソースツリーからインストールされる最新の unstable バージョンです。
          </p>
            </li>
            <li>
          <p>
              <b>10.4-transitional unstable:</b>
            これは、OS 10.4 用に unstable ソースツリーからインストールされる最新の unstable バージョンです。
          </p>
            </li>
          </ol>
        </li>
      </ul>

<h2><a name="x11">3.7 X11 を使う</a></h2>

<p>
Mac OS X には、 X11 が数種類 (Apple X11, XFree86, X.org) あり、インストール方法も数種類 (手動、 Fink を使う) あるため、パッケージも数種類あります。
このため、 X11 アプリケーションをインストールする前に正しいものを選ぶことが重要になります。
以下がパッケージと X11 のインストール方法の一覧です:
</p>
<ul>
        <li>
          <p>
            <b>xfree86, xfree86-shlibs:</b>
            XFree86 4.3.0 (OS 10.2 のみ), 4.4.0 (10.2 または 10.3), または 4.5.0 (10.3 または 10.4) のため、両パッケージをインストール。
          </p>
        </li>
        <li>
          <p>
            <b>xorg, xorg-shlibs</b>(10.3 or 10.4)  
            X.org X11 ディストリビューションの 6.8.2 リリースは、この両パッケージをインストール。
          </p>
        </li>
        <li>
          <p>
            <b>system-xfree86 + -shlibs, -dev:</b>
            これらのパッケージは、 (Fink 0.6.2 以降では) Apple X11 や、手動でインストールした
            XFree86 や X.org が存在する場合に、自動的に生成されます。
            これらは依存性の代替物として機能します。
          </p>
        </li>
        <li>
          <p>
            <b>xfree86-base, xfree86-rootless [-threaded] + -shlibs, -dev</b>
            (10.1 または 10.2 のみ) これらのパッケージは、XFree86 4.2.1.1 (10.1 上では 4.2.0)
            を全てインストールします。
            <code>-threaded</code> 亜種は、これを必要とするアプリケーションのために提供され、
            後の XFree86 では標準的な機能です。
            <code>-rootless</code> は XDarwin ディスプレイサーバを含んでいます。
            --名称は歴史的なものです。
          </p>
          <p>
            X11 ベースのパッケージをソースからインストールするためには、
            これら６つのパッケージを全てインストールしなければなりません。
          </p>
        </li>

</ul>
<p>
X11 のインストールと使用の詳細は、
<a href="http://fink.sourceforge.net/doc/x11/">X11 on Darwin and Mac OS X ドキュメント</a>
を参照して下さい。
</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade.php?phpLang=ja">4. Fink のアップグレード</a></p>
<? include_once "../../footer.inc"; ?>


