<?
$title = "Wechsel der Aktualisierungsmethode nach rsync";
$cvs_author = '$Author: k-m_schindler $';
$cvs_date = '$Date: 2014/07/20 12:44:12 $';

include "header.inc";
?>

<h1>Wechsel der Aktualisierungsmethode nach rsync</h1>

<p>
  Als Alternative zur Aktualisierung mit CVS, kann Fink jetzt auch mit
  rsync aktualisiert werden.  Wenn sie allerdings bereits Schwierigkeiten
  mit CVS haben, wird es wahrscheinlich nicht möglich sein, mittels CVS  
  zur Version mit rsync zu aktualisieren.
</p>
<p>
  Bei Schwierigkeiten beim Aktualisieren, sollte sie zuerst den
  Quelltext-Tarball von Fink (Version 0.14.0 oder später) von der 
  <a href="http://sourceforge.net/project/showfiles.php?group_id=17203">Liste  
  der Fink Dateien auf SourceForge</a>
  herunter zu laden.  Verwenden sie <code> tar -xfz </code> um den Tarball
  zu entpacken, wechseln sie dann mit <code>cd</code> in das erzeugte
  Verzeichnis und führen sie das Kommando <code>./inject.pl</code> aus.
</p>
<p>
  Damit sollte der neueste Paketmanager installiert sein.  Führt man das
  Kommando <code>fink selfupdate-rsync</code> aus, wird zur neuen Methode
  gewechselt.  Nach dem Wechsel reicht für eine Aktualisierung ein
  einfaches <code>fink selfupdate</code>
</p>

<?
include "footer.inc";
?>
