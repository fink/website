<a name="2020-03-28%20fink-0.45.1%20released"><span class="news-date">2020-03-28: </span><span class="news-headline">fink-0.45.1 released</span></a><?php gray_line(); ?>
  <p>The Fink Project has released fink-0.45.1. This release provides support for all macOS releases up to and including 10.15.4, as well as support for users running the zsh shell. Run <code>fink selfupdate</code> to install the latest version. This release does not need any special preparation apart from those listed below if upgrading to macOS 10.15 from an earlier macOS release.</p>
 <a name="2019-10-27%20Further%2010.15%20(Catalina)%20and%20Xcode11%20upgrade%20details"><span class="news-date">2019-10-27: </span><span class="news-headline">Further 10.15 (Catalina) and Xcode11 upgrade details</span></a><?php gray_line(); ?>
  <p>If upgrading to macOS 10.15 (Catalina) from an earlier macOS release, your existing Fink install will cease to work if installed outside <code>/opt</code> (such as to the previous default <code>/sw</code>) and must be reinstalled from scratch using Fink release 0.45.0 or later.</p>
  <p>The old Fink install is archived into <code>/Users/Shared/Relocated Items</code>. It's possible to manually recover downloaded source archives and configuration files from there to use in a new Fink install. However, it's not possible to reuse built .deb packages because they hardcode the original path that contained Fink.</p>
  <p>Upgrade and installation hints if existing Fink install is outside <code>/opt</code>:</p>
  <ul>
    <li>If doing a fresh Fink install on any macOS version, install Fink into <code>/opt/sw</code>.</li>
    <li>If you haven't yet updated to macOS 10.15, run this command to capture the list of your currently installed packages: <code>for i in `/bin/ls -1 /sw/var/lib/dpkg/info/*.list`; do basename -s .list $i &gt;&gt; ~/my_fink_packages.txt; done</code>.</li>
    <li>If you have already updated to macOS 10.15 but had Fink installed somewhere outside <code>/opt</code> before your system upgrade, use the above command (with modified path to the "Relocated Items" location as necessary) to capture the packages you previously had installed on your older macOS release. For example: <code>for i in `/bin/ls -1 "/Users/Shared/Relocated Items/sw/var/lib/dpkg/info/"*.list`; do basename -s .list $i &gt;&gt; ~/my_fink_packages.txt; done</code></li>
    <li>Once you have captured your list of previous packages, upgraded to macOS 10.15, and installed Fink into <code>/opt</code>, run the following command to batch build and reinstall your previous Fink packages: <code>cat ~/my_fink_packages.txt | xargs fink reinstall</code>. Note that some packages do not exist on macOS 10.15, so you might need to hand edit the file <code>my_fink_packages.txt</code> to remove the missing packages before trying to reinstall.</li>
  </ul>
 <a name="2019-10-02%2010.15%20(Catalina)%20and%20Xcode11%20information"><span class="news-date">2019-10-02: </span><span class="news-headline">10.15 (Catalina) and Xcode11 information</span></a><?php gray_line(); ?>
  <p>Fink 0.45.0 and up support the upcoming 10.15 release, but there are some important things to note:</p>
  <ul>
    <li>Apple locked down the <code>/ (root)</code> directory where Fink normally installs (in <code>/sw</code> by default), so existing Fink installs may become read-only upon updating to 10.15.</li>
    <li>Xcode11 introduces some known breakages (with no known fixes at this time) to important packages like gcc, so not everything will build yet.</li>
  </ul>
  <p>Once macOS 10.15 is officially released, we suggest waiting to upgrade until we know how the system will treat existing installs and we can determine the best upgrade path.</p>
  <p>For anyone installing Fink for the first time (on 10.15beta or an earlier macOS version), we now recommend using <code>/opt/sw</code> as the install location, since that's known to work. The next Fink release after macOS 10.15 is out will use <code>/opt/sw</code> as the default install location.</p>
  <p>Xcode11 is known to currently break building the gccX and several other important packages. If possible (especially 10.14 users), hold off on upgrading to Xcode11 unless you need something specific from it. If you do upgrade to Xcode11, make sure that the Command Line Tools are also upgraded to version 11 for your macOS release.</p>
 
