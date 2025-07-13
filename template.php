<?php

/**
 * Implements template_preprocess_page().
 */
function modoc_preprocess_page(&$variables) {
  backdrop_add_library('system', 'opensans', TRUE);

/* --- BLOCK RADIUS --- */
  // 1. Pull the saved value.
  $brdr_radius = theme_get_setting('block_corner_radius', 'modoc');
  $butn_radius = theme_get_setting('button_corner_radius', 'modoc');

  // 2. If the editor typed only digits, assume pixels.
  if ($brdr_radius !== '' && preg_match('/^\d+$/', $brdr_radius))  $brdr_radius .= 'px';
  if ($butn_radius !== '' && preg_match('/^\d+$/', $butn_radius))  $butn_radius .= 'px';
  

  // 3. Expose it to CSS as an inline custom property on <html>.
  if ($brdr_radius !== '')  $variables['html_attributes']['style'][] = "--brdr-radius: {$brdr_radius};";
  if ($butn_radius !== '')  $variables['html_attributes']['style'][] = "--butn-radius: {$butn_radius};";
  

  // 4. Make it available to JavaScript.
  backdrop_add_js(['modoc' => ['block_corner_radius'  => $brdr_radius,
                              'button_corner_radius' => $butn_radius,
                              ]],
                              'setting'
                 );

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
     backdrop_add_css(".block-system-main-menu a, .leaf a { font-family: {$fonts[$thefont]}; }", $css_options);       
  }                           
  if (($thefont = theme_get_setting('sidebar_menu_font')) != 'montserrat') {
     backdrop_add_css(".block-menu-menu-sidebar a { font-family:  {$fonts[$thefont]}; }", $css_options);       
  }                           
  if (($thefont = theme_get_setting('table_hd_font')) != 'newscycle') {
     backdrop_add_css("th {font-family: {$fonts[$thefont]}; }", $css_options);       
  }

  if (theme_get_setting('page_width')) {
    $max_width = theme_get_setting('page_width');
    if ($max_width !== '' && preg_match('/^\d+(\.\d+)?$/', $max_width)) {
      $max_width .= 'px';
    }
    if ($max_width !== '') {
      backdrop_add_css(".layout {max-width: {$max_width}; }", $css_options);
    } 
  }

  if (theme_get_setting('logo_max_width')) {
    $logo_max_width = theme_get_setting('logo_max_width');
    if ($logo_max_width !== '' && preg_match('/^\d+(\.\d+)?$/', $logo_max_width)) {
      $logo_max_width .= 'px';
    }
    if ($logo_max_width !== '') {
      backdrop_add_css(".logo {max-width: {$logo_max_width}; }", $css_options);
    }
  }

  if (theme_get_setting('text_scale')) {
    $font_size = theme_get_setting('text_scale');
    // Digits (optionally with a decimal) but **no unit** → treat as %
    if (preg_match('/^\d+(\.\d+)?$/', $font_size)) {
      $font_size .= '%';
    }
    // Otherwise it must be digits+%          → leave as-is
    elseif (!preg_match('/^\d+(\.\d+)?%$/', $font_size)) {
      // Invalid entry – decide what to do:
      // • Bail out (silently)
      // • or pick a safe fallback:
      //   $font_size = '100%';
      $font_size = '';   // bail-out version
    }
    // Only inject CSS if we ended up with something valid.
    if ($font_size !== '') {
    backdrop_add_css("html { font-size: {$font_size}; }", $css_options);
    }
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
