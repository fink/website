<?
$title = "Ч.З.В. - Компиляция (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/12/02 16:41:59';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="next" href="usage-general.php?phpLang=ru" title="Проблемы использования пакетов - Общие вопросы"><link rel="prev" href="comp-general.php?phpLang=ru" title="Проблемы компиляции  - Общие вопросы">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 7. Проблемы компиляции - специальные пакеты</h1>
        
        
        <a name="libgtop">
            <div class="question"><p><b><? echo FINK_Q ; ?>7.1: Не получается создать пакет и появляются ошибки с упоминанием <code>sed</code>.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это может происходить, когда ваш скрипт регистрации (н-р
                    <code>~/.cshrc</code>) сделал нечто, после чего терминал получил сообщение,
                    н-р "<code>echo Hello</code>" или
                    <code>xttitle</code>. Для исправления проблемы наиболее легкое решение -
                    сделать комментарий вне проблемных строк. </p><p>Если хотите сохранить эхоотображение, можно сделать
                    нечто вроде следующего:</p><pre>if ( $?prompt) then echo Hello endif</pre></div>
        </a>
        <a name="cant-install-xfree">
            <div class="question"><p><b><? echo FINK_Q ; ?>7.2: Хочу перейти на пакеты Fink's XFree86, но не могу
                    инсталлировать <code>xfree86-base</code> | <code>xfree86</code>,
                    т.к.он конфликтует с <code>system-xfree86</code>.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Все прелести X11, к сожалению, действительно должны быть инсталлированы
                   в /usr/X11R6. Поэтому пакеты Fink
                    <code>xfree86-base</code> и <code>xfree86-rootless</code>
                    также в нем установлены. Тем не менее, поскольку Fink не удалит
                    файлы, которые не находятся в его базе данных, это
                    не заменит автоматически инсталляцию X11, выполненную без Fink.</p><p></p><p>Как надо поступить:</p><p></p><p>
                    <b>Прим.: пользователи 10.2.x с новейшими версиями Fink
                        (&gt;= 0.16.2) и пользователи 10.3.x должны пропустить действие 1
                        в числе нижеуказанных (в любом случае это не сработает).</b>
                </p><p>1. Удалите <code>system-xfree86</code>. Если у вас нет пакетов, 
                    зависящих от X11, это просто.
                    Однако зачастую есть много инсталлированных пакетов, зависящих от X11.
                    Чтобы не пришлось их деинсталлировать, можно использовать </p><pre>sudo dpkg --remove --force-depends system-xfree86</pre><p>для удаления и оставить все на своем месте. Если у вас нет инсталлированной
                    <code>system-xfree86</code>, переходите к действию 3.</p><p>2. Вручную удалите все XFree86. Это можно сделать при помощи </p><pre>sudo rm -rf /Applications/XDarwin.app /usr/X11R6 /etc/X11</pre><p>Если вы переключаетесь с Apple X11, удалите приложение X11
                    также.</p><p>3. Для XFree86-4.2.1 инсталлируйте пакеты Fink
                    <code>xfree86-base</code> и <code>xfree86-rootless</code>
                    обычным образом: "<code>fink install</code>" для
                    пользователей исходного кода, "<code>apt-get install</code>" или
                    <code>dselect</code> для бинарных файлов.</p><p>-или-</p><p>3a. Для XFree86-4.3.x и более поздних версий инсталлируйте пакет Fink
                    <code>xfree86</code> с "fink install
                    xfree86"--последняя версия (XFree86-4.4.x от 25 мая
                    2004 г.) пока еще не в бинарном distro и на данный момент находится только
                    на нестабильном дереве [см. <a href="http://fink.sourceforge.net/faq/usage-fink.php#unstable%5C">как
                        инсталлировать нестабильные пакеты</a>].</p></div>
        </a>
        <a name="change-thread-nothread">
            <div class="question"><p><b><? echo FINK_Q ; ?>7.3: Как можно поменять несвязную версию пакетов Fink
                    XFree86 на связную версию (или наоборот)?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если вы выполняете версию Fink XFree86 и хотите
                    переключиться между связными и несвязными версиями
                    Fink, надо вручную удалить старую версию. Это выполняется
                    на строке команд при помощи команд:</p><pre>sudo dpkg -r --force-depends xfree86-base sudo dpkg
                    -r --force-depends xfree86-shlibs sudo dpkg -r
                    --force-depends xfree86-rootless sudo dpkg -r
                    --force-depends xfree86-rootless-shlibs</pre><p>или путем удаления связных версий:</p><pre>sudo dpkg -r --force-depends xfree86-base-threaded
                    sudo dpkg -r --force-depends xfree86-shlibs-threaded sudo
                    dpkg -r --force-depends xfree86-rootless-threaded sudo dpkg
                    -r --force-depends xfree86-rootless-threaded-shlibs</pre><p>В FinkCommander также есть способ удаления пакетов. В окне
                    исходного кода выберите пакет и затем в
                        <code>Source Menu</code> примените "<code>Force Remove</code>."</p><p>Если вы используете system-xfree86, см. предыдущий вопрос
                    относительно ее удаления.</p><p>Инсталлируйте необходимую вам версию xfree86:</p><p>
                    <code>xfree86-base</code> и <code>xfree86-rootless</code>
                </p><p>
                    <code>xfree86-base-threaded</code> и <code>xfree86-rootless-threaded</code>
                </p><p>обычным образом: "<code>fink install</code>" для пользователей
                    исходного кода, "<code>apt-get install</code>" или
                    <code>dselect</code> для бинарных файлов.</p></div>
        </a>
        
        <a name="cctools">
            <div class="question"><p><b><? echo FINK_Q ; ?>7.4: При попытке инсталляции KDE получил сообщение:
                    'Can't resolve dependency "cctools (&gt;= 446-1)"'</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это зашифрованное сообщение означает, что вам надо инсталлировать
                    Developer Tools за декабрь 2002 г.</p></div>
        </a>
        
        <a name="libiconv-gettext">
            <div class="question"><p><b><? echo FINK_Q ; ?>7.5: Не могу обновить <code>libiconv</code>.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если вы получили сообщение об ошибке в таком виде:</p><pre>libtool: link: cannot find the library `/sw/lib/libiconv.la'</pre><p>можно решить проблему при помощи</p><pre>fink remove gettext-dev fink install libiconv</pre></div>
        </a>
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=ru">8. Проблемы использования пакетов - Общие вопросы</a></p>
<? include_once "../footer.inc"; ?>


