<?
$title = "Running X11 - 歴史";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Running X11 Contents"><link rel="next" href="inst-xfree86.php?phpLang=ja" title="X11 の入手とインストール"><link rel="prev" href="intro.php?phpLang=ja" title="イントロダクション">';


include_once "header.ja.inc";
?>
<h1>Running X11 - 2. 歴史</h1>



<p>[大げさな言葉を使ってしまいました。
どうしても使いたかったんです...]</p>

<h2><a name="early">2.1 古代</a></h2>

<p>
始まりは無だった。
 Darwin は赤子の様で、 Mac OS X はまだ開発段階だった。
どちらにしても、 X11 もなかった。
</p>
<p>
やがて John Carmack がやってきて、 XFree86 を Mac OS X サーバに移植した。
唯一の Darwin ファミリーの OS であった。
後に、これは Dave Zarzycki によって XFree86 4.0 と Darwin 1.0 に更新された。
パッチは  Darwin の CVS レポジトリへの道を見いだし、そこで眠りについた。
時がくるのを待っていたのだ。
</p>

<h2><a name="xonx-forms">2.2 XonX forms</a></h2>

<p>
ある晴れた日、 Torrey T. Lyons がやってきて Darwin パッチに待ち望まれていた陽の目を見ることになる。
彼は公式の XFree86 CVS レポジトリという新しい家を用意した。
この時、 Mac OS X Public Beta と Darwin 1.2 の頃である。
XFree86 4.0.2 は Darwin 上で動いたが、 Mac OS X 上ではユーザが Aqua をログアウトし一旦コンソールに移動する必要があった。
そこで Terry は <a href="http://mrcla.com/XonX/">XonX チーム</a> を組織し、 XFree86 を Mac OS X にもたらす旅に出たのだった。 
</p>
<p>
これと同じ頃、 XFree86 を元に Tenon が Xtools をビルドし始めたのだった。
</p>

<h2><a name="root-or-not">2.3 root か root にあらざるか</a></h2>

<p>
直ぐに、 XonX チームは XFree86 を Quartz と平行してフルスクリーンで走らせることに成功した。
これはテストリリースとして冒険好きなユーザに提供された。
リリースされた名称は XFree86-Aqua あるいは短く XAqua であった。
Torrey がリーダーであったため、変更は直接 XFree86 の CVS レポジトリに反映され、 4.1.0 に向かったのであった。
</p>
<p>
当初、 Quartz とのインターフェイスは Xmaster.app と呼ばれる (当初は Carbon で書かれ、後に Cocoa 化された) 小さなアプリケーションが行っていた。
後にコードは X サーバに統合され、 XDarwin.app が誕生した。
この頃、共有ライブラリのサポートが追加された (Tenon はバイナリ互換性のためこの方式にするように説得された) 。 
また、 (Carbon API を使った) ルートレスモードも進んでいたのだが、 XFree86 4.1.0 には少し遅かった。
こうしてルートレスパッチは自由にネット上を解き放たれたのだった。
XFree86 4.1.0 がフルスクリーンモードで登場した後、ルートレスモードの作業は続き、 Cocoa API を使うようになった。
実験的なルートレスモードが XFree86 の CVS レポジトリに取り込まれた。
</p>
<p>
この頃、 Apple は Mac OS X 10.0 と Darwin 1.3 をリリースし、 Tenon は Xtools 1.0 を数週間後にリリースした。
</p>
<p>
開発は引き続き ルートレスモードに XFree86 を統合するよう働きかけ、 2002 年 1 月 の XFree86 4.2.0 には Darwin/Mac OS X は完全に XFree86 ディスリビューションに統合された。
</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="inst-xfree86.php?phpLang=ja">3. X11 の入手とインストール</a></p>
<? include_once "../../footer.inc"; ?>


