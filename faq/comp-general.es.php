<?
$title = "P.M.F. - Compiling (1)";
$cvs_author = 'Author: zifra';
$cvs_date = 'Date: 2004/11/30 17:27:06';
$metatags = '<link rel="contents" href="index.php?phpLang=es" title="P.M.F. Contents"><link rel="next" href="comp-packages.php?phpLang=es" title="Compile Problems - Specific Packages"><link rel="prev" href="usage-fink.php?phpLang=es" title="Installing, Using and Maintaining Fink">';


include_once "header.es.inc";
?>
<h1>P.M.F. - 6. Compile Problems - General</h1>
    
    
    <a name="compiler">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.1: Un script de configuración se queja que no puede encontrar un "cc aceptable". ¿Qué es eso?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Read the docs next time. To compile packages from source, you must
        install the Developer Tools, which among other stuff contains the C
        compiler, <code>cc</code>.</p></div>
    </a>
    <a name="cvs">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.2: Cuando quiero hacer un "fink selfupdate-cvs" Me aparece este mensaje: "cvs: Command not found."</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You need to install the Developer Tools.</p></div>
    </a>
    <a name="missing-make">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.3: Me esta apareciendo un mensaje de error involucrando <code>make</code>.
        </b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> if your message is of the form</p><pre>make: command not found</pre><p>or</p><pre>Can't exec "make": 
No such file or directory at /sw/lib/perl5/Fink/Services.pm line 190.</pre><p>It means you need to install the Developer Tools.</p><p>On the other hand, if your error message looks like</p><pre>make: illegal option -- C</pre><p>then you've replaced the GNU version of the <code>make</code>
        utility installed as part of the Developer Tools with a BSD version of
        make. Many packages rely on special features only supported by GNU
        make. Make sure that <code>/usr/bin/make</code> is a symlink to
        <code>gnumake</code>, not <code>bsdmake</code>. Furthermore, make sure
        that <code>/usr/local/bin/</code> does not contain another copy of
        <code>make</code>.</p></div>
    </a>
    <a name="head">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.4: Me esta apareciendo un mensaje de uso extraño del comando head. ¿Qué se ha roto?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you're seeing this:</p><pre>Unknown option: 1 Usage: head [-options] &lt;url&gt;...</pre><p>followed by a list of option descriptions, you have a broken
        <code>head</code> executable. This happens when you install the Perl
        libwww library on an HFS+ system volume. It tries to create a new
        command <code>/usr/bin/HEAD</code>, which overwrites the existing
        <code>head</code> command because the file system is case-insensitive.
        <code>head</code> is a standard command used in many shell scripts and
        Makefiles. You need to get the original <code>head</code> executable
        back if you want to use Fink.</p><p>The bootstrap script of the source release now checks for this, but
        you can still run into it if you use the binary release for first-time
        installation or install libwww after you installed Fink.</p><p>This problem has also been reported due to the installation of
        <code>/sw/bin/HEAD</code> (not by any Fink package). This is
        easier to solve: rename <code>/sw/bin/HEAD</code>.</p></div>
    </a>
    <a name="also_in">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.5: Cuando trato de instalar un paquete me aparece un mensaje con el error acerca de "sobreescribir un archivo que está en otro paquete".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This occasionally happens with splitoff packages (i.e. the ones
        with -dev, -shlibs, etc.) when a file gets moved from one part of the
        splitoff to another (e.g. from <code>foo</code> to
        <code>foo-shlibs</code>. What you can do is overwrite the file with
        that from the package you are trying to install (since they are
        nominally the same):</p><pre>sudo dpkg -i --force-overwrite <b>filename</b>
        </pre><p>where <b>filename</b> is the .deb file corresponding to the
        package that you are trying to install.</p></div>
    </a>
    <a name="weak_lib">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.6: Después de que instalé  las Herramientas de Desarrollo de Diciembre del 2002 me aparece un mensaje sobre "librerías débiles" ("weak libraries").
</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is new with the December 2002 Tools. You may occasionally see
        messages like (choosing libgdk-pixbuf as an example):</p><pre>ld: warning dynamic shared library:
/sw/lib/libgdk-pixbuf.dylib not made a weak library in output with
MACOSX_DEPLOYMENT_TARGET environment variable set to: 10.1</pre><p>You may regard these as harmless. If you are curious, read through
        the release notes in the developer documentation directory, especially
        GCC's and the linker's, for more info. It essentially has to do with
        whether missing symbols at runtime is considered a fatal error on
        startup or not, for applications that use weak references.</p></div>
    </a>
    <a name="mv-failed">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.7: ¿Qué quiere decir "execution of mv failed, exit code 1" cuando trato de instalar un paquete?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you have StuffIt Pro installed, it could be that you have
        "Archive Via Real Name" mode enabled. Check for a StuffIt preference
        pane in the System Preferences tool, and disable "ArchiveViaRealName"
        if it's enabled. It contains a buggy reimplementation of a few
        important system calls that will cause a number of strange and
        transient errors such as this.</p><p>Otherwise, am <code>mv</code> error typically means that
        another error happened earlier in the build, but the build process
        didn't stop. To track down the offending file(s), search in the output
        of the build for the nonexistent file, e.g. if you have something
        like:</p><pre>mv /sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib \
/sw/src/root-foo-shlibs-0.1.2-3/sw/lib/ 
mv: cannot stat `/sw/src/root-foo-0.1.2-3/sw/lib/libbar*.dylib': 
No such file or directory 
### execution of mv failed, exit code 1 
Failed: installing foo-0.1.2-3 failed</pre><p>then you should look for <code>libbar</code> somewhere
        further back in the output of your build attempt.</p></div>
    </a>
    <a name="node-exists">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.8: No puedo instalar o actualizar un paquete porque me aparece un mensaje de que un "node" ya existe.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> These errors look something like this:</p><pre>Failed: Internal error: node for system-xfree86 already exists</pre><p>This problem is that the dependency engine is confused, due to
        changes in some of the package info files. To fix it:</p><ul>
          <li>
            <p>Remove the offending package by force, e. g.</p>
            <pre>sudo dpkg -r --force-all system-xfree86</pre>
            <p>for the example given above.</p>
          </li>
          <li>
            <p>Try again to install | upgrade. At some point a "virtual
          dependency" prompt will come up that includes the package you just
          removed. Select it, and it will be reinstalled during your
          build.</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local-libs">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.9: He escuchado que las librerías instaladas en /usr/local/lib a veces causan problemas de compilación para Fink, ¿es cierto?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is a frequent source of problems, because the package
        configuration script finds libraries under
        <code>/usr/local/lib</code> before searching in the Fink path.
        If you are having problems with a build that aren't covered by another
        FAQ entry, you should check whether you have libraries in
        <code>/usr/local/lib</code>. If so, then try renaming
        <code>/usr/local</code> to something else, e.g.:</p><pre>sudo mv /usr/local /usr/local.moved</pre><p>do your build, and then put <code>/usr/local</code>
        back:</p><pre>sudo mv /usr/local.moved /usr/local</pre></div>
    </a>
    <a name="toc-out-of-date">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.10: Cuando trato de instalar un paquete, me aparece un mensaje que la "tabla de contenidos" ("table of  contents") está desactualizada. ¿Qué necesito hacer?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> The output hints at what to do. The message is usually something
        like:</p><pre>ld: table of contents for archive: 
/sw/lib/libintl.a is out of date; 
rerun ranlib(1) (can't load from it)</pre><p>What you need to do is run ranlib (as root) on whatever library is
        causing the problem. As an example, for the case above, you would
        run:</p><pre>sudo ranlib /sw/lib/libintl.a</pre></div>
    </a>
    <a name="fc-atlas">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.11: Fink Commander falla cuando trato de instalar atlas.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This happens because one of the steps in the build of
        <code>atlas</code> sends a prompt to the user that Fink Commander
        doesn't display. You'll have to use <code>fink install atlas</code>
        instead.</p></div>
    </a>
    <a name="basic-headers">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.12: Me aparece un mensaje que dice que me falta stddef.h. ¿Dónde lo puedo encontrar?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This header, and many others, are provided by the DevSDK package of
        the Developer Tools. Check whether
        <code>/Library/Receipts/DevSDK.pkg</code> exists on your
        system. If not, then run the Dev Tools Installer again, and install
        the DevSDK package using a Custom Install.</p></div>
    </a>
    <a name="multiple-dependencies">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.13: No puedo actualizar porque Fink dice "unable to resolve version conflict on multiple dependencies" </b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> To get around this, try updating a single package, then try to use
        "fink update-all" again. If you still get the message, repeat the
        process.</p></div>
    </a>
    <a name="dpkg-parse-error">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.14: No puedo instalar nada porque me aparece:  "dpkg: parse error, in file  `/sw/var/lib/dpkg/status'"!</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This means that somehow your dpkg database got corrupted, usually
        from a crash or some other unrecoverable error. You can fix it by
        copying the previous version of the database, like so:</p><pre>sudo cp /sw/var/lib/dpkg/status-old /sw/var/lib/dpkg/status</pre><p>You may need to re-install the last couple of packages you
        installed before the problem started occurring.</p></div>
    </a>
    <a name="freetype-problems">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.15: Me aparecen errores involucrando a freetype.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> There are several varieties of such errors. If your error looks
        like:</p><pre>/sw/include/pango-1.0/pango/pangoft2.h:52: 
error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:57:
error: parse error before '*' token
/sw/include/pango-1.0/pango/pangoft2.h:61: 
error: parse error before '*' token 
/sw/include/pango-1.0/pango/pangoft2.h:86: 
error: parse error before "pango_ft2_font_get_face"
/sw/include/pango-1.0/pango/pangoft2.h:86: 
warning: data definition has no type or storage class 
make[2]: *** [rsvg-gz.lo] Error 1
make[1]: *** [all-recursive] Error 1 
make: *** [all-recursive-am] Error 2 
### execution of make failed, exit code 2 
Failed: compiling librsvg2-2.4.0-3 failed</pre><p>or</p><pre>In file included from vteft2.c:32: 
vteglyph.h:64: error:
parse error before "FT_Library" 
vteglyph.h:64: warning: 
no semicolon at end of struct or union vteft2.c: 
In function `_vte_ft2_get_text_width': 
vteft2.c:236: error: 
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_get_text_height':
vteft2.c:244: error: 
dereferencing pointer to incomplete type
vteft2.c: In function `_vte_ft2_get_text_ascent': 
vteft2.c:252: error:
dereferencing pointer to incomplete type 
vteft2.c: In function `_vte_ft2_draw_text': 
vteft2.c:294: error: 
dereferencing pointer to incomplete type 
vteft2.c:295: error: 
dereferencing pointer to incomplete type
make[2]: *** [vteft2.lo] Error 1 
make[1]: *** [all-recursive] Error 1 
make: *** [all] Error 2 
### execution of make failed, exit code 2
Failed: compiling vte-0.11.10-3 failed</pre><p>or</p><pre>checking for freetype-config.../usr/X11R6/bin/freetype-config 
checking For sufficiently new FreeType (at least 2.0.1)... no 
configure: error: pangoxft 
Pango backend found but did not find freetype libraries 
make: *** No targets specified and no makefile found. Stop. 
### execution of LD_TWOLEVEL_NAMESPACE=1 failed, exit code 2 
Failed: compiling gtk+2-2.2.4-2 failed</pre><p>the problem is due to confusion between headers from the
        <code>freetype</code> | <code>freetype-hinting</code> package and the
        <code>freetype2</code> headers that are included with X11 |
        XFree86.</p><pre>fink remove freetype freetype-hinting</pre><p>will remove whichever variant you have installed. On the other
        hand, if your error looks like:</p><pre>ld: Undefined symbols: _FT_Access_Frame</pre><p>this is typically due to a residual file from a prior installation
        of X11. Reinstall the X11 SDK. Finally, if you get an error like</p><pre>dyld: klines Undefined symbols: /sw/lib/libqt-mt.3.dylib 
undefined reference to _FT_Access_Frame</pre><p>then you probably have a binary version that built fine with
        <code>gcc3.3</code> on Jaguar but doesn't work on Panther. This has
        now been updated, so you you just need to update your packages, e.g.
        via <code>sudo apt-get update ; sudo apt-get dist-upgrade</code>.</p></div>
    </a>
    <a name="dlfcn-from-oo">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.16: Me aparecen errores al compilar involucrando "Dl info".</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> If you have an error that looks like this</p><pre>unix_dl.c: In function `rep_open_dl_library':
unix_dl.c:328: warning: assignment discards qualifiers from pointer target type 
unix_dl.c: In function `rep_find_c_symbol': 
unix_dl.c:466: error: `Dl_info' undeclared (first use in this function)
unix_dl.c:466: error: (Each undeclared identifier is reported only once 
unix_dl.c:466: error: for each function it appears in.)
unix_dl.c:466: error: parse error before "info" 
unix_dl.c:467: error: `info' undeclared (first use in this function) 
make[1]: *** [unix_dl.lo] Error 1</pre><p>then most likely you have a header file,
        <code>/usr/local/include/dlfcn.h</code>, that is incompatible with
        Panther. Move it out of the way.</p><p>This usually is installed by Open Office, and you should replace
        this header file, as well as the library
        <code>/usr/local/lib/libdl.dylib</code>, with symbolic links to
        Panther's builtin files</p><pre>sudo ln -s /usr/include/dlfcn.h /usr/local/include/dlfcn.h
sudo ln -s /usr/lib/libdl.dylib /usr/local/lib/libdl.dylib</pre></div>
    </a>
    <a name="gcc2">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.17: Fink dice que me falta el <code>gcc2</code>, pero yo no creo haberlo instalado.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> This is because <code>gcc2</code> is a virtual package to
        indicate the presence of gcc-2.95 on your system. Install the gcc2.95
        package from the XCode Tools (earlier OS versions have gcc-2.95 as
        part of their main Developer Tools installation.</p></div>
    </a>
    <a name="system-java">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.18: Fink dice <code>Failed: Can't resolve dependency "system-java14-dev"</code>, pero ese paquete no existe.</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> That's because it's a virtual package.  This type of error occurs when Java gets updated by Software Update:  the header files get removed, which causes the -dev package not to be generated.</p><p>You need to download the appropriate <code>Java Developer Tools</code> package from <a href="http://connect.apple.com">Apple</a>.  In this specific case that's the <code>Java 1.4.2 Developer Tools</code>.</p></div>
    </a>
    <a name="dpkg-split">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.19: Cualquier cosa que trato de instalar siempre me aparece: <q>dpkg (subprocess): failed to exec dpkg-split to see if it's part of a multiparter: No such file or directory.</q> ¿Cómo soluciono esto?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> Generally, this can be fixed by setting your environment up correctly, cf. <a href="usage-fink.php?phpLang=es#fink-not-found">this FAQ entry</a>.</p></div>
    </a>
    <a name="xml-parser">
      <div class="question"><p><b><? echo FINK_Q ; ?>6.20: Me aparece el mensaje siguiente: <q>configure: error: XML::Parser perl module is required for intltool.</q> ¿Qué debo hacer?</b></p></div>
      <div class="answer"><p><b><? echo FINK_A ; ?>:</b> You need to make sure that you have the right variant of the xml-parser-pm package to match the Perl version for your system.  For example, if you're on Panther you should have <code>xml-parser-pm581</code> rather than <code>xml-parser-pm560</code> (you may also have the <code>xml-parser-pm</code> placeholder), since you have <code>Perl-5.8.1</code> rather than <code>Perl-5.6.0</code>.</p></div>
    </a>
  <p align="right"><? echo FINK_NEXT ; ?>:
<a href="comp-packages.php?phpLang=es">7. Compile Problems - Specific Packages</a></p>
<? include_once "../footer.inc"; ?>


