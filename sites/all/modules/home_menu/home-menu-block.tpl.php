<?php 
  $children = taxonomy_get_children($tid);
  if($cols == '2-columnas') {
    $cols_class = 'col-md-6';
  }
  if($cols == '3-columnas') {
    $cols_class = 'col-md-4';
  }
?>
<?php //var_dump(count($children));?>
<?php if($cols == '0-columnas'):?>
<li class="mainMenu">
  <a class="" href="javascript:;"><?php print $name;?> </a>
</li>
<?php else:?>
<li class="mainMenu">
  <a class="" href="javascript:;"><?php print $name;?> <span class="icon-icon-flecha-abajo"></span></a>
</li>
<?php endif;?>

<?php if($cols != '0-columnas'):?>
  <?php if($cols == 'subtitulos-columnas'):?>
    <section id="planeate" class="subMenu">
  <?php else:?>
    <section class="subMenu">
  <?php endif;?>
    <div class="container">
        <?php if($cols != 'subtitulos-columnas'):?>
          <article class="col-md-8">
        <?php else:?>
          <article>
        <?php endif;?>
              <?php $cont = 0;?>
              <?php foreach($children as $child):?>
                <?php if(isset($child->field_taxonomy_class['und'][0]['safe_value']) && $child->field_taxonomy_class['und'][0]['safe_value'] == 'subtitulo'):?>
                  <ul class="col-md-3">
                    <li>
                        <h4><?php print $child->name;?></h4>
                    </li>
                  <?php $has_children = taxonomy_get_children($child->tid);?>
                  <?php if(!empty($has_children)):?>
                      <?php foreach($has_children as $item):?>
                        <li>
                          <a href="taxonomy/term/<?php print $item->tid;?>"><?php print $item->name;?></a>
                        </li>
                      <?php endforeach;?>
                  <?php else:?>
                    <?php $micros = query_all_micros($child->tid);?>
                    <?php foreach($micros as $micro):?>
                      <li>
                        <a href="micro/<?php print $micro->mid;?>"><?php print $micro->name;?></a>
                      </li>
                    <?php endforeach;?>
                    </ul>
                  <?php endif;?>

                <?php else:?>
                  <?php if($cont == 0):?>
                    <ul class="<?php print $cols_class;?>">
                  <?php endif;?>
                  <li>
                    <a href="taxonomy/term/<?php print $child->tid;?>"><?php print $child->name;?></a>
                  </li>
                  <?php $cont++;?>
                  <?php if($cont == 3):?>
                    </ul>
                    <?php $cont = 0;?>
                  <?php endif;?>
                <?php endif;?>
              <?php endforeach;?>
            
        </article>

        <?php if($cols != 'subtitulos-columnas'):?>

          <?php if($cols == '2-columnas'):?>
            <?php 
              if(isset($img_menu)) {
                $img_menu = file_load(variable_get('home_menu_recommended_image_one'));
                $img_recommended = file_create_url($img_menu->uri);
              }
            ?>
            <article class="col-md-4 recomendado">
                <figure>
                    <?php if(isset($img_recommended)):?>
                      <img src="<?php print $img_recommended;?>" alt="">
                    <?php endif;?>
                    <figcaption>
                        <h4><?php print variable_get('home_menu_recommended_title_one');?></h4>
                        <p><?php print variable_get('home_menu_recommended_description_one');?></p>
                    </figcaption>
                </figure>
            </article>
          <?php endif;?>

          <?php if($cols == '3-columnas'):?>
            <?php 
              if(isset($img_menu)) {
                $img_menu = file_load(variable_get('home_menu_recommended_image_two'));
                $img_recommended = file_create_url($img_menu->uri);
              }
            ?>
            <article class="col-md-4 recomendado">
                <figure>
                    <?php if(isset($img_recommended)):?>
                      <img src="<?php print $img_recommended;?>" alt="">
                    <?php endif;?>
                    <figcaption>
                        <h4><?php print variable_get('home_menu_recommended_title_two');?></h4>
                        <p><?php print variable_get('home_menu_recommended_description_two');?></p>
                    </figcaption>
                </figure>
            </article>
          <?php endif;?>

        <?php endif;?>
    </div>
</section>
<?php endif;?>