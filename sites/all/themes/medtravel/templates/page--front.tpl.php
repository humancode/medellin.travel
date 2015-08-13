<section id="video">
         <video autoplay muted loop  poster="<?php print $home_video_img;?>" id="bgvid">
            <source src="<?php print $home_video;?>" type="video/mp4"/>
                <!--<source src="<?php //print $home_video_img;?>" type="video/webm"/>
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
        <ul>
            <li><a id="silenciarVideo" class="btnBlanco">Escuchar ))</a>
            </li>
            <li><a id="pararVideo" class="btnBlanco">Pausar video</a>
            </li>
        </ul>
    </section>
    <section id="busquedaRapida">
        <aside>
            <nav>
                <ul>
                    <?php if($home_que_visitar == 1):?>
                        <li id="queVisitar" class="col-md-4 col-sm-4 col-xs-4 current">
                        <a href="javascript:;">
                        <?php if($langcode == '_en'):?>
                          Places
                        <?php else:?>
                          Qué visitar
                        <?php endif;?> 
                        </a>
                        </li>
                        <article>
                            <select name="" id="lugares_select">
                                <?php foreach($lugares as $tid => $nombre):?>
                                    <option value="taxonomy/term/<?php print $tid;?>"><?php print $nombre;?></option>
                                <?php endforeach;?>
                            </select>
                            <?php 
                                if($langcode == '_en') {
                                    $search_tag = 'Search';
                                }
                                else {
                                    $search_tag = 'Buscar';
                                }
                            ?>
                               
                            <button class="btnRojo" onClick="document.location = document.getElementById('lugares_select').value"><?php print $search_tag;?></button>
                        </article>
                    <?php endif;?>

                    <?php if($home_donde_quedarme == 1):?>
                        <li id="tipoAlojamiento" class="col-md-4 col-sm-4 col-xs-4">
                        <a href="javascript:;">
                        <?php if($langcode == '_en'):?>
                          Where to stay
                        <?php else:?>
                          Dónde quedarme
                        <?php endif;?> 
                        </a>
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
                    
                    <?php if($home_como_moverme == 1):?>
                        <li id="transporte" class="col-md-4 col-sm-4 col-xs-4">
                        <a href="javascript:;">
                        <?php if($langcode == '_en'):?>
                          Transport
                        <?php else:?>
                          Cómo moverme
                        <?php endif;?> 
                        </a>
                        </li>
                        <article>
                            <ul class="transporte">
                                <?php foreach($transporte as $mid => $nombre):?>
                                    <li><?php print l($nombre, './micro/'.$mid);?>"><?php print $nombre;?>
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
            <!--<a href=""><h2>Evento de la temporada</h2></a>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est eaque eveniet perspiciatis at aspernatur dolore quibusdam, iure recusandae atque quos labore! Accusantium cum vero tenetur, tempora quod aliquam optio quaerat?</p>
            <a class="btnBlanco" href="">Ver más</a>-->
        </article>
    </section>
    <section id="instagramFeed">
        <?php print render($page['instagram']);?>
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
    <script>
        (function ($) {
            var vid = document.getElementById("bgvid");
            var pauseButton = document.querySelector("#pararVideo");

            function vidFade() {
                vid.classList.add("stopfade");
            }

            vid.addEventListener('ended', function () {
                // only functional if "loop" is removed 
                vid.pause();
                // to capture IE10
                vidFade();
            });

            pauseButton.addEventListener("click", function () {
                vid.classList.toggle("stopfade");
                if (vid.paused) {
                    vid.play();
                    pauseButton.innerHTML = "Pausar video";
                } else {
                    vid.pause();
                    pauseButton.innerHTML = "Reanudar";
                }
            })

            $('#silenciarVideo').click(function(){
                vid.muted = false
            });
        }(jQuery));
    </script>