<?
  include("header.inc");
  include("bro.php");
  include("analyze.php");
  include("strings.php");
  
  if (isset($_POST["month"])) {
     $tmp_arr = explode("-",$_POST["month"]);
     if (count($tmp_arr) == 2) {
        $y  = $tmp_arr[0];
        $m = $tmp_arr[1];
     } else {
        $m = date("n");
        $y  = date("Y");
     }
  } else {
     $m = date("n");
     $y  = date("Y");
  }

  if ($m != (int)$m) $m = date("n");
  if ($y != (int)$y) $y = date("Y");
  
  if (isset($_POST["filter"]) && ($_POST["filter"] == (int)$_POST["filter"])) $filter = $_POST["filter"];
  else $filter = 0;

  $conn = db_connect();
  
  $month = get_month_stats($conn,$y,$m,$filter);
  
  $count = count($month);
  $total_users = 0;
  $total_views = 0;
  $max_users = 1;
  $max_views = 1;

  for ($i = 1; $i <= $count; $i++) {
    $total_users += $month[$i]["users"];
    $total_views += $month[$i]["views"];
    $max_users = max($month[$i]["users"],$max_users);
    $max_views = max($month[$i]["views"],$max_views);
  }

  $total_users = max($total_users,1);
  $total_views = max($total_views,1);

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
  echo "<tr><td><h1>$string006</h1></td><td align=\"right\">\n";
  
  echo "<form method=\"post\" action=\"month.php\">\n";
  
  echo "<b>$string021:</b> <select name=\"filter\">\n";
  if ($filter == 0) echo "<option value=\"0\" SELECTED>$string017</option>\n";
  else echo "<option value=\"0\">$string017</option>\n";
  
  if ($filter == 1) echo "<option value=\"1\" SELECTED>$string016</option>\n";
  else echo "<option value=\"1\">$string016</option>\n";
  
  if ($filter == 2) echo "<option value=\"2\" SELECTED>$string018</option>\n";
  else echo "<option value=\"2\">$string018</option>\n";
  echo "</select>\n";
  
  echo "<select name=\"month\">\n";
  $months = get_months($conn);
  for ($i = 0; $i < count($months); $i++) {
     if (($m == $months[$i]["month"]) && ($y == $months[$i]["year"])) echo "<option selected value=\"" . $months[$i]["year"] . "-" . $months[$i]["month"] . "\">" . $months[$i]["month"] . "/" . $months[$i]["year"] . "</option>\n";
     else echo "<option value=\"" . $months[$i]["year"] . "-" . $months[$i]["month"] . "\">" . $months[$i]["month"] . "/" . $months[$i]["year"] . "</option>\n";
  }
  echo "</select>\n";
  echo "<input type=\"submit\" value=\"OK\" class=\"smallsubmit\">\n";
  echo "</form>\n";
  
  echo "</td></tr>\n";
  echo "</table>\n";

  echo "<table border=\"0\" cellspacing=\"0\" width=\"730\" cellpadding=\"2\" align=\"center\">\n";
  echo "<tr>\n";
  echo "<td class=\"title\">$string023</td>\n";
  echo "<td class=\"title\">$string011</td>\n";
  echo "<td class=\"title\">$string012</td>\n";
  echo "</tr>\n";
  
  for ($i = 1; $i <= $count; $i++) {
    if (($i % 2 == 0) && ($i != $count)) echo "<tr class=\"odd\">\n";
    else if ($i != $count) echo "<tr class=\"even\">\n";
    else if ($i % 2 == 0) echo "<tr class=\"odd-last\">\n";
    else echo "<tr class=\"even-last\">\n";
    
    echo "<td class=\"subtitle\" width=\"30\"><a href=\"day.php?filter=${filter}&amp;year=${y}&amp;month=${m}&amp;day=${i}\">$i</a></td>\n";
    echo "<td class=\"value\" width=\"350\"><img width=\"" . max(round(250 * $month[$i]["users"]/$max_users,0),1) . "\" height=\"8\" src=\"imgs/blue.gif\"> " . $month[$i]["users"] . " (" . round($month[$i]["users"] / $total_users * 100,2) . "%) </td>\n";
    echo "<td class=\"value\" width=\"350\"><img width=\"" . max(round(250 * $month[$i]["views"]/$max_views,0),1) . "\" height=\"8\" src=\"imgs/red.gif\"> " . $month[$i]["views"] . " (" . round($month[$i]["views"] / $total_views * 100,2) . "%) </td>\n";
    echo "</tr>\n";
  }

  echo "<tr><td></td><td></td><td align=\"right\" class=\"value\">$string030" . date("j.n.Y, G:i:s") . "</td></tr>\n";
  echo "</table>\n";
  echo "</body>\n";
  echo "</html>\n";
  
  db_disconnect($conn);
?>
