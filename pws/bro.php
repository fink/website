<?
$database = $db_name;
$username = $db_user;
$password = $db_passwd;
$host     = $db_host;

// connect the database
function db_connect() {
   global $host;
   global $username;
   global $database;
   global $password;

   // trying to connect to the database to log on
   $connection = @mysql_connect($host,$username,$password);
   // connection not succesful -> log it
   if (! $connection) {
      trigger_error("Error connectiog the database:\nMySQL error num:\t" . mysql_errno() . "\nMySQL error text:\t" . mysql_error(),E_USER_ERROR);
      return 0;
   }
   
   // select the database
   $result = @mysql_select_db($database,$connection);
   // selection not succesful -> log it
   if (! $result) {
      trigger_error("Error selecting the database:\nMySQL error num:\t" . mysql_errno() . "\nMySQL error text:\t" . mysql_error(),E_USER_ERROR);
      return 0;
   }

   // everything is OK, return connection
   return $connection;
}

// disconnect the database
function db_disconnect($connection) {

   // close the connection
   $result = @mysql_close($connection);
   // there was an error during disconnecting
   if (! $result) {
      trigger_error("Pokus o odpojeni od databaze byl neuspesny\nMySQL error num:\t" . mysql_errno() . "\nMySQL error text:\t" . mysql_error(),E_USER_WARNING);
      return;
   }
}

// run a database query
function db_query($sql_query,$connection) {   

   $result = @mysql_query($sql_query,$connection);  
   // an error occured -> log it
   if (! $result) {
        trigger_error("An error occured when running database query\nMySQL error num:\t" . mysql_errno($connection) . "\nMySQL error text:\t" . mysql_error($connection) . "\nSQL query:\t$sql_query",E_USER_ERROR);
       return 0;
    }
    
   return $result;
}

// poèet øádek ve výsledku - pokud dojde k chybì, vrátím nulu
function db_num_rows($result_set,$connection) {
   // ovìøení spojení na databázi
   if (!($connection && $result_set)) {
      trigger_error("Predany parametr neni platne spojeni na databazi.",WARNING);
      return 0;
   }
    
   $num = @mysql_num_rows($result_set);
   
   if (mysql_errno($connection)) {
      trigger_error("Chyba pri zjistovani poctu radku ve vysledku\nMySQL error num:\t" . mysql_errno($connection) . "\nMySQL error text:\t" . mysql_error($connection),E_USER_ERROR);
      return 0;
   }

   return $num;
}

// fetch a row from a result set
function db_fetch_row($result_set,$connection) {   
    // fetch a row
    $row = @mysql_fetch_assoc($result_set);
    // an error occured when fetching
    if (mysql_errno($connection)) {
       trigger_error("An error occured when fetching a row from a result set\nMySQL error num:\t" . mysql_errno($connection) . "\nMySQL error text:\t" . mysql_error($connection),E_USER_ERROR);
      return;
   }

   return $row;
}
?>
