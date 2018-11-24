<?php

use App\Models\Article;

// findAll();
assert( 'array' === gettype( Article::findAll() ) );

// findById($id);
assert( 'object' === gettype( Article::findById(1) ) );
assert( false === Article::findById(10000000) );

// findLast($length);
assert( 'array' === gettype( Article::findLast(2) ) );
assert( 2 === count( Article::findLast(2) ) );