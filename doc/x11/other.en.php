<?
$title = "Running X11 - Other Stuff";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2013/01/02 02:49:03';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="trouble.php?phpLang=en" title="Troubleshooting XFree86 (*Currently being updated*)"><link rel="prev" href="run-xfree86.php?phpLang=en" title="Starting X11">';


include_once "header.en.inc";
?>
<h1>Running X11 - 5. Other X11 Possibilities</h1>
    
    
    <h2><a name="vnc">5.1 VNC</a></h2>
      
      <p>
        VNC is a network-capable graphics display system similar in design to
        X11.
        However, it works at a lower level, making implementation easier.
        With the Xvnc server and a Mac OS X display client, it is possible to
        run X11 applications with Mac OS X.  Fink provides X11-based VNC packages for some platforms.
        Check the entries <a href="http://pdb.finkproject.org/pdb/browse.php?summary=vnc">here</a>
      </p>
      <p>
      </p>
    
    <h2><a name="weirdx">5.2 WeirdX</a></h2>
      
      <p>
        <a href="http://www.jcraft.com/weirdx/">WeirdX</a> is an X11
        server written in Java.
        It also supports rootless mode.
        Sources and a java jar file are available at the web site.
      </p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="trouble.php?phpLang=en">6. Troubleshooting XFree86 (*Currently being updated*)</a></p>
<? include_once "../../footer.inc"; ?>


