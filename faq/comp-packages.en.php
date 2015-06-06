<?php
$title = "F.A.Q. - Compiling (2)";
$cvs_author = 'Author: alexkhansen';
$cvs_date = 'Date: 2015/06/06 19:19:29';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="usage-general.php?phpLang=en" title="Package Usage Problems - General"><link rel="prev" href="comp-general.php?phpLang=en" title="Compile Problems - General">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 7. Compile Problems - Specific Packages</h1>
    
    
    <a name="libgtop">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.1: A package fails to build with errors involving
        <code>sed</code>.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> This can happen if your login script (e.g. <code>~/.cshrc</code>)
        does something that writes to the terminal, e.g "<code>echo
        Hello</code>" or <code>xttitle</code>. To get rid of the problem, the
        easy solution is to comment out the offending lines.</p><p>If you want to keep the echo, then you can do something like the
        following:</p><pre>if ( $?prompt) then 
	echo Hello 
endif</pre></div>
    </a>
  <a name="Leopard-libXrandr">
    <div class="question"><p><b><?php echo FINK_Q ; ?>7.2: I can't install <b>gtk+2</b> on OS 10.5</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Typically this involves missing libraries, such as:   <code>/usr/X11/lib/libXrandr.2.0.0.dylib</code> or 
    <code>/usr/X11/lib/libXdamage.1.1.0.dylib</code> (or other versions of libraries in
    <code>/usr/X11/lib/</code>).</p><p>The current wisdom on the best
    fix for such an issue is to install Xcode 3.1.3 or later.</p></div>
  </a>
  <a name="xml-sax-expat">
    <div class="question"><p><b><?php echo FINK_Q ; ?>7.3: I get errors involving <code>_Perl_Gthr_key_ptr</code> when installing an xml-sax-pm package</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> If you get an error that looks similar to:</p><pre>
update-perl5123-sax-parsers: adding Perl SAX parser
module info file of XML::SAX::Expat...
dyld: lazy symbol binding failed: Symbol not found:
_Perl_Gthr_key_ptr
  Referenced from: /sw/lib/perl5/5.12.3/darwin-
  thread-multi-2level/auto/XML/Parser/Expat/Expat.bundle
  Expected in: flat namespace
	</pre><p>this is usually due to a build picking up a different <code>perl5.12</code> executable
	than the system's (or <code>perl5.10.0</code>, or <code>perl5.8.8</code>, depending on your OS version).</p><p>You can verify this by running:</p><pre>
type -a perl5.12
	</pre><p>if you're using the <code>bash</code> shell, or</p><pre>
where perl5.12
	</pre><p>if you're using <code>tcsh</code> (and replace <code>perl5.12</code> appropriately
	for your situation).</p><p>To work around this issue, temporarily rename the non-system <code>perl5.12</code> while
	you are building with Fink.</p></div>
  </a>
  <a name="malloc-symlink">
    <div class="question"><p><b><?php echo FINK_Q ; ?>7.4: I can't build a Fink <code>gcc</code> package due to "conflicting types for 'pointer_t'"</b></p></div>
    <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Such errors typically look like:</p><pre>
../../gcc-4.6.3/gcc/fortran/module.c:110:1:
error: conflicting types for 'pointer_t'
/usr/include/mach/vm_types.h:40:26:
note: previous declaration of 'pointer_t' was here
make[3]: *** [fortran/module.o] Error 1
      </pre><p>This is associated with someone having unnecessarily added a
      <code>/usr/include/malloc.h</code><code>-&gt;</code><code>/usr/include/malloc/malloc.h</code>
      symlink.  Get rid of that.</p><p>
	On OS X, <code>#include &lt;stdlib.h&gt;</code> should normally be used
	in place of <code>#include &lt;malloc.h&gt;.</code>
      </p></div>
  </a>
    <a name="all-others">
      <div class="question"><p><b><?php echo FINK_Q ; ?>7.5: I'm having issues with a package that isn't listed here.</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Since package problems tend to be transient, we've decided to put them
      up on the Fink wiki.  Check the <a href="http://wiki.finkproject.org/index.php/Fink:Package_issues"> Package issues page</a>.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="usage-general.php?phpLang=en">8. Package Usage Problems - General</a></p>
<?php include_once "../footer.inc"; ?>


