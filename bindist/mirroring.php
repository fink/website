<?
/* mirroring.php */

$binbase = "";
$cvs_author = 'Author: chrisp';
$cvs_date = 'Date: 2001/08/28 12:00:00';  // more or less fake
include "header.inc";
?>

<h2>Mirroring Instructions</h2>

<p>
You're welcome to mirror the binary distribution of Fink.
There are some rules to follow, though:
</p>
<ul>
<li>Mirror it completely. Don't leave out the "source" directories,
that would be a violation of the GPL and some other licenses.</li>
<li>Keep it up to date. Daily synchronization is recommended. If you
no longer synchronize your mirror, better take it offline
altogether.</li>
<li>Don't mirror the rest of the web site, just this "bindist"
subdirectory.</li>
<li>Don't use a web spider to mirror it. You'll be wasting bandwidth
and storage because of the symlinks and you'll be downloading the
generated directory indices instead of the scripts that generate
them.</li>
<li>Take the time to set up rsync and the directory indexing as
described below.</li>
</ul>
<p>
If you want your mirror listed publicly, contact &lt;fink@chrisp.de&gt;.
</p>

<h2>Setting up rsync</h2>

<p>
The master site of the binary distribution is currently hosted on the
SourceForge project webservers.
It can be accessed by rsync over SSH.
You'll need a normal SourceForge shell account for this.
Here's an example rsync command line to retreive the bindist
directory:
</p>
<pre>rsync -e ssh -av --partial --delete \
  shell1.sourceforge.net:/home/groups/f/fi/fink/htdocs/bindist .</pre>
<p>
The same command is used for initial retreival and for subsequent
updates.
rsync automatically transfers only the differences.
Note that it's useless to turn compression on as basically all data in
the archive is already compressed.
</p>

<h2>Configuring the Directory Indices</h2>

<p>
The archive uses PHP scripts to generate nice-looking directory
indices on the fly.
If you decide to use them, you'll have to set up the page headers and
footers.
They are defined in the files <tt>header.inc</tt> and
<tt>footer.inc</tt> in the root directory of the archive.
Those files can contain plain HTML or PHP statements.
A minimal example:
</p>
<p>header.inc:</p>
<pre>&lt;html&gt;&lt;head&gt;&lt;title&gt;Fink Binary Distribution Mirror&lt;/title&gt;&lt;/head&gt;
&ltbody bgcolor="#ffffff"&gt;
&lt;h1&gt;Fink Binary Distribution Mirror&lt;/h1&gt;
&lt;p&gt;This is a mirror of the &lt;a href="http://fink.sourceforge.net/"&gt;Fink&lt;/a&gt;
binary distribution, hosted by &lt;a href="/"&gt;Acme Corp.&lt;/a&gt;. Enjoy.&lt;/p&gt;</pre>
<p>footer.inc:</p>
<pre>&lt;/body&gt;&lt;/html&gt;</pre>

<p>
Feel free to display your logo or that of your hosting company.
Just make it clear that it's a mirror of Fink and provide a link to
the Fink website.
The appearance can be further customized using CSS style sheets and by
setting the PHP variables <tt>$headerrowcolor</tt>,
<tt>$rowcolor1</tt> and <tt>$rowcolor2</tt> in <tt>header.inc</tt>.
If you feel like it, you can even change the icons in the
<tt>icons</tt> directory.
(They must be 16x16 pixel GIFs, though.)
</p>

<p>
Some technical hints:
You'll need <a href="http://www.php.net/">PHP4</a> support in your web
server.
The web server must be configured to look for <tt>index.php</tt> as
the default document and the <tt>.php</tt> extension must be
configured to invoke PHP4.
</p>
<p>
Oh, and make sure you exclude <tt>*.inc</tt> from rsync if you have
customized them.
Otherwise, rsync will overwrite your local changes...
</p>

<h2>Disabling the Directory Indices</h2>

<p>
If you prefer to use Apache's built-in directory indices or want to
mirror this on an FTP server, you can get rid of the directory
indexing scripts.
Just delete all files that end in <tt>.php</tt> or <tt>.inc</tt>, and
remove the <tt>icons</tt> directory at the top level.
You may want to make an exclusion pattern file for rsync that lists
these.
</p>


<p><br>
<a href="index.php">back to browsing</a>
</p>


<?
include "footer.inc";
?>
