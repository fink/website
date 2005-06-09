<?
$title = "User's Guide - Packages";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2005/05/22 07:29:56';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="User\'s Guide Contents"><link rel="next" href="upgrade.php?phpLang=en" title="Upgrading Fink"><link rel="prev" href="install.php?phpLang=en" title="First Time Installation">';


include_once "header.en.inc";
?>
<h1>User's Guide - 3. Installing Packages</h1>
    
    
    
      <p>
Now that you have something that can be called a Fink installation,
this chapter shows you how to install the actual software packages you
came for.
Before we explain how to install packages using either the source or
the binary distribution, some important notes that apply to both.
</p>
    
    <h2><a name="bin-dselect">3.1 Installing Binary Packages with
dselect</a></h2>
      
      <p>
        <code>dselect</code> is a program that lets you browse the list of
available packages and select which ones you want installed.
It runs inside Terminal.app, but takes over the whole "screen" and
uses simple keyboard navigation.
Like the other package management tools, <code>dselect</code> requires
root privileges, so you should use sudo (from an account with administrator privileges):
</p>
      <pre>sudo dselect</pre>
      <p>
        <b>Note:</b>
        <code>dselect</code> has known difficulties with the Mac OS X Terminal application.  You should run the following commands before using it, or put them in the appropriate startup file (e.g. <code>.cshrc</code> / <code>.profile</code>):</p>
      <p>tcsh users:</p>
      <pre>setenv TERM xterm-color</pre>
      <p>bash users:</p>
      <pre>export TERM=xterm-color</pre>
      <p>
The main menu has several choices:
</p>
      <ul>
        <li>
          <p>
            <b>[A]ccess</b> - this configures the network access method to use.
<b>You do not need to run this</b>, since Fink pre-configures
everything for you.
Actually, you should avoid this menu item as it may overwrite the
default configuration with one that doesn't work.
</p>
        </li>
        <li>
          <p>
            <b>[U]pdate</b> - this item downloads the list of available packages
from the Fink site.
This item does not install or update any actual packages, it just
updates the listings used for the package browser.
You must run this at least once after installing Fink.
</p>
        </li>
        <li>
          <p>
            <b>[S]elect</b> - this gives you the actual package listing, where
you can select and deselect the packages you want on your system.
More about this later.
</p>
        </li>
        <li>
          <p>
            <b>[I]nstall</b> - this is where the action is.
The menu items above only affect dselect's package listings and status
database.
This one actually goes out and downloads and installs the packages you
have requested.
It also removes the packages you have deselected in the browser.
</p>
        </li>
        <li>
          <p>
            <b>[C]onfig</b> and <b>[R]emove</b> - these are relics from the
time before apt.
You do not need them, although they won't do harm.
</p>
        </li>
        <li>
          <p>
            <b>[Q]uit</b> - now that should really be obvious.
</p>
        </li>
      </ul>
      <p>
You'll spend most of your time with dselect in the package browser,
reachable through the "[S]elect" menu item.
Before dselect shows you the package list, it presents you with an
introductory help screen.
You can press 'k' to get a full listing of keyboard commands, or just
Space to get to the package list.
</p>
      <p>
You can move through the list using the up and down keys.
Selections are made with '+' and '-'.
When you select a package that needs some other packages, dselect will
show you a sublist with the affected packages.
In most cases you can just press Return to accept dselect's choices.
You can also make adjustments in the sublist (e.g. to choose another
alternative for a virtual package dependency), or press 'R'
(i.e. Shift-R) to return to the previous state.
Both the sublists and the main package list are left by pressing
Return.
When you're happy with your selections, leave the main list and use
the "[I]nstall" menu item to actually install the packages.
</p>
    
    <h2><a name="bin-apt">3.2 Installing Binary Packages with
apt-get</a></h2>
      
      <p>
        <code>dselect</code> doesn't actually download the packages itself.
Instead, it runs apt to do the dirty work.
If you prefer a pure command line interface, you can access the
functions of apt directly, with the <code>apt-get</code> command.
</p>
      <p>
Like with dselect, you must first download the current listing of
available packages with this command:
</p>
      <pre>sudo apt-get update</pre>
      <p>
Like the "[U]pdate" menu item in dselect, this doesn't update the
actual files on your computer, just apt's list of available packages.
To install a package, you just give apt-get the name, like this:
</p>
      <pre>sudo apt-get install lynx</pre>
      <p>
If apt-get determines that the packages requires other packages to be
installed, it will show you the list and ask for confirmation.
It then downloads and installs the requested packages.
Removing packages is just as easy:
</p>
      <pre>sudo apt-get remove lynx</pre>
      <p>
      </p>
    
    <h2><a name="bin-exceptions">3.3 Installing Dependent Packages that are Unavailable in the Binary Distribution</a></h2>
      
      <p>Sometimes, when doing a binary install, you may get messages that a dependency can't be installed. e.g.:</p>
      <pre>Sorry, but the following packages have unmet
dependencies:
foo: Depends: bar (&gt;= version) but it is
not installable
E: Sorry, broken packages</pre>
      <p>What has happened is that the package you are trying to install depends on another package that can't be distributed as a binary, due to licensing requirements.  You must install the dependency from source (see the next section).</p>
    
    <h2><a name="src">3.4 Installing Binary and Source Packages with fink</a></h2>
      
      <p>
The <code>fink</code> tool will allow you to install packages that are not yet
available in the <a href="intro.php?phpLang=en#src-vs-bin">binary
distribution</a>.
      </p>
      <p>First of all, you'll need an appropriate version of the Development Tools for your system.  These are available for free download after registration at <a href="http://connect.apple.com">http://connect.apple.com</a>.</p>
      <p>
To get a list of packages that are available for installation from
source, ask the <code>fink</code> tool:
</p>
      <pre>fink list</pre>
      <p>
The first column lists the installation state (blank for not
installed, <code>i</code> for installed, <code>(i)</code> for
installed but not the latest version), followed by the package name,
the latest version, and a short description.
You can ask for more information about a specific package using the
"describe" command ("info" is an alias for this):
</p>
      <pre>fink describe xmms</pre>
      <p>
When you have found a package that you want to install, use the
"install" command:
</p>
      <pre>fink install wget-ssl</pre>
      <p>
The <code>fink</code> command will first check if all necessary
prerequisites ("dependencies") are present, and will ask you if it's
okay to install them if some are missing.
Then it goes ahead and downloads source code, unpacks it, patches it,
compiles it, and installs the results on your system.
This can take a long time.
If you run into errors during that process, please first check the
<a href="http://fink.sourceforge.net/faq/">FAQ</a>.
      </p>
      <p>
For <code>fink</code> versions since 0.23.0 you can tell it to try to download
pre-compiled binary packages, if available, instead of building them. Just pass
the <a href="usage.php?phpLang=en#options">--use-binary-dist (or -b)
option</a> to <code>fink</code>. This can save you a lot of time. E.g.
calling
      </p>
      <pre>fink --use-binary-dist install wget-ssl</pre>
      <p>or</p>
      <pre>fink -b install wget-ssl</pre>
      <p>
will first download all dependencies for wget-ssl that are available from the
binary distribution and only build the remainder from source. This option can
also be enabled permanently in the <a href="conf.php?phpLang=en">Fink configuration
file</a> (fink.conf) or by running the command <code>fink configure</code>.
      </p>
      <p>
More details about the <code>fink</code> tool are available in the chapter 
<a href="usage.php?phpLang=en">"Using the fink Tool from the Command Line"</a>.
      </p>
    
    <h2><a name="fink-commander">3.5 Fink Commander</a></h2>
      
      <p>Fink Commander is an Aqua interface to both <code>apt-get</code> and the <code>fink</code> tool.  The Binary menu lets you do operations on the binary distribution, and the Source menu does the same thing for the source distribution.</p>
      <p>Fink Commander is included with the Fink binary installer.  To download it separately (e.g. if you've bootstrapped Fink from source), or for additional information, visit the <a href="http://finkcommander.sourceforge.net">Fink Commander website</a>.</p>
    
    <h2><a name="available-versions">3.6 Available versions</a></h2>
      
      <p>When you want to install a package, you should first check the <a href="http://fink.sourceforge.net/pdb/index.php">package database</a> and see if it is available at all through Fink.  The available version(s) of the package will be shown in several rows of a table.  These are:</p>
      <ul>
        <li>
          <p>
            <b>0.4.1:</b>  this is the version that can be installed from binaries for OS 10.1.</p>
        </li>
        <li><b>0.6.3:</b>  this is the version that can be installed from binaries for OS 10.2.</li>
        <li>
          <p>
<b>0.8.0:</b>  This is the base version that can be installed from binaries for OS 10.3, under the current Fink release.  If you <a href="upgrade.php?phpLang=en">upgrade</a> Fink, there may be an OS-specific newer version that isn't shown here.</p> 
        </li>
        <li>
          <p>
            <b>current-10.2-gcc3.3 stable:</b>  This is the most recent stable version that can be installed from source for OS 10.2 with the <code>gcc 3.3</code> update to the Developer Tools.  To be able to install this version, you may need to enable <a href="http://fink.sourceforge.net/doc/cvsaccess/index.php">CVS</a> or rsync access.  If you have not applied the <code>gcc 3.3</code> update you may not see this version (or possibly even the package).</p>
          <p>Note:  Unlike the case for some other projects, Fink distributes the most recent stable versions of packages via CVS, as well as versions in need of testing (see the section on unstable below).  Enabling CVS or rsync updating  gives you access to new stable versions of packages before the binary distribution is updated. 
</p>
        </li>
        <li><p><b>current-10.3 stable:</b>  This is the most recent version that can be installed from source for OS 10.3.  Once again, CVS or rsync access may be needed to access this version.</p>
</li>
        <li>
          <p>
            <b>current-10.2-gcc3.3 unstable:</b>  This is the latest unstable version that can be installed from source for OS 10.2 with <code>gcc 3.3</code>.  To install this version, follow the <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable">instructions</a> on how to install unstable packages.</p>
          <p>Note:  unstable doesn't necessarily mean unusable, but install such packages at your own risk.
</p>
        </li>
        <li><b>current-10.3 unstable:</b>  This is the latest unstable version that can be installed from source for OS 10.3.  Enable the unstable tree as mentioned above.</li>
      </ul>
    
    <h2><a name="x11">3.7 Getting X11 Sorted Out</a></h2>
      
      <p>Many of the packages that are available via Fink require the installation of some form of X11.  Because of this, one of the first things that is typically done is to choose an X11 implementation.</p>
      <p>
Since there are several X11 implementations available for Mac OS X
(XFree86, Tenon Xtools, eXodus) and several ways to install them
(manually or via Fink), there are several alternative packages - one
for each setup.
Fink is very bad at guessing what you have, so it's important to pick
the right one and install it before you start installing X11
applications.
Here is a list of the available packages and X11 installation methods:
</p>
      <ul>
        <li>
          <p>
            <b>xfree86-base:</b>
(10.1 or 10.2 only) This package is the real thing.
It installs the whole load of XFree86 4.2.1.1 as a Fink package.
For maximum flexibility, this package does not contain the actual
XDarwin server.
To get that, you should install the xfree86-rootless package.
</p>
        </li>
        <li>
          <p>
            <b>xfree86:</b>
This is a single package (display server is included) that installs XFree86 4.3.0 (10.2 only), or 4.3.99 (10.3 only).   .
This version is faster than 4.2.1.1, but hasn't been tested quite as much.
</p>
        </li>
        <li>
          <p>
system-xfree86:
This package is automatically generated (for Fink 0.6.2 or later) if you install XFree86 manually, either from
source or from the official (or unofficial) binary distribution; or if you install Apple's X11.
It will then act as a
dependency placeholder.
</p>
        </li>
        <li>
          <p>
system-xtools:
Install this package if you have Tenon's Xtools product installed.
Like system-xfree86, this will just do a sanity check and leave the
actual files alone.
</p>
        </li>
      </ul>
      <p>
For more information on installing and running X11, refer to the
<a href="http://fink.sourceforge.net/doc/x11/">X11 on Darwin
and Mac OS X document</a>.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade.php?phpLang=en">4. Upgrading Fink</a></p>
<? include_once "../../footer.inc"; ?>


