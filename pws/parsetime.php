<?
  if (isset($_POST["datefrom"])) $datefrom = $_POST["datefrom"];
  else if (isset($_GET["datefrom"])) $datefrom = $_GET["datefrom"];
  else $datefrom = "";
  
  if (isset($_POST["dateto"])) $dateto = $_POST["dateto"];
  else if (isset($_GET["dateto"])) $dateto = $_GET["dateto"];
  else $dateto = "";
  
  if (isset($_POST["timefrom"])) $timefrom = $_POST["timefrom"];
  else if (isset($_GET["timefrom"])) $timefrom = $_GET["timefrom"];
  else $timefrom = "";
  
  if (isset($_POST["timeto"])) $timeto = $_POST["timeto"];
  else if (isset($_GET["timeto"])) $timeto = $_GET["timeto"];
  else $timeto = "";

  if ($timefrom) {
    $time_array = explode(":",$timefrom);
    if ((count($time_array) == 2) && ($time_array[0] < 24) && ($time_array[0] >= 0) && ($time_array[1] < 60) && ($time_array[1] >= 0)) {
        $time_from_hour = $time_array[0];
        $time_from_minute = $time_array[1];
    } else {
        $time_from_hour = 0;
        $time_from_minute = 0;
    }
  } else {
    $time_from_hour = 0;
    $time_from_minute = 0;
  }

  if ($timeto) {
    $time_array = explode(":",$timeto);
    if ((count($time_array) == 2) && ($time_array[0] < 24) && ($time_array[0] >= 0) && ($time_array[1] < 60) && ($time_array[1] >= 0)) {
        $time_to_hour = $time_array[0];
        $time_to_minute = $time_array[1];
    } else {
        $time_to_hour = 0;
        $time_to_minute = 0;
    }
  } else {
    $time_to_hour = 23;
    $time_to_minute = 59;
  }

  if ($datefrom) {
    $date_array = explode("/",$datefrom);
    if ((count($date_array) == 3) && checkdate ($date_array[1], $date_array[2], $date_array[0])) {
      $from = mktime ($time_from_hour, $time_from_minute, 0, $date_array[1], $date_array[2], $date_array[0]);
    } else $from = -1;
  } else $from = -1;
  
  if ($dateto) {
    $date_array = explode("/",$dateto);
    if ((count($date_array) == 3) && checkdate ($date_array[1], $date_array[2], $date_array[0])) {
      $to = mktime ($time_to_hour, $time_to_minute, 0, $date_array[1], $date_array[2], $date_array[0]);
    } else $to = -1;
  } else $to = -1;
?>