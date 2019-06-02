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
 <a name="2019-02-25%20%E3%83%9F%E3%83%A9%E3%83%BC%E3%81%8C%E7%8F%BE%E5%9C%A8%E3%83%80%E3%82%A6%E3%83%B3"><span class="news-date">2019-02-25: </span><span class="news-headline">ミラーが現在ダウン</span></a><?php gray_line(); ?>
  <p>Fink の finkmirrors.net ドメインは現在ダウンしています。
  これは、rsync で selfupdate しているユーザーとバイナリ配布を利用しているユーザーに影響しています。</p>
  <p>Fink ディストリビューションを最新にするには、以下のコマンドを実行してください:</p>
  <ul>
    <li>rsync から git に更新方法を変えるため、 <code>fink selfupdate-git</code> を実行し、</li>
    <li>コンパイル済みパッケージのダウンロードを停止するため <code>fink configure</code> を実行します。</li>
  </ul>
  <p>ご迷惑をおかけして申し訳ございません。</p>
 
