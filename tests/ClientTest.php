<?php

require_once __DIR__.'/../src/Client.php';

test('single', function () {
    $client = new Client('', '');

    $json = json_get_contents(__DIR__.'/fixtures/single.json');

    $table = $client->parse($json, '', '');
    echo "================================\n";
    var_dump($table);
    echo $client->csv($table);

});
