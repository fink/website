<?
$title = "Ч.З.В.";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2006/06/09 14:57:47';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="next" href="general.php?phpLang=ru" title="Общие вопросы">';


include_once "header.ru.inc";
?>
<h1>Часто задаваемые вопросы Fink </h1>
        <p>Ниже вы найдете список Ч.З.В. о Fink. Как и большинство
            Ч.З.В., некоторые из них реальные, а некоторые
            составленные. Фактически это документ
            в стиле оперативных вопросов и ответов.</p>
        <p>Ч.З.В. занимают несколько страниц - по одной на каждый раздел.
            Все вопросы приведены с соответствующими ссылками в содержании.</p>
    <h2><? echo FINK_CONTENTS ; ?></h2><ul>
	<li><a href="general.php?phpLang=ru"><b>1 Общие вопросы</b></a><ul><li><a href="general.php?phpLang=ru#what">1.1 Что такое Fink?</a></li><li><a href="general.php?phpLang=ru#naming">1.2 Что означает название Fink?</a></li><li><a href="general.php?phpLang=ru#bsd-ports">1.3  Чем Fink отличается от механизма переноса BSD (включая
                    OpenPackages и GNU-Darwin)? </a></li><li><a href="general.php?phpLang=ru#usr-local">1.4 Почему Fink ничего не инсталлирует в  /usr/local?</a></li><li><a href="general.php?phpLang=ru#why-sw">1.5 Тогда почему вы выбрали /sw?</a></li></ul></li><li><a href="relations.php?phpLang=ru"><b>2 Связь с другими проектами</b></a><ul><li><a href="relations.php?phpLang=ru#upstream">2.1 Предоставляете ли вы свои патчи координаторам исходного ПО?</a></li><li><a href="relations.php?phpLang=ru#debian">2.2 Какое отношение вы имеете к проекту Debian? 
                    Переносите ли вы Debian Linux в Mac OS X?</a></li><li><a href="relations.php?phpLang=ru#apple">2.3 Какое отношение вы имеете к Apple?</a></li><li><a href="relations.php?phpLang=ru#darwinports">2.4 Какое отношение вы имеете к Darwinports?</a></li></ul></li><li><a href="mirrors.php?phpLang=ru"><b>3 Зеркала Fink</b></a><ul><li><a href="mirrors.php?phpLang=ru#when-use">3.1 Что такое зеркала Fink?</a></li><li><a href="mirrors.php?phpLang=ru#why">3.2 Почему я должен использовать зеркала rsync?</a></li><li><a href="mirrors.php?phpLang=ru#where">3.3 Где можно найти более подробную информацию о зеркалах Fink?</a></li><li><a href="mirrors.php?phpLang=ru#when-not">3.4 Не устанавливается соединение с сервером rsync. Что делать?</a></li><li><a href="mirrors.php?phpLang=ru#otherinfogone">3.5 После перехода на метод rsync исчезли все информационные файлы на
                    неиспользованных деревьях</a></li><li><a href="mirrors.php?phpLang=ru#howswitch">3.6 Как можно переключаться между методами?</a></li><li><a href="mirrors.php?phpLang=ru#status">3.7 Можно ли видеть текущий статус зеркал rsync?</a></li><li><a href="mirrors.php?phpLang=ru#Master">3.8 Что такое зеркало Distfiles?</a></li></ul></li><li><a href="upgrade-fink.php?phpLang=ru"><b>4 Обновление Fink (проблемы, связанные с версиями)</b></a><ul><li><a href="upgrade-fink.php?phpLang=ru#gcc-0.16.0">4.1 Я только что сделал обновление до 0.16.0 и получил сообщение: "Ваша версия
                    компилятора gcc 3.3 устарела." Что делать?</a></li><li><a href="upgrade-fink.php?phpLang=ru#fink-0220">4.2 Я не получал обновлений пакетов от Fink в течение некоторого времени.</a></li></ul></li><li><a href="usage-fink.php?phpLang=ru"><b>5 Инсталляция, использование и поддержка Fink</b></a><ul><li><a href="usage-fink.php?phpLang=ru#what-packages">5.1 Как можно узнать, какие пакеты поддерживает Fink?</a></li><li><a href="usage-fink.php?phpLang=ru#proxy">5.2 Я нахожусь за брандмауэром. Как надо конфигурировать Fink для использования прокси HTTP?</a></li><li><a href="usage-fink.php?phpLang=ru#firewalled-cvs">5.3 Как можно обновить имеющиеся пакеты при помощи CVS, если я за
                    брандмауэромl?</a></li><li><a href="usage-fink.php?phpLang=ru#moving">5.4 Можно ли переместить Fink на другое место после инсталляции?</a></li><li><a href="usage-fink.php?phpLang=ru#moving-symlink">5.5 Если переместить Fink после инсталляции и предоставить символический указатель (алиас)
                    прежнего размещения, будет ли результат успешным?</a></li><li><a href="usage-fink.php?phpLang=ru#removing">5.6 Как полностью деинсталлировать Fink?</a></li><li><a href="usage-fink.php?phpLang=ru#bindist">5.7 База данных по пакетам на веб-сайте указывает в списке пакет xxx, но
                    apt-get и dselect ничего об этом не знают. Что неправильно?</a></li><li><a href="usage-fink.php?phpLang=ru#unstable">5.8 Я хочу инсталлировать пакет из категории нестабильных, но
                    fink сообщает, что 'пакет на найден' ('no package found') . Как его можно
                    инсталлировать?</a></li><li><a href="usage-fink.php?phpLang=ru#sudo">5.9 Мне надоело каждый раз печатать свой пароль в sudo.
                    Можно ли с этим что-то сделать?</a></li><li><a href="usage-fink.php?phpLang=ru#exec-init-csh">5.10 Когда я пытаюсь выполнить init.csh или init.sh, получаю сообщение "Нет разрешения" ("Permission
                    denied"). Что я делаю неправильно?</a></li><li><a href="usage-fink.php?phpLang=ru#dselect-access">5.11 Помогите! Я использовал ввод меню "[A]ccess" в dselect и
                    больше не могу скачивать пакеты!</a></li><li><a href="usage-fink.php?phpLang=ru#cvs-busy">5.12 При попытке выполнения <q>fink selfupdate</q> или "fink
                    selfupdate-cvs" получаю сообщение об ошибке <code>Updating using CVS
                        failed. Check the error messages above.</code>"</a></li><li><a href="usage-fink.php?phpLang=ru#kernel-panics">5.13 При использовании Fink мой компьютер зависает/глючит/вырубается.
                    Помогите!</a></li><li><a href="usage-fink.php?phpLang=ru#not-found">5.14 Пытаюсь инсталлировать пакет, но Fink не может его скачать.
                    Сайт скачивания отражает номер более поздней версии пакета, чем
                    показывает Fink. Что делать?</a></li><li><a href="usage-fink.php?phpLang=ru#fink-not-found">5.15 Получаю сообщения об ошибке "command not found", когда запускаю Fink или
                    то, что инсталлировано при помощи Fink.</a></li><li><a href="usage-fink.php?phpLang=ru#invisible-sw">5.16 Хочу спрятать /sw в Finder, чтобы пользователи не повредили
                    настройки Fink.</a></li><li><a href="usage-fink.php?phpLang=ru#install-info-bad">5.17 Не могу ничего инсталлировать из-за следующей ошибки:
                    "install-info: unrecognized option `--infodir=/sw/share/info'"</a></li><li><a href="usage-fink.php?phpLang=ru#bad-list-file">5.18 Ничего не могу инсталлировать или удалить из-за проблемы с
                    файлом списка файлов ("files list file").</a></li><li><a href="usage-fink.php?phpLang=ru#dselect-garbage">5.19 Я получил кучу мусора, когда выбирал пакеты в 
                    <code>dselect</code>. Как теперь можно его использовать?</a></li><li><a href="usage-fink.php?phpLang=ru#perl-undefined-symbol">5.20 Почему я получаю кучу сообщений об ошибках "dyld: perl undefined symbols",
                    когда применяю команды Fink?</a></li><li><a href="usage-fink.php?phpLang=ru#cant-upgrade">5.21 Не получается обновить версию Fink.</a></li><li><a href="usage-fink.php?phpLang=ru#spaces-in-directory">5.22 Можно ли разместить Fink в томе или каталоге с пробелом в его имени?</a></li><li><a href="usage-fink.php?phpLang=ru#packages-gz">5.23 При попытке бинарного обновления появляется много сообщений
                    со словами "File not found"</a></li><li><a href="usage-fink.php?phpLang=ru#wrong-tree">5.24 Я изменил OS | Developer Tools, но Fink не
                    признает изменение.</a></li><li><a href="usage-fink.php?phpLang=ru#seg-fault">5.25 Получаю сообщения об ошибках с приложениями <code>gzip</code> | <code>dpkg-deb</code>I
                    из пакета <code> fileutils </code>! Помогите!</a></li><li><a href="usage-fink.php?phpLang=ru#pathsetup-keeps-running">5.26 Когда я открываю окно Terminal, получаю сообщение "Your
                    environment seems to be correctly set up for Fink already.",
                    и сеанс завершается.</a></li><li><a href="usage-fink.php?phpLang=ru#ext-drive">5.27 Мой Fink инсталлирован отдельно от главного сегмента и я не могу
                    обновить пакет fink на основе исходного кода. Появляются сообщения об ошибках
                    с упоминанием <q>chowname</q>.</a></li><li><a href="usage-fink.php?phpLang=ru#mirror-gnu">5.28 Fink не хочет обновлять мои пакеты, т.к. утверждает, что
                    не может найти зеркало 'gnu'.</a></li><li><a href="usage-fink.php?phpLang=ru#cant-move-fink">5.29 Не могу обновить Fink, т.к. он не может убрать  /sw/fink..</a></li></ul></li><li><a href="comp-general.php?phpLang=ru"><b>6 Проблемы компиляции  - Общие вопросы</b></a><ul><li><a href="comp-general.php?phpLang=ru#compiler">6.1 Скрипт конфигурации жалуется, что не может найти
                    "acceptable cc". Что это значит?</a></li><li><a href="comp-general.php?phpLang=ru#cvs">6.2 При попытке выполнения "fink selfupdate-cvs" получаю сообщение: "cvs:
                    Command not found."</a></li><li><a href="comp-general.php?phpLang=ru#missing-make">6.3 Получил сообщение об ошибке, которое упоминает <code>make</code>
                </a></li><li><a href="comp-general.php?phpLang=ru#head">6.4 Я получаю странное сообщение от команды head об использовании.
                    Что не в порядке?</a></li><li><a href="comp-general.php?phpLang=ru#also_in">6.5 При попытке инсталляции пакета получаю сообщение об ошибке в связи с тем, что
                    есть попытка перезаписать файл, находящийся в другом пакете. </a></li><li><a href="comp-general.php?phpLang=ru#weak_lib">6.6 После инсталляции Development Tools за декабрь 2002 г. я получаю
                    сообщения о "слабых библиотеках" ( "weak libraries").</a></li><li><a href="comp-general.php?phpLang=ru#mv-failed">6.7 Что означает  "execution of mv failed, exit code 1", когда я
                    пробую построить пакет?</a></li><li><a href="comp-general.php?phpLang=ru#node-exists">6.8 Не могу инсталлировать пакет | обновление, т.к. получил сообщение, что
                    узел ("node") уже существует.</a></li><li><a href="comp-general.php?phpLang=ru#usr-local-libs">6.9 Слышал, что библиотеки и заголовки, инсталлированные в
                    /usr/local, иногда вызывают проблемы для Fink в построении. Правда ли это?</a></li><li><a href="comp-general.php?phpLang=ru#toc-out-of-date">6.10 Когда я пытаюсь построить пакет, получаю сообщение, что содержание ("table
                    of contents") устарело. Что делать?</a></li><li><a href="comp-general.php?phpLang=ru#fc-atlas">6.11 Fink Commander зависает, когда я пытаюсь инсталлировать atlas.</a></li><li><a href="comp-general.php?phpLang=ru#basic-headers">6.12 Получил сообщения о том, что у меня не хватает 
                    <code>stddef.h</code>, <code>wchar.h</code> и
                     <code>crt1.o</code> или что мой С-компилятор не может создать выполняемые файлы ("C compiler
                    cannot create executables").</a></li><li><a href="comp-general.php?phpLang=ru#multiple-dependencies">6.13 Не могу сделать обновление, т.к. Fink не может разрешить конфликт версий многих взаимозависимостей ("unable to resolve version
                    conflict on multiple dependencies").</a></li><li><a href="comp-general.php?phpLang=ru#dpkg-parse-error">6.14 Не могу ничего инсталлировать, т.к. получил сообщение "dpkg: parse error, in
                    file `/sw/var/lib/dpkg/status'"!</a></li><li><a href="comp-general.php?phpLang=ru#freetype-problems">6.15 Получаю сообщения об ошибках с упоминанием freetype.</a></li><li><a href="comp-general.php?phpLang=ru#dlfcn-from-oo">6.16 Получил сообщение об ошибке построения с упоминанием `Dl_info'.</a></li><li><a href="comp-general.php?phpLang=ru#gcc2">6.17 Fink утверждает, что мне не хватает <code>gcc2</code> или
                    <code>gcc3.1</code>, но их инсталляция не представляется возможной.</a></li><li><a href="comp-general.php?phpLang=ru#system-java">6.18 Fink утверждает: <code>Failed: Can't resolve dependency
                    "system-java14-dev"</code>, но такого пакета нет.</a></li><li><a href="comp-general.php?phpLang=ru#dpkg-split">6.19 При попытке инсталляции ч.-л. получаю сообщение: <q>dpkg
                        (subprocess): failed to exec dpkg-split to see if it's
                        part of a multiparter: No such file or
                    directory</q>. Как это исправить?</a></li><li><a href="comp-general.php?phpLang=ru#xml-parser">6.20 Получил такое сообщение: <q>configure: error:
                        XML::Parser perl module is required for
                    intltool</q>. Что делать?</a></li><li><a href="comp-general.php?phpLang=ru#master-problems">6.21 Пытаюсь скачать пакет, а Fink выходит на какой-то загадочный сайт
                    с <q>distfiles</q> в названии, а файла там
                    нет.</a></li><li><a href="comp-general.php?phpLang=ru#compile-options">6.22 Хочу, чтобы Fink использовал разные опции при построении пакета.</a></li></ul></li><li><a href="comp-packages.php?phpLang=ru"><b>7 Проблемы компиляции - специальные пакеты</b></a><ul><li><a href="comp-packages.php?phpLang=ru#libgtop">7.1 Не получается создать пакет и появляются ошибки с упоминанием <code>sed</code>.</a></li><li><a href="comp-packages.php?phpLang=ru#cant-install-xfree">7.2 Хочу перейти на пакеты Fink's XFree86, но не могу
                    инсталлировать <code>xfree86-base</code> | <code>xfree86</code>,
                    т.к.он конфликтует с <code>system-xfree86</code>.</a></li><li><a href="comp-packages.php?phpLang=ru#change-thread-nothread">7.3 Как можно поменять несвязную версию пакетов Fink
                    XFree86 на связную версию (или наоборот)?</a></li><li><a href="comp-packages.php?phpLang=ru#cctools">7.4 При попытке инсталляции KDE получил сообщение:
                    'Can't resolve dependency "cctools (&gt;= 446-1)"'</a></li><li><a href="comp-packages.php?phpLang=ru#libiconv-gettext">7.5 Не могу обновить <code>libiconv</code>.</a></li></ul></li><li><a href="usage-general.php?phpLang=ru"><b>8 Проблемы использования пакетов - Общие вопросы</b></a><ul><li><a href="usage-general.php?phpLang=ru#xlocale">8.1 Я получаю много сообщений типа "locale not supported by C
                    library". Это плохо?</a></li><li><a href="usage-general.php?phpLang=ru#passwd">8.2 В моей системе вдруг появилось несколько странных пользователей
                    с такими именами, как "mysql", "pgsql" и "games". Откуда они
                    взялись?</a></li><li><a href="usage-general.php?phpLang=ru#compile-myself">8.3 Как можно компилировать что-нибудь самостоятельно с применением ПО, инсталлированного с помощью Fink?</a></li><li><a href="usage-general.php?phpLang=ru#apple-x11-applications-menu">8.4 Не могу запустить ни одно из приложений, инсталлированных при помощи Fink, через
                    меню Applications в Apple X11.</a></li><li><a href="usage-general.php?phpLang=ru#x-options">8.5 Я озадачен опциями X11: Apple X11, XFree86 и т.д.
                    Что надо инсталлировать?</a></li><li><a href="usage-general.php?phpLang=ru#no-display">8.6 При попытке запуска приложения получил сообщение
                    "cannot open display:". Что надо сделать?</a></li><li><a href="usage-general.php?phpLang=ru#suggest-package">8.7 Я не нахожу свою любимую программу в Fink. Как можно предложить
                    новый пакет для внесения в Fink?</a></li><li><a href="usage-general.php?phpLang=ru#virtpackage">8.8 Что это за "виртуальные пакеты" <code>system-*</code>,
                    которые иногда представлены, но я вроде как не могу инсталлировать или
                    удалить их самостоятельно?</a></li></ul></li><li><a href="usage-packages.php?phpLang=ru"><b>9 Проблемы использования пакетов  - Специальные пакеты</b></a><ul><li><a href="usage-packages.php?phpLang=ru#xmms-quiet">9.1 Нет ни звука от XMMS</a></li><li><a href="usage-packages.php?phpLang=ru#nedit-window-locks">9.2 Когда во время редактирования файла в nedit я открываю другой файл, его окно
                    появляется, но не работает.</a></li><li><a href="usage-packages.php?phpLang=ru#xdarwin-start">9.3 Помогите! Когда запускаю XDarwin, она сразу завершает работу!</a></li><li><a href="usage-packages.php?phpLang=ru#no-server">9.4 При попытке запуска XDarwin получил сообщение "xinit: No such
                    file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</a></li><li><a href="usage-packages.php?phpLang=ru#xterm-error">9.5 xterm не может выполнить "dyld: xterm Undefined symbols: xterm
                    undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib".</a></li><li><a href="usage-packages.php?phpLang=ru#libXmuu">9.6 При попытке запуска XFree86 получаю одно из таких
                    сообщений об ошибке: "dyld: xinit can't open library:
                    /usr/X11R6/lib/libXmuu.1.dylib" or "dyld: xinit can't open
                    library: /usr/X11R6/lib/libXext.6.dylib"</a></li><li><a href="usage-packages.php?phpLang=ru#apple-x-bugs">9.7 У меня инсталлирован XFree86 от Fink; я его заменил на
                    X11 от Apple и теперь все разваливается!</a></li><li><a href="usage-packages.php?phpLang=ru#apple-x-delete">9.8 Хочу стереть клавишу в Apple X11.app для поведения, как в
                    XDarwin.</a></li><li><a href="usage-packages.php?phpLang=ru#gnome-two">9.9 Я сделал обновление от GNOME 1.x дo GNOME 2.x и теперь
                    <code>gnome-session</code> не открывает менеджер окон. </a></li><li><a href="usage-packages.php?phpLang=ru#apple-x11-no-windowbar">9.10 Я сделал обновление до Apple X11 в Panther и теперь у меня не хватает
                    строк заголовков в окнах.</a></li><li><a href="usage-packages.php?phpLang=ru#apple-x11-wants-xfree86">9.11 Я инсталлировал Apple X11, но Fink продолжает спрашивать об
                    инсталяции XFree86 или X.org.</a></li><li><a href="usage-packages.php?phpLang=ru#wants-xfree86-on-upgrade">9.12 Я переключился с версии 10.2 Fink на 10.2-gcc3.3 или 10.3,
                    у меня Apple X11, а Fink просит инсталлировать XFree86 или X.org.</a></li><li><a href="usage-packages.php?phpLang=ru#special-x11-debug">9.13 Я меня остались проблемы с X11и Fink.</a></li></ul></li></ul>
<!--Generated from $Fink: faq.ru.xml,v 1.7 2006/06/09 14:57:47 dmrrsn Exp $-->
<? include_once "../footer.inc"; ?>


