<?php
$title = "i18n - Dateien";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/02/19 15:28:47';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="i18n Contents"><link rel="next" href="procedure.php?phpLang=de" title="Dokumente aktualisieren"><link rel="prev" href="intro.php?phpLang=de" title="Einführung">';


include_once "header.de.inc";
?>
<h1>i18n - 2. Die Dokumentationsdateien</h1>
    
    
    
      <p>
      In diesem Kapitel werden die Dokumentationsdateien von Fink erklärt,
      wie man auf sie zugreift, wie man Änderungen an die Fink-Webseiten
      sendet und sie aktiviert.
      </p>
    
    <h2><a name="requirements">2.1 Voraussetzungen</a></h2>
      
      <p>
      Will man im Übersetzungsteams mitarbeiten, braucht man:
      </p>
      <ul>
        <li>
        Einen CVS-Klienten, mit dem man die Dokumentation aus dem Fink
        XML-Baum herunter lädt.
        </li>
        <li>
        Einen UTF-8 kompatibler Text-Editor. Ein spezieller XML-Editor ist
        von Vorteil, weil viele Dateien der Fink-Webseite aus XML-Dateien
        erzeugt werden.
        </li>
        <li>
        Einen "Checkout" des Fink XML-Baums, wie in den <a href="#acquiring">Anleitungen</a> unten beschrieben.
        </li>
        <li>
        Kenntnisse über die Arbeitsweise von Fink sind von Vorteil.
        </li>
      </ul>
      <p>
      <b>Notiz:</b> Als "Team-Mitglied" bezeichnet man Übersetzer, die
      aber letztlich nicht dafür verantwortlich sind, die Dateien auf die
      Fink-Webseiten hoch zu laden.
      </p>
      <p>
      "Team-Leiter" müssen die obigen Voraussetzungen erfüllen. Darüber
      hinaus sollten sie aber auch noch folgendes haben:
      </p>
      <ul>
        <li>
        Ein Konto bei SourceForge (kostenlose Registrierung).
        </li>
        <li>
        "Commit"-Zugriff auf den Fink-Dokumentationsbaum. Senden sie
        dafür eine Nachricht an die Mailing-Liste fink-18n, in der sie
        ihren SourceForge-Nutzernamen mitteilen. Sobald jemand aus dem
        i18n-Kern-Team es einrichtet, haben sie CVS-Zugang zur
        Dokumentation.
        </li>
      </ul>
      <p>
      <b>Notiz: </b>Als "Team-Leiter" werden die bezeichnet, die
      tatsächlich für das Hochladen geänderter Dateien auf die Fink-
      Webseite verantwortlich sind und diese Änderungen aktivieren.
      </p>
    
    <h2><a name="setting-up">2.2 Einstellungen der Umgebung</a></h2>
      
      <p>
      Es ist ratsam, einige Einstellungen in der Umgebung vorzunehmen, um
      sich später Tipparbeit zu sparen. Es wird im folgenden davon
      ausgegangen, dass man die eingebauten Kommandozeilen-Tools von Mac OS
      X oder einem anderen Unix-ähnlichen System benutzt.
      </p>
      <ol>
        <li>
        <b>Nur für Team-Leiter</b>: Ändern sie ihre login-Dateien und
        fügen sie die CVS_RSH-Umgebungsvariable hinzu.
          <ol>
            <li>
            Benutzen sie <code>bash</code> oder
            <code>zsh</code>, fügen sie folgendes
            <pre>export CVS_RSH=ssh</pre> in ihrer Datei
            <code>.profile</code> hinzu.
            </li>
            <li>
            Benutzen sie <code>tcsh</code> fügen sie folgendes
            <pre>setenv CVS_RSH ssh</pre> in ihrer Datei
            <code>.cshrc</code> hinzu.
            <p>
            Dadurch verwendet <code>cvs</code> ssh für den Zugriff
            auf Dateien. Dies ist erforderlich.
            </p>
            </li>
          </ol>
        </li>
        <li>
        <b>Alle Mitgleider</b>: Erzeugen sie eine Datei namens .cvsrc in
        ihrem Heimatordner mit der folgenden Zeile:
        <pre>cvs -z3</pre> Damit arbeitet CVS mit Kompression der
        Stufe 3 als Voreinstellung (Das ist gut so!)
        </li>
      </ol>
      <p>
      Nach diesen Einstellungen muss man ein neues Terminal-Fenster
      starten, damit sicher gestellt ist, dass die CVS_RSH-Umgebung
      eingeschaltet ist.
      </p>
    
    <h2><a name="acquiring">2.3 Dateien für die Bearbeitung herunter laden</a></h2>
      
      <p>
      Als erstes benötigt man den xml-Ast der Webseiten:
      </p>
      <ol>
        <li>
        Öffnen sie ein Terminal
        </li>
        <li>
        Erzeugen sie irgendwo einen Ordner für den Fink xml-Ast, z. B mit:
        <pre>mkdir -p ~/Documents/Fink-i18n</pre>
        </li>
        <li>
        Wechseln sie in den Ordner:
        <pre>cd ~/Documents/Fink-i18n</pre>
        </li>
        <li>
        <b>Für Team-Mitglieder ohne Leitungsfunktion (oder Team-Leiter,
        die auf Zugang warten):</b> Anonymer Login auf
        fink.cvs.sourceforge.net:
          <ol>
            <li>
            <pre>cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink login</pre>
            </li>
            <li>
            Drücken sie die Enter-Taste (kein Passwort, anonym als 
            Voreinstellung)
            </li>
            <li>
            "Check out" der xml-Module:
            <pre>cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink co xml</pre>
            </li>
          </ol>
          <b>Team-Leiter: </b>"Check out" unter Benutzung des Nutzernamens:
          <ol>
            <li>
            Man muss den obigen Login-Schritt nicht machen, sondern kann
            gleich folgendes ausführen:
            <pre>cvs -d:ext:yourusername@fink.cvs.sourceforge.net:/cvsroot/fink co xml</pre>
            wobei <b>yourusername</b> natürlich ihr
            Nutzername bei SourceForge ist. Möglicherweise bekommen sie
            eine Meldung, dass der DSA-Schlüssel des Servers unbekannt
            ist. Einfach weiter machen und mit "yes" beantworten.
            </li>
            <li>
            In diesem Fall sollten sie ihr Passwort bei SourceForge eingeben.
            </li>
          </ol>
        </li>
      </ol>
    
    <h2><a name="file-standards">2.4 Datei-Standards</a></h2>
      
      <p>
      Als Übersetzer müssen sie zwei Datei-Standards beachten:
      </p>
      <ol>
        <li>
        <b>Statisch (nur PHP)</b>
        <p>
        Die Organisation (sprich Nummerierung) dieser Dokumente sollte sich
        nicht täglich ändern. In diesem Fall besteht das Dokument aus
        einer PHP-Datei, die sie übersetzen müssen.
        </p>
        </li>
        <li>
        <b>Dynamisch (XML erzeugt PHP- und HTML-Datei)</b>
        <p>
        Diese Dokumente (z. B. die FAQ) werden häufiger aktualisiert und
        umstrukturiert und können deshalb dynamisch umstrukturiert werden.
        Sie nutzen eine XML-Datei aus Ausgangsbasis, aus der PHP- und
        HTML-Dateien mittels eines Skripts erzeugt werden. Als Übersetzer
        muss man die XML-Datei übersetzen.
        </p>
        </li>
      </ol>
      <p>
      Darüber hinaus muss man einige wenige andere Dateien übersetzen
      oder anpassen, wie z. B. Makefile, nav.xx.inc oder constants.xx.inc.
      Ohne diese Änderungen werden die neuen Seiten nicht auf der Webseite
      angezeigt oder zumindest nicht richtig.
      </p>
      <p>
      Alle Dateien sind in <b>utf-8 kodiert</b>. Folglich sollten sie
      die Kodierung nicht ändern, außer sie ist falsch (also nicht
      utf-8). Sie sollten auch keine speziellen html-Features verwenden,
      außer denen, die schon in der englischen Datei vorhanden sind.
      </p>
    
    <h2><a name="updating">2.5 Aktualisierung auf die neueste Version</a></h2>
      
      <p>
      Seit sie die Dateien geladen haben, können andere Übersetzer
      bereits Änderungen vorgenommen haben (keine Angst. CVS kümmert
      sich darum). Es ist deshalb ratsam, die eigene Version regelmäßig
      auf die neueste Version zu aktualisieren. Dies erfolgt so:
      </p>
      <ol>
        <li>
        Wechseln sie in den Ordner, in dem sich die Dateien befinden, z.
        B.: <pre>cd ~/Documents/Fink-i18n/xml</pre>
        </li>
        <li>
        Aktualisieren sie:
        <pre>cvs -d:pserver:anonymous@fink.cvs.sourceforge.net:/cvsroot/fink update -dP</pre>
        für Team-Mitgleider ohne "Commit"-Zugang. oder
        <pre>cvs update -dP</pre> für Teamleiter.
        </li>
      </ol>
      <p>
      Vor einigen Dateinamen steht danach ein Buchstabe. Besuchen sie die
      Seite <a href="appendix.php?phpLang=de">Anhang</a> für weitere
      Informationen oder lesen sie die man pages von cvs nach.
    </p>
    
    <h2><a name="initial-translation">2.6 Erste Übersetzung</a></h2>
      
      <p>
      Die Dateien, die man übersetzen muss, sind in der Reihenfolge ihrer
      Bedeutung:
      </p>
      <p>
      Titel (Datei der englischen Version)
      </p>
      <ol>
        <li>Konstanten-Dateien: (e.g. <code>xml/web/constants.*.inc</code>) (siehe unten)</li>
        <li>Statische PHP-Dateien (e.g. <code>xml/web/*.de.php</code>)</li>
        <li>Navigations-Dateien der Dokumentation (e.g. <code>xml/web/doc/nav.*.inc</code>) (wie constants.*.inc behandeln)</li>
        <li>Dokumentationsindex (<code>xml/doc/doc.de.xml</code>)</li>
        <li>Benutzerhandbuch (<code>xml/users-guide/uguide.de.xml</code>)</li>
        <li>Fortgeschrittenes (<code>xml/advanced/advanced.de.xml</code>)</li>
        <li>FAQ (<code>xml/faq.en.xml</code>)</li>
        <li>X11 (<code>xml/x11/x11.de.xml</code>)</li>
        <li>CVS Zugang (<code>xml/cvsaccess/cvs.de.xml</code>)</li>
        <li>LiesMich (<code>xml/fink-readme/readme.de.xml</code>)</li>
        <li>Internationalisierung (<code>xml/multilingual/multilingual.de.xml</code>)</li>
        <li>Sicherheit (<code>xml/security/security.de.xml</code>)</li>
        <li>Paketerstellung Tutorial (<code>xml/quick-start-pkg/quick-start-pkg.de.xml</code>)</li>
        <li>Paketerstellung (<code>xml/packaging/packaging.de.xml</code>)</li>
        <li>Porting (<code>xml/porting/porting.de.xml</code>)</li>
        <li>Neues (<code>xml/news/news.xml</code>)</li>
      </ol>
      <p>
      Suchen sie auch in den Unterordnern von <code>xml/web</code>
      nach php-, Konstanten- und Navigations-Dateien, die übersetzt werden
      müssen.
      </p>
      <p>
      Enthält eine php-Datei in <code>xml/web</code> und den
      Unterordnern am Anfang der Datei ein "Generated from", dann darf die
      Datei <b>nicht</b> übersetzt werden. Suchen sie die entsprechende
      xml-Datei im <code>xml</code>-Baum und übersetzen oder
      ändern sie diese.
      </p>
      <p>
      Die Dateien <code>constants.*.inc</code> und
      <code>nav.*.inc</code> dienen dazu, hart Kodiertes in den php
      include-Dateien zu behandlen. Es dreht sich vor allem um
      Menu-Einträge und ähnliches, die oben und links auf den Seiten
      stehen. Sie sollten sie von den Skripten lösen und entsprechende
      "constants.xx.inc"-Dateien in ihrer Sprache erstellen. Dafür geben
      sie einfach folgendes Kommando im Terminalfenster ein:
      </p>
      <pre>cp constants.fr.inc constants.xx.inc</pre>
      <p>
      wobei xx durch ihren Sprachen-Code zu ersetzen ist (z. B. de für
      die deutsche Sprache). Als nächstes sollten sie die Teile der
      "Define"-Zeilen in einfachen Anführungsstrichen übersetzen.
      Versteht man kein Französisch, hier eine Übersetzung ins Englische:
      </p>
      <p>
      Vergessen sie nicht das "locale" zu ändern z. B. en_US to de_DE
      für Deutsch.
      </p>
      <pre>
/* The Sections. Used in Menu Navigation Bar */
define (FINK_LC_ALL, 'en_US');

/* The Sections. Used in Menu Navigation Bar */ 
define (FINK_SECTION_HOME, 'Home'); 
define (FINK_SECTION_DOWNLOAD, 'Download');
define (FINK_SECTION_PACKAGE, 'Packages'); 
define (FINK_SECTION_HELP, 'Help'); 
define (FINK_SECTION_FAQ, 'F.A.Q.'); 
define (FINK_SECTION_DOCUMENTATION, 'Documentation'); 
define (FINK_SECTION_MAILING_LISTS, 'Mailing Lists'); 
      
/* The Home Subsections. Used in Menu Navigation Bar */ 
define (FINK_SECTION_HOME_INDEX, 'Index'); 
define (FINK_SECTION_HOME_NEWS, 'News'); 
define (FINK_SECTION_HOME_ABOUT, 'About'); 
define (FINK_SECTION_HOME_CONTRIBUTORS, 'Contributors'); 
define (FINK_SECTION_HOME_LINKS, 'Links'); 
      
/* The word 'Sections'. Used in Menu Navigation Bar */ 
define (FINK_SECTIONS, 'Sections'); 
      
/* Used in FAQ/Documentation Sections: */
/* Contents as Table of contents, Next as next page */ 
/* Q as question, A as anwer */
define (FINK_CONTENTS, 'Contents');
define (FINK_NEXT, 'Next');
define (FINK_Q, 'Q');
define (FINK_A, 'A');

/* Printer */
define (FINK_PRINTER, 'Printer');
define (FINK_PRINT_VERSION, 'Print Version');

/* Footer */
define (META_KEYWORDS, 'Mac OS X, Fink, Debian, Macintosh, Apple, UNIX, Open Source,
             download, free software, port, development, package management');
define (META_DESCRIPTION, 'The Fink project wants to bring the full world of Unix Open
             Source software to Darwin and Mac OS X. We modify Unix software so that it 
             compiles and runs on Mac OS X and make it available for download as a coherent
             distribution.');
define (HEADER_HOSTED_BY, 'Hosted by {img}');
define (FOOTER_AVAILABLE_LANGUAGES, 'Available Languages');
define (FOOTER_GENERATED_DYNAMICALLY, 'Generated dynamically from');
define (FOOTER_DATABASE_LAST_UPDATED, 'Last updated on %a, %d %B %Y,  %R %Z');
define (FOOTER_LAST_CHANGED, 'Last changed by {author} on %a, %d %B %Y,  %R %Z');
</pre>
      <p>
      <b>Notiz:</b> die ersten Zeilen des Footer wurden zum Anzeigen
      geteilt. Auf keinen Fall in der Datei aufteilen.
      </p>
      <p>
      Zum Übersetzen folgen sie den folgenden Schritten (angenommen sie
      übersetzen das Dokument Running X11 ins
      Französische):
      </p>
      <ol>
        <li>
        Kopieren sie die xml-Datei
        <pre>cp x11.en.xml x11.fr.xml</pre>
        </li>
        <li>
        Ändern sie die Zeile, dass die Datei in Französisch ist und seine
        Kodierung UTF-8
        <pre>&lt;?xml version='1.0' encoding='utf-8' ?&gt; ... &lt;document filename="index" lang="fr" &gt; ...</pre>
        </li>
        <li>
        <b>Sehr wichtige Notiz:</b> Überprüfen sie, dass die Zeile mit
        "cvsid" am Anfang der Datei nicht geteilt ist.
        </li>
        <li>
        Speichern mit utf-8-Kodierung. Beachten sie, dass die Kodierung
        utf-8 sein muss und dass wirklich nur tatsächlicher Text und
        nichts anderes geändert wird.
        </li>
        <li>
        Sind sie fertig oder wollen sie testen, editieren sie die Datei
        <code>Makefile</code> und fügen sie ihre Sprache hinzu:
        <pre>LANGUAGES_AVAILABLE = en ja fr</pre>
        <p>
        geben sie dann im Ordner das Kommando: <code>make</code> ein. Dies
        sollte die php-Dateien (und möglicherweise noch andere)
        entsprechend der Sprachen im Makefile erzeugen.
        </p>
        </li>
      </ol>
      <p>
      Notiz: Sollten sie Fehler in der englischen Datei finden, dann nicht
      ändern, sondern einen Bericht auf der <a href="/lists/fink-i18n.php">Mailing-Liste fink-i18n</a> erstellen,
      damit die englische "Master"-Datei geändert wird.
      </p>
    
    <h2><a name="check-work">2.7 Arbeit überprüfen</a></h2>
      
      <p>
      Bevor ihre Arbeit auf die Fink Webseite hoch geladen wird, sollten
      sie überprüfen, wie das Dokument aussieht.
      </p>
      <ul>
        <li>
        <b>Der einfache Weg: </b>Öffnen sie die HMTL- und PHP-Dateien in
        ihrem Web-Browser. PHP-Dateien sehen allerdings nicht exakt so aus
        wie auf der Webseite.
        </li>
        <li>
          <b>Der beste Weg: </b>Sie können ihren eingebauten Webserver
          dazu benutzen, sich die Seiten so anzeigen zu lassen, wie sie auf
          der Fink-Webseite aussehen. Angenommen sie benutzen den
          vorhandenen Server:
          <ol>
            <li>
            Editiere <code>/etc/httpd/httpd.conf</code>, z. B.
            mittels: <pre>sudo pico /etc/httpd/httpd.conf</pre>
            </li>
            <li>
            Suchen sie diese Zeile:
            <pre>#LoadModule php libexec/httpd/libphp4.so</pre>
            und entfernen sie "#"
            </li>
            <li>
            Suchen sie diese Zeile:
            <pre>#AddModule mod_php4.c</pre>
            und entfernen sie "#"
            </li>
            <li>
            Haben sie eine Version von Apache, die älter is als die
            built-in Version auf Panther, dann suchen sie nach einer Zeile,
            die so oder so ähnlich aussieht:
            <pre>AddType application/x-httpd-php .php</pre>
            und stellen sie ein "#" an den Anfang.
            </li>
            <li>
            Speichern sie die Datei und beenden sie den Editor.
            </li>
            <li>
            Starten sie Personal Web Sharing in den Systemeinstellungen.
            Läuft es bereits, dann schalten sie es aus und wieder ein.
            </li>
            <li>
            Der einfachste Weg, alles sichtbar zu machen, ist es, den
            "Checkout" des <code>xml</code>-Baums in den Ordner
            <code>Websites</code> in ihrem Heimatordner zu ziehen.
            Die Homepage lässt sich dann im WebBrowser mit der folgenden
            URL öffnen:
            <pre>http://127.0.0.1/~<b>USERNAME</b>/xml/web/index.php</pre>
            wobei <code>USERNAME </code> durch ihren Nutzernamen ersetzt
            werden muss.
            </li>
          </ol>
        </li>
      </ul>
    
    <h2><a name="change-checkout">2.8 Wenn sie "Commit" Zugang haben (Team-Leiter)</a></h2>
      
      <p>
      Wenn sie "Commit" Zugang haben, sollten sie
      </p>
      <ul>
        <li>
        Einen SSH-Schlüssel für ihr Konto bei SourceForge erstellen.
          <ol>
            <li>
            Erstellen sie den Schlüssel auf ihrem Rechner, indem sie den
            <a href="http://sourceforge.net/docman/display_doc.php?docid=761&amp;group_id=1#keygenopenssh">Anweisungen</a>
            von SourceForge folgen.
            </li>
            <li>
            Geben sie folgendes Kommando im Terminal ein:
            <pre>cat ~/.ssh/id_dsa.pub | pbcopy</pre>
            Damit wird der Inhalt der Datei direkt und ohne Zeilenenden in ihr
            Pasteboard kopiert. Versichern sie sich, dass sie nichts anderes in
            ihr Pasteboard kopieren bis sie fertig sind.
            </li>
            <li>
            Login mit ihrem Konto bei SourceForge.
            </li>
            <li>
            Wählen sie "Account Options" aus.
            </li>
            <li>
            Gehen sie zu "Host Access Information" und klicken sie "Edit
            SSH Keys for Shell/CVS" an.
            </li>
            <li>
            Klicken sie auf das Formular und geben sie Cmd-A, Cmd-V ein.
            </li>
            <li>
            Klicken sie den Knopf.
            </li>
          </ol>
        </li>
        <li>
        Machen sie einen "Checkout" des <code>xml</code>-Baums unter
        Verwendung ihres Nutzernamens.
          <ol>
            <li>
            Nach einem "Checkout" des gesamten
            <code>xml</code>-Baums sollten sie ihre lokale Kopie
            umbenennen. Dafür können sie den Finder nehmen.
            </li>
            <li>
            Schieben sie diesen Ordner auf ein Terminalfenster:
            <pre>cd ~/Documents/Fink-i18n</pre>
            </li>
            <li>
            Machen sie den "Checkout" des xml-Baums:
            <pre>cvs -d:ext:yourusername@fink.cvs.sourceforge.net:/cvsroot/fink co xml</pre>
            wobei <b>yourusername</b> natürlich ihr Nutzername bei SourceForge
            ist. Geben sie auf Nachfrage ihr Passwort ein.
            </li>
            <li>
            Kopieren sie die bearbeiteten Dateien aus ihrem alten Baum in
            den neuen. Nehmen sie dazu ruhig den Finder, aber achten sie
            darauf, dass die Dateien wirklich im selben Unterordner sind
            wie am Anfang.
            </li>
          </ol>
        </li>
      </ul>
    
    <h2><a name="committing">2.9 Änderungen übergeben (Team-Leiter)</a></h2>
      
      <p>
      Jetzt muss man die Änderungen auf den Hauptserver übertragen,
      wofür man "Commit"-Zugang benötigt. Achten sie darauf, dass sie
      die neueste Version von XSLT installiert haben, derzeit
      <code>libxslt-1.1.29-1</code> von Fink.
      </p>
      <p>
      Das Vorgehen unterscheidet sich, je nachdem, ob es statische oder
      dynamische Dateien sind.
      </p>
      <ul>
        <li>
        <b>Statisch: </b>(nur PHP-Dateien) Für den Upload machen sie
        folgendes:
          <ol>
            <li>
            Öffnen sie ein Terminal.
            </li>
            <li>
            Wechseln sie in den Ordner mit den Dateien, die sie hoch laden
            wollen, z. B.:
            <pre>cd ~/Documents/Fink-i18n/xml/web</pre>
            <p>
            Haben sie ihren <code>xml</code>-Baum unter
            <code>Documents/Fink-i18n/</code> in ihrem Heimatordner
            und sie wollen eine PHP-datei aus dem Ordner xml/web hochladen.
            </p>
            </li>
            <li>
            Ist die Datei neu von ihnen erstellt, müssen sie diese zuerst
            zur Liste der Dateien hinzufügen:
            <pre>cvs add download.ru.php</pre>
            Geben sie nach dem Prompt ihr SourceForge-Passwort ein.
            <p>
            Existierte die Datei bereits, können sie zum nächsten Schritt
            springen.
            </p>
            </li>
            <li>
            Laden sie die Datei hoch (commit). In unserem obigen Beispiel:
            <pre>cvs ci -m "message" download.ru.php</pre>
            wobei <b>message</b> beschreiben sollte, was sie geändert
            haben. Geben sie nach dem Prompt ihr SourceForge-Passwort ein.
            <p>
            Notiz: Sie können mehrere Dateien auf einmal hochladen.
            </p>
            </li>
          </ol>
        </li>
        <li>
        <b>Dynamisch: </b>(XML- und PHP-Dateien) Nach der Bearbeitung der
        xml-Dateien müssen sie folgendes machen:
          <ol>
            <li>
            Öffnen sie ein Terminal.
            </li>
            <li>
            Wechseln sie in den Ordner mit den Dateien, die sie geändert
            oder hinzugefügt haben, z. B.:
            <pre>cd ~/Documents/Fink-i18n/xml/faq</pre>
            , wenn sie die FAQs bearbeitet haben.
            </li>
            <li>
            Geben sie nun folgendes Kommando ein:
            <pre>make check</pre>
            Dies stellt sicher, dass die Datei korrekt ist.
            </li>
            <li>
            Haben sie die xml-Datei neu erstellt, müssen sie die xml-Datei
            und ihr Makefile zur Liste der Dateien hinzufügen (unter der
            Annahme, dass den Makefile geändert haben, um ihre Sprache
            hinzu zu fügen.):
            <pre>cvs add faq.ru.xml Makefile</pre>
            Geben sie nach dem Prompt ihr SourceForge-Passwort ein.
            <p>
            Existierte die Datei bereits, können sie zum nächsten Schritt
            springen.
            </p>
            </li>
            <li>
            Laden sie die Dateien hoch (commit):
            <pre>cvs ci -m "message" faq.ru.xml Makefile</pre>
            wobei <b>message</b> beschreiben sollte, was sie geändert haben.
            Geben sie nach dem Prompt ihr SourceForge-Passwort ein.
            </li>
            <li>
            Führen sie nun folgende Kommandos aus:
            <pre>make &amp;&amp; make install</pre>
            </li>
            <li>
            Erhalten sie eine Fehlermeldung, dass ihr Ordner
            <code>foo</code> bei
            <code>xml/scripts/installer/dmg</code> nicht vorhanden
            ist, wechseln sie dort hin mit:
            <pre>cd ../scripts/installer/dmg</pre>
            und erzeugen sie den Ordner mit:
            <pre>mkdir -p foo</pre>
            . Kehren sie dann zurück in den vorigen Ordner und wiederholen sie
            <pre>make &amp;&amp; make install</pre>.
            </li>
            <li>
            Wechseln sie in ihre Kopie des Fink xml-Baums, also:
            <pre>cd ~/Documents/Fink-i18n/xml</pre>,
            <p>
            wenn sie ihren <code>xml</code>-Baum im Ordner
            <code>Documents/Fink-i18n/</code> in ihrem Heimatordner
            erzeugt haben.
            </p>
            </li>
            <li>
            War die xml-Datei neu, muss man noch einiges in cvs
            hinzufügen. Hat man z. B. FAQ bearbeitet, muss man folgendes
            ausführen:
<pre>cvs add web/faq/index.en.php web/faq/general.ru.php \
web/faq/relations.ru.php web/faq/usage-fink.ru.php \ 
web/comp-general.ru.php web/faq/comp-packages.ru.php \ 
web/faq/usage-general.ru.php web/faq/usage-packages.ru.php \ 
web/faq/upgrade-fink.ru.php web/faq/mirrors.ru.php \ 
web/faq/faq.ru.html web/faq/header.ru.inc \ 
scripts/installer/dmg/faq.ru.html</pre>
            Für andere Dokumente heißen die Dateien natürlich anders.
            Verwenden sie alle Dateien, die mittels
            <code>make install</code> erzeugt wurden.
            </li>
            <li>
            Vergessen sie nicht, Dateien, die sie erzeugt haben (z. B.
            onstants.xx.inc, header.xx.inc, nav.xx.inc, etc.), in cvs hinzu
            zu fügen und hoch zu laden.
            <p>
            Existierte die Datei bereits, können sie den nächsten Schritt
            überspringen.
            </p>
            </li>
            <li>
            Laden sie den gesamten Baum hoch:
            <pre>cvs ci -m "message"</pre>
            <p>
            wobei <b>message</b> wieder beschreiben sollte, was sie
            geändert haben (Verwenden sie ruhig die gleiche Beschreibung
            wie bei der xml-Datei). Geben sie nach dem Prompt ihr
            SourceForge-Passwort ein.
            </p>
            <p>
            Der Grund, wieso man 2-mal hoch laden muss, ist, dass sicher
            gestellt sein muss, dass die Dateien einen korrekten Zeitpunkt
            der Erstellung haben, sowie die Person, die sie zuletzt
            geändert hat.
            </p>
            </li>
          </ol>
        </li>
      </ul>
    
    <h2><a name="website">2.10 Aktualisieren unserer Webseite</a></h2>
      
      <p>
      Wollen sie das Ergebnis ihrer Anstregungen jetzt gleich auf unserer
      Webseite sehen?  Dann machen sie folgendes:
      </p>
      <ol>
        <li>
        Öffnen sie ein Terminal.
        </li>
        <li>
        Anmelden auf dem Webserver mittels ssh:
        <pre>ssh username@shell.sourceforge.net</pre>
        Sie müssen ihr SourceForge-Passwort eingeben.
        </li>
        <li>
        Wechseln sie in den Ordner, der die Webseiten enthält:
        <pre>cd /home/groups/f/fi/fink/htdocs</pre>
        </li>
        <li>
        Aktualisieren sie die Webseiten aus dem cvs:
        <pre>./update.sh</pre>
        <b>Wichtige Notiz:</b> Wenn sie dies machen, aktivieren sie
        <b>alles</b>, das in den Ordner <code>web/xml</code> geschoben
        wurde.
        </li>
        <li>
        Abmelden von Webserver: <pre>exit</pre>
        </li>
        <li>
        Anschauen: <pre>open /</pre>
        </li>
      </ol>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="procedure.php?phpLang=de">3. Dokumente aktualisieren</a></p>
<?php include_once "../../footer.inc"; ?>


