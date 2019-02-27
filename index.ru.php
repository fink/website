<?php
$title      = "Home";
$cvs_author = '$Author: nieder $';
$cvs_date   = '$Date: 2019/02/25 22:41:00 $';
$is_home    = 1;

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

<h1><a href="<?php print $rdf_file; ?>" title="Subscribe to my feed, Fink Project News" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbspНовости</h1>

<?php 
// Include news items 
require dirname(__FILE__) . "/news/news.inc";
?>
 
<div align="right"><a href="<?php print $root; ?>news/index.php?phpLang=en">Предыдущие новости ...</a> </div>
 
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">

<h1><a href="http://feeds2.feedburner.com/FinkProjectNews-stable" title="Fink Package Updates (Stable)" rel="alternate" type="application/rss+xml"><img src="img/feed-icon16x16.png" alt="" style="border:0"></a>
&nbsp;Recent Package Updates</h1>

<?php  include "package-updates.inc" ?>

<a href="package-updates.php">more...</a>
</tr><tr valign="top"><td width="50%">
<h1>Статус</h1>
<?php 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Fink currently supports macOS 10.14 (Mojave), macOS 10.13 (High Sierra), 
macOS 10.12 (Sierra), OS X 10.11 (El Capitan), OS X 10.10 (Yosemite), OS X 10.9 (Mavericks), 
and continues to run on older versions of OS X, although
official updates are no longer available for the older versions.
Installation instructions can be found  on our <a href="download/srcdist.php">source
release page</a>.
</p>
<p>Xcode must be installed before Fink.</p>  
<p>
<strong>10.13 and 10.14 Support:</strong> 
10.13 and 10.14 users must install Xcode version 10.1 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 10.1 (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.11 or later from 
<a href="https://www.xquartz.org/">Xquartz.org</a>.</p>
<p>
<strong>10.12 Support:</strong> 
10.12 users must install Xcode version 8.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 6.0 for Sierra (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.11 Support:</strong> 
10.11 users must install Xcode version 7.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 7.0 for El Capitan (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.10 Support:</strong> 
10.10 users must install Xcode version 6.0 or later 
(via a free download from the AppStore, 
or must at least install the Command Line Tools for 
Xcode 6.0 for Yosemite (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.7 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.9 Support:</strong> 
10.9 users must install Xcode version 5.0.1 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 5.0 for Mavericks (installable via <i>xcode-select --install</i>, 
or downloadable from  <a href="http://developer.apple.com">Apple</a>).</p>
<p>If you need X11 you should install Xquartz-2.7.4 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.8 Support:</strong> 
10.8 users must install Xcode version 4.4 or later 
(via a free download from the AppStore; version 5.0.2 is recommended), 
or must at least install the Command Line Tools for 
Xcode 4.4 for Mountain Lion (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences). Note that if you had an 
earlier version of Xcode than 4.3 installed prior to updating from 10.7, you need 
to <b>uninstall</b> the old version first by running 
<i>/Developer/Library/uninstall-devtools</i>. 
You can determine your current version of Xcode by running 
<i>xcodebuild -version</i> .</p>
<p>If you need X11 you should install Xquartz-2.7.2 or later from 
<a href="http://xquartz.macosforge.org/landing/">macosforge.org</a>.</p>
<p>
<strong>10.7 Support:</strong> 
10.7 users must install or update Xcode to version 4.1 or later 
(via a free download from the AppStore), (version 4.6.3 is recommended) or must at least
install the Command Line Tools for 
Xcode 4.3 or later (downloadable from <a href="http://developer.apple.com">Apple</a>
or installable via the Xcode Preferences (4.3 or later).  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall an outdated one, if needed.</p>
<p>We don't support Xquartz on 10.7, so don't remove Apple's official X11.</p>
<p>
<strong>10.6 Support:</strong>
For best results, 10.6 users are
encouraged to upgrade Xcode to version 3.2.6, or to version 4.2.1 if you
paid for a 4.x Developer preview.  Version 4.0.2 is known to have some
bugs in its linker that prevent certain packages from building.  Follow
the instructions in the <strong>10.8</strong> section above regarding how to check your
version and uninstall it, if needed.</p>
<p>We don't support Xquartz on 10.6, so don't remove Apple's official X11.</p>
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
Помимо хостинга данного веб-сайта и скачивания, SourceForge и GitHub
предоставить для проекта следующие ресурсы:
</p>
<ul>
<li><a href="http://sourceforge.net/projects/fink/">Обзорная страница проекта SourceForge </a></li>
<li><a
href="https://github.com/fink/fink/issues">Отчет об ошибках или обзор ошибок</a></li>
<li>
<a href="https://sourceforge.net/p/fink/package-requests/">Запрос о пакете, который находится вне Fink</a> </li>
 <li> <a
 href="https://sourceforge.net/p/fink/feature-requests/">Запрос о параметре, который находится вне fink (программа)</a></li>
 <li><a
 href="https://github.com/fink/fink-distributions/pulls">Предоставление нового пакета Fink (неосновные разработчики)</a></li>
 <li><a
 href="https://github.com/fink/fink/pulls">Предоставление патча для fink (программа)</a></li>
<li><a href="lists/index.php">Списки рассылки</a> </li>
<li>Git (<a href="https://github.com/fink/">онлайновый просмотр</a>,
<a href="doc/gitaccess/index.php">инструкции доступа</a>) </li>
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

<?php
include dirname(__FILE__) . "/footer.inc";
?>
