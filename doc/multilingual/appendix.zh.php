<?
$title = "i18n - 附录";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="i18n Contents"><link rel="prev" href="resources.php?phpLang=zh" title="附加的资源">';

include_once "header.inc";
?>

<h1>i18n - 5 附录</h1>
    

    

    <h2><a name="cvs-codes">5.1 CVS 代号。</a></h2>
      

      <p>当你更新你的 CVS 签出文件的时候，你会看到文件名之前的一些字母。
      这代表下面的一些情况：</p>

      <ul>
        <li><b>P：</b>通过补丁的方式更新到一个新的版本。</li>

        <li><b>U：</b>通过下载的方式更新到一个新的版本。</li>

        <li><b>M：</b>你本地的文件已经被修改。</li>

        <li><b>C：</b>你的版本和服务器上存储的新版本冲突。
        你应该通过编辑冲突的文件并汇入你的修改来消除冲突。
        <p>你可以使用 </p><pre>rm file;cvs update file</pre>
        <p>来消除冲突。这里 <code>file</code> 是指发生冲突的文件。然后在根据名为 <code>.#file-version</code></p> 的备份文件把你的修改重新汇入其中，这里 <b>version</b> 是你开始修改文件时候的修订版号。</li>

        <li><b>?：</b>文件既不在远端服务器的文件库中，也不在本地的忽略清单中。</li>

        <li><b>A：</b>文件已被添加，但还没有被提交。</li>

        <li><b>R：</b>文件已被清除，但还有被提交。</li>
      </ul>
    
  

<? include_once "footer.inc"; ?>
