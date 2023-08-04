<?php
$title = "F.A.Q. - Fink のアップグレード";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 04:42:29';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="usage-fink.php?phpLang=ja" title="Fink のインストール、使用、メンテナンス"><link rel="prev" href="mirrors.php?phpLang=ja" title="Fink ミラー">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 4. Fink のアップグレード (バージョン固有の問題対処法)</h1>


    <a name="leopard-bindist1">
      <div class="question"><p><b><?php echo FINK_Q ; ?>4.1: rsync や cvs の selfupdate を実行しても、Fink が新しいパッケージを読み込んでくれません。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> これは OS 10.5 バイナリインストーラを使用している際の問題です。まず、バージョンを確認し：</p><pre>fink --version</pre><p>もし <code>fink-0.27.13-41</code> であれば、これはインストーラのものです。
	また、<code>fink-0.27.16-41</code>の場合も同様に、</p><ul>
	  <li>
	    <b>rsync (推奨):</b> 下記の手順で実行してください
	    <pre>fink selfupdate
fink selfupdate-rsync
fink index -f
fink selfupdate</pre>
	  </li>
	  <li>
	    <b>cvs (別の方法):</b> 下記の手順で実行してください
	    <pre>fink selfupdate-cvs
fink index -f
fink selfupdate</pre>
	  </li>
	</ul><p>どちらも、最新バージョンの <code>fink</code> に更新します。</p></div>
    </a>
    
    <a name="leopard-bindist2">
      <div class="question"><p><b><?php echo FINK_Q ; ?>4.2: 何かをインストールしようとすると、'Can't resolve dependency "fink (&gt;= 0.28.0)"' というエラーが出ます。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> <a href="#leopard-bindist1">上述の FAQ</a> をしてください。</p></div>
    </a>
    <a name="stuck-gettext">
      <div class="question"><p><b><?php echo FINK_Q ; ?>4.3: Fink が、'sudo apt-get install libgettext3-dev=0.14.5-2' を実行して問題のある依存性を解消するように言ってきますが、まだおかしいです。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> <b>libgettext3</b> のパッケージ記述ファイルのタイムスタンプに問題があります: 0.14.5-2 は古いバージョンでです。</p><pre>fink index -f
fink update libgettext3-dev	
	</pre><p>と実行し、パッケージ記述ファイルのキャッシュを更新した後、パッケージを更新してください。</p></div>
    </a>
    <a name="stuck-dpkg">
      <div class="question"><p><b><?php echo FINK_Q ; ?>4.4: Fink が 'Can't resolve dependency "dpkg (&gt;= 1.10.21-1229)" for package "dpkg-base-files-0.3-1"' って言うてはりますけど、  
          どないしたらよろしいですやろ？
          </b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 更新された <b>dpkg</b> パケージ記述にタイムスタンプの問題があります。</p><pre>fink index -f
fink selfupdate
	</pre><p>と実行し、パッケージ記述のキャッシュを更新し、 <code>dpkg</code> と <code>dpkg-base-files</code> をインストールしてください。</p></div>
    </a>
<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=ja">5. Fink のインストール、使用、メンテナンス</a></p>
<?php include_once "../footer.inc"; ?>


