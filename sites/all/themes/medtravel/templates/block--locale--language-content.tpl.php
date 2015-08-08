<?php
  global $language ;
  $langcode = $language->language ;
  $current_path = current_path();
  $base_path = base_path();
?>
<?php if($langcode == 'es'):?>
  <a href="http://localhost<?php print $base_path;?>en/<?php print $current_path;?>" class="language-link" xml:lang="en">English</a>
<?php endif;?>
<?php if($langcode == 'en'):?>
  <a href="http://localhost<?php print $base_path;?><?php print $current_path;?>" class="language-link" xml:lang="en">Español</a>
<?php endif;?>