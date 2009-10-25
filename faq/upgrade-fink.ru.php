<?
$title = "Ч.З.В. - Обновление Fink";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2009/10/25 05:21:38';
$metatags = '<link rel="contents" href="index.php?phpLang=ru" title="Ч.З.В. Contents"><link rel="next" href="usage-fink.php?phpLang=ru" title="Инсталляция, использование и поддержка Fink"><link rel="prev" href="mirrors.php?phpLang=ru" title="Зеркала Fink">';


include_once "header.ru.inc";
?>
<h1>Ч.З.В. - 4. Обновление Fink (проблемы, связанные с версиями)</h1>
        
        
    <a name="leopard-bindist1">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.1: Fink doesn't see new packages even after I've run an rsync or cvs selfupdate.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is a current issue for people on OS 10.5 using the binary installer. Check your version:</p><pre>fink --version</pre><p>If you currently have <code>fink-0.27.13-41</code>, which is the version that comes
	with the installer, or <code>fink-0.27.16-41</code>, then there are a couple of options.</p><ul>
	  <li>
	    <b>rsync (preferred):</b>  Run the sequence below
	    <pre>fink selfupdate
fink selfupdate-rsync
fink index -f
fink selfupdate</pre>
	  </li>
	  <li>
	    <b>cvs (alternate):</b>  Run
	    <pre>fink selfupdate-cvs
fink index -f
fink selfupdate</pre>
	  </li>
	</ul><p>Either will bring you the newest <code>fink</code> version.</p></div>
    </a>
    
    <a name="leopard-bindist2">
      <div class="question"><p><b><? echo FINK_Q ; ?>4.2: When I try to install stuff I get 'Can't resolve dependency "fink (&gt;= 0.28.0)"'</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Apply the fix from <a href="#leopard-bindist1">the prior entry.</a></p></div>
    </a>
        <a name="fink-0220">
            <div class="question"><p><b><? echo FINK_Q ; ?>4.3: Я не получал обновлений пакетов от Fink в течение некоторого времени.</b></p></div>
            <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Проверьте вашу версию:</p><pre>fink --version</pre><p>Есть известная проблема с <code>fink-0.22.0</code>,
                    где автообновление rsync перестало работать. Для решения этой проблемы
                    перейдите на автообновление CVS через</p><pre>fink selfupdate-cvs </pre><p>Вы получите более позднюю версию <code>fink</code>. После этого
                    рекомендуем перейти обратно на автообновление rsync:</p><pre>fink selfupdate-rsync</pre></div>
        </a>
    <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=ru">5. Инсталляция, использование и поддержка Fink</a></p>
<? include_once "../footer.inc"; ?>


