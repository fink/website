<a name="2009-10-30%20%E3%82%B5%E3%83%BC%E3%83%90%E3%83%BC%E5%BE%A9%E5%B8%B0%E3%80%82"><span class="news-date">2009-10-30: </span><span class="news-headline">サーバー復帰。</span></a><?php gray_line(); ?>
      <p>Our user services have been restored. On Oct 28th the Web site and
      some of the mirrors (rsync, source files, binary distribution) were
      restored, and on Oct 30th all of our main rsync mirrors were operational.
      Once again, we apologise for the inconvenience. Thanks for your patience
      and support.
      
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
        <li>(bindist) Edit <code>/sw/etc/fink.conf</code> and replace the line
        that starts with <code>Mirror-apt:</code> with <code>Mirror-apt:
        http://fink-bindist.gecko.ig42.org</code></li>

        <li>(bindist) Edit <code>/sw/etc/apt/sources.list</code> and replace
        <code>http://bindist.finkmirrors.net/bindist</code> with
        <code>http://fink-bindist.gecko.ig42.org</code></li>

        <li>(bindist) Run <code>fink scanpackages</code>.</li>
	  </ul>
      <p>ご迷惑をおかけしていることをお詫び申し上げます。</p>
	<a name="2009-08-28%20Fink%20on%2010.6."><span class="news-date">2009-08-28: </span><span class="news-headline">Fink on 10.6.</span></a><?php gray_line(); ?>
      <p>
Fink は、雪豹 (OS X v. 10.6) への準備を整えました。
32-bit版と64-bit版がありますので、どちらかを選択してご利用ください。
現在のところ、32-bit版の方が多くのパッケージがあります。
しかし、64-bit版は OS X および　Fink の将来の方向性を示しています。
各ユーザーがどちらかを選択するか判断してください。
32-bit版から64-bit版への「アップグレード」は<b>できません</b>。
</p><p>
現在、Snow Leopard に Fink をインストールするには、二つの方法があります。
バイナリインストーラはないので、
<b>まず Snow Leopard ディスクからオプションインストールで XCode をインストールしてください。</b>
64-bit版を使われる方、または 10.4 以前から直接アップグレードされる方は、ディストリビューション 
tarball (0.29.9 以降のバージョン) を<a href="http://sourceforge.net/projects/fink/files/fink/0.29.9/fink-0.29.9.tar.gz/download">sourceforge.net</a> からダウンロードし、fink をブートストラップしてください。
この方法は<a href="<?php print $root; ?>download/srcdist.php">こちら</a>に説明されています。
また、下記の方法で 10.5 から 32-bit版に直接アップグレードすることもできます。
(注意: リリース版ではなく開発版の fink をインストールした場合、問題が発生することがあります。
この場合、リリース版にダウングレードし、バージョン番号の高い .deb ファイルを削除してください。)
</p><p>
アップグレードするには、以下の4ステップをしてください。
<b>Step 1:</b>
<code>/sw/etc/fink.conf</code> を開き、 <code>NoAutoIndex: true</code>　という一行を追加します。
(編集するには、パーミッションを得るため <code>sudo</code> する必要があるかもしれません。)
<b>Step 2:</b> 
10.6上にあることを伝えるため、コマンド
<code>fink reinstall fink</code>
を実行します。
(もし package database corruption といったメッセージが出た場合、
<code>fink index -f</code> としてから、再び上のコマンドを実行してください。)
<b>Step 3:</b> 
<code>fink update fink</code> を実行して、10.6用の最新 fink を入手します。 
<b>Step 4:</b>
<code>fink install perl588-core</code> と実行し、OS X のアップグレード時に 
Apple が変更した perl を置き換えます。
fink パッケージが依存している可能性があるためです。
</p><p>
アップグレードした後、<code>fink configure</code>
としてきれいにすることができます。
</p><p>
fink の stable パッケージは、ほぼすべて 10.6 上でコンパイルすることが可能です。
しかし、10.5 パッケージのほんのわずかしか 10.6 で使用することができません。
近い将来、fink のパッケージデータベースが更新され、
10.6用パッケージの情報が追加されます。
あなたの使用したいパッケージがあるかどうか、パッケージデータベースをご覧ください。
</p>

