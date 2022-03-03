<?php
$xml = simplexml_load_file('http://lenta.ru/rss/news');
foreach ($xml->channel->item as $item) {
    foreach ($item->children() as $a=>$child) {
        echo $a."=". $child."<br>\n";
    }
    echo "<br>\n";
}
