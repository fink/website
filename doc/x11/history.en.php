<?
$title = "Running X11 - History";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2013/01/03 18:17:34';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="next" href="inst-xfree86.php?phpLang=en" title="Getting and Installing X11"><link rel="prev" href="intro.php?phpLang=en" title="Introduction">';


include_once "header.en.inc";
?>
<h1>Running X11 - 2. History</h1>
    
    
    
      <p>[Sorry for the epic language, I couldn't resist...]</p>
    
    <h2><a name="early">2.1 The early days</a></h2>
      
      <p>
In the beginning, there was void.
Darwin was in its infancy, Mac OS X was still in development and there
was no X11 implementation for both of them.
</p>
      <p>
Then there came John Carmack and ported XFree86 to Mac OS X Server,
which was the only OS in the Darwin family available at that time.
Later that port was updated for XFree86 4.0 and Darwin 1.0 by Dave
Zarzycki.
The patches found their way into the Darwin CVS repository and slept
there, waiting for things to come.
</p>
    
    <h2><a name="xonx-forms">2.2 XonX forms</a></h2>
      
      <p>
One fine day Torrey T. Lyons came along and gave the Darwin patches
the attention they had been waiting for.
Finally, he brought them to a new home, the official XFree86 CVS
repository.
This was the time of the Mac OS X Public Beta and Darwin 1.2.
XFree86 4.0.2 worked fine on Darwin, but on Mac OS X it required users
to log out of Aqua and go to the console to run it.
So Torrey gathered the <a href="http://mrcla.com/XonX/">XonX team</a> around
him and set out on a voyage to bring XFree86 to Mac OS X.
</p>
      <p>
At about the same time Tenon started to build Xtools, using XFree86
4.0 as the foundation.
</p>
    
    <h2><a name="root-or-not">2.3 To root or not to root</a></h2>
      
      <p>
Soon the XonX team had XFree86 running in a fullscreen mode in
parallel to Quartz and was putting out test releases for adventurous
users.
The test releases were called XFree86-Aqua, or XAqua for short.
Since Torrey had taken the lead, changes went directly to
XFree86's CVS repository, which was heading towards the 4.1.0
release.
</p>
      <p>
In the first stages interfacing with Quartz was done via a small
application called Xmaster.app (written with Carbon, then rewritten
with Cocoa).
Later that code was integrated into the X server proper, giving birth
to XDarwin.app.
Shared library support was also added at this time (and Tenon was
convinced to use this set of patches instead of their own to ensure
binary compatibility).
There was even good progress on a rootless mode (using the Carbon
API), but alas, it was too late to get it into XFree86 4.1.0.
And the rootless patch was free, and continued to float around the
net.
After XFree86 4.1.0 shipped with just the fullscreen mode, work on the
rootless mode continued, now using the Cocoa API.
An experimental rootless mode was put into XFree86's CVS repository.
</p>
      <p>
In the meantime, Apple released Mac OS X 10.0 and Darwin 1.3,
and Tenon released Xtools 1.0 some weeks after that.
</p>
      <p>Development continued on integrating the rootless mode into XFree86,
so that by the time XFree86 4.2.0 shipped in January 2002, the Darwin/Mac OS X 
version had been completely integrated into the main XFree86 distribution.
</p>
    
    <h2><a name="apple-x11-distros">2.4 Apple's X11 distributions</a></h2>
         
      <p>
        On January 7, 2003, Apple released a beta version of its own custom X11
        implementation for OS 10.2.
        It was based on XFree86-4.2 and included Quartz rendering and accelerated
        OpenGL.
        A new version was released on February 10, 2003 with additional features
        and bugfixes.
        A third release (i.e. Beta 3) was made on March 17, 2003 with
        further additional features and bugfixes.
      </p>
      <p>
        On October 24, 2003, Apple released Panther (10.3), which included the first
        release version of their X11 distribution, based on XFree86-4.3.
      </p>
      <p>
        On April 29, 2005, Apple released Tiger (10.4), which included an X11 distribution based on XFree86-4.4.
      </p>
      <p>
        On October 26, 2007, Apple released Leopard (10.5), which included an X11 distribution based on X.org-7.2.  
      </p>  
      <p>
        On August 28, 2009, Apple released Snow Leopard (10.6), which included an X11 distribution based on X.org-7.2.  
      </p>
      <p>On July 20, 2011, Apple released Lion (10.7), which included an X11 distribution based on XQuartz-2.6.4.</p>
      <p>
        On July 25, 2012, Apple relased Mountain Lion (10.8).  For this version of OS X, XQuartz-2.7.2 or later is the
        appropriate X11 distribution to use.
      </p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="inst-xfree86.php?phpLang=en">3. Getting and Installing X11</a></p>
<? include_once "../../footer.inc"; ?>


