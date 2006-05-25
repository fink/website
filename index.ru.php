<?
$title = "Home";
$cvs_author = '$Author: dmrrsn $';
$cvs_date = '$Date: 2006/05/25 16:20:33 $';
$is_home = 1;

$metatags = '<meta name="description" content="Fink, a distribution of Unix software for Mac OS X and Darwin">
<meta name="keywords" content="Mac OS X, Darwin, GNU, Unix, GNOME, KDE, software, distribution, Fink">
';

include dirname(__FILE__) . "/header.inc";
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

<h1>Новости</h1>

<? 
// Include news items 
include dirname(__FILE__) . "/news/news.inc";
?>
 
<div align="right"><a href="<? print $root; ?>news\index.php?phpLang=en">Предыдущие новости ...</a> </div>
 
</td><td>&nbsp;&nbsp;&nbsp;</td><td width="50%">
 
<h1>Статус</h1>
<? 
include dirname(__FILE__) . "/fink_version.inc";
?>

<p>
Версия Fink <? print $fink_version ?>  вышла <? print convert_date_to_locale($release_date) ?> г.  
Данная версия включает пакеты на основе исходного кода и бинарные пакеты, а также бинарный инсталлятор, все из которых 
предназначены для пользователей OS X версии 10.4. 
Версии Fink 0.7.2 (для OS X 10.3), Fink 0.6.4 (для OS X 10.2) и 0.4.1 (для OS X 10.1) также все еще могут быть предоставлены.
</p>

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
<li><a href="lists\index.php">Списки рассылки</a> </li>
<li>CVS (<a href="http://fink.cvs.sourceforge.net/fink/">онлайновый просмотр</a>,
<a href="doc\cvsaccess\index.php">инструкции доступа</a>) </li>
</ul>
<p>
Просим иметь в виду, что для использования некоторых из этих ресурсов (н-р, отчет об ошибках или запрос о
новом пакете) вам надо зарегистрировать свой счет в SourceForge. Если у вас нет такого счета, можно его открыть
бесплатно на сайте <a href="http://sourceforge.net/">SourceForge</a>.
</p>
<!-- start translation -->
<p>Additional resources hosted outside SourceForge include:</p>
<ul>
<li><a href="http://wiki.opendarwin.org/index.php/Fink">The Fink developer wiki</a>, thanks to the generosity of <a href="http://www.opendarwin.org">the OpenDarwin project</a>.</li>
</ul>
<!-- end translation -->

</td></tr></table>

<script type="text/javascript" language="JavaScript" src="http://db3.net-filter.com/script/13500.js"></script>
<noscript><img src="http://db3.net-filter.com/db.php?id=13500&amp;page=unknown" alt=""></noscript>

<?
include dirname(__FILE__) . "/footer.inc";
?>