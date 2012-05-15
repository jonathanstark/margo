<?php

// Parse config
// TODO: Check for missing config file
$config = json_decode(file_get_contents('./config.json'));
$blog = $config->blog;
$margo = $config->margo;
$feeds = $config->feeds;

# Let's rock!
ini_set('display_errors', $margo->display_errors);
include_once './plugins/feedwriter.php';
include_once './plugins/markdown.php';

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
            $content .= "* [{$post['title']}](./".str_replace($margo->post_file_extension, '', $post['fname']).") - ".date($blog->date_format, $post['time'])." \n";
        }
        echo Markdown($content);
        $body = ob_get_contents();
        ob_end_clean();
    } else {
        ob_start();
        $post = Markdown(file_get_contents($margo->{'404_template_file'}));
        include $margo->post_template_file;
        $body = ob_get_contents();
        ob_end_clean();
    }
    include_once $margo->blog_template_file;
} else if ($filename == "rss" || $filename == "atom") {
    ($filename=="rss") ? $feed = new FeedWriter(RSS2) : $feed = new FeedWriter(ATOM);

    $feed->setTitle($blog->title);
    $feed->setLink($blog->url);

    if($filename=="rss") {
        $feed->setDescription($blog->description);
        $feed->setChannelElement('language', $feeds->language);
        $feed->setChannelElement('pubDate', date(DATE_RSS, time()));
    } else {
        $feed->setChannelElement('author', $blog->author->name." - " . $blog->author->email);
        $feed->setChannelElement('updated', date(DATE_RSS, time()));
    }

    $posts = get_all_posts();

    if($posts) {
        $c=0;
        foreach($posts as $post) {
            if($c<$feeds->max_items) {
                $item = $feed->createNewItem();
                $item->setTitle($post['title']);
                $item->setLink(rtrim($blog->url, '/').'/'.str_replace($margo->post_file_extension, "", $post['fname']));
                $item->setDate($post['time']);
                $item->setDescription(Markdown(file_get_contents(rtrim($margo->directory_of_posts, '/').'/'.$post['fname'])));
                if($filename=="rss") {
                    $item->addElement('author', $blog->author->name." - " . $blog->author->email);
                    $item->addElement('guid', rtrim($blog->url, '/').'/'.str_replace($margo->post_file_extension, "", $post['fname']));
                }
                $feed->addItem($item);
                $c++;
            }
        }
    }
    $feed->genarateFeed();
} else {
    ob_start();
    if (!file_exists($filename)) {
        include $margo->{'404_template_file'}; // Not allowed to start identifier with bare integer :|
    } else {
        $post = Markdown(file_get_contents($filename));
        include $margo->post_template_file;
    }
    $body = ob_get_contents();
    ob_end_clean();
    include_once $margo->blog_template_file;
}

function get_all_posts() {
    global $margo;
    // print_r($margo->directory_of_posts);die;
    if($handle = opendir($margo->directory_of_posts)) {
        $files = array();
        $filetimes = array();
        while (false !== ($entry = readdir($handle))) {
            if(substr(strrchr($entry,'.'),1)==ltrim($margo->post_file_extension, '.')) {
                $fcontents = file($margo->directory_of_posts.$entry);
                $title = str_replace("#", "", $fcontents[0]);
                $time = strtotime($fcontents[2]);
                $files[] = array("time" => $time, "fname" => $entry, "title" => $title);
                $filetimes[] = $time;
                $titles[] = $title;
            }
        }
        array_multisort($filetimes, SORT_DESC, $files);
        return $files;
    } else {
        return false;
    }
}
