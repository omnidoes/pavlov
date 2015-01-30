<?php

/*
 * HTML
 */

  function pavlov_preprocess_html(&$vars) {

    // Optionally, drop the site slogan from the page <title>
    if(drupal_is_front_page()) {
      // $vars['head_title'] = $vars['head_title_array']['name'];
    }
  }

  function pavlov_process_html(&$vars) {
    global $base_path;
    global $theme_path;
    
    // Constructing some resources for the <head>
    $html5head  = '<meta charset="utf-8">'.PHP_EOL;
    $html5head .= '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">'.PHP_EOL;
    $html5head .= '<meta name="viewport" content="width=device-width, initial-scale=1" />'.PHP_EOL;
    $html5head .= '<link rel="author" href="'.$base_path.$theme_path.'/humans.txt" />'.PHP_EOL;
    // Add $html5head to $head since other modules use this (i.e. Meta Tags)
    $vars['head'] .= $html5head;

    // Modernizr
    // http://modernizr.com/
    $vars['modernizr'] = '<script src="'.$base_path.$theme_path.'/assets/js/libs/modernizr.min.js"></script>';
  }
  
/*
 * Page
 */
  
  function pavlov_preprocess_page(&$vars) {
    global $theme_path;

    // If tabs exist, add some classes to use in templating
    if( !empty($vars['tabs']['#primary']) || !empty($vars['tabs']['#secondary']) ) {
      $vars['tabs_classes'] = 'tabs--container';
    } else {
      $vars['tabs_classes'] = null;
    }
    
  }

/*
 * Regions
 */
  
  function pavlov_preprocess_region(&$vars) {

    /* Getting the human-readable name of a region for use in templates */
    $regions_list = system_region_list('pavlov', $show = REGIONS_ALL);
    $vars['region_name'] = $regions_list[$vars['region']];

    /*
      Changing class naming conventions for regions from
      'region-[region_name]' to 'region--[region_name]'
     */
    foreach ($vars['classes_array'] as $key => $value) {
      $vars['classes_array'][$key] = preg_replace('/region-/', 'region--', $vars['classes_array'][$key], 1);
    }

  }

/*
 * Views
 */


/*
 * Blocks
 */
  
  function pavlov_preprocess_block(&$vars, $hook) {

    switch($vars['block_html_id']) {
      case 'block-system-main':
        // Use a bare template for the page's main content.
        $vars['theme_hook_suggestions'][] = 'block__bare';
        break;
    }

    $vars['title_attributes_array']['class'][] = 'block__title';
    $vars['content_attributes_array']['class'][] = 'block__content';

    if($vars['block']->subject != '') {
      // Drupal 7 should use a $title variable instead of $block->subject.
      $vars['title'] = $vars['block']->subject;
    } else {
      $vars['title'] = 'Untitled Section';
      $vars['title_attributes_array']['class'][] = 'element-invisible';
    }

  }

  function pavlov_process_block(&$vars, $hook) {

  }

/*
 * Nodes
 */

  function pavlov_preprocess_node($vars) {
    global $theme_path;
    $node_type = $vars['type'];

    // Formatting submitted dates in a more user-friendly manner
    // i.e. Monday, Jan 15th, 2012
    $vars['submitted'] = t('@date', array('@date' => date("l, M jS, Y", $vars['created']) ) );
  }

/*
 * Terms
 */

  function pavlov_preprocess_taxonomy_term(&$vars) {

  }

/*
 * Forms
 */


/*
 * Menus
 */

  function pavlov_menu_tree__main_menu(&$vars) {
    return '<ul class="nav nav--juicy">' . $vars['tree'] . '</ul>';
  }

  function pavlov_menu_link($vars) {
    $element = $vars['element'];

    $sub_menu = $element['#below'] ? drupal_render($element['#below']) : '';
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);

    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . '</li>';
  }

/* 
 * Links
 */