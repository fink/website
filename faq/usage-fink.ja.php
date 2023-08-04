<?php
$title = "F.A.Q. - Fink の使用方法";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="comp-general.php?phpLang=ja" title="コンパイルの問題 - 一般"><link rel="prev" href="upgrade-fink.php?phpLang=ja" title="Fink のアップグレード (バージョン固有の問題対処法)">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 5. Fink のインストール、使用、メンテナンス</h1>


<a name="what-packages">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.1: Fink がサポートしているパッケージはどのように探せますか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fink 0.2.3 以降は、 <code>list</code> コマンドがあります。
このコマンドは、あなたの Fink 環境の管理している全てのパッケージのリストを作成します。
例:
</p><pre>fink list</pre><p>バイナリ・ディストリビューションを使っている場合、 <code>dselect</code> でパッケージリストを閲覧することができます。
dselect からパッケージを選択してインストールする場合、 root 権限が必要ですので注意して下さい。</p><p>または、本サイトに <a href="http://pdb.finkproject.org/pdb/">パッケージ・データベース</a> もあります。
</p></div>
</a>
<a name="proxy">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.2: ファイヤーウォールの内側にいます。どう設定したら Fink で HTTP プロキシが使えますか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
<code>fink</code> コマンドは、明示的にプロキシを設定できます。
この設定は <code>wget</code>/<code>curl</code> に渡されます。
新規インストール時に聞かれなかった場合、または設定し直したい場合、 <code>fink configure</code> を実行することができます。
もしインストールガイドを読み、 <code>/sw/bin/init.csh</code> (または <code>/sw/bin/init.sh</code>) を使ったなら、次のようにプロキシの前にプロトコルをつけるようにして下さい。</p><pre>ftp://proxy.yoursite.somewhere</pre><p>もしこれでも問題があるようなら、システム環境設定からネットワークを選択し、プロキシのタブをクリックし、 "Use Passive FTP Mode (PASV)" がチェックされているか確認して下さい。</p></div>
</a>
<a name="firewalled-cvs">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.3: ファイヤーウォールの内側から CVS でパッケージをアップデートするにはどうしたらいいですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> パッケージ <b>cvs-proxy</b> は HTTP プロキシを介して通ります。</p><ul>
<li>
<p>
まず、 <a href="http://fink.cvs.sourceforge.net/fink/dists/10.2/unstable/main/finkinfo/devel/">cvs-proxy</a>
ファイル (.info と a .patch) をダウンロードし、ローカルツリー ( /sw/fink/dists/local/main/finkinfo/) に入れる。
</p>
</li>
<li>
<p><b>cvs-proxy</b> パッケージを、次のコマンドでインストールする:</p>
<p>
<code>fink --use-binary-dist install <b>cvs-proxy</b>
</code>
</p>
</li>
<li>
<p>次のコマンドで CVS 更新に変更する:</p>
<p>
<code>fink selfupdate-cvs</code>
</p>
<p>
<code>fink update-all</code>
</p>
</li>
</ul><p>fink がプロキシを使うように設定されていなかったら、設定を行ないます:</p><p>
<code>fink configure</code></p></div>
</a>
<a name="moving">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.4: インストール後に Fink を他の場所に移動できますか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
できません。
もちろん、 mv やファインダからファイルを動かすことはできますが、 99% の確率で動かなくなるプログラムがでてきます。
これは、全ての Unix ソフトウェアはファイルやライブラリなどを検索するのに、ハードコードのパスに依存しているからである。
</p></div>
</a>
<a name="moving-symlink">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.5: Fink をインストール後、他の場所に移動してシンボリックリンクを張ったら、動きますか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
動くかも知れない。
動くと予想されますが、どこに落し穴があるかわかったものじゃありません。
</p></div>
</a>
<a name="removing">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.6: Fink を全てアンインストールするには?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fink でインストールしたファイルはほとんど /sw (あるいはインストール時に選択した場所) にあります。
なので、 Fink を削除するには、通常このコマンドを入力します:</p><pre>sudo rm -rf /sw</pre><p>唯一の例外は XFree86 または X.org です。もし X サーバを Fink でインストールした (<code>xfree86</code> 、
<code>xfree86-rootless</code> または <code>xorg</code> パッケージ) なら、次のコマンドも必要です:
</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>Fink をインストールし直すことがないのでしたら、テキストエディタを使い、 <code>.cshrc</code> ファイルの中の "<code>source /sw/bin/init.csh</code>" と書かれている行、あるいは <code>.bashrc</code> ファイルの中の "<code>source /sw/bin/init.sh</code>" と書かれている行を削除して下さい。</p></div>
</a>
<a name="bindist">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.7: ウェブのパッケージデータベースは、パッケージ xxx を表示しているのに、 apt-get と dselect は何もしない。どっちが嘘をついてるのですか?
</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
どちらも正しいです。
パッケージデータベースは unstable セクションにあるものも含め、全てのパッケージを管理します。
<code>dselect</code> と <code>apt-get</code> は、コンパイル済みバイナリパッケージしか関与しません。
パッケージがコンパイルされないのは様々な理由があります。
パッケージがコンパイルするかどうかを判定するには、まず最新リリースの "stable" セクションになければなりません。 更にポリシーに合っているか、ライセンスや知的所有権を侵していないかチェックされます。</p><p><code>dselect</code> / <code>apt-get</code> が対応していないパッケージをインストールする場合、 <code>fink install <b>packagename</b></code> を使ってソースからコンパイルします。
このコマンドを実行する前に、 Developer Tools がインストールされているか確認して下さい。
(Developer Tools インストーラがない場合、 <a href="http://connect.apple.com/">Apple Developer Connection</a> で登録後、入手して下さい)
下記の unstable に関する質問も合わせて参照して下さい。
</p></div>
</a>
<a name="unstable">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.8: unstable にあるパッケージをインストールしようとすると、 fink が 'no package found' といいます。どうしたらインストールできるのですか?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
	  まず、'unstable の意味を確認してください。
	  unstable tree にあるパッケージは、さまざまな理由により安定ではありません。
	  既知の問題が残っていたり、valid error があったり、あるいは十分なフィードバックがないかもしれません。
	  この理由により、Fink はデフォルトでは unstable tree を探さないのです。
	</p><p>
	  unstable を使う場合、もしうまく行った場合 (あるいは行かなかった場合)、メンテナにメールすることを心がけてください。
	  あなたからのフィードバックは、stable に移行するための貴重な根拠となるのです!
	  パッケージのメンテナを知るには、<code>fink info <b>packagename</b></code> と実行してください。
	</p><p> 
	  <code>fink-0.26</code> 以降:
	  <code>fink configure</code> を実行すれば、たくさんある質問の中で unstable tree を on にするかという質問があります。
	</p><p>
	  <b>0.26</b> よりも古いバージョンの Fink が unstable を使うよう設定するには、
	  <code>/sw/etc/fink.conf</code> を編集し、<code>Trees:</code> 行に <code>unstable/main</code>
	  と <code>unstable/crypto</code> to the <code>Trees:</code> を追加してください。
	</p><p>
	  Fink Commander を使っている場合、Preference から unstable パッケージを使うことができます。
	</p><p>
	  これらのことをするだけでは、unstable tree のパッケージ記述を自動的にはダウンロードしません。
	  各自で <code>rsync</code> または <code>cvs</code> の更新をする必要があります。
	  これは、Fink のデフォルトではないので、以下のコマンドの入力してください。
	</p><pre>fink selfupdate</pre><p>とした後、</p><pre>fink selfupdate-rsync</pre><p>または</p><pre>fink selfupdate-cvs</pre><p>その後</p><pre>fink index -f
fink scanpackages</pre><p><b>注記:</b> Fink Commander では、同様のことが、 
	<code>fink index -f</code> 以外、できます。これだけはコマンドラインから行ってください。</p><p>すでに <code>rsync</code> または <code>cvs</code> で更新できるようになっている場合、以下のものだけで十分です:</p><pre>
fink selfupdate
fink index
fink scanpackages
	</pre><p>
	  もし、update 方法を知らない場合、<code>fink --version</code> とすることで 
	  <code>cvs</code> または <code>rsync</code> であることがわかります。
	</p><p>
	  特定のパッケージ (および base パッケージ) 以外、unstable からインストールしたくない場合、
	  unstable を off に戻す前に <code>update-all</code> コマンドを実行しないよう注意してください。
	</p></div>
</a>

    <a name="unstable-onepackage">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.9: 
          unstable にあるパッケージをひとつだけインストールするにも、 unstable 全体を有効にしなければなりませんか?
        </b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
          いいえ。しかし、そうすることをお勧めします。
          混在によって予期できない問題が発生した場合、これを直すには非常に困難です。
        </p><p>
          もし、unstable からひとつかふたつのパッケージが欲しく、他はいらないのであれば、
          (<code>fink selfupdate-cvs</code> で) CVS 更新に変更する必要があります。
          これは、 rsync では <code>fink.conf</code> でアクティブなツリーしか更新しないためです。
          <code>/sw/etc/fink.conf</code> を編集し、 <code>Trees:</code> 行に
          <code>local/main</code> がなければ追加してください。
          その後、 <code>fink selfupdate</code> を実行して、パッケージ記述ファイルをダウンロードしてください。
          次に、関連する <code>.info</code> ファイル (および対応する <code>.patch</code> ファイル) を、
          <code>/sw/fink/dists/unstable/main/finkinfo</code> (または
          <code>/sw/fink/dists/unstable/crypto/finkinfo</code>) から
          <code>/sw/fink/dists/local/main/finkinfo</code> へコピーします。
          しかし、このパッケージは、 unstable にある他のパッケージ (またはバージョン) に依存していることもあります。
          この場合、これらの <code>.info</code> と <code>.patch</code> ファイルも同様にコピーします。
          全てのファイルをコピーしたら、 <code>fink index</code> を実行することで、 Fink は
          入手可能なパッケージの一覧を更新します。
          ここまで終わったら、rsync に戻すことができます (<code>fink selfupdate-rsync</code>)。
        </p></div>
    </a>
<a name="sudo">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.10: sudo でパスワードを何度も何度も入力するのは疲れます。何か良い方法はありませんか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> sudo がパスワードを聞いてこないように設定することができます。
root 権限で <code>visudo</code> を開き、次の行を追加します:</p><pre>username ALL =(ALL) NOPASSWD: ALL</pre><p>もちろん、 <code>username</code> は実際のユーザー名に変えて下さい。</p></div>
</a>
<a name="exec-init-csh">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.11: init.csh or init.sh を実行しようとすると、 "Permission denied" エラーが出ます。
何がおかしいのですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> init.csh と init.sh は通常のコマンドのように実行するものではありません。
これらのファイルは環境変数の PATH や MANPATH を設定するものです。
これをシェルに保持させるには、csh/tcsh では <code>source</code> コマンド、bash/zsh では <code>.</code> コマンドを使い:</p><p> csh/tcsh の場合:</p><pre>source /sw/bin/init.csh</pre><p> bash の場合:</p><pre>. /sw/bin/init.sh</pre><p>と入力します。</p></div>
</a>
<a name="dselect-access">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.12: うぎゃ! dselect で "[A]ccess" メニューを使ったら、パッケージをダウンロードできなくなった!</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
おそらく、 apt を Debian ミラーを指定したのでしょう。
当然、 Debian ミラーには Fink ファイルはありません。
これを直す方法には、手動と dselect を通す二通りがあります。
手動では、 root 権限で <code>/sw/etc/apt/sources.list</code> ファイルを開き、 debian.org の行を削除して:
</p><pre>deb http://us.dl.sourceforge.net/fink/direct_download release main crypto
deb http://us.dl.sourceforge.net/fink/direct_download current main crypto</pre><p>に置き換えます (日本では <code>jp.dl.sourceforge.net</code>) 。</p><p>dselect を通すには、再度 "[A]ccess" を実行し、 "apt" を選択して:</p><p>
URL: http://us.dl.sourceforge.net/fink/direct_download -
Distribution: release -
Components: main crypto
</p><p>と入力します。
他の source を追加するならば、  "release" の部分を "current" と変えて繰り返して下さい。
</p><p>現在、 apt パッケージの修正版 (設定スクリプトが dselect のプラグインとして付随) が CVS から入手できます。</p></div>
</a>
<a name="cvs-busy">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.13: <q>fink selfupdate</q> か "fink selfupdate-cvs" を実行しようとした時、  "<code>Updating using CVS failed. Check the error messages above.</code>" エラーが出ました。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> メッセージが、</p><pre>Can't exec "cvs": No such file or directory at
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>であれば、 Developer Tools をインストールする必要があります。</p><p>もし最後の行が、</p><pre>### execution of su failed, exit code 1</pre><p>であれば、エラーを詳細に見る必要があります。
もし接続が拒否されたとあれば:</p><pre>(Logging in to anonymous@fink.cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to fink.cvs.sourceforge.net:2401 failed:
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.</pre><p>あるいは</p><pre>cvs [update aborted]: recv() from server fink.cvs.sourceforge.net:
Connection reset by peer
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.</pre><p>あるいは</p><pre>cvs [update aborted]: End of file received from server</pre><p>あるいは</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>であれば、 cvs サーバが過負荷になっていると思われますので、時間をおいて update を試してみて下さい。</p><p>この他、パーミッションをもっていない可能性もあります。
この場合は "Permission denied" メッセージ:</p><pre>cvs update: in directory 10.2/stable/main:
cvs update: cannot open CVS/Entries for reading: No such file or directory
cvs server: Updating 10.2/stable/main
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo: No 
such file or directory
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.
</pre><p>が出ます。この場合は cvs ディレクトリをリセットする必要があります。コマンド:</p><pre>sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {} \;
fink selfupdate-cvs</pre><p>を入力して下さい。</p><p>以上のいずれのメッセージとも異なる場合、おそらく /sw/fink/dists 内のファイルを、あなたとメンテナの双方が書き換えたためです。
selfupdate-cvs の出力で、 "C" から始まる行で:</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
...
(other info and patch files)
...
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.</pre><p>のようになっている箇所を探して下さい。
"C" というのは CVS で最新版へ更新時にコンフリクトがあったことを意味しています。</p><p>これを修正するには、 selfupdate-cvs の出力にでてきたファイルを一つずつ削除して、コマンドを再実行します。</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre><p>もし、<b>cvs.sourceforge.net</b> と述べているエラーが発生した場合:</p><pre>
cvs [update aborted]: connect to cvs.sourceforge.net(66.35.250.207):
2401 failed: Operation timed out
</pre><p>
	        これは、2006年に sourceforge.net において CVS サーバを再構築したためです。
		Fink のファイルは、現在は <b>fink.cvs.sourceforge.net</b> にあります。
	      </p><p>現在のディストリビューションのバージョンを、</p><pre>fink --version</pre><p>
	        などで確認してください。
		もし、<code>10.4-transitional</code> であれば、ただの 10.4 ディストリビューションに更新する必要があります。
		<a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">update script</a>
		を使って更新することができます。
	      </p></div>
</a>
<a name="kernel-panics">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.14: Fink を使うと、マシンがフリーズする/カーネルパニックする/固まる。助けて!</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 2002年秋の
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users mailing list</a>
の報告によると、こういった問題 (カーネルパニックやパッチ当て中の無限ループを含む) が発生するのはアンチウィルスソフトウェアがインストールされている時です。
Fink を使う際はアンチウィルスソフトウェアを終了する必要があるかもしれません。</p></div>
</a>
<a name="not-found">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.15: パッケージをインストールしようとすると、 Fink がダウンロードできません。
ダウンロードサイトとは Fink よりも新しいバージョンを示しています。
何をしたらいいですか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 新しいバージョンのリリースにともない、本家サイトでのパッケージソースが移動しました。</p><p>最初にまず  <code>fink selfupdate</code> を実行して下さい。
メンテナが既に修正している場合、新しいバージョンか別のダウンロード URL のパッケージ詳細を取得できます。</p><p>もしこれでも問題が残るなら、ほとんどのソースは
<a href="http://distfiles.master.finkmirrors.net/">http://distfiles.master.finkmirrors.net/</a>
にある (Rob Braun 氏に感謝) ので、 <code>fink configure</code> を実行して "Master" ソースミラー を検索して下さい。
Fink が自動的にここを探しにいきます。
</p><p>これでも問題が残るなら、パッケージメンテナ
("<code>fink describe <b>packagename</b></code>" からわかります)
に URL が壊れている旨を知らせて下さい。
メンテナがいつでもメーリングリストを読んでいるとは限りません。</p><p>使えるソースを入手するには、まずは他のディレクトリ ("old" ディレクトリなど)  にあるリモートサイトの中で必要なバージョンを探して見て下さい。
もし公式サイトになければ、ウェブを検索してみて下さい。
非公式サイトに必要なバージョンの tarball が見つかることがあります。
他には <a href="http://us.dl.sourceforge.net/fink/direct_download/source/">http://us.dl.sourceforge.net/fink/direct_download/source/</a> があります。
ここは Fink がバイナリとしてリリースされたパッケージのソースファイルを保存する場所です。
いずれも駄目な場合、
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users mailing list</a>
で古いソースをもっている人を探してみて下さい。
</p><p>
  もしソースの tarball が見つかったら、手動でダウンロードし、 Fink ソース保存先に移して下さい:
  "<code>sudo mv <b>package-source.tar.gz</b> /sw/src/</code>"
  この後、通常通り '<code>fink install <b>packagename</b></code>' して下さい。
</p><p>ソースファイルが見つからない場合、メンテナが問題に対処するまで待つしかありません。
古いソースか、新しいバージョン用の .info と .patch ファイルへのリンクが投稿されることでしょう。</p></div>
</a>
<a name="fink-not-found">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.16: Fink や Fink でインストールしたものを実行しようとすると
"command not found" エラーが出ます。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 常にこのエラーが出るようでしたら、誤ってスタートアップスクリプトを書き換えてしまった(か、書き換えに失敗した)と思われます。
<code>/sw/bin/pathsetup.sh</code> スクリプトを実行してください。
このプログラムは、デフォルトシェルを判定し、シェルの設定に Fink のシェル初期化スクリプトを読み込むコマンドを追加します。
<b>注記:</b> 古いバージョンの fink では、スクリプト名が <code>/sw/bin/pathsetup.sh</code> ではなく <code>/sw/bin/pathsetup.command</code> となっていることがあります。
あるいは、 Fink バイナリディストリビューションのディスクイメージ内にある <code>pathsetup.app</code> を実行する方法もあります。
</p><p>
Apple X11 terminal でのみこの問題が発生するのであれば、
簡単な解決方法は X11　アプリケーションメニューの"ターミナル"を、<b>アプリケーション-&gt;メニューをカスタマイズ...</b>から変更します。
</p><pre>xterm</pre><p>cコマンドの欄を</p><pre>xterm -ls</pre><p>とします。ここで<code>ls</code> は <q>login shell</q> を意味し、ログインセットアップが (OS X ターミナルと同様に) 使用されることになります。</p><p><code>/sw/bin/init.*</code> スクリプトは、<code>/sw/bin</code> をパスに追加する以外にも様々なことをしています。
	多くのパッケージは、この追加処理がなくては正常に動作しません。</p><pre>source ~/.cshrc</pre></div>
</a>
<a name="invisible-sw">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.17: Finder で /sw を隠して、ユーザーが Fink の構成を壊すのを防ぎたい。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> できます。
Development Tools がインストールされていれば、次のコマンドを実行してください:</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>これで /sw が標準的なシステムのフォルダ (/usr など) のように不可視になります。
Developer Tools がない場合はサードパーティー製のアプリケーションで /sw が不可視になるよう、属性値を変更してください。</p></div>
</a>
<a name="install-info-bad">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.18: 何もインストールできません。
"install-info: unrecognized option `--infodir=/sw/share/info'"
のエラーが出るだけです。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> これは普通、 PATH の問題です。ターミナルで:</p><pre>printenv PATH</pre><p>と入力し、 <code>/sw/sbin</code> が出てこないなら、環境変数を
<a href="/doc/users-guide/install.php#setup">instructions</a>
内の Users Guide を参照してください。
<code>/sw/sbin</code> があるが、他のディレクトリ (例えば /usr/local/bin) 
がそれより前にある場合、 PATH の順序を変えて先頭近くに移動してください。
どうしても順序を変えられない理由があるならば、 Fink を使う時に Fink ではない方の <code>install-info</code> のディレクトリ名を一時的に変える必要があります。</p></div>
</a>
<a name="bad-list-file">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.19: 何もインストールできないし、削除もできません。 "files list file" と出るだけです。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 通常、このエラーはこういう形で出ます:</p><pre>files list file for package <b>packagename</b> contains empty filename</pre><p>または</p><pre>files list file for package <b>packagename</b> is missing final newline</pre><p>
  これは直すことができます。
  エラーメッセージ中のパッケージの .deb ファイルがシステム上にあれば、その状態を確認します:
</p><pre>dpkg --contents <b>full-path-to-debfile</b>
</pre><p>例えば</p><pre>dpkg --contents
/sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</pre><p>ディレクトリやファイルの一覧が表示されたら、 .deb ファイルは大丈夫です。
もし出力されたのがファイルやディレクトリ以外であるか、 .deb ファイルがなくても、このエラーはビルドに影響しないので、次に進んでください。
</p><p>バイナリインストールを試みている場合、あるいはインストールしたバージョンと現在のバイナリバージョンが一致する場合
(例えば、 <a href="http://pdb.finkproject.org/pdb/index.php">パッケージデータベース</a> で調べたなら)、
.deb ファイルを取得することができます:
<code>sudo apt-get install --reinstall --download-only <b>packagename</b></code>
。あるいは、自分でビルドすることもできます:
<code>fink rebuild <b>packagename</b></code>
。この時点ではまだインストールはされていません。</p><p>.deb ファイルを作成したら、ファイルを再構築することができます。
まず、 root になるために <code>sudo -s</code> と入力します (必要があれば管理ユーザーパスワードを入力する) 。
次に、このコマンドを入力します (一行で - 画面上では複数行になっていますが)
</p><pre>dpkg -c <b>full-path-to-debfile</b>  | awk '{if ($6 == "./"){ print "/."; } \
else if (substr($6, length($6), 1) == "/") \
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}' \
&gt; /sw/var/lib/dpkg/info/<b>packagename</b>.list</pre><p>例えば、</p><pre>dpkg -c /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb | awk \
'{if ($6 == "./") { print "/."; } \
else if (substr($6, length($6), 1) == "/") \
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}' \
&gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p>このコマンドは、 .deb ファイルの中身を解凍して、ファイル名以外を除いて .list ファイルに書き込んでいます。</p></div>
</a>
<a name="dselect-garbage">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.20: <code>dselect</code> でパッケージを選択すると、大量のゴミがでてきます。
これはどうやったら使えますか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> <code>dselect</code> と <code>Terminal.app</code> の関係に問題があります。
どうにかするには、 <code>dselect</code> を実行する前に次のコマンドを入力してください:
</p><p>tcsh の場合:</p><pre>setenv TERM xterm-color</pre><p>before you run <code>dselect</code>.</p><p>bash の場合:</p><pre>export TERM=xterm-color</pre><p>このコマンドをログイン時に自動的に実行するには、起動ファイル (例 <code>.cshrc</code> | <code>.profile</code>) に記述して下さい。</p></div>
</a>

<a name="cant-upgrade">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.21: Fink のバージョンをアップデートできないようです。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> この状況専用の <a href="/download/fix-upgrade.php">special instructions</a> に従ってください。</p></div>
</a>
<a name="spaces-in-directory">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.22: 名前に空白が入っているボリュームやディレクトリに Fink を入れることはできますか?</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 名前に空白が入っているディレクトリに Fink を入れるないよう薦めます。</p></div>
</a>
<a name="packages-gz">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.23: バイナリアップデートをしようとすると、 "File not found" または "Couldn't stat package source list file" というメッセージが大量に出ます。</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> もし次のようであれば:</p><pre>
Err file: local/main Packages
File not found
Ign file: local/main Release
Err file: stable/main Packages
File not found
Ign file: stable/main Release
Err file: stable/crypto Packages
File not found
Ign file: stable/crypto Release
...
Failed to fetch
file:/sw/fink/dists/local/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch
file:/sw/fink/dists/stable/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch
file:/sw/fink/dists/stable/crypto/binary-darwin-powerpc/Packages
File not found
Reading Package Lists... Done
Building Dependency Tree... Done
E: Some index files failed to download, they have been ignored, or old
ones used instead.

update available list script returned error exit status 1.
</pre><p>あるいは</p><pre>W: Couldn't stat source package list file: unstable/main Packages
(/sw/var/lib/apt/lists/_sw_fink_dists_unstable_main_binary-darwin-
powerpc_Packages) - stat (2 No such file or directory)</pre><p><code>fink scanpackages</code> をするだけです。
これによって見つからなかったファイルを作成します。</p></div>
</a>
<a name="wrong-tree"> 
<div class="question"><p><b><?php echo FINK_Q ; ?>5.24: OS を変えたら、 Fink が認識してくれません。</b></p></div> 
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fink ディストリビューション（ソースとバイナリはそのサブセットです）を変更するには、 Fink に指示する必要があります。
これは Fink の新規インストール時に実行するスクリプトを実行します:
</p><pre>/sw/lib/fink/postinstall.pl</pre><p>これにより、 Fink は正しく場所を指示されます。</p></div> 
</a> 
    <a name="lost-command-line-tools">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.25: After installing a macOS update, Fink no longer recognizes my installed Command Line Tools.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Updates to macOS routinely break parts of Apple's Command Line Tools. If you get this error after updating your copy of macOS:</p><pre>Can't resolve dependency "xcode (&gt;= 6.2)"</pre><p>Fink has lost track of Apple's Command Line Tools.</p><p>The easiest solution is to download and reinstall the Command Line Tools specific to your macOS version from <a href="https://developer.apple.com/">https://developer.apple.com/</a>.</p><p>Another possible solution is to run the following command:</p><pre>xcode-select --install</pre><p>but this often reports the following:</p><pre>xcode-select: error: command line tools are already installed, use "Software Update" to install updates</pre><p>However, the Tools might be in a non-functional state such that Fink still can't recognize them. In that case, a clean reinstall as described above has always worked to fix their detection with Fink.</p><p>Finally, you may need to run the command:</p><pre>sudo xcodebuild -license</pre><p>to agree to the software license.</p></div>
    </a>
<a name="seg-fault"> 
<div class="question"><p><b><?php echo FINK_Q ; ?>5.26: 何かをインストールしようとしたら <code>gzip</code> | <code>dpkg-deb</code> のエラーが出る! 助けて!</b></p></div> 
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 以下の形式のエラー:</p><pre>gzip -dc /sw/src/dpkg-1.10.9.tar.gz | /sw/bin/tar -xf - 
### execution of gzip failed, exit code 139</pre><p>あるいは</p><pre>gzip -dc /sw/src/aquaterm-0.3.0a.tar.gz | /sw/bin/tar -xf - 
gzip: stdout: Broken pipe 
### execution of gzip failed, exit code 138</pre><p>あるいは</p><pre>dpkg-deb -b root-base-files-1.9.0-1 
/sw/fink/dists/unstable/main/binary-darwin-powerpc/base 
### execution of dpkg-deb failed, exit code 10 
Failed: can't create package base-files_1.9.0-1_darwin-powerpc.deb</pre><p>であれば、バイナリにおけるプリバインドのエラーです。修正するには:</p><pre>sudo /sw/var/lib/fink/prebound/update-package-prebinding.pl -f</pre><p>と実行します。</p></div> 
</a> 
<a name="pathsetup-keeps-running"> 
<div class="question"><p><b><?php echo FINK_Q ; ?>5.27: ターミナルウィンドウを開くと、
"Your environment seems to be correctly set up for Fink already."
というメッセージが出てログアウトします。</b></p></div> 
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
これは、何らかの理由で OSX ターミナルがログインする度に
<code>/sw/bin/pathsetup.command</code>
を実行するように設定されているからです。
修正するには、 初期設定ファイル <code>~/Library/Preferences/com.apple.Terminal.plist</code> を削除します。</p><p>他の設定を失いたくない場合、削除する代わりにテキストエディタでこのファイルを開き、
<code>/sw/bin/pathsetup.command</code>
と書かれている部分を削除します。</p></div> 
</a>
<a name="ext-drive">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.28: 
	メインパーティション以外に Fink をインストールしていますが、
	ソースからの更新ができません。
	<q>chowname</q> を含んだエラーが出ます。
	</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> このようなエラーであれば:</p><pre>This first test is designed to die, so please ignore the error
 message on the next line.
 # Looks like your test died before it could output anything.
 ./00compile............................ok
 ./Base/initialize......................ok
 ./Base/param...........................ok
 ./Base/param_boolean...................ok
 ./Command/cat..........................ok
 ./Command/chowname.....................#
 Failed test (./Command/chowname.t at line 27)
 #          got: 'root'
 #     expected: 'nobody'</pre><p>
、Fink がインストールされているドライブ/パーティションを
「<b>情報を見る</b>」し、 "所有権を無視する" を外します。
</p></div>
</a>
<a name="mirror-gnu">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.29: 
	Fink がパッケージを更新しません。
	'gnu' ミラーが見つからないと言っています。
	</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
	エラーの最後が、
	</p><pre>Failed: No mirror site list file found for mirror 'gnu'.</pre><p>
	である場合、 <code>fink-mirrors</code> を以下のように更新します:
	</p><pre>fink install fink-mirrors</pre></div>
</a>
<a name="cant-move-fink">
<div class="question"><p><b><?php echo FINK_Q ; ?>5.30: 
	Fink を更新できません。
	/sw/fink を移動できないからです。
	</b></p></div>
<div class="answer"><p><b><?php echo FINK_A ; ?>:</b> このエラー:</p><pre>Failed: Can't move "/sw/fink" out of the way.</pre><p>
	は通常、エラーメッセージと異なり、パーミッションの問題で、
	<code>selfupdate</code> の作成した仮フォルダのひとつにあります。
	これを削除するには:
	</p><pre>sudo rm -rf /sw/fink.tmp /sw/fink.old</pre></div>
</a>

    <a name="fc-cache">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.31: "No fonts found" というメッセージが出ます。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 次のようであれば (OS 10.4 のみ):</p><pre>No fonts found; this probably means that the fontconfig
library is not correctly configured. You may need to
edit the fonts.conf configuration file. More information
about fontconfig can be found in the fontconfig(3) manual
page and on http://fontconfig.org.</pre><p>次のように実行します:</p><pre>sudo fc-cache</pre></div>
    </a>
    <a name="non-admin-installer">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.32: インストーラから Fink をインストールできません。"volume doesn't support symlinks" エラーが出ます。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
        	このメッセージは、 Fink インストーラを管理者権限のないユーザーで実行すると発生します。
        	ログイン時に権限のあるユーザーにログインするか、Finder でユーザーを切り替えてください。
        </p><p>
        	管理者アカウントを使っていても問題が発生する場合、システムのトップレベルディレクトリの
        	パーミッションに問題があるかもしれません。 Apple の ディスクユーティリティを使い、問題の
        	ボリュームを選択し、 <b>First Aid</b> タブから <b>ディスクのアクセス権を修復</b>
        	を選択してください。
        	If that doesn't work, then you may need to set your permissions manually via:</p><pre>
sudo chmod 1775 /	  
	</pre></div>
    </a>
    <a name="wrong-arch">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.33: Fink を更新できない。 <q>package architecture (darwin-i386) がシステム (darwin-powerpc) に合っていない。</q>
</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> このエラーは、PPC インストーラで Intel マシンにインストールした際に発生します。  
        現在のインストールを、例えば次のように削除してください:</p><pre>sudo rm -rf /sw</pre><p>Intel マシン用のインストーラを、<a href="/download/index.php">ダウンロードページ</a>から入手してください。</p></div>
    </a>

<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="comp-general.php?phpLang=ja">6. コンパイルの問題 - 一般</a></p>
<?php include_once "../footer.inc"; ?>


