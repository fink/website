<?
$title = "Relations with OpenOSX";
$cvs_author = '$Author: chrisp $';
$cvs_date = '$Date: 2001/08/23 05:44:54 $';

include "header.inc";
?>


<h1>Fink Relations with OpenOSX - Mail Thread</h1>

<p>
This page documents the e-mail conversation between Fink project
leader Christoph Pfisterer and
<a href="http://www.openosx.com/">OpenOSX</a> owner Jeshua Lacock over
the GIMP CDs offered by OpenOSX.
The exchange took place between August 2nd and August 10th, 2001.
The interspersed comments represent the view of Christoph Pfisterer.
</p>
<p>
Note:
The mail headers are edited for brevity and presentation, the text is
line-wrapped and formatted for web presentation.
The actual content is unchanged.
</p>
<p>
<a href="openosx.php">back</a>
</p>

<hr><!--------------------------------------------------------------->

<p>
The conversation started out after I was told that the OpenOSX GIMP CD
was based on Fink and didn't contain source code.
At that time the OpenOSX web site made no mention of Fink at all.
I asked Jeshua Lacock for confirmation of the situation.
</p>
<pre><b>From: Christoph Pfisterer &lt;cp@chrisp.de&gt;</b>
To: Jeshua Lacock &lt;jeshua@OpenOSX.com&gt;
Subject: GIMP CDs
Date: Thu, Aug 02 22:10:56 2001 +0200

Hi Jeshua!

I have been told that the GIMP CDs you are selling via www.openosx.com
are based on Fink without giving credit and do "not contain basically
any source". I don't have one of the CDs, so I can not confirm this
myself. If the information is incorrect, I'd like to apologize in
advance. If it turns out to be true, however, you may be violating the
GPL license of several packages, including the fink package manager
for which I am the copyright holder. I'd also consider it unfair to
not give credit for the work that has gone into the fink package
manager and into porting packages to Mac OS X for the Fink
distribution. Please provide me with details of what is on the CDs and
how you're complying with the GPL's requirement to distribute source
code along with binaries.

Greetings,
chrisp

-- 
chrisp a.k.a. Christoph Pfisterer   "Any sufficiently advanced
cp@chrisp.de - http://chrisp.de      bug is indistinguishable
PGP key &amp; geek code available        from a feature."</pre>

<hr><!--------------------------------------------------------------->

<p>
Jeshua confirmed that the CDs are based on Fink and told me that
source is included on the CD. His file listing also told me that he
used Fink 0.2.1 (released 2001-05-08).
</p>

<pre><b>From: Jeshua Lacock &lt;jeshua@OpenOSX.com&gt;</b>
To: Christoph Pfisterer &lt;cp@chrisp.de&gt;
Subject: Re: GIMP CDs
Date: Mon, 6 Aug 2001 17:05:25 -0700

On Thursday, August 2, 2001, at 01:10 PM, Christoph Pfisterer wrote:

&gt;I have been told that the GIMP CDs you are selling via www.openosx.com
&gt;are based on Fink without giving credit and do "not contain basically
&gt;any source". I don't have one of the CDs, so I can not confirm this
&gt;myself. If the information is incorrect, I'd like to apologize in
&gt;advance. If it turns out to be true, however, you may be violating the
&gt;GPL license of several packages, including the fink package manager
&gt;for which I am the copyright holder. I'd also consider it unfair to
&gt;not give credit for the work that has gone into the fink package
&gt;manager and into porting packages to Mac OS X for the Fink
&gt;distribution. Please provide me with details of what is on the CDs and
&gt;how you're complying with the GPL's requirement to distribute source
&gt;code along with binaries.

Hello Christoph,

It appears that you have been misinformed somewhat.

The CD's do in fact contain complete source code as advertised.  Here
is a listing of the directory /sw/src/ proceeding installation of the
CD:

total 55592
drwxr-xr-x  24 root  admin       772 Jul 20 23:02 .
drwxr-xr-x  15 root  admin       466 Jul 20 23:02 ..
-rw-r--r--   1 root  admin   1082959 Jul 20 23:02 ORBit-0.5.7.tar.gz
-rw-r--r--   1 root  admin    242713 Jul 20 23:02 audiofile-0.2.0.tar.gz
-rw-r--r--   1 root  admin     20480 Jul 20 23:02 base-files-0.2.1.tar
-rw-r--r--   1 root  admin    464991 Jul 20 23:02 bzip2-1.0.1.tar.gz
-rw-r--r--   1 root  admin     13387 Jul 20 23:02 dlcompat-20010505.tar.gz
-rw-r--r--   1 root  admin   1148938 Jul 20 23:02 dpkg-1.8.3.1.tar.gz
-rw-r--r--   1 root  admin    291644 Jul 20 23:02 esound-0.2.22.tar.gz
-rw-r--r--   1 root  admin    430080 Jul 20 23:02 fink-0.2.1.tar
-rw-r--r--   1 root  admin    713694 Jul 20 23:02 gettext-0.10.35.tar.gz
-rw-r--r--   1 root  admin    301883 Jul 20 23:02 giflib-4.1.0.tar.gz
-rw-r--r--   1 root  admin  12677259 Jul 20 23:02 gimp-1.2.1.tar.gz
-rw-r--r--   1 root  admin    412889 Jul 20 23:02 glib-1.2.8.tar.gz
-rw-r--r--   1 root  admin   3493643 Jul 20 23:02 gnome-
libs-1.2.12.tar.gz
-rw-r--r--   1 root  admin   2874050 Jul 20 23:02 gtk+-1.2.8.tar.gz
-rw-r--r--   1 root  admin    220774 Jul 20 23:02 gzip-1.2.4a.tar.gz
-rw-r--r--   1 root  admin    708075 Jul 20 23:02 imlib-1.9.9.tar.gz
-rw-r--r--   1 root  admin    613261 Jul 20 23:02 jpegsrc.v6b.tar.gz
-rw-r--r--   1 root  admin    528963 Jul 20 23:02 libpng-1.0.10.tar.gz
drwxr-xr-x   3 root  admin       264 Jul 20 23:02 root-gnome-
libs-1.2.12-2
-rw-r--r--   1 root  admin   1116013 Jul 20 23:02 tar-1.13.17.tar.gz
-rw-r--r--   1 root  admin    900890 Jul 20 23:02 tiff-v3.5.5.tar.gz
-rw-r--r--   1 root  admin    168463 Jul 20 23:02 zlib-1.1.3.tar.gz


I even create a symbolic link of the source code to the easy to find
(for Mac users) in the Gimp folder in the Applications folder. And
supply instructions in the install "Read Me" on how to locate the
source code.

As far as "...based on Fink without giving credit.." I used Fink to
download the /sw directory, however I had no idea of the
significance. I would be happy to provide you credit if you think it
is deemed.  Note that it also installs libtiff (for example) without
giving credit. To be quite honest I am fairly ignorant of what Fink
is.

If there is any thing else that I can help you with, please let me
know.


Sincerely,

Jeshua Lacock                                http://OpenOSX.com
Programmer/Owner                     http://SierraMaps.com
Phone: (760) 935-4736            http://3dTopoMaps.com</pre>

<hr><!--------------------------------------------------------------->

<p>
Since Jeshua said he didn't understand my claims, I tried to explain
my views in more detail.
</p>

<pre><b>From: Christoph Pfisterer &lt;cp@chrisp.de&gt;</b>
To: Jeshua Lacock &lt;jeshua@OpenOSX.com&gt;
Subject: Re: GIMP CDs
Date: Tue, Aug 07 14:04:52 2001 +0200

Hi Jeshua!

Thanks for your reply. It is good to hear that the source actually is
included on the CDs.

&gt;As far as "...based on Fink without giving credit.." I used Fink to
&gt;download the /sw directory, however I had no idea of the
&gt;significance. I would be happy to provide you credit if you think it
&gt;is deemed.  Note that it also installs libtiff (for example) without
&gt;giving credit. To be quite honest I am fairly ignorant of what Fink
&gt;is.

Well, what you did can be roughly compared to downloading RedHat Linux
from their ftp site, making some minor modifications (say, new boot
disks and a streamlined installer), and then selling the result on CDs
without mentioning RedHat in any way.

In case you didn't notice: Fink not only downloaded the source for
you, it also patched it to work on Mac OS X (and there's hardly any
package that doesn't need patching of some kind), and then configured
and installed it in a controlled manner. That saved you "time,
frustration and money", to say it with your own words. :-)

Anyway, the difference between Fink and libtiff or The GIMP itself is
that you're not claiming to be the author of libtiff or The GIMP (and
noone would believe you if you did :-) ). On the other hand, you take
full credit for porting and packaging. Quoting your website:

"Our products, now shipping on CD, install and fully configure all
necessary libraries, programs and files to have the user up and
running the World's most powerful and stable UNIX-based software
without typing a single "UNIX" command."

I don't doubt that you invested considerable work into packaging and
instructions, and you deserve credit for that. However, it wasn't your
work alone. That's why I'm asking for fair credit.

There's also another side to the issue - informing the user what will
happen. I'm quite sure that your installer will overwrite an existing
installation of Fink, and XFree86 or Xtools as well. Your users
deserve to know that before it happens.

&gt;If there is any thing else that I can help you with, please let me
&gt;know.

I have two more points, actually.

Your website talks about "XFree86 4.1.99", giving the impression that
it's an officially released version of XFree86. That's not true - the
'99' number denotes a development snapshot from CVS. It is not
official, not supported, and most of all not a uniquely identified
release. Also, XFree86 itself is not distributed under the GPL
license, but under a BSD-style license. You may want to correct this
information on your website.

The other point is about giving back to the community. The Open Source
community is based on the idea of sharing. If you make improvements to
a piece of Open Source software, you are encouraged to contribute your
modifications back to the maintainers so that everyone can profit from
your work.

Thanks for being cooperative,
-chrisp

-- 
chrisp a.k.a. Christoph Pfisterer   "To understand a program
cp@chrisp.de - http://chrisp.de      you must become both the
PGP key &amp; geek code available        machine and the program."</pre>

<hr><!--------------------------------------------------------------->

<p>
What followed speaks for itself.
</p>

<pre><b>From: Jeshua Lacock &lt;jeshua@OpenOSX.com&gt;</b>
To: Christoph Pfisterer &lt;cp@chrisp.de&gt;
Subject: Re: GIMP CDs
Date: Tue, 7 Aug 2001 16:30:54 -0700

On Tuesday, August 7, 2001, at 09:14 AM, Christoph Pfisterer wrote:

&gt;&gt;As far as "...based on Fink without giving credit.." I used Fink to
&gt;&gt;download the /sw directory, however I had no idea of the
&gt;&gt;significance. I would be happy to provide you credit if you think it
&gt;&gt;is deemed.  Note that it also installs libtiff (for example) without
&gt;&gt;giving credit. To be quite honest I am fairly ignorant of what Fink
&gt;&gt;is.
&gt;
&gt;Well, what you did can be roughly compared to downloading RedHat Linux
&gt;from their ftp site, making some minor modifications (say, new boot
&gt;disks and a streamlined installer), and then selling the result on CDs
&gt;without mentioning RedHat in any way.

In my opinion, it is a rough comparison at best.  What our service
offers is the streamlined installer and support. Period. Don't forget
support - MacGimp.org did.  We don't claim any more or any less.  We
give the electronic link to gimp.org and macgimp.org, both places have
instructions covering how to get the software for free - using fink or
what have you.  We are in business to make money like all businesses -
but we are fair.  Our products are installing open source software for
people who would have _never_ compiled the software themselves - with
or without fink. Fink doesn't install XDarwin or X-Windows for you,
our product does.

MacGimp.org is selling our 3-month old CD slightly modified, without
giving credit to us or to Fink.

&gt;In case you didn't notice: Fink not only downloaded the source for
&gt;you, it also patched it to work on Mac OS X (and there's hardly any
&gt;package that doesn't need patching of some kind), and then configured
&gt;and installed it in a controlled manner. That saved you "time,
&gt;frustration and money", to say it with your own words. :-)

I guess I do not understand Fink.  Why not submit the changes to the
source code, so patching is not required?

&gt;Anyway, the difference between Fink and libtiff or The GIMP itself is
&gt;that you're not claiming to be the author of libtiff or The GIMP (and
&gt;noone would believe you if you did :-) ). On the other hand, you take
&gt;full credit for porting and packaging. Quoting your website:
&gt;
&gt;"Our products, now shipping on CD, install and fully configure all
&gt;necessary libraries, programs and files to have the user up and
&gt;running the World's most powerful and stable UNIX-based software
&gt;without typing a single "UNIX" command."

Now hold on a minute here.  No where I have I taken credit for porting
the software.  Where is the word "ported" mentioned?  There is nothing
inaccurate about our statement.  Now if you look at the Grass page
(http://OpenOSX.com/grass), you will notice that we claim to have
ported Grass, this is in fact, true.  I am the one who ported, and I
am the one who claims it. And I am the one who submitted changes to
the public CVS branch. Our Gimp page says nothing of me/us porting it.

&gt;I don't doubt that you invested considerable work into packaging and
&gt;instructions, and you deserve credit for that. However, it wasn't your
&gt;work alone. That's why I'm asking for fair credit.

What is fair credit?  I disagree with most of your points, as most of
them are quite inaccurate.

&gt;There's also another side to the issue - informing the user what will
&gt;happen. I'm quite sure that your installer will overwrite an existing
&gt;installation of Fink, and XFree86 or Xtools as well. Your users
&gt;deserve to know that before it happens.

How do you know what are installer does?

How do you know that the installer doesn't tell them that there X
installation will be overwritten? Further,  I can almost be sure that
anyone that purchases our CD(s) will not have an existing Fink
installation.  You are making assumptions based on your own ignorance
of our products - and expending my valuable time in the process.

&gt;&gt;If there is any thing else that I can help you with, please let me
&gt;&gt;know.
&gt;
&gt;I have two more points, actually.
&gt;
&gt;Your website talks about "XFree86 4.1.99", giving the impression that
&gt;it's an officially released version of XFree86. That's not true - the
&gt;'99' number denotes a development snapshot from CVS. It is not
&gt;official, not supported, and most of all not a uniquely identified
&gt;release. Also, XFree86 itself is not distributed under the GPL
&gt;license, but under a BSD-style license. You may want to correct this
&gt;information on your website.

You are again making assumptions here.  No where do we mention that it
is "officially released". You and many others understand what the '99'
means, so what is the issue?  The information is available, and we
give a link to xfreee86.org

As for the license with XFree86, it can be distributed under the GNU
GPL, or any public or commerical license.  Look at what Tenon's done:
They modified XFree86 and are selling it under a commercial license.

&gt;The other point is about giving back to the community. The Open Source
&gt;community is based on the idea of sharing. If you make improvements to
&gt;a piece of Open Source software, you are encouraged to contribute your
&gt;modifications back to the maintainers so that everyone can profit from
&gt;your work.

How do you know what changes I have made or not made?  How do you know
what I have contributed or not contributed?  Who are you to question
me?

I have in fact, donated more then a year of my time to the open source
community.  Further more, our products are distributed under the GNU
GPL, so our products may be freely copied and distributed.

We are also broadening the open source community base: by attracting
users who would have never used or heard of the software; due to the
complexities involved. Some people (esp. Mac users) will pay to avoid
typing or learning a single 'unix' command, and our products offer far
more then that.

Have you ever stopped to think that people actually appreciate the
service we offer?  Many are informed of the alternatives and
appreciate the time savings involved with our products. Some people
can't even download the files due to bandwidth limits.


Sincerely,

Jeshua Lacock                                http://OpenOSX.com
Programmer/Owner                     http://SierraMaps.com
Phone: (760) 935-4736            http://3dTopoMaps.com</pre>

<hr><!--------------------------------------------------------------->

<pre><b>From: Christoph Pfisterer &lt;cp@chrisp.de&gt;</b>
To: Jeshua Lacock &ltjeshua@OpenOSX.com&gt;
Subject: Re: GIMP CDs
Date: Wed, Aug 08 16:40:16 2001 +0200

Dear Jeshua,

I will not "expend your valuable time" by answering your last message
in detail. In case you are interested in a detailed reply, just let me
know.

I will now restate my request. I have spent most of my free time in
the last eight months creating Fink, porting and packaging Open Source
software. I have made the results available to the public, for
free. You have acknowleged that the GIMP CDs you sell are based on
Fink and don't mention it in any way. It is my opinion that you
wouldn't be selling these CDs today if it was not for Fink. It is also
my opinion that most users will think that you ported and packaged
everything that your CDs install. Therefore, I ask you to include an
acknowlegement for Fink on the CDs and on your website.

The decision is yours.

Regards,
-chrisp

-- 
chrisp a.k.a. Christoph Pfisterer   "Any sufficiently advanced
cp@chrisp.de - http://chrisp.de      bug is indistinguishable
PGP key &amp; geek code available        from a feature."</pre>

<hr><!--------------------------------------------------------------->

<pre><b>From: Jeshua Lacock &lt;jeshua@OpenOSX.com&gt;</b>
To: Christoph Pfisterer &lt;cp@chrisp.de&gt;
Subject: Re: GIMP CDs
Date: Wed, 8 Aug 2001 12:40:14 -0700


On Wednesday, August 8, 2001, at 07:40 AM, Christoph Pfisterer wrote:

&gt;I will not "expend your valuable time" by answering your last message
&gt;in detail. In case you are interested in a detailed reply, just let me
&gt;know.

Christoph,

You may feel free to respond in detail.  I was only indicating my
frustration of all of the false assumptions and accusations you have
based your arguments on.

&gt;I will now restate my request. I have spent most of my free time in
&gt;the last eight months creating Fink, porting and packaging Open Source
&gt;software. I have made the results available to the public, for
&gt;free. You have acknowleged that the GIMP CDs you sell are based on
&gt;Fink and don't mention it in any way. It is my opinion that you
&gt;wouldn't be selling these CDs today if it was not for Fink. It is also
&gt;my opinion that most users will think that you ported and packaged
&gt;everything that your CDs install. Therefore, I ask you to include an
&gt;acknowlegement for Fink on the CDs and on your website.

I have spent more then eight months _full_time_ working for the open
source community for _free_, and I am just trying to fund my current
and future open source projects.

It is my opinion that if Gimp wasn't ported by your party, it would
have been ported by another party by now.  I was the first one to port
Grass, so there is no longer a need.  I can guarantee if I had not
ported Grass, someone else would have done so by now. So I can assure
you, the CD would in fact be sold with or without your and my own
efforts - sooner or later.

What is the URL  of the official fink site?  I am considering adding
it to the Gimp page.

BTW: have been to macgimp.org and macgimp.com?  They not only fail to
mention fink, they REALLY act like they ported it - far above and
beyond us. They also act like they created the animation tutorial -
they sent out a misleading press release. People in the Mac community
often refer to gimp as MacGimp.  Just a thought.


Regards,

Jeshua Lacock                                http://OpenOSX.com
Programmer/Owner                     http://SierraMaps.com
Phone: (760) 935-4736            http://3dTopoMaps.com</pre>

<hr><!--------------------------------------------------------------->

<pre><b>From: Christoph Pfisterer &lt;cp@chrisp.de&gt;</b>
To: Jeshua Lacock &lt;jeshua@OpenOSX.com&gt;
Subject: Re: GIMP CDs
Date: Thu, Aug 09 00:31:58 2001 +0200

Hi Jeshua!

&gt;On Wednesday, August 8, 2001, at 07:40 AM, Christoph Pfisterer wrote:
&gt;
&gt;&gt;I will not "expend your valuable time" by answering your last message
&gt;&gt;in detail. In case you are interested in a detailed reply, just let me
&gt;&gt;know.
&gt;
&gt;Christoph,
&gt;
&gt;You may feel free to respond in detail.  I was only indicating my
&gt;frustration of all of the false assumptions and accusations you have
&gt;based your arguments on.

To be honest, I was in turn quite offended by your response. It seems
you misunderstood much of what I said. My actual arguments are not
based on assumptions. I admit that I made assumptions about the
various XFree86 issues. In case you didn't notice, those part of my
message were neither arguments nor requests, just suggestions. The
rest is based either on facts or on my assessment of the impression an
average user will have.

I'll respond to the older message first:

&gt;&gt;Well, what you did can be roughly compared to downloading RedHat Linux
&gt;&gt;from their ftp site, making some minor modifications (say, new boot
&gt;&gt;disks and a streamlined installer), and then selling the result on CDs
&gt;&gt;without mentioning RedHat in any way.
&gt;
&gt;In my opinion, it is a rough comparison at best.  What our service
&gt;offers is the streamlined installer and support. Period. Don't forget
&gt;support - MacGimp.org did.

a) I did say it is a rough comparison.
b) The installer and support stuff fits nicely with the example.
c) You're missing the point. There is nothing wrong with this scenario
at all as long as you are honest about the origins of what you sell,
which parts are your work and which parts are not.

&gt;We don't claim any more or any less.

And that's the problem. A part of the "streamlined installer" stuff is
not provided by you, but by Fink. You passed it on and added more
streamlinedness on top. Nothing more, nothing less.

&gt;We give the electronic link to gimp.org and macgimp.org, both places
&gt;have instructions covering how to get the software for free - using
&gt;fink or what have you.  We are in business to make money like all
&gt;businesses - but we are fair.  Our products are installing open source
&gt;software for people who would have _never_ compiled the software
&gt;themselves - with or without fink.

That is all very well, and I never claimed that it was not
true. Still, if you consider yourself fair and even provide links to
macgimp.org, why don't you provide links to the Fink website?

&gt;Fink doesn't install XDarwin or X-Windows for you, our product does.

Look again. Fink _can_ install XFree86 for you, even the months-old
version you've used. (So much for assumptions.)

&gt;&gt;In case you didn't notice: Fink not only downloaded the source for
&gt;&gt;you, it also patched it to work on Mac OS X (and there's hardly any
&gt;&gt;package that doesn't need patching of some kind), and then configured
&gt;&gt;and installed it in a controlled manner. That saved you "time,
&gt;&gt;frustration and money", to say it with your own words. :-)
&gt;
&gt;I guess I do not understand Fink.  Why not submit the changes to the
&gt;source code, so patching is not required?

I do that where it is possible. However, it can take anywhere from
several days to several months to get a new upstream release with the
patches merged. Also, some maintainers (rightfully) reject patches
that are unclean, untested, or platform-specific. BTW, you once again
missed the point.

&gt;&gt;Anyway, the difference between Fink and libtiff or The GIMP itself is
&gt;&gt;that you're not claiming to be the author of libtiff or The GIMP (and
&gt;&gt;noone would believe you if you did :-) ). On the other hand, you take
&gt;&gt;full credit for porting and packaging. Quoting your website:
&gt;&gt;
&gt;&gt;"Our products, now shipping on CD, install and fully configure all
&gt;&gt;necessary libraries, programs and files to have the user up and
&gt;&gt;running the World's most powerful and stable UNIX-based software
&gt;&gt;without typing a single "UNIX" command."
&gt;
&gt;Now hold on a minute here.  No where I have I taken credit for porting
&gt;the software.  Where is the word "ported" mentioned?  There is nothing
&gt;inaccurate about our statement.
[...]
&gt;Our Gimp page says nothing of me/us porting it.

a) I said "porting and packaging", not just "porting".
b) This is not about what you say, but what you don't say and what
users will assume.
c) Your statement _is_ inaccurate. Fink installed the necessary
libraries and programs (and that is no small feat). Your installer
merely copies the files to the users hard disk and adds some
customization. (Yes, this is an assumption. It is based on what you've
claimed so far on your website and in our mail exchange.) Of course,
the average user won't notice the difference, and that's one of the
main reasons why I'm so persistent.

&gt;Now if you look at the Grass page (http://OpenOSX.com/grass), you will
&gt;notice that we claim to have ported Grass, this is in fact, true.  I
&gt;am the one who ported, and I am the one who claims it. And I am the
&gt;one who submitted changes to the public CVS branch.

We're talking about Fink and the GIMP, not about Grass.

&gt;&gt;I don't doubt that you invested considerable work into packaging and
&gt;&gt;instructions, and you deserve credit for that. However, it wasn't your
&gt;&gt;work alone. That's why I'm asking for fair credit.
&gt;
&gt;What is fair credit?  I disagree with most of your points, as most of
&gt;them are quite inaccurate.

Fair credit is what you get when someone else gives away something
which is based to a significant part on your own work and that other
person says so because he is grateful that he didn't have to do it all
himself.

Again, I'd like to remind you of the hours you saved by just typing
'fink install gimp' instead of manually downloading the various
packages, finding the right configure options, and so on.

&gt;&gt;There's also another side to the issue - informing the user what will
&gt;&gt;happen. I'm quite sure that your installer will overwrite an existing
&gt;&gt;installation of Fink, and XFree86 or Xtools as well. Your users
&gt;&gt;deserve to know that before it happens.
&gt;
&gt;How do you know what are installer does?
&gt;
&gt;How do you know that the installer doesn't tell them that there X
&gt;installation will be overwritten? Further,  I can almost be sure that
&gt;anyone that purchases our CD(s) will not have an existing Fink
&gt;installation.  You are making assumptions based on your own ignorance
&gt;of our products - and expending my valuable time in the process.

You're right - as far as XFree86 is concerned, I am making
assumptions. As far as Fink is concerned, I'm not making
assumptions. You said that Fink isn't mentioned in your
installer. Anyway, instead of lamenting about my ignorance, you could
have told me about your installer and what it actually does. It's hard
for me to know that when I don't have one of your CD and you're not
telling me.

&gt;&gt;&gt;If there is any thing else that I can help you with, please let me
&gt;&gt;&gt;know.
&gt;&gt;
&gt;&gt;I have two more points, actually.
&gt;&gt;
&gt;&gt;Your website talks about "XFree86 4.1.99", giving the impression that
&gt;&gt;it's an officially released version of XFree86. That's not true - the
&gt;&gt;'99' number denotes a development snapshot from CVS. It is not
&gt;&gt;official, not supported, and most of all not a uniquely identified
&gt;&gt;release. Also, XFree86 itself is not distributed under the GPL
&gt;&gt;license, but under a BSD-style license. You may want to correct this
&gt;&gt;information on your website.
&gt;
&gt;You are again making assumptions here.  No where do we mention that it
&gt;is "officially released".

You don't say that it's an experimental development version,
either. Most users will just see a number and think of it as something
normal. Some of the wording on your website also suggests that the
number designates one fixed version, which is not true.

&gt;You and many others understand what the '99' means, so what is the
&gt;issue?

I know this, because I happen to be on the XonX team and I'm familiar
with the versioning scheme of XFree86. But I seriously doubt that
"many others", especially your target group, are familiar enough with
XFree86 to know this.

&gt;The information is available, and we give a link to xfreee86.org

... and expect people to find the document on version numbering and
realize what it is they get, all of their own.

&gt;As for the license with XFree86, it can be distributed under the GNU
&gt;GPL, or any public or commerical license.  Look at what Tenon's done:
&gt;They modified XFree86 and are selling it under a commercial license.

I know this. I just wanted to point it out. Personally, I think it is
misleading.

&gt;&gt;The other point is about giving back to the community. The Open Source
&gt;&gt;community is based on the idea of sharing. If you make improvements to
&gt;&gt;a piece of Open Source software, you are encouraged to contribute your
&gt;&gt;modifications back to the maintainers so that everyone can profit from
&gt;&gt;your work.
&gt;
&gt;How do you know what changes I have made or not made?  How do you know
&gt;what I have contributed or not contributed?  Who are you to question
&gt;me?

Read that paragraph again, please. I'm not claiming to know anything
about your work, and I'm not "questioning" you. Please, be more
careful.

The intention of that paragraph was to remind you that you're not
alone. I would be happy to work together with you on this. I'm sure
you have some ideas how we can make life easier for Mac OS X users
that want to use Open Source software. I'd also be happy to help you
to improve your installer and keep it up to date.

&gt;I have in fact, donated more then a year of my time to the open source
&gt;community.  Further more, our products are distributed under the GNU
&gt;GPL, so our products may be freely copied and distributed.
&gt;
&gt;We are also broadening the open source community base: by attracting
&gt;users who would have never used or heard of the software; due to the
&gt;complexities involved. Some people (esp. Mac users) will pay to avoid
&gt;typing or learning a single 'unix' command, and our products offer far
&gt;more then that.
&gt;
&gt;Have you ever stopped to think that people actually appreciate the
&gt;service we offer?  Many are informed of the alternatives and
&gt;appreciate the time savings involved with our products. Some people
&gt;can't even download the files due to bandwidth limits.

I am well aware of all this and I never denied any of it. If fact, I
said:

"I don't doubt that you invested considerable work into packaging and
instructions, and you deserve credit for that."


Now, my response to your last mail:

&gt;I have spent more then eight months _full_time_ working for the open
&gt;source community for _free_, and I am just trying to fund my current
&gt;and future open source projects.

a) I never said that you didn't work on this stuff. See above.
b) I just checked your website again to make sure. All I can find is
offers for CDs starting at $30. That's not what I call 'free'.
c) I don't have a problem with your business model. Far from it. I
have a problem with what you're claiming (explicitly or implicitly) as
your work.

&gt;It is my opinion that if Gimp wasn't ported by your party, it would
&gt;have been ported by another party by now.  I was the first one to port
&gt;Grass, so there is no longer a need.  I can guarantee if I had not
&gt;ported Grass, someone else would have done so by now. So I can assure
&gt;you, the CD would in fact be sold with or without your and my own
&gt;efforts - sooner or later.

Well said. However, that doesn't justify what you did with Fink, or
what you would have done with those other people's work.

&gt;What is the URL  of the official fink site?  I am considering adding
&gt;it to the Gimp page.

http://fink.sourceforge.net/

&gt;BTW: have been to macgimp.org and macgimp.com?  They not only fail to
&gt;mention fink, they REALLY act like they ported it - far above and
&gt;beyond us. They also act like they created the animation tutorial -
&gt;they sent out a misleading press release. People in the Mac community
&gt;often refer to gimp as MacGimp.  Just a thought.

It's interesting that you bring this up repeatedly. Yes, I know of
these sites and I have contacted Mat Caughron. He said he would
correct that, but so far only partially did so. One of the things he
did was posting an article on macgimp.org stating that he used
Fink. That's more than you managed so far. Anyway, the issues I have
with his stuff are almost exactly the same as I have with your stuff.

-chrisp

-- 
chrisp a.k.a. Christoph Pfisterer   "Any sufficiently advanced
cp@chrisp.de - http://chrisp.de      bug is indistinguishable
PGP key &amp; geek code available        from a feature."</pre>

<hr><!--------------------------------------------------------------->

<pre><b>From: Jeshua Lacock &lt;jeshua@OpenOSX.com&gt;</b>
To: Christoph Pfisterer &lt;cp@chrisp.de&gt;
Subject: Re: GIMP CDs
Date: Fri, 10 Aug 2001 12:15:53 -0700


On Wednesday, August 8, 2001, at 03:31 PM, Christoph Pfisterer wrote:

&gt;Hi Jeshua!

Hi Christoph,

I am not ignoring you - I am just really busy.

I will have time this weekend to respond to your email.  Meanwhile -
We will add a link to fink.


Regards,

Jeshua Lacock                                http://OpenOSX.com
Programmer/Owner                     http://SierraMaps.com
Phone: (760) 935-4736            http://3dTopoMaps.com</pre>

<hr><!--------------------------------------------------------------->

<p>
That was the last thing I heard from Jeshua so far (as of August
23rd).
In the meantime, the OpenOSX.com web site was reworked and the
<a href="http://www.openosx.com/gimp/index.html">GIMP page</a> now has
hints to Fink hidden in the small print.
</p>
<p>
<a href="openosx.php">back</a>
</p>


<?
include "footer.inc";
?>
