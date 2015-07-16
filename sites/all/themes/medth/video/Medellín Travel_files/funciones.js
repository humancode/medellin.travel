//:::::::::::LINEA AL REDEDOR DE TITULO IMÁGEN MENU HOME:::::::
var pathObj = {
    "linea": {
        "strokepath": [
            {
                "path": "M75.688,0.501c0.066,0,0.341,0.001,0.407,0.001C117.242,0.822,150.5,34.277,150.5,75.5  c0,41.421-33.579,75-75,75s-75-33.579-75-75c0-41.192,33.207-74.627,74.312-74.997c0.084-0.001,0.578-0.002,0.662-0.003",
                "duration": 600
            }
        ],
        "dimensions": {
            "width": 151,
            "height": 151
        }
    }
};





$(document).ready(function () {


    $("#menuHome article h3").hover(
        function () {
            $(this).lazylinepainter({
                "svgData": pathObj,
                "strokeWidth": 2,
                "strokeColor": "#ff4949"

            }).lazylinepainter('paint');

            //      $('#menuHome article .bg').fadeIn();

        },
        function () {
            $(this).lazylinepainter('erase');

            // $('#menuHome article .bg').fadeOut();

        }



    );


    //     HOVER SUBMENU

    $('.icon-menu').click(function () {

        $('#mainMenu').slideToggle();



    });

    if ($(window).width() < 720) {
$('#buscar').show();
        $('#mainMenu').hide();
        $("#menuSuperior .mainMenu").click(function () {
            if ($(this).next().is(':visible')) {
                $(this).next().hide();


            }
            if ($(this).next().is(':hidden')) {
                $('#menuSuperior .mainMenu').next().hide();
                $(this).next().show();


            }
        });


   $


    } else {
        $("#menuSuperior .mainMenu").hover(function () {
            if ($(this).next().is(':visible')) {
                $(this).next().hide();


            }
            if ($(this).next().is(':hidden')) {
                $('#menuSuperior .mainMenu').next().hide();
                $(this).next().show();


            }
        });

        $('#mainMenu').mouseleave(function () {
            $('.subMenu').hide();

        });
        
        //MOSTRAR BUSCADOR
    $('#buscar').hide();
    $(".icon-lupa-icon").click(function () {
        $('#buscar').toggle('slide');
    });


    };





    




    $('#queVisitar').next().show();
    $('#busquedaRapida li').on('click', function () {
        if ($(this).next().is(':visible')) {
            $(this).next().slideUp();
            $(this).removeClass('current');
        }
        if ($(this).next().is(':hidden')) {
            $('#busquedaRapida li').next().slideUp();
            $(this).next().slideDown();
            $('#busquedaRapida li').removeClass('current');
            $(this).addClass('current');
        }
    });

    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 1) {
                $("#menuSuperior").addClass("menuTop");
            } else {

                $("#menuSuperior").removeClass("menuTop");
            }
        });
    });




    //     GALERÍA AUTOMÁTICA

    $(function () {
        var $container = $('#am-container'),
            $imgs = $container.find('img').hide(),
            totalImgs = $imgs.length,
            cnt = 0;

        $imgs.each(function (i) {
            var $img = $(this);
            $('<img/>').load(function () {
                ++cnt;
                if (cnt === totalImgs) {
                    $imgs.show();
                    $container.montage({
                        fillLastRow: true,
                        alternateHeight: true,
                        alternateHeightRange: {
                            min: 200,
                            max: 400
                        }
                    });

                    /* 
                     * just for this demo:
                     */
                }
            }).attr('src', $img.attr('src'));
        });
    });

});