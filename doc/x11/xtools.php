<?
$title = "Running X11 - Xtools";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/08/10 17:26:27';

$metatags = '<link rel="start" href="index.php" title="Running X11 Contents"><link rel="contents" href="index.php" title="Running X11 Contents"><link rel="next" href="other.php" title="Other X11 Possibilities"><link rel="prev" href="run-xfree86.php" title="Starting XFree86">';

include "header.inc";
?>

<h1>Running X11 - Xtools</h1>




<a name="install"><h2>Installing Xtools</h2></a>
<p>
Now that's easy for a change.
Get the installer, double-click it, and follow the instructions.
Be sure to select the startup volume when asked.
</p>
<p>
If you're using Fink, you should install the
<tt><nobr>system-xtools</nobr></tt> package after you've installed Xtools.
That package will not install any files, it will just check that the
libraries etc. are there and act as a placeholder in Fink's dependency
system.
</p>



<a name="run"><h2>Running Xtools</h2></a>
<p>
To run Xtools, double-click Xtools.app in your Applications folder.
Like XFree86, Xtools will run the clients you specify in your
<tt><nobr>.xinitrc</nobr></tt> file.
Xtools additionally allows you to start clients via the menu.
</p>



<p align="right">
Next: <a href="other.php">Other X11 Possibilities</a></p>


<?
include "footer.inc";
?>
