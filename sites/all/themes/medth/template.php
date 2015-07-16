<?php
/**
 * implements template_preprocess_page
 *
 * Available vars:
 *
 *   All items are under $variables['page']['content']['system_main']['FIELDNAME']['#items']
 */
function medtravelth_preprocess_page(&$variables) {
	// vars for paths
	
	// if belongs to micro entity type
	if(isset($variables['page']['content']['system_main']['#entity_type'])) {
		$entity_type = $variables['page']['content']['system_main']['#entity_type'];

		if($entity_type == 'micro') {
			$entity = $variables['page']['content']['system_main'];
			var_dump($entity);

			// builds variables
			$variables['header_img'] = $entity['field_header_img']['#items'][0]['fid'];
			$variables['header_txt'] = $entity['field_header_txt']['#items'][0]['value'];
			$variables['info_description'] = $entity['field_info_description']['#items'][0]['value'];
			$variables['body_video'] = $entity['field_body_video']['#items'][0]['value'];
			$variables['body_img'] = $entity['field_body_img']['#items'][0]['fid'];
			$variables['body_quote'] = $entity['field_body_quote']['#items'][0]['value'];

			// field with multiple values
			$variables['map'] = $entity['field_map']['#items'];
			$variables['gallery'] = $entity['field_footer_gallery']['#items'];
			$variables['blockImgTxt'] = $entity['field_mod_img_txt']['#items'];

			/*
			para hacer que mid_img_txt flote a la derecha debo agregar un div llamado mod_img_txt_left
			y lo unico que debo cambiar son las clases siguientes quedando excatamente asi:
			.textoImagen figure {
			    float: right;
			    margin-left: 20px;
			}
			h3 {
			    margin-left: 20px;
			}*/
		}
	}
}