<?php
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><root></root>', null, false);
$data = [['id' => 1, 'value' => 'value1'],
    ['id' => 2, 'value' => 'value2'],
    ['id' => 3, 'value' => 'value3']];
foreach ($data as $row) {
    $node = $xml->addChild('row');
    foreach ($row as $key => $value) {
        $node->addChild($key, $value);
    }
}
header('Content-Type: application/xml');
echo $xml->saveXML();