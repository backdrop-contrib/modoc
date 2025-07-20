<?php

$info = array(
  // Available colors and color labels used in theme.
  'fields' => array(
    'text' => t('Page Text'),
    'link' => t('Link Text'),
    'border' => t('Block Borders'),
    'pagebg' => t('Page Background'),
    'headerbg' => t('Header Background'),
    'headertxt' => t('Header Text'),
    'footerbg' => t('Footer Background'),
    'footertxt' => t('Footer Text'),
    'menubg' => t('Menu Background'),
    'menutxt' => t('Menu Text'),
    'menuhl' => t('Menu Highlight'),
    'tablerow' => t('Table Rows'),
    'sortcol' => t('Active Sort Column'),
    'cellbrdr' => t('Table Cell Borders'),
  ),
  // Pre-defined color schemes.
  'schemes' => array(
    'default' => array(
      'title' => t('Default'),
      'colors' => array(
        'text' => '#0f0f0f',
        'link' => '#093579',
        'border' => '#000000',
        'pagebg' => '#ffffff',
        'headerbg' => '#bcc8c8',
    'headertxt' => '#0f0f0e',
        'footerbg' => '#bcc8c9',
    'footertxt' => '#0f0e0f',
        'menubg' => '#c8d7d2',
    'menutxt' => '#0e0f0f',
        'menuhl' => '#d2e1dc',
        'tablerow' => '#e6e6e6',
        'sortcol' => '#dcdcdc',
        'cellbrdr' => '#aaaaab',
      ),
    ),
    'red' => array(
      'title' => t('Red'),
      'colors' => array(
        'text' => '#000000',
        'link' => '#700401',
        'border' => '#6e0505',
        'pagebg' => '#fffaf9',
        'headerbg' => '#6e0505',
    'headertxt' => '#ffffff',
        'footerbg' => '#6e0505',
    'footertxt' => '#ffffff',
        'menubg' => '#dcaaaa',
    'menutxt' => '#000000',
        'menuhl' => '#fe5c61',
        'tablerow' => '#fce3e2',
        'sortcol' => '#fececd',
        'cellbrdr' => '#aaaaab',
      ),
    ),
    'green' => array(
      'title' => t('Green'),
      'colors' => array(
        'text' => '#1d1b25',
        'link' => '#044f40',
        'border' => '#375c37',
        'pagebg' => '#f1f2ec',
        'headerbg' => '#375c37',
    'headertxt' => '#0f0f0e',
        'footerbg' => '#375c37',
    'footertxt' => '#0f0e0f',
        'menubg' => '#8dbc99',
    'menutxt' => '#0e0f0f',
        'menuhl' => '#76f268',
        'tablerow' => '#d0ddd0',
        'sortcol' => '#cbe4d3',
        'cellbrdr' => '#aaaaab',
      ),
    ),
    'blue' => array(
      'title' => t('Blue'),
      'colors' => array(
        'text' => '#222222',
        'link' => '#225338',
        'border' => '#000096',
        'pagebg' => '#ebf1f3',
        'headerbg' => '#6496bc',
    'headertxt' => '#0f0f0e',
        'footerbg' => '#6496bc',
    'footertxt' => '#0f0e0f',
        'menubg' => '#aacdf0',
    'menutxt' => '#0e0f0f',
        'menuhl' => '#e7e773',
        'tablerow' => '#d6e2e9',
        'sortcol' => '#d1e1e7',
        'cellbrdr' => '#aaaaab',
      ),
    ),
    'mono' => array(
      'title' => t('Monochrome'),
      'colors' => array(
        'text' => '#191919',
        'link' => '#093579',
        'border' => '#000000',
        'pagebg' => '#ffffff',
        'headerbg' => '#e2e2e2',
    'headertxt' => '#0f0f0e',
        'footerbg' => '#e2e2e2',
    'footertxt' => '#0f0e0f',
        'menubg' => '#cfcfcf',
    'menutxt' => '#0e0f0f',
        'menuhl' => '#e2e2e2',
        'tablerow' => '#e1e1e1',
        'sortcol' => '#e0e0e0',
        'cellbrdr' => '#aaaaab',
      ),
    ),
    'navy' => array(
      'title' => t('US Navy'),
      'colors' => array(
        'text' => '#08262c',
        'link' => '#003b4f',
        'border' => '#003b4f',
        'pagebg' => '#e9edf3',
        'headerbg' => '#e8b00f',
    'headertxt' => '#0f0f0e',
        'footerbg' => '#e8b00f',
    'footertxt' => '#0f0e0f',
        'menubg' => '#088199',
    'menutxt' => '#0e0f0f',
        'menuhl' => '#e8b00f',
        'tablerow' => '#dadee0',
        'sortcol' => '#d2d7dc',
        'cellbrdr' => '#aaaaab',
      ),
    ),
    'army' => array(
      'title' => t('US Army'),
      'colors' => array(
        'text' => '#0c121e',
        'link' => '#41533b',
        'border' => '#aeaa85',
        'pagebg' => '#f2efe6',
        'headerbg' => '#41533b',
    'headertxt' => '#aeaa85',
        'footerbg' => '#41533b',
    'footertxt' => '#aeaa85',
        'menubg' => '#aeaa85',
    'menutxt' => '#0e0f0f',
        'menuhl' => '#cecaa5',
        'tablerow' => '#e1e1d2',
        'sortcol' => '#eeeac5',
        'cellbrdr' => '#aaaaab',
      ),
    ),
    'usaf' => array(
      'title' => t('US Air Force'),
      'colors' => array(
        'text' => '#002554',
        'link' => '#00369e',
        'border' => '#003594',
        'pagebg' => '#ffffff',
        'headerbg' => '#003594',
    'headertxt' => '#ffffff',
        'footerbg' => '#003594',
    'footertxt' => '#ffffff',
        'menubg' => '#b6860a',
    'menutxt' => '#0e0f0f',
        'menuhl' => '#d2af39',
        'tablerow' => '#faf0c8',
        'sortcol' => '#fae6af',
        'cellbrdr' => '#aaaaab',
      ),
    ),
    'cga' => array(
      'title' => t('CGA'),
      'colors' => array(
        'text' => '#f4ff6f',
        'link' => '#77fe70',
        'border' => '#1efafa',
        'pagebg' => '#0f0f0f',
        'headerbg' => '#0f0f0f',
    'headertxt' => '#f4ff6f',
        'footerbg' => '#0f0f0f',
    'footertxt' => '#f4ff6f',
        'menubg' => '#1efafa',
    'menutxt' => '#0e0f0f',
        'menuhl' => '#eaf55a',
        'tablerow' => '#8d2c1b',
        'sortcol' => '#1b6903',
        'cellbrdr' => '#aaaaab',
      ),
    ),
  ),

  // CSS files (excluding @import) to rewrite with new color scheme.
  'css' => array(
    'css/colors.css',
  ),

  // Files to copy.
  'copy' => array(),

  // Gradient definitions.
  //'gradients' => array(),

  // Color areas to fill (x, y, width, height).
  //'fill' => array(),

  // Coordinates of all the theme slices (x, y, width, height)
  // with their filename as used in the stylesheet.
  //'slices' => array(),

  // Reference color used for blending. Matches the base.png's colors.
  'blend_target' => '#ffffff',

  // Preview files.
  //'preview_css' => 'color/preview.css',
  //'preview_js' => 'color/preview.js',
  //'preview_html' => 'color/preview.html',

  // Base file for image generation.
  //'base_image' => 'color/base.png',
);
