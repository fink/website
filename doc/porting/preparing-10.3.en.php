<?
$title = "Porting - Preparing for 10.3";
$cvs_author = 'Author: dmacks';
$cvs_date = 'Date: 2005/08/08 02:59:00';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Porting Contents"><link rel="next" href="preparing-10.4.php?phpLang=en" title="Preparing for 10.4"><link rel="prev" href="preparing-10.2.php?phpLang=en" title="Preparing for 10.2">';


include_once "header.en.inc";
?>
<h1>Porting - 5. Preparing for 10.3</h1>



<h2><a name="perl">5.1 Perl</a></h2>

  <p>
    In OS X 10.2, <code>/usr/bin/perl</code> was perl 5.6.0
    and the architecture string was "darwin". In OS X
    10.3, <code>/usr/bin/perl</code> was upgraded to perl
    5.8.1 and the architecture string was changed to
    "darwin-thread-multi-2level". These changes <b>probably</b> do
    not affect ordinary uses of the perl executable for package
    creation since each perl executable knows where to find its own modules.
    Maintainers of perl-module ("-pm") packages who follow the current
    <a href="http://fink.sourceforge.net/packaging/policy.php#perlmods">Perl
    Modules packaging policy</a> and are careful to follow the
    <code>CompileScript</code> and <code>InstallScript</code>
    documentation will already have things set up correctly.
  </p>



<h2><a name="typedef">5.2 New symbol definitions</a></h2>

  <p>
    Starting in Mac OS X 10.3, there is now always a complete
    definition for the <code>socklen_t</code> type. To get this
    typedef defined, you may need to add to your program:
  </p>
  <pre>
#include &lt;sys/types.h&gt;
#include &lt;sys/socket.h&gt;
  </pre>



<h2><a name="system-libs">5.3 New builtin system libraries</a></h2>

  <p>
    Mac OS X 10.3 includes several libraries that were not in previous
    system releases, and so were provided as fink packages:
  </p>

  <table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Field</th><th align="left">Value</th></tr><tr valign="top"><td>libpoll</td><td>
	<p>
	  The files <code>/usr/lib/libpoll.dylib</code> and
	  <code>/usr/include/poll.h</code> are now included,
	  however the OS X-supplied implementation of this library is
	  not complete. If it is sufficient for your purposes, you can
	  remove dependencies on the Fink "libpoll" and
	  "libpoll-shlibs" packages. The library code is
	  actually incorporated into libSystem, which is automatically
	  linked. That means that <code>-lpoll</code> is not necessary
	  if you wish to use the OS X implementation. Be aware that OS
	  X supplies a <code>libpoll.dylib</code>, so
	  <code>-lpoll</code> may give different results depending on
	  whether you have the Fink "libpoll" package
	  installed or not.
	</p>
      </td></tr><tr valign="top"><td>libdl</td><td>
	<p>
	  The files <code>/usr/lib/libdl.dylib</code>
	  and <code>/usr/include/dlfcn.h</code> are now included, so you should
	  not need dependencies on the Fink "dlcompat",
	  "dlcompat-dev", and "dlcompat-shlibs" packages. The library
	  code is actually incorportated into libSystem, which is
	  automatically linked. That means that <code>-ldl</code> is
	  not necessary (but has no effect if used).
	</p>
      </td></tr><tr valign="top"><td>GNU getopt</td><td>
	<p>
	  This library, including the <code>getopt_long()</code>
	  function, has been incorportated into libSystem and
	  <code>/usr/include/getopt.h</code>, so you may not
	  need to use the Fink "libgnugetopt" and
	  "libgnugetopt-shlibs" packages. Because libSystem is
	  automatically linked and <code>/usr/include</code>
	  is automatically searched for headers, you could remove any
	  <code>-lgnugetopt</code>
	  and <code>-I/sw/include/gnugetopt</code> flags that were
	  manually added in order to access Fink's
	  "libgnugetopt".
	</p>
      </td></tr></table>

  <p>
    When migrating a package to OS X 10.3, try to remove these
    deprecated dependencies, as those packages may be removed from these
    newer package trees in the future. This means you will need a separate
    package description file for each tree. As always,
    the <code>Revision</code> must be increased when making changes to
    a package. In this manner, a user who upgrades from OS X 10.2 to
    10.3 will see 10.3-specific packages as "newer" than his
    existing 10.2 ones. By convention, the <code>Revision</code>
    should be increased by 10 when changes are made for migration to a
    higher tree inn order to leave space for the lower-tree package to be
    updated in the future.
  </p>

  <p>
    When testing a migrated package, make sure to uninstall the
    packages whose <code>BuildDepends</code> you removed. Otherwise
    the compiler may still link the Fink-supplied libraries.
  </p>



<p align="right"><? echo FINK_NEXT ; ?>:
<a href="preparing-10.4.php?phpLang=en">6. Preparing for 10.4</a></p>
<? include_once "../../footer.inc"; ?>


