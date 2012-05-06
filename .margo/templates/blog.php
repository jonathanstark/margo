<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $blog->title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="alternate" type="application/rss+xml" title="<?php echo $blog->title ?>" href="<?php echo $blog->url ?>/rss">
        <link rel="service.post" type="application/atom+xml" title="<?php echo $blog->title ?>" href="<?php echo $blog->url ?>/atom">
        <link rel="stylesheet" href="<?php echo $blog->css ?>" type="text/css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <header>
            <h1><a href="<?php echo $blog->url ?>"><?php echo $blog->title ?></a></h1>
            <p><?php echo $blog->description ?></p>
        </header>
        <div class="section">
            <?php echo $body ?>
        </div>
    </body>
</html>
