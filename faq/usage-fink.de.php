<?php
$title = "F.A.Q. - Fink Benutzung";
$cvs_author = 'Author: kamischi';
$cvs_date = 'Date: 2015/06/06 19:19:29';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="comp-general.php?phpLang=de" title="Compile Problems - General"><link rel="prev" href="upgrade-fink.php?phpLang=de" title="Fink aktualisieren(versions-spezifische Probleme)">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 5. Fink installieren, benutzen und pflegen</h1>
    
    
    <a name="what-packages">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.1: Wie finde ich heraus, welche Pakete Fink zur Verfügung stellt?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ab der Version 0.2.3 hat Fink das Kommando <code>list</code>. Es
          listet alle Pakete auf, die Fink kennt. Beispiel:</p><pre>fink list</pre><p>Verwenden sie die binäre Distribution, dann erzeugt auch
          <code>dselect</code> eine Liste aller Pakete, die man leicht
          durchzublättern kann. Beachten sie, dass sie es mit
          Administratorrechten (root) ausführen müssen, wenn sie mit dselect
          Pakete installieren wollen.</p><p>Auf der <a href="http://pdb.finkproject.org/pdb/">Webseite</a>
          gibt es auch eine Datenbank aller Pakete.</p></div>
    </a>
    <a name="proxy">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.2: Ich befinde mich hinter einer Firewall. Wie konfiguriere ich Fink,
          dass es einen HTTP-Proxy benutzt?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Das Kommando <code>fink</code> unterstützt explizite
          Proxy-Einstellungen, die an <code>wget</code>/<code>curl</code>
          weiter gereicht werden. Wurde man bei der erstmaligen Installation
          nicht nach Proxies gefragt, kann man das Kommando
          <code>fink configure</code> ausführen, um es einzurichten. Es kann
          jederzeit ausgeführt werden, um die Einstellungen von Fink zu ändern.
          Sind sie der Anleitung für die Installation gefolgt sind und
          <code>/sw/bin/init.csh</code> (oder
          <code>/sw/bin/init.sh</code>) benutzen, dann werden auch
          <code>apt-get</code> und <code>dselect</code> die Proxy-Einstellungen
          nutzen. Beachten sie, dass sie das Protokoll vor die Adresse stellen,
          zum Beispiel:</p><pre>ftp://proxy.yoursite.somewhere</pre><p>Gibt es immer noch Probleme, öffnen sie die Systemeinstellungen,
          wählen sie Netzwerk aus und dort die Proxy-Einstellungen. Dort muss
          die Einstellung "Passiven FTP-Modus (PASV) verwenden" eingeschaltet
          sein.</p></div>
    </a>
    <a name="firewalled-cvs">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.3: Wie aktualisiere ich Pakete mit cvs, wenn ich mich hinter einer
          Firewall befinde?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Das Paket <b>cvs-proxy</b> kann durch HTTP-Proxies tunneln.</p><ul>
          <li>
            <p>Installieren sie das Paket <b>cvs-proxy</b> mit dem
              Kommando:</p>
<pre>fink --use-binary-dist install <b>cvs-proxy</b></pre>
          </li>
          <li>
            <p>Wechseln sie zur Aktualisierung mit CVS mit dem Kommado:</p>
<pre>fink selfupdate-cvs</pre>
          </li>
        </ul><p>Ist Fink nicht konfiguriert, den Proxy zu verwenden, ändern sie die
          Einstellungen mit:</p><pre>fink configure</pre></div>
    </a>
    <a name="moving">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.4: Kann ich Fink nach der Installation an eine andere Stelle
          verschieben?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Nein. Natürlich kann man die Dateien mit dem Kommando mv oder im
          Finder verschieben, aber 99% der Programme werden danach nicht mehr
          funktionieren, weil letztlich alle Unix-Programme mit fest
          eingestellten Pfaden verwenden, um Daten, Bibliotheken und anderes zu
          finden.</p></div>
    </a>
    <a name="moving-symlink">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.5: Funktioniert es, wenn man Fink nach der Installation verschiebt und
          dann einen symbolischen Link von der alten Stelle erzeugt?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Vielleicht. Im allgemeinen sollte es funktionieren, aber es kann
          versteckte FAllen geben.</p></div>
    </a>
    <a name="removing">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.6: Wie kann ich Fink komplett deinstallieren?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fast alle von Fink installierten Dateien sind in
          <code>/sw</code> (oder eben da, wo sie es installiert haben).
          Es gibt nur wenige Ausnahmen. Geben sie folgende Befehle ein:</p><pre>fink remove --recursive daemonic xinitrc
sudo rm -rf /sw</pre><p>Wenn sie nicht vorhaben, Fink erneut zu installieren, sollten sie die
          Zeile "<code>source /sw/bin/init.csh</code>" in ihrer Datei
          <code>.cshrc</code> löschen mit einem Texteditor oder die
          Zeile "<code>source /sw/bin/init.sh</code>" in der Datei
          <code>.bashrc</code>, je nach ihrem Setup.
          Haben sie das Paket <code>xinitrc</code> installiert, sollten sie die
          originale Datei <code>/usr/X11/lib/X11/xinit/xinitrc</code>
          wieder herstellen, die mit dem Namen
          <code>/usr/X11/lib/X11/xinit/xinitrc.YYYYMMDDhhmm</code>
          gesichert wurde (mit Jahr, Monat, Tag, Stunde und Minute als
          Datei-Extension). Gibt es davon mehrere, das Original enthält
          eigentlich nie <code>sys-xinitrc-fink</code>. Haben sie die richtige
          Datei gefunden, können sie mit folgendem Kommando</p><pre>sudo mv /usr/X11/lib/X11/xinit/xinitrc.YYYYMMDDhhmm  \
  /usr/X11/lib/X11/xinit/xinitrc</pre><p>YYMMDDhhmm durch die eigentliche Extension auf ihrem System
          ersetzen.</p></div>
    </a>
    <a name="bindist">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.7: Die Paket-Datenbank der Webseite listet das Paket xxx, aber apt-get
          und dselect kennen es nicht. Wer hat recht?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Beide. Die
          <a href="http://pdb.finkproject.org/pdb/">Paket-Datenbank</a>
          kennt jedes Paket, einschließlich der im "unstable" Baum.
          <code>Dselect</code> und <code>apt-get</code> kennen nur Pakete, die
          als vorübersetzte, binäre Pakete zur Verfügung stehen. Es gibt viele
          Gründe, warum ein Paket so nicht zur Verfügung steht. Es muss im
          "stable" Baum der letzten veröffentlichen Version von Fink sein und es
          muss eine Reihe zusätzlicher Tests bestehen, die das Einhalten von
          Regeln und Restriktionen durch Lizensen und Patente überprüfen.</p><p>Wollen sie ein Paket installieren, das nicht in
          <code>dselect</code> / <code>apt-get</code> zur Verfügung steht, dann
          müssen sie es aus den Quellen mit dem Kommando <code>fink install
          <b>packagename</b></code> erzeugen.
          Bevor sie das versuchen, sollten sie überprüfen, ob die Developer
          Tools installiert sind. (Gibt es keinen Installer für die Developer
          Tools im Ordner <code>/Applications</code>, können sie den Installer
          von der Seite
          <a href="http://connect.apple.com/">Apple Developer Connection</a>
          nach einer kostenlosen Registrierung herunter laden). Schauen sie sich
          auch die nächste Frage über den "unstable" Baum an.</p></div>
    </a>
    <a name="unstable">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.8: Ich möchte ein Paket aus dem "unstable" Baum installieren, aber Fink
          antwortet nur mit 'no package found'. Wie kann ich es installieren?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Informieren sie sich zuerst über die Bedeutung von "unstable". Es
          gibt mehrere Gründe, warum ein Paket nur im "unstable" Baum ist.
          Manchmal gibt es noch bekannte Probleme mit dem Paket, oder einfach
          noch keine Rückmeldungen von Nutzern, dass das Paket funktioniert.
          Deshalb zeigt Fink die Pakete im "unstable" Baum nicht an.</p><p>Aktivieren sie den "unstable" Baum, dann schicken sie bitte eine
          E-Mail an den Autor des Pakets, wenn etwas funktionert oder auch wenn
          nicht. Ihr Rückmeldung entscheidet, ob etwas in den "stable"
          übernommen wird! Informationen über den Autor des Pakets erhalten sie
          mit dem Kommando <code>fink info <b>packagename</b></code>.</p><p>Für <code>fink-0.26</code> und später: Wenn sie das Kommando
          <code>fink configure</code> ausführen, ist eine der Fragen an sie, ob
          der "unstable" Baum eingeschaltet werden soll.</p><p>Bei Fink-Versionen früher als <b>0.26</b> editieren sie die Datei
          <code>/sw/etc/fink.conf</code> und fügen sie
          <code>unstable/main</code> und <code>unstable/crypto</code> in der
          Zeile <code>Trees:</code> ein.</p><p>Im Fink Commander gibt es eine Einstellung Pakete aus dem "unstable"
          Baum zu zu benutzen.</p><p>Keine dieser Optionen lädt die Paketbeschreibungen des "unstable"
          Baums herunter. Sie müssen für das Aktualisieren <code>rsync</code>
          oder <code>cvs</code> einschalten, was bei einer neuen
          Fink-Installation nicht der Fall ist. Die folgenden Kommandos
          führen dies bei einer neuen Fink-Installation aus:</p><pre>fink selfupdate</pre><p>gefolgt von</p><pre>fink selfupdate-rsync</pre><p>oder</p><pre>fink selfupdate-cvs</pre><p>und dann</p><pre>fink index -f
fink scanpackages</pre><p><b>Bemerkung:</b> Für alle Aktionen gibt es entsprechendes im Fink
          Commander außer dem Kommando <code>fink index -f</code>. Dies muss
          also im Terminal eingegeben werden.</p><p>Ist die Aktualisierung mit <code>rsync</code> oder <code>cvs</code>
          bereits eingeschaltet, dann reichen folgende Kommandos (oder das
          entsprechende im Fink Commander):</p><pre>fink selfupdate
fink index
fink scanpackages</pre><p>Sind sie sich nicht sicher, welche Aktualisierungsmethode verwendet
          wird, führen sie das Kommmdo <code>fink --version</code> aus und
          schauen sie nach, ob <code>cvs</code> oder <code>rsync</code> erwähnt
          wird.</p><p>Wollen sie keine Pakete aus dem "unstable" Baum mehr installieren
          wollen, dann nutzen sie den Befehl <code>update-all</code> nicht mehr,
          bis sie den "unstable" Baum wieder ausgeschaltet haben.</p></div>
    </a>
    <a name="unstable-onepackage">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.9: Muss man <b>wirklich</b> alles aus dem "unstable" Baum
          installieren, obwohl ich nur ein Paket möchte?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Nein, auch wenn wir das ausdrücklich empfehlen. Mischen und Anpassen
          kann zu nicht vorhersehbaren Problemen führen, die sehr schwierig zu
          lösen sind, wenn sie auftreten.</p><p>Soweit so gut. Wenn sie also wirklich nur ein oder zwei Pakete aus
          dem "unstable" Baum installieren wollen, müssen sie zuerst die
          Aktualisierung mit <code>fink selfupdate-cvs</code> auf CVS
          umschalten, weil rsync nur die Bäume aktualisiert, die in der Datei
          <code>fink.conf</code> aktiviert sind. Editieren sie die Datei
          <code>/sw/etc/fink.conf</code> und fügen sie
          <code>local/main</code> in der Zeile <code>Trees:</code> ein. Danach
          müssen sie das Kommando <code>fink selfupdate</code>, damit die
          Paketbeschreibungen herunter geladen werden. Dann kopieren sie die
          entsprechenden <code>.info</code> (und zugehörige <code>.patch</code>)
          Dateien aus
          <code>/sw/fink/dists/unstable/main/finkinfo</code> (oder
          <code>/sw/fink/dists/unstable/crypto/finkinfo</code>) nach
          <code>/sw/fink/dists/local/main/finkinfo</code>.
          Denken sie aber daran, dass die Pakete von anderen Paketen (oder
          bestimmten Versionen) abhängen können, die ebenfalls nur im "unstable"
          Baum sind. Dann müssen sie auch diese <code>.info</code> und
          <code>.patch</code> Dateien verschieben. Sind alle Dateien verschoben,
          sollten sie das Kommando <code>fink index</code> ausführen, damit die
          Liste der verfügbaren Pakete aktualisiert wird. Wenn sie wollen,
          können sie danach die Aktualisierung mit
          <code>fink selfupdate-rsync</code> wieder auf rsync umstellen.</p></div>
    </a>
    <a name="sudo">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.10: Ich bin es leid, wieder und wieder für sudo mein Passwort einzugeben.
          Gibt es dafür eine Lösung?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wenn sie nicht paramoid sind, können sie sudo konfigurieren, dass es
          nicht mehr nach dem Passwort fragt. Starten sie dazu als root
          <code>visudo</code> and fügen sie folgende Zeile hinzu:</p><pre>username ALL =(ALL) NOPASSWD: ALL</pre><p>Esetzen sie <code>username</code> mit ihrem tatsächlichen
          Nutzernamen. Mit dieser Zeile können sie jedes Kommando ausführen,
          ohne ihr Passwort einzugeben..</p></div>
    </a>
    <a name="exec-init-csh">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.11: Wenn ich die Dateien init.csh or init.sh ausführe, bekomme ich die
          Fehlermeldung "Permission denied". Was mache ich falsch?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> init.csh und init.sh sollen eigentlich nicht wie normale Skripte
          ausgeführt werden. Sie setzen in ihrer Shell Umgebungsvariablen wie
          PATH und MANPATH. Damit die Änderungen in der Shell bleibend sind,
          müssen sie für csh/tcsh über das Kommando <code>source</code> und für
          bash/zsh über <code>.</code> ausgeführt werden. Das sieht dann so
          aus:</p><p>für csh/tcsh:</p><pre>source /sw/bin/init.csh</pre><p>für bash/zsh:</p><pre>. /sw/bin/init.sh</pre></div>
    </a>
    <a name="dselect-access">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.12: Hilfe! Ich habe den Menue-Eintrag "[A]ccess" in dselect ausgewählt
          und jetzt kann ich keine Pakete mehr herunter laden!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wahrscheinlich haben wurde in apt ein Debian-Spiegelserver
          eingestellt, der aber keine Fink-Dateien kennt. Führen sie das
          Kommando</p><pre>fink configure</pre><p>in einem Terminalfenster aus. Gehen sie durch alle Optionen bis zur
          Auswahl der Spiegelserver. Wählen sie für das
          <b>apt-get repository</b> einen anderen Spiegelserver aus. Gehen sie
          dann noch durch des Rest der Optionen durch, damit die Einstellungen
          gesichert werden.</p></div>
    </a>
    <a name="cvs-busy">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.13: Führe ich das Kommando <q>fink selfupdate</q> oder
          <q>fink selfupdate-cvs</q> aus, erhalte ich die Fehlermeldung
          "<code>Updating using CVS failed. Check the error messages above.</code>"
        </b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ist die Meldung</p><pre>Can't exec "cvs": No such file or directory at
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>müssen sie die Developer Tools installieren.</p><p>Lautet aber die letzte Zeile</p><pre>### execution of su failed, exit code 1</pre><p>müssen sie weiter oben nach dem Fehler suchen. Lautet die Meldung,
          dass ihre Verbindung abgelehnt wurde:</p><pre>(Logging in to anonymous@fink.cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to fink.cvs.sourceforge.net:2401 failed: 
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.</pre><p>oder diese Meldung:</p><pre>cvs [update aborted]: recv() from server fink.cvs.sourceforge.net:
Connection reset by peer 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>oder</p><pre>cvs [update aborted]: End of file received from server</pre><p>oder</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>dann ist der CVS-Server vermutlich überlastet und sie müssen es
          einfach später noch einmal probieren.</p><p>Es kann auch sein, dass die Zugriffsrechte in ihrem CVS-Verzeichnis
          falsch sind. Auch dann bekommen sie "Permission denied" Meldungen:</p><pre>cvs update: in directory 10.2/stable/main:
cvs update: cannot open CVS/Entries for reading: No such file or directory
cvs server: Updating 10.2/stable/main 
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo: 
No such file or directory 
### execution of su failed, exit code 1 Failed: 
Updating using CVS failed. Check the error messages above.</pre><p>In diesem Fall sollten sie die Rechte mit folgendem Kommando zurück
          setzen:</p><pre>sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {}\
; fink selfupdate-cvs</pre><p>Ist es keine dieser Meldungen, bedeutet das fast immer, dass sie
          eine Datei in ihrem /sw/fink/dists Baum geändert haben und jetzt der
          Autor etwas ändern möchte. Suchen sie weiter oben in der Ausgabe nach
          dem Kommando selfupdate-cvs nach Zeilen, die mit "C"
          anfangen, wie z. B.:</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
... (other info and patch files) ... 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>Das "C" bedeutet, dass CVS bei der Aktualisierung auf die
          letzte Version einen Konflikt hat, der so behoben wird. Löschen sie
          jede Datei, die mit "C" in der Ausgabe nach dem Kommando
          <code>selfupdate-cvs</code> aufgelistet wird und versuchen sie es
          erneut:</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre><p>Bei Fehlermeldungen mit <b>cvs.sourceforge.net</b>:</p><pre>cvs [update aborted]: connect to cvs.sourceforge.net(66.35.250.207):
2401 failed: Operation timed out</pre><p>geht das auf Umstrukturierungen der CVS-Server im Jahr 2006 bei
          sourceforge.net zurück. Die Dateien von Fink sind jetzt hier:
          <b>fink.cvs.sourceforge.net</b>.</p><p>Überprüfen sie die Version ihrer Fink-Installation mit</p><pre>fink --version</pre><p>Enthält die Ausgabe <code>10.4-transitional</code>, müssen sie auf
          die reguläre 10.4 Distribution umstellen. Dieses
          <a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">Aktualisierungs-Skript</a>
          unterstützt sie dabei.</p></div>
    </a>
    <a name="kernel-panics">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.14: Benutze ich Fink, stürzt der Rechner ab, friert ein oder zeigt
          kernel panics. Hilfe!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Im Herbst 2002 wurde auf der Mailing-Liste
          <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users</a>
          von solchen Problemen berichtet (einschließlich kernel panics und
          hängen bleiben beim Patchen), wenn Pakete übersetzt werden sollten und
          gleichzeitig Anti-Virus-Programme installiert waren. Sie müssen in
          solchen Fällen die Anti-Virus-Programme abstellen, bevor sie Fink
          nutzen.</p></div>
    </a>
    <a name="not-found">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.15: Ich versuche ein Paket zu installieren, aber Fink kann es nicht
          herunter laden. Die Download-Seite zeigt eine neuere Version des
          Pakets an als die von Fink. Was mache ich jetzt?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Die Paketquellen werden auf der Upstream-Seite hin- und hergeschoben,
          wenn eine neue Version veröffentlicht wird.</p><p>Als erstes sollten sie das Kommando <code>fink selfupdate</code>
          ausführen. Vielleicht hat der Paket-Autor das Problem schon behoben
          und sie bekommen eine aktualisierte Paketbeschreibung mit der
          korrekten URL oder eine neuere Version.</p><p>Wenn das alles nicht hilft, gibt es die Quellen auf unserer
          Web-Seite
          <a href="http://distfiles.master.finkmirrors.net/">http://distfiles.master.finkmirrors.net/</a>
          (Dank an Rob Braun), und sie können das Kommando
          <code>fink configure</code> ausführen und dort <b>search "Master"
          source</b> auswählen, so dass Fink dort automatisch sucht.</p><p>Sollte auch das nicht funktionieren, benachrichtigen sie den Autor
          des Pakets, dass die URL falsch ist. Seine E-Mail-Adresse bekommen sie
          mit "<code>fink describe <b>packagename</b></code>". Nicht alle
          Autoren lesen die Mailing-Listen regelmäßig.</p><p>Suchen sie dann die Quellen zuerst auf der Webseite in anderen
          Verzeichnissen nach der Version, die fink braucht, möglicherweise ein
          "altes" Verzeichnis. Es kann aber auch sein, dass es tatsächlich
          gelöscht wurde. Dann kann man immer noch per Websuche schauen, ob
          es den Tarball noch auf einer anderen als der offiziellen Seite gibt.
          Sie können auch hier schauen:
          <a href="http://us.dl.sourceforge.net/fink/direct_download/source/">http://us.dl.sourceforge.net/fink/direct_download/source/</a>.
          Fink speichert hier die Quelldateien von Paketen, die binär zur
          Verfügung gestellt werden. Klappt gar nichts, können sie immer noch
          auf der Mailing-Liste
          <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users</a>
          nachfragen, ob jemand die Quellen noch hat.</p><p>Haben sie den Tarball mit den Quellen gefunden, dann laden sie ihn
          herunter und verschieben sie ihn dahin, wo Fink die Quellen speichert
          (bei einer üblichen Fink-Installation mit dem Befehl:
          "<code>sudo mv <b>package-source.tar.gz</b> /sw/src/</code>").
          Danach können sie das Paket ganz normal mit
          '<code>fink install <b>packagename</b></code>' installieren.</p><p>Sollten sie die Quelldatei nicht bekommen, müssen sie leider warten
          bis der Paket-Autor das Problem behoben hat, also entweder die URL
          aktualisiert oder .info und .patch Dateien auf eine neue Version
          aktualisiert.</p></div>
    </a>
    <a name="fink-not-found">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.16: Führe ich Fink aus oder ein Programm, das ich mit Fink installiert,
          habe, kommt nur die Fehlermeldung "command not found".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Möglicherweise haben sie aus Versehen die Startup-Skripte geändert.
          Führen sie das Skript <code>/sw/bin/pathsetup.sh</code> in
          einem Terminalfenster aus. Das Skript detektiert die voreingestellte
          Shell und fügt Finks Initialisierungs-Skript in seine Konfiguration
          ein. Damit dies wirksam wird, müssen sie ein neues Terminalfenster
          starten. <b>Anmerkung:</b> Bei einigen älteren Versionen von Fink
          heißt das Skript statt dessen <code>pathsetup.command</code>.
          Alternativ köönen sie auch das Programm
          <code>pathsetup.app</code> auf dem binären Fink-Disk-Image
          ausführen.</p><p>Tritt dieser Fehler aber nur in Apples X11-Terminal auf, ist die
          einfachste Lösung, den Eintrag "Terminal" im Programm-Menu mit der
          Option <b>Applications-&gt;Customize Menu ...</b>zu ändern. Ändern
          sie das Kommando-Feld von</p><pre>xterm</pre><p>auf</p><pre>xterm -ls</pre><p><code>ls</code> bedeutet hier <q>login shell</q>. Dadurch
          werden ihr komplette Anmelde-Einstsellungen benutzt (genau wie das
          OS X Terminal).</p><p>Die Skripte <code>/sw/bin/init.*</code> machen noch weit mehr
          als nur <code>/sw/bin</code> im PATH hinzu fügen. Viele Pakete
          laufen ansonsten nicht korrekt.</p></div>
    </a>
    <a name="invisible-sw">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.17: Ich möchte den Ordner /sw im Finder verstecken, damit Nutzer die
          Fink-Installation nicht so leicht beschädigen können.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Das geht. Hat man die Development Tools installiert, kann man
          folgendes Kommando ausführen:</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>Damit wird der Ordner /sw genau so unsichtbar wie die normalen
          System-Ordner (/usr, usw.). Ohne die Developer Tools kann man auch
          Programme von Drittanbietern nehmen, mit denen man die Datei-Attribute
          manipulieren kann, damit /sw unsichtbar wird.</p></div>
    </a>
    <a name="install-info-bad">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.18: Ich kann nichts installieren, weil ich immer den folgenden Fehler
          bekomme: "install-info: unrecognized option
          `--infodir=/sw/share/info'"</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Normalerweise ist das ein Problem im PATH. Geben sie folgendes in
          einem Terminalfenster ein:</p><pre>printenv PATH</pre><p>Wenn <code>/sw/sbin</code> da überhaupt nicht auftaucht, muss
          man die Umgebung so einrichten, wie in den
          <a href="/doc/users-guide/install.php#setup">Instruktionen</a>
          im Users Guide beschrieben. Ist <code>/sw/sbin</code>
          vorhanden, aber noch andere Einträge davor gibt (z. B.
          <code>/usr/local/bin</code>), können sie die Abfolge der
          Einträge im PATH so ändern, dass <code>/sw/sbin</code> weiter
          vorne steht. Muss der andere Ordner wirklich vor
          <code>/sw/sbin</code> stehen und enthält der Ordner ebenfalls
          einen Unterordner <code>install-info</code>, dann benennen sie
          diesen Unterordner um, sobald sie Fink benutzen..</p></div>
    </a>
    <a name="bad-list-file">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.19: Ich kann nicht installieren oder löschen, weil ein Problem auftritt
          mit dem Text: "files list file".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Typische Formen dieses Fehlers sind:</p><pre>files list file for package <b>packagename</b> contains empty filename</pre><p>oder</p><pre>files list file for package <b>packagename</b> is missing final newline</pre><p>Der Fehler ist leicht zu beheben. Liegt die .deb-Datei für das
          problematische Paket auf ihrem System vor, dann überprüfen sie die
          Datei mit folgendem Kommando:</p><pre>dpkg --contents <b>full-path-to-debfile</b></pre><p>zum Beispiel:</p><pre>dpkg --contents /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</pre><p>Erhalten sie eine Liste von Verzeichnissen und Dateien, dann ist die
          .deb-Datei in Ordnung. Enthält die Liste aber auch etwas anderes oder
          es liegt keine .deb-Datei vor, dann können sie weiter machen, weil der
          Fehler das Erstellen anderer Pakete nicht verhindert.</p><p>Installieren sie die binäre Distribution oder sind sie sich sicher,
          dass die Version, die sie installierten, die gleiche ist wie in der
          binären Distribution (indem sie z. B. in der
          <a href="http://pdb.finkproject.org/pdb/index.php">Datenbank</a>
          nachschauen.), dann können sie die .deb-Datei mit folgendem Kommando
          beziehen:
          <code>sudo apt-get install --reinstall --download-only
          <b>packagename</b></code>
          Eine andere Lösung ist, das Paket mit dem Kommando
          <code>fink rebuild <b>packagename</b></code> neu zu erstellen. Sie
          werden es aber noch nicht installieren können.</p><p>Sobald sie eine gültige .deb-Datei haben, können sie alles wieder
          herstellen. Verschaffen sie sich zunächst Administratorrechte:
          <code>sudo -s</code> (Wenn nötig, geben sie ihr Administrator-Passwort
          ein), und führen sie dann folgende Kommandos aus:</p><pre>dpkg -c <b>full-path-to-debfile</b> | awk '{if ($6 == "./"){ print "/."; } \
else if (substr($6, length($6), 1) == "/")\
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}'\ 
&gt; /sw/var/lib/dpkg/info/<b>packagename</b>.list</pre><p>z. B.</p><pre>dpkg -c /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb | awk \
'{if ($6 == "./") { print "/."; } \
else if (substr($6, length($6), 1) == "/") \
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}' \ 
&gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p>Dies extrahiert den Inhalt der .deb-Datei, löscht alles außer den
          Dateinamen und schreibt diese in die .list-Datei.</p></div>
    </a>
    <a name="dselect-garbage">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.20: Wenn ich in <code>dselect</code> Pakete auswähle, bekomme ich
          nur einen Haufen Müll. Wie kann ich es benutzen?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Zwischen <code>dselect</code> und
          <code>Terminal.app</code> gibt es Probleme. Folgende Kommandos
          beheben sie.</p><p>tcsh-Nutzer:</p><pre>setenv TERM xterm-color</pre><p>bash-Nutzer:</p><pre>export TERM=xterm-color</pre><p>Sie können die Kommandos auch in ihre Startup-Dateien (also
          <code>.cshrc</code> oder <code>.profile</code>) einfügen, so dass sie
          immer ausgeführt werden.</p></div>
    </a>
    <a name="cant-upgrade">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.21: Ich kann anscheinend Finks Version nicht aktualisieren.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wenn keines der Kommandos <code>fink selfupdate</code>
          oder <code>sudo apt-get update ; sudo apt-get dist-upgrade</code>
          Fink aktualisiert, müssen sie eine neue Version von <code>fink</code>
          selbst herunter laden. Die entsprechenden Kommandos sind:</p><ul>
          <li>
            <b>10.3.x:</b> (0.7.1 Distribution)
<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.7.1-updates/main/binary-darwin-powerpc/base/fink_0.22.4-1_darwin-powerpc.deb
sudo dpkg -i fink_0.22.4-1_darwin-powerpc.deb
rm fink_0.22.4-1_darwin-powerpc.deb
fink selfupdate</pre>
          </li>
          <li>
            <b>10.2.x:</b> (0.6.3 Distribution)
<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.6.3/release/main/binary-darwin-powerpc/base/fink_0.18.3-1_darwin-powerpc.deb
sudo dpkg -i fink_0.18.3-1_darwin-powerpc.deb
rm fink_0.18.3-1_darwin-powerpc.deb
fink selfupdate</pre>
          </li>
        </ul></div>
    </a>
    <a name="spaces-in-directory">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.22: Kann ich Fink in einem Ordner installieren, der ein Leerzeichen in
          seinem Namen hat?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wir raten dringend davon ab. Es ist einfach den Ärger nicht wert.</p></div>
    </a>
    <a name="packages-gz">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.23: Wenn ich eine binäre Aktualisierung machen, erhalte ich viele
          Fehlermeldungen mit "File not found" oder "Couldn't stat package
          source list file".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wenn sie folgende Fehlermeldungen erhalten:</p><pre>Err file: local/main Packages
File not found 
Ign file: local/main Release 
Err file: stable/main Packages 
File not found 
Ign file: stable/main Release 
Err file: stable/crypto Packages 
File not found 
Ign file: stable/crypto Release 
...
Failed to fetch file:/sw/fink/dists/local/main/binary-darwin-powerpc/Packages
File not found 
Failed to fetch file:/sw/fink/dists/stable/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch file:/sw/fink/dists/stable/crypto/binary-darwin-powerpc/Packages
File not found 
Reading Package Lists... Done 
Building Dependency Tree...Done 
E: Some index files failed to download, 
they have been ignored, or old ones used instead. 
update available list script returned error exit status 1.</pre><p>, dann führen sie das Kommand <code>fink scanpackages</code>aus.
          Damit werden die Dateien erzeugt, die nicht gefunden wurden..</p><p>Wenn sie Fehlermeldungen folgender Art erhalten:</p><pre>W: Couldn't stat source package list file: unstable/main Packages
(/sw/var/lib/apt/lists/_sw_fink_dists_unstable_main_binary-darwin-
powerpc_Packages) - stat (2 No such file or directory)</pre><p>, sollten sie diese Kommandos ausführen, damit die Fehler behoben
          werden:</p><pre>sudo apt-get update
fink scanpackages</pre></div>
    </a>
    <a name="wrong-tree">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.24: Ich habe mein System oder die Developer Tools gewechselt, aber Fink
          erkennt den Wechsel nicht.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Wird die Fink-Distribution geändert (Quell-Distribution und binäre
          Distribution sind Untermengen.), muss das Fink mitgeteilt werden.
          Führen sie dazu ein Skript aus, das normalerweise bei der
          Erst-Installation ausgeführt wird:</p><pre>/sw/lib/fink/postinstall.pl</pre><p>Führt man dieses Skript aus, wird alles zurecht gerückt.</p></div>
    </a>
    <a name="seg-fault">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.25: Ich erhalte Fehlermeldungen von <code>gzip</code>,
          <code>dpkg-deb</code> oder anderen Programmen aus dem Paket
          <code>fileutils</code>! Hilfe!</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fehlermeldungen der Art:</p><pre>gzip -dc /sw/src/dpkg-1.10.9.tar.gz | /sw/bin/tar -xf -
### execution of gzip failed, exit code 139</pre><p>oder</p><pre>gzip -dc /sw/src/aquaterm-0.3.0a.tar.gz | /sw/bin/tar -xf -
gzip: stdout: Broken pipe 
### execution of gzip failed, exit code 138</pre><p>oder</p><pre>dpkg-deb -b root-base-files-1.9.0-1 /sw/fink/dists/unstable/main/binary-darwin-powerpc/base

### execution of dpkg-deb failed, exit code 1
Failed: can't create package base-files_1.9.0-1_darwin-powerpc.deb</pre><p>oder "segmentation faults" wenn man Programme aus dem Paket
          <code>fileutils</code>, z. B. <code>ls</code> oder <code>mv</code>,
          werden wahrscheinlich durch "prebinding"-Fehler in eine Bibliothek
          verursacht und können mit folgendem Kommando behoben werden:</p><pre>sudo /sw/var/lib/fink/prebound/update-package-prebinding.pl -f</pre></div>
    </a>
    <a name="pathsetup-keeps-running">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.26: When I open a Terminal window, I get a message that "Your
        environment seems to be correctly set up for Fink already.", and it
        logs out.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> What happened is that somehow the OSX Terminal program has been
        told to run <code>/sw/bin/pathsetup.command</code> every time you log
        in. You can fix this by removing the Preferences file,
        <code>~/Library/Preferences/com.apple.Terminal.plist</code>.</p><p>If you have other preferences that you want to keep, you can edit
        the file with a text editor and remove the reference to
        <code>/sw/bin/pathsetup.command</code>.</p></div>
    </a>
    <a name="ext-drive">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.27: Ich habe Fink nicht auf der Haupt-Partition installiert und ich kann
          das Paket Fink nicht aus dem Quellen aktualisieren. Die
          Fehlermeldungen enthalten <q>chowname</q>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Sollten die Fehler so aussehen:</p><pre>This first test is designed to die, so please ignore the error
message on the next line.
# Looks like your test died before it could output anything.
./00compile............................ok
./Base/initialize......................ok
./Base/param...........................ok
./Base/param_boolean...................ok
./Command/cat..........................ok
./Command/chowname.....................#     
Failed test (./Command/chowname.t at line 27)
#          got: 'root'
#     expected: 'nobody'</pre><p>dann müssen sie <b>Get Info</b> auf der Platte oder Partition
          ausführen, auf der Fink installiert ist und wählen sie den Button
          "Ignore ownership" ab.</p></div>
    </a>
    <a name="mirror-gnu">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.28: Fink weigert sich, meine Pakete zu aktualisieren, weil es den 'gnu'
          Spiegelserver nicht finden kann.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Erhalten sie eine Fehlermeldung, die so aufhört:</p><pre>Failed: No mirror site list file found for mirror 'gnu'.</pre><p>, dann muss man meistens das Paket <code>fink-mirrors</code>
          aktualisieren, sprich folgendes Kommando ausführen:</p><pre>fink install fink-mirrors</pre></div>
    </a>
    <a name="cant-move-fink">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.29: Ich kannn Fink nicht aktualisieren, weil ich /sw/fink nicht aus dem
          Weg räumen kann.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Der folgende Fehler:</p><pre>Failed: Can't move "/sw/fink" out of the way.</pre><p>Obwohl die Fehlermeldun etwas anderes behauptet, wird der Fehler
          meistens dadurch verursacht, dass die Zugriffsrechte in einen
          temporären Ordner es verhindern, die während eines
          <code>selfupdate</code> angelegt werden. Entferen sie diese Ordner:</p><pre>sudo rm -rf /sw/fink.tmp /sw/fink.old</pre></div>
    </a>
     <a name="fc-cache">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.30: Ich erhalte diese Fehlermeldung: "No fonts found".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Sehen eine der folgenden Fehlermelungen (bisher nur bei OS 10.4):</p><pre>No fonts found; this probably means that the fontconfig
library is not correctly configured. You may need to
edit the fonts.conf configuration file. More information
about fontconfig can be found in the fontconfig(3) manual
page and on http://fontconfig.org.</pre><p>können sie das so beheben:</p><pre>sudo fc-cache</pre></div>
    </a>
    <a name="non-admin-installer">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.31: Ich kann Fink nicht mit dem Installerpaket installieren, weil ich den
          Fehler "volume doesn't support symlinks" erhalte.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> This message commonly means that you've tried to run the Fink
          installer as user who doesn't have administrative privileges.  Make
          sure to log in at the login screen as such a user or switch to such a
          user in the Finder (i.e. fast user switching) before starting the Fink
          installer.</p><p>If you're having trouble even when using an admin account, then it's
          likely a problem with the permissions on your top-level directory.
          Use Apple's Disk Utility (from the Utilities sub-folder in your
          Applications folder), select the hard drive in question, choose the
          <b>First Aid</b> tab, and press <b>Repair Disk Permissions</b>.
          If that doesn't work, then you may need to set your permissions
          manually via:</p><pre>sudo chmod 1775 /</pre></div>
    </a>
    <a name="wrong-arch">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.32: Ich kann Fink nicht aktualisieren, weil <q>package architecture
          (darwin-i386) does not match system (darwin-powerpc).</q></b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Dieser Fehler tritt auf, wenn sie das PowerPC-Installerpaket auf
          einem Intel-MacIntosh ausführen. Sie müssen ihre Fink-Installation
          löschen, d. h. dieses Kommando ausführen:</p><pre>sudo rm -rf /sw</pre><p>und dann das Disk-Image für Intel-MacIntosh von den
          <a href="/download/index.php">downloads Webseiten</a>
          herunter laden.</p></div>
    </a>
   <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="comp-general.php?phpLang=de">6. Compile Problems - General</a></p>
<?php include_once "../footer.inc"; ?>


