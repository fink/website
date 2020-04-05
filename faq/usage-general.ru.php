<?php
$title = "Ч.З.В. - Использование (1)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/04/05 5:48:20';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="next" href="usage-packages.php?phpLang=ru" title="Проблемы использования пакетов  - Специальные пакеты"><link rel="prev" href="comp-packages.php?phpLang=ru" title="Проблемы компиляции - специальные пакеты">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 8. Проблемы использования пакетов - Общие вопросы</h1>
        
        
        <a name="xlocale">
            <div class="question"><p><b><?php echo FINK_Q ; ?>8.1: Я получаю много сообщений типа "locale not supported by C
                    library". Это плохо?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Ничего страшного, просто это значит, что программа будет использовать
                    сообщения, форматы дат и т.д. по умолчанию на английском языке. Программа
                    будет работать нормально, но иным образом. См. документ "Выполнение X11" 
                    в <a href="/doc/x11/trouble.php#locale"></a>.</p></div>
        </a>
        <a name="passwd">
            <div class="question"><p><b><?php echo FINK_Q ; ?>8.2: В моей системе вдруг появилось несколько странных пользователей
                    с такими именами, как "mysql", "pgsql" и "games". Откуда они
                    взялись?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Вы использовали Fink для инсталляции пакета, который зависит от
                    другого пакета - passwd. passwd инсталлирует ряд дополнительных
                    пользователей в вашей системе из соображений безопасности  -- в системах Unix
                    файлы и процессы принадлежат "владельцам", которые
                    позволяют системным администраторам производить точную настройку системы
                    разрешений и безопасности. Такие программы, как Apache и
                    MySQL, нуждаются во "владельце", и было бы небезопасно позволять этим
                    демонам укрепиться (представьте, что может произойти, если Apache
                    будет поставлена под угрозу и вдруг выдаст разрешение всем
                    файлам системы). Таким образом, пакет passwd производит работу
                    по настройкам дополнительных пользователей для тех пакетов Fink,
                    которые этого требуют.</p><p>Может вызвать беспокойство внезапное обнаружение нескольких неожиданных пользователей
                     в вашей области "System Preferences: Users"
                    (в 10.2.x) или "System Preferences: Accounts" (в
                    10.3.x), но лучше подавить желание удалить их:</p><ul>
                    <li>Прежде всего очевидно, что вы выбрали для инсталляции
                        пакет, требующий их использования, значит
                        удалять их нет смысла, не так ли?</li>
                    <li>Вообще есть ряд дополнительных пользователей, уже
                        инсталлированных в Mac OS X, о которых вы могли не знать:
                        www, daemon, nobody только некоторые из них.
                        Присутствие этих пользователей являются стандартным условием Unix
                        для выполнения определенных услуг; пакет passwd
                        просто добавляет еще пару дополнительных пользователей, которых Apple
                        не предоставил. Вы можете увидеть пользователей, инсталлированных Apple,
                        в NetInfo Manager.app или применив команду <code>niutil -list . /users</code>
                    </li>
                    <li>Если вы решили их удалить, будьте крайне осторожны
                        при выполнении. Использование области "System Preferences:
                        Users" (в 10.2.x) или "System Preferences:
                        Accounts" (в 10.3.x) передаст все их файлы
                        на произвольный счет администратора и у нас есть
                        сообщения о проблемах, имевших место с разрешения
                        счета администратора. Это ошибка в связи с System
                        Preferences, о которой мы сообщили Apple. Более безопасным путем
                        удаления этих пользователей является их удаление
                        внутри NetInfo Manager.app или использование инструмента строки
                        команд <code>niutil</code> в Terminal. См. главную страницу
                        относительно <code>niutil</code> для получения более подробных сведений о NetInfo.</li>
                </ul><p>Fink <b>запрашивает</b> разрешение на инсталляцию
                    дополнительных пользователей в вашей системе в процессе инсталляции
                    пакета passwd, и таким образом это не должно быть сюрпризом.  </p></div>
        </a>
        <a name="compile-myself">
            <div class="question"><p><b><?php echo FINK_Q ; ?>8.3: Как можно компилировать что-нибудь самостоятельно с применением ПО, инсталлированного с помощью Fink?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> When compiling something yourself outside of Fink, the compiler and
        linker need to be told where to find the Fink-installed libraries and
		headers.  It is also necessary to tell the compiler to use the
		appropriate target architecture.  For a package that uses standard
		configure/make process, you need to set some environment variables:</p><p>-bash-</p><pre>export CFLAGS=-I/sw/include 
export LDFLAGS=-L/sw/lib 
export CXXFLAGS=$CFLAGS 
export CPPFLAGS=$CXXFLAGS 
export ACLOCAL_FLAGS="-I /sw/share/aclocal"
export PKG_CONFIG_PATH="/sw/lib/pkgconfig"
export PATH=/sw/var/lib/fink/path-prefix-clang:$PATH
export MACOSX_DEPLOYMENT_TARGET=10.9</pre><p>-tcsh-</p><pre>setenv CFLAGS -I/sw/include 
setenv LDFLAGS -L/sw/lib 
setenv CXXFLAGS $CFLAGS 
setenv CPPFLAGS $CXXFLAGS 
setenv ACLOCAL_FLAGS "-I /sw/share/aclocal"
setenv PKG_CONFIG_PATH "/sw/lib/pkgconfig"
setenv PATH /sw/var/lib/fink/path-prefix-clang:$PATH
setenv MACOSX_DEPLOYMENT_TARGET 10.9</pre><p>(assuming that the build system is running OS 10.9 or later)</p><p>It is often easiest just to add these to your startup files (e.g.
        <code>.cshrc</code> | <code>.profile</code>) so they
        are set automatically. If a package does not use these variables, you
        may need to add the "-I/sw/include" (for headers) and "-L/sw/lib" (for
        libraries) to the compile lines yourself. Some packages may use
        similar non-standard variables such as EXTRA_CFLAGS or --with-qt-dir=
        configure options. "./configure --help" will usually give you a list
        of the extra configure options.</p><p>In addition, you may need to install the development headers (e.g.
        <b>foo-1.0-1-dev</b>) for the library packages that you are using,
        if they aren't already installed.</p></div>
        </a>
        <a name="apple-x11-applications-menu">
            <div class="question"><p><b><?php echo FINK_Q ; ?>8.4: Не могу запустить ни одно из приложений, инсталлированных при помощи Fink, через
                    меню Applications в Apple X11.</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Apple X11 не отслеживает настройки среды Fink,
                    а это означает, что меню Applications не имеет
                    правильную настройку PATH для нахождения приложений Fink.
                    Для решения проблемы надо поместить перед именем приложения, инсталлированного при помощи Fink,
                    следующее:</p><pre>source /sw/bin/init.sh ;</pre><p>Н-р, если вы хотите запустить GIMP, инсталлированный при помощи Fink, вставьте</p><pre>source /sw/bin/init.sh ; gimp</pre><p>в облать Command вашей записи GIMP.</p><p>Можно также отредактировать ваш файл .xinitrc (в вашем каталоге пользователя)
                    и добавить:</p><pre>source /sw/bin/init.sh</pre><p>после первой строки.</p></div>
        </a>
        <a name="x-options">
            <div class="question"><p><b><?php echo FINK_Q ; ?>8.5: Я озадачен опциями X11: Apple X11, XFree86 и т.д.
                    Что надо инсталлировать?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Это варианты в XFree86 (основанные на коде XFree8),
                    которые немного различаются между собой. Есть
                    разные опции в Panther и Jaguar.</p><p>В Panther можно сделать выбор между следующими опциями:</p><ul>
                    <li>
                        <p>  X11 для Apple (на третьем диске). Не забудьте
                            инсталлировать X11 SDK (на диске XCode), если хотите
                            компилировать программы или планируете инсталлировать другие
                            пакеты Fink, относящиеся к X11, на основе исходного кода.</p>
                    </li>
                    <li>
                        <p> 4.4.x, построенный через Fink: инсталлируйте  пакеты
                            <code>xfree86</code> и <code>xfree86-shlibs</code>
                             </p>
                    </li>
                    <li>
                        <p> X.org, построенный через Fink: инсталлируйте пакеты <code>xorg</code>
                            и <code>xorg-shlibs</code>  </p>
                    </li>
                </ul><p>Самые популярные решения в Jaguar и пакеты Fink для их
                    работы:</p><ul>
                    <li>
                        <p>4.2.x, построенный через Fink: инсталлируйте
                            <code>xfree86-base</code> и
                            <code>xfree86-rootless</code> или
                            <code>xfree86-base-threaded</code> и
                            <code>xfree86-rootless-threaded</code> (и соответствующий
                             <code>-shlibs</code>)</p>
                    </li>
                    <li>
                        <p>4.3.x, построенный через Fink: инсталлируйте пакеты
                            <code>xfree86</code> и <code>xfree86-shlibs</code> </p>
                    </li>
                    <li>
                        <p>4.2.x из Apple (с допущением, что у вас инсталлированы пакеты User + SDK):
                            пакет <code>system-xfree86</code>
                            автоматически создается для текущих версий
                            Fink; НЕ инсталлируйте его. (Надо иметь в виду, что
                            общедоступной бета-версии X11 от Applе для Jaguar
                            больше нет, значит для вас это единственная опция, если
                            у вас она была установлена тогда, когда
                            поставлялась.)</p>
                    </li>
                </ul><p>Есть также другие варианты. Более подробно
                    см. в документе <a href="/doc/x11/index.php">Выполнение
                         X11</a>.</p></div>
        </a>
        <a name="no-display">
            <div class="question"><p><b><?php echo FINK_Q ; ?>8.6: При попытке запуска приложения получил сообщение
                    "cannot open display:". Что надо сделать?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Эта значит, что система не соединяет вас с вашим дисплеем X.
                    Надо убедиться, что вы сделали следующее:</p><p>1. Запустить X (Apple X11, XFree86, ...).</p><p>2. Убедиться, что настройка переменной величины среды вашего ДИСПЛЕЯ
                    правильная. Если вы используете настройку по умолчанию для  X, можно
                    сделать</p><pre>setenv DISPLAY :0</pre><p>если вы выполняете <code>tcsh</code>, либо</p><pre>export DISPLAY=:0</pre><p>если вы выполняете <code>bash</code>.</p></div>
        </a>
        <a name="suggest-package">
            <div class="question"><p><b><?php echo FINK_Q ; ?>8.7: Я не нахожу свою любимую программу в Fink. Как можно предложить
                    новый пакет для внесения в Fink?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Поместите запрос в <a href="http://sourceforge.net/tracker/?atid=371315&amp;group_id=17203">Package
                        Request Tracker</a> на странице проекта Fink.</p><p>Имейте в виду, что для этого вам надо иметь SourceForge id.</p></div>
        </a>
        <a name="virtpackage">
            <div class="question"><p><b><?php echo FINK_Q ; ?>8.8: Что это за "виртуальные пакеты" <code>system-*</code>,
                    которые иногда представлены, но я вроде как не могу инсталлировать или
                    удалить их самостоятельно?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b>  Пакеты с такими именами, как <code>system-perl</code>, являются
                    пакетами-заполнителями. Они не содержат настоящих файлов, а
                    просто являются для fink механизмом для сообщения сведений о программах,
                    инсталлированных вручную вне fink. </p><p> Начиная с дистрибуции 10.3 большинство заполнителей
                    даже не являются реальными пакетами, которые можно инсталлировать или удалить.
                    Вместо этого они являются "Virtual Packages", пакетными структурами данных,
                    создаваемыми самой программой fink в ответ
                    на предварительно конфигурированный список программ, инсталлированных вручную. По
                    каждому виртуальному пакету fink проверяет определенные файлы в
                    определенных местах и если находит их, считает
                    виртуальный пакет "инсталлированным". </p><p> Можно запустить программу <code>fink-virtual-pkgs</code> (часть
                    пакета fink) для получения точного списка того, что fink
                    считает инсталлированным. Добавление флажка <code>--debug</code>
                    даст много диагностической информации о том, какие именно
                    файлы fink проверяет. </p><p> К сожалению, нет механизма, через который вы можете
                    инсталлировать произвольную программу самостоятельно (вне fink) так,
                    чтобы fink признал ее вместо того, чтобы пытаться инсталлировать
                    свою собственную версию этой программы. Очень сложно в
                    целом иметь способность проверять флажки конфигурации, компиляции, имена маршрута и т.д. 
                     </p><p> Далее приведены наиболее важные виртуальные пакеты, которые fink
                    определяет (начиная с fink-0.19.2): </p><ul>
                    <li>system-perl: [виртуальный пакет, представляющий perl] <p>
                            Представляет <code>/usr/bin/perl</code>, являющийся
                            частью инсталляции OS X по умолчанию. Этот пакет
                            также обеспечивает <code>system-perlXXX</code>
                            и <code>perlXXX-core</code> в соответствии в версией
                            X.X.X этого интерпретатора perl. </p>
                    </li>
                    <li>system-javaXXX: [виртуальный пакет, представляющий Java
                        X.X.X] <p> Представляет Java Runtime Environment,
                            часть OS X (и обновление ПО Apple).
                            См. <a href="http://www.apple.com/java">страницу Java Apple
                                </a>для получения более подробной информации. </p>
                    </li>
                    <li>system-javaXXX-dev: [виртуальный пакет, представляющий заголовки разработок Java
                        X.X.X ] <p> Представляет Java SDK,
                            который должен быть скачан вручную из <a href="http://connect.apple.com">connect.apple.com</a>
                            (требуется бесплатная регистрация) и инсталлирован. Если
                            вы обновили Java Runtime Environment, ваш SDK
                            возможно не будет обновлен автоматически (и даже может быть
                            удален!). Не забудьте проверить (а также при необходимости скачать и инсталлировать)
                            SDK после инсталляции или
                            обновления Runtime Environment. См. также <a href="comp-general.php?phpLang=ru#system-java">этот Ч.З.В.</a>. </p>
                    </li>
                    <li>system-java3d: [виртуальный пакет, представляющий Java3D]</li>
                    <li>system-javaai: [виртуальный пакет, представляющий Java
                        Advanced Imaging] <p> Представляют расширения Java для трехмерной
                            графики и обработки изображений, которые необходимо
                            скачать вручную из Apple и инсталлировать. См.
                                <a href="http://docs.info.apple.com/article.html?artnum=120289">веб-сайт Apple
                            </a> для получения более подробной информации. </p>
                    </li>
                    <li>system-xfree86: [инсталлированный заполнитель для пользователя x11]</li>
                    <li>system-xfree86-shlibs: [общие библиотеки инсталлированного заполнителя для пользователя
                        x11] <p> Представляют Apple X11/XDarwin,
                            опциональную часть OS X (X11User.pkg). Эти
                            пакеты обеспечивают <code>x11</code> и
                            <code>x11-shlibs</code>, соответственно. Также см.
                                <a href="comp-packages.php?phpLang=ru#cant-install-xfree">этот Ч.З.В.
                            </a>. </p>
                    </li>
                    <li>system-xfree86-dev [инструменты разработок инсталлированного
                        заполнителя для пользователя x11] <p> Представляет Apple X11/XDarwin
                            SDK, дополнительную часть OS X (X11SDK.pkg). Этот пакет
                            обеспечивает <code>x11-dev</code>. См. также
                                <a href="comp-packages.php?phpLang=ru#cant-install-xfree">этот Ч.З.В.
                            </a>. </p>
                    </li>
                </ul></div>
        </a>
    <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-packages.php?phpLang=ru">9. Проблемы использования пакетов  - Специальные пакеты</a></p>
<?php include_once "../footer.inc"; ?>


