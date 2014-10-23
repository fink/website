<?php
$title = "Ч.З.В. - Зеркала";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:14';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="next" href="upgrade-fink.php?phpLang=ru" title="Обновление Fink (проблемы, связанные с версиями)"><link rel="prev" href="relations.php?phpLang=ru" title="Связь с другими проектами">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 3. Зеркала Fink</h1>
        
        
        <a name="when-use">
            <div class="question"><p><b><?php echo FINK_Q ; ?>3.1: Что такое зеркала Fink?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Зеркала Fink являются серверами rsync, отражающими текущие и постоянные файлы
                    описания, используемые Fink для построения пакетов на основе
                    исходного кода.</p></div>
        </a>
        <a name="why">
            <div class="question"><p><b><?php echo FINK_Q ; ?>3.2: Почему я должен использовать зеркала rsync?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Rsync - очень быстрый протокол. Он обновит файлы описания
                    быстрее, чем старый метод обновления CVS. К тому же
                    обновление CVS всегда выполняется на основе sourceforge.net, тогда как обновление rsync
                    можно сделать на основе близкого к вам зеркала.</p></div>
        </a>
        <a name="where">
            <div class="question"><p><b><?php echo FINK_Q ; ?>3.3: Где можно найти более подробную информацию о зеркалах Fink?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Все зеркала Fink объединены в пределах домена finkmirrors.net.
                    Более подробная информация предоставляется на веб-сайте http://finkmirrors.net/.</p></div>
        </a>
        <a name="when-not">
            <div class="question"><p><b><?php echo FINK_Q ; ?>3.4: Не устанавливается соединение с сервером rsync. Что делать?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Иногда очень строгие брандмауэры не позволяют подсоединяться
                    к услугам rsync. Если это ваш случай, просто продолжайте использовать
                    метод CVS.</p></div>
        </a>
        <a name="otherinfogone">
            <div class="question"><p><b><?php echo FINK_Q ; ?>3.5: После перехода на метод rsync исчезли все информационные файлы на
                    неиспользованных деревьях</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Это нормально. Метод обновления rsync будет обновлять только ваше активное дерево,
                    н-р 10.3, а также удалит подкаталоги CVS.</p></div>
        </a>
        <a name="howswitch">
            <div class="question"><p><b><?php echo FINK_Q ; ?>3.6: Как можно переключаться между методами?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> При помощи fink selfupdate-rsync или fink selfupdate-cvs можно перейти
                    к rsync или CVS соответственно.</p></div>
        </a>
        <a name="Master">
            <div class="question"><p><b><?php echo FINK_Q ; ?>3.7: Что такое зеркало Distfiles?</b></p></div>
            <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Иногда сложно извлечь определенную версию исходных кодов
                    из Интернета. Зеркала Distfile удерживают и отражают
                    пакеты исходных кодов, которые необходимы fink для построения своих пакетов исходных кодов.</p></div>
        </a>
    <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="upgrade-fink.php?phpLang=ru">4. Обновление Fink (проблемы, связанные с версиями)</a></p>
<?php include_once "../footer.inc"; ?>


