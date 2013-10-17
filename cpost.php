<?php

/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 */
/* * ******************* META BOX DEFINITIONS ********************** */

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'YOUR_PREFIX_';

global $meta_boxes;

$meta_boxes = array();

$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'process',
    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => 'Process',
    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array('process'),
    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',
    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',
    // List of meta fields
    'fields' => array(
     array(
        'name' => 'Stage',
        'id' => 'stage',
        'type' => 'text',
        ),
     array(
        'name' => 'Stage without span',
        'id' => 'stages',
        'type' => 'text',
        ),
     array(
            'name'             => 'Process Image',
            'id'               => "processimage",
            'type'             => 'plupload_image',
            'max_file_uploads' => 1,
            ),
     ),
    );

$meta_boxes[] = array(
    // Meta box id, UNIQUE per meta box. Optional since 4.1.5
    'id' => 'products',
    // Meta box title - Will appear at the drag and drop handle bar. Required.
    'title' => 'Products',
    // Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
    'pages' => array('products'),
    // Where the meta box appear: normal (default), advanced, side. Optional.
    'context' => 'normal',
    // Order of meta box: high (default), low. Optional.
    'priority' => 'high',
    // List of meta fields
    'fields' => array(
      array(
        'name' => 'Top Text',
        'desc' => "",
        'id' => "products_toptext",
        'type' => 'wysiwyg',
        'std' => "",
        'cols' => '20',
        'rows' => '8',
        ),
      array(
        'name' => 'Second Text',
        'desc' => "",
        'id' => "products_secondtext",
        'type' => 'wysiwyg',
        'std' => "",
        'cols' => '20',
        'rows' => '8',
        ),
      ),
    );


/* * ******************* META BOX REGISTERING ********************** */

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes() {
    global $meta_boxes;

    // Make sure there's no errors when the plugin is deactivated or during upgrade
    if (class_exists('RW_Meta_Box')) {
        foreach ($meta_boxes as $meta_box) {
            new RW_Meta_Box($meta_box);
        }
    }
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action('admin_init', 'YOUR_PREFIX_register_meta_boxes');