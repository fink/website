<?
$title = "Running X11 - その他";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:18';
$metatags = '<link rel="contents" href="index.php?phpLang=ja" title="Running X11 Contents"><link rel="next" href="trouble.php?phpLang=ja" title="XFree86 トラブルシューティング"><link rel="prev" href="xtools.php?phpLang=ja" title="Xtools">';


include_once "header.ja.inc";
?>
<h1>Running X11 - 6. その他の X11</h1>


<h2><a name="vnc">6.1 VNC</a></h2>

<p>
VNC は X11 と設計上よく似ているネットワーク可能な画像表示システムです。
よく似ていますが、低レベルで動作していて実装が容易になっています。
Xvnc サーバと Mac OS X ディスプレイクライアントを組み合わせて Mac OS X 上で X11 アプリケーションを実行することも可能です。
Jeff Whitaker 氏の <a href="http://www.cdc.noaa.gov/~jsw/macosx_xvnc/">Xvnc page</a> にこれについての情報があります。
</p>

<h2><a name="wiredx">6.2 WiredX</a></h2>

<p>
<a href="http://www.jcraft.com/wiredx/">WiredX</a> は Java で書かれた X11 です。
ルートレスモードも対応していて、ウェブ上に Installer.app パッケージもあります。
</p>

<h2><a name="exodus">6.3 eXodus</a></h2>

<p>
同社のウェブサイトによると、 Powerlan USA の <a href="http://www.powerlan-usa.com/exodus/">eXodus 8</a> は Mac OS X 上でネイティブに動作するようです。
これに用いられているコードやローカルのクライアントをサポートしているかはわかっていません。
このため、 Fink では eXodus をサポートしてはいません。
もし何らかの情報があれば、我々に下さい。
</p>

<p align="right"><? echo FINK_NEXT ; ?>:
<a href="trouble.php?phpLang=ja">7. XFree86 トラブルシューティング</a></p>
<? include_once "../../footer.inc"; ?>


