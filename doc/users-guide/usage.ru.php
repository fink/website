<?
$title = "Руководство пользователя - Инструмент fink";
$cvs_author = 'Author: dmrrsn';
$cvs_date = 'Date: 2008/06/27 00:55:00';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Руководство пользователя Contents"><link rel="prev" href="conf.php?phpLang=ru" title="Конфигурационный файл Fink">';


include_once "header.ru.inc";
?>
<h1>Руководство пользователя - 6. Использование инструмента fink в командной строке</h1>
        
        
        <h2><a name="using">6.1 Использование инструмента fink</a></h2>
            
            <p>Инструмент <code>fink</code> использует несколько суффиксных команд для работы
                над пакетами дистрибутива исходного кода. Некоторым из них требуется как минимум одно
                имя пакета, но они также могут обрабатывать несколько имен одновременно.
                Можно указать только имя пакета (н-р, gimp), но также можно дать полное точное имя пакета, включающее
                номер версии (н-р, gimp-1.2.1) или же полное имя с
                номером версии и модификации (н-р, gimp-1.2.1-3). Fink
                автоматически выберет последнюю имеющуюся версию и модификацию, если они не указаны.
                У других команд другие опции.</p>
            <p>Далее приводится список команд для инструмента <code>fink</code>:</p>
        
        <h2><a name="options">6.2 Глобальные опции</a></h2>
            
            <p> Некоторые опции относятся ко всем командам fink. Если вы напечатаете
                 <code>fink --help</code>, то получите список опций: </p>
            <p>(для <code>fink-0.26.0</code>)</p>

            


      <p><b>-h, --help</b> - displays help text.
</p>
      <p><b>-q, --quiet</b>  - causes <code>fink</code> to be less verbose, opposite of <b>--verbose</b>.  Overrides the <a href="conf.php?phpLang=ru#optional">Verbose</a> flag in <code>fink.conf</code>.
</p>
      <p><b>-V, --version</b> - display version information.
</p>
      <p><b>-v, --verbose</b> - causes  <code>fink</code> to be more verbose, opposite of <b>--quiet</b>.  Overrides the <a href="conf.php?phpLang=ru#optional">Verbose</a> field in <code>fink.conf.</code>
</p>
      <p><b>-y, --yes</b> - assume default answer for all interactive 
                        questions.
</p>
      <p><b>-K, --keep-root-dir</b>   - Causes <code>fink</code> not to delete the
                        <code>root-[name]-[version]-[revision]</code>
		        directory in the <a href="conf.php?phpLang=ru#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=ru#developer">KeepRootDir</a> field in <code>fink.conf</code>.
</p>
      <p><b>-k, --keep-build-dir</b>  - Causes <code>fink</code> not to delete the
                        <code>[name]-[version]-[revision]</code>
                        directory in the <a href="conf.php?phpLang=ru#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=ru#developer">KeepBuildDir</a> field in <code>fink.conf</code>.</p>
      <p><b>-b, --use-binary-dist</b> - download pre-compiled packages from the binary 
                        distribution if available (e.g. to reduce compile
		        time or disk usage).
		        Note that this mode instructs fink to download the
                        version it wants if that version is available for
		        download; it does not cause fink to choose a version
    		        based on its binary availability.  Corresponds to the <a href="conf.php?phpLang=ru#downloading">UseBinaryDist</a> flag in <code>fink.conf</code>.
</p>
      <p><b>--no-use-binary-dist</b>  - Don't use pre-compiled binary packages from the binary 
		        distribution, opposite of the --use-binary-dist flag. 
                        This is the default unless overridden by setting <code>UseBinaryDist: true </code>in 
                        the <code>fink.conf</code> configuration file. 
</p>
      <p><b>--build-as-nobody</b>     - Drop to a non-root user when performing the unpack,
                        patch, compile, and install phases. Note that packages
                        built with this option may be non-functional. You
                        should use this mode for package development and 
                        debugging only.
</p>
      <p><b>-m, --maintainer</b>
            - (<code>fink-0.25</code> and later) Perform actions useful to package maintainers: run validation on
           the <code>.info</code> file before building and on the <code>.deb</code> after building a
           package; turn certain build-time warnings into fatal errors; (<code>fink-0.26</code> and later) run the test suites as specified in the  field.  This sets <b>--tests</b> and <b>--validate</b> to <code>on</code>.</p>
      <p><b>--tests[=on|off|warn]</b>         - (<code>fink-0.26.0</code> and later) Causes <code>InfoTest</code> fields to be activated and test suites specified
           via <code>TestScript</code> to be executed (see the <a href="../packaging/reference.php#fields">Fink Packaging Manual</a>).  If no argument is given to this
           option or if the argument is <code>on</code> then failures in test suites will
           be considered fatal errors during builds.  If the argument is <code>warn</code>
           then failures will be treated as warnings.</p>
      <p><b>--validate[=on|off|warn]</b> -
           Causes packages to be validated during a build.  If no argument is
           given to this option or if the argument is <code>on</code> then validation failures will be considered fatal errors during builds.  If the argument is <code>warn</code> then failures will be treated as warnings.</p>
      <p><b>-l, --log-output</b>
            - Save a copy of the terminal output during each package building
           process. By default, the file is stored in
           <code>/tmp/fink-build-log_[name]-[version]-[revision]_[date]-[time]</code> but
           one can use the <b>--logfile</b> flag to specify an alternate filename.</p>
      <p><b>--no-log-output</b>
            - Don't save a copy of the output during package-building, opposite
           of the <b>--log-output</b> flag. This is the default.</p>
      <p><b>--logfile=filename</b>
            - Save package build logs to the file <code>filename</code> instead of the default
           file (see the <b>--log-output</b> flag, which is implicitly set by the
           <b>--logfile</b> flag). You can use percent-expansion codes to include
           specific package information automatically. A complete list of percent-expanions is available in the <a href="../packaging">Fink Packaging Manual</a>; some common percent-expansions are:</p>
      <ul>
        <li>                 <b>%n</b>    - package name
                 </li>
        <li><b>%v</b>    - package version
                 </li>
        <li><b>%r</b>    - package revision</li>
      </ul>
      <p><b>-t, --trees=expr</b>
           - Consider only packages in trees matching <b>expr</b>.

           The format of expr is a comma-delimited list of tree specifica-
           tions. Trees listed in <code>fink.conf</code> are compared against <b>expr</b>.  Only
           those which match at least one tree specification are considered by
           <code>fink</code>, in the order of the first specifications which they match. If
           no <b>--trees</b> option is used, all trees listed in <code>fink.conf</code> are
           included in order.

           A tree specification may contain a slash (/) character, in which
           case it requires an exact match with a tree. Otherwise, it matches
           against the first path-element of a tree. For example,
           <b>--trees=unstable/main</b> would match only the <b>unstable/main</b> tree,
           while <b>--trees=unstable</b> would match both unstable/main and
           <b>unstable/crypto</b>.

           There exist magic tree specifications which can be included in
           <b>expr</b>:</p>
      <ul>
        <li><b>status</b>
                       - Includes packages in the dpkg status database.

                 </li>
        <li><b>virtual</b>
                       - Includes virtual packages which reflect the capabili-
                       ties of the system.
</li>
      </ul>
      <p>Exclusion of (or failure to include) these magic trees is currently
           only supported for operations which do not install or remove packages.</p>
      <p><b>-T, --exclude-trees=expr</b>
           Consider only packages in trees not matching expr.

           The syntax of expr is the same as for <b>--trees</b>, including the magic
           tree specifications. However, matching trees are here excluded
           rather than included. Note that trees matching both <b>--trees</b> and
           <b>--exclude-trees</b> are excluded.
</p>
      <p> Examples of <b>--trees</b> and --exclude-trees:

                 </p>
      <ul>
        <li><code>fink --trees=stable,virtual,status install <b>foo</b></code> 
                       <p>Install <b>foo</b> as if <code>fink</code> was using the stable tree, even
                       if unstable is enabled in <code>fink.conf</code>.
</p></li>
        <li><code>fink --exclude-trees=local install <b>foo</b></code> 
                       <p>Install the version of <b>foo</b> in Fink, not the locally
                       modified version.

</p></li>
        <li><code>fink --trees=local/main list -i</code>
                       <p>List the locally modified packages which are installed.</p></li>
      </ul>






            <p> Большинство названий данных опций говорят сами за себя. Их также можно настроить
                в <a href="conf.php?phpLang=ru">конфигурационном файле Fink</a>
                (<code>fink.conf</code>), если вы хотите иметь их постоянно, а не только при активации
                <code>fink</code>. </p>
            
             
        <h2><a name="install">6.3 install</a></h2>
            
            <p>Команда <b>install</b> используется для инсталляции пакетов. Она запускает скачивание,
                конфигурирование, построение и инсталляцию указанных вами пакетов. Она также
                автоматически инсталлирует необходимые зависимости, но перед этим запрашивает
                ваше подтверждение. Пример:</p>
            <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
            <p> Использование опции <a href="#options">--use-binary-dist </a>
                в сочетании с <code>fink install</code> может значительно ускорить процесс
                построения сложных пакетов.
                 </p>
            <p>Алиасы для команды install: <b>update, enable, activate, use</b>
                (в основном по историческим причинам).</p>
        
        <h2><a name="remove">6.4 remove</a></h2>
            
            <p>Команда remove удаляет пакеты из системы при помощи
                    '<code>dpkg --remove</code>'. Имеющаяся на данный момент команда, осуществляемая по умолчанию, 
                имеет недостаток: она не проверяет зависимости сама, а полностью полагается на
                инструмент dpkg (хотя обычно
                это не вызывает проблем).</p>
            <p>Команда <b>remove</b> удаляет только файлы фактических пакетов
                (кроме конфигурационных файлов), но оставляет нетронутым файл сжатого пакета <code>.deb</code>.
                Это значит, что вы можете реинсталлировать пакет впоследствии
                без повторного прохождения всего процесса компиляции.
                Если вам нужно место на диске, можно удалить <code>.deb</code> в дереве
                <code>/sw/fink/dists</code>.</p>
            <p>Вместе с командой fink remove можно использовать следующие опции:
            </p>
            <pre>-h,--help             - показывает существующие опции.
-r,--recursive        - удаляет также пакеты, зависящие от удаляемого
                        пакета (т.е. исправляет вышеуказанный недостаток).</pre>
            <p>Алиасы: <b>disable, deactivate, unuse, delete</b>.</p>
        
        <h2><a name="purge">6.5 purge</a></h2>
            
            <p>Команда <b>purge</b> предназначена для очистки системы от пакетов. Она действует так же, как
                команда <b>remove</b>, но еще и удаляет конфигурационные файлы.
            </p>
            <p>Вместе с данной командой можно использовать следующие опции:
            </p>
            <pre>-h,--help            
                -r,--recursive</pre>
        
        <h2><a name="update-all">6.6 update-all</a></h2>
            
            <p>Данная команда обновляет все инсталлированные пакеты до последней
                версии. Ей не нужен список пакетов; вы можете просто напечатать:</p>
            <pre>fink update-all</pre>
            <p> В сочетании с этой командой полезно применение опции <a href="#options">--use-binary-dist</a>.
                 </p>
        
        <h2><a name="list">6.7 list</a></h2>
            
            <p> Данная команда генерирует список имеющихся пакетов, с указанием статуса инсталляции и
                последней версии, а также с кратким описанием.
                Если вы обратились к этой команде без указания параметров, она просто предоставит список имеющихся
                пакетов. Вы также можете дать образец имени или оболочки, и fink
                предоставит список соответствующих наименований.</p>
            <p> Первая колонка отражает статус инсталляции со следующими
                значениями:</p>
            <pre>    пакет не инсталлирован
 i   инсталлирована последняя версия
(i)  пакет инсталлирован, но имеется более поздняя версия
 p   виртуальный пакет, предоставленный инсталлированным пакетом</pre>
            <p> Для команды <code>fink list</code> существуют следующие опции:</p>
            <pre>
-h,--help
	  Отражает имеющиеся опции.
-t,--tab
	  Выводит список в формате ограничения табуляцией, полезном для
	  выполнения вывода через скрипт.
-i,--installed
	  Отражает только текущие инсталлированные пакеты.
-o,--outdated
	  Отражает только устаревшие пакеты.
-u,--uptodate
	  Отражает только последние пакеты.
-n,--notinstalled
	  Отражает пакеты, не инсталлированные на данный момент.
-s expr,--section=expr
	  Отражает только пакеты в разделах, которые соответствуют
	  регулярному выражению expr.
-m expr,--maintainer=expr
	  Отражает только пакеты, координаторы которых соответствуют
	  регулярному выражению expr.
-r expr,--tree=expr
	  Отражает только пакеты в деревьях, которые соответствуют
	  регулярному выражению expr.
-w=xyz,--width=xyz
	  Устанавливает ширину дисплея, которая вам нужна для формата
	  вывода. xyz является либо числовым, либо автоматическим значением (auto).
	  Настройка auto устанавливает ширину на основании ширины терминала.
	  Настройка по умолчанию: auto.
</pre>                       
            <p> 
                Несколько примеров использования:</p>
            <pre>
fink list                 - список всех пакетов
fink list bash            - проверка наличия bash и его версии
fink list --tab --outdated | cut -f 2     
                          - just list the names of the out of date packages.
fink list --section=kde   - список пакетов в разделе kde
fink list --maintainer=fink-devel
                          - list the packages with no maintainer
fink --trees=unstable list --maintainer=fink-devel
                          - list the packages with no maintainer, but only in the
                            unstable tree.
fink list "gnome*"        - список пакетов, начинающихся с 'gnome'
</pre>
            <p> 
            Кавычки в последнем примере необходимы для того, чтобы оболочка
                сама не начала интерпретировать образец. </p>
        
        <h2><a name="apropos">6.8 apropos</a></h2>
            
            <p> Данная команда ведет себя почти так же, как <a href="#list">fink list</a>.
                Основное отличие в том, что <code>fink apropos</code>
                также находит описание пакетов с целью их выявления. Другое отличие в том, что
                искомая строковая цепочка должна предоставляться и является обязательной. 
            </p>
            <pre>
fink apropos irc          - список всех пакетов, имеющих 'irc' 
                			в имени или описании.
fink apropos -s=kde irc   - то же, что и выше, но с ограничением до 
                			пакетов из раздела kde.
</pre>            
        
        <h2><a name="describe">6.9 describe</a></h2>
            
            <p> Данная команда вызывает описание пакета, имя которого вы указываете в командной строке.
                Надо учитывать, что только некоторые пакеты на данный момент
                имеют описание.</p>
            <p>Алиасы: <b>desc, description, info</b>.</p>
        
	
    <h2><a name="plugins">6.10 plugins</a></h2>
      
      <p> List the (optional) plugins available to the <code>fink</code> program.  Currently lists the notification mechanisms and the source-tarball
           checksum algorithms.</p>
    
	
        <h2><a name="fetch">6.11 fetch</a></h2>
            
            <p>Скачивает поименно указанные пакеты, но не инсталлирует их. Эта команда
                скачивает тарболы, даже если они уже были скачаны прежде.</p>

      <p>The following flags can be used with the <code>fetch</code> command:</p>
      <pre>-h,--help		Show the options which are available.
-i,--ignore-restrictive	Do not fetch packages that are &amp;quot;License: Restrictive&amp;quot;.
                      	Useful for mirrors, because some restrictive packages
                      	do not allow source mirroring.
-d,--dry-run		Just display information about the file(s) that would
			be downloaded for the package(s) to be fetched; do not
			actually download anything.
-r,--recursive		Also fetch packages that are dependencies of the
			package(s) to be fetched.</pre>

        
        <h2><a name="fetch-all">6.12 fetch-all</a></h2>
            
            <p>Скачивает <b>все</b> файлы исходного кода пакета. Подобно <a href="#fetch">fetch</a>, она
                скачивает тарболы, даже если они уже были скачаны прежде.</p>
            <p>С командой <code>fink fetch-all</code> можно использовать следующие опции:</p>
            <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
        
        <h2><a name="fetch-missing">6.13 fetch-missing</a></h2>
            
            <p>Скачивает <b>все</b> недостающие исходные файлы пакета. Данная команда
                скачивает только те файлы, которые не представлены в системе.</p>
            <p>С командой <code>fink fetch-missing</code> можно использовать следующие опции:</p>
            <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
        
        <h2><a name="build">6.14 build</a></h2>
            
            <p>Строит пакет, но не инсталлирует его. Как правило, тарболы исходного кода
                скачиваются, если их нельзя найти. Результат этой команды -
                готовый к инсталляции файл .deb пакета, который вы затем можете быстро инсталлировать
                при помощи команды install. Эта команда бесполезна, если
                уже существует файл .deb. Надо иметь в виду, что
                зависимости - в отличие от пакета - <b>инсталлированы</b>, а не просто построены.</p>
            <p> Здесь применима опция <a href="#options">--use-binary-dist</a>.
                 </p>
        
        <h2><a name="rebuild">6.15 rebuild</a></h2>
            
            <p>Выполняет построение пакета (lподобно команде build), но игнорирует и перезаписывает
                существующий файл .deb. Если пакет инсталлирован,
                вновь созданный файл .deb также будет инсталлирован в системе
                через <code>dpkg</code>. Это весьма полезно в процессе разработки пакета.</p>            
      
      <p>The <a href="#options">--use-binary-dist option</a> is applicable here.</p>
      
        
        <h2><a name="reinstall">6.16 reinstall</a></h2>
            
            <p>Действует так же, как install, но инсталлирует пакет через
                <code>dpkg</code>, даже если он уже инсталлирован. Можно использовать
                эту команду, если вы случайно удалили файлы пакета или изменили
                конфигурационные файлы и хотите опять иметь настройки по умолчанию.</p>
        
        <h2><a name="configure">6.17 configure</a></h2>
            
            <p> Запускает повторное выполнение конфигурации <code>fink</code>. Это позволяет, в числе прочего, изменять
                ваши настройки сайтов зеркал и прокси.</p>
	  
      <p><b>New in</b> <code>fink-0.26.0</code>: This command will also let you turn on the unstable trees if desired.</p>
      
        
        <h2><a name="selfupdate">6.18 selfupdate</a></h2>
            
            <p> Данная команда автоматизирует процесс обновления до новых версий Fink.
                Она проверяет веб-сайт Fink на наличие новой версии,
                затем скачивает описание пакетов и обновляет базовые пакеты,
                в т.ч. сам <code>fink</code>.
                Эта команда может делать обновление до регулярных выпусков версий, но также
                может настроить ваше дерево каталогов <code>/sw/fink/dists</code> для
                прямого обновления через CVS. Это значит, что вы затем сможете иметь доступ
                к самым последним модификациям всех пакетов.</p>
            <p> Если активирована опция <a href="#options">--use-binary-dist</a>,
                список пакетов, имеющихся в бинарном дистрибутиве, также
                обновляется. </p>
        

    <h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use rsync to update its package list.</p>
      <p>This is the recommended way to update Fink when building from source.</p>
      <p><b>Note:</b>  rsync updates only update the active <a href="conf.php?phpLang=ru#optional">trees</a> (e.g. if unstable isn't turned on in <code>fink.conf</code> the list of unstable packages won't be updated.</p>
    
    <h2><a name="selfupdate-cvs">6.20 selfupdate-cvs</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use CVS access to update its package list.</p>
      <p>CVS updating is deprecated, except for developers and those people who are behind firewalls that disallow rsync.</p>
    

        <h2><a name="index">6.21 index</a></h2>
            
            <p> Перестраивает кэш пакета. Обычно вам не надо выполнять это вручную,
                так как <code>fink</code> автоматически определяет,
                когда он нуждается в обновлении.</p>
        
        <h2><a name="validate">6.22 validate</a></h2>
            
            <p> Данная команда выполняет различные проверки в файлах <code>.info</code> и <code>.deb</code>.
                Координаторы пакетов должны это делать в описании своих пакетов
                и соответствующих построенных пакетах перед их предоставлением.</p>
            <p>Можно использовать следующие дополнительные опции:</p>
            <pre>-h,--help            - Отражает имеющиеся опции.
-p,--prefix     - Имитирует альтернативный префикс базового маршрута Fink (%p) для
                проверяемых файлов.
--pedantic, --no-pedantic
				- Контролирует отражение предупреждений о форматировании.
				--pedantic  - настройка по умолчанию.</pre>
            <p>Алиас: <b>check</b>.</p>
        
        <h2><a name="scanpackages">6.23 scanpackages</a></h2>
            
      
      <p>Updates the <code>apt-get</code> database of debs; defaults to updating all of the trees, but may be restricted to a set of one or more trees given as arguments.</p>
              
        <h2><a name="cleanup">6.24 cleanup</a></h2>
            
      
      <p>
   Removes obsolete and temporary files. 
   This can reclaim large amounts of disk space.  One or more modes may be specified:</p>
      <pre>--debs               - Delete .deb files (compiled binary package archives)
                       corresponding to versions of packages that are neither
                       described by a package description (.info) file in the
                       currently-active trees nor presently installed.
--sources,--srcs     - Delete sources (tarballs, etc.) that are not used by
                       any package description (.info) file in the currently-
                       active trees.
--buildlocks, --bl   - Delete stale buildlock packages.
--dpkg-status        - Remove entries for packages that are not installed from
                       the dpkg "status" database.
--obsolete-packages  - Attempt to uninstall all installed packges that are
                       obsolete. (new in fink-0.26.0)
--all                - All of the above modes. (new in fink-0.26.0)</pre>
      <p>If no mode is specified, <code>--debs --sources</code> is the default action. </p>
      <p>In addition, the following options may be used:</p>
      <pre>-k,--keep-src        - Move old source files to /sw/src/old/ instead of deleting them.
-d,--dry-run         - Print the names of the files that would be deleted, but
                       do not actually delete them.
-h,--help            - Show the modes and options which are available.</pre>
            
        <h2><a name="dumpinfo">6.25 dumpinfo</a></h2>
            
            <p> Действует только в версиях после <code>fink</code> 0.21.0. </p>
            <p> Отражает, как <code>fink</code> синтаксически анализирует части файла <code>.info</code> пакета. Разные области
                и процентные расширения отражаются в соответствии со следующими
                <b>опциями</b>: </p>
            <pre>
-h, --help            - Отражает имеющиеся опции.
-a, --all             - Отражает все области на основании описания пакетов.
                        Это режим по умолчанию, в котором нет флагов --field и --percent .               
-f fieldname, --field=fieldname - Отражает имена областей в списочном порядке.                    
-p key, --percent=key - Отражает клавиши данного процентного расширения
						в списочном порядке.
</pre>
        
        <h2><a name="show-deps">6.26 show-deps</a></h2>
            
            <p> Действует только для fink-0.23-6 и последующих версий. </p>
            <p> Отражает воспринимаемый человеком список зависимостей времени компиляции (построения)
                и выполнения (инсталляции) пакетов, указанных в списке.
            </p>
        
    
<? include_once "../../footer.inc"; ?>


