<?
$title = "F.A.Q. - Upgrading Fink";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/09/23 00:07:36';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="usage-fink.php?phpLang=en" title="Installing, Using and Maintaining Fink"><link rel="prev" href="mirrors.php?phpLang=en" title="Fink mirrors">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 4. Upgrading Fink (version-specific troubleshooting)</h1>
    
    
    <a name="gcc-0.16.0">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.1: I just upgraded to 0.16.0 and it tells me "Your version of the gcc 3.3 compiler is out of date." What do I do?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> As of the release of Panther, Fink has been updated to understand the newer gcc 3.3 compiler. In order to be able to support users on both 10.2 (Jaguar) and 10.3 (Panther), we are requiring all users to install the latest gcc 3.3 update (August 2003 Updater, and the Panther XCode tools, respectively). You will get this warning if you installed the earlier XCode beta updater for Mac OS X 10.2's December 2002 developer tools. If you're on 10.2, the command:</p><pre>gcc --version</pre><p>should tell you what version you have. As of October 24th, 2003, we require build 1493 or higher.</p><p>10.2 users can download the August 2003 Updater from <a href="http://developer.apple.com/">Apple Developer Connection</a> (free registration required).</p><p>10.3 users should upgrade to a Panther-compatible developer tools release (i.e. XCode). A CD with XCode should have been provided with your Panther media.</p></div>
    </a>
    <a name="fink-0220">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.2: I haven't had any package updates from Fink in a while.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Check your version:</p><pre>fink --version</pre><p>There is a known problem with <code>fink-0.22.0</code> wherein rsync selfupdating stopped working.  To fix this, switch to CVS selfupdating via</p><pre>fink selfupdate-cvs	</pre><p>This will bring you a newer <code>fink</code> version.  After you do this we recommend switching back to rsync selfupdating:</p><pre>fink selfupdate-rsync</pre></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=en">5. Installing, Using and Maintaining Fink</a></p>
<? include_once "../footer.inc"; ?>


