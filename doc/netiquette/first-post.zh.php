<?
$title = "网络礼仪 - 初始";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/04/18 13:29:06';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="网络礼仪 Contents"><link rel="next" href="reply.php?phpLang=zh" title="回应一个帖子"><link rel="prev" href="before-post.php?phpLang=zh" title="在张贴前需要做些什么">';


include_once "header.zh.inc";
?>
<h1>网络礼仪 - 2. 初始张贴</h1>
    
    
    <h2><a name="system">2.1 你已经安装了什么？</a></h2>
      
      <p>如果你有关于安装软件包的问题，你应该提供关于你的系统下列信息：</p>
      <ul>
        <li>你的操作系统版本。</li>
        <li>你运行的 Fink 版本。一个有用的方法是张贴你的命令行窗口运行 <pre>fink --version</pre> 命令的输出。</li>
        <li>你应该指明你时候从二进制版本进行安装，例如，使用 <code>apt-get</code>；或是从源代码进行安装，例如，使用 <code>fink install</code>。<p>如果是后者，你应该指明你使用的开发工具的版本。</p></li>
        <li><p>如果你正在安装一个需要 X11 的软件包，你应该指明你使用的软件包：苹果的 X11 还是 XFree86。
        如果是后者，指明它的版本号。</p>
        <p>如果存在怀疑的话，请尽管提供这个信息。</p></li>
      </ul>
    
    <h2><a name="problem-description">2.2 发生了什么问题？</a></h2>
      
      <ul>
        <li><b>指明出现问题的软件包的名字和版本号。</b>  
        <p>这应该出现你的信息的主题行中。</p>
        <p>意思是如果你的问题是关于 <code>foo-3.141-6</code>，不要只是说是一个关于 <code>foo</code> 的问题。</p>
        <p>尤其是，如果你在安装一个依赖于其它软件包(<code>foo-3.141-6</code>, <code>bar-16.0-9</code>, ...)的软件包(例如：<code>baz-2.18-1</code>)的时候，你在 <code>foo</code> 安装时出现问题，你应该报告一个关于 <code>foo-3.141-6</code> 的问题，而不是 <code>baz-2.18-1</code>。</p></li>
        <li><b>描述问题。</b>
        <p>意思是你应该张贴一个错误信息的样本。</p>
        <ol>
            <li><p>对于二进制版本的安装问题，从发生问题的软件包开始解包的位置开始摘录：</p>
            <pre>...
Selecting previously deselected package foo
error unpacking foo
...</pre>
<p>然后一直到结束。</p></li>
            <li><p>对于从源代码安装有几种可能需要考虑的情况：</p>
            <ol>
                <li><p>如果在初始配置的时候失败，这通常是立即发生的。
                从错误信息之前的几项测试开始一直摘录到最后：</p>
                <pre>....
Checking for bar-config...no
Error:  bar-config not found
....</pre>
						<p>如果你认为可能有帮助的话，你可以张贴配置日志文件的相应部分，例如： <code>/sw/src/foo-3.141-6/foo-3.141/config.log</code>。<b>请不要张贴整个文件，因为它会非常巨大。</b></p>
						</li>
                <li><p>或者，错误在你实际开始构建软件包时立即发生。
                这种情况下，可以张贴从编译尝试运行到结束的几行：</p>
                <pre>...
gcc &lt;编译标志，文件，等等&gt;
&lt;错误信息&gt;
...</pre>
						</li>
                <li><p>如果你遇到的是看起来很可怕的 <code>execution of mv failed</code> 错误，你应该在你的编译输出中寻找一个更早发生的错误，所以在张贴之前你需要把它找出来。</p></li>
              </ol>
              </li>
          </ol>
          </li>
      </ul>
    
    <h2><a name="remedies">2.3 你尝试过什么？</a></h2>
      
      <p>提及你尝试过什么解决办法是个好主意，例如：</p>
      <ul>
        <li>FAQ 的指南或其它文档</li>
        <li>删除似乎是引起问题的软件包</li>
        <li>重新构建/重新安装</li>
        <li>再次升级软件包描述</li>
        <li>等等。</li>
      </ul>
      <p>这样，其它人不会再向你建议你已经做过的事情。</p>
    
    <h2><a name="future-plans">2.4 下面你打算尝试什么？</a></h2>
      
      <p>这个类别下包括一些项目：</p>
      <ul>
        <li>如果你没有获得立即的回应，张贴你下一步计划做的事情。</li>
        <li>询问一系列操作是否合适。</li>
      </ul>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="reply.php?phpLang=zh">3. 回应一个帖子</a></p>
<? include_once "../../footer.inc"; ?>


