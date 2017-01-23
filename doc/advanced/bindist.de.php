<?php
$title = "Fortgeschrittenes - Binärer Distro Server";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/18 23:50:43';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Fortgeschrittenes Contents"><link rel="prev" href="index.php?phpLang=de" title="Fortgeschrittenes Contents">';


include_once "header.de.inc";
?>
<h1>Fortgeschrittenes - 1. Betrieb eines eigenen Servers für eine binäre Distribution</h1>
    
    
    <h2><a name="intro">1.1 Einführung</a></h2>
      
      <p>
Dieser Abschnitt beschreibt eine Methode für Arbeitsgruppen mit mehreren
Fink Installationen, bei der ein zentraler Build-Server (der Master)
benutzt wird, der die binären Pakete an alle Klienten der Gruppe verteilt.
      </p>
      <p>
Die Methode erfordert die folgenden Schritte auf dem
<a href="#master">"Master"-Server</a> und den
<a href="#client">Klienten-Rechnern</a>:
      </p>
    
    <h2><a name="master">1.2 Schritte auf dem "Master"-(Build)-Server</a></h2>
      
      <ol>
        <li>
Installieren sie Fink unter <code>/sw</code> (Der voreingestellte
Basis-Pfad; wenn erforderlich, einen Symlink verwenden).
        </li>
        <li>
Pakete wie üblich erstellen. Sie müssen nicht unbedingt installiert
werden, erstellen reicht aus.
        </li>
        <li>
          <p>
Führen sie das Kommando <code>fink scanpackages</code> aus, wenn sich ihr
Satz an erstellten Paketen geändert hat. Dadurch erstellt Fink die
apt-Indizes für alle eingeschalteten Bäume (trees) neu.
          </p>
          <p>
Alternativ können sie auch das Kommando <code>fink cleanup</code>
ausführen. Dieses entfernt alle obsoleten Quell- und Binär-Pakete. Am Ende
des Entfernens wird auch das Kommando <code>scanpackages</code>
ausgeführt.
          </p>
        </li>
        <li>
Starten sie einen Webserver: z.B. schalten sie "Personal Web Sharing" in
der Kategorie "Freigaben" in den Systemeinstellungen ein. Richten sie
dann httpd ein, dass es ihr Verzeichnis <code>/sw/fink</code> zur
Verfügung stellt, in dem sie folgende Zeilen in der Datei
<code>/etc/httpd/httpd.conf</code> hinzufügen:
          <pre>
Alias /fink /sw/fink
&lt;Directory /sw/fink&gt;
  Options Indexes FollowSymLinks
&lt;/Directory&gt;
          </pre>
        </li>
        <li>
Führen sie dann das Kommando <code>sudo /usr/sbin/apachectl graceful</code> 
aus, um den Webserver (neu) zu starten.
        </li>
      </ol>
      <p>
Bitte denken sie daran, das Kommando <code>fink scanpackages</code> (oder
<code>fink cleanup</code>) immer dann erneut auszuführen, wenn sie Pakete
auf dem "Master"-Server neu erstellt oder aktualisiert haben, damit sie den
Klienten-Rechnern zur Verfügung gestellt werden.
      </p>
      <p>
<b>Notizen:</b>
      </p>
      <p>
Sie sollten auch einen Nutzer 'fink' erstellen und die folgende Zeile in
der Datei <code>/etc/httpd/users/fink.conf</code> hinzufügen.
      </p>
      <p>
Sollten sie das Paket apache2 aus Fink benutzen, müssen sie die Pfade
entsprechend anpassen.
      </p>
    
    <h2><a name="client">1.3 Schritte auf den Klienten-Rechnern</a></h2>
      
      <ol>
        <li>
Installieren sie Fink unter <code>/sw</code> (voreingestellter
Basis-Pfad).
        </li>
        <li>
Führen sie das Kommando <code>fink configure</code> aus und schalten sie
die Option ein, die Pakete aus einer binären Distribution zu beziehen.
("UseBinaryDist: true" in der Datei <code>/sw/etc/fink.conf</code>.)
        </li>
        <li>
Editieren sie die Datei <code>/sw/etc/apt/sources.list</code> und
fügen sie die Zeilen dazu, die ihren Fink-Baum repräsentieren. Wenn zum
Beipsiel die IP-Adresse ihres Build-Servers 192.168.42.7 lautet, müssen sie
folgendes hinzufügen:
          <pre>
deb http://192.168.42.7/fink stable main crypto
deb http://192.168.42.7/fink unstable main crypto
deb http://192.168.42.7/fink local main
          </pre>
        </li>
        <li>
Führen sie das Kommando <code>fink selfupdate</code> aus. Sie sollten
am Ende der Aktualisierung (wenn das "verbose"-Level &gt;= 1 ist)
etwas in der Art sehen:
          <pre>
...
Hit http://192.168.42.7 stable/main Packages
Hit http://192.168.42.7 stable/main Release
Hit http://192.168.42.7 stable/crypto Packages
...
          </pre>
        </li>
      </ol>
      <p>
Führt man das Kommando <code>fink update-all</code> oder <code>fink
install &lt;package&gt;</code> aus, werden alle benötigten Pakete falls
vorhanden in binärer Form vom "Master"-Server bezogen.
      </p>
    
    <h2><a name="remarks">1.4 Bemerkungen</a></h2>
      
      <ul>
        <li>
Ihr "Master"-Server muss die niedrigste Version von X11 benutzen, die auf
einem ihrer Klienten-Rechner installiert ist. Mit anderen Worten: Benutzt
einer ihrer Klienten-Rechner Apples X11, muss auch ihr "Master"-Server
Apples X11 benutzen.
        </li>
        <li>
Will man Platz auf dem Build-Server sparen, kann man alle Pakete
entfernen, die lediglich Build-Abhängigkeiten sind (d.h. sie werden nicht
für das Laufen des Programms benötigt). Das Paket <code>debfoster</code>
ermöglicht dies in schöner Form. Bitte achten sie darauf, keine
essentiellen Pakete wie z. B. <code>apt</code> zu löschen.
        </li>
       </ul>
      <p>
Diese Dokumentation ist teilweise adaptiert von
<a href="http://ranger.befunk.com/blog/archives/000258.html">"Sharing the Fink"</a>
von RangerRick. Vielen Dank!
      </p>
    
  
<?php include_once "../../footer.inc"; ?>


