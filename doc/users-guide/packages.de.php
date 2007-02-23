<?
$title = "Benutzerhandbuch - Pakete";
$cvs_author = 'Author: rangerrick';
$cvs_date = 'Date: 2007/02/23 22:04:56';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="next" href="upgrade.php?phpLang=de" title="Fink Aktualisieren"><link rel="prev" href="install.php?phpLang=de" title="Erste Installation">';


include_once "header.de.inc";
?>
<h1>Benutzerhandbuch - 3. Pakete Installieren</h1>
    
    
    
      <p>
Jetzt haben Sie etwas, was man Fink-Installation nennen kann. Dieses Kapitel zeigt Ihnen, wie Sie wirklich die Softwarepakete, für welche Sie hier sind, installieren können. Bevor wir erklären können, wie Pakete entweder mit der Source- oder mit der Binary-Distribution installiert werden, einige wichtige Anmerkungen, die für beide zutreffen.
</p>
    
    <h2><a name="bin-dselect">3.1 Binary-Pakete mit dselect Installieren</a></h2>
      
      <p>
<code>dselect</code> ist ein Programm, mit welchem Sie durch eine Liste verfügbarer Pakete blättern können und die auswählen, welche Sie installieren möchten. Es läuft innerhalb des Terminal.app, aber benötigt den ganzen "Bildschirm" und nutzt eine einfache Steuerung über die Tastatur. Wie andere Werkzeuge zur Paketverwaltung benötigt <code>dselect</code> root-Rechte, Sie sollten daher <code>sudo</code> in Verbindung mit einem Admin nutzen:
</p>
      <pre>sudo dselect</pre>
      <p>
        <b>Anmerkung:</b>
<code>dselect</code> hat bekannte Schwierigkeiten mit dem Mac OS X Terminal-Programm. Bevor Sie es verwenden, sollten Sie die folgenden Befehle ausführen oder in die entsprechenden Startup-Dateien schreiben (z.B. <code>.cshrc</code> / <code>.profile</code>):</p>
      <p>tcsh-Nutzer:</p>
      <pre>setenv TERM xterm-color</pre>
      <p>bash-Nutzer:</p>
      <pre>export TERM=xterm-color</pre>
      <p>
Das Hauptmenü hat mehrere Einträge:
</p>
      <ul>
        <li>
          <p>
            <b>[A]ccess</b> - konfiguriert die Methode des Netzwerkzugangs. <b>Sie brauchen es nicht ausführen</b>, da Fink alles für Sie vorkonfiguriert. Im Prinzip sollten Sie diese Funktion sogar vermeiden, da sie die voreingestellte Konfiguration mit einer anderen ersetzen könnte, die unter Umständen nicht funktionieren würde.
</p>
        </li>
        <li>
          <p>
            <b>[U]pdate</b> - lädt die Liste der verfügbaren Pakete vom Fink-Server. Es installiert weder ein Paket noch aktualisiert es vorhandene Pakete - es aktualisiert nur die Liste für den Paketbrowser. Sie müssen diese Funktion mindestens einmal nach der Installation von Fink ausführen.
</p>
        </li>
        <li>
          <p>
            <b>[S]elect</b> - zeigt die eigentliche Paketauflistung an, aus der Sie Pakete aus- und abwählen, welche Sie auf Ihrem System haben wollen. Mehr darüber später.
</p>
        </li>
        <li>
          <p>
            <b>[I]nstall</b> - hinter diesem Menüeintrag ist das eigentliche Vorgehen verborgen. Die oben genannten Einträge betreffen nur die Auflistung und den Status der Datenbank von dselect. Diese Funktion hier besorgt und installiert tatsächlich die Pakete, die Sie angefordert haben. Außerdem entfernt es die Pakete, die Sie im Browser abgewählt haben.
</p>
        </li>
        <li>
          <p>
            <b>[C]onfig</b> und <b>[R]emove</b> - diese sind Reliquien aus der Zeit vor apt. Sie brauchen diese nicht, auch wenn Sie keinen Schaden anrichten.
</p>
        </li>
        <li>
          <p>
            <b>[Q]uit</b> - beendet dselect.
</p>
        </li>
      </ul>
      <p>
Sie werden die meiste Zeit mit dselect im Paketbrowser verbringen, erreichbar über den "[S]elect"-Menüeintrag. Bevor dselect Ihnen die Auflistung der Pakete anzeigt, präsentiert es Ihnen eine einführende Hilfsseite. Sie können 'k' für  eine vollständige Auflistung der Tastaturbefehle oder Return für die Paketliste drücken.
</p>
      <p>
Sie können sich mit den Pfeiltasten nach oben oder nach unten durch die Auflistung bewegen. Das markierte Paket wird mit '+' aus- bzw. mit '-' abgewählt (also installiert oder entfernt). Wenn Sie ein Paket auswählen, das von anderen Paketen abhängt, wird dselect Ihnen eine unterogeordnete Liste mit den betroffenen Paketen anzeigen. In den meisten Fällen können Sie einfach Return drücken, um dselects Auswahl anzunehmen. Sie können in einer solchen untergeordneten Paketliste auch Anpassungen vornehmen (z.B. eine alternative Auswahl für eine virtuelle Paketabhängigkeit wählen) oder mit 'R' (d.h. Shift-R)  zum vorherigen Zustand zurückkehren. Beide, untergeordnete Paketauflistungen und die Hauptauflistung aller Pakete, können Sie mit Return verlassen. Wenn Sie mit Ihrer Auswahl also zufrieden sind, verlassen Sie die Paketauflistung und wählen Sie "[I]nstall" aus dem Hauptmenu, um die Pakete auch tatsächlich zu installieren.
</p>
    
    <h2><a name="bin-apt">3.2 Binary-Pakete mit apt-get Installieren</a></h2>
      
      <p><code>dselect</code> selbst lädt die Pakete nicht herunter. Stattdessen beauftragt es apt, sich die Hände schmutzig zu machen. Wenn Sie ein pures Kommandozeilenwerkzeug bevorzugen, können Sie auf die Funktionen von apt mit dem Befehl <code>apt-get</code> direkt zugreifen.
      </p>
      <p>
Wie bei dselect müssen Sie erst die aktuelle Auflistung der verfügbaren Pakete mit diesem Befehl herunterladen:
</p>
      <pre>sudo apt-get update</pre>
      <p>
Wie bei dem Menüeintrag "[U]pdate" in dselect aktualisiert dies nicht die eigentliche Software auf Ihrem Computer, sondern apts Liste der verfügbaren Pakete. Um ein Paket zu installieren, müssen Sie apt-get nur den Namen geben. Wie hier z.B.:
</p>
      <pre>sudo apt-get install lynx</pre>
      <p>
Falls apt-get feststellt, dass das Paket die Installation anderer Pakete voraussetzt, wird es Ihnen die Auflistung dieser anzeigen und nach Ihrer Bestätigung fragen. Dann lädt und installiert es die angeforderten Pakete. Das Entfernen ist genauso einfach: 
</p>
      <pre>sudo apt-get remove lynx</pre>
      <p>
      </p>
    
    <h2><a name="bin-exceptions">3.3 Paketabhängigkeiten ohne verfügbares Binary-Paket</a></h2>
      
      <p>
Manchmal passiert es, dass Sie bei einer Binary-Installation ein vorausgesetztes Paket ("dependency") nicht installiert werden kann. Z.B.:</p>
      <pre>Sorry, but the following packages have unmet
dependencies:
einpaket: Depends: anderespaket (&gt;= version) but it is
not installable
E: Sorry, broken packages</pre>
      <p>
Was hier passiert ist folgendes: ein Paket, welches Sie versuchen zu installieren, hängt von einem anderen Paket ab, welche aber aus Lizenzgründen nicht in Form eines Binary also vorkompilierten Pakets verbreitet werden darf. Sie müssen das vorausgesetzte Paket ("dependency") von Quellcode installieren, also kompilieren (siehe nächsten Abschnitt).</p>
    
    <h2><a name="src">3.4 Pakete von Quellcode Installieren</a></h2>
      
      <p>
Zu erst benötigen Sie eine geeignete Version der Development Tools für Ihr System. Sie können diese kostenlos nach einer Registration von <a href="http://connect.apple.com">http://connect.apple.com</a> herunterladen.</p>
      <p>
Um eine Liste der verfügbaren Pakete, die vom Quellcode ("from source") installiert werden können, also in der Source-Distribution sind, fragen Sie das  <code>fink</code> tool:</p>
      <pre>fink list</pre>
      <p>
Die erste Spalte listet den Installationszustand an (leer für nicht installiert,  <code>i</code> für installiert, <code>(i)</code> für installiert, aber nicht die aktuellste Version), gefolgt vom Paketname, die aktuelle Version und eine kurze Beschreibung. Sie können nach mehr Informationen über ein spezielles Paket fragen, indem Sie den "describe"-Befehl verwenden ("info" ist ein alias dafür ):</p>
      <pre>fink describe xmms</pre>
      <p>
Sobald Sie ein Paket gefunden haben, welches Sie installieren wollen, benutzen Sie den "install"-Befehl:
</p>
      <pre>fink install wget-ssl</pre>
      <p>
Der <code>fink</code>-Befehl wird erst prüfen, ob alle Grundvoraussetzungen ("dependencies") vorhanden sind, und wird Sie dann fragen, ob Sie damit einverstanden sind, dass diese installiert werden, falls sie noch nicht da sind. Dann beginnt der Installationsprozess: die Quellen werden heruntergeladen, ausgepackt, gepatcht, kompiliert und schlussendlich an die richtige Stelle auf der Festplatt Ihres Computers geschoben. Dieser Vorgang kann eine lange Zeit dauern. Falls währenddessen Fehler auftreten, schauen Sie sich bitte erst die <a href="http://www.finkproject.org/faq/">FAQ</a> an.
</p>
    
    <h2><a name="fink-commander">3.5 Fink Commander</a></h2>
      
<p>Fink Commander ist eine Aqua-Oberfläche für beide Werkzeuge, <code>apt-get</code> und das <code>fink</code>-Tool. Über das Binär-Menü können Sie Aktionen auf die Binary-Distribution erreichen, und das Source-Menü ebenso bloß auf die Source-Distribution.</p>
<p>Der Fink Commander ist bei dem Fink-Binary Installer mit eingeschlossen. Um ihn seperat herunterzuladen (wenn Sie z.B. Fink von Quellcode installiert haben) oder um zusätzliche Informationen zu erhalten, besuchen Sie die <a href="http://finkcommander.sourceforge.net">Fink Commander-Homepage</a>.</p>
    
<h2><a name="available-versions">3.6 Verfügbare Versionen</a></h2>
      
<p>Wenn Sie ein Paket installieren möchten, sollten Sie zuerst die <a href="http://pdb.finkproject.org/pdb/index.php">Paketdatenbank</a> überprüfen und nachsehen, ob es überhaupt via Fink verfügbar ist. Die verfügbare(n) Version(en) des Pakets werden in mehreren Zeilen einer Tabelle angezeigt. Diese sind:</p>
      <ul>
        <li>
          <p>
            <b>0.4.1:</b>  das ist die Version, die als Binary-Paket für OS 10.1 installiert werden kann.</p>
        </li>
        <li>
          <p>
<b>0.8.1:</b> Das ist die Basisversion, die als Binary-Paket für OS 10.2 und 10.3 unter dem aktuellen Fink-Release installiert werden kann. Wenn Sie Fink <a href="upgrade.php?phpLang=de">aktualisieren</a> wollen, kann es eine OS-spezifische, neuere Version geben, die hier nicht gezeigt wird.</p></li>
        <li>
          <p>
            <b>10.2-gcc3.3 stable:</b> Das ist die aktuellste, stabile stable-Version ("stabil"), die von Quellcode für 10.2 mit dem <code>gcc 3.3</code>-Update für die Developer Tools installiert werden kann. Um diese Version zu installieren, ist es nötig, <a href="http://www.finkproject.org/doc/cvsaccess/index.php">CVS</a> oder den rsync-Zugang zu aktivieren. Falls Sie das <code>gcc 3.3</code>-Update nicht angewendet haben, werden Sie womöglich diese Version (oder eventuell sogar das Paket) nicht sehen.</p>
          <p> Anmerkung: In Kontrast zu anderen Projekten, veröffentlicht Fink sowohl die aktuellsten stable-Versionen als auch die unstable-Versionen, die noch testing ("Erprobung") benötigen, via CVS. Die Aktivierung von CVS oder rsync bietet Ihnen den Zugriff auf die neuen stable-Versionen der Pakete, noch bevor diese in der Binary-Distribution aktualisiert sind.
</p>
        </li>
        <li><p><b>10.3 stable:</b>  Das ist die aktuellste Version, die von Quellcode installiert werden unter OS 10.3. Noch einmal: CVS oder rsync wird für den Zugriff auf diese Version benötigt.</p>
</li>
        <li>
          <p>
            <b>10.2-gcc3.3 unstable:</b> Das ist die aktuellste unstable-Version, die von Quellcode unter 10.2 mit <code>gcc 3.3</code> installiert werden kann. Um diese Version zu installieren, folgen Sie den <a href="http://www.finkproject.org/faq/usage-fink.php#unstable">Erklärungen</a> über die Installation der unstable-Pakete.</p>
          <p>Anmerkung:  unstable heißt nicht unbedingt unbenutzbar, allerdings installieren Sie diese Pakete auf eigene Gefahr.</p>
        </li>
        <li><b>10.3 unstable:</b>  Das ist die aktuellste unstable-Version, die von Quellcode unter 10.3 installiert werden kann. Aktivieren Sie den unstable-Baum wie <a href="http://www.finkproject.org/faq/usage-fink.php#unstable">oben</a> erwähnt.</li>
      </ul>
    
    <h2><a name="x11">3.7 Mit X11 Klarkommen</a></h2>
      
      <p>Viele Pakete, die über Fink verfügbar sind, setzen die Installation irgendeiner Form des X11 voraus. Deswegen gehört es typischerweise zu den ersten Schritten, eine X11-Implementation zu wählen.</p>
      <p>
Da es für Mac OS X mehrere X11-Implementationen verfügbar sind (XFree86, Tenon Xtools, eXodus) und es ebenso viele Wege gibt, diese zu installieren (manuell oder via Fink), gibt es verschiedene alternative Pakete - eins für jedes Setup. Fink ist ziemlich schlecht im Raten, welches Sie haben, daher ist es wichtig, bevor Sie X11-Programme installieren, den richtigen X11-Server auszuwählen und zu installieren. Hier ist eine Auflistung der verfügbaren Pakete und die Installationsmethoden:</p>
      <ul>
        <li>
          <p>
            <b>xfree86-base:</b>
(nur 10.1 oder 10.2) Dieses Paket ist DAS Paket. Es installiert eine große Ladung von XFree86 4.2.1.1 als ein Fink-Paket. Für ein Maximum an Flexibilität, beinhaltet dieses Paket nicht den eigentlichen XDarwin-Server. Um diesen zu bekommen, sollten Sie das Paket xfree86-rootless installieren.
</p>
        </li>
        <li>
          <p>
            <b>xfree86:</b>
Das ist ein einzelnes Paket (display server is included), welches XFree86 4.3.0 (nur 10.2) oder 4.3.99 (nur 10.3) installiert. Diese Version ist schneller als 4.2.1.1, aber wurde bisher nicht so viel getestet.
</p>
        </li>
        <li>
          <p>
system-xfree86:
Dieses Paket wird automatisch erstellt (ab Fink 0.6.2), wenn Sie XFree86 manuell, also entweder vom Quellcode oder von der offiziellen (oder inoffiziellen) Binary-Distribution; oder wenn Sie Apples X11 installieren. Es agiert dann als Abhängigkeits-Platzhalter.
</p>
        </li>
        <li>
          <p>
system-xtools:
Installieren Sie dieses Paket, wenn Sie Tenons Xtools installiert haben. Wie system-xfree86 wird es nur eine Überprüfung vornehmen und die eigentlichen Datein unberührt lassen.
</p>
        </li>
      </ul>
      <p>
      Für mehr Informationen über die Installation und die Nutzung von X11, schlagen Sie weiter im <a href="http://www.finkproject.org/doc/x11/">X11 unter Darwin und Mac OS X</a>-Dokument nach.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade.php?phpLang=de">4. Fink Aktualisieren</a></p>
<? include_once "../../footer.inc"; ?>


