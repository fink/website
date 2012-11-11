<?
$title = "Руководство пользователя - fink.conf";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:17';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Руководство пользователя Contents"><link rel="next" href="usage.php?phpLang=ru" title="Использование инструмента fink в командной строке"><link rel="prev" href="upgrade.php?phpLang=ru" title="Обновление Fink">';


include_once "header.ru.inc";
?>
<h1>Руководство пользователя - 5. Конфигурационный файл Fink</h1>
        
        
        
            <p> Данный раздел объясняет настройки, имеющиеся в конфигурационном файле Fink
                (fink.conf), и их влияние на поведение
                Fink, особенно на поведение инструмента в командной строке <code>fink</code>
                (т.е. его взаимодействие с дистрибутивом исходного кода).</p>
        
        <h2><a name="about">5.1 Информация о fink.conf</a></h2>
            
            <p> При первоначальной инсталляции Fink вам на выбор предлагаются опции для
               настройки вашего конфигурационного файла - н-р, относящиеся к
                <a href="#mirrors">зеркалам</a> для скачивания
                файлов и способу приобретения прав суперпользователя. Вы можете вновь запустить этот процесс
                при помощи команды <code>fink configure</code>.
                Возможно, для настройки некоторых опций надо будет отредактировать файл
                <b>fink.conf</b> вручную. В целом эти опции предназначены только для
                продвинутых пользователей.</p>
            <p> Файл <b>fink.conf</b> находится в
                <code>/sw/etc/fink.conf</code> и вы можете его редактировать в своем любимом
                текстовом редакторе. Для редактирования требуются права суперпользователя.</p>
        
        <h2><a name="syntax">5.2 Синтаксис fink.conf</a></h2>
            
            <p> Ваш файл fink.conf состоит из множества строк в следующем формате:</p>
            <pre>OptionName: Value</pre>
            <p>Опции представлены по одной на строку. Название опции отделено
                от ее значения двоеточием и одинарным пробелом. Содержание значения
                зависит от опции, но обычно это булево выражение
                ("Правда" или "Ложь"), строковая цепочка или список строковых цепочек, отделенных
                пробелом. Н-р:</p>
            <pre>
BooleanOption: True
StringOption: Something
ListOption: Option1 Option2 Option3
</pre>            
        
        <h2><a name="required">5.3 Необходимые настройки</a></h2>
            
            <p> Некоторые из настроек в <b>fink.conf</b> обязательны.
               Без них Fink не может работать соответствующим образом. К этой категории относятся следующие настройки:
                </p>
            <ul>
                <li>
                    <p>
                        <b>Basepath:</b> маршрут (path)</p>
                    <p> Сообщите Fink, где маршрут инсталлирован.  По умолчанию это
                        <b>/sw</b>, если вы не сделали изменений в процессе первоначальной
                        инсталляции Fink. Вы <b>не</b> должны менять эту настройку
                        после инсталляции, иначе <b>fink</b> запутается.</p>
                </li>
            </ul>
        
        <h2><a name="optional">5.4 Опциональные настройки пользователя</a></h2>
            
            <p> Существуют различные опциональные настройки, которые пользователи могут
                варьировать по своему желанию для изменения поведения Fink.</p>
            <ul>
                <li>
                    <p>
                        <b>RootMethod:</b> su, sudo или none</p>
                    <p>Для некоторых операций Fink необходимы права суперпользователя.
                        Признанные настройки: <b>sudo</b> или <b>su</b>. Также можно
                        сделать настройку <b>none</b>; в этом случае вам надо будет запускать и
                        выполнять Fink самому в качестве суперпользователя. Настройка по умолчанию:
                        <b>sudo</b>, которая в большинстве случаев должна быть неизменной.</p>
                </li>
                <li>
                    <p>
                        <b>Trees:</b> список деревьев</p>
                    <p>Имеющиеся деревья:</p>
                    <pre>
local/main      - любые локальные пакеты, которые вы хотите инсталлировать
local/bootstrap - пакеты, использованные при инсталляции Fink
stable/crypto   - стабильные криптографические пакеты
stable/main     - другие стабильные пакеты
unstable/crypto - нестабильные криптографические пакеты
unstable/main   - другие нестабильные пакеты
</pre>                    
                    <p> Также вы можете добавить собственные деревья в каталог
                        <code>/sw/fink/dists</code> для личных целей, но
                        в большинстве случаев это не
                        требуется. Деревьями по умолчанию являются "local/main
                        local/bootstrap stable/main". Данный список всегда должен быть идентичен
                        списку в файле <code>/sw/etc/apt/sources.list</code>.
                        (Начиная со своей версии 0.21.0, <code>fink</code> делает это за вас автоматически.)</p>

<p>The order of the trees is meaningful, as packages from later trees in the list may
override packages from earlier ones.</p>

                </li>
                <li>
                    <p>
                        <b>Distribution:</b> 10.1, 10.2, 10.2-gcc3.3, 10.3 или 10.4</p>
                    <p>Fink нужно знать, какую версию Mac OS X вы
                        используете. Не поддерживаются Mac OS X 10.0 и более ранние версии,
                        а текущая версия fink больше не поддерживает 10.1 и 10.2.
          
          Mac OS X 10.2 users are restricted to fink-0.24.7, released in June 2005.
          
                        Данная опция настраивается
                        при помощи скрипта <code>/sw/lib/fink/postinstall.pl</code>.
                        Вам не надо изменять эту настройку вручную.</p>
                </li>
                <li>
                    <p>
                        <b>FetchAltDir:</b> маршрут</p>
                    <p>Обычно <code>fink</code> хранит исходные коды, которые он распаковывает, в
                        <code>/sw/src</code>. При помощи этой опции вы можете указать альтернативный каталог
                        для скачанного исходного кода. 
                        Н-р:</p>
                    <pre>FetchAltDir: /usr/src</pre>
                </li>
                <li>
                    <p>
                        <b>Verbose:</b> число от 0 до 3</p>
                    <p> Данная опция устанавливает объем информации, которую Fink вам предоставляет
                        о своих действиях. Значения настройки:
                        <b>0</b>
                        Quiet (Нулевое) (не отражает статистику скачивания)
                        <b>1</b>
                        Low (Низкое) (не отражает информацию о тарболах в процессе распаковки)
                        <b>2</b>
                        Medium (Среднее) (отражает почти все)
                        <b>3</b>
                        High (Высокое) (отражает все)
                        Настройка по умолчанию: 1.
                        </p>
                </li>
        
        <li><p><b>SkipPrompts:</b> a comma-delimited list</p><p>(<code>fink-0.25</code> and later) This option instructs <code>fink</code> to refrain from asking for input when
           the user does not want to be prompted. Each prompt belongs to a
           category. If a prompt's category is in the SkipPrompts list then
           the default option will be chosen within a very short period of
           time.</p><p>Currently, the following categories of prompts exist:</p><p><b>fetch</b> - Downloads and mirrors</p><p><b>virtualdep</b> - Choosing between alternative packages</p><p> By default, no prompts are skipped.</p></li>
        
                <li>
                    <p>
                        <b>NoAutoIndex:</b> булево выражение</p>
                    <p>Fink кэширует свои файлы описания пакетов в
                        /sw/var/db/fink.db для сохранения в целях их чтения и синтаксического анализа
                        при каждом выполнении. Если не выбрана опция
                         "True" ("Правда"), Fink проверяет, нуждается ли указатель пакетов в 
                        обновлении. По умолчанию установлена опция "False" ("Ложь") и не 
                        рекомендуется ее изменять. Если вы это сделаете, может
                        потребоваться ручное выполнение команды <code>fink index</code> для
                        обновления указателя.</p>
                </li>
                <li>
                    <p>
                        <b>SelfUpdateNoCVS:</b> булево выражение</p>
                    <p>Команда<code>fink selfupdate</code> обновляет менеджер пакетов Fink
                        до последних версий. Благодаря данной опции, настроенной как "True",
                        CVS для этого не используется.
                        Настройка устанавливается автоматически
                        командой <code>fink selfupdate-cvs</code>
                        и таким образом не требуется изменение вручную.</p>
                </li>
                <li>
                    <p>
                        <b>Buildpath:</b> маршрут</p>
                    <p>Fink необходимо создать несколько временных каталогов для
                        каждого пакета, который он компилирует от исходного кода. По умолчанию
                        они размещаются в <code>/sw/src</code> on Panther and earlier, а 
<code>/sw/src/fink.build</code> on Tiger, но если вы
                        хотите, чтобы они были в другом месте, укажите маршрут.
                        См. описание областей <code>KeepRootDir</code> и
                        <code>KeepBuildDir</code> далее в данном документе для
                        получения более подробной информации об этих временных каталогах 
                        (<a href="#developer">Developer Settings</a>). </p>
	    
	    <p>On Tiger, it is recommended that the Buildpath end with <code>.noindex</code>
or <code>.build</code>. Otherwise, Spotlight will attempt to index the temporary files in
the Buildpath, slowing down builds.
    	</p>
    	
                </li>

        <li><p><b>Bzip2Path:</b> the path to your <code>bzip2</code> (or compatible) binary
          </p><p>(<code>fink-0.25</code> and later) The Bzip2Path option lets you override the default path for the
           <code>bzip2</code> command-line tool.  This allows you to specify an alternate
           location to your <code>bzip2</code> executable, pass optional command-line
           options, or use a drop-in replacement like <code>pbzip2</code> for decompressing
           <code>.bz2</code> archives.</p></li>

            </ul>
        
        <h2><a name="downloading">5.5 Настройки скачивания</a></h2>
            
            <p>Есть разные настройки, влияющие на то, как Fink скачивает
                данные о пакетах.</p>
            <ul>
                <li>
                    <p>
                        <b>ProxyPassiveFTP:</b> булево выражение</p>
                    <p>При этой опции Fink использует пассивный режим для скачивания через FTP.
                        Некоторые конфигурации сервера или сети FTP
                        требуют настройки данной опции как "True". 
                        Рекомендуем иметь ее постоянно с этой настройкой, т.к.
                        активный режим FTP более не применяется.</p>
                </li>
                <li>
                    <p>
                        <b>ProxyFTP:</b> url</p>
                    <p>Если вы используете прокси-FTP, в этой области надо указать его адрес,
                        н-р:</p>
                    <pre>ProxyFTP: ftp://yourhost.com:2121/</pre>
                    <p>Если вы не используете прокси-FTP, не указывайте ничего.</p>
                </li>
                <li>
                    <p>
                        <b>ProxyHTTP:</b> url</p>
                    <p>Если вы используете прокси-HTTP, в этой области надо указать его адрес,
                        н-р:</p>
                    <pre>ProxyHTTP: http://yourhost.com:3128/</pre>
                    <p>Если вы не используете прокси-HTTP, не указывайте ничего.</p>
                </li>
                <li>
                    <p>
                        <b>DownloadMethod:</b> wget, curl, axel или axelautomirror</p>
                    <p>Fink может использовать три разных приложения для скачивания
                        файлов из Интернета - <b>wget</b>, <b>curl</b>
                        и <b>axel</b>. Настройка <b>axelautomirror</b> использует
                        экспериментальный режим приложения <b>axel</b>, который
                        пытается определить ближайший сервер, имеющий определенный файл.
                        В данный момент использование <b>axel</b> и
                        <b>axelautomirror</b> не рекомендуется.
                        Настройка по умолчанию: <b>curl</b>. <b>Приложение,
                        выбранное вами в качестве DownloadMethod, ОБЯЗАТЕЛЬНО должно быть инсталлировано!</b>
                        
          				(i.e. <code>fink</code> won't fall back to <b>curl</b> if you try to use a download application that isn't present.
          				
                    </p>
                </li>
                <li>
                    <p>
                        <b>SelfUpdateMethod:</b> point, rsync или cvs</p>
                    <p> <code>fink</code> может использовать разные способы  для обновления
                        информационных файлов пакетов.<b>rsync</b> - рекомендуемая настройка,
                        используемая для скачивания только модифицированных файлов
                        в активированных вами деревьях. Имейте в виду, что если вы
                        изменили или добавили файлы в stable (стабильных) или unstable (нестабильных) <a href="#optional">trees</a> (деревьях),
                        использование rsync приведет к их удалению. Сначала сделайте резервную копию.
                         <b>cvs</b> произведет скачивание с использованием анонимного доступа или доступа
                        :ext: cvs из хранилища fink. Недостатком при этом является то,
                        что cvs не может перемещаться от одного зеркала к другому, и если
                        сервер недоступен, вы не сможете сделать обновление.
                        <b>point</b> произведет скачивание только последней выпущенной версии
                        пакетов. Мы не рекомендуем это делать, т.к. ваши пакеты могут
                        быть устаревшими. </p>
                </li>
        
        <li><p><b>SelfUpdateCVSTrees:</b> list of trees
           </p><p>(<code>fink-0.25</code> and later) By default, the <b>cvs</b> selfupdate method will update only the current
           distribution's tree.  This option overrides the list of distribu-
           tion versions that will be updated during a selfupdate.

           Please note that you will need a recent "cvs" binary installed if
           you wish to include directories that do not have CVS/ directories
           in their entire path (e.g., dists/local/main or similar).</p></li>
           
                <li>
                    <p>
                        <b>UseBinaryDist:</b> булево выражение</p>
                    <p> Инициирует попытку fink скачать предварительно скомпилированные
                        пакеты бинарного дистрибутива, если они уже существуют, но
                        пока отсутствуют в системе. Это может
                        сэкономить массу времени при инсталляции и таким образом
                        настройка данной опции рекомендуется. Использование опции <a href="usage.php?phpLang=ru">--use-binary-dist </a> (или <code>-b</code>) приводит к такому же результату,
                        но только при одноразовой активации fink. Опция <code>--no-use-binary-dist</code>
                        отменяет вышесказанное и запускает компиляцию от исходного кода;
                        она тоже действует только при одноразовой активации <code>fink</code>.
                            <b> Это возможно только для версий начиная с
                                0.23.0</b>. </p>
                    <p>Надо иметь в виду, что в данном режиме <code>fink</code> получает указание скачать желаемую версию,
                        если она доступна для скачивания; <code>fink</code> <b>не</b> получает указание
                        выбрать версию на основе ее наличия в бинарном виде.
                    </p>
                </li>
            </ul>
        
        <h2><a name="mirrors">5.6 Настройки зеркал</a></h2>
            
            <p>Получение ПО из Интернета может быть скучным занятием. Зачастую
                скачивание происходит не так быстро, как нам хотелось бы. Серверы зеркал
                хранят копии файлов, которые есть на других серверах, но могут быстрее подсоединяться к
                Интернету или быть ближе к вам географически,
                позволяя таким образом быстрее скачивать файлы. Они также
                помогают снизить нагрузку на загруженные основные серверы, н-р
                <b>ftp.gnu.org</b>, и являются альтернативой в случае недосягаемости
                какого-либо сервера.</p>
            <p>Чтобы Fink выбрал наилучшее для вас зеркало, надо ему сообщить,
                на каком континенте и в какой стране вы живете. Если скачивание с одного сервера
                не получится, вам будут предложены опции опять попытаться его сделать через это же зеркало,
                другое зеркало в этой же стране или на континенте, либо
                другое зеркало в мире.</p>
            <p>Файл <b>fink.conf</b> содержит настройки с информацией, какие зеркала вы хотите использовать.
                </p>
            <ul>
                <li>
                    <p>
                        <b>MirrorContinent:</b> трехбуквенный код</p>
                    <p>Это значение изменяется при помощи <code>fink
                    configure</code>. Необходимый трехбуквенный код
                        можно найти в <code>/sw/lib/fink/mirror/_keys</code>.
                        Н-р, если вы живете в Европе, код будет следующий:</p>
                    <pre>MirrorContinent: eur</pre>
                </li>
                <li>
                    <p>
                        <b>MirrorCountry:</b> шестибуквенный код</p>
                    <p>Это значение изменяется при помощи <code>fink
                        configure</code>. Необходимый код можно
                        найти в <code>/sw/lib/fink/mirror/_keys</code>.
                        Н-р, если вы живете в Австрии, код будет следующий:</p>
                    <pre>MirrorCountry: eur-AT</pre>
                </li>
                <li>
                    <p>
                        <b>MirrorOrder:</b> MasterFirst / MasterLast /
                        MasterNever / ClosestFirst</p>
                    <p> Fink поддерживает зеркала "Master", являющиеся отраженными
                        хранилищами тарболов исходного кода для всех пакетов Fink.
                        Преимущество использования комплекта зеркал Master в том, что соединение с
                        URL скачивания исходного кода никогда не прерывается. Пользователи могут
                        выбрать либо использование таких зеркал, поддерживаемых
                        рабочей группой Fink, либо только URL оригинальных исходных кодов
                        и сайты внешних зеркал - gnome, KDE и
                        debian. Дополнительно можно выбрать комбинацию двух
                        комплектов, которые впоследствии будут определяться при поиске
                        в порядке приближения, как указано выше. При использовании опций
                        MasterFirst и MasterLast нельзя "перепрыгнуть"
                        к комплекту Master (или другому комплекту), если скачивание не
                        получилось. Опции:</p>
                    <pre>
MasterFirst - для поиска зеркал "Master" в первую очередь.
MasterLast - для поиска зеркал "Master" в последнюю очередь.
MasterNever - для запрета использования зеркал "Master".
ClosestFirst - для поиска ближайших зеркал в первую очередь (совмещение всех зеркал в одном комплекте).
</pre>                   
                </li>
        
        <li><p><b>Mirror-rsync:</b>
           </p><p>(<code>fink-0.25.2</code> and later) When doing <code>fink selfupdate</code> with the <b>SelfupdateMethod</b> set to <code>rsync</code>,
           this is the rsync url to sync from.  This should be an anonymous
           rsync url, pointing to a directory which contains all the fink Dis-
           trubutions and Trees.
</p></li>
		
            </ul>
        
        <h2><a name="developer">5.7 Настройки разработчика</a></h2>
            
            <p>Некоторые опции в <b>fink.conf</b> полезны только для
                разработчиков. Мы не рекомендуем обычным пользователям Fink
                их модифицировать. К данной категории относятся следующие опции.</p>
            <ul>
                <li>
                    <p>
                        <b>KeepRootDir:</b> булево выражение</p>
                    <p>Благодаря этой опции Fink не удаляет каталог
                        <code>root-[имя]-[версия]-[модификация]</code> после
                        построения пакета. Настройка по умолчанию: False. <b>Будьте осторожны,
                            эта опция может  быстро заполнить ваш жесткий диск!</b>
                        Применение в <code>fink</code> флага <b>-K</b> дает такой же результат,
                        но действует только при одной активации <code>fink</code>.
                        </p>
                </li>
                <li>
                    <p>
                        <b>KeepBuildDir:</b> булево выражение</p>
                    <p>Благодаря этой опции Fink не удаляет каталог
                        <code>[имя]-[версия]-[модификация]</code> после
                        построения пакета. Настройка по умолчанию: False. <b>Будьте осторожны,
                            эта опция может  быстро заполнить ваш жесткий диск!</b>
                         Применение в <code>fink</code> флага <b>-k</b> дает такой же результат,
                        но действует только при одной активации <code>fink</code>.
                         </p>
                </li>
            </ul>
        
        <h2><a name="advanced">5.8 Настройки для использования продвинутыми пользователями</a></h2>
            
            <p>Существуют некоторые другие полезные опции, но требуются определенные
                знания, чтобы правильно их настроить.</p>
            <ul>
                <li>
                    <p>
                        <b>MatchPackageRegEx:</b>
                    </p>
                    <p>При применении этой опции fink не спрашивает, какой пакет надо инсталлировать, если один 
                        (только один) из вариантов выбора соответствует указанному регулярному выражению perl.
                        Например:</p>
                    <pre>MatchPackageRegEx: (.*-ssl$|^xfree86$|^xfree86-shlibs$)</pre>
                    <p>будет соответствовать пакетам, имена которых заканчиваются на '-ssl', и полностью будет соответствовать
                        'xfree86' и 'xfree86-shlibs'.</p>
                </li>
                <li>
                    <p>
                        <b>CCacheDir:</b> маршрут</p>
                    <p>Если инсталлирован пакет Fink <code>ccache-default</code>, кэш-файлы,
                        создаваемые им при построении пакетов Fink, будут размещены здесь.
                        Настройка по умолчанию:
                        <code>/sw/var/ccache</code>. При настройке
                        <code>none</code> fink не настраивает переменную величину среды CCACHE_DIR
                        и ccache будет использовать
                        <code>$HOME/.ccache</code>, потенциально размещая
                         файлы суперпользователя в вашем базовом каталоге.<b> Данная опция возможна
                         только в версиях fink, выпущенных после 0.21.0</b>. </p>
                </li>
                <li><p><b>NotifyPlugin:</b> плагин</p><p>
                    Здесь указывается плагин уведомления о моменте инсталляции/деинсталляции
                    пакетов. Настройка по умолчанию: Growl (для работы требуется <code>Mac::Growl</code>).
                    Другие плагины можно найти в каталоге
                    <code>/sw/lib/perl5/Fink/Notify</code>.
                </p></li>
        
        <li><p><b>AutoScanpackages:</b> boolean
           </p><p>When <code>fink</code> builds new packages, <code>apt-get</code> does not immediately know about
           them.  Historically, the command <code>fink scanpackages</code> had to be run
           for <code>apt-get</code> to notice the new packages, but now this happens auto
           matically. If this option is present and <b>false</b>, then <code>fink
           scanpackages</code> will no longer be run automatically after packages are
           built.  Defaults to <b>true</b>.
</p></li>
        <li><p><b>ScanRestrictivePackages:</b> boolean
           </p><p>When scanning the packages for <code>apt-get</code>, <code>fink</code> normally scans all
           packages in the current trees. However, if the resuting apt repository will be made publically available, the administrator may be
           legally obligated not to include packages with <code>Restrictive</code> or
           <code>Commercial</code> licenses. If this option is present and <b>false</b>, then Fink
           will omit those packages when scanning.</p></li>
		            </ul>
        
        <h2><a name="sourceslist">5.9 Управление файлом sources.list в apt</a></h2>
            
            <p>Начиная с 0.21.0, fink активно управляет
                файлом<code>/sw/etc/apt/sources.list</code>, который используется apt
                с целью нахождения бинарных пакетов для инсталляции. Файл по умолчанию
                sources.list выглядит примерно следующим образом (с корректировками для соответствия вашему дистрибутиву и деревьям):</p>
             <pre># Local modifications should either go above this line, or at the end.
#
# Default APT sources configuration for Fink, written by the fink program

# Local package trees - packages built from source locally
# NOTE: this is automatically kept in sync with the Trees: line in 
# /sw/etc/fink.conf
# NOTE: run 'fink scanpackages' to update the corresponding Packages.gz files
deb file:/sw/fink local main
deb file:/sw/fink stable main crypto

# Official binary distribution: download location for packages
# from the latest release
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://us.dl.sourceforge.net/fink/direct_download 10.3/current main crypto

# Put local modifications to this file below this line, or at the top.
</pre>
            <p>С этим файлом по умолчанию apt-get сначала находит уже скомпилированные бинарные пакеты
                в имеющейся у вас инсталляции, а затем ищет остальные пакеты в официальном бинарном дистрибутиве.
                Можно изменить этот порядок путем ввода данных
                в начале файла (их поиск будет производиться в первую очередь)
                или в его конце (их поиск будет производиться в последнюю очередь).</p>
            <p>Если вы меняете строку ваших деревьев или дистрибутив, которые используете,
                fink автоматически модифицирует часть файла "по умолчанию" для
                соответствия новым настройкам. При этом Fink сохранит
                все модификации, которые вы внесли в файл, при условии, что
                вы ограничите их верхней частью файла (выше
                первой строки по умолчанию) и его нижней частью (ниже последней строки
                по умолчанию).</p>
            <p> Прим.: Если вы модифицировали <code>/sw/etc/apt/sources.list</code>
                перед обновлением до fink 0.21.0, то найдете свои предыдущие файлы сохраненными в
                 <code>/sw/etc/apt/sources.list.finkbak</code> .</p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage.php?phpLang=ru">6. Использование инструмента fink в командной строке</a></p>
<? include_once "../../footer.inc"; ?>


