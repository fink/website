<?
$title = "i18n - 文件";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2004/03/10 02:23:16';
$metatags = '<link rel="contents" href="index.php?phpLang=zh" title="i18n Contents"><link rel="next" href="procedure.php?phpLang=zh" title="更新文档的流程"><link rel="prev" href="intro.php?phpLang=zh" title="介绍">';

include_once "header.inc";
?>

<h1>i18n - 2 文档文件</h1>
    

    

    
      <p>本章的目的是对 Fink 的文档文件进行介绍，如何去访问它们，如何把你的修改通知 Fink 网站以及如何激活你的修改。</p>
    

    <h2><a name="requirements">2.1 需求</a></h2>
      

      <p>要作为翻译团队的一员，开始对文档的翻译，你需要：</p>

      <ul>
        <li>一个 CVS 客户端软件。用于从 Fink 网站下载网页的 xml 文件树。</li>

        <li>一个 UTF-8 兼容的纯文本编辑器──专门的 XML 编辑器会更好，因为 Fink 网站的许多文件都是从 XML 文件生成的。</li>

        <li>Fink 网页 xml 文件树的签出版本，如下面<a href="#acquiring">指南</a>的介绍。</li>

        <li>关译 Fink 的实践只是会是有益的。</li>
      </ul>

      <p><b>附注：</b>“团队成员”定义为负责翻译但不对最终上载文件到 Fink 站点负责的人。</p>

      <p>团队领导必需符合上述要求，同时要：</p>

      <ul>
        <li>有一个 SourceForge 帐号(免费注册)</li>

        <li>对 Fink 文档树的修改权限。
        要获取这个权限，发一份邮件到 fink-18n 邮件列表，提供你的 SourceForge 用户名。
        i18n 核心团队的一位成员会为你安排对文档部分 CVS 提交修改的权限事宜。</li>
      </ul>

      <p><b>附注：</b>“团队领导”在这里定义为负责实际上传修改过的文件到 Fink 网站，并激活有关修改的一个团队成员。</p>
    

    <h2><a name="setting-up">2.2 环境设置</a></h2>
      

      <p>你也许会希望事先设置好一些环境。
      下面的讨论假设你在使用 Mac OS X 或其它类 Unix 系统的内置命令行工具。</p>

      <ol>
        <li><b>仅对团队领导</b>：修改你的登录文件添加一个 CVS_RSH 环境变量。
        <ol>
            <li>如果你使用的是 <code>bash</code> 或 <code>zsh</code> 添加下面一行：
            <pre>export CVS_RSH=ssh</pre>
            到你的 <code>.profile</code> 文件中。</li>

            <li>如果你正在使用 <code>tcsh</code>，添加下面一行：
            <pre>setenv CVS_RSH ssh</pre>
            到你的 <code>.cshrc</code> 文件中。
            <p>这会告诉 <code>cvs</code> 程序使用 ssh 来下载文件。
            这个步骤是必需的。</p></li>
          </ol></li>

        <li><b>对所有成员</b>：在你的主目录中创建一个称为 <code>.cvsrc</code> 的文件，里面包括下面一行：
        <pre>cvs -z3</pre>
        这样，CVS 会默认使用第三级的压缩（这是个好东西！）。
        </li>
      </ol>

      <p>这样做完以后，你需要重新开启一个新的终端窗口以使得你的 CVS_RSH 环境变量生效。</p>
    

    <h2><a name="acquiring">2.3 获取需要翻译的文件。</a></h2>
      

      <p>现在，你需要签出网站的 xml 分支：</p>

      <ol>
        <li>打开终端窗口</li>

        <li>创建一个你打算保存 Fink 网页文件树 XML 分支的目录，比如：
        <pre>mkdir -p ~/Documents/Fink-i18n</pre></li>

        <li>进入这个目录：
        <pre>cd ~/Documents/Fink-i18n</pre></li>

        <li><b>对于非团队领导的成员（或仍在等待修改许可的团队领导）：
        </b>以匿名方式登录 cvs.sourceforge.net：<ol>
            <li><pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink login</pre></li>

            <li>按回车键（匿名方式不需要密码）</li>

            <li>签出 xml 模块：
            <pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink co xml</pre></li>
          </ol><b>对团队领导：</b>用你的用户帐号来签出：<ol>
            <li>你不需要上面的登录步骤，而直接：
            <pre>cvs -d:ext:yourusername@cvs.sourceforge.net:/cvsroot/fink co xml</pre>
            其中 <b>yourusername</b> 是你的 SourceForge 用户名。</li>

            <li>这时，在提示输入密码的时候，你需要输入你的 SourceForge 用户密码。你也许会得到一个服务器的 DSA 密钥不能识别的警告信息，回答 yes 就可以了。</li>
          </ol></li>
      </ol>
    

    <h2><a name="file-standards">2.4 文件格式</a></h2>
      

      <p>作为一个翻译者，你需要处理两种格式的文件：</p>

      <ol>
        <li><b>静态文件（仅PHP）</b> 
        <p>这些文档的结构（比如文本项的数目）不会每天改变。
        这种文档只使用 PHP 文件，你翻译它就可以了。</p></li>

        <li><b>动态文件（由 XML 产生的 PHP 和 HTML）</b> 
        <p>这些文档（比如，FAQ 部分）会经常更新和调整结构，所以它需要一种可以动态重新组织的机制。
        这类文档使用 XML 文件作为产生 PHP 和 HTML 文件的基础，我们可以通过一个脚本从它生成需要的文件。
        作为翻译者，你的职责是翻译 XML 文件。</p></li>
      </ol>
    

    <h2><a name="updating">2.5 更新到最新修订版</a></h2>
      

      <p>由于其它翻译者可能会在你签出文件以后，又对一些文件进行了修改（不用担心这一点，我们的 CVS 程序能够很好地处理它）。所以经常更新的版本到最新的修订版是一个好主意。</p>

		<p>对于非团队领导的成员：</p>
      <ol>
        <li>进入包含你签出的文件的目录，例如：
        <pre>cd ~/Documents/Fink-i18n/xml</pre></li>
        
        <li><p>按照 2.3 中关于登录的步骤说明，登录到 CVS。</p></li>

        <li>进行更新，例如：
        <pre>cvs -d:pserver:anonymous@cvs.sourceforge.net:/cvsroot/fink update -dP</pre></li>
      </ol>
      <p>对于团队领导：</p>
      <ol>
        <li>进入包含你签出的文件的目录，例如：
        <pre>cd ~/Documents/Fink-i18n/xml</pre></li>
        <li>进行更新，例如：
        <pre>cvs update -dP</pre>
        在提示的时候，输入你的 SourceForge 密码。</li>
      </ol>

      <p>当你更新的时候，你会发现显示的信息中，有些文件前面又一个字母。
      查阅<a href="appendix.php?phpLang=zh">《附录》</a>或 CVS 的帮助页获取更多的信息。 </p>
    

    <h2><a name="initial-translation">2.6 初始翻译</a></h2>
      

      <p>要翻译的文件，按照优先次序是：</p>

      <p>标题（英语版本文件）</p>

      <ol>
        <li>常数文件（<code>xml/web/constants.*.inc</code>）（参考下面）</li>

        <li>静态 PHP 文件（例如：<code>xml/web/*.en.php</code>）</li>

        <li>用户指南（<code>xml/uguide.en.xml</code>）</li>

        <li>FAQ（<code>xml/faq.en.xml</code>）</li>

        <li>运行 X11 （<code>xml/x11/x11.en.xml</code>）</li>

        <li>文档目录（<code>xml/doc/doc.en.xml</code>，但由于尚余的 xslt 问题，它的 PHP 文件还不能用运行 <code>make</code> 的方法生成）</li>

        <li>打包（<code>xml/packaging/packaging.en.xml</code>）</li>

        <li>移植（<code>xml/porting/porting.en.xml</code>）</li>

        <li>新闻（<code>xml/news/news.en.xml</code>）</li>
      </ol>

      <p><code>constants.*.inc</code> 文件是用于被 PHP 文件引用的固定编码的常数。
      它们主要是一些菜单项的内容，位于页面的上方或左方。你应该从脚本中分离它们，并创建一个你的语言的 constant.xx.inc 文件。你可以在终端窗口输入类似下面的命令：</p>
      <pre>cp constants.de.inc constants.xx.inc</pre>
      <p>这个 xx 是你的语言代码（例如：zh 是简体中文）。
      然后，你需要把 define 语句中的单引号内的内容翻译到你的语言。
      如果你不懂德语的化，下面是那个文件的英语版本：</p>

      <pre>/* The Sections. Used in Menu Navigation Bar */ define (FINK_SECTION_HOME, 'Home'); 
define (FINK_SECTION_DOWNLOAD, 'Download');
define (FINK_SECTION_PACKAGE, 'Packages'); 
define (FINK_SECTION_HELP, 'Help'); 
define (FINK_SECTION_FAQ, 'F.A.Q.'); 
define (FINK_SECTION_DOCUMENTATION, 'Documentation'); 
define (FINK_SECTION_MAILING_LISTS, 'Mailing Lists'); 

/* The Home Subsections. Used in Menu Navigation Bar */ 
define (FINK_SECTION_HOME_INDEX, 'Index'); 
define (FINK_SECTION_HOME_NEWS, 'News'); 
define (FINK_SECTION_HOME_ABOUT, 'About'); 
define (FINK_SECTION_HOME_CONTRIBUTORS, 'Contributors'); 
define (FINK_SECTION_HOME_LINKS, 'Links'); 

/* The word 'Sections'. Used in Menu Navigation Bar */ 
define (FINK_SECTIONS, 'Sections'); 

/* Contents as Table of Contents. Used in FAQ/Documentation Sections */ 
define (FINK_CONTENTS, 'Contents');</pre>

      <p>在你翻译的时候，你通常会按照下面的步骤（
      假设你正在翻译《运行 X11》这份文档到简体中文）：</p>

      <ol>
        <li>拷贝 xml 文件
        <pre>cp x11.en.xml x11.zh.xml</pre></li>

        <li>编辑文件里面的这行来声明它是简体中文，以及它的字符编码是 UTF-8
        <pre>&lt;?xml version='1.0' encoding='utf-8' ?&gt; ...
&lt;document filename="index" lang="zh" &gt; ...</pre></li>

        <li>保存为 UTF-8。注意字符编码格式必需为 utf-8，除了真正的文本内容以外，不要去修改任何其它内容（也就是那些尖括号里面的内容）。</li>

        <li>翻译完成以后，或者你希望测试一下的话，编辑
        <code>Makefile</code> 来包括你的语言：
        <pre>LANGUAGES = en ja zh
include $(basedir)/Makefile.i18n.common</pre> 
        <p>然后在这个目录里面运行 <code>make</code> 命令。这应该会生成中文的 PHP 文件（可能还有一些其它文件），同时还有英语和其它已经在 Makefile 中添加了的语言版本。</p></li>
      </ol>

      <p>注意：如果你发现英文文件的一些错误，不要修改它，而应该报告到 <a href="http://fink.sourceforge.net/lists/fink-i18n.php">fink-i18n
邮件列表</a>，这样英语主版本会得到更新。</p>
    

    <h2><a name="check-work">2.7 检查你的工作</a></h2>
      

      <p>在你的工作被上传到 Fink 网站之前，你应该检查文档看起来是否正常。</p>

      <ul>
        <li><b>简单的办法：</b>
        在你的浏览器里面打开 HTML 和 PHP 文件。
        不过，这样看的 PHP 文件和你在网站看到不完全相同。</li>

        <li><b>最好的办法：</b>
        你可以使用你的内置 web 服务器，使得你看到这个文档应该在 Fink 网站尚的显示效果。
        假设你使用内置的服务器：<ol>
            <li>编辑 <code>/etc/httpd/httpd.conf</code> 文件，比如通过：
            <pre>sudo pico /etc/httpd/httpd.conf</pre>
            </li>

            <li>寻找这样一行：
<pre>#LoadModule php4_module libexec/httpd/libphp4.so</pre>
				然后删除它前面的 # 号。</li>

            <li>继续寻找这样一行：
<pre>#AddModule mod_php4.c</pre>
				删除它前面的 # 号</li>

            <li>如果你使用的 Apache 的版本比 Panther 内置的版本旧的话，你还需要寻找这样的一行：
<pre>AddType application/x-httpd-php.php</pre>
				并在前面放一个 # 号。</li>

            <li>存盘退出。</li>

            <li>在系统预置里面起动“个人网页共享”──如果它已经运行，那么关闭它然后再重新起动。</li>

            <li>使得所有的东西都可以被看得到的最简单的办法是把你签出的 <code>xml</code> 文件树移到你主目录下的
            <code>Sites</code> 文件夹。
            然后你可以通过下面的 URL 打开你的网页：
<pre>http://127.0.0.1/~<b>USERNAME</b>/xml/web/index.php</pre>
				这里 <code>USERNAME </code> 应该替换为你的用户名。</li>
          </ol></li>
      </ul>
    

    <h2><a name="change-checkout">2.8 当你获得提交修改的权限（团队领导）</a></h2>
      

      <p>当你被授予提交修改的权限以后，你应该</p>

      <ul>
        <li>为你的 SourceForge 帐号设置一个 SSH 密钥。<ol>
            <li>按照 SourceForge 上<a href="http://sourceforge.net/docman/display_doc.php?docid=761&amp;group_id=1#keygenopenssh">《指南》</a>的介绍，在你的机器上设置好密钥。</li>

            <li>在终端窗口输入：
<pre>cat ~/.ssh/id_dsa.pub | pbcopy</pre>
            这会把文件的内容直接拷贝到你的剪贴版，而避免那些讨厌的换行符问题。
            注意在你完成下一步操作之前，不要再拷贝其它东西到剪贴板。</li>

            <li>登录你的 SourceForge 帐号。</li>

            <li>选择 “Account Options”</li>

            <li>找到 “Host Access Information” 设置的地方，点击 “Edit
            SSH Keys for Shell/CVS”</li>

            <li>点击输入框，按 Cmd-A，Cmd-V</li>

            <li>点击按钮。</li>
          </ol></li>

        <li>用你的用户名签出 <code>xml</code> 代码树。<ol>
            <li>如果以前已经签出了整个 <code>xml</code> 代码树，那么你应该先重命令你本地的文件。你可以用 Finder 来做。</li>

            <li>在终端窗口进入那个目录：
<pre>cd ~/Documents/Fink-i18n</pre></li>

            <li>签出 xml 代码树：
<pre>cvs -d:ext:yourusername@cvs.sourceforge.net:/cvsroot/fink co xml</pre>
				这里 <b>yourusername</b> 当然是你的 SourceForge 用户名。在提示的时候输入你的密码。</li>

            <li>把你正在翻译的文件从旧的文件树拷贝回新的代码树。
            你可以使用 Finder，要注意它们应该被拷贝到同样的目录位置。</li>
          </ol></li>
      </ul>
    

    <h2><a name="committing">2.9 提交修改（团队领导）</a></h2>
      

      <p>现在你需要把你的修改发送到主服务器。
      要这样做，你需要有提交修改的权限。
      你还需要确保你使用的未稳定树里面的最新的 XSLT 版本，写本文档时用的是 Fink 的 <code>xslt-1.1.2-2</code>。</p>

      <p>对于静态和动态的文档，根据它们的性质不同，提交方法也有不同：</p>

      <ul>
        <li><b>静态：</b>（仅 PHP 文件）。要提交对这些文件的修改，可以这样：
        <ol>
            <li>打开一个终端程序。</li>

            <li>进入你包含你打算提交的文件所在的目录：
<pre>cd ~/Documents/Fink-i18n/xml/web</pre>
            <p>上面假设你把你的 <code>xml</code> 代码树建立在你主目录下的 <code>Documents/Fink-i18n/</code> 文件夹下，并且你打算提交 xml/web 目录里面的 PHP 文件。</p></li>

            <li>如果这是一个你新创建的文件，那么你需要先把它添加到文件清单中，例如：
<pre>cvs add download.ru.php</pre>
				在提示的时候输入你的 SourceForge 密码。
				你也许会获得一个未知的服务器的 DSA 密钥的警告。
				输入 yes 就好了。
				<p>如果是一个现有的文件，你可以跳过这一步而进入下一步。</p></li>

            <li>提交文件，例如，对于上面的例子：
<pre>cvs ci -m "message" download.ru.php</pre>

				这里 <b>message</b> 应该能够描述你大概做了什么修改。
				在提示的时候输入你的 SourceForge 密码。
            <p>附注：你可以一次提交多个文件。</p></li>
          </ol></li>

        <li><b>动态：</b>（XML 和 PHP）在修改了 XML 文件以后，按照下面那样做：<ol>
            <li>打开一个终端程序</li>

            <li>进入包含你要添加和修改的文件的目录，例如：
<pre>cd ~/Documents/Fink-i18n/xml/faq</pre>
				如果你是在翻译 FAQ 部分的话。</li>

            <li>现在运行 <pre>make check</pre> 验证文件的格式是正确的。</li>

            <li>如果这个 XML 文件是你新创建的，那么你需要把它添加到文件清单中，例如：
<pre>cvs add faq.ru.xml</pre>
				在提示的时候输入你的 SourceForge 密码。
				<p>如果是一个现有的文件，你可以跳过这一步而进入下一步。</p></li>

            <li>提交文件。例如：
<pre>cvs ci -m "message" faq.ru.xml</pre><p> 
				<b>message</b> 是一个关于你的操作的描述性信息。
				在提示的时候输入你的 SourceForge 密码。
				如果你修改过 Makefile 文件（例如，你在里面添加了你的语言），不要忘记也要提交它。</p></li>

            <li>现在运行
<pre>make &amp;&amp; make install</pre></li>

            <li>进入网站 XML 代码树的目录中，例如：
<pre>cd ~/Documents/Fink-i18n/xml</pre> 
				<p>上面假设你把你的 <code>xml</code> 代码树建立在你主目录下的 <code>Documents/Fink-i18n/</code> 文件夹下。</p></li>

            <li>如果 XML 是一个新文件，你需要把它先添加到 CVS 中。
            例如，如果你在翻译 FAQ 部分，那么，你需要运行：
<pre>cvs add web/faq/index.en.php web/faq/general.ru.php \
web/faq/relations.ru.php web/faq/usage-fink.ru.php \
web/comp-general.ru.php web/faq/comp-packages.ru.php \
web/faq/usage-general.ru.php web/faq/usage-packages.ru.php \
web/faq/upgrade-fink.ru.php web/faq/mirrors.ru.php \
web/faq/faq.ru.html web/faq/header.ru.inc \
scripts/installer/dmg/faq.ru.html</pre>
				对于其它文档，文件当然会不同──你应该添加
				<code>make install</code> 命令所新产生的和你语言有关的文件。</li>
				<li>不要忘记添加和提交你所创建的所有文件（它们可能还包括 constants.xx.inc，header.xx.inc，nav.xx.inc，等等）
          <p>如果这些文件原来已经有，你可以跳过这一步。</p></li>

            <li>提交整个文件树：
<pre>cvs ci -m "message"</pre> 
				<p>这里 <b>message</b> 也是一个描述性的日志信息（你可能会使用你提交 XML 文件相同的信息）。
				在提示的时候输入你的 SourceForge 密码。</p>
				<p>要分两次进行 commit 的原因是只有这样才能在生成的网页上正确显示修改时间和最后修改者的名字。</p></li>
          </ol></li>
      </ul>
    

    <h2><a name="website">2.10 更新我们的网站</a></h2>
      

      <p>想现在我们的网站上就看到你的成果吗？你只需要这样做：</p>

      <ol>
        <li>打开一个终端程序</li>

        <li>用 ssh 登录网页服务器：
<pre>ssh username@shell.sourceforge.net</pre>
			你会需要输入你的 SourceForge 密码。</li>

        <li>进入包含我们网页文件的目录：
<pre>cd /home/groups/f/fi/fink/htdocs</pre></li>

        <li>根据 CVS 的内容更新网页：
        <pre>./update.sh</pre></li>

        <li>从服务器上注销：
        <pre>exit</pre></li>

        <li>检查你的成果：
        <pre>open http://fink.sourceforge.net/</pre></li>
      </ol>
    
  <p align="right">
Next: <a href="procedure.php?phpLang=zh">3 更新文档的流程</a></p>

<? include_once "footer.inc"; ?>
