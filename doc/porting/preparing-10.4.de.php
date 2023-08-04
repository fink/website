<?php
$title = "Porting - Vorbereitungen für 10.4";
$cvs_author = 'Author: k-m_schindler';
$cvs_date = 'Date: 2015/03/10 22:48:59';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Porting Contents"><link rel="prev" href="preparing-10.3.php?phpLang=de" title="Vorbereitungen für 10.3">';


include_once "header.de.inc";
?>
<h1>Porting - 6. Vorbereitungen für 10.4</h1>
    
    
    <h2><a name="perl">6.1 Perl</a></h2>
      
      <p>
        <code>/usr/bin/perl</code> ist jetzt perl 5.8.6; die
        Architektur ist immer noch "darwin-thread-multi-2level".
      </p>
    
    <h2><a name="typedef">6.2 Neue Definitionen von Symbolen</a></h2>
      
      <p>
        Unter Mac OS X 10.4 hat sich der Typ vieler Symbole geändert. Haben sie
        früher einen Typ explizit gesetzt, indem sie z. B.
        <code>socklen_t</code> als <code>int</code> definierten, dann ist das
        möglicherweise nicht mehr korrekt.
      </p>
    
    <h2><a name="system-libs">6.3 Neue Systembibliotheken</a></h2>
      
      <p>
        Die Funktion <code>poll()</code> war in Mac OS X 10.3 tatsächlich eine
        emulation und mittels <code>select()</code> implementiert. In Mac OS X
        10.4 ist <code>poll()</code> eine echte Funktion, die im Kernel
        implementiert ist. Sie funktioniert aber nicht mit Sockets. Es ist deshalb
        besser, die Funktion <code>poll()</code> des Systems komplett zu
        ignorieren. Das Paket glib2 aus Fink wurde gepatched und enthält eine
        voll funktionsfähige Emulation. Deshalb ist es bessser, die
        poll-ähnlichen Funktionen aus dieser Bibliothek zu verwenden.
      </p>
    
  
<?php include_once "../../footer.inc"; ?>


