<a name="2014-04-06%20fink-0.36.4%20released"><span class="news-date">2014-04-06: </span><span class="news-headline">fink-0.36.4 released</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.36.4</code> が、2014年4月6日にリリースされました。
  この <code>fink</code> リリースにより、10.8 と 10.9 におけるバイナリ配布を再開します
  (10.6 と 10.7 も作成次第対応予定)。
  さらに、10.8 と 10.9 の Xcode 5.1 によって引き起こされた多くのビルド時の問題を解決します。
  また、OS C 10.9.2 への公式サポートを含み、
  Xcode.app がない場合の bootstrap を修正し、
  10.6 の bootstrap でのデフォルトアーキテクチャを x86_64 とします。
  </p>
  <p>
  Xcode 5.1 ビルド問題などのため、
  ユーザの皆さんが <code>fink selfupdate</code> をすることを推奨します。
  </p>
 <a name="2014-04-06%20rsync%20issue"><span class="news-date">2014-04-06: </span><span class="news-headline">rsync issue</span></a><?php gray_line(); ?>
  <p>
  マスター rsync サーバに問題が発生しており、まだ解決されていません。
  残念なことに、ほかのサーバにも影響しており、２つだけ動作しています。
  <code>/sw/etc/fink.conf</code> を管理者権限で開き、
  <code>Mirror-rsync</code> を下記のいずれかに設定してください。
  </p>
<pre>
rsync://ber.de.eu.finkmirrors.net/finkinfo/
rsync://hnd.jp.asi.finkmirrors.net/finkinfo/
</pre>
  <p>
  or use <code>fink selfupdate-cvs</code> to switch your update method.
  </p>
 <a name="2013-12-30%20fink-0.36.3.1%20released"><span class="news-date">2013-12-30: </span><span class="news-headline">fink-0.36.3.1 released</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.36.3.1</code> は、2013年12月30日にリリースされました。
  このリリースは、OS X 10.9.1 への公式サポートを含み、
  また 64 bit プラットフォーム上で、
  公式または非公式のバイナリディストリビューションへ直接アクセスできない問題を修正します。
  さらに、fink-0.36.3 で導入された 32 bit プラットフォームの問題も修正します。  </p>
 
