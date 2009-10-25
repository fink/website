<a name="2009-10-24%20Server%20%E5%95%8F%E9%A1%8C"><span class="news-date">2009-10-24: </span><span class="news-headline">Server 問題</span></a><?php gray_line(); ?>
	  <p>
	  以前よりサーバーに問題があり、結果として Fink のウェブサイトとバイナリディストリビューションがダウンしております。
	  rsync サーバも停滞しています。
	  現在復旧作業中ですが、現在のところ以下のように対処してください。
	  </p>
	  <ul>
		<li>ウェブサイトは、<a href="http://fink.thetis.ig42.org">http://fink.thetis.ig42.org</a>
		の仮サーバーをご覧ください。</li>
		<li>パッケージを更新する selfupdate は、CVS をお使いください。
		rsync より時間がかかりますが、CVS は SourceForge.net にホストされているため、正常に作動しています。
		後ほど、rsync に戻すことができます。
		CVS に変更するには、<code>fink selfupdate-cvs</code>　とします。</li>
		<li><code>/sw/etc/fink.conf</code> を開き、<code>Mirror-apt:
		http://bindist.finkmirrors.net/bindist</code> を <code>Mirror-apt:
		http://fink-bindist.gecko.ig42.org</code> としてください。
		</li>
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
<a name="2009-07-25%20Fink%20Core%20Group%20changes."><span class="news-date">2009-07-25: </span><span class="news-headline">Fink Core Group changes.</span></a><?php gray_line(); ?>
      <p>
The Fink Core Group announces two new members: Alexander Hansen (<b>akh</b>)
and Augusto Devegili (<b>monipol</b>), both of whom have been very active
in fink.  Please join us in welcoming the new members!
</p><p>
The Group also announces that Christian Schaffner has stepped down,
returning to "ordinary member" status.  We thank Christian for his help
on the team over the past several years.
</p><p>
Members of the Fink project are working hard to provide user support,
to keep Fink up to date, and to prepare for the upcoming Snow Leopard
release.  More volunteers are always needed, so please consider
getting involved at some level!
</p>

