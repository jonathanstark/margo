<?php

# Config
define('DIRECTORY_OF_POSTS', '../');                // The directory where you save all your markdown files relative to this file
define('POST_FILE_EXTENSION', '.mdown');               // The file extenstion you use on your markdown files (e.g., .md, .mkdown, .markdown)
define('FILE_NOT_FOUND_MESSAGE', './not_found.mdown'); // Message to load if md file doesn't exist
define('MARKDOWN_DOT_PHP_FILE', './markdown.php');  // The location of Michel Fortin's markdown.php file relative to this file
define('BLOG_TEMPLATE_FILE', './template.php');     // The location of your blog template file relative to this file
define('POST_TEMPLATE_FILE', './post.php');     // The location of your post template file relative to this file
define('DISPLAY_ERRORS', FALSE);					// Set to TRUE if you're dorking around

# YOU SHOULDN'T HAVE TO MESS AROUND BELOW THIS LINE!

# Let's rock!
ini_set('display_errors', DISPLAY_ERRORS);
include_once MARKDOWN_DOT_PHP_FILE;

if (empty($_GET['filename'])) {
    $filename = NULL;
} else {
    $filename = DIRECTORY_OF_POSTS . $_GET['filename'] . POST_FILE_EXTENSION;
}

if ($filename==NULL) {
    if ($handle = opendir(DIRECTORY_OF_POSTS)) {
        $files = array();
        $filetimes = array();
        while (false !== ($entry = readdir($handle))) {
            if(substr(strrchr($entry,'.'),1)==ltrim(POST_FILE_EXTENSION, '.')) {
                $ftime = filectime(DIRECTORY_OF_POSTS.$entry);
                $files[] = array("ftime" => $ftime, "fname" => $entry);
                $filetimes[] = $ftime;
            }
        }
        array_multisort($filetimes, SORT_DESC, $files);
        ob_start();
        foreach($files as $file) {
            $post = Markdown(file_get_contents(rtrim(DIRECTORY_OF_POSTS, '/').'/'.$file['fname']));
            include POST_TEMPLATE_FILE;
        }
        $body = ob_get_contents();
        ob_end_clean();
    } else {
        ob_start();
            $post = Markdown(file_get_contents(FILE_NOT_FOUND_MESSAGE));
            include POST_TEMPLATE_FILE;
            $body = ob_get_contents();
        ob_end_clean();
    }
    include_once BLOG_TEMPLATE_FILE;
} else {
    if (!file_exists($filename)) {
         ob_start();
            $post = Markdown(file_get_contents(FILE_NOT_FOUND_MESSAGE));
            include POST_TEMPLATE_FILE;
            $body = ob_get_contents();
        ob_end_clean();
    } else {
        ob_start();
            $post = Markdown(file_get_contents($filename));
            include POST_TEMPLATE_FILE;
            $body = ob_get_contents();
        ob_end_clean();
    }
    include_once BLOG_TEMPLATE_FILE;
}
