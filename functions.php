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
        'has_archive' => true,
        'rewrite' => array('slug' => 'pupil-van-de-week'),
        'rest_base' => 'pupil-van-de-week',
        'show_ui' => true,
        'description' => 'Pupil van de week',
        'supports' => array('title', 'thumbnail', 'editor', 'page-attributes'),
    )
);

?>