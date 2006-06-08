<?
$title = "Ч.З.В. - Обновление Fink";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2006/06/08 16:15:56';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="next" href="usage-fink.php?phpLang=ru" title="Инсталляция, использование и поддержка Fink"><link rel="prev" href="mirrors.php?phpLang=ru" title="Зеркала Fink">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 4. Обновление Fink (проблемы, связанные с версиями)</h1>
        
        
        <a name="gcc-0.16.0">
            <div class="question"><p><b><? echo FINK_Q ; ?>4.1: Я только что сделал обновление до 0.16.0 и получил сообщение: "Ваша версия
                    компилятора gcc 3.3 устарела." Что делать?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Начиная с версии Panther, Fink обновлялся для понимания
                    более нового компилятора gcc 3.3. Для того, чтобы
                    поддерживать пользователей как 10.2 (Jaguar), так и 10.3 (Panther),
                    мы требуем, чтобы все пользователи инсталлировали последнее обновление gcc 3.3
                    (Updater за август 2003 г. и инструменты Panther XCode соответственно).
                     Вы получите это предупреждение, если инсталлировали
                    более ранний бета-обновитель XCode для инструментов разработчика Mac OS X 10.2 за декабрь
                    2002 г. Если вы находитесь в 10.2, команда</p><pre>gcc --version</pre><p>должна сообщить, какую версию вы имеете. С 24 октября 2003 г.
                    мы требуем построение 1493 или выше.</p><p>Пользователи 10.2 должны скачать Updater за август 2003 г. с <a href="http://developer.apple.com/">Apple Developer
                    Connection</a> (требуется бесплатная регистрация).</p><p>Пользователи 10.3 должны сделать обновление до версии инструментов
                    разработчика, совместимой с Panther (i.e. XCode). Компакт-диск с XCode должен
                    предоставляться вместе со средствами Panther.</p></div>
        </a>
        <a name="fink-0220">
            <div class="question"><p><b><? echo FINK_Q ; ?>4.2: Я не получал обновлений пакетов от Fink в течение некоторого времени.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Проверьте вашу версию:</p><pre>fink --version</pre><p>Есть известная проблема с <code>fink-0.22.0</code>,
                    где автообновление rsync перестало работать. Для решения этой проблемы
                    перейдите на автообновление CVS через</p><pre>fink selfupdate-cvs </pre><p>Вы получите более позднюю версию <code>fink</code>. После этого
                    рекомендуем перейти обратно на автообновление rsync:</p><pre>fink selfupdate-rsync</pre></div>
        </a>
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=ru">5. Инсталляция, использование и поддержка Fink</a></p>
<? include_once "../footer.inc"; ?>


