<a name="20.09.2004  Fink 0.7.1 veröffentlicht"><span class="news-date">20.09.2004: </span><span class="news-headline">Fink 0.7.1 veröffentlicht.</span></a><?php gray_line(); ?>
<p>
Die neueste Fink-Veröffentlichung, Version 0.7.1 (für 10.3), ist jetzt für Source- und Binary-Nutzer verfügbar. Diese Veröffentlichung ist für Panther (10.3) basierende Mac OS X Versionen gedacht. Die 0.6.3-Veröffentlichung bleibt weiterhin für Jaguar (10.2) basierende Mac OS X Versionen verfügbar.
</p>
<p>
Diese neuen Veröffentlichungen umfassen diverse Verbesserungen beim Paketmanager, viele vorher nicht verfügbare binäre Pakete wurden hinzugefügt, wodurch nun im gesamten 1650 binäre Pakete bereit stehen. Dies beinhaltet auch binäre Pakete für KDE 3.1.4 und GNOME 2.4.
</p>
<p>
Um eine neue Fink-Installation zu vollenden, sollten Sie die <link url="http://sourceforge.net/download/index.php?phpLang=de">hier</link> zur Verfügung gestellten Anweisungen befolgen. Sie können Ihre existierende Fink-Installation aktualisieren, indem Sie den <link url="http://sourceforge.net/download/upgrade.php?phpLang=de">hier</link> verfügbaren Anweisungen folgen. Eine komplette Liste der Änderungen von 0.7.0 auf 0.7.1 kann <link url="http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable%26cmp=0%26tree2=0.7.0-stable%26splitoffs=on%26sort=name">hier</link> nachgeschaut werden.
</p>
<p>
Wenn Sie Fragen oder Probleme haben, wenden Sie sich an die Fink-Mailing-Listen. <link url="lists/index.php?phpLang=de">Hier</link> können Sie mehr über sie erfahren.
</p>
<p>
Bitte stellen Sie sicher, dass Sie den <em>passenden Installer</em> für Ihre Plattform verwenden. Fink 0.6.3 lässt sich nur unter Mac OS X 10.2.* installieren, wohingegen Fink 0.7.0 sich nur unter Mac OS X 10.3.* installieren lässt.
</p>
        <p>
Das Fink-Team möchte seinen vielen Mitwirkenden, vielen Helfern und Entwicklern danken, die diese Veröffentlichung ermöglicht haben. Wir danken auch unserer Community für das 130.000-malige herunterladen der 0.7.0-Veröffentlichung. Ohne deren konstanten Unterstützung und deren wertvollen Tipps, wäre Fink nicht da, wo es jetzt ist.
</p>

<a name="23.08.2004  Problems mit XCode 1.5"><span class="news-date">23.08.2004: </span><span class="news-headline">Problems mit XCode 1.5.</span></a><?php gray_line(); ?>
	<p>
In den letzten Tagen wurde berichtet, das einige Fink-Pakete nicht korrekt mit XCode 1.5 kompilieren. Falls Sie noch nicht auf XCode 1.5 aktualisiert haben, empfehlen wir das Sie damit noch warten, bis die Probleme behoben sind.
</p>
<p>
Falls Sie Probleme mit einem Paket haben welches unter XCode 1.2 aber nicht unter XCode 1.5 korrekt kompiliert,
teilen Sie uns dies auf der fink-devel Mailing-Liste mit. (Die gewöhnlichen Symptome sind: Einige Symbole fehlen nach dem Kompilieren mit g++.) Bereits bekannte Pakete die dieses Problem haben: octave, singular-factory, singular-libfac, und wahrscheinlich sdl.
</p>

<a name="2004-08-21  Error in fink-0.22.0"><span class="news-date">21.08.2004: </span><span class="news-headline">Error in fink-0.22.0.</span></a><?php gray_line(); ?>
	<p>
	The fink-0.22.0 package manager, which was available briefly in the 
	unstable tree this past week, had a bug which prevents further
	updating via rsync.  If you installed this version of fink, you
	can recover by running the command 
	<code>fink install fink-0.21.2-1</code> which will downgrade fink
	to the version in the stable tree, and subsequently running
	<code>fink selfupdate</code>
	</p><p>
	If for any reason those commands don't work, go to 
	<link url="http://sourceforge.net/project/showfiles.php?group_id=17203">the 
	fink file release page at sourceforge</link> and download the
	file <code>fink-0.22.1.tar.gz</code> (or a more recent, i.e.,
	higher numbered, version).  Unpack this file with
	<code>tar xfz fink-0.22.1.tar.gz</code> , and then from within the
	fink-0.22.1 directory, run the command <code>./inject.pl</code>
	</p>
	<p>
	The fink team apologizes for the error, and thanks the user 
	community for bringing it to our attention quickly.
	</p>
