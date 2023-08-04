<?php
$title = "F.A.Q. - Übersetzen (2)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="F.A.Q. Contents"><link rel="next" href="usage-general.php?phpLang=de" title="Benutzung von Paketen - Allgemein"><link rel="prev" href="comp-general.php?phpLang=de" title="Probleme beim Übersetzen - Allgemein">';


include_once "header.de.inc";
?>
<h1>F.A.Q. - 7. Probleme beim Übersetzen - Bestimmte Pakete</h1>
    
    
    <a name="libgtop">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.1: Das Übersetzen eines Pakets bricht mit einer Fehlermeldung ab, in der
          <code>sed</code> vorkommmt.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Dieser Fehler kann auftreten, wenn das Login-Skript (also
          <code>~/.cshrc</code>) etwas in ein Terminalfenster schreiben möchte,
          z. B. mit "<code>echo Hello</code>" oder <code>xttitle</code>. Man
          kann den Fehler beheben, in dem man die Zeile auskommentiert oder
          löscht.</p><p>Wollen sie das Echo aber unbedingt behalten, können sie den Fehler
          so abfangen:</p><pre>if ( $?prompt) then
	echo Hello 
endif</pre></div>
    </a>
  <a name="Leopard-libXrandr">
    <div class="question"><p><b><?php echo FINK_Q ; ?>7.2: Ich kann <b>gtk+2</b> auf OS X 10.5 nicht installieren.</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Dieser Fehler geht meistens auf fehlende Bibliotheken zurück, z. B.:
        <code>/usr/X11/lib/libXrandr.2.0.0.dylib</code> oder
        <code>/usr/X11/lib/libXdamage.1.1.0.dylib</code> (oder andere
        Versionen der Bibliotheken in <code>/usr/X11/lib/</code>).</p><p>Derzeit ist die beste Lösung Xcode 3.1.3 oder später zu installieren.</p></div>
  </a>
  <a name="xml-sax-expat">
    <div class="question"><p><b><?php echo FINK_Q ; ?>7.3: Wenn ich ein Paket xml-sax-pm installiere, bekomme ich Fehlermeldungen
        mit <code>_Perl_Gthr_key_ptr</code>.</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Sieht der Fehler so oder so ähnlich aus</p><pre>update-perl5123-sax-parsers: adding Perl SAX parser
module info file of XML::SAX::Expat...
dyld: lazy symbol binding failed: Symbol not found:
_Perl_Gthr_key_ptr
  Referenced from: /sw/lib/perl5/5.12.3/darwin-
  thread-multi-2level/auto/XML/Parser/Expat/Expat.bundle
  Expected in: flat namespace</pre><p>wird meistens ein anderes <code>perl5.12</code> statt das des
        Systems ausgewählt (oder je nach System
        <code>perl5.10.0</code> oder <code>perl5.8.8</code>).</p><p>Sie können dies mit folgendem Befehl überprüfen:</p><pre>type -a perl5.12</pre><p>wenn sie die Shell <code>bash</code> verwenden oder</p><pre>where perl5.12</pre><p>wenn sie die Shell <code>tcsh</code> verwenden (und ersetzen
        sie <code>perl5.12</code> entsprechend ihrer Situation).</p><p>Ein temporäre Lösung ist <code>perl5.12</code> umzubenennen,
        solange sie mit Fink Pakete erstellen.</p></div>
  </a>
  <a name="malloc-symlink">
    <div class="question"><p><b><?php echo FINK_Q ; ?>7.4: Ich kann das Finkpaket <code>gcc</code> wegen "conflicting types for
        'pointer_t'" nicht erstellen.</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Der Fehler sieht meistens so aus:</p><pre>../../gcc-4.6.3/gcc/fortran/module.c:110:1:
error: conflicting types for 'pointer_t'
/usr/include/mach/vm_types.h:40:26:
note: previous declaration of 'pointer_t' was here
make[3]: *** [fortran/module.o] Error 1</pre><p>Das kommt meistens davon, dass unnötigerweise ein Symlink
      <code>/usr/include/malloc.h</code><code>-&gt;</code><code>/usr/include/malloc/malloc.h</code>
      eingerichtet wurde. Löschen sie den Symlink.</p><p>Auf OS X sollte normalerweise statt
        <code>#include &lt;malloc.h&gt;.</code>
        <code>#include &lt;stdlib.h&gt;</code> verwendet werden.</p></div>
  </a>
    <a name="all-others">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.5: Ich habe mit Paketen Probleme, die hier nicht aufgeführt sind.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Da Probleme mit Paketen oft nur vorübergehend sind, haben wir uns
          entschieden, sie auf der Fink Wiki-Seite einzutragen. Schauen sie auf
          der Seite
          <a href="http://wiki.finkproject.org/index.php/Fink:Package_issues"> Package issues page</a>
          nach.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=de">8. Benutzung von Paketen - Allgemein</a></p>
<?php include_once "../footer.inc"; ?>


