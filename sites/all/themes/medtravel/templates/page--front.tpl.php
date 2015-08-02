<?php //var_dump($lugares);?>
<?php print render($page['content']);?>
<section id="video">
         <video autoplay loop muted poster="<?php print $home_video_img;?>" id="bgvid">
            <!--<source src="video/bureau.mp4" type="video/mp4"/>
                <source src="<?php //print $home_video_img;?>" type="video/webm"/>
                    <source src="video/bureau.ogv" type="video/ogg"/>-->
        </video>
        <script>
           
document.addEventListener('touchstart', function(event) {
 video.play();
}, false);
        </script>

        <article class="container">
            <h1><?php print $home_title;?></h1>
            <p class="parrafoGrande"><?php print $home_description;?></p>
        </article>
        <a id="pararVideo" class="btnBlanco">Pausar video</a>
    </section>
    <section id="busquedaRapida">
        <aside>
            <nav>
                <ul>
                    <?php if($home_que_visitar == 1):?>
                        <li id="queVisitar" class="col-md-4 col-sm-4 col-xs-4 current"><a href="javascript:;">Qué Visitar</a>
                        </li>
                        <article>
                            <select name="" id="lugares_select">
                                <?php foreach($lugares as $tid => $nombre):?>
                                    <option value="taxonomy/term/<?php print $tid;?>"><?php print $nombre;?></option>
                                <?php endforeach;?>
                            </select>
                            <button class="btnRojo" onClick="document.location = document.getElementById('lugares_select').value">Buscar</button>
                        </article>
                    <?php endif;?>

                    <?php if($home_donde_quedarme == 1):?>
                        <li id="tipoAlojamiento" class="col-md-4 col-sm-4 col-xs-4"><a href="javascript:;">Dónde Quedarme</a>
                        </li>
                        <article>
                            <select name="" id="hospedaje_select">
                                <?php foreach($hospedaje as $tid => $nombre):?>
                                    <option value="taxonomy/term/<?php print $tid;?>"><?php print $nombre;?></option>
                                <?php endforeach;?>
                            </select>
                            <a class="btnRojo" href="javascript:;" onClick="document.location = document.getElementById('lugares_select').value">Buscar</a>
                        </article>
                    <?php endif;?>
                    
                    <?php if($home_donde_quedarme == 1):?>
                        <li id="transporte" class="col-md-4 col-sm-4 col-xs-4"><a href="javascript:;">Cómo moverme</a>
                        </li>
                        <article>
                            <ul class="transporte">
                                <?php foreach($transporte as $mid => $nombre):?>
                                    <li><a href="<?php print $mid;?>"><?php print $nombre;?></a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </article>
                    <?php endif;?>
                </ul>
            </nav>
        </aside>
    </section>

    <div class="container">
        <?php print render($home_block['content']);?>
    </div>
    <section id="temporada">
        <article>
            <a href=""><h2>Evento de la temporada</h2></a>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est eaque eveniet perspiciatis at aspernatur dolore quibusdam, iure recusandae atque quos labore! Accusantium cum vero tenetur, tempora quod aliquam optio quaerat?</p>
            <a class="btnBlanco" href="">Ver más</a>
        </article>
    </section>
    <section id="instagramFeed">
        <!--<figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>-->
    </section>