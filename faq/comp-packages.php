<?
$title = "F.A.Q. - Compiling (2)";
$cvs_author = 'Author: fingolfin';
$cvs_date = 'Date: 2002/11/02 13:01:12';

$metatags = '<link rel="contents" href="index.php" title="F.A.Q. Contents"><link rel="next" href="usage-general.php" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php" title="Compile Problems - General">';

include "header.inc";
?>

<h1>F.A.Q. - 5 Compile Problems - Specific Packages</h1>



<a name="libgtop"><div class="question"><p><b>Q5.1: libgtop fails to build with errors involving sed.</b></p></div>
<div class="answer"><p><b>A:</b> This can happen if your login script (e.g. <tt><nobr>~/.cshrc</nobr></tt>) does something that writes to the terminal, e.g &quot;<tt><nobr>echo Hello</nobr></tt>&quot; or <tt><nobr>xttitle</nobr></tt>.  To get rid of the problem, the easy solution is to comment out the offending lines.</p><p>If you want to keep the echo, then you can do something like the following:</p><pre>
if ( $?prompt) then
echo Hello
endif
</pre></div></a>

<p align="right">
Next: <a href="usage-general.php">6 Package Usage Problems - General</a></p>


<?
include "footer.inc";
?>

