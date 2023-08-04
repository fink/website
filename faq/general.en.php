<?php
$title = "F.A.Q. - General";
$cvs_author = 'Author: nieder';
$cvs_date = 'Date: 2020/05/31 13:43:40';
$metatags = '<link rel="contents" href="index.php?phpLang=en" title="F.A.Q. Contents"><link rel="next" href="relations.php?phpLang=en" title="Relations with Other Projects"><link rel="prev" href="index.php?phpLang=en" title="F.A.Q. Contents">';


include_once "header.en.inc";
?>
<h1>F.A.Q. - 1. General Questions</h1>
    
    
    <a name="what">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.1: What is Fink?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> Fink wants to bring more Unix software to Mac OS X, which results in two main goals:</p><p>Goal number one is porting software to Mac OS X. That means we take commodity Open Source Unix software and fix whatever is necessary so that it will compile and run on Mac OS X. Sometimes that's easy, but it can also be very hard or even impossible for some packages. We're trying to provide tools and documentation to make this easier.</p><p>Goal number two is making the results available to casual users.  For this, we build a distribution using package management tools ported over from Linux, namely <code>dpkg</code> and <code>apt-get</code>, written by and for the  <a href="http://www.debian.org/">Debian GNU/Linux</a> project. The binary distribution uses the <code>.deb</code> package format. For building packages from source, we have our own tool, named <code>fink</code>, which creates those <code>.deb</code> package files.</p></div>
    </a>
    <a name="naming">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.2: What does the name Fink stand for?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 	Nothing, it's just a name. It's not even an acronym.</p><p>	Well, actually Fink is the German name for Finch, a kind of bird. I was looking for a name for the project, and the name of the OS, Darwin, led me to think about Charles Darwin, the Galapagos Islands and evolution. I remembered a piece about the so-called Darwin Finches and their beaks from school, and well, that's it...</p></div>
    </a>
    <a name="bsd-ports">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.3: 	How is Fink different from the BSD port mechanism (this includes OpenPackages and GNU-Darwin)?
		</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 	Some main advantages:</p><ul>
          <li>
            <p> It's written in Perl, not make/shell. Thus it  doesn't rely on special features only found in BSD make. There is no need to flag packages that need GNU make to build.</p>
          </li>
          <li>
            <p> dpkg provides sophisticated management for binary packages - smooth updating, special handling for configuration files, virtual packages and other advanced dependencies. </p>
          </li>
          <li>
            <p> Fink doesn't install into /usr/local unless explicitly requested and doesn't require fiddling with /usr/bin/make or other system-provided commands. That makes it safer to use and reduces interference with Mac OS X and third-party packages to a minimum.</p>
          </li>
        </ul></div>
    </a>
    <a name="usr-local">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.4: Why doesn't Fink install into /usr/local?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b> 	There are several reasons, but the common line is "because breakage will occur".</p><p>	Reason One: Third-party software. /usr/local is the well-established place to put software that is not part of the system shipped by the original vendor. This means that it is a good place to put stuff. However, it also means that other people will put stuff there, too. Most install routines will just overwrite what's there - this also applies to dpkg. One can, of course, choose not to install third-party software in /usr/local. Unfortunately, most installers don't tell you beforehand what they will install where.</p><p>	Reason Two: /usr/local/bin is in the default PATH. This means that your shell will find the installed programs without additional measures. But it also means that you do have to take additional measures if you do not want to use the programs. In extreme cases, this can also affect the system itself - many parts depend on shell scripts.</p><p>	Reason Three: The compiler tool chain searches /usr/local by default. The compiler searches /usr/local/include for header files and the linker searches /usr/local/lib for libraries. Again, this is sometimes a welcome convenience, but it's very hard to disable should the need arise. You can easily disable the compiler by putting a garbage file called <code>stdio.h</code> into /usr/local/include.</p><p>	All that said, it is possible to install Fink into /usr/local. The installation script will warn you explicitly, but proceed once you acknowledge that you're doing this at your own risk.</p></div>
    </a>
    <a name="why-sw">
      <div class="question"><p><b><?php echo FINK_Q ; ?>1.5: Then why did you choose /sw?</b></p></div>
      <div class="answer"><p><b><?php echo FINK_A ; ?>:</b>  That choice is quite arbitrary, but is likely to stay for the foreseeable future for practical (upgrade) issues as well as the fact that it's safe from conflicting with other packaging systems.</p></div>
    </a>
  <p align="right"><?php echo FINK_NEXT ; ?>:
<a href="relations.php?phpLang=en">2. Relations with Other Projects</a></p>
<?php include_once "../footer.inc"; ?>


