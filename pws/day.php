<?
  include("header.inc");
  include("bro.php");
  include("analyze.php");
  include("strings.php");

  if (isset($_GET["month"]) && ($_GET["month"] == (int)$_GET["month"])) $month = $_GET["month"];
  else if (isset($_POST["month"]) && ($_POST["month"] == (int)$_POST["month"])) $month = $_POST["month"];
  else $month = date("n");
  
  if (isset($_GET["day"]) && ($_GET["day"] == (int)$_GET["day"])) $day = $_GET["day"];
  else if (isset($_POST["day"]) && ($_POST["day"] == (int)$_POST["day"])) $day = $_POST["day"];
  else $day = date("j");
  
  if (isset($_GET["year"]) && ($_GET["year"] == (int)$_GET["year"])) $year = $_GET["year"];
  else if (isset($_POST["year"]) && ($_POST["year"] == (int)$_POST["year"])) $year = $_POST["year"];
  else $year = date("Y");
 
  if (isset($_GET["filter"]) && ($_GET["filter"] == (int)$_GET["filter"])) $filter = $_GET["filter"]; 
  else if (isset($_POST["filter"]) && ($_POST["filter"] == (int)$_POST["filter"])) $filter = $_POST["filter"];
  else $filter = 0;
  
  $conn = db_connect();
  
  $hours = get_day_stats($conn,$day,$month,$year,$filter);
  
  $count = count($hours);
  $total_users = 0;
  $total_views = 0;
  $max_users = 0;
  $max_views = 0;

  for ($i = 0; $i < $count; $i++) {
    $total_users += $hours[$i]["users"];
    $total_views += $hours[$i]["views"];
    $max_users = max($hours[$i]["users"],$max_users);
    $max_views = max($hours[$i]["views"],$max_views);
  }

  $total_users = max($total_users,1);
  $total_views = max($total_views,1);
  
  $max_users = max($max_users,1);
  $max_views = max($max_views,1);

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
  echo "<tr><td><h1>$year/$month/$day</h1></td><td align=\"right\">\n";  
  echo "<form method=\"post\" action=\"day.php\">\n";
  
  echo "<input type=\"hidden\" name=\"day\" value=\"$day\">\n";
  echo "<input type=\"hidden\" name=\"month\" value=\"$month\">\n";
  echo "<input type=\"hidden\" name=\"year\" value=\"$year\">\n";
  
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
  echo "</form>\n";

  echo "</td></tr>\n";
  echo "</table>\n";

  echo "<table border=\"0\" cellspacing=\"0\" width=\"730\" cellpadding=\"2\" align=\"center\">\n";
  echo "<tr class=\"line\"><td></td><td></td><td></td></tr>\n";
  echo "<tr><td class=\"title\">$string015</td><td class=\"title\">$string011</td><td class=\"title\">$string012</td></tr>\n";
  echo "<tr class=\"line\"><td></td><td></td><td></td></tr>\n";
  
  for ($i = 0; $i < $count; $i++) {
    if ($i % 2 == 0) echo "<tr class=\"odd\">\n";
    else echo "<tr class=\"even\">\n";
    
    echo "<td class=\"subtitle\" width=\"30\">$i</td>\n";
    
    echo "<td class=\"value\" width=\"350\"><img width=\"" . max(round(250 * $hours[$i]["users"]/$max_users,0),1) . "\" height=\"8\" src=\"imgs/blue.gif\"> " . $hours[$i]["users"] . " (" . round($hours[$i]["users"] / $total_users * 100,2) . "%) </td>\n";
    echo "<td class=\"value\" width=\"350\"><img width=\"" . max(round(250 * $hours[$i]["views"]/$max_views,0),1) . "\" height=\"8\" src=\"imgs/red.gif\"> " . $hours[$i]["views"] . " (" . round($hours[$i]["views"] / $total_views * 100,2) . "%) </td>\n";
    echo "</tr>\n";
    
    if ($i != $count - 1) echo "<tr class=\"light-line\"><td></td><td></td><td></td></tr>\n";
  }
  echo "<tr class=\"line\"><td></td><td></td><td></td></tr>\n";
  echo "<tr><td></td><td></td><td align=\"right\" class=\"value\">$string030" . date("j.n.Y, G:i:s") . "</td></tr>\n";
  echo "</table>\n";
  echo "</body>\n";
  echo "</html>\n";
  
  db_disconnect($conn);
?>
