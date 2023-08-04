<?php
$title = "User's Guide - Upgrade";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="User\'s Guide Contents"><link rel="next" href="conf.php?phpLang=en" title="The Fink Configuration File"><link rel="prev" href="packages.php?phpLang=en" title="Installing Packages">';


include_once "header.en.inc";
?>
<h1>User's Guide - 4. Upgrading Fink</h1>
    
    
    
      <p>
This chapter covers the procedures used to update your Fink
installation with the latest and greatest stuff.
</p>
    
    <h2><a name="bin">4.1 Upgrading using Binary Packages</a></h2>
      
      <p>
If you use the binary distribution exclusively, there is no separate
upgrade procedure.
Just ask the tool of your choice to get the latest package listing
from the server and let it update all packages.
</p>
      <p>
For dselect, it is sufficient to hit "[U]pdate", then "[I]nstall".
Of course, you may want to run "[S]elect" in between to check the
selections that were made and to find out about new packages.
</p>
      <p>
For apt, run <code>apt-get update</code> to get the latest package
list, then <code>apt-get upgrade</code> to update all packages that
have new versions available.
</p>
      <p>For Fink Commander, select Binary-&gt;Update descriptions to update the package list, and then Binary-&gt;Dist-Upgrade packages to update to new versions.</p>
      <p>
For more information, see the
<a href="/download/upgrade.php">Upgrade Matrix</a>.
</p>
    
    <h2><a name="src">4.2 Upgrading the Source Distribution</a></h2>
      
      <p>
If you use the source distribution the procedure consists of two steps.
In the first step, you download the latest package descriptions to
your computer.
In the second step, these package descriptions are used to compile new
packages; the actual source code is downloaded as needed.
</p>
      <p>
The first step can be accomplished by
running <code>fink selfupdate</code>.
That command will check with the Fink website to see if a new point
release is available, and will automatically download and install the
package descriptions in that case.
You also have the
option to pull package descriptions directly from Git or via rsync.
Git is a version-controlled repository where the package descriptions
are stored and managed.
Using Git has the advantage that it is updated continuously, but the disadvantage that there is a single Git server for Fink, and it can be unreliable if there is a lot of traffic.  For this reason, it is recommended that general users go with rsync.  There are multiple mirrors available for rsync, and the only disadvantage is that package descriptions take an hour or so to migrate to the rsync mirrors after they've been added to Git.
</p>
      <p>(If you are having trouble upgrading a source installation, consult
<a href="/download/fix-upgrade.php">these
special instructions</a>.)</p>
      <p>
Once you have updated your package descriptions (no matter which way),
you should update all packages at once with the command <code>fink
update-all</code>.
</p>
      <p>To update the source distribution using Fink Commander, select Source-&gt;Selfupdate to download new package information files, and then Source-&gt;Update-all to update your outdated packages.</p>
    
    <h2><a name="mix">4.3 Mixing Binaries and Source</a></h2>
      
      <p>
If you use precompiled binary packages for some packages and build
others from source, you'll have to follow both sets of instructions
above to upgrade your Fink installation.
That is, first use <code>dselect</code> or <code>apt-get</code> to get
the latest versions of the packages that are available as binaries,
then use <code>fink selfupdate</code> and <code>fink update-all</code>
to get the current package descriptions and to update the remaining
packages.
		</p>
      <p>
You may use the UseBinaryDist option (settable via the
<a href="usage.php?phpLang=en#options">--use-binary-dist (or -b) option</a>
or in the <a href="conf.php?phpLang=en">Fink configuration file</a>) both source and
binary descriptions will be updated if you call <code>fink selfupdate</code>.
In this case you don't need a separate <code>apt-get</code> call anymore.
     </p>
      <p>
If you are using Fink Commander select Binary-&gt;Update descriptions to update
the package list, and then Binary-&gt;Dist-Upgrade packages to update to new
versions. After that do Source-&gt;Selfupdate to download new package
information files, and then Source-&gt;Update-all (see previous sections for
details).
      </p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="conf.php?phpLang=en">5. The Fink Configuration File</a></p>
<?php include_once "../../footer.inc"; ?>


