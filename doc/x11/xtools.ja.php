<?
$title = "Running X11 - Xtools";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Running X11 Contents"><link rel="next" href="other.php?phpLang=ja" title="その他の X11"><link rel="prev" href="run-xfree86.php?phpLang=ja" title="X11 の起動">';


include_once "header.ja.inc";
?>
<h1>Running X11 - 5. Xtools</h1>


<h2><a name="install">5.1 Xtools のインストール</a></h2>

<p>
楽勝、楽勝。
インストーラを見つけて、ダブルクリックして、ガイドに従うだけです。
起動ディスクを選択するのを忘れずに。
</p>
<p>
Fink を使っている場合、Xtools のインストール後に <code>system-xtools</code> パッケージをインストールします。
このパッケージはファイルは何もインストールしません。
代わりにライブラリなどをチェックして Fink の依存性システム上の代替物となります。
</p>

<h2><a name="run">5.2 Xtools の起動</a></h2>

<p>
Xtools を起動するには、アプリケーションフォルダ内の Xtools.app アイコンをダブルクリックします。
XFree86 と同様、 Xtools は <code>.xinitrc</code> ファイルに書かれているクライアントを起動します。
Xtools ではさらにメニューからもクライアントを起動することができます。
</p>

<h2><a name="opengl">5.3 OpenGL に関する注記</a></h2>

<p>
Xtools はハードウェア加速の OpenGL をルートレスで行い、サポートするライブラリもついてきます。
主要な libGL ライブラリは問題ないのですが、 libGLU と libglut は静的なライブラリとしてのみ存在し、 XFree86 とのバイナリ互換の問題を引き起こします。
また、ヘッダに足りないものがあり、 Fink ではまだ解決できていません。
Xtools 1.1 までには修正されることを期待します。
</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="other.php?phpLang=ja">6. その他の X11</a></p>
<? include_once "../../footer.inc"; ?>


