<?
$title = "Benutzerhandbuch - Einführung";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/09/28 05:43:09';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Benutzerhandbuch Contents"><link rel="next" href="install.php?phpLang=de" title="Erste Installation"><link rel="prev" href="index.php?phpLang=de" title="Benutzerhandbuch Contents">';


include_once "header.de.inc";
?>
<h1>Benutzerhandbuch - 1. Einführung</h1>
    
    
    <h2><a name="what">1.1 Was ist Fink?</a></h2>
      
      <p>Fink ist eine Distribution von Unix Open Source Software für Mac OS X und Darwin. Es bringt  eine große Auswahl freier Kommandozeilen- und graphischer Software, die für Linux und ähnliche Systeme entwickelt wurde, auf Ihren Mac.</p>
    
    <h2><a name="req">1.2 Voraussetzungen</a></h2>
      
      <p>Auf jeden Fall benötigen Sie:</p>
      <ul>
        <li>
          <p>Ein installiertes Mac OS X System, Version 10.2 oder neuer, oder ein  äquivalentes Darwin-Release. Frühere Versionen beider Systeme werden <b>nicht</b> funktionieren. Siehe unten für mehr Informationen über unterstützte Systeme.</p>
        </li>
        <li>
          <p>Internetzugang. Beide, Quellen- and Binärpakete werden von Internetdownload-Seiten heruntergeladen.</p>
        </li>
      </ul>
      <p>Wenn Sie vorhaben die Quellendistibution (siehe unten) zu nutzen, brauchen Sie außerdem:</p>
      <ul>
        <li>
          <p>Development tools. Unter Mac OS X installieren Sie das Developer.pkg-Paket von der Developer Tools CD. Beachten Sie, dass Sie die Tools der gleichen Mac OS X Version nutzen. Unter Darwin sollten die Tools schon mit der Standardinstallaltion vorhanden sein.</p>
          <p>Es ist dennoch gut die Developer Tools installiert zu haben, auch wenn Sie nicht vorhaben Quellenpakete zu kompilieren. Manche Programme, die mit den Tools installiert werden, sind Mehrzweckwerkzeuge, die von einigen Paketen der Finkdistribution benötigt werden. </p>
        </li>
        <li>
          <p>Geduld. Das Kompilieren mehrerer großer Pakete benötigt Zeit. Ich meine damit Stunden oder sogar Tage.
					</p>
        </li>
      </ul>
    
    <h2><a name="supported-os">1.3 Unterstützte Systeme</a></h2>
      
      <p>
        <b>Mac OS X 10.3</b> ist das Betriebssystem der Wahl für Fink. Alle Entwickler nutzen es und Pakete werden für dieses System getestet. Es wird als "voll unterstützt und getestet" betrachtet, obwohl es noch verstreute Kompilierprobleme mit einzelnen Paketen geben kann.</p>
      <p><b>Mac OS X 10.2</b> wird noch unterstützt, allerdings gibt es für einige neuere Pakete keine 10.2 Versionen.</p>
      <p>
        <b>Mac OS X 10.1</b> wird noch einigermaßen unterstützt. Sie müssen Fink 0.4.1 und keine neuere Version nutzen.
</p>
      <p>
<b>Darwin 7.0.1</b> ist die zu Mac OS X 10.3 korrespondierende Darwin-Version, und <b>Darwin 6.0.2</b> zu Mac OS X 10.2. Sie sollten im allgemeinen funktionieren, sind aber nicht so gut getestet, da die meisten Menschen stattdessen einfach Mac OS X laufen haben. Es kann sein, dass Sie auf Probleme mit Paketen stoßen, die spezielle Features von Mac OS X nutzen - betroffene Pakete schließen XFree86 und womöglich esound mit ein.
</p>
    
    <h2><a name="src-vs-bin">1.4 Quellcode vs. Binärpakete</a></h2>
      
      <p>
Software wird in von Menschen lesbaren Programmiersprachen geschrieben ("entwickelt"); diese Form wird "Quellcode" genannt. Bevor ein Computer ein Programm ausführen kann, muss es in Anweisungen der Maschinensprache umgewandelt werden (unlesbar für die meisten Menschen). Dieser Prozess wird "kompilieren" genannt, und das daraus resultierende Programm heißt "ausführbar" oder "Binary". (Der Prozess wird auch "building" oder "erstellen" genannt, da er normalerweise mehr Schritte als kompilieren umschließt.)
</p>
      <p>
      Wenn Sie kommerzielle Software kaufen, bekommen Sie den Quellcode jedoch nicht zu sehen. Firmen behandeln ihn als ein Betriebsgeheimnis. Sie bekommen nur die ausführbahren Dateien, was heißt, dass Sie keine Möglichkeit haben, das Programm zu modifizieren oder herauszubekommen, was es eigentlich tut, wenn es abläuft.
</p>
      <p>
Anders verhält es sich mit <a href="http://www.opensource.org/">Open Source</a>-Software. Wie der Name andeutet, steht es jedem offen den Quellcode anzugucken oder zu verändern.
Tatsächlich wird die meiste Open Source-Software als Quellcode von seinen Autoren bereitgestellt, und Sie müssen es auf Ihrem Computer kompilieren, um ein ausführbares Programm zu bekommen.
</p>
      <p>
      Fink bietet Ihnen zwei Modelle zur Auswahl an.

Die "Source"-Distribution lädt die originalen Quellen herunter, passt es an Mac OS X und Fink an und kompiliert es auf Ihrem Computer. Dieser Prozess ist vollautomatisiert, aber er benötigt einige Zeit. Die "binary"-Distribtution auf der anderen Seite lädt bereits kompilierte Pakete von Fink-Servern herunter und installiert diese, was Ihnen die Zeit für das Kompilieren spart. Es sogar möglich diese beiden Modell nach Belieben zu vermischen. Der Rest des Handbuchs wird Ihnen zeigen, wie das geht.
</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="install.php?phpLang=de">2. Erste Installation</a></p>
<? include_once "../../footer.inc"; ?>


