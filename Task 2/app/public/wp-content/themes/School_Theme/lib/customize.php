<?php 

function custom_customize_register($wp_customize){

    $wp_customize->add_section('custom_nav_options', array(
        'title'=> 'Navigation Options',
        'description'=> 'You can change the navigation options here'
    ));

    $wp_customize->add_setting('custom_logo_placement', array(
        'default'=>'top',
        'sanitize_callback'=>'sanitize_text_field'
    ));


    $wp_customize->add_control('custom_logo_placement', array(
        'type'=>'select',
        'label'=>'Logo Placement',
        'choices'=> array(
            'top'=>'Top',
            'left'=>'Left'
        ),
        'section'=> 'custom_nav_options'
    ));
 

    $wp_customize->add_section('custom_footer_options', array(
        'title'=> 'Footer Options',
        'description'=> 'You can change footer here'
    ));

    $wp_customize->add_setting('custom_footer_bg', array(
        'default'=>'dark',
        'sanitize_callback'=>'sanitize_text_field'
    ));

    $wp_customize->add_control('custom_footer_bg', array(
        'type'=>'select',
        'label'=>'Background Color',
        'choices'=> array(
            'light'=>'Light',
            'dark'=>'Dark'
        ),
        'section'=> 'custom_footer_options'
    ));

    $wp_customize->add_setting('custom_theme_footer_bg', array(
        'default'=> '#ffc107',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_theme_footer_bg', array(
            'label'=>'Choose Color Footer Header',
            'section'=>'custom_footer_options',
            'settings'=> 'custom_theme_footer_bg'
        ))
    );

    $wp_customize->add_setting('custom_theme_footer_text', array(
        'default'=> '#ffffff',
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'custom_theme_footer_text', array(
            'label'=>'Choose Color Footer Text',
            'section'=>'custom_footer_options',
            'settings'=> 'custom_theme_footer_text'
        ))
    );

    $wp_customize->add_setting('custom_footer_widget_count',array(
        'default'=> '3',
        'sanitize_callback'=>'sanitize_text_field'
    ));

    $wp_customize->add_control('custom_footer_widget_count',array(
        'type'=>'select',
        'label'=> 'Footer Widget Count',
        'choices'=>array(
            '1'=>'1 Widget',
            '2'=>'2 Widget',
            '3'=>'3 Widget',
        ),

        'section'=> 'custom_footer_options'
    ));

    $wp_customize->add_section('custom_gen_options', array(
        'title'=> 'General Settings',
        'description'=> 'You can change the navigation options here'
        
    ));

    
    $wp_customize->add_setting('custom_gen_col_count',array(
        'default'=> '3',
        'sanitize_callback'=>'sanitize_text_field'
    ));

    $wp_customize->add_control('custom_gen_col_count',array(
        'type'=>'select',
        'label'=> 'Column Count',
        'description' => '<img src="' . esc_url(get_template_directory_uri() . '/images/1.jpeg') . '" alt="Custom Section Image">',
        'choices'=>array(
            '2'=>'2 Columns',
            '3'=>'3 Columns',
            '4'=>'4 Columns',
            '5'=>'5 Columns',
        ),

        'section'=> 'custom_gen_options'
    ));

    

}

add_action("customize_register","custom_customize_register");

?>