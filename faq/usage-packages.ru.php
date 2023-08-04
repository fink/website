<?php
$title = "Ч.З.В. - Использование (2)";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2023/08/04 04:42:29';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="prev" href="usage-general.php?phpLang=ru" title="Проблемы использования пакетов - Общие вопросы">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 9. Проблемы использования пакетов  - Специальные пакеты</h1>
        
        
        <a name="xmms-quiet">
            <div class="question"><p><b><?php echo FINK_Q ; ?>9.1: Нет ни звука от XMMS</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Убедитесь, что у вас есть "eSound Output Plugin", отмеченный в
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
            <div class="question"><p><b><?php echo FINK_Q ; ?>9.2: Когда во время редактирования файла в nedit я открываю другой файл, его окно
                    появляется, но не работает.</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Это известная проблема, которая наблюдается в последних версиях
                    <code>nedit</code> и <code>lesstif</code>
                    на всех платформах. Обойти ее можно так: открыть новое окно
                    при помощи File--&gt;New, а затем открыть следующий файл, с которым
                    вы хотите работать.</p><p>Сейчас эта проблема решена в <code>nedit-5.3-6</code>, который зависит
                    от <code>openmotif3</code> в большей степени, чем от <code>lesstif</code>.</p></div>
        </a>
        <a name="xdarwin-start">
            <div class="question"><p><b><?php echo FINK_Q ; ?>9.3: Помогите! Когда запускаю XDarwin, она сразу завершает работу!</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Не паникуйте. Документ "Выполнение X11" сейчас имеет большой раздел
                        <a href="/doc/x11/trouble.php#immediate-quit">Выявление и устранение проблем
                    </a> по данному общему вопросу.</p></div>
        </a>
        <a name="no-server">
            <div class="question"><p><b><?php echo FINK_Q ; ?>9.4: При попытке запуска XDarwin получил сообщение "xinit: No such
                    file or directory (errno 2): no server "/usr/X11R6/bin/X" in PATH".</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Во-первых, надо убедиться, что вы основываетесь на init.sh при запуске X <code>~/.xinitrc</code>.</p><p>В Jaguar иногда все пакеты <code>xfree86</code> поддаются построению,
                    но только <code>xfree86-base</code> и
                    <code>xfree86-base-shlibs</code> инсталлируются. Проверьте, есть ли у вас
                    инсталлированные <code>xfree86-rootless</code> и
                    <code>xfree86-rootless-shlibs</code>. Если нет, то проблема в
                        <code>fink install xfree86-rootless</code>.</p><p>Если да, то надо попробовать <code>fink rebuild
                    xfree86-rootless</code>. Если это не сработает, проверьте, есть ли у вас
                     <code>/usr/bin/X11R6</code> в PATH.</p></div>
        </a>

        <a name="apple-x-delete">
            <div class="question"><p><b><?php echo FINK_Q ; ?>9.5: Хочу стереть клавишу в Apple X11.app для поведения, как в
                    XDarwin.</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Некоторые пользователи сообщают, что поведение клавиши
                    <code>delete</code> в XDarwin отличается от ее поведения в
                    Apple X11. Это можно исправить путем добавления строк к
                    соответствующим файлам инициализации X:</p><p>
                    <b>.Xmodmap:</b>
                </p><pre>keycode 59 = Delete</pre><p>
                    <b>.Xresources:</b>
                </p><pre>xterm*.deleteIsDEL: true xterm*.backarrowKey: false
                    xterm*.ttyModes: erase ^?</pre><p>
                    <b>.xinitrc</b>
                </p><pre>xrdb -load $HOME/.Xresources 
xmodmap $HOME/.Xmodmap</pre><p></p></div>
        </a>
        <a name="gnome-two">
            <div class="question"><p><b><?php echo FINK_Q ; ?>9.6: Я сделал обновление от GNOME 1.x дo GNOME 2.x и теперь
                    <code>gnome-session</code> не открывает менеджер окон. </b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Тогда как в GNOME 1.x <code>gnome-session</code> активизирует
                     менеджер окон <code>sawfish</code> автоматически, в
                    GNOME 2.x надо запускать менеджер окон в
                    <code>~/.xinitrc</code> до выполнения
                    <code>gnome-session</code>, н-р:</p><pre>... 
exec metacity &amp; exec gnome-session</pre><p>Прим.: это больше не относится к <b>GNOME 2.4</b>. Выполнение
                    <code>gnome-session</code> активизирует менеджер окон.</p></div>
        </a>
        <a name="apple-x11-no-windowbar">
            <div class="question"><p><b><?php echo FINK_Q ; ?>9.7: Я сделал обновление до Apple X11 в Panther и теперь у меня не хватает
                    строк заголовков в окнах.</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Вы не обновили X11 до версии  "X11 1.0 - XFree86 4.3.0",
                    включенной в Panther. Вы можете инсталлировать X11 из X11.pkg на
                    Disk 3.</p></div>
        </a>
        <a name="apple-x11-wants-xfree86">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.8: I'm having problems with X11 and Fink.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> There are two possibilities to consider.</p><ul>
          <li>
            <b>You are installing from binaries:</b>
            <p>Typically what you need to do is reinstall the X11User package,
	    since the installer application occasionally misses installing a file.
	    You may need to repeat this multiple times. Running</p>
	    <pre>fink list -i system-xfree86</pre>
	    <p>should show that the <code>system-xfree86</code> and
	    <code>system-xfree86-shlibs</code> packages are installed, and</p>
	    <pre>fink list x11</pre>
	    <p>should indicate that the <code>x11-shlibs</code> and <code>x11</code> virtual
	    packages are present.</p>
	    <p>If reinstalling the X11User package doesn't work, then consult the
	    <a href="#special-x11-debug">special debug</a> instructions,
	    below.</p>
          </li>
          <li>
            <b>You are installing from source:</b>
	    <p>Typically this error means that you need to (re)install the X11SDK,
	    which is <b>mandatory</b> if you want to build packages from source.
            It is in the Xcode Tools folder of a Tiger DVD, or (Optional
            Installs/)Xcode Tools/Packages on your Leopard DVD(s). If you
            run</p>
            <pre>fink list -i system-xfree86  </pre>
            <p>it should show the <code>system-xfree86</code>,
	    <code>system-xfree86-shlibs</code>, and <code>system-xfree86-dev</code>
	    packages as installed.  If the <code>-dev</code> package is missing,
	    reinstall the X11SDK, since sometimes the Apple Installer misses a
	    file.  You may need to keep doing this.  If either of the other two
	    are missing, then reinstall the X11User package (same reason).  At
	    this point</p>
	    <pre>fink list x11</pre>
	    <p>should indicate that the <code>x11-dev</code>, <code>x11-shlibs</code>,
	    and <code>x11</code> virtual packages are present.</p>
	    <p>If reinstalling the X11SDK or X11User package doesn't work, then consult the
	    <a href="#special-x11-debug">special debug</a> instructions,
	    below.</p>
           </li>
        </ul></div>
    </a>
    
        <a name="special-x11-debug">
            <div class="question"><p><b><?php echo FINK_Q ; ?>9.9: Я меня остались проблемы с X11и Fink.</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Если подсказки в ответах по поводу проблем: <a href="#apple-x11-wants-xfree86">Fink просит инсталлировать
                        XFree86 или X.org</a> и <a href="#wants-xfree86-on-upgrade">X11 и обновление от
                    10.2</a> не помогают или неприменимы к вашей ситуации,
                    возможно, вам надо убрать свою инсталляцию X11,
                    удалить все старые заполнители и частично/полностью
                    инсталлированные пакеты, связанные с X11:</p><p>On Leopard, use</p><pre>
sudo pkgutil --forget com.apple.pkg.X11User
sudo pkgutil --forget com.apple.pkg.X11SDKLeo
</pre><p>Then, on either 10.4 or 10.5, run</p><pre>sudo dpkg -r --force-all system-xfree86 system-xfree86-42 system-xfree86-43 \
xorg xorg-shlibs xfree86 xfree86-shlibs \
xfree86-base xfree86-base-shlibs xfree86-rootless xfree86-rootless-shlibs \
xfree86-base-threaded xfree86-base-threaded-shlibs \
xfree86-rootless-threaded xfree86-rootless-threaded-shlibs
rm -rf /Library/Receipts/X11SDK.pkg /Library/Receipts/X11User.pkg
fink selfupdate; fink index</pre><p>(the first line may give you warnings about trying to remove
	nonexistent packages).  Then, reinstall Apple's X11 (and the X11SDK, if
	needed), or,
	if you're on 10.4, an alternative X11 implementation, like XFree86 or X.org.</p><p>If you are still having problems then you can run</p><pre>fink-virtual-pkgs --debug</pre><p>для получения информации о том, чего не хватает.</p><p>Если вы используете более раннюю версию<code>fink</code>,
                    существует скрипт Perl (благодарим Martin Costabel), который
                    можно скачать и выполнить для получения информации. </p><ul>
                    <li>Это здесь: <a href="http://perso.wanadoo.fr/costabel/fink-x11-debug">http://perso.wanadoo.fr/costabel/fink-x11-debug</a>
                    </li>
                    <li>Его можно сохранить где угодно.</li>
                    <li>Запускать его надо в терминальном окне через посредство <pre>perl fink-x11-debug</pre>
                    </li>
                </ul></div>
        </a>
    
    <a name="tiger-gtk">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.10: After updating to Tiger (OS 10.4), whenever I use a GTK app, I get errors involving <code>_EVP_idea_cbc</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> This is caused by an apparent bug in Tiger's dynamic linker (current as of 10.4.1), but looks to be fixed in 10.4.3, and Fink has had a workaround in the guise of <code>base-files-1.9.7-1</code> or later.</p><p>If you haven't updated Tiger and/or <code>base-files</code> yet, you can work around this issue by prefixing the name of the software you want to run as follows:
</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: </pre><p>E.g., if you want to use <code>gnucash</code>, you'd use</p><pre>env DYLD_FALLBACK_LIBRARY_PATH=: gnucash</pre><p>This method works for applications that are launched via the Application Menu in Apple's X11 as well as a terminal.</p><p>You may find it preferable to set this globally (e.g. in your startup script, and/or in your <code>.xinitrc</code>, which you may need to do to run GNOME).  Put</p><pre>export DYLD_FALLBACK_LIBRARY_PATH=:</pre><p>in your <code>.xinitrc</code> (regardless of your login shell) or your <code>.profile</code> (or other startup script) for <b>bash</b> users and:</p><pre>setenv DYLD_FALLBACK_LIBRARY_PATH :</pre><p>is the corresponding command to use in e.g. your <code>.cshrc</code> file for <b>tcsh</b> users.</p><p>Note:  this will automatically be done if you install a recent enough <code>base-files</code>.
	</p></div>
    </a>
    <a name="yelp">
      <div class="question"><p><b><?php echo FINK_Q ; ?>9.11: I can't get the help to work for any GNOME application.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> You need to install the <code>yelp</code> package.  This package was not placed within the GNOME bundle because it uses cryptography, and it was decided not to place all of GNOME in the crypto tree just to use the help system.</p></div>
    </a>
    
    
<?php include_once "../footer.inc"; ?>


