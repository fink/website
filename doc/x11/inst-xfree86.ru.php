<?php
$title = "Использование X11 - Инсталляция XFree86";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Использование X11 Contents"><link rel="next" href="run-xfree86.php?phpLang=ru" title="Запуск XFree86"><link rel="prev" href="history.php?phpLang=ru" title="История создания продукта">';


include_once "header.ru.inc";
?>
<h1>Использование X11 - 3. Получение и инсталляция XFree86</h1>
        
        
        <h2><a name="fink">3.1 Инсталляция через Fink</a></h2>
            
            <p> Fink позволит вам инсталлировать X11 любым желательным для вас образом, в то же время предоставив
                собственные пакеты XFree86. С помощью команды <code>fink
                    install ...</code> Fink скачает исходный код и скомпилирует
                его на вашем компьютере. Если вы используете <code>apt-get install
                ...</code> или <code>dselect</code>, скачаются предварительно
                скомпилированные бинарные пакеты, аналогичные официальной дистрибуции XFree86.</p>
            <p> Пакет <code>xfree86-base</code> содержит всю XFree86
                4.2.1.1 (4.2.0 для пользователей 10.1), кроме сервера XDarwin. Пакет
                <code>xfree86-rootless</code> является сервером стандартной стабильной
                версии XFree86 4.2.1.1. Он поддерживает как полноэкранную, так и
                бескорневую работу, а также имеет поддержку OpenGL. (Когда-то в самом
                начале у Fink также был пакет <code>xfree86-server</code>,
                обеспечивавший полноэкранный режим, но этой опции больше
                нет.) У вас также есть возможность инсталлировать
                сервер самостоятельно - см. ниже. Только в этом случае надо
                инсталлировать <code>xfree86-base</code>, иначе появится риск, что Fink
                сделает перезапись вашего вручную инсталлированного сервера. Имейте в виду, что текущая
                стабильная версия <code> xfree86-base</code> (4.2.1.1-3)
                генерирует <code>xfree86-rootless</code>,
                <code>xfree86-base-shlibs</code> и
                <code>xfree86-rootless-shlibs</code> в процессе построения.
                При этом вам надо иметь все четыре инсталлированных пакета, чтобы
                настройки XFree86 работали.</p>
            <p>Связные пакеты <code> xfree86-base-threaded</code> и
                <code>xfree86-rootless-threaded</code> по сути являются тем же самым,
                но модифицированы для поддержки связности, требуемой
                несколькими приложениями - такими, как <code>xine</code>.</p>
            <p>XFree86 4.2.11 (несвязная) считается стабильной базовой
                версией XFree86 для использования с Fink в 10.2. Также имеется XFree86 4.3.0,
                но она считается более экспериментальной; на данный момент 
                только она представлена на нестабильном дереве .
                Она имеет интегрированную связную поддержку и работает быстрее, чем 4.2.1.1.
                Для инсталляции этой версии надо инсталлировать пакет
                <code>xfree86</code>. Имейте в виду, что для этой версии
                больше нет отдельных базовых и бескорневых пакетов, хотя
                библиотеки и распределены в <code>xfree86-shlibs</code>. Если
                вы строите бинарные пакеты на основе 4.3, предупреждаем, что они могут
                не работать в 4.2.1.1 или X11 Apple.</p>
            <p>
                <b>Для пользователей 10.3:</b> Вам надо инсталлировать
                4.3.99.16-2 или более позднюю версию, которые являются предварительными выпусками XFree86-4.4.
                Если вы работаете на основе бинарной дистрибуции, убедитесь, что
                описание пакетов обновлено (н-р, через <code>sudo apt-get update</code>).</p>
        
        <h2><a name="apple-binary">3.2 Бинарные файлы Apple</a></h2>
            
            <p> 7 января 2003 г. Apple выпустила <a href="http://www.apple.com/macosx/x11/">специальную реализацию X11
                    на основе XFree86-4.2</a>, включающую визуализацию
                Quartz и ускоренную OpenGL. Следующая новая версия вышла
                10 февраля 2003 г. с дополнительными характеристиками и
                корректировками. Третья версия (Beta 3) вышла 17 марта
                2003 г. с дальнейшими дополнительными характеристиками и корректировками. Эта версия
                может использоваться в Jaguar.</p>
            <p>24 октября 2003 г. Apple выпустила Panther (10.3), включающую
                версию ее дистрибуции X11. Эта версия
                основана на XFree86-4.3.</p>
            <p> Перед использованием бинарных файлов Apple надо удостовериться, что инсталлирован пакет <b>X11
                User</b>, а также <a href="/doc/users-guide/upgrade.php">обновить</a> Fink.</p>
            <p>Для версии <code>fink-0.16.2</code> вам надо будет также инсталлировать пакет
                    <b>X11 SDK</b>. После этого Fink
                создаст виртуальный пакет <code>system-xfree86</code>.</p>
            <p>В случае <code>fink-0.17.0</code> и более поздних версий необходима лишь инсталляция X11 SDK,
                если вы хотите построить пакеты от исходного кода. В подобном случае,
                даже если у вас не будет SDK, будут виртуальные пакеты
                <code>system-xfree86</code> и
                <code>system-xfree86-shlibs</code>, причем последний будет представлять
                общие библиотеки. Если вы инсталлируете SDK,
                также будет пакет <code>system-xfree86-dev</code>,
                представляющий заголовки.</p>
            <p> Если у вас уже инсталлирована дистрибуция XFree86 - через
                Fink или иным образом - можно выполнить <a href="inst-xfree86.php?phpLang=ru#switching-x11">Инструкции
                    по замене одного пакета X11 другим пакетом</a>. Удалите
                существующий пакет, а затем инсталлируйте X11 Apple
                (и X11 SDK, если это необходимо или желательно).</p>
            <p> Некоторые примечания по использованию X11 Apple:</p>
            <ul>
                <li>
                    <p>Пакет <code>autocutsel</code> больше не нужен.
                        Если вы запускаете X11, а этот пакет активирован, надо
                        его дезактивировать.</p>
                </li>
                <li>
                    <p>X11 Apple использует ваш существующий файл
                        <code>~/.xinitrc</code>. Если вы хотите
                        получить полноценный эффект от интеграции Quartz , надо использовать
                        <code>/usr/X11R6/bin/quartz-wm</code> в качестве
                        менеджера окон или полностью удалить
                        <code>~/.xinitrc</code>.</p>
                    <p>Если вам нужна только интеграция копирования в буфер и вставки из него, но при этом вы хотите
                        использовать другой менеджер окон, можно сделать как в
                        следующем примере:</p>
                    <pre>/usr/X11R6/bin/quartz-wm --only-proxy &amp;
                        exec /opt/sw/bin/fvwm2</pre>
                    <p>Разумеется, можно сделать вызов другого менеджера окон, н-р,
                        <code>startkde</code> и т.д.</p>
                </li>
                <li>
                    <p>
                        <code>quartz-wm</code> не полностью поддерживает опции менеджера окон
                        Gnome/KDE, поэтому вы можете столкнуться с его
                        странным поведением в окнах, которые имеют декоративные обрамления, тогда как
                        не должны их иметь.</p>
                </li>
                <li>
                    <p>X11 Apple не признает настройки среды Fink по
                        умолчанию. Для вызова приложений запуска, инсталлированных
                        при помощи fink (н-р, менеджеров окон,
                        gnome-session и других в
                        <code>/opt/sw/bin</code>), внесите следующее
                        в верхней части <code>~/.xinitrc</code> (т.е.
                        после
                        "<code>#!/bin/sh</code>", но
                        перед запуском любой программы):</p>
                    <pre> . /opt/sw/bin/init.sh</pre>
                    <p>чтобы запустить среду Fink. Примечание: лучше использовать
                        <code>init.sh</code>, чем
                        <code>init.csh</code>, поскольку
                        <code>.xinitrc</code> лучше выполняется посредством
                        <code>sh</code>, чем <code>tcsh</code>.</p>
                </li>
                <li>
                    <p>Приложения, требующие для выполнения некоторых своих функций вызова других программ,
                        находящихся в пределах вашего дерева Fink,
                        требуют особого обращения при их вовлечении в работу путем вызова
                        из меню приложений. Вместо добавления одного только
                        полного маршрута к имени файла, н-р:</p>
                    <pre>/opt/sw/bin/emacs</pre>
                    <p>лучше использовать что-то вроде следующего, если
                        вы используете bash в качестве оболочки по умолчанию:</p>
                    <pre>. /opt/sw/bin/init.sh ; emacs</pre>
                    <p>или, если вы используете tcsh:</p>
                    <pre>source /opt/sw/bin/init.csh ; emacs</pre>
                    <p>Это обеспечивает правильный PATH
                        приложения. Можно использовать этот синтаксис для любого
                        приложения, инсталлированного при помощи Fink.</p>
                </li>
                <li>
                    <p>Если вы пытаетесь построить пакет вручную на основе
                        X11 Apple и получаете следующее сообщение об ошибке:</p>
                    <pre>ld: err.o illegal reference to symbol:
                        _XSetIOErrorHandler defined in indirectly referenced
                        dynamic library /usr/X11R6/lib/libX11.6.dylib</pre>
                    <p>надо проверить наличие <code>-lX11</code>
                        в процессе связывания. Просмотрите опции конфигурации своего
                        пакета, чтобы увидеть, как обеспечить этот дополнительный параметр.</p>
                </li>
                <li>
                    <p>Если вы используете пакет <code>xfree86</code> и затем
                        переходите на X11 Apple (10.2.x или 10.3.x), из-за несовместимости бинарных файлов надо заново построить все пакеты,
                        созданные до этого с помощью <code>xfree86</code>.
                        </p>
                </li>
            </ul>
        
        <h2><a name="official-binary">3.3 Официальные бинарные файлы</a></h2>
            
            <p> В проекте XFree86 есть официальная бинарная дистрибуция
                XFree86 4.2.0, которую можно обновить до 4.2.1.1 с патчами.
                Ее можно найти на локальном зеркале <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86
                mirror</a> в каталоге
                <code>4.2.0/binaries/Darwin-ppc-5.x</code>. Убедитесь в получении тарболов
                <code>Xprog.tgz</code> и
                <code>Xquartz.tgz</code>, даже если они отмечены как
                необязательные. Если вы не уверены в том, что именно вам нужно, просто скачайте
                весь каталог. Выполните скрипт
                <code>Xinstall.sh</code> в качестве суперпользователя для
                инсталляции всего материала. (Рекомендуем прочитать <a href="http://www.xfree86.org/4.2.0/Install.html">Официальные инструкции
                </a> перед инсталляцией.) Если хотите, можете
                использовать <a href="http://prdownloads.sourceforge.net/xonx/XInstall_10.1.sit?download">binary</a>
                из XonX, использующий идентичный, но более легкий в применении исходный код. Тем или иным образом
                скачайте, разархивируйте и сделайте следующие обновления:</p>
            <ol>
                <li>для 10.1: <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.1.zip?download">4.2.0
                        -&gt; 4.2.0.1 upgrade</a>. для 10.2: <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.0.1-10.2.zip?download">4.2.0
                        -&gt; 4.2.0.1 upgrade</a>
                </li>
                <li>для 10.1 и 10.2: <a href="http://prdownloads.sourceforge.net/xonx/XFree86_4.2.1.1.zip?download">4.2.0.1
                        -&gt; 4.2.1.1 upgrade</a>
                </li>
            </ol>
            <p>Также существует официальная дистрибуция XFree86 4.3.0 на
                <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86
                    mirrors</a> в каталоге
                <code>4.3.0/binaries/Darwin-ppc-6.x</code>. Убедитесь в получении тарболов
                <code>Xprog.tgz</code> и
                <code>Xquartz.tgz</code>, даже если они отмечены как
                необязательные. Если вы не уверены в том, что именно вам нужно, просто скачайте
                весь каталог. Выполните скрипт
                <code>Xinstall.sh</code> в качестве суперпользователя для
                инсталляции всего материала. (Рекомендуем прочитать <a href="http://www.xfree86.org/4.3.0/Install.html">Официальные инструкции
                </a> перед инсталляцией.) </p>
            <p>Независимо от установленной версии, теперь вы имеете XFree86 с
                сервером для полноэкранного либо бескорневого режима работы в Mac OS X.</p>
        
        <h2><a name="official-source">3.4 Официальный исходный код</a></h2>
            
            <p> Если у вас есть свободное время, можно построить XFree86 4.2.0
               от исходного кода. Исходный код можно найти на локальном зеркале <a href="http://www.xfree86.org/MIRRORS.shtml">XFree86
                mirror</a> в каталоге <code>4.2.0/source</code>. Скачайте все три тарбола
                 <code>X420src-#.tgz</code> и извлеките их
                в одном каталоге. Можно установить собственные настройки для построения,
                внеся макроопределения в
                файл <code>config/cf/host.def</code> на дереве исходного кода XFree86.
                

                
                См. <code>config/cf/darwin.cf</code> для получения подсказок.
                (Прим.: Только макросы с пометкой #ifndef
                могут быть перезаписаны в host.def.)</p>
            <p> Когда конфигурация будет вас удовлетворять, скомпилируйте и инсталлируйте
                XFree86 посредством следующих команд:</p>
            <pre>make World sudo make install install.man</pre>
            <p>Для обновления до 4.2.1.1 надо следовать инструкциям раздела <a href="#official-binary">Официальные бинарные файлы</a>.</p>
            <p>Для инсталляции 4.3.0 надо следовать вышеуказанным инструкциям, заменив
                "2" на "3", но не надо выполнять
                процедуру обновления 4.2.1.1.</p>
            <p> Как и в случае с официальными бинарными файлами, теперь у вас есть XFree86 с
                сервером, который может обеспечивать полноэкранный или бескорневой режим в Mac OS X.</p>
        
        <h2><a name="latest-cvs">3.5 Исходный код на основе последних разработок</a></h2>
            
            <p> Если вы располагаете не только временем, но и запасом нервных клеток, можно
                получить последнюю разработку версии XFree86 из общего хранилища
                CVS. Предупреждаем, что код находится в процессе постоянного
                развития; сегодняшний код обычно отличается от вчерашнего.
                </p>
            <p> Для выполнения инсталляции следуйте инструкциям относительно <a href="http://www.xfree86.org/cvs/">CVS XFree86</a>
                для скачивания модуля <code>xc</code>.
                Затем надо выполнить инструкции по построению, указанные выше.</p>
        
        
        <h2><a name="macgimp">3.6 MacGimp</a></h2>
            
            <p> Скачиваемый инсталлятор, предложенный разработчиками MacGimp
                в 2001 г., не содержал XFree86. (Впрочем, он сделал бы
                перезапись некоторых файлов конфигурации XFree86.)</p>
            <p> Компакт-диск, продаваемый <a href="http://www.macgimp.com/">MacGimp,
                Inc.</a>, якобы содержит XFree86. Не совсем понятно,
                какая это версия; это может быть смесь 4.0.3,
                4.1.0 и собственной разработки. Сервер обеспечивает работу в бескорневом режиме
                с использованием патча, созданного до 4.1.0.</p>
        
        
        <h2><a name="switching-x11">3.7 Замена X11</a></h2>
            
            <p> Если у вас инсталлирован один из пакетов Fink X11, но по какой-либо причине
                надо его удалить и заменить другим,
                выполняется прямолинейная процедура.
                Надо принудительно удалить старый пакет и затем инсталлировать
                новый, чтобы поддержать последовательность базы данных dpkg.</p>
            <p> Выполнить это можно двумя способами:</p>
            <ol>
                <li>
                    <p>Использовать FinkCommander</p>
                    <p> Если вы используете <a href="http://finkcommander.sourceforge.net/">FinkCommander</a>,
                        можно сделать принудительное удаление ("force remove") через меню. Например, если
                        у вас инсталлирован <code>xfree86-rootless</code>,
                        а вы хотите установить связную версию, надо выделить пакеты
                        <code>xfree86-rootless</code>,
                        <code>xfree86-rootless-shlibs</code>,
                        <code>xfree86-base</code> и
                        <code>xfree86-base-shlibs</code> и применить
                         </p>
                    <pre>Source -&gt; Force Remove</pre>
                </li>
                <li>
                    <p>Удалить вручную со строки команд</p>
                    <p> Надо применить
                        <code>dpkg</code> с опцией --force-depends,
                        н-р: </p>
                    <pre>sudo dpkg -r --force-depends xfree86-rootless\
                        xfree86-rootless-shlibs xfree86-base xfree86-base-shlibs</pre>
                    <p> Имейте в виду, что если у вас есть приложения, требующие связной версии пакета
                        XFree86, могут возникнуть проблемы с базой данных dpkg, если вы
                        принудительно удаляете его и инсталлируете другой пакет XFree86
                        или заполнителя. </p>
                </li>
            </ol>
            <p>Версию X11, инсталлированную не через
                Fink, удаляют со строки команд:</p>
            <pre>sudo rm -rf /usr/X11R6 /etc/X11</pre>
            <p>Вышеуказанное относится к удалению любого параметра X11, инсталлированного не
                через Fink. Вам надо будет также удалить
                <code>XDarwin.app</code> |<code>X11.app</code>,
                в зависимости от того, что инсталлировано. При удалении X11 Apple проверьте свой файл
                <code>.xinitrc</code>, чтобы убедиться, что
                вы не пытаетесь использовать
                <code>quartz-wm</code>. Затем можно инсталлировать любую нужную вам
                X11, вручную или через Fink.</p>
        
        <h2><a name="fink-summary">3.8 Обзор пакетов Fink</a></h2>
            
            <p> Краткий обзор видов инсталляции и пакетов Fink, которые вам надо инсталлировать: 
                </p>
            <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Вид инсталляции</th><th align="left">Пакеты Fink</th></tr><tr valign="top"><td>4.2.x  при помощи Fink</td><td>
                        <p>
                            <code>xfree86-base</code> и
                            <code>xfree86-rootless</code> (и их <code>-shlibs</code>)</p>
                        <p>или <code>xfree86-base-threaded</code> и
                            <code>xfree86-rootless-threaded</code> (и <code>-shlibs</code>)</p>
                    </td></tr><tr valign="top"><td>4.3.x при помощи Fink</td><td>
                        <p>
                            <code>xfree86</code> и <code>xfree86-shlibs</code>
                        </p>
                    </td></tr><tr valign="top"><td>4.x на основе официальных бинарных файлов  </td><td>
                        <p>
                            только <code>system-xfree86</code> (+разделители)</p>
                    </td></tr><tr valign="top"><td>4.x на основе исходного кода или последнего исходного кода CVS</td><td>
                        <p>
                            только <code>system-xfree86</code> (+разделители)</p>
                    </td></tr><tr valign="top"><td>4.2.x от Apple</td><td>
                        <p>
                            только <code>system-xfree86</code> (+разделители)</p>
                    </td></tr><tr valign="top"><td>4.3.x от Apple</td><td>
                        <p>
                            только <code>system-xfree86</code> (+разделители)</p>
                    </td></tr></table>
        
    <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="run-xfree86.php?phpLang=ru">4. Запуск XFree86</a></p>
<?php include_once "../../footer.inc"; ?>


