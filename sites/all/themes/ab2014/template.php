<?php

/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function ab2014_preprocess_maintenance_page(&$vars) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  // techdrill_preprocess_html($vars);
  // techdrill_preprocess_page($vars);

  // This preprocessor will also be used if the db is inactive. To ensure your
  // theme is used, add the following line to your settings.php file:
  // $conf['maintenance_theme'] = 'techdrill';
  // Also, check $vars['db_is_active'] before doing any db queries.
}

function ab2014_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  $element['#localized_options']['html'] = TRUE;


  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  if ($element['#original_link']['menu_name'] == "main-menu" && isset($element['#localized_options']['attributes']['title'])){
    $element['#title'] .= '<span class="description">' . $element['#localized_options']['attributes']['title'] . '</span>';
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function ab2014_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
    // Alternative (HTML5) placeholder attribute instead of using the javascript
        $form['search_block_form']['#attributes']['placeholder'] = t('Search my website...');
    }
     if ($form_id == 'simplenews_block_form_1') {
    // Alternative (HTML5) placeholder attribute instead of using the javascript
        $form['mail']['#attributes']['placeholder'] = t('Enter email...'); 
    }
}

function ab2014_page_alter(&$page) {
  if (arg(0) == 'search') {
    if (!empty($page['content']['system_main']['search_form'])) {
      hide($page['content']['system_main']['search_form']);
    }
  }
}

function ab2014_status_messages(&$variables) {
  $display = $variables['display'];
    $output = '';
    $status_heading = array(
      'status' => t('Status message'),
      'error' => t('Error message'),
      'warning' => t('Warning message'),
    );
    foreach (drupal_get_messages($display) as $type => $messages) {
      $output .= '<div class="messages ' . $type . '"><div class="container">';
      if (!empty($status_heading[$type])) {
        $output .= '<h2 class="element-invisible">' . $status_heading[$type] . '</h2>';
      }
      if (count($messages) > 1) {
        $output .= " <ul>\n";
        foreach ($messages as $message) {
          $output .= '  <li>' . $message . "</li>\n";
        }
        $output .= " </ul>\n";
      }
      else {
        $output .= $messages[0];
      }
      $output .= "</div></div>\n";
    }
    return $output;
}

function ab2014_form_user_login_alter(&$form, &$form_state) {
    $form['name']['#description'] = t('');
    $form['pass']['#description'] = t('');
    // Shorter, inline request new password link.
  $form['actions']['request_password'] = array(
    '#markup' => l(t('Forgot your login details?'), 'user/password', array('attributes' => array('title' => t('Forgot your login details?')))),
  );  
}


function ab2014_field_collection_view($variables) {
  $element = $variables['element'];
  return $element['#children'];
}
/**
 * Implements hook_modernizr_load_alter().
 *
 * @return
 *   An array to be output as yepnope testObjects.
 */
/* -- Delete this line if you want to use this function
function techdrill_modernizr_load_alter(&$load) {

}

/**
 * Implements hook_preprocess_html()
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */

/**
 * Override or insert variables into the page template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */

// Override the event content type to remove the header 
// function ab2014_preprocess_page(&$variables, $hook) {   
//     //Add custom page.tpl.php based on content type 
//     if (isset($variables['node']->type) && !empty($variables['node']->type) && (
//       $variables['node']->type == 'homepage' ||
//       $variables['node']->type == 'page')){
//     // (underscores used in page__ )
//     $variables['theme_hook_suggestions'][] =  'page__' .  $variables['node']->type;
//     }
// }


function ab2014_preprocess_page(&$vars, $hook) {
  if (isset($vars['node']->type)) {
    // If the content type's machine name is "my_machine_name" the file
    // name will be "page--my-machine-name.tpl.php".
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
  }
}


function ab2014_preprocess_search_results(&$variables) {
  if (arg(0) == 'search') {
      $variables['ab_search_count'] = (isset($variables['results'])) ? count($variables['results']) : 0;
    }
}
/**
 * Override or insert variables into the region templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function techdrill_preprocess_region(&$vars) {

}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function techdrill_preprocess_block(&$vars) {

}
// */

/**
 * Override or insert variables into the entity template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function techdrill_preprocess_entity(&$vars) {

}
// */

/**
 * Override or insert variables into the node template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function ab2014_preprocess_node(&$vars) {
  $node = $vars['node'];
}

/**
 * Override or insert variables into the field template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("field" in this case.)
 */
/* -- Delete this line if you want to use this function
function techdrill_preprocess_field(&$vars, $hook) {

}
// */

/**
 * Override or insert variables into the comment template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function techdrill_preprocess_comment(&$vars) {
  $comment = $vars['comment'];
}
// */

/**
 * Override or insert variables into the views template.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
/* -- Delete this line if you want to use this function
function techdrill_preprocess_views_view(&$vars) {
  $view = $vars['view'];
}
// */


/**
 * Override or insert css on the site.
 *
 * @param $css
 *   An array of all CSS items being requested on the page.
 */

function ab2014_css_alter(&$css) {
  // unset($css['modules/system/system.menus.css']);
  unset($css['sites/all/modules/field_collection/field_collection.theme.css']);
  unset($css['sites/all/libraries/flexslider/flexslider.css']);
  unset($css['sites/all/modules/flexslider/assets/css/flexslider_img.css']);
}
// */

/**
 * Override or insert javascript on the site.
 *
 * @param $js
 *   An array of all JavaScript being presented on the page.
 */
/* -- Delete this line if you want to use this function
function techdrill_js_alter(&$js) {

}
// */