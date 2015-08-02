<?php
    $logo = file_load(variable_get('home_logo'));
    if(!empty($logo)) {
        $home_logo = file_create_url($logo->uri);
    }
?>
<?php print render($page['content']);?>
 <nav id="menuSuperior">
            <div class="container">
                <span class="icon-menu-icon"></span>
                <figure>
                    <a href="index.html"><img src="<?php print $home_logo;?>" alt="Medellín Travel">
                    </a>
                </figure>
                <ul id="mainMenu">
                    <?php print render($main_menu_block['content']);?>
                </ul>
                <ul id="userMenu">
                    <li><a href="">English</a>
                    </li>
                    <li><a href=""><span class="icon-star-full"></span></a>
                        <p>(3)</p>
                    </li>
                    <li id="buscar">
                       <div>
                        <input type="text" placeholder="Buscar">
                        </div>
                        <span class="icon-lupa-icon"></span>
                    </li>
             
                </ul>
            </div>
        </nav>