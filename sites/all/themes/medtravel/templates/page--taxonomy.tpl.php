<?php

/**
 * @file
 * Default theme implementation to display a term.
 *
 * Available variables:
 * - $name: (deprecated) The unsanitized name of the term. Use $term_name
 *   instead.
 * - $content: An array of items for the content of the term (fields and
 *   description). Use render($content) to print them all, or print a subset
 *   such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $term_url: Direct URL of the current term.
 * - $term_name: Name of the current term.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - taxonomy-term: The current template type, i.e., "theming hook".
 *   - vocabulary-[vocabulary-name]: The vocabulary to which the term belongs to.
 *     For example, if the term is a "Tag" it would result in "vocabulary-tag".
 *
 * Other variables:
 * - $term: Full term object. Contains data that may not be safe.
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $page: Flag for the full page state.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the term. Increments each time it's output.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * @see template_preprocess()
 * @see template_preprocess_taxonomy_term()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<?php var_dump($hola);?>
 <section id="bannerInterior">

        <figure><img src="imagenes/banner-interior.jpg" alt="">
        </figure>
        <article class="container">
            <h1>Ciudad Botero</h1>

        </article>

    </section>


    <section class="wrapper2 row" id="interna1">
        <div class="col-md-3"></div>
        <article class="col-md-9">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem iure, natus corporis ad consequuntur laudantium laboriosam quaerat magnam officia quis consectetur nobis veritatis facere recusandae beatae doloribus laborum nemo fugit.</p>
        </article>
        <nav id="menuLateral" class="col-md-3">
            <ul>
                <li><a href="javascript:;">Todas las experiencias </a><span>(3)</span>
                </li>
                <li><a href="javascript:;">Ciudad Botero </a><span>(3)</span>
                </li>
                <li><a href="javascript:;">Transformación e innovación </a><span>(3)</span>
                </li>
                <li><a href="javascript:;">Cultura silletera </a><span>(3)</span>
                </li>
                <li><a href="javascript:;">Navidad </a><span>(3)</span>
                </li>
                <li><a href="javascript:;">Naturaleza </a><span>(3)</span>
                </li>
                <li><a href="javascript:;">Reuniones </a><span>(3)</span>
                </li>

            </ul>
        </nav>
        <article class="col-md-3 col-sm-6">
            <div>

                <figure><img src="imagenes/imagen-interna-vida-botero-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    <h3 id="linea">Vida  Botero</h3>
                    <figcaption>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="">Ver más</a>
                    </figcaption>
                </figure>
            </div>
        </article>

        <article class="col-md-3 col-sm-6">
            <div>

                <figure><img src="imagenes/imagen-plaza-de-las-esculturas-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    <h3 id="linea">Plaza de las Esculturas</h3>
                    <figcaption>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="">Ver más</a>
                    </figcaption>
                </figure>
            </div>
        </article>
        <article class="col-md-3 col-sm-6">
            <div>

                <figure><img src="imagenes/imagen-interna-museo-de-antioquia-medellin-travel.jpg" alt="Vida Botero Medellín Travel">
                    <h3 id="linea">Plaza de las Esculturas</h3>
                    <figcaption>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <a href="">Ver más</a>
                    </figcaption>
                </figure>
            </div>
        </article>

    </section>