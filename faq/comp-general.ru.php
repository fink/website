<?
$title = "Ч.З.В. - Компиляция (1)";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2007/07/21 00:06:37';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="next" href="comp-packages.php?phpLang=ru" title="Проблемы компиляции - специальные пакеты"><link rel="prev" href="usage-fink.php?phpLang=ru" title="Инсталляция, использование и поддержка Fink">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 6. Проблемы компиляции  - Общие вопросы</h1>
        
        
        <a name="compiler">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.1: Скрипт конфигурации жалуется, что не может найти
                    "acceptable cc". Что это значит?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> В следующий раз прочтите документы. При компилировании пакетов на основе исходного кода надо
                    инсталлировать Developer Tools, которые в числе прочего
                    содержат компилятор C - <code>cc</code>.</p></div>
        </a>
        <a name="cvs">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.2: При попытке выполнения "fink selfupdate-cvs" получаю сообщение: "cvs:
                    Command not found."</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Вам надо инсталлировать Developer Tools.</p></div>
        </a>
        <a name="missing-make">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.3: Получил сообщение об ошибке, которое упоминает <code>make</code>
                </b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если сообщение в такой форме:</p><pre>make: command not found</pre><p>или</p><pre>Can't exec "make": 
No such file or directory at /sw/lib/perl5/Fink/Services.pm line 190.</pre><p>это значит, что вам надо инсталлировать Developer Tools.</p><p>С другой стороны, если сообщение об ошибке выглядит таким образом: </p><pre>make: illegal option -- C</pre><p>значит, вы заменили версию GNU утилита <code>make</code>, инсталлированного
                    в качестве части Developer Tools, версией make BSD.
                    Многие пакеты основываются на специальных параметрах, поддерживаемых
                    только GNU make. Надо убедиться, что
                    <code>/usr/bin/make</code> является алиасом
                    <code>gnumake</code>, а не <code>bsdmake</code>. Кроме того,
                    убедитесь, что <code>/usr/local/bin/</code> не содержит другую копию
                    <code>make</code>.</p></div>
        </a>
        <a name="head">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.4: Я получаю странное сообщение от команды head об использовании.
                    Что не в порядке?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если вы видите следующее:</p><pre>Unknown option: 1 Usage: head [-options] &lt;url&gt;...</pre><p>и затем следует список описаний опций, значит, у вас не в порядке выполняемый файл
                    <code>head</code>. Это происходит, когда вы инсталлируете
                    библиотеку Perl libwww в томе системы HFS+. Она пытается
                    создать новую команду <code>/usr/bin/HEAD</code>, которая
                    переписывает существующую команду <code>head</code> , т.к.
                    файловая система не учитывает регистр клавиатуры. <code>head</code> является
                    стандартной командой, используемой во многих скриптах оболочки и Makefiles.
                    Вам надо опять раздобыть оригинальный выполняемый файл <code>head</code>, если вы
                    хотите использовать Fink.</p><p>Скрипт самозагрузки версии исходного кода теперь это проверяет, но
                    вы можете с этим столкнуться, если используете бинарную
                    версию для первоначальной инсталляции или инсталлируете libwww после
                    инсталляции Fink.</p><p>О возникновении этой проблемы также сообщалось в связи с инсталляцией
                     <code>/sw/bin/HEAD</code> (но не через посредство каких-либо пакетов Fink).
                    Это решается легче: надо переименовать <code>/sw/bin/HEAD</code>.</p></div>
        </a>
        <a name="also_in">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.5: При попытке инсталляции пакета получаю сообщение об ошибке в связи с тем, что
                    есть попытка перезаписать файл, находящийся в другом пакете. </b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это иногда происходит с разделенными пакетами (т.e.  пакетами с
                     -dev, -shlibs и т.д.), когда файл переносится из одной раздельной части
                    в другую (н-р из
                    <code>foo</code> в <code>foo-shlibs</code>. Надо
                    записать поверх файла файл из пакета, который вы пытаетесь инсталлировать
                    (т.к. они номинально являются одним и тем же):</p><pre>sudo dpkg -i --force-overwrite <b>filename</b>
                </pre><p>где <b>filename</b> файл .deb, соответствующий пакету,
                    который вы хотите инсталлировать.</p></div>
        </a>
        <a name="weak_lib">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.6: После инсталляции Development Tools за декабрь 2002 г. я получаю
                    сообщения о "слабых библиотеках" ( "weak libraries").</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это новая проблема в связи с инструментами за декабрь 2002 г. Вы можете иногда
                    получать сообщения такого типа (с выбором libgdk-pixbuf как пример):</p><pre>ld: warning dynamic shared library:
/sw/lib/libgdk-pixbuf.dylib not made a weak library in output with
MACOSX_DEPLOYMENT_TARGET environment variable set to: 10.1</pre><p>Можете считать их безобидными. Если разбирает любопытство, просмотрите
                    заметки о выпусках версий в каталоге документации разработчика,
                    в частности что касается GCC и компоновщика, для получения более подробных сведений.
                    Обычно это вопрос того, считать ли пропущенные знаки во время выполнения
                    фатальной ошибкой при инициализации для приложений,
                    использующих слабые ссылки.</p></div>
        </a>
        <a name="mv-failed">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.7: Что означает  "execution of mv failed, exit code 1", когда я
                    пробую построить пакет?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если у вас инсталлировано приложение StuffIt Pro, возможно у вас активирован режим
                    "Archive Via Real Name". Проверьте область окна преференции StuffIt
                    в инструменте System Preferences и дезактивируйте
                    "ArchiveViaRealName" в случае его действия. Оно
                    повторно выполняет несколько важных системных запросов, которые
                    вызывают ряд подобных странных временных ошибок.</p><p>В противном случае ошибка <code>mv</code> обычно означает, что
                    произошла другая ошибка в компоновке,но
                    процесс компоновки не остановился. Для обратного отслеживания файла(-ов)
                    с ошибкой надо произвести поиск в компоновке несуществующего
                    файла, н-р если у вас что-то вроде этого: </p><pre>mv /sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib \
/sw/src/root-foo-shlibs-0.1.2-3/sw/lib/ 
mv: cannot stat `/sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib': 
No such file or directory 
### execution of mv failed, exit code 1 
Failed: installing foo-0.1.2-3 failed</pre><p>надо искать <code>libbar</code>
                    где-то в выводе вашей попытки компоновки. </p></div>
        </a>
        <a name="node-exists">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.8: Не могу инсталлировать пакет | обновление, т.к. получил сообщение, что
                    узел ("node") уже существует.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Эти ошибки иногда выглядят так:</p><pre>Failed: Internal error: node for system-xfree86 already exists</pre><p>Проблема заключается в том, что процессор взаимозависимости запутался из-за
                    изменений в некоторых информационных файлах пакета. Для решения проблемы надо:</p><ul>
                    <li>
                        <p>Насильно удалить пакет с ошибкой, т.е.</p>
                        <pre>sudo dpkg -r --force-all system-xfree86</pre>
                        <p>в случае приведенного примера.</p>
                    </li>
                    <li>
                        <p>Попытаться снова сделать инсталляцию | обновление. В какой-то момент
                            появится опция "virtual dependency", содержащая
                            пакет, который вы только что удалили. Надо его выделить и
                            он будет вновь инсталлирован в процессе компоновки.</p>
                    </li>
                </ul></div>
        </a>
        <a name="usr-local-libs">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.9: Слышал, что библиотеки и заголовки, инсталлированные в
                    /usr/local, иногда вызывают проблемы для Fink в построении. Правда ли это?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это частый источник проблем, т.к. скрипт конфигурации
                    пакета находит  заголовки и библиотеки в
                    <code>/usr/local</code> и решает использовать их,
                    а не те, которые находятся на маршуте Fink. Если у вас проблемы
                    с построением, которые не отражены в других Ч.З.В.,
                    надо проверить, есть ли у вас библиотеки в
                    <code>/usr/local/lib</code> или заголовки в
                    /usr/local/include. Если да, надо попытаться переименовать
                    <code>/usr/local</code> во что-либо другое, н-р:</p><pre>sudo mv /usr/local /usr/local.moved</pre><p>сделать построение и затем поместить <code>/usr/local</code> обратно:</p><pre>sudo mv /usr/local.moved /usr/local</pre></div>
        </a>
        <a name="toc-out-of-date">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.10: Когда я пытаюсь построить пакет, получаю сообщение, что содержание ("table
                    of contents") устарело. Что делать?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ввод дает намек на то, что делать. Обычно сообщение
                    выглядит так:</p><pre>ld: table of contents for archive: 
/sw/lib/libintl.a is out of date; 
rerun ranlib(1) (can't load from it)</pre><p>Надо применить ranlib (в качестве суперпользователя) в любой
                    библиотеке, где возникла проблема. В качестве примера, для 
                    вышеприведенного случая надо выполнить:</p><pre>sudo ranlib /sw/lib/libintl.a</pre></div>
        </a>
        <a name="fc-atlas">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.11: Fink Commander зависает, когда я пытаюсь инсталлировать atlas.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это происходит потому, что одно из действий при построении
                    <code>atlas</code> включает опцию, чтобы экран Fink
                    Commander ничего не отображал. Вместо этого надо использовать <code>fink
                        install atlas</code>.</p></div>
        </a>
    
    <a name="basic-headers">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.12: I get messages saying that I'm missing <code>stddef.h</code> | <code>wchar.h</code> | <code>stdlib.h</code> | <code>crt1.o</code>, or that my <q>C compiler cannot create executables</q>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Both of these problems are typically due to the absence of essential headers that are provided by the DevSDK package of
        the Developer Tools. Check whether
        <code>/Library/Receipts/DevSDK.pkg</code> exists on your
        system. If not, then run the Dev Tools Installer again, and install
        the DevSDK package using a Custom Install.</p><p>The <q>cannot create executables</q> error can also occur when your Developer Tools version is for an earlier OS version.</p></div>
    </a>
    
        <a name="multiple-dependencies">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.13: Не могу сделать обновление, т.к. Fink не может разрешить конфликт версий многих взаимозависимостей ("unable to resolve version
                    conflict on multiple dependencies").</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Попытайтесь обновить один пакет и затем  использовать
                    снова "fink update-all".Если опять получите сообщение,
                    повторите процесс.</p></div>
        </a>
        <a name="dpkg-parse-error">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.14: Не могу ничего инсталлировать, т.к. получил сообщение "dpkg: parse error, in
                    file `/sw/var/lib/dpkg/status'"!</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это означает, что каким-то образом повредилась ваша база данных dpkg,
                    обычно из-за фатального сбоя или другой неисправимой ошибки. Вы можете
                    это исправить путем копирования предыдущей версии базы данных,
                    н-р так:</p><pre>sudo cp /sw/var/lib/dpkg/status-old /sw/var/lib/dpkg/status</pre><p>Возможно, вам надо будет снова инсталлировать пару последних пакетов, которые
                    вы инсталлировали перед возникновением проблемы. </p></div>
        </a>
        <a name="freetype-problems">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.15: Получаю сообщения об ошибках с упоминанием freetype.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Есть несколько видов таких ошибок. If you get the following:</p><pre>/usr/bin/ld: can't locate file for: -lfreetype</pre><p>check whether you have an extraneous <code>freetype-config</code> excutable by running</p><pre>where freetype-config</pre><p>if you're using <code>tcsh</code>, or</p><pre>type -a freetype-config</pre><p>if you're using <code>bash</code>.  The Mono Framework has been known to install a <code>/usr/bin/freetype-config</code> that is a symbolic link to a file in that framework.</p><p>Если сообщение
                    выглядит так:</p><pre>/sw/include/pango-1.0/pango/pangoft2.h:52: 
error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:57:
error: parse error before '*' token
/sw/include/pango-1.0/pango/pangoft2.h:61: 
error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:86: 
error: parse error before "pango_ft2_font_get_face"
/sw/include/pango-1.0/pango/pangoft2.h:86: 
warning: data definition has no type or storage class 
make[2]: *** [rsvg-gz.lo] Error 1
make[1]: *** [all-recursive] Error 1 
make: *** [all-recursive-am] Error 2 
### execution of make failed, exit code 2 
Failed: compiling librsvg2-2.4.0-3 failed</pre><p>или</p><pre>In file included from vteft2.c:32: 
vteglyph.h:64: error:
parse error before "FT_Library" 
vteglyph.h:64: warning: 
no semicolon at end of struct or union vteft2.c: 
In function `_vte_ft2_get_text_width': 
vteft2.c:236: error: 
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_get_text_height':
vteft2.c:244: error: 
dereferencing pointer to incomplete type
vteft2.c: In function `_vte_ft2_get_text_ascent': 
vteft2.c:252: error:
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_draw_text': 
vteft2.c:294: error: 
dereferencing pointer to incomplete type 
vteft2.c:295: error: 
dereferencing pointer to incomplete type
make[2]: *** [vteft2.lo] Error 1 
make[1]: *** [all-recursive] Error 1 
make: *** [all] Error 2 
### execution of make failed, exit code 2
Failed: compiling vte-0.11.10-3 failed</pre><p>или</p><pre>checking for freetype-config.../usr/X11R6/bin/freetype-config 
checking For sufficiently new FreeType (at least 2.0.1)... no 
configure: error: pangoxft 
Pango backend found but did not find freetype libraries 
make: *** No targets specified and no makefile found. Stop. 
### execution of LD_TWOLEVEL_NAMESPACE=1 failed, exit code 2 
Failed: compiling gtk+2-2.2.4-2 failed</pre><pre>checking for freetype-config.../usr/X11R6/bin/freetype-config 
checking For sufficiently new FreeType (at least 2.0.1)... no 
configure: error: pangoxft 
Pango backend found but did not find freetype libraries 
make: *** No targets specified and no makefile found. Stop. 
### execution of LD_TWOLEVEL_NAMESPACE=1 failed, exit code 2 
Failed: compiling gtk+2-2.2.4-2 failed</pre><p>значит, проблема возникла из-за путаницы между заголовками в пакете
                    <code>freetype</code> | <code>freetype-hinting</code>
                    и заголовками <code>freetype2</code>, сопровождающими 
                    X11 | XFree86.</p><pre>fink remove freetype freetype-hinting</pre><p>удалит любой вариант, который вы инсталлировали. С
                    другой стороны, если ваша ошибка выглядит так:</p><pre>ld: Undefined symbols: _FT_Access_Frame</pre><p>это обычно по причине файла, оставшегося после предыдущей
                    инсталляции X11. Инсталлируйте снова X11 SDK.</p><p>Наконец, если у вас
                    появляется сообщение об ошибке типа</p><pre>dyld: klines Undefined symbols: /sw/lib/libqt-mt.3.dylib 
undefined reference to _FT_Access_Frame</pre><p>это значит, что у вас наверное бинарная версия, построенная вместе с
                    <code>gcc3.3</code> в Jaguar, но не работающая в Panther.
                    Теперь существует обновление и таким образом вам просто надо обновить
                    свои пакеты, н-р через <code>sudo apt-get update ; sudo
                        apt-get dist-upgrade</code>.</p></div>
        </a>
        <a name="dlfcn-from-oo">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.16: Получил сообщение об ошибке построения с упоминанием `Dl_info'.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если сообщение выглядит так: </p><pre>unix_dl.c: In function `rep_open_dl_library':
unix_dl.c:328: warning: assignment discards qualifiers from pointer target type 
unix_dl.c: In function `rep_find_c_symbol': 
unix_dl.c:466: error: `Dl_info' undeclared (first use in this function)
unix_dl.c:466: error: (Each undeclared identifier is reported only once 
unix_dl.c:466: error: for each function it appears in.)
unix_dl.c:466: error: parse error before "info" 
unix_dl.c:467: error: `info' undeclared (first use in this function) 
make[1]: *** [unix_dl.lo] Error 1</pre><p>то скорее всего ваш файл заголовка
                    <code>/usr/local/include/dlfcn.h</code> несовместим
                    с Panther. Надо его убрать.</p><p>Обычно его инсталлирует Open Office и вам надо
                    заменить этот файл заголовка, а также библиотеку
                    <code>/usr/local/lib/libdl.dylib</code> на символические указатели (алиасы)
                  встроенных файлов Panther</p><pre>sudo ln -s /usr/include/dlfcn.h /usr/local/include/dlfcn.h
sudo ln -s /usr/lib/libdl.dylib /usr/local/lib/libdl.dylib</pre></div>
        </a>
        <a name="gcc2">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.17: Fink утверждает, что мне не хватает <code>gcc2</code> или
                    <code>gcc3.1</code>, но их инсталляция не представляется возможной.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это потому, что <code>gcc2</code> и
                    <code>gcc3.1</code> являются виртуальными пакетами для отражения
                    наличия gcc-2.95 и gcc-3.1, соответственно, в вашей системе.
                   Инсталлируйте пакет gcc2.95 и/или gcc3.1 из
                    XCode Tools (в более ранних версиях OS есть gcc-2.95 и
                    gcc-3.1 как часть основной инсталляции Developer Tools).</p></div>
        </a>
        <a name="system-java">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.18: Fink утверждает: <code>Failed: Can't resolve dependency
                    "system-java14-dev"</code>, но такого пакета нет.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это виртуальный пакет. Ошибка данного типа
                    имеет место, когда Java обновляется при помощи Software Update: файлы
                    заголовков удаляются и это приводит к тому, что пакет -dev не воспроизводится.</p><p>Надо скачать соответствующий пакет <code>Java Developer
                    Tools</code> из <a href="http://connect.apple.com">Apple</a>. В данном отдельном случае
                    это <code>Java 1.4.2 Developer Tools</code>.</p></div>
        </a>
        <a name="dpkg-split">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.19: При попытке инсталляции ч.-л. получаю сообщение: <q>dpkg
                        (subprocess): failed to exec dpkg-split to see if it's
                        part of a multiparter: No such file or
                    directory</q>. Как это исправить?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Вообще это исправляется при помощи правильной настройки среды,
                    см. <a href="usage-fink.php?phpLang=ru#fink-not-found">этот Ч.З.В.</a>.</p></div>
        </a>
        <a name="xml-parser">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.20: Получил такое сообщение: <q>configure: error:
                        XML::Parser perl module is required for
                    intltool</q>. Что делать?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Надо убедиться, что у вас правильный вариант пакета
                    xml-parser-pm для соответствия версии Perl в вашей
                    системе. Н-р, в Panther надо иметь
                    <code>xml-parser-pm581</code>, а не
                    <code>xml-parser-pm560</code> (у вас также может быть заполнитель
                    <code>xml-parser-pm</code>), т.к. у вас
                    <code>Perl-5.8.1</code>, а не <code>Perl-5.6.0</code>.
                    Если вы в Jaguar и используете по умолчанию системную версию Perl,
                    у вас будет вариант <code>pm560</code>, а если вы инсталлировали
                     <code>Perl 5.8.0</code>, у вас может быть вариант
                    <code>pm580</code>.</p></div>
        </a>
        <a name="master-problems">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.21: Пытаюсь скачать пакет, а Fink выходит на какой-то загадочный сайт
                    с <q>distfiles</q> в названии, а файла там
                    нет.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Дело в том, что Fink пытается использовать одно из
                    т.н. зеркал <q>Master</q>. Они созданы для обеспечения
                    доступности исходных кодов для пакетов Fink
                    даже тогда, когда апстрим-сайт их убирает.
                    Как правило, такие ошибки случаются, когда новая апстрим-версия пакета
                    выпущена, но еще не попала в зеркала Master.
                </p><p>Для исправления примените <code>fink configure</code> и установите
                    порядок поиска для использования зеркал Master в последнюю очередь.</p></div>
        </a>
        <a name="compile-options">
            <div class="question"><p><b><? echo FINK_Q ; ?>6.22: Хочу, чтобы Fink использовал разные опции при построении пакета.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Прежде всего надо направить координатору пакета запрос
                    о варианте. Это может быть относительно легко. Если
                    вы не получите ответа от координатора, если увидите новые пакеты
                    или захотите попробовать сами другую опцию, см. 
                        <a href="http://www.finkproject.org/doc/quick-start-pkg/index.php">Пособие по
                    пакетированию</a> и <a href="http://www.finkproject.org/doc/packaging/index.php">Учебник по пакетированию</a>.</p><p>
                    <b>Прим.: </b>Fink сознательно создан таким образом, чтобы все
                    официальные бинарные файлы были идентичными, независимо от того, на какой машине
                    они созданы, и таким образом явления типа оптимизации G5 не произойдут
                    с официальным пакетом. Если вам это нужно, придется
                    сделать это самостоятельно.</p></div>
        </a>
    
    <a name="gettext">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.23: Whenever I try to build from source, Fink keeps waffling between <code>gettext-dev</code> and <code>libgettext3-dev</code>.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Some packages that need <code>gettext</code> headers to build have been updated to use <code>libgettext3-dev</code> and some still use <code>gettext-dev</code>.  Consequently, Fink may try to switch to whichever one isn't currently installed in order to satisfy a build dependency for some package that you're trying to update.  In addition, the <code>fink </code> tool treats <code>gettext-dev</code> as essential, and will install it any time you selfupdate.</p><p>Similar behavior can happen for other pairs of packages, too. </p><p>Unfortunately, due to limitations in the build-dependency engine, you may find that your build bombs because you've swapped in one of these but some later package in your build chain wants the other one.  You can usually proceed by repeating your update command again.</p><p>In extreme cases you may wind up having to install those packages which build-depend on <code>gettext-dev</code> separately from those which want <code>libgettext3-dev</code> (or whichever pair are causing problems).  You may even have to install packages one by one.</p><p>A permanent fix should hopefully be available in <code>fink-0.24.9</code>.</p></div>
    </a>
    <a name="python-mods">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.24: I get errors involving <code>MACOSX_DEPLOYMENT_TARGET </code>when I try to build a Python module.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> For errors that look like the following:</p><pre>running build
running build_ext
Traceback (most recent call last):
  File "setup_socket_ssl.py", line 21, in ?
    depends = ['socketmodule.h'] )
  File "/sw/src/root-python24-2.4.1-1/sw/lib/python2.4/distutils/core.py", line 166, in setup
SystemExit: error: $MACOSX_DEPLOYMENT_TARGET mismatch: now "10.4" but "10.3" during configure
### execution of /sw/bin/python2.4 failed, exit code 1</pre><p>the problem occurs because the <code>python2*</code> packages write the current <code>MACOSX_DEPLOYMENT_TARGET</code> to a configuration file when they're built and the python build utilities use this value when compiling modules. This means that if you have, for example, a <code>python24</code> package on 10.4 that was built on 10.3, either by upgrading 10.3 =&gt; 10.4, or via the <b>10.4-transitional</b> binary distribution, in which <code>python24</code> wasn't rebuilt, there will be a mismatch between what python thinks <code>MACOSX_DEPLOYMENT_TARGET</code> should be (10.3) and what it actually is (10.4).</p><p>The fix is to rebuild the offending <code>python</code> package, e.g. <code>fink rebuild python24</code> for the case above.</p><p>For runtime errors that give the same type of error message as above, rebuild the module after rebuilding the appropriate <code>python2*</code> package.</p></div>
    </a>
<a name="libtool-unrecognized-dynamic">
  <div class="question"><p><b><? echo FINK_Q ; ?>6.25: I get <q>unrecognized option `-dynamic'</q> errors from <code>libtool</code>.</b></p></div>
<div class="answer"><p><b><? echo FINK_A ; ?>:</b> This error:</p><pre> libtool: unrecognized option `-dynamic'</pre><p>typically means that you've replaced Apple's <code>/usr/bin/libtool</code> with a GNU <code>libtool</code>.  Unfortunately, the two <code>libtools</code> <b>do not</b> do the same thing.</p><p>The only way to solve this is to get a working Apple <code>libtool</code> from somewhere.  It is installed as part of the <code>DeveloperTools.pkg</code> package of the XCode Tools, and you can reinstall that whole package if you first clear out its receipt in <code>/Library/Receipts</code> (drag it to the Trash for OS 10.4 and later, or use <code>sudo rm -rf /Library/Receipts/DeveloperTools.pkg</code> for 10.3).</p></div>
</a>

    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="comp-packages.php?phpLang=ru">7. Проблемы компиляции - специальные пакеты</a></p>
<? include_once "../footer.inc"; ?>


