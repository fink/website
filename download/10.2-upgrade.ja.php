<?
$title = "Mac OS X 10.2 でのバイナリアップグレード";
$cvs_author = '$Author: babayoshihiko $';
$cvs_date = '$Date: 2004/03/02 16:21:21 $';

include "header.inc";
?>


<h1>Mac OS X 10.2 でのバイナリアップグレード</h1>

<p>
Mac OS X 10.2 でのバイナリリリースのアップデート方法です。
Fink の公式ディストリビューションのバージョン 0.3.x 以降に対応しています。
</p>
<p>以下の通りに従って下さい:
</p>
<ol>

<li><p>
apt のパッケージである
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.5.0a/main/binary-darwin-powerpc/base/apt_0.5.4-7_darwin-powerpc.deb">apt-0.5.4-7</a>
と
<a href="http://prdownloads.sourceforge.net/fink/direct_download/dists/fink-0.5.0a/main/binary-darwin-powerpc/base/apt-shlibs_0.5.4-7_darwin-powerpc.deb">apt-shlibs-0.5.4-7</a>
をダウンロードする。
ターミナル.app で、ダウンロード・解凍したフォルダ内に移動し、以下のコマンドを実行する:
</p>
<pre>source /sw/bin/init.csh
sudo dpkg -i apt-shlibs_0.5.4-7_darwin-powerpc.deb 
sudo dpkg -i apt_0.5.4-7_darwin-powerpc.deb</pre>
<p>
(bash の場合は <code>source /sw/bin/init.sh</code>)
</p>
</li>
<li><p>
<code>apt</code> のインストールが終わったら、apt とインストール済みのパッケージをアップデートする:
</p>
<pre>sudo apt-get update
sudo apt-get dist-upgrade
fink scanpackages
sudo apt-get update
sudo apt-get install storable-pm</pre>
</li>

<li><p>
最後にパッケージ詳細をアップデートする: 
</p>
<pre>sudo touch /sw/fink/stamp-rel-0.3.0
fink selfupdate</pre>
</li>

</ol>



<?
include "footer.inc";
?>
