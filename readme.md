Margo: Static blogging with Markdown
====

Margo shouldn't exist but I'm too lazy to blog in raw HTML. I prefer writing in Markdown, so I wrote Margo to convert my Markdown files into HTML on the fly. 

Features
----

Margo is refreshingly feature-free. The core concept is that everything is a text file. There are some serious advantages to this:

* You can use whatever editor you want.
* There is no db to set up. 
* You can edit on virtually any device. 
* Things like Dropbox, github, or rsync become interesting. 

Files
----

There are only a few files that matter:

* `.margo/index.php` - handles requests for Markdown files. 
* `.margo/markdown.php` - PHP port of Perl Markdown converter (I didn't write this one). 
* `.htaccess` - gives you purty URLs. 

Usage
----

1. Place the parent margo folder anywhere in the web root directory of your web server. You can rename it whatever you want, but let's assume you call it `blog` and put it in the top level of your web site. 
2. Open `/blog/.margo/index.php` and set the config values for your environment. 
3. Create a Markdown file called `margo-rocks.mdown`in the directory you specified for posts in the config. 

Dependencies
----

* PHP 4.0.5 or later

