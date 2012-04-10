<!DOCTYPE html>
    <head>
    <title>Blog</title>
    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
        body {
            background:#fff;
            font-family:helvetica, arial, sans-serif;
            font-size:16px;
        }
        #container {
            width:80%;
            margin:0 auto;
        }
        hr {
            border:none;
            border-bottom:1px solid #000;
        }
        article.post {
            display:block;
            padding:1em 0;
            border-bottom:1px solid #aaa;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Blog</h1>
        <hr>
        <?php echo $body ?>
    </div>
</body>
</html>