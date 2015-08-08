<?php
/**
 * Implements template_preprocess_page
 *
 * Available vars:
 *
 *   All items are under $variables['page']['content']['system_main']['FIELDNAME']['#items']
 */
function medtravel_preprocess_page(&$variables) {
  // loads entity data
  $url_params = current_path();
  $params = explode('/', $url_params);
  //var_dump(current_path());
	// if belongs to micro entity type
	if($params[0] == 'micro') {

    $id = $params[1];

		$entity = entity_load('micro', array($id));
		$entity = $entity[$id];
		// get the current language
		$lang = entity_language('micro', $entity);

    $variables['micro'] = $entity;
		// builds variables
		$header_img = file_load($entity->field_header_img['und'][0]['fid']);
		//$variables['header_img'] = image_style_url('banner_interior', $header_img->filename);

		//$variables['header_txt'] = $entity->field_header_txt[$lang][0]['safe_value'];
		//$variables['info_description'] = $entity->field_info_description[$lang][0]['safe_value'];
		//$variables['body_video'] = $entity->field_body_video['und'][0]['safe_value'];

		$body_img = file_load($entity->field_body_img['und'][0]['fid']);
		//$variables['body_img'] = image_style_url('mod_img_txt_style', $body_img->filename);

		//$variables['body_quote'] = $entity->field_body_quote[$lang][0]['safe_value'];
		//$variables['body_quote_author'] = $entity->field_body_quote_author[$lang][0]['safe_value'];

		// field with multiple values
		$variables['map'] = $entity->field_map['und'];

		$variables['gallery'] = $entity->field_footer_gallery['und'];
		//$variables['blockImgTxt'] = $entity->field_mod_img_txt[$lang];
		$variables['footerLinks'] = $entity->field_footer_link[$lang];
		$variables['footerAttachments'] = $entity->field_footer_attachment[$lang];
		$variables['listItems'] = $entity->field_list_items[$lang];
		
		$variables['mid'] = $entity->mid;
		$variables['name'] = $entity->name;
		$variables['category'] = $entity->category;
		$variables['likes'] = $entity->likes;
		$variables['social_fb'] = $entity->social_fb;
		$variables['social_tw'] = $entity->social_tw;	
    $variables['share'] = $entity->share; 
    $variables['bookmarks'] = $entity->bookmarks; 

		$variables['related'] = module_invoke('related', 'block_view', 'related');

	}
	if(drupal_is_front_page()) {

    //get language
    global $language;
    $langcode = $language->language;
    if($langcode == 'es') {
      $langcode = '';
    }
    if($langcode == 'en') {
      $langcode = '_en';
    }

    //get data
    $data = get_home_data();
    $data = $data[0];

		//render home blocks
		$variables['home_block'] = module_invoke('home', 'block_view', 'home_block');

		$video = file_load($data['video']);
		if(!empty($video)) {
			$variables['home_video'] = file_create_url($video->uri);
		}
		
		$video_img = file_load($data['video_img']);

		if(!empty($video_img)) {
			$variables['home_video_img'] = file_create_url($video_img->uri);
		}

		$variables['home_title'] = $data['title'.$langcode];
		$variables['home_description'] = $data['description'.$langcode];
		$variables['home_que_visitar'] = $data['tab_que_visitar'];
		$variables['home_donde_quedarme'] = $data['tab_donde_quedarme'];
		$variables['home_como_moverme'] = $data['tab_como_moverme'];

		// home tabs
		$criteria = array('lugares', 'transporte', 'hospedaje');
		
		foreach($criteria as $crit) {
			$options = array();

			// if is transporte take data from micro table
			if($crit == 'transporte') {
				$children = query_tab_special_class($criteria);
				foreach ($children as $child) {
					$options[$child->mid] = $child->name; 
				}
			}
			// if is not transporte take data from taxonomy_term_data
			else {
				$children = query_tab($crit);
				foreach ($children as $child) {
					$options[$child->tid] = $child->name; 
				}
			}
			$variables[$crit] = $options;
		}


	}

	// if is a taxonomy term
	if(isset($variables['page']['content']['system_main']['term_heading'])) {

		$tid = arg(2);
    $items = array();

    $children = taxonomy_get_children($tid);

      // if there is children change $cat_children
      if(!empty($children)) {
        $cat_children = $children;
        $variables['children'] = $children;
      }
      else {
        $parent_src = taxonomy_get_parents($tid);
        $parent = reset($parent_src)->tid;
        $cat_children = taxonomy_get_children($parent);
      }
  		

  		foreach($cat_children as $cat_child) {
  			$micros = query_micro_all($cat_child->tid);

  			$cont = 0;
  			foreach($micros as $micro) {
  				$cont++;
  			}

  			$micros_num = count($micros);
  			$items[] = array (
  				'tid' => $cat_child->tid,
  				'name' => $cat_child->name,
  				'number_items' => $cont,
  			);
  		}
    // load term
		$term = taxonomy_term_load($tid);

    // Text
    $description = field_get_items('taxonomy_term', $term, 'field_taxonomy_description');
    $description = field_view_value('taxonomy_term', $term, 'field_taxonomy_description', $description[0]);

		$term_img_src = file_load($term->field_taxonomy_image['und'][0]['fid']);
		$term_img = file_create_url($term_img_src->uri);

		$variables['term_img_header'] = $term_img;
		$variables['term_title'] = $term->name;
		$variables['term_description'] = $description;
		$variables['items_menu'] = $items;
		$variables['micros'] = fieldQueryMicro($tid);

	}


}

function fieldQueryMicro($tid) {
  $query = new EntityFieldQuery();

  $query->entityCondition('entity_type', 'micro')
    ->propertyCondition('category', $tid)
    ->addMetaData('account', user_load(1)); // Run the query as user 1.

  $result = $query->execute();

  return $result;
}

function medtravel_preprocess_region(&$variables) {
	if($variables['region'] == 'page_top') {
    $data = get_home_data();
    $data = $data[0];
    $variables['home_logo'] = $data['logo'];
		$variables['main_menu_block'] = module_invoke('home_menu', 'block_view', 'home_menu_block');
    $variables['lang_block'] = module_invoke('locale', 'block_view', 'language_content');
	}

	if($variables['region'] == 'page_bottom') {
		$variables['footer_block'] = module_invoke('home_footer', 'block_view', 'home_footer_block');
	}
}

function query_micro_cat($cat) {
  global $language;
  $langcode = $language->language;

  $query = db_select('micro', 'm');
  $query->join('field_data_field_res_img', 'i', 'm.mid = i.entity_id');
  $query->join('field_data_field_res_title', 't', 'm.mid = t.entity_id');
  $query->join('field_data_field_res_description', 'd', 'm.mid = d.entity_id');
  $result = $query
  ->fields('m', array('mid', 'name'))
  ->fields('i', array('field_res_img_fid'))
  ->fields('t', array('field_res_title_value'))
  ->fields('d', array('field_res_description_value'))
  ->condition('m.category', $cat)
  //->condition('m.micro_lang', $langcode)
  ->addTag('node_access')
  ->execute();
  return $result;
}

function query_micro_all($cat) {
  global $language;
  $langcode = $language->language;

  $query = db_select('micro', 'm')
  ->fields('m', array('mid'))
  ->condition('category', $cat)
  //->condition('micro_lang', $langcode)
  ->addTag('node_access')
  ->execute();
  return $query;
}

function query_tab($criteria) {
  $query = db_select('taxonomy_term_data', 't');
  $query->join('field_data_field_taxonomy_tab', 'f', 't.tid = f.entity_id');
  $result = $query
  ->fields('t', array('tid', 'name'))
  ->condition('f.field_taxonomy_tab_value', $criteria)
  ->addTag('node_access')
  ->execute();
  return $result;
}

function query_tab_special_class($criteria) {
  $query = db_select('micro', 'm')
  ->fields('m', array('mid', 'name'))
  ->condition('special_class', $criteria)
  ->addTag('node_access')
  ->execute();
  return $query;
}