<section class="row menuHome">
    <h2> <a href=""></a><?php print $title;?></h2>
    <?php $cont = 0;?>
    <?php foreach($contents_node as $content):?>
        <?php
            $content_title = $content->field_bloque_home_mf_field_bloque_home_txt_value;
            $content_fid = file_load($content->field_bloque_home_mf_field_bloque_home_img_fid);
            $content_img = file_create_url($content_fid->uri);
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
            <a href="javascript:;">
                <h3 id="linea"><?php print $content_title;?></h3>
                <figure><img src="<?php print $content_img;?>" alt="Vida Botero Medellín Travel">
                </figure>
            </a>

        </article>
        <?php $cont++;?>
    <?php endforeach;?>
</section>