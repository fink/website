<?
$title = "常见疑问（F.A.Q.） - 升级 Fink";
$cvs_author = 'Author: babayoshihiko';
$cvs_date = 'Date: 2009/10/25 05:21:38';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="usage-fink.php?phpLang=zh" title="安装，使用和维护 Fink"><link rel="prev" href="mirrors.php?phpLang=zh" title="Fink 镜像">';


include_once "header.zh.inc";
?>
<h1>常见疑问（F.A.Q.） - 4. 升级 Fink （解决特定版本的问题）</h1>
    
    
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
      <div class="question"><p><b><? echo FINK_Q ; ?>4.3: I haven't had any package updates from Fink in a while.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Check your version:</p><pre>fink --version</pre><p>There is a known problem with <code>fink-0.22.0</code> wherein rsync selfupdating stopped working.  To fix this, switch to CVS selfupdating via</p><pre>fink selfupdate-cvs	</pre><p>This will bring you a newer <code>fink</code> version.  After you do this we recommend switching back to rsync selfupdating:</p><pre>fink selfupdate-rsync</pre></div>
    </a>
    
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="usage-fink.php?phpLang=zh">5. 安装，使用和维护 Fink</a></p>
<? include_once "../footer.inc"; ?>


