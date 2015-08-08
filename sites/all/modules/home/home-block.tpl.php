<section class="row menuHome">
    <h2> <a href="./taxonomy/term/<?php print $category;?>"><?php print $title;?></a></h2>

    <?php $cont = 0;?>
    <?php foreach($blocks as $block):?>
        <?php
            // get vars
            $tid = $block['field_bloque_home_tid']['und'][0]['tid'];
            $txt = $block['field_bloque_home_txt']['und'][0]['safe_value'];
            $img_src = file_load($block['field_bloque_home_img']['und'][0]['fid']);
            $img = image_load($img_src->uri);
            $img_render = array(
              'file' => array(
                '#theme' => 'image_style',
                '#style_name' => 'large',
                '#path' => $img->source,
                '#width' => $image->info['width'],
                '#height' => $image->info['height'],
              ),
            );

            $class = '';

            switch($contents_num) {
                case 1: 
                    $class = 'col-md-8 col-sm-8';
                    break;
                case 2: 
                    $class = 'col-md-8 col-sm-8';
                    break;
                case 3: 
                    $class = 'col-md-4 col-sm-4';
                    break;
            }
        ?>

        <?php if($cont == 0):?>
            <article class="<?php print $class;?>">
        <?php else:?>
            <article class="col-md-4 col-sm-4">
        <?php endif;?>

            <div class="bg"></div>
            <a href="<?php print $tid;?>">
                <h3 id="linea"><?php print $txt;?></h3>
                <figure><?php print render($img_render);?>
                </figure>
            </a>
        </article>
        <?php $cont++;?>

    <?php endforeach;?>

</section>