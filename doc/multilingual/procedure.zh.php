<?
$title = "i18n - 更新";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="i18n Contents"><link rel="next" href="resources.php?phpLang=zh" title="附加的资源"><link rel="prev" href="files.php?phpLang=zh" title="文档文件">';

include_once "header.inc";
?>

<h1>i18n - 3 更新文档的流程</h1>
    

    

    
      <p>为了使得整个更新过程顺畅进行，应该遵循下面的流程。</p>
    

    <h2><a name="new-translation">3.1 新翻译作品</a></h2>
      

      <p>在一种新的语言的翻译过程中，我们会冻结对英文和其它语言文档的修改，这样新语言的翻译团队就不用担心它们在翻译过程中文档又发生了变化。这种情况下，每种文档会在准备好的情况上线，并激活。</p>
    

    <h2><a name="doc-updates">3.2 内容更新</a></h2>
      

      <p>因为英文文档是基准，所以它必需被首先更新。
      这个更新可能来自于 i18n 团队（比如英文文档作者）或核心开发人员。</p>

      <p>对于文档更新有些分类：</p>

      <ol>
        <li><b>紧急（安全性，错误修复，等）：</b>基准的英文文档会立刻获得更新，翻译者应该尽快更新它们自己的文档并放上线。</li>

        <li><b>非紧急：</b>这种情况下，基准英文文档会被更新，但不会立刻被放上线。
        所有的翻译者各自进行翻译，并在一两天内上传他们的版本，然后所有文档会同时被放上线。</li>
      </ol>
    

    <h2><a name="call-to-translate">3.3 通知进行翻译</a></h2>
      

      <p>在英文文档准备好以后，会有一个消息发到 fink-18n 邮件列表通知所有翻译者。
      这个通知包括下面的内容：</p>

      <ul>
        <li>邮件主题中一个注解指明这是一个要求翻译的通知，例如：“[translation]”，或对于那些要立即上线的英文文档是：“[translation-urgent]”。</li>

        <li>除此以外，在消息中应该包含基准文档的文件名。</li>

        <li>一个完整的 diff （例如：<code>diff -Nru3 -r<b>last_revision</b> r<b>head</b></code>）来表明所做的修改。</li>
      </ul>

      <p>附注：由于提交对 XML 文件的修改后会自动在 fink-commits 邮件列表中产生满足这个条件的邮件，所以一个方便的办法是修改这个邮件的主题然后把它重新发送作为通知。</p>
    

    <h2><a name="translate">3.4 翻译</a></h2>
      

      <p>现在是实际进行的翻译工作。在翻译完成后，把它提交到 CVS。</p>
    

    <h2><a name="activation">3.5 激活修改</a></h2>
      

      <p>有两种激活修改的可能：</p>

      <ol>
        <li>对于紧急的修改，在完成文档以后，立即激活修改。</li>

        <li>对非紧急的修改，会在全部语言的文档完成以后激活修改。</li>
      </ol>
    
  <p align="right">
Next: <a href="resources.php?phpLang=zh">4 附加的资源</a></p>

<? include_once "footer.inc"; ?>
