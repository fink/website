<?
$title = "i18n - Updating";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/16 02:15:04';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="i18n Contents"><link rel="next" href="resources.php?phpLang=en" title="Additional Resources           "><link rel="prev" href="files.php?phpLang=en" title="The Documentation Files">';


include_once "header.en.inc";
?>
<h1>i18n - 3. Procedure for Updating Documents</h1>
    
    
    
      <p>Since the English documentation is the baseline, it must be updated
      first. Such an update may come from a member of the i18n team (e.g. the
      English Documentarians) or directly from the core developers.</p>
      <p>In order that things go smoothly, the following procedures should be
      followed:</p>
    
    <h2><a name="call-to-translate">3.1 Call to Translate</a></h2>
      
      <p>If a new document is posted, or changes are made in the English documentation, a message should be posted to the
      fink-18n list informing all translators of the fact. The message will
      contain the following:</p>
      <ul>
        <li>A note in the subject line indicating that this is a request for
        translation, e.g. "[translation]", or "[translation-delayed]" for items
        where the English documentation is going online with a delay.</li>
        <li>In addition, the filename of the base file should be included
        somewhere in the message.</li>
        <li>A full diff, e.g.: 
        <pre>diff -Nru3 -r<b>last_revision</b> r<b>head</b> </pre>
        to show the modifications in context.</li>
      </ul>
      <p>Note: since committing the XML file automatically produces a message
      on fink-commits that meets all of these criteria, an easy thing to do is
      to forward such a message and re-title the subject. However, this will
      fail if many changes were made.</p>
    
    <h2><a name="doc-updates">3.2 New Document</a></h2>
      
      <p>The English version of the document is <a href="files.php?phpLang=en#committing">committed</a> and <a href="files.php?phpLang=en#website">activated</a>, and it is <a href="#new-translations">translated</a> as below.</p>
    
    <h2><a name="new-translation">3.3 New Translations</a></h2>
      
      <p>The language team leader (or someone else with CVS access) will <a href="files.php?phpLang=en#committing">commit</a> and <a href="files.php?phpLang=en#website">activate</a> each document as it becomes ready.</p>
      <p>This classification includes:</p>
      <ul>
        <li>The first time a translation is made of an existing document.</li>
        <li>Partial translations of an existing document.</li>
        <li>Translation of a new English document</li>
      </ul>
    
    <h2><a name="prompt-update">3.4 Prompt Update to Existing Documentation</a></h2>
      
      <p>The base English documentation is <a href="files.php?phpLang=en#committing">committed</a> and <a href="files.php?phpLang=en#website">activated</a> immediately--whomever changed the XML should commit the HTML and PHP, and do the activation. The
      translation teams then update their versions, <a href="files.php?phpLang=en#committing">commit</a><b> all</b> of the files (XML and
      PHP), then <a href="files.php?phpLang=en#activate">activate</a> the
      changes.</p>
      <p><b>Never</b> change a  dynamically generated php file; change the xml file instead.</p>
      <p><b>Check</b> that the cvsid line near the beginning of an xml file is not splitted.</p>
      <p><b>Notes:</b></p>
      <ol>
        <li>Changes to the Internationalization HOWTO (this document) will
        <b>always</b> be made on this schedule, because such changes affect all
        translation teams.</li>
        <li>Changes to the static documents (PHP files not generated from XML)
        will <b>always</b> be made on this schedule as well, because it's hard to <a href="#delayed-update">delay</a> their activation.</li>
      </ol>
    
    <h2><a name="delayed-update">3.5 Delayed Update to Existing Documentation (XML-generated files only)</a></h2>
      
      <p>In this case, the English version of the XML file is <a href="files.php?phpLang=en#committing">committed</a>, but <b>not</b> the
        PHP and HTML files, i.e. stop after step 5 under of Dynamic under <a href="files.php?phpLang=en#committing">2.9</a>. All translators do
        their work and <a href="files.php?phpLang=en#committing">commit</a> <b>only </b>their XML file (i.e. the same as
        for English) within an agreed-upon timeframe. All of the PHP and HTML
        files will be generated, committed, and <a href="files.php?phpLang=en#website">activated</a> simultaneously at an
        agreed-upon time by one person, e.g. someone from the i18n core
        team.</p>
    
    <h2><a name="summary">3.6 For Developers and English Language Documenters</a></h2>
      
      <p>The current policy is that all documents should be updated according to the <a href="#prompt-update">prompt update</a> schedule, unless you have a specific reason to do otherwise.</p>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="resources.php?phpLang=en">4. Additional Resources           </a></p>
<? include_once "../../footer.inc"; ?>



