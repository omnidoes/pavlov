<header class="page__header" role="banner">

  <div class="region region--header">
    <div class="l-contain">

      <h1 class="site__name">
        <a href="<?php print check_url($front_page); ?>" title="<?php print check_plain($site_name); ?>">
          <span class="element-invisible"><?php print render($site_name); ?></span>
          <img src="<?php print $logo; ?>" alt="<?php print $site_name; ?> Logo"/>
        </a>
      </h1>

      <?php if (!empty($page['header'])) print render($page['header']); ?>
    </div>
  </div>

  <div class="region region--nav">
    <div class="l-contain">
      <nav role="navigation">
        <h1 class="element-invisible">Site Navigation</h1>
        <?php 
        $main_menu = menu_tree('main-menu');
        print drupal_render($main_menu);
        ?>
      </nav>
    </div>
  </div>

</header>