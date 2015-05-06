<?php
/**
 * @file
 * Display Suite Sidebar template.
 *
 * Available variables:
 *
 * Layout:
 * - $classes: String of classes that can be used to style this layout.
 * - $contextual_links: Renderable array of contextual links.
 * - $layout_wrapper: wrapper surrounding the layout.
 *
 * Regions:
 *
 * - $main: Rendered main for the "main" region.
 * - $main_classes: String of classes that can be used to style the "main" region.
 *
 * - $sidebar_second: Rendered main for the "sidebar_second" region.
 * - $sidebar_second_classes: String of classes that can be used to style the "sidebar_second" region.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="<?php print $classes;?> clearfix">

  <!-- Needed to activate contextual links -->
  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

   <<?php print $main_prefix_wrapper; ?> class="page-header<?php print $main_prefix_classes; ?>">
      <?php print $main_prefix; ?>
    </<?php print $main_prefix_wrapper; ?>>
<div class="case-study">
  <div class="container">
    <<?php print $main_wrapper; ?> class="main-sidebar<?php print $main_classes; ?>">
      <?php print $main; ?>
    </<?php print $main_wrapper; ?>>
  
   <<?php print $sidebar_wrapper; ?> class="sidebar<?php print $sidebar_classes; ?>">
      <?php print $sidebar; ?>
    </<?php print $sidebar_wrapper; ?>> 
  </div>
  <div class="faux"></div>
</div>

</<?php print $layout_wrapper ?>>

<!-- Needed to activate display suite support on forms -->
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
