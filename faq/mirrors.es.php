<?
$title = "P.M.F. - Espejos";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2008/05/02 04:41:49';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="P.M.F. Contents"><link rel="next" href="upgrade-fink.php?phpLang=es" title="Upgrading Fink (version-specific troubleshooting)"><link rel="prev" href="relations.php?phpLang=es" title="Relaciones con Otros Proyectos">';


$i18n_chapter = 'mirrors';
include_once "../i18n_showform.inc";
include_once "header.es.inc";
?>
<h1>P.M.F. - 3. Espejos de distribución</h1>
    
    
    <? $i18n_section= "when-use"; ?><a name="when-use">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.1: ¿Qué son los espejos de distribución?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Fink mirrors are rsync servers mirroring the current and stable description files that Fink uses to build packages from source.</p><? show_form (); ?></div>
    </a>
    <? $i18n_section= "why"; ?><a name="why">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.2: Por qué debería de usar espejos rsync?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Rsync is a very fast protocol. It will update the description files faster than the old CVS update method. Furthermore, CVS updates are  always done from sourceforge.net while rsync updates can be done from a mirror close to you.</p><? show_form (); ?></div>
    </a>
    <? $i18n_section= "where"; ?><a name="where">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.3: ¿Dónde podría encontrar mas información acerca de los espejos Fink?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> All Fink mirrors are consolidated under the finkmirrors.net domain. The Web-Site at http://finkmirrors.net/ has more information.</p><? show_form (); ?></div>
    </a>
    <? $i18n_section= "when-not"; ?><a name="when-not">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.4: No me puedo conectar a un servidor espejo rsync, ¿qué debo hacer?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Sometimes very strict firewalls forbid you to connect to rsync services. If that is the case simply continue using the CVS  method</p><? show_form (); ?></div>
    </a>
    <? $i18n_section= "otherinfogone"; ?><a name="otherinfogone">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.5: Me he cambiado al método rsync y todos los archivos de información de los árboles sin usar han desaparecido</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is normal. The rsync update method will only update your active tree, e.g. 10.3, and it will also delete the CVS subdirectories.</p><? show_form (); ?></div>
    </a>
    <? $i18n_section= "howswitch"; ?><a name="howswitch">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.6: ¿Cómo puedo ir y venir entre los dos métodos?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> By using fink selfupdate-rsync or fink selfupdate-cvs to switch to rsync or CVS, respectively.</p><? show_form (); ?></div>
    </a>
    <? $i18n_section= "status"; ?><a name="status">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.7: ¿Cómo puedo ver cual es el estatus actual de los espejos rsync?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Yes, go to http://finkmirrors.net/status.html</p><? show_form (); ?></div>
    </a>
    <? $i18n_section= "Master"; ?><a name="Master">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.8: ¿Qué es un servidor espejo de archivos de distribución?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Sometimes it is hard to fetch a certain version of sources from the Internet. Distfile mirrors hold and mirror the source packages needed by fink to build its source packages.</p><? show_form (); ?></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade-fink.php?phpLang=es">4. Upgrading Fink (version-specific troubleshooting)</a></p>
<? include_once "../footer.inc"; ?>


