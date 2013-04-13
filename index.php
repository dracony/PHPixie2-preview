<?php
$loader = require 'vendor/autoload.php';
$loader->add('', __DIR__.'/classes/');
$loader->add('PHPixie', __DIR__.'/vendor/phpixie/core/classes/');
$loader->add('PHPixie', __DIR__.'/vendor/phpixie/db/classes/');
$loader->add('PHPixie',__DIR__.'/vendor/phpixie/orm/classes/');

$pixie = new \App\Pixie(__DIR__);
$pixie->bootstrap()->http_request()->execute()->send_headers()->send_body();
?>