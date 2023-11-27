<?php

require_once("lib/enqueue-assets.php");
require_once("lib/navigation.php");
require_once("lib/sidebars.php");
require_once("lib/customize.php");


show_admin_bar(false);

function classExample_h6title($title)
{
    return "<h6>" . $title . "</h6>";
}

function classExample_excerptLength($words)
{
    return 15;
}

function classExample_themefooter()
{
    $footer_bg = get_theme_mod("custom_theme_footer_bg", "#ffc107");
    $footer_text = get_theme_mod("custom_theme_footer_text", "#fffff");


    echo "<div class='container-fluid' style='background-color:{$footer_bg};'><div class='row'><div class='col text-center'><p style='color:{$footer_text};'>Built by &copy; Class Example</p></div></div></div>";
}

add_filter('the_title', 'classExample_h6title');

add_filter('excerpt_length', 'classExample_excerptLength');

add_action('get_footer', 'classExample_themefooter');

function classexample_postorderasc($query)
{
    $query->set('order', 'ASC');
}

add_action('pre_get_posts', 'classexample_postorderasc');

function diwp_theme_customizer_options($wp_customize){
 
    $wp_customize->add_setting( 'diwp_logo', array(
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diwp_logo_control', array(
        'label' => 'Upload Website Logo',
        'priority' => 20,
        'section' => 'title_tagline',
        'settings' => 'diwp_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Logo',
                    'remove' => 'Remove Logo',
                    'change' => 'Change Logo',
                    )
    )));
 
}
 
add_action( 'customize_register', 'diwp_theme_customizer_options' );

?>