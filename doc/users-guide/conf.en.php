<?php
$title = "User's Guide - fink.conf";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="User\'s Guide Contents"><link rel="next" href="usage.php?phpLang=en" title="Using the fink Tool from the Command Line"><link rel="prev" href="upgrade.php?phpLang=en" title="Upgrading Fink">';


include_once "header.en.inc";
?>
<h1>User's Guide - 5. The Fink Configuration File</h1>
    
    
    
      <p>
This chapter explains the settings available in the Fink configuration
file (fink.conf) and how they influence the behaviour of Fink, specifically the <code>fink</code> command-line tool (i.e. mainly working with the source distribution).
</p>
    
    <h2><a name="about">5.1 About fink.conf</a></h2>
      
      <p>
When Fink is initially installed it prompts you for the answers to some
questions to set up your configuration file, such as which <a href="#mirrors">mirrors</a> you want to use for downloading files
and how to acquire super-user rights. You can re-run this process by
calling the <code>fink configure</code> command. In order to set some
options, you may need to edit your <b>fink.conf</b> file by hand. In
general, these options are meant for advanced users only.
</p>
      <p>
The <b>fink.conf</b> file is located at
<code>/sw/etc/fink.conf</code>, and can be edited in your favourite
text editor. You will need super-user rights to edit it.
</p>
    
    <h2><a name="syntax">5.2 fink.conf syntax</a></h2>
      
      <p>
Your fink.conf file consists of multiple lines, in the format:</p>
      <pre>OptionName: Value</pre>
      <p>Options are one per line, and the option name is separated from its
value by a : and a single space. The contents of value depends on the
option, but it is normally either a boolean ("True" or "False"), a
string, or a list of strings delimited by a space. 
For example:
</p>
      <pre>
BooleanOption: True
StringOption: Something
ListOption: Option1 Option2 Option3
</pre>
    
    <h2><a name="required">5.3 Required Settings</a></h2>
      
      <p>
Some of the settings in the <code>fink.conf</code> file are mandatory. Without
them Fink cannot function properly. The following settings belong to
this category.
</p>
      <ul>
        <li>
          <p>
            <b>Basepath:</b> path</p>
          <p>
Tells <b>fink</b> where it was installed. Defaults to <b>/sw</b> unless you
changed it during the initial installation of the Fink distribution. You should
<b>not</b> change this value after installation, it will confuse <b>fink</b>.
</p>
        </li>
      </ul>
    
    <h2><a name="optional">5.4 Optional User Settings</a></h2>
      
      <p>
There are various optional settings which users can customize to change
the behaviour of Fink.
</p>
      <ul>
        <li>
          <p>
            <b>RootMethod:</b> su or sudo or none</p>
          <p>For some operations, Fink needs super user rights. Recognized values
are <b>sudo</b> or <b>su</b>. You can also set this to
<b>none</b>, in which case you must run Fink as root yourself. The
default value is <b>sudo</b> and in most cases it should not be
changed.</p>
        </li>
        <li>
          <p>
            <b>Trees:</b> list of trees</p>
          <p>Available trees are:</p>
          <pre>
local/main      - any local packages you want to install
local/bootstrap - packages used during the installation of Fink
stable/crypto   - stable cryptographic packages
stable/main     - other stable packages
unstable/crypto - unstable cryptographic packages
unstable/main   - other unstable packages
</pre>
          <p>
You may also add your own trees in <code>/sw/fink/dists</code> for your own purposes, but this is not necessary in most
circumstances. The default trees are "local/main local/bootstrap
stable/main". This list is automatically kept in sync with the
<code>/sw/etc/apt/sources.list</code> file.</p><p>The order of the trees is meaningful, as packages from later trees in the list may
           override packages from earlier ones.</p>
        -</li>
        <li>
          <p>
            <b>Distribution:</b> 10.4</p>
          <p>Fink needs to know which version of Mac OS X you are
running. Mac OS X 10.0 and earlier are not supported, and 10.1 and 10.2 are no
longer supported by current versions of <code>fink</code>. Mac OS X 10.2 users are 
restricted to fink-0.24.7, released in June 2005.  This
field is set by running the <code>/sw/lib/fink/postinstall.pl</code>
script. You should not need to alter this value manually.
</p>
        </li>
        <li>
          <p>
            <b>FetchAltDir:</b> path</p>
          <p>usually <code>fink</code> will store the sources it fetches in
<code>/sw/src</code>. You can specify an alternate directory to look for
downloaded source code in using this option. For example:
</p>
          <pre>FetchAltDir: /usr/src</pre>
        </li>
        <li>
          <p>
            <b>Verbose:</b> a number from 0 to 3</p>
          <p>
This option sets how much information Fink tells you about what it is
doing. The values are:
<b>0</b>
            Quiet (don't show download stats)
<b>1</b>
            Low (don't show tarballs being expanded)
<b>2</b>
            Medium (shows almost everything)
<b>3</b>
            High (shows everything)
The default value is 1.
</p>
        </li>
        <li><p><b>SkipPrompts:</b> a comma-delimited list</p><p>(<code>fink-0.25</code> and later) This option instructs <code>fink</code> to refrain from asking for input when
           the user does not want to be prompted. Each prompt belongs to a
           category. If a prompt's category is in the SkipPrompts list then
           the default option will be chosen within a very short period of
           time.</p><p>Currently, the following categories of prompts exist:</p><p><b>fetch</b> - Downloads and mirrors</p><p><b>virtualdep</b> - Choosing between alternative packages</p><p> By default, no prompts are skipped.</p></li>
        <li>
          <p>
            <b>NoAutoIndex:</b> boolean</p>
          <p>Fink caches its package description files in /sw/var/db/fink.db to
save it having to read and parse them all every time it runs. Fink
checks whether or not the package index needs to be updated unless this
option is set to "True". It defaults to "False" and it is not
recommended that you change it. If you do, you may need to run
the <code>fink index</code> command manually to update the index.</p>
        </li>
        <li>
          <p>
            <b>SelfUpdateNoCVS:</b> boolean</p>
          <p>The command <code>fink selfupdate</code> upgrades Fink package
manager to the latest release. This option makes sure that the
Concurrent Version System (CVS) is not used to achieve this when set to
True. It is set automatically by the <code>fink
selfupdate-cvs</code> command, so you should not need to change it
manually.</p>
        </li>
        <li>
	  <p>
	    <b>Buildpath:</b> path</p>
	  <p>Fink needs to create several temporary directories for
each package it compiles from source. By default, they are placed
in <code>/sw/src</code> on Panther and earlier, and 
<code>/sw/src/fink.build</code> on Tiger. If you want them to be
somewhere else, specify the path here. See the descriptions of
the <code>KeepRootDir</code> and <code>KeepBuildDir</code> fields
 in the <a href="#developer">Developer Settings</a> section of this document for more information about these temporary
directories.
	    </p>
	    <p>On Tiger, it is recommended that the Buildpath end with <code>.noindex</code>
or <code>.build</code>. Otherwise, Spotlight will attempt to index the temporary files in
the Buildpath, slowing down builds.
    	</p>
	</li>
        <li><p><b>Bzip2Path:</b> the path to your <code>bzip2</code> (or compatible) binary
          </p><p>(<code>fink-0.25</code> and later) The Bzip2Path option lets you override the default path for the
           <code>bzip2</code> command-line tool.  This allows you to specify an alternate
           location to your <code>bzip2</code> executable, pass optional command-line
           options, or use a drop-in replacement like <code>pbzip2</code> for decompressing
           <code>.bz2</code> archives.</p></li>
      </ul>
    
    <h2><a name="downloading">5.5 Download Settings</a></h2>
      
      <p>There are various settings which influence the way Fink downloads
package data.</p>
      <ul>
        <li>
          <p>
            <b>ProxyPassiveFTP:</b> boolean</p>
          <p>This option makes Fink use "passive" mode for FTP downloads. Some
FTP server or network configurations require this option to be set to
True. It is recommended that you leave this option on at all
times since active FTP is deprecated.</p>
        </li>
        <li>
          <p>
            <b>ProxyFTP:</b> url</p>
          <p>If you use a FTP proxy then you should enter its address here, for
example:</p>
          <pre>ProxyFTP: ftp://yourhost.com:2121/</pre>
          <p>Leave it blank if you do not use a FTP proxy.</p>
        </li>
        <li>
          <p>
            <b>ProxyHTTP:</b> url</p>
          <p>If you use a HTTP proxy then you should enter its address here, for
example:</p>
          <pre>ProxyHTTP: http://yourhost.com:3128/</pre>
          <p>Leave if blank if you do not use a HTTP proxy.</p>
        </li>
        <li>
          <p>
            <b>DownloadMethod:</b> wget or curl or axel or axelautomirror</p>
          <p>Fink can use three different applications to download files from the
Internet - <b>wget</b>, <b>curl</b>, or <b>axel</b>. The value
<b>axelautomirror</b> uses an experimental mode of the <b>axel</b>
application which tries to determine the closest server that has a
certain file. The use of <b>axel</b> and <b>axelautomirror</b> are not recommended at this
time. The default value is <b>curl</b>.
<b>The application you chose as DownloadMethod MUST be installed!</b> (i.e. <code>fink</code> won't fall back to <b>curl</b> if you try to use a download application that isn't present.
          </p>
        </li>
        <li>
          <p>
            <b>SelfUpdateMethod:</b> point, rsync or git</p>
          <p>
<code>fink</code> can use some different methods to update the package info files.
<b>rsync</b> is the recommended setting; it uses rsync to download only
modified files in the <a href="#optional">trees</a> that you have enabled. Note that if you have
changed or added to files in the <code>stable</code> or <code>unstable</code> trees, using rsync will
delete them. Make a backup first, e.g. in your <code>local</code> tree. <b>git</b> will download using anonymous or
Github access from the Fink repository. This has the disadvantage that git
can not switch mirrors; if the server is unavailable you will not be able to
update. <b>point</b> will download only the latest released version of the
packages. It is not recommended as your packages may be quite out of date.
          </p>
        </li>
        <li><p><b>SelfUpdateCVSTrees:</b> list of trees
           </p><p>(<code>fink-0.25</code> and later) By default, the <b>cvs</b> selfupdate method will update only the current
           distribution's tree.  This option overrides the list of distribu-
           tion versions that will be updated during a selfupdate.

           Please note that you will need a recent "cvs" binary installed if
           you wish to include directories that do not have CVS/ directories
           in their entire path (e.g., dists/local/main or similar).</p></li>
        <li>
          <p>
            <b>UseBinaryDist:</b> boolean</p>
          <p>
Causes <code>fink</code> to try to download pre-compiled binary packages from the binary
distribution if available and if the binary package is not already on the
system. This can save a lot of installation time and it is therefore 
recommended to set this option. Passing fink the 
<a href="usage.php?phpLang=en">--use-binary-dist</a> option (or the <code>-b</code> flag) has the same effect,  
but only operates on that single <code>fink</code> invocation.  Passing <code>fink</code> the
           <code>--no-use-binary-dist</code> flag overrides this, and compiles from source
           for that single <code>fink</code> invocation.
          </p><p>Note that this mode instructs <code>fink</code> to download an available binary  
           if that version is the latest available version of the package; it does <b>not</b> cause <code>fink</code>
           to choose a version based on its binary availability.
</p>
        </li>
      </ul>
    
    <h2><a name="mirrors">5.6 Mirror Settings</a></h2>
      
      <p>Getting software from the Internet can be a tedious thing and often
downloads are not as fast as we would like them to be. Mirror servers
host copies of files available on other servers, but may have a faster
connection to the Internet or be geographically closer to you, thus
enabling you to download files faster. They also help reduce load on
busy primary servers, for example <b>ftp.gnu.org</b>, and they
provide an alternative should one server not be reachable.</p>
      <p>In order for Fink to pick the best mirror for you, you must tell it
which continent and which country you reside in. If downloads from one
server fail, it will prompt you if you want to retry from the same
mirror, a different mirror in the same country or continent, or a
different mirror anywhere in the world.</p>
      <p>The <b>fink.conf</b> file holds settings about which mirrors you
would like to use.</p>
      <ul>
        <li>
          <p>
            <b>MirrorContinent:</b> three letter code</p>
          <p>You should change this value using the <code>fink configure</code>
command. The three letter code is one found in
<code>/sw/lib/fink/mirror/_keys</code>.
For example, if you live in Europe:</p>
          <pre>MirrorContinent: eur</pre>
        </li>
        <li>
          <p>
            <b>MirrorCountry:</b> six letter code</p>
          <p>You should change this value using the <code>fink configure</code>
command. The three letter code is one found in
<code>/sw/lib/fink/mirror/_keys</code>.
For example, if you live in Austria:</p>
          <pre>MirrorCountry: eur-AT</pre>
        </li>
        <li>
          <p>
            <b>MirrorOrder:</b> MasterFirst or MasterLast or MasterNever or ClosestFirst</p>
          <p>
Fink supports 'Master' mirrors, which are mirrored repositories of the source
tarballs for all Fink packages. The advantage of using the Master mirror set is that 
the source download URLs will never break. Users can choose to use 
these mirrors which are maintained by the Fink team, or to use only the original 
source URLs and external mirror sites such as the gnome, KDE, and debian mirror sites.
Additionally users can choose to combine the two sets, which are then searched in proximity order, as 
documented above. When using the MasterFirst or MasterLast options, the user can 'skip ahead' 
to the Master (or non Master) set if a download fails. The options are:
</p>
          <pre>
MasterFirst - Search "Master" source mirrors first.
MasterLast - Search "Master" source mirrors last.
MasterNever - Never use "Master" source mirrors.
ClosestFirst - Search closest source mirrors first (combine all mirrors into one set).
</pre>
        </li>
        <li><p><b>Mirror-rsync:</b>
           </p><p>(<code>fink-0.25.2</code> and later) When doing <code>fink selfupdate</code> with the <b>SelfupdateMethod</b> set to <code>rsync</code>,
           this is the rsync url to sync from.  This should be an anonymous
           rsync url, pointing to a directory which contains all the fink Dis-
           trubutions and Trees.
</p></li>
      </ul>
    
    <h2><a name="developer">5.7 Developer Settings</a></h2>
      
      <p>Some options in the  <code>fink.conf</code> file are only useful to
developers. We do not recommend that conventional Fink users modify
them. The following options fall into this category.</p>
      <ul>
        <li>
          <p>
            <b>KeepRootDir:</b> boolean</p>
          <p>Causes <code>fink</code> not to delete the directory <code>root-[name]-[version]-[revision]</code> in the <b>Buildpath</b>
after building a package. Defaults to false. <b>Be careful, this
option can fill your hard-disk quickly!</b>
Passing <code>fink</code> the <b>-K</b> flag has the same effect, but
only operates on that single <code>fink</code> invocation.
          </p>
        </li>
        <li>
          <p>
            <b>KeepBuildDir:</b> boolean</p>
           <p>Causes <code>fink</code> not to delete the directory <code>[name]-[version]-[revision]</code> in the <b>Buildpath</b>
after building a package. Defaults to false. <b>Be careful, this
fill your hard-disk quickly!</b>
Passing <code>fink</code> the <b>-k</b> flag has the same effect, but
only operates on that single <code>fink</code> invocation.
          </p>
        </li>
      </ul>
    
    <h2><a name="advanced">5.8 Advanced Settings</a></h2>
      
      <p>There are some other options which may be useful, but require some knowledge to get right.</p>
      <ul>
        <li>
          <p>
            <b>MatchPackageRegEx:</b> </p>
          <p>Causes fink not to ask which package to install if one (and only one) of the choices matches the perl Regular Expression given here. Example:</p>
          <pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>
          <p>will match packages ending in '-ssl', and will match 'xfree86' and 'xfree86-shlibs' exactly.</p>
        </li>
        <li>
          <p>
            <b>CCacheDir:</b> path</p>
          <p>If the Fink package <code>ccache-default</code> is installed, the cache files it makes
while building Fink packages will be placed here. Defaults to <code>/sw/var/ccache</code>. If set to <code>none</code>, fink will not set the CCACHE_DIR environment variable and ccache will use <code>$HOME/.ccache</code>, potentially putting root-owned files into your home directory.
<b>Only available in fink newer than version 0.21.0</b>.
          </p>
        </li>
        <li><p><b>NotifyPlugin:</b> plugin</p><p>
           Specify a notification plugin to tell you when packages have been
           installed/uninstalled.  Defaults to Growl (requires <code>Mac::Growl</code> to
           operate).  Other plugins can be found in the
           <code>/sw/lib/perl5/Fink/Notify</code> directory.  On <code>fink-0.25</code> and later they are listed in the output of <code>fink plugins</code>.  See the <a href="http://wiki.finkproject.org/index.php/Fink:Notificati%20on_Plugins">Fink Developer Wiki</a> for more information.
</p></li>
        <li><p><b>AutoScanpackages:</b> boolean
           </p><p>When <code>fink</code> builds new packages, <code>apt-get</code> does not immediately know about
           them.  Historically, the command <code>fink scanpackages</code> had to be run
           for <code>apt-get</code> to notice the new packages, but now this happens auto
           matically. If this option is present and <b>false</b>, then <code>fink
           scanpackages</code> will no longer be run automatically after packages are
           built.  Defaults to <b>true</b>.
</p></li>
        <li><p><b>ScanRestrictivePackages:</b> boolean
           </p><p>When scanning the packages for <code>apt-get</code>, <code>fink</code> normally scans all
           packages in the current trees. However, if the resulting apt repository will be made publically available, the administrator may be
           legally obligated not to include packages with <code>Restrictive</code> or
           <code>Commercial</code> licenses. If this option is present and <b>false</b>, then Fink
           will omit those packages when scanning.
</p></li>
      </ul>
    
    <h2><a name="sourceslist">5.9 Managing apt's sources.list file</a></h2>
      
      <p>Fink actively manages the file
<code>/sw/etc/apt/sources.list</code> which is used by apt to locate
binary files for installation.  The default sources.list file looks 
something like this, adjusted to match your Distribution and Trees:
</p>
      <pre># Local modifications should either go above this line, or at the end.
#
# Default APT sources configuration for Fink, written by the fink program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in 
# /sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding Packages.gz files
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main crypto

# Put local modifications to this file below this line, or at the top.
</pre>
      <p>With this default file, apt-get first looks in your local installation
for already-compiled binaries, and then looks in the official binary
distribution.  You can alter this by making entries at the beginning of
the file (which will be searched first) or at the end of the file (which
will be searched last).</p>
      <p>If you change your Trees line or the Distribution you are using,
fink will automatically modify the "default" portion of the file to
correspond to the new values.  Fink will, however, preserve any local
modifications you have made to the file, provided that you confine your
modifications to the top of the file (above the first default line) and
the bottom of the file (below the last default line).
</p>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=en">6. Using the fink Tool from the Command Line</a></p>
<?php include_once "../../footer.inc"; ?>


