<?
$title = "F.A.Q. - 関係";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:14';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="mirrors.php?phpLang=ja" title="Fink ミラー"><link rel="prev" href="general.php?phpLang=ja" title="一般的な質問">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 2. 他のプロジェクトとの関係</h1>


<a name="upstream">
<div class="question"><p><b><? echo FINK_Q ; ?>2.1: パッチを送るなど、本家のメンテナに貢献していますか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 努力しています。
パッチを送り返すのは簡単で、次のパッケージで皆が満足することもありますが、ほとんどの場合そう簡単にはいきません。
共通の問題:</p><ul>
<li>Fink のパッケージメンテナは多忙で、パッチとその説明を本家のメンテナに送る時間がない。</li>
<li>本家のメンテナは、クリーンなコード、クリーンな configure  チェック、他のプラットフォームとの互換性を理由に拒否することがある。</li>
<li>本家のメンテナはパッチを受け入たが、次のバージョンがリリースされるまでに数週間から数カ月かかる。</li>
<li>パッケージのメンテナンスが終了し、これ以上リリースされないためパッチがマージされない。</li>
</ul></div>
</a>
<a name="debian">
<div class="question"><p><b><? echo FINK_Q ; ?>2.2: Debian プロジェクトとは関係がありますか。 Debian Linux を Mac OS X に移植しようとしているのですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Fink と <a href="http://www.debian.org">Debian</a> には公式の関係はありません。
Fink は Debian GNU/Linux ディストリビューションの移植では<b>ありません</b>。
Debian パッケージ管理ツール (dpkg, dselect, apt-get) を移植し、 .deb バイナリパッケージ形式を使ってはいますが、実際のパッケージは Mac OS X / Darwin 専用のものです。</p></div>
</a>
<a name="apple">
<div class="question"><p><b><? echo FINK_Q ; ?>2.3: Apple とは関係がありますか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> <a href="http://www.apple.com/">Apple</a> は Fink を認知していて、オープンソース関連の活動の一環としてサポートしています。
2001年の夏と秋には、 Fink パッケージの修正がリリースに間に合うように、新しい Mac OS X バージョンのプレリリースを提供してくれました。
引用:
<b>
「多くの人が、我々は提供したくないのではと疑ってかかっているので、このことでオープンソースへの貢献を強調できるでしょうか。
我々はオープンソースというゲームに強くなると思います。」
</b>
Apple ありがとう!</p></div>
</a>
<a name="darwinports">
<div class="question"><p><b><? echo FINK_Q ; ?>2.4: Darwinports とは関係がありますか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Darwinports と Fink は補完的なプロジェクトです。
両者は重なる部分があり、 Fink と OpenDarwin プロジェクトの両方に貢献している人もいま。
例えば、 Benjamin Reed は双方の KDE パッケージを担当しています。
Darwinports と Fink は、自由に双方のパッチを利用し、両者は現在新しいディペンダンシー・エンジンの協働を検討してきました。</p><p>
OpenDarwin は独自のパッケージ・システムを開発しています。
<a href="http://darwinports.opendarwin.org/">OpenDarwin.org</a>  に詳細があります。</p></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="mirrors.php?phpLang=ja">3. Fink ミラー</a></p>
<? include_once "../footer.inc"; ?>


