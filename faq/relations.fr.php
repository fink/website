<?
$title = "Q.F.P. - Relations";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/10/14 02:57:26';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Q.F.P. Contents"><link rel="next" href="mirrors.php?phpLang=fr" title="Miroirs de Fink"><link rel="prev" href="general.php?phpLang=fr" title="Questions générales">';


include_once "header.fr.inc";
?>
<h1>Q.F.P. - 2. Relations avec d'autres projets</h1>


<a name="upstream">
<div class="question"><p><b><? echo FINK_Q ; ?>2.1: Envoyez-vous aux mainteneurs situés en amont de vous les rustines que vous faites ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
Nous essayons. Parfois, c'est facile et tout le monde en profite à la prochaine version du paquet. Malheureusement, ce n'est pas toujours si simple avec la plupart des paquets. Quelques problèmes courants :
</p><ul>
<li>Le mainteneur du paquet Fink est très occupé et n'a pas le temps de renvoyer la rustine et des explications détaillées aux mainteneurs situés en amont.</li>
<li>Les mainteneurs situés en amont rejette la rustine. Il peut y avoir de très bonnes raisons à cela. La plupart des mainteneurs situés en amont ont fortement intérêt à conserver un code source pur, des contrôles de configuration clairs et à maintenir la compatibilité avec les autres plates-formes.</li>
<li>Les mainteneurs situés en amont acceptent la rustine, mais cela peut prendre des semaines ou   des mois avant qu'ils ne produisent une nouvelle version de leur paquet.</li>
<li>Le paquet a été abandonné par ses auteurs et il n'existe pas de nouvelle version dans laquelle la rustine peut être intégrée.</li>
</ul></div>
</a>
<a name="debian">
<div class="question"><p><b><? echo FINK_Q ; ?>2.2: Quelles sont vos relations avec le projet Debian ? Portez-vous Debian Linux sur Mac OS X ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
Il n'y a pas de relation officielle entre Fink et <a href="http://www.debian.org">Debian</a>.
Fink <b>n'est pas</b> un port de la distribution Debian GNU/Linux .
Mais, nous avons porté les outils de gestion de paquet de Debian (dpkg, dselect, apt-get) et nous les utilisons ainsi que le format de paquet binaire .deb. Nos paquets sont faits sur mesure pour Mac OS X / Darwin et n'utilise pas le format de paquet source Debian.
</p></div>
</a>
<a name="apple">
<div class="question"><p><b><? echo FINK_Q ; ?>2.3: Quelles sont vos relations avec Apple ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
<a href="http://www.apple.com/">Apple</a> sait que Fink existe et nous a apporté son soutien dans le cadre de ses relations avec les projets Open Source. Durant l'été et l'automne 2001, Apple nous a fourni les sources des pré-versions  de Mac OS X dans l'espoir que les paquets Fink puissent être adaptés à temps pour la version officielle. Citation : <b>"Nous espérons que cela mettra en évidence notre engagement, que d'aucuns mettent en doute. Nous nous affirmerons dans les projets open source au fil du temps."</b>
Merci Apple !
</p></div>
</a>
<a name="openosx">
<div class="question"><p><b><? echo FINK_Q ; ?>2.4: Quelles sont vos relations avec OpenOSX.com ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
Ils ont utilisé Fink pour compiler la première version de leur CD GIMP et refusent de le reconnaître. Lire le <a href="http://fink.sourceforge.net/pr/openosx.php">communiqué officiel</a> pour de plus amples informations.
</p></div>
</a>
<a name="forked">
<div class="question"><p><b><? echo FINK_Q ; ?>2.5: Quelles sont vos relations avec macosx.forked.net ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
Ce site redistribue certains paquets Fink en tant que paquets avec installeur, identiques à ceux de Fink, mais avec leur propres textes, dans lesquels Fink n'est pas mentionné. Lire le <a href="http://fink.sourceforge.net/pr/forked.php">communiqué officiel</a> pour de plus amples informations.
</p></div>
</a>
<a name="darwinports">
<div class="question"><p><b><? echo FINK_Q ; ?>2.6: Quelles sont vos relations avec Darwinports ?</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
Darwinports et Fink sont des projets complémentaires. Certaines parties se recouvrent et plusieurs personnes contribuent à la fois au projet Fink et au projet OpenDarwin. Benjamin Reed, par exemple, fait les paquets KDE pour les deux. Darwinports/OpenDarwin utilise des rustines de Fink, et nous envisageons une collaboration sur un nouveau moteur de dépendances.
</p><p>
OpenDarwin est parti de rien pour tenter une nouvelle approche d'un système de construction de paquets. Lire le communiqué sur <a href="http://www.opendarwin.org/projects/darwinports/en/faq.php">OpenDarwin.org</a> pour de plus amples informations.
</p></div>
</a>
<p align="right"><? echo FINK_NEXT ; ?>:
<a href="mirrors.php?phpLang=fr">3. Miroirs de Fink</a></p>
<? include_once "../footer.inc"; ?>


