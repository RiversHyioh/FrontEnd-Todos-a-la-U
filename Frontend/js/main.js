$(document).ready(function() {
 /* Este código agrega un detector de eventos de clic a un elemento con la clase "fa-bars". Cuando se
 hace clic en este elemento, alterna la clase "fa-times" en el elemento en el que se hizo clic y
 alterna la clase "nav-toggle" en un elemento con la clase "navbar". Es probable que esto se use
 para alternar entre abrir y cerrar un menú de navegación. */
    $('.fa-bars').click(function() {
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('nav-toggle');
    });


/* Este código agrega un detector de eventos al objeto de la ventana para los eventos de
'desplazamiento' y 'carga'. Cuando el usuario se desplaza o se carga la página, se ejecuta la
función dentro del detector de eventos. */
    $(window).on('scroll load', function() {
        $('.fa-bars').removeClass('fa-times');
        $('.navbar').removeClass('nav-toggle');

        if($(window).scrollTop()> 30){
            $('header').addClass('header-active');
        } else {
            $('header').removeClass('header-active');
        }

        $('section').each(function(){
            var top = $(window).scrollTop();
            var id = $(this).attr('id');
            var height = $(this).height();
            var top = $(this).offset().top - 200;
            if (top >= offset + top && top < height + offset){
                $('.navbar ul li a').removeClass('active');
                $('.navbar').find('[href="# ' + id + '"]').addClass('active');
            }
        });

    });


});