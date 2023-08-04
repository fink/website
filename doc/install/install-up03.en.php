<?php
$title = "Installation - Upgrading";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 6:29:59';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Installation Contents"><link rel="next" href="install-up02.php?phpLang=en" title="Clean Upgrade"><link rel="prev" href="install-first.php?phpLang=en" title="First Time Installation">';


include_once "header.en.inc";
?>
<h1>Installation - 3. Upgrading Fink</h1>




<p>
You can update Fink with the built-in 'selfupdate' command.  Note:  this is <b>not</b>
guaranteed to be sufficient if you updated OS X.
</p>


<h2><a name="packman">3.1 Updating The Package Manager</a></h2>
<p>
To update Fink, run the following command:
</p>
<pre>fink selfupdate</pre>
<p>
This will automatically update your existing Fink installation to
use the latest package manager, and also update all essential
packages. However, it will not update any other packages.
</p>


<h2><a name="update-all">3.2 Updating Packages</a></h2>
<p>
The above updating steps will not update the actual packages, they
only provide you with the means to do so. The easiest way to get the
new packages is to use the 'update-all' command:
</p>
<pre>fink update-all</pre>
<p>
This will bring all installed packages to the latest version.
If you don't want to do this (it may take some time), you can update
individual packages with the 'update' command.
</p>


<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="install-up02.php?phpLang=en">4. Clean Upgrade</a></p>
<?php include_once "../../footer.inc"; ?>


