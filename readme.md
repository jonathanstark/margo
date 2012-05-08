About Margo
====

Margo is a simple way to blog using static Markdown files. It really shouldn't exist but I'm too lazy to blog in raw HTML. I prefer writing in Markdown, so I wrote Margo to convert my Markdown files into HTML on the fly.

Features
----

Margo is refreshingly feature-free. Put the directory on your site and create Markdown files in it. Poof! Yer blogging :) 

The core concept is that everything is a text file. There are some serious advantages to this:

* You can use whatever editor you want
* There is no db to set up
* You can edit on virtually any device
* Things like Dropbox, github, or rsync become interesting

Files
----

There is only one file that you need to edit:

* `margo/.margo/config.json` - contains various settings for your blog

Usage
----

Here's the easiest possible setup:

1. Place the parent `margo` directory in the webroot directory of your web server
1. Visit `http://yousite.com/margo/sample-post-one` in your web browser

You should see the sample post appear.

Possible next steps:

* Put the `margo` folder anywhere you want
* Rename the `margo` folder to anything you want
* Update the config options in `margo/.margo/config.json`
* Make your own templates for Margo
* Remove the readme.md
* Replace sample-post-one.mdown and sample-post-two.mdown with your own awesome posts

Dependencies
----

* PHP 5.2 or later


