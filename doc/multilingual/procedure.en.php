<?
$title = "i18n - Updating";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="i18n Contents"><link rel="next" href="resources.php?phpLang=en" title="Additional Resources."><link rel="prev" href="files.php?phpLang=en" title="The Documentation Files">';

include_once "header.inc";
?>

<h1>i18n - 3 Procedure for Updating Documents</h1>
    

    

    
      <p>In order that things go smoothly, the following procedures should be
      followed.</p>
    

    <h2><a name="new-translation">3.1 New Translations</a></h2>
      

      <p>When a new language is being translated, we will declare a freeze in
      updating the English and other languages) documentation, so that the
      translation team for the new language doesn't have to worry about having
      a document change on them before they finish it. In such a case, each
      document will be brought online as it is ready, and activated.</p>
    

    <h2><a name="doc-updates">3.2 Content Updates</a></h2>
      

      <p>Since the English documentation is the baseline, it must be updated
      first. Such an update may come from a member of the i18n team (e.g. the
      English Documentarians) or directly from the core developers.</p>

      <p>There are a couple of classifications for documentation updates:</p>

      <ol>
        <li><b>Urgent (security, bugfixes, etc.):</b> The base English
        documentation gets updated immediately, and translators update their
        individual documents and get them online as soon as possible.</li>

        <li><b>Not urgent:</b> In this case, the basic English documentation
        is updated, but not put online immediately. All translators do their
        work and get their version online within a day or two, then all
        versions get put online at the same time.</li>
      </ol>
    

    <h2><a name="call-to-translate">3.3 Call to Translate</a></h2>
      

      <p>Once the English files are done, a message will be posted to the
      fink-18n list informing all translators of the fact. The message will
      contain the following:</p>

      <ul>
        <li>A note in the subject line indicating that this is a request for
        translation, e.g. "[translation]", or "[translation-urgent]" for items
        where the English documentation is going online immediately.</li>

        <li>In addition, the filename of the base file should be included
        somewhere in the message.</li>

        <li>A full diff (e.g. <code>diff -Nru3 -r<b>last_revision</b>
        r<b>head</b> </code>) to show the modifications in context.</li>
      </ul>

      <p>Note: since committing the XML file automatically produces a message
      on fink-commits that meets all of these criteria, an easy thing to do is
      to redirect such a message and re-title the subject.</p>
    

    <h2><a name="translate">3.4 Translation</a></h2>
      

      <p>Now the actual work of translation proceeds. As each document is
      done, it gets committed to CVS.</p>
    

    <h2><a name="activation">3.5 Activating the Changes</a></h2>
      

      <p>There are two options for activating changes:</p>

      <ol>
        <li>For urgent changes, immediately after a document gets done, its
        changes get activated.</li>

        <li>For non-urgent changes, the changes will be activated after all
        language versions of the document are finished.</li>
      </ol>
    
  <p align="right">
Next: <a href="resources.php?phpLang=en">4 Additional Resources.</a></p>

<? include_once "footer.inc"; ?>
