<?php
$title = "Installation - Zum ersten Mal";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 6:29:59';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Installation Contents"><link rel="next" href="install-up03.php?phpLang=de" title="Fink aktualisieren"><link rel="prev" href="install-fast.php?phpLang=de" title="Schnellanleitung">';


include_once "header.de.inc";
?>
<h1>Installation - 2. Erst-Installation</h1>



<h2><a name="req">2.1 Voraussetzungen</a></h2>
<p>
Sie brauchen:
</p>
<ul>
<li><p>
Ein installiertes Mac OS X, Version 10.9 oder später.
</p></li>
<li><p>
Als nächstes brauchen sie die Xcode Command Line Tools. Dieses Paket wird
installiert, indem man es entweder direkt von developer.apple.com/xcode/ herunter lädt,
oder das Kommando</p>
<pre>xcode-select --install</pre>
<p>ausführt und den Button <b>Install</b> in dem Fenster auswählt, das
aufgemacht wird. Mit diesem Kommando kann man die Tools auch aktualisieren,
insbesondere wenn es Probleme gibt.</p>
<p>Bei einem manuellen Download, achten sie darauf, dass die Tools zur Version
von OS X und Xcode (falls vorhanden) passen.</p>
<p>Sie müssen die Xcode-Lizenz als Administrator akzeptieren. Führen sie
dazu folgendes Kommando aus:</p>
<pre>sudo xcodebuild -license</pre>
<p>blättern sie ans Ende des Texts und geben sie</p>
<pre>agree</pre>
<p>ein.</p>
<p>Einige Pakete erfordern ein vollständige Installation von Xcode.</p>
</li>
<li><p>Java. Geben sie das Kommando</p>
<pre>javac</pre>
<p>in einem Fenster der Terminal.app. Das sollte ausreichen, damit das System
alles herunter lädt.</p></li>
<li><p>
Viele andere Tools kommen mit OS X, beispielsweise perl und curl.
</p></li>
<li><p>
XQuartz to satisfy <code>x11-dev</code> build dependencies. This package can be installed
by downloading it directly via <a href="https://xquartz.org">https://xquartz.org</a>.
</p></li>
<li><p>
Internet-Zugang.
Alle Quellcodes werden von Spiegel-Servern herunter geladen.
</p></li>
<li><p>
Geduld. Das Erstellen von einige großen Paketen braucht Zeit. Das kann Stunden
oder sogar Tage dauern.
</p></li>
</ul>


<h2><a name="directory">2.2 Verzeichnis auswählen</a></h2>
<p>
Vor der Installation müssen sie sich entscheiden, wo das Verzeichnis für Fink
sein soll. Die Empfehlung ist /opt/sw und alle Beispiele in dieser Dokumentation
wird davon ausgehen. Jedes andere Verzeichnis sollte auch in Ordnung sein, so
lange es keine bereits existierendes ist, wie zum Beispiel /usr/local oder gar
/usr. Tatsächlich versucht das Bootstrap-Skript solche Fälle abzufangen.
</p>
<p>
Der Name des Verzeichnis ihrer Wahl sollte keine Leerzeichen oder ähnliche
Buchstaben enthalten. Unix selbst und der Großteil der Unix-Software wurde unter
dieser Prämisse erstellt. Das Bootstrap-Skript mit Sym-Links auszutricksen, wird
einfach nicht funktionieren.
</p>


<h2><a name="install">2.3 Installation</a></h2>
<p>
Als erstes müssen sie den Fink-0.45.6.tar.gz Tarball auspacken
(Wenn sie es mit Safari herunter geladen haben, wird es als
<code>fink-0.45.6.tar</code> dargestellt werden).
Dafür gehen sie in einem Terminal-Fenster in das Verzeichnis, in dem sich der
Tarball befindet und führen folgendes Kommando aus:
</p>
<pre>tar xf fink-0.45.6.tar.gz</pre>
<p>
Das erzeugt ein Verzeichnis mit dem Namen fink-0.45.6. Wechseln sie
in dieses Verzeichnis mit dem Kommando <code>cd fink-0.45.6</code>.
</p>
<p>
Die eigentliche Installation erfolgt durch das Perl-Skript bootstrap. Um die
Installation zu starten, gehen sie in das Verzeichnis fink-0.45.6
und führen sie folgendes Kommando aus:
</p>
<pre>./bootstrap</pre>
<p>
Nach dem einige Test durch gelaufen sind, wird sie das Skript nach der Methode
fragen, um root-Rechte zu erhalten. Die sinnvollste Wahl ist 'sudo'. Auf einer
üblichen Installation von OS X steht sudo für den Nutzer, der bei der
Installation eingerichtet wurde, bereits zur Verfügung. Das Skript wird sofort
die ausgewählte Methode nutzen. Nur so kann die Installation erfolgen.
</p>
<p>
Als nächstes wird das Skript nach dem Installationspfad abfragen. Lesen sie den
Abschnitt „Verzeichnis auswählen“ für weitere Hinweise dazu. Das Skript wird das
Verzeichnis erstellen und für den späteren Bootstrap einrichten.
</p>
<p>
Als nächste erfolgt die Konfiguration von Fink. Der Prozess sollte
selbsterklärend sein. Sie werden gefragt, wie das Konto für den Fink-Nutzer
„build“ erstelt wird. Nutzen sie ein vernetztes System mit einem zentralen
Server für Nutzer und Gruppen, können sie die Parameter manuell auswählen.
Möglicherweise müssen sie sich an ihren Netzwerker-Administrator wenden.
Sie werden erneut nach Proxies gefragt werden. Auch dazu müssen sie sich im
Zweifelsfall an ihren Netzwerk-Administrator wenden. Danach wählen sie die
Spiegelserver für Downloads aus. Wenn sie sich nicht sicher sind, drücken sie
einfach Return und Fink wird eine vernünftige Voreinstellung auswählen.
</p>
<p>
Zu guter Letzt hat das Skript alle Informationen für den Bootstrap-Prozess.
Das heißt, dass Fink einige essentielle Pakete herunter laden, erstellen und
installieren wird.
Machen sie sich keine Sorgen, wenn einige Pakete anscheinend zweimal kompiliert
wird. Das ist notwendig, weil man für das Erstellen eins binären Pakets des
Paketmanagers zuerst den Paketmanager braucht.
</p>
<p>
Anmerkung: Auf 10.8, 10.9 und 10.10 erscheinen nach dem Start des
Installationsprozesses ein Dialogfenster, in dem sie gefragt werden, ob sie
XQuartz installieren wollen. Wenn sie das wollen, dann können sie das beruhigt
tun, denn die Installation von Fink wird dadurch nicht unterbrochen.
</p>
<p>
Nach dem Ende des Bootstrap-Prozesses, führen sie das Kommando
<code>/opt/sw/bin/pathsetup.sh</code> aus. Dieses hilft ihre Shell-Umgebung für
Fink einzurichten. In den meisten Fällen wird es automatisch durchlaufen und sie
einfach nur der Erlaubnis fragen, Änderungen vorzunehmen. Sollte das Skript
in einen Fehler laufen, müssen sie die Umgebung von hand einrichten (siehe
weiter unten).
</p>
<p>
(Wenn sie die Dinge selbst einrichten und csh oder tcsh nutzen, versichern sie
sich, dass das Kommando <code>source /opt/sw/bin/init.csh</code> beim Start der
Shellausgeführt wird, entweder durch .login, .cshrc, .tcshrc oder was sonst auch
immer angemessen ist. Benutzen sie bash oder eine ähnliche Shell, brauchen sie
<code>. /opt/sw/bin/init.sh</code> und legen sie es da ab, wo es ausgeführt wird wie
.bashrc oder .profile.)
</p>
<p>
Sobald ihre Umgebung eingerichtet ist, öffnen sie ein neues Terminal-Fenster,
damit die Änderungen auch wirklich greifen. Jetzt müssen sie mit Fink
Paketbeschreibungen für sie herunter laden.
</p>
<p>
Mit folgendem Befehl
</p>
<pre>fink selfupdate-rsync</pre>
<p>
können sie Paketbeschreibungen mit rsync herunter laden. Das ist die bevorzugte
Option für die meisten Nutzer, denn es ist schnell und es stehen mehrere
Spiegelserver zur Verfügung.
</p>
<p>
Allerdings ist rsync oft von Netzwerk-Administratoren blockiert. Wenn ihre
Firewall rsync nicht erlaubt, können sie cvs für das Herunterladen von
Paketbeschreibungen probieren:
</p>
<pre>fink selfupdate-cvs</pre>
<p>
Wenn sie einen HTTP-Proxy verwenden, wird Fink diese Information an cvs
weitergeben. Anmerkung: Sie können nur anonymes cvs (pserver) über einen Proxy
benutzen.
</p>
<p>
Sie können jetzt <code>fink</code> Kommandos benutzen, um Pakete zu installieren.
</p>
<pre>fink --help</pre>
<p>
ist ein nützliches Kommando für weitere Informationen, wie man <code>fink</code>
benutzt.
</p>


<h2><a name="x11">2.4 X11-Probleme klären</a></h2>
<p>
Fink verwendet virtuelle Pakete, um Abhängigkeiten von X11 zu deklarieren. Ab
OS 10.6 stellt Fink keine eigenen Pakete mehr zur Verfügung. Die Optionen sind:
</p>
<ul>
<li><p>10.9: Nur XQuartz 2.7.4 und später.</p></li>
<li><p>10.10 - 11: Nur XQuartz 2.7.7 und später.</p></li>
</ul>
<p>
Weitere Informationen über die Installation und den Betrieb von X11 gibt es
online bei <a href="/doc/x11/">X11 on Darwin and Mac OS X document</a>.
</p>


<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="install-up03.php?phpLang=de">3. Fink aktualisieren</a></p>
<?php include_once "../../footer.inc"; ?>


