<?
$title = "F.A.Q. - Relations";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2009/03/14 22:03:57';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="mirrors.php?phpLang=en" title="Fink mirrors"><link rel="prev" href="general.php?phpLang=en" title="General Questions">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 2. Relations with Other Projects</h1>
    
    
    <a name="upstream">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.1: Do you contribute your patches back to the upstream maintainers?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> We're trying to. Sometimes sending patches back is easy and  everyone is happy once the next release of the package is out. Unfortunately with most packages it's not that easy. Some common problems:</p><ul>
          <li>The Fink package maintainer is very busy and doesn't have the time to send the patch and accompanying explanations to the upstream
          maintainers.</li>
          <li>The upstream maintainers reject the patch. There are lots of valid reasons for this. Most upstream maintainers have a strong interest in clean code, clean configure checks, and compatibility with other platforms.</li>
          <li>The upstream maintainers accept the patch, but it takes some weeks or months until they release a new version of their package.</li>
          <li>The package has been abandoned by the original authors and there will be no new releases into which the patch could be merged.</li>
        </ul></div>
    </a>
    <a name="debian">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.2: What is your relation with the Debian project? Are you porting Debian Linux to Mac OS X?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There is no formal relation between Fink and <a href="http://www.debian.org">Debian</a>. Fink is <b>not</b> a port  of the Debian GNU/Linux distribution. We have ported Debian's package management tools (dpkg, dselect, apt-get) though, and use these tools and the .deb binary package format. The actual packages are tailor-made for Mac OS X / Darwin and don't use the Debian source package  format.</p></div>
    </a>
    <a name="apple">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.3: What is your relation with Apple?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> 
          <a href="http://www.apple.com/">Apple</a> is aware of Fink and has given us some support as part of their Open Source relations efforts. In the summer and fall of 2001, they provided us with pre-release seeds of new Mac OS X versions in the hope that Fink packages can be adapted in time for the release. Quote:  <b>"Hopefully it underscores the commitment that many suspect we're not willing to provide. We'll get better at the open source game over time."</b> Thanks Apple!</p></div>
    </a>
    <a name="darwinports">
      <div class="question"><p><b><? echo FINK_Q ; ?>2.4: What is your relation with Darwinports?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Darwinports and Fink are complementary projects. There is some overlap between the two projects, and several people contribute to both the Fink and DarwinPorts projects. For example, Benjamin Reed is doing the KDE packages for both. Darwinports and Fink are free to make use of each other's patches, and we have discussed collaboration on a new dependency engine.</p><p>DarwinPorts started from scratch to try a different approach to a packaging system. Read the statement on <a href="http://darwinports.opendarwin.org/">the DarwinPorts homepage</a>
        for details.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="mirrors.php?phpLang=en">3. Fink mirrors</a></p>
<? include_once "../footer.inc"; ?>


