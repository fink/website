
  phpWebStats core 0.1b
  http://phpwebstats.sourceforge.net

------------------
 Introduction
------------------
This is the phpWebStats package, which should do basic web traffic
logging and analysis for your site. It's written in PHP and SQL, so all
you need to use it is hosting with PHP and MySQL (at this time the only
SQL database supported by me).

------------------------
 License and disclaimer
------------------------
This program is free software; you can redistribute it and/or modify it
under the terms of the GNU General Public License as published by the
Free Software Foundation; either version 2 of the License, or (at your
option) any later version.

This program is distributed in the hope that it will be useful, but
WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU 
General Public License for more details.

You should have received a copy of the GNU General Public License along
with this program; if not, write to the Free Software Foundation, Inc.,
59 Temple Place, Suite 330, Boston, MA 02111-1307 USA

---------------------
 Install
---------------------
For detailed installation instructions, see the install.txt file.

If you don't have information neccessary to connect to the database
(username, password, etc.) contact you administrator, (not me!).

----------------------
 Usage
----------------------
The basic usage is pretty simple. All you need is to call the "log_access(...)"
function, located in the stats.php file. You should pass three arguments, namely

$connection - connection to the MySQL database
$page_id    - page id, that identifies access to different pages
$visitor_id - visitor id, that identifies access by different visitors

At this time I usually do domething like this at the top od the page:

<?
   session_start();
   include("stats.php");
   include("bro.php");
   
   $conn = db_connect();
   
   // set the page id
   // we could set this variable to "Gallery" for photogallery, etc.
   $page_id = "Homepage";
   
   // set the visitor id
   // I'll set this variable to session id, which is the simpliest way
   // This way I won't be able to get information if the user has been on my
   // page before - the better way is the usage of cookies.
   $visitor_id = session_id();
   
   // and finaly log the access to the database
   log_access($conn,$page_id,$visitor_id);
?>

For more information visit
http://phpwebstats.sourceforge.net