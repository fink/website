<?
$title = "Running X11 - Other Stuff";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/10/31 10:16:26';

$metatags = '<link rel="start" href="index.php" title="Running X11 Contents"><link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="trouble.php" title="Troubleshooting XFree86"><link rel="prev" href="xtools.php" title="Xtools">';

include "header.inc";
?>

<h1>Running X11 - Other X11 Possibilities</h1>




<a name="vnc"><h2>VNC</h2></a>
<p>
VNC is a network-capable graphics display system similar in design to
X11.
However, it works at a lower level, making implementation easier.
With the Xvnc server and a Mac OS X display client, it is possible to
run X11 applications with Mac OS X.
Jeff Whitaker's <a href="http://www.cdc.noaa.gov/~jsw/macosx_xvnc/">Xvnc page</a> has
more information on that.
</p>



<a name="wiredx"><h2>WiredX</h2></a>
<p>
<a href="http://www.jcraft.com/wiredx/">WiredX</a> is an X11
server written in Java.
It also supports rootless mode.
An Installer.app package is available at the web site.
</p>



<a name="exodus"><h2>eXodus</h2></a>
<p>
According to the website, <a href="http://www.powerlan-usa.com/exodus/">eXodus 8</a> by Powerlan
USA runs natively on Mac OS X.
It is unknown what codebase it uses and whether/how it supports local
clients.
Because of this, there is no special support for eXodus in Fink.
If you have more info, please throw it my way.
</p>



<p align="right">
Next: <a href="trouble.php">Troubleshooting XFree86</a></p>


<?
include "footer.inc";
?>
