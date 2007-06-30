<?
$title = "F.A.Q. - Compiling (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2007/06/30 19:25:46';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="usage-general.php?phpLang=en" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php?phpLang=en" title="Compile Problems - General">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 7. Compile Problems - Specific Packages</h1>
    
    
    <a name="libgtop">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.1: A package fails to build with errors involving
        <code>sed</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This can happen if your login script (e.g. <code>~/.cshrc</code>)
        does something that writes to the terminal, e.g "<code>echo
        Hello</code>" or <code>xttitle</code>. To get rid of the problem, the
        easy solution is to comment out the offending lines.</p><p>If you want to keep the echo, then you can do something like the
        following:</p><pre>if ( $?prompt) then 
	echo Hello 
endif</pre></div>
    </a>
    <a name="cant-install-xfree">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.2: I want to switch to Fink's XFree86 packages, but I can't install
        <code>xfree86-base</code> | <code>xfree86</code>, because it conflicts
        with <code>system-xfree86</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> All flavors of X11, unfortunately, really needs to be installed in
        /usr/X11R6. Because of this the Fink <code>xfree86-base</code> and
        <code>xfree86-rootless</code> packages install there, too. However,
        since Fink won't remove any files that aren't in its database, it
        won't automatically replace a non-Fink installation of X11.</p><p></p><p>Here's how to proceed:</p><p></p><p>
          <b>Note: 10.2.x users with up-to-date versions of Fink (&gt;=
        0.16.2) and 10.3.x users should skip step 1 below (it won't work
        anyway).</b>
        </p><p>1. Remove <code>system-xfree86</code>. If you don't have any
        packages that depend on X11, this is straightforward. Frequently,
        however, many packages that depend on X11 are installed. Rather than
        uninstalling all of them, you can use</p><pre>sudo dpkg --remove --force-depends system-xfree86</pre><p>to remove it, leaving everything in place. If you don't have
        <code>system-xfree86</code> installed then proceed to step 3.</p><p>2. Manually remove all of XFree86. This can be done with</p><pre>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</pre><p>If you are switching from Apple X11, remove the X11 application,
        too.</p><p>3. To get XFree86-4.2.1, Install Fink's <code>xfree86-base</code>
        and <code>xfree86-rootless</code> packages by the usual means:
        "<code>fink install</code>" for source users, "<code>apt-get
        install</code>" or <code>dselect</code> for binaries.</p><p>-or-</p><p>3a. To get XFree86-4.3.x and above, install Fink's <code>xfree86</code> package, with "fink install xfree86"--the latest version (XFree86-4.4.x as of May 25th, 2004) isn't in the binary distro yet, and is currently only in the unstable tree [see <a href="http://www.finkproject.org/faq/usage-fink.php#unstable%5C">how to install unstable packages</a>].</p></div>
    </a>
    <a name="change-thread-nothread">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.3: How do I change from the non-threaded version of Fink's XFree86
        packages to the threaded version (or vice-versa)?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you are running the Fink version of XFree86 and you want to
        switch between the threaded and non-threaded versions of Fink, you
        need to manually remove the old version. This is done at the
        command-line with the commands:</p><pre>sudo dpkg -r --force-depends xfree86-base 
sudo dpkg -r --force-depends xfree86-shlibs 
sudo dpkg -r --force-depends xfree86-rootless 
sudo dpkg -r --force-depends xfree86-rootless-shlibs</pre><p>or to delete the threaded versions:</p><pre>sudo dpkg -r --force-depends xfree86-base-threaded 
sudo dpkg -r --force-depends xfree86-shlibs-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded 
sudo dpkg -r --force-depends xfree86-rootless-threaded-shlibs</pre><p>FinkCommander also has a way to remove packages. In the source
        window, select a package, and then in the <code>Source Menu</code> use
        "<code>Force Remove</code>."</p><p>If you are using system-xfree86, see the previous question for
        removing it.</p><p>Install the version of xfree86 you want:</p><p>
          <code>xfree86-base</code> and <code>xfree86-rootless</code>
        </p><p>
          <code>xfree86-base-threaded</code> and
        <code>xfree86-rootless-threaded</code>
        </p><p>by the usual means: "<code>fink install</code>" for source users,
        "<code>apt-get install</code>" or <code>dselect</code> for
        binaries.</p></div>
    </a>
    
    <a name="cctools">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.4: "When I try to install KDE, I get the following message: 'Can't
        resolve dependency "cctools (&gt;= 446-1)"'"</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This somewhat cryptic message means you need to install the
        December 2002 Developer Tools.</p></div>
    </a>
    
    <a name="libiconv-gettext">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.5: I can't update <code>libiconv</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you get errors of the form:</p><pre>libtool: link: cannot find the library `/sw/lib/libiconv.la'</pre><p>you can solve this problem by running</p><pre>fink remove gettext-dev
fink install libiconv</pre></div>
    </a>
    <a name="cplusplus-filt">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.6: i can't install <code>g77</code> because <code>c++filt</code> is missing.  Where do I get it?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you get errors of the form </p><pre>xgcc: installation problem, cannot exec `c++filt': No such file or directory</pre><p>since updating to Tiger, then you need to do the following:</p><ul>
          <li>Flush out your old Developer Tools versions via running <pre>/Developer/Tools/uninstall-devtools.pl</pre>in a terminal.  Then install XCode (2.0 or later).<p></p></li>
          <li>Reinstall  <code>BSD.pkg</code> (from the Tiger system installation).  If <code>/usr/bin/c++filt</code> doesn't appear, keep trying.</li>
        </ul><p>
1) Flush out your old
2) Reinstall BSD.pkg (from your main OS install)</p></div>
    </a>
    <a name="gettext-tools">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.7: Fink refuses to update the <code>gettext</code> package,
complaining that the dependencies are in an inconsistent state.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> After running <code>fink selfupdate</code> to be sure you
have the latest versions, try <code>fink update gettext-tools</code>.
An old version of the <code>gettext-tools</code> package may be 
preventing you from updating <code>gettext</code>.</p></div>
    </a>

    <a name="all-others">
      <div class="question"><p><b><? echo FINK_Q ; ?>7.8: I'm having issues with a package that isn't listed here.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Since package problems tend to be transient, we've decided to put them
      up on the Fink wiki.  Check the <a href="http://wiki.finkproject.org/index.php/Fink:Package_issues"> Package issues page</a>.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=en">8. Package Usage Problems - General</a></p>
<? include_once "../footer.inc"; ?>


