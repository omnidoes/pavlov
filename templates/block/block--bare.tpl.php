<?php print render($title_prefix); ?>
<?php if ($title): ?>
  <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
<?php endif; ?>
<?php print render($title_suffix); ?>

<?php print $content; ?>