<?
$title = "Q.F.P. - Mise à jour de Fink";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2009/10/25 05:21:38';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="usage-fink.php?phpLang=fr" title="Installation, Utilisation et Mise à jour de Fink"><link rel="prev" href="mirrors.php?phpLang=fr" title="Miroirs de Fink">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 4. Mise à jour de Fink (Résolution de problèmes spécifiques à une version donnée)</h1>


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

<a name="fink-0220">
<div class="question"><p><b><? echo FINK_Q ; ?>4.3: Aucune mise à jour de paquets de Fink n'a eu lieu depuis un moment. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Vérifiez la version de fink avec la commande suivante :</p><pre>fink --version</pre><p>Il existe un problème dans <code>fink-0.22.0</code>, qui fait que la mise à jour par rsync ne fonctionne plus. Pour mettre à jour fink, passez à la mise à jour via CVS avec la commande suivante :</p><pre>fink selfupdate-cvs	</pre><p>Cela vous permettra de passer à une nouvelle version de <code>fink</code>. Une fois cela fait, nous vous recommandons de revenir au mode de mise à jour par rsync avec la commande suivante :</p><pre>fink selfupdate-rsync</pre></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=fr">5. Installation, Utilisation et Mise à jour de Fink</a></p>
<? include_once "../footer.inc"; ?>


