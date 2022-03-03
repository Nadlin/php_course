<?php
$xml = simplexml_load_file('https://news.tut.by/rss/all.rss');
foreach ($xml->channel->item as $item) {
    foreach ($item->children() as $a=>$child) {
        echo $a."=". $child."<br>";
    }
    echo "<br>";
}
