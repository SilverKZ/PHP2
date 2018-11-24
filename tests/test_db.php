<?php

require_once __DIR__ . '/../autoload.php';

use App\Db;

$db = new Db();

$class = '\App\Models\Article';

/*
 * query(string $sql, array $params = [], $class = '');
 */
$sql = 'SELECT * FROM articles';
assert( 'array' === gettype( $db->query($sql, [], $class) ) );
assert( 'object' === gettype( $db->query($sql, [], $class)[0] ) );
assert( 'array' === gettype( $db->query($sql) ) );

$sql = 'SELECT * FROM articles WHERE id=:id';
assert( 'object' === gettype( $db->query($sql, [':id' => 1], $class)[0] ) );
assert( 'array' === gettype( $db->query($sql, [':id' => 1])[0] ) );
assert( true === empty( $db->query($sql, [':id' => 20000])[0] ) );

/*
 * execute(string $sql, array $params = []);
 */
$sql = 'INSERT INTO articles (title, content) VALUES(:title, :content)';
assert( true === $db->execute($sql, [':title' => 'Test', ':content' => 'Content']) );

$sql = 'DELETE FROM articles WHERE title=\'Test\'';
assert( true === $db->execute($sql) );

