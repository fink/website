<?
$title = "Security Policy - responses";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/07/02 15:43:26';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Security Policy Contents"><link rel="next" href="sources.php?phpLang=en" title="Incident Sources"><link rel="prev" href="respo.php?phpLang=en" title="Responsibility">';

include_once "header.inc";
?>

<h1>Security Policy - 2 Response times and immediate actions.</h1>
        
        
        
            <p>Response time and actions taken greatly depend on the severity of
                the loss introduced by a particular flaw in the software that
                has been packaged for Fink. In any case the <b>Fink Core
                Team</b> will take immediate action whenever it feels it is
                necessary to protect the Fink user community.</p>
        
        <h2><a name="resptimes">2.1 Response times</a></h2>
            
            <p>Each package should strive to meet the following response times.
                For some types of vulnerabilities the <b>Fink Core Team</b>
                might choose to take immediate action. If that is the case, one
                of the Core Team members will notify the maintainer of the
                package in question. Also, keep in mind that, while we strive to
                meet these response times, Fink is a volunteer effort, and they
                cannot be guaranteed.</p>
            <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Vulnerability</th><th align="left">Repsonse time</th></tr><tr valign="top"><td>remote root exploit</td><td>
                        <p>minimum: <b>immediate</b>; maximum: <b>12</b> hours.</p>
                    </td></tr><tr valign="top"><td>local root exploit</td><td>
                        <p>minimum: <b>12</b> hours; maximum: <b>36</b> hours.</p>
                    </td></tr><tr valign="top"><td>remote DOS</td><td>
                        <p>minimum: <b>6</b> hours; maximum: <b>12</b> hours.</p>
                    </td></tr><tr valign="top"><td>local DOS</td><td>
                        <p>minimum: <b>24</b> hours; maximum: <b>72</b> hours.</p>
                    </td></tr><tr valign="top"><td>remote data corruption</td><td>
                        <p>minimum: <b>12</b> hours; maximum: <b>24</b> hours.</p>
                    </td></tr><tr valign="top"><td>local data corruption</td><td>
                        <p>minimum: <b>24</b> hours; maximum: <b>72</b> hours.</p>
                    </td></tr></table>
        
        <h2><a name="forced">2.2 Forced updates</a></h2>
            
            <p>A member of the <b>Fink Core Team</b> might choose to update a
                package without waiting for the package's maintainer to take
                action. This is called a forced update. Not
                meeting the maximum required response time for a particular
                vulnerability in a Fink package also results in a forced
                update of that package.</p>
        
    <p align="right">
Next: <a href="sources.php?phpLang=en">3 Incident Sources</a></p>

<? include_once "footer.inc"; ?>
