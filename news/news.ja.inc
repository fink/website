<a name="2007-12-10%20Leopard,%20X11,%20and%20Fink"><span class="news-date">2007-12-10: </span><span class="news-headline">Leopard, X11, and Fink</span></a><?php gray_line(); ?>
    <p>
    Leopard X11 を更新したい方は、
    <a href="http://xquartz.macosforge.org/downloads/Xquartz-1.3.0-apple-fink.bz2">Fink-friendly update to Xquartz</a>
    をお使い下さい。
    既に macosxforge.org の X11-2.1.0.1.pkg を適用された方は、<b>必ず</b> Fink-対応の Xquartz をお使い下さい。
      (注記: X11-2.1.1.pkg リリースは現在保留中ですが、これは Xquatz のパッチが不要になりです。
      X11 2.1.1 以降を使う場合は Xquartz パッチを適用する必要は<b>ありません</b>。)</p>
    <p><b>2007-12-11追記:</b> The X11 2.1.1 リリースは、 <a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">Xquartz リリースページにあります</a>.  
    X11-2.1.0.1.pkg にパッチを当てて利用されている方、 パッチ適用後の　macosxforge.org の Xquartz-1.3.0-apple-fink
    ファイルを使われている方は、<b>2.1.1 以降にアップグレードして</b>から Fink をお使い下さい。
    このリリースは、 fink 専用の Xquartz も含めたこれまでの全てのリリースの後任リリースです。</p>
  <a name="2007-11-18%20PDB%20Website%20Down"><span class="news-date">2007-11-18: </span><span class="news-headline">PDB Website Down</span></a><?php gray_line(); ?>
    <p>
    パッケージデータベースのウェブが現在停止しており、ご不便をかけております。
    できる限り早く解決できるよう復旧に向けて作業中です。
    ハードウェアとソフトウェアのアップグレードが完了するまでお待ち下さい。
    </p>
<p><b>2007年12月10日追記:</b> パッケージデータベースは、より強力になって帰ってきました。</p>
  <a name="2007-10-26%20%E5%BD%93%E9%9D%A2%E3%81%AE%20Leopard%20%E3%82%B5%E3%83%9D%E3%83%BC%E3%83%88"><span class="news-date">2007-10-26: </span><span class="news-headline">当面の Leopard サポート</span></a><?php gray_line(); ?>
    <p>The Fink Project は Mac OS X Leopard (10.5) のサポートを開始します。</p>
<p>10.5 を利用されている方は、バイナリディストリビューションができるまでは、bootstrap で行う必要があります。
fink-0.27.7 を<a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">ここから</a>ダウンロードしてください。</p>
<p>10.4から10.5への更新は、 <code>fink selfupdate</code> を実行することで <code>fink-0.27.7</code> に更新されます。
10.5 でこれを行う場合は、 XCode 3.0 がインストールされていることを確認してください。
10.5 がインストールされましたら、<code>fink reinstall fink</code> を実行してください。</p>
<p>10.3 から 10.5 へ直接移行する方法は今のところありません。
どうしても使いたい方は、 <code>fink-0.27.7</code> tarball をダウンロードし、上述のように Fink ツリーを　bootstrap する必要があります。</p>
<p><b>2007年10月29日追記:</b> アップグレードした場合、 <code>fink cleanup</code> を実行すると<b>全ての</b> .deb ファイルが削除されます。
この問題は次回のアップデート時に解決される予定です。</p>

