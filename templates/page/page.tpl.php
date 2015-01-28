
<?php if($messages): ?>
  <div class="messages--wrapper">
    <?php print $messages; ?>
  </div>
<?php endif; ?>

<?php include('_includes/page--header.php'); ?>

<main class="page__body" role="main">

  <?php if(!empty($page['sidebar']) ) { ?>
  <aside class="page__sidebar">
    <h1 class="element-invisible">Main Sidebar</h1>
    <?php if (!empty($page['sidebar'])) print render($page['sidebar']) ?>
  </aside> <!-- /sidebar -->
  <?php } ?>
  
  <?php if ($action_links): ?>
  <ul class="action-links">
    <?php print render($action_links); ?>
  </ul>
  <?php endif; ?>

  <?php if (!empty($page['content'])) print render($page['content']) ?>
    
</main>

<?php include('_includes/page--footer.php'); ?>