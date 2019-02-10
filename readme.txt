=== Canonical URL is http: ===
Contributors: lastorset
Tested up to: 5.0.3
Requires PHP: 5
License: GPL2

Modify the canonical URL used by Facebook etc. to use HTTP instead of HTTPS.
This is needed to preserve share counts when turning on TLS.

== Description ==
When you upgrade your site to use TLS (HTTPS) you might have problems with
Facebook losing track of your share counts because part of the URL changed.
Facebook doesn't understand that the encrypted site and the unencrypted one
are the same. If you enable this plugin, it will rewrite all canonical URLs so
they start with "http:" instead of "https:", retaining your share counts.

I recommend using this together with Let's Encrypt and setting all requests to
be redirected to the encrypted site. When I first did this I had to add 

    RewriteCond %{HTTP_USER_AGENT} !^facebookexternalhit\/.*$

to the Let's Encrypt configuration, but I'm not sure that is still needed.
