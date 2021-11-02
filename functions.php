<?php 

wp_enqueue_style('style', get_template_directory_uri() . '/src/style/style.css');
wp_enqueue_script('script', get_template_directory_uri() . '/src/script/script.js');

add_theme_support( 'post-thumbnails' ); 

register_post_type(
    'pupil_of_the_week',
    array(
        'labels' => array(
            'name' => 'Pupil van de week',
            'singular_name' => 'Pupil van de week',
            'add_new' => 'Nieuwe PvdW'
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'pupil-van-de-week'),
        'show_ui' => true,
        'description' => 'Pupil van de week',
        'supports' => array('title', 'thumbnail', 'editor', 'page-attributes'),
    )
);


register_post_type(
    'match_summary',
    array(
        'labels' => array(
            'name' => 'Wedstrijdverslag',
            'singular_name' => 'Wedstrijdverslag',
            'add_new' => 'Nieuw wedstrijdverslag'
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'wedstrijd-verslag'),
        'show_ui' => true,
        'description' => 'Wedstrijd verslag',
        'supports' => array('title', 'thumbnail', 'editor', 'page-attributes'),
    )
);

?>