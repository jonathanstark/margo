<!DOCTYPE html>
    <head>
    <title><?php echo $blog->title?></title>
    <link rel="alternate" type="application/rss+xml" title="<?php echo $blog->title?>" href="./rss">
    <link rel="service.post" type="application/atom+xml" title="<?php echo $blog->title?>" href="./atom">
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
        body {
            background:#fff;
            font-family:helvetica, arial, sans-serif;
            font-size:13px;
            line-height:1.4em;
            margin:0;
            padding:0;
        }
        header {
            display:block;
            background:#555;
            padding:1em 0;
            overflow:hidden;
        }
        header h1 {
            margin:0;
            padding:0;
            display:inline-block;
            float:left;
        }
        header a {
            color:#fff;
            text-decoration:none;
        }
        .container {
            width:80%;
            margin:0 auto;
        }
        .content a, footer a {
            color:#a60;
        }
        .content a:hover, footer a:hover {
            color:#d90;
        }
        aside.description {
            display:inline-block;
            text-align:right;
            font-style:italic;
            color:#ddd;
            float:right;
            line-height:1.5em;
        }
        hr {
            border:none;
            border-bottom:1px solid #000;
        }
        article.post {
            display:block;
            padding:1em 0;
        }
        .content {
            padding:1em 0;
        }
        footer {
            display:block;
            text-align:center;
            color:#777;
            font-size:0.75em;
            padding:1em;
            border-top:1px solid #aaa;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="./"><?php echo $blog->title?></a></h1>
            <aside class="description"><?php echo $blog->description?></aside>
        </div>
    </header>
    <div class="container content">
        <?php echo $body ?>
    </div>
    <footer>
        <div class="container">
            Copyright &copy; <?php echo date("Y") ?>
            <a href="mailto:<?php echo $blog->author->email?>"> <?php echo $blog->author->name?></a> |
            <a href="./rss">RSS</a> | <a href="./atom">ATOM</a>
        </div>
    </footer>
</body>
</html>