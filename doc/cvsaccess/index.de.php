<?php
$title = "Fink CVS Zugang";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/19 15:21:03';
$metatags = '';


include_once "header.inc";
?>
<h1>CVS Zugang für Fink aufsetzen</h1>
<!--Generated from $Fink: cvs.de.xml,v 1.1 2015/02/19 15:21:03 k-m_schindler Exp $-->
<p>
Fink wird über CVS entwickelt. Dies bedeutet, dass sie zwischen den
Releases aktuell bleiben und die jeweils neuesten Sachen bekommen können.
Diese Seite beschreibt, wie man eine existierende Installation von Fink
aufsetzt, damit man sie mittels CVS aktualisieren kann. Die Informationen
auf dieser Seite gelten für Fink 0.3.x und darüber.
</p>
<h2><a name="">Fink CVS Struktur</a></h2>
<p>
Fink hat mehrere CVS-Module. Das Modul <code>dists</code> (<a href="http://fink.cvs.sourceforge.net/fink/">ViewCVS</a>) enthält die
Paketbeschreibungen und die Korrekturen für OS X 10.2 und darüber. Es
gibt noch weitere Module, die von Fink-Entwicklern benutzt werden und von
jedem eingesehen werden könnnen, aber sie sind für die meisten Nutzer
uninteressant.
</p>
<h2><a name="">Paketbeschreibungen aktualisieren</a></h2>
<p>
In der Vergangenheit war dies eine recht umständliche Prozedur, aber in
der aktuellen Version von Fink ist es sehr einfach. Führen sie einfach
folgendes Kommando aus:
</p>
<pre>fink selfupdate-cvs</pre>
<p>
Fink wird automatisch alle notwendigen Schreitte für die Aktualisierung
ausführen. Dazu gehört das Empfangen der neuesten Paketbeschreibungen
und die Aktualisierung einiger essentieller Kern-Pakete (Darunter auch des
Fink Paket-Managers).
</p>
<p>
Sind sie hinter einer Firewall, lesen sie <a href="/faq/usage-fink.php#proxy">FAQ 3.2</a>.
</p>
<p>
Nachdem die Paketbeschreibungen wie oben beschrieben aktualisiert sind,
werden sie normalerweise die installierten Pakete auf die neueste Version
aktualisieren wollen. Führen sie dazu folgendes Kommando aus:
</p>
<pre>fink update-all</pre>
<h2><a name="">Den Paket-Manager aktualisieren</a></h2>
<p>
<b>Notiz:</b> Ab dem 20. September 2001 ist es nicht mehr notwendig, den
Paket-Manager separat zu aktualisieren. Er wird wie alle anderen Paket
behandelt. Es ist aber immer noch möglich, ihn direkt aus CVS zu
aktualisieren. Dies ist aber auch nur dann interessant, wenn man Paket
erstellt, aber nicht als normaler Nutzer von Fink.
</p>
<p>
Den Paket-Manager muss man über ein separates Verzeichnis aktualisieren
und über das Skript <code>inject.pl</code>. Dieses Skript kopiert die
Paketbeschreibungen und die Tarballs für die Pakete Fink und die
Base-Files in ihren Baum und erstellt die Pakete.
</p>
<p>
Beim ersten Mal muss man ein temporäres Verzeichnis erstellen (im
Beispiel <code>tempdir</code> genannt), das leer ist, bzw. auf keinen Fall
ein Unterverzeichnis 'fink' enthält. Die gesamte Prozedur besteht aus
folgenden Kommandos:'
</p>
<pre>cd tempdir
cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink login
cvs -z3 -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink co fink
cd fink
./inject.pl</pre>
<p>
Das login-Kommando fragt nach einem Passwort. Drücken sie einfach die
Return-Taste. Man kann dieses Verzeichnis nach der Aktualisierung
löschen, aber es ist auch ganz praktisch, es für die nächste
Aktualisierung auf zu heben. Die gesamte Prozedur besteht dann nur noch
aus diesen Kommandos:
</p>
<pre>cd tempdir/fink
cvs -z3 update -d
./inject.pl</pre>

<?php include_once "../../footer.inc"; ?>


