<?
  include("header.inc");
  include("bro.php");
  include("analyze.php");
  include("strings.php");
  include("parsetime.php");
  
  // get sort
  if (isset($_POST["sort"])) $sort = $_POST["sort"];
  else if (isset($_GET["sort"])) $sort = $_GET["sort"];
  else $sort = 0;
  
  if (isset($_GET["filter"]) && ($_GET["filter"] == (int)$_GET["filter"])) $filter = $_GET["filter"]; 
  else if (isset($_POST["filter"]) && ($_POST["filter"] == (int)$_POST["filter"])) $filter = $_POST["filter"];
  else $filter = 0;
  
  // check type
  if ($sort != (int)$sort) $sort = 0;
  
  $conn = db_connect();
  
  $countries = get_countries_stats($conn,$from,$to,$sort,$filter);
  
  $count = count($countries);
  $total_users = 0;
  $total_views = 0;
  $max_users = 0;
  $max_views = 0;

  for ($i = 0; $i < $count; $i++) {
    $total_users += $countries[$i]["users"];
    $total_views += $countries[$i]["views"];
    $max_users = max($countries[$i]["users"],$max_users);
    $max_views = max($countries[$i]["views"],$max_views);
  }

  echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">\n";
  echo "<html>\n";
  echo "<head>\n";
  echo "<title>phpWebStats</title>\n";
  echo "<link href=\"style.css\" rel=\"stylesheet\" type=\"text/css\">\n";
  echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=$codepage\">\n";
  echo "</head>\n";
  echo "<body>\n";
  
  include("menu.php");
  
  echo "<table border=\"0\" cellspacing=\"0\" width=\"730\" cellpadding=\"2\" align=\"center\">\n";
  echo "<tr><td><h1>$string003</h1></td><td align=\"right\">\n";
  
  echo "<form action=\"countries.php\" method=\"post\">\n";

  echo "<b>$string021:</b> <select name=\"filter\">\n";
  if ($filter == 0) echo "<option value=\"0\" SELECTED>$string017</option>\n";
  else echo "<option value=\"0\">$string017</option>\n";
  
  if ($filter == 1) echo "<option value=\"1\" SELECTED>$string016</option>\n";
  else echo "<option value=\"1\">$string016</option>\n";
  
  if ($filter == 2) echo "<option value=\"2\" SELECTED>$string018</option>\n";
  else echo "<option value=\"2\">$string018</option>\n";
  echo "</select>\n";
  
  echo "<b>$string019:</b> <input type=\"text\" size=\"10\" maxlength=\"10\" class=\"smalltext\" name=\"datefrom\" value=\"$datefrom\">\n";
  echo "<input type=\"text\" size=\"5\" class=\"smalltext\" maxlength=\"5\" name=\"timefrom\" value=\"$timefrom\">\n";
  echo "&nbsp;&nbsp;<b>$string020:</b> <input type=\"text\" size=\"10\" maxlength=\"10\" class=\"smalltext\" value=\"$dateto\" name=\"dateto\">\n";
  echo "<input type=\"text\" size=\"5\" class=\"smalltext\" maxlength=\"5\" name=\"timeto\" value=\"$timeto\">\n";
  echo "<input type=\"submit\" class=\"smallsubmit\" value=\"OK\">\n";

  echo "<input type=\"hidden\" name=\"sort\" value=\"$sort\">\n";
  echo "</form>\n";
  
  echo "</td></tr>\n";
  echo "</table>\n";

  echo "<table border=\"0\" cellspacing=\"0\" width=\"730\" cellpadding=\"2\" align=\"center\">\n";
  echo "<tr>\n";
  echo "<td class=\"title\"><a href=\"countries.php?filter=${filter}&amp;sort=0&amp;datefrom=" . urlencode($datefrom) . "&amp;timefrom=" . urlencode($timefrom) . "&amp;dateto=" . urlencode($dateto) . "&amp;timeto=" . urlencode($timeto) . "\">$string014</a></td>\n";
  echo "<td class=\"title\"><a href=\"countries.php?filter=${filter}&amp;sort=1&amp;datefrom=" . urlencode($datefrom) . "&amp;timefrom=" . urlencode($timefrom) . "&amp;dateto=" . urlencode($dateto) . "&amp;timeto=" . urlencode($timeto) . "\">$string011</a></td>\n";
  echo "<td class=\"title\"><a href=\"countries.php?filter=${filter}&amp;sort=2&amp;datefrom=" . urlencode($datefrom) . "&amp;timefrom=" . urlencode($timefrom) . "&amp;dateto=" . urlencode($dateto) . "&amp;timeto=" . urlencode($timeto) . "\">$string012</a></td>\n";
  echo "</tr>\n";
  
  for ($i = 0; $i < $count; $i++) {
    if (($i % 2 == 0) && ($i != $count - 1)) echo "<tr class=\"odd\">\n";
    else if ($i != $count -1) echo "<tr class=\"even\">\n";
    else if ($i % 2 == 0) echo "<tr class=\"odd-last\">\n";
    else echo "<tr class=\"even-last\">\n";
    
    echo "<td class=\"subtitle\" width=\"190\">" . $countries[$i]["name"] . "</td>\n";
    echo "<td class=\"value\" width=\"270\"><img width=\"" . max(round(150 * $countries[$i]["users"]/$max_users,0),1) . "\" height=\"8\" src=\"imgs/blue.gif\"> " . $countries[$i]["users"] . " (" . round($countries[$i]["users"] / $total_users * 100,2) . "%) </td>\n";
    echo "<td class=\"value\" width=\"270\"><img width=\"" . max(round(150 * $countries[$i]["views"]/$max_views,0),1) . "\" height=\"8\" src=\"imgs/red.gif\"> " . $countries[$i]["views"] . " (" . round($countries[$i]["views"] / $total_views * 100,2) . "%) </td>\n";
    echo "</tr>\n";
  }
  echo "<tr><td></td><td></td><td align=\"right\" class=\"value\">$string030" . date("j.n.Y, G:i:s") . "</td></tr>\n";
  echo "</table>\n";
  echo "</body>\n";
  echo "</html>\n";
  
  db_disconnect($conn);
?>
