<?
$title = "Porting - Shared Code";
$cvs_author = 'Author: jeff_yecn';
$cvs_date = 'Date: 2004/03/11 23:30:29';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="Porting Contents"><link rel="next" href="libtool.php?phpLang=en" title="GNU libtool"><link rel="prev" href="basics.php?phpLang=en" title="Basics">';

include_once "header.inc";
?>

<h1>Porting - 2 Shared Code</h1>
		
		

		<h2><a name="lib-and-mod">2.1 Shared Libraries vs. Loadable Modules</a></h2>
			
			

			<p>One Mach-O feature that hits many people by surprise is the strict distinction between shared libraries and dynamically loadable modules. On ELF systems both are the same; any piece of shared code can be used as a library and for dynamic loading.</p>

			<p>Mach-O shared libraries have the file type MH_DYLIB and carry the extension <code>.dylib</code>. They can be linked against with the usual static linker flags, e.g. <code>-lfoo</code> for libfoo.dylib. However, they can not be loaded as a module. (Side note: Shared libraries can be loaded dynamically through an API. However, that API is different from the API for bundles and the semantics make it useless for an dlopen() emulation. Most notably, shared libraries can not be unloaded.)</p>

			<p>Loadable modules are called "bundles" in Mach-O speak. They have the file type MH_BUNDLE. Since no component involved cares about it, they can carry any extension. The extension <code>.bundle</code> is recommended by Apple, but most ported software uses <code>.so</code> for the sake of compatibility. Bundles can be dynamically loaded and unloaded via dyld APIs, and there is a wrapper that emulates <code>dlopen()</code> on top of that API. It is not possible to link against bundles as if they were shared libraries. However, it is possible that a bundle is linked against real shared libraries; those will be loaded automatically when the bundle is loaded.</p>

		

		<h2><a name="version">2.2 Version Numbering</a></h2>
			

			<p>On an ELF system, version numbers are usually appended to the file name of the shared library, e.g. <code>libqt.so.2.3.0</code>. On Darwin, the version numbers are placed between the library name and the extension, e.g. <code>libqt.2.3.0.dylib</code>. Note that this allows you to request a specific version of the library when linking, using <code>-lqt.2.3.0</code> for the example above.</p>

			<p>When creating a shared library, you can specify a name to be used when searching for the library at run time. This is usual practice and allows several major versions of a library to be installed at the same time. On ELF systems this is called the <code>soname</code>. What's different on Darwin is that you can (and should) specify a full path along with the file name. This eliminates the need for "rpath" options and the ldconfig/ld.so.cache system. To use a library that is not yet installed, you can set the DYLD_LIBRARY_PATH environment variable; see the dyld man page for details.</p>

			<p>The Mach-O format also offers real minor version checking, unknown on ELF systems. Every Mach-O library carries two version numbers: a "current" version and a "compatibility" version. Both version numbers are written as three numbers separated by dots, e.g. 1.4.2. The first number must be non-zero. The second and third number can be omitted and default to zero. When no version is specified, it will default to 0.0.0, which is some kind of wildcard value.</p>

			<p>The "current" version is for informational purposes only. The "compatibility" version is used for checking as follows. When an executable is linked, the version information from the library is copied into the executable. When the executable is run, that version information is checked against the used library. dyld generates a run time error and terminates the program unless the used library version is equal to or newer than the one used during linking.</p>

		

		<h2><a name="cflags">2.3 Compiler Flags</a></h2>
			

			<p>The generation of position-independent code (PIC) is the default is the default on Darwin. Actually, PowerPC code is position-independent by design, so there is no performance or space penalty involved. So, you don't need to specify a PIC option when compiling code for a shared library or module. However, the linker doesn't allow "common" symbols in shared libraries, so you must use the <code>-fno-common</code> compiler option.</p>

		

		<h2><a name="build-lib">2.4 Building a Shared Library</a></h2>
			

			<p>To build a shared library, you invoke the compiler driver with the <code>-dynamiclib</code> option. This is best demonstrated by a comprehensive example. We'll build a library called libfoo, composed of the source files source.c and code.c. The version number is 2.4.5, where 2 is the major revision (incompatible API change), 4 is the minor revision (backwards-compatible API change) and 5 is the bugfix revision count (some people call this the "teeny" revision, it denotes fully compatible changes). The library depends on no other shared libraries and will be installed in /usr/local/lib.</p>

<pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -dynamiclib -install_name /usr/local/lib/libfoo.2.dylib \
 -compatibility_version 2.4 -current_version 2.4.5 \
 -o libfoo.2.4.5.dylib source.o code.o
rm -f libfoo.2.dylib libfoo.dylib
ln -s libfoo.2.4.5.dylib libfoo.2.dylib
ln -s libfoo.2.4.5.dylib libfoo.dylib</pre>
<p>
Note which parts of the version are used where.
Also note that the static linker will use the libfoo.dylib symlink,
while the dynamic linker will use the libfoo.2.dylib symlink.
It is possible to point these symlinks at different minor revisions of
the library.
</p>



<h2><a name="build-mod">2.5 Building a Module</a></h2>
<p>
To build a loadable module, you invoke the compiler driver with the
<code>-bundle</code> option.
If the module uses symbols from the host program, you'll have to
specify <code>-undefined suppress</code> to allow undefined symbols,
and <code>-flat_namespace</code> along with it to make the new linker
in Mac OS X 10.1 happy.
A comprehensive example:
</p>
<pre>cc -fno-common -c source.c
cc -fno-common -c code.c
cc -bundle -flat_namespace -undefined suppress \
 -o mymodule.so source.o code.o</pre>
<p>
Note that no version numbering is used.
It is possible to use it in theory, but in practice it's pointless.
Also note that there are no naming restrictions for bundles.
Some packages prefer to prepend a "lib" anyway because some other
systems require it; this is harmless.
</p>



<p align="right">
Next: <a href="libtool.php?phpLang=en">3 GNU libtool</a></p>

<? include_once "footer.inc"; ?>
