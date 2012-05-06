<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $blog->title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="alternate" type="application/rss+xml" title="<?php echo $blog->title ?>" href="<?php echo $blog->url ?>/rss">
        <link rel="service.post" type="application/atom+xml" title="<?php echo $blog->title ?>" href="<?php echo $blog->url ?>/atom">
        <style type="text/css" media="screen">
            body {
                font: 100%/1.5em Helvetica, sans-serif;
                text-align: center;
            }
            #wrapper {
                max-width: 800px;
                margin: 0 auto;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <id="header">
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
