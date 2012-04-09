Margo: Static blogging with Markdown
====

Margo shouldn't exist but I'm too lazy to blog in raw HTML. So, Margo converts my Markdown files (I love writing in Markdown) into HTML on the fly. 

Concept
----

Place the parent margo folder anywhere in the web root of your web server. You can rename it whatever you want, but let's assume you call it `blog` and put it in the top level of your web root. 

Open `/blog/.margo/index.php` and set the config values at the top for your environment. Now, start putting markdown files in the directory you specified in the config. Simple. 

Features
----

Margo is refreshingly feature-free. The core concept is that everything is a text file. There are some serious advantages to this:

* You can use whatever editor you want.
* There is no db to set up. 
* You can edit on virtually any device. 
* Things like Dropbox, github, or rsync become interesting. 

Dependencies
----

* PHP 4.0.5 or later

