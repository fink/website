<a name="2006-08-19%20Server%20down;%20workarounds%20available"><span class="news-date">2006-08-19: </span><span class="news-headline">Server down; workarounds available</span></a><?php gray_line(); ?>
<p><b> Update: 21 August 2006: </b> The server has been restored.</p>
	<p> 
The server which hosts four important
fink services (the rsync update, the binary distribution, the "master mirror" 
of source files, and the package database) is down at the moment.  We are
hoping that the server will be restored as early as Monday, August 21,
but are providing these workarounds for use during the period of outage.
</p><p>
To update fink, you must either select an rsync mirror other than the
primary one (see the next paragraph), or use the command
<code>fink selfupdate-cvs</code>.  You only need to give this command
once; subsequent updates will continue to be performed using CVS.
When the server is restored, you can revert to rsync updating by means
of the command <code>fink selfupdate-rsync</code>.
</p><p>
To work around the lack of the binary distribution, and the "master mirror"
of source files, run the command <code>fink configure</code>.  You should
accept the default answers to all of the questions, except the following:
when asked "Should Fink try to download pre-compiled packages from 
the binary distribution if available?" answer "no" (to disable the binary
distribution); when asked if you want to change the mirror settings,
answer "yes", and then you will be asked "What mirror order should fink use 
when downloading sources?".  The answer is "2: Search Master Mirrors last"
(to disable the automatic attempts to use the master mirror server).
Finally, if you have decided to stick with rsync for updates, when asked to
"Choose a mirror for 'RSync SelfUpdate'" you should choose one other than
rsync://master.us.finkmirrors.net/finkinfo/.  Unfortunately, other choices
might not be available to you if you are in the U.S.
</p><p>
Finally, to use the package database during the outage, you can connect
to <a href="http://lists.finkproject.org/pdb">this backup copy of the
package database</a> which is a few weeks out of date.
</p>
		<a name="2006-07-24%20%E6%B3%A8%E6%84%8F:%20%2210.4-transitional%22%20%E3%83%84%E3%83%AA%E3%83%BC%E3%81%AE%E3%82%B5%E3%83%9D%E3%83%BC%E3%83%88%E3%81%AF2006%E5%B9%B48%E6%9C%881%E6%97%A5%E3%81%AB%E7%B5%82%E4%BA%86"><span class="news-date">2006-07-24: </span><span class="news-headline">注意: "10.4-transitional" ツリーのサポートは2006年8月1日に終了</span></a><?php gray_line(); ?>
			<p>

				"10.4-transitional" ツリーは、 GCC 3.3 (Mac OS X 10.3 のデフォルトコンパイラ) と
				GCC 4.0 (Mac OS X 10.4 のデフォルトコンパイラ) のバイナリ間の非互換性問題の暫定的解決策でした。
				ようやく Fink は GCC 4.0 へ移行する作業が終了し、 "10.4" ツリーへ移行していただくよう、
				"10.4-transitional" ツリーの2006年8月1日をもってサポートを終了いたします。
			</p>
			<p><b>"fink --version" が "0.8.1.cvs" または "0.8.1.rsync" と表示する場合、特にすることはありません。</b></p>
			<p>
				<a href="<?php print $root; ?>news#2006-07-01%20July%20is%20%22Fink%20Update%20Month%22">以前述べたとおり</a>、
				"10.4" ツリーへの以降方法は2種類あります。
			</p>
			<p>
				一番簡単なのは、既存の Fink インストールを削除し、<a href="<?php print $root; ?>download">ダウンロードページ</a>から 0.8.1 インストーラを入手してインストールし直すことです。
			</p>
			<p>
				既存の Fink を残す方法は、
				<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">アップグレードスクリプト</a>
				をダウンロードし、README を読みながら既存のインストールされているものをアップグレードすることです。
				これは Fink インストールをソースから再ビルドし、全てをアップグレードします。
				インストール状況によっては、相当な時間がかかります！
			</p>
			<p>
				アップグレードスクリプトの評判は上々です。多くのユーザがこれでスイッチしています。
				それでも何か問題がありましたら、<a href="<?php print $root; ?>lists">リスト</a>にメールをしてください。
			</p>
		<a name="2006-07-24%20Fink%20Birds-of-a-Feather%20at%20OSCON%202006"><span class="news-date">2006-07-24: </span><span class="news-headline">Fink Birds-of-a-Feather at OSCON 2006</span></a><?php gray_line(); ?>
			<p>Are you at OSCON 2006?  Want to meet up?</p>
			<p>
				<a href="mailto:oscon2006@racoonfink.com">Benjamin Reed</a> (RangerRick on #fink)
				は OSCON に来ており、Fink に興味がある人も嫌いな人も大歓迎です。
			</p>
			<p>
				7月26日午後8時半、 room F150 にて Fink や Mac OS X 、その他諸々のことを話します、
			</p>
		
