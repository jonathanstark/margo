Margo: static blogging with Markdown
====

Margo shouldn't exist but I'm too lazy to blog in raw HTML. I prefer writing in Markdown, so I wrote Margo to convert my Markdown files into HTML on the fly. 

Features
----

Margo is refreshingly feature-free. The core concept is that everything is a text file. There are some serious advantages to this:

* You can use whatever editor you want
* There is no db to set up
* You can edit on virtually any device
* Things like Dropbox, github, or rsync become interesting

Files
----

There are only a few files that matter:

* `.margo/index.php` - handles requests for Markdown files
* `.margo/markdown.php` - PHP port of Perl Markdown converter (I didn't write this one)
* `.htaccess` - gives you purty URLs

Usage
----

Here's the easiest possible setup:

1. Place the parent `margo` folder in the web root directory of your web server
1. Rename the `margo` folder to `blog`
1. Visit `http://yousite.com/blog/sample-post-one` in your web browser

You should see the sample post appear. 

Possible next steps:

* Rename the `blog` folder to anything you want
* Put the `blog` folder anywhere you want
* Update the config options in `.margo/index.php`
* Dork around with the `.margo/template.php` file to fit your site structure

Dependencies
----

* PHP 4.0.5 or later

