<?php

require_once __DIR__ . '/../autoload.php';

use App\Config;

$config = Config::instance();

assert( 'array' === gettype( $config->data['db'] ) );
assert( true === isset( $config->data['db']['type'] ) );
assert( true === isset( $config->data['db']['host'] ) );
assert( true === isset( $config->data['db']['dbname'] ) );
assert( true === isset( $config->data['db']['user'] ) );
assert( true === isset( $config->data['db']['pass'] ) );

