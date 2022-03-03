<?php
$xml = simplexml_load_file('http://lenta.ru/rss/top7');
$titles = $xml->xpath("//title");

foreach($titles as $num => $node) {
    echo $num." : ".$node,"<br>\n";
}
