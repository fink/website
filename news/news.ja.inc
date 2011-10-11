<a name="2011-09-26%20fink-0.31.2%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2011-09-26: </span><span class="news-headline">fink-0.31.2 リリース</span></a><?php gray_line(); ?>
      <p><code>fink-0.31.2</code> が、10.4/unstable と 10.7/stable に、
      2011年11月26日にリリースされました。
      このバージョンより、<code>MaxBuildJobs</code> を <code>fink configure</code>
      で設定することで、ビルド時の最大スレッド数の既定値を設定します。
      また、メンテナは、<code>PatchFile</code> を使用する際に　<code>fink</code> 
      バージョンを指定する必要がなくなり、Pel の問題も解決しています。</p>
      <p>10.4/stable にもすぐに追加される予定です。</p>
    <a name="2011-09-11%20fink-0.31.1%20released"><span class="news-date">2011-09-11: </span><span class="news-headline">fink-0.31.1 released</span></a><?php gray_line(); ?>
      <p><code>fink-0.31.1</code> が、10.4/unstable と 10.7/stable に、
      2011年11月11日にリリースされました。
      このバージョンでは、OS 10.6 を実行している 32 bit 機で、bootstrap ができない問題を修正しました。
      さらに、エラーメッセージ中の Xcode バージョンの報告に関して、
      以前の <code>fink</code> よりもしっかりした仕組みを提供しています。
      また、OS 10.7.1 をサポートする OS と認識します。</p>
      <p>10.4/stable にもすぐに追加される予定です。</p>
      <p><b>更新 2011-09-26:</b>   10.4/stable に追加されました。</p>
   <a name="2011-07-20%20Fink%20%E3%81%A8%20Lion--%E6%9B%B4%E6%96%B0"><span class="news-date">2011-07-20: </span><span class="news-headline">Fink と Lion--更新</span></a><?php gray_line(); ?>
      <p>Apple は、OS X 10.7 Lion が７月にリリースされました。
Lion がリリースされた後のことについてお知らせします。</p>
<p>まず、  <code>fink</code> コマンド自体は、Lion にアップグレードされたシステムでは動作しません。
しかし、<code>dpkg</code> コマンドで、10.6 でインストールされた Fink パッケージを解凍し、10.7 で再インストールすることは可能です。
Fink for 10.7 をインストール後、
</p>
<p><code>dpkg --get-selections | cut -f1 &gt; fink_packages.txt</code></p>
<p>でパッケージを解凍し、</p>
<p><code>cat fink_packages.txt | xargs fink install</code></p>
<p>とします。</p>
<p>Lion にアップグレード後に Fink をアップグレードするには、
<code>fink-0.31.0</code>　以降を使って
fink を bootstrap し直してください。</p>
<p>次に、目に見えない多くの変更により、10.6 に比べて 10.7 で動作するのは当面非常に少なくなります。
よって、10.6 でインストールされた Fink パッケージも、
10.7 ではインストールできないこともあります。
現在、10.7 でインストール可能なパッケージのデータベースを作成中です。
このデータベースには随時パッケージが追加されます。</p>
<p>10.7 は、システム動作に関して大きな変更が導入されています。
これにとって短期的には Fink の機能が制限されますが、
長期的には Fink がよりよく動作することになります。</p>
    
