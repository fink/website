<?
$title = "User's Guide - fink Tool";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:56';
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
      <p>(as of <code>fink-0.26.0</code>)</p>
      <p><b>-h, --help</b> - displays help text.
</p>
      <p><b>-q, --quiet</b>  - causes <code>fink</code> to be less verbose, opposite of <b>--verbose</b>.  Overrides the <a href="conf.php?phpLang=en#optional">Verbose</a> flag in <code>fink.conf</code>.
</p>
      <p><b>-V, --version</b> - display version information.
</p>
      <p><b>-v, --verbose</b> - causes  <code>fink</code> to be more verbose, opposite of <b>--quiet</b>.  Overrides the <a href="conf.php?phpLang=en#optional">Verbose</a> field in <code>fink.conf.</code>
</p>
      <p><b>-y, --yes</b> - assume default answer for all interactive 
                        questions.
</p>
      <p><b>-K, --keep-root-dir</b>   - Causes <code>fink</code> not to delete the
                        <code>root-[name]-[version]-[revision]</code>
		        directory in the <a href="conf.php?phpLang=en#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=en#developer">KeepRootDir</a> field in <code>fink.conf</code>.
</p>
      <p><b>-k, --keep-build-dir</b>  - Causes <code>fink</code> not to delete the
                        <code>[name]-[version]-[revision]</code>
                        directory in the <a href="conf.php?phpLang=en#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=en#developer">KeepBuildDir</a> field in <code>fink.conf</code>.</p>
      <p><b>-b, --use-binary-dist</b> - download pre-compiled packages from the binary 
                        distribution if available (e.g. to reduce compile
		        time or disk usage).
		        Note that this mode instructs fink to download the
                        version it wants if that version is available for
		        download; it does not cause fink to choose a version
    		        based on its binary availability.  Corresponds to the <a href="conf.php?phpLang=en#downloading">UseBinaryDist</a> flag in <code>fink.conf</code>.
</p>
      <p><b>--no-use-binary-dist</b>  - Don't use pre-compiled binary packages from the binary 
		        distribution, opposite of the --use-binary-dist flag. 
                        This is the default unless overridden by setting <code>UseBinaryDist: true </code>in 
                        the <code>fink.conf</code> configuration file. 
</p>
      <p><b>--build-as-nobody</b>     - Drop to a non-root user when performing the unpack,
                        patch, compile, and install phases. Note that packages
                        built with this option may be non-functional. You
                        should use this mode for package development and 
                        debugging only.
</p>
      <p><b>-m, --maintainer</b>
            - (<code>fink-0.25</code> and later) Perform actions useful to package maintainers: run validation on
           the <code>.info</code> file before building and on the <code>.deb</code> after building a
           package; turn certain build-time warnings into fatal errors; (<code>fink-0.26</code> and later) run the test suites as specified in the  field.  This sets <b>--tests</b> and <b>--validate</b> to <code>on</code>.</p>
      <p><b>--tests[=on|off|warn]</b>         - (<code>fink-0.26.0</code> and later) Causes <code>InfoTest</code> fields to be activated and test suites specified
           via <code>TestScript</code> to be executed (see the <a href="../packaging/reference.php#fields">Fink Packaging Manual</a>).  If no argument is given to this
           option or if the argument is <code>on</code> then failures in test suites will
           be considered fatal errors during builds.  If the argument is <code>warn</code>
           then failures will be treated as warnings.</p>
      <p><b>--validate[=on|off|warn]</b> -
           Causes packages to be validated during a build.  If no argument is
           given to this option or if the argument is <code>on</code> then validation failures will be considered fatal errors during builds.  If the argument is <code>warn</code> then failures will be treated as warnings.</p>
      <p><b>-l, --log-output</b>
            - Save a copy of the terminal output during each package building
           process. By default, the file is stored in
           <code>/tmp/fink-build-log_[name]-[version]-[revision]_[date]-[time]</code> but
           one can use the <b>--logfile</b> flag to specify an alternate filename.</p>
      <p><b>--no-log-output</b>
            - Don't save a copy of the output during package-building, opposite
           of the <b>--log-output</b> flag. This is the default.</p>
      <p><b>--logfile=filename</b>
            - Save package build logs to the file <code>filename</code> instead of the default
           file (see the <b>--log-output</b> flag, which is implicitly set by the
           <b>--logfile</b> flag). You can use percent-expansion codes to include
           specific package information automatically. A complete list of percent-expanions is available in the <a href="../packaging">Fink Packaging Manual</a>; some common percent-expansions are:</p>
      <ul>
        <li>                 <b>%n</b>    - package name
                 </li>
        <li><b>%v</b>    - package version
                 </li>
        <li><b>%r</b>    - package revision</li>
      </ul>
      <p><b>-t, --trees=expr</b>
           - Consider only packages in trees matching <b>expr</b>.

           The format of expr is a comma-delimited list of tree specifica-
           tions. Trees listed in <code>fink.conf</code> are compared against <b>expr</b>.  Only
           those which match at least one tree specification are considered by
           <code>fink</code>, in the order of the first specifications which they match. If
           no <b>--trees</b> option is used, all trees listed in <code>fink.conf</code> are
           included in order.

           A tree specification may contain a slash (/) character, in which
           case it requires an exact match with a tree. Otherwise, it matches
           against the first path-element of a tree. For example,
           <b>--trees=unstable/main</b> would match only the <b>unstable/main</b> tree,
           while <b>--trees=unstable</b> would match both unstable/main and
           <b>unstable/crypto</b>.

           There exist magic tree specifications which can be included in
           <b>expr</b>:</p>
      <ul>
        <li><b>status</b>
                       - Includes packages in the dpkg status database.

                 </li>
        <li><b>virtual</b>
                       - Includes virtual packages which reflect the capabili-
                       ties of the system.
</li>
      </ul>
      <p>Exclusion of (or failure to include) these magic trees is currently
           only supported for operations which do not install or remove packages.</p>
      <p><b>-T, --exclude-trees=expr</b>
           Consider only packages in trees not matching expr.

           The syntax of expr is the same as for <b>--trees</b>, including the magic
           tree specifications. However, matching trees are here excluded
           rather than included. Note that trees matching both <b>--trees</b> and
           <b>--exclude-trees</b> are excluded.
</p>
      <p> Examples of <b>--trees</b> and --exclude-trees:

                 </p>
      <ul>
        <li><code>fink --trees=stable,virtual,status install <b>foo</b></code> 
                       <p>Install <b>foo</b> as if <code>fink</code> was using the stable tree, even
                       if unstable is enabled in <code>fink.conf</code>.
</p></li>
        <li><code>fink --exclude-trees=local install <b>foo</b></code> 
                       <p>Install the version of <b>foo</b> in Fink, not the locally
                       modified version.

</p></li>
        <li><code>fink --trees=local/main list -i</code>
                       <p>List the locally modified packages which are installed.</p></li>
      </ul>
      <p>Most of these options are self-explanatory. Many can also be set in the 
<a href="conf.php?phpLang=en">Fink configuration file</a> (<code>fink.conf</code>) if you want 
to set them permanently and not just for that invocation of <code>fink</code>.</p>
    
    <h2><a name="install">6.3 install</a></h2>
      
      <p>The <b>install</b> command is used to install packages. It downloads,
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
      <p>Aliases for the install command: <b>update, enable, activate, use</b> (most
of these for historic reasons).</p>
    
    <h2><a name="remove">6.4 remove</a></h2>
      
      <p>The remove command removes packages from the system by calling '<code>dpkg --remove</code>'. The current default implementation has a flaw: it
doesn't check dependencies itself but rather completely leaves that to
the dpkg tool (usually this poses no problem, though).</p>
      <p>The <b>remove</b> command only removes the actual package files,
(excluding configuration files), but leaves
the <code>.deb</code> compressed package file intact. This means that you can
re-install the package later without going through the compile process
again. If you need the disk space, you can remove the <code>.deb</code> from the
<code>/sw/fink/dists</code> tree.</p>
      <p>These flags can be used with the <b>fink remove</b> command
</p>
      <pre>-h,--help             - Show the options which are available.
-r,--recursive        - Also remove packages that depend on the package(s) to
                        be removed (i.e. overcome the above-mentioned flaw).</pre>
      <p>Aliases: <b>disable, deactivate, unuse, delete</b>.</p>
    
    <h2><a name="purge">6.5 purge</a></h2>
      
      <p>The <b>purge</b> command purges packages from the system. This is
the same as the <b>remove</b> command except that it removes configuration
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
      <pre>    not installed
 i  latest version is installed
(i) installed, but a newer version is available
 p  a virtual package provided by a package that is installed</pre>
      <p> The version column always lists the latest (highest) version known for the package, regardless of what version (if any) you have installed.  To see all versions of a package available on your system, use the <a href="#dumpinfo">dumpinfo</a> command.</p>
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
fink list --tab --outdated | cut -f 2     
                          - just list the names of the out of date packages.
fink list --section=kde   - list the packages in the kde section
fink list --maintainer=fink-devel
                          - list the packages with no maintainer
fink --trees=unstable list --maintainer=fink-devel
                          - list the packages with no maintainer, but only in the
                            unstable tree.
fink list "gnome*"        - list all packages that start with 'gnome'
</pre>
      <p>
The quotes in the last example are necessary to stop the shell from
interpreting the pattern itself.
</p>
    
    <h2><a name="apropos">6.8 apropos</a></h2>
      
      <p>
This command behaves almost identical to <a href="#list">fink list</a>. The most
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
Aliases: <b>desc, description, info</b>
</p>
    
    <h2><a name="plugins">6.10 plugins</a></h2>
      
      <p> List the (optional) plugins available to the <code>fink</code> program.  Currently lists the notification mechanisms and the source-tarball
           checksum algorithms.</p>
    
    <h2><a name="fetch">6.11 fetch</a></h2>
      
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
    
    <h2><a name="fetch-all">6.12 fetch-all</a></h2>
      
      <p>Downloads <b>all</b> package source files. Like <a href="#fetch">fetch</a>, this downloads the
tarballs even when they were downloaded before.</p>
      <p>These flags can be used with the <code>fink fetch-all</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
    
    <h2><a name="fetch-missing">6.13 fetch-missing</a></h2>
      
      <p>Downloads <b>all</b> missing package source files. This command will only download
files that are not present on the system.</p>
      <p>These flags can be used with the <code>fink fetch-missing</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
    
    <h2><a name="build">6.14 build</a></h2>
      
      <p>Builds a package, but does not install it. As usual, the source
tarballs are downloaded if they can not be found. The result of this
command is an installable .deb package file, which you can quickly
install later with the install command. This command will do nothing
if the .deb already exists. Note that dependencies are still
<b>installed</b>, not just built.</p>
      <p>
The <a href="#options">--use-binary-dist option</a> is applicable here.
      </p>
    
    <h2><a name="rebuild">6.15 rebuild</a></h2>
      
      <p>Builds a package (like the build command), but ignores and overwrites
the existing .deb file. If the package is installed, the newly created
.deb file will also be installed in the system via <code>dpkg</code>. Very useful
during package development.</p>
    
    <h2><a name="reinstall">6.16 reinstall</a></h2>
      
      <p>Same as install, but will install the package via <code>dpkg</code> even when it is
already installed. You can use this when you accidentally deleted
package files or changed configuration files and want to get the
default settings back.</p>
    
    <h2><a name="configure">6.17 configure</a></h2>
      
      <p>
Reruns the <code>fink</code> configuration process.
This will let you change your mirror sites and proxy settings, among
others.
</p>
      <p><b>New in</b> <code>fink-0.26.0</code>: This command will also let you turn on the unstable trees if desired.</p>
    
    <h2><a name="selfupdate">6.18 selfupdate</a></h2>
      
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
    
    <h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use rsync to update its package list.</p>
      <p>This is the recommended way to update Fink when building from source.</p>
      <p><b>Note:</b>  rsync updates only update the active <a href="conf.php?phpLang=en#optional">trees</a> (e.g. if unstable isn't turned on in <code>fink.conf</code> the list of unstable packages won't be updated.</p>
    
    <h2><a name="selfupdate-cvs">6.20 selfupdate-cvs</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use CVS access to update its package list.</p>
      <p>CVS updating is deprecated, except for developers and those people who are behind firewalls that disallow rsync.</p>
    
    <h2><a name="index">6.21 index</a></h2>
      
      <p>
   Rebuilds the package cache. You should not normally need to execute
   this manually, as <code>fink</code> should auto-detect when it needs to be updated.
</p>
    
    <h2><a name="validate">6.22 validate</a></h2>
      
      <p>
   This command performs various checks on <code>.info</code> and <code>.deb</code> files. Package
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
   Aliases: <b>check</b>
</p>
    
    <h2><a name="scanpackages">6.23 scanpackages</a></h2>
      
      <p>
   Updates the <code>apt-get</code> database of debs; defaults to updating all of the trees, but may be restricted to a set of one or more trees given as arguments.
</p>
    
    <h2><a name="cleanup">6.24 cleanup</a></h2>
      
      <p>
   Removes obsolete and temporary files. 
   This can reclaim large amounts of disk space.  One or more modes may be specified:</p>
      <pre>--debs               - Delete .deb files (compiled binary package archives)
                       corresponding to versions of packages that are neither
                       described by a package description (.info) file in the
                       currently-active trees nor presently installed.
--sources,--srcs     - Delete sources (tarballs, etc.) that are not used by
                       any package description (.info) file in the currently-
                       active trees.
--buildlocks, --bl   - Delete stale buildlock packages.
--dpkg-status        - Remove entries for packages that are not installed from
                       the dpkg "status" database.
--obsolete-packages  - Attempt to uninstall all installed packges that are
                       obsolete. (new in fink-0.26.0)
--all                - All of the above modes. (new in fink-0.26.0)</pre>
      <p>If no mode is specified, <code>--debs --sources</code> is the default action. </p>
      <p>In addition, the following options may be used:</p>
      <pre>-k,--keep-src        - Move old source files to /sw/src/old/ instead of deleting them.
-d,--dry-run         - Print the names of the files that would be deleted, but
                       do not actually delete them.
-h,--help            - Show the modes and options which are available.</pre>
      
    
    <h2><a name="dumpinfo">6.25 dumpinfo</a></h2>
      
      <p>
Only available in <code>fink</code> newer than version 0.21.0
      </p>
      <p>
	Shows how <code>fink</code> parses parts of a package's <code>.info</code> file. Various
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
    
    <h2><a name="show-deps">6.26 show-deps</a></h2>
      
      <p>Only available in fink-0.23-6 and later.</p>
      <p>Displays a human-readable list of the compile-time (build) and run-
           time (installation) dependencies of the listed package(s).</p>
    
    
  
<? include_once "../../footer.inc"; ?>


