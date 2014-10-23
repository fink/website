<?php
$title = "Porting - Preparing for 10.4";
$cvs_author = 'Author: gecko2';
$cvs_date = 'Date: 2012/11/11 15:20:16';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Porting Contents"><link rel="prev" href="preparing-10.3.php?phpLang=en" title="Preparing for 10.3">';


include_once "header.en.inc";
?>
<h1>Porting - 6. Preparing for 10.4</h1>



<h2><a name="perl">6.1 Perl</a></h2>

  <p>
    <code>/usr/bin/perl</code> is now perl 5.8.6; the
    architecture string is still "darwin-thread-multi-2level".
  </p>



<h2><a name="typedef">6.2 New symbol definitions</a></h2>

  <p>
    Mac OS X 10.4 has changed the types of many symbols. If you
    previously set a type explicitly, for example,
    defining <code>socklen_t</code> as <code>int</code>, that
    definition may no longer be correct.
  </p>



<h2><a name="system-libs">6.3 New builtin system libraries</a></h2>

  <p>
    The <code>poll()</code> function in Mac OS X 10.3 was actually an
    emulation implemented using <code>select()</code>. In Mac OS X
    10.4, <code>poll()</code> is a real function implemented in the
    kernel, however it is broken when used with sockets. Consider
    ignoring the system's <code>poll()</code> completely. Fink's glib2
    package has been patched to use a fully functional emulation, so
    it is safe to use that library's implementation of poll-like
    functions.
  </p>




<?php include_once "../../footer.inc"; ?>


