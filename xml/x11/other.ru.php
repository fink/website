<?
$title = "Использование X11 - Другие возможности";
$cvs_author = 'Author: horsager';
$cvs_date = 'Date: 2005/02/17 05:00:35';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Использование X11 Contents"><link rel="next" href="trouble.php?phpLang=ru" title="Устранение проблем, возникших в связи с XFree86"><link rel="prev" href="xtools.php?phpLang=ru" title="Xtools">';


include_once "header.ru.inc";
?>
<h1>Использование X11 - 6. Другие возможности X11</h1>
        
        
        <h2><a name="vnc">6.1 VNC</a></h2>
            
            <p> VNC - система графики с сетевой архитектурой, аналогичной
                X11 по дизайну. При этом она работает на более низком уровне, что
                облегчает ее реализацию. С сервером Xvnc и клиентом отображения Mac OS X
                можно использовать приложения X11 в Mac
                OS X. Страница Джеффа Уайтейкера <a href="http://www.cdc.noaa.gov/~jsw/macosx_xvnc/">Xvnc
                </a> рассказывает об этом более подробно.</p>
        
        <h2><a name="wiredx">6.2 WiredX</a></h2>
            
            <p>
                <a href="http://www.jcraft.com/wiredx/">WiredX</a> - сервер
                X11, написанный на языке Java. Он также поддерживает бескорневой режим. Его веб-сайт предоставляет пакет
                Installer.app.</p>
        
        <h2><a name="exodus">6.3 eXodus</a></h2>
            
            <p> Согласно своему веб-сайту, <a href="http://www.powerlan-usa.com/exodus/">eXodus 8</a> от
                Powerlan USA работает в Mac OS X. Неизвестно, какую
                кодовую базу он использует, предоставляет ли поддержку локальным клиентам и если да, то каким образом.
                По этой причине Fink не обеспечивает специальную поддержку, предназначенную для eXodus.
                Если у вас есть более подробная информация, просим сообщить нам.</p>
        
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="trouble.php?phpLang=ru">7. Устранение проблем, возникших в связи с XFree86</a></p>
<? include_once "../../footer.inc"; ?>


