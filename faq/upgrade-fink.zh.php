<?
$title = "常见疑问（F.A.Q.） - 升级 Fink";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/04/17 13:39:48';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="usage-fink.php?phpLang=zh" title="安装，使用和维护 Fink"><link rel="prev" href="mirrors.php?phpLang=zh" title="Fink 镜像">';

include_once "header.inc";
?>

<h1>常见疑问（F.A.Q.） - 4 升级 Fink （解决特定版本的问题）</h1>
    
    
    <a name="gcc-0.16.0">
      <div class="question"><p><b>Q4.1: 我升级到了 0.16.0，它告诉我说 "Your version of the
gcc 3.3 compiler is out of date." 我应该怎么办？</b></p></div>
      <div class="answer"><p><b>A:</b> 在 Panther 发布后，Fink 也升级以认识新的 gcc 3.3 编译器。为了同时支持 10.2 (Jaguar) 和 10.3 (Panther) 的用户，我们要求所有用户都安装最新的 gcc 3.3 更新 （August 2003 更新，或者相应的 Panther XCode 工具）。如果你在 Mac OS X 10.2 的 December 2002 developer tools 上安装 XCode beta 更新你就会获得这个警告信息。如果你使用 10.2，命令：
</p><pre>gcc --version</pre><p>会告诉你正在使用的版本。对于 October 24th,2003，我们要求 build 1493 或更高。</p><p>10.2 用户可以从 <a href="http://developer.apple.com/">Apple Developer Connection</a> 下载（需要先免费注册） August 2003 升级。</p><p>10.3 用户应该升级到 Panther 兼容的开发工具（也就是说  XCode）。你应该能够在你的 Panther 软件包中找到 XCode 的 CD。</p></div>
    </a>
  <p align="right">
Next: <a href="usage-fink.php?phpLang=zh">5 安装，使用和维护 Fink</a></p>

<? include_once "footer.inc"; ?>
