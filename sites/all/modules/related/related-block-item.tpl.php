<figure class="col-md-4">
  <a href="./<?php print $mid;?>"><?php print render($img);?></a>
   <figcaption>
       <h3><?php print render($title);?></h3>
       <p><?php print render($description);?></p>
       <?php if($langcode == 'es'):?>
        <p><?php print l('Ver Mas' , './micro/'. $mid);?></p>
       <?php endif;?>
       <?php if($langcode == 'en'):?>
        <p><?php print l('Read more' , './micro/'. $mid);?></p>
       <?php endif;?>
   </figcaption>
</figure>