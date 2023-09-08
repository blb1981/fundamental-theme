 <?php 
  $parent = wp_get_post_parent_id(get_the_ID());
  $grandparent = $parent ? wp_get_post_parent_id($parent) : 0;
  $greatgrandparent = $grandparent ? wp_get_post_parent_id($grandparent) : 0;
  if($parent): 
?>

<!-- Start Breadcrumbs -->
<nav aria-label="breadcrumb md-3">
  <ol id="breadcrumbs" class="breadcrumb">
    <?php if ($greatgrandparent): ?>
    <li class="breadcrumb-item">
      <a href="<?php echo get_permalink($greatgrandparent); ?>">
        <?php echo get_the_title($greatgrandparent); ?></a>
      </li>
    <?php endif; ?>
    <?php if ($grandparent): ?>
    <li class="breadcrumb-item">
      <a href="<?php echo get_permalink($grandparent); ?>">
      <?php echo get_the_title($grandparent); ?></a>
    </li>
    <?php endif; ?>
    <li class="breadcrumb-item">
      <a href="<?php echo get_permalink($parent); ?>">
      <?php echo get_the_title($parent); ?></a>
    </li>
    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
  </ol>
</nav>
<!-- End Breadcrumbs -->

<?php endif; ?>