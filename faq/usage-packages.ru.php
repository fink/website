<?
$title = "Ч.З.В. - Использование (2)";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2006/06/09 14:57:47';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="prev" href="usage-general.php?phpLang=ru" title="Проблемы использования пакетов - Общие вопросы">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 9. Проблемы использования пакетов  - Специальные пакеты</h1>
        
        
        <a name="xmms-quiet">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.1: Нет ни звука от XMMS</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Убедитесь, что у вас есть "eSound Output Plugin", отмеченный в
                   преференциях XMMS. По какой-то странной причине он выбирает плагин
                    записывающего устройства диска по умолчанию.</p><p>Если все еще нет звукового вывода или XMMS жалуется, что не может
                    найти аудиокарту, попробуйте сделать следующее:</p><ul>
                    <li>Убедитесь, что вы не заглушили звуковой вывод в Mac OS X.</li>
                    <li>Выполните <code>esdcat /usr/libexec/config.guess</code> (или
                        любой другой файл приличного размера). Если будет слушен короткий
                        звук, значит, eSound работает и XMMS должен работать тоже, если
                        его конфигурация правильная. Если ничего не слышно, esd
                        по какой-то причине не работает. Можно попробовать запустить его
                        вручную с <code>esd &amp;</code> и взглянуть на
                        сообщения.</li>
                    <li>Если он все еще не работает, проверьте разрешения на
                        <code>/tmp/.esd</code> и
                        <code>/tmp/.esd/socket</code>. В них должна быть указана ваша
                        учетная запись обычного пользователя в качестве владельца. Если они вам не принадлежат,
                        надо уничтожить esd, если он работает, удалить каталог в качестве
                        суперпользователя (<code>sudo rm -rf /tmp/.esd</code>), затем снова запустить
                        esd (в качестве обычного пользователя, а не суперпользователя).</li>
                </ul><p>Надо учитывать, что esd разработан для выполнения обычным пользователем, а не
                    суперпользователем. Обычно он осуществляет связь через гнездо файловой системы
                    <code>/tmp/.esd/socket</code>. Вам могут понадобиться выключатели
                    <code>-tcp</code> и <code>-port</code>, если вы хотите
                    управлять клиентами esd или другой машиной через сеть.</p><p>Также имеются сообщения об отказах и зависании XMMS в
                    10.1. Мы еще не проанализировали и не устранили эту проблему. </p></div>
        </a>
        <a name="nedit-window-locks">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.2: Когда во время редактирования файла в nedit я открываю другой файл, его окно
                    появляется, но не работает.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это известная проблема, которая наблюдается в последних версиях
                    <code>nedit</code> и <code>lesstif</code>
                    на всех платформах. Обойти ее можно так: открыть новое окно
                    при помощи File--&gt;New, а затем открыть следующий файл, с которым
                    вы хотите работать.</p><p>Сейчас эта проблема решена в <code>nedit-5.3-6</code>, который зависит
                    от <code>openmotif3</code> в большей степени, чем от <code>lesstif</code>.</p></div>
        </a>
        <a name="xdarwin-start">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.3: Помогите! Когда запускаю XDarwin, она сразу завершает работу!</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Не паникуйте. Документ "Выполнение X11" сейчас имеет большой раздел
                        <a href="http://fink.sourceforge.net/doc/x11/trouble.php#immediate-quit">Выявление и устранение проблем
                    </a> по данному общему вопросу.</p></div>
        </a>
        <a name="no-server">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.4: При попытке запуска XDarwin получил сообщение "xinit: No such
                    file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Во-первых, надо убедиться, что вы основываетесь на init.sh при запуске X <code>~/.xinitrc</code>.</p><p>В Jaguar иногда все пакеты <code>xfree86</code> поддаются построению,
                    но только <code>xfree86-base</code> и
                    <code>xfree86-base-shlibs</code> инсталлируются. Проверьте, есть ли у вас
                    инсталлированные <code>xfree86-rootless</code> и
                    <code>xfree86-rootless-shlibs</code>. Если нет, то проблема в
                        <code>fink install xfree86-rootless</code>.</p><p>Если да, то надо попробовать <code>fink rebuild
                    xfree86-rootless</code>. Если это не сработает, проверьте, есть ли у вас
                     <code>/usr/bin/X11R6</code> в PATH.</p></div>
        </a>
        
        <a name="xterm-error">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.5: xterm не может выполнить "dyld: xterm Undefined symbols: xterm
                    undefined reference to _tgetent expected to be defined in /usr/lib/libSystem.B.dylib".</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это связано с использованием версии 10.1 XFree86 в 10.2.
                    Надо обновить до версии 10.2</p><p>Если вы используете пакеты Fink <code>xfree86</code>, надо
                    сделать обновление обычным образом ("<code>fink
                        selfupdate-cvs ; fink update-all</code>" для
                    инсталляции на основе исходного кода, <code>fink selfupdate ; ; sudo
                        apt-get update; sudo apt-get dist-upgrade</code>" для
                    инсталляции на основе бинарных файлов.</p><p>Если вы инсталлировали XFree86 иначе, можно найти
                    патчи для обновления на <a href="http://mrcla.com/XonX">XonX web site</a>.</p></div>
        </a>
        <a name="libXmuu">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.6: При попытке запуска XFree86 получаю одно из таких
                    сообщений об ошибке: "dyld: xinit can't open library:
                    /usr/X11R6/lib/libXmuu.1.dylib" or "dyld: xinit can't open
                    library: /usr/X11R6/lib/libXext.6.dylib"</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> У вас не хватает файла, который должен был быть инсталлирован при помощи
                    <code>xfree86-base-(threaded)-shlibs</code>. Надо его реинсталлировать
                    при помощи <code>fink reinstall
                    xfree86-base-shlibs</code> (<code>fink reinstall
                    xfree86-base-threaded-shlibs</code>если вы используете
                    связные пакеты XFree86) для исходного кода, либо <code>sudo apt-get
                        install --reinstall xfree86-base-shlibs</code> для бинарных файлов.</p></div>
        </a>
        <a name="apple-x-bugs">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.7: У меня инсталлирован XFree86 от Fink; я его заменил на
                    X11 от Apple и теперь все разваливается!</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Во-первых, если до этого у вас были инсталлированы "связные" версии пакетов
                    Fink XFree86, возможно вам надо будет перестроить
                    приложение, которое разваливается. Некоторые программы
                    проверяют связность в момент компоновки и
                    с этого момента считают, что она для них существует. </p><p>Во-вторых, возможно, что вы просто натолкнулись на дефект в Apple X11. На данный
                    момент о ряде дефектов известно рабочей группе
                    Apple и они над этим работают.</p><p>Если у вас есть общие вопросы по Apple X11, которые не относятся к
                    Fink, можно посмотреть:<a href="http://www.lists.apple.com/x11-users">Официальный перечень Apple
                        по обсуждению X11</a>. Также
                     о дефектах в X1 рекомендуется <a href="http://developer.apple.com/bugreporter">сообщать
                        генератору отчетов о дефектах Apple</a>.</p></div>
        </a>
        <a name="apple-x-delete">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.8: Хочу стереть клавишу в Apple X11.app для поведения, как в
                    XDarwin.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Некоторые пользователи сообщают, что поведение клавиши
                    <code>delete</code> в XDarwin отличается от ее поведения в
                    Apple X11. Это можно исправить путем добавления строк к
                    соответствующим файлам инициализации X:</p><p>
                    <b>.Xmodmap:</b>
                </p><pre>keycode 59 = Delete</pre><p>
                    <b>.Xresources:</b>
                </p><pre>xterm*.deleteIsDEL: true xterm*.backarrowKey: false
                    xterm*.ttyModes: erase ^?</pre><p>
                    <b>.xinitrc</b>
                </p><pre>xrdb -load $HOME/.Xresources xmodmap $HOME/.Xmodmap</pre><p></p></div>
        </a>
        <a name="gnome-two">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.9: Я сделал обновление от GNOME 1.x дo GNOME 2.x и теперь
                    <code>gnome-session</code> не открывает менеджер окон. </b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Тогда как в GNOME 1.x <code>gnome-session</code> активизирует
                     менеджер окон <code>sawfish</code> автоматически, в
                    GNOME 2.x надо запускать менеджер окон в
                    <code>~/.xinitrc</code> до выполнения
                    <code>gnome-session</code>, н-р:</p><pre>... exec metacity &amp; exec gnome-session</pre><p>Прим.: это больше не относится к <b>GNOME 2.4</b>. Выполнение
                    <code>gnome-session</code> активизирует менеджер окон.</p></div>
        </a>
        <a name="apple-x11-no-windowbar">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.10: Я сделал обновление до Apple X11 в Panther и теперь у меня не хватает
                    строк заголовков в окнах.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Вы не обновили X11 до версии  "X11 1.0 - XFree86 4.3.0",
                    включенной в Panther. Вы можете инсталлировать X11 из X11.pkg на
                    Disk 3.</p></div>
        </a>
        <a name="apple-x11-wants-xfree86">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.11: Я инсталлировал Apple X11, но Fink продолжает спрашивать об
                    инсталяции XFree86 или X.org.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Есть две возможности на ваше усмотрение.</p><ul>
                    <li>
                        <b>При инсталляции на бинарной основе:</b>
                        <p>Если у вас текущая версия <code>fink</code>
                            (&gt;=0.18.3-1), то обычно надо реинсталлировать
                            пакет пользователя X11, т.к.
                            приложение инсталлятора иногда не инсталлирует
                            файл. Возможно, вам придется это делать
                            неоднократно. Выполнение</p>
			<pre>fink list -i system-xfree86</pre>
			<p>должно показать, что пакеты
                        <code>system-xfree86</code> и
                        <code>system-xfree86-shlibs</code>
                            инсталлированы. Если реинсталляция пакета пользователя X11
                            не поможет, см. инструкции по <a href="#special-x11-debug">устранению особых проблем</a>
                            ниже.</p>
                        <p>Если вы выполняете более раннюю версию пакета
                            <code>fink</code>, то обновление
                            <code>fink</code> может решить проблему сразу,
                            н-р через</p>
                        <pre>sudo apt-get update sudo apt-get install fink</pre>
                    </li>
                    <li>
                        <b>При инсталляции на основе исходного кода:</b>
			<p>Если у вас
                        текущая версия<code>fink</code>, то как правило
                        эта ошибка означает, что вам надо (ре)инсталлировать
                        X11SDK, который является <b>обязательным</b>, если вы хотите строить
                        пакеты на основе исходного кода. Он находится на Xcode CD и
                        <b>не</b> инсталлируется по умолчанию. Даже если вы инсталлируете
                        XCode, X11SDK <b>не</b> инсталлируется по умолчанию.
                        Его надо инсталлировать либо при помощи обычного Xcode
                        install, либо щелкнув на X11SDK pkg в папке
                        <code>Packages</code> на XCode CD.</p>
			<p>Если проблемы остаются, используйте </p>
                        <pre>fink list -i system-xfree86 </pre>
                        <p>Она должна показать инсталляцию пакетов <code>system-xfree86</code>,
                            <code>system-xfree86-shlibs</code> и
                            <code>system-xfree86-dev</code>.
                            Если пакет <code>-dev</code> отсутствует,
                            надо реинсталлировать X11SDK, т.к. иногда инсталлятор
                            Apple упускает файл. Возможно, надо будет продолжать это делать.
                            Если один из двух отсутствует,
                            надо реинсталлировать пакет пользователя X11 (по той же причине).</p>
                        <p>
                            <b>Примечание для пользователей Jaguar (X11 beta 3) </b>: Если вы не
                            используете XCode, вам надо было скачать
                            копию соответствующего пакета X11SDK в
                            вашу систему. После окончания срока действия X11 beta 3 ее пакет  X11SDK
                            (а также пакет пользователя X11) больше не предоставляется
                            для скачивания. Вам надо либо ограничиться инсталляцией
                            приложений X11 через посредство
                            бинарной дистрибуции, инсталлировать XFree86 или X.org,
                            либо сделать обновление до Panther.</p>
                        <p>Если вы выполняете версию
                            <code>fink</code> ранее 0.17, надо
                            обновить <code>fink</code>, н-р через </p>
                        <pre>fink selfupdate</pre>(предполагается, что
                        у вас есть подключенное обновление CVS или rsync и что вы не
                        используете только точечные выпуски версий).<p>Если проблему остаются,
                            см. инструкции по <a href="#special-x11-debug">устранению особых проблем</a>
                        ниже.</p>
                        
                    </li>
                </ul></div>
        </a>
        <a name="wants-xfree86-on-upgrade">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.12: Я переключился с версии 10.2 Fink на 10.2-gcc3.3 или 10.3,
                    у меня Apple X11, а Fink просит инсталлировать XFree86 или X.org.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Возможно, вам надо будет удалить один старых пакетов заполнителя: 
                    <code>system-xfree86</code>,
                    <code>system-xfree86-42</code> или
                    <code>system-xfree86-43</code>. Fink сейчас определяет,
                    есть ли у вас вручную инсталлированные парамерты X11, н-р от Apple,
                    и делает виртуальные пакеты. Поскольку другие пакеты
                    зависят от <code>system-xfree86</code>, следует применить
                    команду </p><pre>sudo dpkg -r --force-all system-xfree86
                    system-xfree86-42 system-xfree86-43</pre><p>для удаления устаревших версий. Можно проверить инсталляцию
                    при помощи </p><pre>fink list -i system-xfree86</pre><p>и убедиться, что есть пакеты <code>system-xfree86</code> и
                    <code>system-xfree86-shlibs</code>. Если
                    вы инсталлировали X11SDK, то надо также посмотреть <code>system-xfree86-dev</code>.</p><p>Если проблемы остаются, см. выше вопрос в связи с тем, что <a href="#apple-x11-wants-xfree86">Fink просит инсталлировать XFree86 или
                    X.org</a> </p></div>
        </a>
        <a name="special-x11-debug">
            <div class="question"><p><b><? echo FINK_Q ; ?>9.13: Я меня остались проблемы с X11и Fink.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если подсказки в ответах по поводу проблем: <a href="#apples-x11-wants-xfree86">Fink просит инсталлировать
                        XFree86 или X.org</a> и <a href="#wants-xfree86-on-upgrade">X11 и обновление от
                    10.2</a> не помогают или неприменимы к вашей ситуации,
                    возможно, вам надо убрать свою инсталляцию X11,
                    удалить все старые заполнители и частично/полностью
                    инсталлированные пакеты, связанные с X11:</p><pre>sudo dpkg -r --force-all system-xfree86
                    system-xfree86-42 system-xfree86-43 \ xorg xorg-shlibs
                    xfree86 xfree86-shlibs \ xfree86-base xfree86-base-shlibs
                    xfree86-rootless xfree86-rootless-shlibs \
                    xfree86-base-threaded xfree86-base-threaded-shlibs \
                    xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
                    rm -rf /Library/Receipts/X11SDK.pkg
                    /Library/Receipts/X11User.pkg fink selfupdate; fink index</pre><p>(первая строка может предупреждать о попытке удаления
                    несуществующих пакетов). Затем надо реинсталлировать Apple X11 (и в случае необходимости
                    X11SDK) либо альтернативную разработку X11
                    типа XFree86 или X.org.</p><p>Если проблемы все еще не устранены и вы используете
                    <code>fink-0.19.0</code> или более позднюю версию, можно использовать </p><pre>fink-virtual-pkgs --debug</pre><p>для получения информации о том, чего не хватает.</p><p>Если вы используете более раннюю версию<code>fink</code>,
                    существует скрипт Perl (благодарим Martin Costabel), который
                    можно скачать и выполнить для получения информации. </p><ul>
                    <li>Это здесь: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
                    </li>
                    <li>Его можно сохранить где угодно.</li>
                    <li>Запускать его надо в терминальном окне через посредство <pre>perl fink-x11-debug</pre>
                    </li>
                </ul></div>
        </a>
    
<? include_once "../footer.inc"; ?>


