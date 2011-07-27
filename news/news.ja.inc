<a name="2011-07-20%20Fink%20and%20Lion--updated."><span class="news-date">2011-07-20: </span><span class="news-headline">Fink and Lion--updated.</span></a><?php gray_line(); ?>
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
    <a name="2011-07-16%20Fink%20%E3%81%A8%20Lion"><span class="news-date">2011-07-16: </span><span class="news-headline">Fink と Lion</span></a><?php gray_line(); ?>
      <p>Apple は、OS X 10.7 Lion を７月にリリースすると発表しました。
Lion がリリースされた後のことについてお知らせします。</p>
<p>まず、  <code>fink</code> コマンド自体は、Lion にアップグレードされたシステムでは動作しません。
しかし、<code>dpkg</code> コマンドで、10.6 でインストールされた Fink パッケージを解凍し、10.7 で再インストールすることは可能です。
Fink for 10.7 をインストール後、
</p>
<p><code>dpkg --get-selections | cut -f1 &gt; fink_packages.txt</code></p>
<p>でパッケージを解凍し、</p>
<p><code>cat fink_packages.txt | xargs fink install</code></p>
<p>とします。</p>
<p>(Lion にアップグレード後に fink をアップグレードすると、
Lion リリース直後にリリースされた新しい fink を用いて、
fink を bootstrap し直さなければ行けません。
今後の発表をお待ちください。)</p>
<p>次に、目に見えない多くの変更により、10.6 に比べて 10.7 で動作するのは当面非常に少なくなります。
よって、10.6 でインストールされた Fink パッケージも、
10.7 ではインストールできないこともあります。
現在、10.7 でインストール可能なパッケージのデータベースを作成中です。
しかし、このデータベースは Lion リリースの前にはできません。</p>
<p>10.7 は、システム動作に関して大きな変更が導入されています。
これにとって短期的には Fink の機能が制限されますが、
長期的には Fink がよりよく動作することになります。</p>
    <a name="2011-07-11%20fink-0.30.2%20%E3%83%AA%E3%83%AA%E3%83%BC%E3%82%B9"><span class="news-date">2011-07-11: </span><span class="news-headline">fink-0.30.2 リリース</span></a><?php gray_line(); ?>
      <p>2011年7月11日、<code>fink-0.30.2</code> が unstable ツリーにリリースされました。
      これは、おそらく OS 10.4 をサポートする最後のバージョンとなります。</p>
      <p>すぐに stable にもリリースされる予定です。</p>
      <p><b>Update, 2011-07-15:</b> stable にもリリースされました。</p>
    
