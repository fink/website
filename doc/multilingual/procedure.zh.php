<?
$title = "i18n - 更新";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="i18n Contents"><link rel="next" href="resources.php?phpLang=zh" title="附加的资源"><link rel="prev" href="files.php?phpLang=zh" title="文档文件">';


include_once "header.zh.inc";
?>
<h1>i18n - 3. 更新文档的流程</h1>
    

    

    
    <p>因为英文文档是基准，所以它必需被首先更新。
      这个更新可能来自于 i18n 团队（比如英文文档作者）或核心开发人员。</p>
      <p>为了使得整个更新过程顺畅进行，应该遵循下面的流程。</p>
    
    
    <h2><a name="call-to-translate">3.1 通知进行翻译</a></h2>
      

      <p>当一份新文档发表，或英文文档发生修改以后，应该要有一个消息发到 fink-18n 邮件列表通知所有翻译者。
      这个通知包括下面的内容：</p>

      <ul>
        <li>邮件主题中一个注解指明这是一个要求翻译的通知，例如：“[translation]”，或对于会推迟一些上线的英文文档是：“[translation-delayed]”。</li>

        <li>除此以外，在消息中应该包含基准文档的文件名。</li>

        <li>一个完整的 diff （例如：<code>diff -Nru3 -r<b>last_revision</b> r<b>head</b></code>）来表明所做的修改。</li>
      </ul>

      <p>附注：由于提交对 XML 文件的修改后会自动在 fink-commits 邮件列表中产生满足这个条件的邮件，所以一个方便的办法是修改这个邮件的主题然后把它重新发送作为通知。不过，当连续发生了很多更新的时候，可能就无法这样做了。</p>
    

    <h2><a name="new-translation">3.2 新翻译作品</a></h2>
      

      <p>在一种新的语言的翻译过程中，我们会冻结对英文和其它语言文档的修改，这样新语言的翻译团队就不用担心它们在翻译过程中文档又发生了变化。这种情况下，每种文档会在准备好的情况上线，并激活。</p>
    

<h2><a name="doc-updates">3.3 新文档：</a></h2>
      
      <p>文档的英文版本会被<a href="files.php?phpLang=zh#committing">提交</a>并<a href="files.php?phpLang=zh#website">激活</a>，然后按下面的办法<a href="#new-translations">进行翻译</a>。</p>
    
    <h2><a name="new-translation">3.4 新翻译作品：</a></h2>
      
      <p>该语言团队的领导（或其它具有 CVS 访问权限的人）负责在翻译完成以后<a href="files.php?phpLang=zh#committing">提交</a>以及<a href="files.php?phpLang=zh#website">激活</a>翻译的作品。</p>
      <p>分类包括：</p>
      <ul>
        <li>对文档的首次翻译。</li>
        <li>对文档的部分翻译。</li>
        <li>翻译一个新的英文文档</li>
      </ul>
    
    <h2><a name="prompt-update">3.5 提示更新一个已经翻译的文档：</a></h2>
      
      <p>基准英文文档被<a href="files.php?phpLang=zh#committing">提交</a>并立即<a href="files.php?phpLang=zh#website">激活</a>-修改者应该提交相应的 PHP 和 HTML 文件，并负责激活更新。
      翻译团队需要更新它们的版本，<a href="files.php?phpLang=zh#committing">提交</a><b>所有的</b>文件（XML 和 PHP），然后<a href="files.php?phpLang=zh#activate">激活</a>更新。</p>
      <p><b>注意：</b></p>
      <ol>
        <li>对国际化指南（本文档），<b>总是</b>按这个模式处理，因为它的改变影响所有翻译团队。</li>
        <li>对静态文档（那些不是由 XML 产生的 PHP 文件）也<b>总是</b>按照这个模式处理，因为它们很难<a href="#delayed-update">延迟</a>激活。</li>
      </ol>
    
    <h2><a name="delayed-update">3.6 延迟更新现有文档（仅限由 XML 产生的文档）：</a></h2>
      
      <p>这种情况下，XML 文件的英文版本会被<a href="files.php?phpLang=zh#committing">提交</a>，但<b>不会</b>提交相应的 PHP 和 HTML 文件，也就是说，在 <a href="files.php?phpLang=zh#committing">2.9节</a>的关于动态文件部分的第 5 步完成后就结束。所有的翻译者在一个大家确定的时间段内进行翻译并<b>仅仅</b><a href="files.php?phpLang=zh#committing">提交</a>相应的 XML 文件（也就是说，和英文版一样）。在这个时间段以后，由一个人，例如 i18n 核心团队的一员负责生成，提交和<a href="files.php?phpLang=zh#website">激活</a>所有的 PHP 和 HTML 文件。</p>
    
	<h2><a name="summary">3.7 对开发者和英语文档作者</a></h2>
      
      <p>当前的政策是所有文档应该按照 <a href="#prompt-update">提示更新</a> 流程进行更新，除非你有很特别的理由不这样做。</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="resources.php?phpLang=zh">4. 附加的资源</a></p>
<? include_once "../../footer.inc"; ?>



