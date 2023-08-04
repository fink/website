<?php
$title = "Installation - Clean";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 6:29:59';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Installation Contents"><link rel="prev" href="install-up03.php?phpLang=en" title="Upgrading Fink">';


include_once "header.en.inc";
?>
<h1>Installation - 4. Clean Upgrade</h1>




<p>
    There are situations, which normally don't come up every day, in which you
    may find that you need to install Fink over again.
</p>


<h2><a name="cleaninst">4.1 Situations Calling for a Clean Reinstall</a></h2>
<ul>
    <li>
        <p>You want to move Fink to a different path.</p>
    </li>
    <li>
        <p>You want to update, or have already updated, OS X between versions
        where Fink doesn't support an upgrade path:</p>
        <p>- 10.4 -&gt; 10.6+</p>
        <p>- 10.5 -&gt; 10.7+</p>
        <p>- 10.6 -&gt; 10.7+</p>
        <p>- 10.8- -&gt; 10.9+</p>
    </li>
    <li>
        <p>Your Fink installation has linked to libraries, e.g. from MacPorts
        or <code>/usr/local</code>, which have been removed from
        your machine thereby breaking some of your Fink libraries and
        executables.</p>
    </li>
</ul>


<h2><a name="backup">4.2 Backing up to save time</a></h2>
<p>
To save time after you have reinstalled Fink, you can get a transcript
of your installed packages.  The following command in a terminal window
will work, even if for some reason the Fink tools aren't functioning:
</p>
<pre>grep -B1 "install ok installed" /opt/sw/var/lib/dpkg/status \
| grep "^Package:" | cut -d: -f2 | cut -d\  -f2 &gt; finkinst.txt</pre>
<p>
This will save the list of your packages in the file <code>finkinst.txt</code>
in the current working directory.
</p>
<p>
You may also want to copy or move the sources in <code>/opt/sw/src</code>
to another location so that you don't have to spend time downloading them when
you begin restoring your Fink distribution.
</p>
<p>
In addition, if you have made global configuration changes to any of your packages by
editing configuration files in <code>/opt/sw/etc</code>, then you may wish to back
those up.
</p>


<h2><a name="removing">4.3 Removing Your Old Fink</a></h2>
<p>
Once you've <a href="#backup">backed everything up</a>, you are ready
to remove your Fink distribution.  You can remove <code>/opt/sw</code> as well as
anything in <code>/Applications/Fink</code>
using the Finder or the command line:
</p>
<pre>sudo rm -rf /opt/sw /Applications/Fink/*</pre>
<p>
(Replace <code>/opt/sw</code> by your actual Fink tree).
</p>


<h2><a name="reinstalling">4.4 Installing Fink Again</a></h2>
<p>
First, follow the <a href="install-first.php?phpLang=en">first-time install instructions</a>.
</p>
<p>
    Once you have downloaded package descriptions, you can put the sources that you
    <a href="#backup">backed up</a> into <code>/opt/sw/src</code> either
    using the Finder or the command line:
</p>
<pre>sudo cp /path/to/backup/* /opt/sw/src</pre>
<p>
    (As usual, replace <code>/opt/sw</code> with your Fink tree).  If you prefer,  you can
    use <code>fink configure</code> to specify your backup location:
</p>
<pre>In what additional directory should Fink look for downloaded tarballs? [] 
<b>(enter your backup directory at the prompt)</b>. 
</pre>
<p>
    Note: this requires that the entire path to and including your backup directory is world-readable.
</p>
<p>
    You can also restore your global configuration files at this time.  
    Note:  we recommend that you <b>not</b> restore <code>/opt/sw/etc/fink.conf</code>
    from your prior installation of Fink, to avoid incompatibilities.  You can open it up 
    in a text editor and enter the correponding values into <code>fink configure</code>.
</p>




<?php include_once "../../footer.inc"; ?>


