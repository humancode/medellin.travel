<?php 
	$theme_path = drupal_get_path('theme', 'medtravel') . '/';
    $home_footer = variable_get('home_footer');
?>
<?php if($home_footer == 1):?>
<section class="container">
    <?php print render($footer_block['content']);?>   
</section>
<nav class="container" id="social">
    <ul>
        <?php if($home_facebook == 1):?>
            <li><a href="<?php print $home_facebook_link;?>" target="_blank"><span class="icon-facebook3"></span></a>
            </li>
        <?php endif;?>
        <?php if($home_twitter == 1):?>
            <li><a href="<?php print $home_twitter_link;?>" target="_blank"><span class="icon-twitter3"></span></a>
            </li>
        <?php endif;?>
        <?php if($home_flickr == 1):?>
            <li><a href="<?php print $home_flickr_link;?>" target="_blank"><span class="icon-flickr4"></span></a>
            </li>
        <?php endif;?>
        <?php if($home_youtube == 1):?>
            <li><a href="<?php print $home_youtube_link;?>" target="_blank"><span class="icon-youtube-icon"></span></a>
            </li>
        <?php endif;?>
        <?php if($home_linkedin == 1):?>
            <li><a href="<?php print $home_linkedin_link;?>" target="_blank"><span class="icon-linkedin-icon"></span></a>
            </li>
        <?php endif;?>
        <?php if($home_instagram == 1):?>
            <li><a href="<?php print $home_instagram_link;?>" target="_blank"><span class="icon-instagram-icon"></span></a>
            </li>
        <?php endif;?>
    </ul>
    <ul>
        <li>
            <a href="http://<?php print $home_link_logo_1;?>" target="_blank"><img src="http://localhost/med/<?php print $theme_path;?>imagenes/icono-medellin-convention-medellin-travel.png" alt="">
            </a>
        </li>
        <li>
            <a href="http://<?php print $home_link_logo_2;?>" target="_blank"><img src="http://localhost/med/<?php print $theme_path;?>imagenes/icono-alcaldia-medellin-medellin-travel.png" alt="">
            </a>
        </li>
        <li>
            <a href="http://<?php print $home_link_logo_3;?>" target="_blank"><img src="http://localhost/med/<?php print $theme_path;?>imagenes/icono-medellin-medellin-travel.png" alt="">
            </a>
        </li>
    </ul>
</nav>
<?php endif;?>