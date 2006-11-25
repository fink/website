<?
$title = "Ч.З.В. - Использование Fink";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2006/11/25 05:41:37';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="next" href="comp-general.php?phpLang=ru" title="Проблемы компиляции  - Общие вопросы"><link rel="prev" href="upgrade-fink.php?phpLang=ru" title="Обновление Fink (проблемы, связанные с версиями)">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 5. Инсталляция, использование и поддержка Fink</h1>
        
        
        <a name="what-packages">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.1: Как можно узнать, какие пакеты поддерживает Fink?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Начиная с Fink 0.2.3 существует команда <code>list</code>. 
                    Благодаря ей вы получаете список всех пакетов,  известных вашей инсталляции
                    Fink. Пример:</p><pre>fink list</pre><p>Если вы используете бинарную дистрибуцию, <code>dselect</code>
                    предоставит вам удобный просматриваемый список имеющихся пакетов.
                    Имейте в виду, что вы должны выполнить эту команду в качестве суперпользователя, если хотите выбрать
                    и инсталлировать пакеты в dselect.</p><p>Также на веб-сайте есть <a href="http://fink.sourceforge.net/pdb/">база данных
                    по пакетам</a>.</p></div>
        </a>
        <a name="proxy">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.2: Я нахожусь за брандмауэром. Как надо конфигурировать Fink для использования прокси HTTP?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Команда <code>fink</code> поддерживает явные настройки
                    прокси, которые переданы на
                    <code>wget</code>/<code>curl</code>. Если вам не были заданы вопросы
                    относительно прокси при первоначальной инсталляции, вы можете выполнить
                        <code>fink configure</code> для его настройки. Вы также можете 
                    использовать эту команду в любой момент для реконфигурации команды 
                    <code>fink</code>. Если следовать указаниям
                    руководства по инсталляции и использовать
                    <code>/sw/bin/init.csh</code> (или
                    <code>/sw/bin/init.sh</code>), то
                    <code>apt-get</code> и <code>dselect</code> также будут использовать
                    эти настройки прокси. Надо убедиться, что вы поместили протокол перед
                    прокси, н-р:</p><pre>ftp://proxy.yoursite.somewhere</pre><p>Если проблемы не устраняются, войдите в System Preferences,
                    выберите область Network, затем Proxies tab и убедитесь, что
                    отмечено поле "Use Passive FTP Mode (PASV)".</p></div>
        </a>
        <a name="firewalled-cvs">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.3: Как можно обновить имеющиеся пакеты при помощи CVS, если я за
                    брандмауэромl?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Пакет <b>cvs-proxy</b> может проложить туннель через прокси HTTP.</p><ul>
                    <li>
                        <p>Сначала скачайте файлы <a href="http://fink.cvs.sourceforge.net/fink/dists/10.2/unstable/main/finkinfo/devel/">cvs-proxy</a>
                            ( .info и .patch) и поместите их
                            на свое локальное дерево (н-р /sw/fink/dists/local/main/finkinfo/).</p>
                    </li>
                    <li>
                        <p>Инсталлируйте пакет <b>cvs-proxy</b> при помощи команды:</p>
                        <p>
                            <code>fink --use-binary-dist install <b>cvs-proxy</b>
                            </code>
                        </p>
                    </li>
                    <li>
                        <p>Switch to the CVS update method with the command:</p>
                        <p>
                            <code>fink selfupdate-cvs</code>
                        </p>
                        <p>
                            <code>fink update-all</code>
                        </p>
                    </li>
                </ul><p>Если fink не конфигурируется для использования вашего прокси, измените
                    настройки при помощи команды:</p><p>
                    <code>fink configure</code>.</p></div>
        </a>
        <a name="moving">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.4: Можно ли переместить Fink на другое место после инсталляции?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Нет. Т.е. конечно вы можете перемещать файлы при помощи mv или
                    Finder, но 99% программ перестанут после этого работать.
                    В основном потому, что все ПО Unix зависит от
                    неизменяемых путей доступа к поиску файлов данных, библиотек и другого.</p></div>
        </a>
        <a name="moving-symlink">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.5: Если переместить Fink после инсталляции и предоставить символический указатель (алиас)
                    прежнего размещения, будет ли результат успешным?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Возможно. Вообще это должно сработать, но
                    где-то могут быть скрытые ловушки. </p></div>
        </a>
        <a name="removing">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.6: Как полностью деинсталлировать Fink?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Почти все файлы, инсталлированные Fink, находятся в /sw (или там, где
                    вы решили их инсталлировать). Таким образом, чтобы избавиться от Fink,
                    введите команду:</p><pre>sudo rm -rf /sw</pre><p>Единственным исключением из этого правила является  XFree86 или X.org. Если вы инсталлировали
                    сервер X через Fink (т.е. инсталлировали пакеты
                    <code>xfree86</code>, <code>xfree86-rootless</code> или
                    <code>xorg</code> вместо использования
                    <code>system-xfree86</code>) и хотите его удалить, вам понадобится
                    дополнительно ввести следующее:</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>Если вы не планируете вновь инсталлировать Fink, вы также захотите
                    удалить при помощи текстового редактора строку "<code>source /sw/bin/init.csh</code>",
                    которую вы добавили к вашему файлу <code>.cshrc</code> или, в зависимости от ваших настроек, строку
                        "<code>source /sw/bin/init.sh</code>", добавленную к вашему файлу
                     <code>.bashrc</code>.</p></div>
        </a>
        <a name="bindist">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.7: База данных по пакетам на веб-сайте указывает в списке пакет xxx, но
                    apt-get и dselect ничего об этом не знают. Что неправильно?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> И то, и другое правильно. <a href="http://fink.sourceforge.net/pdb/">База данных по пакетам
                    </a> знает о каждом пакете, включая пакеты,
                    которые все еще находятся в нестабильном разделе. Инструменты
                    <code>dselect</code> и <code>apt-get</code>, с другой стороны,
                    знают только о пакетах, существующих как
                    предварительно компилированные бинарные пакеты. Многие пакеты не существуют
                    в предварительно компилированной форме через посредство этих инструментов
                    по многим причинам. Пакет должен быть в стабильном разделе
                    последней рассматриваемой версии и должен пройти
                    дополнительные проверки для соответствия политике, а также лицензионным и патентным
                    ограничениям.</p><p>Если вы хотите инсталлировать пакет, который недоступен через
                    <code>dselect</code> / <code>apt-get</code>, надо
                    компилировать его на основе исходного кода с использованием <code>fink install <b>packagename</b>
                    </code>. Надо убедиться, что у вас имеются Developer Tools, инсталлированные
                    до того, как вы попытаетесь это сделать. (Если нет инсталлятора для
                    Developer Tools в вашей папке <code>/Applications</code>,
                    вы можете получить их от <a href="http://connect.apple.com/">Apple Developer Connection
                    </a> после бесплатной регистрации). См. также далее
                    вопросы о разделе нестабильных пакетов.</p></div>
        </a>
        <a name="unstable">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.8: Я хочу инсталлировать пакет из категории нестабильных, но
                    fink сообщает, что 'пакет на найден' ('no package found') . Как его можно
                    инсталлировать?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Во-первых, надо убедиться, что вы правильно понимаете термин 'нестабильный'.
                    Пакеты на неустойчивом дереве обычно протестированы всего
                    несколькими людьми. По этой причине Fink не
                    находит нестабильное дерево по умолчанию. Если вы активируете
                    нестабильное дерево, не забудьте сообщить по электронной почте координатору о том,
                    что именно в пакете работает (или не работает). Обратная связь со стороны пользователей
                    позволяет нам определить готовность пакета к стабильной работе.
                    Для нахождения координатора пакета используйте
                        <code>fink info <b>packagename</b>
                    </code>.</p><p>Пакеты зачастую взаимозависимы; пакеты в нестабильном разделе
                    часто зависят от других нестабильных пакетов. По данной причине
                    лучше активировать все нестабильные пакеты.</p><p>Если вы хотите, чтобы Fink использовал все нестабильные пакеты, примените команду редактирования
                    <code>/sw/etc/fink.conf</code>, добавьте
                    <code>unstable/main</code> и <code>unstable/crypto</code>
                    к строке <code>Trees:</code> и затем запустите <code>fink
                        selfupdate; fink index</code>.</p><p>Если вам нужны только 1-2 особых пакета и больше ничего из
                    нестабильного раздела, надо переключиться на обновление CVS
                    (т.е. использовать <code>fink selfupdate-cvs</code>),
                    потому что rsync обновляет только деревья, активные в вашем
                    <code>fink.conf</code>. Примените
                    <code>/sw/etc/fink.conf</code> и добавьте
                    <code>local/main</code> к строке <code>Trees:</code>, если
                    этого не хватает. Затем надо будет запустить  <code>fink
                    selfupdate</code> для скачивания файлов описания пакетов.
                    Теперь скопируйте соответствующие файлы  <code>.info</code> (и связанные с ними
                    файлы <code>.patch</code>, если таковые существуют) из
                    <code>/sw/fink/dists/unstable/main/finkinfo</code>
                    (или
                    <code>/sw/fink/dists/unstable/crypto/finkinfo</code>)
                    в <code>/sw/fink/dists/local/main/finkinfo</code>.
                    При этом надо иметь в виду, что ваш пакет может зависеть от других пакетов
                    (или отдельных версий), которые также нестабильны.
                    Надо будет также переместить их файлы <code>.info</code> и
                    <code>.patch</code>. После перемещения всех файлов
                    надо запустить <code>fink index</code> для обновления данных
                    Fink об имеющихся пакетах. После этого
                    можно переключиться обратно на rsync (<code>fink
                    selfupdate-rsync</code>), если хотите.</p></div>
        </a>
    
    <a name="unstable-onepackage">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.9: Do I <b>really</b> need to enable all of unstable just to install
        one unstable package that I want?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> No, but it is highly recommended you do.  Mixing and matching can
        cause unforeseen issues that make it difficult to debug problems when
        they do arise.</p><p>That said, if you only want one or two specific packages, and nothing
        else from unstable, then you need to switch over to CVS updating (i.e.
        use <code>fink selfupdate-cvs</code>), because rsync only updates the
        trees that are active in your <code>fink.conf</code>. Edit
        <code>/sw/etc/fink.conf</code> and add <code>local/main</code>
        to the <code>Trees:</code> line, if not present. Then you'll need to
        run <code>fink selfupdate</code> to download the package description
        files. Now copy the relevant <code>.info</code> files (and their
        associated <code>.patch</code> files, if there are any) from
        <code>/sw/fink/dists/unstable/main/finkinfo</code> (or
        <code>/sw/fink/dists/unstable/crypto/finkinfo</code>) to
        <code>/sw/fink/dists/local/main/finkinfo</code>. However, note
        that your package may depend on other packages (or particular
        versions) which are also only in unstable. You will have to move their
        <code>.info</code> and <code>.patch</code> files as well. After you
        move all of the files, make sure to run <code>fink index</code>, so
        that Fink's record of available packages is updated. Once you're done
        you can switch back to rsync (<code>fink selfupdate-rsync</code>) if
        you want.</p></div>
    </a>
    
        <a name="sudo">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.10: Мне надоело каждый раз печатать свой пароль в sudo.
                    Можно ли с этим что-то сделать?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если вы не страдаете паранойей, вы можете конфигурировать sudo так,
                   чтобы не было запроса о пароле. Для этого надо запустить <code>visudo</code> в качестве суперпользователя
                    и добавить такую строку:</p><pre>username ALL = NOPASSWD: ALL</pre><p>Конечно, надо заменить <code>username</code> вашим действительным именем пользователя.
                    Данная строка позволяет запускать любую команду через sudo
                    без внесения пароля.</p></div>
        </a>
        <a name="exec-init-csh">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.11: Когда я пытаюсь выполнить init.csh или init.sh, получаю сообщение "Нет разрешения" ("Permission
                    denied"). Что я делаю неправильно?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> init.csh и init.sh не предназначены для выполнения как нормальные
                    команды. Эти файлы устанавливают такие переменные величины среды, как PATH
                    и MANPATH, в вашей оболочке. Для длительного эффекта в оболочке
                    должна быть произведена обработка при помощи команды <code>source</code>
                    для csh/tcsh или команды <code>.</code> для
                    bash/zsh, н-р таким образом:</p><p>для csh/tcsh:</p><pre>source /sw/bin/init.csh</pre><p>для bash/zsh:</p><pre>. /sw/bin/init.sh</pre></div>
        </a>
        <a name="dselect-access">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.12: Помогите! Я использовал ввод меню "[A]ccess" в dselect и
                    больше не могу скачивать пакеты!</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Возможно, вы отметили apt в зеркале Debian, которое конечно не
                    имеет файлов Fink. Вы можете решить проблему мануально или
                    через dselect. В ручном режиме в качестве суперпользователя проредактируйте
                    <code>/sw/etc/apt/sources.list</code> в текстовом редакторе.
                    Удалите строки, упоминающие debian.org и замените их
                    следующим:</p><pre>deb http://us.dl.sourceforge.net/fink/direct_download release main crypto
deb http://us.dl.sourceforge.net/fink/direct_download current main crypto</pre><p>(Если вы живете в Европе, можете использовать
                    <code>eu.dl.sourceforge.net</code> вместо <code>us.dl.sourceforge.net</code>)</p><p>Для исправления через dselect выполните снова "[A]ccess", выберите метод
                    "apt" и внесите следующую информацию:</p><p>URL: http://us.dl.sourceforge.net/fink/direct_download -
                    Distribution: release - Components: main crypto</p><p>Затем внесите уточнение, что хотите добавить другой исходный код, и повторите
                    процесс с "current" вместо "release".</p><p>Исправленная версия пакета apt (со скриптом
                    конфигурации в виде плагина для dselect) теперь работает
                    через CVS.</p></div>
        </a>
        <a name="cvs-busy">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.13: При попытке выполнения <q>fink selfupdate</q> или "fink
                    selfupdate-cvs" получаю сообщение об ошибке <code>Updating using CVS
                        failed. Check the error messages above.</code>"</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если сообщение следующее:</p><pre>Can't exec "cvs": No such file or directory at 
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>то вам надо инсталлировать инструменты разработчика - Developer Tools.</p><p>Но если последняя строка следующая: </p><pre>### execution of su failed, exit code 1</pre><p>то надо сделать обратный просмотр для
                    уточнения ошибки. Если вы увидите сообщение, что вам отказано в соединении:</p><pre>(Logging in to anonymous@fink.cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to fink.cvs.sourceforge.net:2401 failed: 
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.</pre><p>или сообщение типа следующего:</p><pre>cvs [update aborted]: recv() from server fink.cvs.sourceforge.net: 
Connection reset by peer 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>или</p><pre>cvs [update aborted]: End of file received from server</pre><p>или</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>то возможно, что серверы cvs перегружены и вам надо
                    попытаться сделать обновление позже. </p><p>Другое объяснение: у вас нет соответствующих разрешений в ваших каталогах 
                    CVS, в этом случае вы получите сообщения "Permission
                    denied":</p><pre>cvs update: in directory 10.2/stable/main: 
cvs update: cannot open CVS/Entries for reading: No such file or directory
cvs server: Updating 10.2/stable/main 
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo: 
No such file or directory 
### execution of su failed, exit code 1 Failed: 
Updating using CVS failed. Check the error messages above.</pre><p>В данном случае вам надо перенастроить свои каталоги cvs. Используйте команду </p><pre>sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {}\
; fink selfupdate-cvs</pre><p>Если вы не увидите вышеуказанных сообщений,
                    это почти всегда означает, что вы модифицировали файл на вашем дереве
                    /sw/fink/dists и теперь координатор изменил его.
                    Просмотрите ввод selfupdate-cvs в строках, начинающихся с
                     "C", так-то:</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info 
... (other info and patch files) ... 
### execution of su failed, exit code 1 
Failed: Updating using CVS failed. Check the error messages above.</pre><p>"C" означает, что у CVS был конфликт при попытке обновления
                    последней версии. Исправление заключается в удалении всех файлов, начинающихся
                    с "C" при вводе selfupdate-cvs; затем надо попробовать снова:</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre></div>
        </a>
        <a name="kernel-panics">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.14: При использовании Fink мой компьютер зависает/глючит/вырубается.
                    Помогите!</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Последние сообщения  в списке рассылки <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users
                        mailing list</a> отразили проблемы (в т.ч.
                    панику ядра и бесконечные зависания) при использовании
                    Fink для компилирования пакетов, когда инсталлировано антивирусное
                    ПО. Возможно, вам надо будет отключить любое антивирусное
                    ПО прежде, чем использовать Fink.</p></div>
        </a>
        <a name="not-found">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.15: Пытаюсь инсталлировать пакет, но Fink не может его скачать.
                    Сайт скачивания отражает номер более поздней версии пакета, чем
                    показывает Fink. Что делать?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Исходные коды пакетов перемещаются апстрим-сайтами
                    при выпуске новых версий.</p><p>Первое, что надо сделать - выполнить <code>fink
                    selfupdate</code>. Возможно, координатор пакета уже
                    это исправил, и вы получите обновленное описание пакета
                    либо с более свежей версией, либо с измененным 
                    URL для скачивания.</p><p>Если это не поможет, большинство исходных кодов  можно найти на <a href="http://distfiles.master.finkmirrors.net/">http://distfiles.master.finkmirrors.net/</a>
                    (спасибо Rob Braun) и вы можете запустить <code>fink
                    configure</code> с выбором поиска зеркал исходного кода "Master",
                    чтобы Fink автоматически произвел там поиск.</p><p>Если это не сработает, сообщите координатору пакета
                    (при помощи "<code>fink describe <b>packagename</b>
                    </code>"), что URL не работает, т.к. не все координаторы
                    регулярно читают списки рассылки.</p><p>Для получения работающего исходного кода надо во-первых попытаться "поохотиться" в районе удаленного сайта
                    в других каталогах в поисках той же версии исходного кода,
                    которую хочет Fink (н-р в "старом" каталоге). Но имейте в виду, что
                    некоторые удаленные сайты любят выбрасывать старые версии
                    своих пакетов. Если на официальном сайте его нет,
                    попытайте счастья в web - иногда можно найти неофициальные
                    сайты, где есть необходимый вам тарбол. Еще одно
                    место, где можно поискать - <a href="http://us.dl.sourceforge.net/fink/direct_download/source/">http://us.dl.sourceforge.net/fink/direct_download/source/</a>,
                    где Fink хранит файлы исходного кода из пакетов, выпущенных
                    в бинарной форме. Если все указанное не поможет,
                    можно поместить объявление в  <a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink-users
                        mailing list</a> с запросом о том, не имеет ли кто-нибудь старый исходный код,
                    чтобы вам его предоставить.</p><p>Когда найдете соответствующий тарбол исходного кода, скачайте его
                    вручную и затем поместите файл по месту нахождения вашего исходного кода Fink
                    (н-р для Fink по умолчанию надо инсталлировать "<code>sudo mv
                        <b>package-source.tar.gz</b> /sw/src/</code>". Затем укажите
                     '<code>fink install <b>packagename</b>
                    </code>' как normal.</p><p>Если не получилось достать файл исходного кода, надо подождать, пока
                    координатор решит проблему. Он может либо
                    сделать связку со старым исходным кодом, либо обновить файлы .info и
                    .patch для использования более свежей версии.</p></div>
        </a>
        <a name="fink-not-found">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.16: Получаю сообщения об ошибке "command not found", когда запускаю Fink или
                    то, что инсталлировано при помощи Fink.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If this always happens, then you may have inadvertently
        modified (or failed to modify) your startup scripts. Run the
        <code>/sw/bin/pathsetup.sh</code> script in a terminal
        window. This program will attempt to detect your default shell
        and add a command to load Fink's shell initialization script
        into your shell's configuration. You'll then need to open a
        new terminal session so that your environment settings are
        loaded. <b>Note:</b> Some older versions fink called this
        script <code>pathsetup.command</code> instead
        of <code>pathsetup.sh</code>. Alternately, you can run
        the <code>pathsetup.app</code> application on the Fink
        binary distribution disk image.</p><p>On the other hand, if you only have problems in the Apple X11
        terminal, the easy solution is to modify the "Terminal" entry in the X11 Application menu via the <b>Applications-&gt;Customize Menu... </b>option.  Instead of just</p><pre>xterm</pre><p>change the command field to read</p><pre>xterm -ls</pre><p><code>ls</code> here means <q>login shell</q>, and the result is that your full login setup gets used (just like the OS X Terminal).</p><p>These <code>/sw/bin/init.*</code> scripts do much
	more than just add <code>/sw/bin</code> to your PATH.
	Many packages will not work correctly without these additional
	actions.</p></div>
        </a>
        <a name="invisible-sw">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.17: Хочу спрятать /sw в Finder, чтобы пользователи не повредили
                    настройки Fink.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Это возможно. Если у вас инсталлированы Developer Tools,
                    выполните следующую команду:</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>Это сделает /sw невидимым, как стандартные системные
                    папки (/usr и т.п.). Если у вас нет Developer Tools,
                    есть разные приложения третьих лиц, которые позволяют
                    управлять атрибутами и делать  /sw невидимым.</p></div>
        </a>
        <a name="install-info-bad">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.18: Не могу ничего инсталлировать из-за следующей ошибки:
                    "install-info: unrecognized option `--infodir=/sw/share/info'"</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Обычно это происходит из-за проблемы в вашем PATH. Напечатайте в окне
                    терминала:</p><pre>printenv PATH</pre><p>Если<code>/sw/sbin</code> не появится совсем, надо
                    настроить свою среду согласно - <a href="http://fink.sourceforge.net/doc/users-guide/install.php#setup">инструкциям</a> в Руководстве пользователя.
                    Если <code>/sw/sbin</code> есть,
                    но впереди находятся другие каталоги (н-р
                    <code>/usr/local/bin</code>), то вам надо либо реорганизовать 
                    свой PATH так, чтобы
                    <code>/sw/sbin</code> находился близко к началу, либо, если
                    вам очень надо расположить другой каталог перед
                    <code>/sw/sbin</code> и такой каталог включает другой каталог 
                    install-info, то надо временно переименовать этот
                    подкаталог <code>install-info</code>
                    при использовании Fink.</p></div>
        </a>
        <a name="bad-list-file">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.19: Ничего не могу инсталлировать или удалить из-за проблемы с
                    файлом списка файлов ("files list file").</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Обычно такие ошибки имеют следующую форму:</p><pre>files list file for package <b>packagename</b> contains empty filename</pre><p>или</p><pre>files list file for package <b>packagename</b> is missing final newline</pre><p>Это исправляется без труда. Если у вас в системе имеется файл .deb
                    для пакета, содержащего ошибку,
                    проверьте его целостность при помощи </p><pre>dpkg --contents <b>full-path-to-debfile</b>
                </pre><p>например:</p><pre>dpkg --contents /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</pre><p>Если вы снова получили список каталогов и файлов, значит, ваш
                    .deb в порядке. Если выводится что-то другое, а не
                    каталоги и файлы, или у вас нет файла .deb file,
                   все равно вы можете продолжать, т.к. ошибка не помешает вам 
                    в компоновке.</p><p>Если вы делаете инсталляцию на основе бинарной дистрибуции или
                    точно знаете, что версия в бинарной дистрибуции
                    такая же, как инсталлированная версия (н-р
                    проверив <a href="http://fink.sourceforge.net/pdb/index.php">package
                    database</a>), можно получить файл .deb, применив
                        <code>sudo apt=get install --reinstall --download-only <b>packagename</b>
                    </code>. В противном случае вы можете построить ее с помощью
                        <code>fink rebuild <b>packagename</b>
                    </code>, но она все еще не инсталлируется.</p><p>Когда у вас будет действующий .deb, вы можете восстановить файл.
                    Сначала надо стать суперпользователем при помощи <code>sudo -s</code>
                    (при необходимости введите свой административный пароль пользователя) и
                    затем использовать следующую команду:</p><pre>dpkg -c <b>full-path-to-debfile</b> | awk '{if ($6 == "./"){ print "/."; } \
else if (substr($6, length($6), 1) == "/")\
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}'\ 
&gt; /sw/var/lib/dpkg/info/<b>packagename</b>.list</pre><p>например:</p><pre>dpkg -c /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb | awk \
'{if ($6 == "./") { print "/."; } \
else if (substr($6, length($6), 1) == "/") \
{print substr($6, 2, length($6) - 2); } \
else { print substr($6, 2, length($6) - 1);}}' \ 
&gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p>Это поможет извлечь содержимое файла  .deb,
                    удалить все, кроме названий файлов, и внести их в файл
                    .list.</p></div>
        </a>
        <a name="dselect-garbage">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.20: Я получил кучу мусора, когда выбирал пакеты в 
                    <code>dselect</code>. Как теперь можно его использовать?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Есть проблематичные вопросы между <code>dselect</code> и
                    <code>Terminal.app</code>. Решением может быть ввод
                    следующей команды:</p><p>для пользователей tcsh:</p><pre>setenv TERM xterm-color</pre><p>для пользователей bash:</p><pre>export TERM=xterm-color</pre><p>перед выполнением <code>dselect</code>. Вы также можете
                    сделать это в вашем файле инициализации (н-р <code>.cshrc</code> |
                    <code>.profile</code>), чтобы всегда иметь возможность использовать.</p></div>
        </a>
        <a name="perl-undefined-symbol">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.21: Почему я получаю кучу сообщений об ошибках "dyld: perl undefined symbols",
                    когда применяю команды Fink?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> ПО устарело.</p><p>Если вы получаете сообщение об ошибке, подобное такому:</p><pre>dyld: perl Undefined symbols: 
_Perl_safefree
_Perl_safemalloc 
_Perl_saferealloc 
_Perl_sv_2pv 
_perl_call_sv
_perl_eval_sv 
_perl_get_sv</pre><p>то вероятнее всего вы обновили Perl до
                    новой версии и теперь <code>storable-pm</code> нуждается
                    в обновлении. Вам следует обновить Fink. В ходе обновления
                    вы увидите опции для инсталляции
                    <code>perl-core</code> или
                    <code>system-perl</code>; выберите последнюю. Кроме
                    того, надо также обновить <code>storable-pm</code>.</p><p>В случае OS 10.1.x надо применить следующие команды (вам понадобятся
                    Developer Tools):</p><pre>sudo mv /sw/lib/perl5/darwin/Storable.pm /tmp 
sudo mv /sw/lib/perl5/darwin/auto/Storable /tmp 
fink rebuild storable-pm 
fink selfupdate-cvs</pre></div>
        </a>
        <a name="cant-upgrade">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.22: Не получается обновить версию Fink.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если <code>fink selfupdate</code> и
                        <code>sudo apt-get update ; sudo apt-get
                    dist-upgrade</code> не делают обновление до новой версии Fink,
                    вам возможно надо будет скачать более позднюю версию пакета
                    <code>fink</code> вручную. Соответствующие команды:</p><ul>
                    <li>
                        <b>10.3.x:</b> (дистрибуция 0.7.1) <pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.7.1-updates/main/binary-darwin-powerpc/base/fink_0.22.4-1_darwin-powerpc.deb
sudo dpkg -i fink_0.22.4-1_darwin-powerpc.deb
rm fink_0.22.4-1_darwin-powerpc.deb
fink selfupdate</pre>
                    </li>
                    <li>
                        <b>10.2.x:</b> (дистрибуция 0.6.3) <pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.6.3/release/main/binary-darwin-powerpc/base/fink_0.18.3-1_darwin-powerpc.deb
sudo dpkg -i fink_0.18.3-1_darwin-powerpc.deb
rm fink_0.18.3-1_darwin-powerpc.deb
fink selfupdate</pre>
                    </li>
                </ul></div>
        </a>
        <a name="spaces-in-directory">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.23: Можно ли разместить Fink в томе или каталоге с пробелом в его имени?</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Мы не рекомендуем размещать ваше дерево каталогов Fink в
                    каталог с пробелами в его имени. Не стоит этого делать.</p></div>
        </a>
        <a name="packages-gz">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.24: При попытке бинарного обновления появляется много сообщений
                    со словами "File not found"</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если вы видите что-то вроде следующего: </p><pre>Err file: local/main Packages 
File not found 
Ign file: local/main Release 
Err file: stable/main Packages 
File not found 
Ign file: stable/main Release 
Err file: stable/crypto Packages 
File not found 
Ign file: stable/crypto Release 
...
Failed to fetch file:/sw/fink/dists/local/main/binary-darwin-powerpc/Packages
File not found 
Failed to fetch file:/sw/fink/dists/stable/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch file:/sw/fink/dists/stable/crypto/binary-darwin-powerpc/Packages
File not found 
Reading Package Lists... Done 
Building Dependency Tree...Done 
E: Some index files failed to download, 
they have been ignored, or old ones used instead. 
update available list script returned error exit status 1.</pre><p>то вам надо запустить <code>fink
                    scanpackages</code>. Это поможет найти 
                    файлы.</p><p>If you get an error of the following form:</p><pre>W: Couldn't stat source package list file: unstable/main Packages
(/sw/var/lib/apt/lists/_sw_fink_dists_unstable_main_binary-darwin-
powerpc_Packages) - stat (2 No such file or directory)</pre><p>then you should run</p><pre>
sudo apt-get update
fink scanpackages
</pre><p>to fix it.</p></div>
        </a>
        <a name="wrong-tree">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.25: Я изменил OS | Developer Tools, но Fink не
                    признает изменение.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> При изменении дистрибуции Fink (подмножествами которой являются исходные и
                    бинарные distros), Fink нуждается в получении информации о том,
                    что произошло. Для этого вы можете выполнить скрипт, который обычно
                    запускается при первоначальной инсталляции Fink:</p><pre>/sw/lib/fink/postinstall.pl</pre><p>Выполнив это, вы укажете Fink правильное место.</p></div>
        </a>
        <a name="seg-fault">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.26: Получаю сообщения об ошибках с приложениями <code>gzip</code> | <code>dpkg-deb</code>I
                    из пакета <code> fileutils </code>! Помогите!</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Ошибки типа:</p><pre>gzip -dc /sw/src/dpkg-1.10.9.tar.gz | /sw/bin/tar -xf - 
### execution of gzip failed, exit code 139</pre><p>или</p><pre>gzip -dc /sw/src/aquaterm-0.3.0a.tar.gz | /sw/bin/tar -xf -
gzip: stdout: Broken pipe 
### execution of gzip failed, exit code 138</pre><p>или</p><pre>dpkg-deb -b root-base-files-1.9.0-1 /sw/fink/dists/unstable/main/binary-darwin-powerpc/base

### execution of dpkg-deb failed, exit code 1
Failed: can't create package base-files_1.9.0-1_darwin-powerpc.deb</pre><p>или ошибки сегментации при использовании утилитов из <code>
                    fileutils</code>, н-р <code>ls</code> или <code>mv</code>,
                    вероятно обусловлены предварительно связывающей ошибкой в библиотеке и
                    могут быть устранены следующим образом:</p><pre>sudo /sw/var/lib/fink/prebound/update-package-prebinding.pl -f</pre></div>
        </a>
        <a name="pathsetup-keeps-running">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.27: Когда я открываю окно Terminal, получаю сообщение "Your
                    environment seems to be correctly set up for Fink already.",
                    и сеанс завершается.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Дело в том, что каким-то образом программе OSX Terminal поступило указание
                    выполнять команду <code>/sw/bin/pathsetup.command</code>
                    каждый раз, когда вы начинаете сеанс. Это можно исправить, удалив файл 
                    Preferences: <code>~/Library/Preferences/com.apple.Terminal.plist</code>.</p><p>Если у вас есть другие преференции, которые вы хотите оставить, можно отредактировать
                    файл при помощи текстового редактора и убрать ссылку на <code>/sw/bin/pathsetup.command</code>.</p></div>
        </a>
        <a name="ext-drive">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.28: Мой Fink инсталлирован отдельно от главного сегмента и я не могу
                    обновить пакет fink на основе исходного кода. Появляются сообщения об ошибках
                    с упоминанием <q>chowname</q>.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если сообщение об ошибке выглядит так:</p><pre>This first test is designed to die, so please ignore the error
message on the next line.
# Looks like your test died before it could output anything.
./00compile............................ok
./Base/initialize......................ok
./Base/param...........................ok
./Base/param_boolean...................ok
./Command/cat..........................ok
./Command/chowname.....................#     
Failed test (./Command/chowname.t at line 27)
#          got: 'root'
#     expected: 'nobody'</pre><p>то надо использовать <b>Get Info</b> на носителе/сегменте,
                    где Fink инсталлирован, и отменить выбор "Ignore ownership".</p></div>
        </a>
        <a name="mirror-gnu">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.29: Fink не хочет обновлять мои пакеты, т.к. утверждает, что
                    не может найти зеркало 'gnu'.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Если вы получили сообщение об ошибке, которое оканчивается на </p><pre>Failed: No mirror site list file found for mirror 'gnu'.</pre><p>то наиболее вероятно вам надо обновить пакет
                    <code>fink-mirrors</code> , н-р через:</p><pre>fink install fink-mirrors</pre></div>
        </a>
        <a name="cant-move-fink">
            <div class="question"><p><b><? echo FINK_Q ; ?>5.30: Не могу обновить Fink, т.к. он не может убрать  /sw/fink..</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Эта ошибка:</p><pre>Failed: Can't move "/sw/fink" out of the way.</pre><p>обычно обусловлена, хотя и утверждает иное, ошибками
                    разрешений в одном из временных каталогов, создаваемых
                    в процессе автообновления - <code>selfupdate</code>. Удалите</p><pre>sudo rm -rf /sw/fink.tmp /sw/fink.old</pre></div>
        </a>
    
    <a name="four-oh-three">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.31: I keep getting 403 errors when I use <code>apt-get</code> or <code>dselect</code> or the Fink Commander Binary menu.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There have been problems with the Sourceforge download servers, and therefore we are moving the binary distribution repository for this very reason.</p><ul>
          <li>If you have the Developer Tools installed then install the latest version of the <code>fink-mirrors</code> package (&gt;= 0.24.4.1), and then reinstall <code>fink</code>, either via:
<pre>fink reinstall fink</pre>
<p>or</p>
<pre>sudo apt-get install --reinstall fink</pre>
<p>(if for whatever reason you don't want to use the source distribution).</p>
</li>
          <li>If you don't have the Developer Tools installed, then you'll have to set things up manually.  Edit your <code>sources.list</code> file as root, e.g..via
<pre>sudo pico /sw/etc/apt/sources.list</pre>
<p>(use your favorite Unix-line-ending-compatible text editor). Change the lines that start with "Official binary distribution:" thusly:</p>
<pre># Official binary distribution: download location for packages
# from the latest release
deb http://bindist.finkmirrors.net/bindist 10.3/release main crypto

# Official binary distribution: download location for updated
# packages built between releases
deb http://bindist.finkmirrors.net/bindist 10.3/current main crypto</pre>
<p>The above of course assumes you're on 10.3.  If you're on a different OS replace <code>10.3</code> with what your current distribution is.</p>
<p>Then save your work and quit the editor.  Now update your binary package list again.</p>
</li>
        </ul></div>
    </a>
    <a name="fc-cache">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.32: I get a message that says "No fonts found".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you see the following (so far only seen on OS 10.4):</p><pre>No fonts found; this probably means that the fontconfig
library is not correctly configured. You may need to
edit the fonts.conf configuration file. More information
about fontconfig can be found in the fontconfig(3) manual
page and on http://fontconfig.org.</pre><p>then you can fix it by running</p><pre>sudo fc-cache</pre></div>
    </a>
    <a name="non-admin-installer">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.33:  I can't install Fink via the Installer package, because I get "volume doesn't support symlinks" errors.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This message commonly means that you've tried to run the Fink installer as user who doesn't have administrative privileges.  Make sure to log in at the login screen as such a user or switch to such a user in the Finder (i.e. fast user switching) before starting the Fink installer.</p><p>If you're having trouble even when using an admin account, then it's likely a problem with the permissions on your top-level directory.  Use Apple's Disk Utility (from the Utilities sub-folder in your Applications folder), select the hard drive in question, choose the <b>First Aid</b> tab, and press <b>Repair Disk Permissions</b>.</p></div>
    </a>
    <a name="wrong-arch">
      <div class="question"><p><b><? echo FINK_Q ; ?>5.34: I can't update Fink, because <q>package architecture (darwin-i386) does not match system (darwin-powerpc).</q>
</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This error occurs if you use a PowerPC installer package on an Intel machine.  You'll need to flush your Fink installation, e.g.:</p><pre>sudo rm -rf /sw</pre><p>and then download the disk image for Intel machines from <a href="http://fink.sourceforge.net/download/index.php">the downloads page</a>.</p></div>
    </a>
    <a name="sf-cvs-2006">
	      <div class="question"><p><b><? echo FINK_Q ; ?>5.35: I haven't been able to do a cvs selfupdate.</b></p></div>
	      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you get errors that include lines like:</p><pre>
cvs [update aborted]: connect to cvs.sourceforge.net(66.35.250.207):
2401 failed: Operation timed out
</pre><p>this is because of a recent restructuring of the CVS servers at sourceforge.net.  Fink files are now at <code>fink.cvs.sourceforge.net</code>.  You'll need to update the <code>fink-mirrors package</code> via the binary tools:</p><pre>
sudo apt-get update ; sudo apt-get install fink-mirrors
</pre></div>
	      </a>
	      
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="comp-general.php?phpLang=ru">6. Проблемы компиляции  - Общие вопросы</a></p>
<? include_once "../footer.inc"; ?>


