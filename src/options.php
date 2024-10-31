<?php
add_action('admin_menu', 'pagepeel_add_admin_menu');
add_action('admin_init', 'pagepeel_settings_init');


function pagepeel_add_admin_menu()
{
    add_options_page('Page Peel', 'Page Peel', 'manage_options', 'page_peel', 'pagepeel_options_page');
}


function pagepeel_settings_init()
{
    register_setting('pluginPage', 'pagepeel_settings');
    $baseURL = get_option('siteurl').'/wp-content/plugins/page-peel';


    $options = get_option('pagepeel_settings');

    $defaults = [
        'pagepeel_small_image' => $baseURL.'/small.jpg',
        'pagepeel_large_image' => $baseURL.'/large.jpg',
        'pagepeel_target_url'  => 'https://www.avramovic.info',
        'pagepeel_link_target' => '_blank'
    ];

    if (!$options) {
        update_option('pagepeel_settings', $defaults);
    }

    add_settings_section(
        'pagepeel_pluginPage_section',
        __('Page Peel settings', 'pagepeel'),
        'pagepeel_settings_section_callback',
        'pluginPage'
    );

    add_settings_field(
        'pagepeel_small_image',
        __('Small image URL (100x100px)', 'pagepeel'),
        'pagepeel_small_image_render',
        'pluginPage',
        'pagepeel_pluginPage_section'
    );

    add_settings_field(
        'pagepeel_large_image',
        __('Large image URL (400x400px)', 'pagepeel'),
        'pagepeel_large_image_render',
        'pluginPage',
        'pagepeel_pluginPage_section'
    );

    add_settings_field(
        'pagepeel_target_url',
        __('Target URL', 'pagepeel'),
        'pagepeel_target_url_render',
        'pluginPage',
        'pagepeel_pluginPage_section'
    );

    add_settings_field(
        'pagepeel_link_target',
        __('Link target', 'pagepeel'),
        'pagepeel_link_target_render',
        'pluginPage',
        'pagepeel_pluginPage_section'
    );
}


function pagepeel_small_image_render()
{
    $options = get_option('pagepeel_settings');
    ?>
    <input type="url" required="required" name="pagepeel_settings[pagepeel_small_image]"
           style="width: 400px !important" value="<?php echo $options['pagepeel_small_image']; ?>">
    <?php
}


function pagepeel_large_image_render()
{
    $options = get_option('pagepeel_settings');
    ?>
    <input type="url" required="required" name="pagepeel_settings[pagepeel_large_image]"
           style="width: 400px !important" value="<?php echo $options['pagepeel_large_image']; ?>">
    <?php
}


function pagepeel_target_url_render()
{
    $options = get_option('pagepeel_settings');
    ?>
    <input type="url" required="required" name="pagepeel_settings[pagepeel_target_url]"
           style="width: 400px !important" value="<?php echo $options['pagepeel_target_url']; ?>">
    <?php
}


function pagepeel_link_target_render()
{
    $options = get_option('pagepeel_settings');
    ?>
    <input type='text' name='pagepeel_settings[pagepeel_link_target]'
           value='<?php echo $options['pagepeel_link_target']; ?>'>
    <?php
}


function pagepeel_settings_section_callback()
{
    echo __('Configure page peel effect here!', 'pagepeel');
}


function pagepeel_options_page()
{

    ?>
    <form action='options.php' method='post'>

        <h2>Page Peel</h2>

        <?php
        settings_fields('pluginPage');
        do_settings_sections('pluginPage');
        submit_button();
        ?>

    </form>
    <?php

}