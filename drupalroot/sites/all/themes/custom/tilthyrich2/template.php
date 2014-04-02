<?php

/**
 * Implements hook_theme()
 */
function tilthyrich2_theme($existing, $type, $theme, $path){
  return array(
    'user_register_form' => array(
    'render element'=> 'form',
    'template' => 'templates/user-register',
    ),
  );
}

/**
 * Implements hook_preprocess_page().
 */
function tilthyrich2_preprocess_page(&$variables) {

  $url_pieces = explode("/", $_GET['q']);

  if ($variables['is_front']) {
    $variables['partners'] = tilthyrich2_get_partners();

    $form = drupal_get_form('user_register_form');
    // Return to subscribe panel upon processing
    $form['#action'] = base_path() . '#subscribe';
    $variables['registration_form'] = drupal_render($form);
  }
  elseif (count($url_pieces) > 1 && $url_pieces[0] == 'user') {
    $account = user_load($variables['user']->uid);
    $first_name =  $account->field_first_name[LANGUAGE_NONE][0]['value'];
    $last_name =  $account->field_last_name[LANGUAGE_NONE][0]['value'];
    drupal_set_title($first_name . ' ' . $last_name . "'s profile");
  }
}

/**
 * @return array
 *  Array of partners with necessary metadata to feature on homepage
 */
function tilthyrich2_get_partners() {
  $qry = new EntityFieldQuery();

  $result = $qry->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'partner')
    ->propertyCondition('status', 1)
    ->execute();

  $nids = array_keys($result['node']);
  $nodes = node_load_multiple($nids);

  foreach ($nodes as $partner_node) {
    $partners[] = array(
      'title' => $partner_node->title,
      'img' => image_style_url('thumbnail', $partner_node->field_icon[LANGUAGE_NONE][0]['uri']),
      'url' => $partner_node->field_web_url[LANGUAGE_NONE][0]['value'],
    );
  }

  return $partners;
}