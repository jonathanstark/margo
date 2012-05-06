<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $blog->title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
