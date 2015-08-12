<?php
/**
 * Implements template_preprocess_page
 *
 * Available vars:
 *
 *  
 */
function medtravel_preprocess_page(&$variables) {
  // loads entity data
  $url_params = current_path();
  $params = explode('/', $url_params);
	// if belongs to micro entity type
	if($params[0] == 'micro') {

    $id = $params[1];

		$entity = entity_load('micro', array($id));
    if(!empty($entity)) {
      $variables['entity_not_found'] = false;
  		$entity = $entity[$id];
  		// get the current language
  		$lang = entity_language('micro', $entity);

      $variables['micro'] = $entity;
  		// builds variables
  		$header_img = file_load($entity->field_header_img['und'][0]['fid']);

  		$body_img = file_load($entity->field_body_img['und'][0]['fid']);

  		// field with multiple values
  		$variables['map'] = $entity->field_map['und'];

  		$variables['gallery'] = $entity->field_footer_gallery['und'];
  		$variables['footerLinks'] = $entity->field_footer_link[$lang];
  		$variables['footerAttachments'] = $entity->field_footer_attachment[$lang];
  		$variables['listItems'] = $entity->field_list_items[$lang];
  		
  		$variables['mid'] = $entity->mid;
  		$variables['name'] = $entity->name;
  		$variables['category'] = $entity->category;
  		$variables['likes'] = $entity->likes;
      $variables['num_likes'] = $entity->num_likes;
  		$variables['social_fb'] = $entity->social_fb;
  		$variables['social_tw'] = $entity->social_tw;	
      $variables['share'] = $entity->share; 
      $variables['bookmarks'] = $entity->bookmarks;
      $variables['title_links'] = $entity->title_links;
      $variables['title_attachments'] = $entity->title_attachments; 
      $variables['map_title'] = $entity->map_title;   

  		$variables['related'] = module_invoke('related', 'block_view', 'related');
    }
    else {
      $variables['entity_not_found'] = true;
    }

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

    $variables['langcode'] = $langcode;

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
  if($variables['region'] == 'page_top' || $variables['region'] == 'page_bottom') {
    // get home data
    $data = get_home_data();
    $data = $data[0];

  	if($variables['region'] == 'page_top') {
      $variables['home_logo'] = $data['logo'];
  		$variables['main_menu_block'] = module_invoke('home_menu', 'block_view', 'home_menu_block');
      $variables['lang_block'] = module_invoke('locale', 'block_view', 'language_content');
  	}

  	if($variables['region'] == 'page_bottom') {

      $variables['home_link_logo_1'] = $data['home_link_logo_1'];
      $variables['home_link_logo_2'] = $data['home_link_logo_2'];
      $variables['home_link_logo_3'] = $data['home_link_logo_3'];
      $variables['home_facebook'] = $data['home_facebook'];
      $variables['home_facebook_link'] = $data['home_facebook_link'];
      $variables['home_twitter'] = $data['home_twitter'];
      $variables['home_twitter_link'] = $data['home_twitter_link'];
      $variables['home_youtube'] = $data['home_youtube'];
      $variables['home_youtube_link'] = $data['home_youtube_link'];
      $variables['home_flickr'] = $data['home_flickr'];
      $variables['home_flickr_link'] = $data['home_flickr_link'];
      $variables['home_linkedin'] = $data['home_linkedin'];
      $variables['home_linkedin_link'] = $data['home_linkedin_link'];
      $variables['home_instagram'] = $data['home_instagram'];
      $variables['home_instagram_link'] = $data['home_instagram_link'];

  		$variables['footer_block'] = module_invoke('home_footer', 'block_view', 'home_footer_block');
  	}

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

function medtravel_preprocess_sharethis(&$vars) {
  // loads entity data
  $url_params = current_path();
  $params = explode('/', $url_params);
  // if belongs to micro entity type
  if($params[0] == 'micro') {

    $id = $params[1];

    $entity = entity_load('micro', array($id));
    if(!empty($entity)) {
      $variables['entity_not_found'] == false;
      $entity = $entity[$id];

      // get wich social nets active form entity
      $tw = $entity->social_tw;
      $fb = $entity->social_fb;
      $share = $entity->share;

      $tw_str = '"Twitter:twitter",';
      $fb_str = '"Facebook:facebook",';
      $share_str = '"ShareThis:sharethis",';

      //creates the string
      $string = '';
      if($tw == 1) {
        $string = $string . $tw_str;
      }
      if($fb == 1) {
        $string = $string . $fb_str;
      }
      if($share == 1) {
        $string = $string . $share_str;
      }
      
      // change title
      $title = field_get_items('micro', $entity, 'field_res_title');
      $title = field_view_value('micro', $entity, 'field_res_title', $title[0]);
      $title = $title['#markup'];

      // change services string
      $vars['data_options']['services'] = $string;
      $vars['m_title'] = $title;
    }
    else {
      $variables['entity_not_found'] == true;
    }

  }
}

function medtravel_preprocess_language_content(&$vars) {
  var_dump($vars);
}

function medtravel_preprocess_html(&$vars) {
  // loads entity data
  $url_params = current_path();
  $params = explode('/', $url_params);
  // if belongs to micro entity type
  if($params[0] == 'micro') {
    // loads entity
    $id = $params[1];
    $entity = entity_load('micro', array($id));
    if(!empty($entity)) {
      $vars['entity_not_found'] = false;
      $entity = $entity[$id];

      $title = field_get_items('micro', $entity, 'field_res_title');
      $title = field_view_value('micro', $entity, 'field_res_title', $title[0]);
      $title = $title['#markup'];

      $description = field_get_items('micro', $entity, 'field_res_description');
      $description = field_view_value('micro', $entity, 'field_res_description', $description[0]);
      $description = $description['#markup'];

      $img = field_get_items('micro', $entity, 'field_res_img');
      $img = field_view_value('micro', $entity, 'field_res_img', $img[0]);
      $img = file_load($img['#item']['fid']);
      $img = file_create_url($img->uri);
      //$img = $img->source;


      // configure og's
      $vars['og_title'] = $title;
      $vars['og_description'] = $description;
      $vars['og_img'] = $img;
    }
    else {
      $variables['entity_not_found'] == true;
    }

  }
} 