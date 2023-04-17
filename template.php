<?php

/**
 * Implements template_preprocess_page().
 */
function modoc_preprocess_page(&$variables) {
  backdrop_add_library('system', 'opensans', TRUE);

/* --- Inject Typeface CSS --- */
  $css_options = array ('type' => 'inline', 
                             'group' => CSS_THEME,
                             'every_page' => TRUE );
  $fonts = array(
      'opensans' => "'Open Sans', Sans-serif",
      'montserrat' => "'Montserrat', Sans-serif",
      'lekton' => "'Lekton', Monospace",
      'newscycle' => "'News Cycle', Sans-serif",
      'benchnine' => "'Bench Nine', Sans-serif",
    );                           
  
  if (($thefont = theme_get_setting('body_font')) != 'opensans') {
     backdrop_add_css("body {font: 1rem/1.7 {$fonts[$thefont]}; }", $css_options);       
  }                           
  if (($thefont = theme_get_setting('headings_font')) != 'lekton') {
     backdrop_add_css("h1,h2,h3,h4,h5 {font-family: {$fonts[$thefont]}; }", $css_options);       
  }                           
  if (($thefont = theme_get_setting('main_menu_font')) != 'lekton') {
     backdrop_add_css(".block-system-main-menu a { font-family: {$fonts[$thefont]}; }", $css_options);       
  }                           
  if (($thefont = theme_get_setting('sidebar_menu_font')) != 'montserrat') {
     backdrop_add_css(".block-menu-menu-sidebar a { font-family:  {$fonts[$thefont]}; }", $css_options);       
  }                           
  if (($thefont = theme_get_setting('table_hd_font')) != 'newscycle') {
     backdrop_add_css("th {font-family: {$fonts[$thefont]}; }", $css_options);       
  }                           
  if (theme_get_setting('page_width')) {
     $max_width = theme_get_setting('page_width');
     backdrop_add_css(".layout {max-width: {$max_width}; }", $css_options);
  }                           
  if (theme_get_setting('text_scale')) {
     $font_size = theme_get_setting('text_scale');
     backdrop_add_css("html { font-size: {$font_size}; }", $css_options);
  }                           
/* --- */

  $node = menu_get_object();
  if ($node) {
    $variables['classes'][] = 'page-node-' . $node->nid;
  }
  // Add CSS classes to term listing pages.
  $path = current_path();
  if (substr($path, 0, 14) == 'taxonomy/term/') {
    $parts = arg();
    if (count($parts) == 3) {
      $term = taxonomy_term_load($parts[2]);
      $variables['classes'][] = 'term-page';
      $variables['classes'][] = backdrop_clean_css_identifier('term-page-' . $term->name);
    }
  }
  elseif (substr($path, 0, 13) == 'node/preview/') {
    $variables['classes'][] = 'node-preview-page';
  }
}

/**
 * Implements template_preprocess_node().
 */
function modoc_preprocess_node(&$variables) {
  if ($variables['status'] == NODE_NOT_PUBLISHED) {
    $name = node_type_get_name($variables['type']);
    $variables['title_suffix']['unpublished_indicator'] = array(
      '#type' => 'markup',
      '#markup' => '<div class="unpublished-indicator">' . t('This @type is unpublished.', array('@type' => $name)) . '</div>',
    );
  }
}

/**
 * Implements template_preprocess_layout().
 */
function modoc_preprocess_layout(&$variables) {
  if (isset($variables['layout_info']['flexible'])) {
    // Add css class to layout.
    $variables['classes'][] = 'layout-' . backdrop_clean_css_identifier($variables['layout_info']['name']);
  }
}

/**
 * Implements theme_breadcrumb().
 */
function modoc_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $output = '';
  if (!empty($breadcrumb)) {
    // Differs to core version in not using "»".
    $output .= '<nav role="navigation" class="breadcrumb">';
    $output .= '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<ol><li>' . implode('</li><li>', $breadcrumb) . '</li></ol>';
    $output .= '</nav>';
  }
  return $output;
}

/**
 * Implements hook_css_alter().
 */
function modoc_css_alter(&$css) {
  unset($css['core/modules/node/css/node.preview.css']);
}

/**
 * Implements hook_ckeditor_css_alter().
 */
function modoc_ckeditor_css_alter(&$css, $format) {
  // This theme ships with a custom copy of that file, that otherwise contains
  // unwanted body styles (font, color).
  $key = array_search('core/modules/ckeditor/css/ckeditor-iframe.css', $css);
  unset($css[$key]);
}
