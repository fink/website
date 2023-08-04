<?php
$title = "Использование X11 - Устранение проблем";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 5:08:13';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Использование X11 Contents"><link rel="next" href="tips.php?phpLang=ru" title="Подсказки по использованию"><link rel="prev" href="other.php?phpLang=ru" title="Другие возможности X11">';


include_once "header.ru.inc";
?>
<h1>Использование X11 - 7. Устранение проблем, возникших в связи с XFree86</h1>
        
        
        <h2><a name="immedate-quit">7.1 При запуске XDarwin она практически сразу завершает работу или зависает</a></h2>
            
            <p> Прежде всего: не паникуйте! Есть масса вещей, которые плохо работают с
                XFree86, и многие из них могут вызывать сбои при
                запуске. Кроме того, нет ничего необычного в том, что XDarwin прекращает работу,
                когда сталкивается в проблемами запуска. В данном разделе мы попытаемся отразить все
                проблемы, с которыми вы можете столкнуться. Но прежде всего
                вам надо собрать всю необходимую информацию:</p>
            <p>
                <b>Версия XDarwin.</b> Вы можете найти версию XDarwin в искателе
                (Finder), щелкнув <b>один раз</b> на иконке XDarwin и выделив
                "Show Info" в меню. Версия отражает возрастающие номера
                новых пробных бинарных версий в рамках проекта
                XonX, и таким образом "1.0a1" фактически может быть
                любой версией между 1.0a1 и 1.0a2.</p>
            <p>
                <b>Сообщения об ошибках.</b> Далее даны основные виды точного описания
                отдельных возникающих проблем. От вашего способа запуска XDarwin зависит
                форма получения сообщения об ошибке. Если вы запускаете
                <code>startx</code> из терминального окна, сообщение появится непосредственно в этом
                окне. Не забывайте, что можно использовать прокрутку.
                Если вы запускаете XDarwin при помощи двойного щелчка на иконке,
                сообщение поступит в системный журнал, к которому вы можете получить доступ
                через приложение консоли в каталоге утилит. Убедитесь, что
                выбираете правильный (т.е. последний) набор сообщений.</p>
            <p> Начнем со списка сообщений, которые вы можете увидеть:</p>
            <pre>_XSERVTransmkdir: Owner of /tmp/.X11-unix should be set
                to root</pre>
            <pre>_IceTransmkdir: Owner of /tmp/.ICE-unix should be set to root</pre>
            <p> Классификация ошибки: безобидная. X11 создает скрытые каталоги в /tmp для хранения
                "файлов" разъемов для локальных соединений. Из соображений
                безопасности X11 предпочитает, чтобы эти каталоги принадлежали
                суперпользователю, но поскольку они в любом случае пишутся пословно, в их работе
                не возникает проблем. (Прим.: Их владение суперпользователем крайне затруднительно,
                т.к. Mac OS X удаляет /tmp при перезагрузке, а работе XDarwin
                не присущи привилегии суперпользователя, впрочем они ей и не требуются.)</p>
            <pre>QuartzAudioInit: AddIOProc returned 1852797029</pre>
            <pre>-[NSCFArray objectAtIndex:]: index (2) beyond bounds (2)</pre>
            <pre>kCGErrorIllegalArgument : CGSGetDisplayBounds (display 35434400)</pre>
            <pre>No core keyboard</pre>
            <p> Классификация ошибки: сомнительная. Это проистекающие ошибки в результате
                попытки сервера вновь настроить самого себя после предыдущей ошибки. В процессе этого
                печатается другая копия баннера запуска, после чего появляется одно или несколько из вышеуказанных сообщений,
                поскольку повторная настройка сервера не может работать должным образом
                в поврежденных версиях XDarwin. Если вы получаете подобные сообщения, надо
                сделать прокрутку в терминальном окне соответствующей консоли
                и поискать другой набор баннера и сообщений. 
                Это относится ко всем версиям вплоть до XDarwin 1.0a3 включительно; данная проблема
                была решена после выпуска 1.0a3.</p>
            <pre>cat: /Users/chrisp/.Xauthority: No such file or directory</pre>
            <p> Классификация ошибки: практически безобидная. Неизвестно, как эти сообщения приходят,
                но на работу они не влияют. Можно от них избавиться, применив
                 <code>touch .Xauthority</code> в базовом
                каталоге.</p>
            <pre>Gdk-WARNING **: locale not supported by C library</pre>
            <p> Классификация ошибки: безобидная. Она просто отражает свое содержание и не
                препятствует работе приложения. Более подробно <a href="#locale">см. ниже</a>.</p>
            <pre>Gdk-WARNING **: locale not supported by Xlib, locale set
                to C Gdk-WARNING **: can not set locale modifiers</pre>
            <p> Классификация ошибки: серьезная, но не фатальная. Такие сообщения могут появляться в дополнение к
                вышеуказанным. Они означают, что локальные файлы данных XFree86
                отсутствуют. Нам представляется, что они появляются
                невоспроизводимым образом при построении Free86 от исходного кода. Большинство приложений
                будут продолжать работу, за очевидным исключением GNU Emacs.</p>
            <pre>Unable to open keymapping file USA.keymapping. Reverting
                to kernel keymapping.</pre>
            <p> Классификация ошибки: чаще всего фатальная. Это может произойти с XDarwin 1.0a1 при активации
                опции раскладки клавиатуры "Загрузить из файла" ("Load from file").
                Данная версия нуждается в полном маршруте при настройке загрузки файла через
                диалог параметров, но производит автоматический поиск при ее передаче на
                строку команд. Это сообщение обычно сопровождается
                другим сообщением с "assert", приведенным ниже. Для исправления
                ошибки выполните нижеуказанные инструкции.</p>
            <pre>Fatal server error: assert failed on line 454 of darwinKeyboard.c!</pre>
            <pre>Fatal server error: Could not get kernel keymapping! Load
                keymapping from file instead.</pre>
            <p> Классификация ошибки: фатальная. Изменения, внесенные Apple в Mac OS X 10.1, повредили код
                XFree86, считывающий раскладку клавиатуры из
                ядра операционной системы; в результате появилось данное сообщение.
                Надо использовать опцию "Загрузить из файла" ("Load from file") в
                Mac OS X 10.1. Настройка находится в диалоге параметров XDarwin.
                Убедитесь, что файл выделен (т.е. используйте кнопку "Pick
                file") - простая активация отмечаемой кнопки недостаточна в
                некоторых версиях XDarwin. Если вы не можете попасть в диалог параметров
                из-за того, что XDarwin закрывается прежде, чем у вас появляется возможность это сделать,
                используйте <code>startx --
                    -quartz -keymap USA.keymapping</code> в терминальном окне. Обычно этого достаточно для запуска
                XDarwin; затем вы можете отразить постоянный выбор в
                диалоге параметров.</p>
            <pre>Fatal server error: Could not find keymapping file .</pre>
            <p>Классификация ошибки: фатальная (о чем и сообщается). Данная ошибка возникает по причине отсутствия
                файлов раскладки клавиатуры в Panther. Надо инсталлировать
                <code>xfree86-4.3.99-16</code> или более позднюю версию - они не нуждаются в
                файлах раскладки клавиатуры.</p>
            <pre>Warning: no access to tty (Inappropriate ioctl for
                device). Thus no job control in this shell.</pre>
            <p> Классификация ошибки: в большинстве случаев безобидная. XDarwin 1.0a2 и более поздние версии запускают
                интерактивную оболочку на заднем плане для запуска клиентского файла
                (.xinitrc). Это делается для того, чтобы вам не пришлось добавлять
                определения для настройки PATH в этом файле. Некоторые оболочки жалуются, что
                они не подсоединены к реальному терминалу, но на это можно не обращать внимания,
                потому что оболочки не используются в целях
                управления заданиями и т.п.</p>
            <pre>Fatal server error: failed to connect as window server!</pre>
            <p> Классификация ошибки: фатальная. Она означает, что сервер консольного режима (для чистой
                Darwin) начал работу, пока вы были в Aqua. Как правило, это
                происходит, если для инсталляции была использована официальная бинарная дистрибуция XFree86
                без тарбола Xquartz.tgz. Это также может произойти,
                если алиасы в /usr/X11R6/bin перепутались или вы использовали
                команду <code>XDarwin</code> в терминальном окне для
                запуска сервера (в последнем случае надо вместо нее использовать команду startx -
                см. <a href="run-xfree86.php?phpLang=ru">Starting XFree86</a>).</p>
            <p> В любом из этих случаев вы можете использовать <code>ls -l /usr/X11R6/bin/X*</code>
                и проверить выходные данные. Вы должны увидеть четыре соответствующих записи:
                <code>X</code>, алиас со ссылкой на
                <code>XDarwinStartup</code>;<code>XDarwin</code>, выполняемый файл
                (это сервер с консольным режимом);
                <code>XDarwinQuartz</code>, алиас со ссылкой на
                <code>/Applications/XDarwin.app/Contents/MacOS/XDarwin</code>;
                <code>XDarwinStartup</code>, небольшой выполняемый файл. Если какие-либо из данных записей отсутствуют
                или ссылаются на другие файлы, надо сделать исправление.
                Способ исправления зависит от способа, использованного вами при
                инсталляции XFree86. Если вы инсталлировали XFree86 при помощи Fink, надо
                вновь инсталлировать пакет <code>xfree86</code> (или
                <code>xfree86-rootless</code> для OS 10.2 и более ранних версий). Если вы инсталлировали его
                самостоятельно, надо получить файлы из копии Xquartz.tgz.</p>
            <pre>The XKEYBOARD keymap compiler (xkbcomp) reports: &gt;
                Error: Can't find file "unknown" for geometry
                include &gt; Exiting &gt; Abandoning geometry file
                "(null)" Errors from xkbcomp are not fatal to
                the X server</pre>
            <p> Классификация ошибки: в большинстве случаев безобидная. Как следует из сообщения, это не фатальная ошибка.
                Насколько мне известно, XDarwin вообще не использует расширение XKB.
                Возможно, какая-то клиентская программа пытается его тем не менее использовать ...</p>
            <pre>startx: Command not found.</pre>
            <p> Классификация ошибки: фатальная. Это может произойти с XDarwin 1.0a2 и 1.0a3, если
                ваши файлы инциализации оболочки не содержат настроек для добавления
                /usr/X11R6/bin к переменной величине PATH. Если вы используете Fink и не изменили
                настройки оболочки по умолчанию, для исправления должно быть достаточно добавления строки <code>source
                /opt/sw/bin/init.csh</code> к <code>.cshrc</code> в базовом каталоге
                (как рекомендуется в инструкциях Fink).
                </p>
            <pre>_XSERVTransSocketUNIXCreateListener:
                ...SocketCreateListener() failed
                _XSERVTransMakeAllCOTSServerListeners: server already running</pre>
            <pre>Fatal server error: Cannot establish any listening
                sockets - Make sure an X server isn't already running</pre>
            <p> Классификация ошибки: фатальная. Она происходит после случайного одновременного запуска нескольких
                копий XDarwin или после некорректного выключения
                 XDarwin (н-р, при зависании). Также это может быть проблема полномочий доступа к
                файлам разъемов для локальных соединений. Можно попытаться воспользоваться
                <code>rm -rf /tmp/.X11-unix</code>.
                В большинстве случаев также помогает повторный запуск компьютера (когда Mac OS X
                автоматически очищает /tmp, а сетевой пакет перезагружается)
                </p>
            <pre>Xlib: connection to ":0.0" refused by
                server Xlib: Client is not authorized to connect to Server</pre>
            <p> Классификация ошибки: фатальная. Клиентские программы не могут установить соединение с
                сервером отображения (XDarwin), потому что используют ложные опознавательные данные.
                Ошибка может быть вызвана некоторыми инсталляциями VNC при запуске XDarwin
                через sudo и, вероятно, другими непонятными событиями. Обычное исправление
                состоит в удалении файла .Xauthority (хранящего опознавательные
                данные) в базовом каталоге и повторном создании
                пустого файла:</p>
            <pre>cd rm .Xauthority touch .Xauthority</pre>
            
            <p> Еще одна распространенная причина отказов при запуске XFree86 -
                некорректный файл <code>.xinitrc</code>.
                Файл <code>.xinitrc</code> запускается и по какой-то причине
                практически сразу прекращает сеанс.<code>xinit</code>
                интерпретирует это как "завершение сеанса пользователя" ("the user's session has
                ended") и уничтожает XDarwin. См. раздел <a href="run-xfree86.php?phpLang=ru#xinitrc">.xinitrc
                </a> для получения более подробной информации. Не забудьте, что надо настроить PATH и
                иметь в распоряжении одну долговременную программу, которая запускается не на
                заднем плане. Хорошей идеей является добавление <code>exec xterm</code> для
                возврата в исходный режим, когда невозможно найти менеджер окон и т.п.</p>
            
        
        <h2><a name="black">7.2 Черные иконки на панели GNOME и в меню приложения GNOME</a></h2>
            
            <p> Общая проблема заключается в том, что иконки и другие изображения имеют
                вид черных прямоугольников или контурных линий. Первоначально это было обусловлено
                ограничениями в ядре операционной системы. О проблеме сообщили
                Apple, но пока ее не исправили;
                более подробно см. <a href="http://www.opensource.apple.com/bugs/X/Kernel/2691632.html">Отчеты об
                    ошибках в Darwin</a>.</p>
            <p> На данный момент ситуация такова, что расширение MIT-SHM протокола X11
                практически не используется в Darwin и Mac OS X. Есть
                два способа дезактивировать расширение протокола: на сервере
                и на клиенте. На серверах XFree86, инсталлированных при помощи Fink (т.e. пакетах
                xfree86-server и xfree86-rootless), оно уже дезактивировано.
                GIMP и панель GNOME также были модифицированы. 
                Если у вас есть черные иконки в другом приложении, запустите его
                с использованием опции строки команд <code>--no-xshm</code>.</p>
        
        <h2><a name="keyboard">7.3 Клавиатура не работает в XFree86</a></h2>
            
            <p> Это известная проблема, которая пока, насколько мы знаем, влияет только на
                портативные компьютеры (PowerBook, iBook). Раньше для ее решения использовалась опция
                раскладки клавиатуры "Load from file".
                Сейчас она стала опцией по умолчанию, поскольку старый способ
                (считывание раскладки из ядра) перестал работать в
                Mac OS X 10.1. Если у вас эта опция не активирована,
                можно это сделать в диалоге параметров XDarwin. Надо отметить пункт
                "Load from file" и выделить файл раскладки клавиатуры для
                загрузки. После перезагрузки XDarwin ваша клавиатура
                должна функционировать лучше (см. текст далее).</p>
            <p> Если вы запускаете XFree86 со строки команд, можно перенести
                имя файла раскладки клавиатуры для загрузки в качестве опции, н-р:</p>
            <pre>startx -- -quartz -keymap USA.keymapping</pre>
        
        <h2><a name="delete-key">7.4 Клавиша возврата (Backspace) не действует</a></h2>
            
            <p> Это происходит, когда вы используете опцию "Load keymapping from
                file", описанную выше. Файлы раскладки описывают
                клавишу Backspace как "Delete", а не
                "Backspace". Можно исправить положение, внеся
                следующую строку в файл .xinitrc:</p>
            <pre>xmodmap -e "keycode 59 = BackSpace"</pre>
            <p> Если не ошибаюсь, XDarwin 1.0a2 и более поздние версии имеют код,
                автоматически корректно отображающий эту клавишу.</p>
        
        <h2><a name="locale">7.5 "Warning: locale not supported by C library"</a></h2>
            
            <p> Подобные сообщения очень часты, но безобидны. Они означают только то, о чем
                сообщают - интернационализация не поддерживается стандартной библиотекой
                C и программа будет использовать по умолчанию английский язык для сообщений, форматов дат и т.п.
                Есть несколько способов реагирования на
                данную проблему:</p>
            <ul>
                <li>
                    <p> Просто не обращать на сообщения внимания.</p>
                </li>
                <li>
                    <p> Избавляться от сообщений, установив переменную величину среды
                        LANG в состояние "0". Имейте в виду, что это также отключит
                        интернационализацию в программах, которые ее поддерживают
                        (через gettext/libintl). Пример для .xinitrc:</p>
                    <pre>unset LANG</pre>
                    <p> Пример для .cshrc:</p>
                    <pre>unsetenv LANG</pre>
                </li>
                <li>
                    <p> (только для 10.1) Использовать пакет Fink <code>libxpg4</code>.
                        Он создает небольшую библиотеку с рабочими локальными
                        функциями и обеспечивает ее загрузку перед загрузкой системных
                        библиотек (с использованием переменной величины среды D_INSERT_LIBRARIES).
                        Возможно, вам надо будет установить переменную величину среды LANG
                        с полной точностью, н-р
                        <code>de_DE.ISO_8859-1</code> вместо <code>de</code>
                        или <code>de_DE</code>.</p>
                </li>
                <li>
                    <p> Обратиться к Apple с просьбой включить полную локальную поддержку
                        в следующую версию Mac OS X.</p>
                </li>
            </ul>
        
    <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="tips.php?phpLang=ru">8. Подсказки по использованию</a></p>
<?php include_once "../../footer.inc"; ?>


