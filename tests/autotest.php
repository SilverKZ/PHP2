<?php

require __DIR__ . '/../autoload.php';

$files = [];

$result = scandir(dirname(__FILE__));

foreach ($result as $file) {
    if ( !in_array($file, ['.', '..', basename(__FILE__)]) ) {
        include __DIR__ . '/' . $file;
        echo $file . ' - tested<br>';
    }
}

echo 'Tests successfully passed!';

