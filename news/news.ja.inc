<a name="2014-06-04%20fink-0.36.5%20%E3%81%A8%20fink-0.37.0%20%E3%81%8C%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9%E3%81%95%E3%82%8C%E3%81%BE%E3%81%97%E3%81%9F%E3%80%8210.6%20%E3%81%AE%E5%85%AC%E5%BC%8F%E3%82%B5%E3%83%9D%E3%83%BC%E3%83%88%E3%81%8C%E7%B5%82%E4%BA%86%E3%81%97%E3%81%BE%E3%81%97%E3%81%9F%E3%80%82"><span class="news-date">2014-06-04: </span><span class="news-headline">fink-0.36.5 と fink-0.37.0 がリリースされました。10.6 の公式サポートが終了しました。</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.36.5</code> と <code>fink-0.37.0</code> が、2014年6月4日にリリースされました。
  これらの <code>fink</code> バージョンは、古い Apple Java SDK がインストールされている場合の
  10.6 上の Java 検出の修正を含みます。
  <code>fink-0.37.0</code> は、公式に OS 10.9.3 を認識します。
  さらに、Fink のコンパイルラッパーが、修正を容易にするために直接インストールされます。
  </p>
  <p>
  <code>fink-0.36.5</code> は、Fink Project による 10.6 のサポートを終了します。
  パッケージの更新を希望するユーザは、それぞれのパッケージのメンテナに連絡してください。
  メンテナのいないパッケージも、要求があれば更新されることもあります。
  </p>
 <a name="2014-04-06%20fink-0.36.4%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2014-04-06: </span><span class="news-headline">fink-0.36.4 リリース</span></a><?php gray_line(); ?>
  <p>
  <code>fink-0.36.4</code> が、2014年4月6日にリリースされました。
  この <code>fink</code> リリースにより、10.8 と 10.9 におけるバイナリ配布を再開します
  (10.6 と 10.7 も作成次第対応予定)。
  さらに、10.8 と 10.9 の Xcode 5.1 によって引き起こされた多くのビルド時の問題を解決します。
  また、OS X 10.9.2 への公式サポートを含み、
  Xcode.app がない場合の bootstrap を修正し、
  10.6 の bootstrap でのデフォルトアーキテクチャを x86_64 とします。
  </p>
  <p>
  Xcode 5.1 ビルド問題などのため、
  ユーザの皆さんが <code>fink selfupdate</code> をすることを推奨します。
  </p>
 <a name="2014-04-06%20rsync%20%E3%81%AE%E5%95%8F%E9%A1%8C"><span class="news-date">2014-04-06: </span><span class="news-headline">rsync の問題</span></a><?php gray_line(); ?>
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
  または <code>fink selfupdate-cvs</code> を実行して、更新方法を変えてください。
  </p>
 
