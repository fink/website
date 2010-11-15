<?
$title = "Upgrade Instructions for Mac OS X 10.6";
$cvs_author = '$Author: alexkhansen $';
$cvs_date = '$Date: 2010/11/15 21:37:50 $';

include "header.inc";
?>


<h1>Upgrade Instructions for Mac OS X 10.6</h1>
<h2>Important Notes:</h2>
<p>If you've been using Xquartz 2.4 on 10.5, you will probably find it easier to do a <a href="./srcdist.php">clean install</a> from source instead.<p><br>
<p>To upgrade your Fink installation from 10.5/32 bit to 10.6/32 bit (there is no direct upgrade path from earlier OS versions), follow the sequence below:</p>
<ol>
    <li>Before installing OS X 10.6, run <pre>fink selfupdate</pre> with rsync or cvs updating turned on, i.e. use <pre>fink selfupdate-rsync</pre> or 
    <pre>fink selfupdate-cvs</pre>, to bring <em>fink</em> to a current version.<br>
    Use <pre>fink -V</pre> to check your package manager version, which needs to be at least 0.29.9 before updating.</br>
    <strong>Do not proceed if <code>fink</code> version is not at least 0.29.9!</strong>  You may need to follow these 
    <a href=../faq/upgrade-fink.php#leopard-bindist1">instructions</a> to update it.
    </li>
    <li>Edit the file <em>/sw/etc/fink.conf</em>, adding a line to it which reads <strong>NoAutoIndex: true</strong>.
    (You may need to use <em>sudo</em> or an equivalent method to obtain the correct permissions to edit this file.)</li>   
    <li>Install OS X 10.6, as well as Xcode 3.2 (or a later released version).</li>
    <li>Run the command <pre>fink reinstall fink</pre> in order to tell <em>fink</em> that you are now on 10.6.
    (If you encounter a message about package database corruption, run <pre>fink index -f</pre> and try this step again.)</li>
    <li>Run the command <pre>fink update fink</pre> to get the latest <em>fink</em> for 10.6.</li>
    <li>Run the command <pre>fink install perl588-core</pre> in case you have Fink packages which depend on it, as the system's Perl version was changed during the upgrade.</li>
    <li>Remove the <strong>NoAutoIndex: true</strong> line from <em>fink.conf</em>.</li>
</ol>
<p>After the upgrade, you may wish to run <pre>fink configure</pre> to do some cleanup.</p>

<?
include "footer.inc";
?>
