<p>
This directory holds the official binary distribution of <a
href="http://fink.sourceforge.net/">Fink</a> and the corresponding
source code.
The basic structure is the same as that of the Debian GNU/Linux
archive.
This is because Fink uses Debian's tools (dpkg, apt) for binary
package management.
</p>
<p>
Inside each tree (e.g. dists/current/main) there are three
directories.
"binary-darwin-powerpc" contains the binary packages (.deb files).
"source" contains the corresponding original source.
"finkinfo" contains the patches and build information used to build
the packages.
All three may have subdirectories denoting sections.
</p>
<p>
You can find a graphical installer for Mac OS X in the "install"
directory.
Other installation methods may follow in the future.
</p>
<p>
You are welcome to mirror this distribution as long as you follow
some rules.
Detailed instructions are at
<a href="http://fink.sourceforge.net/bindist/mirroring.php">http://fink.sourceforge.net/bindist/mirroring.php</a>.
</p>
