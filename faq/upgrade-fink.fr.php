<?
$title = "Q.F.P. - Mise à jour de Fink";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/04/13 22:31:06';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="usage-fink.php?phpLang=fr" title="Installer, Utiliser et Entretenir Fink"><link rel="prev" href="mirrors.php?phpLang=fr" title="Miroirs de Fink">';

include_once "header.inc";
?>

<h1>Q.F.P. - 4 Mise à jour de Fink (Résolution de problèmes spécifiques à une version donnée)</h1>
    
    
    <a name="gcc-0.16.0">
      <div class="question"><p><b>Q4.1: Après passage à la version 0.16.0, fink considère la version du compilateur gcc 3.3 installée sur le système comme obsolète. Que faire ?</b></p></div>
      <div class="answer"><p><b>A:</b> À partir de Panther, Fink a été mis à jour pour fonctionner avec le nouveau compilateur gcc 3.3. Pour pouvoir gérer à la fois 10.2 (Jaguar) et 10.3 (Panther), il faut que tous les utilisateurs installent la dernière mise à jour de gcc 3.3 (mise à jour d'août 2003 pour les utilisateurs de Jaguar, outils XCode de Panther pour les utilisateurs de Panther). Ce message d'alerte apparaîtra si vous avez installé la béta précédente de XCode correspondant aux Developer Tools de décembre 2002 pour Max OS X 10.2. Si vous utilisez 10.2, la commande :</p><pre>gcc --version</pre><p>vous dira quelle version est installée sur votre système. À partir du 24 octobre 2003, il faut avoir le build 1493 ou supérieur.</p><p>Les utilisateurs de 10.2 peuvent télécharger la mise à jour d'août 2003 sur <a href="http://developer.apple.com/">Apple Developer Connection</a>
(enregistrement gratuit obligatoire).</p><p>Les utilisateurs de 10.3 doivent installer les outils de développement compatibles avec Panther (c'est-à-dire XCode). Vous devez trouver un CD contenant XCode parmi ceux reçus avec Panther.</p></div>
    </a>
  <p align="right">
Next: <a href="usage-fink.php?phpLang=fr">5 Installer, Utiliser et Entretenir Fink</a></p>

<? include_once "footer.inc"; ?>
