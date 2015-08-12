<figure class="col-md-4">
  <?php print render($img);?>
   <figcaption>
       <h3><?php print render($title);?></h3>
       <p><?php print render($description);?></p>
       <p><?php print l('Ver Mas' , './micro/'. $mid);?></p>
   </figcaption>
</figure>