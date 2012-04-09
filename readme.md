Margo - Static Blogging With Markdown
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

There are only two files that matter:

* `margo/.htaccess` - gives you purty URLs
* `margo/.margo/index.php` - handles requests (and stores configuration settings)

Usage
----

Here's the easiest possible setup:

1. Place the parent `margo` directory in webroot directory of your web server
1. Visit `http://yousite.com/margo/sample-post-one` in your web browser

You should see the sample post appear. 

Possible next steps:

* Put the `margo` folder anywhere you want
* Rename the `margo` folder to anything you want
* Update the config options in `margo/.margo/index.php`
* Dork around with the `.margo/template.php` file to fit your site structure
* Remove the readme.md
* Replace sample-post-one.mdown and sample-post-two.mdown with your own awesome posts

Dependencies
----

* PHP 4.0.5 or later

