<?
$title = "Fink bug trqacking system";
$cvs_author = '$Author: beren12 $';
$cvs_date = '$Date: 2005/01/22 21:42:08 $';

include "header.inc";
?>
<h1 align="center">Debian bug tracking system</h1> 
<p>
	Debian has a bug tracking system (BTS) in which we file details of bugs reported by users and developers. Each bug is given a number, and is kept on file until it is marked as having been dealt with.
</p>
<h2>Bug tracking system documentation</h2> 
<ul>
	<li>
		<a href="Reporting">How to report a bug in Debian</a> 
	<li>
		<a href="Access">Ways of accessing the bug report logs</a> 
	<li>
		<a href="server-request">Requesting bug reports by email</a> 
</ul>
<ul>
	<li>
		<a href="Developer">Developers' information on how to use the system</a> 
	<li>
		<a href="server-control">Developers' information on manipulating bugs by email</a> 
	<li>
		<a href="server-refcard">Mailservers' reference card</a> 
</ul>
<h2>Viewing bug reports on the WWW</h2> 
<p>
	Find a bug by <strong>number</strong>: 
	<br>
<form method="get" action="http://bugs.debian.org/cgi-bin/bugreport.cgi">
	<input type="text" size="9" name="bug" value=""> <input type="submit" value="Find"> <label><input type="checkbox" name="mbox" value="yes"> as mbox</label> 
</form>
<form method="get" action="http://bugs.debian.org/cgi-bin/pkgreport.cgi">
<p>
	Find bugs by: <label><input type="radio" name="which" value="pkg" checked><strong>package</strong></label> <label><input type="radio" name="which" value="src"><strong>source&nbsp;package</strong></label> <label><input type="radio" name="which" value="maint"><strong>maintainer&nbsp;email</strong></label> <label><input type="radio" name="which" value="submitter"><strong>submitter&nbsp;email</strong></label> <label><input type="radio" name="which" value="severity"><strong>severity</strong></label> <label><input type="radio" name="which" value="tag"><strong>tag</strong></label> 
	<br>
	<label>What to search for:<input type="text" name="data" value="" size="50"></label> <input type="submit" value="Find"> 
	<br>
<p>
	Additional settings (which you may leave untouched, the defaults will work): 
<ul>
	<li>
		<small>Flags: <label><input type="radio" name="archive" value="no" checked> active bugs</label> <label><input type="radio" name="archive" value="yes"> archived bugs</label> 
			<br>
			<label><input type="checkbox" name="repeatmerged" value="no"> display merged bugs only once</label> <label><input type="checkbox" name="raw" value="yes"> no ordering by status or severity</label> 
			<br>
			<label><input type="checkbox" name="show_list_header" value="no"> don't show table of contents in the header</label> <label><input type="checkbox" name="show_list_footer" value="no"> don't show statistics in the footer</label> </small> 
	<li>
		<small>Reverse order of: <label><input type="checkbox" name="pend-rev" value="yes"> status</label> <label><input type="checkbox" name="sev-rev" value="yes"> severities</label> <label><input type="checkbox" name="bug-rev" value="yes"> bugs</label> </small>
	</li>
	<li>
		<small>Include status: <label><input type="checkbox" name="pend-inc" value="pending">open</label> <label><input type="checkbox" name="pend-inc" value="forwarded">forwarded</label> <label><input type="checkbox" name="pend-inc" value="pending-fixed">pending</label> <label><input type="checkbox" name="pend-inc" value="fixed">fixed</label> <label><input type="checkbox" name="pend-inc" value="done">done</label> </small>
	</li>
	<li>
		<small>Exclude status: <label><input type="checkbox" name="pend-exc" value="pending">open</label> <label><input type="checkbox" name="pend-exc" value="forwarded">forwarded</label> <label><input type="checkbox" name="pend-exc" value="pending-fixed">pending</label> <label><input type="checkbox" name="pend-exc" value="fixed">fixed</label> <label><input type="checkbox" name="pend-exc" value="done">done</label> </small>
	</li>
	<li>
		<small>Include severity: <label><input type="checkbox" name="sev-inc" value="critical">critical</label> <label><input type="checkbox" name="sev-inc" value="grave">grave</label> <label><input type="checkbox" name="sev-inc" value="serious">serious</label> <label><input type="checkbox" name="sev-inc" value="important">important</label> <label><input type="checkbox" name="sev-inc" value="normal">normal</label> <label><input type="checkbox" name="sev-inc" value="minor">minor</label> <label><input type="checkbox" name="sev-inc" value="wishlist">wishlist</label> <label><input type="checkbox" name="sev-inc" value="fixed">fixed</label> </small>
	</li>
	<li>
		<small>Exclude severity: <label><input type="checkbox" name="sev-exc" value="critical">critical</label> <label><input type="checkbox" name="sev-exc" value="grave">grave</label> <label><input type="checkbox" name="sev-exc" value="serious">serious</label> <label><input type="checkbox" name="sev-exc" value="important">important</label> <label><input type="checkbox" name="sev-exc" value="normal">normal</label> <label><input type="checkbox" name="sev-exc" value="minor">minor</label> <label><input type="checkbox" name="sev-exc" value="wishlist">wishlist</label> <label><input type="checkbox" name="sev-exc" value="fixed">fixed</label> </small>
	</li>
	<li>
		<small>Include tag: <label><input type="checkbox" name="include" value="potato">potato</label> <label><input type="checkbox" name="include" value="woody">woody</label> <label><input type="checkbox" name="include" value="sarge">sarge</label> <label><input type="checkbox" name="include" value="sarge-ignore">sarge-ignore</label> <label><input type="checkbox" name="include" value="sid">sid</label> <label><input type="checkbox" name="include" value="experimental">experimental</label> <label><input type="checkbox" name="include" value="confirmed">confirmed</label> <label><input type="checkbox" name="include" value="d-i">d-i</label> <label><input type="checkbox" name="include" value="fixed">fixed</label> <label><input type="checkbox" name="include" value="fixed-in-experimental">fixed-in-experimental</label> <label><input type="checkbox" name="include" value="fixed-upstream">fixed-upstream</label> <label><input type="checkbox" name="include" value="help">help</label> <label><input type="checkbox" name="include" value="l10n">l10n</label> <label><input type="checkbox" name="include" value="moreinfo">moreinfo</label> <label><input type="checkbox" name="include" value="patch">patch</label> <label><input type="checkbox" name="include" value="pending">pending</label> <label><input type="checkbox" name="include" value="security">security</label> <label><input type="checkbox" name="include" value="unreproducible">unreproducible</label> <label><input type="checkbox" name="include" value="upstream">upstream</label> <label><input type="checkbox" name="include" value="wontfix">wontfix</label> <label><input type="checkbox" name="include" value="ipv6">ipv6</label> <label><input type="checkbox" name="include" value="lfs">lfs</label> </small>
	</li>
	<li>
		<small>Exclude tag: <label><input type="checkbox" name="exclude" value="potato">potato</label> <label><input type="checkbox" name="exclude" value="woody">woody</label> <label><input type="checkbox" name="exclude" value="sarge">sarge</label> <label><input type="checkbox" name="exclude" value="sarge-ignore">sarge-ignore</label> <label><input type="checkbox" name="exclude" value="sid">sid</label> <label><input type="checkbox" name="exclude" value="experimental">experimental</label> <label><input type="checkbox" name="exclude" value="confirmed">confirmed</label> <label><input type="checkbox" name="exclude" value="d-i">d-i</label> <label><input type="checkbox" name="exclude" value="fixed">fixed</label> <label><input type="checkbox" name="exclude" value="fixed-in-experimental">fixed-in-experimental</label> <label><input type="checkbox" name="exclude" value="fixed-upstream">fixed-upstream</label> <label><input type="checkbox" name="exclude" value="help">help</label> <label><input type="checkbox" name="exclude" value="l10n">l10n</label> <label><input type="checkbox" name="exclude" value="moreinfo">moreinfo</label> <label><input type="checkbox" name="exclude" value="patch">patch</label> <label><input type="checkbox" name="exclude" value="pending">pending</label> <label><input type="checkbox" name="exclude" value="security">security</label> <label><input type="checkbox" name="exclude" value="unreproducible">unreproducible</label> <label><input type="checkbox" name="exclude" value="upstream">upstream</label> <label><input type="checkbox" name="exclude" value="wontfix">wontfix</label> <label><input type="checkbox" name="exclude" value="ipv6">ipv6</label> <label><input type="checkbox" name="exclude" value="lfs">lfs</label> </small>
	</li>
</ul>
</form>
<p>
The above queries can also be made by visiting URLs of the following forms, respectively: 
<ul>
<li>
	<tt>http://bugs.debian.org/<var>number</var></tt> 
<li>
	<tt>http://bugs.debian.org/mbox:<var>number</var></tt> 
<li>
	<tt>http://bugs.debian.org/<var>package</var></tt> 
<li>
	<tt>http://bugs.debian.org/src:<var>sourcepackage</var></tt> 
<li>
	<tt>http://bugs.debian.org/<var>maintainer@email.address</var></tt> 
<li>
	<tt>http://bugs.debian.org/from:<var>submitter@email.address</var></tt> 
<li>
	<tt>http://bugs.debian.org/severity:<var>severity</var></tt> 
<li>
	<tt>http://bugs.debian.org/tag:<var>tag</var></tt> 
</ul>
<h2>Supplementary information</h2> 
<p>
The current list of <a href="http://bugs.debian.org/release-critical/"> Release Critical Bugs</a>.
</p>
<p>
The current list of <a href="pseudo-packages">pseudo-packages</a> recognized by the Debian bug tracking system.
</p>
<p>
The following bug report indices are available: 
<ul>
<li>
	Packages with <a href="http://bugs.debian.org/cgi-bin/pkgindex.cgi?indexon=pkg">active</a> and <a href="http://bugs.debian.org/cgi-bin/pkgindex.cgi?indexon=pkg&amp;archive=yes">archived</a> bug reports. 
<li>
	Source packages with <a href="http://bugs.debian.org/cgi-bin/pkgindex.cgi?indexon=src">active</a> and <a href="http://bugs.debian.org/cgi-bin/pkgindex.cgi?indexon=src&amp;archive=yes">archived</a> bug reports. 
<li>
	Maintainers of packages with <a href="http://bugs.debian.org/cgi-bin/pkgindex.cgi?indexon=maint">active</a> and <a href="http://bugs.debian.org/cgi-bin/pkgindex.cgi?indexon=maint&amp;archive=yes">archived</a> bug reports. 
<li>
	Submitters of <a href="http://bugs.debian.org/cgi-bin/pkgindex.cgi?indexon=submitter">active</a> and <a href="http://bugs.debian.org/cgi-bin/pkgindex.cgi?indexon=submitter&amp;archive=yes">archived</a> bug reports. 
</ul>
<p>
<strong>Note:</strong> some of the previously available indices of bug reports aren't available due to internal problems with the program that generated them. We apologize for the inconvenience. 
<hr noshade width="100%" size="1">
<address>
Debian BTS administrators &lt;<a href="mailto:owner@bugs.debian.org">owner@bugs.debian.org</a>&gt; 
<p>
	Debian bug tracking system
	<br>
	Copyright &copy; 1999 Darren O. Benham, 1997, 2003 nCipher Corporation Ltd, 1994-1997 Ian Jackson.
</p>
</address>
<p>
<a href="../index.php">Back Home</a> - <a href="download/index.php">Download</a> 
</p>
<?
include "footer.inc";
?>
