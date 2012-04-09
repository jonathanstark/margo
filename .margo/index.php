<?php

# Config
define('DIRECTORY_OF_POSTS', '../');                // The directory where you save all your markdown files relative to this file
define('POST_FILE_EXTENSION', '.mdown');               // The file extenstion you use on your markdown files (e.g., .md, .mkdown, .markdown)
define('FILE_NOT_FOUND_URL', '/error');             // URL redirect if md file doesn't exist
define('MARKDOWN_DOT_PHP_FILE', './markdown.php');  // The location of Michel Fortin's markdown.php file relative to this file
define('POST_TEMPLATE_FILE', './template.php');     // The location of your template file relative to this file
define('DISPLAY_ERRORS', FALSE);					// Set to TRUE if you're dorking around

# YOU SHOULDN'T HAVE TO MESS AROUND BELOW THIS LINE!

# Let's rock!
ini_set('display_errors', DISPLAY_ERRORS);
include_once MARKDOWN_DOT_PHP_FILE;
$filename = DIRECTORY_OF_POSTS . $_GET['filename'] . POST_FILE_EXTENSION;

if (empty($filename)) {
    // TODO: Show index of blog titles by date descending (instead of error page)
    header('location: ' . FILE_NOT_FOUND_URL);
} else {
    if (!file_exists($filename)) {
        header('location: ' . FILE_NOT_FOUND_URL);
    } else {
        $post = Markdown(file_get_contents($filename));
        include_once POST_TEMPLATE_FILE;
    }
}
