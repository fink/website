<a name="2019-06-02%20Fink%20mirrors%20are%20back"><span class="news-date">2019-06-02: </span><span class="news-headline">Fink mirrors are back</span></a><?php gray_line(); ?>
  <p>Thanks to the work of Fink members Chris Z and Justin H, the finkmirrors.net domain is operational once again.</p>
  <p>We are looking for new mirror owners to extend our mirroring service. If you can host a Fink mirror, see <a href="http://finkmirrors.net/">the main Fink Mirrors site</a> for instructions and requirements.</p>
  <p>Thank you for your patience.</p>
 <a name="2019-05-30%20Issues%20with%20macOS%2010.14.5"><span class="news-date">2019-05-30: </span><span class="news-headline">Issues with macOS 10.14.5</span></a><?php gray_line(); ?>
  <p>Apple's release of macOS 10.14.5 updated the system perl version from 5.18.2 to 5.18.4. This update broke bootstrapping fresh installs, as well as existing perl modules dependent on perl-5.18.2.</p>
  <p>Fixes for Fink working on macOS 10.14.5 are tracked <a href="https://github.com/fink/fink/pull/190">on GitHub</a>. </p>
  <p>We apologize for the inconvenience.</p>
 <a name="2019-03-14%20fink-0.44.1%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2019-03-14: </span><span class="news-headline">fink-0.44.1 リリース</span></a><?php gray_line(); ?>
  <p>Fink プロジェクトは、 <code>fink-0.44.1</code> をリリースしました。
  これは、基本的にバグ修正リリースで、 bootstrap と <code>Install Fink.tool</code> スクリプトを修正しています。
  さらに、バックグラウンドで最適化アップデートも追加されています。
  <code>fink selfupdate</code> を使用してインストールしてください。</p>
  <p>10.9-10.13 から 10.14 へアップデートする最適な方法は、以下の通りです:</p>
  <p>0) 10.9-10.13 を開始。まだ OS のアップデートをしないでください。</p>
  <p>1) ターミナルで、 <code>fink selfupdate</code> を実行し、 <code>fink-0.44.1</code> をインストールします。</p>
  <p>2) Mojave にアップデート。</p>
  <p>3) ターミナルで、 <code>fink reinstall fink</code> を実行します。</p>
 
