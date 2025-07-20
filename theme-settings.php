<?php
/**
 * @file
 * Theme settings file for Modoc.
 *
 */


/**
 * Implements hook_form_system_theme_settings_alter().
 */
function modoc_form_system_theme_settings_alter(&$form, &$form_state) {
  // Settings for color module.
  if (module_exists('color')) {
    
 // Save custom color scheme UI
    $form['color_save'] = array(
      '#type' => 'fieldset',
      '#title' => t('Save Custom Color Set'),
      '#collapsible' => TRUE,
      '#collapsed' => TRUE,
    );
    $form['color_save']['custom_scheme_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name for this color set'),
      '#default_value' => '',
      '#size' => 30,
    );
    $form['color_save']['save_custom_scheme'] = array(
      '#type' => 'submit',
      '#value' => t('Save Current Color Set'),
      '#submit' => array('modoc_save_custom_color_scheme_submit'),
    );
   
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
      'cellbrdr',
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
    '#description' => t('Enter value with units of px, em, rem, %, etc. example: page width: "1200px".'),
  );
  $form['sizes']['page_width'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum Page Width'),
    '#default_value' => theme_get_setting('page_width', 'modoc'),
    '#size' => '10',
    '#description' => t('**Warning** Entering too small a value will require you to disable the Modoc theme in order to return to default settings.'),
    );
  $form['sizes']['block_border_width'] = array(
    '#type' => 'textfield',
    '#title' => t('Block Border Width'),
    '#default_value' => theme_get_setting('block_border_width', 'modoc'),
    '#size' => '10',
    '#description' => t('Assume px unless specified.'),
    );
  $form['sizes']['block_corner_radius'] = array(
    '#type' => 'textfield',
    '#title' => t('Block Corner Radius'),
    '#default_value' => theme_get_setting('block_corner_radius', 'modoc'),
    '#size' => '10',
    '#description' => t('Assume px unless specified.'),
    );
  $form['sizes']['button_corner_radius'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Corner Radius'),
    '#default_value' => theme_get_setting('button_corner_radius', 'modoc'),
    '#size' => '10',
    '#description' => t('Assume px unless specified.'),
    );
  $form['sizes']['logo_max_width'] = array(
    '#type' => 'textfield',
    '#title' => t('Maximum Logo Width'),
    '#default_value' => theme_get_setting('logo_max_width', 'modoc'),
    '#size' => '10',
    '#description' => t('Use this to scale the size of your Logo image. Assume px unless specified.'),
    );
  $form['sizes']['text_scale'] = array(
    '#type' => 'textfield',
    '#title' => t('Base Font Size'),
    '#default_value' => theme_get_setting('text_scale', 'modoc'),
    '#size' => '10',
    '#description' => t('**Experimental** This might mess things up. Modoc default is "90%". Only % is allowed. Other units will have no effect.'),
    );

}

function modoc_save_custom_color_scheme_submit($form, &$form_state) {
  $name = trim($form_state['values']['custom_scheme_name']);
  if (empty($name)) {
    form_set_error('custom_scheme_name', t('Please enter a name for the color set.'));
    return;
  }

  $theme = 'modoc';
  $palette = theme_get_setting('color', $theme)['palette'];
  $id = strtolower(preg_replace('/[^a-z0-9_]+/', '_', $name));

  $custom_schemes = config_get('modoc.settings', 'custom_schemes');
  if (!is_array($custom_schemes)) {
    $custom_schemes = array();
  }

  $custom_schemes[$id] = array(
    'title' => $name,
    'colors' => $palette,
  );

  config_set('modoc.settings', 'custom_schemes', $custom_schemes);

  backdrop_set_message(t('Color scheme "@name" saved. It is now available in the Color Set dropdown.', array('@name' => $name)));

  // Optional: redirect back to theme settings to refresh form.
  backdrop_goto('admin/appearance/settings/modoc');
}
