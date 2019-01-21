<?php
$title = "用户指南 - fink 工具";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2019/01/19 10:11:12';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="用户指南 Contents"><link rel="prev" href="conf.php?phpLang=zh" title="Fink 配置文件">';


include_once "header.zh.inc";
?>
<h1>用户指南 - 6. 在命令行使用 Fink 工具</h1>
    
    
    <h2><a name="using">6.1 使用 Fink 工具</a></h2>
      
      <p><code>fink</code> 工具使用几个后缀命令来处理源程序发行包。其中的一些需要至少有一个软件包名称，但同时可以处理多个软件包。你可以简单地应用软件包的名称（例如，　gimp），或包括版本号的全名（例如 gimp-1.2.1) 或包含版本号和修订版号的名称 (例如 gimp-1.2.1-3）。在没有指明版本的情况下，Fink 会自动选择最新的版本。其它还具有不同的选项。</p>
      <p>下面是 <code>fink</code> 工具的命令清单：</p>
    
    
    <h2><a name="options">6.2 Global options</a></h2>
      
      <p>
There are some options, which apply to all fink commands. If you 
type <code>fink --help</code> you get the list of options: 
      </p>
      <p>(as of <code>fink-0.26.0</code>)</p>
      <p><b>-h, --help</b> - displays help text.
</p>
      <p><b>-q, --quiet</b>  - causes <code>fink</code> to be less verbose, opposite of <b>--verbose</b>.  Overrides the <a href="conf.php?phpLang=zh#optional">Verbose</a> flag in <code>fink.conf</code>.
</p>
      <p><b>-V, --version</b> - display version information.
</p>
      <p><b>-v, --verbose</b> - causes  <code>fink</code> to be more verbose, opposite of <b>--quiet</b>.  Overrides the <a href="conf.php?phpLang=zh#optional">Verbose</a> field in <code>fink.conf.</code>
</p>
      <p><b>-y, --yes</b> - assume default answer for all interactive 
                        questions.
</p>
      <p><b>-K, --keep-root-dir</b>   - Causes <code>fink</code> not to delete the
                        <code>root-[name]-[version]-[revision]</code>
		        directory in the <a href="conf.php?phpLang=zh#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=zh#developer">KeepRootDir</a> field in <code>fink.conf</code>.
</p>
      <p><b>-k, --keep-build-dir</b>  - Causes <code>fink</code> not to delete the
                        <code>[name]-[version]-[revision]</code>
                        directory in the <a href="conf.php?phpLang=zh#optional">Buildpath</a> after building a package.  Corresponds to the <a href="conf.php?phpLang=zh#developer">KeepBuildDir</a> field in <code>fink.conf</code>.</p>
      <p><b>-b, --use-binary-dist</b> - download pre-compiled packages from the binary 
                        distribution if available (e.g. to reduce compile
		        time or disk usage).
		        Note that this mode instructs fink to download the
                        version it wants if that version is available for
		        download; it does not cause fink to choose a version
    		        based on its binary availability.  Corresponds to the <a href="conf.php?phpLang=zh#downloading">UseBinaryDist</a> flag in <code>fink.conf</code>.
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
      <p>
Most of these options are self-explanatory (see <a href="conf.php?phpLang=zh#optional">here </a> for the definition of Buildpath). They can also be set in the 
<a href="conf.php?phpLang=zh">Fink configuration file</a> (fink.conf) if you want 
to set them permanently and not just for that invocation of <code>fink</code>.</p>
    
    
    <h2><a name="install">6.3 install</a></h2>
      
      <p><b>install</b> 命令用于安装软件包。它下载，配置，构建和安装你指名的软件包。它还会自动安装需要的依赖关系，但在此之前会要求你确认。例如：</p>
      <pre>fink install nedit

Reading package info...
Information about 131 packages read.
The following additional package will be installed:
 lesstif
Do you want to continue? [Y/n]</pre>
      
      <p>Use of the <a href="#options">--use-binary-dist</a> option with <code>fink install</code> can speed the build process for complicated packages by quite a lot.</p>
      
      <p>install 命令的别名包括： <b>update, enable, activate, use</b> （这些别名多数是因为历史原因形成的）。</p>
    
    
    <h2><a name="remove">6.4 remove</a></h2>
      
      <p>The remove command removes packages from the system by calling '<code>dpkg --remove</code>'. The current default implementation has a flaw: it
doesn't check dependencies itself but rather completely leaves that to
the dpkg tool (usually this poses no problem, though).</p>
      <p>The <b>remove</b> command only removes the actual package files,
(excluding configuration files), but leaves
the <code>.deb</code> compressed package file intact. This means that you can
re-install the package later without going through the compile process
again. If you need the disk space, you can remove the <code>.deb</code> from the
<code>/sw/fink/dists</code> tree.</p>
      <p>These flags can be used with the <b>fink remove</b> command
</p>
      <pre>-h,--help             - Show the options which are available.
-r,--recursive        - Also remove packages that depend on the package(s) to
                        be removed (i.e. overcome the above-mentioned flaw).</pre>
      <p>Aliases: <b>disable, deactivate, unuse, delete</b>.</p>
    
    <h2><a name="purge">6.5 purge</a></h2>
      
      <p>The <b>purge</b> command purges packages from the system. This is
the same as the <b>remove</b> command except that it removes configuration
files as well.</p>
      <p>This command takes the:</p>
      <pre>-h,--help
-r,--recursive</pre>
      <p>options.</p>
    
    
    <h2><a name="update-all">6.6 update-all</a></h2>
      
      <p>这个命令会更新所有已经安装的软件包到最新的版本。它不需要输入要更新的软件包清单，你只需要输入：</p>
      <pre>fink update-all</pre>
      
      <p><a href="#options">--use-binary-dist</a> is also useful with this command.</p>
      
    
    <h2><a name="list">6.7 list</a></h2>
      
      <p>
这个命令产生一个可用的软件包，它的安装情况，最新版本和简单的描述。
如果你不使用其它参数的话，它会列出所有可用软件包。
你可以附上一个名称或 shell 模式，fink 会列出所有匹配的软件包。
</p>
      <p>
第一列显示的安装状态的意义为：
</p>
      <pre>    未安装
 i   已安装最新版本
(i)  已安装，但不是最新版本
 p   a virtual package provided by a package that is installed</pre>

      <p> The version column always lists the latest (highest) version known for the package, regardless of what version (if any) you have installed.  To see all versions of a package available on your sys-
           tem, use the <a href="#dumpinfo">dumpinfo</a> command.</p>
      <p>
<code>fink list</code> 命令可以使用下面这些标志：
</p>
      <pre>
-h,--help
	  显示可用的选项。
-t,--tab
	  按制表位输出清单，这对需要在脚本中使用输出很有用。
-i,--installed
	  只显示已安装的软件包。
-o,--outdated
	  只显示已过期的软件包。
-u,--uptodate
	  只显示没有过期的软件包。
-n,--notinstalled
	  只显示没有安装的软件包。
-s expr,--section=expr
	  只显示满足正则表达式的软件包。
-m expr,--maintainer=expr
          Show only packages with the maintainer  matching the
          regular expression expr.
-r expr,--tree=expr
          Show only packages in the trees matching the regular
          expression expr.
-w=xyz,--width=xyz
	  设定你希望输出格式化为的宽度。xyz 可以为一个数字或者 auto。
	  auto 会根据终端的宽度来设置输出宽度。
	  默认值是 auto。
</pre>
      <p>
一些有用的例子：
</p>
      <pre>
fink list                 - 列出所有的软件包
fink list bash            - 检查 bash 是否可用，以及它的版本
fink list --outdated      - 列出过期的软件包
fink list --section=kde   - 列出属于 kde 部分的软件包
fink list "gnome*"        - 列出所有以 'gnome' 开头的软件包
</pre>
      <p>
在最后一个例子中，引号是必须的。因为这样才可以避免 shell 自己来匹配这个模式。
</p>
    
    <h2><a name="apropos">6.8 apropos</a></h2>
      
      <p>
这个命令的作用几乎和 <a href="#list">fink list</a> 一样。最主要区别是 <code>fink apropos</code> 还会搜索软件包描述来寻找软件包。第二个区别是必需提供一个搜索字符串，而不是可选的。
</p>
      <pre>
fink apropos irc          - 寻找在名称或描述中包含 'irc' 的软件包
fink apropos -s=kde irc   - 同上，但只在 kde 部分寻找
</pre>
    
    <h2><a name="describe">6.9 describe</a></h2>
      
      <p>
你在这个命令中给出软件包的名称，命令会输出它的描述。
注意，目前只有一小部分软件包有描述信息。
</p>
      <p>
别名： <b>desc, description, info</b>
</p>
    
	
    <h2><a name="plugins">6.10 plugins</a></h2>
      
      <p> List the (optional) plugins available to the <code>fink</code> program.  Currently lists the notification mechanisms and the source-tarball
           checksum algorithms.</p>
    
	
    <h2><a name="fetch">6.11 fetch</a></h2>
      
      <p>下载指定的软件包，但不安装它。这个命令下载压缩档，即使以前已经下载过。</p>
      
      <p>The following flags can be used with the <a href="#fetch">fetch</a> command:</p>
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
      
      <p>下载 <b>所有</b> 软件包源程序文件。和 <code>fetch</code>　一样，它会下载即使已经下载过的压缩档。</p>
      
      <p>These flags can be used with the <code>fink fetch-all</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
      
    
    <h2><a name="fetch-missing">6.13 fetch-missing</a></h2>
      
      <p>下载 <b>所有</b> 缺失的软件包源程序文件。这个命令只下载系统中没有的文件。</p>
      
      <p>These flags can be used with the <code>fink fetch-missing</code> command:</p>
      <pre>-h,--help
-i,--ignore-restrictive
-d,--dry-run</pre>
      
    
    <h2><a name="build">6.14 build</a></h2>
      
      <p>构建一个软件包，并不安装它。通常，缺少的源压缩档会自动被下载。这个命令的结果是产生一个可用于安装的 .deb 软件包文件，以后你可以使用 install 命令迅速地安装它。如果 .deb 文件已经存在，这个命令会什么都不干。注意，依赖关系会被<b>安装</b>，而不仅仅是构建。</p>
    
    <h2><a name="rebuild">6.15 rebuild</a></h2>
      
      <p>构建一个软件包（和 build 命令类似），但忽略和覆盖现存的 .deb 文件。如果这个软件包已经安装，新创建的 .deb 文件也会通过 <code>dpkg</code> 安装到系统。对软件包开发过程很有用。</p>
      
      <p>The <a href="#options">--use-binary-dist option</a> is applicable here.</p>
      
    
    <h2><a name="reinstall">6.16 reinstall</a></h2>
      
      <p>和 install 相同，但会使用 <code>dpkg</code> 安装，即使它已经被安装。你可以用这个命令安装被意外删除的软件包文件或者改变了设置文件以后希望恢复回默认的设置。</p>
    
    <h2><a name="configure">6.17 configure</a></h2>
      
      <p>
重新运行 <code>fink</code> 的配置过程。
你可以改变镜像站点和代理服务器设置等。
</p>
	  
      <p><b>New in</b> <code>fink-0.26.0</code>: This command will also let you turn on the unstable trees if desired.</p>
      
    
    <h2><a name="selfupdate">6.18 selfupdate</a></h2>
      
      
      <p>
	这个命令会自动更新到一个新的 Fink 版本。它检查 Fink 网站确定是否有新的版本。然后下载软件包描述并升级核心软件包，包括 <code>fink</code> 本身。这个命令可以升级标准的发布版本，但也可以设置你的 <code>/sw/fink/dists</code> 目录树来使用直接 git 或 rsync 进行升级, if you select one of those options the first time this command is run。这意味着你可以访问所有软件包的最新修订版。
</p>
      
      
      <p>If the <a href="#options">--use-binary-dist option</a> is enabled, the list of available packages in the binary distribution is also updated.
      </p>
      
    

    <h2><a name="selfupdate-rsync">6.19 selfupdate-rsync</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use rsync to update its package list.</p>
      <p>This is the recommended way to update Fink when building from source.</p>
      <p><b>Note:</b>  rsync updates only update the active <a href="conf.php?phpLang=zh#optional">trees</a> (e.g. if unstable isn't turned on in <code>fink.conf</code> the list of unstable packages won't be updated.</p>
    
    <h2><a name="selfupdate-git">6.20 selfupdate-git</a></h2>
      
      <p>Use this command to make <code>fink selfupdate</code> use Git access to update its package list.</p>
      <p>Rsync updating is preferred, except for developers and those people who are behind firewalls that disallow rsync.</p>
    

    <h2><a name="index">6.21 index</a></h2>
      
      <p>
   重建软件包缓存。通常你不应该手工运行这个命令，因为 <code>fink</code> 应该能够自动检测到什么时候需要更新。
</p>
    
    <h2><a name="validate">6.22 validate</a></h2>
      
      <p>
   这个命令会对 <code>.info</code> 和 <code>.deb</code> 文件进行一些检查。软件包维护人员在提交他们负责的软件包之前，应该运行这个命令来对它的描述和相应的构建好的软件包进行检查。
</p>
      
      <p>The following optional options may be used:</p>
      <pre>-h,--help            - Show the options which are available.
-p,--prefix          - Simulate an alternate Fink basepath prefix (%p) within
                      the files being validated.
--pedantic, --no-pedantic
                     - Control the display of nitpicky formatting warnings.
                      --pedantic is the default.</pre>
      
      <p>
   别名： <b>check</b>
</p>
    
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
      
      
      <p>Only available in <code>fink</code> newer than version 0.21.0</p>
      
      <p>
	显示 <code>fink</code> 如何解析软件包的 <code>.info</code> 文件的各个部分。各个字段和百分号展开会按照下面<b>选项</b>的设置来显示：
      </p>
      <pre>
-h, --help           - 显示可用的选项。
-a, --all            - 显示软件包描述文件的全部字段。
                       这时没有指定 --field 或 --percent 标志时的默认方式。
-f 字段名,            - 按列出的顺序显示给定的字段名
  --field=字段名
-p 关键字,            - 按列出顺序显示指定的关键字的百分号扩展
   --percent=关键字
      </pre>
    
    
    <h2><a name="show-deps">6.26 show-deps</a></h2>
      
      <p>Only available in fink-0.23-6 and later.</p>
<p>Displays a human-readable list of the compile-time (build) and run-
           time (installation) dependencies of the listed package(s).</p>
    
    
  
<?php include_once "../../footer.inc"; ?>


