<a name="2010-04-01%20%E6%96%B0%E3%81%97%E3%81%84%E6%96%B9%E5%90%91"><span class="news-date">2010-04-01: </span><span class="news-headline">新しい方向</span></a><?php gray_line(); ?>
			<p>フィンクのプロジェクトは未来を見、それは平ら、ポータブルである。</p>
			<p>有効な2010年5月1日、私達は私達のMacの努力の作業を終えようと思って、iPadのための開発、またiPodのiPhoneおよび接触に切替える。</p>
			<p>10.4 10.5のMacのユーザーのためのフィンクの分布は、10.6はまだ使用できが、プロジェクトもはやアップデートを提供しない。</p>
			<p>サポートを長年かけてありがとう、大画面のフィンクを楽しみ続けることができるように領域で使用できるときiPadを取ることを私達は望む。</p>
		<a name="2009-10-30%20%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E5%BE%A9%E5%B8%B0%E3%80%82"><span class="news-date">2009-10-30: </span><span class="news-headline">サーバー復帰。</span></a><?php gray_line(); ?>
      <p>
      ユーザーサービスが復帰しました。
      10月28日に、ウェブサイト及び一部のミラー (rsync, source files, binary distribution) 
      が復帰し、
      10月30日にはすべての rsync ミラーが復帰しました。
      重ねますが、ご迷惑と、
      これからのご支持をお願い申し上げます。
      </p>
    <a name="2009-10-24%20Server%20%E5%95%8F%E9%A1%8C"><span class="news-date">2009-10-24: </span><span class="news-headline">Server 問題</span></a><?php gray_line(); ?>
	  <p>
	  以前よりサーバーに問題があり、結果として Fink のウェブサイトとバイナリディストリビューションがダウンしております。
	  rsync サーバも停滞しています。
	  現在復旧作業中ですが、現在のところ以下のように対処してください。
	  </p>
	  <ul>
		<li>(Web site) ウェブサイトは、<a href="http://fink.thetis.ig42.org">http://fink.thetis.ig42.org</a>
		の仮サーバーをご覧ください。</li>
		<li>(selfupdate) パッケージを更新する selfupdate は、CVS をお使いください。
		rsync より時間がかかりますが、CVS は SourceForge.net にホストされているため、正常に作動しています。
		後ほど、rsync に戻すことができます。
		CVS に変更するには、<code>fink selfupdate-cvs</code>　とします。</li>
		<li>(source files) <code>/sw/etc/fink.conf</code> を開き、<code>Mirror-apt:
		http://bindist.finkmirrors.net/bindist</code> を <code>Mirror-apt:
		http://fink-bindist.gecko.ig42.org</code> としてください。
		</li>
        <li>(bindist) <code>/sw/etc/fink.conf</code>を開き、<code>Mirror-apt:</code> で始まる行を <code>Mirror-apt:
        http://fink-bindist.gecko.ig42.org</code> としてください。</li>

        <li>(bindist) <code>/sw/etc/apt/sources.list</code> を開き、
        <code>http://bindist.finkmirrors.net/bindist</code> という行を
        <code>http://fink-bindist.gecko.ig42.org</code> としてください。</li>

        <li>(bindist) <code>fink scanpackages</code> を実行してください。</li>
	  </ul>
      <p>ご迷惑をおかけしていることをお詫び申し上げます。</p>
	
