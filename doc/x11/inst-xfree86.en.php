<?php
$title = "Running X11 - Installing X11";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2013/01/03 18:17:34';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=en" title="Starting X11"><link rel="prev" href="history.php?phpLang=en" title="History">';


include_once "header.en.inc";
?>
<h1>Running X11 - 3. Getting and Installing X11</h1>
    
    
    <h2><a name="apple-binary">3.1 Apple's Distributions</a></h2>
      
      <p>
        All of the OS X versions currently supported by Fink use an X11 distribution from Apple.
        The supported configurations are:
      </p>
      <ul>
        <li>
          <p>
            <b>10.5:</b>  Fink supports the built-in X11 as well as XQuartz-2.6.3 and earlier.
          </p>
          <p>
            <b>Note:</b>  Apple's X11 on 10.6 has older-versioned libraries than does XQuartz-2.4, so
            installing such a version of XQuartz complicates upgrades from 10.5 to 10.6.
          </p>
        </li>
        <li>
          <p>
            <b>10.6:</b>  Fink only supports the built-in X11.  Since our packages are only
            supposed to build the built-in X11, if you really want to use XQuartz and Fink you will
            need to make sure to keep the stock X11 installed, too.
          </p>
        </li>
        <li>
          <p>
            <b>10.7:</b>  Fink only supports the built-in X11.  Since our packages are only
            supposed to build the built-in X11, if you really want to use XQuartz and Fink you will
            need to make sure to keep the stock X11 installed, too.
          </p>
        </li>
        <li>
          <p>
            <b>10.8:</b>  Fink only supports XQuartz-2.7.2 and later.
          </p>
        </li>
      </ul>
      <p>
        To build packages, if you're using the stock X11 on 10.5-10.7, for Xcode &lt;= 4.2.1
        you will also need to make sure that the X11 SDK is installed (though this is normally 
        the case by default).  XQuartz users on 10.5 should <b>not</b> do this, since
        XQuartz contains everything.  On 10.7, the Command Line Tools for Xcode &gt;= 4.3 contains
        the X11 SDK.  On 10.8, you only need to install XQuartz.
      </p>
      <p>
        All of the X11 packages support both full-screen and rootless operation, and have OpenGL support.
      </p>
      <p>For more information on using Apple's X11, check out this <a href="http://developer.apple.com/darwin/runningx11.html">article</a> at the Apple Developer Connection.</p>
    
    <h2><a name="fink">3.2 Using X11 via Fink</a></h2>
      
      <p>Fink keeps track of X11 via a set of virtual packages.  The most important of these are:</p>
      <ul>
        <li><code>system-xfree86-shlibs</code>, representing the shared libraries</li>
        <li><code>system-xfree86</code>, representing the executables</li>
        <li><code>x11-shlibs</code>, again representing the shared libraries</li>
        <li><code>x11</code>, again representing the executables.</li>
        <li><code>system-xfree86-dev</code>, representing the headers</li>
        <li><code>x11-dev</code>, again representing the headers</li>
      </ul>
      <p>
        Note:  The presence of the separate <code>system-xfree86*</code> and 
        <code>x11*</code> families is a holdover from OS versions prior to 10.5, where Fink 
        had its own X11 packages which also provided the <code>x11</code> family.
      </p>
      <p>
        If you are missing any of these packages, then you're missing files from your X11 installation
        and may need to (re)install something.  For example, if <code>x11-dev</code> and
        <code>system-xfree86-dev</code> are missing, this often indicates that the X11 SDK hasn't been
        installed.
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=en">4. Starting X11</a></p>
<?php include_once "../../footer.inc"; ?>


