<?
$title = "i18n - Files";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="i18n Contents"><link rel="next" href="procedure.php?phpLang=en" title="Procedure for Updating Documents"><link rel="prev" href="intro.php?phpLang=en" title="Introduction">';

include_once "header.inc";
?>

<h1>i18n - 2 The Documentation Files</h1>
    
    
    
      <p>The purpose of this chapter is to introduce you to the Fink
      documentation files, how to access them, and how to send changes to the
      Fink website and activate them.</p>
    
    <h2><a name="requirements">2.1 Requirements</a></h2>
      
      <p>To work on the documentation files as a member of a translation team,
      you need:</p>
      <ul>
        <li>A CVS client to allow you to download the documentation from the
        Fink xml tree.</li>
        <li>A UTF-8 compatible text editor--a dedicated XML editor is a plus,
        since many of the files on the Fink website are generated from XML
        files.</li>
        <li>A checkout of the Fink xml tree, as per the <a href="#acquiring">instructions</a> below.</li>
        <li>Working knowledge of Fink is also beneficial.</li>
      </ul>
      <p><b>Note:</b> "team member" is defined as someone who translates but
      is not ultimately responsible for uploading files to the Fink
      website.</p>
      <p>Team leaders must meet the above requirements, but should also
      have:</p>
      <ul>
        <li>A SourceForge account (free registration).</li>
        <li>Commit access to the Fink documentation tree. To get this, send a
        message to the fink-18n mailing list, letting them know your
        SourceForge username. One of the i18n Core Team will make the
        arrangements for you to have CVS access to the documentation
        section.</li>
      </ul>
      <p><b>Note: </b>a "team leader" is here defined as a person who is
      responsible for actually uploading changed files to the Fink website and
      activating those changes.</p>
    
    <h2><a name="setting-up">2.2 Environment Settings</a></h2>
      
      <p>You will want to set up your
      environment to save you some typing later on. The ensuing discussion
      assumes that you are using the built-in command-line tools on Mac OS X or
      another Unix-like OS.</p>
      <ol>
        <li><b>Team leaders only</b>: Modify your login files to add the CVS_RSH environment
        variable.<ol>
            <li>If you are using <code>bash</code> or
            <code>zsh</code> add the following:
            <pre>export CVS_RSH=ssh</pre>
            to your <code>.profile</code>.</li>
            <li>If you're using <code>tcsh</code> add the
            following:
            <pre>setenv CVS_RSH ssh</pre>
            to your
            <code>.cshrc</code>. <p>This will tell
            <code>cvs</code> to use ssh to gain access to the files.
            This is required.</p></li>
          </ol></li>
        <li><b>All members</b>: Create a file called .cvsrc in your home directory with the
        following line in it:
        <pre>cvs -z3</pre>
        By doing this, CVS
        will use level 3 compression by default (it's a good thing!)</li>
      </ol>
      <p>After these operations make sure to start a new terminal window to
      make sure your CVS_RSH environment is set.</p>
    
    <h2><a name="acquiring">2.3 Acquiring Files to Work on</a></h2>
      
      <p>For now, you must check out the xml branch of the web site:</p>
      <ol>
        <li>Open a terminal</li>
        <li>Create a directory somewhere to contain the Fink xml branch, e.g:
        <pre>mkdir -p ~/Documents/Fink-i18n</pre></li>
        <li>Move to that directory: 
        <pre>cd ~/Documents/Fink-i18n</pre></li>
        <li><b>For non-leader team members (or leaders awaiting access):
        </b>Login to cvs.sourceforge.net anonymously: <ol>
            <li>
            <pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login</pre></li>
            <li>Push the enter key (no password, anonymous as default)</li>
            <li>Check out the xml module: 
            <pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co xml</pre></li>
          </ol><b>Team leaders: </b>Check out using your username:<ol>
            <li>You don't have to do the login step above, but can go right
            to
            <pre>cvs -d:ext:yourusername@cvs.sourceforge.net:/cvsroot/fink co xml</pre>
            where <b>yourusername</b> is of course your
            SourceForge username.  You may get a message about the DSA key of the server
            being unknown. Go ahead and answer yes.</li>
            <li>In this case you should enter your SourceForge passphrase at the
            prompt.</li>
          </ol></li>
      </ol>
    
    <h2><a name="file-standards">2.4 File Standards</a></h2>
      
      <p>There are two different file standards you will have to be concerned
      with as a translator:</p>
      <ol>
        <li><b>Static (PHP only)</b> <p>These are documents whose
        organization (e.g. item numbering) isn't expected to change much on a
        day-to-day basis. In this case the document just has a PHP file, which
        you will translate.</p></li>
        <li><b>Dynamic (XML generates PHP and HTML)</b> <p>These documents
        (e.g. the FAQ) are updated and restructured more often, so they need
        the facility to be reorganized dynamically. Such documents use an XML
        file as the basis by which PHP and HTML files are generated, via a
        script. As a translator, your responsibility is to translate the XML
        file.</p></li>
      </ol>
    
    <h2><a name="updating">2.5 Update to latest revision</a></h2>
      
      <p>Since other translators will change some files (don't be afraid about
      that, CVS can take good care of it) after you checked out the files, it
      is a good idea that you update your working copy to the latest revision
      frequently. For updating, you can:</p>
      <ol>
        <li>Move to the directory that contains the files you checked out,
        e.g: 
        <pre>cd ~/Documents/Fink-i18n/xml</pre></li>
        <li>Update it, e.g:
        <pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink update -dP</pre>
        for team members without commit access,
        or
        <pre>cvs update -dP</pre>
        for team leaders.</li>
      </ol>
      <p>You may find a letter in front of one or more of the filenames when
      you do this. Consult the <a href="appendix.php?phpLang=en">Appendix</a> for
      more information, as well as the cvs man page.</p>
    
    <h2><a name="initial-translation">2.6 Initial Translation</a></h2>
      
      <p>The files to translate, in order of priority, are:</p>
      <p>Title (English version file)</p>
      <ol>
        <li>Constants file (<code>xml/web/constants.*.inc</code>)(see
        below)</li>
        <li>Static PHP files (e.g. <code>xml/web/*.en.php</code>)</li>
        <li>User's Guide (<code>xml/uguide.en.xml</code>)</li>
        <li>FAQ (<code>xml/faq.en.xml</code>)</li>
        <li>Running X11 (<code>xml/x11/x11.en.xml</code>)</li>
        <li>Document Index (<code>xml/doc/doc.en.xml</code></li>
        <li>Packaging (<code>xml/packaging/packaging.en.xml</code>)</li>
        <li>Porting (<code>xml/porting/porting.en.xml</code>)</li>
        <li>News (<code>xml/news/news.xml</code>)</li>
      </ol>
      <p>The <code>constants.*.inc</code> files are intended to deal
      with hard coded items in the PHP include files. They are mostly menu
      items and such, located on top and left of the pages. You should
      separate them from the scripts and create a constants.xx.inc file for your language. To do this, just issue the following command in a terminal window:</p>
      <pre>cp constants.fr.inc constants.xx.inc</pre>
      <p>where xx is your language code (e.g.: de for German language).
      Next, you'll want to translate the single quoted part of the define lines into your language. In case you don't understand French, here is the translation into English:</p>
      <pre>
/* The Sections. Used in Menu Navigation Bar */ 
define (FINK_SECTION_HOME, 'Home'); 
define (FINK_SECTION_DOWNLOAD, 'Download');
define (FINK_SECTION_PACKAGE, 'Packages'); 
define (FINK_SECTION_HELP, 'Help'); 
define (FINK_SECTION_FAQ, 'F.A.Q.'); 
define (FINK_SECTION_DOCUMENTATION, 'Documentation'); 
define (FINK_SECTION_MAILING_LISTS, 'Mailing Lists'); 
      
/* The Home Subsections. Used in Menu Navigation Bar */ 
define (FINK_SECTION_HOME_INDEX, 'Index'); 
define (FINK_SECTION_HOME_NEWS, 'News'); 
define (FINK_SECTION_HOME_ABOUT, 'About'); 
define (FINK_SECTION_HOME_CONTRIBUTORS, 'Contributors'); 
define (FINK_SECTION_HOME_LINKS, 'Links'); 
      
/* The word 'Sections'. Used in Menu Navigation Bar */ 
define (FINK_SECTIONS, 'Sections'); 
      
/* Contents as Table of Contents. Used in FAQ/Documentation Sections */ 
define (FINK_CONTENTS, 'Contents');

/* Printer */
define (FINK_PRINTER, 'Printer');
define (FINK_PRINT_VERSION, 'Print Version');

/* Footer */
define (META_KEYWORDS, 'Mac OS X, Fink, Debian, Macintosh, Apple, UNIX, Open Source,
             download, free software, port, development, package management');
define (META_DESCRIPTION, 'The Fink project wants to bring the full world of Unix Open
             Source software to Darwin and Mac OS X. We modify Unix software so that it 
             compiles and runs on Mac OS X and make it available for download as a coherent
             distribution.');
define (HEADER_HOSTED_BY, 'Hosted by {img}');
define (FOOTER_AVAILABLE_LANGUAGES, 'Available Languages');
define (FOOTER_GENERATED_DYNAMICALLY, 'Generated dynamically from');
define (FOOTER_DATABASE_LAST_UPDATED, 'Last updated: %x %X');
define (FOOTER_LAST_CHANGED, 'Last changed by {author} on %a, %d %b %Y,  %R %Z');
</pre>
<p><b>Note:</b> the first lines of Footer section have been splitted for display purpose, do not split them in the file.</p>
      <p>When you translate, you normally follow the steps as below (suppose
      you are translating the Running X11 document into
      French):</p>
      <ol>
        <li>Copy the xml file 
        <pre>cp x11.en.xml x11.fr.xml</pre></li>
        <li>Edit the line to declare it is French and its encoding is UTF-8
<pre>&lt;?xml version='1.0' encoding='utf-8' ?&gt; ...
&lt;document filename="index" lang="fr" &gt; ...</pre></li>
        <li>Save as UTF-8 Be aware that the encoding must be utf-8 and take
        care not to change anything but true text.</li>
        <li>Once you are done, or just to test it, edit the
        <code>Makefile</code> to include your language as:
        <pre>LANGUAGES = en ja fr include $(basedir)/Makefile.i18n.common</pre> 
        <p>then type
        <code>make</code> in the directory. This should generate your PHP (and
        possibly some other) files as well as other files matching the languages in the Makefile.</p></li>
      </ol>
      <p>Note: If you see some misspelling or errors in the English file,
      don't change it, but instead report it instead to the <a href="http://fink.sourceforge.net/lists/fink-i18n.php">fink-i18n
      list</a>, so that the master English file is changed.</p>
    
    <h2><a name="check-work">2.7 Check Your Work</a></h2>
      
      <p>Before your work gets uploaded onto the Fink website, you should
      check how the documents look.</p>
      <ul>
        <li><b>The easy way: </b>Open the HTML and PHP files in your web
        browser. PHP files won't look exactly like you see them on the
        website, however.</li>
        <li><b>The best way: </b>You can use your built in web server to view
        your documents as they will appear as it will on Fink's website.
        Assuming that you are using the built-in server:<ol>
            <li>Edit <code>/etc/httpd/httpd.conf</code>, e.g.
            via:
            <pre>sudo pico /etc/httpd/httpd.conf</pre></li>
            <li>Look for a line that says:
            <pre>#LoadModule php libexec/httpd/libphp4.so</pre>
            and remove the #</li>
            <li>Look for a line that says:
            <pre>#AddModule mod_php4.c</pre>
            and remove the #</li>
            <li>If you are running a version of Apache older than the built-in
            one for Panther then you may also have to look for a line that
            looks like
            <pre>AddType application/x-httpd-php .php</pre>
            and put a # in front of it.</li>
            <li>Save the file and exit your editor.</li>
            <li>Start Personal Web Sharing in System Preferences--if it's
            already running then turn it off and back on again.</li>
            <li>The easiest way to make everything visible is to move your
            checkout of the <code>xml </code>Tree into the
            <code>Sites </code>folder in your Home folder. You can
            then open the homepage in your web browser at the following
            URL:
            <pre>http://127.0.0.1/~<b>USERNAME</b>/xml/web/index.php</pre>
            where
            <code>USERNAME </code> should be replaced by your username.</li>
          </ol></li>
      </ul>
    
    <h2><a name="change-checkout">2.8 When You Get Commit Access (Team Leaders)</a></h2>
      
      <p>Once you have been given commit access, you should</p>
      <ul>
        <li>Set up an SSH key for your SourceForge account.<ol>
            <li>Set the key up on your machine following the <a href="http://sourceforge.net/docman/display_doc.php?docid=761&amp;group_id=1#keygenopenssh">instructions</a>
            from SourceForge.</li>
            <li>Type in the terminal: 
            <pre>cat ~/.ssh/id_dsa.pub | pbcopy</pre>
            This will copy the contents of the file directly
            to your pasteboard, to avoid spurious linebreaks. Make sure not to
            copy anything else to the pasteboard until you're done.</li>
            <li>Log in to your account on SourceForge.</li>
            <li>Select "Account Options"</li>
            <li>Go to the "Host Access Information" area, and click on "Edit
            SSH Keys for Shell/CVS"</li>
            <li>Click on the form and use Cmd-A, Cmd-V</li>
            <li>Click the button.</li>
          </ol></li>
        <li>Check out the <code>xml </code>tree using your username.<ol>
            <li>If you checked out the whole <code>xml </code>tree
            initially, then you should rename your local copy. You can use the
            Finder for this.</li>
            <li>Move to that directory in a terminal window: 
            <pre>cd ~/Documents/Fink-i18n</pre></li>
            <li>Do the checkout of the xml tree:
            <pre>cvs -d:ext:yourusername@cvs.sourceforge.net:/cvsroot/fink co xml</pre>
            where <b>yourusername</b> is of course your
            SourceForge username. Enter your passphrase where prompted.</li>
            <li>Copy the files that you were working on from your old tree to
            the new one. Feel free to use the Finder, making sure that they go
            in the same subfolder as they were initially.</li>
          </ol></li>
      </ul>
    
    <h2><a name="committing">2.9 Committing the Changes (Team Leaders)</a></h2>
      
      <p>Now you need to send your changes to the main server. To do this you
      need to make sure that you have commit access. You also should make sure
      that you are always using the latest version of XSLT in unstable tree,
      which is <code>libxslt-1.1.4-1</code> from Fink as the time of
      writing this document.</p>
      <p>The procedure is different according to the nature - static or
      dynamic - of the documents:</p>
      <ul>
        <li><b>Static: </b>(PHP files only) To commit these documents do the
        following: <ol>
            <li>Open a terminal.</li>
            <li>Move to the directory that contains the file you want to check
            in, e.g: 
            <pre>cd ~/Documents/Fink-i18n/xml/web</pre>
            <p>if you created your <code>xml</code> tree under
            <code>Documents/Fink-i18n/</code> in your home folder, and
            you want to commit a PHP file from the xml/web directory.</p></li>
            <li>If the file is a new one that you've created, then you need to
            add it to the list of files, e,g.:
            <pre>cvs add download.ru.php</pre>
            Give your SourceForge passphrase at the
            prompt.<p>If the file already
            exists, you can skip to the next step.</p></li>
            <li>Commit the file, e.g. in the prior example:
            <pre>cvs ci -m "message" download.ru.php</pre>
            where once again
            <b>message </b>should indicate what you've done. Give your
            SourceForge passphrase at the prompt. 
            <p>Note: you can commit multiple files at once.</p></li>
          </ol></li>
        <li><b>Dynamic: </b>(XML and PHP) After you've modified the XML
        file, do the following:<ol>
            <li>Open a terminal</li>
            <li>Move to the directory that contains the file you've added or
            modified, e.g.
            <pre>cd ~/Documents/Fink-i18n/xml/faq</pre>
            if you've been working on
            the FAQ.</li>
            <li>Now run
            <pre>make check</pre>
            To ensure that the
            file is valid.</li>
            <li>If the XML file is a new one that you've created, then you
            need to add the XML file and its Makefile (assuming, of course,
            that you edited it to create the files for your language) to the
            list of files, e,g.: <pre>cvs add faq.ru.xml Makefile</pre> You'll need to give your SourceForge
            passphrase.<p>If the file already exists, you can skip to the next
            step.</p></li>
            <li>Commit the files, e.g.: <pre>cvs ci -m "message" faq.ru.xml Makefile</pre> <p> where <b>message</b> is a
            descriptive message about what you've done. Enter your SourceForge
            passphrase at the prompt.</p></li>
            <li>Now run <pre>make &amp;&amp; make install</pre></li>
            <li>Move into your copy of the Fink xml tree, e.g: <pre>cd ~/Documents/Fink-i18n/xml</pre> <p>if you created your
            <code>xml</code> tree under
            <code>Documents/Fink-i18n/</code> in your home
            folder.</p></li>
            <li>If the XML file was new, you'll need to do some more CVS
            adding. For example, if you have been working on the FAQ, then,
            you'll want to run (e.g.):
<pre>cvs add web/faq/index.en.php web/faq/general.ru.php \ 
web/faq/relations.ru.php web/faq/usage-fink.ru.php \ 
web/comp-general.ru.php web/faq/comp-packages.ru.php \ 
web/faq/usage-general.ru.php web/faq/usage-packages.ru.php \ 
web/faq/upgrade-fink.ru.php web/faq/mirrors.ru.php \ 
web/faq/faq.ru.html web/faq/header.ru.inc \ 
scripts/installer/dmg/faq.ru.html</pre>
For other
            documents, the files will of course be different--use whatever
            gets created for your language when you run <code>make
            install</code>.</li>
            <li>Don't forget to add and commit any file you've created (be it constants.xx.inc, header.xx.inc, nav.xx.inc, etc.)
          <p>If the file already exists, you can
            skip to the next step.</p></li>
            <li>Commit the whole tree:
            <pre>cvs ci -m "message"</pre>
            <p>Where once again <b>message</b> is a
            descriptive log message (you may want to use the same one as when
            you committed the XML file). Enter your SourceForge passphrase at
            the prompt.</p><p>The reason that you have to do two
            commits in this case is that it's required to ensure that the
            files show the correct creation time and person who last modified
            them.</p></li>
          </ol></li>
      </ul>
    
    <h2><a name="website">2.10 Update our website</a></h2>
      
      <p>Want to see your efforts from our website right now? Just do the
      following:</p>
      <ol>
        <li>Open a terminal</li>
        <li>log in web server via ssh: 
        <pre>ssh username@shell.sourceforge.net</pre>
        You'll need to give your
        SourceForge passphrase.</li>
        <li>Move to the directory which contains our web pages: 
        <pre>cd /home/groups/f/fi/fink/htdocs</pre></li>
        <li>update the website from CVS:
        <pre>./update.sh</pre><b>Important note:</b> when you do
        this you will activate <b>everything</b> that's been placed in
        <code>web/xml</code>.</li>
        <li>log out from web server: <pre>exit</pre></li>
        <li>See your efforts: <pre>open http://fink.sourceforge.net/</pre></li>
      </ol>
    
  <p align="right">
Next: <a href="procedure.php?phpLang=en">3 Procedure for Updating Documents</a></p>

<? include_once "footer.inc"; ?>
