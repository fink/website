<?
$title = "Security Policy - Responsibility";
$cvs_author = 'Author: dmalloc';
$cvs_date = 'Date: 2004/07/10 13:51:48';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Security Policy Contents"><link rel="next" href="severity.php?phpLang=en" title="Response times and immediate actions."><link rel="prev" href="index.php?phpLang=en" title="Security Policy Contents">';


include_once "header.en.inc";
?>
<h1>Security Policy - 1. Responsibility</h1>
        
        
        <h2><a name="who">1.1 Who is responsible?</a></h2>
            
            <p>Every Fink package has a Maintainer. The maintainer of a
                particular package can be found by typing <code>fink info
                packagename</code> at the command line prompt. This will return
                a listing with a field similar to this one: Maintainer: Fink
                    Core Group
                &lt;fink-core@lists.sourceforge.net&gt;. The
                maintainer has full responsibility for his/her package(s).</p>
        
        <h2><a name="contact">1.2 Whom shall I contact?</a></h2>
            
            <p>If there are security incidents within a certain piece of
                packaged software, you should notify the maintainer of that
                package as well as the <b>Fink Core Team</b>. The email of the
                maintainer can be found within the packages info, and the email
                of the <b>Fink Core Team</b> is
                fink-core@lists.sourceforge.net </p>
        
        <h2><a name="prenotifications">1.3 Pre-notifications</a></h2>
            
            <p>Serious security incidents in software packaged by Fink might
                require you to pre-notify the maintainer of that package. Since
                it is possible that the maintainer cannot be reached in a timely
                manner, pre-notifications should always also be submitted to the
                    <b>Fink Security Team</b>. Each team members e-mail is
                listed individually later on in this document. Please note that
                fink-core@lists.sourceforge.net is a publically archived mailing
                list, private pre-notifications should <b>never</b> be sent to
                that list.</p>
        
        <h2><a name="response">1.4 Response</a></h2>
            
            <p>Submitted reports about a security incident will be answered by
                the <b>Fink Core Team</b>. Each maintainer is required by Fink
                to acknowledge the reported issue individually. In the unlikely
                event that the maintainer is not available and the maintainer
                has not acknowledged the report within 24 hours, a note should
                be sent to the <b>Fink Core Team</b> informing the team that
                the maintainer might be unresponsive. </p>
            <p>In the event that you attempted to notify the maintainer of the
                package in question but the mail system returned a delivery
                error for that email you should notify the <b>Fink Core
                Team</b> immediately to inform them that the maintainer is
                unreachable and that the package may be updated irrespective of
                the maintainer. </p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="severity.php?phpLang=en">2. Response times and immediate actions.</a></p>
<? include_once "../../footer.inc"; ?>


