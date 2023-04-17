<?php
/**
 * @file
 * Theme settings file for Modoc.
 *
 * Although Modoc itself does not provide any settings, we use this file to
 * inform the user that the module supports color schemes if the Color module
 * is enabled.
 */




/**
 * Implements hook_form_system_theme_settings_alter().
 */
function modoc_form_system_theme_settings_alter(&$form, &$form_state) {
  // Settings for color module.
  if (module_exists('color')) {
    
    
/** GENERAL **/    
    $form['general'] = array(
      '#type' => 'fieldset',
      '#title' => t('General Colors'),
      '#collapsible' => TRUE,
    );
    $fields = array(
      'pagebg',
      'text',
      'link',
      'border',
      'tablerow',
      'sortcol',
    );
    foreach ($fields as $field) {
      $form['general'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
    }
    
    
/** HEADER **/    
    $form['header'] = array(
      '#type' => 'fieldset',
      '#title' => t('Header Colors'),
      '#collapsible' => TRUE,
    );
    $fields = array(
      'headerbg',
      'headertxt',
    );
    foreach ($fields as $field) {
      $form['header'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
    }
    
    
/** MENU **/    
    $form['menu'] = array(
      '#type' => 'fieldset',
      '#title' => t('Menu Colors'),
      '#collapsible' => TRUE,
      '#description' => t('Put a description in here...'),
    );
    $fields = array(
      'menubg',
      'menutxt',
      'menuhl',
    );
    foreach ($fields as $field) {
      $form['menu'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
    }
    
/** FOOTER **/    
    $form['footer'] = array(
      '#type' => 'fieldset',
      '#title' => t('Footer Colors'),
      '#collapsible' => TRUE,
    );
    $fields = array(
      'footerbg',
      'footertxt',
    );
    foreach ($fields as $field) {
      $form['footer'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
    }


  }
  else {
    $form['color'] = array(
      '#markup' => '<p>' . t('This theme supports custom color palettes if the Color module is enabled on the <a href="!url">modules page</a>. Enable the Color module to customize this theme.', array('!url' => url('admin/modules'))) . '</p>',
    );
  }
/** Typeface settings. **/

  $form['settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Typeface Settings'),
    '#collapsible' => TRUE,
    '#description' => t('Note: you need to save settings to see changes take effect in the preview. *Modoc defaults'),
  );
  $form['settings']['body_font'] = array(
    '#type' => 'select',
    '#title' => t('Page Body Text'),
    '#default_value' => theme_get_setting('body_font', 'modoc'),
    '#options' => array(
      'opensans' => t('Open Sans*'),
      'montserrat' => t('Montserrat'),
      'lekton' => t('Lekton'),
      'newscycle' => t('News Cycle'),
      'benchnine' => t('Bench Nine'),
    ),
  );
  $form['settings']['headings_font'] = array(
    '#type' => 'select',
    '#title' => t('Titles and Headings'),
    '#default_value' => theme_get_setting('headings_font', 'modoc'),
    '#options' => array(
      'lekton' => t('Lekton*'),
      'opensans' => t('Open Sans'),
      'montserrat' => t('Montserrat'),
      'newscycle' => t('News Cycle'),
      'benchnine' => t('Bench Nine'),
    ),
  );
  $form['settings']['main_menu_font'] = array(
    '#type' => 'select',
    '#title' => t('Main Menu'),
    '#default_value' => theme_get_setting('main_menu_font', 'modoc'),
    '#options' => array(
      'lekton' => t('Lekton*'),
      'opensans' => t('Open Sans'),
      'montserrat' => t('Montserrat'),
      'newscycle' => t('News Cycle'),
      'benchnine' => t('Bench Nine'),
    ),
  );
  $form['settings']['sidebar_menu_font'] = array(
    '#type' => 'select',
    '#title' => t('Sidebar Menus'),
    '#default_value' => theme_get_setting('sidebar_menu_font', 'modoc'),
    '#options' => array(
      'montserrat' => t('Montserrat*'),
      'opensans' => t('Open Sans'),
      'lekton' => t('Lekton'),
      'newscycle' => t('News Cycle'),
      'benchnine' => t('Bench Nine'),
    ),
  );
  $form['settings']['table_hd_font'] = array(
    '#type' => 'select',
    '#title' => t('Views Table Headings'),
    '#default_value' => theme_get_setting('table_hd_font', 'modoc'),
    '#options' => array(
      'newscycle' => t('News Cycle*'),
      'benchnine' => t('Bench Nine'),
      'opensans' => t('Open Sans'),
      'montserrat' => t('Montserrat'),
      'lekton' => t('Lekton'),
    ),
  );

/** Sizes and Scales **/

  $form['sizes'] = array(
    '#type' => 'fieldset',
    '#title' => t('Sizes and Scales'),
    '#collapsible' => TRUE,
    '#description' => t('Enter value with units of px or %. example: page width: "1200px" '),
  );
  $form['sizes']['page_width'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum Page Width'),
    '#default_value' => theme_get_setting('page_width', 'modoc'),
    '#size' => '10',
    '#description' => t('**Warning** Entering too small a value will require you to disable the Modoc theme in order to return to default settings.'),
    );
  $form['sizes']['text_scale'] = array(
    '#type' => 'textfield',
    '#title' => t('Base Font Size'),
    '#default_value' => theme_get_setting('text_scale', 'modoc'),
    '#size' => '10',
    '#description' => t('**Experimental** This might mess things up. Modoc default is "90%"'),
    );

}
