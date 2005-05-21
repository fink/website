<?
$title = "User's Guide - fink Tool";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2005/05/21 01:26:36';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="User\'s Guide Contents"><link rel="prev" href="conf.php?phpLang=en" title="The Fink Configuration File">';


include_once "header.en.inc";
?>
<h1>User's Guide - 6. Using the fink Tool from the Command Line</h1>
    
    
    <h2><a name="using">6.1 Using the fink tool</a></h2>
      
      <p>The <code>fink</code> tool uses several suffix commands to work on packages from the source distribution. 
Some of them need at
least one package name, but can handle several package names at
once. You can specify just the package name (e.g. gimp), or a fully
qualified name with a version number (e.g. gimp-1.2.1) or with both version and revision numbers (e.g. gimp-1.2.1-3). Fink will automatically choose the latest available
version and revision when they are not specified.  Others have different options.</p>
      <p>What follows is a list of the commands for the <code>fink</code> tool:</p>
    
    <h2><a name="options">6.2 Global options</a></h2>
      
      <p>
There are some options, which apply to all fink commands. If you 
type <code>fink --help</code> you get the list of options: 
      </p>
      <p>(as of <code>fink-0.24.6</code>)</p>
      <pre>-h, --help            - display this help text
-q, --quiet           - causes fink to be less verbose, opposite of --verbose
-V, --version         - display version information
-v, --verbose         - causes fink to be more verbose, opposite of --quiet
-y, --yes             - assume default answer for all interactive 
                        questions.
-b, --use-binary-dist - download pre-compiled packages from the binary 
                        distribution if available (e.g. to reduce compile
		        time or disk usage).
		        Note that this mode instructs Fink to download the
                        version it wants if that version is available for
		        download; it does not cause Fink to choose a version
    		        based on its binary availability.
--no-use-binary-dist  - Don't use pre-compiled binary packages from the
                        binary distribution (opposite of --use-binary-dist)
-K, --keep-root-dir   - Causes Fink not to delete the
                        /sw/src/root-[name]-[version]-[revision]
		        directory after building a package.
-k, --keep-build-dir  - Causes Fink not to delete the
                        /sw/src/[name]-[version]-[revision]
                        directory after building a package.
--build-as-nobody     - Drop to a non-root user when performing the unpack,
                        patch, compile,and install phases. Note that packages
                        built with this option may be non-functional. You
                        should use this mode for package development
                        and debugging only.</pre>
      <p>
Most of these options are self-explanatory. They can also be set in the 
<a href="conf.php?phpLang=en">Fink configuration file</a> (fink.conf) if you want 
to set them permanently and not just for that invocation of <code>fink</code>.</p>
    
    <h2><a name="install">6.3 install</a></h2>
      
      <p>The install command is used to install packages. It downloads,
configure, builds and installs the packages you name. It will also
install required dependencies automatically, but will ask you for
confirmation before it does so. Example:</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      <p>Use of the <a href="#options">--use-binary-dist</a> option with <code>fink install</code> can speed the build process for complicated packages by quite a lot.</p>
      <p>Aliases for the install command: update, enable, activate, use (most
of these for historic reasons).</p>
    
    <h2><a name="remove">6.4 remove</a></h2>
      
      <p>The remove command removes packages from the system by calling '<code>dpkg --remove</code>'. The current default implementation has a flaw: it
doesn't check dependencies itself but rather completely leaves that to
the dpkg tool (usually this poses no problem, though).</p>
      <p>The remove command only removes the actual package files,
(excluding configuration files), but leaves
the .deb compressed package file intact. This means that you can
re-install the package later without going through the compile process
again. If you need the disk space, you can remove the .deb from the
<code>/sw/fink/dists</code> tree.</p>
      <p>These flags can be used with the fink remove command
</p>
      <pre>-h,--help             - Show the options which are available.
-r,--recursive        - Also remove packages that depend on the package(s) to
                        be removed (i.e. overcome the above-mentioned flaw).</pre>
      <p>Aliases: disable, deactivate, unuse, delete.</p>
    
    <h2><a name="purge">6.5 purge</a></h2>
      
      <p>The purge command purges packages from the system. This is
the same as the remove command except that it removes configuration
files as well.</p>
      <p>This command takes the:</p>
      <pre>-h,--help
-r,--recursive</pre>
      <p>options.</p>
    
    <h2><a name="update-all">6.6 update-all</a></h2>
      
      <p>This command updates all installed packages to the latest version. It
does not need a package list, so you just type:</p>
      <pre>fink update-all</pre>
      <p><a href="#options">--use-binary-dist</a> is also useful with this command.</p>
    
    <h2><a name="list">6.7 list</a></h2>
      
      <p>
This command produces a list of available packages, listing
installation status, the latest version and a short description.
If you call it without parameters, it will list all available
packages.
You can also pass a name or a shell pattern, and fink will list all
packages that match.
</p>
      <p>
The first column displays the installation state with the following
meanings:
</p>
      <pre>
     not installed
 i   latest version is installed
(i)  installed, but a newer version is available
 p   a virtual package provided by a package that is installed</pre>
      <p> The version column always lists the latest (highest) version known for the package, regardless of what version (if any) you have installed.  To see all versions of a package available on your sys-
           tem, use the <a href="#dumpinfo">dumpinfo</a> command.</p>
      <p>
There are also some flags for the <code>fink list</code> command
</p>
      <pre>
-h,--help
	  Show the options which are available.
-t,--tab
	  Output the list in a tab delimited format, useful for
	  running the output through a script.
-i,--installed
	  Show only those packages which are currently installed.
-o,--outdated
	  Show only those packages which are out of date.
-u,--uptodate
	  Show only packages which are up to date.
-n,--notinstalled
	  Show packages which are not currently installed.
-s expr,--section=expr
	  Show only packages in the sections matching the regular
	  expression expr.
-m expr,--maintainer=expr
          Show only packages with the maintainer  matching the
          regular expression expr.
-r expr,--tree=expr
          Show only packages in the trees matching the regular
          expression expr.
-w=xyz,--width=xyz
	  Sets the width of the display you would like the output
	  formatted for. xyz is either a numeric value or auto.
	  auto will set the width based on the terminal width.
	  The default is auto.
</pre>
      <p>
Some usage examples:
</p>
      <pre>
fink list                 - list all packages
fink list bash            - check if bash is available and what version.
fink list --outdated      - list packages which are out of date
fink list --section=kde   - list the packages in the kde section
fink list "gnome*"        - list all packages that start with 'gnome'
</pre>
      <p>
The quotes in the last example are necessary to stop the shell from
interpreting the pattern itself.
</p>
    
    <h2><a name="apropos">6.8 apropos</a></h2>
      
      <p>
This command behaves almost identical to <code>fink list</code>. The most
notable difference is that <code>fink apropos</code> also searches
the package descriptions to find packages. The second difference is that 
the search string must be supplied and is not optional.
</p>
      <pre>
fink apropos irc          - list all packages for which 'irc' 
			    occurs in the name or description.
fink apropos -s=kde irc   - the same as above, but restricted to 
			    packages from the kde section.
</pre>
    
    <h2><a name="describe">6.9 describe</a></h2>
      
      <p>
This command displays a description of the package you name on the
command line.
Note that only a small part of the packages currently have a
description.
</p>
      <p>
Aliases: desc, description, info
</p>
    
    <h2><a name="fetch">6.10 fetch</a></h2>
      
      <p>Downloads the named packages, but does not install them. This command
will download the tarballs even if they were downloaded before.</p>
      <p>The following flags can be used with the <code>fetch</code> command:</p>
      <pre>-h,--help		Show the options which are available.
-i,--ignore-restrictive	Do not fetch packages that are &amp;quot;License: Restrictive&amp;quot;.
                      	Useful for mirrors, because some restrictive packages
                      	do not allow source mirroring.
-d,--dry-run		Just display information about the file(s) that would
			be downloaded for the package(s) to be fetched; do not
			actually download anything.
-r,--recursive		Also fetch packages that are dependencies of the
			package(s) to be fetched.</pre>
    
    <h2><a name="fetch-all">6.11 fetch-all</a></h2>
      
      <p>Downloads <b>all</b> package source files. Like<code>fetch</code>, this downloads the
tarballs even when they were downloaded before.</p>
      <p>These flags can be used with the <code>fink fetch-all</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
    
    <h2><a name="fetch-missing">6.12 fetch-missing</a></h2>
      
      <p>Downloads <b>all</b> missing package source files. This command will only download
files that are not present on the system.</p>
      <p>These flags can be used with the <code>fink fetch-missing</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
    
    <h2><a name="build">6.13 build</a></h2>
      
      <p>Builds a package, but does not install it. As usual, the source
tarballs are downloaded if they can not be found. The result of this
command is an installable .deb package file, which you can quickly
install later with the install command. This command will do nothing
if the .deb already exists. Note that dependencies are still
<b>installed</b>, not just built.</p>
      <p>
The <a href="#options">--use-binary-dist option</a> is applicable here.
      </p>
    
    <h2><a name="rebuild">6.14 rebuild</a></h2>
      
      <p>Builds a package (like the build command), but ignores and overwrites
the existing .deb file. If the package is installed, the newly created
.deb file will also be installed in the system via <code>dpkg</code>. Very useful
during package development.</p>
    
    <h2><a name="reinstall">6.15 reinstall</a></h2>
      
      <p>Same as install, but will install the package via <code>dpkg</code> even when it is
already installed. You can use this when you accidentally deleted
package files or changed configuration files and want to get the
default settings back.</p>
    
    <h2><a name="configure">6.16 configure</a></h2>
      
      <p>
Reruns the Fink configuration process.
This will let you change your mirror sites and proxy settings, among
others.
</p>
    
    <h2><a name="selfupdate">6.17 selfupdate</a></h2>
      
      <p>
	This command automates the process of upgrading to a new Fink
	release. It checks the Fink website to see if a new version is
	available. It then downloads the package descriptions and updates
	the core packages, including <code>fink</code> itself. This command can upgrade
	to regular releases, but it can also setup your <code>/sw/fink/dists</code>
	directory tree for direct CVS or rsync updates, if you select one of those options the first time this command is run.  This means that you then
	will be able to access the very latest revisions of all packages.
</p>
      <p>
If the <a href="#options">--use-binary-dist option</a> is enabled
the list of available packages in the binary distribution is also updated.
      </p>
    
    <h2><a name="selfupdate-cvs">6.18 selfupdate-rsync</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use rsync to update its package list.</p>
      <p>This is the recommended way to use Fink when building from source.</p>
      <p><b>Note:</b>  rsync updates only update the active <a href="conf.php?phpLang=en#optional">trees</a> (e.g. if unstable isn't turned on in <code>fink.conf</code> the list of unstable packages won't be updated.</p>
    
    <h2><a name="selfupdate-cvs">6.19 selfupdate-cvs</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use CVS access to update its package list.</p>
      <p>CVS updating is deprecated, except for developers and those people who are behind firewalls that disallow rsync.</p>
    
    <h2><a name="index">6.20 index</a></h2>
      
      <p>
   Rebuilds the package cache. You should not normally need to execute
   this manually, as <code>fink</code> should auto-detect when it needs to be updated.
</p>
    
    <h2><a name="validate">6.21 validate</a></h2>
      
      <p>
   This command performs various checks on .info and .deb files. Package
   maintainers should run this on their package descriptions and
   corresponding built packages before submitting them.</p>
      <p>The following optional options may be used:</p>
      <pre>-h,--help            - Show the options which are available.
-p,--prefix          - Simulate an alternate Fink basepath prefix (%p) within
                      the files being validated.
--pedantic, --no-pedantic
                     - Control the display of nitpicky formatting warnings.
                      --pedantic is the default.</pre>
      <p>
   Aliases: check
</p>
    
    <h2><a name="scanpackages">6.22 scanpackages</a></h2>
      
      <p>
   Calls dpkg-scanpackages(8) with the specified trees.
</p>
    
    <h2><a name="cleanup">6.23 cleanup</a></h2>
      
      <p>
   Removes obsolete package files (.info, .patch, .deb) if newer versions are available. 
   This can reclaim large amounts of disk space.
</p>
      <p>
If the <a href="#options">--use-binary-dist option</a> is enabled
obsolete downloaded binary packages are also deleted and <code>fink scanpackages</code> is run as well.
      </p>
    
    <h2><a name="dumpinfo">6.24 dumpinfo</a></h2>
      
      <p>
Only available in <code>fink</code> newer than version 0.21.0
      </p>
      <p>
	Shows how Fink parses parts of a package's .info file. Various
	fields and percent expansions will be displayed according
	to <b>options</b> as follows:
      </p>
      <pre>
-h, --help           - Show the options which are available.
-a, --all            - Display all fields from the package description.
                       This is the default mode when no --field or
                       --percent flags are given.
-f fieldname,        - Display the given fieldname(s),
  --field=fieldname    in the order listed.
-p key,              - Display the given percent expansion key(s),
   --percent=key       in the order listed.
      </pre>
    
    <h2><a name="show-deps">6.25 show-deps</a></h2>
      
      <p>Only available in fink-0.23-6 and later.</p>
      <p>Displays a human-readable list of the compile-time (build) and run-
           time (installation) dependencies of the listed package(s).</p>
    
    
  
<? include_once "../../footer.inc"; ?>


