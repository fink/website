<?
$title = "F.A.Q. - 一般";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2004/10/13 23:54:06';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="F.A.Q. Contents"><link rel="next" href="relations.php?phpLang=ja" title="他のプロジェクトとの関係"><link rel="prev" href="index.php?phpLang=ja" title="F.A.Q. Contents">';


include_once "header.ja.inc";
?>
<h1>F.A.Q. - 1. 一般的な質問</h1>


<a name="what">
<div class="question"><p><b><? echo FINK_Q ; ?>1.1: Fink とは何ですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Fink は、多くの Unix ソフトウェアを Mac OS X で使えるようにするものです。
このために、次の二つのゴールを設定しています。</p><p>一つ目のゴールは、ソフトウェアを Mac OS X に移植することです。
これは、 役に立つ Open Source の Unix ソフトウェアを、 Mac OS X でコンパイルと実行できるよう、必要な修正を行ないます。
この作業は簡単なこともありますが、非常に困難な場合や、パッケージによっては不可能な場合もあります。
我々は、この作業を簡単にするためにツールやドキュメントを提供するよう努めています。</p><p>二つ目のゴールは、成果を普通のユーザーが使える形にすることです。
このために我々は、 Linux で使われている <code>dpkg</code> と、 <code>fink</code> という パッケージ管理ツールを使ったディストリビューションを構築しました。
後者は、  <a href="http://www.debian.org/">Debian GNU/Linux</a> プロジェクトが独自で作成したものです。
バイナリディストリビューションは <code>.deb</code> パッケージ形式を使います。
ソースからパッケージをビルドするには、我々の独自のツールである <code>fink</code> を使い、 <code>.deb</code>  パッケージのファイルを作成します。</p></div>
</a>
<a name="naming">
<div class="question"><p><b><? echo FINK_Q ; ?>1.2: Fink とはどういう意味ですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 意味はありません。ただの名称です。なにかの頭文字でもありません。</p><p>実際は、ドイツ語でフィンチという鳥のことです。
このプロジェクトに名称を考えていた時、 OS の名称である Darwin から、チャールズ＝ダーウィン、ガラパゴス諸島、進化を連想しました。
それで、ダーウィン・フィンチのことを思い出しました。
まぁ、それだけです...</p></div>
</a>
<a name="bsd-ports">
<div class="question"><p><b><? echo FINK_Q ; ?>1.3: 
Fink と BSD の port メカニズムはどう違うのですか (OpenPackages や GNU-Darwin も含めて)?
</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 利点:</p><ul>
<li>
<p>Perl で書かれています。 make/shell ではありません。
このため、 BSD make だけにある特殊な機能に依存せず、ビルドするために GNU make が必要かどうかフラグを立てる必要がありません。</p>
</li>
<li>
<p>
dpkg のバイナリパッケージ管理は洗練されています。
スムーズなアップデート、設定ファイルの扱い、バーチャルパッケージ、高度の依存性などの機能があります。。
</p>
</li>
<li>
<p>Fink は指定しない限りは /usr/local にインストールすることはなく、 /usr/bin/make や他のシステム依存のコマンドをいじる必要がありません。
こうすることで、より安全に使用することができ、 Mac OS X や他のサードパーティーのソフトウェアとのインターフェイスを最小限に減らすことができます。</p>
</li>
</ul></div>
</a>
<a name="usr-local">
<div class="question"><p><b><? echo FINK_Q ; ?>1.4: なぜ Fink は /usr/local にインストールしないのですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> いくつか理由はありますが、共通しているのは、「いつか壊れるから」です。</p><p>理由1: サードパーティー・ソフトウェア。
/usr/local は、システムの一部ではないソフトウェアを入れる場所として確立されています。
このため、いろいろなものを入れるには格好の場所ですが、同様に他の人もこの場所にいろいろなものを入れる可能性があります。
ほとんどのインストール・ルーチンはすでにあるものを上書きしてしまいますし、 dpkg もそうします。
もちろん、サードパーティー・ソフトウェアを /usr/local にインストールしないように選択をすることは可能です。
しかし、ほとんどのインストーラは事前に何を何処にインストールするか知らせてくれません。</p><p>理由2: /usr/local/bin は、デフォルトの PATH に入っています。
このため、シェルが自動的にインストール・プログラムを見つけてしまいます。
逆にいうと、このプログラムを使いたくない場合は何かしなければなりません。
極端な場合、これはシステム全体に影響します。
多くのパーツはシェルスクリプトに依存しているからです。</p><p>理由3: コンパイラ・ツール・チェーンはデフォルトで /usr/local を検索します。
コンパイラは、 /usr/local/include 内でヘッダファイルを検索し、リンカは /usr/local/lib 内でライブラリを検索します。
これがうまくいくときもありますが、そうしたくない時にしないのが非常に難しいです。
コンパイラは、 /usr/local/include に <code>stdio.h</code> という名前のゴミファイルを追加すれば無効化することができます。</p><p>以上のことから、 Fink を /usr/local にインストールするのは不可能です。
インストール・スクリプトは警告メッセージを出しますが、これを無視することもできます。
この場合は自己責任で行なって下さい。</p></div>
</a>
<a name="why-sw">
<div class="question"><p><b><? echo FINK_Q ; ?>1.5: ではなぜ /sw を選んだのですか?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
この選択にあまり意味はありませんが、実用上の（アップグレードの）問題と、他のパッケージング・システムとのコンフリクト問題を避けるため、近い将来に変更することはないと思われます。</p></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="relations.php?phpLang=ja">2. 他のプロジェクトとの関係</a></p>
<? include_once "../footer.inc"; ?>


