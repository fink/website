<?
$title = "常见疑问（F.A.Q.） - 一般性问题";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/07 23:28:43';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="relations.php?phpLang=zh" title="与其它项目的关系"><link rel="prev" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents">';

include_once "header.inc";
?>

<h1>常见疑问（F.A.Q.） - 1 一般性问题</h1>
    
    
    <a name="what">
      <div class="question"><p><b>Q1.1: 什么是 Fink？</b></p></div>
      <div class="answer"><p><b>A:</b> 
Fink 希望把越来越多的 Unix 软件带到 Mac OS X，因此它的两个主要目标是：
</p><p>
第一目标是移植软件到 Mac OS X 上。
我们寻找现成的开放源代码的 Unix 软件，并对它做必要的修正以使得它可以在 Mac OS X 上编译和运行。有些时候这很容易，但对一些软件包，也可能很难甚至不可能。
我们试图通过提供一些工具和文档来使它更容易些。
</p><p>
第二目标是使我们的成果能够被普通用户所使用。
为了实现这个目标，我们建立了一个的软件包管理工具。它移植自 Linux 上两个主要的程序 <code>dpkg</code> 和　<code>apt-get</code>，它们原来是为<a href="http://www.debian.org/">Debian GNU/Linux</a> 项目编写的。
我们的软件包的二进制发行版使用 <code>.deb</code> 软件包格式。
对于从源代码构建软件包，我们使用我们自己的工具，称为 <code>fink</code>，它可以生成 <code>.deb</code> 软件包文件。
</p></div>
    </a>
    <a name="naming">
      <div class="question"><p><b>Q1.2: Fink 是什么意思？</b></p></div>
      <div class="answer"><p><b>A:</b> 没有什么特别含义，只是一个名字而已。它也不是什么缩写。</p><p>事实上，Fink 在德语中是雀类（属于鸟类）的意思。当我在给这个项目起名的时候，操作系统的名称 Darwin，使我联想到查尔斯·达尔文，Galapagos 群岛和进化论。然后我想起了学校时学过的关于达尔文雀的东西，以及它们尖尖的嘴...</p></div>
    </a>
    <a name="bsd-ports">
      <div class="question"><p><b>Q1.3: Fink 和 BSD port 机制有什么区别（它被包括在 OpenPackages 和 GNU-Darwin 中）？</b></p></div>
      <div class="answer"><p><b>A:</b> 一些主要优点：</p><ul>
          <li>
            <p>
它用 Perl 编写，而不是 make/shell。
这样它并不依赖于 BSD make 的某个特定功能。
这样不需要表明软件包必须使用 GNU make 来构建。
</p>
          </li>
          <li>
            <p>
dpkg 提供完善的二进制包管理机制－平滑升级，对配置文件的特别处理，虚拟软件包，以及其它高级依赖关系设置。
</p>
          </li>
          <li>
            <p>
除非特别指明，Fink 不会安装到 /usr/local。也不需要对 /usr/bin/make 或其它系统本身的命令进行修正。
这使得它的使用会更安全，并最大限度降低与 Mac OS X 和第三方软件包可能造成的冲突。
</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local">
      <div class="question"><p><b>Q1.4: 为什么 Fink 不安装在 /usr/local？</b></p></div>
      <div class="answer"><p><b>A:</b> 有几个原因，总括来说是 "可能会被损坏"。</p><p>原因一：第三方软件。/usr/local 是存放不是由系统提供的第三方软件的地方。这意味着这是一个放杂七杂八东西的好地方。同时，这也意味着其它人也会放杂七杂八的东西到那里。多数的安装流程只是简单地覆盖那里的东西——对 dpkg 也是这样。当然，用户可以选择不安装第三方软件到 /usr/local。不幸的是，多数的安装程序并不事先告诉你它会安装到哪里。</p><p>原因二：/usr/local/bin 在默认的 PATH 设置中。这意味着你的 shell 程序不需要什么其它设置就可以找到你安装的程序。但这意味着如果你不想使用这个程序，你需要进行额外的设置。极端情况下，它会影响系统本身——由需要部分依赖于 shell 脚本。</p><p>原因三：编译工具默认搜索 /usr/local 目录。编译器会在 /usr/local/include 寻找头文件，连接器会在 /usr/local/lib 寻找连接库。同样，有些时候这会显得方便些，但在有需要的时候会很难禁用这个特性。通过把一个错误的 <code>stdio.h</code> 文件放到 /usr/local/include 目录中，你就很容易使得编译器出错。</p><p>总的来说，把 Fink 安装到 /usr/local 是可能的。安装程序会明确警告你，但如果你确认你同意这样做的风险，它会按你的要求去做。</p></div>
    </a>
    <a name="why-sw">
      <div class="question"><p><b>Q1.5: 为什么选择 /sw？</b></p></div>
      <div class="answer"><p><b>A:</b> 这个选择基本上是很随意的，但是基于实践（升级）的理由以及它在避免于其它软件包系统冲突方面是足够安全的，在可以遇见的将来仍然会保持这样。</p></div>
    </a>
  <p align="right">
Next: <a href="relations.php?phpLang=zh">2 与其它项目的关系</a></p>

<? include_once "footer.inc"; ?>
