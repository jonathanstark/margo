About Margo
====
Tue May 15 11:59:17 EDT 2012

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
1. Visit `http://yousite.com/margo/` in your web browser

You should see the sample posts appear.

Possible next steps:

* Put the `margo` folder anywhere you want
* Rename the `margo` folder to anything you want
* Update the config options in `margo/.margo/config.json`
* Make your own templates for Margo
* Remove the readme.md
* Replace sample-post-one.md and sample-post-two.md with your own awesome posts

A Note About Dates & Times:

Margo uses the third line of the markdown file to calculate the timestamp for the post, so you should follow a similar format to the sample posts:

    Post Title
    ====
    Mon May 14 12:00:00 EDT 2012

Note that while the date *must* be placed on the third line, you do not need to follow the sample date format exactly. Margo is somewhat flexibile in how it will accept dates and will work for any [valid date and time format](http://us.php.net/manual/en/datetime.formats.php) supported by PHP.

Dependencies
----

* PHP 5.2 or later

Nginx Configuration
----

Margo ships with a default .htaccess file for URL rewriting with Apache. Below is an exmaple configuration for Ngonx - You'll need to change paths accordingly.

    # Inside your virtualhost block:
    location ~ ^/margo{
      root   /var/www/margo;
      index  index.html index.htm index.php;
      if (!-e $request_filename) {
        rewrite ^/margo/?$ /margo/.margo/index.php?filename= last;
        rewrite ^/margo/(.+)$ /margo/.margo/index.php?filename=$1 last;
      }
    }

