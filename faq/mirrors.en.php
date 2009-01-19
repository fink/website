<?
$title = "F.A.Q. - Mirrors";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2009/01/19 22:17:27';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="upgrade-fink.php?phpLang=en" title="Upgrading Fink (version-specific troubleshooting)"><link rel="prev" href="relations.php?phpLang=en" title="Relations with Other Projects">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 3. Fink mirrors</h1>
    
    
    <a name="when-use">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.1: What are Fink Mirrors?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Fink mirrors are rsync servers mirroring the current and stable description files that Fink uses to build packages from source.</p></div>
    </a>
    <a name="why">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.2: Why should I use rsync mirrors?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Rsync is a very fast protocol. It will update the description files faster than the old CVS update method. Furthermore, CVS updates are  always done from sourceforge.net while rsync updates can be done from a mirror close to you.</p></div>
    </a>
    <a name="where">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.3: Where can I find more information about Fink mirrors?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> All Fink mirrors are consolidated under the finkmirrors.net domain. The Web-Site at http://finkmirrors.net/ has more information.</p></div>
    </a>
    <a name="when-not">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.4: I cannot connect to rsync server, what should I do?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Sometimes very strict firewalls forbid you to connect to rsync services. If that is the case simply continue using the CVS  method</p></div>
    </a>
    <a name="otherinfogone">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.5: I have switched to the rsync method now all info files from the unused trees are gone</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is normal. The rsync update method will only update your active tree, e.g. 10.3, and it will also delete the CVS subdirectories.</p></div>
    </a>
    <a name="howswitch">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.6: How can I switch back and forth between methods.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> By using fink selfupdate-rsync or fink selfupdate-cvs to switch to rsync or CVS, respectively.</p></div>
    </a>
    <a name="status">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.7: Can I see what the current status of rsync mirrors is?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Yes, go to http://finkmirrors.net/status.html</p></div>
    </a>
    <a name="Master">
      <div class="question"><p><b><? echo FINK_Q ; ?>3.8: What is a Distfiles mirror?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Sometimes it is hard to fetch a certain version of sources from the Internet. Distfile mirrors hold and mirror the source packages needed by fink to build its source packages.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="upgrade-fink.php?phpLang=en">4. Upgrading Fink (version-specific troubleshooting)</a></p>
<? include_once "../footer.inc"; ?>


