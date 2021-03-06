<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

  <head>
    <title><?php print $head_title; ?></title>

    <?php print $head; ?>
    
  	<!-- Import Stylesheets -->
    <?php print $styles; ?>
     
    <?php 
      // Import the Modernizr library 
      // We don't want this to be run through Drupal's drupal_add_js function
      // as it needs initialization priorities
      print $modernizr;
    ?>

  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes; ?>>
    
    <!--[if lte IE 9]>
      <div class="chromeframe">
        You are using an <strong>outdated</strong> browser.<br/>
        Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
      </div>
    <![endif]-->

    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
    
  	<!-- Javascript -->
    <?php print $scripts; ?>
  </body>

</html>
