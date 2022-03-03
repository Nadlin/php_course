<?php
$xml = simplexml_load_file('https://news.tut.by/rss/all.rss');
$titles = $xml->xpath("//title");

foreach($titles as $num => $node) {
    echo $num." : ".$node,"<br>";
}
