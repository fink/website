<a name="2014-06-04%20fink-0.36.5%20und%20fink-0.37.0%20veröffentlicht.%20Ende%20der%20offiziellen%20Unterstützung%20für%2010.6."><span class="news-date">2014-06-04: </span><span class="news-headline">fink-0.36.5 und fink-0.37.0 veröffentlicht. Ende der offiziellen Unterstützung von 10.6.</span></a><?php gray_line(); ?>
  <p>
	<code>fink-0.37.0</code> und <code>fink-0.37.0</code> wurden am 4.  Juni
	2014 veröffentlicht.  Diese Ausgabe von <code>fink</code> behebt Probleme
	bei der Bestimmung von Java auf 10.6, wenn eine ältere Version des Apple
	Java SDK installiert ist.  <code>fink-0.37.0</code> erkennt offiziell OS
	10.9.3.  Außerdem werden Finks "compiler wrapper" jetzt direkt vom Paket
	"fink" installiert.  Modifikationen werden dadurch einfacher.
  </p>
  <p>
	<code>fink-0.36.5</code> markiert das Ende der Ünterstützung von 10.6
	durch das Fink Projekt.  Nutzer, die Paket-Updates benötigen, sollten den
	Maintainer des jeweiligen Pakets kontaktieren.  Pakete ohne Maintainer
	können auch auf Anfrage aktualisiert werden.
  </p>
 <a name="2014-04-06%20fink-0.36.4%20veröffentlicht"><span class="news-date">2014-04-06: </span><span class="news-headline">fink-0.36.4 veröffentlicht</span></a><?php gray_line(); ?>
  <p>
	<code>fink-0.36.4</code> wurde am 6.  April 2014 veröffentlicht.  Diese
	Ausgabe von <code>fink</code> stellt die Benutzung einer offiziellen
	binären Distribution als Voreinstellung für 10.8 und 10.9 wieder her.
	(Sollten Distributionen für 10.6 und 10.7 erstellt werden, werden auch
	diese unterstützt).  Außerdem wurden mehrere Probleme behoben, die mit
	Xcode 5.1 auf 10.8 und 10.9 eingeführt wurden.  Diese Ausgabe enthält
	auch die offizielle Unterstützung für OS 10.9.2, behebt die
	bootstrap-Prozedur, wenn Xcode.app nicht vorhanden ist und macht x86_64
	zur voreingestellten Architektur für 10.6 bootstraps.
  </p>
	<p>
	Nutzern wird empfohlen <code>fink selfupdate</code> auszuführen, um diese
	Version von fink zu installieren, insbesondere vor dem Hintergrund der
	build-Probleme mit Xcode 5.1.
  </p>
 <a name="2014-04-06%20Probleme%20mit%20rsync"><span class="news-date">2014-04-06: </span><span class="news-headline">Probleme mit rsync</span></a><?php gray_line(); ?>
  <p>
	Es gab Probleme mit dem master rsync server, die bisher nicht behoben
	werden konnten.  Unglücklicherweise betrifft das bis auf zwei auch alle
	anderen Server.  Als vorläufige Abhilfe müssen sie die Datei
	<code>/sw/etc/fink.conf</code> als Administrator editieren und die
	Einstellung für <code>Mirror-rsync</code> zu einer der folgenden
	ändern
  </p>
<pre>
rsync://ber.de.eu.finkmirrors.net/finkinfo/
rsync://hnd.jp.asi.finkmirrors.net/finkinfo/
</pre>
  <p>
	Alternative kann man auch die Update-Methode mit 
  <code>fink selfupdate-cvs</code> wechseln.
  </p>
