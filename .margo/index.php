<?php

$config = json_decode(file_get_contents('../.margo_config.json'));

$blog = $config->blog;
$margo = $config->margo;
$feeds = $config->feeds;

# Let's rock!
ini_set('display_errors', $margo->display_errors);
include_once './markdown.php';
include_once './feedwriter.php';

function get_all_posts() {
    global $margo;
    if($handle = opendir($margo->directory_of_posts)) {
        $files = array();
        $filetimes = array();
        while (false !== ($entry = readdir($handle))) {
            if(substr(strrchr($entry,'.'),1)==ltrim($margo->post_file_extension, '.')) {
                $ftime = filectime($margo->directory_of_posts.$entry);
                $fcontents = file($margo->directory_of_posts.$entry);
                $files[] = array("ftime" => $ftime, "fname" => $entry, "title" => str_replace("#", "", $fcontents[0]));
                $filetimes[] = $ftime;
            }
        }
        array_multisort($filetimes, SORT_DESC, $files);
        return $files;
    } else {
        return false;
    }
}

if (empty($_GET['filename'])) {
    $filename = NULL;
} else if($_GET['filename'] == 'rss' || $_GET['filename'] == "atom") {
    $filename = $_GET['filename'];
} else {
    $filename = $margo->directory_of_posts . $_GET['filename'] . $margo->post_file_extension;
}

if ($filename==NULL) {
    $posts = get_all_posts();
    if($posts) {
        ob_start();
        $content = "";
        foreach($posts as $post) {
            $content .= "* [{$post['title']}](".str_replace($margo->post_file_extension, '', $post['fname']).")\n";
        }
        echo Markdown($content);
        $body = ob_get_contents();
        ob_end_clean();
    } else {
        ob_start();
            $post = Markdown(file_get_contents($margo->file_not_found_message));
            include $margo->post_template_file;
            $body = ob_get_contents();
        ob_end_clean();
    }
    include_once $margo->blog_template_file;
} else if ($filename == "rss") {
    $rss = new FeedWriter(RSS2);
    $rss->setTitle($blog->title);
    $rss->setLink($blog->url);
    $rss->setDescription($blog->description);
    $rss->setChannelElement('language', $feeds->language);
    $rss->setChannelElement('pubDate', date(DATE_RSS, time()));

    $posts = get_all_posts();

    if($posts) {
        $c=0;
        foreach($posts as $post) {
            if($c<$feeds->max_items) {
                $item = $rss->createNewItem();
                $item->setTitle($post['title']);
                $item->setLink(rtrim($blog->url, '/').'/'.str_replace($margo->post_file_extension, "", $post['fname']));
                $item->setDate($post['ftime']);
                $item->setDescription(Markdown(file_get_contents(rtrim($margo->directory_of_posts, '/').'/'.$post['fname'])));
                $item->addElement('author', $blog->author->name." - " . $blog->author->email);
                $item->addElement('guid', rtrim($blog->url, '/').'/'.str_replace($margo->post_file_extension, "", $post['fname']));
                $rss->addItem($item);
                $c++;
            }
        }
    }
    $rss->genarateFeed();
} else if ($filename == "atom") {
    $atom = new FeedWriter(ATOM);
    $atom->setTitle($blog->title);
    $atom->setLink($blog->url);
    $atom->setChannelElement('author', $blog->author->name." - " . $blog->author->email);
    $atom->setChannelElement('updated', date(DATE_RSS, time()));

    $posts = get_all_posts();

    if($posts) {
        $c=0;
        foreach($posts as $post) {
            if($c<$feeds->max_items) {
                $item = $atom->createNewItem();
                $item->setTitle($post['title']);
                $item->setLink(rtrim($blog->url, '/').'/'.str_replace($margo->post_file_extension, "", $post['fname']));
                $item->setDate($post['ftime']);
                $item->setDescription(Markdown(file_get_contents(rtrim($margo->directory_of_posts, '/').'/'.$post['fname'])));
                $atom->addItem($item);
                $c++;
            }
        }
    }
    $atom->genarateFeed();
} else {
    if (!file_exists($filename)) {
         ob_start();
            $post = Markdown(file_get_contents($margo->file_not_found_message));
            include $margo->post_template_file;
            $body = ob_get_contents();
        ob_end_clean();
    } else {
        ob_start();
            $post = Markdown(file_get_contents($filename));
            include $margo->post_template_file;
            $body = ob_get_contents();
        ob_end_clean();
    }
    include_once $margo->blog_template_file;
}
