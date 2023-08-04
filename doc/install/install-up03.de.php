<?php
$title = "Installation - Aktualisieren";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=de" title="Installation Contents"><link rel="next" href="install-up02.php?phpLang=de" title="Sauberes Aktualisieren"><link rel="prev" href="install-first.php?phpLang=de" title="Erst-Installation">';


include_once "header.de.inc";
?>
<h1>Installation - 3. Fink aktualisieren</h1>




<p>
Sie können Fink mit dem Kommando „selfupdate“ aktualisieren. Anmerkung: Es gibt
<b>keine</b> Garantie, dass es ausreicht, wenn sie OS X aktualisierten.
</p>


<h2><a name="packman">3.1 Paketmanager aktualisieren</a></h2>
<p>
Führen sie folgendes Kommando aus, um Fink zu aktualisieren:
</p>
<pre>fink selfupdate</pre>
<p>
Dies wird ihre vorhandene Fink-Installation so aktualisieren, dass sie den
neuesten Paketmanager benutzt und sowieso alle essentiellen Pakete. Es wird aber
keine anderen Pakete aktualisieren.
</p>


<h2><a name="update-all">3.2 Pakete aktualisieren</a></h2>
<p>
Die obigen Schritte aktualisieren keine Pakete. Sie stellen nur alles bereit,
was sie dazu brauchen. Der einfachste Weg, die neuen Pakete zu erhalten, ist das
Kommando „update-all“:
</p>
<pre>fink update-all</pre>
<p>
Die aktualisiert alle Paketbeschreibungen auf die neueste Version.
Wenn sie das nicht wollen (z. B. weil es ganz schön lange dauert), dann können
sie einzelne Pakete mit dem Kommando „update“ aktualiseren.
</p>


<p align="right"><?php echo FINK_NEXT ; ?>:
<a href="install-up02.php?phpLang=de">4. Sauberes Aktualisieren</a></p>
<?php include_once "../../footer.inc"; ?>


