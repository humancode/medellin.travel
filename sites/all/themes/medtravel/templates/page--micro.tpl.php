<?php

$theme_path = drupal_get_path('theme', 'medtravel') . '/';
/*
 * Available variables
 *
 * For multiple fields:
 *
 * All multiple fields must be iterated. %number represents the iteration counter
 *
 * Mid
 * $mid
 *
 * Name
 * $name
 *
 * Category
 * $category
 *
 * Likes
 * $likes
 *
 * Social facebook
 * $social_fb
 *
 * Social Twitter
 * $social_tw
 */

if($entity_not_found == false) {
  //Header Img
  $header_img = field_get_items('micro', $micro, 'field_header_img');
  $header_img = field_view_value('micro', $micro, 'field_header_img', $header_img[0]);
  $header_img['#image_style'] = 'micro-header';


  // Header Text
  $header_txt = field_get_items('micro', $micro, 'field_header_txt');
  $header_txt = field_view_value('micro', $micro, 'field_header_txt', $header_txt[0]);

  //Main Description
  $info_description = field_get_items('micro', $micro, 'field_info_description');
  $info_description = field_view_value('micro', $micro, 'field_info_description', $info_description[0]);

  //Body Video
  $body_video = field_get_items('micro', $micro, 'field_body_video');
  $body_video = field_view_value('micro', $micro, 'field_body_video', $body_video[0]);

  //Body Img
  $body_img = field_get_items('micro', $micro, 'field_body_img');
  $body_img = field_view_value('micro', $micro, 'field_body_img', $body_img[0]);
  $body_img['#image_style'] = 'micro-body-img';
  


  //Body quote
  $body_quote= field_get_items('micro', $micro, 'field_body_quote');
  $body_quote = field_view_value('micro', $micro, 'field_body_quote', $body_quote[0]);

  //Body quote author
  $body_quote_author = field_get_items('micro', $micro, 'field_body_quote_author');
  $body_quote_author = field_view_value('micro', $micro, 'field_body_quote_author', $body_quote_author[0]);

  // Mod Image & Text
  $mod_img_txts = field_get_items('micro', $micro, 'field_mod_img_txt');

  //Footer links
  $footerLinks = field_get_items('micro', $micro, 'field_footer_link');

  //Attachments
  $footerAttachments = field_get_items('micro', $micro, 'field_footer_attachment');

  //List Items
  $listItems = field_get_items('micro', $micro, 'field_list_items');

}

?>

<?php if($entity_not_found == false):?>

<?php if(isset($page['content']['system_main']['#id']) && $page['content']['system_main']['#id'] == 'micro-form'):?>
  <?php print render($page['content']);?>

<?php else:?>
<script>
  function handleCookie(mid) {
    cookie = getCookie('medtravel_likes');
    if(cookie != null) {
      exist = analizeCookie(cookie, mid);
      if(exist) {
        alert('Ya te gusta esta paǵina');
      }
      else {
        new_cookie = cookie+'-'+mid;
        document.cookie = "medtravel_likes="+new_cookie;
        addLike(mid);
      }
    }
    else {
      alert('Te gusta esta página!');
      document.cookie = "medtravel_likes="+mid;
      addLike(mid);
    }
  }

  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return null;
  } 

  function analizeCookie(cookie, mid) {
    var name = cookie;
    var ca = name.split('-');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(mid) == 0) return true;
    }
    return false;
  }

  function addLike(mid) {
    jQuery("#like-load").load("/med/ajax-like/"+mid);
  }
</script>

<section id="bannerInterior">

      <?php if($header_img['#item'] != null):?>
        <figure><?php print render($header_img);?>
        </figure>
      <?php endif;?>

      <?php if(!empty($header_txt['#markup'])):?>
        <article class="container">
            <h1><?php print render($header_txt);?></h1>
        </article>
      <?php endif;?>

        <nav class="container" id="favoritos">
            <ul>
                <?php if((!empty($likes)) && ($likes == 1)):?>
                  <li><a nohref onClick="handleCookie(<?php print $mid;?>)"><span class="icon-heart"></span></a>
                    <p id="like-load">(<?php print $num_likes;?>)</p>
                  </li>
                <?php endif;?>

                <?php if( (!empty($social_tw) && $social_tw == 1) || (!empty($social_fb) && $social_fb == 1) || (!empty($share) && $share == 1)):?>
                  <li><?php print render($page['share_this']);?></li>
                <?php endif;?>
            </ul>

              <ul>
                <?php //if((!empty($bookmarks)) && ($bookmarks == 1)):?>
                  <!--<li><a href=""><span class="icon-star-full"></span><p>Añadir a mis favoritos</p></a>
                  </li>-->
                <?php //endif;?>
              </ul>
            
        </nav>
</section>



    <section class="container" id="contenido">
    <!-- delete confirm form-->
      <?php if(isset($page['content']['system_main']['#form_id']) &&  ($page['content']['system_main']['#form_id'] == 'micro_delete_confirm')):?>
        <?php print render($page['content']);?>
      <?php endif;?>
      <!-- END delete confirm form-->

        <?php if(!empty($info_description)):?>
          <article>
              <!-- for ckeditor includes a <p> tag already-->
              <?php print render($info_description);?>
          </article>
        <?php endif;?>

        <?php if(!empty($mod_img_txts)):?>
          <?php $counter = 0;?>
          <?php foreach($mod_img_txts as $mod_img_txt):?>
            <?php 
              $title = $mod_img_txt['field_mod_img_txt_title']['und'][0]['safe_value'];
              $txt = $mod_img_txt['field_mod_img_txt_txt']['und'][0]['safe_value'];

              $image_uri = $mod_img_txt['field_mod_img_txt_img']['und'][0]['uri'];
              $image_vars = array('style_name' => 'mod-img-txt', 'path' => $image_uri);
              $class = ($counter % 2 == 0) ? "mod-img-txt-right" : "mod-img-txt-left";
              $image = theme_image_style($image_vars);
            ?>
            <article class="textoImagen <?php print $class;?>">
                <figure><?php print render($image);?>
                </figure>
                <h3><?php print $title;?></h3>
                <!-- for ckeditor includes a <p> tag already-->
                <?php print $txt;?>
            </article>
            <?php $counter++;?>
          <?php endforeach;?>
        <?php endif;?>
          <?php if(!empty($body_img['#item']) || !empty($listItems)):?>
            <article id="infoEvento">
                <?php if(!empty($body_img['#item'])):?>
                  <figure><?php print render($body_img);?>
                  </figure>
                <?php endif;?>
                <?php if(!empty($listItems)):?>
                  <aside>
                      <p>
                          <?php foreach($listItems as $item):?>
                            <?php
                              $title = $item['field_list_items_title']['und'][0]['safe_value'];
                              $desc = $item['field_list_items_description']['und'][0]['safe_value'];
                            ?>
                            <strong><?php print $title;?></strong> <?php print $desc;?>
                            <br>
                            <br>
                          <?php endforeach;?>
                      </p>

                  </aside>
                <?php endif;?>
          </article>
        <?php endif;?>

        <?php if(!empty($body_video['#item']) || !empty($body_quote['#markup']) || !empty($body_quote_author['#markup'])):?>
          <article class="video">
          <?php if(!empty($body_video['#item'])):?>
            <iframe width="100%" height="768" src="<?php print render($body_video);?>" frameborder="0" allowfullscreen></iframe>
          <?php endif;?>
              <?php if(!empty($body_quote['#markup']) || !empty($body_quote_author['#markup'])):?>
                <aside>
                    <p>
                      <?php if(!empty($body_quote['#markup'])):?>
                        <strong>"<?php print render($body_quote);?>"</strong>
                        <br>
                      <?php endif;?>
                      <?php if(!empty($body_quote_author['#markup'])):?>
                          <br> <?php print render($body_quote_author);?>
                      <?php endif;?>
                    </p>
                </aside>
              <?php endif;?>
          </article>
        <?php endif;?>
    </section>
    <section class="row wrapper2">
       <?php if(!empty($gallery)):?>
         <article id="galeria">
          <div class="clr"></div>
          <div id="panel" class="panel hide"></div>
          <div class="am-container" id="am-container">
              <?php foreach($gallery as $image):?>
                <?php $image = file_create_url($image['uri']);?>
                <img src="<?php print $image;?>">
              <?php endforeach;?>
              </a>
          </div>
         </article>
        <?php endif;?>
        

        <?php if(!empty($map)):?>
          <script src="https://maps.googleapis.com/maps/api/js"></script>
          <script>
            var spots = [
          <?php foreach($map as $coords):?>
              ['<?php print $coords["name"];?>', <?php print $coords['latitude'];?>, <?php print $coords['longitude'];?>],
          <?php endforeach;?>
            ];

            function initialize() {
              var mapOptions = {
                zoom: 14,
                center: new google.maps.LatLng(spots[0][1],spots[0][2])
              }
              var map = new google.maps.Map(document.getElementById('mapa'),
                                            mapOptions);

              setMarkers(map, spots);
            }

            function setMarkers(map, spots) {

              for (var i = 0; i < spots.length; i++) {
                var spot = spots[i];
                var myLatLng = new google.maps.LatLng(spot[1], spot[2]);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: spot[0],
                });
              }
            }

            google.maps.event.addDomListener(window, 'load', initialize);

          </script>
          <center>
            <h2><?php print $map_title;?></h2>
          </center>
          <article id="mapa"></article>
        <?php endif;?>


          <?php if(!empty($footerLinks) || !empty($footerAttachments)):?>
           <article id="moduloEnlases">
                <?php if(!empty($footerLinks)):?>
                   <ul>
                    <li><h2><?php print $title_links;?></h2></li>
                       <?php foreach($footerLinks as $link):?> 
                          <?php 
                            $url = $link['field_footer_link_url']['und'][0]['safe_value'];
                            $txt = $link['field_footer_link_txt']['und'][0]['safe_value'];
                          ?>
                          <li><a href="http://<?php print $url;?>" target="_blank"><?php print $txt;?></a></li>
                       <?php endforeach;?>
                   </ul>
                <?php endif;?>
               
               <?php if(!empty($footerAttachments)):?>
                   <ul id="descargas">
                    <li><h2><?php print $title_attachments;?></h2></li>
                   <?php foreach($footerAttachments as $attachment):?> 
                      <?php 
                        $url = file_create_url($attachment['field_footer_attachment_att']['und'][0]['uri']);
                        $txt = $attachment['field_footer_attachment_txt']['und'][0]['safe_value'];
                      ?>
                      <li> <a href="<?php print $url;?>" target="_blank"><span class="icon-descargar-icon"></span><?php print $txt;?></a></li>
                   <?php endforeach;?>
                   </ul>
                <?php endif;?>
           </article>
          <?php endif;?>
       
       <article id="relacionados">
          <h2>Artículos Relacionados</h2>
           <?php print render($related['content']);?>
       </article>
    </section>
  <?php endif;?>

  <?php else:?>
    
    <section id="bannerInterior">

        <!--<figure><img src="imagenes/banner-interior.jpg" alt="">
        </figure>-->
        <article class="container">
            <h1>Página no encontrada</h1>

        </article>
    </section>

    <section class="container" id="contenido">
      <article>
        <?php 
          $pt = drupal_get_path('theme','medtravel'); 
          $bp = base_path();
        ?>
        <img src="<?php print $bp.$pt;?>/imagenes/logo.png">
        <p>La página solicitada no se encuentra</p>
      </article>
    </section>

   <?php endif;?>