<?
$title = "Q.F.P. - Mise à jour de Fink";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2006/12/03 06:28:50';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="usage-fink.php?phpLang=fr" title="Installation, Utilisation et Mise à jour de Fink"><link rel="prev" href="mirrors.php?phpLang=fr" title="Miroirs de Fink">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 4. Mise à jour de Fink (Résolution de problèmes spécifiques à une version donnée)</h1>


<a name="gcc-0.16.0">
<div class="question"><p><b><? echo FINK_Q ; ?>4.1: Après passage à la version 0.16.0, fink considère la version du compilateur gcc 3.3 installée sur le système comme obsolète. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> À partir de Panther, Fink a été mis à jour pour fonctionner avec le nouveau compilateur gcc 3.3. Pour pouvoir gérer à la fois 10.2 (Jaguar) et 10.3 (Panther), il faut que tous les utilisateurs installent la dernière mise à jour de gcc 3.3 (mise à jour d'août 2003 pour les utilisateurs de Jaguar, outils XCode de Panther pour les utilisateurs de Panther). Ce message d'alerte apparaîtra si vous avez installé la béta précédente de XCode correspondant aux Developer Tools de décembre 2002 pour Max OS X 10.2. Si vous utilisez 10.2, la commande :</p><pre>gcc --version</pre><p>vous dira quelle version est installée sur votre système. À partir du 24 octobre 2003, il faut avoir le build 1493 ou supérieur.</p><p>Les utilisateurs de 10.2 peuvent télécharger la mise à jour d'août 2003 sur <a href="http://developer.apple.com/">Apple Developer Connection</a> (enregistrement gratuit obligatoire).</p><p>Les utilisateurs de 10.3 doivent installer les outils de développement compatibles avec Panther (c'est-à-dire XCode). Vous devez trouver un CD contenant XCode parmi ceux reçus avec Panther.</p></div>
</a>
<a name="fink-0220">
<div class="question"><p><b><? echo FINK_Q ; ?>4.2: Aucune mise à jour de paquets de Fink n'a eu lieu depuis un moment. Que faire ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> Vérifiez la version de fink avec la commande suivante :</p><pre>fink --version</pre><p>Il existe un problème dans <code>fink-0.22.0</code>, qui fait que la mise à jour par rsync ne fonctionne plus. Pour mettre à jour fink, passez à la mise à jour via CVS avec la commande suivante :</p><pre>fink selfupdate-cvs	</pre><p>Cela vous permettra de passer à une nouvelle version de <code>fink</code>. Une fois cela fait, nous vous recommandons de revenir au mode de mise à jour par rsync avec la commande suivante :</p><pre>fink selfupdate-rsync</pre></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=fr">5. Installation, Utilisation et Mise à jour de Fink</a></p>
<? include_once "../footer.inc"; ?>


