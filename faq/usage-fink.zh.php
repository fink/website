<?php
$title = "常见疑问（F.A.Q.） - Fink 的使用";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="常见疑问（F.A.Q.） Contents"><link rel="next" href="comp-general.php?phpLang=zh" title="一般性编译问题"><link rel="prev" href="upgrade-fink.php?phpLang=zh" title="升级 Fink （解决特定版本的问题）">';


include_once "header.zh.inc";
?>
<h1>常见疑问（F.A.Q.） - 5. 安装，使用和维护 Fink</h1>
    
    
    <a name="what-packages">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.1: 我怎么知道 Fink 支持那些软件包？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
从 Fink 0.2.3 开始，增加了 <code>list</code> 命令。
它产生可用 Fink 安装的软件包清单。
例如：
</p><pre>fink list</pre><p>
如果你使用二进制安装包方式，<code>dselect</code> 可以提供给你一个很好的可用软件包清单。
注意，如果你需要从 dselect 中选择和安装软件包，你需要以 root 权限运行它。
</p><p>
另外，在网站上也有一个<a href="http://pdb.finkproject.org/pdb/">软件包数据库</a>。
</p></div>
    </a>
    <a name="proxy">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.2: 我在防火墙后面，我怎么配置 Fink 使用 HTTP 代理？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> <code>fink</code> 命令可以设定代理服务器，并把它传递给 <code>wget</code>/<code>curl</code>。
如果在首次安装的时候没有向你询问代理服务器设置，你可以运行 <code>fink configure</code> 来进行设置。
你可以随时运行这个命令来重新配置 <code>fink</code> 命令。
如果你按照安装指南进行安装，并使用 <code>/sw/bin/init.csh</code>（或 <code>/sw/bin/init.sh</code>），那么 <code>apt-get</code> 和 <code>dselect</code> 也可以使用这些设置。请确认你已经把协议名放在代理服务器域名之前，例如：</p><pre>ftp://proxy.yoursite.somewhere</pre><p>如果你仍然碰到问题，那么打开系统预置，选择网络设置面板，确认 "使用被动 FTP 模式 (PASV)" 选项已被选中。</p></div>
    </a>
    <a name="firewalled-cvs">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.3: 我在防火墙后面，我怎么用 CVS 方式升级已安装的软件包？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> <b>cvs-proxy</b> 这个软件包可以通过 HTTP 代理穿透防火墙。</p><ul>
          <li>
            <p>首先下载 <a href="http://fink.cvs.sourceforge.net/fink/dists/10.2/unstable/main/finkinfo/devel/">cvs-proxy</a> 文件（一个 .info 文件和一个 .patch 文件）并把它放到你的本地代码树中（即 /sw/fink/dists/local/main/finkinfo/）。</p>
          </li>
          <li>
            <p>使用下面命令安装 <b>cvs-proxy</b> 软件包：</p>
            <p>
              <code>fink --use-binary-dist install <b>cvs-proxy</b>
              </code>
            </p>
          </li>
          <li>
            <p>Switch to the CVS update method with the command:：</p>
            <p>
              <code>fink selfupdate-cvs</code>
            </p>
            <p>
              <code>fink update-all</code>
            </p>
          </li>
        </ul><p>如果 fink 没有被配置为使用你的代理，用下面的方法更改配置：</p><p>
          <code>fink configure</code>.</p></div>
    </a>
    <a name="moving">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.4: 我可以在安装后把 fink 移动到其它位置吗？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
不行。
当然，你可以用 mv 命令或 Finder 来移动它们，但如果你这样做的话， 99%　的程序将不能工作。
这是引文基本上所有 Unix 软件都是使用固定编码在程序中的路径名来寻找数据文件，库或其它东西的》</p></div>
    </a>
    <a name="moving-symlink">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.5: 如果我安装 Fink 以后把它移动到其它地方，但在原来的地方提供一个符号连接，可以吗？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
也许。
通常的猜测这应该可行，但也许会有些陷阱在某些地方。
</p></div>
    </a>
    <a name="removing">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.6: 我怎么彻底反安装 Fink？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
Fink 的所有文件几乎都安装在 /sw （或你选择安装的地方）。因此，如果你想删除 Fink，输入下面的命令：
</p><pre>sudo rm -rf /sw</pre><p>
这个规则的唯一例外是 XFree86。如果你通过 Fink 安装（也就是说，你安装了 <code>xfree86</code>， 或 
<code>xfree86-rootless</code> 或 <code>xorg</code> 软件包，
而不是使用 <code>system-xfree86</code>）并希望删除它，你需要再输入：
</p><pre>sudo rm -rf /usr/X11R6 /etc/X11 /Applications/XDarwin.app</pre><p>如果你不是打算重安装 Fink 的话，根据你的配置方式你还要使用一个纯文本编辑器，从你的 <code>.cshrc</code> 文件中删除 "<code>source 
/sw/bin/init.csh</code>" 这一行；或从 <code>.bashrc</code> 文件中删除 "<code>source /sw/bin/init.sh</code>" 这一行。</p></div>
    </a>
    <a name="bindist">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.7: 网站上的软件包数据库列有 xxx 软件包，但 apt-get 和 dselect 则没有任何显示。哪个有问题？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
都正确。
<a href="http://pdb.finkproject.org/pdb/">软件包数据</a>
知道每一个软件包，包括那些仍处于不稳定阶段的。
<code>dselect</code> 和 <code>apt-get</code> 工具则只知道那些可用的经过预编译的二进制软件包。
许多软件包因为各种原因所以没有提供预编译的二进制版本。
软件包必须处于开发末期的 "稳定" 状态，而且必须通过额外的授权和专利限制审查以后才会考虑发布二进制安装版本。
</p><p>
如果你希望安装不存在于
<code>dselect</code> / <code>apt-get</code> 中的软件包，你需要使用 <code>fink install <b>软件包名</b>
          </code> 来从源代码安装。
在你尝试之前，确认你已经安装了开发工具（如果在你的 <code>/Applications</code> 文件夹中没有安装开发工具，你可以从 <a href="http://connect.apple.com/">Apple Developer Connection</a> 经过免费注册以后下载）
请同时查看下面关于未稳定版本的问题。
</p></div>
    </a>
    <a name="unstable">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.8: 我想安装一个未稳定版本，但 fink 说 'no package found'。我怎么才能安装它？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> First make sure you understand what 'unstable' means. Packages in
        the unstable tree are not in stable for any number of reasons.  It
        could be because there are known issues, validation errors, or just
        not enough people giving feedback that the package works for them.
        For that reason, Fink doesn't search the unstable tree by
        default.</p><p>If you do enable unstable, please remember to e-mail the
        maintainer if something works (or even if it doesn't). Feedback from
        users like you is what we use to determine if something is ready for
        stable! To find out the maintainer of a package, run <code>fink info
        <b>packagename</b></code>.</p><p>For <code>fink-0.26</code> and later:  If you run
	<code>fink configure</code> one of the questions will ask whether you
	want to turn the unstable trees on.  </p><p>To configure Fink to use unstable
	when you have an earlier version of the <code>fink</code> tool than
	<b>0.26</b>, edit
        <code>/sw/etc/fink.conf</code>, and add <code>unstable/main</code>
        and <code>unstable/crypto</code> to the <code>Trees:</code> line.</p><p>If you use Fink Commander, then there is a Preference to use unstable
	packages.</p><p>None of these options actually download the unstable tree's package
	descriptions.You'll need to turn on <code>rsync</code> or
	<code>cvs</code> updating to do this, which is not set up by default on a new
	Fink installation.  The following command sequence will set you up on
	a new Fink installation:</p><pre>fink selfupdate</pre><p>followed by</p><pre>fink selfupdate-rsync</pre><p>or</p><pre>fink selfupdate-cvs</pre><p>and then</p><pre>fink index -f
fink scanpackages</pre><p><b>Note:</b>  There are Fink Commander analogs for everything except
	<code>fink index -f</code>.  You will have to use the command line for that.</p><p>If you're already set up with <code>rsync</code> or <code>cvs</code>
	updating, then the following
	command sequence (or the Fink Commander analogs) will suffice:</p><pre>
fink selfupdate
fink index
fink scanpackages
	</pre><p>If you're not sure what your update method is, check
	<code>fink --version</code> in at a command line
	and see if that mentions <code>cvs</code> or <code>rsync</code>.</p><p>If you don't want to install any more from unstable than
        your specific package(s) and its (their) dependencies, (and any base packages
	that got updated) don't use the
        <code>update-all</code> command until you turn the unstable tree
        back off.</p></div>
    </a>
    
    <a name="unstable-onepackage">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.9: Do I <b>really</b> need to enable all of unstable just to install
        one unstable package that I want?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> No, but it is highly recommended you do.  Mixing and matching can
        cause unforseen issues that make it difficult to debug problems when
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
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.10: 每次运行 sudo 都要输入密码，这很麻烦。有办法解决吗？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 你可以配制 sudo 不需要询问你密码。用 root 权限运行 <code>visudo</code> 命令，并添加一行：</p><pre>username ALL =(ALL) NOPASSWD: ALL</pre><p>把 <code>username</code> 替换为实际的用户名。这一行使得你可以运行 sudo 命令而不需要输入密码。</p></div>
    </a>
    <a name="exec-init-csh">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.11: 当我尝试运行 init.csh 或 init.sh 时，我碰到一个 "Permission denied" 错误。我做错了什么？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> init.csh 和 init.sh 并不能象普通命令一样运行。这些文件会设置象 PATH 和 MANPATH 这样的环境变量到你的 shell 程序中。要对 shell 一直起作用的话，对于 csh/tcsh，它需要由一个 <code>source</code> 命令来运行；或对于 bash/zsh，使用"<code> . </code>"命令，象这样：</p><p>对 csh/tcsh：</p><pre>source /sw/bin/init.csh</pre><p>或对 bash/zsh：</p><pre>. /sw/bin/init.sh</pre></div>
    </a>
    <a name="dselect-access">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.12: 救命！我选择了 dselect 的
"[A]ccess" 菜单，现在我不能下载软件包了！</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 
你也许把 apt 指向了一个 Debian 的镜像服务器，当然那里没有任何 Fink 文件。
你可以手工或通过 dselect 来修复。
要手工修复，使用 root 权限用纯文本编辑器编辑
<code>/sw/etc/apt/sources.list</code> 文件。删除包含 debian.org 的行，并换成：
</p><pre>deb http://us.dl.sourceforge.net/fink/direct_download release main crypto
deb http://us.dl.sourceforge.net/fink/direct_download current main crypto</pre><p>
（或如果你居住在欧洲，你可以使用 <code>eu.dl.sourceforge.net</code>
来代替 <code>us.dl.sourceforge.net</code>）。
</p><p>
要用 dselect 来修复它，再次运行 "[A]ccess"，选择 "apt"
方法并输入下面的信息：
</p><p>
URL: http://us.dl.sourceforge.net/fink/direct_download -
Distribution: release -
Components: main crypto
</p><p>
然后，如果你希望添加其它来源，你可以重复上面的过程，并用
"current" 来代替 "release"。
</p><p>
一个 apt 软件包修正版（提供了配制脚本作为 dselect 的插件）可以通过 CVS 获得。
</p></div>
    </a>
    <a name="cvs-busy">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.13: 当我试图运行 <q>fink selfupdate</q> 或 "fink selfupdate-cvs" 时，我碰到了 "<code>Updating using CVS failed. Check the error messages above.</code>"这个错误信息。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 如果错误信息是：</p><pre>Can't exec "cvs": No such file or directory at 
/sw/lib/perl5/Fink/Services.pm line 216, &lt;STDIN&gt; line 3.
### execution of cvs failed, exit code -1</pre><p>那么你需要安装开发工具包。</p><p>如果最后一行是：</p><pre>### execution of su failed, exit code 1</pre><p>你需要往前查看以前输出的错误信息。如果你看到一个信息说你的连接被拒绝：</p><pre>(Logging in to anonymous@fink.cvs.sourceforge.net)
CVS password:
cvs [login aborted]: connect to fink.cvs.sourceforge.net:2401 failed:
Connection refused
### execution of su failed, exit code 1
Failed: Logging into the CVS server for anonymous read-only access failed.</pre><p>或者象下面的信息：</p><pre>cvs [update aborted]: recv() from server fink.cvs.sourceforge.net: 
Connection reset by peer
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.</pre><p>或者：</p><pre>cvs [update aborted]: End of file received from server</pre><p>或者：</p><pre>cvs [update aborted]: received broken pipe signal</pre><p>那么很象是 cvs 服务器现在过忙，你应该晚些在尝试更新。</p><p>另一个可能是你的 CVS 目录的权限设置有问题，这时会有 "Permission denied" 信息：</p><pre>cvs update: in directory 10.2/stable/main:
cvs update: cannot open CVS/Entries for reading: No such file or directory
cvs server: Updating 10.2/stable/main
cvs update: cannot write 10.2/stable/main/.cvsignore: Permission denied
cvs [update aborted]: cannot make directory 10.2/stable/main/finkinfo: No such file or directory
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.
</pre><p>这时你需要重置你的 CVS 目录。使用命令：</p><pre>sudo find /sw/fink -type d -name 'CVS' -exec rm -rf {} \;
fink selfupdate-cvs</pre><p>如果你看不到上面这些错误信息，那么很可能是你自己修改过 /sw/fink/dists 树里面的文件，而现在维护者又改动了它。查看以前的 selfupdate-cvs 输出，寻找以 "C" 开始的行，象这样：
</p><pre>C 10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
...
(other info and patch files)
...
### execution of su failed, exit code 1
Failed: Updating using CVS failed. Check the error messages above.</pre><p>"C" 指 CVS 在更新最新版本的时候出现冲突。</p><p>解决办法是删除在 selfupdate-cvs 命令的输出中 "C" 开头的错误信息所涉及的文件，然后重新试一次。</p><pre>sudo rm /sw/fink/10.2/unstable/main/finkinfo/libs/db31-3.1.17-6.info
fink selfupdate-cvs</pre><p>If you get errors that mention <b>cvs.sourceforge.net</b>:</p><pre>
cvs [update aborted]: connect to cvs.sourceforge.net(66.35.250.207):
2401 failed: Operation timed out
</pre><p>this is because of a restructuring of the CVS servers at sourceforge.net in 2006.  Fink files are now at <b>fink.cvs.sourceforge.net</b>.</p><p>Check your Distribution version, e.g. via</p><pre>fink --version</pre><p>If that shows <code>10.4-transitional</code>, then you need to update to the regular 10.4 distribution.  An <a href="http://prdownloads.sourceforge.net/fink/scripts-10.4-update-0.4.tar.gz?download">update script</a> has been created to assist with that.</p></div>
    </a>
    <a name="kernel-panics">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.14: 当我使用 Fink 的时候，碰到整个机器没有反应/核心恐慌/死机。救命！</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 200年秋、
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink 用户邮件列表</a> 中有不少关于这个问题的反映（包括核心恐慌和不断旋转的彩轮），这通常在安装有防病毒软件的机器上编译软件包时发生。也许在使用 Fink 之前你应该关闭所有防病毒软件。
</p></div>
    </a>
    <a name="not-found">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.15: 我试图安装一个软件包，但 Fink 不能下载它。下载的网站显示一个比 Fink 里面更新的版本号。我该怎么办？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 当新版本发布的时候，源程序包会被从上游网站移走。</p><p>首先你应该做的是运行 <code>fink selfupdate</code>。
也许软件包的维护者已经修正了这一点，你获得一个包含最新版本或更新过下载网址的软件包描述。</p><p>如果这个办法不奏效，多数的源程序包可以在 <a href="http://distfiles.master.finkmirrors.net/">http://distfiles.master.finkmirrors.net/</a> 下载到（感谢 Rob Braun），你可以运行 <code>fink configure</code> 来选择搜索 "Master" 源程序镜像，这样 Fink 就会自动在那里寻找。</p><p>如果这还不奏效，请通知程序包维护者（可以通过 "<code>fink describe <b>软件包名</b>
          </code>" 获得）) 下载链接已经失效；并不是所有维护者总是阅读邮件列表的消息的。</p><p>要获得一个可用的源程序包，首先尝试在原来的站点的其它目录寻找 Fink 所要的相同版本文件（例如，在一个名为 "old" 的目录里面）。记住，虽然一些站点可能已经扔掉了旧版本的软件包。但是如果官方站点上找不到的话，你可以尝试一个互联网上的搜索——仍然会有一些非官方的站点保存有你所需要的压缩档。另外一个寻找的地方是 <a href="http://us.dl.sourceforge.net/fink/direct_download/source/">http://us.dl.sourceforge.net/fink/direct_download/source/</a>，这是 Fink 存放它们已经以二进制发布过的软件包的源文件的地方。如果这些都不成功，你可以考虑在
<a href="http://sourceforge.net/mailarchive/forum.php?forum=fink-users">fink 用户邮件列表</a> 里面发信询问是否有人会有旧的源代码压缩档可以给你。</p><p>一旦你找到合适的源程序压缩档，手工下载它，然后把它移到 Fink 的源程序文件目录里面（对默认安装，可以使用 "<code>sudo mv <b>package-source.tar.gz</b> /sw/src/</code>"命令）。然后和平常一样用 '<code>fink install <b>软件包名</b>
          </code>' 安装。</p><p>如果你没有办法找到源程序文件，那么你只能等待维护者来处理这个问题。它们可能会发布一个到旧源文件的链接，或升级 .info 和 .patch 文件来使用新的版本。
</p></div>
    </a>
    <a name="fink-not-found">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.16: 当我运行 Fink 或我用 Fink 安装的东西的时候，我碰到一个 "command not found" 错误。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> If this always happens, then you may have inadvertently
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
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.17: 我希望在 Finder 里面隐藏 /sw 而避免用户破坏 Fink 的设置。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 如果你安装了开发工具包，你可以做到这一点。你可以运行下面的命令：</p><pre>sudo /Developer/Tools/SetFile -a V /sw</pre><p>这会使得 /sw 象其它标准系统文件夹一样（比如 /usr），在 Finder 中不可见。如果你没有开发工具包，也有其它第三方程序可以让你修改文件属性-你需要把 /sw 设为隐藏。</p></div>
    </a>
    <a name="install-info-bad">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.18: 我不能安装任何软件，因为我碰到下面的错误信息："install-info: unrecognized option `--infodir=/sw/share/info'"。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 这通常是由于你的 PATH 环境变量的原因。在终端窗口输入：</p><pre>printenv PATH</pre><p>如果输出里面没有 <code>/sw/sbin</code>，那么你需要按照用户指南中的<a href="/doc/users-guide/install.php#setup">方法</a>来设置你的环境变量。如果有 <code>/sw/sbin</code>，但有其它目录在它前面（比如 <code>/usr/local/bin</code>），那么你要么需要重新安排你 PATH 里面的顺序，使得 <code>/sw/sbin</code> 排在前面。或者如果你的确需要把其它目录放在 <code>/sw/sbin</code> 之前，而且这个放在前面的目录包括另一个 install-info 目录，这时也许你需要在使用 Fink 的时候临时重命名这个 <code>install-info</code> 子目录。</p></div>
    </a>
    <a name="bad-list-file">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.19: 我不能安装或删除任何东西，因为一个 "files list file" 问题。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 通常这些错误的形式是：</p><pre>files list file for package <b>软件包名</b> contains empty filename</pre><p>或</p><pre>files list file for package <b>软件包名</b> is missing final newline</pre><p>这可以通过一点小小的工作而修复。如果你在系统里面有发生问题的这个软件包的 .deb 文件，用下面命令检查它的完整性：</p><pre>dpkg --contents <b>deb文件的完整路径</b>
        </pre><p>例如</p><pre>dpkg --contents /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb</pre><p>如果你获得了一列目录和文件，那么你的 .deb 是正确的。如果输出是目录和文件以外的其它东西，或者你没有 .deb 文件，你仍然可以继续操作，因为这个错误不会影响构建。</p><p>如果你是从二进制包进行安装或你肯定知道二进制包里面的版本和你已经安装的版本一致（比如，通过检查<a href="http://pdb.finkproject.org/pdb/index.php">软件包数据库</a>），你可以用下面的办法获取一个 .deb 文件： <code>sudo apt-get install --reinstall --download-only <b>软件包名</b>
          </code>。否则你也可以用下面的办法自己从源代码重新构建一个：<code>fink rebuild <b>软件包名</b>
          </code>，但它暂时还不能安装。</p><p>一旦你有了一个正常的 .deb 文件，你可以重新安装文件。首先用下面的命令成为 root 用户：<code>sudo -s</code>（有需要的话，输入你的管理员密码），然后使用下面的命令（我们把它分行以方便阅读，但实际使用的时候，你应该在一行里面输入）：</p><pre>dpkg -c <b>deb文件的完整路径</b>
  | awk '{if ($6 == "./"){ print "/."; } else if (substr($6, length($6), 1) == "/")
    {print substr($6, 2, length($6) - 2); } else { print substr($6, 2, length($6) - 1);}}' 
  &gt; /sw/var/lib/dpkg/info/<b>软件包名</b>.list</pre><p>例如：</p><pre>dpkg -c /sw/fink/debs/libgnomeui2-dev_2.0.6-2_darwin-powerpc.deb
  | awk '{if ($6 == "./") { print "/."; } else if (substr($6, length($6), 1) == "/")
   {print substr($6, 2, length($6) - 2); } else { print substr($6, 2, length($6) - 1);}}'
  &gt; /sw/var/lib/dpkg/info/libgnomeui2-dev.list</pre><p>这里做的事情是抽取 .deb 文件的内容，删掉除文件名以外的所有信息，并把文件名信息写回到 .list 文件中。</p></div>
    </a>
    <a name="dselect-garbage">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.20: 当我在 <code>dselect</code> 中选择软件包时，屏幕显示一堆乱七八糟的东西。怎么办？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 在 <code>dselect</code> 和 终端程序（<code>Terminal.app</code>）中间存在一些问题。暂时解决方法是在运行 <code>dselect</code> 前输入下面的命令。</p><p>对 tcsh 用户：</p><pre>setenv TERM xterm-color</pre><p>对 bash 用户：</p><pre>export TERM=xterm-color</pre><p>你可以把它放到你的启动文件（比如 <code>.cshrc</code> 或 <code>.profile</code>），这样它就总是会自动运行。</p></div>
    </a>

    <a name="cant-upgrade">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.21: 我看不到要升级的 Fink 版本。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 在这种情况下，参考<a href="/download/fix-upgrade.php">特别指引</a>。</p><ul>
          <li><b>10.3.x:</b> (0.7.1 distribution)
		<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.7.1-updates/main/binary-darwin-powerpc/base/fink_0.22.4-1_darwin-powerpc.deb
sudo dpkg -i fink_0.22.4-1_darwin-powerpc.deb
rm fink_0.22.4-1_darwin-powerpc.deb
fink selfupdate</pre></li>
          <li><b>10.2.x:</b> (0.6.3 distribution)
		<pre>curl -O http://us.dl.sf.net/fink/direct_download/dists/fink-0.6.3/release/main/binary-darwin-powerpc/base/fink_0.18.3-1_darwin-powerpc.deb
sudo dpkg -i fink_0.18.3-1_darwin-powerpc.deb
rm fink_0.18.3-1_darwin-powerpc.deb
fink selfupdate</pre></li>
        </ul></div>
    </a>
    <a name="spaces-in-directory">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.22: 我可以把 Fink 放到一个名字里面有空格的目录或宗卷里面吗？</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 我们不推荐把你的 Fink 目录树放到名字中有空格的目录里面。完全不值得冒这个险。</p></div>
    </a>
    <a name="packages-gz">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.23: 当我进行二进制升级的时候，有很多 "File not found" 和 "Couldn't stat package source list file" 错误。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 如果你看到这样的错误：</p><pre>
Err file: local/main Packages
  File not found
Ign file: local/main Release
Err file: stable/main Packages
  File not found
Ign file: stable/main Release
Err file: stable/crypto Packages
  File not found
Ign file: stable/crypto Release
...
Failed to fetch
file:/sw/fink/dists/local/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch
file:/sw/fink/dists/stable/main/binary-darwin-powerpc/Packages
File not found
Failed to fetch
file:/sw/fink/dists/stable/crypto/binary-darwin-powerpc/Packages
File not found
Reading Package Lists... Done
Building Dependency Tree... Done
E: Some index files failed to download, they have been ignored, or old
ones used instead.

update available list script returned error exit status 1.
</pre><p>或</p><pre>W: Couldn't stat source package list file: unstable/main Packages
(/sw/var/lib/apt/lists/_sw_fink_dists_unstable_main_binary-darwin-
powerpc_Packages) - stat (2 No such file or directory)</pre><p>那么你需要做的是运行 <code>fink scanpackages</code>。这会生成那些找不到的文件。</p></div>
    </a>
    <a name="wrong-tree">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.24: 我改变了系统，但 Fink 没有认出这些改动。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 在改动 Fink 的安装环境（源代码或二进制安装都是它的子集），需要告诉 Fink 发生了这些变动。要这样做，我们要运行一个通常是在首次安装的时候才运行的脚本：</p><pre>/sw/lib/fink/postinstall.pl</pre><p>运行完这个脚本以后，Fink 应该能够适应改动的结果。</p></div>
    </a>
    <a name="lost-command-line-tools">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.25: After installing a macOS update, Fink no longer recognizes my installed Command Line Tools.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Updates to macOS routinely break parts of Apple's Command Line Tools. If you get this error after updating your copy of macOS:</p><pre>Can't resolve dependency "xcode (&gt;= 6.2)"</pre><p>Fink has lost track of Apple's Command Line Tools.</p><p>The easiest solution is to download and reinstall the Command Line Tools specific to your macOS version from <a href="https://developer.apple.com/">https://developer.apple.com/</a>.</p><p>Another possible solution is to run the following command:</p><pre>xcode-select --install</pre><p>but this often reports the following:</p><pre>xcode-select: error: command line tools are already installed, use "Software Update" to install updates</pre><p>However, the Tools might be in a non-functional state such that Fink still can't recognize them. In that case, a clean reinstall as described above has always worked to fix their detection with Fink.</p><p>Finally, you may need to run the command:</p><pre>sudo xcodebuild -license</pre><p>to agree to the software license.</p></div>
    </a>
    <a name="seg-fault">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.26: 当我运行<code> fileutils </code>中的 <code>gzip</code> 或 <code>dpkg-deb</code> 程序时出现错误！救命！</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 出错的形式：</p><pre>gzip -dc /sw/src/dpkg-1.10.9.tar.gz | /sw/bin/tar -xf -
### execution of gzip failed, exit code 139</pre><p>或</p><pre>gzip -dc /sw/src/aquaterm-0.3.0a.tar.gz | /sw/bin/tar -xf -
gzip: stdout: Broken pipe
### execution of gzip failed, exit code 138</pre><p>或</p><pre>dpkg-deb -b root-base-files-1.9.0-1
/sw/fink/dists/unstable/main/binary-darwin-powerpc/base
### execution of dpkg-deb failed, exit code 1
Failed: can't create package base-files_1.9.0-1_darwin-powerpc.deb</pre><p>或在运行<code> fileutils</code> 中的工具时出现 segmentation faults 错误。比如：<code>ls</code> 或 <code>mv</code>，这很可能时因为某个库的预绑定错误，这可以通过运行下面命令来修正：</p><pre>sudo /sw/var/lib/fink/prebound/update-package-prebinding.pl -f</pre></div>
    </a>
    <a name="pathsetup-keeps-running">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.27: 当我打开终端程序窗口时，我看到下面的信息 "Your environment seems to be correctly
set up for Fink already."，然后它就退出登录了。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 发生这个现象的原因是 OS X 的终端程序被告知每次登录的时候需要运行 <code>/sw/bin/pathsetup.command</code> 命令。你可以通过删除下面的文件 <code>~/Library/Preferences/com.apple.Terminal.plist</code> 来修正这一点。</p><p>如果这个配置文件里面有你需要保留的配置信息（所以你不能删除它），你可以用纯文本编辑器来编辑它，删除包含 <code>/sw/bin/pathsetup.command</code> 的一行。</p></div>
    </a>
    <a name="ext-drive">
    <div class="question"><p><b><?php echo FINK_Q ; ?>5.28: 我把 Fink 安装到主分区之外的地方，然后我不能从源代码更新 fink 软件包了。现在出现类似 <q>chowname</q> 的错误。</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 如果你的错误信息是象这样的：</p><pre>This first test is designed to die, so please ignore the error
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
#     expected: 'nobody'</pre><p>那么你需要在 Fink 安装的驱动器/分区上运行 <b>Get Info</b>，并取消选择 "Ignore ownership" 的按钮。</p></div>
    </a>
    
    <a name="mirror-gnu">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.29: Fink won't update my packages because it says it can't find the 'gnu' mirror.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> If you get an error that ends with</p><pre>Failed: No mirror site list file found for mirror 'gnu'.</pre><p>then most likely you need to update the <code>fink-mirrors</code> package, e.g. via:</p><pre>fink install fink-mirrors</pre></div>
    </a>
    
    
    <a name="cant-move-fink">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.30: I can't update Fink, because it can't move /sw/fink out of the way.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> This error:</p><pre>Failed: Can't move "/sw/fink" out of the way.</pre><p>is usually due, in spite of what it says, to permissions errors in one of the temporary directories that get created during a <code>selfupdate</code>.  Remove these:</p><pre>sudo rm -rf /sw/fink.tmp /sw/fink.old</pre></div>
    </a>

    <a name="fc-cache">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.31: I get a message that says "No fonts found".</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> If you see the following (so far only seen on OS 10.4):</p><pre>No fonts found; this probably means that the fontconfig
library is not correctly configured. You may need to
edit the fonts.conf configuration file. More information
about fontconfig can be found in the fontconfig(3) manual
page and on http://fontconfig.org.</pre><p>then you can fix it by running</p><pre>sudo fc-cache</pre></div>
    </a>
    <a name="non-admin-installer">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.32:  I can't install Fink via the Installer package, because I get "volume doesn't support symlinks" errors.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> This message commonly means that you've tried to run the Fink installer as user who doesn't have administrative privileges.  Make sure to log in at the login screen as such a user or switch to such a user in the Finder (i.e. fast user switching) before starting the Fink installer.</p><p>If you're having trouble even when using an admin account, then it's likely a problem with the permissions on your top-level directory.  Use Apple's Disk Utility (from the Utilities sub-folder in your Applications folder), select the hard drive in question, choose the <b>First Aid</b> tab, and press <b>Repair Disk Permissions</b>.  If that doesn't work, then you may need to set your permissions manually via:</p><pre>
sudo chmod 1775 /	  
	</pre></div>
    </a>
    <a name="wrong-arch">
      <div class="question"><p><b><?php echo FINK_Q ; ?>5.33: I can't update Fink, because <q>package architecture (darwin-i386) does not match system (darwin-powerpc).</q>
</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> This error occurs if you use a PowerPC installer package on an Intel machine.  You'll need to flush your Fink installation, e.g.:</p><pre>sudo rm -rf /sw</pre><p>and then download the disk image for Intel machines from <a href="/download/index.php">the downloads page</a>.</p></div>
    </a>

    
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="comp-general.php?phpLang=zh">6. 一般性编译问题</a></p>
<?php include_once "../footer.inc"; ?>


