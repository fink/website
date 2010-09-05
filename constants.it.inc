<?
/* $Id: constants.it.inc,v 1.6 2010/09/05 10:56:04 gecko2 Exp $ */
// +--------------------------------------------------------------------------+
// | Constants                                                                |
// +--------------------------------------------------------------------------+
// | Copyright (c)                                                            |
// +--------------------------------------------------------------------------+
// | License:  GNU/GPL - http://www.gnu.org/copyleft/gpl.html                 |
// +--------------------------------------------------------------------------+
// | Defines the constants used throughout the Fink website                   |
// | for different human languages                                            |
// |                   (http://www.finkproject.org)                           |
// |                                                                          |
// | usage:    1. read the comments                                           |
// |           2. encoding must be UTF-8 or it will not show properly         |
// +--------------------------------------------------------------------------+

/* The Sections.  Used in Menu Navigation Bar */
define ("FINK_SECTION_HOME", 'Home');
define ("FINK_SECTION_DOWNLOAD", 'Download');
define ("FINK_SECTION_PACKAGE", 'Packages');
define ("FINK_SECTION_HELP", 'Aiuto');
define ("FINK_SECTION_FAQ", 'F.A.Q.');
define ("FINK_SECTION_DOCUMENTATION", 'Documentazione');
define ("FINK_SECTION_MAILING_LISTS", 'Mailing List');

/* The Home Subsections.  Used in Menu Navigation Bar */
define ("FINK_SECTION_HOME_INDEX", 'Indice');
define ("FINK_SECTION_HOME_NEWS", 'Notizie');
define ("FINK_SECTION_HOME_ABOUT", 'Info su Fink');
define ("FINK_SECTION_HOME_CONTRIBUTORS", 'Collaboratori');
define ("FINK_SECTION_HOME_LINKS", 'Links');

/* The word 'Sections'.  Used in Menu Navigation Bar */
define ("FINK_SECTIONS", 'Sezioni');

/* Contents as Table of Contents.  Used in FAQ/Documentation Sections */
define ("FINK_CONTENTS", 'Indice');

/* Printer */
define ("FINK_PRINTER", 'Stampanti');
define ("FINK_PRINT_VERSION", 'Versione per la stampa');

/* Footer */
define ("META_KEYWORDS", 'Mac OS X, Fink, Debian, Macintosh, Apple, UNIX, Open Source,
             download, software libero, port, sviluppo , gestione pacchetti');
define ("META_DESCRIPTION", 'Il progetto Fink vuole portare il mondo del software Unix Open
             Source in Darwin e Mac OS X. Noi modifichiamo software Unix in modo tale che 
             funzioni su Mac OS X e che sia progettato per essere aggiornato tramite download.');
             define ("HEADER_HOSTED_BY", 'Ospitato da {img}');
define ("FOOTER_AVAILABLE_LANGUAGES", 'Lingue disponibili ');
define ("FOOTER_GENERATED_DYNAMICALLY", 'Generato dinamicamente da ');
define ("FOOTER_DATABASE_LAST_UPDATED", 'Ultimo aggiornamento: %x %X');
define ("FOOTER_LAST_CHANGED", 'Ultimo cambiamento {date} su {time} da parte di {author}');
?>
