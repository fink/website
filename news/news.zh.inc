<a name="2007-12-10%20Leopard,%20X11,%20and%20Fink"><span class="news-date">2007-12-10: </span><span class="news-headline">Leopard, X11, and Fink</span></a><?php gray_line(); ?>
    <p>Users who want to update their Leopard X11 installation should make sure to download a <a href="http://xquartz.macosforge.org/downloads/Xquartz-1.3.0-apple-fink.bz2">Fink-friendly update to Xquartz</a>.  Users who have already applied the X11-2.1.0.1.pkg from macosxforge.org <b>must</b> download the Fink-compatible Xquartz for Fink to work properly.  (Note: there is an X11-2.1.1.pkg release pending which will remove the need to patch your Xquartz.  If you install X11 2.1.1 or later, <b>do not</b> apply the Xquartz patch.)</p>
    <p><b>Update, 2007-12-11:</b> The X11 2.1.1 release <a href="http://trac.macosforge.org/projects/xquartz/wiki/Releases">is now available on the Xquartz release page</a>.  Users who have already applied the X11-2.1.0.1.pkg and/or the patched Xquartz-1.3.0-apple-fink file from macosxforge.org should <b>upgrade to 2.1.1 or greater</b> for Fink to work properly.  This release supercedes all previous releases, including the fink-specific Xquartz.</p>
  <a name="2007-11-18%20PDB%20Website%20Down"><span class="news-date">2007-11-18: </span><span class="news-headline">PDB Website Down</span></a><?php gray_line(); ?>
    <p>The Package Database web interface is presently down pending hardware and software upgrades. We are working on fixing the server as soon as possible. Sorry for any inconvenience.</p>
<p><b>Update, 2007-12-10:  </b>The Package Database is up and running again, with enhanced features.</p>
  <a name="2007-10-26%20%E5%88%9D%E6%AD%A5%E6%94%AF%E6%8C%81%20Leopard"><span class="news-date">2007-10-26: </span><span class="news-headline">初步支持 Leopard</span></a><?php gray_line(); ?>
    <p>Fink 项目宣布初步支持 Mac OS X Leopard (10.5)。</p>
<p>在二进制版本发布之前。
10.5 的用户需要通过 bootstrap 的方式来安装 Fink。
从这里<a href="http://downloads.sourceforge.net/fink/fink-0.27.7.tar.gz">下载 fink-0.27.7</a>。</p>
<p>10.4-&gt;10.5 的升级可以通过执行 <code>fink selfupdate</code> 来获取 fink-0.27.7。如果您
是在 10.5 上操作，请确保您已安装 Xcode 3.0。在 10.5 安装之后，执行 <code>fink
reinstall fink</code>。</p>
<p>直接从 10.3-&gt;10.5 的升级方法暂不支持。如果您等不及了，那
么您需要下载 <code>fink-0.27.7</code> 包并按前面叙述的方法来 bootstrap。</p>
<p><b>更新，2007-10-29:</b> 升级的用户请注意：使用 fink cleanup 来移除某些 .deb 文
件时，同时会移除所有的 .deb 文件。这个问题将会在下次更新中修正。</p>

