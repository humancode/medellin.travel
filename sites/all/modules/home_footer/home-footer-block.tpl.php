 <ul class="col-md-3 col-sm-3">
    <li>
        <h4><?php print $title;?></h4>
    </li>

    <?php if($type == 'link'):?>
      <?php foreach($items as $item):?>
        <li><a href=""><?php print $item->field_home_footer_link_field_home_footer_link_txt_value;?></a>
        </li>
      <?php endforeach;?>
    <?php endif;?>

    <?php if($type == 'txt'):?>
      <?php foreach($items as $item):?>
        <li><?php print $item->field_home_footer_txt_value;?></li>
      <?php endforeach;?>
    <?php endif;?>
    
</ul>