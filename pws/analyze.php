<?
/* retrieves number of unique visitors */
function get_unique_users($connection) {  
   $sql = "SELECT count(DISTINCT stats_visitor_id) as count FROM pws_stats";
   
   $result = db_query($sql,$connection);
   $num = 0;
   if ($row = db_fetch_row($result, $connection)) $num = $row["count"];
   
   return $num;
}

/* retrieves number of pageviews */
function get_pageviews($connection) {
   $sql = "SELECT count(stats_pk) FROM pws_stats";
   
   $result = db_query($sql,$connection);
   $num = 0;
   
   if ($row = db_fetch_row($result, $connection)) $num = $row["count(stats_pk)"]; 
   
   return $num;
}

/* get number in days in certain month/year */
function get_number_days($year,$month) {
   $max = 28;
   while (checkdate ($month,$max + 1, 2002)) $max++;
   return $max;
}

/* statistics in certain month */
/*
filter:
  0 - all 
  1 - search engines only (including mail collectors, etc.)
  2 - all except search engines (humans only)
*/
function get_month_stats($connection,$year,$month,$filter = 0) {
   switch ($filter) {
      case 1:
         $where = " AND browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      case 2:
         $where = " AND browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      default:
         $where = "";
         $table = "";
   }
   
   $num_days = get_number_days($year,$month);
   
   $sql = "SELECT DAYOFMONTH(stats_date) AS day, count(DISTINCT stats_visitor_id) AS count_users, count(DISTINCT stats_pk) AS count_views "
       . " FROM pws_stats$table "
       . " WHERE MONTH(stats_date) = '$month' AND YEAR(stats_date) = '$year' ${where} "
       . " GROUP BY DAYOFMONTH(stats_date)";
   
   $days = array();
   $result = db_query($sql,$connection);
   while ($row = db_fetch_row($result,$connection)) {
      $days[$row["day"]]["users"] = $row["count_users"];
      $days[$row["day"]]["views"] = $row["count_views"];
   }
   
   for ($i = 1; $i <= $num_days; $i++) {
      if (! isset($days[$i])) {
         $days[$i]["users"] = 0;
         $days[$i]["views"] = 0;
      }
   }
   
   return $days;
}

/* statistics by hours of a day */
function get_hour_stats($connection, $from = -1, $to = -1, $filter = 0) {
   switch ($filter) {
      case 1:
         $where = " WHERE browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      case 2:
         $where = " WHERE browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      default:
         $where = "";
         $table = "";
   }

   // time interval
   // lower bound
   if (($from != -1) && ($where != "")) $where .= " AND UNIX_TIMESTAMP(stats_date) >= '$from'";
   else if ($from != -1) $where = " WHERE UNIX_TIMESTAMP(stats_date) >= '$from'";
   
   // upper bound
   if (($to != -1) && ($where != "")) $where .= " AND UNIX_TIMESTAMP(stats_date) <= '$to'";
   else if ($to != -1) $where = " WHERE UNIX_TIMESTAMP(stats_date) <= '$to'";
   
   $sql = "SELECT HOUR(stats_date) AS hour, count(DISTINCT stats_visitor_id) AS users, count(DISTINCT stats_pk) AS views "
   . " FROM pws_stats$table "
   . " $where "
   . " GROUP BY HOUR(stats_date)";
   
   $hours = array();
   $result = db_query($sql,$connection);
   while ($row = db_fetch_row($result,$connection)) {
      $hours[$row["hour"]]["users"] = $row["users"];
      $hours[$row["hour"]]["views"] = $row["views"];
   }
   
   for ($i = 0; $i < 24; $i++) {
      if (! isset($hours[$i])) {
         $hours[$i]["users"] = 0;
         $hours[$i]["views"] = 0;
      }
   }
   
   return $hours;
}

function get_countries_stats($connection,$from = -1,$to = -1, $sort = 0, $filter = 0) {
   switch ($filter) {
      case 1:
         $where = " AND browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      case 2:
         $where = " AND browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      default:
         $where = "";
         $table = "";
   }

   // time interval
   // lower bound
   if ($from != -1) $condition = " AND UNIX_TIMESTAMP(stats_date) >= '$from'";
   else $condition = "";
   
   // upper bound
   if ($to != -1) $condition .= " AND UNIX_TIMESTAMP(stats_date) <= '$to'";
   
   // sorting
   switch ($sort) {
      case 1:
         $sort = " ORDER BY users DESC, views DESC, country_name ASC ";
         break;
      case 2:
         $sort = " ORDER BY views DESC, users DESC, country_name ASC ";
         break;
      default:
         $sort = " ORDER BY country_name ASC, users DESC, views DESC ";
   }

   $sql = "SELECT count(stats_pk) as views, count(DISTINCT stats_visitor_id) as users, pws_country.country_name "
       . " FROM pws_stats,pws_country$table "
       . " WHERE pws_stats.country_pk = pws_country.country_pk $condition "
       . " $where " // filtering
       . " GROUP BY pws_stats.country_pk " // grouping
       . " $sort"; // sorting
   $result = db_query($sql,$connection);
   
   $countries = array();
   while ($row = db_fetch_row($result,$connection)) {
      $country["name"] = $row["country_name"];
      $country["users"] = $row["users"];
      $country["views"] = $row["views"];
      $countries[] = $country;
   }
   
   return $countries;
}

function get_pages_stats($connection, $from = -1, $to = -1, $sort = 0, $filter = 0) {
   switch ($filter) {
      case 1:
         $where = " WHERE browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      case 2:
         $where = " WHERE browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      default:
         $where = "";
         $table = "";
   }
   
   // time interval
   // lower bound
   if (($from != -1) && ($where != "")) $where .= " AND UNIX_TIMESTAMP(stats_date) >= '$from'";
   else if ($from != -1) $where = " WHERE UNIX_TIMESTAMP(stats_date) >= '$from'";
   
   // upper bound
   if (($to != -1) && ($where != "")) $where .= " AND UNIX_TIMESTAMP(stats_date) <= '$to'";
   else if ($to  !=  -1) $where = " WHERE UNIX_TIMESTAMP(stats_date) <= '$to'";
   
   // sorting
   switch ($sort) {
      case 1:
         $sort = " ORDER BY users DESC, views DESC, stats_page_id ASC ";
         break;
      case 2:
         $sort = " ORDER BY views DESC, users DESC, stats_page_id  ASC ";
         break;
      default:
         $sort = " ORDER BY stats_page_id ASC, users DESC, views DESC ";
   }

   $sql = "SELECT stats_page_id,count(stats_pk) as views,count(DISTINCT stats_visitor_id) as users "
       . " FROM pws_stats$table "
       . $where
       . " GROUP BY pws_stats.stats_page_id "
       . $sort;
   $result = db_query($sql,$connection);
   
   $pages = array();
   while ($row = db_fetch_row($result,$connection)) {
      $page["name"] = $row["stats_page_id"];
      $page["views"] = $row["views"];
      $page["users"] = $row["users"];
      $pages[] = $page;
   }
   
   return $pages;
}

function get_language_stats($connection, $from = -1, $to = -1, $sort = 0, $filter = 0) {
   switch ($filter) {
      case 1:
         $where = " AND browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      case 2:
         $where = " AND browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      default:
         $where = "";
         $table = "";
   }

   // time interval
   // lower bound
   if ($from != -1) $where .= " AND UNIX_TIMESTAMP(stats_date) >= '$from'";
   
   // upper bound
   if ($to != -1) $where .= " AND UNIX_TIMESTAMP(stats_date) <= '$to'";
   
   // sorting
   switch ($sort) {
      case 1:
         $sort = " ORDER BY users DESC, views DESC, lang_name ASC ";
         break;
      case 2:
         $sort = " ORDER BY views DESC, users DESC, lang_name ASC ";
         break;
      default:
         $sort = " ORDER BY lang_name ASC, users DESC, views DESC ";
   }

   $sql = "SELECT lang_name,count(stats_pk) AS views,count(DISTINCT stats_page_id) as users "
       . " FROM pws_stats,pws_lang$table "
       . " WHERE pws_stats.lang_pk = pws_lang.lang_pk "
       . $where
       . " GROUP BY pws_stats.lang_pk "
       . $sort;

   $result = db_query($sql,$connection);
   
   $langs = array();
   while ($row = db_fetch_row($result,$connection)) {
      $lang["name"] = $row["lang_name"];
      $lang["views"] = $row["views"];
      $lang["users"] = $row["users"];
      $langs[] = $lang;
   }
     
   return $langs;
}

/*
0 - sort by browser name (and all values different from 0,1,2)
1 - sort by number of unique visitors
2 - sort by number of pageviews
*/
function get_browser_stats($connection,$detail = false, $from = -1, $to = -1, $sort = 0, $filter = 0) {
   switch ($filter) {
      case 1:
         $where = " AND browser_search = 'Y' ";
         break;
      case 2:
         $where = " AND browser_search = 'N' ";
         break;
      default:
         $where = "";
   }

   // time interval 
   // - lower bound
   if ($from != -1) $c = " AND UNIX_TIMESTAMP(stats_date) >= '$from'";
   else $c = "";
   
   // - upper bound
   if ($to != -1) $c .= " AND UNIX_TIMESTAMP(stats_date) <= '$to'";
   
   // sorting
   switch ($sort) {
      case 1:
         $sort = " ORDER BY users DESC, views DESC, browser_name ASC, stats_bmajorv ASC ";
         break;
      case 2:
         $sort = " ORDER BY views DESC, users DESC, browser_name ASC, stats_bmajorv ASC ";
         break;
      default:
         $sort = " ORDER BY browser_name ASC, stats_bmajorv ASC, users DESC, views DESC ";
   }
   
   if ($detail) $condition = ",stats_bmajorv";
   else $condition = "";
   
   $sql = "SELECT browser_name, stats_pk, stats_bmajorv, count(stats_pk) as views, count(DISTINCT stats_visitor_id) as users, browser_url as url "
       . " FROM pws_stats,pws_browser "
       . " WHERE pws_stats.browser_pk = pws_browser.browser_pk "
       . " $c " // time interval
       . " $where " // filtering
       . " GROUP BY upper(browser_name)$condition " // detail?
       . " $sort"; // sorting options
   
   $result = db_query($sql,$connection);
   
   $browsers = array();
   while ($row = db_fetch_row($result,$connection)) {
      $browser["name"] = $row["browser_name"];
      if ($detail) $browser["version"] = $row["stats_bmajorv"];
      $browser["views"] = $row["views"];
      $browser["users"] = $row["users"];
      $browser["url"] = $row["url"];
      $browsers[] = $browser;
   }
   
   return $browsers;
}
/*
function get_ip_stats($connection, $resolve = true) {
   $sql = "SELECT apples10ip____,count(apples10pk____) AS count,count(DISTINCT apples10userid) AS users FROM apples10 GROUP BY apples10ip____";
   $result = db_query($sql,$connection);
   
   $ips = array();
   while ($row = db_fetch_row($result,$connection)) {
      $ip["ip"] = $row["apples10ip____"];
      $ip["host"] = gethostbyaddr($ip["ip"]);
      $ip["count"] = $row["count"];
      $ip["unique"] = $row["users"];
      $ips[] = $ip;
   }
  
   return $ips;
}
*/

function get_os_stats($connection,$from = -1,$to = -1, $sort = 0, $filter = 0) {
   switch ($filter) {
      case 1:
         $where = " AND browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      case 2:
         $where = " AND browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      default:
         $where = "";
         $table = "";
   }

   // time interval
   // lower bound
   if ($from != -1) $where .= " AND UNIX_TIMESTAMP(stats_date) >= '$from'";
   // upper bound
   if ($to != -1)   $where .= " AND UNIX_TIMESTAMP(stats_date) <= '$to'";

   // sorting
   switch ($sort) {
      case 1:
         $sort = " ORDER BY users DESC, views DESC, os_name ASC, os_version ASC ";
         break;
      case 2:
         $sort = " ORDER BY views DESC, users DESC, os_name ASC, os_version ASC ";
         break;
      default:
         $sort = " ORDER BY os_name ASC, os_version ASC, users DESC, views DESC ";
   }
   
   $sql = "SELECT os_name,os_version,count(DISTINCT stats_visitor_id) AS users,count(stats_pk) AS views,os_url as url "
       . " FROM pws_stats,pws_os$table "
       . " WHERE pws_stats.os_pk = pws_os.os_pk "
       . $where
       . " GROUP BY pws_os.os_pk "
       . $sort;
   $result = db_query($sql,$connection);
   
   $oss = array();
   while ($row = db_fetch_row($result,$connection)) {
      $os["name"]   = $row["os_name"] . " " . $row["os_version"];
      $os["views"]  = $row["views"];
      $os["users"] = $row["users"];
      $os["url"] = $row["url"];
      $oss[] = $os;
   }
   
   return $oss;
}

function get_arch_stats($connection,$from = -1,$to = -1, $sort = 0, $filter = 0) {
   switch ($filter) {
      case 1:
         $where = " AND browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      case 2:
         $where = " AND browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         $table = ",pws_browser";
         break;
      default:
         $where = "";
         $table = "";
   }

   // time interval
   // lower bound
   if ($from != -1) $condition = " AND UNIX_TIMESTAMP(stats_date) >= '$from'";
   else $condition = "";
   
   // upper bound
   if ($to != -1) $condition .= " AND UNIX_TIMESTAMP(stats_date) <= '$to'";
   
   // sorting
   switch ($sort) {
      case 1:
         $sort = " ORDER BY users DESC, views DESC, arch_name ASC ";
         break;
      case 2:
         $sort = " ORDER BY views DESC, users DESC, arch_name ASC ";
         break;
      default:
         $sort = " ORDER BY arch_name ASC, users DESC, views DESC ";
   }
   
   $sql = "SELECT arch_name,count(DISTINCT stats_visitor_id) AS users,count(stats_pk) AS views "
       . " FROM pws_stats,pws_arch$table "
       . " WHERE pws_stats.arch_pk = pws_arch.arch_pk $condition "
       . " $where "
       . " GROUP BY pws_arch.arch_pk "
       . " $sort";
   
   $result = db_query($sql,$connection);
   
   $archs = array();
   while ($row = db_fetch_row($result,$connection)) {
      $arch["name"]   = $row["arch_name"];
      $arch["views"]  = $row["views"];
      $arch["users"] = $row["users"];
      $archs[] = $arch;
   }
   
   return $archs;
}


function get_week_stats($connection) {
   $sql = "SELECT WEEKDAY(stats_date) AS weekday,count(stats_pk) AS count,count(DISTINCT stats_visitor_id) as users FROM pws_stats GROUP BY WEEKDAY(stats_date)";
   
   $days = array();
   $result = db_query($sql,$connection);
   while ($row = db_fetch_row($result,$connection)) {
      $days[$row["weekday"]]["count"] = $row["count"];
      $days[$row["weekday"]]["unique"] = $row["users"];
   }
   
   for ($i = 0; $i < 7; $i++) if (! isset($days[$i])) {
      $days[$i]["count"] = 0;
      $days[$i]["unique"] = 0;
   }
   
   return $days;
}

function get_months($connection) {
   $sql = "SELECT DISTINCT YEAR(stats_date) as year, MONTH(stats_date) as month FROM pws_stats";
   
   $months = array();
   $result = db_query($sql,$connection);
   while ($row = db_fetch_row($result,$connection)) {
      $month["month"] = $row["month"];
      $month["year"]  = $row["year"];
      $months[] = $month;
   }

   return $months;
}

function get_day_stats($connection, $day, $month, $year, $filter = 0) {
   switch ($filter) {
      case 1:
         $table = ",pws_browser ";
         $where = " AND browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         break;
      case 2:
         $table = ",pws_browser ";
         $where = " AND browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         break;
      default:
         $table = "";
         $where = "";
   }
   
  $sql = "SELECT HOUR(stats_date) as hour, count(stats_pk) as views, count(DISTINCT stats_visitor_id) as users "
      . " FROM pws_stats $table "
      . " WHERE DAYOFMONTH(stats_date) = '$day' "
      . " AND   MONTH(stats_date) = '$month' "
      . " AND   YEAR(stats_date) = '$year' "
      . " $where "
      . " GROUP BY HOUR(stats_date) ";
  
  $result = db_query($sql,$connection);
  
  $day = array();
  while ($row = db_fetch_row($result,$connection)) {
    $day[$row["hour"]]["views"] = $row["views"];
    $day[$row["hour"]]["users"] = $row["users"];
  }

  for ($i = 0; $i < 24; $i++) {
    if (!isset($day[$i])) {
      $day[$i]["views"] = 0;
      $day[$i]["users"] = 0;
    }
  }

  return $day;
}

function get_referer_stats($connection, $from, $to, $detail = false, $sort = 0, $filter = 0) {
   switch ($filter) {
      case 1:
         $table = ",pws_browser ";
         $where = " WHERE browser_search = 'Y' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         break;
      case 2:
         $table = ",pws_browser ";
         $where = " WHERE browser_search = 'N' AND pws_stats.browser_pk = pws_browser.browser_pk ";
         break;
      default:
         $table = "";
         $where = "";
   }

   switch ($sort) {
      case 1:
         $sort = " ORDER BY users DESC ";
         break;
      case 2:
         $sort = " ORDER BY views DESC ";
         break;
      default:
         $sort = " ORDER BY domain ASC ";
         break;
   }

   if (($from != -1) && ($where != "")) $where .= " AND UNIX_TIMESTAMP(stats_date) > '$from' ";
   else if ($from != -1) $where = " WHERE UNIX_TIMESTAMP(stats_date) > '$from' ";
   
   if (($to != -1) && ($where != "")) $where .= " AND UNIX_TIMESTAMP(stats_date) < '$to' ";
   else if ($to != -1) $where = " WHERE UNIX_TIMESTAMP(stats_date) < '$to' ";

   $sql = "SELECT count(stats_pk) as views, count(DISTINCT stats_visitor_id) as users, "
       . " CASE "
       . "    WHEN stats_referer = '$referer' THEN 'empty' "
       . "    WHEN locate('/',substring(stats_referer,8,length(stats_referer) - 7)) = 0 THEN substring(stats_referer,8,length(stats_referer) - 7) "
       . "    ELSE substring(substring(stats_referer,8,length(stats_referer) - 7),1,locate('/',substring(stats_referer,8,length(stats_referer) - 7)) - 1) "
       . " END AS domain "
       . " FROM pws_stats$table "
       . $where
       . " GROUP BY domain "
       // . " ORDER BY users DESC, views DESC "
       . $sort;
       
   $result = db_query($sql,$connection);
   
   $referers = array();
   while ($row = db_fetch_row($result,$connection)) {
      $referer["name"]  = $row["domain"];
      $referer["users"] = $row["users"];
      $referer["views"] = $row["views"];
      $referers[] = $referer;
   }

   return $referers;
// select count(stats_pk) as views,count(DISTINCT stats_visitor_id) as users, substring(substring(stats_referer,8,length(stats_referer) - 7),1,locate("/",substring(stats_referer,8,length(stats_referer) - 7)) - 1) as ref from pws_stats group by ref order by users DESC, views DESC
}

function get_referer_detail($connection, $from, $to, $referer, $sort = 0) {
  switch ($sort) {
    case 1: 
      $sort = " ORDER BY users DESC, users DESC, stats_referer ASC ";
      break;
    case 2:
      $sort = " ORDER BY views DESC, users DESC, stats_referer ASC ";
      break;
    default:
      $sort = " ORDER BY stats_referer ASC, users DESC, views DESC ";
  }

  $where = "";
  if ($from != -1) $where  = " AND UNIX_TIMESTAMP(stats_date) > '$from' ";
  if ($to   != -1) $where .= " AND UNIX_TIMESTAMP(stats_date) < '$to' ";

  if ($referer != "") {
   $sql = "SELECT COUNT(stats_pk) AS views, COUNT(DISTINCT stats_visitor_id) AS users,  "
        . " CASE "
        . " WHEN locate('PHPSESSID',stats_referer) THEN substring(stats_referer,1,locate('PHPSESSID',stats_referer) - 2) "
        . " ELSE stats_referer "
        . " END as referer "
        . " FROM pws_stats "
        . " WHERE ( stats_referer REGEXP '$referer') "
        . $where
        . " GROUP BY referer "
        . $sort;
   } else {
    $sql = "SELECT COUNT(stats_pk) AS views, COUNT(DISTINCT stats_visitor_id) AS users, stats_referer AS referer"
        . " FROM pws_stats "
        . " WHERE stats_referer = '' "
        . $where
        . " GROUP BY stats_referer "
        . $sort;
   }

   $result = db_query($sql,$connection);
   
   $details = array();
   while ($row = db_fetch_row($result,$connection)) {
      $detail["name"] = $row["referer"];
      $detail["views"]   = $row["views"];
      $detail["users"]   = $row["users"];
      $details[] = $detail;
   }

   return $details;
}

?>