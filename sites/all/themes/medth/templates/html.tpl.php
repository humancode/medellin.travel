<?php
    // vars for paths
    $theme_path = drupal_get_path('theme', 'medth') . '/';
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Medellín Travel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="DESCRIPCIÓN DEL EVENTO">
    <meta property="og:site_name" content="CONTENIDO TITULO FACEBOOK">
    <meta property="og:description" content="DESCRIPCIÓN FACEBOOK DEL EVENTO">
    <meta property="og:image" content="images/.jpg">

    <?php print $styles;?>

    <?php print $scripts;?>

    

    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-55323805-1', 'auto');
        ga('send', 'pageview');
    </script>

</head>

<body>
    <header>
        <nav id="menuSuperior">
            <div class="container">
                <span class="icon-menu"></span>
                <figure>
                    <a href="index.html"><img src="imagenes/logo-medellin-travel.png" alt="Medellín Travel">
                    </a>
                </figure>
                <ul id="mainMenu">
                    <li class="mainMenu"><a class="flechaMenuAbajo" href="javascript:;">Experiencias</a>
                    </li>
                    <section class="subMenu">
                        <div class="container">
                            <article class="col-md-8">
                                <ul class="col-md-6">
                                    <li><a href="">Ciudad Botero</a>
                                    </li>
                                    <li><a href="">Transformación e innovación</a>
                                    </li>
                                    <li><a href="">Cultura silletera</a>
                                    </li>
                                </ul>
                                <ul class="col-md-6">
                                    <li><a href="">Navidad</a>
                                    </li>
                                    <li><a href="">Naturaleza</a>
                                    </li>
                                    <li><a href="">Reuniones</a>
                                    </li>
                                    <li><a href=""><span>Todas las experiencias</span></a>
                                    </li>
                                </ul>
                            </article>
                            <article class="col-md-4 recomendado">
                                <figure>
                                    <img src="imagenes/imagen-vida-botero-medellin-travel.jpg" alt="">
                                    <figcaption>
                                        <h4>EXPERIENCIA RECOMENDADA</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet ducimus itaque laborum dolores voluptate.</p>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </section>
                    <li class="mainMenu"><a class="flechaMenuAbajo" href="javascript:;">Lugares para visitar</a>
                    </li>
                    <section class="subMenu">
                        <div class="container">
                            <article class="col-md-8">

                                <ul class="col-md-4">
                                    <li><a href="">Naturaleza</a>
                                    </li>

                                    <li><a href="">Plazas y Parques</a>
                                    </li>

                                    <li><a href="">Cultura y Entretenimiento</a>
                                    </li>
                                </ul>
                                <ul class="col-md-4">
                                    <li><a href="">Bibliotecas</a>
                                    </li>

                                    <li><a href="">Pueblos Patrimoniales</a>
                                    </li>

                                    <li><a href="">Escenarios Deportivos</a>
                                    </li>

                                </ul>
                                <ul class="col-md-4">
                                    <li><a href="">Edificios Emblemáticos</a>
                                    </li>

                                    <li><a href=""><span>Todos los lugares</span></a>
                                    </li>
                                </ul>
                            </article>
                            <article class="col-md-4 recomendado">
                                <figure>
                                    <img src="imagenes/imagen-vida-botero-medellin-travel.jpg" alt="">
                                    <figcaption>
                                        <h4>EXPERIENCIA RECOMENDADA</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet ducimus itaque laborum dolores voluptate.</p>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </section>
                    <li class="mainMenu"><a class="flechaMenuAbajo" href="javascript:;">Planéate en Medellín</a>
                    </li>
                    <section id="planeate" class="subMenu">
                        <div class="container">
                            <article>

                                <ul class="col-md-3">
                                    <li>
                                        <h4>Disfruta</h4>
                                    </li>

                                    <li><a href="">Medellín 24 horas</a>
                                    </li>

                                    <li><a href="">Medellín 48 horas</a>
                                    </li>

                                    <li><a href="">Imperdibles de Medellín</a>
                                    </li>

                                    <li><a href="">Eventos</a>
                                    </li>

                                    <li><a href="http://www.medellinsisabe.com/">Medellín si Sabe</a>
                                    </li>

                                    <li><a href="javascript:;">Medellín Compras</a>
                                    </li>
                                </ul>
                                <ul class="col-md-3">
                                    <li>
                                        <h4>Cómo moverme</h4>
                                    </li>

                                    <li><a href="">Metro</a>
                                    </li>

                                    <li><a href="">Turibus</a>
                                    </li>

                                    <li><a href="">Helicoptero</a>
                                    </li>

                                    <li><a href="">Taxis</a>
                                    </li>
                                </ul>
                                <ul class="col-md-3">
                                    <li>
                                        <h4>Información práctica</h4>
                                    </li>

                                    <li><a href="">Clima</a>
                                    </li>

                                    <li><a href="">Seguridad</a>
                                    </li>

                                    <li><a href="">Puntos de información turística</a>
                                    </li>

                                    <li><a href="">Nomenclatura</a>
                                    </li>

                                    <li><a href="">Moneda</a>
                                    </li>

                                    <li><a href="">Mapas descargables</a>
                                    </li>
                                </ul>
                                <ul class="col-md-3">
                                    <li>
                                        <h4>Directorio</h4>
                                    </li>

                                    <li><a href="">Hoteles</a>
                                    </li>

                                    <li><a href="">Hostales</a>
                                    </li>

                                    <li><a href="">Restaurantes</a>
                                    </li>

                                    <li><a href="">Centros comerciales</a>
                                    </li>

                                    <li><a href="">Agencias de viaje</a>
                                    </li>
                                    <li><a href="">Transporte especial</a>
                                    </li>

                                    <li><a href="">Aerolíenas</a>
                                    </li>
                                </ul>

                            </article>
                        </div>
                    </section>
                    <li><a href="">Blog</a>
                    </li>
                </ul>
                <ul id="userMenu">
                    <li><a href="">English</a>
                    </li>
                    <li><span class="icon-star-full"></span>
                        <p>(3)</p>
                    </li>
                    <li id="buscar">
                        <input type="text" placeholder="Buscar">
                        <button class="btnRojo">Buscar</button>
                    </li>
                    <li><span class="icon-lupa-icon"></span>
                    </li>
                </ul>
            </div>
        </nav>
       
    </header>
    <section id="video">
         <video autoplay loop muted poster="<?php print $theme_path;?>imagenes/background-video-medellin-travel.jpg" id="bgvid">
            <source src="<?php print $theme_path;?>video/bureau.mp4" type="video/mp4"/>
                <source src="<?php print $theme_path;?>video/bureau.webm" type="video/webm"/>
                    <source src="<?php print $theme_path;?>video/bureau.ogv" type="video/ogg"/>
        </video>
        <script>
           
document.addEventListener('touchstart', function(event) {
 video.play();
}, false);
        </script>

        <article class="container">
            <h1>MEDELLÍN</h1>
            <p class="parrafoGrande">Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
        </article>
        <a id="pararVideo" class="btnBlanco">Pausar video</a>
    </section>
    <section id="busquedaRapida">
        <aside>
            <nav>
                <ul>
                    <li id="queVisitar" class="col-md-4 col-sm-4 col-xs-4 current"><a href="javascript:;">Qué Visitar</a>
                    </li>
                    <article>

                        <select name="" id="">
                            <option value="">Qué Visitar</option>
                            <option value="">Hoteles</option>
                            <option value="">Hostales</option>
                        </select>
                        <button class="btnRojo">Buscar</button>
                    </article>
                    <li id="tipoAlojamiento" class="col-md-4 col-sm-4 col-xs-4"><a href="javascript:;">Dónde Quedarme</a>
                    </li>
                    <article>
                        <select name="" id="">
                            <option value="">Seleccione el tipo de alojamiento</option>
                            <option value="">Hoteles</option>
                            <option value="">Hostales</option>
                        </select>
                        <a class="btnRojo" href="javascript:;">Buscar</a>
                    </article>
                    <li id="transporte" class="col-md-4 col-sm-4 col-xs-4"><a href="javascript:;">Cómo moverme</a>
                    </li>
                    <article>
                        <ul class="transporte">
                            <li><a href="javascript:;">Metro</a>
                            </li>
                            <li><a href="javascript:;">Turibus</a>
                            </li>
                            <li><a href="javascript:;">Helicóptero</a>
                            </li>
                            <li><a href="javascript:;">Taxi</a>
                            </li>
                        </ul>
                    </article>
                </ul>
            </nav>
        </aside>
    </section>

    <div class="container">

        <section class="row menuHome">
            <h2> <a href="">Ciudad Botero</a></h2>
            <article class="col-md-4 col-sm-4">
                <div class="bg"></div>
                <a href="javascript:;">
                    <h3 id="linea">Vida <br> Botero</h3>
                    <figure><img src="<?php print $theme_path;?>imagenes/imagen-vida-botero-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>

            </article>
            <article class="col-md-4 col-sm-4">

                <a href="javascript:;">
                    <h3 id="linea">Plaza de las Esculturas</h3>
                    <figure><img src="<?php print $theme_path;?>imagenes/imagen-plaza-de-las-esculturas-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>

            </article>
            <article class="col-md-4 col-sm-4">
                <a href="javascript:;">
                    <h3 id="linea">Museo de <br> Antioquia</h3>
                    <figure><img src="<?php print $theme_path;?>imagenes/imagen-museo-de-antioquia-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>
            </article>
        </section>

        <section class="row menuHome">
            <h2><a href="">Nos Transformamos Para Ti</a></h2>
            <article class="col-md-4 col-sm-4">
                <a href="javascript:;">
                    <h3 id="linea">Comuna <br>13</h3>
                    <figure><img src="imagenes/imagen-escaleras-comuna-13-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>

            </article>
            <article class="col-md-4 col-sm-4">

                <a href="javascript:;">
                    <h3 id="linea">La Nueva <br> Medellín</h3>
                    <figure><img src="imagenes/imagen-la-nueva-medellin-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>

            </article>
            <article class="col-md-4 col-sm-4">
                <a href="javascript:;">
                    <h3 id="linea">Zona <br> Norte</h3>
                    <figure><img src="imagenes/imagen-zona-norte-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>
            </article>
        </section>

        <section class="row menuHome">
            <h2><a href="">Medellín Florece</a></h2>
            <article class="col-md-4 col-sm-4">
                <a href="javascript:;">
                    <h3 id="linea">Orquídeas y flores</h3>
                    <figure><img src="imagenes/imagen-orquideas-y-flores-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>

            </article>
            <article class="col-md-4 col-sm-4">

                <a href="javascript:;">
                    <h3 id="linea">Santa <br> Elena</h3>
                    <figure><img src="imagenes/imagen-santa-elena-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>

            </article>
            <article class="col-md-4 col-sm-4">
                <a href="javascript:;">
                    <h3 id="linea">Feria de las flores</h3>
                    <figure><img src="imagenes/imagen-feria-de-las-flores-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>
            </article>
        </section>
        <section class="row menuHome">
            <h2> <a href="">Nuestra Navidad</a></h2>
            <article class="col-md-8 col-sm-8">
                <a href="javascript:;">
                    <h3 id="linea">Alumbrado <br>Navideño</h3>
                    <figure><img src="imagenes/imagen-alumbrado-navidad-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>
            </article>
            <article class="col-md-4 col-sm-4">
                <a href="javascript:;">
                    <h3 id="linea">Festival de <br> las Luces</h3>
                    <figure><img src="imagenes/imagen-festival-de-las-luces-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    </figure>
                </a>
            </article>
        </section>
    </div>
    <section id="temporada">
        <article>
            <a href=""><h2>Evento de la temporada</h2></a>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est eaque eveniet perspiciatis at aspernatur dolore quibusdam, iure recusandae atque quos labore! Accusantium cum vero tenetur, tempora quod aliquam optio quaerat?</p>
            <a class="btnBlanco" href="">Ver más</a>
        </article>
    </section>
    <section id="instagramFeed">
        <figure class="col-md-4 col-sm-4"><img src="<?php print $theme_path;?>imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="<?php print $theme_path;?>imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="<?php print $theme_path;?>imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
        <figure class="col-md-4 col-sm-4"><img src="imagenes/imagen-muestra-instageam-medellin-travel.jpg" alt="">
        </figure>
    </section>
    <footer>
        <section class="container">
            <ul class="col-md-3 col-sm-3">
                <li>
                    <h4>Medellín travel</h4>
                </li>
                <br>
                <br>
                <li>Mapa del sitio</li>
                <br>
                <li>Quiénes somos</li>
                <br>
                <li>Contáctenos</li>
                <br>
                <li>Vinculación prestadores de servicios turísticos</li>
                <br>
                <li><a href="" target="_blank">Blog</a>
                </li>
                <br>
                <li><a href="">Términos y Condiciones</a>
                </li>
            </ul>
            <ul class="col-md-3 col-sm-3">
                <li>
                    <h4>Enlaces externos</h4>
                </li>
                <br>
                <br>
                <li><a href="javascript:;" target="_blank">Medellín de Compras</a>
                </li>
                <br>
                <li><a href="http://www.medellinsisabe.com/" target="_blank">Medellín Sí Sabe</a>
                </li>
            </ul>
            <ul class="col-md-3 col-sm-3">
                <li>
                    <h4>Medellín Convention & Visitors Bureau</h4>
                </li>
                <br>
                <br>
                <li>Calle 41 # 55- 80 Oficina 306</li>
                <br>
                <li>Tel: (57-4) 261 60 60</li>
                <br>
                <li>Subsecretaría de Turismo</li>
                <br>
                <li>Tel: (57-4) 385 69 66</li>
            </ul>
            <ul class="col-md-3 col-sm-3">
                <li>
                    <h4>Medellín Convention & Visitors Bureau</h4>
                </li>
                <br>
                <br>
                <li>Desarrollo turístico</li>
                <br>
                <li>Tel: (57-4) 383 8639 - 383 8633</li>
                <br>
                <li>Línea de atención al ciudadano:
                    <br> (57-4) 4099000</li>
                <br>
                <li>Línea gratuita: 01 8000 419 000</li>
            </ul>
        </section>
        <nav class="container" id="social">
            <ul>
                <li><a href="" target="_blank"><span class="icon-facebook3"></span></a>
                </li>
                <li><a href="" target="_blank"><span class="icon-twitter3"></span></a>
                </li>
                <li><a href="" target="_blank"><span class="icon-flickr4"></span></a>
                </li>
                <li><a href="" target="_blank"><span class="icon-youtube-icon"></span></a>
                </li>
                <li><a href="" target="_blank"><span class="icon-linkedin-icon"></span></a>
                </li>
                <li><a href="" target="_blank"><span class="icon-instagram-icon"></span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="" target="_blank"><img src="<?php print $theme_path;?>imagenes/icono-medellin-convention-medellin-travel.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="" target="_blank"><img src="<?php print $theme_path;?>imagenes/icono-alcaldia-medellin-medellin-travel.jpg" alt="">
                    </a>
                </li>
                <li>
                    <a href="" target="_blank"><img src="<?php print $theme_path;?>imagenes/icono-medellin-medellin-travel.jpg" alt="">
                    </a>
                </li>
            </ul>
        </nav>
    </footer>
</body>

</html>