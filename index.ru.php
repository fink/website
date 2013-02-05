<?
$title = "Home";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2013/02/05 23:46:04 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

require dirname(__FILE__) . "/header.inc";
?>

<p>Проект Fink нацелен на перенос всего мира ПО Unix
<a href="http://www.opensource.org/">с открытым исходным кодом</a> в
<a href="http://www.opensource.apple.com/">Darwin</a> и
<a href="http://www.apple.com/macosx/">Mac OS X</a>. 
Мы модифицируем ПО Unix таким образом, чтобы оно могло компилироваться
и работать в Mac OS X ("переносим" его), и обеспечиваем возможность
его скачивания в виде связной дистрибуции.
Fink использует такие инструменты<a href="http://www.debian.org/"> Debian</a>, как dpkg 
и apt-get, для обеспечения эффективного управления бинарными пакетами. 
Выбор за вами: скачать предварительно компилированные бинарные пакеты или построить все начиная от исходного кода.
<a href="about.php">Более подробно...</a> 
</p>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr valign="top"><td width="50%">

<h1><a href="<? print $rdf_file; ?>" title="Subscribe to my feed, Fink Project News" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbspНовости</h1>

<? 
// Include news items 
require dirname(__FILE__) . "/news/news.inc";
?>
 
<div align="right"><a href="<? print $root; ?>news/index.php?phpLang=en">Предыдущие новости ...</a> </div>
 
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Fink Package Updates (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Recent Package Updates</h1>

<?  include "package-updates.inc" ?>

<a href="package-updates.php">more...</a>
</tr><tr valign="top"><td width="50%">
<h1>Статус</h1>
<? 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink currently supports OS X 10.7 (Lion), 10.6 (SnowLeopard), and 10.5 
(Leopard), and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="download/srcdist.php">source
release page</a>.
</p>
<p>XCode must be installed before Fink.</p>
<strong>10.7 Support:</strong>
10.7 users must install or update XCode to version 4.1 or later
(via a free download from the AppStore).  Note that if you installed an
earlier version of XCode prior to updating, you need to <b>uninstall</b>
the old version first, by running
<i>/Developer/Library/uninstall-devtools</i> .
You can determine your current version of XCode by running
<i>xcodebuild -version</i> .</p>
<strong>10.6 Support:</strong>  For best results, 10.6 users are
encouraged to upgrade XCode to version 3.2.6, or to version 4.2.1 if you
paid for a 4.x Developer preview.  Version 4.0.2 is known to have some
bugs in its linker that prevent certain packages from building.  Follow
the instructions in the 10.7 section above regarding how to check your
version and uninstall it, if needed.</p>
<p>
<strong>10.5 Support:</strong>
Users are encouraged to update to OS 10.5.2 or later, via Software Update,
in order to get bugfixes and enhancements for X11.  Further unofficial updates
continue to be made available on the
<a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">XQuartz Update Page.</a>
We are not currently supporting Xquartz on 10.6 or 10.7.<br>
Users should also install Xcode 3.1 or later, preferably 3.1.4, to fix some
known problems in building packages.
</p>
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
<h1>Ресурсы</h1>

<p>
Если вам необходима поддержка, обратитесь к странице <a
href="help/index.php">помощь</a>.
Эта страница также содержит различные опции для содействия проекту и осуществлению обратной связи.
</p>

<p>
Хостинг проекта Fink осуществляет
<a href="http://sourceforge.net/">SourceForge</a>.
Помимо хостинга данного веб-сайта и скачивания, SourceForge
обеспечивает для проекта следующие ресурсы:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">Обзорная страница проекта SourceForge </a></li>
<li><a
href="http://sourceforge.net/tracker/?atid=117203&amp;group_id=17203">Отчет об ошибках или обзор ошибок</a></li>
<li>
<a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Запрос о пакете, который находится вне Fink</a> </li>
 <li> <a
 href="http://sourceforge.net/tracker/?atid=367203&amp;group_id=17203">Запрос о параметре, который находится вне fink (программа)</a></li>
 <li><a
 href="http://sourceforge.net/tracker/?atid=414256&amp;group_id=17203">Предоставление нового пакета Fink (неосновные разработчики)</a></li>
 <li><a
 href="http://sourceforge.net/tracker/?atid=317203&amp;group_id=17203">Предоставление патча для fink (программа)</a></li>
<li><a href="lists/index.php">Списки рассылки</a> </li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">онлайновый просмотр</a>,
<a href="doc/cvsaccess/index.php">инструкции доступа</a>) </li>
</ul>
<p>
Просим иметь в виду, что для использования некоторых из этих ресурсов (н-р, отчет об ошибках или запрос о
новом пакете) вам надо зарегистрировать свой счет в SourceForge. Если у вас нет такого счета, можно его открыть
бесплатно на сайте <a href="http://sourceforge.net/">SourceForge</a>.
</p>
<!-- start translation -->
<p>Additional resources hosted outside SourceForge include:</p>
<ul>
    <li><a href="http://wiki.finkproject.org/">The Fink developer wiki</a> (now at a new location).</li>
    <li>
        <a href="https://github.com/fink/fink">
            New github repository for the source code of the <code>fink</code> package manager.
        </a>
    </li>
    <li>
        <a href="https://github.com/fink/fink-mirrors">
            New github repository for the <code>fink-mirrors</code> package.
        </a>
    </li>
</ul>
<!-- end translation -->

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include dirname(__FILE__) . "/footer.inc";
?>