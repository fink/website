<?php
$title = "Running X11 - Intro";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="history.php?phpLang=en" title="History"><link rel="prev" href="index.php?phpLang=en" title="Running X11 Contents">';


include_once "header.en.inc";
?>
<h1>Running X11 - 1. Introduction</h1>
    
    
    <h2><a name="def-x11">1.1 What is X11?</a></h2>
      
      <p>
The <a href="http://www.x.org/">X Window System</a> Version 11,
or X11 for short, is a graphics display system with a
network-transparent client-server architecture.
It allows applications to draw pixels, lines, text, images, etc. on
your screen.
X11 also comes with additional libraries that let applications easily
draw user interfaces, i.e. buttons, text fields, and so on.
</p>
      <p>
X11 is the de facto standard graphics system in the Unix world.
It comes with Linux, the *BSDs and most commercial Unix flavors.
Desktop environments like CDE, KDE and GNOME run on top of it.
</p>
    
    <h2><a name="def-macosx">1.2 What is Mac OS X?</a></h2>
      
      <p>
        <a href="http://www.apple.com/macosx/">Mac OS X</a> is an
operating system produced by <a href="http://www.apple.com/">Apple</a>.
Like its predecessors NeXTStep and OpenStep, it is based on BSD and is
thus a member of the Unix OS family.
However, it comes with a proprietary graphics display system.
The graphics engine is called Quartz and the look and feel is called
Aqua, although the two names are often used intercheangably.
</p>
    
    <h2><a name="def-darwin">1.3 What is Darwin?</a></h2>
      
      <p>
        <a href="http://opendarwin.org/">Darwin</a> is
basically a stripped-down version of Mac OS X that is available free
of charge and with full source code.
It does not contain Quartz, Aqua, or any other related technology.
By default, it only offers a text console.
</p>
    
    <h2><a name="def-xfree86">1.4 What is XFree86?</a></h2>
      
      <p>
        <a href="http://www.xfree86.org/">XFree86</a> is an open source
implementation of X11.
It was initially developed to run on Intel x86 PCs, hence the name.
Nowadays, it runs on many architectures and operating systems,
including OS/2, Darwin, Mac OS X and Windows.
      </p>
       <p>
Apple's X11 distributions on OS 10.2, 10.3 and 10.4 are derived from XFree86.
      </p>

<h2><a name="def-xorg">1.5 What is X.org?</a></h2>
  
  <p>
<a href="http://www.x.org/wiki/">X.org</a> is an open source implementation
of X11, and a successor to XFree86.  It has supplanted XFree86 in most places.
  </p>
  <p>
Apple's X11 distributions on OS 10.5 and 10.6 are derived from X.org, as is
 <a href="http://xquartz.macosforge.org/trac/wiki">XQuartz</a>.
Apple's X11 distribution on 10.7 is derived, in turn, from XQuartz.</p>

<h2><a name="def-xquartx">1.6 What is XQuartz?</a></h2>
  
  <p>
<a href="http://xquartz.macosforge.org/trac/wiki">
XQuartz</a> is an X11 distribution for OS 10.5 and later which contains newer features
than does the stock X11 on 10.5-10.7.  On 10.5, XQuartz replaces the system's X11 distribution,
whereas on 10.6 and 10.7 Xquartz and the system's X11 distribution coexist by installing
in different base paths.  On 10.8 Xquartz <b>is</b> the standard X11 distribution.
  </p>

     <h2><a name="client-server">1.7 Client and Server</a></h2>
      
      <p>
X11 has a client-server architecture.
There is one central program that does the actual drawing and
coordinates access by several applications; that is the server.
An application that wants to draw using X11 connects to the server and
tells it what to draw.
Thus applications are called clients in the X11 world.
</p>
      <p>
X11 allows the server and the clients to be on different machines,
which often results in confusion over the terms.
In an environment with workstations and servers, you will run the X11
display server on the workstation machine and the applications (the X
clients) on the server machine.
So when talking about the "server", that means the X11 display server
program, not the machine hidden in your wardrobe.
</p>
    
    <h2><a name="rootless">1.8 What does rootless mean?</a></h2>
      
      <p>
A little background:
X11 models the screen as a hierarchy of windows contained in each
other.
At the top of the hierarchy is a special window which is the size of
the screen and contains all other windows.
This window contains the desktop background and is called the "root
window".
</p>
      <p>
Now back on topic:
Like any graphical environment, X11 was written to stand alone and
have full control over the screen.
In Mac OS X, Quartz already governs the screen, so one must make
arrangements if both are to get along together.
</p>
      <p>
One arrangement is to let the two take turns.
Each environment gets a complete screen, but only one of them is
visible at a time and the user can switch between them.
This is called full-screen or rooted mode.
It is called rooted because there is a perfectly normal root window on
the X11 screen that works like on other systems.
</p>
      <p>
Another arrangement is to mix the two environments window by window.
This eliminates the need to switch between two screens.
It also eliminates the X11 root window, because Quartz already takes
care of the desktop background.
Because there is no (visible) root window, this mode is called
"rootless".  It is the most comfortable way to use X11 on Mac OS X.
</p>
    
    <h2><a name="wm">1.9 What is a window manager?</a></h2>
      
      <p>
In most graphical environments the look of window frames (title bar,
close button, etc.) is defined by the system.
X11 is different.
With X11, the window frames (also called "decoration") are provided by
a separate program, called the window manager.
In most respects, the window manager is just another client
application; it is started the same way and talks to the X server
through the same channels.
</p>
      <p>
There is a large number of different window managers to choose from.
<a href="http://www.xwinman.org/">xwinman.org</a> has a
comprehensive list.
Most popular ones allow the user to customize the appearance via
so-called <a href="http://www.themes.org/">themes</a>.
Many window managers also provide additional functionality, like pop
up menus in the root window, docks or launch buttons.
</p>
      <p>
Many window managers have been packaged for Fink; here is a
<a href="http://pdb.finkproject.org/pdb/browse.php?sec=x11-wm">    
current list.
</a>
      </p>
    
    <h2><a name="desktop">1.10 What are Quartz/Aqua, Gnome, and KDE?</a></h2>
      
      <p>
They are desktop environments, and there are many others.  Their purpose 
is to provide additional framework to applications, so that their look, 
feel, and behaviour can be visually consistent.  Example: 
</p>
      <p> graphics engine : X11
</p>
      <p> window manager:
<a href="http://sawmill.sourceforge.net/">sawfish</a>
      </p>
      <p> desktop: <a href="http://www.gnome.org/">Gnome</a>
      </p>
      <p>
The lines between graphics display engine, window manager,
and desktop are blurred because similar, or the same functionality, 
may be implemented by one or more of them. This is one reason why a
particular window manager may not be able to be used with a
particular desktop environment.

</p>
      <p>
Many applications are developed to integrate with a particular desktop.  
Most often by installing the libraries for the desktop environment 
(and the other underlying libraries) that an application was developed 
for, the application will work with limited or no function loss.  
Examples are the increasing 
<a href="http://pdb.finkproject.org/pdb/section.php/gnome">
selection of GNOME applications 
</a>
available to be installed and run without running GNOME.  
Unfortunately, the same 
<a href="/faq/usage-fink.php#kde">
progress is not quite yet able to be made
</a>
with <a href="http://www.kde.org/">KDE applications.</a>
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="history.php?phpLang=en">2. History</a></p>
<?php include_once "../../footer.inc"; ?>


