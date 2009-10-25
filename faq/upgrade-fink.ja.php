<?
$title = "F.A.Q. - Fink のアップグレード";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2009/10/25 05:21:38';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="usage-fink.php?phpLang=ja" title="Fink のインストール、使用、メンテナンス"><link rel="prev" href="mirrors.php?phpLang=ja" title="Fink ミラー">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 4. Fink のアップグレード (バージョン固有の問題対処法)</h1>


    <a name="leopard-bindist1">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.1: Fink doesn't see new packages even after I've run an rsync or cvs selfupdate.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is a current issue for people on OS 10.5 using the binary installer. Check your version:</p><pre>fink --version</pre><p>If you currently have <code>fink-0.27.13-41</code>, which is the version that comes
	with the installer, or <code>fink-0.27.16-41</code>, then there are a couple of options.</p><ul>
	  <li>
	    <b>rsync (preferred):</b>  Run the sequence below
	    <pre>fink selfupdate
fink selfupdate-rsync
fink index -f
fink selfupdate</pre>
	  </li>
	  <li>
	    <b>cvs (alternate):</b>  Run
	    <pre>fink selfupdate-cvs
fink index -f
fink selfupdate</pre>
	  </li>
	</ul><p>Either will bring you the newest <code>fink</code> version.</p></div>
    </a>
    
    <a name="leopard-bindist2">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.2: When I try to install stuff I get 'Can't resolve dependency "fink (&gt;= 0.28.0)"'</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Apply the fix from <a href="#leopard-bindist1">the prior entry.</a></p></div>
    </a>

<a name="fink-0220">
	<div class="question"><p><b><? echo FINK_Q ; ?>4.3: 長いこと Fink からのパッケージ更新がありませんでしたが</b></p></div>
	<div class="answer"><p><b><? echo FINK_A ; ?>:</b> バージョンを確認してください:</p><pre>fink --version</pre><p>
			rsync selfupdate が動作しないという既知の問題が <code>fink-0.22.0</code> にあります。
			これを直すために、 CVS selfupdate を行います
		</p><pre>fink selfupdate-cvs  </pre><p>
			これにより <code>fink</code> が新しくなります。
			この語、 rsync selfupdate に戻すようおすすめします。
		</p><pre>fink selfupdate-rsync</pre></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=ja">5. Fink のインストール、使用、メンテナンス</a></p>
<? include_once "../footer.inc"; ?>


