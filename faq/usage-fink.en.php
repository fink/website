<?
$title = "F.A.Q. - Fink Usage";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2010/11/05 02:14:36';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="comp-general.php?phpLang=en" title="Compile Problems - General"><link rel="prev" href="upgrade-fink.php?phpLang=en" title="Upgrading Fink (version-specific troubleshooting)">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 5. Installing, Using and Maintaining Fink</h1>
    
    
    <a name="what-packages">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.1: How can I find out what packages Fink supports?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Since Fink 0.2.3, there is the <code>list</code> command. It produces a list of all packages known to your Fink installation. Example:</p><pre>fink list</pre><p>If you're using the binary distribution, <code>dselect</code> gives you a nice browsable listing of available packages. Note that you must run it as root if you want to select and install packages from within dselect.</p><p>There's also the <a href="http://pdb.finkproject.org/pdb/">package database</a> at the
        website.</p></div>
    </a>
    <a name="proxy">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.2: I'm behind a firewall. How do I configure Fink to use an HTTP proxy?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> The <code>fink</code> command supports explicit proxy settings that are passed on to <code>wget</code>/<code>curl</code>. If you were not asked for proxies on first time installation, you can run <code>fink configure</code> to set it up. You can also run that command at any time to reconfigure the <code>fink</code> command. If you  followed the instructions in the installation guide, and use  <code>/sw/bin/init.csh</code> (or <code>/sw/bin/init.sh</code>), then <code>apt-get</code> and <code>dselect</code> also will use these proxy settings. Make sure that you put the protocol in front of the proxy, e.g.</p><pre>ftp://proxy.yoursite.somewhere</pre><p>If you are still having problems, go into System Preferences, select the Network pane, select the Proxies tab, and make sure that the box labeled "Use Passive FTP Mode (PASV)" is checked.</p></div>
    </a>
    <a name="firewalled-cvs">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.3: How do I update available packages from CVS when I am behind a firewall?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> The package <b>cvs-proxy</b> can tunnel through HTTP proxies.</p><ul>
          <li>
            <p>Install the <b>cvs-proxy</b> package with the command:</p>
            <p>
              <code>fink --use-binary-dist install <b>cvs-proxy</b>
              </code>
            </p>
          </li>
          <li>
	    <p>Switch to the CVS update method with the command:</p>
             <p>
              <code>fink selfupdate-cvs</code>
            </p>
          </li>
        </ul><p>If fink is not configured to use your proxy, change the settings
        using:</p><p>
          <code>fink configure</code>.</p></div>
    </a>
    <a name="moving">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.4: Can I move Fink to another location after installation?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> No. Well, of course you can move the files using mv or the Finder,
        but 99% of the programs will stop working when you do. That's because
        basically all Unix software depends on hardcoded paths to find data
        files, libraries and other stuff.</p></div>
    </a>
    <a name="moving-symlink">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.5: If I move Fink after installation and provide a symlink from the
        old location, will it work?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Maybe. The general expectation is that it should work, but there
        may be hidden traps somewhere.</p></div>
    </a>
    <a name="removing">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.6: How can I uninstall all of Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Almost all files installed by Fink are in /sw (or wherever you
        chose to install it). Thus in order to get rid of Fink, enter this
        command:</p><pre>sudo rm -rf /sw</pre><p>The only exception to this rule is XFree86 or X.org. If you installed
        an X server through Fink (i.e., you installed the <code>xfree86</code>,
        <code>xfree86-rootless</code>, or <code>xorg</code> packages, instead of using
        <code>system-xfree86</code>) and want to remove it, you will need
        additionally to enter this:</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>If you aren't planning to reinstall Fink you also will want to
        remove the "<code>source /sw/bin/init.csh</code>" line you added to
        your <code>.cshrc</code> file or the "<code>source
        /sw/bin/init.sh</code>" line you added to your
        <code>.bashrc</code> file, whichever is appropriate to your
        setup, using a text editor.</p></div>
    </a>
    <a name="bindist">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.7: The package database at the website lists package xxx, but apt-get
        and dselect know nothing about it. Who's lying?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Both are correct. The <a href="http://pdb.finkproject.org/pdb/">package database</a> knows
        about every package, including those that are still in the unstable
        section. The <code>dselect</code> and <code>apt-get</code> tools on
        the other hand only know about the packages available as precompiled
        binary packages. Many packages are not available in precompiled form
        through these tools for a variety of reasons. A package must be in the
        "stable" section of the latest point release to be considered, and it
        must pass additional checks for policy compliance as well as licensing
        and patent restrictions.</p><p>If you want to install a package that is not available via
        <code>dselect</code> / <code>apt-get</code>, you have to compile it
        from source using <code>fink install <b>packagename</b>
          </code>.
        Make sure you have the Developer Tools installed before you try this.
        (If there is no installer for the Developer Tools in your
        <code>/Applications</code> folder, you can get them from the <a href="http://connect.apple.com/">Apple Developer Connection</a>
        after free registration.) See also the question about unstable
        below.</p></div>
    </a>
    <a name="unstable">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.8: There's this package in unstable that I want to install, but the
        fink command just says 'no package found'. How can I install it?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> First make sure you understand what 'unstable' means. Packages in
        the unstable tree are not in stable for any number of reasons.  It
        could be because there are known issues, validation errors, or just
        not enough people giving feedback that the package works for them.
        For that reason, Fink doesn't search the unstable tree by
        default.</p><p>If you do enable unstable, please remember to e-mail the
        maintainer if something works (or even if it doesn't). Feedback from
        users like you is what we use to determine if something is ready for
        stable! To find out the maintainer of a package, run <code>fink info
        <b>packagename</b></code>.</p><p>For <code>fink-0.26</code> and later:  If you run
	<code>fink configure</code> one of the questions will ask whether you
	want to turn the unstable trees on.  </p><p>To configure Fink to use unstable
	when you have an earlier version of the <code>fink</code> tool than
	<b>0.26</b>, edit
        <code>/sw/etc/fink.conf</code>, and add <code>unstable/main</code>
        and <code>unstable/crypto</code> to the <code>Trees:</code> line.</p><p>If you use Fink Commander, then there is a Preference to use unstable
	packages.</p><p>None of these options actually download the unstable tree's package
	descriptions.You'll need to turn on <code>rsync</code> or
	<code>cvs</code> updating to do this, which is not set up by default on a new
	Fink installation.  The following command sequence will set you up on
	a new Fink installation:</p><pre>fink selfupdate</pre><p>followed by</p><pre>fink selfupdate-rsync</pre><p>or</p><pre>fink selfupdate-cvs</pre><p>and then</p><pre>fink index -f
fink scanpackages</pre><p><b>Note:</b>  There are Fink Commander analogs for everything except
	<code>fink index -f</code>.  You will have to use the command line for that.</p><p>If you're already set up with <code>rsync</code> or <code>cvs</code>
	updating, then the following
	command sequence (or the Fink Commander analogs) will suffice:</p><pre>
fink selfupdate
fink index
fink scanpackages
	</pre><p>If you're not sure what your update method is, check
	<code>fink --version</code> in at a command line
	and see if that mentions <code>cvs</code> or <code>rsync</code>.</p><p>If you don't want to install any more from unstable than
        your specific package(s) and its (their) dependencies, (and any base packages
	that got updated) don't use the
        <code>update-all</code> command until you turn the unstable tree
        back off.</p></div>
    </a>
    <a name="unstable-onepackage">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.9: Do I <b>really</b> need to enable all of unstable just to install
        one unstable package that I want?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> No, but it is highly recommended you do.  Mixing and matching can
        cause unforeseen issues that make it difficult to debug problems when
        they do arise.</p><p>That said, if you only want one or two specific packages, and nothing
        else from unstable, then you need to switch over to CVS updating (i.e.
        use <code>fink selfupdate-cvs</code>), because rsync only updates the
        trees that are active in your <code>fink.conf</code>. Edit
        <code>/sw/etc/fink.conf</code> and add <code>local/main</code>
        to the <code>Trees:</code> line, if not present. Then you'll need to
        run <code>fink selfupdate</code> to download the package description
        files. Now copy the relevant <code>.info</code> files (and their
        associated <code>.patch</code> files, if there are any) from
        <code>/sw/fink/dists/unstable/main/finkinfo</code> (or
        <code>/sw/fink/dists/unstable/crypto/finkinfo</code>) to
        <code>/sw/fink/dists/local/main/finkinfo</code>. However, note
        that your package may depend on other packages (or particular
        versions) which are also only in unstable. You will have to move their
        <code>.info</code> and <code>.patch</code> files as well. After you
        move all of the files, make sure to run <code>fink index</code>, so
        that Fink's record of available packages is updated. Once you're done
        you can switch back to rsync (<code>fink selfupdate-rsync</code>) if
        you want.</p></div>
    </a>
    <a name="sudo">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.10: I'm tired of typing my password into sudo again and again. Is there
        a way around this?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you're not paranoid, you can configure sudo to not ask you for a
        password. To do this, run <code>visudo</code> as root and add a line like this:</p><pre>username ALL =(ALL) NOPASSWD: ALL</pre><p>Replace <code>username</code> with your actual username, of course.
        This line allows you to run any command via sudo without typing your
        password.</p></div>
    </a>
    <a name="exec-init-csh">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.11: When I try to run init.csh or init.sh, I get a "Permission denied"
        error. What am I doing wrong?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> init.csh and init.sh are not supposed to be run like normal
        commands. These files set environment variables like PATH and MANPATH
        in your shell. To have a lasting effect on the shell, it must be
        processed with the <code>source</code> command for csh/tcsh, or with
        the <code>.</code> command for bash/zsh, like this:</p><p>for csh/tcsh:</p><pre>source /sw/bin/init.csh</pre><p>for bash/zsh:</p><pre>. /sw/bin/init.sh</pre></div>
    </a>
    <a name="dselect-access">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.12: Help! I used the "[A]ccess" menu entry in dselect and now I can't
        download packages any more!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You probably pointed apt at a Debian mirror, which of course
        doesn't have the Fink files. You can fix this manually or through
        dselect. To fix it manually, edit the file
        <code>/sw/etc/apt/sources.list</code> in a text editor as root. Remove
        lines that mention debian.org and replace them with these:</p><pre>deb http://us.dl.sourceforge.net/fink/direct_download release main crypto
deb http://us.dl.sourceforge.net/fink/direct_download current main crypto</pre><p>(Or if you live in Europe, you can use
        <code>eu.dl.sourceforge.net</code> instead of
        <code>us.dl.sourceforge.net</code>)</p><p>To fix it through dselect, run "[A]ccess" again, choose the "apt"
        method and enter the following info:</p><p>URL: http://us.dl.sourceforge.net/fink/direct_download -
        Distribution: release - Components: main crypto</p><p>Then, say you want to add another source and repeat the process
        with "current" instead of "release".</p><p>A fixed version of the apt package (which provides the
        configuration script as a plug-in for dselect) is making it's way
        through CVS now.</p></div>
    </a>
    <a name="cvs-busy">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.13: When I try to run <q>fink selfupdate</q> or "fink
        selfupdate-cvs", I get the error "<code>Updating using CVS failed.
        Check the error messages above.</code>"</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If the message is</p><pre>Can't exec "cvs": No such file or directory at 
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>then you need to install the Developer Tools.</p><p>If, on the other hand, the last line is</p><pre>### execution of su failed, exit code 1</pre><p>you'll need to look further back in the output to see the error. If
        you see a message that your connection was refused:</p><pre>(Logging in to anonymous@fink.cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to fink.cvs.sourceforge.net:2401 failed: 
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.</pre><p>or a message like the following:</p><pre>cvs [update aborted]: recv() from server fink.cvs.sourceforge.net: 
Connection reset by peer 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>or</p><pre>cvs [update aborted]: End of file received from server</pre><p>or</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>then it's likely that the cvs servers are overloaded and you have
        to try the update later.</p><p>Another possibility is that you have some bad permissions in your
        CVS directories, in which case you get "Permission denied"
        messages:</p><pre>cvs update: in directory 10.2/stable/main: 
cvs update: cannot open CVS/Entries for reading: No such file or directory
cvs server: Updating 10.2/stable/main 
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo: 
No such file or directory 
### execution of su failed, exit code 1 Failed: 
Updating using CVS failed. Check the error messages above.</pre><p>In this case you need to reset your cvs directories. Use the
        command:</p><pre>sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {}\
; fink selfupdate-cvs</pre><p>If, you don't see either of the above messages, then this almost
        always means you've modified a file in your /sw/fink/dists tree and
        now the maintainer has changed it. Look further back in the
        selfupdate-cvs output for lines that start with "C", like so:</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info 
... (other info and patch files) ... 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>The "C" means CVS had a conflict in trying to update the latest
        version.  The fix is to delete any files that show up as starting with "C" in
        the output of selfupdate-cvs, and try again:</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre><p>If you get errors that mention <b>cvs.sourceforge.net</b>:</p><pre>
cvs [update aborted]: connect to cvs.sourceforge.net(66.35.250.207):
2401 failed: Operation timed out
</pre><p>this is because of a restructuring of the CVS servers at sourceforge.net in 2006.  Fink files are now at <b>fink.cvs.sourceforge.net</b>.</p><p>Check your Distribution version, e.g. via</p><pre>fink --version</pre><p>If that shows <code>10.4-transitional</code>, then you need to update to the regular 10.4 distribution.  An <a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">update script</a> has been created to assist with that.</p></div>
    </a>
    <a name="kernel-panics">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.14: When I use Fink, my whole machine freezes up/kernel panics/dies.
        Help!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> A number of reports in fall, 2002 on the <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users
        mailing list</a> indicated problems (including kernel panics
        and infinite hangs during patching) when using Fink to compile
        packages while anti-virus software is installed. You may need to
        switch off any anti-virus software before using Fink.</p></div>
    </a>
    <a name="not-found">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.15: I'm trying to install a package, but Fink can't download it. The
        download site shows a later version number of the package than what
        Fink has. What do I do?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> The package sources get moved around by the upstream sites when new
        versions are released.</p><p>The first thing you should do is run <code>fink selfupdate</code>.
        It may be that the package maintainer has already fixed this, and you
        will get an updated package description with either a more recent
        version or a revised download URL.</p><p>If this doesn't work, most sources are available on <a href="http://distfiles.master.finkmirrors.net/">http://distfiles.master.finkmirrors.net/</a>
        (thanks to Rob Braun) , and you can run <code>fink configure</code> to
        choose to search "Master" source mirrors so that Fink will
        automatically look there.</p><p>If this doesn't work, please let the package maintainer (available
        from "<code>fink describe <b>packagename</b>
          </code>") know that the
        URL is broken; not all maintainers read the mailing lists all of the
        time.</p><p>To get a usable source, first try hunting around the remote site in
        other directories for the same version of the source that Fink wants
        (e.g. in an "old" directory). Keep in mind, though, that some remote
        sites like to trash the old versions of their packages. If the
        official site doesn't have it, then try a web search--sometimes there
        are unofficial sites that have the tarball you want. Another place to
        look is <a href="http://us.dl.sourceforge.net/fink/direct_download/source/">http://us.dl.sourceforge.net/fink/direct_download/source/</a>,
        which is where Fink stores sourcefiles from packages that have been
        released in binary form. If all of the above fail, then you might
        consider posting on the <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users
        mailing list</a> to ask if anybody has the old source available to
        give you.</p><p>Once you locate the proper source tarball, download it manually,
        and then move the file into your Fink source location (i.e. for a
        default Fink install, "<code>sudo mv <b>package-source.tar.gz</b>
        /sw/src/</code>". Then use '<code>fink install <b>packagename</b>
          </code>' as normal.</p><p>If you can't get the source file, then you'll have to wait for the
        maintainer to deal with the problem. They may either post a link to
        the old source, or update the .info and .patch files to use the newer
        version.</p></div>
    </a>
    <a name="fink-not-found">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.16: I get "command not found" errors when I run Fink or anything that I
        installed with Fink.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If this always happens, then you may have inadvertently
        modified (or failed to modify) your startup scripts. Run the
        <code>/sw/bin/pathsetup.sh</code> script in a terminal
        window. This program will attempt to detect your default shell
        and add a command to load Fink's shell initialization script
        into your shell's configuration. You'll then need to open a
        new terminal session so that your environment settings are
        loaded. <b>Note:</b> Some older versions fink called this
        script <code>pathsetup.command</code> instead
        of <code>pathsetup.sh</code>. Alternately, you can run
        the <code>pathsetup.app</code> application on the Fink
        binary distribution disk image.</p><p>On the other hand, if you only have problems in the Apple X11
        terminal, the easy solution is to modify the "Terminal" entry in the X11 Application menu via the <b>Applications-&gt;Customize Menu... </b>option.  Instead of just</p><pre>xterm</pre><p>change the command field to read</p><pre>xterm -ls</pre><p><code>ls</code> here means <q>login shell</q>, and the result is that your full login setup gets used (just like the OS X Terminal).</p><p>These <code>/sw/bin/init.*</code> scripts do much
	more than just add <code>/sw/bin</code> to your PATH.
	Many packages will not work correctly without these additional
	actions.</p></div>
    </a>
    <a name="invisible-sw">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.17: I want to hide /sw in the Finder to keep users from damaging the
        Fink setup.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You can indeed do this. If you have the Development Tools
        installed, then you can run the following command:</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>This makes /sw invisible, just like the standard system folders
        (/usr, etc.). If you don't have the Developer Tools, there are various
        third-party applications that let you manipulate file attributes--you
        need to set /sw to be invisible.</p></div>
    </a>
    <a name="install-info-bad">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.18: I can't install anything, because I get the following error:
        "install-info: unrecognized option `--infodir=/sw/share/info'"</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This usually is due to a problem in your PATH. In a terminal window
        type:</p><pre>printenv PATH</pre><p>If <code>/sw/sbin</code> doesn't appear at all, then you
        need to set your environment up as per the <a href="http://www.finkproject.org/doc/users-guide/install.php#setup">instructions</a>
        in the Users Guide. If <code>/sw/sbin</code> is there, but
        there are other directories ahead of it (e.g.
        <code>/usr/local/bin</code>), then you will either want to
        reorder your PATH so that <code>/sw/sbin</code> is near the
        beginning. Or if you really need the other directory to be before
        <code>/sw/sbin</code>,  and this former directory includes another install-info directory, then you'll want to temporarily rename this <code>install-info</code> subdirectory when you use Fink.</p></div>
    </a>
    <a name="bad-list-file">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.19: I can't install or remove anything, because of a problem with a
        "files list file".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Typically these errors take the form:</p><pre>files list file for package <b>packagename</b> contains empty filename</pre><p>or</p><pre>files list file for package <b>packagename</b> is missing final newline</pre><p>This can be fixed, with a little work. If you have the .deb file
        for the offending package currently available on your system, then
        check its integrity by running</p><pre>dpkg --contents <b>full-path-to-debfile</b>
        </pre><p>e.g.</p><pre>dpkg --contents /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</pre><p>If you get back a listing of directories and files, then your .deb
        is OK. If the output is something other than directories and files, or
        if you don't have the .deb file, you can still proceed because the
        error doesn't interfere with builds.</p><p>If you have been installing from the binary distribution or you
        know for sure that the version in the binary distribution is the same
        as what you have installed (e.g. by checking the <a href="http://pdb.finkproject.org/pdb/index.php">package
        database</a>), then you can get a .deb file by running <code>sudo
        apt-get install --reinstall --download-only <b>packagename</b>
          </code>. Otherwise you can build one yourself by running <code>fink
        rebuild <b>packagename</b>
          </code>, but it won't install yet.</p><p>Once you have a valid .deb file, then you can reconstitute the
        file. First become root by using <code>sudo -s</code> (enter your
        administrative user password if necessary), and then use the following
        command:</p><pre>dpkg -c <b>full-path-to-debfile</b> | awk '{if ($6 == "./"){ print "/."; } \
else if (substr($6, length($6), 1) == "/")\
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}'\ 
&gt; /sw/var/lib/dpkg/info/<b>packagename</b>.list</pre><p>e.g.</p><pre>dpkg -c /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb | awk \
'{if ($6 == "./") { print "/."; } \
else if (substr($6, length($6), 1) == "/") \
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}' \ 
&gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p>What this does is to extract the contents of the .deb file, remove
        everything but the filenames, and write these to the .list file.</p></div>
    </a>
    <a name="dselect-garbage">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.20: I get a bunch of garbage when I select packages in
        <code>dselect</code>. How can I use it?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There are issues between <code>dselect</code> and
        <code>Terminal.app</code>. A workaround is to enter the
        following command</p><p>tcsh users:</p><pre>setenv TERM xterm-color</pre><p>bash users:</p><pre>export TERM=xterm-color</pre><p>before you run <code>dselect</code>. You may want to put
        this in your startup file (e.g. <code>.cshrc</code> |
        <code>.profile</code>) so that it gets run all of the time.</p></div>
    </a>
    <a name="cant-upgrade">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.21: I can't seem to update Fink's version.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If neither running <code>fink selfupdate</code> nor <code>sudo apt-get update ; sudo apt-get dist-upgrade</code> updates you to a newer Fink release, then you may need to download a newer version of the <code>fink</code> package manually.  The relevant commands are:</p><ul>
          <li><b>10.3.x:</b> (0.7.1 distribution)
		<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.7.1-updates/main/binary-darwin-powerpc/base/fink_0.22.4-1_darwin-powerpc.deb
sudo dpkg -i fink_0.22.4-1_darwin-powerpc.deb
rm fink_0.22.4-1_darwin-powerpc.deb
fink selfupdate</pre></li>
          <li><b>10.2.x:</b> (0.6.3 distribution)
		<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.6.3/release/main/binary-darwin-powerpc/base/fink_0.18.3-1_darwin-powerpc.deb
sudo dpkg -i fink_0.18.3-1_darwin-powerpc.deb
rm fink_0.18.3-1_darwin-powerpc.deb
fink selfupdate</pre></li>
        </ul></div>
    </a>
    <a name="spaces-in-directory">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.22: Can I put Fink in a volume or directory with a space in its
        name?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> We recommend against putting your Fink directory tree inside a
        directory with spaces in its name. It's just not worth the hassle.</p></div>
    </a>
    <a name="packages-gz">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.23: When I try to do a binary update, there are many messages with
        "File not found" or "Couldn't stat package source list file".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you see something like the following:</p><pre>Err file: local/main Packages 
File not found 
Ign file: local/main Release 
Err file: stable/main Packages 
File not found 
Ign file: stable/main Release 
Err file: stable/crypto Packages 
File not found 
Ign file: stable/crypto Release 
...
Failed to fetch file:/sw/fink/dists/local/main/binary-darwin-powerpc/Packages
File not found 
Failed to fetch file:/sw/fink/dists/stable/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch file:/sw/fink/dists/stable/crypto/binary-darwin-powerpc/Packages
File not found 
Reading Package Lists... Done 
Building Dependency Tree...Done 
E: Some index files failed to download, 
they have been ignored, or old ones used instead. 
update available list script returned error exit status 1.</pre><p>then all you need to do is run <code>fink scanpackages</code>. This
        generates the files that aren't being found.</p><p>If you get an error of the following form:</p><pre>W: Couldn't stat source package list file: unstable/main Packages
(/sw/var/lib/apt/lists/_sw_fink_dists_unstable_main_binary-darwin-
powerpc_Packages) - stat (2 No such file or directory)</pre><p>then you should run</p><pre>
sudo apt-get update
fink scanpackages
</pre><p>to fix it.</p></div>
    </a>
    <a name="wrong-tree">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.24: I've changed my OS | Developer Tools, but Fink doesn't recognize
        the change.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> When changing the Fink distribution (of which the source and binary
        distros are subsets), Fink needs to be told that this has happened. To
        do this, you can run a script that normally gets run when you first
        install Fink:</p><pre>/sw/lib/fink/postinstall.pl</pre><p>Doing this will point Fink to the correct place.</p></div>
    </a>
    <a name="seg-fault">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.25: I get errors with <code>gzip</code> | <code>dpkg-deb</code>I
        applications from the<code> fileutils </code>package! Help!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Errors of the form:</p><pre>gzip -dc /sw/src/dpkg-1.10.9.tar.gz | /sw/bin/tar -xf - 
### execution of gzip failed, exit code 139</pre><p>or</p><pre>gzip -dc /sw/src/aquaterm-0.3.0a.tar.gz | /sw/bin/tar -xf -
gzip: stdout: Broken pipe 
### execution of gzip failed, exit code 138</pre><p>or</p><pre>dpkg-deb -b root-base-files-1.9.0-1 /sw/fink/dists/unstable/main/binary-darwin-powerpc/base

### execution of dpkg-deb failed, exit code 1
Failed: can't create package base-files_1.9.0-1_darwin-powerpc.deb</pre><p>or segmentation faults when running utilities from<code>
        fileutils</code>, e.g. <code>ls</code> or <code>mv</code>, are likely
        to be due to a prebinding error in a library, and can be fixed by
        running</p><pre>sudo /sw/var/lib/fink/prebound/update-package-prebinding.pl -f</pre></div>
    </a>
    <a name="pathsetup-keeps-running">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.26: When I open a Terminal window, I get a message that "Your
        environment seems to be correctly set up for Fink already.", and it
        logs out.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> What happened is that somehow the OSX Terminal program has been
        told to run <code>/sw/bin/pathsetup.command</code> every time you log
        in. You can fix this by removing the Preferences file,
        <code>~/Library/Preferences/com.apple.Terminal.plist</code>.</p><p>If you have other preferences that you want to keep, you can edit
        the file with a text editor and remove the reference to
        <code>/sw/bin/pathsetup.command</code>.</p></div>
    </a>
    <a name="ext-drive">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.27: I have Fink installed away from the main partition and I can't update the fink package from source.  There are errors involving <q>chowname</q>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If your error looks like:</p><pre>This first test is designed to die, so please ignore the error
message on the next line.
# Looks like your test died before it could output anything.
./00compile............................ok
./Base/initialize......................ok
./Base/param...........................ok
./Base/param_boolean...................ok
./Command/cat..........................ok
./Command/chowname.....................#     
Failed test (./Command/chowname.t at line 27)
#          got: 'root'
#     expected: 'nobody'</pre><p>then you need to run <b>Get Info</b> on the drive/partition where Fink is installed and unselect the "Ignore ownership" button.</p></div>
    </a>
    <a name="mirror-gnu">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.28: Fink won't update my packages because it says it can't find the 'gnu' mirror.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you get an error that ends with</p><pre>Failed: No mirror site list file found for mirror 'gnu'.</pre><p>then most likely you need to update the <code>fink-mirrors</code> package, e.g. via:</p><pre>fink install fink-mirrors</pre></div>
    </a>
    <a name="cant-move-fink">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.29: I can't update Fink, because it can't move /sw/fink out of the way.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This error:</p><pre>Failed: Can't move "/sw/fink" out of the way.</pre><p>is usually due, in spite of what it says, to permissions errors in one of the temporary directories that get created during a <code>selfupdate</code>.  Remove these:</p><pre>sudo rm -rf /sw/fink.tmp /sw/fink.old</pre></div>
    </a>
     <a name="fc-cache">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.30: I get a message that says "No fonts found".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you see the following (so far only seen on OS 10.4):</p><pre>No fonts found; this probably means that the fontconfig
library is not correctly configured. You may need to
edit the fonts.conf configuration file. More information
about fontconfig can be found in the fontconfig(3) manual
page and on http://fontconfig.org.</pre><p>then you can fix it by running</p><pre>sudo fc-cache</pre></div>
    </a>
    <a name="non-admin-installer">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.31:  I can't install Fink via the Installer package, because I get "volume doesn't support symlinks" errors.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This message commonly means that you've tried to run the Fink installer as user who doesn't have administrative privileges.  Make sure to log in at the login screen as such a user or switch to such a user in the Finder (i.e. fast user switching) before starting the Fink installer.</p><p>If you're having trouble even when using an admin account, then it's likely a problem with the permissions on your top-level directory.  Use Apple's Disk Utility (from the Utilities sub-folder in your Applications folder), select the hard drive in question, choose the <b>First Aid</b> tab, and press <b>Repair Disk Permissions</b>.  If that doesn't work, then you may need to set your permissions manually via:</p><pre>
sudo chmod 1775 /	  
	</pre></div>
    </a>
    <a name="wrong-arch">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.32: I can't update Fink, because <q>package architecture (darwin-i386) does not match system (darwin-powerpc).</q>
</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This error occurs if you use a PowerPC installer package on an Intel machine.  You'll need to flush your Fink installation, e.g.:</p><pre>sudo rm -rf /sw</pre><p>and then download the disk image for Intel machines from <a href="http://www.finkproject.org/download/index.php">the downloads page</a>.</p></div>
    </a>
   <p align="right"><? echo FINK_NEXT ; ?>:
<a href="comp-general.php?phpLang=en">6. Compile Problems - General</a></p>
<? include_once "../footer.inc"; ?>


