<?
$title = "User's Guide - fink.conf";
$cvs_author = 'Author: finlayd';
$cvs_date = 'Date: 2002/11/24 12:36:57';

$metatags = '<link rel="contents" href="index.php" title="User\'s Guide Contents"><link rel="prev" href="upgrade.php" title="Upgrading Fink">';

include "header.inc";
?>

<h1>User's Guide - 5 The Fink Configuration File</h1>



<p>
This chapter explains the settings available in the Fink configuration
file (fink.conf) and how they influence the behaviour of Fink.
</p>


<a name="about"><h2>5.1 About fink.conf</h2></a>
<p>
When Fink is initially installed it prompts you for the answers to some
questions to set up your configuration file, such as which <a href="#mirrors">mirrors</a> you want to use for downloading files
and how to acquire super-user rights. You can re-run this process by
calling the <tt><nobr>fink configure</nobr></tt> command. In order to set some
options, you may need to edit your <b>fink.conf</b> file by hand. In
general, these options are meant for advanced users only.
</p>
<p>
The <b>fink.conf</b> file is located at
<tt><nobr>/sw/etc/fink.conf</nobr></tt>, and can be edited in your favourite
text editor. You will need super-user rights to edit it.
</p>


<a name="syntax"><h2>5.2 fink.conf syntax</h2></a>
<p>
Your fink.conf file consists of multiple lines, in the format:</p>
<pre>OptionName: Value</pre>
<p>Options are one per line, and the option name is separated from its
value by a : and a single space. The contents of value depends on the
option, but it is normally either a boolean (&quot;True&quot; or &quot;False&quot;), a
string, or a list of strings delimited by a space. 
For example:
</p>
<pre>
BooleanOption: True
StringOption: Something
ListOption: Option1 Option2 Option3
</pre>


<a name="required"><h2>5.3 Required Settings</h2></a>
<p>
Some of the settings in the <b>fink.conf</b> are mandatory. Without
them Fink cannot to function properly. The following settings belong to
this category.
</p>
<ul>
<li><p><b>Basepath:</b> path</p>
<p>
Tells Fink where it was installed. Defaults to <b>/sw</b> unless you
changed it during the initial installation of Fink. You should
<b>not</b> change this value after installation, it will confuse Fink.
</p>
</li>
</ul>


<a name="optional"><h2>5.4 Optional User Settings</h2></a>
<p>
There are various optional settings which users can customize to change
the behaviour of Fink.
</p>
<ul>
<li><p><b>RootMethod:</b> su or sudo or none</p>
<p>For some operations, Fink needs super user rights. Recognized values
are <b>sudo</b> or <b>su</b>. You can also set this to
<b>none</b>, in which case you must run Fink as root yourself. The
default value is <b>sudo</b> and in most cases it should not be
changed.</p>
</li>
<li><p><b>Trees:</b> list of trees</p>
<p>Available trees are:</p>
<pre>
local/main      - any local packages you want to install
local/bootstrap - packages used in the installation of fink
stable/crypto   - stable cryptographic packages
stable/main     - other stable packages
unstable/crypto - unstable cryptographic packages
unstable/main   - other unstable packages
</pre>
<p>
You may also add your own trees in the <tt><nobr>/sw/fink/dists</nobr></tt>
directory for your own purposes, but this is not necessary in most
circumstances. The default trees are &quot;local/main local/bootstrap
stable/main&quot;. This list should be kept in sync with the
<tt><nobr>/sw/etc/apt/sources.list</nobr></tt> file.
</p>
</li>
<li><p><b>Distribution:</b> 10.1 or 10.2</p>
<p>Fink needs to know which version of Mac OS X you are running. The
10.1 distribution is meant for users of Mac OS X 10.1, while 10.2 will
only work for those who run Mac OS X 10.2 &quot;Jaguar&quot; on their systems.
Mac OS X 10.0 and earlier are not supported. You should not need to
alter this value.
</p>
</li>
<li><p><b>FetchAltDir:</b> path</p>
<p>usually fink will store the sources it fetches in
<tt><nobr>/sw/src</nobr></tt>. You can specify an alernate directory to look for
downloaded source code in using this option. For example:
</p>
<pre>FetchAltDir: /usr/src</pre>
</li>
<li><p><b>Verbose:</b> a number from 0 to 3</p>
<p>
This option sets how much information Fink tells you about what it is
doing. The values are:
<b>0</b> Quiet (don't show download stats)
<b>1</b> Low (don't show tarballs being expanded)
<b>2</b> Medium (shows almost everything)
<b>3</b> High (shows everything)
The default value is 3.
</p>
</li>
<li><p><b>NoAutoIndex:</b> boolean</p>
<p>Fink caches its package descripition files in /sw/var/db/fink.db to
save it having to read and parse them all every time it runs. Fink
checks whether or not thepackage index needs to be updated unless this
option is set to &quot;True&quot;. It defaults to &quot;False&quot; and it is not
recommended that you change it. If you do, you may need to manually run
the <tt><nobr>fink index</nobr></tt> command to update the index.</p>
</li>
<li><p><b>SelfUpdateNoCVS:</b> boolean</p>
<p>The command <tt><nobr>fink selfupdate</nobr></tt> upgrades Fink package
manager to the latest release. This option makes sure that the
Concurrent Version System (CVS) is not used to achieve this when set to
True. It is set automatically by the <tt><nobr>fink
selfupdate-cvs</nobr></tt> command, so you should not need to change it
manually.</p>
</li>
</ul>

<a name="downloding"><h2>5.5 Download Settings</h2></a>
<p>There are various settings which influence the way Fink downloads
package data.</p>
<ul>
<li><p><b>ProxyPassiveFTP:</b> boolean</p>
<p>This option makes Fink use &quot;passive&quot; mode for FTP downloads. Some
FTP server or network configurations require this option to be set to
True. It is recommended that you leave this option on at all
times since active FTP is deprecated.</p>
</li>
<li><p><b>ProxyFTP:</b> url</p>
<p>If you use a FTP proxy then you should enter its address here, for
example:</p>
<pre>ProxyFTP: ftp://yourhost.com:2121/</pre>
<p>Leave if blank if you do not use a FTP proxy.</p>
</li>
<li><p><b>ProxyHTTP:</b> url</p>
<p>If you use a HTTP proxy then you should enter its address here, for
example:</p>
<pre>ProxyHTTP: http://yourhost.com:3128/</pre>
<p>Leave if blank if you do not use a HTTP proxy.</p>
</li>
<li><p><b>DownloadMethod:</b> wget or curl or axel or axelautomirror</p>
<p>Fink can use three different applications to download files from the
Internet - <b>wget</b>, <b>curl</b>, or <b>axel</b>. The value
<b>axelautomirror</b> uses an experimental mode of the <b>axel</b>
application which tries to determine the closest server that has a
certain file. The use of <b>axelmirror</b> is not recommended at this
time. The default value is <b>curl</b>.
<b>The application you chose as DownloadMethod MUST be installed!</b>
</p>
</li>
</ul>

<a name="mirrors"><h2>5.6 Mirror Settings</h2></a>
<p>Getting software from the Internet can be tedious thing and often
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
<li><p><b>MirrorContinent:</b> three letter code</p>
<p>You should change this value using the <tt><nobr>fink configure</nobr></tt>
command. The three letter code is one found in
<tt><nobr>/sw/lib/fink/mirror/_keys</nobr></tt>.
For example, if you live in europe:</p>
<pre>MirrorContinent: eur</pre>
</li>
<li><p><b>MirrorCountry:</b> six letter code</p>
<p>You should change this value using the <tt><nobr>fink configure</nobr></tt>
command. The three letter code is one found in
<tt><nobr>/sw/lib/fink/mirror/_keys</nobr></tt>.
For example, if you live in Austria:</p>
<pre>MirrorCountry: eur-AT</pre>
</li>
</ul>

<a name="developer"><h2>5.7 Developer Settings</h2></a>
<p>Some options in the <b>fink.conf</b> are only useful to
developers. We do not recommend that conventional Fink users modify
them. The following options fall into this category.</p>
<ul>
<li><p><b>KeepRootDir:</b> boolean</p>
<p>Causes Fink not to delete the /sw/src/root-name-version directory
after building a package. Defaults to false. <b>Be careful, this
option can fill your hard-disk quickly!</b></p>
</li>
<li><p><b>KeepBuildDir:</b> boolean</p>
<p>Causes Fink not to delete the /sw/src/name-version directory after
building a package. Defaults to false. <b>Be careful, this option can
fill your hard-disk quickly!</b>
</p>
</li>
</ul>






<?
include "footer.inc";
?>

