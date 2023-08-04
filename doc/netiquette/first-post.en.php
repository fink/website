<?php
$title = "netiquette - Initial";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:23:15';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="netiquette Contents"><link rel="next" href="reply.php?phpLang=en" title="Replying to Posts"><link rel="prev" href="before-post.php?phpLang=en" title="What to do Before You Post">';


include_once "header.en.inc";
?>
<h1>netiquette - 2. Initial Post</h1>
    
    
    <h2><a name="system">2.1 What do you have installed?</a></h2>
      
      <p>If you are having a problem installing a package, you should provide the following information about your system:</p>
      <ul>
        <li>Your OS version.</li>
        <li>The version of Fink you are running.  A useful technique here is to post the output that you get from running<pre>fink --version</pre>in a terminal window.</li>
        <li>You should specify whether you are installing from binaries, e.g. using <code>apt-get</code>, or from source, e.g. using <code>fink install</code>.<p>If the latter, you should also indicate what version of the Developer Tools you are using.</p></li>
        <li><p>If you are installing a package that requires X11, you should specify what you are using:  Apple's X11 or XFree86.  If the latter, specify its version.  </p><p>If in doubt, go ahead and provide this information.</p></li>
      </ul>
    
    <h2><a name="problem-description">2.2 What's Going Wrong?</a></h2>
      
      <ul>
        <li><b>Specify the name and version of the package that is causing the problem.</b>  <p>This should be in the subject line of your message.</p><p>This means that if you are having problems with <code>foo-3.141-6</code>, don't just report a problem with <code>foo</code>.</p><p>In particular, if you are installing a package (e.g. <code>baz-2.18-1</code>) that depends on other packages, (<code>foo-3.141-6</code>, <code>bar-16.0-9</code>, ...) , and you are having problems with <code>foo</code>, you should report a problem with <code>foo-3.141-6</code>, not with <code>baz-2.18-1</code>.</p></li>
        <li><b>Describe the problem.</b>  <p>This means that you should post a sample of an error message.</p><ol>
            <li>For binary installation problems, start with where the troublesome package is being unpacked:<pre>...
Selecting previously deselected package foo
error unpacking foo
...</pre>and go on until the end.<p></p></li>
            <li>There are a few possible issues with installation from source:<ol>
                <li>If the failure is during the initial configuration, this is usually immediate.  Post from the last couple of tests that were run before the error message on to the end:<pre>....
Checking for bar-config...no
Error:  bar-config not found
....</pre><p>If you think it might help, then you can post the relevant section of the configuration log file, e.g. <code>/opt/sw/src/foo-3.141-6/foo-3.141/config.log</code>.  <b>Please don't post the whole file, since it can be large.</b></p></li>
                <li>Or, the error can show up immediately when you've actually started building the package.  In this case, post from the last line the compiler tried to run to the end:<pre>...
gcc &lt;flags, files etc.&gt;
&lt;error messages&gt;
...</pre></li>
                <li>If you get the dreaded <code>execution of mv failed</code> error, you'll be told to search your build output for an earlier error, so you may want to try hunting for it before you post.</li>
              </ol></li>
          </ol>    </li>
      </ul>
    
    <h2><a name="remedies">2.3 What have you tried?</a></h2>
      
      <p>It's a good idea to mention what you've tried, e.g.</p>
      <ul>
        <li>Instructions in the FAQ or other documentation</li>
        <li>Removing packages that appeared to cause a conflict</li>
        <li>Rebuilding/reinstalling</li>
        <li>Updating package descriptions again</li>
        <li>etc.</li>
      </ul>
      <p>That way, people won't start by suggesting things that you've already done.</p>
    
    <h2><a name="future-plans">2.4 What will you try next?</a></h2>
      
      <p>A couple of items come under this category:</p>
      <ul>
        <li>Posting what you plan to do if you don't get an immediate response.</li>
        <li>Asking about the suitability of a course of action.</li>
      </ul>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="reply.php?phpLang=en">3. Replying to Posts</a></p>
<?php include_once "../../footer.inc"; ?>


