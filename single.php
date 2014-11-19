<?php
/*
Template logic for displaying a single post.
*/

$context = Timber::get_context();
$context['post'] = Timber::get_post();

Timber::render('single.twig',$context);
 ?>
