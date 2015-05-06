<?php

/**
 * @file
 * Display Suite Sidebar configuration.
 */

function ds_main() {
  return array(
    'label' => t('Main'),
    'regions' => array(
      'main_prefix' => t('main_prefix'),
      'main' => t('main'),
      'sidebar' => t('sidebar'),
      'main_suffix' => t('main_suffix'),
    ),
    // Uncomment if you want to include a CSS file for this layout (sidebar.css)
    'css' => TRUE,
    // Uncomment if you want to include a preview for this layout (sidebar.png)
    // 'image' => TRUE,
  );
}
