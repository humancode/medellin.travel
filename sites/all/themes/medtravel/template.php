<?php
/**
 * Implements template_preprocess_page
 *
 * Available vars:
 *
 *   All items are under $variables['page']['content']['system_main']['FIELDNAME']['#items']
 */
function medtravel_preprocess_page(&$variables) {
	// if belongs to micro entity type
	if(isset($variables['page']['content']['system_main']['#entity_type'])) {
		$entity_type = $variables['page']['content']['system_main']['#entity_type'];


		if($entity_type == 'micro') {
			// loads entity data
			$id = arg(1);
			$entity = entity_load('micro', array($id));
			$entity = $entity[$id];
			// get the current language
			$lang = entity_language('micro', $entity);

			// builds variables
			$header_img = file_load($entity->field_header_img['und'][0]['fid']);
			$variables['header_img'] = image_style_url('banner_interior', $header_img->filename);

			$variables['header_txt'] = $entity->field_header_txt[$lang][0]['safe_value'];
			$variables['info_description'] = $entity->field_info_description[$lang][0]['safe_value'];
			$variables['body_video'] = $entity->field_body_video['und'][0]['safe_value'];

			$body_img = file_load($entity->field_body_img['und'][0]['fid']);
			$variables['body_img'] = image_style_url('mod_img_txt_style', $body_img->filename);

			$variables['body_quote'] = $entity->field_body_quote[$lang][0]['safe_value'];
			$variables['body_quote_author'] = $entity->field_body_quote_author[$lang][0]['safe_value'];

			// field with multiple values
			$variables['map'] = $entity->field_map['und'];

			$variables['gallery'] = $entity->field_footer_gallery['und'];
			$variables['blockImgTxt'] = $entity->field_mod_img_txt[$lang];
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
	}
	if(drupal_is_front_page()) {

		//render home blocks
		$variables['home_block'] = module_invoke('home', 'block_view', 'home_block');

		$video = file_load(variable_get('home_video'));
		if(!empty($video)) {
			$variables['home_video'] = file_create_url($video->uri);
		}
		
		$video_img = file_load(variable_get('home_video_img'));

		if(!empty($video_img)) {
			$variables['home_video_img'] = file_create_url($video_img->uri);
		}

		$variables['home_title'] = variable_get('home_title');
		$variables['home_description'] = variable_get('home_description');
		$variables['home_que_visitar'] = variable_get('home_que_visitar');
		$variables['home_donde_quedarme'] = variable_get('home_donde_quedarme');
		$variables['home_como_moverme'] = variable_get('home_como_moverme');

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

		$parent_src = taxonomy_get_parents($tid);
		$parent = reset($parent_src)->tid;
		$items = array();

		$cat_children = taxonomy_get_children($parent);

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

		$term = taxonomy_term_load($tid);
		$term_img_src = file_load($term->field_taxonomy_image['und'][0]['fid']);
		$term_img = file_create_url($term_img_src->uri);

		$variables['term_img_header'] = $term_img;
		$variables['term_title'] = $term->name;
		$variables['term_description'] = $term->description;
		$variables['items_menu'] = $items;
		$variables['micros'] = query_micro_cat($tid);

	}


}

function medtravel_preprocess_region(&$variables) {
	if($variables['region'] == 'page_top') {
		$variables['main_menu_block'] = module_invoke('home_menu', 'block_view', 'home_menu_block');
	}

	if($variables['region'] == 'page_bottom') {
		$variables['footer_block'] = module_invoke('home_footer', 'block_view', 'home_footer_block');
	}
}

function query_micro_cat($cat) {
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
  ->addTag('node_access')
  ->execute();
  return $result;
}

function query_micro_all($cat) {
  $query = db_select('micro', 'm')
  ->fields('m', array('mid'))
  ->condition('category', $cat)
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