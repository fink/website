<?
$title = "F.A.Q. - ミラー";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2008/05/02 04:41:49';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="upgrade-fink.php?phpLang=ja" title="Fink のアップグレード (バージョン固有の問題対処法)"><link rel="prev" href="relations.php?phpLang=ja" title="他のプロジェクトとの関係">';


$i18n_chapter = 'mirrors';
include_once "../i18n_showform.inc";
include_once "header.ja.inc";
?>
<h1>F.A.Q. - 3. Fink ミラー</h1>


<? $i18n_section= "when-use"; ?><a name="when-use">
<div class="question"><p><b><? echo FINK_Q ; ?>3.1: Fink ミラーとは何ですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Fink ミラーは、パッケージをソースからビルドする際に使う current と stable の詳細ファイルをミラーしている rsync サーバーです。</p></div>
</a>
<? $i18n_section= "why"; ?><a name="why">
<div class="question"><p><b><? echo FINK_Q ; ?>3.2: なぜ rsync ミラーを使わないといけないのですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
rsync は高速なプロトコルで、古い CVS アップデートによる方法よりも速く詳細ファイルを更新します。
また、 CVS アップデートは常に sourceforge.net から行われるのに対し、 rsync アップデートは近いミラーから行われます。
</p></div>
</a>
<? $i18n_section= "where"; ?><a name="where">
<div class="question"><p><b><? echo FINK_Q ; ?>3.3: Fink ミラーの情報はどこにありますか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Fink ミラーは全て、 finkmirrors.net ドメインに参加しています。
もっと詳しく知りたい方は、ウェブサイト http://finkmirrors.net/ を参照して下さい。</p></div>
</a>
<? $i18n_section= "when-not"; ?><a name="when-not">
<div class="question"><p><b><? echo FINK_Q ; ?>3.4: rsync サーバーに接続できません。どうしたら良いですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> ファイヤーウォールによっては、 rsync サービスへの接続を許可していない場合もあります。
この場合は CVS 方式を使って下さい。</p></div>
</a>
<? $i18n_section= "otherinfogone"; ?><a name="otherinfogone">
<div class="question"><p><b><? echo FINK_Q ; ?>3.5: rsync 方式に変えたら、unused ツリーの info ファイルが全て消えてしまいました。</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> これが正しい動作なのです。
rsync アップデート方式はアクティブなツリーだけ更新します。
また、 CVS サブディレクトリの削除も行います。</p></div>
</a>
<? $i18n_section= "howswitch"; ?><a name="howswitch">
<div class="question"><p><b><? echo FINK_Q ; ?>3.6: どのように方式を切り替えるのですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b>  fink selfupdate-rsync または fink selfupdate-cvs コマンドで、 rsync と CVS を切り替えます。</p></div>
</a>
<? $i18n_section= "status"; ?><a name="status">
<div class="question"><p><b><? echo FINK_Q ; ?>3.7: rsync ミラーの現在の状態は見ることが出来ますか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> http://finkmirrors.net/status.html から見ることが出来ます。</p></div>
</a>
<? $i18n_section= "Master"; ?><a name="Master">
<div class="question"><p><b><? echo FINK_Q ; ?>3.8: Distfiles ミラーとは何ですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
時としてインターネットから特定バージョンのソースを取得することが困難な場合があります。
Distfiles ミラーはソースパッケージをビルドする際に必要なソースパッケージを保存し、ミラーしています。</p></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade-fink.php?phpLang=ja">4. Fink のアップグレード (バージョン固有の問題対処法)</a></p>
<? include_once "../footer.inc"; ?>


