<?
$title = "Paquets - Règles";
$cvs_author = 'Author: michga';
$cvs_date = 'Date: 2004/03/27 10:08:26';
$metatags = '<link rel="contents" href="index.php?phpLang=fr" title="Paquets Contents"><link rel="next" href="fslayout.php?phpLang=fr" title="Filesystem Layout"><link rel="prev" href="format.php?phpLang=fr" title="Descriptions de paquets">';

include_once "header.inc";
?>

<h1>Paquets - 3 Règles de distribution des paquets</h1>



<h2><a name="licenses">3.1 Licences de paquets</a></h2>
<p>
Les paquets inclus dans Fink ont différents types de licences.
La plupart d'entre elles stipulent une restriction sur la redistribution des sources complètes et particulièrement sur la distribution des binaires.
Certains paquets ne peuvent être inclus dans la distribution binaire de Fink à cause de ces licences restrictives.
C'est pourquoi il est essentiel que les mainteneurs de paquets vérifient,  scrupuleusement, les licences de leurs paquets.
</p>
<p>
Chaque paquet distribué en tant que binaire doit contenir une copie de la licence.
Elle doit être installée dans le répertoire de documentation,
c'est à dire dans <code>%p/share/doc/%n</code>.
(Dans InstallScript, il faut, évidemment, utiliser %i au lieu de %p.
Le champ DocFiles gère les détails automatiquement.)
S'il n'y a pas de licence explicite dans le source original, placez un fichier texte contenant une note à propos du statut du paquet.
La plupart des licences requièrent que celle-ci accompagne toute distribution.
La règle de Fink est de toujours faire ainsi, même si ce n'est pas explicitement requis.
</p>
<p>
Pour automatiser le plus possible la maintenance de la distribution binaire, tout paquet distribué doit avoir un champ <code>License</code>.
Ce champ indique la nature de la licence et est utilisé pour décider
quels paquets font partie de la distribution et quels paquets doivent en être exclus.
Le champ ne peut exister que si les termes réels de la licence sont inclus dans le paquet binaire, comme expliqué ci-dessus.
</p>
<p>
Pour que le champ <code>License</code> ait une utilité, n'utilisez qu'une seule des valeurs prédéfinies suivantes.
Si vous construisez un paquet qui ne rentre pas dans ces catégories, demandez de l'aide sur la liste des développeurs.
</p>
<ul>

<li><code>GPL</code> - la licence générale publique GNU.
Cette licence requiert que le source soit accessible au même endroit que le binaire.</li>

<li><code>LGPL</code> - la licence publique GNU moins générale.
Cette licence requiert que le source soit accessible au même endroit que le binaire.</li>

<li><code>GPL/LGPL</code> - c'est un cas spécial pour les paquets dans lesquels une partie est sous licence GPL (par exemple les exécutables) et une autre partie est sous licence LGPL (par exemple les librairies).</li>

<li><code>BSD</code> - pour les licences style BSD.
Ceci inclue la licence BSD dite "original", la licence BSD "modified" et la licence MIT. La licence Apache compte aussi parmi les licences BSD. Avec ces licences, la distribution du code source est optionnelle.
</li>

<li><code>Artistic</code> - pour la licence "Artistic" et ses dérivées.</li>

<li><code>Artistic/GPL</code> - licence duale, combinée Artistic/GPL.</li> 

<li><code>GNU Free Documentation License</code> et <code>Linux
Documentation Project</code> - si la documentation incluse dans un paquet l'est explicitement sous une de ces licences, alors ce sera indiqué par l'ajout de <code>/GFDL</code> ou <code>/LDP</code> au code de la licence, ce qui donne l'une des combinaisons autorisées suivantes : "GFDL",
"GPL/GFDL", "LGPL/GFDL", "GPL/LGPL/GFDL", "LDP", ou "GPL/LGPL/LDP".
</li>

<li><code>OSI-Approved</code> - pour les autres licences Open Source approuvées par l'Initiative Open Source (OSI) <a href="http://www.opensource.org/"></a>. L'une des règles de l'OSI est que la libre distribution de binaires et de sources est autorisée. Ce code peut aussi servir de cadre aux paquets à licence duale.</li>

<li><code>Restrictive</code> - pour les licences restrictives.
Utilisez ceci pour les paquets qui sont accessibles en tant que sources à usage libre auprès de l'auteur, mais dont la libre redistribution n'est pas autorisée. </li>

<li><code>Restrictive/Distributable</code> - pour des licences restrictives qui admettent une distribution des binaires et du source.
Utilisez ceci pour les paquets qui sont accessibles en tant que sources
auprès de l'auteur, autorisent la distribution du source et des binaires, mais ont des restrictions qui en font des licences non open-sources.</li>

<li><code>Commercial</code> - pour des licences restrictives de type commercial.
Utilisez ceci pour des paquets  de type commercial ( par exemple graticiels, partagiciels qui n'autorisent pas la libre redistribution du source ou des binaires.</li>

<li><code>Public Domain</code> - pour des paquets qui sont dans le domaine public, c'est-à-dire que l'auteur a abandonné ses droits sur le code. Ces paquets n'ont aucune licence d'aucune sorte et tout un chacun peut en faire ce que bon lui semble.</li>
</ul>


<h2><a name="prefix">3.2 Interférence avec le système de base</a></h2>
<p>
Fink est une distribution additionnelle qui est installée dans un répertoire distinct du système de base.
Il est essentiel qu'un paquet n'installe aucun fichier en dehors du répertoire de Fink.
</p>
<p>
Il peut y avoir des exceptions quand on ne peut faire autrement, par exemple avec XFree86.
Dans ce cas, le paquet doit tester l'existence de fichiers avant l'installation
et refuser de s'installer si cela amène à écraser des fichiers déjà existants.
Le paquet doit s'assurer que tous les fichiers qu'il aura installés en dehors 
du répertoire de Fink seront supprimés lorsque le paquet lui-même sera éliminé, ou que ces fichiers ne causeront aucun problème s'ils sont laissés sur place (c'est-à-dire qu'ils devront tester l'existence des binaires avant de les appeler, etc...).
</p>


<h2><a name="sharedlibs">3.3 Librairies partagées</a></h2>
<p>
Fink a de nouvelles règles en ce qui concerne les librairies partagées, règles qui prennent effet à compter de février 2002.
Cette partie de la documentation donne des explications sur la version 4 de ces règles, qui coïncide avec la publication de la distribution 0.5.0 de Fink.
Nous commencerons par un bref résumé, puis nous passerons à une revue de détails.
</p><p>
Tout paquet qui construit des librairies partagées et qui, soit (1) est placé  dans la branche stable, soit (2) est un nouveau paquet de Fink, doit gérer ses librairies partagées conformément aux règles de Fink. Ceci signifie :</p>
<ul>
<li>vérifier, à l'aide de <code>otool -L</code>, que le nom d'installation de chaque librairie, ses numéros de versions compatible et actuel sont corrects</li>
<li>mettre les librairies partagées dans un paquet séparé (exception faite pour les liens de libfoo.dylib vers nom d'installation), et inclure le champ <code>Shlibs</code> dans ce paquet</li>
<li>mettre les headers et les liens finaux venant de libfoo.dylib dans un paquet caractérisé par <code>BuildDependsOnly: True</code>, et prévoir qu'aucun autre paquet ne dépendra de lui.</li>
</ul>
<p>
Un mainteneur, qui a de bonnes raisons de s'écarter de ces règles et ne 
scinde pas le paquet, devra expliquer pourquoi dans le champ DescPackaging.
</p><p>
Pour certains paquets, tout peut être fait avec un paquet principal et un paquet -shlibs ; dans d'autres cas, vous aurez besoin d'un troisième paquet. Le nouveau champ <code>SplitOff</code> facilite ce processus.
</p><p>
When three packages are needed, there are two different ways they could be
named, depending on whether the libraries or the binaries
are the most important feature of
the package, or the binaries are the most important feature.  For option 1, 
use the layout:
</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>Shared libraries</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>Headers</p></td></tr><tr valign="top"><td><code>foo-bin</code></td><td><p>Binaries, etc.</p></td></tr></table>

<p>while for option 2, use the layout:</p>
<table border="0" cellpadding="0" cellspacing="10"><tr valign="bottom"><th align="left">Package</th><th align="left">Contents</th></tr><tr valign="top"><td><code>foo-shlibs</code></td><td><p>Shared libraries</p></td></tr><tr valign="top"><td><code>foo-dev</code></td><td><p>Headers</p></td></tr><tr valign="top"><td><code>foo</code></td><td><p>Binaries, etc.</p></td></tr></table>

<p>
With option 2 it is harder to upgrade an existing package:  at the same
time as you upgrade, 
you need to add <code>BuildDepends: foo-dev</code> to every
package which says <code>Depends: foo</code>.
One other upgrade issue to keep in mind: a package which indirectly depends
on your package (through another package as an intermediary) may need
to have <code>BuildDepends: foo</code> or <code>BuildDepends: foo-dev</code>
added to it to ensure a successful upgrade.  It is your responsibility
to make sure that these <code>BuildDepends</code> entries are added.
</p>
<p><b>The policy in detail</b></p>
<p>
We now discuss things in more detail, first discussing the policy as 
applied to newly ported software, and 
then turning to the question of upgrading existing fink packages.  For 
examples of the policy in action, see the  libpng, libjpeg  and 
libtiff packages.
</p><p>
Software which has been ported to Darwin should build shared libraries 
whenever possible.  (Package maintainers
are also free to build static libraries as well, if appropriate
for their packages; or they may submit packages containing only static
libraries if they wish.)
Whenever shared libraries are being built,
<b>two</b> closely related fink packages should be made, named foo 
and foo-shlibs.  The shared libraries go in foo-shlibs, and the header
files go in foo.  These two packages
can be made with a single .info file, using
the <code>SplitOff</code> field, as described below.  
(In fact, it is often necessary
to make more than two packages from the source, and this can be done
using <code>SplitOff2</code>, <code>SplitOff3</code>, etc.)
</p><p>
Each software package for which shared libraries can be built must have
a <b>major version number</b> N.  The major version number is only supposed
to change when a backwards-incompatible change in the library's API has been
made.  Fink uses the following naming convention: if the upstream name
of the package is bar, then the fink packages are called barN and 
barN-shlibs.  (This is only strictly applied to new packages, or when the 
major version number changes.)  For example, the major version number for
the pre-existing libpng package was 2, but recent versions of the
library have major version number 3.  So there are now four fink packages
to handle this: libpng, libpng-shlibs, libpng3, libpng3-shlibs.
Only one of libpng and libpng3 can be installed at any given time,
but libpng-shlibs and libpng3-shlibs can be installed at the same time.
(Note that only two .info files are required to build these four packages.)
</p><p>
The shared library itself and certain related files will be put into 
the package barN-shlibs; the "include" files and certain other files will
be put into the package barN.  There can be no overlapping files
between these two packages, and everything stored in barN-shlibs must have
a pathname which somehow includes the major version number N.  In many
instances, your package will need some files at runtime which are
typically installed into <code>%i/lib/bar/</code> or 
<code>%i/share/bar/</code> ; you should adjust the installation
paths to <code>%i/lib/bar/N/</code> or
<code>%i/share/bar/N/</code>.
</p><p>
All other packages which depend on bar, major version N, will be asked to
use the dependencies
</p>
<pre>
  Depends: barN-shlibs
  BuildDepends: barN
</pre>
<p>
Once this system is fully in place, it will not be permitted for 
another package to depend on barN itself.  (For backward compatibility,
such dependencies are allowed for pre-existing packages.)  This is
signaled to other developers by a boolean field
</p>
<pre>
  BuildDependsOnly: True
</pre>
<p>
within the package description for barN.
</p><p>
If your package includes both shared libraries and binary files, and
if the binary files need to be present at runtime (not just at build
time), then the binaries must be split off into a third package, which
could be called barN-bin.  Other packages are allowed to depend on
barN-bin as well as barN-shlibs.
</p><p>
When building shared libraries under major version N, it is important that
the "install_name" of the library be <code>%p/lib/bar.N.dylib</code>.  
(You can
find the install_name by running <code>otool -L</code> on your library.)  The
actual library file should be installed at
</p>
<pre>
  %i/lib/bar.N.x.y.dylib
</pre>
<p>
and your packages should create symbolic links
</p>
<pre>
  %i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
</pre>
<p>
If the static library is also built, then it will be installed at
</p>
<pre>
  %i/lib/bar.a
</pre>
<p>
If the package uses libtool, these things are usually handled automatically,
but in any event you should
check that they have been done correctly in your case.  You should also
check that current_version and compatibility_version were defined 
appropriately for your shared libraries.  (These are also shown with the 
<code>otool -L</code> query.)
</p><p>
Files are then divided between the two packages as follows
</p>
<ul>
<li>  in package barN-shlibs:
<pre>
  %i/lib/bar.N.x.y.dylib
  %i/lib/bar.N.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar/N/*
  %i/share/bar/N/*
  %i/share/doc/barN-shlibs/*
</pre></li>
<li>  in package barN:
<pre>
  %i/include/*
  %i/lib/bar.dylib -&gt; %p/lib/bar.N.x.y.dylib
  %i/lib/bar.a
  %i/share/doc/barN/*
  other files, if needed
</pre></li></ul>
<p>
Notice that both packages are required to have some documentation about
the license, but that the directories containing the DocFiles will be
different.
</p><p>
Doing this is quite easy in practice, using the 
<code>SplitOff</code> field.  Here is
how the example above would be implemented (in part):
</p>
<pre>
Package: barN
Version: N.x.y
Revision: 1
License: GPL
Depends: barN-shlibs (= %v-%r)
BuildDependsOnly: True
DocFiles: COPYING
SplitOff: &lt;&lt;
  Package: barN-shlibs
  Files: lib/bar.N.x.y.dylib lib/bar.N.dylib lib/bar/N
  DocFiles: COPYING
&lt;&lt;
</pre>
<p>
During the execution of the <code>SplitOff</code>
field, the specified files and directories are moved from the 
install directory %I of the main package to the install directory %i of the
splitoff package.  (There is a similar convention for names: %N is the
name of the main package, and %n is the name of the current package.)
The <code>DocFiles</code> command then puts a copy of the documentation into 
<code>%i/share/doc/barN-shlibs</code>.
</p><p>
Notice that we have included the exact current version of barN-shlibs as a 
dependency of the main package barN (which can be abbreviated 
%N-shlibs (= %v-%r) ).
This ensures that the versions match, and also guarantees that barN
automatically "inherits" all the dependencies of barN-shlibs.
</p>
<p><b>The Shlibs field:</b>
</p><p>
In addition to putting the shared libraries in the correct package, as of
version 4 of this policy, you must also declare all of the shared libraries
using the <code>Shlibs</code> field.  This field has one line for each
shared library, which contains the <code>-install_name</code> of the
library, the <code>-compatibility_version</code>, and versioned 
dependency information specifying the Fink package which provides
this library at this compatibility version.  The dependency should
be stated in the form <code> foo (&gt;= version-revision)</code> where 
<code>version-revision</code> refers to
the <b>first</b> version of a Fink package which made
this library (with this compatibility version) available.  For example,
a declaration</p>
<pre>
  Shlibs: &lt;&lt;
    %p/lib/bar.1.dylib 2.1.0 bar1 (&gt;= 1.1-2)
  &lt;&lt;
</pre>
<p>indicates that a library with <code>-install_name</code> %p/lib/bar.1.dylib
and <code>-compatibiliary_version</code> 2.1.0 has been installed since
version 1.1-2 of the <b>bar1</b> package.  In addition, this declaration
amounts to  a promise
from the maintainer that a library with this name and a compatibility-version
of at least 2.1.0 will always be found in later versions of the <b>bar1</b> 
package.
</p><p>
Note the use of %p in the name of the library, which allows the correct
<code>-install_name</code> to be found by all users of Fink, no matter
what prefix they have chosen.
</p><p>
When a package is updated, usually the <code>Shlibs</code> field can simply
be copied to the next version/revision of the package.  The exception to
this is if the <code>-compatibility_version</code> increases: in that
case, the version number in the dependency information should be changed
to the current version/revision (which is the first version/revision to
provide the library with the new compatibility version number).
</p><p>
<b>What to do when the major version number changes:</b>
</p><p>
If the major version number changes from N to M, you will create two new
packages barM and barM-shlibs.  The package barM-shlibs can have no
overlap with the package barN-shlibs, since many users will have both of
these installed simultaneously.  In package barM, you should use dependencies
</p>
<pre>
  Conflicts: barN
  Replaces: barN
</pre>
<p>
and similarly, you should revise barN to include dependencies
</p>
<pre>
  Conflicts: barM
  Replaces: barM
</pre>
<p>
Users will then see barN and barM shuffling in and out as various other
packages are built which depend on one version or another of the shared
library, while barN-shlibs and barM-shlibs remain permanently installed.
</p><p>
<b>How to upgrade an existing fink package:</b>
</p><p>
For an existing fink package which installs either static or shared 
libraries, the best way to upgrade is to create a new version foo of
your package, accompanied by a new package foo-shlibs, which satisfy
the above policy.  If shared libraries (or any other files now present
in foo-shlibs) were installed previously, then these new packages should 
say
</p>
<pre>
  Replaces: foo (&lt;&lt; earliest.compliant.version)
</pre>
<p>
so that upgrading will be transparent to users.  (You should <b>not</b>
say "Conflicts: foo" because this will prevent the upgrade.)
</p><p>
After your upgrade, packages which say "Depends: foo" will continue to
function normally.  However, you should contact the fink maintainers
of all such packages and urge them to modify their packages to say 
"Depends: foo-shlibs, BuildDepends: foo" as soon as possible.  You will 
not be able to create new packages fooM, fooM-shlibs which implement a 
new major version of the shared library until they have done so.
</p><p>
Existing fink packages which have not used the correct install_name or
which have not used the correct names or symbolic links for shared libraries
must be upgraded carefully, on a case-by-case basis.  If you are
having trouble finding an upgrade strategy to make your packages compliant
with the new policy, please discuss it on the fink-devel mailing list.
</p><p>
<b>Packages containing both binary files and libraries:</b>
</p><p>
When an upstream package contains both binary files and libraries, some
care must be exercised in constructing fink packages.  In some cases,
the only binary files will be things like <code>foo-config</code> which
are presumably only used at build time and never at run time.  In these
cases, the binaries can go with the header files in the <code>foo</code>
package.
</p><p>
In other cases, the binary files will be needed by other packages at
runtime, and they must be split off into a separate fink package with
a name something like <code>foo-bin</code>.  The <code>foo-bin</code>
package should depend on the <code>foo-shlibs</code> package, and
maintainers of other packages should be encouraged to use
</p>
<pre>
  Depends: foo-bin
  BuildDepends: foo
</pre>
<p>
which will take care of foo-shlibs implicitly.
</p><p>
Upgrading presents a problem in this situation, however, since users won't
be prompted to install <code>foo-bin</code>.  To work around this, until
all other package maintainers have revised their packages as above,
your <code>foo</code> package can say
</p>
<pre>
  Depends: foo-shlibs (= exact.version), foo-bin
</pre>
<p>
This will force the installation of foo-bin on most users' systems, until
such time as the other package maintainers have upgraded their packages
which depend on <code>foo</code>.
</p>



<h2><a name="perlmods">3.4 Perl Modules</a></h2>
<p>Fink has a new policy about perl modules, effective in May, 2003.
</p><p>
Traditionally, the Fink packages for perl modules have the suffix 
<code>-pm</code>, and have been build using the <code>Type: perl</code> 
directive, which stores the perl module's files in <code>/sw/lib/perl5</code> and/or
<code>/sw/lib/perl5/darwin</code>.  Under the new policy, this storage location is only 
permitted for perl modules which are independent of the version of perl 
being used to compile them.
</p><p>
The perl modules which are version-dependent are the so-called XS modules,
which frequently contain compiled C code as well as pure perl routines.
There are a number of ways of recognizing these, including the presence
of a file with a suffix <code>.bundle</code>.
</p><p>
A version-dependent perl module must be built using a versioned binary
of perl, such as <code>perl5.6.0</code>, and must store its files in
versioned subdirectories of the standard perl directories, such as
<code>/sw/lib/perl5/5.6.0</code> and <code>/sw/lib/perl5/5.6.0/darwin</code>.  A new convention
is being introduced of using the suffix <code>-pm560</code> for
a perl module of version 5.6.0.  Similar storage and naming conventions
are in force for other versions of perl, which will soon include 
perl 5.6.1 and perl 5.8.0.  
</p><p>
The new directive <code>Type: perl 5.6.0</code> automatically uses the
versioned perl binary and stores the files in the correct subdirectories. 
(This directive is available starting with version 0.13.0 of fink.)
</p><p>
It is permitted to create a <code>-pm</code> package which is essentially
a "bundle" package that loads the <code>-pm560</code> variant or any
others which may be exist.  This strategy is encouraged for existing
Fink packages for XS modules, in order to provide a smooth upgrade path.
</p><p>
Effective with version 0.13.0 of fink, the <code>fink validate</code>
command when applied to a <code>.deb</code> file will check to see if
the fink package is an XS module which has been installed in a non-versioned 
directory, and will issue a warning if so.
</p>



<h2><a name="emacs">3.5 Emacs Policy</a></h2>
<p> The Fink project has chosen to follow the Debian project's policy
regarding emacs, with a few small differences.
(The Debian policy document can be found at
<a href="http://www.debian.org/doc/packaging-manuals/debian-emacs-policy">
http://www.debian.org/doc/packaging-manuals/debian-emacs-policy</a>.)
There are two differences in the Fink policy.  First, 
this policy only applies to the emacs20 and
emacs21 packages in fink at the moment, not to the xemacs package.  (This
may change some day in the future.)    And second, unlike the Debian policy,
 Fink packages are allowed to install things directly into 
/sw/share/emacs/site-lisp.
</p>



<p align="right">
Next: <a href="fslayout.php?phpLang=fr">4 Filesystem Layout</a></p>

<? include_once "footer.inc"; ?>
