<a name="2004-10-15 Workaround for gcc problems."><span class="news-date">2004-10-15: </span><span class="news-headline">Workaround for gcc problems.</span></a><?php gray_line(); ?>
<p>
The version of gcc included with XCode 1.5 is known to produce 
incorrect output from c++ code under certain circumstances.
Fink now has a mechanism to warn users about this, and Fink will soon
refuse
to use the "broken" gcc to compile packages which are known to
have this problem.
</p><p>
If you have already upgraded XCode to version 1.5, there is a workaround,
described <a href="<?php print $root; ?>http://article.gmane.org/gmane.os.apple.fink.beginners/13580"> here </a>
and <a href="<?php print $root; ?>http://article.gmane.org/gmane.os.apple.fink.beginners/14200"> here </a>.
</p><p> If you have not yet upgraded, you should consider remaining with
XCode version 1.2 until the problem has been resolved.
</p>
<a name="2004-09-20 Fink 0.7.1 veröffentlich."><span class="news-date">2004-09-20: </span><span class="news-headline">Fink 0.7.1 veröffentlich.</span></a><?php gray_line(); ?>
<p>
Die neueste Fink-Veröffentlichung, Version 0.7.1 (für 10.3), ist jetzt für Source- und Binary-Nutzer verfügbar. Diese Veröffentlichung ist für Panther (10.3) basierende Mac OS X Versionen gedacht. Die 0.6.3-Veröffentlichung bleibt weiterhin für Jaguar (10.2) basierende Mac OS X Versionen verfügbar.
</p>
<p>
Diese neuen Veröffentlichungen umfassen diverse Verbesserungen beim Paketmanager, viele vorher nicht verfügbare binäre Pakete wurden hinzugefügt, wodurch nun im gesamten 1650 binäre Pakete bereit stehen. Dies beinhaltet auch binäre Pakete für KDE 3.1.4 und GNOME 2.4.
</p>
<p>
Um eine neue Fink-Installation zu vollenden, sollten Sie die <a href="<?php print $root; ?>http://sourceforge.net/download/index.php?phpLang=de">hier</a> zur Verfügung gestellten Anweisungen befolgen. Sie können Ihre existierende Fink-Installation aktualisieren, indem Sie den <a href="<?php print $root; ?>http://sourceforge.net/download/upgrade.php?phpLang=de">hier</a> verfügbaren Anweisungen folgen. Eine komplette Liste der Änderungen von 0.7.0 auf 0.7.1 kann <a href="<?php print $root; ?>http://fink.sourceforge.net/pdb/compare.php?tree1=0.7.1-stable%26cmp=0%26tree2=0.7.0-stable%26splitoffs=on%26sort=name">hier</a> nachgeschaut werden.
</p>
<p>
Wenn Sie Fragen oder Probleme haben, wenden Sie sich an die Fink-Mailing-Listen. <a href="<?php print $root; ?>lists/index.php?phpLang=de">Hier</a> können Sie mehr über sie erfahren.
</p>
<p>
Bitte stellen Sie sicher, dass Sie den <b>passenden Installer</b> für Ihre Plattform verwenden. Fink 0.6.3 lässt sich nur unter Mac OS X 10.2.* installieren, wohingegen Fink 0.7.0 sich nur unter Mac OS X 10.3.* installieren lässt.
</p>
        <p>
Das Fink-Team möchte seinen vielen Mitwirkenden, vielen Helfern und Entwicklern danken, die diese Veröffentlichung ermöglicht haben. Wir danken auch unserer Community für das 130.000-malige herunterladen der 0.7.0-Veröffentlichung. Ohne deren konstanten Unterstützung und deren wertvollen Tipps, wäre Fink nicht da, wo es jetzt ist.
</p>
<a name="2004-08-23 Probleme mit XCode 1.5"><span class="news-date">2004-08-23: </span><span class="news-headline">Probleme mit XCode 1.5</span></a><?php gray_line(); ?>
	<p>
In den letzten Tagen wurde berichtet, das einige Fink-Pakete nicht korrekt mit XCode 1.5 kompilieren. Falls Sie noch nicht auf XCode 1.5 aktualisiert haben, empfehlen wir das Sie damit noch warten, bis die Probleme behoben sind.
</p>
<p>
Falls Sie Probleme mit einem Paket haben welches unter XCode 1.2 aber nicht unter XCode 1.5 korrekt kompiliert,
teilen Sie uns dies auf der fink-devel Mailing-Liste mit. (Die gewöhnlichen Symptome sind: Einige Symbole fehlen nach dem Kompilieren mit g++.) Bereits bekannte Pakete die dieses Problem haben: octave, singular-factory, singular-libfac, und wahrscheinlich sdl.
</p>
	
