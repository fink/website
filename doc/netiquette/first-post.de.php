<?php
$title = "Netiquette - Anfang";
$cvs_author = 'Author: KMS';
$cvs_date = 'Date: 2012/11/11 15:20:15';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Netiquette Contents"><link rel="next" href="reply.php?phpLang=de" title="Antworten auf eine Nachricht"><link rel="prev" href="before-post.php?phpLang=de" title="Vorbereitung einer Anfrage">';


include_once "header.de.inc";
?>
<h1>Netiquette - 2. Erste Anfrage</h1>
    
    
    <h2><a name="system">2.1 Was haben sie installiert?</a></h2>
      
      <p>Taucht das Problem bei der Installation eines Pakets auf, dann werden folgende Informationen benötigt:
      </p>
      <ul>
        <li>Die Version von Mac OS X.</li>
        <li>Die Version von Fink. Man erhält die Version als Terminal-Ausgabe wenn man folgendes Kommando eingibt:<pre>fink --version</pre>
        </li>
        <li>Geben sie bitte auch an, ob sie Binärpakete installlieren, z. B. mittels <code>apt-get</code>, oder die Pakete aus Quellcode erstellen, z. B. mittels <code>fink install</code>.
          <p>Im letzten Fall, sollten sie auch angeben, welche Version der Developer Tools sie verwenden.</p>
        </li>
        <li><p>Installieren sie ein Paket, das X11 benötigt, sollten sie angeben, ob sie Apple's X11, XFree86 oder Xorg verwenden und in den letzten beiden Fällen welche Version.
            </p>
            <p>Ist das nicht ganz klar, am besten einfach die Versionen angeben.</p>
        </li>
      </ul>
    
    <h2><a name="problem-description">2.2 Was geht schief?</a></h2>
      
      <ul>
        <li><b>Geben sie Namen UND Version des Pakets an, das Schwierigkeiten macht.</b>
          <p>Diese Information sollte auch in der Betreffzeile ihrer Nachricht stehen.</p>
          <p>Mit anderen Worten: Gibt es Probleme mit <code>foo-3.141-6</code>, dann im Betreff nicht nur Problem mit <code>foo</code> erwähnen.
          </p>
          <p>Installiert man ein Paket (z. B. <code>baz-2.18-1</code>), das von anderen Paketen abhängt (z. B. <code>foo-3.141-6</code>, <code>bar-16.0-9</code>, ...) und es gibt ein Problem bei der Installation von <code>foo</code>, dann verfassen sie bitte einen Problembericht über <code>foo-3.141-6</code> und nicht über <code>baz-2.18-1</code>.
          </p>
        </li>
        <li><b>Beschreiben sie das Problem.</b>
          <p>Das heisst, dass man den Fehlerbericht mit sendet. Bei langen Protokollen genügt oft der letzte Teil.
          </p>
          <ol>
            <li>Für Probleme bei der binären Installation, beginnen sie ihren Fehlerbericht da, wo das problematische Oaket ausgepackt wird:
<pre>...
Selecting previously deselected package foo
error unpacking foo
...</pre> und von da an bis and Ende.
            <p></p>
            </li>
            <li>Einige typische Probleme bei der Installation aus Quellcode:
              <ol>
              <li>Tritt das Problem bei der Konfiguration am Anfang auf, erfolgt die Fehlermeldung und der Abbruch meistens prompt. Ihr Fehlerbericht sollte die letzten paar Tests enthalten:
<pre>....
Checking for bar-config...no
Error:  bar-config not found
....</pre>
                <p>Denken sie, dass es helfen könnte, dann können sie auf den entsprechende Teil der Log-Datei der Konfiguration aufnehmen, z. B. <code>/sw/src/foo-3.141-6/foo-3.141/config.log</code>. <b>Aber bitte nicht die gesamte Datei; sie ist meistens sehr lang.</b>
                </p>
                </li>
                <li>Tritt der Fehler gleich nach Beginn der Paketerstellung auf, dann wird die letzte Zeile benötigt, die der Compiler versuchte auszuführen:
<pre>...
gcc &lt;flags, files etc.&gt;
&lt;error messages&gt;
...</pre></li>
                <li>Bekamen sie die verflixte Fehlermeldung <code>execution of mv failed</code>, dann müssen sie ihr Protokoll der Paketerstellung nach einem früheren Fehler absuchen. Ohne ein Protokoll des tatsächlichen Fehlers wird man ihnen meistens nicht helfen können.
                </li>
              </ol>
            </li>
          </ol>
        </li>
      </ul>
    
    <h2><a name="remedies">2.3 Was haben sie genau versucht?</a></h2>
      
      <p>Bitte beschreiben sie genau, was sie bereits versucht haben, das Problem zu beheben, z. B.</p>
      <ul>
        <li>Instruktionen in FAQs oder anderen Dokumentationen ausgeführt</li>
        <li>Pakete entfernt, die möglicherweise einen Konflikt verursachen</li>
        <li>Neu erstellen und neu installieren</li>
        <li>Erneute Aktualisierung der Paketbeschreibungen</li>
        <li>etc.</li>
      </ul>
      <p>Hierbei geht es darum, dass man ihnen keine Vorschläge macht, die sie bereits selbst probiert haben.</p>
    
    <h2><a name="future-plans">2.4 Wie geht es weiter?</a></h2>
      
      <p>In dieser Kategorie gibt es verschiedene Wege:</p>
      <ul>
        <li>Beschreiben sie, was sie tun werden, wenn sie keine Antwort erhalten.</li>
        <li>Fragen sie nach, was andere von ihren Plänen für die Lösung des Problems halten.</li>
      </ul>
    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="reply.php?phpLang=de">3. Antworten auf eine Nachricht</a></p>
<?php include_once "../../footer.inc"; ?>


