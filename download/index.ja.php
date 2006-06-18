<?
$title = "Download Quick Start";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2006/06/18 18:15:32 $';

include "header.inc";
?>


<h1>Fink のダウンロード</h1>
<p>
Fink をインストール、アップグレードする方法はたくさんありますが、
初めての方には、このページの方法をお勧めします。
より詳しい情報は <a href="overview.php">概要</a> と
<a href="upgrade.php">アップグレード表</a> をご覧下さい。
</p>

<h2>Quick Start</h2>
<p>
初めてですか?
はじめの一歩では手軽にバイナリリリースをインストールする方法を解説します。
</p>
<? 
include "../fink_version.inc";
?>

<ol>
<li><p>
インストーラディスクイメージをダウンロード:<br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-PowerPC-Installer.dmg?download">Fink
<? print $fink_version; ?> バイナリインストーラ (PowerPC)</a> - <? print $dmg_size; ?><br>
<a href="http://prdownloads.sourceforge.net/fink/Fink-<? print $fink_version; ?>-Intel-Installer.dmg?download">Fink
<? print $fink_version; ?> バイナリインストーラ (Intel)</a> - <? print $intel_dmg_size; ?><br>
(10.3 の場合は <a href="http://prdownloads.sourceforge.net/fink/Fink-0.7.2-Installer.dmg?download">Fink
0.7.2</a> をダウンロードして下さい)<br>
(10.2 の場合は <a href="http://prdownloads.sourceforge.net/fink/Fink-0.6.4-Installer.dmg?download">Fink
0.6.4</a> をダウンロードして下さい)<br>
(10.1 の場合は <a href="http://prdownloads.sourceforge.net/fink/Fink-0.4.1-installer.dmg?download">Fink
0.4.1</a> をダウンロードして下さい)
</p>
</li>
<li><p>
&quot;Fink-<? print $fink_version; ?>-Installer.dmg&quot; をダブルクリックしてディスクイメージをマウントします。
次に、 &quot;Fink <? print $fink_version; ?> Installer.pkg&quot; パッケージをダブルクリックします。
後は画面に従って下さい。
</p></li>
<li><p>
インストールの最後に ターミナル.app が開き、 pathsetup
ユーティリティが自動的に実行されます。
シェルの設定ファイルを書き換えるかどうか聞かれます。
ユーティリティが終了すると、ウィンドウが閉じて準備完了!
</p></li>
<li>
<p>
途中で何らかの問題が発生した場合、インストーラディスク内の 
pathsetup アプリケーションを再実行することができます。
あるいは、以下のコマンドでも (ターミナル.app からコマンドラインで) 実行されます。
</p>
<pre>open /sw/bin/pathsetup.command &lt;RETURN&gt;</pre>
<p>
(このステップはシステム上のほかのユーザーも実行する必要があります。
各ユーザーは自分のアカウントで pathsetup を実行しなければなりません。)
</p>
<p>
pathsetup がエラーメッセージを出力する場合、
User's Guide の <a href="../doc/users-guide/install.php#setup">2.3 &quot;環境の設定&quot;</a>
などのドキュメントを参照して下さい。</p>
</li>
<li><p>
新規にターミナル.app ウィンドウを開き、&quot;<code>fink scanpackages; fink index</code>&quot; を入力します。
あるいは、 Fink Commander GUI アプリケーションを (ディクイメージからではなく、システム上のフォルダから) 起動し、メニューの
<em>Source-&gt;scanpackages</em> を実行し、次に <em>Source-&gt;Tools-&gt;index</em> を実行します。
</p>
</li>
<li><p>
リリース以降の変更を反映させるため、
上記のコマンドを実行後に<code>fink</code> パッケージを更新します。
この後で他のパッケージをインストールすることができます。
インストールの方法はいくつかあり:
<ul>
<li>
<p>
同梱の Fink Commander を使ってパッケージを選択しインストールする。
Fink Commander は使いやすい GUI を提供します。
これは初心者でコマンドラインに慣れていない方には最適な方法です。
Fink Commander にはバイナリとソースメニューがありますが、 
Developer Tools がインストールされていない場合や自分でビルドしたくない場合は、バイナリしか使うことはできません。
</p>
<ul><li><p>
Fink Commander での <code>fink</code> のバイナリ更新は:</p>
<ol>
<li>Binary-&gt;Update descriptions</li>
<li><code>fink</code> パッケージを選択</li>
<li>Binary-&gt;Install</li>
</ol></li>
<li><p>
Fink Commander での <code>fink</code> のソース更新は:</p>
<ol>
<li>Source->Selfupdate</li> 
<li>Tools->Interact with Fink...
<li>&quot;Accept default response&quot; が選択されていることを確認し、 &quot;Submit&quot; をクリック</li>
<li><code>fink</code> と他の base パッケージが自動的に更新されます</li>
</ol></li></ul>
<p>
これで <code>fink</code> が更新されましたので、他のパッケージを更新することができます。</p>  
<ul>
<li>バイナリからインストールする場合、パッケージを選択後 Binary-&gt;Install</li>
<li>ソースからインストールする場合、パッケージを選択後 Source-&gt;Install</li>
</ul>
</li>
<li>
<p>
apt-get を使う。
apt-get はバイナリパッケージを自動的に取得してインストールするので、コンパイルを必要としません。
Developer Tools がインストールされていない場合が、この方法か前述の Fink Commander バイナリ方法しか使えません。
</p>
<p>
<code>fink</code> を更新するには、ターミナル.app を開いて、
<code> sudo apt-get update ; sudo apt-get install fink</code>
と実行します。</p>
<p>
<code>fink</code>の更新が終わったら、他のパッケージを同じ方法でインストールすることができます。
例えば、 Gimp をインストールするのは <code>sudo apt-get install gimp</code> です。
全ての fink パッケージがバイナリ化されている訳ではないので注意して下さい。
</p>
</li>
<li>
<p>ソースからインストール (<!--start translation -->XCode Tools [１０．２では Developer Tools] がインストールされている必要があります<!-- end translation -->).
。
<code>fink</code> の更新には <code>fink selfupdate</code> を実行します。
プロンプトでは option (1), &quot;rsync&quot; を選択します。
これで自動的に <code>fink</code>  パッケージが更新されます。
</p>
<p>
<code>fink</code>の更新が終わったら、 &quot;<code>fink install</code>&quot; でソースの取得とコンパイルができます。
例えば、 Gimp をインストールするのは <code>fink install gimp</code> です。
全ての fink パッケージがバイナリ化されている訳ではないので注意して下さい。
</p> 
</li> 
</ul>

</li> 
</ol>

<h2>この他のインストール</h2>
<h3>XCode Tools/Developer Tools</h3>
<p>
バイナリパッケージを使っているだけでは、制限されていると感じるかもしれません。
ソース形態に比べ、バイナリ形態で配布されているパッケージの数は少なく、またバイナリバージョンは古いことが多いです。
パッケージをソースからビルドするには、 Developer Tools (10.3 以降は XCode Tools) をインストールする必要があります。
</p>
<p>
通常、Developer Tools/XCode Tools のあるバージョンは、OS インストールディスクに入っていますが、新しいものが必要かもしれません。
<a href="http://connect.apple.com">Apple Developer Connection</a> で無料登録後、新しいバージョン (あればアップデート) をダウンロードしてください。
</p>
<table>
  <caption>推奨される Developer Tools のバージョン</caption>
  <tbody>
    <tr>
      <td>10.2</td>
      <td>December 2002 Developer Tools と August 2003 <code>gcc3.3</code> updater</td>
    </tr>
    <tr>
      <td>10.3</td>
      <td>XCode 1.5 と November 2004 <code>gcc3.3</code> updater</td>
    </tr>
    <tr>
      <td>10.4 on PowerPC</td>
      <td>XCode 2.2.1 と XCode Legacy Tools ( ビルド時に <code>gcc3.1</code> または <code>gcc2.95</code> が必要なパッケージ)</td>
    </tr>
    <tr>
      <td>10.4 on Intel</td>
      <td>XCode 2.2.1</td>
    </tr>
  </tbody>
</table>
<h3>X11</h3>
<p>
Fink では、グラフィカルユーザーインターフェイス (GUI) を持つほとんど全てのアプリケーションは、いずれかの X11 を必要とします
(なぜなら、ほとんどは GUI オプションとしてそれしかないプラットフォームで開発されたものが多いので)。
</p>
<p>Apple は、OS 10.3 と 10.4 には 独自の X11 を提供しています。
これが一番簡単な方法で、ふたつに分かれています:
</p>
      <ul>
        <li><em>X11User</em> パッケージは、Apple X11 を実行するのに必要なものが入っています。
        10.3 では OS インストールディスクに、10.4 はオプションインストールになります。
        </li>
        <li><em>X11SDK</em> は、開発用ヘッダを含んでいます。
        これは、 X11 を使うものをソースからビルドする場合に必要です。
        このパッケージは XCode Tools の一部として提供され、 XCode 2.x ではデフォルトでインストールされます。
        </li>
</ul>
<p>
X11 をインストールしたら、 Fink は自動的に登録します。
何か問題がありましたら、まず X11 インストール問題の
<a href="http://fink.sourceforge.net/faq/usage-packages.php?phpLang=ja#apple-x11-wants-xfree86">FAQ </a> を参照ください。</p>

<h2>その他の情報</h2>
<p>
詳細や他の情報については、
<a href="../faq/index.php?phpLang=ja">F.A.Q.</a>
と
<a href="../doc/index.php?phpLang=ja">各種文書</a>
をご覧下さい。
これでもまだ疑問がありましたら、 <a
href="../help/index.php?phpLang=ja">ヘルプページ</a>
をご覧下さい。
</p>
<p>
<a href="../lists/fink-announce.php">fink-announce mailinglist</a>
ではリリースの公表をしていますので、興味のある方は購読して下さい。
</p>

<p>
インストーラディスクにあるパッケージのソースコードは、
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-<? print $fink_version; ?>/main/source/base/">このサイト</a>
からダウンロードすることができます。
</p>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include "footer.inc";
?>
