<?
   // first page in this session ?
   if (isset($_SESSION["visitorid"])) {
      // no, getting the visitor_id from session
      $visitorid = $_SESSION["visitorid"];
   } else {
      // is it a new visitor?
      if (isset($_COOKIE["visitorid"])) {
         // no, getting visitor_id from cookie, saving to session and renewing the cookie (for next 12 hours)
         $visitorid = $_COOKIE["visitorid"];
         $_SESSION["visitorid"] = $visitorid;
         setcookie ("visitorid", $visitorid, time() + 43200);
      } else {
         // yes, it's a new visitor
         // generate a new visitorid, set it to cookie and save it to session
         $visitorid = md5(microtime());
         $_SESSION["visitorid"] = $visitorid;
         setcookie ("visitorid", $visitorid, time() + 43200);
      }
   }
?>