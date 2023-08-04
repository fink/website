<?php
$title = "Руководство пользователя - Инсталляция";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 4:49:23';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Руководство пользователя Contents"><link rel="next" href="packages.php?phpLang=ru" title="Инсталляция пакетов"><link rel="prev" href="intro.php?phpLang=ru" title="Введение">';


include_once "header.ru.inc";
?>
<h1>Руководство пользователя - 2. Первоначальная инсталляция</h1>
        
        
        
            <p> В процессе первоначальной инсталляции на вашей машине
                инсталлируется базовая система с инструментами управления пакетами.
                После этого вам надо настроить свою среду оболочки для использования ПО,
                инсталлированного при помощи Fink. Это делается только один раз; любое инсталлированное ПО Fink
               (начиная с версии 0.2.0)  может быть обновлено на месте без
                реинсталляции - см. раздел <a href="upgrade.php?phpLang=ru">Обновление</a>.</p>
            <p> После инсталляции инструментов управления пакетами вы можете
                их использовать для инсталляции другого ПО - см. раздел <a href="packages.php?phpLang=ru">Инсталляция пакетов</a>.</p>
        
        <h2><a name="bin">2.1 Инсталляция бинарного дистрибутива</a></h2>
            
            <p> Бинарный дистрибутив представлен в виде пакета инсталлятора Mac OS X
                (.pkg) в загрузочном модуле (.dmg). После скачивания
                загрузочного модуля со страницы <a href="/download/bindist.php">Скачивание
                </a> (возможно, вам придется использовать функцию браузера "Save Target
                as..." или "Download to Disk") сделайте на нем двойной щелчок для начала установки.
                Откройтке иконку диска "Fink 0.x.x Installer" на рабочем столе
                (или там, куда вы его скачали) после проверки файла дисковым утилитом
                (или дисковой копией для версий OS, предшествующих версии 10.3).
                В нем вы найдете документацию и пакет инсталлятора.
                Сделайте двойной щелчок на пакете инсталлятора и следуйте указаниям
                на экране.</p>
            <p> Вам будет задан вопрос о пароле администратора и показаны
                тексты. Прочтите их - они могут быть написаны позже, чем
                данное Руководство. При появлении опций инсталлятора для дискового
                накопителя, на котором надо сделать инсталляцию, выберите правильный объем системы (той, где
                вы инсталлировали Mac OS X). Если вы выберите неправильный объем,
                инсталляция продолжится, но Fink после этого не будет работать. Когда инсталлятор
                закончит работу, перейдите к разделу <a href="#setup">Настройка среды</a>.</p>
        
        <h2><a name="src">2.2 Инсталляция дистрибутива исходного кода</a></h2>
            
            <p> Дистрибутив исходного кода является стандартным тарболом Unix
                (.tar.gz). Он содержит только менеджер пакетов <code>fink</code>
                с их описанием и скачивает исходный код
                для пакетов по требованию. Его можно получить на странице <a href="/download/srcdist.php">Скачивание
                </a>. Важно не использовать StuffIt Expander
                для распаковки архива. По какой-то причине StuffIt все еще
                не может обрабатывать длинные имена файлов. Если StuffIt Expander уже распаковал архив,
                надо удалить созданную им папку.</p>
            <p> Версия исходного кода должна инсталлироваться с командной строки,
                т.е. надо открыть Terminal.app и перейти к каталогу, в котором вы поместили архив
                fink-0.x.x-full.tar.gz. 

(Note: If you have OS X 10.4 and XCode 2.1, you should use
<code>fink-0.8.0-full-XCode-2.1.tar.gz</code> instead, and make
the appropriate changes below.)

                Следующая команда извлекает архив:</p>
            <pre>tar -xzf fink-0.x.x-full.tar.gz</pre>
            <p> Создается каталог с таким же именем, как архив.
                Здесь мы будем называть его
                <code>fink-0.x.x-full</code>. Теперь перейдите в этот каталог и выполните
                скрипт начальной загрузки:</p>
            <pre>cd fink-0.x.x-full ./bootstrap.sh</pre>
            <p> Скрипт произведет проверку вашей системы и использует sudo для
                перехода к статусу суперпользователя - у вас будет запрошен пароль. Затем
                скрипт спросит о маршруте инсталляции. Если у вас нет
                веской причины, надо использовать
                -<code>/opt/sw</code> по умолчанию. Только это позволит вам впоследствии инсталлировать
                скачанные бинарные пакеты. Кроме того, все примеры используют
                этот маршрут; если вы используете другой, надо убедиться, что ваш действительный маршрут
                заменен.</p>
            <p> Следующий шаг - конфигурация Fink. Вам будут заданы вопросы о
                настройках прокси и зеркала, а также о том, хотите ли вы получать многословные сообщения.
                Если вы не поняли какой-то вопрос, надо нажать return для подтверждения
                выбора по умолчанию. Можно перезапустить этот процесс позднее с использованием команды
                    <code>fink configure</code>.</p>
            <p> Когда скрипт начальной загрузки получит всю необходимую информацию, он
                начнет скачивание исходного кода для базовой системы и
                компиляцию. С этого момента не требуется никакое вмешательство.
                Не стоит беспокоиться, если вы увидите некоторые пакеты, компилируемые дважды.
                Это необходимо, т.к. для построения бинарного пакета менеджера пакетов
                сначала надо получить менеджер пакетов.</p>
            <p> По окончании начальной загрузки перейдите к разделу <a href="#setup">Настройка среды</a>.</p>
        
        <h2><a name="setup">2.3 Настройка среды</a></h2>
            
            
            <p>
                Для использования ПО, установленного в иерархии каталогов Fink,
                в т.ч. самих программ управления пакетами, необходимо
                настроить переменную величину вашей среды PATH (и кое-что еще)
                соответствующим образом. В большинстве случаев это выполняется в терминальном окне при помощи команды
                            </p>
            <pre>/opt/sw/bin/pathsetup.sh</pre>
            <p>
                Имейте в виду, что в некоторых более ранних версиях
                Fink это может быть <code>pathsetup.command</code>, которую можно
                запустить так:
            </p>
            <pre>open /opt/sw/bin/pathsetup.command</pre>
            <p>Если по какой-то причине это не сработает, можно сделать
                конфигурацию вручную. Но это будет зависеть от используемой оболочки.
                Можно определить используемую оболочку, открыв терминал
                и выполнив команду
            </p>
            <pre>echo $SHELL</pre>
            <p>
                Если результат будет "csh" или "tcsh", значит, вы используете С-оболочку. Если
                это bash, zsh, sh и т.п., вероятно, у вас
                вариант оболочки Борна.
                            </p>
            <ul>
                <li>
                    <p>
                        Оболочка Борна (по умолчанию в Mac OS X 10.3
                        и более поздних версиях) </p>
                    <p>
                        
                        Если вы используете оболочку Борна (н-р, sh, bash, zsh),
                        добавьте следующую строку к файлу
                        <code>.profile</code> в своем базовом каталоге (либо, если
                        у вас есть файл <code>.bash_profile</code>, надо
                        использовать его вместо <code>.profile</code>):                                              
                    </p>
                    <pre>. /opt/sw/bin/init.sh</pre>
                    <p>
                        Если вы не знаете, как добавить строку, примените
                    </p>
                    <pre>cd
pico .profile</pre>
                    <p>
                        Теперь вы в полноэкранном текстовом редакторе (с полным терминальным
                        окном) и можете просто напечатать строку
                            <code>. /opt/sw/bin/init.sh</code>. Если появится отметка
                        "New file", значит, все в порядке. После ввода строки обязательно нажмите
                        Return не менее одного раза, а затем
                        Control-O, Return и Control-X для выхода из редактора.
                    </p>
                </li>
                <li>
                    <p>
                        С-оболочка (по умолчанию в Mac OS X 10.2 и
                        более ранних версиях) </p>
                    <p>
                        Если вы используете tcsh, добавьте следующую строку к файлу
                        <code>.cshrc</code> в своем базовом каталоге:                    </p>
                    <pre>source /opt/sw/bin/init.csh</pre>
                    <p>
                       Если вы не знаете, как добавить строку, примените
                        следующие команды:
                    </p>
                    <pre>cd
pico .cshrc</pre>
                    <p>
                        Теперь вы в полноэкранном текстовом редакторе (с полным терминальным
                        окном) и можете просто напечатать строку
                            <code>source /opt/sw/bin/init.csh</code>. Если появится отметка
                        "New file", значит, все в порядке. После ввода строки обязательно нажмите
                        Return не менее одного раза, а затем
                        Control-O, Return и Control-X для выхода из редактора.
                         </p>
                    <p>Есть пара общих ситуаций, в которых вам может понадобиться
                        редактирование дополнительных файлов:</p>
                    <ol>
                        <li>
                            <p>У вас появился <code>~/.tcshrc</code>.</p>
                            <p>Такой файл иногда создается приложениями
                                третьих лиц или самими вами.
                                Так или иначе, получается так, что
                                <code>~/.tcshrc</code> читается, а
                                <code>~/.cshrc</code> игнорируется.
                                Рекомендуем отредактировать
                                <code>~/.tcshrc</code> так же, как вы это сделали с
                                <code>~/.cshrc</code> ранее, а также
                                добавить следующую строку в конце:</p>
                            <pre>source ~/.cshrc</pre>
                            <p>Таким образом, если вам когда-либо понадобится удалить
                                <code>~/.tcshrc</code>, вы сможете использовать Fink.</p>
                        </li>
                        <li>
                            <p>Вы следовали указаниям <code>/usr/share/tcsh/examples/README</code>.</p>
                            <p>Они объясняют, как создать
                                <code>~/.tcshrc</code> и <code>
                                ~/.login</code>.  В данном случае проблема в
                                <code>~/.login</code>, который запускается после
                                <code>~/.tcshrc</code> и порождает
                                <code>/usr/share/tcsh/examples/login</code>. Последний
                                содержит строку, которая перезаписывает вашу
                                предыдущую настройку PATH. В данном случае надо
                                создать <code>~/Library/init/tcsh/path</code>:</p>
                            <pre>mkdir -p ~/Library/init/tcsh pico ~/library/init/tcsh/path</pre>
                            <p>и внести туда</p>
                            <pre>source ~/.cshrc</pre>
                            <p>Надо также модифицировать .tcshrc, как описано
                                в п.1 выше, и убедиться, что ваш PATH настроен правильно
                                на случай ситуаций, когда
                                <code>~/.login</code> не читается.</p>
                        </li>
                    </ol>
                    <p> Редактирование .cshrc (и других файлов запуска) может
                        отразиться только на новых оболочках (т.е. вновь открытых терминальных окнах),
                        поэтому надо применить данную команду во всех
                        терминальных окнах, открытых перед редактированием файла.
                        Вам также надо будет выполнить <code>rehash</code>, т.к. tcsh
                        кэширует список имеющихся команд внутренним образом. </p>
                </li>
            </ul>
            <p> Имейте в виду, что скрипты (<code>init.sh</code> а <code>init.csh</code> ) также добавляют
                <code>/usr/X11R6/bin</code>
                и <code>/usr/X11R6/man</code> к вашему PATH, чтобы
                вы могли использовать X11 после инсталляции. Пакеты Fink обладают способностью
                самостоятельно добавлять настройки - н-р, пакет qt  устанавливает переменную величину среды QTDIR.
                </p>
            <p> После настройки своей среды перейдите к разделу <a href="packages.php?phpLang=ru">Инсталляция пакетов</a>, чтобы
                увидеть, как вы можете инсталлировать некоторые действительно полезные пакеты,
                используя различные инструменты управления, входящие в Fink.</p>
        
    <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="packages.php?phpLang=ru">3. Инсталляция пакетов</a></p>
<?php include_once "../../footer.inc"; ?>


