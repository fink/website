<?
$title = "F.A.Q. - Upgrading Fink";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2009/01/19 21:21:25';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="usage-fink.php?phpLang=en" title="Installing, Using and Maintaining Fink"><link rel="prev" href="mirrors.php?phpLang=en" title="Fink mirrors">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 4. Upgrading Fink (version-specific troubleshooting)</h1>
    
    
    <a name="gcc-0.16.0">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.1: I just upgraded to 0.16.0 and it tells me "Your version of the gcc 3.3 compiler is out of date." What do I do?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> As of the release of Panther, Fink has been updated to understand the newer gcc 3.3 compiler. In order to be able to support users on both 10.2 (Jaguar) and 10.3 (Panther), we are requiring all users to install the latest gcc 3.3 update (August 2003 Updater, and the Panther XCode tools, respectively). You will get this warning if you installed the earlier XCode beta updater for Mac OS X 10.2's December 2002 developer tools. If you're on 10.2, the command:</p><pre>gcc --version</pre><p>should tell you what version you have. As of October 24th, 2003, we require build 1493 or higher.</p><p>10.2 users can download the August 2003 Updater from <a href="http://developer.apple.com/">Apple Developer Connection</a> (free registration required).</p><p>10.3 users should upgrade to a Panther-compatible developer tools release (i.e. XCode). A CD with XCode should have been provided with your Panther media.</p></div>
    </a>
    <a name="leopard-bindist1">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.2: Fink doesn't see new packages even after I've run an rsync or cvs selfupdate.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is a current issue for people on OS 10.5 using the binary installer. Check your version:</p><pre>fink --version</pre><p>If you currently have <code>fink-0.27.13-41</code>, which is the version that comes
	with the installer, or <code>fink-0.27.16-41</code>, then there are a couple of options.</p><ul>
	  <li>
	    <b>rsync (preferred):</b>  Run the sequence below
	    <pre>fink selfupdate
fink selfupdate-rsync
fink index -f
fink selfupdate</pre>
	  </li>
	  <li>
	    <b>cvs (alternate):</b>  Run
	    <pre>fink selfupdate-cvs
fink index -f
fink selfupdate</pre>
	  </li>
	</ul><p>Either will bring you the newest <code>fink</code> version.</p></div>
    </a>
    <a name="leopard-bindist2">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.3: When I try to install stuff I get 'Can't resolve dependency "fink (&gt;= 0.28.0)"'</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Apply the fix from <a href="#leopard-bindist1">the prior entry.</a></p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=en">5. Installing, Using and Maintaining Fink</a></p>
<? include_once "../footer.inc"; ?>


