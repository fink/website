<?php
$title = "Help";
$cvs_author = '$Author: nieder $';
$cvs_date = '$Date: 2019/01/27 23:10:05 $';

include "header.inc";
?>


<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr valign="top"><td width="50%">

<h1>助けて</h1>

<p>
手助けが必要ですか？以下のものがあります。
</p>

<p>
<b>文書</b>
当サイトの<a href="../doc/index.php">文書セクション</a> にはたくさんの文書が用意されています。
まだ作成途中のものや不完全なものもありますが、手助けになるでしょう。
</p>

<p>
<b>FAQ</b>
よくある問題については、<a href="../faq/index.php">オンライン FAQ</a> をご覧ください。
</p>

<p>
<b>ユーザーのメーリングリスト</b>
もし自分では問題を解決できなければ、
<a href="../lists/fink-beginners.php">fink-beginners</a> メーリングリスト、あるいは
<a href="../lists/fink-users.php">fink-users</a> メーリングリストでお聞きください。
なお、事前に
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-beginners">fink-beginners アーカイブ</a>
及び
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users アーカイブ</a>
を確認してください。
同じ質問に何度も何度も回答するのも疲れるのです。
</p>
<p>
問題を報告する際には、関連する情報を必ず付けてください。
- 問題がわからなければ手助けすることもできません。
関連する情報とは: Fink バージョン、Mac OS X バージョン、関連パッケージのバージョン、fink コマンド、関連しそうなエラーメッセージ
他には、/usr/local にあるソフトウェアや独自のコンパイラ (gcc3 など)。
</p>

<p>
<b>IRC チャンネル</b>
<tt>#fink</tt> チャンネルは、
<a href="http://freenode.net">freenode</a> という IRC ネットワーク上にあります。
他の Fink ユーザーや、開発者も少なからずいます。
</p>

<p>
<b>他のサイト</b>
ウェブ上のフォーラム:
<a href="https://www.xquartz.org/Mailing-Lists.html">XQuartz</a> -
<a href="http://www.xdarwin.org/forum/">xdarwin.org forums</a> -
<a href="http://forums.macnn.com/forumdisplay.php?forumid=54">MacNN
Unix forum</a> -
<a href="http://macosx.com/">macosx.com</a> (Unix
関連のフォーラムもあります)
</p>
<p>
多少とも有益な情報があるサイトへのリンク:
<a href="https://www.xquartz.org/">XQuartz</a> -
<a href="http://macosx.org/">macosx.org</a> -
<a href="http://macosxhints.com/">macosxhints.com</a>
</p>

</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1>助けたい</h1>

<p>
Fink はボランティアで成り立っています。
以下は、<b>あなた</b>が提供できる手伝いです。
</p>

<p>
<b>フィードバック</b>
ユーザーからのフィードバック以上に有益なものはありません。
問題報告、サクセスストーリー、提案、貢献は歓迎です。
全てにすぐ対処できる訳ではありませんが、どこから始めたらよいかを知る手がかりになります。
</p>
<p>
フィードバックは
<a href="../lists/index.php">メーリングリスト</a>
と、SourceForge のトラッカー機能 (当サイトのホームに直リンクがあります) を利用するか、メンテナに直接報告してください。
</p>

<p>
<b>口コミで広げる</b>
Fink が気に入ったなら、口コミで広げてください。
これによって、コミュニティが育っていきます。
これによって、テストが増え、Fink プロジェクトが育ちます。
これによって、Mac OS X と Unix OS を支持するという認識が広がります。
</p>
<p>
また、<a href="https://www.apple.com/feedback/macos.html">Apple に</a>、
Mac OS X の BSD パワーを利用したこと、もっと BSD レイヤに力を注いで欲しいことを伝えることもできます。
</p>

<p>
<b>サポートを提供</b>
経験がある方は、<a
href="../lists/fink-users.php">fink-users</a> 
メーリングリストに入り、他のユーザーの問題を解決することを手伝ってください。
</p>

<p>
<b>パッケージをテスト</b>
パッケージ記述を <a href="../doc/gitaccess/index.php">Git</a> から入手し、
Fink を <a href="../faq/usage-fink.php#unstable">unstable を使う</a> 用に設定し、
パッケージをテストします。
パッケージデータベースには <a href="http://pdb.finkproject.org/pdb/testing.php">テストを要するパッケージ</a>ページがあります。
成功しても失敗しても、パッケージのメンテナやメーリングリストに報告することができます。
</p>

<p>
<b>物書き</b>
当プロジェクトは常に物書きを募集中です。
</p>

<p>
<b>パッケージを作成</b>
Unix 上でソースからソフトウェアをインストールした経験がある方は、パッケージを作成することもできます。
<a href="../doc/quick-start-pkg/index.php">Packaging Tutorial</a> から始めると良いでしょう。
次に、<a href="../doc/packaging/index.php">Packaging Manual</a> を読み、
<a href="../lists/fink-devel.php">fink-devel</a> を定期購読し、
<a href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">package submission tracker</a> からパッケージを登録します。
パッケージ化ポリシーに従っていない場合、拒否されるか、Priority が低くなりますので注意してください。
</p>


</td></tr></table>


<?php
include "footer.inc";
?>
