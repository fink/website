<?php
$title = "ソースリリースのダウンロード";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2019/01/19 10:11:12 $';

include "header.inc";
?>

<h1>Fink ソースリリースのダウンロード</h1>

<h2>OS X 10.4 以降:</h2>

<p>
ソース tarball には、 <em>fink</em> パッケージマネージャーが含まれています。
インストールすることで、パッケージ記述ファイルとパッチが使うことが可能になります。
パッケージマネージャーは、これらを用いて公式配布サイトまたは Fink プロジェクトのミラーサイトからソースをダウンロードし、
ローカルマシン上でビルドを行います。
</p>

<p>現在のバージョン <em>fink-<?php print $fink_tool_version; ?></em>
は、
<?php print $fink_tool_release_date; ?>
にリリースされました。</p>

<ul>
	 <li>
OS X 10.9-10.14 では、
<a href="https://github.com/fink/scripts/releases/latest">helper script</a>
を使うことができます。
これは、下のダウンロードとビルドを自動化したものです。
	 </li>
	 <li>
OS X 10.9-10.14 で手動でインストールするには、
<?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-" . $fink_tool_version . ".tar.gz", "fink-" . $fink_tool_version . ".tar.gz", "/downloads/FinkSOURCE") ?> - <?php echo $fink_tool_tarball_k ?>K<br>
をお使いください。
     </li>     
	 <li>
OS X 10.7-8 は、
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.38.7.tar.gz", "fink-0.38.7.tar.gz", "/downloads/FinkSOURCE") ?> - 1185K<br>
をお使いください。
	 </li>
     <li>
OS X 10.6 は、
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.36.5.tar.gz", "fink-0.36.5.tar.gz", "/downloads/FinkSOURCE") ?> - 1176K<br>
をお使いください。
     </li>
     <li>
OS X 10.5 は、
  <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.34.10.tar.gz", "fink-0.34.10.tar.gz", "/downloads/FinkSOURCE") ?> - 1268K<br>
をお使いください。
     </li>
     <li>
OS X 10.4 は、
 <?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-0.30.2.tar.gz", "fink-0.30.2.tar.gz", "/downloads/FinkSOURCE") ?> - 1188K<br>
をお使いください。
     </li>
</ul>

<p>
以下の手順で、適切なコマンドラインツールをする必要があります。
(参考 <a href="./index.en.php#additionaldownloads">the Quick Start page</a>) :</p>
<ul>
<li><p><em>10.9-10.14:  </em>ターミナルで <code>sudo xcode-select --install</code> を実行し、Install をクリックする。</p></li>
<li><p><em>10.7-10.14:  </em>developer.apple.com から手動でダウンロードする。OS のバージョンにあったものを選ぶこと。</p></li>
<li><p><em>10.7-10.8:  </em> XCode をインストールし、 <strong>初期設定</strong> の <em>Downloads</em>タブからコマンドラインツールをインストールする。</p></li>
<li><p><em>10.6:  </em> XCode をインストールする。</p></li>
</ul>
<p>10.7-10.14 で Xcode をフルインストールした場合、医家も実行します。</p>
<pre>sudo xcode-select -switch /Applications/Xcode.app/Contents/Developer</pre>
<p>ここで、 <em>/Applications</em> は実際のパスに置き換えます。</p>
<p><pre>sudo xcodebuild -license</pre> を実行し、Xcode ライセンスに同意します。
これをしないと、 fink のビルド用ユーザーが機能しません。</p> 
<p>(訳註: このほか、 JRE と XQuartz も必要になります。)</p>
<p>まだ解凍していない場合、<?php print $fink_tool_version; ?>.tar.gz を解凍します。
解凍するには、以下のコマンドをターミナルウィンドウに打ち込みます。
(「ダウンロード」フォルダにダウンロードされたと仮定してます。環境が異なる場合は適宜修正してください。):</p>

<pre>cd $HOME/Downloads</pre>
<p>として</p>
<pre>tar -xvf fink-<?php print $fink_tool_version; ?>.tar.gz</pre>
<p>または</p>
<pre>tar -xvf fink-<?php print $fink_tool_version; ?>.tar</pre>
<p>
とします。
Safari などでは、すでに部分的に開かれているため、後者になっていることがあります。</p>

<p>次に、以下のコマンドをターミナルウィンドウ内で実行します:</p>

<pre>cd fink-<?php print $fink_tool_version; ?></pre>
<pre>./bootstrap</pre>

<p>これで bootstrap が始まり、 Fink の基本設定をインストールします。
もし、 <em>/sw</em> 以外の場所にインストールしたい場合は、</p>
<pre>./bootstrap /path</pre>
<p>(<em>/path</em> をインストールしたいパスに変更する)。</p>
<p>インストール終了後、</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>とすることで、Fink の環境を設定します。
(/sw にインストールした場合)
新しいターミナルウィンドウを開くと、これらの環境設定を使用します。
<em>fink</em> とベースパッケージがインストールされたら、:</p>

<pre>fink selfupdate-rsync</pre>
<pre>fink index -f</pre>
<p>または</p>
<pre>fink selfupdate-git</pre>
<pre>fink index -f</pre>

<p>とすることで、パッケージ記述ファイルをパッチをダウンロードします。
ほとんどの場合、<code>rsync</code> の方を <code>git</code> よりも勧めます。</p>

<p>インストール方法と使用方法は、配布 tarball にも含まれています。
どうぞこれらを読んでください。
Fink は、ワンクリックで何でもするものではありません。
README, INSTALL, USAGE はテキストファイル形式
(コマンドラインから読むためのものです)
と HTML 形式 (ブラウザで読んだり、印刷用)があります。
これらは、
<a href="../doc/index.php">文書</a>
にもあります。</p>

<p>リリースのお知らせを知りたい方は、<a
href="../lists/fink-announce.php">fink-announce mailinglist</a>
に登録してください。
</p>



<h2>OS X 10.5 ポイント・リリース:</h2>

<p>
ソース・ポイント・リリースは、 <em>fink</em> パッケージマネージャーに加えて、
パッケージ記述ファイルとパッチが含まれています。
パッケージマネージャーは、これらを用いて公式配布サイトまたは Fink プロジェクトのミラーサイトからソースをダウンロードし、
ローカルマシン上でビルドを行います。
</p>

<p>Fink <?php print $fink_version; ?> は、
<?php print $release_date; ?>
にリリースされました。</p>

<ul><li>
<?php analytics_download_link("https://downloads.sourceforge.net/fink/fink-" . $fink_version . "-full.tar.gz", "fink-" . $fink_version . "-full.tar.gz", "/downloads/FinkFullSOURCE") ?> - 3524k<br>
</ul>

<p>さらに、 Xcode Tools をインストールする必要があります 
(参考 <a href="./index.en.php#additionaldownloads">the Quick Start page</a>)。</p>

<p>自動的に解凍されていない場合は、まず解凍します。</p>

<pre>tar -xvzf fink-<?php print $fink_version; ?>-full.tar.gz</pre>

<p>または</p>

<pre>tar -xvf fink-<?php print $fink_version; ?>-full.tar</pre>

<p>Safari などでは、すでに部分的に開かれているため、後者を使用します。
ターミナルウィンドウ内で <em>fink-<?php print $fink_version;
?></em> に入り、</p>

<pre>./bootstrap</pre>

<p>これで bootstrap が始まり、 Fink の基本設定をインストールします。
もし、 <em>/sw</em> 以外の場所にインストールしたい場合は、</p>
<pre>./bootstrap /path</pre>
<p>(<em>/path</em> をインストールしたいパスに変更する)。</p>
<p>インストール終了後、</p>

<pre>/sw/bin/pathsetup.sh</pre>

<p>とすることで、Fink の環境を設定します。
(/sw にインストールした場合)
新しいターミナルウィンドウを開くと、これらの環境設定を使用します。
<em>fink</em> とベースパッケージがインストールされたら、:</p>

<pre>fink selfupdate</pre>

<p><em>rsync</em> または <em>git</em> のどちらかを選択し、</p>

<pre>fink index -f</pre>

<p>として</p>

<pre>fink selfupdate-rsync</pre>

<p>または</p>

<pre>fink selfupdate-git</pre>

<p>とすることで、パッケージ記述ファイルをパッチをダウンロードします。
ほとんどの場合、<code>rsync</code> の方を <code>git</code> よりも勧めます。</p>


<p>インストール方法と使用方法は、配布 tarball にも含まれています。
どうぞこれらを読んでください。
Fink は、ワンクリックで何でもするものではありません。
README, INSTALL, USAGE はテキストファイル形式
(コマンドラインから読むためのものです)
と HTML 形式 (ブラウザで読んだり、印刷用)があります。
これらは、
<a href="../doc/index.php">文書</a>
にもあります。</p>

<p>リリースのお知らせを知りたい方は、<a
href="../lists/fink-announce.php">fink-announce mailinglist</a>
に登録してください。
</p>

<?php
include "footer.inc";
?>
