<?

function detect_version($regexp,$user_agent) {
   $version["major"] = "";
   $version["minor"] = "";
   
   if ($regexp != "") {
      $regexp_array = explode("|",$regexp);
      for ($i = 0; $i < count($regexp_array); $i++) {
         // try to find the version
         // the version should be in the form
         $tmp = eregi_replace($regexp_array[$i], "'\\1'", $user_agent);
         // sometging found
         if (substr_count($tmp,"'")) {
            $tmp = substr($tmp,strpos($tmp,"'") + 1, strlen($tmp) - strpos($tmp,"'") - 1);
            $tmp = substr($tmp,0,strpos($tmp,"'"));
            if ($tmp != "") {
               if (substr_count($tmp,".")) {
                  $version["major"] = substr($tmp,0,strpos($tmp,"."));
                  $version["minor"] = substr($tmp,strpos($tmp,".") + 1,strlen($tmp) - strpos($tmp,".") - 1);
               } else {
                  $version["major"] = $tmp;
               }
            }
            
            return $version;
         }
      }
   }
   
   return $version;
}

function detect_browser($connection,$user_agent) {
   $sql = "SELECT browser_pk,browser_name,browser_version_regexp FROM pws_browser WHERE '$user_agent' REGEXP browser_regexp ORDER BY browser_priority DESC LIMIT 0,1";
   
   $result = db_query($sql,$connection);
   if ($row = db_fetch_row($result,$connection)) {
      $browser["key"] = $row["browser_pk"];
      $browser["name"] = $row["browser_name"];
      $regexp = $row["browser_version_regexp"];
      // let's grab tve version
      $version = detect_version($regexp,$user_agent);
      $browser["major"] = $version["major"];
      $browser["minor"] = $version["minor"];
   } else {
      $browser["key"] = 0;
      $browser["name"] = "unknown";
      $browser["major"] = "";
      $browser["minor"] = "";
   }
   
   return $browser;
}

function detect_os($connection,$user_agent) {
   $sql = "SELECT os_pk,os_name,os_version FROM pws_os WHERE  '$user_agent' REGEXP os_regexp ORDER BY os_priority DESC LIMIT 0,1";
   $result = db_query($sql,$connection);
   if ($row = db_fetch_row($result,$connection)) {
      $os["key"] = $row["os_pk"];
      $os["name"] = $row["os_name"];
      $os["version"] = $row["os_version"];
   } else {
      $os["key"] = 0;
      $os["name"] = "unknown";
      $os["version"] = "";
   }
   
   return $os;
}

function detect_arch($connection,$user_agent) {
   $sql = "SELECT arch_pk,arch_name FROM pws_arch WHERE  '$user_agent' REGEXP arch_regexp ORDER BY arch_priority DESC LIMIT 0,1";
   $result = db_query($sql,$connection);
   if ($row = db_fetch_row($result,$connection)) {
      $arch["key"] = $row["arch_pk"];
      $arch["name"] = $row["arch_name"];
   } else {
      $arch["key"] = 0;
      $arch["name"] = "unknown";
   }
   
   return $arch;
}

function detect_country($connection,$ip) {  
   $host = gethostbyaddr ($ip);
   $code = substr($host,strrpos ($host,".") + 1,strlen($host) - strrpos ($host,".") - 1);
   
   $sql = "SELECT country_pk,country_name FROM pws_country WHERE country_code='$code'";
   $result = db_query($sql,$connection);
   if ($row = db_fetch_row($result,$connection)) {
      $country["key"]  = $row["country_pk"];
      $country["name"] = $row["country_name"];
   } else {
      $country["key"]  = 0;
      $country["name"] = "unknown";
   }
   
   return $country;
}

function detect_lang($connection) {
   if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]) && (strlen($_SERVER["HTTP_ACCEPT_LANGUAGE"]) >= 2)) $code = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
   else $code = "";
   
   $sql = "SELECT lang_pk,lang_name FROM pws_lang WHERE lang_code='$code'";
   $result = db_query($sql,$connection);
   if ($row = db_fetch_row($result,$connection)) {
      $lang["key"]  = $row["lang_pk"];
      $lang["name"] = $row["lang_name"];
   } else {
      $lang["key"]  = 0;
      $lang["name"] = "unknown";
   }
   
   return $lang;
}

function log_access($connection,$page_id,$visitor_id) {
   // get ip
   if (isset($_SERVER["REMOTE_ADDR"])) $ip = $_SERVER["REMOTE_ADDR"];
   else $ip = "";
   
   // get ip forward
   if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
   else $forward = "";
   if (substr_count ($forward, ",")) $forward = substr($forward,0,strpos($forward,","));
   
   // get referer
   if (isset($_SERVER["HTTP_REFERER"])) $referer = $_SERVER["HTTP_REFERER"];
   else $referer = "";

   // detect country from ip, if possible   
   $country = detect_country($connection,$ip);

   // detect prefered language, if possible
   $language = detect_lang($connection);
   
   // get the user agent string
   if (isset($_SERVER["HTTP_USER_AGENT"])) $agent = $_SERVER["HTTP_USER_AGENT"];
   else $agent = "";
   
   // do the necessary corrections
   // replace all special chars except "."
   
   $agent = strtr($agent, "/();,_-*!?'\"","            ");
   // remove all double spaces
   while(substr_count ($agent,"  ")) $agent = str_replace ("  ", " ", $agent);
   // turn it into lower case and trim it
   $agent = trim(strtolower($agent));
   
   // detect browser, if possible
   $browser = detect_browser($connection,$agent);
   
   // detect OS, if possible
   $os = detect_os($connection,$agent);
   
   // detect architecture, if possible
   $arch = detect_arch($connection,$agent);
   
   // log the access into the database
   $sql = "INSERT INTO pws_stats(browser_pk,stats_bmajorv,stats_bminorv,os_pk,country_pk,arch_pk,lang_pk,stats_page_id,stats_visitor_id,stats_referer,stats_ip,stats_forward_ip,stats_date) "
        . "VALUES ('" . $browser["key"] . "','" . $browser["major"] . "','" . $browser["minor"] . "','" . $os["key"] . "','" . $country["key"] . "','" . $arch["key"] . "','" . $language["key"] . "','$page_id','$visitor_id','$referer','$ip','$forward','" . date("Y-n-j G:i:s") . "')";
   db_query($sql,$connection);
}

?>