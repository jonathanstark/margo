<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $blog->title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="alternate" type="application/rss+xml" title="<?php echo $blog->title ?>" href="<?php echo $blog->url ?>/rss">
        <link rel="service.post" type="application/atom+xml" title="<?php echo $blog->title ?>" href="<?php echo $blog->url ?>/atom">
        <style type="text/css" media="screen">
            html {
                background-color: #333;
            }
            body {
                font: 100%/1.5em Helvetica, sans-serif;
                margin: 0;
                padding: 0;
                text-align: center;
            }
            a {
                color: darkmagenta;
                font-weight: bold;
                text-decoration: none;
            }
            a:hover {
                color: white;
                background-color: darkmagenta;
            }
            #wrapper {
                background-color: #ccc;
                max-width: 37.5em;
                margin: 0 auto;
                text-align: left;
            }
            #header, #content, #footer {
                padding: 1em 2em;
            }
            #header {
                background-color: #fff;
            }
            #content {
                background-color: #eee;
                min-height: 26.5em;
            }
            #footer {
                background-color: #ddd;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <h1><a href="<?php echo $blog->url ?>"><?php echo $blog->title ?></a></h1>
                <p><?php echo $blog->description ?></p>
            </div>
            <div id="content">
                <div class="section">
                    <?php echo $body ?>
                </div>
            </div>
            <div id="footer">
                &copy; Yada yada yada
            </div>
        </div>
    </body>
</html>
