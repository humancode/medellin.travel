<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
$base_path = base_path();
?>
 <section id="bannerInterior">

        <figure><img src="<?php print $term_img_header;?>" alt="">
        </figure>
        <article class="container">
            <h1><?php print $term_title;?></h1>

        </article>

    </section>


    <section class="wrapper2 row" id="interna1">
        <div class="col-md-3"></div>
        <article class="col-md-9">
            <p><?php print render($term_description);?></p>
        </article>
        <nav id="menuLateral" class="col-md-3">
            <?php
                $url_params = current_path();
                $params = explode('/', $url_params);
                $current = $params[2];
            ?>
            <ul>
                <?php foreach($items_menu as $item_menu):?>
                    <li>
                        <?php if($current == $item_menu['tid']):?>
                            <a class="experienciaActual" href="<?php print $item_menu['tid'];?>"><?php print $item_menu['name'];?> </a><span>(<?php print $item_menu['number_items'];?>)</span>
                        <?php else:?>
                            <a href="<?php print $item_menu['tid'];?>"><?php print $item_menu['name'];?> </a><span>(<?php print $item_menu['number_items'];?>)</span>
                        <?php endif;?>
                    </li>
                <?php endforeach;?>
            </ul>
        </nav>

        <?php foreach($micros['micro'] as $micro):?>
            <?php 
                $entity = entity_load('micro', array($micro->mid));
                $entity = $entity[$micro->mid];
                //Img
                $img = field_get_items('micro', $entity, 'field_res_img');
                $img = field_view_value('micro', $entity, 'field_res_img', $img[0]);
                // remove height and width to render for bootstrap
                $img['#item']['height'] = '';
                $img['#item']['width'] = '';
                $img['#image_style'] = 'taxonomy-term-block';
                //var_dump($img);

                // Title
                $title = field_get_items('micro', $entity, 'field_res_title');
                $title = field_view_value('micro', $entity, 'field_res_title', $title[0]);
                // Text
                $description = field_get_items('micro', $entity, 'field_res_description');
                $description = field_view_value('micro', $entity, 'field_res_description', $description[0]);
            ?>
                <article class="col-md-3 col-sm-6">
                    <div>
                        <figure><a href="<?php print $base_path;?>micro/<?php print $micro->mid;?>"><?php print render($img);?></a>
                            <h3 id="linea"><?php print render($title);?></h3>
                            <figcaption>
                                <p>
                                    <?php print render($description);?>
                                </p>
                                <?php if(!empty($entity->special_link)):?>
                                    <br><a href="http://<?php print $entity->special_link;?>" target="_blank">Ir al sitio</a>
                                <?php else:?>
                                    <a href="<?php print $base_path;?>micro/<?php print $micro->mid;?>">Ver más</a>
                                <?php endif;?>
                            </figcaption>
                        </figure>
                    </div>
                </article>
        <?php endforeach;?>
        <?php if(isset($children)):?>
            <?php foreach($children as $child):?>
                <?php
                    // load term
                    $term = taxonomy_term_load($child->tid);
                    // Image
                    $img = field_get_items('taxonomy_term', $term, 'field_taxonomy_image_mini');
                    $img = field_view_value('taxonomy_term', $term, 'field_taxonomy_image_mini', $img[0]);
                    // remove height and width to render for bootstrap
                    /*$img['#item']['height'] = '';
                    $img['#item']['width'] = '';*/
                    $img['#image_style'] = 'taxonomy-term-block';
                    // Text
                    $text = field_get_items('taxonomy_term', $term, 'description_field');
                    $text = $text[0]['summary'];
                ?>
                <article class="col-md-3 col-sm-6">
                    <div>
                        <figure><a href="<?php print $base_path;?>taxonomy/term/<?php print $child->tid;?>"><?php print render($img);?></a>
                            <h3 id="linea"><?php print $child->name;?></h3>
                            <figcaption>
                                <p>
                                    <?php print render($text);?>
                                </p>
                                <a href="<?php print $base_path;?>taxonomy/term/<?php print $child->tid;?>">Ver más</a>
                            </figcaption>
                        </figure>
                    </div>
                </article>
            <?php endforeach;?>

        <?php endif;?>
    </section>