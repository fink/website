<?
$title = "i18n - Appendix";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="i18n Contents"><link rel="prev" href="resources.php?phpLang=en" title="Additional Resources           ">';


include_once "header.en.inc";
?>
<h1>i18n - 5. Appendix</h1>
    
    
    <h2><a name="cvs-codes">5.1 CVS codes</a></h2>
      
      <p>When you are updating your CVS checkout, you may see some letters
      before the filenames. These represent the following conditions:</p>
      <ul>
        <li><b>P:</b> There is a new version of the file via a patch.</li>
        <li><b>U:</b> There is a new version of the file via download.</li>
        <li><b>M:</b> The version in your local repository has been
        modified.</li>
        <li><b>C:</b> Your version conflicts with that in the remote
        repository. You should resolve this by editing the  file and
        merging your modifications. <p>You can use </p> <pre>rm file; cvs update file</pre> <p>where <code>file </code>is the
        offending file, to resolve the conflict, and then apply the changes
        from the backup of your file that exists
        under<code>.#file-version</code>, where <code>version</code>
        is the revision that your file started from.</p></li>
        <li><b>?:</b> The file is neither in the remote repository nor in
        the files to be ignored.</li>
        <li><b>A:</b> The file has been added but not committed yet.</li>
        <li><b>R:</b> The file has been removed but not committed yet.</li>
      </ul>
    
  
<? include_once "../../footer.inc"; ?>



