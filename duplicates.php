<?php

$filename = $argv[1];

if(empty($filename)) {
    echo "Usage: " . PHP_EOL;
    echo "> php duplicates.php myfile.xml" . PHP_EOL;
    exit(1);
}

if(!file_exists($filename)) {
    echo "File not found: " . $filename . PHP_EOL;
    exit(1);
}

$xml = simplexml_load_file($filename);

$ids = [];

foreach($xml->shop->offers->offer as $offer) {
    $ids[] = (string)$offer['id'];
}

$counts = array_count_values($ids);

foreach($counts as $key => $value) {
    if($value > 1) {
        echo $value . ' => ' . $key . PHP_EOL;
    }
}

