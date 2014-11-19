<?php

//Add support for post thmbnaiils
add_theme_support('post-thumbnails');

//Register a Main Menu that can be edited through the wordpress admin
register_nav_menu('Main','The main navigation');

//Use this to add data that will be added and provided by all the context when calling Timber::get_context();
add_filter('timber_context','add_to_context');

function add_to_context($data) {
    $data['menu'] = new TimberMenu(); //This will grab the first menu generated, if you want a specific menu simply add the menu slug
    return $data;
}

add_action('wp_enqueue_scripts', 'add_scripts');

function add_scripts() {
  //Load in jquery from google CDN, if you need to use it, add it as a dependancy
  wp_deregister_script('jquery');
  wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js", false, true);
  //Load in a main js folder with no depedancies, no version and added in the footer
  wp_register_script('main', get_stylesheet_directory_uri() . '/js/main.js', null, null, true);
  wp_enqueue_script('main');
}


 ?>
