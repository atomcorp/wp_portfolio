<?php

// this gets the parent theme styles as a base
// http://codex.wordpress.org/Child_Themes
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
    wp_enqueue_style( 'bones', get_template_directory_uri().'/library/css/style.css' );
    wp_enqueue_style( 'bones', get_template_directory_uri().'/library/css/ie.css' );
    wp_enqueue_style( 'bones', get_template_directory_uri().'/library/css/login.css' );
}

// this only lets through posts with category - front-page
// see: "Show Only One Category on Home Page" http://codex.wordpress.org/Plugin_API/Action_Reference/pre_get_posts
// cat: 10 is 'front-page'
function show_front_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '10' );
    }
}
add_action( 'pre_get_posts', 'show_front_category' );

add_theme_support( 'post-thumbnails' ); 

// http://codex.wordpress.org/Customizing_the_Read_More
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
return '<a class="more-link" href="' . get_permalink() . '">View this site</a>';
}

// more more tags from single post
// https://wordpress.org/support/topic/removing-page-scroll-after-more-link
add_filter('the_content','remove_more_tag_jump_in_single_post');
function  remove_more_tag_jump_in_single_post( $text ) {
if( is_single() ) $text = preg_replace( '|<span id="more-[0-9]+"></span>|', '', $text );
return $text;
}

// http://wordpress.stackexchange.com/questions/33724/remove-links-from-images-using-functions-php
// removes a tag around the images, might have to reinstate
/*add_filter( 'the_content', 'attachment_image_link_remove_filter' );

function attachment_image_link_remove_filter( $content ) {
    $content =
        preg_replace(
            array('{<a(.*?)(wp-att|wp-content\/uploads)[^>]*><img}',
                '{ wp-image-[0-9]*" /></a>}'),
            array('<img','" />'),
            $content
        );
    return $content;
}*/

 ?>