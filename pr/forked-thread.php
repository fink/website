<?
$title = "Relations with forked.net";
$cvs_author = '$Author: gecko2 $';
$cvs_date = '$Date: 2014/10/25 09:41:56 $';

include "header.inc";
?>


<h1>Fink Relations with forked.net - Mail Thread</h1>

<p>
This page documents the e-mail conversation between Fink project
leader Christoph Pfisterer and Jon Daniels a.k.a. apex, the person
behind <a href="http://macosx.forked.net/">macosx.forked.net</a>.
The exchange took place between October 10th and October 22nd, 2001.
The interspersed comments represent the view of Christoph Pfisterer.
</p>
<p>
Note:
The mail headers are edited for brevity and presentation, the text is
line-wrapped and formatted for web presentation.
The actual content is unchanged.
</p>
<p>
<a href="forked.php">back</a>
</p>

<hr><!--------------------------------------------------------------->

<p>
The conversation actually started on the forked.net bulletin board.
Unfortunately, Jon Daniels first closed and then deleted the topic
after adding his reply.
In my forum post, I complained that the recently posted apache, php
and mysql packages were taken directly from Fink and were missing both
critical usage information and credit for porting and packaging.
Jon's reply boiled down to "hey, keep calm, I'm just providing a
useful service for novice users" and "I don't do this for money or
fame, and I'll accept neither".
</p>
<p>
Since I couldn't add my reply to the forum thread, I took the
conversation to private mail.
</p>
<pre><b>From: Christoph Pfisterer &lt;cp@chrisp.de&gt;</b>
To: apex@forked.net
Subject: forked.net and Fink
Date: Wed, Oct 10 09:37:42 2001 +0200

Hi apex!

I'm replying by mail since you closed the topic in the forum (why? are
you trying to quieten me?).

You've missed my point. My problem is not that you take Fink and
repackage it. My problem is that you hide the origins and take credit
for the work: "This software brought to you by maxosx.forked.net.
[...] fork networking; Web Hosting &amp; Shell Accounts starting at
$6.00. [...]" Think about that for a while.

Besides that, the users you target will have a really hard time to use
your apache, php and mysql packages. They'd have to figure out how to
create a mysql user manually, how to create startup items for apache
and mysql, and how to add php to the apache config file.

Oh, and you obviously haven't noticed in the last two months that Fink
also has a binary distribution.

-chrisp

-- 
chrisp a.k.a. Christoph Pfisterer   "Any sufficiently advanced
cp@chrisp.de - http://chrisp.de      bug is indistinguishable
PGP key &amp; geek code available        from a feature."</pre>

<hr><!--------------------------------------------------------------->

<p>
Jon quickly replied, asking what exactly I wanted:
</p>

<pre><b>From: &lt;apex@wrath.forked.net&gt;</b>
To: Christoph Pfisterer &lt;cp@chrisp.de&gt;
Subject: Re: forked.net and Fink
Date: Wed, 10 Oct 2001 10:25:18 -0700 (PDT)

Christoph,

You must have seen that I have noted fink on the site as the source of
some binaries I provide.  I am not *trying* to discredit fink.  I have
limited time and giving credit to fink on my website for providing me
personally with helpful information and service is not on the top of my
todo list. Would you like a note on the bottom of the primary page of my
website saying "Some of these packages were engineered for Mac OS X by
&lt;link&gt;fink&lt;/link&gt;."?  I've seen your emails and discussions regarding this issue on
the fink website so lets not go through all that.  Just let me know what
you want to make you happy.

Regards,
Jon


On Wed, 10 Oct 2001, Christoph Pfisterer wrote:

&gt; Hi apex!
&gt;
&gt; I'm replying by mail since you closed the topic in the forum (why?
&gt; are you trying to quieten me?).
&gt;
&gt; You've missed my point. My problem is not that you take Fink and
&gt; repackage it. My problem is that you hide the origins and take credit
&gt; for the work: "This software brought to you by maxosx.forked.net.
&gt; [...] fork networking; Web Hosting &amp; Shell Accounts starting at
&gt; $6.00. [...]" Think about that for a while.
&gt;
&gt; Besides that, the users you target will have a really hard time to
&gt; use your apache, php and mysql packages. They'd have to figure out
&gt; how to create a mysql user manually, how to create startup items for
&gt; apache and mysql, and how to add php to the apache config file.
&gt;
&gt; Oh, and you obviously haven't noticed in the last two months that
&gt; Fink also has a binary distribution.
&gt;
&gt; -chrisp
&gt;
&gt;</pre>

<hr><!--------------------------------------------------------------->

<p>
So, I told him...
</p>

<pre><b>From: Christoph Pfisterer &lt;cp@chrisp.de&gt;</b>
To: &lt;apex@wrath.forked.net&gt;
Subject: Re: forked.net and Fink
Date: Wed, Oct 10 22:20:13 2001 +0200

Hi!

&gt;You must have seen that I have noted fink on the site as the source of
&gt;some binaries I provide.  I am not *trying* to discredit fink.  I have
&gt;limited time and giving credit to fink on my website for providing me
&gt;personally with helpful information and service is not on the top of my
&gt;todo list.

I must say that it surprises me again and again that people have the
time to create and maintain whole websites, to carefully pick the
right files and wrap them up in a nice package, to test that package
and to support users, but when it comes to writing two lines of text,
they've suddenly run out of time...

&gt;Would you like a note on the bottom of the primary page of my
&gt;website saying "Some of these packages were engineered for Mac OS X by
&gt;&lt;link&gt;fink&lt;/link&gt;."?  I've seen your emails and discussions regarding this issue on
&gt;the fink website so lets not go through all that.  Just let me know what
&gt;you want to make you happy.

I'd prefer a small note inside the installer, i.e. in the ReadMe.rtf
or Welcome.rtf. Something like "Ported to Mac OS X by the Fink project
&lt;link&gt;" or "Based on the Fink package(s) &lt;name(s)&gt;". A "Ported by
Fink" note in the listings on the website like with Enlightenment
would be a plus.

-chrisp

-- 
chrisp a.k.a. Christoph Pfisterer   "Any sufficiently advanced
cp@chrisp.de - http://chrisp.de      bug is indistinguishable
PGP key &amp; geek code available        from a feature."</pre>

<hr><!--------------------------------------------------------------->

<p>
Then the conversation fell silent.
Actually, I never got another mail from Jon to date.
More than a week later, the changes he made to the website prompted me
to write another mail.
It describes the situation at that time quite nicely; the downloads
were still publicly accessible at that point.
</p>

<pre><b>From: Christoph Pfisterer &lt;cp@chrisp.de&gt;</b>
To: apex@forked.net
Subject: I am not amused
Date: Sat, Oct 20 14:56:21 2001 +0200

Hi, it's me again.

Hmm, let's sum up the current situation:

- The Web and HTML section now lists apache, mysql and php as "ported
by fink", but not the dependency packages. Strange - two of them
actually contain daemonic, and one contains Fink's update-passwd
script.

- The apache, mysql and php packages themselves are still unchanged
and don't mention Fink inside the package as requested.

- Your Midnight Commander package is obviously a rip-off of the Fink
package. There's no note on the website, no note inside the package,
and in the forums you actually put it as if you ported the package
personally.

- There are more Fink-based packages on your site that are not
credited. I have better things to do than tracking them down for you,
though. That's your responsibility.

- The last entry in your new FAQ - &gt;&gt;I just upgraded to Mac OS X 10.1
and now XFree86 always quits immediately. In the messages it says
"assert failed on line 454 of darwinKeyboard.c!"&lt;&lt; - is taken straight
from the Fink FAQ. In case you didn't notice, there's a explicit note
on every page of the Fink website: "Copyright (c) 2001 The Fink
Project". It's a link that leads to a page stating "The material on
this website is Copyright (c) 2001 Christoph Pfisterer, unless noted
otherwise. If you want to reuse material from this website, talk to me
first." Neither my mail program nor my biological memory have any
recollection of you doing that.

- I have yet to see any mention of the GPL or of source code on the
website.

- You once said (I don't have the exact words since you deleted the
forum topic) something like "I'm not doing this for money or fame, and
I'll accept neither." Yet you have a very prominent "donate via
PayPal" link on your front page and have just started offering CDs for
$25.

With all of this, you're now _very_ close to making the second entry
in the hall of shame.

You know what to do.

-chrisp

-- 
chrisp a.k.a. Christoph Pfisterer   "Any sufficiently advanced
cp@chrisp.de - http://chrisp.de      bug is indistinguishable
PGP key &amp; geek code available        from a feature."</pre>

<hr><!--------------------------------------------------------------->

<p>
<a href="forked.php">back</a>
</p>


<?
include "footer.inc";
?>
