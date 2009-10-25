<?
$title = "P.M.F. - Upgrading Fink";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2009/10/25 05:21:38';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="P.M.F. Contents"><link rel="next" href="usage-fink.php?phpLang=es" title="Installing, Using and Maintaining Fink"><link rel="prev" href="mirrors.php?phpLang=es" title="Espejos de distribución">';


include_once "header.es.inc";
?>
<h1>P.M.F. - 4. Upgrading Fink (version-specific troubleshooting)</h1>
    
    
    <a name="leopard-bindist1">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.1: Fink doesn't see new packages even after I've run an rsync or cvs selfupdate.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is a current issue for people on OS 10.5 using the binary installer. Check your version:</p><pre>fink --version</pre><p>If you currently have <code>fink-0.27.13-41</code>, which is the version that comes
	with the installer, or <code>fink-0.27.16-41</code>, then there are a couple of options.</p><ul>
	  <li>
	    <b>rsync (preferred):</b>  Run the sequence below
	    <pre>fink selfupdate
fink selfupdate-rsync
fink index -f
fink selfupdate</pre>
	  </li>
	  <li>
	    <b>cvs (alternate):</b>  Run
	    <pre>fink selfupdate-cvs
fink index -f
fink selfupdate</pre>
	  </li>
	</ul><p>Either will bring you the newest <code>fink</code> version.</p></div>
    </a>
    
    <a name="leopard-bindist2">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.2: When I try to install stuff I get 'Can't resolve dependency "fink (&gt;= 0.28.0)"'</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Apply the fix from <a href="#leopard-bindist1">the prior entry.</a></p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=es">5. Installing, Using and Maintaining Fink</a></p>
<? include_once "../footer.inc"; ?>


