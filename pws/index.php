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

  $conn = db_connect();
  
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
  echo "<tr><td>\n";
?>

<h1>Hello,</h1>
<p>this is phpWebStats interface, that allows you to create and view various information about traffic
on your website. For example you can view following information (if you think something important is missing, send me your request by e-mail - <a href="mailto:dracula007@atlas.cz">dracula007@atlas.cz</a>):</p>

<ul>
<li><b>client's architecture</b> - in fact most visitors won't give you this information, so there'll be many "unknown" items</li>
<li><b>usage of browsers</b> - probably the most interesting information</li>
<li><b>countries</b> - this is the same case as client's architecture, because most visitors won't give you this information</li>
<li><b>hours</b> - visits/pageviews by hours of a day</li>
<li><b>languages</b> - simillar to the countries, but much more efficient (just a small part of visitors won't give you this information) and usable</li>
<li><b>month</b> - traffic by days of a selected month (by clicking on a particular day an information about traffic on that day can be displayed)</li>
<li><b>OS</b> - traffic by different operating systems, another very interesting information</li>
<li><b>pages</b> - traffic by different pages of your site (identified by page ID)</li>
<li><b>referers</b> - from where are the visitors coming (by clicking on a particular domain an information about traffic coming from that domain can be displayed)</li>
</ul>

<h2>Possibilities</h2>
<p>Actually you can customize three options when displaying the data (you can combine these options arbitrarily):</p>

<dl>
<dt>sorting rules</dt>
<dd><p>On most pages you can sort by different column in a table simply by clicking on a column header.</p></dd>

<dt>time interval</dt>
<dd><p><img src="imgs/interval.gif" align="right" hspace="10">On most pages you can select arbitrary time interval (bounded or unbounded), to which the data will be restricted.
That means you can view usage of browsers since 10th october 2001, 21:35 till 15th october 2002, 01:36. Using the form on top of most pages (on some pages - for
example month traffic statistics - this is unreasonable) you can achieve this pretty simply. Simply fill in the form and hit "OK". Three simple rules apply:</p>

<ul>
<li>Empty (from/to) date means no (lower/upper) limit is applied.</li>
<li>If the "from - date" is filled in, and the "from - time" is empty, then value 0:0 is assumed.</li>
<li>If the "to - date" is filled in, and the "to - time" is empty, then value 23:59 is assumed.</li>
</ul>

</dd>

<dt>"search engines" filter</dt>
<dd><p><img src="imgs/filter.gif" align="right" hspace="10">On a page there can often be a heavy traffic caused by search engines. You can be interested in a "human only" traffic,
or you can be interested in a traffic caused by search engines, and phpWebStats gives you a powerful tool to do this. Using the select on top of most pages you can select
which type of traffic ("all","search engines only" or "all except seatch engines") do you want to see.</p></dd>
</dl>


<?
  echo "</td></tr>\n";
  echo "</table>\n";
  
  echo "</body>\n";
  echo "</html>\n";
  
  db_disconnect($conn);
?>
