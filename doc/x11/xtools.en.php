<?
$title = "Running X11 - Xtools";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/05/13 22:06:26';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="other.php?phpLang=en" title="Other X11 Possibilities"><link rel="prev" href="run-xfree86.php?phpLang=en" title="Starting XFree86">';

include_once "header.inc";
?>

<h1>Running X11 - 5 Xtools</h1>
    
    
    <h2><a name="install">5.1 Installing Xtools</a></h2>
      
      <p>
Now that's easy for a change.
Get the installer, double-click it, and follow the instructions.
Be sure to select the startup volume when asked.
</p>
      <p>
If you're using Fink, you should install the
<code>system-xtools</code> package after you've installed Xtools.
That package will not install any files, it will just check that the
libraries etc. are there and act as a placeholder in Fink's dependency
system.
</p>
    
    <h2><a name="run">5.2 Running Xtools</a></h2>
      
      <p>
To run Xtools, double-click Xtools.app in your Applications folder.
Like XFree86, Xtools will run the clients you specify in your
<code>.xinitrc</code> file.
Xtools additionally allows you to start clients via the menu.
</p>
    
    <h2><a name="opengl">5.3 OpenGL Notes</a></h2>
      
      <p>
Xtools does hardware-accelerated OpenGL in rootless mode and comes
with the libraries to support it.
While the main libGL library is fine, the libGLU and libglut libraries
are only present as static libraries, which is not sufficient for
full binary compatibility with XFree86.
Also, some headers are missing.
Fink doesn't offer a workaround at this time.
Hopefully this will be fixed in Xtools 1.1 once it is released.
</p>
    
  <p align="right">
Next: <a href="other.php?phpLang=en">6 Other X11 Possibilities</a></p>

<? include_once "footer.inc"; ?>
