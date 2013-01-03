<?
$title = "Running X11 - Tips";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2013/01/03 18:17:34';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Running X11 Contents"><link rel="prev" href="trouble.php?phpLang=en" title="Troubleshooting XFree86">';


include_once "header.en.inc";
?>
<h1>Running X11 - 7. Usage Tips</h1>
    
    
    <h2><a name="menu-items">7.1 Launching X11 apps from the Applications menu</a></h2>
      
      <p>
        Programs that require calling other programs which reside
        within your Fink tree for
        some of their functions may need special treatment to get them to work when called from the
        Application menu.  Instead of putting just the full path to the filename, e.g.</p>
        <pre>/sw/bin/emacs</pre>
          <p>
            you'll want to use something like the following, if you're using bash as your
            default shell:</p>
          <pre>. /sw/bin/init.sh ; emacs</pre>
          <p>and if you're using tcsh:</p>
          <pre>source /sw/bin/init.csh ; emacs</pre>
          <p>
            This makes sure that the application has the correct PATH information.  You can use this
            syntax for any Fink-installed application.
          </p>
          <p>
            <b>Note:</b> some programs appear not to be launchable in this manner.
          </p>
    
    <h2><a name="terminal-app">7.2 Launching X11 apps from Terminal.app</a></h2>
      
      <p>
        Launching X11 applications from a Terminal(.app) window (or one from another non-X11 terminal
        program) is straightforward with current versions of X11 on OS 10.5 and later.  Enter the
        application's name as you would for a command-line program, OS X will start X11 if it
        isn't already running, and then run your application.
      </p>
      <p>
        <b>Important Note:</b> Prior to 10.5, it was required to set the <code>DISPLAY</code>
        environment variable in your terminal session for it to talk to X11.  <b>Don't</b> do
        this on 10.5 and later, since OS X automatically sets it to the right value.
      </p>
    
    <h2><a name="open">7.3 Launching Aqua apps from an xterm</a></h2>
      
      <p>
        One way to launch Aqua applications from an <code>xterm</code> (or any other shell,
        actually) is the <code>open</code> command.
        Some examples:
      </p>
      <pre>open /Applications/TextEdit.app
open SomeDocument.rtf
open -a /Applications/TextEdit.app index.html</pre>
      <p>
        The second example opens the document in the application that is
        associated with it, the third example explicitly gives an application
        to use.
      </p>
      <p>
        The <code>launch</code> command from Fink's <b>launch</b> package works the same way,
        and provides some additional functionality.
      </p>
    
    <h2><a name="copy-n-paste">7.4 Copy and Paste</a></h2>
      
      <p>
Copy and Paste generally works between the Aqua and X11 environments.
There are still some bugs.
Emacs is reported to be picky about the current selection.
Copy and paste from Classic to X11 doesn't work.
</p>
      <p>
Anyway, the trick is to use the respective methods of the environment
you're in.
To transfer text from Aqua to X11, use Cmd-C in Aqua, then bring the
destination window to the front and use the "middle mouse button", i.e. Option-click
on a single-button mouse (turn on "Emulate three button mouse" in the X11 Preferences), to paste.
To transfer text from X11 to Aqua, simply select the text with the
mouse in X11, use Cmd-C to copy it, then use Cmd-V in Aqua to paste it.  Depending on your OS
and X11 versions, you may also be able to use the copy function from your X11 application to copy
your selection, too.
      </p>
      <p>
        The X11 system actually has several separate clipboards (called "cut
buffers" in X11 speak), and some applications have weird views which
one should be used.
In particular, pasting into GNU Emacs or XEmacs sometimes hasn't worked
because of this.  Apple's <code>quartz-wm</code> window manager smooths out synchronization between
the buffers.  If you want to use a different window manager, you can still get the benefits of
<code>quartz-wm</code> on 10.5-10.7, by using the <code>--only-proxy</code> flag:</p>
<pre>...
quartz-wm --only proxy &amp;
exec &lt;your window manager here&gt;
</pre>
      <p>Note:  this flag is no longer used in <code>quartz-wm</code> from Xquartz-2.7.x .</p>
      <p>
        The program <code>autocutsel</code> is deprecated, but is still available on 10.5 and 10.6
        if you don't want to use <code>quartz-wm --only proxy</code>.
        It automatically synchronizes the two main cut buffers.
        To run it, install the <b>autocutsel</b> Fink package and add the following
        line to your <code>.xinitrc</code> or in its own <code>.xinitrc.d</code>
        shell script:
      </p>
      <pre>autocutsel &amp;</pre>
      <p>
        (Make sure this runs <b>before</b> the line that exec's the window
        manager and never returns! Don't just add it at the end, it won't
        be executed.)
      </p>
      <p>
        In any case, if you encounter problems copying or pasting from Aqua to X11 and vice-versa,
        you may first try to do the pasting part twice (it may happen that the copy does not occur
        at once), then use intermediate applications, e.g. TextEdit or Terminal.app on the Aqua side,
        nedit or an xterm on the X11 side. In my experience, there is always a solution.
      </p>
    
  
<? include_once "../../footer.inc"; ?>


