<?
/* index.php */

// set default timezone
date_default_timezone_set('UTC');

// get directory level and calculate path to top
if (!isset($level)) $level = 0;
if (!isset($symlinked)) $symlinked = 0;
$binbase = "";
$relbase = "";
for ($i = 0; $i < $level - $symlinked; $i++) $binbase .= "../";
for ($i = 0; $i < $level; $i++) $relbase .= "../";

// if we're at level 0, define the $excluded array for this directory
if (!$level) 
  $excluded = array("icons", "source", "img");
if (!isset($excluded))
  $excluded = array();

// get relative directory name
if ($level > 1) {
  $parts = explode("/", $_SERVER['SCRIPT_NAME']);
  $dir = join("/", array_slice($parts, -$level, $level))."/";
} else {
  $dir = "";
}

// include header HTML (or PHP)
$dyndate = 1;
include $binbase."header.inc";

// print path to current directory
if ($level > 1) {
  print "<p>Directory: <a href=\"".$relbase."dists\">dists</a>";
  $parts = explode("/", $dir);
  for ($i = 0; $i < $level-2; $i++) {
    print " / <a href=\"";
    for ($j = $i; $j < $level-2; $j++) {
      print "../";
    }
    print "\">".$parts[$i]."</a>";
  }
  print " / <b>".$parts[$level-2]."</b></p>\n";
}

// include additional notes if present
if (file_exists("readme.php")) {
  include "readme.php";
}

// start the table
if (!$headrowcolor) $headrowcolor = "#cccccc";
if (!$rowcolor1) $rowcolor1 = "#ffffff";
if (!$rowcolor2) $rowcolor2 = "#eeeeee";
?>

<table border="0" cellpadding="2" cellspacing="0">
<tr bgcolor="<? print $headrowcolor ?>">
<th>&nbsp;</th>
<th align="left">Name</th>
<th>&nbsp;&nbsp;</th>
<th align="right">Size</th>
<th>&nbsp;&nbsp;</th>
<th align="left">Date</th>
<th>&nbsp;&nbsp;</th>
<th>&nbsp;</th>
</tr>

<?
// function to output a table row
$modulo = 0;
function index_row($icon, $iconalt, $name, $link, $size, $date, $special)
{
  global $rowcolor1, $rowcolor2, $modulo, $relbase;

  if ($modulo)
    print "<tr bgcolor=\"$rowcolor2\">";
  else 
    print "<tr bgcolor=\"$rowcolor1\">";
  $modulo = 1 - $modulo;

  if (!$icon) $icon = "none";
  if (!$iconalt) $iconalt = "???";
  if (!$size) $size = "&nbsp;";
  if (!$date) $date = "&nbsp;";
  if (!$special) $special = "&nbsp;";
  $linkend = "";
  if ($link) {
    $link = "<a href=\"$link\">";
    $linkend = "</a>";
  }
  if (substr($special, 0, 2) == "->") {
    $name = "<i>$name</i>";
  }

  print "<td align=\"center\">$link<img src=\"".$relbase."icons/$icon.gif\" width=\"16\" height=\"16\" border=\"0\" alt=\"[$iconalt]\">$linkend</td><td>$link$name$linkend</td><td>&nbsp;</td><td align=\"right\">$size</td><td>&nbsp;</td><td>$date</td><td>&nbsp;</td><td>$special</td></tr>\n";
}

// link to parent directory
if ($level > 1)
  index_row("", "[up]", "Parent directory", "../", "", "", "");

// read the directory and sort it
$handle = opendir('.');
$files = array();
while ($fn = readdir($handle)) {
  $excludeit = 0;
  foreach ($excluded as $value) {
    if ($fn == $value) {
      $excludeit = 1;
}
  }
  if (substr($fn,0,1) != "." && substr($fn,-4) != ".php"
      && substr($fn,-4) != ".inc" && $fn != "CVS" && !$excludeit)
    $files[] = $fn;
}
closedir($handle);
sort($files);

// more helper functions
function format_size($bytes) {
  if ($bytes <= 0)
    return "empty";
  $bytes /= 1024;
  if ($bytes >= 1024) {
    $bytes /= 1024;
    return sprintf("%.1fM", $bytes);
  } else {
    return sprintf("%.1fK", $bytes);
  }
}

function format_date($secs) {
  return date("d-M-Y H:i", $secs);
}

$filemap = array(
  "README", "txt",
  ".dmg", "dmg",
/*
  ".tar.gz", "tgz",
  ".tgz", "tgz",
  ".tar.bz2", "tgz",
*/
  ".deb", "deb"
);

// print the directory index
foreach ($files as $fn) {
  $rfn = $fn;
  $special = "";
  $type = filetype($rfn);
  if ($type == "link") {
    $rfn = readlink($rfn);
    $type = filetype($rfn);
// to address an issue with nested symlinks, we're going to assume that
// all nested symlinks point to files, not directories
    if ($type == "link") {
      $type = "file";
    }
    $special = "->&nbsp;$rfn";
  }

  if ($type == "file") {
    $icon = "file";
    for ($i = 0; $i < sizeof($filemap); $i += 2) {
      if (substr($fn, -strlen($filemap[$i])) == $filemap[$i]) {
	$icon = $filemap[$i+1];
      }
    }
    index_row($icon, "[$icon]", $fn, $fn, format_size(filesize($rfn)),
              format_date(filemtime($rfn)), $special);
  } elseif ($type == "dir") {
    index_row("dir", "[dir]", $fn."/", $fn."/", "-", "", $special);
  } else {
    index_row("", "[???]", $fn, "", "", "", "unknown file type");
  }
}

// finish the table
?>

<tr bgcolor="<? print $headrowcolor ?>">
<td><img src="<? print $relbase ?>icons/shim.gif" width="24" height="1" border="0" alt=""></td>
<td><img src="<? print $relbase ?>icons/shim.gif" width="200" height="1" border="0" alt=""></td>
<td colspan="6"><img src="<? print $relbase ?>icons/shim.gif" width="1" height="1" border="0" alt=""></td>
</tr>

</table>
<?

// include footer HTML (or PHP)
include $binbase."footer.inc";
?>
